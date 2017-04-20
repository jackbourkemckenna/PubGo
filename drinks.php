<?php 
    if (isset($_POST['btn-drink'])) {
        //pulls info needed from form
        $drink      = strip_tags($_POST['drink']);
        $price      = strip_tags($_POST['price']);
        //for security purposes to prevent sql injection
        $drink      = $DBcon->real_escape_string($drink);
        $price      = $DBcon->real_escape_string($price);
        //gets selected option from dropdown
        $drink_types = array('Cider', 'Beer', 'Spirit', 'Cocktails');
        $selected_key = $_POST['drink_type'];
        $selected_val = $drink_types[$_POST['drink_type']];
        //stores drink in DB
        $sql =$DBcon->query("INSERT INTO `drinks`(`name`, `type`, `price`, `pub_id`) VALUES ('$drink', '$selected_val', $price, ".$_SESSION['userSession'].")");

    }
?>
