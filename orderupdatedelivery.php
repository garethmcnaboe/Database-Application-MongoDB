<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->phoneorders;

echo("update method called");

$Invoice = $_POST['InvoiceNo2'];
$DeliveryStatus = $_POST['DeliveryStatus1'];

$updateResult = $collection->updateOne(
    ["InvoiceNo" => "$Invoice"],
    ['$set' => [
        "DeliveryStatus" => "$DeliveryStatus",
    ]]);

printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
printf("Modified %d document(s)\n", $updateResult->getModifiedCount());