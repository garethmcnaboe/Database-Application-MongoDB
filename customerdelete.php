<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->personalinformation;

echo("delete method called");

$dfirstname = $_POST['dfirstname'];
$dsurname = $_POST['dsurname'];
$dmobile = $_POST['dmobile'];
$demail = $_POST['demail'];

$deleteResult = $collection->deleteOne([
    "First" => "$dfirstname", 
    "Surname" => "$dsurname", 
    "Mobile" => "$dmobile",
    "Email" => "$demail"
]);

printf("Deleted %d document(s)\n", $deleteResult->getDeletedCount());