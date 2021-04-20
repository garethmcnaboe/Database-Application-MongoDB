<!--Updates the payment status of a document in the order collection-->
<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->phoneorders;

echo("update method called");

$Invoice = $_POST['InvoiceNo1'];
$PaymentStatus = $_POST['PaymentStatus1'];

$updateResult = $collection->updateOne(
    ["InvoiceNo" => "$Invoice"],
    ['$set' => [
        "PaymentStatus" => "$PaymentStatus",
    ]]);

printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
printf("Modified %d document(s)\n", $updateResult->getModifiedCount());