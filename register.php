<?php 
include_once("includes/basic_includes.php");
include_once("functions.php");
register(); 
if (isset($_SESSION['id'])) {
  header("location: my-account.php");
  exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2Q53085HTX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2Q53085HTX');
</script>
<title>Register | ShosurBari</title>
<meta name="description" content="শ্বশুরবাড়ি: Embark on your journey with ShosurBari. Register now for a personalized profile on this Bangladeshi matrimony platform, and let your unique story pave the way to finding your ideal life partner.">
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<meta property="og:image" content="https://www.shosurbari.com/images/shosurbari-social-share.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" /><!-- eye icon password show -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!-- Country Code with Flag for Number input field below 2 link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
</head>
<body>
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
  <div class="grid_3">
    <div class="container">
      <div class="breadcrumb1">
        <ul>
          <a href="index.php"><i class="fa fa-home home_1"></i></a>
          <span class="divider">&nbsp;|&nbsp;</span>
          <li class="current-page"><h4>Register</h4></li>
        </ul>
      </div>
    </div>
  </div>
  <style>
  .form-group input{
    font-family: 'Ubuntu';
  }
  .shosurbari-biodata-form {
    align-items: center;
    flex-wrap: wrap;
    width: 1400px;
    margin: auto;
    padding-bottom: 30px;
    margin-bottom: 70px;
  }
  .sb-biodata-field h2 {
    margin-bottom: 40px;
  }
  .soshurbari-animation-icon,
  .shosurbari-animation-form {
    flex-basis: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .shosurbari-form-error{
    font-size: 16px;
    margin-top: 0px;
    background: rgb(255, 221, 238);
    border-radius: 2px 2px 4px 4px;
    text-align: center;
    display: none;
  }
	@media screen and (min-width: 1400px) {
    .popup-container {
        width: 480px;
    }
	}
@media (max-width: 1400px){
  .shosurbari-biodata-form{
    width: auto;
  }
	.popup-container {
        width: 450px;
    }
  }
	@media screen and (max-width: 1200px) {
    .popup-container {
        width: 420px;
    }
	  }
  @media (max-width: 1024px) {
	.popup-container {
        width: 400px;
    }
  .shosurbari-animation-form {
    flex-basis: 100%;
    justify-content: center;
  }
  .shosurbari-biodata-form {
    width: auto;
  }
  }
@media screen and (max-width: 768px) {
    .popup-container {
        width: 390px;
    }
}
@media screen and (max-width: 600px) {
    .popup-container {
        width: 380px;
    }
}
@media screen and (max-width: 480px) {
    .popup-container {
        width: 350px;
    }
}
@media screen and (max-width: 384px) {
    .popup-container {
        width: 300px;
    }
}
@media screen and (max-width: 320px) {
    .popup-container {
        width: 250px;
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
  </style>
  <?php
  if (isset($_SESSION['reg_error_message'])) {
    echo '<div class="shosurbari-register-error">' . $_SESSION['reg_error_message'] . '</div>';
    unset($_SESSION['reg_error_message']);
  }
  ?>
  <div class="shosurbari-biodata-form">
    <div class="shosurbari-animation-form">
      <form action="" method="POST" name="myForm" onsubmit="return validateForm()">
        <div class="flex-container">
          <div class="sb-register-login">
            <div class="soshurbari-animation-icon">
              <div class="sb-icon-laptop">
                <h3> <img src="images/shosurbari-logo-form.png"></h3>
              </div>
            </div>
            <div class="sb-biodata-field">
              <h2>Create new account</h2>
            </div>
            <div class="form-group">
              <input type="text" id="fname" placeholder="Full Name" minlength="4" name="fname" value="" maxlength="60" class="form-text required">
              <span id="fname_error"  class="shosurbari-form-error"></span>
            </div>
            <div class="form-group">
              <input type="text" id="uname" placeholder="Username" minlength="4" name="uname" value="" maxlength="30" class="form-text required">
              <span id="uname_error" class="shosurbari-form-error"></span>
            </div>
            <div class="form-group">
              <input type="email" id="email" placeholder="Email" name="email" value="" maxlength="60" class="form-text required">
              <span id="email_error" class="shosurbari-form-error"></span>
            </div>
            <div class="form-group">
              <input type="tel" id="pnumber" placeholder="Phone Number" name="pnumber" value="" size="50" maxlength="14" class="form-text required">
              <input type="hidden" id="selectedCountryCode" name="selectedCountryCode">
              <input type="hidden" id="selectedCountryName" name="selectedCountryName">
              <span id="pnumber_error" class="shosurbari-form-error"></span>
            </div>
            <div class="form-group">
              <input type="password" id="pass_1" placeholder="New Password" name="pass_1" maxlength="40" class="form-text required">
              <span class="show-password" style="font-size:15px; top:2px;"> <i style="font-size:15px;" class="fa fa-eye-slash" aria-hidden="true"></i></span> 
              <span  id="pass_1_error" class="shosurbari-form-error"></span>
            </div>
            <div class="form-group">
              <input type="password" id="pass_2" placeholder="Confirm Password" name="pass_2" maxlength="40" class="form-text required">
              <span class="show-password" style="font-size:15px; top:2px;"> <i style="font-size:15px;" class="fa fa-eye-slash" aria-hidden="true"></i></span> 
              <span  id="pass_2_error" class="shosurbari-form-error"></span>
            </div>
            <div class="gender-select-reg" id="gender-select-reg">
              <label class="sb-profile-gender" for="sex">Your Gender<span class="form-required" title="This field is required."></span></label>
              <div class="gender-option">
                <input type="radio" name="gender" id="male" value="Male" onclick="genderSelected(this);"/>
                <label for="male"><i class="fa fa-male"></i> Male</label>
              </div>
              <div class="gender-option">
                <input type="radio" name="gender" id="female" value="Female" onclick="genderSelected(this);"/>
                <label for="female"><i class="fa fa-female"></i> Female</label><br>
              </div>
            </div>
            <div class="gender-error">
              <span class="shosurbari-form-error" id="gender-error"></span>
            </div>
            <div class="form-actions">
              <?php if(isset($_COOKIE['username'])) { ?>
                <input type="hidden" id="edit-remember" name="remember" value="1">
                <?php } else { ?>

                <div class="form-group" style="display: none;">
                  <label><input type="checkbox" id="edit-remember" name="remember" value="1" checked> Remember me</label>
                </div>
              <?php } ?>
              <div class="sb-terms-privacy-checkbox">
                <input type="checkbox" id="terms-checkbox" name="terms" value="1" onclick="toggleSubmitButton(this.checked);" required>
                <label class="checkbox-label" for="terms-checkbox">I agree to the <a target="_blank" href="terms.php">Terms and Conditions</a> and have read the <a target="_blank" href="privacy.php">Privacy Policy.</a></label>
              </div>
              <button type="submit" id="edit-submit" name="op" class="btn_1 submit"><span></span> Create Account</button>
            </div>
            <div class="or">
              <p><span class="sb-or">OR</span></p>
            </div>
            <div class="form-actions" style="text-align: center;">
              <p>Do you have an account?</p>
              <a href="login.php"> Login Your Account</a>
            </div>
            <!-- Popup message -->
            <div class="popup-message">
            <h3></h3>
            <p></p>
            </div>
            <div class="overlay"></div>
          </div>
        </div>
      </form>
    </div>
  </div>
		<style>
    /* Popup container */
    .popup-container {
        display: none;
        position: fixed;
        top: 15%;
        left: 50%;
        transform: translateX(-50%);
		color: red;
		box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
        z-index: 9999;
    }
/* Image style */
.popup-container img {
    display: block;
    margin: 0 auto; /* Center the image horizontally */
    max-width: 100%; /* Ensure the image doesn't exceed the container width */
	box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
}
    /* Button style */
    .popup-btn {
		padding: 7px 0px;
		margin: 0px auto 0px auto;
		background: rgb(255, 221, 238);
		color: red;
		font-weight: bold;
		width: 100%;
		border: none;
		cursor: pointer;
    }
    /* Button hover effect */
    .popup-btn:hover {
		background: linear-gradient(#0aa4ca, #06b6d4);
    }
</style>
<!-- Popup container -->
<div id="popup" class="popup-container">
	<img src="images/shosurbari-reg-notice.png">
    <button id="okButton" class="popup-btn">ঠিক আছে</button>
</div>
<script>
    // Get the popup container
    var popup = document.getElementById('popup');
    // Get the OK button
    var okButton = document.getElementById('okButton');
    // Check if the popup has been shown before
    var isPopupShown = localStorage.getItem('popupShown');
    // Show the popup if it hasn't been shown
    if (!isPopupShown) {
        popup.style.display = 'block';
    }
    // Hide the popup when OK button is clicked and store the state
    okButton.addEventListener('click', function() {
        popup.style.display = 'none';
        localStorage.setItem('popupShown', 'true');
    });
</script>
	<!--View This Page. Connected to get view count -->
  <script>
    $(document).ready(function() {
    var pages = ["register"];
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
    // Phone Number Country Code With Country Flag
    $(document).ready(function () {
    var input = document.querySelector("#pnumber");
    var iti = window.intlTelInput(input, {
    separateDialCode: true,
    preferredCountries: ["bd"]
    });
    input.addEventListener("countrychange", function () {
    var selectedCountry = iti.getSelectedCountryData();
    $("#selectedCountryCode").val(selectedCountry.dialCode);
    $("#selectedCountryName").val(selectedCountry.name);
    });
    // Set default country code and name if no country is selected
    var defaultCountry = iti.getSelectedCountryData();
    $("#selectedCountryCode").val(defaultCountry.dialCode);
    $("#selectedCountryName").val(defaultCountry.name);
    });
    // Password Slash Start
    let showPass = document.querySelectorAll('.show-password');
    showPass.forEach(function(el) {
      el.addEventListener('click', function(){
      let input = this.previousElementSibling;
      if (input.type === "password") {
      input.type = "text";
      this.innerHTML = "<i class='fa fa-eye'></i>";
      } else {
      input.type = "password";
      this.innerHTML = "<i class='fa fa-eye-slash'></i>";
      }
      });
    });
    //Register Input Field Error Start
    function validateForm(){
    var fname = document.forms["myForm"]["fname"].value;
    var uname = document.forms["myForm"]["uname"].value;
    var email = document.forms["myForm"]["email"].value;
    var pnumber = document.forms["myForm"]["pnumber"].value;
    var pass_1 = document.forms["myForm"]["pass_1"].value;
    var pass_2 = document.forms["myForm"]["pass_2"].value;
    // Full Name validation
    if (fname == "") {
      var errorDiv = document.getElementById('fname_error');
      // Apply styles for error display
      document.getElementById('fname').style.borderColor = "red";
      document.getElementById('fname').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      errorDiv.innerHTML = "আপনার সম্পূর্ণ নাম লিখুন।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else {
      // Reset styles for a valid input
      document.getElementById('fname').style.borderColor = "green";
      var errorDiv = document.getElementById('fname_error');
      // Remove error message and hide padding
      errorDiv.innerHTML = "";
      errorDiv.style.display = 'none';
      errorDiv.style.padding = '0';
    }
    // Username validation
    if (uname == "") {
      var errorDiv = document.getElementById('uname_error');
      document.getElementById('uname').style.borderColor = "red";
      document.getElementById('uname').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      errorDiv.innerHTML = "আপনার ডাকনাম লিখুন।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else if (!/^[A-Za-z0-9]+$/.test(uname)) {
      var errorDiv = document.getElementById('uname_error');
      document.getElementById('uname').style.borderColor = "red";
      document.getElementById('uname').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      errorDiv.innerHTML = "নামের মধ্যে কোন চিহ্ন, বাংলা বা স্পেস গ্রহণ যোগ্য নয়। নাম্বার গ্রহণ যোগ্য।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else {
      document.getElementById('uname').style.borderColor = "green";
      var errorDiv = document.getElementById('uname_error');
      errorDiv.innerHTML = "";
      errorDiv.style.display = 'none';
      errorDiv.style.padding = '0';
    }
    // Email validation
    if (email == "") {
      var errorDiv = document.getElementById('email_error');
      document.getElementById('email').style.borderColor = "red";
      document.getElementById('email').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      errorDiv.innerHTML = "আপনার ই-মেইল লিখুন।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else if (!/^[a-zA-Z0-9._-]+@(gmail|outlook|hotmail|yahoo)\.com$/.test(email)) {
      var errorDiv = document.getElementById('email_error');
      document.getElementById('email').style.borderColor = "red";
      document.getElementById('email').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      errorDiv.innerHTML = "দুঃখিত! আপনার ইমেলটি গ্রহণ যোগ্য নয়।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else {
      document.getElementById('email').style.borderColor = "green";
      var errorDiv = document.getElementById('email_error');
      errorDiv.innerHTML = "";
      errorDiv.style.display = 'none';
      errorDiv.style.padding = '0';
    }
    // Phone number validation
    if (pnumber == "") {
      var pnumberElement = document.getElementById('pnumber');
      pnumberElement.style.borderColor = "red";
      pnumberElement.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      var errorDiv = document.getElementById('pnumber_error');
      errorDiv.innerHTML = "আপনার মোবাইল নাম্বার লিখুন।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else if (!/^[0-9]{7,14}$/.test(pnumber)) {
      var pnumberElement = document.getElementById('pnumber');
      pnumberElement.style.borderColor = "red";
      pnumberElement.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      var errorDiv = document.getElementById('pnumber_error');
      errorDiv.innerHTML = "নাম্বারের মধ্যে কোন চিহ্ন বা স্পেস গ্রহণ যোগ্য নয় এবং এর সীমা ৭ থেকে ১৪ ডিজিট।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else {
      document.getElementById('pnumber').style.borderColor = "green";
      var errorDiv = document.getElementById('pnumber_error');
      errorDiv.innerHTML = "";
      errorDiv.style.display = 'none';
      errorDiv.style.padding = '0';
    }
    // Password validation
    if (pass_1 == "") {
      var passElement = document.getElementById('pass_1');
      passElement.style.borderColor = "red";
      passElement.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      var errorDiv = document.getElementById('pass_1_error');
      errorDiv.innerHTML = "আপনার নতুন পাসওয়ার্ড লিখুন।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else {
      document.getElementById('pass_1').style.borderColor = "green";
      var errorDiv = document.getElementById('pass_1_error');
      errorDiv.innerHTML = "";
      errorDiv.style.display = 'none';
      errorDiv.style.padding = '0';
    }
    // Confirm Password validation
    if (pass_2 == "") {
      var passElement = document.getElementById('pass_2');
      passElement.style.borderColor = "red";
      passElement.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      var errorDiv = document.getElementById('pass_2_error');
      errorDiv.innerHTML = "আপনার উক্ত পাসওয়ার্ডটি পুনরায় লিখুন।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else if (pass_2 != pass_1) {
      var passElement = document.getElementById('pass_2');
      passElement.style.borderColor = "red";
      passElement.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      var errorDiv = document.getElementById('pass_2_error');
      errorDiv.innerHTML = "আপনার উক্ত পাসওয়ার্ডটির সাথে মিলছে না।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else {
      document.getElementById('pass_2').style.borderColor = "green";
      var errorDiv = document.getElementById('pass_2_error');
      errorDiv.innerHTML = "";
      errorDiv.style.display = 'none';
      errorDiv.style.padding = '0';
    }
    // Gender validation
    const maleRadio = document.querySelector('#male');
    const femaleRadio = document.querySelector('#female');
    const genderSelectReg = document.querySelector('#gender-select-reg');
    const genderError = document.querySelector('#gender-error');
    if (!maleRadio.checked && !femaleRadio.checked) {
      genderSelectReg.style.borderColor = "red";
      genderError.innerHTML = 'আপনার লিঙ্গ নির্বাচন করুন।';
      genderError.style.display = 'block';
      genderError.classList.add('fade-in');
      genderError.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      genderError.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      genderError.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });
      genderError.style.position = 'relative';
      return false;
    } else {
      genderError.innerHTML = '';
      genderError.style.display = 'none';
      genderError.style.padding = '0';
      genderSelectReg.style.borderColor = 'green';
    }
    // Gender Select End
    return true;
    }
    // Agree with Term & Conditions + Privacy & Policy Check Box
    function toggleSubmitButton(checked) {
      var submitButton = document.getElementById("edit-submit");
      submitButton.style.display = checked ? "block" : "none";
    }
    // Show the loading message
    function showLoadingMessage() {
      document.querySelector('.overlay').style.display = 'block';
      var popup = document.querySelector('.popup-message');
      popup.style.display = 'block';
      popup.querySelector('h3').innerHTML = 'অপেক্ষা করুন...';
      popup.querySelector('p').innerHTML = 'আপনার তথ্য যাচাইকরণ চলছে।';
      // Auto-hide the popup after 3000 milliseconds (adjust the time as needed)
      setTimeout(function () {
        hideLoadingMessage();
      }, 3000);
    }
    // Hide the loading message
    function hideLoadingMessage() {
      document.querySelector('.overlay').style.display = 'none';
      var popup = document.querySelector('.popup-message');
      popup.style.display = 'none';
      // Reload the page after hiding the popup
      location.reload();
    }
    // Change the form submission code to the following
    $('form[name="myForm"]').submit(function (e) {
      e.preventDefault();
      if (validateForm()) {
        showLoadingMessage();
        $.ajax({
          url: 'register.php',
          type: 'POST',
          data: $(this).serialize(),
          success: function (data) {
            // Check if the registration was successful
            if (data.trim() === '') {
              // The success callback already hides the popup and reloads the page
            } else {
              // Handle the case when registration fails
              console.error('Registration failed:', data);
              // You can display an error message or take other actions here
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            // Handle AJAX request errors here
            console.error('AJAX request failed:', textStatus, errorThrown);
            // You can display an error message or take other actions here
          },
        });
      }
    });
  </script>
	<!--=======  Footer Start ========-->
	<?php include_once("footer.php");?>
	<!--=======  Footer End  =========-->
</body>
</html>	
