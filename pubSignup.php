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
 $pname = strip_tags($_POST['pub_name']);
 $powner = strip_tags($_POST['pub_owner']);
 
 $fname = $DBcon->real_escape_string($fname);
 $lname = $DBcon->real_escape_string($lname);
 $email = $DBcon->real_escape_string($email);
 $upass = $DBcon->real_escape_string($upass);
 $pname = $DBcon->real_escape_string($pname);
 $powner= $DBcon->real_escape_string($powner);
 
 
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $DBcon->query("SELECT email FROM pubUsers WHERE email='$email'");
 $count=$check_email->num_rows;
 
 if ($count==0) {
  
  $query = "INSERT INTO pubUsers(f_name,l_name,email,password,pub_name,pub_owner) VALUES('$fname','$lname','$email','$hashed_password','$pname','$powner')";
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


