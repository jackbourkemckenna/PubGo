<?php 
session_start();
include_once('dbQueries/placeId.php');
$placeValue = $_GET['place'];
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}




    
    if($sql){
       header("Location: https://pubgo-jackbourkemckenna.c9users.io/dashboard.php");
        
        
    }
    else{
        
        echo 'error found while submiting to database';
        
    }
    

?>
