
   <a href="#"><strong> <?php echo $userLoggedIn['email']; ?></strong></a>

   <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
   <li><a href="account.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Account</a></li>
   <head>
       
      <!--Style CSS Link-->
         <link rel="stylesheet" type="text/css" href="resources/css/style.css"/>
      <!-- Slick image galery -->
        <link rel="stylesheet" type="text/css" href="/resources/css/slick.css"/>
        <link rel="stylesheet/less" type="text/css" href="/resources/css/slick-theme.less"/>
  
      <!--Bootstrap-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <script
         src="https://code.jquery.com/jquery-3.1.1.min.js"
         integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
         crossorigin="anonymous">
      </script>
   </head>
   
   
   <?php
      session_start();
      $_SESSION['place'] = $placeValue;
      include_once 'dbconnect.php';
      include 'dbQueries/placeId.php';
      include 'dbQueries/discountSubmit.php';
      include 'dbQueries/currentDiscount.php';
      include 'drinks.php';
      include 'dbQueries/discount.php';
      if (!isset($_SESSION['userSession'])) {
       header("Location: index.php");
      }
      $query1 = $DBcon->query("SELECT * FROM pubUsers WHERE pub_id=".$_SESSION['userSession']);

      $userLoggedIn=$query1->fetch_array();
      
    ?>     <h3>current discount running <?php  echo $rDiscount1['dbconnect']; ?> </h3>
    <?php
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
      
         /
        
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
      ?>
   <!--
      <div class="col-md-4"></div>
      <div class="col-md-4">
      <img src="https://maps.googleapis.com/maps/api/place/photo?photoreference=<?php echo $output; ?>&sensor=false&maxheight=600&maxwidth=600&key=AIzaSyBnqeT9W-h2qeppvw7HSjbVbMWRvAHWEy4"></img>
      </div>
	-->
	<h1>
       <?php
       //get pub name from pubUsers table
       ?>
   </h1>
        <!--Images Carousel-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="one-time">
                    <div style="height: 600px;">
                        <?php  echo $imageArray[1]; ?>
                    </div>
                    <div style="height: 600px;">
                        <?php  echo $imageArray[2]; ?>
                    </div>
                    <div style="height: 600px;">
                        <?php  echo $imageArray[3]; ?>
                    </div>
                    <div style="height: 600px;">
                        <?php  echo $imageArray[4]; ?>
                    </div>
                    <div style="height: 600px;">
                        <?php  echo $imageArray[5]; ?>
                    </div>
                    <div style="height: 600px;">
                        <?php  echo $imageArray[6]; ?>
                    </div>
                    <div style="height: 600px;">
                        <?php  echo $imageArray[7]; ?>
                    </div>
                    <div style="height: 600px;">
                        <?php  echo $imageArray[8]; ?>
                    </div>
                    <div style="height: 600px;">
                        <?php  echo $imageArray[9]; ?>
                    </div>
                    <div style="height: 600px;">
                        <?php  echo $imageArray[10]; ?>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
            <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script type="text/javascript" src="/resources/js/slick.js"></script>
            <script type="text/javascript">
                $('.one-time').slick({
                  dots: true,
                  infinite: true,
                  speed: 300,
                  slidesToShow: 1,
                  adaptiveHeight: true
                });
            </script>
            <div class="col-md-3"></div>
        </div>
        
        <!--Pub Info from Google JSON File-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php
                echo $jsonData->result->weekday_text;
                
                echo $jsonData->result->adr_address.'<br>';
                
                foreach($jsonData->result->opening_hours->weekday_text as $open){
                    echo $open;
                    echo '<br>';
                    
                }
                ?>
            </div>
            <div class="col-md-3"></div>
        </div>
        <br>
        <br>
    <div class="row footer">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <!--Discount Code Form-->
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
           </form>
       </div>
       <div class="col-md-2"></div>
       <div class="col-md-4">
           <!--Drinks List JSON File-->
           <h1>Enter the drinks you sell</h1>
           <form id = "drinks" action="dashboard.php" class = "chatform" method="POST">
              <div class="form-group" id="drink">
                 <label for="drink">Drink</label>
                 <input type="text" class="form-control" id="drink" name="drink" placeholder="Eg: Bulmers">
              </div>
              <div class="form-group" id="price">
                 <label for="price">Price</label>
                 <input type="text" class="form-control" id="price" name="price" placeholder="Eg: 5.95">
              </div>
              <div class="form-group" id="drinkType">
                 <label for="drinkType">Drink Type</label>
                <!-- <input type="text" class="form-control" id="drinkType" name="drinkType" placeholder="Eg: Cider">-->
                 <select id="drink_type" name="drink_type">
                     <option value="0">Cider</option>
                     <option value="1">Beer</option>
                     <option value="2">Spirit</option>
                     <option value="3">Cocktails</option>
                 </select>
              </div>
              <button class="btn btn-primary" id ="btn-drink" name ="btn-drink">Send</button>
           </form>
       </div>
       <div class="col-md-1"></div>
   </div>
   
</html>