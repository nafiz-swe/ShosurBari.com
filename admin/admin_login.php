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
</style>

<div class="shosurbari-biodata-form">

  <div class="soshurbari-animation-icon">
    <div class="sb-icon-laptop">
      <img src="images/shosurbari-login.png">
    </div>
  </div>

  
  <div class="shosurbari-animation-form">
    <form action="auth/auth.php?user=1" method="post" name="SbLogForm" onsubmit="return SbLogineForm()">
		  <div class="flex-container">
        <div class="sb-register-login">

          <div class="sb-biodata-field">
            <h2>Login Your <span>Account</span></h2>
          </div>

          <div class="form-group">
            <!--  <label for="edit-name">Email or Username <span class="form-required" title="This field is required.">*</span></label> -->
            <input type="text" id="username_email" placeholder="Your Email or Username" name="username" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>" size="60" maxlength="60" class="form-text required">
            <span id="uname_email_error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>


			<div class="form-group">
            <!-- <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label> -->
            <!-- <input type="password" id="sb_log_pass" placeholder="Your Password" name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" size="60" maxlength="128" class="form-text required"> -->
            <input type="password" id="sb_log_pass" placeholder="Your Password" name="password" value="" size="60" maxlength="128" class="form-text required">
            <span class="show-password" style="color:#0aa4ca;  font-size:15px; top: 2px;"><i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
            <span id="password_error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

          <!-- If the user clicks the Remember Me box when they login, the user's login information will be saved in their cookie.-->
			    <div class="remember-forgot">
            <label><input type="checkbox" id="edit-remember" name="remember" value="1" <?php if(isset($_COOKIE['username'])) { echo "checked"; } ?>> Remember me</label>
            <a href="forgot_password.php">Forgot password?</a>
          </div>

		    <div class="form-actions">
                <button  type="submit" id="edit-submit" name="op"  class="btn_1 submit"  > <span> </span> Login Your Account</button>
            </div>

            <div class="or">
		        <p><span class="sb-or">OR</span></p>
            </div>

            <div class="form-actions" style="text-align: center;">
                <p>Don't have an account?</p>
                <a href="admin_register.php">Create New Account</a>
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
