
<?php
include_once("includes/basic_includes.php");
include_once("functions.php");

error_reporting(0);

function englishToBanglaNumber($number) {
  $englishDigits = range(0, 9);
  $banglaDigits = ["০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"];
  return str_replace($englishDigits, $banglaDigits, $number);
}

if (isloggedin()) {
  // Get the user ID from the session
  $userId = $_SESSION['id'];
    
  // Retrieve the user's account status from the database
  require_once("includes/dbconn.php");
  $statusSql = "SELECT deactivated FROM users WHERE id = $userId";
  $result = mysqli_query($conn, $statusSql);
  $row = mysqli_fetch_assoc($result);
  $deactivated = $row['deactivated'];

  // Query to get the total view_count for the logged-in user
  $totalViewCountSql = "SELECT view_count FROM `1bd_personal_physical` WHERE user_id = $userId";
  $result = mysqli_query($conn, $totalViewCountSql);
  $row = mysqli_fetch_assoc($result);
  $totalViewCount = $row['view_count'];


  // Convert the counts to Bangla numerals
  $totalViewCountInBangla = englishToBanglaNumber($totalViewCount);

  } else {
    header("location:login.php");
  }

  // Close the database connection
$conn->close();
?>




<!DOCTYPE HTML>
<html>

<head>
<title>My Account | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!--font-Awesome-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--font-Awesome-->

<!-- Side Bar Icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Side Bar Icon -->
</head>


<body>
  <!-- ============================  Navigation Start =========================== -->
  <?php include_once("includes/navigation.php");?>
  <!-- ============================  Navigation End ============================ -->

  <div class="grid_3">
    <div class="container">
      <div class="breadcrumb1">
        <ul>
          <a href="my-account.php"><i class="fa fa-home home_1"></i></a>
          <span class="divider">&nbsp;|&nbsp;</span>
          <li class="current-page"><h4>My Account</h4></li>
        </ul>

        <?php
          include("includes/dbconn.php");
          //getting profile details from db
          $sql="SELECT * FROM users WHERE id = $id";
          $result = mysqlexec($sql);

          if($result){
          $row=mysqli_fetch_assoc($result);
          if($row){
          $username=$row['username'];
          }
          }
        ?>

      </div>
    </div>
  </div>

  
  <div class="shosurbari-sidebar">
    <div class="leftarea-sidebar">

      <div class="shosurbari-userhome-status">
        <h3><?php echo "Welcome: $username"; ?></h3>

        <!-- Display the account status -->
        <h4 >Account Status:
            <?php if ($deactivated == 0) {
            echo '<span style="color: green;">Active</span>';
            } else {
            echo '<span style="color: red;">Deactivate</span>';
            }
            ?>
        </h4>

        <form action="deactivate_account.php" method="post">
          <?php if ($deactivated == 1) { ?>
          <button type="submit" name="action" value="activate">Activation</button>
          <?php } else { ?>
          <button type="submit" name="action" value="deactivate">Deactivation</button>
          <?php } ?>
        </form> 
      </div>


      <div class="shosurbari-account-sidebar" id="bs-megadropdown-tabs">
        <ul class="shosurbari-my-account">
          <li><a href="profile.php?/Biodata=<?php echo $id;?>"><i class='fa fa-address-card-o'></i> সম্পূর্ণ প্রোফাইল</a></li>
          <li><a href="profile-photo.php?id=<?php echo $id;?>"><i class="fa fa-image"></i> প্রোফাইল ছবি</a></li>
          <li><a href="biodata-post.php"><i class='fa fa-file-text-o'></i> বায়োডাটা পোস্ট</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i> বায়োডাটা আপডেট<span class="caret"></span> </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="update-physical-marital.php">শারীরিক/বৈবাহিক তথ্য</a></li>
              <li><a href="update-personalInfo.php">ব্যক্তিগত তথ্য</a></li>
              <li><a href="update-education.php">শিক্ষাগত তথ্য</a></li>
              <li><a href="update-address.php">ঠিকানা</a></li>
              <li><a href="update-family.php">পারিবারিক/সামাজিক</a></li>
              <li><a href="update-religion.php">ধর্মীয় বিষয়</a></li>
              <li><a href="update-partnerInfo.php">জীবনসঙ্গীর-বিবরণ</a></li>
            </ul>
          </li>

          <li><a href="account-update.php"><i class="fa fa-gear"></i> একাউন্ট আপডেট</a></li>
        </ul>
      </div>


      <div class="shosurbari-biodata-view">
        <form action="" method="post" name="SbLogForm" onsubmit="return SbLogineForm()">
          <div class="sb-biodata-total-view">
            <h3>আপনার বায়োডাটাটি দেখা হয়েছে-</h3>
            <h1><?php
              // Display the view count for the logged-in user's profile
              if (isset($totalViewCountInBangla)) {
                echo "" . $totalViewCountInBangla;
              }
              ?> বার
            </h1>
          </div>
        </form>
      </div>

    </div>



    <div class="shosurbari-user-account">
      <?php
        include("includes/dbconn.php");

        // getting profile details from db
        $sql = "SELECT * FROM customer WHERE user_id = $id";
        $result = mysqlexec($sql);

      ?>

      <table class="shosurbari-users-customer">
        <tr>
            <th>Order ID</th>
            <th>Request Biodata</th>
            <th>Total Fee</th>
            <th>Payment Method</th>
            <th>Date</th>
            <th>Status</th>
        </tr>

        <?php
        // Loop through all rows with the same user_id
        while ($row = mysqli_fetch_assoc($result)) {
            $id_customer = $row['id_customer'];
            $request_biodata_number = $row['request_biodata_number'];
            $total_fee = $row['total_fee'];
            $payment_method = $row['payment_method'];
            $request_date = $row['request_date'];

            // Display the data in the table
            echo "<tr>";
            echo "<td>SB$id_customer</td>";
            echo "<td>$request_biodata_number</td>";
            echo "<td>$total_fee</td>";
            echo "<td>$payment_method</td>";
            echo "<td>$request_date</td>";
            echo "<td>";
            if ($row['processing'] == 1) {
                echo "Processing";
            } elseif ($row['sent'] == 1) {
                echo "Sent";
            } elseif ($row['cancel'] == 1) {
                echo "Cancel";
            } else {
                echo "Unknown Status";
            }
            echo "</td>";
            echo "</tr>";
        }
        ?>
      </table>


    </div>

  </div>

<style>
  /* Table style */
.shosurbari-users-customer {
  width: 100%;
  border-collapse: collapse;
  font-family: Arial, sans-serif;
}

/* Table header style */
.shosurbari-users-customer th {
  background-color: #f2f2f2;
  text-align: left;
  padding: 8px;
}

/* Table row style */
.shosurbari-users-customer td {
  border-bottom: 1px solid #ddd;
  padding: 8px;
}

/* Alternate row color */
.shosurbari-users-customer tr:nth-child(even) {
  background-color: #f9f9f9;
}

/* Hover effect */
.shosurbari-users-customer tr:hover {
  background-color: #e2e2e2;
}



.dropdown-menu li a {
    padding: 5px 15px;
    font-weight: 410;
    font-size:14px;
    height: 40px;
    line-height: 32px;
}
</style>

  
	<!--=======================================
	How Many Visitors View This Page.
	This Script Connected to get_view_count.php
	and page_views Database Table
	========================================-->
	<script>
		$(document).ready(function() {
		// Define an array of page names (without the .php extension)
		var pages = ["my-account"];

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