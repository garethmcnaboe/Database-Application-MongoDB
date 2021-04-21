<!--Deletes a document from the stock collection-->
<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->phonesinstock;

echo("delete method called");

$Manufacturer = $_POST['dManufacturer'];
$Model = $_POST['dModel'];
$Price = $_POST['dPrice'];

$deleteResult = $collection->deleteOne([
    "Manufacturer" => "$Manufacturer", 
    "Model" => "$Model", 
    "Price" => "$Price"
]);

printf("Deleted %d document(s)\n", $deleteResult->getDeletedCount());

header("location:./?Delete Successful");