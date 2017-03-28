
    <html>
        <head>
            <?php
            session_start();
            include("dbconnect.php");
            ?>
     

            <title>Account</title>
            <!--Style Links-->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href= "resources/css/style.css">
            <!--password Validation-->   
             
        </head>
        <body>
            <li><a href="dashboard.php"><span class="glyphicon glyphicon-chevron-left"></span>Back to Dashboard</a></li>
            
            <?php
            session_start();
            require_once 'dbconnect.php';
            ?>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class ="col-md-6">
                        <h1>Change Password</h1>
                        <form class="form-reset" method="post" id="btn-reset">
                            <div class="form-group nav-sign-in">
                                <input type="email" class="form-control" placeholder="Email address" name="email" required />
                                <span id="check-e"></span>
                            </div>
                            <div class="form-group nav-sign-in">
                                <input id="password1" type="password" class="form-control" placeholder="New Password" name="password1" required />
                            </div>
                            <div class="form-group nav-sign-in">
                                <input id="password2" type="password" class="form-control" placeholder="Confirm New Password" name="password2" required />
                            </div>
                            <div class="form-group nav-sign-in">
                                <button type="submit" class="btn btn-default" name="btn-reset" id="btn-reset">
                                    <span class="glyphicon glyphicon-repeat"></span> &nbsp; Change Password
                                </button> 
                            </div>
                        
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                        <?php
                        
                            if (isset($_POST['btn-reset'])){
                                
                                $email     = ($_POST['email']);
                                $password1 = ($_POST['password1']);
                                $password2 = ($_POST['password2']);
                              
                                
                                if($password1==$password2){
                                        $reset = $DBcon->query("UPDATE pubUsers SET password='$password1' where 
                                    email='$email'");
                                }
                                
                                else{
                                    echo "<div class='alert alert-danger'>
                                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; <strong>Passwords</strong> do not match
                                    </div>";
                                }
                                
                            }
                        
                        ?>
        </body>
    </html>