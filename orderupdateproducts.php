<!--Updates the products and cost fields in a document in the order collection-->
<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->phoneorders;

echo("update method called");

$Invoice = $_POST['InvoiceNo3'];
$ouManufacturer1 = $_POST['ouManufacturer1'];
$ouModel1 = $_POST['ouModel1'];
$ouPrice1 = $_POST['ouPrice1'];
$ouManufacturer2 = $_POST['ouManufacturer2'];
$ouModel2 = $_POST['ouModel2'];
$ouPrice2 = $_POST['ouPrice2'];
$ouManufacturer3 = $_POST['ouManufacturer3'];
$ouModel3 = $_POST['ouModel3'];
$ouPrice3 = $_POST['ouPrice3'];
$ouTotalPrice = $_POST['ouTotalPrice'];

$updateResult = $collection->updateOne(
        ["InvoiceNo" => "$Invoice"],
        ['$set' => [
            "Products" => [
                "0" =>[
                    "Manufacturer" => "$ouManufacturer1",
                    "Model" => "$ouModel1",
                    "Price" => "$ouPrice1"    
                ],
                "1" =>[
                    "Manufacturer" => "$ouManufacturer2",
                    "Model" => "$ouModel2",
                    "Price" => "$ouPrice2"    
                ],
                "2" =>[
                    "Manufacturer" => "$ouManufacturer3",
                    "Model" => "$ouModel3",
                    "Price" => "$ouPrice3"    
                ]
        ],
            "TotalPrice" => "$ouTotalPrice"
        ]]);

printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
printf("Modified %d document(s)\n", $updateResult->getModifiedCount());

header("location:./index.php?Update Successful");