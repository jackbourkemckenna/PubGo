<!DOCTYPE html>
<html>
    <head>
        <title>About | PubGo</title>
        <?php
            include('loginSession.php');
            include('header.php');
        ?>
    </head>
    <body>
        <?php
        include('navigationBar.php');
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <!-- About the Company Info -->
                <div id="about_sec" class="col-md-4">
                    <h2 id="about_head">About Us</h2>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, vel sodales fringilla senectus, in quam sapien vestibulum pellentesque posuere ullamcorper, at eu, vel massa urna diam rutrum volutpat aenean. Vel a neque integer at, lectus integer ipsum amet, odio eleifend hac ante. Ac imperdiet. Vitae hac libero mattis sed hendrerit leo, adipiscing integer vitae, sit est ut. Sed lacus ultricies, eu morbi et enim nibh nibh nibh. Maecenas suscipit a egestas libero, suscipit eu arcu, dui risus erat quis ut autem, nesciunt nunc. Nibh sodales, neque urna consequat sodales dictumst ad phasellus, aliquam nec adipiscing vitae rutrum, sapien feugiat. Et ut nam sit, lacinia ut tincidunt sed dolor, felis ut vel blandit nam, odio orci. Lobortis maecenas in id, quam dui tortor a rhoncus, felis est morbi, vehicula ipsum.</p>
                </div>
                <div class="col-md-2"></div>
                <!-- Contact Form -->
                <div id="contact_form_sec" class="col-md-4">
                    <h2>Contact Us</h2>
                    <hr/>
                    <br>
                    <form class="form-signin" method="post" action="sendEmail.php">
                        
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name" name="first_name" required  />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" required  />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email address" name="contact_email" required  />
                            <span id="check-e"></span>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" name="subject" required  />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="What would you like to ask us?" name="comment" required></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default" name="send" id="send">
                                <span class="glyphicon glyphicon-envelope"></span> &nbsp; Send Email
                            </button> 
                        </div>
                    </form>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>
</html>

