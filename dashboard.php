<?php

session_start();
$_SESSION['place'] = $placeValue;
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}
//setting a var to query and telling it to get the username from the database and setting the username to the session 
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
    if ($result->num_rows > '') {
        ?>
        
        <link rel="stylesheet" href= "resources/css/style.css">
<script type="text/javascript" src="resources/js/maps.js"></script>>
 <li><a href="#"><strong> <?php echo $userRow['email']; ?></strong></a></li>
  <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
  
  <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
<div id="map"></div>
<div id="details"></div>

<script src="https://maps.googleapis.com/maps/api/js?callback=initMap&amp;libraries=places&amp;key=AIzaSyCEcZ6Xlpi_4jADVSMOIOwdzgoAX8T3qIs" async defer></script>


        <?php
        echo "null";
        
    } else {
     
     while ($row = $result->fetch_assoc()) {
            echo "place_id: " . $row["place_id"] ;
        
    }
    }
    
    
    $conn->close();
?>


 <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>