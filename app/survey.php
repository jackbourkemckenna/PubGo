<?php
   $con = mysqli_connect("localhost", "root", "", "pubgo");
    
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $drinkP = $_POST["drinkP"];
    $statement = mysqli_prepare($con, "INSERT INTO survey (gender, age, drinkP) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($statement, "sis", $gender, $age, $drinkP);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>