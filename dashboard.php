<html>
    <head>
   

   <?php
   include('SessionNavigationBar.php');
   ?>
   
       
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
   <body>
   
   <?php
      session_start();
      $_SESSION['place'] = $placeValue;
      include_once 'dbconnect.php';
      include 'dbQueries/placeId.php';
      include 'dbQueries/discountSubmit.php';
      include 'drinks.php';
      include 'dbQueries/discount.php';
      if (!isset($_SESSION['userSession'])) {
       header("Location: index.php");
      }
      $query1 = $DBcon->query("SELECT * FROM pubUsers WHERE pub_id=".$_SESSION['userSession']);

      $userLoggedIn=$query1->fetch_array();
      
    ?>     
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
       
        
      
         
        //Storing all of the images from googles JSON file into an array
          foreach($jsonData->result->photos as $key=>$images) {
              $output = $images->photo_reference;
                 $imageArray[$key] = '<img src=https://maps.googleapis.com/maps/api/place/photo?photoreference='.$output.'&sensor=false&maxheight=600&maxwidth=600&key=AIzaSyBnqeT9W-h2qeppvw7HSjbVbMWRvAHWEy4>';
          } 
          
         
        }
          
          
      ?>
    
   
	<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 pub-title">
    	<h1>
           <?php
            
            //Displays the pub name
            $result = $DBcon->query("SELECT pub_name from pubUsers where pub_id =".$_SESSION['userSession'].";");
                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo $row["pub_name"]."<br>";
                    }
                } else {
                echo "no pub name";
            }
            ?>
        </h1>
    
    </div>
    <div class="col-md-3"></div>
    </div>
   
        <!--Images Carousel-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="one-time">
                    <div style="height: 600px;">
                        <?php  echo $imageArray[0]; ?>
                    </div>
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
                </div>
            </div>

            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
            <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script type="text/javascript" src="/resources/js/slick.js"></script>
            <script type="text/javascript">
            //Slick theme settings
                $('.one-time').slick({
                  dots: false ,
                  infinite: true,
                  speed: 300,
                  slidesToShow: 1,
                  adaptiveHeight: true,
                 
                });
                
                 
            </script>
            <div class="col-md-3"></div>
        </div>
        
        <!--Pub Info from Google JSON File-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <?php
                echo $jsonData->result->weekday_text;
                
                echo $jsonData->result->adr_address.'<br><br>';
                
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
        <div class="col-md-4 blackBackground">
            <!--Discount Code Form-->
            <h1 id="disocuntHeader">Enter a discount code for users to use in your pub</h1>
            <br>
            <form class="form-discount" method="post" id="discount-form">
                <div class="form-group">
                    <label for="discount">Discount Code</label>
                    <input id="discount" type="text" class="form-control" name="discount" minlength="4" maxlength="10" required  />
                </div>
                <br>
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <button id="submit" type="submit" class="btn btn-primary" name="btn-discount">
                    <span class="glyphicon glyphicon-plus"></span> Add Code
                    </button> 
                </div>
                <div class="col-md-4"></div>
           </form><br><br><br><h3>current discount running </h3><h4><?php include 'dbQueries/currentDiscount.php';?></h4>
       </div>
       <div class="col-md-2"></div>
       <div class="col-md-4 blackBackground">
           <!--Drinks List Form-->
           <h1>Enter the drinks you sell</h1>
           <br>
           <form id = "drinks" action="dashboard.php" class = "chatform" method="POST">
              <div class="form-group" id="drink">
                 <label for="drink">Drink</label>
                 <input type="text" class="form-control" id="drink" name="drink" placeholder="Eg: Bulmers">
              </div>
              <div class="form-group" id="price">
                 <label for="price">Price</label>
                 <input type="text" class="form-control" id="price" name="price" placeholder="Eg: 5.95">
              </div>
              <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4" id="drinkType">
                 <label for="drinkType">Drink Type</label>
                 <select id="drink_type" name="drink_type">
                     <option value="0">Cider</option>
                     <option value="1">Beer</option>
                     <option value="2">Spirit</option>
                     <option value="3">Cocktails</option>
                 </select>
              </div>
              <div class="col-md-4"></div>
              </div>
              <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-3">
                      <button class="btn btn-primary" id ="btn-drink" name ="btn-drink">Send</button>
                  </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-3">
                      <a href="drinkView.php">Edit Drinks Here <span class="glyphicon glyphicon-arrow-right"></span></a>
                  </div>
                  <div class="col-md-2"></div>
              </div>
           </form>
           
       </div>
       <div class="col-md-1"></div>
   </div>
</body>
   
</html>