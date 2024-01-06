<?php
include_once("includes/basic_includes.php");
require_once("includes/dbconn.php");
include_once("functions.php");
admin_new_password(); 
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
  <title>New Password-Admin | ShosurBari</title>
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
            <form action="admin_new_password.php" method="post" name="setPassword" onsubmit="return setPasswordForm()">
                <div class="flex-container">
                    <div class="sb-register-login">
                        <div class="sb-biodata-field">
                            <h2>Admin New Password</h2>
                        </div>
                        <div class="form-group">
                        <input type="text" id="email" placeholder="Account Email" name="email" value="" size="60" maxlength="60" class="form-text required">
                        <span id="email_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
                        </div>
                        <div class="form-group">
                        <input type="password" id="pass_1" placeholder="New Password" name="new_password" size="60" maxlength="60" class="form-text required">
                        <span class="show-password" style="color:#0aa4ca;  font-size:15px; top:2px;"> <i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
                        <span  id="pass_1_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
                        </div>
                        <div class="form-group">
                        <input type="password" id="pass_2" placeholder="Confirm Password" name="confirm_password" size="60" maxlength="60" class="form-text required">
                        <span class="show-password" style="color:#0aa4ca;  font-size:15px; top:2px;"> <i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
                        <span  id="pass_2_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
                        </div>
                        <div class="form-actions">
                            <button  type="submit" id="edit-submit" name="op"  class="btn_1 submit"  style="width: 50%;"> <span> </span>Send to Email</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    // Password Slash
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
    // Form Input Error Start / Check Error
    function setPasswordForm() {
    var email = document.forms["setPassword"]["email"].value;
    var pass_1 = document.forms["setPassword"]["pass_1"].value;
    var pass_2 = document.forms["setPassword"]["pass_2"].value;
    // Reset error messages and borders
    resetErrors();
    // Email validation
    if (email.trim() === "") {
      displayError('email', 'Please Enter Your Email !', 'red');
      return false;
    } else if (!/^[a-zA-Z0-9._-]+@(gmail|outlook|hotmail|yahoo).com$/.test(email)) {
      displayError('email', 'Please Enter a Valid Email. Only Used: (@gmail or @outlook or @hotmail or @yahoo).com', 'red');
      return false;
    }
    // Password validation
    if (pass_1.trim() === "") {
      displayError('pass_1', 'Please Enter Your New Password!', 'red');
      return false;
    }
    // Confirm Password validation
    if (pass_2.trim() === "") {
      displayError('pass_2', 'Please Enter Your Confirm Password!', 'red');
      return false;
    } else if (pass_2 !== pass_1) {
      displayError('pass_2', 'Your Passwords Do Not Match!', 'red');
      return false;
    }
    return true;
    }
    function displayError(elementId, errorMessage, color) {
      var element = document.getElementById(elementId);
      element.style.borderColor = color;
      var errorDiv = document.getElementById(elementId + '_error');
      errorDiv.innerHTML = errorMessage;
      errorDiv.style.display = 'block';
      errorDiv.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      animateColor(errorDiv, color);
    }
    function resetErrors() {
      var elements = ['email', 'pass_1', 'pass_2'];
      elements.forEach(function (elementId) {
      var element = document.getElementById(elementId);
      element.style.borderColor = "initial";
      var errorDiv = document.getElementById(elementId + '_error');
      errorDiv.innerHTML = "";
      errorDiv.style.display = 'none';
      });
    }
    function animateColor(element, color) {
      var colors = ['red', 'green', 'blue'];
      var currentIndex = colors.indexOf(color);
      if (currentIndex === -1) {
      return;
      }
      var nextIndex = (currentIndex + 1) % colors.length;
      var nextColor = colors[nextIndex];
      setTimeout(function () {
      element.style.color = nextColor;
      animateColor(element, nextColor);
      }, 500); // Change color every 500 milliseconds
    }
  </script>
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
