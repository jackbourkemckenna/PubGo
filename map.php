<?php

if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}
?>

<link rel="stylesheet" href= "resources/css/style.css">
<script type="text/javascript" src="resources/js/maps.js"></script>>
 <li><a href="#"><strong> <?php echo $userRow['email']; ?></strong></a></li>
  <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
  
  <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
<div id="map"></div>
<div id="details"></div>

<script src="https://maps.googleapis.com/maps/api/js?callback=initMap&amp;libraries=places&amp;key=AIzaSyCEcZ6Xlpi_4jADVSMOIOwdzgoAX8T3qIs" async defer>
 
 
</script>


  
    
    
   
   
   
   