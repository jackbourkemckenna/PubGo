<?php
        
            session_start();
            include("dbconnect.php");

            // this function works only in PHP 5.5 or late
        
                            if (isset($_POST['btn-reset'])){
                                  
                                $password1 = ($_POST['password1']);
                                $password2 = ($_POST['password2']);
                                //hashes password
                                $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
                                //makes sure passwords match
                                if($password1==$password2){
                                    
                                    //update password field query
                                    $reset = $DBcon->query("UPDATE pubUsers SET password='$hashed_password'  where 
                                    pub_id=".$_SESSION['userSession']);
                                }
                                
                                else{
                                    //error
                                    echo "<div class='alert alert-danger'>
                                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; <strong>Passwords</strong> do not match
                                    </div>";
                                }
                                
                            }
                            //relocates back to account page
                        header('location:account.php');
                        
                        ?>