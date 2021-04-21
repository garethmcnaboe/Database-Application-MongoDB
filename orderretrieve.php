<!--Queries database and prints documents retrieved from the order collection-->
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

$First = $_POST['orderFirst'];
$Surname = $_POST['orderSurname'];
$Email = $_POST['orderEmail'];

$cursor = $collection->find([
    "First" => $First,
    "Surname" => $Surname,
    "Email" => $Email
]);

foreach($cursor as $document){
        $customerid = $document['CustomerNo'];
        echo "for ", $document['First'], " ", $document['Surname'], $document['CustomerNo'];
}

$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->phoneorders;

$cursor = $collection->find([
    "CustomerNo" => $customerid
]);

echo "<table>";
echo "<tr>";
    echo "<th>Invoice No</th>";
    echo "<th>Total Charge</th>";
    echo "<th>Payment Status</th>";
    echo "<th>Delivery Status</th>";
    echo "<th>Manufacturer 1</th>";
    echo "<th>Model 1</th>";
    echo "<th>Price 1</th>";
    echo "<th>Manufacturer 2</th>";
    echo "<th>Model 2</th>";
    echo "<th>Price 2</th>";
    echo "<th>Manufacturer 3</th>";
    echo "<th>Model 3</th>";
    echo "<th>Price 3</th>";
echo"</tr>";

foreach($cursor as $document){
echo "<tr>";
    echo "<td>", $document['InvoiceNo'], "</td>";
    echo "<td>", $document['TotalPrice'], "</td>";
    echo "<td>", $document['PaymentStatus'], "</td>";
    echo "<td>", $document['DeliveryStatus'], "</td>";

    // Decode JSON data into PHP associative array format
    $array = MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($document['Products'])); 
    $arr = json_decode($array, true);

    for($x = 0; $x<count($arr); $x++){
        echo "<td>", $arr["0"]["Manufacturer"], "</td>";
        echo "<td>", $arr["0"]["Model"], "</td>";
        echo "<td>", $arr["0"]["Price"], "</td>";
    }  
echo "</tr>";
    
}
echo "</table>
<br/>";
?>

<!--button to allow user to navigate back to the main page-->
<a href="/Assignment-05a/#!/" target="_blank">Return to Home</a>

</body>
</html>