<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
function englishToBanglaNumber($number) {
    $englishDigits = range(0, 9);
    $banglaDigits = ["০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"];
    return $number !== null ? str_replace($englishDigits, $banglaDigits, $number) : '';
}
if (isloggedin()) {
    $userId = $_SESSION['id'];
    require_once("includes/dbconn.php");
    $statusSql = "SELECT deactivated FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $statusSql);
    // Check if the result is not null before accessing the 'deactivated' key
    if ($result !== null) {
        $row = mysqli_fetch_assoc($result);
        $deactivated = isset($row['deactivated']) ? $row['deactivated'] : null;
    } else {
        // Handle the case where $result is null
        $deactivated = null;
    }
    $totalViewCountSql = "SELECT view_count FROM `1bd_personal_physical` WHERE user_id = $userId";
    $result = mysqli_query($conn, $totalViewCountSql);
    // Check if the result is not null before accessing the 'view_count' key
    if ($result !== null) {
        $row = mysqli_fetch_assoc($result);
        $totalViewCount = isset($row['view_count']) ? $row['view_count'] : null;
        $totalViewCountInBangla = englishToBanglaNumber($totalViewCount);
    } else {
        // Handle the case where $result is null
        $totalViewCountInBangla = '';
    }
} else {
    header("location:login.php");
}
$conn->close();
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
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6834867574094195"
     crossorigin="anonymous"></script>
		<meta name="google-adsense-account" content="ca-pub-6834867574094195" />
<title>My Account | ShosurBari</title>
<meta name="description" content="Manage your ShosurBari account seamlessly. Update your details, preferences, and stay informed about your matchmaking journey.">
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<meta property="og:image" content="https://www.shosurbari.com/images/shosurbari-social-share.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  .shosurbari-users-request tbody {
    overflow-y: auto;
  }
  .shosurbari-users-request {
    width: 100%;
    margin-bottom: 20px;
  }
  .shosurbari-users-request th {
    background: linear-gradient(#06b6d4, #0aa4ca);
    color: #fff;
    text-align: center;
    padding: 8px;
  }
  td, th {
    border: 1px solid #ccc;
  }
  .shosurbari-users-request td {
    padding: 8px;
    font-size: 15px;
    font-family: 'Ubuntu';
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
    color: #000;
  }
  @media (max-width: 736px){
    .dropdown-menu li a {
        color: #000 !important;
    }
    .dropdown-menu li a:hover{
        background: linear-gradient(#0aa4ca, #06b6d4);
        color: #fff !important;
    }
    }
  </style>
  <div class="grid_3">
    <div class="container">
      <div class="breadcrumb1">
        <ul>
          <a href="index.php"><i class="fa fa-home home_1"></i></a>
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
			<p><i class="fa fa-address-book"></i> <?php echo "User: $username"; ?></p>
			<!-- Display the account status -->
			<p><i class="fa fa-gears"></i> Account Status:
				<?php
				if ($deactivated == 0) {
					echo '<span style="color: #00d400;">Active</span>';
				} else {
					echo '<span style="color: red;">Deactivated</span>';
				}
				?>
			</p>
				<form id="deactivateForm" action="deactivate_account.php" method="post" style="
				font-size: 17px;
				font-weight: bold;
				color: #fff;
				padding: 15px 10px;
				background: linear-gradient(180deg, #00bbff61 0%, rgba(238, 246, 253, 0) 100%);
				border-radius: 5px;
				border: 1px solid #0aa4ca;">
				<span style="font-size: 17px;font-weight: bold;"><i class="fa fa-recycle"></i> Switch Status:</span>
				<?php if ($deactivated == 1) { ?>
					<button type="submit" name="action" value="activate">Activation</button>
				<?php } else { ?>
					<button type="button" onclick="showReasonInput()">Deactivate</button>
				<?php } ?>
				<div id="reasonInput" style="display: none;">
					<textarea style="max-width: 168px;margin-top: 7px;margin-bottom: 0px;padding: 5px 7px;color: #000;font-size: 13px;font-weight: 500;" name="reason" id="reason" rows="3" cols="25" placeholder="বায়োডাটা Deactivate / গোপন করতে চান কেন? কারণ লিখুন..."></textarea> <br>
					<span id="reasonError" style="color: red; display: none; width: 190px; margin: auto;">অনুগ্রহ করে কমপক্ষে ৫০টি অক্ষর দিয়ে কারণ টি লিখুন৷</span>
					<button type="button" onclick="confirmAction()">কনফার্ম</button>
				</div>
			</form>
		</div>

		<script>
			function showReasonInput() {
				var reasonInput = document.getElementById('reasonInput');
				reasonInput.style.display = 'block';
			}
			function confirmAction() {
				var action = "<?php echo ($deactivated == 1) ? 'প্রকাশিত/Activate' : 'গোপন/Deactivate'; ?>";
				var reasonInput = document.getElementById('reasonInput');
				var reason = reasonInput.querySelector('textarea[name="reason"]').value.trim();

				if (reason.length < 50) {
					document.getElementById('reasonError').style.display = 'block';
					return false;
				} else {
					document.getElementById('reasonError').style.display = 'none';
				}
				// AJAX request to submit the form data
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function () {
					if (xhr.readyState === XMLHttpRequest.DONE) {
						if (xhr.status === 200) {
							// Reload the page to display the latest reason
							window.location.reload();
						} else {
							alert('Error: Unable to submit the form. Server responded with status: ' + xhr.status);
						}
					}
				};
				xhr.onerror = function () {
					alert('সমস্যা দেখা দিয়েছে, অনুগ্রহ করে এডমিনের সাথে যোগাযোগ করুন।');
				};
				xhr.open('POST', 'deactivate_account.php', true);
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.send('action=deactivate&reason=' + encodeURIComponent(reason));

				return confirm("আপনার বায়োডাটা সফল ভাবে " + action + " হয়েছে।");
			}
		</script>
		
		
      <div class="shosurbari-account-sidebar" id="bs-megadropdown-tabs">
        <ul class="shosurbari-my-account">
          <li><a href="my-account.php" style="background: linear-gradient(#06b6d4, #0aa4ca); color: #fff;"><i class="fa fa-dashboard" style="color: #fff;"></i> ড্যাশবোর্ড</a></li>
          <li><a href="biodata-post.php"><i class='fa fa-file-text-o'></i> বায়োডাটা পোস্ট করুন</a></li>
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
            <h3><i class="fa fa-eye"></i> বায়োডাটাটি দেখা হয়েছে:
            <?php
              // Display the view count for the logged-in user's profile
              if (isset($totalViewCountInBangla)) { echo "$totalViewCountInBangla বার"; } ?>
            </h3>
          </div>
        </form>
      </div>
    </div>
    <div class="shosurbari-dashboard">
      <?php
      include("includes/dbconn.php");
      $id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
      $sql = "SELECT * FROM customer WHERE user_id = $id ORDER BY STR_TO_DATE(request_date, '%a %d %M %Y, %h:%i %p') DESC";
      $result = mysqlexec($sql);
      $sql2 = "SELECT * FROM customer_sent_info_complete WHERE user_id = $id  ORDER BY STR_TO_DATE(info_sent_time, '%a %d %M %Y, %h:%i %p') DESC";
      $result2 = mysqlexec($sql2);

      $sql3 = "SELECT * FROM customer_sent_info_complete
         WHERE biodata_number_1 = $id OR biodata_number_2 = $id OR biodata_number_3 = $id OR biodata_number_4 = $id
            OR biodata_number_5 = $id OR biodata_number_6 = $id OR biodata_number_7 = $id OR biodata_number_8 = $id
            OR biodata_number_9 = $id OR biodata_number_10 = $id
         ORDER BY STR_TO_DATE(info_sent_time, '%a %d %M %Y, %h:%i %p') DESC";
      $result3 = mysqlexec($sql3);
      ?>
      <h1>রিকোয়েস্ট বায়োডাটা পেমেন্ট তথ্য </h1>
      <p style="margin-bottom: 20px;"><i id="bell" class="fa fa-bell"></i> আপনি যেকোনো বায়োডাটার সাথে যোগাযোগের জন্য সার্ভিস চার্জ প্রদান করার পর এখানে আপনার পেমেন্ট তথ্যগুলো পেয়ে যাবেন।</p>
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
              $country_code = $row['country_code'];
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
              echo "background-color: gray;'>Cancel";
              } elseif ($row['invalid'] == 1) {
              echo "background-color: #ff0080;'>Invalid";
              } else {
              echo "background: linear-gradient(#06b6d4, #0aa4ca);'>Unknown";
              }
              echo "</td>";
              echo "<td>SBBR$id_customer</td>";
              echo "<td>$cust_email</td>";
              echo "<td>$country_code $cust_number</td>";
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
      <h1>বায়োডাটার সাথে যোগাযোগের তথ্য </h1>
      <p style="margin-bottom: 20px;"><i id="bell" class="fa fa-bell"></i> আপনার পেমেন্ট সম্পন্ন হবার পর, ২৪ ঘন্টার মধ্যে যোগাযোগের জন্য অভিভাবকের মোবাইল নাম্বার আপনাকে SMS বা ই-মেইলের মাধ্যমে প্রদান করা হবে এবং যোগাযোগের তথ্যগুলো এখানেও পেয়ে যাবেন।</p>
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
            echo "<td style='background: #22c55e; color: #fff;'>SBCR$id</td>";
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
              echo "<a class='biodata-button' target=\"_blank\" href=\"https://shosurbari.com/profile.php?/Biodata=$biodata_number\">";
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
      <h1> আপনার বায়োডাটা পছন্দ করেছে</h1>
      <p style="margin-bottom: 20px;"><i id="bell" class="fa fa-bell"></i> বিয়ের জন্য আগ্রহী ইউজার আপনার (পাত্র-পাত্রীর) বায়োডাটাটি পছন্দ করার পর, আগ্রহী ইউজারের পেমেন্ট তথ্য যাচাই বাছাই করে শ্বশুরবাড়ির কাস্টমার সার্ভিস থেকে আপনার অভিভাবককে কল করবে। যদি আপনার (পাত্র-পাত্রীর) বিয়ে ঠিক না হয়ে থাকে তবেই আপনাদের যোগাযোগের তথ্য আগ্রহী ইউজারকে প্রদান করা হবে, তারপর এখানে সেই আগ্রহী ইউজারের বায়োডাটা (যদি থাকে), নাম, ই-মেইল এবং স্থায়ী ঠিকানা দেখতে পাবেন।</p>
        <div class="shosurbari-contactme-dashboard">
        <?php
        echo "<table class='shosurbari-users-request'>
        <tr> 
          <th>বায়োডাটা নং</th>
          <th>নাম</th>
          <th>ই-মেইল</th>
          <th>স্থায়ী ঠিকানা</th>
          <th>তারিখ</th>
        </tr>";
        $currentID = null;
        while ($row = mysqli_fetch_assoc($result3)) {
            if ($currentID !== $row['id']) {
                // If a new ID is encountered, start a new row
                if ($currentID !== null) {
                    echo "</tr>";
                }
                echo "<tr>";
                // echo "<td>" . $row['id'] . "</td>";
                $currentID = $row['id'];
            }
            // Display other columns in the same row
            echo "<td style='color: white; text-align: center;";
            if ($row['user_id'] == 0) {
                echo " background-color:#ff0080;'>বায়োডাটা নেই";
            } elseif ($row['user_id'] == " ") {
              echo "background:#22c55e;'><a style='color: white;' target='_blank' href='../profile.php?/Biodata=" . $row['user_id'] . "'>" . $row['user_id'] . " View</a></td>";
            } else {
              echo "background:#22c55e;'><a style='color: white;' target='_blank' href='../profile.php?/Biodata=" . $row['user_id'] . "'>" . $row['user_id'] . " View</a></td>";
            }
            echo "<td>" . $row['payment_cust_name'] . "</td>";
            echo "<td>" . $row['payment_cust_email'] . "</td>";
            echo "<td>" . $row['payment_cust_address'] . "</td>";
            echo "<td>" . $row['info_sent_time'] . "</td>";
        }
        if ($currentID !== null) {
            echo "</tr>";
        }
        echo "</table>";
        ?>
      </div>
      <p><i id="bell" class="fa fa-bell"></i> যেকোনো প্রয়োজনে আমাদের সাথে যোগাযোগ করতে <a href="contact-us.php" target="_blank"> Contact</a> পেজ অনুসরণ করুন। অথবা আমাদের <a href="https://www.facebook.com/ShosurBari.Matrimony" target="_blank"> FaceBook</a> পেজ ফলো করে সাথেই থাকুন</p>
    </div>
  </div>
	<!--View This Page. Connected to get view count -->
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
