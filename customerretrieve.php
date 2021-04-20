<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Download bootstrap & jquery in order to support bootsnip-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--Link to stylesheet-->
    <link rel="stylesheet" type="text/css" href="./table.css"/>

    <title>Search Results</title>

</head>
<body>

<h1>Search Results</h1>

<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->personalinformation;

$rFirst = $_POST['searchTerm1'];
$rSurname = $_POST['searchTerm2'];

$cursor = $collection->find([
    "First" => $rFirst,
    "Surname" => $rSurname,
]);
    //generates table of results
        echo "<table>";
                echo "<tr>";
                    echo "<th>Customer Number</th>";
                    echo "<th>Title</th>";
                    echo "<th>First Name</th>";
                    echo "<th>Surname</th>";
                    echo "<th>Mobile Number</th>";
                    echo "<th>E-mail</th>";
                    
                    echo "<th>Home Add 1</th>";
                    echo "<th>Home Add 2</th>";
                    echo "<th>Home Town</th>";
                    echo "<th>Home County or City</th>";
                    echo "<th>Home Eircode</th>";
                    
                    echo "<th>Ship Add 1</th>";
                    echo "<th>Ship Add 2</th>";
                    echo "<th>Ship Town</th>";
                    echo "<th>Ship County or City</th>";
                    echo "<th>Ship Eircode</th>";
        echo"</tr>";
        //iterates over the results to match the table headings
        foreach($cursor as $document){
                echo "<tr>";
                    echo "<td>", $document['CustomerNo'],"</td>";
                    echo "<td>", $document['Title'], "</td>";
                    echo "<td>", $document['First'], "</td>";
                    echo "<td>", $document['Surname'], "</td>";
                    echo "<td>", $document['Mobile'], "</td>";
                    echo "<td>", $document['Email'], "</td>";

                    echo "<td>", $document['HAdd1'], "</td>";
                    echo "<td>", $document['HAdd2'], "</td>";
                    echo "<td>", $document['HTown'], "</td>";
                    echo "<td>", $document['HCountyorCity'], "</td>";
                    echo "<td>", $document['HEircode'], "</td>";

                    echo "<td>", $document['SAdd1'], "</td>";
                    echo "<td>", $document['SAdd2'], "</td>";
                    echo "<td>", $document['STown'], "</td>";
                    echo "<td>", $document['SCountyorCity'], "</td>";
                    echo "<td>", $document['SEircode'], "</td>";

                echo "</tr>";
            }
            echo "</table><br/>";
?>

</body>
</html>