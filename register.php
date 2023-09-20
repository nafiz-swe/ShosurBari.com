<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php register(); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>


<head>
<title>Register | ShosurBari</title>
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

<!-- Country Code with Flag for Number input field -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />

<!--font-Awesome-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--font-Awesome-->
</head>


<body>
  <!-- ============================  Navigation Start =========================== -->
  <?php include_once("includes/navigation.php");?>
  <!-- ============================  Navigation End ============================ -->

  <div class="grid_3">
    <div class="container">
      <div class="breadcrumb1">
        <ul>
          <a href="index.php"><i class="fa fa-home home_1"></i></a>
          <span class="divider">&nbsp;<|>&nbsp;</span>
          <li class="current-page"><h4>Register</h4></li>
        </ul>
      </div>
    </div>
  </div>



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
            <input type="text" id="fname" placeholder="Full Name" name="fname" value="" size="60" maxlength="60" class="form-text required">
            <span id="fname_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

          <div class="form-group">
            <!-- <label for="edit-name">Username<span class="form-required" title="This field is required.">*</span></label> -->
            <input type="text" id="uname" placeholder="Username" name="uname" value="" size="60" maxlength="60" class="form-text required">
            <span id="uname_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

          <div class="form-group">
            <!-- <label for="edit-name">Emails<span class="form-required" title="This field is required.">*</span></label> -->
            <input type="text" id="email" placeholder="Email" name="email" value="" size="60" maxlength="60" class="form-text required">
            <span id="email_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

          <div class="form-group">
            <!--  <label for="edit-name">Phone Number<span class="form-required" title="This field is required.">*</span></label> -->
            <input type="pnumber" id="pnumber" placeholder="Phone Number" name="pnumber" value="" size="60" minlength="10" maxlength="15" class="form-text required">
            <span id="pnumber_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

          <div class="form-group">
            <!-- <label for="edit-pass">Password<span class="form-required" title="This field is required.">*</span></label> -->
            <input type="password" id="pass_1" placeholder="New Password" name="pass_1" size="60" maxlength="128" class="form-text required">
            <span class="show-password" style="color:#0aa4ca;  font-size:15px; top:2px;"> <i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
            <span  id="pass_1_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
          </div>

          <div class="form-group">
            <!-- <label for="edit-pass">Confirm Password<span class="form-required" title="This field is required.">*</span></label> -->
            <input type="password" id="pass_2" placeholder="Confirm Password" name="pass_2" size="60" maxlength="128" class="form-text required">
            <span class="show-password" style="color:#0aa4ca;  font-size:15px; top:2px;"> <i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
            <span  id="pass_2_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
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
		        <span style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;" id="gender-error" class="error"></span>
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

        </div>
      </div>
	  </form>
  
    </div>
  </div>



  <!-- Email Body Start -->
  <div id="popup" class="popup">
    <div class="popup-content">
        <span id="popup-message"></span>
        <div class="popup-buttons">
            <button id="close-button">Close</button>
        </div>
    </div>
</div>

<script>
   // Function to show the popup with a message
    function showPopup(message) {
        var popup = document.getElementById("popup");
        var popupMessage = document.getElementById("popup-message");
        var closeButton = document.getElementById("close-button");

        popupMessage.innerHTML = message; // Use innerHTML to interpret HTML tags
        popup.style.display = "block";

        closeButton.addEventListener("click", function () {
            popup.style.display = "none";
        });
    }
</script>

<?php
// Include database configuration file
include('includes/dbconn.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    // Get user's email from form input
    $email = $_POST['email'];

    
    // Prepare SQL statement to fetch user's password
    $sql = "SELECT password FROM users WHERE email = '$email'";
    
    // Execute SQL statement
    $result = mysqli_query($conn, $sql);
    
    // Check if user exists in the database
    if (mysqli_num_rows($result) > 0) {
        
        // Fetch user's password from the database
        $row = mysqli_fetch_assoc($result);
        $fullname = $_POST['fname'];
        $username = $_POST['uname'];
        $email = $_POST['email'];
        $number = $_POST['pnumber'];
        $gender = $_POST['gender'];
        $password = $row['password'];


        // Set up SMTP configuration for Gmail
        $to = $email;
        $subject = "Wlcome to ShosurBari";
        
        // HTML version of the email body
        ob_start();
        include('RegisterEmailBody.php');
        $email_body = ob_get_clean();
        
        // Plain text version of the email body
        // $plain_text_message = "Your ShosurBari Password\n\nA request has been made to retrieve the password for logging into your account.\n\nYour password is: $password\n\nYour Email is: $email\n\nLogin your account: https://www.shoshurbari.rf.gd/login.php\n\nNote: Please remember to keep your passwords and usernames secure. Do not share them with anyone.\n\n[fa fa-facebook]:https://www.facebook.com/ShoshurBari.bd\nhttps://www.yourwebsite.com\nhttps://www.facebook.com\nhttps://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\n\n(c) 2022-23 ShosurBari.com | All Rights Reserved";
          $plain_text_message = "
          Welcome to ShosurBari!
          
          Thank you for registering at ShosurBari. Here are your registration details:
          
          Biodata Number: $id
          Full Name: $fullname
          Username: $username
          Email: $email
          Phone Number: $number
          Gender: $gender
          Passwors: $password

          
          Login to your account: https://www.shoshurbari.rf.gd/login.php
          
          Note: Please remember to keep your passwords secure. Do not share them with anyone.
          
          Connect with us:
          - Website: https://www.shoshurbari.com
          - Facebook: https://www.facebook.com/ShoshurBari.bd
          - Email: support@shoshurbari.com
          - YouTube: https://www.youtube.com/c/ShoshurBari
          
          (c) 2022-23 ShosurBari.com | All Rights Reserved
          ";
        // Headers
        $headers = "From: nafizulislam.swe@gmail.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Gmail SMTP configuration
        $smtp_host = "smtp.gmail.com";
        $smtp_port = 587;
        $smtp_username = "nafizulislam.swe@gmail.com"; // Your Gmail email
        $smtp_password = "dnngvzwetnirboae"; // Your Gmail password
        $smtp_secure = "tls"; // Use 'ssl' for SSL encryption
        
        // Configure PHPMailer
        require 'PHPMailer/PHPMailerAutoload.php';
        
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = $smtp_host;
        $mail->Port = $smtp_port;
        $mail->SMTPSecure = $smtp_secure;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $smtp_password;
        
        $mail->setFrom($smtp_username, 'ShosurBari');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $email_body;
        $mail->AltBody = $plain_text_message; // Plain text version of the email
        
        if ($mail->send()) {
          // Email sent successfully
          echo '<script>alert("Registration successful. Check your email for confirmation.");</script>';
        } else {
          // Error sending email
        echo '<script>alert("Error sending registration confirmation email. Please try again later.");</script>';
      }
    } 
  }
?>


<?php
// Include necessary files and database configuration
include('includes/dbconn.php');
require 'PHPMailer/PHPMailerAutoload.php'; // Make sure this path is correct

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once("functions.php");
    
    // Call the register function to handle registration logic
    register();
    
    // Assuming you have collected user details in variables like $fname, $uname, $email, $pnumber, $gender

    // Set up SMTP configuration for Gmail
    $to = $email;
    $subject = "Welcome to ShosurBari!";

    // HTML version of the email body
    ob_start();
    include('RegisterEmailBody.php'); // Include your registration email body template
    $email_body = ob_get_clean();


    // Plain text version of the email body



    // Headers
    $headers = "From: nafizulislam.swe@gmail.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Gmail SMTP configuration
    $smtp_host = "smtp.gmail.com";
    $smtp_port = 587;
    $smtp_username = "nafizulislam.swe@gmail.com"; // Your Gmail email
    $smtp_password = "qsjjbejxbottlwry"; // Your Gmail password
    $smtp_secure = "tls"; // Use 'ssl' for SSL encryption

    // Configure PHPMailer
    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = $smtp_host;
    $mail->Port = $smtp_port;
    $mail->SMTPSecure = $smtp_secure;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;

    $mail->setFrom($smtp_username, 'ShosurBari');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $email_body;
    $mail->AltBody = $plain_text_message; // Plain text version of the email

    

}
?>

  <!-- Email Body End -->



  <?php include_once("footer.php");?>


</body>
</html>	





<!-- Phone Number Country Code With Country Flag -->
<script>
  $(document).ready(function() {
    var input = document.querySelector("#pnumber");
    window.intlTelInput(input, {
    separateDialCode: true,
    preferredCountries: ["bd"]
    });
  });
</script>





<!-- Phone Number Country Code With Country Flag -->
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




<!-- Gender Selection -->
<script>
  const form = document.querySelector('form');
  const maleRadio = document.querySelector('#male');
  const femaleRadio = document.querySelector('#female');
  const genderError = document.querySelector('#gender-error');
  const genderSelectReg = document.querySelector('#gender-select-reg');

  form.addEventListener('submit', (e) => {
    let errors = 0;

    if (!maleRadio.checked && !femaleRadio.checked) {
      document.getElementById('gender-select-reg').style.borderColor = "red";
      genderError.innerHTML = 'Please Select Your Gender!';
      genderError.style.display = 'block';
      document.querySelectorAll('input[name=gender]').forEach(r => {
      r.classList.add('error');
      });

      // Color animation
      let colorIndex = 0;
      const colors = ['green', 'blue', 'red'];
      const animationInterval = setInterval(() => {
      genderError.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);

    errors++;
    }

    if (maleRadio.checked || femaleRadio.checked) {
      genderError.innerHTML = '';
      genderError.style.display = 'none';
      document.querySelectorAll('input[name=gender]').forEach(r => {
      r.classList.remove('error');
      });
    }

    if (errors > 0) {
      e.preventDefault();
      window.scrollTo(0, 0);
    }
  });

  function genderSelected(radio) {
    genderError.style.display = 'none';
    document.querySelectorAll('input[name=gender]').forEach(r => {
    r.classList.remove('error');
    });

    if (radio.value === 'Male') {
      genderSelectReg.style.borderColor = 'green';
    } else if (radio.value === 'Female') {
      genderSelectReg.style.borderColor = 'green';
    }
  }
</script>





<!--  Form Input field when error then show border red and scroll - JS start -->
<script>
  function validateForm(){
    var fname = document.forms["myForm"]["fname"].value;
    var uname = document.forms["myForm"]["uname"].value;
    var email = document.forms["myForm"]["email"].value;
    var pnumber = document.forms["myForm"]["pnumber"].value;
    var pass_1 = document.forms["myForm"]["pass_1"].value;
    var pass_2 = document.forms["myForm"]["pass_2"].value;



    
    //Full Name validation
    if (fname == "") {
      document.getElementById('fname').style.borderColor = "red";
      document.getElementById('fname').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });

      var errorDiv = document.getElementById('fname_error');
      errorDiv.innerHTML = "Please Enter Your Full Name !";
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
    document.getElementById('fname').style.borderColor = "green";
    document.getElementById('fname_error').innerHTML = "";
    }




    //Username validation
    if (uname == "") {
      document.getElementById('uname').style.borderColor = "red";
      document.getElementById('uname').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });

      var errorDiv = document.getElementById('uname_error');
      errorDiv.innerHTML = "Please Enter Your Username !";
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

    }else if (! /^[A-Za-z0-9]+$/.test(uname)){
      document.getElementById('uname').style.borderColor = "red";
      document.getElementById('uname').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });

      var errorDiv = document.getElementById('uname_error');
      errorDiv.innerHTML = "Please Enter Only Letters And Numbers. Can Not Used Any Symbol & Space !";
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
    document.getElementById('uname').style.borderColor = "green";
    document.getElementById('uname_error').innerHTML = "";
    }



    
    //Email validation
    if (email == "") {
      document.getElementById('email').style.borderColor = "red";
      document.getElementById('email').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });

      var errorDiv = document.getElementById('email_error');
      errorDiv.innerHTML = "Please Enter Your Email !";
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

    }else if(! /^[a-zA-Z0-9._-]+@(gmail|outlook|hotmail|yahoo).com$/.test(email)){
      document.getElementById('email').style.borderColor = "red";
      document.getElementById('email').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });

      var errorDiv = document.getElementById('email_error');
      errorDiv.innerHTML = "Please Enter a Valid Email. Only Used: (@gmail or @outlook or @hotmail or @yahoo).com";
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
    document.getElementById('email').style.borderColor = "green";
    document.getElementById('email_error').innerHTML = "";
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
      errorDiv.innerHTML = "Please Enter Your Phone Number !";
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

    } else if (!/^[0-9]{10,13}$/.test(pnumber)) {
      var pnumberElement = document.getElementById('pnumber');
      pnumberElement.style.borderColor = "red";
      pnumberElement.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });

      var errorDiv = document.getElementById('pnumber_error');
      errorDiv.innerHTML = "Phone Number Must Be Between 10 To 14 Digits. Don't Used Space & Plus Symbol !";
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

    } else {
    document.getElementById('pnumber').style.borderColor = "green";
    document.getElementById('pnumber_error').innerHTML = "";
    }



      
    //Password validation
    if (pass_1 == "") {
      document.getElementById('pass_1').style.borderColor = "red";
      document.getElementById('pass_1').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });

      var errorDiv = document.getElementById('pass_1_error');
      errorDiv.innerHTML = "Please Enter Your New Password !";
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
    document.getElementById('pass_1').style.borderColor = "green";
    document.getElementById('pass_1_error').innerHTML = "";
    }

      


    //Confirm Password validation
    if (pass_2 == "") {
      document.getElementById('pass_2').style.borderColor = "red";
      document.getElementById('pass_2').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });

      var errorDiv = document.getElementById('pass_2_error');
      errorDiv.innerHTML = "Please Enter Your Confirm Password !";
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

    }else if(pass_2 != pass_1){
      document.getElementById('pass_2').style.borderColor = "red";
      document.getElementById('pass_2').scrollIntoView({
      behavior: 'smooth',
      block: 'center',
      });

      var errorDiv = document.getElementById('pass_2_error');
      errorDiv.innerHTML = "Your Password Do Not Match !";
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
    document.getElementById('pass_2').style.borderColor = "green";
    document.getElementById('pass_2_error').innerHTML = "";
    }


  }
  //Form Input field when error then show border red and scroll - JS End
</script>




<!-- Agree with Term & Conditions + Privacy & Policy Check Box -->
<script>
  function toggleSubmitButton(checked) {
    var submitButton = document.getElementById("edit-submit");
    submitButton.style.display = checked ? "block" : "none";
  }
</script>