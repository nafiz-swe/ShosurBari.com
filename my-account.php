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
  $userId = $_SESSION['id'];
  require_once("includes/dbconn.php");
  $statusSql = "SELECT deactivated FROM users WHERE id = $userId";
  $result = mysqli_query($conn, $statusSql);
  $row = mysqli_fetch_assoc($result);
  $deactivated = $row['deactivated'];
  $totalViewCountSql = "SELECT view_count FROM `1bd_personal_physical` WHERE user_id = $userId";
  $result = mysqli_query($conn, $totalViewCountSql);
  $row = mysqli_fetch_assoc($result);
  $totalViewCount = $row['view_count'];
  $totalViewCountInBangla = englishToBanglaNumber($totalViewCount);
  } else {
    header("location:login.php");
  }
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
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
  <style>
  table {
    border-collapse: collapse;
    width: max-content;
  }
  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
  }
  th:nth-child(6), th:nth-child(7), th:nth-child(8), th:nth-child(9), th:nth-child(10),
  th:nth-child(11), th:nth-child(12), th:nth-child(13), th:nth-child(14), th:nth-child(15) {
    max-width: 320px;
    min-width: 320px;
  }
  th:nth-child(1), th:nth-child(2), th:nth-child(3) {
    max-width: 130px;
    min-width: 130px;
  }
  th:nth-child(4), th:nth-child(5) {
    max-width: 170px;
    min-width: 170px;
  }
  .shosurbari-users-request {
    width: 100%;
    margin-bottom: 20px;
  }
  .shosurbari-users-request th {
    background-color: #f2f2f2;
    text-align: center;
    padding: 8px;
  }
  td, th {
    border: 1px solid #ccc;
  }
  .shosurbari-users-request td {
    padding: 12px 10px;
  }
  td a, td a:hover{
    text-decoration: none;
  }
  .biodata-link {
    position: relative;
    text-decoration: none;
  }
  .biodata-link .view-button {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 8px;
    background: linear-gradient(#0aa4ca, #06b6d4);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  .biodata-link:hover .view-button {
    display: block;
  }
  .biodata-link:hover::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    z-index: 999;
  }
  .biodata-link:hover::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #333;
    font-weight: bold;
    z-index: 1000;
  }
  .shosurbari-users-request tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  .shosurbari-users-request tr:hover {
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
          <li><a href="my-account.php"><i class="fa fa-dashboard"></i> ড্যাশবোর্ড</a></li>
          <li><a href="biodata-post.php"><i class='fa fa-file-text-o'></i> বায়োডাটা পোস্ট</a></li>
          <li><a href="profile-photo.php?id=<?php echo $id;?>"><i class="fa fa-image"></i> বায়োডাটার ছবি</a></li>
          <li><a href="profile.php?/Biodata=<?php echo $id;?>"><i class='fa fa-address-card-o'></i> সম্পূর্ণ বায়োডাটা</a></li>
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
          <li><a href="search.php"><i class="fa fa-search"></i> বায়োডাটা খুঁজুন</a></li>
          <li><a href="account-update.php"><i class="fa fa-gear fa-spin"></i> একাউন্ট আপডেট</a></li>
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
    <div class="shosurbari-dashboard">
      <?php
      include("includes/dbconn.php");
      $id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
      $sql = "SELECT * FROM customer WHERE user_id = $id";
      $result = mysqlexec($sql);
      $sql2 = "SELECT * FROM customer_sent_info_complete WHERE user_id = $id";
      $result2 = mysqlexec($sql2);
      ?>
      <h1>রিকোয়েস্ট বায়োডাটা পেমেন্ট তথ্য </h1>
      <p style="margin-bottom: 20px;"><i class="fa fa-bell" style="color: #0aa4ca; margin-right: 10px;"></i>যেকোনো বায়োডাটার অভিভাবকের সাথে যোগাযোগ করতে আগ্রহ হইলে, সার্ভিস চার্জ প্রদান করার পর এখানে পেমেন্ট তথ্য দেখতে পাবেন।</p>
      <div class="shosurbari-order-dashboard">
        <table class="shosurbari-users-request">
          <tr>
            <th>স্ট্যাটাস</th>
            <th>রিকোয়েস্ট আইডি</th>
            <th>ই-মেইল</th>
            <th>মোবাইল নাম্বার</th>
            <th>পেমেন্ট মেথড</th>
            <th>মোট টাকা</th>
            <th>পছন্দের বায়োডাটা</th>
            <th>পেমেন্ট মোবাইল নাম্বার</th>
            <th>ট্রানজেকশন আইডি</th>
            <th>রিকোয়েস্ট তারিখ</th>
          </tr>
          <?php
            while ($row = mysqli_fetch_assoc($result)) {
              $id_customer = $row['id_customer'];
              $cust_email = $row['cust_email'];
              $cust_number = $row['cust_number'];
              $request_biodata_number = $row['request_biodata_number'];
              $total_fee = $row['total_fee'];
              $payment_method = $row['payment_method'];
              $bkash_number = $row['bkash_number'];
              $bkash_transaction_id = $row['bkash_transaction_id'];
              $nagad_number = $row['nagad_number'];
              $nagad_transaction_id = $row['nagad_transaction_id'];
              $roket_number = $row['roket_number'];
              $roket_transaction_id = $row['roket_transaction_id'];
              $request_date = $row['request_date'];
              echo "<tr>";
              echo "<td style='color: white; text-align: center; ";
              if ($row['processing'] == 1) {
              echo "background-color: orange;'>Processing";
              } elseif ($row['sent'] == 1) {
              echo "background-color: #22c55e;'>Sent";
              } elseif ($row['cancel'] == 1) {
              echo "background-color: #ff0080;'>Invalid";
              } else {
              echo "background-color: gray;'>Unknown";
              }
              echo "</td>";
              echo "<td>SB$id_customer</td>";
              echo "<td>$cust_email</td>";
              echo "<td>$cust_number</td>";
              echo "<td>$payment_method</td>";
              echo "<td>$total_fee</td>";
              echo "<td>$request_biodata_number</td>";
              echo "<td>";
              switch ($payment_method) {
              case 'বিকাশ':
              echo $bkash_number;
              break;
              case 'নগদ':
              echo $nagad_number;
              break;
              case 'রকেট':
              echo $roket_number;
              break;
              default:
              echo "N/A";
              }
              echo "</td>";
              echo "<td>";
              switch ($payment_method) {
              case 'বিকাশ':
              echo $bkash_transaction_id;
              break;
              case 'নগদ':
              echo $nagad_transaction_id;
              break;
              case 'রকেট':
              echo $roket_transaction_id;
              break;
              default:
              echo "N/A";
              }
              echo "</td>";
              echo "<td>$request_date</td>";
              echo "</tr>";
            }
          ?>
        </table>
      </div>
      <h1>অভিভাবকের সাথে যোগাযোগের তথ্য </h1>
      <div class="shosurbari-receive-dashboard">
        <table class="shosurbari-users-request">
          <tr>
            <th>রিসিভ আইডি</th>
            <th>রিকোয়েস্ট আইডি</th>
            <th>মোট বায়োডাটা</th>
            <th>পেমেন্ট তারিখ</th>
            <th>রিসিভ তারিখ</th>
            <th>বায়োডাটার তথ্য-১</th>
            <th>বায়োডাটার তথ্য-২</th>
            <th>বায়োডাটার তথ্য-৩</th>
            <th>বায়োডাটার তথ্য-৪</th>
            <th>বায়োডাটার তথ্য-৫</th>
            <th>বায়োডাটার তথ্য-৬</th>
            <th>বায়োডাটার তথ্য-৭</th>
            <th>বায়োডাটার তথ্য-৮</th>
            <th>বায়োডাটার তথ্য-৯</th>
            <th>বায়োডাটার তথ্য-১০</th>
          </tr>
          <?php
          while ($row2 = mysqli_fetch_assoc($result2)) {
            $id = $row2['id'];
            $payment_order_id = $row2['payment_order_id'];
            $payment_biodata_quantity = $row2['payment_biodata_quantity'];
            $cust_payment_date = $row2['cust_payment_date'];
            $info_sent_time = $row2['info_sent_time'];
            // Biodata Infi 1
            $biodata_number_1 = $row2['biodata_number_1'];
            $biodata_guardian_1 = $row2['biodata_guardian_1'];
            $biodata_patropatri_1 = $row2['biodata_patropatri_1'];
            // Biodata Infi 2
            $biodata_number_2 = $row2['biodata_number_2'];
            $biodata_guardian_2 = $row2['biodata_guardian_2'];
            $biodata_patropatri_2 = $row2['biodata_patropatri_2'];
            // Biodata Infi 3
            $biodata_number_3 = $row2['biodata_number_3'];
            $biodata_guardian_3 = $row2['biodata_guardian_3'];
            $biodata_patropatri_3 = $row2['biodata_patropatri_3'];
            // Biodata Infi 4
            $biodata_number_4 = $row2['biodata_number_4'];
            $biodata_guardian_4 = $row2['biodata_guardian_4'];
            $biodata_patropatri_4 = $row2['biodata_patropatri_4'];
            // Biodata Infi 5
            $biodata_number_5 = $row2['biodata_number_5'];
            $biodata_guardian_5 = $row2['biodata_guardian_5'];
            $biodata_patropatri_5 = $row2['biodata_patropatri_5'];
            // Biodata Infi 6
            $biodata_number_6 = $row2['biodata_number_6'];
            $biodata_guardian_6 = $row2['biodata_guardian_6'];
            $biodata_patropatri_6 = $row2['biodata_patropatri_6'];
            // Biodata Infi 7
            $biodata_number_7 = $row2['biodata_number_7'];
            $biodata_guardian_7 = $row2['biodata_guardian_7'];
            $biodata_patropatri_7 = $row2['biodata_patropatri_7'];
            // Biodata Infi 8
            $biodata_number_8 = $row2['biodata_number_8'];
            $biodata_guardian_8 = $row2['biodata_guardian_8'];
            $biodata_patropatri_8 = $row2['biodata_patropatri_8'];
            // Biodata Infi 9
            $biodata_number_9 = $row2['biodata_number_9'];
            $biodata_guardian_9 = $row2['biodata_guardian_9'];
            $biodata_patropatri_9 = $row2['biodata_patropatri_9'];
            // Biodata Infi 10
            $biodata_number_10 = $row2['biodata_number_10'];
            $biodata_guardian_10 = $row2['biodata_guardian_10'];
            $biodata_patropatri_10 = $row2['biodata_patropatri_10'];
            echo "<tr>";
            echo "<td style='background: #22c55e; color: #fff;'>SB$id</td>";
            echo "<td>$payment_order_id</td>";
            echo "<td>$payment_biodata_quantity</td>";
            echo "<td>$cust_payment_date</td>";
            echo "<td>$info_sent_time</td>";
            for ($i = 1; $i <= 10; $i++) {
            echo "<td class='biodata-link' style='text-align: left;'>";
            $biodata_number = ${"biodata_number_" . $i};
            $biodata_guardian = ${"biodata_guardian_" . $i};
            $biodata_patropatri = ${"biodata_patropatri_" . $i};
            if (!empty($biodata_number) || !empty($biodata_guardian) || !empty($biodata_patropatri)) {
              echo "<a class='biodata-button' target=\"_blank\" href=\"http://localhost:8000/profile.php?/Biodata=$biodata_number\">";
              echo "<span style='color: #000;'>বায়োডাটা নং:  $biodata_number </span>";
              echo "<p style='color: #0aa4ca;'>অভিভাবক: $biodata_guardian</p>";
              echo "<span style='color: #000;'>পাত্র-পাত্রী: $biodata_patropatri</span>";
              echo "<br><button class='view-button'>সম্পূর্ণ বায়োডাটা</button>";
              echo "</a>";
            }
            echo "</td>";
            }
            echo "</tr>" ;
          }
          ?>
        </table>
      </div>
      <p><i class="fa fa-bell" style="color: #0aa4ca; margin-right: 10px;"></i>যেকোনো প্রয়োজনে আমাদের সাথে যোগাযোগ করতে <a href="contact-us.php" target="_blank"> Contact</a> পেজ অনুসরণ করুন। অথবা আমাদের <a href="https://www.facebook.com/ShosurBari.bd" target="_blank"> FaceBook</a> পেজ ফলো করুন।</p>
    </div>
  </div>
	<!--=======================================
	How Many Visitors View This Page.
	This Script Connected to get_view_count.php
	and page_views Database Table
	========================================-->
	<script>
		$(document).ready(function() {
		var pages = ["my-account"];
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
	<!--=======  Footer Start ========-->
	<?php include_once("footer.php");?>
	<!--=======  Footer End  =========-->
  <!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
  <script>
    $(window).load(function() {
    $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
    });
    });
  </script>   
</body>
</html>	