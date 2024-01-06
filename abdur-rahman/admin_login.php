<?php
include_once("includes/basic_includes.php");
require_once("includes/dbconn.php");
include_once("functions.php");
admin_login(); 
error_reporting(0);
session_start();
if (isset($_SESSION['admin_id'])) {
  header("location: index.php");
  exit;
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
  <link rel="icon" href="../images/shosurbari-icon-admin.png" type="image/png">
  <title>Login-Admin | ShosurBari</title>
</head>
<body>
  <!-- ====== Admin Panel Navigation Bar ====== -->
  <?php include("admin_navigation.php"); ?>
  <!-- ========================================= -->
  <style>
  .shosurbari-biodata-form {
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
    <?php
    // Check for error message and display it
    if (isset($_SESSION['error_message'])) {
      echo '<div class="shosurbari-register-error">' . $_SESSION['error_message'] . '</div>';
      unset($_SESSION['error_message']); // Clear the error message
    }
    ?>
    <div class="shosurbari-animation-form">
      <form action="" method="post" name="SbLogForm" onsubmit="return SbLogineForm()">
        <div class="flex-container">
          <div class="sb-register-login">
            <div class="sb-biodata-field">
              <h2>Login Admin <span>Account</span></h2>
            </div>
            <div class="form-group">
              <input type="text" id="username_email" placeholder="Your Email or Username" name="username" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>" size="60" maxlength="60" class="form-text required">
              <span id="uname_email_error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
            </div>
            <div class="form-group">
              <input type="password" id="sb_log_pass" placeholder="Your Password" name="password" value="" size="60" maxlength="128" class="form-text required">
              <span class="show-password" style="color:#00c292;  font-size:15px; top: 2px;"><i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
              <span id="password_error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
            </div>
            <div class="remember-forgot">
              <!-- <label><input type="checkbox" id="edit-remember" name="remember" value="1" <?php if(isset($_COOKIE['username'])) { echo "checked"; } ?>> Remember me</label> -->
              <a href="admin_new_password.php">Forgot password?</a>
            </div>
		        <div class="form-actions">
              <button  type="submit" id="edit-submit" name="op"  class="btn_1 submit"  > <span> </span>Admin Login</button>
            </div>
            <div class="or">
		          <p><span class="sb-or">OR</span></p>
            </div>
            <div class="form-actions" style="text-align: center;">
              <p>Don't have an account?</p>
              <a href="admin_register.php">Create Admin Account</a>
            </div>
          </div>
        </div>
	    </form>
    </div>
  </div>
  <!-- Password Show Eye Icon Start-->
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
  <!-- Password Show Eye Icon End-->
  <!-- === Admin Panel Navigation Bar === -->
  <?php include("admin_footer.php"); ?>
  <!-- =================================== -->
</body>
</html>