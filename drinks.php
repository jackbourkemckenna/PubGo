<?php 
    if (isset($_POST['btn-drink'])) {
        
        $drink      = strip_tags($_POST['drink']);
        $price      = strip_tags($_POST['price']);
        
        $drink      = $DBcon->real_escape_string($drink);
        $price      = $DBcon->real_escape_string($price);
        $drink_types = array('Cider', 'Beer', 'Spirit', 'Cocktails');
        $selected_key = $_POST['drink_type'];
        $selected_val = $drink_types[$_POST['drink_type']];
 
        $sql =$DBcon->query("INSERT INTO `drinks`(`name`, `type`, `price`, `pub_id`) VALUES ('$drink', '$selected_val', $price, ".$_SESSION['userSession'].")");

    }
?>
