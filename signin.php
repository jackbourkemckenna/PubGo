<?php


require('loginSession.php');
if (isset($_POST['btn-login'])) {
    //strpiing tags off the email and login feilds
    
    $email    = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    
    $email    = $DBcon->real_escape_string($email);
    $password = $DBcon->real_escape_string($password);
    //Sending the username and password to the be checked in the database. 
    $query = $DBcon->query("SELECT pub_id, email, password FROM pubUsers WHERE email='$email'");
    $row   = $query->fetch_array();
    
    $count = $query->num_rows; // if email/password are correct returns must be 1 row
    
    if (password_verify($password, $row['password']) && $count == 1) {
        $_SESSION['userSession'] = $row['pub_id'];
        header("Location: dashboard.php");
    } else {
        //Display error messege.
        $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    </div>";
    }
    $DBcon->close();
}
?>



</body>