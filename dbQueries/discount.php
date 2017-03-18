<?php
    include_once('dbconnect.php');

    $sql = $DBcon->query("SELECT discount FROM `pubUsers` WHERE pub_id =".$_SESSION['userSession']);
    
    $userDiscount=$sql->fetch_array();




?>