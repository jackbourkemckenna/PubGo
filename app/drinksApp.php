<?php
    include("dbconnect.php");
    $pub_id = $_POST["pub_id"];
    
     $result = $DBcon->query("SELECT * FROM drinks WHERE pub_id=".$pubID);
    
    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                        $name  = $row["name"];
                        $price = $row["price"];
                        $type  = $row["type"];
                        $drink_id=$row["drink_id"];
                        }
                    } else {
                    $response = "no drinks added yet";
                }
?>