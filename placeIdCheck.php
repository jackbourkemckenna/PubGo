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
     
    if ($userPlaceID['place_id'] == false) {
    ?>
      
      
      
      <?php
      include('map.php');
    } else {
     
     //echo $userPlaceID['place_id'];
     //echo '<br><h1>this will display users profile information!</h1>';
    }
    
    
    

    
?>

 

 

