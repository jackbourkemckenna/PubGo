<?php 

	/*if($_SERVER['REQUEST_METHOD']=='GET'){*/
		
/*
This will get the id and pub id put it into a json so we can pull it in Volley With android. 
*/
		//connects to DB
		include('dbconnect.php');
		//Query to select the pub info
		$result1 = $DBcon->query("SELECT * FROM drinks");
		//checks if theres any rows
		if ($result1->num_rows > 0) {
                    //storing place id's in array
					 $arr1 = array();
                        while($row1 = $result1->fetch_assoc()) {
                        array_push($arr1,array(
                        	//stores pub id and place id in an array
                        	"pub_id"=>$row1['pub_id'],
                        	"drinks_id"=>$row1['drink_id'],
                        	"drinks_name"=>$row1['name'],
                        	"drink_price"=>$row1['price']
						 )
						 );
                        } 
                        } else{
                        	echo "no drinks";
                        }
                        //Stores all arrays into a JSON array
						 echo json_encode(array("arr1"=>$arr1));
						 mysqli_close($DBcon);
	/*}*/
	
	?>