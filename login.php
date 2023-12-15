<?php include_once("functions.php");
require_once('auth/auth.php');
session_start();
if (isset($_SESSION['id'])) {
  header("location: my-account.php");
  exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" /><!-- eye icon password show -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<script src="js/optionsearch.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!--font-Awesome-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--font-Awesome-->
</head>
<body>
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
  <style>
  .sb-biodata-field{
    background: none;
  }
  .sb-register-login h2{
    color: #000;
    font-size: 23px;
    font-weight: bold;
    background: none;
    text-align: left;
  }
  .shosurbari-biodata-form {
    align-items: center;
    flex-wrap: wrap;
    width: 1400px;
    margin: auto;
    padding-top: 30px;
    padding-bottom: 30px;
    margin-bottom: 70px;
  }
  .soshurbari-animation-icon,
  .shosurbari-animation-form {
    flex-basis: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .soshurbari-animation-icon h3 {
    font-size: 23px;
    font-weight: bold;
    margin-bottom: 15px;
    margin-top: 15px;
  }
  .soshurbari-animation-icon img {
    justify-content: flex-end;
    margin: auto;
    width: 37px;
    height: 35px;
  }
  .error-message {
    text-align: justify;
    padding: 10px;
    border: 1px solid #ccc;
    background: #ffcccc;
    width: 300px;
    color: #ff0000;
    font-weight: bold;
    margin: 50px auto 0 auto;
  }
  @media (max-width: 1400px){
  .shosurbari-biodata-form{
    width: auto;
  }
  }
  @media (max-width: 1024px) {
  .shosurbari-animation-form {
    flex-basis: 100%;
    justify-content: center;
  }
  .shosurbari-biodata-form {
    width: auto;
  }
  }
  </style>
  <div class="grid_3">
    <div class="container">
      <div class="breadcrumb1">
        <ul>
          <a href="index.php"><i class="fa fa-home home_1"></i></a>
          <span class="divider">&nbsp;|&nbsp;</span>
          <li class="current-page"><h4>Login</h4></li>
        </ul>
      </div>
    </div>
  </div>
  <?php
  // Check for error message and display it
  if (isset($_SESSION['error_message'])) {
    echo '<div class="shosurbari-register-error">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']); // Clear the error message
  }
  ?>
  <div class="shosurbari-biodata-form">
    <div class="shosurbari-animation-form">
      <form action="auth/auth.php?user=1" method="post" name="SbLogForm" onsubmit="return SbLogineForm()">
        <div class="flex-container">
          <div class="sb-register-login">
            <div class="soshurbari-animation-icon">
              <div class="sb-icon-laptop">
                <h3> <img src="images/shosurbari-icon.png"> ShosurBari </h3>
              </div>
            </div>
            <div class="sb-biodata-field">
              <h2>Login your account</h2>
            </div>
            <div class="form-group">
              <input type="text" id="username_email" placeholder="Your Email or Username" name="username" value="" size="60" maxlength="60" class="form-text required">
              <span id="uname_email_error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
            </div>
            <div class="form-group">
              <input type="password" id="sb_log_pass" placeholder="Your Password" name="password" value="" size="60" maxlength="128" class="form-text required">
              <span class="show-password" style="color:#0aa4ca;  font-size:15px; top: 2px;"><i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
              <span id="password_error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
            </div>
            <!-- If the user clicks the Remember Me box when they login, the user's login information will be saved in their cookie.-->
            <div class="remember-forgot">
              <label><input type="checkbox" id="edit-remember" name="remember" value="1" > Remember me</label>
              <a href="forgot-password.php">Forgot password?</a>
            </div>
            <div class="form-actions">
              <button  type="submit" id="edit-submit" name="op"  class="btn_1 submit"  > <span> </span> Login Account</button>
            </div>
            <div class="or">
              <p><span class="sb-or">OR</span></p>
            </div>
            <div class="form-actions" style="text-align: center;">
              <p>Don't have an account?</p>
              <a href="register.php">Create New Account</a>
            </div>
          </div>
        </div>
	    </form>
    </div>
  </div>
  <!--=======================================
  How Many Visitors View This Page.
  This Script Connected to get_view_count.php
  and page_views Database Table
  ========================================-->
  <script>
  $(document).ready(function() {
  var pages = ["login"];
  for (var i = 0; i < pages.length; i++) {
    var page = pages[i];
    $.ajax({
    url: 'get_view_count.php?page=' + page,
    type: 'GET',
    success: function(data) {
    $('#viewCount' + page.replace("_", "")).html(data);
    }
    });
  }
  });
  </script>
  <script>
    // Form Input field when error the show border red and scroll up start
    function SbLogineForm(){
      var username_email = document.forms["SbLogForm"]["username_email"].value;
      var sb_log_pass = document.forms["SbLogForm"]["sb_log_pass"].value;
      //UserName & Email validation
      if (username_email == "") {
      document.getElementById('username_email').style.borderColor = "red";
      document.getElementById('username_email').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      var errorDiv = document.getElementById('uname_email_error');
      errorDiv.innerHTML = "Please Enter Your Username or Email!";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function() {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
      }else{
      document.getElementById('username_email').style.borderColor = "green";
      document.getElementById('uname_email_error').innerHTML = "";
      }
      //Password validation
      if (sb_log_pass == "") {
      document.getElementById('sb_log_pass').style.borderColor = "red";
      document.getElementById('sb_log_pass').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      var errorDiv = document.getElementById('password_error');
      errorDiv.innerHTML = "Please Enter Your Password!";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      // Change color multiple times
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function() {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
      }else{
      document.getElementById('sb_log_pass').style.borderColor = "green";
      document.getElementById('password_error').innerHTML = "";
      }
    }
    // Password Show Eye Icon Work
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
	<!--=======  Footer Start ========-->
	<?php include_once("footer.php");?>
	<!--=======  Footer End  =========-->
</body>
</html>	
