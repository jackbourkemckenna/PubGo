<?php
   if (!isset($_SESSION['userSession'])) {
    header("Location: index.php");
   }
   ?>
<link rel="stylesheet" href= "resources/css/style.css">
<script type="text/javascript" src="resources/js/maps.js"></script>
  
  <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
<div id="map"></div>
<div id="details"></div>
<!--Linking to google maps with our API key -->
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap&amp;libraries=places&amp;key=AIzaSyCEcZ6Xlpi_4jADVSMOIOwdzgoAX8T3qIs" async defer>
 
 
</script>