<?php include_once("functions.php");?>
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
        <span class="divider">&nbsp;<|>&nbsp;</span>
        <li class="current-page"><h4>New Password </h4></li>
     </ul>
   </div>
</div>
</div>




<div class="shosurbari-biodata">
    <form action="new_password.php" method="post">
	<div class="flex-container">
        <div class="sb-register-login">

        <h2 style="text-align:center; margin-bottom:25px; padding: 10px 5px;">New Password</h2>

            <div class="form-group">
                <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
	            <input type="text" id="email_or_username" placeholder="Your Email" name="email" value="" size="60" maxlength="60" class="form-text required" required>
            </div>

            <div class="form-group">
                <label for="new-password">New Password <span class="form-required" title="This field is required.">*</span></label>
                <input type="password" id="new-password" placeholder="Enter New Password" name="new_password" size="60" maxlength="60" class="form-text required" required>
            </div>

            <div class="form-group">
                <label for="new-password">Confirm Password <span class="form-required" title="This field is required.">*</span></label>
	            <input type="password" id="confirm-password" placeholder="Enter Confirm Password" name="confirm_password" size="60" maxlength="60" class="form-text required" required>
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
        <span id="popup-message"></span>
        <div id="countdown">Wait <span id="countdown-value">10</span> seconds...</div>
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


<style>
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

                $popupMessage = "Password updated successfully! Auto redirect to Login Page";

                // Output the popup message with success
                echo "<script>showPopup('$popupMessage', 15);</script>"; // Countdown duration is 5 seconds
                // Redirect to login.php
                echo '<meta http-equiv="refresh" content="10; url=login.php">'; // Redirect after 5 seconds
                exit();
            } else {
                $popupMessage = "Email is not registered. Please enter a valid email.";
                echo "<script>showPopup('$popupMessage', 10);</script>"; // Countdown duration is 5 seconds
            }
        } else {
            $popupMessage = "Error updating password: " . mysqli_error($conn);
            echo "<script>showPopup('$popupMessage', 10);</script>"; // Countdown duration is 5 seconds
        }
    } else {
        $popupMessage = "Passwords do not match.";
        echo "<script>showPopup('$popupMessage', 10);</script>"; // Countdown duration is 5 seconds
    }

    // Output the popup message with error
    echo "<script>showPopup('$popupMessage');</script>";
}
?>


<?php
// // Include database configuration file
// include('includes/dbconn.php');

// // Initialize variables
// $email = "";

// // Check if form is submitted
// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     // Get user's new password from form input
//     $newPassword = $_POST['new_password'];
//     $confirmPassword = $_POST['confirm_password'];
//     $email = $_POST['email'];

//     // Check if passwords match
//     if ($newPassword === $confirmPassword) {
//         // Hash the new password using SHA-256 (assuming this is the same method used in auth.php)
//         $hashedPassword = hash('sha256', $newPassword);

//         // Prepare SQL statement to update user's password
//         $sql = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
            
//         // Execute SQL statement
//         $result = mysqli_query($conn, $sql);

//         if ($result) {
//             // Password updated successfully
            
//             // Automatic login and redirect
//             $sql_login = "SELECT * FROM users WHERE email = '$email'";
//             $result_login = mysqli_query($conn, $sql_login);

//             if ($result_login && mysqli_num_rows($result_login) == 1) {
//                 $row_login = mysqli_fetch_assoc($result_login);

//                 echo "Password updated successfully!<br>";
//                 // Redirect to userhome.php
//                 echo '<meta http-equiv="refresh" content="4; url=login.php">'; // Redirect after 3 seconds
//                 exit();
//             } else {
//                 echo "Email is not registered. Please enter a valid email.";
//             }
//         } else {
//             echo "Error updating password: " . mysqli_error($conn);
//         }
//     } else {
//         echo "Passwords do not match.";
//     }
// }
?>




<?php
// // Include database configuration file
// include('includes/dbconn.php');

// // Check if form is submitted
// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     // Get user's new password from form input
//     $newPassword = $_POST['new_password'];
//     $confirmPassword = $_POST['confirm_password'];
//     $email = $_POST['email'];

//     // Check if passwords match
//     if ($newPassword === $confirmPassword) {
//         // Hash the new password using SHA-256 (assuming this is the same method used in auth.php)
//         $hashedPassword = hash('sha256', $newPassword);

//         // Prepare SQL statement to update user's password
//         $sql = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
            
//         // Execute SQL statement
//         $result = mysqli_query($conn, $sql);

//         if ($result) {
//             // Password updated successfully
//             echo "Password updated successfully!<br>";
//             echo '<meta http-equiv="refresh" content="3; url=login.php">'; // Redirect after 3 seconds
//         } else {
//             echo "Error updating password: " . mysqli_error($conn);
//         }
//     } else {
//         echo "Passwords do not match.";
//     }
// }
?>



<?php include_once("footer.php");?>

</body>
</html>	
