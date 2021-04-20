<?php

require_once __DIR__ . "/vendor/autoload.php";
include_once "./dbconfig-atlasmongo.php";

$client = new MongoDB\Client($url);

$db = $client->cs230assignment5;

$collection = $db->personalinformation;

echo("update method called");

//If else statement to determine whether to take specified other title or one provided
$value1 = $_POST['uselectTitle'];
if($value1 == "0" || $value1 == 0){
$title = $_POST['uotherTitle'];
}
else{
$title = $_POST['uselectTitle'];
}

$personMobile = $_POST['upersonMobile'];
$personEmail = $_POST['upersonEmail'];

$homeAddress1 = $_POST['uhomeAddress1'];
$homeAddress2 = $_POST['uhomeAddress2'];
$homeAddressTown = $_POST['uhomeAddressTown'];
$homeAddressCountyorCity = $_POST['uhomeAddressCountyorCity'];
$homeAddressEircode = $_POST['uhomeAddressEircode'];

//if else statement to determine whether to reuse the home address for delivery
if(isset($_POST['ucheckbox'])){
    $shipAddress1 = $_POST['uhomeAddress1'];
    $shipAddress2 = $_POST['uhomeAddress2'];
    $shipAddressTown = $_POST['uhomeAddressTown'];
    $shipAddressCountyorCity = $_POST['uhomeAddressCountyorCity'];
    $shipAddressEircode = $_POST['uhomeAddressEircode'];
}
else{
    $shipAddress1 = $_POST['ushipAddress1'];
    $shipAddress2 = $_POST['ushipAddress2'];
    $shipAddressTown = $_POST['ushipAddressTown'];
    $shipAddressCountyorCity = $_POST['ushipAddressCountyorCity'];
    $shipAddressEircode = $_POST['ushipAddressEircode'];
}

//calling search terms from the form.
$SearchTerm1 = $_POST['uSearchTerm1'];
$SearchTerm2 = $_POST['uSearchTerm2'];
$SearchTerm3 = $_POST['uSearchTerm3'];

$updateResult = $collection->updateOne(
    [
    "First" => "$SearchTerm1", 
    "Surname" => "$SearchTerm2",
    "Email" => $SearchTerm3
    ],
    ['$set' => [
        "Title" => $title,
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
    ]]);

printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
printf("Modified %d document(s)\n", $updateResult->getModifiedCount());