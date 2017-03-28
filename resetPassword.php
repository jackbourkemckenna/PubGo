<?php
session_start();

require_once 'dbconnect.php';
?>
 
<form class="form-reset" method="post" id="login-form">
                            <div class="form-group nav-sign-in">
                                <input type="email" class="form-control" placeholder="Email address" name="email" required />
                                <span id="check-e"></span>
                            </div>
                    </li>
                    <li>
                            <div class="form-group nav-sign-in">
                                <input id="password1" type="password" class="form-control" placeholder="New Password" name="password1" required />
                            </div>
                    </li>
                    <li>
                            <div class="form-group nav-sign-in">
                                <input id="password2" type="password" class="form-control" placeholder="Confirm New Password" name="password2" required />
                            </div>
                    </li>
                            
                    <li>
                        <div class="form-group nav-sign-in">
                            <button type="submit" class="btn btn-default" name="btn-reset" id="btn-login">
                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
                            </button> 
                        </div>
                    </li>
                        </form>

                        <?php
                        
if (isset($_POST['btn-reset'])){
    echo 'the if is working';
    
    $email     = ($_POST['email']);
    $password1 = ($_POST['password1']);
    $password2 = ($_POST['password2']);
  
    
    if($password1==$password2){
            $reset = $DBcon->query("UPDATE pubUsers SET password='$password1' where 
        email='$email'");
    }
    else{
        echo "nope";
    }
    
}

?>