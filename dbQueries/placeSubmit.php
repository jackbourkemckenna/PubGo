<?php
include_once('dbconnect.php');
    $submit = $DBcon->query("update pubUsers set place_id ='$placeValue' where pub_id=".$_SESSION['userSession']);
    $placeId = $sql->fetch_array();
    
    
    ?>