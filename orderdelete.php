<?php

//deletes an individual document from the orders collection
//matches against the unique invoice number
require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->phoneorders;

echo("delete method called");

$InvoiceNumber = $_POST['dInvoiceNumber'];

$deleteResult = $collection->deleteOne([
    "InvoiceNo" => $InvoiceNumber
]);

printf("Deleted %d document(s)\n", $deleteResult->getDeletedCount());

header("location:./?Delete Successful");