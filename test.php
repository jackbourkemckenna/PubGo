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
  
//update users set username='JACK' and password='123' WHERE id='1';

?>
<!--<li><a href="#"><strong> <?php echo $userRow['email']; ?></strong></a></li>-->

<li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
<div id = "result"></div>
<input pattern=".{3,}"   required title="3 characters minimum">