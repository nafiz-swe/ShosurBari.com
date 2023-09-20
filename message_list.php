<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php require_once("includes/dbconn.php");?>

<?php
error_reporting(0);
require_once("includes/dbconn.php");
if (!isset($_SESSION['id'])) {
  // Redirect the user to the login page or display an error message
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Message | ShosurBari</title>
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
          <li class="current-page"><h4>Message</h4></li>
        </ul>
      </div>
    </div>
  </div>


  <div class="shosurbari-service">
    <div class="page_header">
      <h1>Message List</h1>
      <?php
      date_default_timezone_set('Asia/Dhaka'); // Set the timezone to Dhaka, Bangladesh
      $currentTime = date("D h:i A - d M Y");
      echo "Today: $currentTime";
      ?>
    </div>
  </div>



  



  <div id="message-list-container">
  <?php
  // Create a MySQLi connection
  require_once("includes/dbconn.php");

  // Retrieve the current user's ID
  session_start();
  $currentUserId = $_SESSION['id'];

  // Update user's active status to 0 (logged out)
  $logoutQuery = "UPDATE users SET active_status = 0, last_active_time = ? WHERE id = ?";
  $stmt = $conn->prepare($logoutQuery);
  $logoutTime = date("D h:i A - d M Y");
  $stmt->bind_param("si", $logoutTime, $currentUserId);
  $stmt->execute();

  // Retrieve all message lists from the database
  $sql = "SELECT * FROM messages WHERE outgoing_msg_user_id = ? OR incoming_msg_user_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $currentUserId, $currentUserId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result && $result->num_rows > 0) {
    $displayedUserIds = array(); // Array to store the displayed user IDs

    // Loop through each message list
    while ($row = $result->fetch_assoc()) {
      $senderId = $row['outgoing_msg_user_id'];
      $receiverId = $row['incoming_msg_user_id'];

      // Determine the ID of the other user involved in the conversation
      $otherUserId = ($senderId == $currentUserId) ? $receiverId : $senderId;

      // Check if the user ID has already been displayed
      if (in_array($otherUserId, $displayedUserIds)) {
        continue; // Skip displaying duplicate user IDs
      }

      // Add the user ID to the displayed user IDs array
      $displayedUserIds[] = $otherUserId;

      // Retrieve the other user's profile details including active status and last active time
      $userQuery = "SELECT * FROM users WHERE id = ?";
      $stmt = $conn->prepare($userQuery);
      $stmt->bind_param("i", $otherUserId);
      $stmt->execute();
      $userResult = $stmt->get_result();

      if ($userResult && $userResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        $userPic = "";
        $activeStatus = $userRow['active_status'];
        $lastActiveTime = $userRow['last_active_time'];

        // Determine the active status text and color to display
        if ($activeStatus == 1) {
          $activeStatusText = 'Active';
          $activeStatusColor = 'green';
        } else {
          $activeStatusText = 'Last Active: ';
          $activeStatusColor = '#cb0a0a';
          if ($lastActiveTime) {
            $activeStatusText .= "<span style='color: $activeStatusColor;'>$lastActiveTime</span>";
          }
        }
      }
      ?>

      <div class="message-list">
        <!-- Display the user's profile image -->
        <div class="profile-img-message">
          <?php
          $profileImgQuery = "SELECT pic1 FROM photos WHERE user_id = ?";
          $stmt = $conn->prepare($profileImgQuery);
          $stmt->bind_param("i", $otherUserId);
          $stmt->execute();
          $profileImgResult = $stmt->get_result();

          if ($profileImgResult && $profileImgResult->num_rows > 0) {
            $profileImgRow = $profileImgResult->fetch_assoc();
            $userPic = $profileImgRow['pic1'];
          }

          if (!empty($userPic)) {
            ?>
            <a href="view_profile.php?id=<?php echo $otherUserId; ?>">
              <img src="profile/<?php echo $otherUserId; ?>/<?php echo $userPic; ?>" />
            </a>
          <?php } else { ?>
            <a href="view_profile.php?id=<?php echo $otherUserId; ?>">
              <img src="images/shosurbari-male-icon.jpg" />
            </a>
          <?php } ?>
        </div>

        <!-- Display the user ID and active status -->
        <div class="message-content">
          <a href="view_profile.php?id=<?php echo $otherUserId; ?>">
            <h6>বায়োডাটা নং : <?php echo $otherUserId; ?></h6>
            <p><span style="color: <?php echo $activeStatusColor; ?>"><?php echo $activeStatusText; ?></span></p>
          </a>
        </div>
      </div>

    <?php
    }
  } else {
    echo "<script>alert(\"No message lists found\")</script>";
  }

  // Close the MySQLi connection
  $stmt->close();
  $conn->close();
  ?>
</div>




<?php include_once("footer.php");?>
	<!-- FlexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<script>
		// Can also be used with $(document).ready()
		$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
		});
	</script> 
</body>
</html>


<style>
#message-list-container{
  margin: auto;
  width: 400px;
  border: 2px solid #06b6d4;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
}

.message-list {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 10px;
  margin-bottom: 10px;
  padding: 0px;
  background: #00bbff22;
  box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);

}

.message-list:hover{
  background: #0aa4ca;
  color: #fff;
}

.message-content {
  font-size: 14px;
  font-weight: 600;
  width: 100%;
  margin-top: 2px;
  line-height: 18px;
  margin-left: -80px;
}

.message-content h6{
  font-weight: 600;
  font-size: 16px;
  margin: auto;
}

.message-content p{
  font-size: 12px;
}

.message-content a{
  color: black;
}

.message-content a:hover{
  text-decoration: none;
  color: #fff;
}

.profile-img-message {
  margin-right: 10px;
  float: left;
  width: 100%;
  height: 60px;
  margin-left: 0;
  margin-right: 0;
}

.profile-img-message img {
  height: 50px;
  width: 50px;
  object-fit: cover;
  border: 4px solid #fff;
  position: relative;
  top: 5px;
  z-index: 5;
  background: rgb(245, 242, 242);
  border-radius: 50%;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  margin: auto auto auto 20px;
  display: block;
}
</style>