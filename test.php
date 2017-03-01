<?php 
session_start();
include('dbconnect.php');
$placeValue = $_GET['place'];

echo "Your registration is: ".$placeValue."..........      ";
$placeId = $placeValue; 
echo 'hello'.$placeId;

$query = "INSERT INTO pubUsers(place_id) VALUE('$placeId')";


?>


<div id = "result"></div>
