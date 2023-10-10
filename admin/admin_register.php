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


<!-- ====== Admin Panel Navigation Bar ====== -->
<?php include("admin_navigation.php"); ?>
<!-- ========================================= -->




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


<!-- Password Slash -->
<script>
  let showPass = document.querySelectorAll('.show-password');
  showPass.forEach(function(el) {
    el.addEventListener('click', function(){
      let input = this.previousElementSibling;
      if (input.type === "password") {
      input.type = "text";
      this.innerHTML = "<i class='fa fa-eye-slash'></i>";
      } else {
      input.type = "password";
      this.innerHTML = "<i class='fa fa-eye'></i>";
      }
    });
  });
</script>


<!-- === Admin Panel Navigation Bar === -->
<?php include("admin_footer.php"); ?>
<!-- =================================== -->


</body>

</html>