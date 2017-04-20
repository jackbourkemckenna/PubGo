<?php
session_start();
require_once 'dbconnect.php';
//checks to see if the user is logged in
if (isset($_SESSION['userSession'])!="") {
 //if so redirects to dashboard.php
 header("Location: dashboard.php");
 exit;
}
?>