<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

//Make a call to the database to find out what was the last Invoice Number used
$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->counters;

$lastCustomerNum = 0; 
$ReferenceNum = 123;

$cursor = $collection->find([
    "ReferenceNum" => $ReferenceNum
]);

foreach($cursor as $document){
        $lastCustomerNum = $document['LastCustomerNum'];
        echo "for ", $document['LastCustomerNum'];
}

//Increment the last invoice number
$CustomerNum = $lastCustomerNum + 1;

//Update the last Invoice Number counter in the database
$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->counters;

$updateResult = $collection->updateOne(
    ["ReferenceNum" => $ReferenceNum],
    ['$set' => [
        "LastCustomerNum" => "$CustomerNum"
    ]]);


//Create the new entry
$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->personalinformation;

//if else statements to decide whether to use one of the set titles or one specified by the user
$value1 = $_POST['selectTitle'];
if($value1 == "0" || $value1 == 0){
$title = $_POST['otherTitle'];
}
else{
$title = $_POST['selectTitle'];
}

//calling other inputs from the form.
$personFirstName = $_POST['personFirstName'];
$personSurname = $_POST['personSurname'];
$personMobile = $_POST['personMobile'];
$personEmail = $_POST['personEmail'];

$homeAddress1 = $_POST['homeAddress1'];
$homeAddress2 = $_POST['homeAddress2'];
$homeAddressTown = $_POST['homeAddressTown'];
$homeAddressCountyorCity = $_POST['homeAddressCountyorCity'];
$homeAddressEircode = $_POST['homeAddressEircode'];

//if else statement to decide whether to reuse the home address for deliveries
if(isset($_POST['checkbox'])){
    $shipAddress1 = $_POST['homeAddress1'];
    $shipAddress2 = $_POST['homeAddress2'];
    $shipAddressTown = $_POST['homeAddressTown'];
    $shipAddressCountyorCity = $_POST['homeAddressCountyorCity'];
    $shipAddressEircode = $_POST['homeAddressEircode'];
}
else{
    $shipAddress1 = $_POST['shipAddress1'];
    $shipAddress2 = $_POST['shipAddress2'];
    $shipAddressTown = $_POST['shipAddressTown'];
    $shipAddressCountyorCity = $_POST['shipAddressCountyorCity'];
    $shipAddressEircode = $_POST['shipAddressEircode']; 
}

$insertOneResult = $collection->insertOne([
    "CustomerNo" => "$CustomerNum",
    "Title" => $title,
    "First" => $personFirstName,
    "Surname" => $personSurname,
    "Mobile" => $personMobile,
    "Email" => $personEmail,
    "HAdd1" => $homeAddress1,
    "HAdd2" => $homeAddress2,
    "HTown" => $homeAddressCountyorCity,
    "HCountyorCity" => $homeAddressCountyorCity,
    "HEircode" => $homeAddressEircode,
    "SAdd1" => $shipAddress1,
    "SAdd2" => $shipAddress2,
    "STown" => $shipAddressTown,
    "SCountyorCity" => $shipAddressCountyorCity,
    "SEircode" => $shipAddressEircode
]);

printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
var_dump($insertOneResult->getInsertedId());


//header("location:./index.php?Stock Insert Successful");
