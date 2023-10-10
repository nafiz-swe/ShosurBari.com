<?php include_once("includes/basic_includes.php");?>
<?php require_once("includes/dbconn.php"); ?>
<?php include_once("functions.php"); ?>
<?php admin_register(); 
    error_reporting(0);
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - Register | ShosurBari</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
<!-- fa fa icon / logout icon
    ============================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index.html">Dashboard</a></li>
                                        <li><a href="analytics.php">Analytics</a></li>
                                    </ul>
                                </li>

                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                    <ul class="notika-main-menu-dropdown">
                                      <li><a href="customer.php">Customer</a></li>
                                      <li><a href="contact_us.php">ContactUs</a></li>
                                      <li><a href="photos.php">Photos</a></li>
                                      <li><a href="users.php">Users</a></li>
                                      <li><a href="dataphysical_marital.php">PhysicalMarital</a></li>
                                      <li><a href="datalifestyle.php">LifeStyle</a></li>
                                      <li><a href="dataeducation.php">Edcation</a></li>
                                      <li><a href="dataaddress.php">Address</a></li>
                                      <li><a href="datareligion.php">Religion</a></li>
                                      <li><a href="datafamily.php">Family</a></li>
                                      <li><a href="datapartner.php">Partner</a></li>
                                      <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) { ?>
                                        <!-- User is logged in, show logout option -->
                                        <li><a href="admin_logout.php" style="padding: 8px 15px;"><i class="fa fa-sign-out"></i></a></li>
                                      <?php } else { ?>
                                        <!-- User is not logged in, show login option -->
                                        <li><a href="admin_login.php">Login</a></li>
                                      <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->



    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Manage</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane active in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.html">Dashboard</a>
                                </li>
                                <li><a href="analytics.php">Analytics</a>
                                </li>
                            </ul>
                        </div>

                        <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                            <li><a href="customer.php">Customer</a></li>
                              <li><a href="contact_us.php">ContactUs</a></li>
                              <li><a href="photos.php">Photos</a></li>
                              <li><a href="users.php">Users</a></li>
                              <li><a href="dataphysical_marital.php">PhysicalMarital</a></li>
                              <li><a href="datalifestyle.php">LifeStyle</a></li>
                              <li><a href="dataeducation.php">Edcation</a></li>
                              <li><a href="dataaddress.php">Address</a></li>
                              <li><a href="datareligion.php">Religion</a></li>
                              <li><a href="datafamily.php">Family</a></li>
                              <li><a href="datapartner.php">Partner</a></li>
                              <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) { ?>
                                <!-- User is logged in, show logout option -->
                                <li><a href="admin_logout.php" style="padding: 8px 15px;"><i class="fa fa-sign-out"></i></a></li>
                              <?php } else { ?>
                                <!-- User is not logged in, show login option -->
                                <li><a href="admin_login.php">Login</a></li>
                              <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->









    <style>
.shosurbari-biodata-form {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  width: 1400px;
  margin: auto;
  padding-top: 30px;
  padding-bottom: 30px
}

.soshurbari-animation-icon,
.shosurbari-animation-form {
  flex-basis: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.soshurbari-animation-icon img{
  justify-content: flex-end;
  margin: auto;
}

@media (max-width: 1400px){
  .shosurbari-biodata-form{
    width: auto;
  }
}

@media (max-width: 1024px) {
  .soshurbari-animation-icon {
    display: none;
  }

  .shosurbari-animation-form {
    flex-basis: 100%;
    justify-content: center;
  }

  .shosurbari-biodata-form {
    width: auto;
  }
}


.popup {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: linear-gradient(180deg,#00bbff 0%,rgb(246 246 246) 100%);
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  z-index: 1;
}

.popup-content {
  text-align: center;
  color: #000;
}

.popup-buttons {
  margin-top: 10px;
}

#close-button{
  background: linear-gradient(#06b6d4, #0ea5e9);
  color: white;
  border: none;
  border-radius: 3px;
}

#close-button:hover {
  background: linear-gradient(#0ea5e9, #06b6d4);
  color: white;
}
</style>

  <div class="shosurbari-biodata-form">

  <div class="soshurbari-animation-icon">
    <div class="sb-icon-laptop">
      <img src="images/shosurbari-registration.png">
    </div>
  </div>

  <div class="shosurbari-animation-form">
    <form action="" method="POST" name="myForm" onsubmit="return validateForm()">
      <div class="flex-container">
        <div class="sb-register-login">

          <div class="sb-biodata-field">
            <h2>Create Admin <span>Account</span></h2>
          </div>

          <div class="form-group">
            <!--  <label for="edit-name">Full Name<span class="form-required" title="This field is required.">*</span></label> -->
            <input type="text" id="fullname" placeholder="Full Name" name="fullname" value="" size="60" maxlength="60" class="form-text required">
            <span id="fname_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

          <div class="form-group">
            <!-- <label for="edit-name">Username<span class="form-required" title="This field is required.">*</span></label> -->
            <input type="text" id="username" placeholder="Username" name="username" value="" size="60" maxlength="60" class="form-text required">
            <span id="uname_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

          <div class="form-group">
            <!-- <label for="edit-name">Emails<span class="form-required" title="This field is required.">*</span></label> -->
            <input type="text" id="email" placeholder="Email" name="email" value="" size="60" maxlength="60" class="form-text required">
            <span id="email_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

          <div class="form-group">
            <!-- <label for="edit-pass">Password<span class="form-required" title="This field is required.">*</span></label> -->
            <input type="password" id="pass_1" placeholder="New Password" name="password_1" size="60" maxlength="128" class="form-text required">
            <span class="show-password" style="color:#0aa4ca;  font-size:15px; top:2px;"> <i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
            <span  id="pass_1_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

          <div class="form-group">
            <!-- <label for="edit-pass">Confirm Password<span class="form-required" title="This field is required.">*</span></label> -->
            <input type="password" id="pass_2" placeholder="Confirm Password" name="password_2" size="60" maxlength="128" class="form-text required">
            <span class="show-password" style="color:#0aa4ca;  font-size:15px; top:2px;"> <i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
            <span  id="pass_2_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

            <div class="form-actions">
                <button type="submit" id="edit-submit" name="op" class="btn_1 submit"><span></span> Admin Account</button>
            </div>

		    <div class="or">
		        <p><span class="sb-or">OR</span></p>
            </div>

	  	    <div class="form-actions" style="text-align: center;">
			      <p>Do you have an account?</p>
			      <a href="admin_login.php"> Login Admin Account</a>
	        </div>

        </div>
      </div>
	  </form>
  
    </div>
  </div>








   <!-- Start Footer area-->
   <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.orderBars.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  Chat JS
		============================================ -->
	<script src="js/chat/moment.min.js"></script>
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
</body>

</html>