<!DOCTYPE hmtl>
   <html>
      <head>
         <?php
         //includes the header links.
         include('header.php');
         //includes the log in session.
         include('loginSession.php');
         ?>
         <!--password Validation Function-->   
         <script>
            function check_pass(){
               var password = document.getElementById("sign_up_password1").value;
               var password2 = document.getElementById("sign_up_password2").value;
               if (password == password2){
                  document. getElementById('submit').disabled = false;
                  document.getElementById('password_match_error').style.display = 'none';
                  
               }
               else {
                  document.getElementById('submit').disabled = true;
                  document.getElementById('password_match_error').style.display = 'unset';
                  
               }
               
            }
         </script>
      </head>
      <body onload="check_pass()">
         <!--Displays NavBar-->
         <?php
          include('navigationBar.php');
          ?>
         <div class="container back-img">
            <div class="row">
               <div class="col-md-1"></div>
               <div class="col-md-10 row jumbotron">
                  
                     <!--Jumbotron-->
                  <div class="col-md-5 headerHome">
                     <h1>PubGo on Android</h1>
                     <br>
                     <br>
                     <p>PubGo is an application which allows people to view information about pubs and bars in their area and see current promotions that they are having.</p>
                     <br>
                     <p>Our App allows people access cheap drink while also accessing he social scene from pubs.</p>
                     <br>
                     <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span> &nbsp; Download</button>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-6 headerHome">
                     <!--Sign Up Form-->
                     <h1>Sign Up Here</h1>
                     <hr/>
                     <form class="form-signin" method="post" id="register-form">
                        <hr/>
                        <!--Sign In/Up Error Message-->
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
                           <input id="sign_up_password1" type="password" onchange="check_pass()" class="form-control" placeholder="Password" name="password" minlength="6" required  />
                        </div>
                        <div class="form-group">
                           <input id="sign_up_password2" type="password" onchange="check_pass()" class="form-control" placeholder="Confirm Password" name="password2" minlength="6" required  />
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Pub Name" name="pub_name" required  />
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Pub owner Name" name="pub_owner" required  />
                        </div>
                        <hr/>
                        <!--Displays Password Do Not Match Error-->
                        <div id="password_match_error">
                           <div class='alert alert-danger'>
                              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; <strong>Passwords</strong> do not match
                           </div>
                        </div>
                        <div class="form-group">
                           <button id="submit" type="submit" class="btn btn-primary" name="btn-signup">
                           <span class="glyphicon glyphicon-plus"></span> &nbsp; Create Account
                           </button> 
                        </div>
                     </form>
                  </div>
                  
                  </div>
               <div class="col-md-1"></div>
            </div>
         </div>
      </body>
   </html>
