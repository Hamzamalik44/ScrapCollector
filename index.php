
<?php 
require_once 'redirctToDashboard.php';


@$data = $_SESSION["data"];

 ?>

<!DOCTYPE html>
<html lang="en">



<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Landing PAGE Html5 Template">

    <meta name="keywords" content="landing,startup,flat">

    <meta name="author" content="Made By GN DESIGNS">



    <title>Scrap Collector</title>



    <!-- // PLUGINS (css files) // -->

    <link href="assets/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/overwrite.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">

    <link href="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo.png">
    <!--// ICONS //-->

    <link href="assets/css/fontawesom.css" rel="stylesheet">

    <link href="assets/css/material-icons.css" rel="stylesheet">

    <!--// BOOTSTRAP & Main //-->

    <link href="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">
    <link href="css/custom-style.css" rel="stylesheet">


</head>



<body>


    <!--======================================== 

           Preloader

    ========================================-->


    <!--======================================== 

           Header

    ========================================-->



    <!--//** Navigation**//-->

    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">



        <div class="container">

            <!-- Start Header Navigation -->

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">

                    <i class="fa fa-bars"></i>

                </button>

                <a class="navbar-brand" href="#brand">

                    <img src="assets/img/logo.png" class="logo" alt="logo">

                </a>

            </div>

            <!-- End Header Navigation -->



            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="navbar-menu">

                <ul class="nav navbar-nav navbar-right">

                    <li class="active scroll"><a href="#home">Home</a></li>

                    <li class="scroll"><a href="#about">About</a></li>

                    <li class="scroll"><a href="#services">Services</a></li>

                    <li class="scroll"><a href="#price">Price</a></li>

                    <li class="scroll"><a href="#team">Team</a></li>

                    <li class="scroll"><a href="#clients">Clients</a></li>

                    <li class="scroll"><a href="#contact">Contact</a></li>

                    <li class="button-holder">

                        <button type="button" class="btn btn-blue navbar-btn" data-toggle="modal" data-target="#SignIn">Sign in</button>

                    </li>

                </ul>

            </div>

            <!-- /.navbar-collapse -->

        </div>

    </nav>



    <!--//** Banner**//-->

    <section id="home">

        <div class="container">

            <div class="row">

                <div id="particles-js"></div>

                <!-- Introduction -->

                <div class="col-md-6 caption">

                    <h1>Welcome To Scrap Collector</h1>

                    <h2>

                           I am 

                            <span class="animated-text"></span>

                            <span class="typed-cursor"></span>

                        </h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, quibusdam. Sit, quas tempora quia officia!</p>

                    <a href="#" class="btn btn-transparent">Get Started</a>

                    <a class="btn btn-blue popup-youtube" href="https://www.youtube.com/watch?v=Q8TXgCzxEnw">

                        <i class="material-icons">play_circle_filled</i>Watch Video

                    </a>

                </div>

                <!-- Sign Up -->

                <div class="col-md-5 col-md-offset-1" style="margin-top: -50px;">

                    <form action="database/accounts.php" method="post" class="signup-form" id="signup-form">

                        <h2 class="text-center">Signup Now </h2>

                        <hr>

                        <div class="row">
                             <input type="hidden" name="roleId" value="4">    
                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" placeholder="First Name" name="firstName" value=<?php echo @$data['firstName']?> >


                        </div>

                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" placeholder="Last Name" name="lastName" value=<?php echo @$data['lastName']?>  >

                        </div>

                        <div class="form-group col-md-12">

                            <input type="email" class="form-control" placeholder="Email Address" name="email" required="required">
                            <?php if(isset($_SESSION["data"])){?><label id="email-error" class="error" for="email"><?php echo $data['message']?></label><?php } ?>
                        </div>
                        <div class="form-group col-md-12">

                            <input type="text" class="form-control" placeholder="Phone" name="phone" required="required" value=<?php echo @$data['phone']?> >

                        </div>

                        <div class="form-group col-md-12">

                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required="required" value=<?php echo @$data['password']?> >

                        </div>

                        <div class="form-group col-md-12">

                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword" required="required">

                        </div>

                        <div class="form-group col-md-12">

                            <input type="textarea"  class="form-control" placeholder="Address" name="address" required="required" value=<?php echo @$data['address']; unset($_SESSION["data"]); ?> >

                        </div>
                        
                        <div class="form-group text-center">

                            <button type="submit" name="addUserButton" class="btn btn-blue btn-block">Start Now</button>

                        </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>



    </section>



    <!--======================================== 

           About Us

    ========================================-->



    <section id="about" class="section-padding">

        <div class="container">

            <h2>About Us</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

            <div class="row">

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">favorite</i>

                        <h4>Simple To Use</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas minima, dicta quaerat sit cupiditate eum mollitia.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">flash_on</i>

                        <h4>Powerful</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas minima, dicta quaerat sit cupiditate eum mollitia.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">settings</i>

                        <h4>Easy To Customize</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas minima, dicta quaerat sit cupiditate eum mollitia.</p>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           Story

    ========================================-->



    <section id="story">

        <div class="container-fluid">

            <div class="row">

                <!-- Img -->

                <div class="col-md-6 story-bg">

                </div>

                <!-- Story Caption -->

                <div class="col-md-6">

                    <div class="story-content">

                        <h2>Our Success Story</h2>

                        <p class="story-quote">

                            " Success is finding satisfaction in giving a little more than you take."

                        </p>

                        <div class="story-text">

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis amet consequatur incidunt, alias odit quisquam laborum nemo nisi, vel, tempora eligendi enim voluptate accusamus libero voluptas commodi ex rerum dolorem!</p>

                        </div>

                        <a href="#" class="btn btn-white">Learn More</a>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           Services

    ========================================-->



    <section id="services" class="section-padding">

        <div class="container">

            <h2>Our Services</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

            <div class="row">

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">thumb_up</i>

                        <h4>Great Quality</h4>

                        <p>Quality ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">euro_symbol</i>

                        <h4>Best Price</h4>

                        <p>Price ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">forum</i>

                        <h4>24/7 Support</h4>

                        <p>Support ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">view_carousel</i>

                        <h4>UX/UI Design</h4>

                        <p>Quality ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           Features

    ========================================-->



    <section id="features">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <h2>Awesome Features</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, repudiandae mollitia iure magni accusamus, alias veniam.</p>

                    <hr>

                    <div class="feat-media">

                        <!-- Feature -->

                        <div class="media">

                            <div class="media-left">

                                <a href="#">

                                    <i class="material-icons">monetization_on</i>

                                </a>

                            </div>

                            <div class="media-body">

                                <h4 class="media-heading">Easy On Your Wallet</h4>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti nam vel provident quae.</p>

                            </div>

                        </div>

                        <!-- Feature -->

                        <div class="media">

                            <div class="media-left">

                                <a href="#">

                                    <i class="material-icons">access_time</i>

                                </a>

                            </div>

                            <div class="media-body">

                                <h4 class="media-heading">Time Saver</h4>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti nam vel provident quae.</p>

                            </div>

                        </div>

                        <!-- Feature -->

                        <div class="media">

                            <div class="media-left">

                                <a href="#">

                                    <i class="material-icons">computer</i>

                                </a>

                            </div>

                            <div class="media-body">

                                <h4 class="media-heading">Fully Responsive</h4>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti nam vel provident quae.</p>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Features Img -->

                <div class="col-md-6 col-md-push-2">

                    <img src="assets/img/dashboard.png" class="img-responsive" alt="feature">

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           Price

    ========================================-->



    <section id="price" class="section-padding">

        <div class="container">

            <h2>Choose Your Plan</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

            <div class="row">

                <!-- Pricing Start Here -->

                <div class="pricing-container">

                    <div class="col-md-4">

                        <!--== SINGLE USER: Plan ==-->

                        <div class="plan">

                            <div class="pricing-header">

                                <h3>Single User</h3>

                                <h3>

                                <span class="currency">$</span>

                                <span class="amount">20</span>

                                <span class="period">/mo</span>

                                </h3>

                            </div>

                            <div class="pricing-body">

                                <ul class="list-unstyled">

                                    <li><i class="material-icons">done</i><b>265MB</b> Memory</li>

                                    <li><i class="material-icons">done</i><b>1</b> User</li>

                                    <li><i class="material-icons">done</i><b>1</b> Website</li>

                                    <li><i class="material-icons">done</i><b>1</b> Domain</li>

                                    <li><i class="material-icons">done</i><b>Unlimeted</b> Bandwitch</li>

                                    <li><i class="material-icons">done</i><b>24/7</b> Support</li>

                                </ul>

                            </div>

                            <div class="pricing-footer">

                                <a href="#" class="btn btn-blue">Select</a>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <!--== MULTIPLE USER: Plan ==-->

                        <div class="plan active">

                            <div class="pricing-header">

                                <h3>Multiple Users</h3>

                                <h3>

                                <span class="currency">$</span>

                                <span class="amount">40</span>

                                <span class="period">/mo</span>

                                </h3>

                            </div>

                            <div class="pricing-body">

                                <ul class="list-unstyled">

                                    <li><i class="material-icons">done</i><b>512MB</b> Memory</li>

                                    <li><i class="material-icons">done</i><b>3</b> User</li>

                                    <li><i class="material-icons">done</i><b>5</b> Website</li>

                                    <li><i class="material-icons">done</i><b>7</b> Domain</li>

                                    <li><i class="material-icons">done</i><b>Unlimeted</b> Bandwitch</li>

                                    <li><i class="material-icons">done</i><b>24/7</b> Support</li>

                                </ul>

                            </div>

                            <div class="pricing-footer">

                                <a href="#" class="btn btn-blue">Select</a>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <!--== Developer: Plan ==-->

                        <div class="plan">

                            <div class="pricing-header">

                                <h3>Developer</h3>

                                <h3>

                                <span class="currency">$</span>

                                <span class="amount">60</span>

                                <span class="period">/mo</span>

                                </h3>

                            </div>

                            <div class="pricing-body">

                                <ul class="list-unstyled">

                                    <li><i class="material-icons">done</i><b>1024MB</b> Memory</li>

                                    <li><i class="material-icons">done</i><b>5</b> User</li>

                                    <li><i class="material-icons">done</i><b>10</b> Website</li>

                                    <li><i class="material-icons">done</i><b>10</b> Domain</li>

                                    <li><i class="material-icons">done</i><b>Unlimeted</b> Bandwitch</li>

                                    <li><i class="material-icons">done</i><b>24/7</b> Support</li>

                                </ul>

                            </div>

                            <div class="pricing-footer">

                                <a href="#" class="btn btn-blue">Select</a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           Team

    ========================================-->



    <section id="team" class="section-padding">

        <div class="container">

            <h2>Team Of Professionals</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

            <div class="row">

                <div class="col-md-6 col-lg-3">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/team-1.jpg" class="img-responsive img-circle" alt="team-1">

                        <div class="caption">

                            <h4>Adam White</h4>

                            <h6>Founder Ceo</h6>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                                    <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/team-2.jpg" class="img-responsive img-circle" alt="team-2">

                        <div class="caption">

                            <h4>Jasmine Doe</h4>

                            <h6>Web Designer</h6>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                                    <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/team-3.jpg" class="img-responsive img-circle" alt="team-3">

                        <div class="caption">

                            <h4>Mike White</h4>

                            <h6>Developer</h6>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                                    <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/team-4.jpg" class="img-responsive img-circle" alt="team-4">

                        <div class="caption">

                            <h4>Jarl Doe</h4>

                            <h6>Photographer</h6>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                                    <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           Clients

    ========================================-->



    <section id="clients" class="section-padding">

        <div class="container">

            <div class="row">

                <h2>Clients Trust Us</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

                <!--// Clients Images //-->

                <div class="clients-images">

                    <div id="owl-clients">

                        <div class="item"><img src="assets/img/clients/c_logo01.png" class="center-block" alt="client"></div>

                        <div class="item"><img src="assets/img/clients/c_logo02.png" class="center-block" alt="client"></div>

                        <div class="item"><img src="assets/img/clients/c_logo03.png" class="center-block" alt="client"></div>

                        <div class="item"><img src="assets/img/clients/c_logo04.png" class="center-block" alt="client"></div>

                        <div class="item"><img src="assets/img/clients/c_logo05.png" class="center-block" alt="client"></div>

                        <div class="item"><img src="assets/img/clients/c_logo06.png" class="center-block" alt="client"></div>

                    </div>

                </div>

                <!--// Clients Testimonials //-->

                <div id="owl-testimonials">

                    <div class="item">

                        <i class="material-icons">mood</i>

                        <p class="quote">Vivamus quam neque, aliquet ac faucibus ut, vestibulum. Nulla quis laoreet diam. Donec sed egestas ex, nec facilisis ante. Vivamus imperdiet odio. Cras luctus interdum sodales. Quisque quis odio dui.</p>

                        <h4>-John Doe, Company inc.</h4>

                    </div>

                    <div class="item">

                        <i class="material-icons">mood</i>

                        <p class="quote">Vivamus quam neque, aliquet ac faucibus ut, vestibulum. Nulla quis laoreet diam. Donec sed egestas ex, nec facilisis ante. Vivamus imperdiet odio. Cras luctus interdum sodales. Quisque quis odio dui.</p>

                        <h4>-Jarl Doe, Company inc.</h4>

                    </div>

                    <div class="item">

                        <i class="material-icons">mood</i>

                        <p class="quote">Vivamus quam neque, aliquet ac faucibus ut, vestibulum. Nulla quis laoreet diam. Donec sed egestas ex, nec facilisis ante. Vivamus imperdiet odio. Cras luctus interdum sodales. Quisque quis odio dui.</p>

                        <h4>-Adam Doe, Company inc.</h4>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           Newsletter

    ========================================-->



    <section id="newsletter">

        <div class="container">

            <div class="row">

                <h3>Subscribe to get early access!</h3>

                <div class="form-container">

                    <form class="form-inline">

                        <input type="email" class="form-control" id="newsletter-form" placeholder="Email" required="required">

                        <button type="submit" class="btn btn-white">Subscribe</button>

                    </form>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           Contact

    ========================================-->



    <section id="contact" class="section-padding">

        <div class="container">

            <h2>Contact Us</h2>

            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>

            <p>sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>

        </div>

        <!-- Contact Info -->

        <div class="container contact-info">

            <div class="row">

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">place</i>

                        <h4>Address</h4>

                        <p>PABox 13592, Lorem Street Ipsum Dolor, Victoria 8007, USA</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">phone</i>

                        <h4>Call Us On</h4>

                        <p>1-834-527-6940</p>

                        <p>1-834-527-6940</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">email</i>

                        <h4>Email us on</h4>

                        <p>lorem@xyz.com</p>

                        <p>lorem@xyz.com</p>

                    </div>

                </div>

            </div>

        </div>

        <!-- Google Map -->

        <div id="map"></div>

        <!-- Contact Form -->

        <div class="contact-forms">

            <div class="container">

                <h2>Drop us a Line</h2>

                <form class="contact-form">

                    <div class="col-md-6">

                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Full Name" required="required">

                        </div>

                        <div class="form-group">

                            <input type="email" class="form-control" placeholder="Email" required="required">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <textarea class="form-control" rows="3" placeholder="Message"></textarea>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-blue">Send Message</button>

                </form>

            </div>

        </div>

    </section>



    <!--======================================== 

           Footer

    ========================================-->



    <footer>

        <div class="container">

            <div class="row">

                <div class="footer-caption">

                    <img src="assets/img/logo.png" class="img-responsive center-block" alt="logo">

                    <hr>

                    <h5 class="pull-left">Scrap Collector, &copy;2020 All rights reserved</h5>

                    <ul class="liste-unstyled pull-right">

                        <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                        <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                        <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                        <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </footer>



    <!--======================================== 

           Modal

    ========================================-->

    <!-- Modal -->



    <div class="modal fade" id="SignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title text-center" id="myModalLabel">Sign In</h4>

                </div>
                <div id="errorMessage" style="text-align: center; display: none;">
                    <h5 style="color: red;">Invalid user name or password</h5>
                </div>
                <div class="modal-body">

                    <form  action="ajaxCalls/login.php" method="post" class="signup-form" id="loginForm">

                        <div class="form-group">

                            <input type="email" class="form-control box" placeholder="Email" name="loginEamil">

                        </div>

                        <div class="form-group">

                        <input type="password" class="form-control box" placeholder="Password" name="LoginPassword">

                        </div>

                        <div class="form-group" style="text-align: center; display: none;" id="ajaxLoader">
     
                            <img src="images/ajaxLoader.gif" style="height: 25px; ">
 
                        </div>
                        <div class="form-group text-center">

                            <button type="submit" id="loginButton" name="loginButton" class="btn btn-blue btn-block">Log In</button>

                        </div>

                    </form>

                </div>

                <div class="modal-footer text-center">

                    <a id="forgotPasswordButton" style="color: #7571f9;" >Forgot your password </a>


                </div>

            </div>

        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="assets/js/plugins/jquery.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="scripts/index.js"></script>
    <script src="js/sweet-alert.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="assets/js/plugins/particles.js-master/particles.js-master/particles.min.js"></script>

    <script src="assets/js/particales-script.js"></script>

    <script src="assets/js/main.js"></script>

</body>



</html>
<script>

function done(){

 swal({
            title: "Successfully signup!",
            text: "You have to login now",
            icon: "success"
            });
}


<?php if(isset($_SESSION['success'])){ ?>

done();
document.getElementById("#signup-form").reset();

<?php unset($_SESSION['success']);  }?>    


</script>
