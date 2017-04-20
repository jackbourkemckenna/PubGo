  <?php 
  
  
include 'dbconnect.php';
$result = $DBcon->query("SELECT discount from pubUsers where pub_id =".$_SESSION['userSession'].";");
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["discount"]."<br>";
            }
        
    } else {
        echo "no current discount code";
        } 
    ?> 
 