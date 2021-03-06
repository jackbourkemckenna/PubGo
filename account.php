
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
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    </head>
    <body>
        <?php
        session_start();
        //Connecting to the DB
        require_once 'dbconnect.php';
        //Calling Nav Bar
        include("SessionNavigationBar.php");
        ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class ="col-md-6">
                <h1>Change Password</h1>
                <!--Change Password Form
                    let The user chenge there password
                -->
                <form class="form-reset" method="post" id="btn-reset" action="changePassword.php">
                    <div class="form-group nav-sign-in">
                        <input id="password1" type="password" class="form-control" placeholder="New Password" name="password1" required />
                    </div>
                    
                    <div class="form-group nav-sign-in">
                        <input id="password2" type="password" class="form-control" placeholder="Confirm New Password" name="password2" required />
                    </div>
                    <div class="form-group nav-sign-in">
                        <button type="submit" class="btn btn-primary" name="btn-reset" id="btn-reset" value="Submit">
                            <span class="glyphicon glyphicon-repeat"></span> &nbsp; Change Password
                        </button> 
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </body>
</html>