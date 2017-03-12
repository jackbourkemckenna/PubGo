<?php
include_once('dbconnect.php');
if (isset($_POST['btn-discount'])) {
 $discount= strip_tags($_POST['discount']);
    $discount = $DBcon->real_escape_string($discount);
 
$sqlDiscount =$DBcon->query("update pubUsers set discount ='$discount' where pub_id=".$_SESSION['userSession']);

}
?>