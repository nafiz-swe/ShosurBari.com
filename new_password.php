<?php include_once("functions.php");?>
<?php
session_start(); // Start the session if not already started

if (isset($_SESSION['id'])) {
  // User is logged in, so redirect to my-account.php
  header("location: my-account.php");
  exit;
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Generate Password | ShosurBari</title>
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
<!-- Facebook Icon Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Facebook Icon Link -->
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
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page"><h4>New Password </h4></li>
     </ul>
   </div>
</div>
</div>




<div class="shosurbari-biodata">
    <form action="new_password.php" method="post" name="setPassword" onsubmit="return setPasswordForm()">
	<div class="flex-container">
        <div class="sb-register-login">

        <div class="soshurbari-animation-icon">
            <div class="sb-icon-laptop">
              <h3> <img src="images/shosurbari-icon.png"> ShosurBari </h3>
            </div>
        </div>

        <h2 style="text-align:left; margin-bottom:25px; padding: 10px 5px;">Set new password</h2>

            <div class="form-group">
                <!-- <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label> -->
	            <input type="text" id="email" placeholder="Account Email" name="email" value="" size="60" maxlength="60" class="form-text required">
                <span id="email_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
            </div>

            <div class="form-group">
                <!-- <label for="new-password">New Password <span class="form-required" title="This field is required.">*</span></label> -->
                <input type="password" id="pass_1" placeholder="New Password" name="new_password" size="60" maxlength="60" class="form-text required">
                <span class="show-password" style="color:#0aa4ca;  font-size:15px; top:2px;"> <i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
                <span  id="pass_1_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
            </div>

            <div class="form-group">
                <!-- <label for="new-password">Confirm Password <span class="form-required" title="This field is required.">*</span></label> -->
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



<div id="popup" class="popup">
    <div class="popup-content">
        <p id="popup-message"></p>
        <div id="countdown">Please Wait <span id="countdown-value">15</span> seconds...</div>
    </div>
    <!-- <div class="popup-buttons">
        <button id="close-button">Close</button>
    </div> -->
</div>

<script>
    // Function to show the popup with a message
    function showPopup(message, countdownDuration) {
        var popup = document.getElementById("popup");
        var popupMessage = document.getElementById("popup-message");
        var countdownValue = document.getElementById("countdown-value");
        var closeButton = document.getElementById("close-button");

        popupMessage.innerHTML = message; // Use innerHTML to interpret HTML tags
        popup.style.display = "block";

        if (countdownDuration) {
            var countdown = countdownDuration;
            countdownValue.textContent = countdown;

            var countdownInterval = setInterval(function () {
                countdown--;
                countdownValue.textContent = countdown;

                if (countdown <= 0) {
                    clearInterval(countdownInterval);
                    popup.style.display = "none";
                    // Redirect logic here
                }
            }, 1000);
        }

        closeButton.addEventListener("click", function () {
            if (countdownInterval) {
                clearInterval(countdownInterval);
            }
            popup.style.display = "none";
        });
    }
</script>


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
    displayError('pass_1', 'Please Enter Your New Password !', 'red');
    return false;
  }

  // Confirm Password validation
  if (pass_2.trim() === "") {
    displayError('pass_2', 'Please Enter Your Confirm Password !', 'red');
    return false;
  } else if (pass_2 !== pass_1) {
    displayError('pass_2', 'Your Passwords Do Not Match !', 'red');
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
    return; // Color not found in the array
  }

  var nextIndex = (currentIndex + 1) % colors.length;
  var nextColor = colors[nextIndex];

  setTimeout(function () {
    element.style.color = nextColor;
    animateColor(element, nextColor);
  }, 500); // Change color every 500 milliseconds
}

</script>





<style>
.sb-biodata-field{
    background: none;
}

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

.soshurbari-animation-icon {
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

#popup-message{
    font-size: 16px;
    text-align: justify;
    color: #fff;
    margin-top: 10px;
}
</style>


<?php
// Include database configuration file
include('includes/dbconn.php');

// Initialize variables
$email = "";
$popupMessage = ""; // Initialize the popup message

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get user's new password from form input
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    $email = $_POST['email'];

    // Check if passwords match
    if ($newPassword === $confirmPassword) {
        // Hash the new password using SHA-256 (assuming this is the same method used in auth.php)
        $hashedPassword = hash('sha256', $newPassword);

        // Prepare SQL statement to update user's password
        $sql = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
            
        // Execute SQL statement
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Password updated successfully

            // Automatic login and redirect
            $sql_login = "SELECT * FROM users WHERE email = '$email'";
            $result_login = mysqli_query($conn, $sql_login);

            if ($result_login && mysqli_num_rows($result_login) == 1) {
                $row_login = mysqli_fetch_assoc($result_login);

                $popupMessage = "ওয়াও! পাসওয়ার্ড সফলভাবে আপডেট হয়েছে৷ লগইন পেজ থেকে আপনার একাউন্ট লগইন করুন৷";

                // Output the popup message with success
                echo "<script>showPopup('$popupMessage', 15);</script>"; // Countdown duration is 5 seconds
                // Redirect to login.php
                echo '<meta http-equiv="refresh" content="15; url=login.php">'; // Redirect after 5 seconds
                exit();
            } else {
                $popupMessage = " দুঃখিত! ই-মেইলটি রেজিস্টারকৃত ই-মেইল না, অনুগ্রহ করে রেজিস্টারকৃত ই-মেইল প্রবেশ করুন।";
                echo "<script>showPopup('$popupMessage', 15);</script>"; // Countdown duration is 5 seconds
            }
        } else {
            $popupMessage = "উফ দুঃখিত! পাসওয়ার্ড আপডেট করার সময় একটি ত্রুটি ছিল৷ অনুগ্রহ করে আবার চেষ্টা করুন।" . mysqli_error($conn);
            echo "<script>showPopup('$popupMessage', 15);</script>"; // Countdown duration is 5 seconds
        }
    } else {
        $popupMessage = "উফ দুঃখিত! নিউ পাসওয়ার্ড এবং কনফার্ম পাসওয়ার্ড মিলছে না।";
        echo "<script>showPopup('$popupMessage', 15);</script>"; // Countdown duration is 5 seconds
    }

    // Output the popup message with error
    echo "<script>showPopup('$popupMessage');</script>";
}
?>





    <!--=======================================
    How Many Visitors View This Page.
    This Script Connected to get_view_count.php
    and page_views Database Table
    ========================================-->
    <script>
		$(document).ready(function() {
		// Define an array of page names (without the .php extension)
		var pages = ["new_password"];

		// Fetch and display view counts for each page
		for (var i = 0; i < pages.length; i++) {
			var page = pages[i];
			$.ajax({
			url: 'get_view_count.php?page=' + page, // Adjust the URL to your PHP script
			type: 'GET',
			success: function(data) {
			$('#viewCount' + page.replace("_", "")).html(data);
			}
			});
		}
		});
  	</script>


	<!--=======  Footer Start ========-->
	<?php include_once("footer.php");?>
	<!--=======  Footer End  =========-->


    

</body>
</html>	
