<?php
session_start();
include_once 'dbconnect.php';
include 'dbQueries/placeId.php';
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}


session_start();
include_once 'dbconnect.php';
include 'dbQueries/placeId.php';
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}
//Check if the place id is empty or ture 
     
    if ($userPlaceID['place_id'] == false) {
    ?>
      
      
      <!-- Include the map if place id is not set --> 
      <?php
      include('map.php');
    } else {
     
    
     //echo '<br><h1>this will display users profile information!</h1>';
    }
    
    
    

    
?>

 

 

