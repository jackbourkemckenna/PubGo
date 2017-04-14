<?php 

	/*if($_SERVER['REQUEST_METHOD']=='GET'){*/
		

		
		include('dbconnect.php');
		
		$result = $DBcon->query("SELECT * FROM pubUsers");
		
		if ($result->num_rows > 0) {
                    //storing place id's in array
					 $arr = array();
                        while($row = $result->fetch_assoc()) {
                        array_push($arr,array(
						 $row['pub_id']=>$row['place_id'],
						 )
						 );
                        } 
                        } else{
                        	echo "no lol";
                        }
						 echo json_encode(array("arr"=>$arr));
						 mysqli_close($DBcon);
	/*}*/
	
	?>