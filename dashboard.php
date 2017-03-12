 
 
 <a href="#"><strong> <?php echo $userLoggedIn['email']; ?></strong></a>

 <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
 
<html>
<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
</html>

<?php

session_start();
$_SESSION['place'] = $placeValue;
include_once 'dbconnect.php';
include 'dbQueries/placeId.php';
include 'dbQueries/discountSubmit.php';
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
  CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/details/json?placeid=".$userPlaceID['place_id']."&key=AIzaSyBnqeT9W-h2qeppvw7HSjbVbMWRvAHWEy4",
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
 /* for($i=0; $i<sizeof($jsonData->result->address_components); $i++){
   echo $jsonData->result->address_components[$i]->long_name.'<br>';
   echo $jsonData->result->address_components[$i]->short_name.'<br>';
   print_r($jsonData->result->address_components[$i]->types).'<br>';
   echo '<hr>';
  }
  */

    foreach($jsonData->result->address_components as $addressComponent) {
        echo $addressComponent->long_name.'<br>';
    }
  
    foreach($jsonData->result->photos as $key=>$images) {
        $output = $images->photo_reference;
        $imageArray[$key] = '<img src=https://maps.googleapis.com/maps/api/place/photo?photoreference='.$output.'&sensor=false&maxheight=600&maxwidth=600&key=AIzaSyBnqeT9W-h2qeppvw7HSjbVbMWRvAHWEy4>'; 
    
        
        
    }
    
    
    
    /*for($i=0; $i<sizeof($jsonData->result->photos); $i++){
     //for($j = 0; $j<sizeof($jsonData->result->photos);$j++){
     $output =  $jsonData->result->photos->photo_reference;
     //$jsonData->photo_reference;
     $imageArray[$i] = '<img src=https://maps.googleapis.com/maps/api/place/photo?photoreference='.$output.'&sensor=false&maxheight=600&maxwidth=600&key=AIzaSyBnqeT9W-h2qeppvw7HSjbVbMWRvAHWEy4>';
     //echo $imageArray[$j];
     echo $imageArray[$i];
     
    //}
    */
     
   //echo $jsonData->result->address_components[$i]->long_name.'<br>';
   //echo $jsonData->result->address_components[$i]->short_name.'<br>';
   //print_r($jsonData->result->address_components[$i]->types).'<br>';
   //echo '<hr>';
  }
    
    /*
    echo $imageArray[1];
    echo $imageArray[2];
    echo $imageArray[3];
    echo $imageArray[4];
    echo $imageArray[5];
    echo $imageArray[6];
    echo $imageArray[7];
    echo $imageArray[8];
    echo $imageArray[9];
    echo $imageArray[10];
    */
    
    echo $jsonData->result->weekday_text;
  
  echo $jsonData->result->adr_address.'<br>';
  
   foreach($jsonData->result->opening_hours->weekday_text as $open){
       echo $open;
   }
 
 
 

  




?>




<!--
<div class="col-md-4"></div>
<div class="col-md-4">
<img src="https://maps.googleapis.com/maps/api/place/photo?photoreference=<?php echo $output; ?>&sensor=false&maxheight=600&maxwidth=600&key=AIzaSyBnqeT9W-h2qeppvw7HSjbVbMWRvAHWEy4"></img>
</div>
<div class="col-md-4"></div>-->
 
 
 <div class="container">

<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <?php  echo $imageArray[1]; ?>
  </a>
  </div>
  
    <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <?php echo $imageArray[2]; ?>
    </a>
  </div>
  
    <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <?php echo $imageArray[3];?>
    </a>
  </div>
  
    <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <?php echo $imageArray[4]; ?> 
      
      </a>
  </div>
  
  
</div>

<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <?php echo $imageArray[5]; ?>
    </a>
  </div>
  
    <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <?php echo $imageArray[6];?>
    </a>
  </div>
  
    <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
     <?php echo $imageArray[7];?>
    </a>
  </div>
  
    <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <?php echo $imageArray[8];?>
    </a>
  </div>
  
</div>

<div class="row">
 
  
    <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
     <?php echo $imageArray[9];?>
    </a>
  </div>
  
    <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <?php echo $imageArray[10];?>
    </a>
  </div>
  
</div>
</div>
<?php 
  

?>
<h1>Enter a discount code for users to use in your pub</h1>
<form class="form-discount" method="post" id="discount-form">
 <div class="form-group">
        <input id="discount" type="text" class="form-control" name="discount" minlength="4" maxlength="10" required  />
        </div>
                <div class="form-group">
            <button id="submit" type="submit" class="btn btn-default" name="btn-discount">
                <span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span> submit
           </button> 
        </div>
        </form

