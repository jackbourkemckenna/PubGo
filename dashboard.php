 <li><a href="#"><strong> <?php echo $userLoggedIn['email']; ?></strong></a></li>


 <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
 
 
 


<?php

session_start();
$_SESSION['place'] = $placeValue;
include_once 'dbconnect.php';
include 'dbQueries/placeId.php';
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}
$query1 = $DBcon->query("SELECT * FROM pubUsers WHERE pub_id=".$_SESSION['userSession']);
$userLoggedIn=$query1->fetch_array();


// linking off to check if the user has his place ID saved to his account. If not will show map.php and let them submit. 
include('placeIdCheck.php');



$test = 'https://maps.googleapis.com/maps/api/place/details/json?placeid='.$userPlaceID['place_id'].'&key=AIzaSyBnqeT9W-h2qeppvw7HSjbVbMWRvAHWEy4';



 

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJCVErT4wOZ0gRTb822t6ZGw4&key=AIzaSyBnqeT9W-h2qeppvw7HSjbVbMWRvAHWEy4",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 5fabb6fd-b95a-36db-8a2f-09de41ae7196"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
//
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $jsonData = json_decode($response);
  for($i=0; $i<sizeof($jsonData->result->address_components); $i++){
   echo $jsonData->result->address_components[$i]->long_name.'<br>';
   echo $jsonData->result->address_components[$i]->short_name.'<br>';
   print_r($jsonData->result->address_components[$i]->types).'<br>';
   echo '<hr>';
  }
  
  foreach($jsonData->result->address_components as $addressComponent) {
   echo $addressComponent->long_name.'<br>';
  }
  
}