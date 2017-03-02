<?php 
session_start();
$placeValue = $_GET['place'];
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pubgo";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "update pubUsers set place_id ='$placeValue' where pub_id=".$_SESSION['userSession'];
    $result = $conn->query($sql);
    
    
    if($sql){
        echo 'test';
        
        
    }
    else{
        
        echo 'nope';
        
    }
    

?>
