<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
 header("Location: home.php");
}
require_once 'dbconnect.php';
if(isset($_POST['btn-signup'])) {
 
 $fname = strip_tags($_POST['f_name']);
 $lname = strip_tags($_POST['l_name']);
 $email = strip_tags($_POST['email']);
 $upass = strip_tags($_POST['password']);

 
 $fname = $DBcon->real_escape_string($fname);
 $lname = $DBcon->real_escape_string($lname);
 $email = $DBcon->real_escape_string($email);
 $upass = $DBcon->real_escape_string($upass);

 
 
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $DBcon->query("SELECT email FROM users WHERE email='$email'");
 $count=$check_email->num_rows;
 
 if ($count==0) {
  
  $query = "INSERT INTO users(f_name,l_name,email,password) VALUES('$fname','$lname','$email','$hashed_password')";
  if ($DBcon->query($query)) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
  }
  
 } else {
  
  
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
    </div>";
   
 }
 
 $DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
  <link rel="stylesheet" href="particleground/source/css/style.css" />
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <script type='text/javascript' src='particleground/jquery.particleground.js'></script>
  <script type='text/javascript' src='particleground/source/js/particleConfig.js'></script>
</head>

</head>
<body>
  <div id="particles">
  <div id="intro">
    <h1 class  = "formText">Sign up form</h1>
<div class="signin-form">

 <div class="container">
     
        
       <form class="form-signin" method="post" id="register-form">
      
  
        
        <?php
  if (isset($msg)) {
   echo $msg;
  }
  ?>
          
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
        <input type="password" class="form-control" placeholder="Password" name="password" required  />
        </div>
        <div class = "form-group">
             <label><input type="checkbox" value="18" required> I am 18 and over </input></label>
            </div>
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-signup">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
   </button> 
            <a href="index.php" class="btn btn-default">Log In Here</a>
        </div> 
      
      </form>

    </div>
    
</div>
    </div>
  </div>

</body>
</html>