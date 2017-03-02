<?php

session_start();
$_SESSION['place'] = $placeValue;
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}
//setting a var to query and telling it to get the username from the database and setting the username to the session 

  
include('placeIdCheck.php');
?>


 <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>