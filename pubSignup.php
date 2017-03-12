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
 
 


require('loginSession.php');
if (isset($_POST['btn-signup'])) {
 
 $email = strip_tags($_POST['email']);
 $password = strip_tags($_POST['password']);
 
 $email = $DBcon->real_escape_string($email);
 $password = $DBcon->real_escape_string($password);
 
 $query = $DBcon->query("SELECT pub_id, email, password FROM pubUsers WHERE email='$email'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; // if email/password are correct returns must be 1 row
 
 if (password_verify($password, $row['password']) && $count==1) {
  $_SESSION['userSession'] = $row['pub_id'];
  header("Location: dashboard.php");
 } else {
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    </div>";
 }
 $DBcon->close();
}

 

}


?>


