<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php admin_register(); 
    error_reporting(0);
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboards Four | Notika - Notika Admin Template</title>
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
                                        <li><a href="analytics.html">Analytics</a></li>
                                    </ul>
                                </li>

                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        <li><a href="admin_login.php">Login</a>
                                        </li>
                                        <li><a href="user.php">User Manage</a>
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
                                <li><a href="analytics.html">Analytics</a>
                                </li>
                            </ul>
                        </div>

                        <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="admin_login.php">Login</a>
                                </li>
                                <li><a href="user.php">User Manage</a>
                                </li>
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
            <h2>Create New <span>Account</span></h2>
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
                <button type="submit" id="edit-submit" name="op" class="btn_1 submit"><span></span> Create Account</button>
            </div>

		    <div class="or">
		        <p><span class="sb-or">OR</span></p>
            </div>

	  	    <div class="form-actions" style="text-align: center;">
			      <p>Do you have an account?</p>
			      <a href="admin_login.php"> Login Your Account</a>
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
                        <p>Copyright © 2022-23
. All rights reserved | Developed by <a target="_blank||" href="https://facebook.com/nafiz.swe.diu">nafiz.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->



</body>
</html>	
