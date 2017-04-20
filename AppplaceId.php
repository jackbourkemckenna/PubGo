<?php 
		
/*
This will get the id and pub id put it into a json so we can pull it in Volley With android. 
*/
		//connects to DB
		include('dbconnect.php');
		//Query to select the pub info
		$result = $DBcon->query("SELECT * FROM pubUsers");
		//checks if theres any rows
		if ($result->num_rows > 0) {
					 $arr = array();
                        while($row = $result->fetch_assoc()) {
                        array_push($arr,array(
                        	//stores pub id and place id in an array
                        	"pub_id"=>$row['pub_id'],
                        	"place_id"=>$row['place_id'],
						 )
						 );
                        } 
                        } else{
                        	echo "no pubs";
                        }
                        //Stores all arrays into a JSON array
						 echo json_encode(array("arr"=>$arr));
						 mysqli_close($DBcon);
						
	
	?>