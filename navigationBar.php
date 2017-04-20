<nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>    
                <!-- Links off to the index.php page -->
                <a class="navbar-brand" href="index.php">PubGo</a>
            </div>
            <!-- Links of diffrent pages --> 
            <div class="navbar-collapse collapse grad">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about.php">About</a></li>
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
                        <!-- login button -->
                        <div class="form-group nav-sign-in">
                            <button type="submit" class="btn btn-warning" name="btn-login" id="btn-login">
                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
                            </button> 
                        </div>
                        </form>
                    </li>
                    
                </ul>
            </div>
        </nav>