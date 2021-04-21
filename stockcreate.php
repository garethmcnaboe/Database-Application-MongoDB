<!--Creates 
<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

//Make a call to the database to find out what was the last Invoice Number used
$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->counters;

$lastStockNum = 0; 
$ReferenceNum = 123;

$cursor = $collection->find([
    "ReferenceNum" => $ReferenceNum
]);

foreach($cursor as $document){
        $lastStockNum = $document['LastStockNum'];
        echo "for ", $document['LastStockNum'];
}

//Increment the last stock number
$StockNum = $lastStockNum + 1;

//Update the last Invoice Number counter in the database
$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->counters;

$updateResult = $collection->updateOne(
    ["ReferenceNum" => $ReferenceNum],
    ['$set' => [
        "LastStockNum" => "$StockNum"
    ]]);


//Create the new entry
$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->phonesinstock;

$Manufacturer = $_POST['cManufacturer'];
$Model = $_POST['cModel'];
$Price = $_POST['cPrice'];

$insertOneResult = $collection->insertOne([
    "StockNumber" => "$StockNum",
    "Manufacturer" => $Manufacturer,
    "Model" => $Model,
    "Price" => $Price
]);

printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
var_dump($insertOneResult->getInsertedId());

header("location:./?Stock Insert Successful");