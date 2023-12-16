<?php 
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Biodata | ShosurBari</title>
	<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
	<!-- Emoji Picker -->
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
		top: 72px;
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
		font-size: 17px;
		border-radius: 3px;
	}
	.nav-tabs1>li{
		margin-left: 7px;
		margin-right: 7px;
	}
	}
	@media (max-width:1920px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 12px 20px;
		font-size: 17px;
	}
	}
	@media (max-width:1600px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 11px 15px;
		font-size: 16px;
	}
	}
	@media (max-width:1400px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 11px 13px;
		font-size: 15px;
	}
	}
	@media (max-width:1280px){
	.fixed {
		right: 5%;
		width: 61.2%;
	}
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 10px;
		font-size: 15px;
		height: 35px;
		line-height: 20px;
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
		width: 100%;
		padding: 10px;
		font-size: 14px;
	}
	}  
	@media (max-width: 736px){
	.fixed {
		top: 128px;
	}
	}
	@media (max-width: 600px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 8px 10px;
		line-height: 21px;
	}
	.nav-tabs1>li{
		margin-left: 4px;
		margin-right: 4px;
	}
	}
	@media (max-width: 480px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 8px 5px;
		font-size: 13px;
		height: 33px;
	}
	.nav-tabs1>li{
		margin-left: 3px;
		margin-right: 3px;
	}
	}
	@media (max-width: 384px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 7px 4px;
		font-size: 12px;
		height: 30px;
		line-height: 19px;
	}
	.nav-tabs1>li{
		margin-left: 2px;
		margin-right: 2px;
	}
	}
	@media (max-width: 350px){
	a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 5px 1px;
		font-size: 12px;
		height: 27px;
		line-height: 21px;
	}
	}
	@media (max-width: 320px){
		a#profile-tab, a#home-tab, a#profile-tab1 {
		padding: 6px 2px;
	}
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
					$id=$_GET['/Biodata'];
					$profileid=$id;
					$sql = "SELECT * FROM 4bd_address_details  WHERE user_id = $id";
					$result = mysqlexec($sql);
					$row=mysqli_fetch_assoc($result);
					//Biodata 4
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
					$sql = "SELECT profilecreationdate FROM 1bd_personal_physical WHERE user_id = $id";
					$result = mysqlexec($sql);
					$row = mysqli_fetch_assoc($result);
					$profilecreationdate = '';
					if ($row && !empty($row['profilecreationdate'])) {
						$profileCreationDateTime = new DateTime($row['profilecreationdate']);
						$formattedProfileCreationDate = $profileCreationDateTime->format('d F Y');
						$profilecreationdate = $formattedProfileCreationDate;
					}
				?>
				<div class="address">
					<?php if (!empty($home_district_under_barishal)) { ?>
						<td class="day_value closed">স্থায়ী ঠিকানা জেলা : <?php echo $home_district_under_barishal; ?></td><br>
						<?php } ?>
						<?php if (!empty($home_district_under_chattogram)) { ?>
						<td class="day_value closed">স্থায়ী ঠিকানা জেলা : <?php echo $home_district_under_chattogram; ?></td><br>
						<?php } ?>
						<?php if (!empty($home_district_under_dhaka)) { ?>
						<td class="day_value closed">স্থায়ী ঠিকানা জেলা : <?php echo $home_district_under_dhaka; ?></td><br>
						<?php } ?>
						<?php if (!empty($home_district_under_khulna)) { ?>
						<td class="day_value closed">স্থায়ী ঠিকানা জেলা : <?php echo $home_district_under_khulna; ?></td><br>
						<?php } ?>
						<?php if (!empty($home_district_under_mymensingh)) { ?>
						<td class="day_value closed">স্থায়ী ঠিকানা জেলা : <?php echo $home_district_under_mymensingh; ?></td><br>
						<?php } ?>
						<?php if (!empty($home_district_under_rajshahi)) { ?>
						<td class="day_value closed">স্থায়ী ঠিকানা জেলা : <?php echo $home_district_under_rajshahi; ?></td><br>
						<?php } ?>
						<?php if (!empty($home_district_under_rangpur)) { ?>
						<td class="day_value closed">স্থায়ী ঠিকানা জেলা : <?php echo $home_district_under_rangpur; ?></td><br>
						<?php } ?>
						<?php if (!empty($home_district_under_sylhet)) { ?>
						<td class="day_value closed">স্থায়ী ঠিকানা জেলা : <?php echo $home_district_under_sylhet; ?></td><br>
						<?php } ?>
						<?php if (!empty($profilecreationdate)) { ?>
						<td class="day_value closed">পোস্ট তারিখ : <?php echo $profilecreationdate; ?></td>
						<?php } ?>
				</div>
    		</div>
			<div class="see_sb_biodata">
		    	<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">আমার তথ্য</a></li>
						<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">পারিবার ও ধর্ম</a></li>
						<li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">প্রত্যাশিত জীবনসঙ্গী</a></li>
					</ul>
				</div>
			</div>
	 	</div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
			// Profile Section Show With Scrolling Just for Mobile Responsive.
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
				} else if ($(window).width() >= 735 && $(window).width() <= 930) {
				targetOffset += 635;
				} else if ($(window).width() >= 385 && $(window).width() <= 734) {
				targetOffset += 600;
				} else if ($(window).width() >= 360 && $(window).width() <= 384) {
				targetOffset += 610; 
				} else if ($(window).width() >= 353 && $(window).width() <= 359) {
				targetOffset += 650;
				} else if ($(window).width() >= 321 && $(window).width() <= 352) {
				targetOffset += 690;      
				} else if ($(window).width() >= 260 && $(window).width() <= 320) {
				targetOffset += 612;
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
					<div class="biodatavalue_list" style="background: none; border-radius: 4px 4px 0px 0px; border-bottom: none; border-top: 1px solid #ccc; margin-top: 0px;">
						<h3 style="background: none; border-style: none;">সংক্ষেপে</h3>
					</div>
					<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
					--               S  T  A  R  T                   --
					--   Heading Section  / SB Short Biodata    --
					-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
					<div class="user-bio">
						<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
						--   SB Short Biodata / 1bd_personal_physical    --
						-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
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
						<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
						--   SB Short Biodata / 2bd_personal_lifestyle   --
						-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
						<?php
							$id=$_GET['/Biodata'];
							$profileid=$id;
							$sql = "SELECT * FROM 2bd_personal_lifestyle  WHERE user_id = $id";
							$result = mysqlexec($sql);
							$row=mysqli_fetch_assoc($result);
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
						<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
						--     SB Short Biodata / 4bd_address_details    --
						-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
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
						<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
						--     SB Short Biodata / 6bd_7bd_marital_status --
						-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
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
						<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
						--    SB Short Biodata / 8bd_religion_details    --
						-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
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
										<?php if (!empty($dob)) { ?>
										<td class="day_label">জন্ম সন (আসল)</td>
										<td class="day_value"><?php echo $dob; ?></td>
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
					<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
					--                   E   N   D                   --
					--   Heading Font Section  / SB Short Biodata    --
					-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
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
						}, 5000);
						})
					</script>
				</div>
				<div class="sbbiodata_profile_recentview">
					<h3>সর্বশেষ বায়োডাটা দেখেছেন</h3>
					<?php
						$sql = "SELECT p.*, u.active
						FROM 1bd_personal_physical p
						INNER JOIN users u ON p.user_id = u.id
						WHERE u.active = 1
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
										'business_occupation_level' => $row3['business_occupation_level'],
										'student_occupation_level' => $row3['student_occupation_level'],
										'health_occupation_level' => $row3['health_occupation_level'],
										'engineer_occupation_level' => $row3['engineer_occupation_level'],
										'teacher_occupation_level' => $row3['teacher_occupation_level'],
										'defense_occupation_level' => $row3['defense_occupation_level'],
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
										echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> শারীরিক বর্ণ </span>  <span class=\"sb_data_recentview\">{$Skin_tones_recentview1}</span></span>";
										echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> উচ্চতা </span>  <span class=\"sb_data_recentview\">{$height_recentview1}</span></span>";
										echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> পেশা </span>      <span class=\"sb_data_recentview\"> {$occupation_value}</span></span>";
										echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> জেলা </span>      <span class=\"sb_data_recentview\"> {$home_district}</span></span>";
										echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> জন্ম সন </span>        <span class=\"sb_data_recentview\"> {$dateofbirth_recentview1}</span></span>";
										echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\"><button class=\"view_sb_profile_recentview\">সম্পূর্ণ বায়োডাটা</button> </a>";
										echo "</div></div>";
										$count++;
									}
								}
							}
						}
						}
					?>
    			</div>
			</div>
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			--                S  T  A  R  T                  --
			--    		  Profile Details Show   		 	 --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	
			<div class="right-side"> <!-- Right-Side of Profile Sections-->
				<div class="separate_biodata_sector">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<div id="myTabContent" class="tab-content">
							<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
							--                S  T  A  R  T                  --
							--      Personal & Physical  / sb-biodata-1      --
							-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	
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
											<?php if (!empty($physicalstatus)) : ?>
											<tr class="opened">
												<td class="day_label">শারীরিক সমস্যা আছে কি?</td>
												<td class="day_value closed"><span><?php echo $physicalstatus; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($Skin_tones)) : ?>
											<tr class="opened">
												<td class="day_label">শারীরিক বর্ণ</td>
												<td class="day_value closed"><span><?php echo $Skin_tones; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($bloodgroup)) : ?>
											<tr class="opened">
												<td class="day_label">রক্তের গ্রুপ</td>
												<td class="day_value closed"><span><?php echo $bloodgroup; ?></span></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
								<div class="clearfix"> </div>
								<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
								--                   E   N   D                   --
								--       Personal & Physical  / sb-biodata-1     --
								-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
								<!-- End & Start -->
								<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
								--                S  T  A  R  T                  --
								--     Personal & Life Style  / sb-biodata-2     --
								-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
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
												<td class="day_label">ঘর ও ঘরের বাহিরে পোশাকের ধরন</td>
												<td class="day_value closed"><span><?php echo $dress_code; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($aboutme)) : ?>
											<tr class="opened">
												<td class="day_label">ব্যক্তিগত ইচ্ছা, শখ, স্বপ্ন, পছন্দ-অপছন্দ, রুচিবোধ ইত্যাদি বিষয়</td>
												<td class="day_value closed"><span><?php echo $aboutme; ?></span></td>
											</tr>
											<?php endif; ?>
										</tbody>
				            		</table>
				        		</div>
				        		<div class="clearfix"> </div>
								<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
								--                   E   N   D                   --
								--     Personal & Life Style  / sb-biodata-2     --
								-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
								<!-- End & Start -->
								<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
								--                S  T  A  R  T                  --
								--  Educational Qualifications  / sb-biodata-3   --
								-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
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
										$maxedu_qulfctn=$row['maxedu_qulfctn'];
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
										$gnrlmdrs_hrsecondary_pass=$row['gnrlmdrs_hrsecondary_pass']; 
										}
										if($row){
										$gnrlmdrs_hrsecondary_pass_year=$row['gnrlmdrs_hrsecondary_pass_year'];
										}
										if($row){
										$gnrlmdrs_hrsecondary_exam_year=$row['gnrlmdrs_hrsecondary_exam_year'];
										}
										if($row){
										$gnrlmdrs_hrsecondary_group=$row['gnrlmdrs_hrsecondary_group'];
										}
										if($row){
										$gnrlmdrs_hrsecondary_rningstd=$row['gnrlmdrs_hrsecondary_rningstd']; 
										}
										if($row){
										$diploma_hrsecondary_pass=$row['diploma_hrsecondary_pass'];
										}
										if($row){
										$diploma_hrsecondary_pass_year=$row['diploma_hrsecondary_pass_year'];
										}
										if($row){
										$diploma_hrsecondary_sub=$row['diploma_hrsecondary_sub'];
										}
										if($row){
										$diploma_hrsecondary_endingyear=$row['diploma_hrsecondary_endingyear']; 
										}
									}
									$sql="SELECT * FROM 3bd_universityedu_method WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
										$row=mysqli_fetch_assoc($result);
										if($row){
										$varsity_edu_method=$row['varsity_edu_method'];
										}
										if($row){
										$uvarsity_pass=$row['uvarsity_pass'];
										}
										if($row){
										$varsity_passing_year=$row['varsity_passing_year'];
										}
										if($row){
										$university_subject=$row['university_subject']; 
										}
										if($row){
										$varsity_ending_year=$row['varsity_ending_year'];
										}
										if($row){
										$uvarsity_name=$row['uvarsity_name'];
										}
										if($row){
										$others_edu_qualification=$row['others_edu_qualification'];
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
											<?php if (!empty($maxedu_qulfctn)) : ?>
											<tr class="opened">
												<td class="day_label">সর্বোচ্চ শিক্ষাগত যোগ্যতা</td>
												<td class="day_value"><?php echo $maxedu_qulfctn; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($qawmi_madrasa_hafez)) : ?>
											<tr class="opened">
												<td class="day_label">আপনি কি হাফেজ / হাফেজা?</td>
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
												<td class="day_label">উচ্চমাধ্যমিক/সমমান শিক্ষার মাধ্যম</td>
												<td class="day_value"><?php echo $higher_secondary_edu_method; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($gnrlmdrs_hrsecondary_pass)) : ?>
											<tr class="opened">
												<td class="day_label">উচ্চমাধ্যমিক/সমমান পাস করেছেন?</td>
												<td class="day_value"><?php echo $gnrlmdrs_hrsecondary_pass; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($gnrlmdrs_hrsecondary_pass_year)) : ?>
											<tr class="opened">
												<td class="day_label">উচ্চমাধ্যমিক/সমমান পাসের বর্ষ</td>
												<td class="day_value"><?php echo $gnrlmdrs_hrsecondary_pass_year; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($gnrlmdrs_hrsecondary_exam_year)) : ?>
											<tr class="opened">
												<td class="day_label">উচ্চমাধ্যমিক/সমমান বোর্ড পরীক্ষার বর্ষ</td>
												<td class="day_value"><?php echo $gnrlmdrs_hrsecondary_exam_year; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($gnrlmdrs_hrsecondary_group)) : ?>
											<tr class="opened">
												<td class="day_label">উচ্চমাধ্যমিক/সমমানে গ্রুপ</td>
												<td class="day_value"><?php echo $gnrlmdrs_hrsecondary_group; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($gnrlmdrs_hrsecondary_rningstd)) : ?>
											<tr class="opened">
												<td class="day_label">উচ্চমাধ্যমিক/সমমানে বর্তমান অধ্যায়নরত ক্লাস</td>
												<td class="day_value"><?php echo $gnrlmdrs_hrsecondary_rningstd; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($diploma_hrsecondary_pass)) : ?>
											<tr class="opened">
												<td class="day_label">ডিপ্লোমা পাস করেছেন?</td>
												<td class="day_value"><?php echo $diploma_hrsecondary_pass; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($diploma_hrsecondary_pass_year)) : ?>
											<tr class="opened">
												<td class="day_label">ডিপ্লোমা পাসের বর্ষ</td>
												<td class="day_value"><?php echo $diploma_hrsecondary_pass_year; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($diploma_hrsecondary_sub)) : ?>
											<tr class="opened">
												<td class="day_label">ডিপ্লোমায় সাবজেক্ট</td>
												<td class="day_value"><?php echo $diploma_hrsecondary_sub; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($diploma_hrsecondary_endingyear)) : ?>
											<tr class="opened">
												<td class="day_label">ডিপ্লোমা অধ্যায়ন সম্পন্ন হবে</td>
												<td class="day_value"><?php echo $diploma_hrsecondary_endingyear; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($varsity_edu_method)) : ?>
											<tr class="opened">
												<td class="day_label">স্নাতক/সমমান শিক্ষার মাধ্যম</td>
												<td class="day_value"><?php echo $varsity_edu_method; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($uvarsity_pass)) : ?>
											<tr class="opened">
												<td class="day_label">স্নাতক/সমমান পাস করেছেন?</td>
												<td class="day_value"><?php echo $uvarsity_pass; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($varsity_passing_year)) : ?>
											<tr class="opened">
												<td class="day_label">স্নাতক/সমমান পাসের বর্ষ</td>
												<td class="day_value"><?php echo $varsity_passing_year; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($university_subject)) : ?>
											<tr class="opened">
												<td class="day_label">স্নাতকে/সমমানে সাবজেক্ট</td>
												<td class="day_value"><?php echo $university_subject; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($varsity_ending_year)) : ?>
											<tr class="opened">
												<td class="day_label">স্নাতক/সমমান অধ্যায়ন সম্পন্ন হবে</td>
												<td class="day_value"><?php echo $varsity_ending_year; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($uvarsity_name)) : ?>
											<tr class="opened">
												<td class="day_label">স্নাতকে/সমমানে শিক্ষা প্রতিষ্ঠান</td>
												<td class="day_value"><?php echo $uvarsity_name; ?></td>
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
								<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
								--                   E   N   D                   --
								--  Educational Qualifications  / sb-biodata-3   --
								-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
								<!-- End & Start -->
								<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
								--                S  T  A  R  T                  --
								--       Address Details  /  sb-biodata-4        --
								-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
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
									$childhood=$row['childhood'];
									}
									}
								?>
				    			<div class="biodatavalue_list">
									<table class="biodata_value_data">
										<h3>বর্তমান এবং স্থায়ী ঠিকানা</h3>
										<tbody>
											<?php if (!empty($permanent_division)) : ?>
											<tr class="opened">
												<td class="day_label">স্থায়ী ঠিকানা বিভাগ</td>
												<td class="day_value"><?php echo $permanent_division; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_barishal)) : ?>
											<tr class="closed">
												<td class="day_label">স্থায়ী ঠিকানা জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_barishal;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_chattogram)) : ?>
											<tr class="closed">
												<td class="day_label">স্থায়ী ঠিকানার জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_chattogram;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_dhaka)) : ?>
											<tr class="closed">
												<td class="day_label">স্থায়ী ঠিকানার জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_dhaka;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_khulna)) : ?>
											<tr class="closed">
												<td class="day_label">স্থায়ী ঠিকানার জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_khulna;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_mymensingh)) : ?>
											<tr class="closed">
												<td class="day_label">স্থায়ী ঠিকানার জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_mymensingh;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_rajshahi)) : ?>
											<tr class="closed">
												<td class="day_label">স্থায়ী ঠিকানার জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_rajshahi;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_rangpur)) : ?>
											<tr class="closed">
												<td class="day_label">স্থায়ী ঠিকানার জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_rangpur;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($home_district_under_sylhet)) : ?>
											<tr class="closed">
												<td class="day_label">স্থায়ী ঠিকানার জেলা</td>
												<td class="day_value closed"><?php echo $home_district_under_sylhet;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($country_present_address)) : ?>
											<tr class="opened">
												<td class="day_label">যেই দেশের স্থায়ী নাগরিক/সিটিজেন</td>
												<td class="day_value"><?php echo $country_present_address;?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($present_address_location)) : ?>
											<tr class="opened">
												<td class="day_label">বর্তমান ঠিকানা</td>
												<td class="day_value"><?php echo $present_address_location; ?></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($present_address_location)) : ?>
											<tr class="opened">
												<td class="day_label">উক্ত বর্তমান ঠিকানায় যেই উদ্দেশ্যে থাকা হয়</td>
												<td class="day_value"><?php echo $present_address_location; ?></td>
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
								<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
								--                   E   N   D                   --
								--       Address Details  /  sb-biodata-4        --
								-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
								<!-- End & Start -->
								<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
								--                S  T  A  R  T                  --
								--   Male Marriage related Info / sb-biodata-6   --
								--  Female Marriage related Info / sb-biodata-7  --
								-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
								<?php
									$id=$_GET['/Biodata'];
									$profileid=$id;
									$sql="SELECT * FROM 6bd_marriage_related_qs_male WHERE user_id = $id";
									$result = mysqlexec($sql);
									if($result){
										$row=mysqli_fetch_assoc($result);
										if($row){
											$guardians_agree=$row['guardians_agree'];
										}
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
											$guardians_agree=$row['guardians_agree'];
										}
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
										if($row){
											$profilecreationdate=$row['profilecreationdate'];
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
												<td class="day_label">স্ত্রীর ও আপনার পরিবারের অনুমতি নিয়েছেন?</td>
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
											<!-- This sections for All Marital StatusShow just without Married -->
											<?php if (!empty($guardians_agree)) : ?>
											<tr class="opened">
												<td class="day_label">পরিবারের অনুমতি নিয়ে বায়োডাটা পোস্ট করেছেন?</td>
												<td class="day_value"><?php echo $guardians_agree; ?></td>
											</tr>
											<?php endif; ?>
											<!-- bd_marriage_related_qs Male & Female -->
											<?php if (!empty($allowstudy_aftermarriage)) : ?>
											<tr class="opened">
												<td class="day_label">স্ত্রীকে প্রাতিষ্ঠানিক পড়ালেখা করতে দিতে ইচ্ছুক?</td>
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
												<td class="day_label">স্ত্রীকে চাকরি করতে দিতে ইচ্ছুক?</td>
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
											<?php if (!empty($agree_marriage_student)) : ?>
											<tr class="opened">
												<td class="day_label">অন্য ধর্মের অনুসারী যে কাওকে বিয়ে করতে রাজি হবেন যদি সে আপনার ধর্ম গ্রহণ করে?</td>
												<td class="day_value"><?php echo $agree_marriage_student; ?></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
				        		<div class="clearfix"> </div>
								<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
								--                   E   N   D                   --
								--   Male Marriage related Info / sb-biodata-6   --
								--  Female Marriage related Info / sb-biodata-7  --
								-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
								<!-- End & Start -->
								<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
								--                S  T  A  R  T                  --
								--        Religion Details / sb-biodata-8        --
								-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
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
							<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
							--                   E   N   D                   --
							--        Religion Details / sb-biodata-8        --
							-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
							<!-- End & Start -->
							<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
							--                S  T  A  R  T                  --
							--     Family Information  / sb-biodata-5        --
							-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
							<?php
								$id=$_GET['/Biodata'];
								$profileid=$id;
								$sql = "SELECT * FROM 5bd_family_information WHERE user_id = $id";
								$result = mysqlexec($sql);
								if($result){
								$row= mysqli_fetch_assoc($result);
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
												<td class="day_label">পরিবারের প্রধান অভিভাবক কে?</td>
												<td class="day_value closed"><span><?php echo $family_religious_condition; ?></span></td>
											</tr>
											<?php endif; ?>
											<?php if (!empty($family_religious_condition)) : ?>
											<tr class="opened">
												<td class="day_label">পরিবারের সকলের সামাজিক এবং ধর্মীয় মূল্যবোধ কেমন?</td>
												<td class="day_value closed"><span><?php echo $family_religious_condition; ?></span></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="clearfix"> </div>
							<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
							--                   E   N   D                   --
							--     Family Information  / sb-biodata-5        --
							-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
							<!-- End & Start -->
							<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
							--                S  T  A  R  T                  --
							--     Expected Life Partner / sb-biodata-9      --
							-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
							<?php
								$id=$_GET['/Biodata'];
								$profileid=$id;
								$sql = "SELECT * FROM 9bd_expected_life_partner WHERE user_id = $id";
								$result = mysqlexec($sql);
								if($result){
								$row= mysqli_fetch_assoc($result);
								if($row){
								$partner_religius=$row['partner_religius'];
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
											<?php if (!empty($partner_district)) : ?>
											<tr class="opened">
												<td class="day_label">স্থায়ী নাগরিক/সিটিজেন (দেশ)</td>
												<td class="day_value"><?php echo $partner_district; ?></td>
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
												<td class="day_label">উচ্চতা</td>
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
												<td class="day_label">শিক্ষাগত যোগ্যতা</td>
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
												<td class="day_label">জীবনসঙ্গীর যেসব গুণাবলী বা বৈশিষ্ট্য প্রত্যাশা করেন</td>
												<td class="day_value closed"><span><?php echo $partner_attributes; ?></span></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="clearfix"> </div>
							<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
							--                S  T  A  R  T                  --
							--     Expected Life Partner / sb-biodata-9      --
							-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
							<!-- End & Start -->
							<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
							--                S  T  A  R  T                  --
							--    	   Acceptance of commitment				 --
							-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
							<div class="biodatavalue_list">
								<table class="biodata_value_data">
									<h3>প্রতিশ্রুতি গ্রহণ</h3>
									<tbody>
										<?php if (!empty($parents_permission)) : ?>
										<tr class="opened">
											<td class="day_label">পরিবারের অনুমতি নিয়ে বায়োডাটা জমা দিয়েছেন?</td>
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
							<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
							--                 E    N    D   	             --
							--    	   Acceptance of commitment				 --
							-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
	--                 S  T  A  R  T  	             --
	--    	 Recent View / Last View Profile    	 --
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
	<div class="sbbiodata_profile_recentview-mobile">
    <h3>সর্বশেষ বায়োডাটা দেখেছেন</h3>
	<?php
	$sql = "SELECT p.*, u.active
	FROM 1bd_personal_physical p
	INNER JOIN users u ON p.user_id = u.id
	WHERE u.active = 1
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
                'business_occupation_level' => $row3['business_occupation_level'],
                'student_occupation_level' => $row3['student_occupation_level'],
                'health_occupation_level' => $row3['health_occupation_level'],
                'engineer_occupation_level' => $row3['engineer_occupation_level'],
                'teacher_occupation_level' => $row3['teacher_occupation_level'],
                'defense_occupation_level' => $row3['defense_occupation_level'],
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
        echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> শারীরিক বর্ণ </span>  <span class=\"sb_data_recentview\">{$Skin_tones_recentview2}</span></span>";
        echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> উচ্চতা </span>  <span class=\"sb_data_recentview\">{$height_recentview2}</span></span>";
        echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> পেশা </span>      <span class=\"sb_data_recentview\"> {$occupation_recentview2}</span></span>";
        echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> জেলা </span>      <span class=\"sb_data_recentview\"> {$home_district2}</span></span>";
        echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> জন্ম সন </span>        <span class=\"sb_data_recentview\"> {$dateofbirth_recentview2}</span></span>";
        echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\"><button class=\"view_sb_profile_recentview\">সম্পূর্ণ বায়োডাটা</button> </a>";
        echo "</div></div>";
        $count++;
    }
	}
	?>
    </div>
	<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
	--                 	 E   N   D	 	             --
	--    	 Recent View / Last View Profile    	 --
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
	<!--=======================================
	How Many Visitors View This Page.
	This Script Connected to get_view_count.php
	and page_views Database Table
	========================================-->
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
