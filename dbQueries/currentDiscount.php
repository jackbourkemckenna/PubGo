  <?php 
  
  
include 'dbconnect.php';
    $query4 = $DBcon->query("SELECT * FROM pubUsers WHERE pub_id=2");
    $te = $sql->fetch_array();
     echo $te['place_id'];
 