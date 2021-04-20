<!--retrieves and prints out documents from the stock collection-->
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

$collection = $db->phonesinstock;

$rManufacturer = $_POST['rManufacturer'];
$rModel = $_POST['rModel'];

$cursor = $collection->find([
    "Manufacturer" => $rManufacturer,
    "Model" => $rModel,
]);

//generates table of results
echo "<table>";
echo "<tr>";
    echo "<th>Stock Number</th>";
    echo "<th>Manufacturer</th>";
    echo "<th>Model</th>";
    echo "<th>Price</th>";
echo"</tr>";

foreach($cursor as $document){
echo "<tr>";
    echo "<td>", $document['StockNumber'], "</td>";
    echo "<td>", $document['Manufacturer'], "</td>";
    echo "<td>", $document['Model'], "</td>";
    echo "<td>", $document['Price'], "</td>";

echo "</tr>";
}
echo "</table><br/>";

?>

</body>
</html>