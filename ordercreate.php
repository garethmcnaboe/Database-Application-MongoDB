<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

//Make a call to the database to find out what was the last Invoice Number used
$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->counters;

$lastInvoiceNumber = 0; 
$ReferenceNum = 123;

$cursor = $collection->find([
    "ReferenceNum" => $ReferenceNum
]);

foreach($cursor as $document){
        $lastInvoiceNumber = $document['LastInvoiceNum'];
        echo "for ", $document['LastInvoiceNum'];
}

//Increment the last invoice number
$InvoiceNum = $lastInvoiceNumber + 1;

//Update the last Invoice Number counter in the database
$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->counters;

$updateResult = $collection->updateOne(
    ["ReferenceNum" => $ReferenceNum],
    ['$set' => [
        "LastInvoiceNum" => "$InvoiceNum"
    ]]);

//Create the new entry in the order collection - using the updated invoice number
$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->phoneorders;

$CustomerNum = $_POST['ocCustomerNo'];
$ocManufacturer1 = $_POST['ocManufacturer1'];
$ocModel1 = $_POST['ocModel1'];
$ocPrice1 = $_POST['ocPrice1'];
$ocManufacturer2 = $_POST['ocManufacturer2'];
$ocModel2 = $_POST['ocModel2'];
$ocPrice2 = $_POST['ocPrice2'];
$ocManufacturer3 = $_POST['ocManufacturer3'];
$ocModel3 = $_POST['ocModel3'];
$ocPrice3 = $_POST['ocPrice3'];
$ocPaymentStatus = $_POST['ocPayment'];
$ocDeliveryStatus = $_POST['ocDelivery'];
$ocTotalPrice = $_POST['ocTotalPrice'];

$insertOneResult = $collection->insertOne([
        "InvoiceNo" => "$InvoiceNum",
        "CustomerNo" => "$CustomerNum",
        "TotalPrice" => "$ocTotalPrice",
        "Products" => [
                "0" =>[
                    "Manufacturer" => "$ocManufacturer1",
                    "Model" => "$ocModel1",
                    "Price" => "$ocPrice1"    
                ],
                "1" =>[
                    "Manufacturer" => "$ocManufacturer2",
                    "Model" => "$ocModel2",
                    "Price" => "$ocPrice2"    
                ],
                "2" =>[
                    "Manufacturer" => "$ocManufacturer3",
                    "Model" => "$ocModel3",
                    "Price" => "$ocPrice3"    
                ]
            ],
        "PaymentStatus" => $ocPaymentStatus,
        "DeliveryStatus" => $ocDeliveryStatus
        ]);

printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
var_dump($insertOneResult->getInsertedId());

header("location:./index.php?Create Successful");