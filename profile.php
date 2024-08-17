<?php 
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Biodata | ShosurBari</title>
	<meta name="description" content="Dive into captivating stories of individuals at ShosurBari.com. Unearth detailed biodata profiles, each telling a unique tale. Connect with potential life partners and embark on a journey to find your extraordinary match.">
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
	<script src="https://cdn.jsdelivr.net/npm/emojipickerjs@1.0.7/dist/js/emojiPicker.min.js"></script>
</head>
<body>
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
	<style>
	/*View Profile Details NavBar Sticky Start*/
	@media(min-width:2150px){
	.UserProfile {
		width: 2000px;
		margin: auto;
	}
	}
	@media(max-width:2150px){
	.fixed {
		position: fixed;
		top: 70px;
		right: 5%;
		width: 55.8%;
		z-index: 100;
		margin-left: auto;
		margin-right: auto;
		border-radius: 0px 0px 4px 4px;
		display: flex;
		justify-content: center;
		background:#0aa4ca;
	}
	a#profile-tab, a#home-tab, a#profile-tab1 {
		width: 100%;
		padding: 12px 25px;
		margin: 5px auto;
		height: 40px;
		line-height: 20px;
		font-size: 17px;
		border-radius: 3px;
	}
	.nav-tabs1>li{
		margin: auto 7px;
	}
	}
	@media (max-width:1920px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
	    padding: 13px;
	}
	}
	@media (max-width:1400px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 10px;
		font-size: 16px;
		height: 35px;
	}
	}
	@media (max-width:1280px){
	.fixed {
		right: 5%;
		width: 61.2%;
	}
	}
	@media (max-width:1024px){
	.fixed {
		right: 5%;
		width: 58.5%;
	}
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 10px 5px;
	}
	}
	@media (max-width:930px){
	.fixed {
		left: 10px;
		right: 10px;
		width: 81%;
	}
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 10px;
		font-size: 15px;
	}
	} 
	@media (max-width: 768px){
	.fixed {
		top: 64px;
	}
	} 
	@media (max-width: 600px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 8px 10px;
		line-height: 21px;
	}
	.nav-tabs1>li{
		margin: auto 4px;
	}
	}
	@media (max-width: 480px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 8px 5px;
		height: 33px;
	}
	.nav-tabs1>li{
		margin: auto 3px;
	}
	}
	@media (max-width: 414px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 8px 3px;
	}
	.nav-tabs1>li{
	    margin: auto 0;
	}
}
	@media (max-width: 384px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 6px 4px;
		font-size: 13.3px;
		height: 30px;
		line-height: 21px;
	}
	}
	@media (max-width: 350px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 6px 2px;
		font-size: 13px;
	}
	}
	@media (max-width: 320px){
	.nav-tabs1>li{
		margin-left: 0px;
		margin-right: 0px;
	}
	}
	/*View Profile Details NavBar Sticky End*/
	</style>
	<div class="UserProfile"> 
		<div class="profile-header">
			<?php
				error_reporting(0);
				$profileid = isset($_GET['/Biodata']) ? $_GET['/Biodata'] : null;
				if (!filter_var($profileid, FILTER_VALIDATE_INT)) {
					echo '<script>window.location.href = "profile-404.php";</script>';
					exit;
				}
				$accountStatusSql = "SELECT active FROM users WHERE id = $profileid";
				$accountStatusResult = mysqlexec($accountStatusSql);
				if ($accountStatusResult) {
					$accountStatusRow = mysqli_fetch_assoc($accountStatusResult);
					if ($accountStatusRow['active'] == 0) {
						echo '<script>window.location.href = "profile-404.php";</script>'; // Redirect to profile-404.php if the account is deactivated
						exit;
					}
				}
				$sql = "SELECT * FROM 1bd_personal_physical WHERE user_id = $profileid";
				$result = mysqlexec($sql);
				if ($result) {
					$row = mysqli_fetch_assoc($result);
					$pic1 = "";
					$sql2 = "SELECT * FROM photos WHERE user_id = $profileid";
					$result2 = mysqlexec($sql2);
					if ($result2) {
						$row2 = mysqli_fetch_array($result2);
						if ($row2) {
							$pic1 = $row2['pic1'];
						}
					}
					$defaultImages = [
						'পাত্রের বায়োডাটা' => "shosurbari-male-icon.jpg",
						'পাত্রীর বায়োডাটা' => "shosurbari-female-icon.png",
					];
					$defaultImage = "shosurbari-default-icon.png";
					if (isset($row['biodatagender']) && isset($defaultImages[$row['biodatagender']])) {
						$defaultImage = $defaultImages[$row['biodatagender']];
					}
				} else {
					echo "<script>alert(\"Invalid Profile ID\")</script>";
				}
			?>
			<div class="profile-img">
				<?php if (!empty($pic1)): ?>
					<img src="profile/<?php echo $profileid; ?>/<?php echo $pic1; ?>" />
				<?php else: ?>
					<img src="images/<?php echo $defaultImage; ?>" />
				<?php endif; ?>
			</div>
			<div class="profile-nav-info">
				<?php if (!empty($profileid)) { ?>
					<h3>বায়োডাটা নং : <span><?php echo $profileid;?></span></h3>
				<?php } ?>
				
				<?php
				// Function to convert English numerals to Bangla numerals
				function englishToBanglaNumber($number) {
					$englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
					$banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
					return str_replace($englishNumbers, $banglaNumbers, $number);
				}
				// Function to convert Bangla date to English
				function banglaToEnglishDate($banglaDate) {
					$banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
					$englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
					return str_replace($banglaNumbers, $englishNumbers, $banglaDate);
				}
				// Function to calculate age
				function calculateAge($dob) {
					// Convert Bangla date to English
					$dob = banglaToEnglishDate($dob);
					// Convert Bangla month names to English
					$banglaMonths = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];
					$englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
					$dob = str_replace($banglaMonths, $englishMonths, $dob);
					// Debug: Output the converted date
					echo "<!-- Debug: Converted DOB: $dob -->";
					// Adjust the date format to match your input (e.g., 'd F, Y')
					$dateFormat = 'd F, Y';
					$dob = date_create_from_format($dateFormat, $dob);
					if ($dob === false) {
						return 'Invalid Date';
					}
					$now = new DateTime();
					$age = $now->diff($dob);
					// Convert the age to Bangla numerals
					$yearsInBangla = englishToBanglaNumber($age->y);
					$monthsInBangla = englishToBanglaNumber($age->m);
					return $yearsInBangla . ' বছর, ' . $monthsInBangla . ' মাস';
				}
				$id = $_GET['/Biodata'];
				$profileid = $id;
				// Fetch address details
				$sql = "SELECT * FROM 4bd_address_details WHERE user_id = ?";
				$stmt = mysqli_prepare($conn, $sql);
				mysqli_stmt_bind_param($stmt, 'i', $id);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$row = mysqli_fetch_assoc($result);
				$home_districts = [
					'barishal' => $row['home_district_under_barishal'],
					'chattogram' => $row['home_district_under_chattogram'],
					'dhaka' => $row['home_district_under_dhaka'],
					'khulna' => $row['home_district_under_khulna'],
					'mymensingh' => $row['home_district_under_mymensingh'],
					'rajshahi' => $row['home_district_under_rajshahi'],
					'rangpur' => $row['home_district_under_rangpur'],
					'sylhet' => $row['home_district_under_sylhet']
				];
				// Fetch personal details
				$sql = "SELECT * FROM 1bd_personal_physical WHERE user_id = ?";
				$stmt = mysqli_prepare($conn, $sql);
				mysqli_stmt_bind_param($stmt, 'i', $id);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$row = mysqli_fetch_assoc($result);
				$dob = $row['dateofbirth'];
				?>
				<div class="address">
					<?php foreach ($home_districts as $district) { ?>
						<?php if (!empty($district)) { ?>
							<td class="day_value closed">স্থায়ী ঠিকানা জেলা : <?php echo $district; ?></td><br>
						<?php } ?>
					<?php } ?>
					<?php if (!empty($dob)) { ?>
						<!-- <td class="day_value closed">জন্ম সন : < ? php echo $dob; ? > </td> -->
						<td class="day_value closed">বয়স : <?php echo calculateAge($dob); ?></td>
					<?php } ?>
				</div>
    		</div>
			<div class="see_sb_biodata">
		    	<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">আমার-তথ্য</a></li>
						<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">পারিবারিক-তথ্য</a></li>
						<li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">প্রত্যাশিত-জীবনসঙ্গী</a></li>
					</ul>
				</div>
			</div>
			<div class="stars">
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
		</div>
	 	</div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
			// Profile Section Show With Scrolling Just for Mobile Responsive. profile sticky
			$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			var headerHeight = $('.profile-header').outerHeight() * 0.9; // 90% of the profile-header height
			if (scroll >= headerHeight) {
				$('.nav-tabs1').addClass('fixed');
			} else {
				$('.nav-tabs1').removeClass('fixed');
			}
			});
			$(document).ready(function() {
			// Smooth scroll to the target section
			$('.nav-tabs1 a').click(function(event) {
				event.preventDefault();
				var targetOffset = $('.profile-header').offset().top + ($('.profile-header').outerHeight() / 2);
				if ($(window).width() >= 931 && $(window).width() <= 2000) {
				// Media width between 931px and 2000px
				targetOffset -= -5;
				} else if ($(window).width() >= 737 && $(window).width() <= 930) {
				targetOffset += 715;
				} else if ($(window).width() >= 601 && $(window).width() <= 736) {
				targetOffset +=708;
				} else if ($(window).width() >= 360 && $(window).width() <= 600) {
				targetOffset += 713; 
				} else if ($(window).width() >= 353 && $(window).width() <= 359) {
				targetOffset += 705;
				} else if ($(window).width() >= 321 && $(window).width() <= 352) {
				targetOffset += 702;      
				} else if ($(window).width() >= 260 && $(window).width() <= 320) {
				targetOffset += 692;
				}
				$('html, body').animate({
				scrollTop: targetOffset
				}, 950);
			});
			});
		</script>
		<div class="main-bd"> <!-- Main BioData-->
			<div class="left-side">
				<div class="profile-side">
					<div class="biodatavalue_list" style="background: none; border-radius: 7px 7px 0px 0px; border-top: 3px solid #06b6d4; border-bottom: none; margin-top: 0px; border-left: none; border-right: none">
						<h3 style="background: none; border-style: none;">সংক্ষেপে</h3>
					</div>
					<!-- START - Heading Section  / SB Short Biodata -->
					<div class="user-bio">
						<!-- SB Short Biodata / 1bd_personal_physical  -->
						<?php
							$id=$_GET['/Biodata'];
							$profileid=$id;
							$sql = "SELECT * FROM 1bd_personal_physical  WHERE user_id = $id";
							$result = mysqlexec($sql);
							if($result){
							$row=mysqli_fetch_assoc($result);
							if($row){
							$biodatagender=$row['biodatagender'];
							}
							if($row){
							$dob=$row['dateofbirth'];
							}
							if($row){
							$Skin_tones = $row['Skin_tones'];
							}
							if($row){
							$height=$row['height'];
							}
							if($row){
							$weight=$row['weight'];	
							}
							}
						?>
						<!-- SB Short Biodata / 2bd_personal_lifestyle  -->
						<?php
							$id=$_GET['/Biodata'];
							$profileid=$id;
							$sql = "SELECT * FROM 2bd_personal_lifestyle  WHERE user_id = $id";
							$result = mysqlexec($sql);
							$row=mysqli_fetch_assoc($result);
							if($row){
							$no_occupation=$row['no_occupation'];
							}
							if($row){
							$other_occupation_sector=$row['other_occupation_sector'];
							}
							if($row){
							$business_occupation_level=$row['business_occupation_level'];
							}
							if($row){
							$student_occupation_level=$row['student_occupation_level'];
							}
							if($row){
							$health_occupation_level=$row['health_occupation_level'];
							}
							if($row){
							$engineer_occupation_level=$row['engineer_occupation_level'];
							}
							if($row){
							$teacher_occupation_level=$row['teacher_occupation_level'];
							}
							if($row){
							$defense_occupation_level=$row['defense_occupation_level'];
							}
							if($row){
							$shop_occupation_level=$row['shop_occupation_level'];
							}
							if($row){
							$foreigner_occupation_level=$row['foreigner_occupation_level'];
							}
							if($row){
							$garments_occupation_level=$row['garments_occupation_level'];
							}
							if($row){
							$driver_occupation_level=$row['driver_occupation_level'];
							}
							if($row){
							$service_andcommon_occupation_level=$row['service_andcommon_occupation_level'];
							}
							if($row){
							$mistri_occupation_level=$row['mistri_occupation_level'];
							}
						?>
						<!-- SB Short Biodata / 4bd_address_details  -->
						<?php
							$id=$_GET['/Biodata'];
							$profileid=$id;
							$sql = "SELECT * FROM 4bd_address_details  WHERE user_id = $id";
							$result = mysqlexec($sql);
							$row=mysqli_fetch_assoc($result);
							if($row){
							$present_address_location=$row['present_address_location'];
							}
						?>
						<!-- SB Short Biodata / 5bd_family_information  -->
						<?php
							$id=$_GET['/Biodata'];
							$profileid=$id;
							$sql = "SELECT * FROM 5bd_family_information  WHERE user_id = $id";
							$result = mysqlexec($sql);
							$row=mysqli_fetch_assoc($result);
							if($row){
							$family_class=$row['family_class'];
							}
						?>
						<!-- SB Short Biodata / 6bd_7bd_marital_status  -->
						<?php
							$id=$_GET['/Biodata'];
							$profileid=$id;
							$sql = "SELECT * FROM 6bd_7bd_marital_status  WHERE user_id = $id";
							$result = mysqlexec($sql);
							$row=mysqli_fetch_assoc($result);
							if($row){
							$maritalstatus=$row['maritalstatus'];
							}
						?>
						<!--  SB Short Biodata / 8bd_religion_details  -->
						<?php
							$id=$_GET['/Biodata'];
							$profileid=$id;
							$sql = "SELECT * FROM 8bd_religion_details  WHERE user_id = $id";
							$result = mysqlexec($sql);
							$row=mysqli_fetch_assoc($result);
							if($row){
							$religion=$row['religion'];
							}
						?>
						<div class="biodatanumber_head">
							<table class="short_biodata_value">
                				<tbody>
									<tr class="opened">
										<?php if (!empty($biodatagender)) { ?>
										<td class="day_label">বায়োডাটার ধরণ</td>
										<td class="day_value"><?php echo $biodatagender;?></td>
										<?php } ?>
									</tr>
									<tr class="opened">
										<?php if (!empty($religion)) { ?>
										<td class="day_label">ধর্ম</td>
										<td class="day_value"><?php echo $religion;?></td>
										<?php } ?>
									</tr>
									<tr class="opened">
										<?php if (!empty($maritalstatus)) { ?>
										<td class="day_label">বৈবাহিক অবস্থা</td>
										<td class="day_value"><?php echo $maritalstatus;?></td>
										<?php } ?>
									</tr>
									<tr class="opened">
										<?php if (!empty($Skin_tones)) { ?>
										<td class="day_label">শারীরিক বর্ণ</td>
										<td class="day_value"><?php echo $Skin_tones;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($height)) { ?>
										<td class="day_label">উচ্চতা</td>
										<td class="day_value closed"><?php echo $height;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($weight)) { ?>
										<td class="day_label">ওজন</td>
										<td class="day_value closed"><?php echo $weight;?></td>
										<?php } ?>
									</tr>
									<tr class="opened">
										<?php if (!empty($family_class)) { ?>
										<td class="day_label">অর্থনৈতিক অবস্থা</td>
										<td class="day_value"><?php echo $family_class; ?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($no_occupation)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $no_occupation;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($other_occupation_sector)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $other_occupation_sector;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($business_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $business_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($student_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $student_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($health_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $health_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($engineer_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $engineer_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($teacher_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $teacher_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($defense_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $defense_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($shop_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $shop_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($foreigner_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $foreigner_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($garments_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $garments_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($driver_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $driver_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($service_andcommon_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $service_andcommon_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($mistri_occupation_level)) { ?>
										<td class="day_label">পেশা</td>
										<td class="day_value closed"><?php echo $mistri_occupation_level;?></td>
										<?php } ?>
									</tr>
									<tr class="closed">
										<?php if (!empty ($present_address_location)) { ?>
										<td class="day_label">বর্তমান ঠিকানা</td>
										<td class="day_value closed"><?php echo $present_address_location;?></td>
										<?php } ?>
									</tr>
								</tbody>
							</table>
						</div>
 					</div>
					<!-- END - Heading Font Section  / SB Short Biodata -->
					<div class="profile-btn">
						<div class="contact-bio">
							<a href="payment-shosurbari.php?/Biodata=<?php echo $profileid; ?>">
								<button class="chatbtn" id="chatBtn"><i class="fa fa-phone"></i> যোগাযোগ</button>
							</a>
						</div>
						<div class="copy-sbbio-link">
							<button class="copylink clipboard" id="Create-post"><i class="fa fa-copy"></i>লিংক কপি</button>
						</div> </br>

						<div id="copy-message">বায়োডাটার প্রোফাইল লিংক কপি হয়েছে।</div>
					</div>
					<div class="choice-list-options">
						<?php
						if (!empty($profileid)) {
						echo '<form method="POST" action="choice-list.php">';
						echo '<input type="hidden" name="add_to_choice_list" value="' . $profileid . '">';
						echo '<button type="submit" class="choice-list-btn"><i class="fa fa-heart"> </i> পছন্দের তালিকায়</button>';
						echo '</form>';
						}
						?>
					</div>
					<script>
						var $temp = $("<input>");
						var $url = $(location).attr('href');
						$('.clipboard').on('click', function() {
						$("body").append($temp);
						$temp.val($url).select();
						document.execCommand("copy");
						$temp.remove();
						$("#copy-message").addClass("show");
						setTimeout(function() {
							$("#copy-message").removeClass("show");
						}, 6000);
						})
					</script>
				</div>
				<div class="sbbiodata_profile_recentview">
					<h3>জনপ্রিয় বায়োডাটা</h3>
					<?php
                        if ($biodatagender == 'পাত্রের বায়োডাটা') {
						$sql = "SELECT p.*, u.active
						FROM 1bd_personal_physical p
						INNER JOIN users u ON p.user_id = u.id
                        WHERE u.active = 1 AND p.biodatagender = 'পাত্রের বায়োডাটা'
						ORDER BY p.view_count DESC LIMIT 6"; // Top 6 profiles by view_count of active users
						$result = mysqlexec($sql);
						$count = 1;
						while ($row = mysqli_fetch_assoc($result)) {
							if ($row['active'] == 1) {
							$profid = $row['user_id'];
							$Skin_tones_recentview1 = $row['Skin_tones'];
							$height_recentview1 = $row['height'];
							$dateofbirth_recentview1 = $row['dateofbirth'];
							$sql2 = "SELECT * FROM photos WHERE user_id = $profid";
							$result2 = mysqlexec($sql2);
							$row2 = mysqli_fetch_assoc($result2);
							$pic1 = $row2['pic1'];
							$defaultImages = [
								'পাত্রের বায়োডাটা' => "shosurbari-male-icon.jpg",
								'পাত্রীর বায়োডাটা' => "shosurbari-female-icon.png",
							];
							$defaultImage = "shosurbari-default-icon.png";
							if (isset($row['biodatagender']) && isset($defaultImages[$row['biodatagender']])) {
								$defaultImage = $defaultImages[$row['biodatagender']];
							}
							// Getting home district
							$sql5 = "SELECT * FROM 4bd_address_details WHERE user_id=$profid";
							$result5 = mysqlexec($sql5);
							if ($result5 && mysqli_num_rows($result5) > 0) {
								$row5 = mysqli_fetch_assoc($result5);
								$home_district = '';
								if (!empty($row5['home_district_under_barishal'])) {
								$home_district = $row5['home_district_under_barishal'];
								} elseif (!empty($row5['home_district_under_chattogram'])) {
								$home_district = $row5['home_district_under_chattogram'];
								} elseif (!empty($row5['home_district_under_dhaka'])) {
								$home_district = $row5['home_district_under_dhaka'];
								} elseif (!empty($row5['home_district_under_khulna'])) {
								$home_district = $row5['home_district_under_khulna'];
								} elseif (!empty($row5['home_district_under_mymensingh'])) {
								$home_district = $row5['home_district_under_mymensingh'];
								} elseif (!empty($row5['home_district_under_rajshahi'])) {
								$home_district = $row5['home_district_under_rajshahi'];
								} elseif (!empty($row5['home_district_under_rangpur'])) {
								$home_district = $row5['home_district_under_rangpur'];
								} elseif (!empty($row5['home_district_under_sylhet'])) {
								$home_district = $row5['home_district_under_sylhet'];
								}
								// Getting occupation level
								$sql3 = "SELECT * FROM 2bd_personal_lifestyle WHERE user_id=$profid";
								$result3 = mysqlexec($sql3);
								if ($result3 && mysqli_num_rows($result3) > 0) {
									$row3 = mysqli_fetch_assoc($result3);
									$occupation_levels = array(
										'no_occupation' => $row3['no_occupation'],
										'other_occupation_sector' => $row3['other_occupation_sector'],
										'business_occupation_level' => $row3['business_occupation_level'],
										'student_occupation_level' => $row3['student_occupation_level'],
										'health_occupation_level' => $row3['health_occupation_level'],
										'engineer_occupation_level' => $row3['engineer_occupation_level'],
										'teacher_occupation_level' => $row3['teacher_occupation_level'],
										'defense_occupation_level' => $row3['defense_occupation_level'],
										'shop_occupation_level' => $row3['shop_occupation_level'],
										'foreigner_occupation_level' => $row3['foreigner_occupation_level'],
										'garments_occupation_level' => $row3['garments_occupation_level'],
										'driver_occupation_level' => $row3['driver_occupation_level'],
										'service_andcommon_occupation_level' => $row3['service_andcommon_occupation_level'],
										'mistri_occupation_level' => $row3['mistri_occupation_level'],
									);
									$occupation_levels = array_filter($occupation_levels); // Remove empty values
									$occupation_count = count($occupation_levels);
									if ($occupation_count > 0) {
										$occupation_label = array_keys($occupation_levels)[0];
										$occupation_value = $occupation_levels[$occupation_label];
										echo "<div class=\"biodatarecent_viewlist\">";
										echo "<div class=\"sbbio_header_recent_view\">";
										// Start of Default Photo Show
										echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\">";
										if (!empty($pic1)) {
											echo "<img class=\"img-responsive\" src=\"profile/{$profid}/{$pic1}\"/>";
										} else {
											echo "<img class=\"img-responsive\" src=\"images/{$defaultImage}\"/>";
										}
										echo "</a>";
										// End of Default photo Show
										echo "<div class=\"sbbio_number_recentview\"><span class=\"sb_biodatanumber_recentview\"> {$profid} <br> বায়োডাটা নং </span> </div>";
										echo "</div>";
										echo "<div class=\"sb_user_recentview\">";
										echo "<table class=\"biodata_value_data\">";
										echo "<tbody>";
										// Create rows for each piece of information
										echo "<tr class=\"opened\">";
										echo "<td class=\"sb_label\">শারীরিক বর্ণ</td>";
										echo "<td class=\"sb_value\">{$Skin_tones_recentview1}</td>";
										echo "</tr>";
										echo "<tr class=\"opened\">";
										echo "<td class=\"sb_label\">উচ্চতা</td>";
										echo "<td class=\"sb_value\">{$height_recentview1}</td>";
										echo "</tr>";
										echo "<tr class=\"opened\">";
										echo "<td class=\"sb_label\">পেশা</td>";
										echo "<td class=\"sb_value\">{$occupation_value}</td>";
										echo "</tr>";
										echo "<tr class=\"opened\">";
										echo "<td class=\"sb_label\">জেলা</td>";
										echo "<td class=\"sb_value\">{$home_district}</td>";
										echo "</tr>";
										echo "<tr class=\"opened\">";
										echo "<td class=\"sb_label\">জন্ম সন</td>";
										echo "<td class=\"sb_value\">{$dateofbirth_recentview1}</td>";
										echo "</tr>";
										echo "</tbody>";
										echo "</table>";
										echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\">";
										echo "<button class=\"view_sb_profile_recentview\">সম্পূর্ণ বায়োডাটা</button>";
										echo "</a>";
										echo "</div></div>";
										$count++;
									}
								}
							}
						}
						}
                    } elseif ($biodatagender == 'পাত্রীর বায়োডাটা') {
						$sql = "SELECT p.*, u.active
						FROM 1bd_personal_physical p
						INNER JOIN users u ON p.user_id = u.id
                        WHERE u.active = 1 AND p.biodatagender = 'পাত্রীর বায়োডাটা'
						ORDER BY p.view_count DESC LIMIT 6"; // Top 6 profiles by view_count of active users
						$result = mysqlexec($sql);
						$count = 1;
						while ($row = mysqli_fetch_assoc($result)) {
							if ($row['active'] == 1) {
							$profid = $row['user_id'];
							$Skin_tones_recentview1 = $row['Skin_tones'];
							$height_recentview1 = $row['height'];
							$dateofbirth_recentview1 = $row['dateofbirth'];
							$sql2 = "SELECT * FROM photos WHERE user_id = $profid";
							$result2 = mysqlexec($sql2);
							$row2 = mysqli_fetch_assoc($result2);
							$pic1 = $row2['pic1'];
							$defaultImages = [
								'পাত্রের বায়োডাটা' => "shosurbari-male-icon.jpg",
								'পাত্রীর বায়োডাটা' => "shosurbari-female-icon.png",
							];
							$defaultImage = "shosurbari-default-icon.png";
							if (isset($row['biodatagender']) && isset($defaultImages[$row['biodatagender']])) {
								$defaultImage = $defaultImages[$row['biodatagender']];
							}
							// Getting home district
							$sql5 = "SELECT * FROM 4bd_address_details WHERE user_id=$profid";
							$result5 = mysqlexec($sql5);
							if ($result5 && mysqli_num_rows($result5) > 0) {
								$row5 = mysqli_fetch_assoc($result5);
								$home_district = '';
								if (!empty($row5['home_district_under_barishal'])) {
								$home_district = $row5['home_district_under_barishal'];
								} elseif (!empty($row5['home_district_under_chattogram'])) {
								$home_district = $row5['home_district_under_chattogram'];
								} elseif (!empty($row5['home_district_under_dhaka'])) {
								$home_district = $row5['home_district_under_dhaka'];
								} elseif (!empty($row5['home_district_under_khulna'])) {
								$home_district = $row5['home_district_under_khulna'];
								} elseif (!empty($row5['home_district_under_mymensingh'])) {
								$home_district = $row5['home_district_under_mymensingh'];
								} elseif (!empty($row5['home_district_under_rajshahi'])) {
								$home_district = $row5['home_district_under_rajshahi'];
								} elseif (!empty($row5['home_district_under_rangpur'])) {
								$home_district = $row5['home_district_under_rangpur'];
								} elseif (!empty($row5['home_district_under_sylhet'])) {
								$home_district = $row5['home_district_under_sylhet'];
								}
								// Getting occupation level
								$sql3 = "SELECT * FROM 2bd_personal_lifestyle WHERE user_id=$profid";
								$result3 = mysqlexec($sql3);
								if ($result3 && mysqli_num_rows($result3) > 0) {
									$row3 = mysqli_fetch_assoc($result3);
									$occupation_levels = array(
										'no_occupation' => $row3['no_occupation'],
										'other_occupation_sector' => $row3['other_occupation_sector'],
										'business_occupation_level' => $row3['business_occupation_level'],
										'student_occupation_level' => $row3['student_occupation_level'],
										'health_occupation_level' => $row3['health_occupation_level'],
										'engineer_occupation_level' => $row3['engineer_occupation_level'],
										'teacher_occupation_level' => $row3['teacher_occupation_level'],
										'defense_occupation_level' => $row3['defense_occupation_level'],
										'shop_occupation_level' => $row3['shop_occupation_level'],
										'foreigner_occupation_level' => $row3['foreigner_occupation_level'],
										'garments_occupation_level' => $row3['garments_occupation_level'],
										'driver_occupation_level' => $row3['driver_occupation_level'],
										'service_andcommon_occupation_level' => $row3['service_andcommon_occupation_level'],
										'mistri_occupation_level' => $row3['mistri_occupation_level'],
									);
									$occupation_levels = array_filter($occupation_levels); // Remove empty values
									$occupation_count = count($occupation_levels);
									if ($occupation_count > 0) {
										$occupation_label = array_keys($occupation_levels)[0];
										$occupation_value = $occupation_levels[$occupation_label];
										echo "<div class=\"biodatarecent_viewlist\">";
										echo "<div class=\"sbbio_header_recent_view\">";
										// Start of Default Photo Show
										echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\">";
										if (!empty($pic1)) {
											echo "<img class=\"img-responsive\" src=\"profile/{$profid}/{$pic1}\"/>";
										} else {
											echo "<img class=\"img-responsive\" src=\"images/{$defaultImage}\"/>";
										}
										echo "</a>";
										// End of Default photo Show
										echo "<div class=\"sbbio_number_recentview\"><span class=\"sb_biodatanumber_recentview\"> {$profid} <br> বায়োডাটা নং </span> </div>";
										echo "</div>";
										echo "<div class=\"sb_user_recentview\">";
										echo "<table class=\"biodata_value_data\">";
										echo "<tbody>";
										// Create rows for each piece of information
										echo "<tr class=\"opened\">";
										echo "<td class=\"sb_label\">শারীরিক বর্ণ</td>";
										echo "<td class=\"sb_value\">{$Skin_tones_recentview1}</td>";
										echo "</tr>";
										echo "<tr class=\"opened\">";
										echo "<td class=\"sb_label\">উচ্চতা</td>";
										echo "<td class=\"sb_value\">{$height_recentview1}</td>";
										echo "</tr>";
										echo "<tr class=\"opened\">";
										echo "<td class=\"sb_label\">পেশা</td>";
										echo "<td class=\"sb_value\">{$occupation_value}</td>";
										echo "</tr>";
										echo "<tr class=\"opened\">";
										echo "<td class=\"sb_label\">জেলা</td>";
										echo "<td class=\"sb_value\">{$home_district}</td>";
										echo "</tr>";
										echo "<tr class=\"opened\">";
										echo "<td class=\"sb_label\">জন্ম সন</td>";
										echo "<td class=\"sb_value\">{$dateofbirth_recentview1}</td>";
										echo "</tr>";
										echo "</tbody>";
										echo "</table>";
										echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\">";
										echo "<button class=\"view_sb_profile_recentview\">সম্পূর্ণ বায়োডাটা</button>";
										echo "</a>";
										echo "</div></div>";
										$count++;
									}
								}
							}
						}
						}
                    }
					?>
    			</div>
			</div>
			<!-- START - Profile Details Show -->	
			<div class="right-side"> <!-- Right-Side of Profile Sections-->
				<div class="separate_biodata_sector">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<div id="myTabContent" class="tab-content">
							<!-- START -  Personal & Physical  / sb-biodata-1 -->	
							<?php
								$id=$_GET['/Biodata'];
								$profileid=$id;
								$sql = "SELECT * FROM 1bd_personal_physical  WHERE user_id = $id";
								$result = mysqlexec($sql);
								if($result){
								$row= mysqli_fetch_assoc($result);
								if($row){
								$biodatagender=$row['biodatagender'];
								}
								if($row){
								$dob=$row['dateofbirth'];
								}
								if($row){
								$height=$row['height'];
								}
								if($row){
								$weight=$row['weight'];	
								}
								if($row){
								$physicalstatus=$row['physicalstatus'];
								}
								if($row){
								$Skin_tones = $row['Skin_tones'];
								}
								if($row){
								$bloodgroup=$row['bloodgroup'];
								}
								}
							?>		
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="biodatavalue_list">
									<table class="biodata_value_data">
										<h3>শারীরিক বিষয়াবলি</h3>
										<tbody>
											<?php if (!empty($biodatagender)) : ?>
											<tr class="opened">
												<td class="day_label">বায়োডাটার ধরণ</td>
												<td class="day_value"><?php echo $biodatagender; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($dob)) : ?>
											<tr class="opened">
												<td class="day_label">জন্ম সন (আসল)</td>
												<td class="day_value"><?php echo $dob; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($Skin_tones)) : ?>
											<tr class="opened">
												<td class="day_label">শারীরিক বর্ণ</td>
												<td class="day_value closed"><span><?php echo $Skin_tones; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($height)) : ?>
											<tr class="opened">
												<td class="day_label">উচ্চতা</td>
												<td class="day_value"><?php echo $height; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($weight)) : ?>
											<tr class="opened">
												<td class="day_label">ওজন</td>
												<td class="day_value"><?php echo $weight; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($bloodgroup)) : ?>
											<tr class="opened">
												<td class="day_label">রক্তের গ্রুপ</td>
												<td class="day_value closed"><span><?php echo $bloodgroup; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($physicalstatus)) : ?>
											<tr class="opened">
												<td class="day_label">শারীরিক বা মানসিক কোনো সমস্যা আছে কি?</td>
												<td class="day_value closed"><span><?php echo $physicalstatus; ?></span></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
								<div class="clearfix"> </div>
								<!-- END  Personal & Physical  / sb-biodata-1  -->
								<!-- START - Personal & Life Style  / sb-biodata-2 -->
								<?php
									$id=$_GET['/Biodata'];
									$profileid=$id;
									$sql = "SELECT * FROM 2bd_personal_lifestyle WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
									$row= mysqli_fetch_assoc($result);
									if($row){
									$smoke=$row['smoke'];
									}
									if($row){
									$no_occupation=$row['no_occupation'];
									}
									if($row){
									$other_occupation_sector=$row['other_occupation_sector'];
									}
									if($row){
									$business_occupation_level=$row['business_occupation_level'];
									}
									if($row){
									$student_occupation_level=$row['student_occupation_level'];
									}
									if($row){
									$health_occupation_level=$row['health_occupation_level'];
									}
									if($row){
									$engineer_occupation_level=$row['engineer_occupation_level'];
									}
									if($row){
									$teacher_occupation_level=$row['teacher_occupation_level'];
									}
									if($row){
									$defense_occupation_level=$row['defense_occupation_level'];
									}
									if($row){
									$shop_occupation_level=$row['shop_occupation_level'];
									}
									if($row){
									$foreigner_occupation_level=$row['foreigner_occupation_level'];
									}
									if($row){
									$garments_occupation_level=$row['garments_occupation_level'];
									}
									if($row){
									$driver_occupation_level=$row['driver_occupation_level'];
									}
									if($row){
									$service_andcommon_occupation_level=$row['service_andcommon_occupation_level'];
									}
									if($row){
									$mistri_occupation_level=$row['mistri_occupation_level'];
									}
									if($row){
									$occupation_describe=$row['occupation_describe'];
									}
									if($row){
									$dress_code=$row['dress_code'];
									}
									if($row){
									$aboutme=$row['aboutme'];
									}
									}
								?>
				    			<div class="biodatavalue_list">
									<table class="biodata_value_data">
										<h3>ব্যক্তিগত ও কর্মজীবন</h3>
										<tbody>
											<?php if (!empty($smoke)) : ?>
											<tr class="opened">
												<td class="day_label">ধূমপান করা হয়?</td>
												<td class="day_value"><?php echo $smoke; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($no_occupation)) : ?>
											<tr class="opened">
												<td class="day_label">পেশা</td>
												<td class="day_value"><?php echo $no_occupation; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($other_occupation_sector)) : ?>
											<tr class="opened">
												<td class="day_label">পেশা</td>
												<td class="day_value"><?php echo $other_occupation_sector; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($business_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $business_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($student_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $student_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($health_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $health_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($engineer_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $engineer_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($teacher_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $teacher_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($defense_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $defense_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($shop_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $shop_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($foreigner_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $foreigner_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($garments_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $garments_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($driver_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $driver_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($service_andcommon_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $service_andcommon_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($mistri_occupation_level)) : ?>
											<tr class="closed">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><?php echo $mistri_occupation_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($occupation_describe)) : ?>
											<tr class="opened">
												<td class="day_label">পেশার বিস্তারিত তথ্য</td>
												<td class="day_value closed"><span><?php echo $occupation_describe; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($dress_code)) : ?>
											<tr class="opened">
												<td class="day_label">ঘরের বাহিরে সাধারণত কি ধরণের পোশাক পরেন?</td>
												<td class="day_value closed"><span><?php echo $dress_code; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($aboutme)) : ?>
											<tr class="opened">
												<td class="day_label">নিজের সম্পর্কে কিছু লিখুন</td>
												<td class="day_value closed"><span><?php echo $aboutme; ?></span></td>
											</tr>
											<?php endif; ?>
										</tbody>
				            		</table>
				        		</div>
				        		<div class="clearfix"> </div>
								<!-- END - Personal & Life Style  / sb-biodata-2 -->
								<!-- START  - Educational Qualifications  / sb-biodata-3 -->
								<?php
									$id=$_GET['/Biodata'];
									$profileid=$id;
									$sql="SELECT * FROM 3bd_secondaryedu_method WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
										$row=mysqli_fetch_assoc($result);
										if($row){
										$scndry_edu_method=$row['scndry_edu_method'];
										}
										if($row){
										$others_edu_qualification=$row['others_edu_qualification'];
										}
										if($row){
										$gnrl_mdrs_secondary_pass=$row['gnrl_mdrs_secondary_pass'];
										}
										if($row){
										$gnrl_mdrs_secondary_pass_year=$row['gnrl_mdrs_secondary_pass_year']; 
										}
										if($row){
										$gnrl_mdrs_secondary_end_year=$row['gnrl_mdrs_secondary_end_year'];
										}
										if($row){
										$gnrlmdrs_secondary_running_std=$row['gnrlmdrs_secondary_running_std'];
										}
									}
									$sql="SELECT * FROM 3bd_kowmi_madrasaedu_method WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
										$row=mysqli_fetch_assoc($result);
										if($row){
										$qawmi_madrasa_hafez=$row['qawmi_madrasa_hafez'];
										}
										if($row){
										$qawmimadrasa_dawrapass=$row['qawmimadrasa_dawrapass']; 
										}
										if($row){
										$kowmi_dawrapas_year=$row['kowmi_dawrapas_year'];
										}
										if($row){
										$kowmi_current_edu_level=$row['kowmi_current_edu_level'];
										}
									}
									$sql="SELECT * FROM 3bd_higher_secondaryedu_method WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
										$row=mysqli_fetch_assoc($result);
										if($row){
										$higher_secondary_edu_method=$row['higher_secondary_edu_method'];
										}
										if($row){
										$current_max_edu_subject=$row['current_max_edu_subject']; 
										}
										if($row){
										$current_max_institute=$row['current_max_institute'];
										}
										if($row){
										$current_max_pass_year=$row['current_max_pass_year'];
										}
									}
								?>
								<div class="biodatavalue_list">
									<table class="biodata_value_data">
										<h3>শিক্ষাগত যোগ্যতা</h3>
										<tbody>
											<?php if (!empty($scndry_edu_method)) : ?>
											<tr class="opened">
												<td class="day_label">মাধ্যমিক/সমমান শিক্ষার মাধ্যম</td>
												<td class="day_value"><?php echo $scndry_edu_method; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($qawmi_madrasa_hafez)) : ?>
											<tr class="opened">
												<td class="day_label">আপনি কি হাফেজ/হাফেজা?</td>
												<td class="day_value"><?php echo $qawmi_madrasa_hafez; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($qawmimadrasa_dawrapass)) : ?>
											<tr class="opened">
												<td class="day_label">দাওরায়ে হাদিস পাস করেছেন? (মাস্টার্স)</td>
												<td class="day_value"><?php echo $qawmimadrasa_dawrapass; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($kowmi_dawrapas_year)) : ?>
											<tr class="opened">
												<td class="day_label">দাওরায়ে হাদিস পাসের বর্ষ</td>
												<td class="day_value"><?php echo $kowmi_dawrapas_year; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($kowmi_current_edu_level)) : ?>
											<tr class="opened">
												<td class="day_label">মাদ্রাসায় বর্তমান অধ্যায়নরত জামাত</td>
												<td class="day_value"><?php echo $kowmi_current_edu_level; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($gnrl_mdrs_secondary_pass)) : ?>
											<tr class="opened">
												<td class="day_label">মাধ্যমিক/সমমান পাস করেছেন?</td>
												<td class="day_value"><?php echo $gnrl_mdrs_secondary_pass; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($gnrl_mdrs_secondary_pass_year)) : ?>
											<tr class="opened">
												<td class="day_label">মাধ্যমিক/সমমান পাসের বর্ষ</td>
												<td class="day_value"><?php echo $gnrl_mdrs_secondary_pass_year; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($gnrl_mdrs_secondary_end_year)) : ?>
											<tr class="opened">
												<td class="day_label">মাধ্যমিক/সমমান বোর্ড পরীক্ষার বর্ষ</td>
												<td class="day_value"><?php echo $gnrl_mdrs_secondary_end_year; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($gnrlmdrs_secondary_running_std)) : ?>
											<tr class="opened">
												<td class="day_label">মাধ্যমিক/সমমানে বর্তমান অধ্যায়নরত ক্লাস</td>
												<td class="day_value"><?php echo $gnrlmdrs_secondary_running_std; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($higher_secondary_edu_method)) : ?>
											<tr class="opened">
												<td class="day_label">বর্তমান শিক্ষাগত যোগ্যতা</td>
												<td class="day_value"><?php echo $higher_secondary_edu_method; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($current_max_edu_subject)) : ?>
											<tr class="opened">
												<td class="day_label">সাবজেক্ট/গ্রুপ</td>
												<td class="day_value"><?php echo $current_max_edu_subject; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($current_max_institute)) : ?>
											<tr class="opened">
												<td class="day_label">শিক্ষা প্রতিষ্ঠান</td>
												<td class="day_value"><?php echo $current_max_institute; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($current_max_pass_year)) : ?>
											<tr class="opened">
												<td class="day_label">পাসের বর্ষ</td>
												<td class="day_value"><?php echo $current_max_pass_year; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($others_edu_qualification)) : ?>
											<tr class="opened">
												<td class="day_label">অন্যান্য শিক্ষাগত যোগ্যতা</td>
												<td class="day_value"><?php echo $others_edu_qualification; ?></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
								<div class="clearfix"> </div>
								<!-- END - Educational Qualifications  / sb-biodata-3 -->
								<!-- START - Address Details  /  sb-biodata-4 -->
								<?php
									$id=$_GET['/Biodata'];
									$profileid=$id;
									$sql = "SELECT * FROM 4bd_address_details WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
									$row= mysqli_fetch_assoc($result);
									if($row){
									$permanent_division=$row['permanent_division'];
									}
									if($row){
									$home_district_under_barishal=$row['home_district_under_barishal'];
									}
									if($row){
									$home_district_under_chattogram=$row['home_district_under_chattogram'];
									}
									if($row){
									$home_district_under_dhaka=$row['home_district_under_dhaka'];
									}
									if($row){
									$home_district_under_khulna=$row['home_district_under_khulna'];
									}
									if($row){
									$home_district_under_mymensingh=$row['home_district_under_mymensingh'];
									}
									if($row){
									$home_district_under_rajshahi=$row['home_district_under_rajshahi'];
									}
									if($row){
									$home_district_under_rangpur=$row['home_district_under_rangpur'];
									}
									if($row){
									$home_district_under_sylhet=$row['home_district_under_sylhet'];
									}
									if($row){
									$country_present_address=$row['country_present_address'];
									}
									if($row){
									$present_address_location=$row['present_address_location'];
									}
									if($row){
									$present_address_living_purpose=$row['present_address_living_purpose'];
									}
									if($row){
									$childhood=$row['childhood'];
									}
									}
								?>
				    			<div class="biodatavalue_list">
									<table class="biodata_value_data">
										<h3>বর্তমান এবং স্থায়ী ঠিকানা</h3>
										<tbody>
											<?php if (!empty($country_present_address)) : ?>
											<tr class="opened">
												<td class="day_label">যেই দেশের স্থায়ী নাগরিক/সিটিজেন</td>
												<td class="day_value"><?php echo $country_present_address;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($permanent_division)) : ?>
											<tr class="opened">
												<td class="day_label">বাংলাদেশে স্থায়ী ঠিকানা-বিভাগ</td>
												<td class="day_value"><?php echo $permanent_division; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_barishal)) : ?>
											<tr class="closed">
												<td class="day_label">বাংলাদেশে স্থায়ী ঠিকানা-জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_barishal;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_chattogram)) : ?>
											<tr class="closed">
												<td class="day_label">বাংলাদেশে স্থায়ী ঠিকানা-জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_chattogram;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_dhaka)) : ?>
											<tr class="closed">
												<td class="day_label">বাংলাদেশে স্থায়ী ঠিকানা-জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_dhaka;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_khulna)) : ?>
											<tr class="closed">
												<td class="day_label">বাংলাদেশে স্থায়ী ঠিকানা-জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_khulna;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_mymensingh)) : ?>
											<tr class="closed">
												<td class="day_label">বাংলাদেশে স্থায়ী ঠিকানা-জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_mymensingh;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_rajshahi)) : ?>
											<tr class="closed">
												<td class="day_label">বাংলাদেশে স্থায়ী ঠিকানা-জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_rajshahi;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_rangpur)) : ?>
											<tr class="closed">
												<td class="day_label">বাংলাদেশে স্থায়ী ঠিকানা-জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_rangpur;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_sylhet)) : ?>
											<tr class="closed">
												<td class="day_label">বাংলাদেশে স্থায়ী ঠিকানা-জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_sylhet;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($present_address_location)) : ?>
											<tr class="opened">
												<td class="day_label">বর্তমান ঠিকানা</td>
												<td class="day_value"><?php echo $present_address_location; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($present_address_living_purpose)) : ?>
											<tr class="opened">
												<td class="day_label">উক্ত বর্তমান ঠিকানায় যেই উদ্দেশ্যে থাকা হয়?</td>
												<td class="day_value"><?php echo $present_address_living_purpose; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($childhood)) : ?>
											<tr class="opened">
												<td class="day_label">বাল্যকালে কোন ঠিকানায় বড় হয়েছেন?</td>
												<td class="day_value"><?php echo $childhood; ?></td>
											</tr>
											<?php endif; ?>
										</tbody>
				            		</table>
				        		</div>
				        		<div class="clearfix"> </div>
								<!-- END - Address Details  /  sb-biodata-4  -->
								<!-- START - Male Marriage related Info / sb-biodata-6
								Female Marriage related Info / sb-biodata-7 -->
								<?php
									$id=$_GET['/Biodata'];
									$profileid=$id;
									$sql="SELECT * FROM 6bd_marriage_related_qs_male WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
										$row=mysqli_fetch_assoc($result);
										if($row){
											$allowstudy_aftermarriage=$row['allowstudy_aftermarriage'];
										}
										if($row){
											$allowjob_aftermarriage=$row['allowjob_aftermarriage'];
										}
										if($row){
											$livewife_aftermarriage=$row['livewife_aftermarriage'];
										}
									}
									$sql="SELECT * FROM 7bd_marriage_related_qs_female WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
										$row=mysqli_fetch_assoc($result);
										if($row){
											$anyjob_aftermarriage=$row['anyjob_aftermarriage'];
										}
										if($row){
											$studies_aftermarriage=$row['studies_aftermarriage'];
										}
										if($row){
											$agree_marriage_student=$row['agree_marriage_student'];
										}
									}
									$sql="SELECT * FROM 6bd_7bd_marital_status WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
										$row=mysqli_fetch_assoc($result);
										if($row){
											$maritalstatus=$row['maritalstatus'];
										}
										if($row){
											$divorce_reason=$row['divorce_reason'];
										}
										if($row){
											$how_widow=$row['how_widow'];
										}
										if($row){
											$how_widower=$row['how_widower'];
										}
										if($row){
											$get_wife_permission=$row['get_wife_permission'];
										}
										if($row){
											$get_family_permission=$row['get_family_permission'];
										}
										if($row){
											$why_again_married=$row['why_again_married'];
										}
										if($row){
											$how_many_son=$row['how_many_son'];
										}
										if($row){
											$son_details=$row['son_details'];
										}
									}
								?>
				    			<div class="biodatavalue_list">
									<table class="biodata_value_data">
										<h3>বিবাহ সম্পর্কিত তথ্য</h3>
										<tbody>
											<!-- Marital Status 6 & 7 -->
											<?php if (!empty($maritalstatus)) : ?>
											<tr class="opened">
												<td class="day_label">বৈবাহিক অবস্থা</td>
												<td class="day_value"><?php echo $maritalstatus; ?></td>
											</tr>
											<?php endif; ?>
											<!-- If Divorce -->
											<?php if (!empty($divorce_reason)) : ?>
											<tr class="opened">
												<td class="day_label">ডিভোর্সের কারণ</td>
												<td class="day_value"><?php echo $divorce_reason; ?></td>
											</tr>
											<?php endif; ?>
											<!-- If Widow -->
											<?php if (!empty($how_widow)) : ?>
											<tr class="opened">
												<td class="day_label">স্বামী যেভাবে মারা গেছেন</td>
												<td class="day_value"><?php echo $how_widow; ?></td>
											</tr>
											<?php endif; ?>
											<!-- If Widower -->
											<?php if (!empty($how_widower)) : ?>
											<tr class="opened">
												<td class="day_label">স্ত্রী যেভাবে মারা গেছেন</td>
												<td class="day_value"><?php echo $how_widower; ?></td>
											</tr>
											<?php endif; ?>
											<!-- If Married -->
											<?php if (!empty($get_wife_permission)) : ?>
											<tr class="opened">
												<td class="day_label">বর্তমান স্ত্রীর অনুমতি নিয়েছেন?</td>
												<td class="day_value"><?php echo $get_wife_permission; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($get_family_permission)) : ?>
											<tr class="opened">
												<td class="day_label">স্ত্রীর পরিবার থেকে অনুমতি নিয়েছেন?</td>
												<td class="day_value"><?php echo $get_family_permission; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($why_again_married)) : ?>
											<tr class="opened">
												<td class="day_label">আবার বিয়ে করার কারণ</td>
												<td class="day_value"><?php echo $why_again_married; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($how_many_son)) : ?>
											<tr class="opened">
												<td class="day_label">কয়টি সন্তান আছে</td>
												<td class="day_value"><?php echo $how_many_son; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($son_details)) : ?>
											<tr class="opened">
												<td class="day_label">সন্তান সম্পর্কিত তথ্য</td>
												<td class="day_value"><?php echo $son_details; ?></td>
											</tr>
											<?php endif; ?>
											<!-- bd_marriage_related_qs Male & Female -->
											<?php if (!empty($allowstudy_aftermarriage)) : ?>
											<tr class="opened">
												<td class="day_label">বিয়ের পর স্ত্রীকে প্রাতিষ্ঠানিক পড়ালেখা করতে দিতে ইচ্ছুক? (স্ত্রী যদি চায়)</td>
												<td class="day_value"><?php echo $allowstudy_aftermarriage; ?></td>
											</tr>
											<?php endif; ?>
											<!-- Top Male |OR| Bellow Female -->
											<?php if (!empty($studies_aftermarriage)) : ?>
											<tr class="opened">
												<td class="day_label">বিয়ের পর পড়াশোনা চালিয়ে যেতে চান?</td>
												<td class="day_value"><?php echo $studies_aftermarriage; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($allowjob_aftermarriage)) : ?>
											<tr class="opened">
												<td class="day_label">বিয়ের পর স্ত্রীকে চাকরি করতে দিতে ইচ্ছুক? (স্ত্রী যদি চায়)</td>
												<td class="day_value"><?php echo $allowjob_aftermarriage; ?></td>
											</tr>
											<?php endif; ?>
											<!-- Top Male |OR| Bellow Female -->
											<?php if (!empty($anyjob_aftermarriage)) : ?>
											<tr class="opened">
												<td class="day_label">বিয়ের পর চাকরি করতে চান?</td>
												<td class="day_value"><?php echo $anyjob_aftermarriage; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($livewife_aftermarriage)) : ?>
											<tr class="opened">
												<td class="day_label">বিয়ের পর স্ত্রীকে নিয়ে কোথায় থাকবেন?</td>
												<td class="day_value"><?php echo $livewife_aftermarriage; ?></td>
											</tr>
											<?php endif; ?>
											<!-- Top Male |OR| Bellow Female -->
											<?php if (!empty($agree_marriage_student)) : ?>
											<tr class="opened">
												<td class="day_label">শিক্ষার্থী বিয়ে করতে রাজি আছেন?</td>
												<td class="day_value"><?php echo $agree_marriage_student; ?></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
				        		<div class="clearfix"> </div>
								<!-- END - Male Marriage related Info / sb-biodata-6
								Female Marriage related Info / sb-biodata-7 -->
								<!-- START - Religion Details / sb-biodata-8 -->
								<?php
									$id=$_GET['/Biodata'];
									$profileid=$id;
									$sql = "SELECT * FROM 8bd_religion_details WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
									$row= mysqli_fetch_assoc($result);
									if($row){
									$religion=$row['religion'];
									}
									if($row){
									$yourreligion_condition=$row['yourreligion_condition'];
									}
									}
								?>
								<div class="biodatavalue_list">
									<table class="biodata_value_data">
										<h3>ধর্মীয় বিষয়</h3>
				        				<tbody>
											<?php if (!empty($religion)) : ?>
											<tr class="opened">
												<td class="day_label">ধর্ম</td>
												<td class="day_value"><?php echo $religion; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($yourreligion_condition)) : ?>
											<tr class="opened">
												<td class="day_label">ধর্মীয় বিষয়াবলি</td>
												<td class="day_value"><?php echo $yourreligion_condition;?></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="clearfix"> </div>
							<!-- END - Religion Details / sb-biodata-8 -->
							<!-- START - Family Information  / sb-biodata-5 -->
							<?php
								$id=$_GET['/Biodata'];
								$profileid=$id;
								$sql = "SELECT * FROM 5bd_family_information WHERE user_id = $id";
								$result = mysqlexec($sql);
								if($result){
								$row= mysqli_fetch_assoc($result);
								if($row){
								$family_major_guardian=$row['family_major_guardian'];
								}
								if($row){
								$father_alive=$row['father_alive'];
								}
								if($row){
								$fatheroccupation=$row['fatheroccupation'];
								}
								if($row){
								$mother_alive=$row['mother_alive'];
								}
								if($row){
								$motheroccupation=$row['motheroccupation'];
								}
								if($row){
								$brosis_number=$row['brosis_number'];
								}
								if($row){
								$brosis_info=$row['brosis_info'];
								}
								if($row){
								$uncle_profession=$row['uncle_profession'];
								}
								if($row){
								$family_class=$row['family_class'];
								}
								if($row){
								$financial_condition=$row['financial_condition'];
								}
								if($row){
								$family_religious_condition=$row['family_religious_condition'];
								}
								}
							?>
							<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
								<div class="biodatavalue_list">
									<table class="biodata_value_data">
										<h3>পারিবারিক ও সামাজিক তথ্য</h3>
										<tbody>
											<?php if (!empty($father_alive)) : ?>
											<tr class="opened">
												<td class="day_label">বাবা বেঁচে আছেন?</td>
												<td class="day_value"><?php echo $father_alive; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($fatheroccupation)) : ?>
											<tr class="opened">
												<td class="day_label">বাবার পেশা</td>
												<td class="day_value"><?php echo $fatheroccupation; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($mother_alive)) : ?>
											<tr class="opened">
												<td class="day_label">মা বেঁচে আছেন?</td>
												<td class="day_value closed"><span><?php echo $mother_alive; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($motheroccupation)) : ?>
											<tr class="opened">
												<td class="day_label">মায়ের পেশা</td>
												<td class="day_value closed"><span><?php echo $motheroccupation; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($brosis_number)) : ?>
											<tr class="opened">
												<td class="day_label">ভাইবোন কয়জন</td>
												<td class="day_value closed"><span><?php echo $brosis_number; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($brosis_info)) : ?>
											<tr class="opened">
												<td class="day_label">ভাইবোন সম্পর্কিত তথ্য</td>
												<td class="day_value closed"><span><?php echo $brosis_info; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($uncle_profession)) : ?>
											<tr class="opened">
												<td class="day_label">মামা/চাচাদের পেশা</td>
												<td class="day_value closed"><span><?php echo $uncle_profession; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($family_major_guardian)) : ?>
											<tr class="opened">
												<td class="day_label">পরিবারের প্রধান অভিভাবক কে?</td>
												<td class="day_value closed"><span><?php echo $family_major_guardian; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($family_class)) : ?>
											<tr class="opened">
												<td class="day_label">পারিবারিক অর্থনৈতিক অবস্থা</td>
												<td class="day_value closed"><span><?php echo $family_class; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($financial_condition)) : ?>
											<tr class="opened">
												<td class="day_label">অর্থনৈতিক অবস্থার বর্ণনা</td>
												<td class="day_value closed"><span><?php echo $financial_condition; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($family_religious_condition)) : ?>
											<tr class="opened">
												<td class="day_label">পরিবারের সকলের সামাজিক এবং ধর্মীয় মূল্যবোধ কেমন? সামাজিক এবং ধর্মীয় বিধিনিষেধ কত টুকু মেনে চলে?</td>
												<td class="day_value closed"><span><?php echo $family_religious_condition; ?></span></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="clearfix"> </div>
							<!-- END - Family Information  / sb-biodata-5  -->
							<!-- START - Expected Life Partner / sb-biodata-9 -->
							<?php
								$id=$_GET['/Biodata'];
								$profileid=$id;
								$sql = "SELECT * FROM 9bd_expected_life_partner WHERE user_id = $id";
								$result = mysqlexec($sql);
								if($result){
								$row= mysqli_fetch_assoc($result);
								if($row){
								$partner_citizen=$row['partner_citizen'];
								}
								if($row){
								$partner_district=$row['partner_district'];
								}
								if($row){
								$partner_maritialstatus=$row['partner_maritialstatus'];
								}
								if($row){
								$partner_age=$row['partner_age'];
								}
								if($row){
								$partner_skintones=$row['partner_skintones'];
								}
								if($row){
								$partner_height=$row['partner_height'];
								}
								if($row){
								$partner_education=$row['partner_education'];
								}
								if($row){
								$partner_profession=$row['partner_profession'];
								}
								if($row){
								$partner_financial=$row['partner_financial'];
								}
								if($row){
								$partner_attributes=$row['partner_attributes'];
								}
								if($row){
								$parents_permission=$row['parents_permission'];
								}
								if($row){
								$real_info_commited=$row['real_info_commited'];
								}
								if($row){
								$authorities_no_responsible=$row['authorities_no_responsible'];
								}
								}
							?>	
							<div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
								<div class="biodatavalue_list">
									<table class="biodata_value_data">
										<h3>প্রত্যাশিত জীবনসঙ্গীর বিবরণ</h3>
										<tbody>
											<?php if (!empty($partner_citizen)) : ?>
											<tr class="opened">
												<td class="day_label">দেশ (স্থায়ী নাগরিক/সিটিজেন)</td>
												<td class="day_value"><?php echo $partner_citizen; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($partner_district)) : ?>
											<tr class="opened">
												<td class="day_label">জেলা</td>
												<td class="day_value"><?php echo $partner_district; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($partner_age)) : ?>
											<tr class="opened">
												<td class="day_label">বয়স</td>
												<td class="day_value closed"><span><?php echo $partner_age; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($partner_skintones)) : ?>
											<tr class="opened">
												<td class="day_label">শারীরিক বর্ণ</td>
												<td class="day_value closed"><span><?php echo $partner_skintones; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($partner_height)) : ?>
											<tr class="opened">
												<td class="day_label">নূন্যতম উচ্চতা</td>
												<td class="day_value closed"><span><?php echo $partner_height; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($partner_maritialstatus)) : ?>
											<tr class="opened">
												<td class="day_label">বৈবাহিক অবস্থা</td>
												<td class="day_value closed"><span><?php echo $partner_maritialstatus; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($partner_education)) : ?>
											<tr class="opened">
												<td class="day_label">নূন্যতম শিক্ষাগত যোগ্যতা</td>
												<td class="day_value closed"><span><?php echo $partner_education; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($partner_profession)) : ?>
											<tr class="opened">
												<td class="day_label">পেশা</td>
												<td class="day_value closed"><span><?php echo $partner_profession; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($partner_financial)) : ?>
											<tr class="opened">
												<td class="day_label">অর্থনৈতিক অবস্থা</td>
												<td class="day_value closed"><span><?php echo $partner_financial; ?></span></td>
											<?php endif; ?>
											<?php if (!empty($partner_attributes)) : ?>
											</tr>
											<tr class="opened">
												<td class="day_label">জীবনসঙ্গীর যেসব বৈশিষ্ঠ বা গুণাবলী প্রত্যাশা করেন</td>
												<td class="day_value closed"><span><?php echo $partner_attributes; ?></span></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="clearfix"> </div>
							<!-- END -  Expected Life Partner / sb-biodata-9 -->
							<!-- START - Acceptance of commitment  -->
							<div class="biodatavalue_list">
								<table class="biodata_value_data">
									<h3>প্রতিশ্রুতি গ্রহণ</h3>
									<tbody>
										<?php if (!empty($parents_permission)) : ?>
										<tr class="opened">
											<td class="day_label">বিয়ের জন্য পাত্র/পাত্রী দেখার বিষয়টিতে আপনার পরিবার রাজি আছে?</td>
											<td class="day_value"><?php echo $parents_permission;?></td>
										</tr>
										<?php endif; ?>
										<?php if (!empty($real_info_commited)) : ?>
										<tr class="opened">
											<td class="day_label">সৃষ্টিকর্তার শপথ করে সাক্ষ্য দিন, যে তথ্যগুলো দিয়েছেন সব সত্য?</td>
											<td class="day_value"><?php echo $real_info_commited;?></td>
										</tr>
										<?php endif; ?>
										<?php if (!empty($authorities_no_responsible)) : ?>
										<tr class="opened">
											<td class="day_label">কোনো মিথ্যা তথ্য প্রদান করলে দুনিয়াবী আইনগত এবং পরকালের দায়ভার ShosurBari.com কর্তৃপক্ষ নিবে না। আপনি কি সম্মত?</td>
											<td class="day_value closed"><span><?php echo $authorities_no_responsible;?></span></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								<div class="profile-btn">
									<div class="copy-sbbio-link">
										<a href="search.php">
											<button class="copylink clipboard" id="Create-post"><i class="fa fa-search"></i>সার্চ পেজ</button>
										</a>
									</div>
									<div class="contact-bio">
										<a href="payment-shosurbari.php?/Biodata=<?php echo $profileid; ?>">
											<button class="chatbtn" id="chatBtn"><i class="fa fa-phone"></i>যোগাযোগ</button>
										</a>
									</div></br>
								</div>
							</div>
							<!-- END - Acceptance of commitment -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- START - FOR MOBILE
    Recent View / Last View Profile  -->
	<div class="sbbiodata_profile_recentview-mobile">
        <h3>জনপ্রিয় বায়োডাটা</h3>
        <?php
        if ($biodatagender == 'পাত্রের বায়োডাটা') {
        $sql = "SELECT p.*, u.active
        FROM 1bd_personal_physical p
        INNER JOIN users u ON p.user_id = u.id
        WHERE u.active = 1 AND p.biodatagender = 'পাত্রের বায়োডাটা'
        ORDER BY p.view_count DESC LIMIT 6"; // Top 6 profiles by view_count of active users
        $result = mysqlexec($sql);
        $count = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['active'] == 1) {
            $profid = $row['user_id'];
            $Skin_tones_recentview2 = $row['Skin_tones'];
            $height_recentview2 = $row['height'];
            $dateofbirth_recentview2 = $row['dateofbirth'];
            $sql3 = "SELECT * FROM 2bd_personal_lifestyle WHERE user_id=$profid";
            $result3 = mysqlexec($sql3);
            if ($result3 && mysqli_num_rows($result3) > 0) {
                $row3 = mysqli_fetch_assoc($result3);
                $occupation_levels = array(
					'no_occupation' => $row3['no_occupation'],
					'other_occupation_sector' => $row3['other_occupation_sector'],
                    'business_occupation_level' => $row3['business_occupation_level'],
                    'student_occupation_level' => $row3['student_occupation_level'],
                    'health_occupation_level' => $row3['health_occupation_level'],
                    'engineer_occupation_level' => $row3['engineer_occupation_level'],
                    'teacher_occupation_level' => $row3['teacher_occupation_level'],
                    'defense_occupation_level' => $row3['defense_occupation_level'],
					'shop_occupation_level' => $row3['shop_occupation_level'],
                    'foreigner_occupation_level' => $row3['foreigner_occupation_level'],
                    'garments_occupation_level' => $row3['garments_occupation_level'],
                    'driver_occupation_level' => $row3['driver_occupation_level'],
                    'service_andcommon_occupation_level' => $row3['service_andcommon_occupation_level'],
                    'mistri_occupation_level' => $row3['mistri_occupation_level'],
                );
                $occupation_levels = array_filter($occupation_levels);
                $occupation_recentview2 = reset($occupation_levels);
            }
            $sql4 = "SELECT * FROM 4bd_address_details WHERE user_id=$profid";
            $result4 = mysqlexec($sql4);
            if ($result4 && mysqli_num_rows($result4) > 0) {
                $row4 = mysqli_fetch_assoc($result4);
                $home_district2 = '';
                if (!empty($row4['home_district_under_barishal'])) {
                $home_district2 = $row4['home_district_under_barishal'];
                } elseif (!empty($row4['home_district_under_chattogram'])) {
                $home_district2 = $row4['home_district_under_chattogram'];
                } elseif (!empty($row4['home_district_under_dhaka'])) {
                $home_district2 = $row4['home_district_under_dhaka'];
                } elseif (!empty($row4['home_district_under_khulna'])) {
                $home_district2 = $row4['home_district_under_khulna'];
                } elseif (!empty($row4['home_district_under_mymensingh'])) {
                $home_district2 = $row4['home_district_under_mymensingh'];
                } elseif (!empty($row4['home_district_under_rajshahi'])) {
                $home_district2 = $row4['home_district_under_rajshahi'];
                } elseif (!empty($row4['home_district_under_rangpur'])) {
                $home_district2 = $row4['home_district_under_rangpur'];
                } elseif (!empty($row4['home_district_under_sylhet'])) {
                $home_district2 = $row4['home_district_under_sylhet'];
                }
            }
            $sql2 = "SELECT * FROM photos WHERE user_id = $profid";
            $result2 = mysqlexec($sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $pic1 = $row2['pic1'];
            $defaultImages = [
                'পাত্রের বায়োডাটা' => "shosurbari-male-icon.jpg",
                'পাত্রীর বায়োডাটা' => "shosurbari-female-icon.png",
            ];
            $defaultImage = "shosurbari-default-icon.png";
            if (isset($row['biodatagender']) && isset($defaultImages[$row['biodatagender']])) {
                $defaultImage = $defaultImages[$row['biodatagender']];
            }
            echo "<div class=\"biodatarecent_viewlist\">";
            echo "<div class=\"sbbio_header_recent_view\">";
            // Start of Default Photo Show
            echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\">";
            if (!empty($pic1)) {
                echo "<img class=\"img-responsive\" src=\"profile/{$profid}/{$pic1}\"/>";
            } else {
                echo "<img class=\"img-responsive\" src=\"images/{$defaultImage}\"/>";
            }
            echo "</a>";
            // End of Default photo Show
            echo "<div class=\"sbbio_number_recentview\"><span class=\"sb_biodatanumber_recentview\"> {$profid} <br> বায়োডাটা নং </span> </div>";
            echo "</div>";
            echo "<div class=\"sb_user_recentview\">";
            echo "<table class=\"biodata_value_data\">";
            echo "<tbody>";
            // Create rows for each piece of information
            echo "<tr class=\"opened\">";
            echo "<td class=\"sb_label\">শারীরিক বর্ণ</td>";
            echo "<td class=\"sb_value\">{$Skin_tones_recentview2}</td>";
            echo "</tr>";
            echo "<tr class=\"opened\">";
            echo "<td class=\"sb_label\">উচ্চতা</td>";
            echo "<td class=\"sb_value\">{$height_recentview2}</td>";
            echo "</tr>";
            echo "<tr class=\"opened\">";
            echo "<td class=\"sb_label\">পেশা</td>";
            echo "<td class=\"sb_value\">{$occupation_recentview2}</td>";
            echo "</tr>";
            echo "<tr class=\"opened\">";
            echo "<td class=\"sb_label\">জেলা</td>";
            echo "<td class=\"sb_value\">{$home_district2}</td>";
            echo "</tr>";
            echo "<tr class=\"opened\">";
            echo "<td class=\"sb_label\">জন্ম সন</td>";
            echo "<td class=\"sb_value\">{$dateofbirth_recentview2}</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\">";
            echo "<button class=\"view_sb_profile_recentview\">সম্পূর্ণ বায়োডাটা</button>";
            echo "</a>";
            echo "</div></div>";
            $count++;
            }
        }
        } elseif ($biodatagender == 'পাত্রীর বায়োডাটা') {
        $sql = "SELECT p.*, u.active
        FROM 1bd_personal_physical p
        INNER JOIN users u ON p.user_id = u.id
        WHERE u.active = 1 AND p.biodatagender = 'পাত্রীর বায়োডাটা'
        ORDER BY p.view_count DESC LIMIT 6"; // Top 6 profiles by view_count of active users
        $result = mysqlexec($sql);
        $count = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['active'] == 1) {
            $profid = $row['user_id'];
            $Skin_tones_recentview2 = $row['Skin_tones'];
            $height_recentview2 = $row['height'];
            $dateofbirth_recentview2 = $row['dateofbirth'];
            $sql3 = "SELECT * FROM 2bd_personal_lifestyle WHERE user_id=$profid";
            $result3 = mysqlexec($sql3);
            if ($result3 && mysqli_num_rows($result3) > 0) {
                $row3 = mysqli_fetch_assoc($result3);
                $occupation_levels = array(
					'no_occupation' => $row3['no_occupation'],
					'other_occupation_sector' => $row3['other_occupation_sector'],
                    'business_occupation_level' => $row3['business_occupation_level'],
                    'student_occupation_level' => $row3['student_occupation_level'],
                    'health_occupation_level' => $row3['health_occupation_level'],
                    'engineer_occupation_level' => $row3['engineer_occupation_level'],
                    'teacher_occupation_level' => $row3['teacher_occupation_level'],
                    'defense_occupation_level' => $row3['defense_occupation_level'],
					'shop_occupation_level' => $row3['shop_occupation_level'],
                    'foreigner_occupation_level' => $row3['foreigner_occupation_level'],
                    'garments_occupation_level' => $row3['garments_occupation_level'],
                    'driver_occupation_level' => $row3['driver_occupation_level'],
                    'service_andcommon_occupation_level' => $row3['service_andcommon_occupation_level'],
                    'mistri_occupation_level' => $row3['mistri_occupation_level'],
                );
                $occupation_levels = array_filter($occupation_levels);
                $occupation_recentview2 = reset($occupation_levels);
            }
            $sql4 = "SELECT * FROM 4bd_address_details WHERE user_id=$profid";
            $result4 = mysqlexec($sql4);
            if ($result4 && mysqli_num_rows($result4) > 0) {
                $row4 = mysqli_fetch_assoc($result4);
                $home_district2 = '';
                if (!empty($row4['home_district_under_barishal'])) {
                $home_district2 = $row4['home_district_under_barishal'];
                } elseif (!empty($row4['home_district_under_chattogram'])) {
                $home_district2 = $row4['home_district_under_chattogram'];
                } elseif (!empty($row4['home_district_under_dhaka'])) {
                $home_district2 = $row4['home_district_under_dhaka'];
                } elseif (!empty($row4['home_district_under_khulna'])) {
                $home_district2 = $row4['home_district_under_khulna'];
                } elseif (!empty($row4['home_district_under_mymensingh'])) {
                $home_district2 = $row4['home_district_under_mymensingh'];
                } elseif (!empty($row4['home_district_under_rajshahi'])) {
                $home_district2 = $row4['home_district_under_rajshahi'];
                } elseif (!empty($row4['home_district_under_rangpur'])) {
                $home_district2 = $row4['home_district_under_rangpur'];
                } elseif (!empty($row4['home_district_under_sylhet'])) {
                $home_district2 = $row4['home_district_under_sylhet'];
                }
            }
            $sql2 = "SELECT * FROM photos WHERE user_id = $profid";
            $result2 = mysqlexec($sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $pic1 = $row2['pic1'];
            $defaultImages = [
                'পাত্রের বায়োডাটা' => "shosurbari-male-icon.jpg",
                'পাত্রীর বায়োডাটা' => "shosurbari-female-icon.png",
            ];
            $defaultImage = "shosurbari-default-icon.png";
            if (isset($row['biodatagender']) && isset($defaultImages[$row['biodatagender']])) {
                $defaultImage = $defaultImages[$row['biodatagender']];
            }
            echo "<div class=\"biodatarecent_viewlist\">";
            echo "<div class=\"sbbio_header_recent_view\">";
            // Start of Default Photo Show
            echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\">";
            if (!empty($pic1)) {
                echo "<img class=\"img-responsive\" src=\"profile/{$profid}/{$pic1}\"/>";
            } else {
                echo "<img class=\"img-responsive\" src=\"images/{$defaultImage}\"/>";
            }
            echo "</a>";
            // End of Default photo Show
            echo "<div class=\"sbbio_number_recentview\"><span class=\"sb_biodatanumber_recentview\"> {$profid} <br> বায়োডাটা নং </span> </div>";
            echo "</div>";
            echo "<div class=\"sb_user_recentview\">";
            echo "<table class=\"biodata_value_data\">";
            echo "<tbody>";
            // Create rows for each piece of information
            echo "<tr class=\"opened\">";
            echo "<td class=\"sb_label\">শারীরিক বর্ণ</td>";
            echo "<td class=\"sb_value\">{$Skin_tones_recentview2}</td>";
            echo "</tr>";
            echo "<tr class=\"opened\">";
            echo "<td class=\"sb_label\">উচ্চতা</td>";
            echo "<td class=\"sb_value\">{$height_recentview2}</td>";
            echo "</tr>";
            echo "<tr class=\"opened\">";
            echo "<td class=\"sb_label\">পেশা</td>";
            echo "<td class=\"sb_value\">{$occupation_recentview2}</td>";
            echo "</tr>";
            echo "<tr class=\"opened\">";
            echo "<td class=\"sb_label\">জেলা</td>";
            echo "<td class=\"sb_value\">{$home_district2}</td>";
            echo "</tr>";
            echo "<tr class=\"opened\">";
            echo "<td class=\"sb_label\">জন্ম সন</td>";
            echo "<td class=\"sb_value\">{$dateofbirth_recentview2}</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\">";
            echo "<button class=\"view_sb_profile_recentview\">সম্পূর্ণ বায়োডাটা</button>";
            echo "</a>";
            echo "</div></div>";
            $count++;
            }
        }}
	    ?>
    </div>
	<!-- END - FOR MOBILE
    Recent View / Last View Profile  -->
	<!--View This Page. Connected to get view count -->
	<script>
	$(document).ready(function() {
		var userId = getUrlParameter('/Biodata');
		if (userId) {
			$.ajax({
				url: 'biodata_visit_count.php?/Biodata=' + userId,
				type: 'GET',
				success: function(data) {
					$('#viewCount').html(data);
				}
			});
		}
	});
	function getUrlParameter(name) {
		name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
		var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
		var results = regex.exec(location.search);
		return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
	}
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
