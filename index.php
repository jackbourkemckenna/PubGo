<!DOCTYPE html>
<html>
    <head>
<?php
include('header.php');
include('loginSession.php');



?>
 <script>
    function check_pass(){
        //document.getElementById('password_match_error').style.display = 'unset'; -- to get the error box to dissapear at the start using onload features which were removed below 
        var password = document.getElementById("sign_up_password1").value;
        var password2 = document.getElementById("sign_up_password2").value;
        console.log("password: "+password);
        console.log("password2: "+password2);
        
    if (password == password2){
   
        //var msg = "<div class='alert alert-success'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !</div>";
        document.getElementById('submit').disabled = false;
        //console.log("matched");
        document.getElementById('password_match_error').style.display = 'none';
 
}
    else {
    
        //var msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !</div>"
        document.getElementById('submit').disabled = true;
        document.getElementById('password_match_error').style.display = 'unset';
        //console.log("not-matched");
    }
    
}
    </script>
    
    </head>
    
    <body onload="check_pass()">

  <div class="container">
  <div class="jumbotron">
    <h1>PubGo on Android</h1>      
    <p>PubGo is an application which allows people to view information about pubs and bars in their area and see current promotions that they are having</p>
    <button type="button" class="btn btn-default">Download</button>
    
    


</div>

<div class="row">

     <h1>Sign in here</h1>
   
    <div class="col-md-4">
      
         <form class="form-signin" method="post" id="login-form">
      
     
        
       <?php
  if(isset($msg)){
   echo $msg;
  }
  ?>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="email" required />
        <span id="check-e"></span>
        </div>

        <div class="form-group">
        <input id="sing_in_password" type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
              <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
            </button> 
  
            <a href="register.php" class="btn btn-default">Sign Up Here</a>
            
        </div>  
        
        
      
      </form>

      
      
      
      
    </div>
    

</div>
 <form class="form-signin" method="post" id="register-form">
      
  
        
<?php
  if (isset($msg)) {
   echo $msg;
  }
?>

  <h>
          
        <div class="form-group">
        <input type="text" class="form-control" placeholder="First Name" name="f_name" required  />
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Last Name" name="l_name" required  />
        </div>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="email" required  />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input id="sign_up_password1" type="password" onchange="check_pass()" class="form-control" placeholder="Password" name="password" minlength="6" required  />
        </div>
        
        <div class="form-group">
        <input id="sign_up_password2" type="password" onchange="check_pass()" class="form-control" placeholder="Confirm Password" name="password2" minlength="6" required  />
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Pub Name" name="pub_name" required  />
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Pub owner Name" name="pub_owner" required  />
        </div>


      <hr />
        <div id="password_match_error">
            <!--<p>Your passwords do not match</p>-->
            <div class='alert alert-danger'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; <strong>Passwords</strong> do not match
             </div>
        </div>
        <div class="form-group">
            <button id="submit" type="submit" class="btn btn-default" name="btn-signup">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
           </button> 
            <a href="index.php" class="btn btn-default">Log In Here</a>
        </div> 
        
      
      </form>

    </div>
    
</div>
    </div>
  </div>
  </div>
  </div>
  
  </body>

</html>


