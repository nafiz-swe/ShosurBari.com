<?php
include_once("includes/basic_includes.php");
require_once("includes/dbconn.php");
include_once("functions.php");
admin_register(); 
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
  <title>Register-Admin | ShosurBari</title>
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
    <?php
    // Check for error message and display it
    if (isset($_SESSION['error_message'])) {
      echo '<div class="shosurbari-register-error">' . $_SESSION['error_message'] . '</div>';
      unset($_SESSION['error_message']); // Clear the error message
    }
    ?>
    <div class="shosurbari-animation-form">
      <form action="" method="POST" name="myForm" onsubmit="return validateForm()">
        <div class="flex-container">
          <div class="sb-register-login">
            <div class="sb-biodata-field">
              <h2>Create Admin <span>Account</span></h2>
            </div>
            <div class="form-group">
              <input type="text" id="fullname" placeholder="Full Name" name="fullname" value="" size="60" maxlength="60" class="form-text required" required>
            </div>
            <div class="form-group">
              <input type="text" id="username" placeholder="Username" name="username" value="" size="60" maxlength="60" class="form-text required" required>
            </div>
            <div class="form-group">
              <input type="email" id="email" placeholder="Email" name="email" value="" size="60" maxlength="60" class="form-text required" required>
            </div>
            <div class="form-group">
              <input type="password" id="pass_1" placeholder="New Password" name="password_1" size="60" maxlength="128" class="form-text required" required>
              <span class="show-password" style="color:#00c292;  font-size:15px; top:2px;"> <i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
            </div>
            <div class="form-group">
              <input type="password" id="pass_2" placeholder="Confirm Password" name="password_2" size="60" maxlength="128" class="form-text required" required>
              <span class="show-password" style="color:#00c292;  font-size:15px; top:2px;"> <i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
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
  <!-- Password Slash Start-->
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
  <!-- Password Slash End-->
  <!-- === Admin Panel Navigation Bar === -->
  <?php include("admin_footer.php"); ?>
  <!-- =================================== -->
</body>
</html>