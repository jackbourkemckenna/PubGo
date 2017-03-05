<?php

include('signin.php');
include('dbconnect.php');
include('pubSignup.php');

?>
<!--  Nav bar and scripts-->
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to pubGo</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href= "resources/css/style.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- JQuery CDN Link-->
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous">
</script>

</head>

<body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>    
                <a class="navbar-brand" href="index.php">PubGo</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about.php">About</a></li>
                    <li><a href="#contact">Help</a></li>
                    <li>
                        <form class="form-signin" method="post" id="login-form">
                            
                            <div class="form-group nav-sign-in">
                                <input type="email" class="form-control" placeholder="Email address" name="email" required />
                                <span id="check-e"></span>
                            </div>
                            </li>
                            <li>
                            <div class="form-group nav-sign-in">
                                <input id="sign_in_password" type="password" class="form-control" placeholder="Password" name="password" required />
                            </div>
                            </li>
                            
                            <li>
                            <div class="form-group nav-sign-in">
                                <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
                                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
                                </button> 
                            </div>
                            
                            <?php
                                if (isset($msg)) {
                                    echo $msg;
                                }
                            ?>
                        </form>
                        </li>
                    
                </ul>
            </div>
        </nav>