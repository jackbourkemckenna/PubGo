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



echo 'https://maps.googleapis.com/maps/api/place/details/json?placeid='.$userPlaceID['place_id'].'&key=AIzaSyBnqeT9W-h2qeppvw7HSjbVbMWRvAHWEy4';
echo $placeValue;

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
    "postman-token: 84c9fde4-0b77-279c-6248-3a76602a7dc2"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>

 
 
