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
    $sql = "SELECT * FROM `pubUsers` WHERE pub_id =".$_SESSION['userSession'];
    $result = $conn->query($sql);
    $id=$result->fetch_array();
    
    if ($id['place_id'] == false) {
    
        include('map.php');
        
       
    
         
        }
        
        
    
    else {
     echo "success";
     echo $id['pub_id'];
     include('test.php');
    }
    


  
   
    $conn->close();
    
?>
<li><a href="#"><strong> <?php echo $userRow['email']; ?></strong></a></li>
 <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
 

 

