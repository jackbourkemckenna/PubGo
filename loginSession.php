<?php
session_start();
require_once 'dbconnect.php';
if (isset($_SESSION['userSession'])!="") {
 header("Location: home.php");
 exit;
}
?>