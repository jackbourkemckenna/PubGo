 <li><a href="#"><strong> <?php echo $userLoggedIn['email']; ?></strong></a></li>


 <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
 
 
 


<?php

session_start();
$_SESSION['place'] = $placeValue;
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}
$query1 = $DBcon->query("SELECT * FROM pubUsers WHERE pub_id=".$_SESSION['userSession']);
$userLoggedIn=$query1->fetch_array();


// linking off to check if the user has his place ID saved to his account. If not will show map.php and let them submit. 
include('placeIdCheck.php');


?>

 
 
 <?php  
 
 $query1->close();
 
 
 ?>