<?php
session_start();
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}
$query = $DBcon->query("SELECT * FROM pubUsers WHERE pub_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pubgo";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT place_id FROM `pubUsers` WHERE pub_id =".$_SESSION['userSession'];
    $result = $conn->query($sql);
    $id=$result->fetch_array();
     
    if(empty($id['place_id'])){
    
        include('map.php');
        
       
    
         
        }
        
        
    
    else {
    echo 'This is just a test';
    }
    


  
   
    $conn->close();
    
?>

 

 

