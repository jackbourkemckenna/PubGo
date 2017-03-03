<?php
session_start();
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}


    $sql = $DBcon->query("SELECT * FROM `pubUsers` WHERE pub_id =".$_SESSION['userSession']);
    
    $userPlaceID=$sql->fetch_array();
     
    if ($userPlaceID['place_id'] == false) {
    ?><h1>Search for your pub/rastraunt</h1>
      <?php
      include('map.php');
    } else {
     
     echo $userPlaceID['place_id'];
     echo '<br><h1>this will display users profile information!</h1>';
    }
    
    
    



    
?>

 

 

