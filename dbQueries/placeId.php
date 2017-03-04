<?php
        //gets the place id from the db
    include_once('dbconnect.php');

    $sql = $DBcon->query("SELECT * FROM `pubUsers` WHERE pub_id =".$_SESSION['userSession']);
    
    $userPlaceID=$sql->fetch_array();



?>