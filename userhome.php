


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

// Query to get the view_count for the last month
$lastMonthStart = date('Y-m-d', strtotime('-1 month'));
$lastMonthViewCountSql = "SELECT SUM(view_count) as last_month_count FROM `page_views` WHERE page_name = '$userId' AND STR_TO_DATE(last_update, '%e %M %Y, %h:%i:%s %p') >= '$lastMonthStart'";
$result = mysqli_query($conn, $lastMonthViewCountSql);
$row = mysqli_fetch_assoc($result);
$lastMonthCount = $row['last_month_count'];

// Query to get the view_count for the last week
$lastWeekStart = date('Y-m-d', strtotime('-1 week'));
$lastWeekViewCountSql = "SELECT SUM(view_count) as last_week_count FROM `page_views` WHERE page_name = '$userId' AND STR_TO_DATE(last_update, '%e %M %Y, %h:%i:%s %p') >= '$lastWeekStart'";
$result = mysqli_query($conn, $lastWeekViewCountSql);
$row = mysqli_fetch_assoc($result);
$lastWeekCount = $row['last_week_count'];

// Query to get the view_count for today
$todayStart = date('Y-m-d') . ' 00:00:00';
$todayViewCountSql = "SELECT SUM(view_count) as today_count FROM `page_views` WHERE page_name = '$userId' AND STR_TO_DATE(last_update, '%e %M %Y, %h:%i:%s %p') >= '$todayStart'";
$result = mysqli_query($conn, $todayViewCountSql);
$row = mysqli_fetch_assoc($result);
$todayCount = $row['today_count'];

// Convert the counts to Bangla numerals
$totalViewCountInBangla = englishToBanglaNumber($totalViewCount);
$lastMonthCountInBangla = englishToBanglaNumber($lastMonthCount);
$lastWeekCountInBangla = englishToBanglaNumber($lastWeekCount);
$todayCountInBangla = englishToBanglaNumber($todayCount);

} else {
    header("location:login.php");
}

// Close the database connection
$conn->close();
?>




<!DOCTYPE HTML>
<html>

<head>
<title>User Home | ShosurBari</title>
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
          <li class="current-page"><h4>User Home</h4></li>
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


  <div class="navigationpro">

    <div class="shosurbari-userhome-status">
      <h3><?php echo "Welcome: $username"; ?></h3>

      <!-- Display the account status -->
      <h4 >Account Status:
        <?php if ($deactivated == 0) {
          echo '<span style="color: green;">Active</span>';
          } else {
          echo '<span style="color: red;">Deactivated</span>';
          }
        ?>
      </h4>

      <form action="deactivate_account.php" method="post">
        <?php if ($deactivated == 1) { ?>
          <button type="submit" name="action" value="activate">Activate Account</button>
          <?php } else { ?>
          <button type="submit" name="action" value="deactivate">Deactivate Account</button>
        <?php } ?>
      </form>



      <div class="shosurbari-biodata-form">
        <div class="shosurbari-animation-form">
          <form action="" method="post" name="SbLogForm" onsubmit="return SbLogineForm()">
            <div class="sb-biodata-amount-list">
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
            
    </div>


    <div class="collapse_userprofile navbar-collapseprofile" id="bs-megadropdown-tabs">
      <ul class="nav navbar-nav nav_1">
        <li><a href="view_profile.php?id=<?php echo $id;?>">সম্পূর্ণ প্রোফাইল</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">বায়োডাটা/ছবি পোস্ট<span class="caret"></span> </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="biodata_post.php?id=<?php echo $id;?>">বায়োডাটা পোস্ট</a></li>
            <li><a href="photoupdate.php?id=<?php echo $id;?>">ছবি আপলোড/ডিলেট</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">বায়োডাটা আপডেট<span class="caret"></span> </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="physical_marital.php?id=<?php echo $id;?>">শারীরিক/বৈবাহিক তথ্য</a></li>
            <li><a href="personal_info.php?id=<?php echo $id;?>">ব্যক্তিগত তথ্য</a></li>
            <li><a href="education.php?id=<?php echo $id;?>">শিক্ষাগত তথ্য</a></li>
            <li><a href="address.php?id=<?php echo $id;?>">ঠিকানা</a></li>
            <li><a href="family.php?id=<?php echo $id;?>">পারিবারিক/সামাজিক</a></li>
            <li><a href="religion.php?id=<?php echo $id;?>">ধর্মীয় বিষয়</a></li>
            <li><a href="partner.php?id=<?php echo $id;?>">জীবনসঙ্গীর-বিবরণ</a></li>
          </ul>
        </li>

        <li><a href="accountupdate.php?id=<?php echo $id;?>">একাউন্ট</a></li>
        <!-- <li><a href="message_list.php?id=<?php echo $id;?>">মেসেজ</a></li> -->
        <!-- <li><a href="message_list.php?id=<?php echo $id;?>">মেসেজ List</a></li> -->
      </ul>
    </div>
  </div>




<style>
.sb-biodata-amount-list{
  margin: 15px auto;
  width: 100%;
  text-align: left;
  padding: 6px;
}

.sb-biodata-amount-list h1{
  font-size: 28px;
}

.sb-biodata-amount-list h3{
  font-size: 16px;
  line-height: 22px;
  margin-bottom: 5px;
}

.shosurbari-biodata-form {
  align-items: center;
  flex-wrap: wrap;
  width: 1400px;
  margin: auto;
  padding-top: 30px;
  padding-bottom: 30px
}


.shosurbari-biodata-form {
  align-items: center;
  flex-wrap: wrap;
  width: 1400px;
  margin: auto;
  margin-top: 25px;
  padding-top: 0px;
  padding-bottom: 30px
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

  <style>
@media (max-width: 768px){
.shosurbari-userhome-status {
  padding: 0px;
  margin: 20px auto auto auto;
}

.shosurbari-userhome-status h4,
.shosurbari-userhome-status h3,
.sb-biodata-amount-list h1 {
  text-align: center;
}
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
		var pages = ["userhome"];

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