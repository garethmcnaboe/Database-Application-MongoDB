<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->phonesinstock;

echo("update method called");

$Manufacturer = $_POST['uManufacturer'];
$Model = $_POST['uModel'];

$newManufacturer = $_POST['uNewManufacturer'];
$newModel = $_POST['uNewModel'];
$newPrice = $_POST['uNewPrice'];

$updateResult = $collection->updateOne(
    ["Manufacturer" => "$Manufacturer", 
    "Model" => "$Model"],
    ['$set' => [
        "Manufacturer" => "$newManufacturer",
        "Model" => "$newModel",
        "Price" => "$newPrice"
    ]]);

printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
printf("Modified %d document(s)\n", $updateResult->getModifiedCount());