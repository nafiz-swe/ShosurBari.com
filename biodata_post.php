<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>

<?php
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	post_biodata($id);
		//processprofile_form
}
?>

<?php
// $id=$_GET['id'];
if(isloggedin()){
 //do nothing stay here
} else{
   header("location:login.php");
}
?>

<!DOCTYPE HTML>
<html>



<head>
<title>Biodata Post | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/optionsearch.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
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
					<li class="current-page"><h4>Biodata Post</h4></li>
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

				<div class="shosurbari-userhome-status">
					<h3><?php echo "Welcome: $username"; ?></h3>
					<!-- Display the account status -->
					<h4 >Account Status:
					<?php if ($deactivated == 0) {
						echo '<span style="color: green;">Active</span>';
						} else {
							echo '<span style="color: red;">Deactivated</span> <br>';
							echo '<span style="color: #0aa4ca; font-size: 14px;">Please Active your account, Go back UserHome page !</span>';
						} ?>
					</h4>
				</div>
			</div>
		</div>
	</div>



	<div class="shosurbari-biodata">
		<!-- multistep form -->
		<form action="" method="POST" id="biodataForm">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active" id="personalPhysical">শারীরিক</li>
				<li id="personalLife">ব্যক্তিগত</li>
				<li id="educationalQualifications">শিক্ষাগত</li>
				<li id="addressDetails">ঠিকানা</li>
				<li id="familyInfo">পারিবার</li>
				<li id="MarriageInfo">বিবাহ-সম্পর্কিত</li>
				<li id="religionDetails">ধর্মীয়</li>
				<li id="expectedPartner">জীবনসঙ্গীর-বিবরণ</li>
			</ul>

			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                S  T  A  R  T                  --
			--      Personal & Physical  / sb-biodata-1      --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<?php
				include("includes/dbconn.php");

				//getting profile details from db
				$sql="SELECT * FROM 1bd_personal_physical WHERE user_id = $id";
				$result = mysqlexec($sql);

				if($result){
				$row=mysqli_fetch_assoc($result);
				if($row){
					$biodatagender=$row['biodatagender'];
				}
				if($row){
					$day=$row['dateofbirth'];
				}
				if($row){
					$month=$row['dateofbirth'];
				}
				if($row){
					$year=$row['dateofbirth'];
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

			<!-- Start Fieldset -->
			<fieldset>
				<div class="sb-biodata" id="personalPhysical">
					<div class="sb-biodata-field">
						<h2>শারীরিক অবস্থা</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">বায়োডাটার ধরণ<span class="form-required" title="This field is required.">*</span></label>
							<select name="biodatagender" required onchange="toggleGenderSections(this.value)">
								<option hidden selected></option>
								<option value="পাত্রের বায়োডাটা">পাত্রের বায়োডাটা</option>
								<option value="পাত্রীর বায়োডাটা">পাত্রীর বায়োডাটা</option> 
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-pass">জন্ম তারিখ<span class="form-required" title="This field is required.">*</span></label>
							<select name="day" required>
								<option hidden selected></option>
								<option value="০১">০১</option>
								<option value="০২">০২</option>
								<option value="০৩">০৩</option>
								<option value="০৪">০৪</option>
								<option value="০৫">০৫</option>
								<option value="০৬">০৬</option>
								<option value="০৭">০৭</option>
								<option value="০৮">০৮</option>
								<option value="০৯">০৯</option>
								<option value="১০">১০</option>
								<option value="১১">১১</option>
								<option value="১২">১২</option>
								<option value="১৩">১৩</option>
								<option value="১৪">১৪</option>
								<option value="১৫">১৫</option>
								<option value="১৬">১৬</option>
								<option value="১৭">১৭</option>
								<option value="১৮">১৮</option>
								<option value="১৯">১৯</option>
								<option value="২০">২০</option>
								<option value="২১">২১</option>
								<option value="২২">২২</option>
								<option value="২৩">২৩</option>
								<option value="২৪">২৪</option>
								<option value="২৫">২৫</option>
								<option value="২৬">২৬</option>
								<option value="২৭">২৭</option>
								<option value="২৮">২৮</option>
								<option value="২৯">২৯</option>
								<option value="৩০">৩০</option>
								<option value="৩১">৩১</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-pass">জন্ম মাস<span class="form-required" title="This field is required.">*</span></label>
							<select name="month" required>
								<option hidden selected></option>
								<option value="জানুয়ারি">জানুয়ারি</option>
								<option value="ফেব্রুয়ারি">ফেব্রুয়ারি</option>
								<option value="মার্চ">মার্চ</option>
								<option value="এপ্রিল">এপ্রিল</option>
								<option value="মে">মে</option>
								<option value="জুন">জুন</option>
								<option value="জুলাই">জুলাই</option>
								<option value="আগস্ট">আগস্ট</option>
								<option value="সেপ্টেম্বর">সেপ্টেম্বর</option>
								<option value="অক্টোবর">অক্টোবর</option>
								<option value="নভেম্বর">নভেম্বর</option>
								<option value="ডিসেম্বর">ডিসেম্বর</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-pass">জন্ম সন<span class="form-required" title="This field is required.">*</span></label>
							<select name="year" required>
								<option hidden selected></option>
								<option value="২০১৫">২০১৫</option>
								<option value="২০১৪">২০১৪</option>
								<option value="২০১৩">২০১৩</option>
								<option value="২০১২">২০১২</option>
								<option value="২০১১">২০১১</option>
								<option value="২০১০">২০১০</option>
								<option value="২০০৯">২০০৯</option>
								<option value="২০০৮">২০০৮</option>
								<option value="২০০৭">২০০৭</option>
								<option value="২০০৬">২০০৬</option>
								<option value="২০০৫">২০০৫</option>
								<option value="২০০৪">২০০৪</option>
								<option value="২০০৩">২০০৩</option>
								<option value="২০০২">২০০২</option>
								<option value="২০০১">২০০১</option>
								<option value="২০০০">২০০০</option>
								<option value="১৯৯৯">১৯৯৯</option>
								<option value="১৯৯৮">১৯৯৮</option>
								<option value="১৯৯৭">১৯৯৭</option>
								<option value="১৯৯৬">১৯৯৬</option>
								<option value="১৯৯৫">১৯৯৫</option>
								<option value="১৯৯৪">১৯৯৪</option>
								<option value="১৯৯৩">১৯৯৩</option>
								<option value="১৯৯২">১৯৯২</option>
								<option value="১৯৯১">১৯৯১</option>
								<option value="১৯৯০">১৯৯০</option>
								<option value="১৯৮৯">১৯৮৯</option>
								<option value="১৯৮৮">১৯৮৮</option>
								<option value="১৯৮৭">১৯৮৭</option>
								<option value="১৯৮৬">১৯৮৬</option>
								<option value="১৯৮৫">১৯৮৫</option>
								<option value="১৯৮৪">১৯৮৪</option>
								<option value="১৯৮৩">১৯৮৩</option>
								<option value="১৯৮২">১৯৮২</option>
								<option value="১৯৮১">১৯৮১</option>
								<option value="১৯৮০">১৯৮০</option>
								<option value="১৯৭৯">১৯৭৯</option>
								<option value="১৯৭৮">১৯৭৮</option>
								<option value="১৯৭৭">১৯৭৭</option>
								<option value="১৯৭৬">১৯৭৬</option>
								<option value="১৯৭৫">১৯৭৫</option>
							</select>
						</div>


						<div class="shosurbari-biodata-field">
							<label for="edit-name">উচ্চতা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="height" value="" size="100" maxlength="100" class="form-text" required>
						</div>

						<!-- <script>
							function checkInput(input) {
								let value = input.value;
								// Allow only numbers and spaces
								let regex = /^[A-Za-z0-9-.'" ]+$/;
								if (!regex.test(value)) {
									document.getElementById('height-error-message').innerHTML = "Please follow the instruction. Ex: 5 ft 7 in.";
									input.value = '';
								} else {
									document.getElementById('height-error-message').innerHTML = '';
								}
							}
						</script> -->
					
						<div class="shosurbari-biodata-field">
							<label for="edit-name">ওজন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="weight" value="" size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">শারীরিক সমস্যা আছে কি?<span class="form-required" title="This field is required.">*</span></label>
							<select name="physicalstatus" required>
								<option hidden selected></option>
								<option value="সমস্যা নেই">সমস্যা নেই</option>
								<option value="অন্ধ">অন্ধ</option> 
								<option value="বধির">বধির</option> 
								<option value="বোবা">বোবা</option>
								<option value="ন্যাংড়া">ন্যাংড়া</option>
								<option value="হাত ভাঙ্গা">হাত ভাঙ্গা</option> 
								<option value="হাত কাটা">হাত কাটা</option>  
								<option value="পা ভাঙ্গা">পা ভাঙ্গা</option> 
								<option value="পা কাটা">পা কাটা</option> 
 
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">শারীরিক বর্ণ<span class="form-required" title="This field is required.">*</span></label>
							<select name="Skin_tones" required>
								<option hidden selected></option>
								<option value="উজ্জ্বল ফর্সা">উজ্জ্বল ফর্সা</option>
								<option value="ফর্সা">ফর্সা</option> 
								<option value="উজ্জ্বল শ্যামবর্ণ">উজ্জ্বল শ্যামবর্ণ</option>
								<option value="শ্যামবর্ণ">শ্যামবর্ণ</option>
								<option value="কালো">কালো</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">রক্তের গ্রুপ<span class="form-required" title="This field is required.">*</span></label>
							<select name="bloodgroup" required>
								<option hidden selected></option>
								<option value="A+">A+</option>
								<option value="B+">B+</option> 
								<option value="AB+">AB+</option>
								<option value="O+">O+</option>
								<option value="A-">A-</option>
								<option value="B-">B-</option> 
								<option value="AB-">AB-</option>
								<option value="O-">O-</option>
							</select>
						</div>
					</div>
				</div>

				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<!--Fieldsets end -->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--       Personal & Physical  / sb-biodata-1     --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->




			


			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                S  T  A  R  T                  --
			--     Personal & Life Style  / sb-biodata-2     --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<?php
				include("includes/dbconn.php");

				//getting profile details from db
				$sql="SELECT * FROM 2bd_personal_lifestyle WHERE user_id = $id";
				$result = mysqlexec($sql);

				if($result){
				$row=mysqli_fetch_assoc($result);
				if($row){
				$smoke=$row['smoke'];
				}
				if($row){
				$occupation_sector=$row['occupation_sector'];
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
				if($row){
				$groom_bride_email=$row['groom_bride_email'];
				}
				if($row){
				$groom_bride_number=$row['groom_bride_number'];
				}
				if($row){
				$groom_bride_family_number=$row['groom_bride_family_number'];
				}
				if($row){
				$family_number_relation=$row['family_number_relation'];
				}
				}
			?>


			<!-- Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="personalLife">
					<div class="sb-biodata-field">
						<h2>ব্যক্তিগত তথ্য</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">ধূমপান করা হয়?<span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<select name="smoke">
								<option hidden selected></option>
								<option value="না">না</option>
								<option value="হ্যাঁ">হ্যাঁ</option> 
								<option value="মাঝে মাঝে করা হয়">মাঝে মাঝে করা হয়</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="occupation_sector">পেশা<span class="form-required" title="This field is required.">*</span></label>
							<select name="occupation_sector" required onchange="showOccupationSector(this.value)">
								<option hidden selected></option>
								<option value="Business">ব্যবসা</option>
								<option value="Student">শিক্ষার্থী</option>
								<option value="Common">সার্ভিস/ইন্টারনেট/ফাইন্যান্স</option>
								<option value="Health">চিকিৎসা/স্বাস্থ্য</option>
								<option value="Engineer">ইঞ্জিনিয়ার</option>
								<option value="Teacher">শিক্ষক/প্রফেসর</option>
								<option value="Defense">প্রতিরক্ষা বাহিনী</option>
								<option value="Foreigner">বিদেশে</option>
								<option value="Garments">গার্মেন্টস</option>
								<option value="Mistri">কারিগর/মিস্ত্রি</option>
								<option value="Driver">ড্রাইভার/চালক</option>
								<option value="Other">অন্যান্য</option>
								<option value="No Profession">No Occupation</option>
							</select>
						</div>
									
						<div class="shosurbari-biodata-field section"  id="Other" style="display: none;">
							<label>পেশা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="other_occupation_sector" placeholder="Enter your Occupation Sector" value="" size="100" maxlength="100" class="form-text">
						</div>

						<div class="shosurbari-biodata-field section"  id="Business" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="business_occupation_level" placeholder="Enter your Business name" value="" size="100" maxlength="100" class="form-text">
						</div>

						<div class="shosurbari-biodata-field section" id="Student" style="display: none;">
							<label >পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="student_occupation_level">
								<option hidden selected></option>
								<option value="কওমি মাদ্রাসার শিক্ষার্থী">কওমি মাদ্রাসার শিক্ষার্থী</option>
								<option value="আলিয়া মাদ্রাসার দাখিল শিক্ষার্থী">আলিয়া মাদ্রাসার দাখিল শিক্ষার্থী</option> 
								<option value="মাধ্যমিক শিক্ষার্থী">মাধ্যমিক শিক্ষার্থী</option>

								<option value="কলেজ শিক্ষার্থী">কলেজ শিক্ষার্থী</option>
								<option value="আলিয়া মাদ্রাসার আলিম শিক্ষার্থী">আলিয়া মাদ্রাসার আলিম শিক্ষার্থী</option> 
								<option value="পলিটেকনিক্যাল শিক্ষার্থী">পলিটেকনিক্যাল শিক্ষার্থী</option>
								<option value="নার্সিং শিক্ষার্থী">নার্সিং শিক্ষার্থী</option>
								<option value="মিডউইফারী শিক্ষার্থী">মিডউইফারী শিক্ষার্থী</option>
								<option value="পেরামেডিক্যাল শিক্ষার্থী">পেরামেডিক্যাল শিক্ষার্থী</option>

								<option value="মেডিকেল শিক্ষার্থী">মেডিকেল শিক্ষার্থী</option>
								<option value="ফার্মেসী শিক্ষার্থী">ফার্মেসী শিক্ষার্থী</option> 
								<option value="বি.এসসি. ইঞ্জিনিয়ারিং শিক্ষার্থী">বি.এসসি. ইঞ্জিনিয়ারিং শিক্ষার্থী</option>
								<option value="বি.বি.এ. শিক্ষার্থী">বি.বি.এ. শিক্ষার্থী</option> 


								<option value="বি.এসসি. শিক্ষার্থী">বি.এসসি. শিক্ষার্থী</option>
								<option value="বি.এ. শিক্ষার্থী">বি.এ. শিক্ষার্থী</option>
								<option value="বি.কম. শিক্ষার্থী">বি.কম. শিক্ষার্থী</option> 
								<option value="আলিয়া মাদ্রাসার ফাজিল শিক্ষার্থী">আলিয়া মাদ্রাসার ফাজিল শিক্ষার্থী</option> 

								<option value="এম.এসসি. শিক্ষার্থী">এম.এসসি. শিক্ষার্থী</option>
								<option value="এম.এ. শিক্ষার্থী">এম.এ. শিক্ষার্থী</option> 
								<option value="এম.কম. শিক্ষার্থী">এম.কম. শিক্ষার্থী</option>
								<option value="কামিল শিক্ষার্থী">কামিল শিক্ষার্থী</option> 
							</select>
						</div>			

						<div class="shosurbari-biodata-field section" id="Health" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="health_occupation_level">
								<option hidden selected></option>
								<option value="এম.বি.বি.এস. ডাক্তার">এম.বি.বি.এস. ডাক্তার</option>
								<option value="ইন্টার্নশীপ ডাক্তার">ইন্টার্নশীপ ডাক্তার</option> 
								<option value="পশু চিকিৎসক">পশু চিকিৎসক</option>
								<option value="ফার্মাসিস্ট">ফার্মাসিস্ট</option>
								<option value="ডিপ্লোমা ডাক্তার">ডিপ্লোমা ডাক্তার</option>
								<option value="নার্স">নার্স</option>
								<option value="মিডউইফারী">মিডউইফারী</option>
								<option value="পল্লী চিকিৎসক">পল্লী চিকিৎসক</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="Engineer" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="engineer_occupation_level">
								<option hidden selected></option>
								<option value="সফটওয়্যার ইঞ্জিনিয়ার">সফটওয়্যার ইঞ্জিনিয়ার</option> 
								<option value="টেক্সটাইল ইঞ্জিনিয়ার">টেক্সটাইল ইঞ্জিনিয়ার</option>
								<option value="সিভিল ইঞ্জিনিয়ার">সিভিল ইঞ্জিনিয়ার</option>
								<option value="ইলেকট্রিক্যাল ইঞ্জিনিয়ার">ইলেকট্রিক্যাল ইঞ্জিনিয়ার</option>
								<option value="মেরিন ইঞ্জিনিয়ার">মেরিন ইঞ্জিনিয়ার</option> 
								<option value="নেটওয়ার্ক ইঞ্জিনিয়ার">নেটওয়ার্ক ইঞ্জিনিয়ার</option> 
								<option value="রোবোটিক্স ইঞ্জিনিয়ার">রোবোটিক্স ইঞ্জিনিয়ার</option>
								<option value="এগ্রিকালচার ইঞ্জিনিয়ার">এগ্রিকালচার ইঞ্জিনিয়ার</option>
								<option value="আর্কিটেকচার ইঞ্জিনিয়ার">আর্কিটেকচার ইঞ্জিনিয়ার</option>
								<option value="মেকানিক্যাল ইঞ্জিনিয়ার">মেকানিক্যাল ইঞ্জিনিয়ার</option>
								<option value="কেমিক্যাল ইঞ্জিনিয়ার">কেমিক্যাল ইঞ্জিনিয়ার</option>
								<option value="বিয়োমেডিক্যাল ইঞ্জিনিয়ার">বিয়োমেডিক্যাল ইঞ্জিনিয়ার</option>
								<option value="এরোস্পেস ইঞ্জিনিয়ারিং">এরোস্পেস ইঞ্জিনিয়ারিং</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="Teacher" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="teacher_occupation_level">
								<option hidden selected></option>
								<option value="কওমি মাদ্রাসার শিক্ষক">কওমি মাদ্রাসার শিক্ষক</option>
								<option value="আলিয়া মাদ্রাসার শিক্ষক">আলিয়া মাদ্রাসার শিক্ষক</option>  
								<option value="স্কুল শিক্ষক">স্কুল শিক্ষক</option> 
								<option value="কলেজ শিক্ষক">কলেজ শিক্ষক</option>
								<option value="বিশ্ববিদ্যালয় প্রফেসর">বিশ্ববিদ্যালয় প্রফেসর</option>
								<option value="ডিগ্রির প্রফেসর">ডিগ্রির প্রফেসর</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="Defense" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="defense_occupation_level">
								<option hidden selected></option>
								<option value="সেনাবাহিনী">সেনাবাহিনী</option> 
								<option value="বিমানবাহিনী">বিমানবাহিনী</option>
								<option value="নৌবাহিনী">নৌবাহিনী</option>
								<option value="পুলিশ">পুলিশ</option>
								<option value="ফায়ার সার্ভিস">ফায়ার সার্ভিস</option> 
								<option value="ডিবি">ডিবি</option>
								<option value="আনসার">আনসার</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="Foreigner" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="foreigner_occupation_level">
								<option hidden selected></option>
								<option value="বিদেশে চাকরি করি">বিদেশে চাকরি করি</option>
								<option value="বিদেশে কাজ করি">বিদেশে কাজ করি</option>
								<option value="বিদেশে ব্যবসা করি">বিদেশে ব্যবসা করি</option>
								<option value="বিদেশে পড়াশোনা করি">বিদেশে পড়াশোনা করি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="Garments" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="garments_occupation_level">
								<option hidden selected></option>
								<option value="গার্মেন্টস ম্যানেজার">গার্মেন্টস ম্যানেজার</option>
								<option value="গার্মেন্টস বায়িং হাউস">গার্মেন্টস বায়িং হাউস</option>
								<option value="গার্মেন্টস শ্রমিক">গার্মেন্টস শ্রমিক</option> 
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="Driver" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="driver_occupation_level">
								<option hidden selected></option>
								<option value="বাস ড্রাইভার">বাস ড্রাইভার</option> 
								<option value="মাইক্রো বাস ড্রাইভার">মাইক্রো বাস ড্রাইভার</option> 
								<option value="কার ড্রাইভার">কার ড্রাইভার</option> 
								<option value="ট্রাক ড্রাইভার">ট্রাক ড্রাইভার</option>
								<option value="পাঠাও/উবার রাইডার">পাঠাও/উবার রাইডার</option>
								<option value="CNG চালক">CNG চালক</option> 
								<option value="অটো চালক">অটো চালক</option>
								<option value="রিক্সা চালক">রিক্সা চালক</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="Common" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="service_andcommon_occupation_level">
								<option hidden selected></option>
								<option value="HR">HR</option>
								<option value="ব্যাংকার">ব্যাংকার</option>
								<option value="আইনজীবী">আইনজীবী</option> 
								<option value="উদ্যোক্তা">উদ্যোক্তা</option> 
								<option value="ফ্রীলান্সার">ফ্রীলান্সার</option>
								<option value="ইউটিউবার">ইউটিউবার</option>
								<option value="গ্রাফিক্স ডিজাইনার">গ্রাফিক্স ডিজাইনার</option>
								<option value="সেলস & মার্কেটিং(SR)">সেলস & মার্কেটিং(SR)</option>
								<option value="আর্ট/দেয়াল লিখন">আর্ট/দেয়াল লিখন</option>
								<option value="নিরাপত্তারক্ষী">নিরাপত্তারক্ষী</option>
								<option value="রোজ কামলা/শ্রমিক">রোজ কামলা / শ্রমিক</option>  
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="Mistri" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="mistri_occupation_level">
							<option hidden selected></option>
							<option value="রাজ মিস্ত্রি">রাজ মিস্ত্রি</option>
							<option value="কাঠ মিস্ত্রি">কাঠ মিস্ত্রি</option>
							<option value="ইলেকট্রিক মিস্ত্রি">ইলেকট্রিক মিস্ত্রি</option>
							<option value="স্যানিটারি মিস্ত্রি">স্যানিটারি মিস্ত্রি</option>
							<option value="রড মিস্ত্রি">রড মিস্ত্রি</option>
							<option value="রং মিস্ত্রি">রং মিস্ত্রি</option>
							<option value="ফ্রিজ মিস্ত্রি">ফ্রিজমিস্ত্রি</option>
							<option value="গ্যাস মিস্ত্রি">গ্যাস মিস্ত্রি</option>
							<option value="এসি মিস্ত্রি">এসি মিস্ত্রি</option>
							<option value="সিসি ক্যামেরা মিস্ত্রি">সিসি ক্যামেরা মিস্ত্রি</option>
							<option value="টাইলস ও মুজাইক মিস্ত্রি">টাইলস ও মুজাইক মিস্ত্রি</option>
							<option value="থাই এলুমিনিয়াম ও গ্লাস মিস্ত্রি">থাই এলুমিনিয়াম ও গ্লাস মিস্ত্রি</option>
							<option value="ওয়েলডিং/গ্রীল মিস্ত্রি">ওয়েলডিং / গ্রীল মিস্ত্রি</option>
							</select>
						</div>

						<script>
							function showOccupationSector(occupation) {
								// Hide the occupation_describe_field by default
								var occupationDescribeField = document.getElementById("occupation_describe_field");
								occupationDescribeField.style.display = "none";

								// Hide all occupation sections
								var occupationSections = document.getElementsByClassName("section");
								for (var i = 0; i < occupationSections.length; i++) {
									occupationSections[i].style.display = "none";
								}

								// Show the selected occupation section
								var selectedOccupationSection = document.getElementById(occupation);
								if (selectedOccupationSection) {
									selectedOccupationSection.style.display = "block";
									// Show the occupation_describe_field if occupation is not "No Profession"
									if (occupation !== "No Profession") {
										occupationDescribeField.style.display = "block";
									}
								}
							}
						</script>
									

						<div class="shosurbari-biodata-field" id="occupation_describe_field" style="display: none;">
							<label>পেশার বিস্তারিত তথ্য<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="occupation_describe" id="edit-name" placeholder="Describe your Occupation" class="form-text-describe" ></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label>ঘর ও ঘরের বাহিরে কেমন ধরণের পোশাক পরেন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="dress_code" placeholder="Describe your Dress Code" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label>আপনার সম্পর্কে কিছু লিখুন<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="aboutme" placeholder="Write about you" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">পাত্র/পাত্রীর ইমেইল<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required.">(এই অপশন লুকায়িত থাকবে)</span></label>
							<input type="text" id="edit-name" name="groom_bride_email" value="" size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">পাত্র/পাত্রীর মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required.">(এই অপশন লুকায়িত থাকবে)</span></label>
							<input type="text" id="edit-name" name="groom_bride_number" value="" size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">পিতামাতা/আত্মীয়র মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required.">(এই অপশন লুকায়িত থাকবে)</span></label>
							<input type="text" id="edit-name" name="groom_bride_family_number" value="" size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">পিতামাতা/আত্মীয়র অপশনে মোবাইল নাম্বার টি যার, তার সাথে পাত্রপাত্রীর কি সম্পর্ক<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size: 14px;" class="form-required" title="This field is required.">(এই অপশন লুকায়িত থাকবে)</span></label>
							<input type="text" id="edit-name" name="family_number_relation" value="" size="100" maxlength="100" class="form-text" required>
						</div>

					</div>
				</div>

				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<!-- Fieldsets end-->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--     Personal & Life Style  / sb-biodata-2     --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->











			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                S  T  A  R  T                  --
			--  Educational Qualifications  / sb-biodata-3   --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<?php
				include("includes/dbconn.php");

				//getting profile details from db
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




				//getting profile details from db
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






				//getting profile details from db
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



				//getting profile details from db
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


			<!-- Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="educationalQualifications">
					<div class="sb-biodata-field">
						<h2>শিক্ষাগত যোগ্যতা</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label for="edu-method">মাধ্যমিক/ সমমান কোন মাদ্ধমে পড়েছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="scndry_edu_method" id="secondary_edu_method" required>
								<option hidden selected></option>
								<option value="জেনারেল">জেনারেল</option>
								<option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
								<option value="ভোকেশনাল">ভোকেশনাল</option>
								<option value="কওমি মাদ্রাসা">কওমি মাদ্রাসা</option>
								<option value="মাধ্যমিক পড়িনাই">মাধ্যমিক পড়িনাই</option>
								<option value="অন্যান্য">অন্যান্য</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field"  id="maxedu_qualification">
							<label for="highest_qualification">আপনার সর্বোচ্চ শিক্ষাগত যোগ্যতা?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="maxedu_qualification" name="maxedu_qulfctn" size="250" maxlength="250" class="form-text required">
						</div>

						<!-- For Kowmi Madrasa -->
						<div class="shosurbari-biodata-field" id="hafez_field">
							<label for="hafez">আপনি কি হাফেজ/হাফেজা?<span class="form-required" title="This field is required.">*</span></label>
							<select name="qawmi_madrasa_hafez" id="hafez">
								<option hidden selected></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না">না</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="dawra_pass_field">
							<label for="dawra_pass">দাওরায়ে হাদিস পাস করেছেন? (মাস্টার্স)<span class="form-required" title="This field is required.">*</span></label>
							<select name="qawmimadrasa_dawrapass" id="dawra_pass">
								<option hidden selected></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
								<option value="না, বাদ দিয়েছি">না, বাদ দিয়েছি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="dawra_passing_year_field">
							<label for="dawra_passing_year">দাওরায়ে হাদিস পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="kowmi_dawrapas_year" id="dawra_passing_year">
								<option hidden selected></option>
								<option value="২০২৪">২০২৪</option>
								<option value="২০২৩">২০২৩</option>
								<option value="২০২২">২০২২</option>
								<option value="২০২১">২০২১</option>
								<option value="২০২০">২০২০</option>
								<option value="২০১৯">২০১৯</option>
								<option value="২০১৮">২০১৮</option>
								<option value="২০১৭">২০১৭</option>
								<option value="২০১৬">২০১৬</option>
								<option value="২০১৫">২০১৫</option>
								<option value="২০১৪">২০১৪</option>
								<option value="২০১৩">২০১৩</option>
								<option value="২০১২">২০১২</option>
								<option value="২০১১">২০১১</option>
								<option value="২০১০">২০১০</option>
								<option value="২০০৯">২০০৯</option>
								<option value="২০০৮">২০০৮</option>
								<option value="২০০৭">২০০৭</option>
								<option value="২০০৬">২০০৬</option>
								<option value="২০০৫">২০০৫</option>
								<option value="২০০৪">২০০৪</option>
								<option value="২০০৩">২০০৩</option>
								<option value="২০০২">২০০২</option>
								<option value="২০০১">২০০১</option>
								<option value="২০০০">২০০০</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="current_edu_level_field">
							<label for="current_edu_level">মাদ্রাসায় বর্তমান অধ্যায়নরত জামাত<span class="form-required" title="This field is required.">*</span></label>
							<select name="kowmi_current_edu_level" id="current_edu_level">
								<option hidden selected></option>
								<option value="জামাতে তাইসীর">জামাতে তাইসীর</option>
								<option value="জামাতে মীযান">জামাতে মীযান</option>
								<option value="জামাতে নাহবে মীর">জামাতে নাহবে মীর</option>
								<option value="জামাতে হেদায়াতুন্নাহূ">জামাতে হেদায়াতুন্নাহূ</option>
								<option value="জামাতে কাফিয়া">জামাতে কাফিয়া</option>
								<option value="জামাতে শরহে জামী">জামাতে শরহে জামী</option>
								<option value="জামাতে জালালাইন">জামাতে জালালাইন</option>
								<option value="জামাতে মেশকাত">জামাতে মেশকাত</option>
								<option value="দাওরায়ে হাদীস পরীক্ষার্থী">দাওরায়ে হাদীস পরীক্ষার্থী</option>
							</select>
						</div>
						<!--Kowmi Madrasa ending -->
		

						<!-- Secondary Education Start -->
						<div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_pass">
							<label for="secondary_pass">মাধ্যমিক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrl_mdrs_secondary_pass" id="secondary_pass">
								<option hidden selected></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, পরীক্ষার্থী">না, পরীক্ষার্থী</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
								<option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_pass_year">
							<label for="gnrl_mdrs_scnd_pass_year">মাধ্যমিক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrl_mdrs_secondary_pass_year" id="gnrl_mdrs_scnd_pass_year">
								<option hidden selected></option>
								<option value="২০২৪">২০২৪</option>
								<option value="২০২৩">২০২৩</option>
								<option value="২০২২">২০২২</option>
								<option value="২০২১">২০২১</option>
								<option value="২০২০">২০২০</option>
								<option value="২০১৯">২০১৯</option>
								<option value="২০১৮">২০১৮</option>
								<option value="২০১৭">২০১৭</option>
								<option value="২০১৬">২০১৬</option>
								<option value="২০১৫">২০১৫</option>
								<option value="২০১৪">২০১৪</option>
								<option value="২০১৩">২০১৩</option>
								<option value="২০১২">২০১২</option>
								<option value="২০১১">২০১১</option>
								<option value="২০১০">২০১০</option>
								<option value="২০০৯">২০০৯</option>
								<option value="২০০৮">২০০৮</option>
								<option value="২০০৭">২০০৭</option>
								<option value="২০০৬">২০০৬</option>
								<option value="২০০৫">২০০৫</option>
								<option value="২০০৪">২০০৪</option>
								<option value="২০০৩">২০০৩</option>
								<option value="২০০২">২০০২</option>
								<option value="২০০১">২০০১</option>
								<option value="২০০০">২০০০</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_exam_year">
							<label for="gnrl_mdrs_scnd_exam_year">মাধ্যমিক/সমমান বোর্ড পরীক্ষার বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrl_mdrs_secondary_end_year" id="gnrl_mdrs_scnd_exam_year">
								<option hidden selected></option>
								<option value="২০৩০">২০৩০</option>
								<option value="২০২৯">২০২৯</option>
								<option value="২০২৮">২০২৮</option>
								<option value="২০২৭">২০২৭</option>
								<option value="২০২৬">২০২৬</option>
								<option value="২০২৫">২০২৫</option>
								<option value="২০২৪">২০২৪</option>
								<option value="২০২৩">২০২৩</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_running_stdn">
							<label for="gnrl_mdrs_running_stdn">মাধ্যমিক/সমমান বর্তমান অধ্যায়নরত ক্লাস<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="gnrlmdrs_secondary_running_std" id="gnrl_mdrs_running_stdn"  value="" size="250" maxlength="250" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="higher_seconday_edumethod">
							<label for="higherscndry_edumethod">উচ্চমাধ্যমিক/সমমান শিক্ষার মাধ্যম<span class="form-required" title="This field is required.">*</span></label>
							<select name="higher_secondary_edu_method" id="higherscndry_edumethod">
								<option hidden selected></option>
								<option value="জেনারেল">জেনারেল</option>
								<option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
								<option value="ডিপ্লোমা">ডিপ্লোমা</option>
								<option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
								<option value="অন্যান্য">অন্যান্য</option>
							</select>
						</div>
						<!-- Secondary Education End -->


						<!-- Higher Secondary start -->
						<div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_pass">
							<label for="hrsecondary_pass">উচ্চমাধ্যমিক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_pass" id="hrsecondary_pass">
								<option hidden selected></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, পরীক্ষার্থী">না, পরীক্ষার্থী</option>
								<option value="না, এখনো অধ্যায়নরত">না, এখনো অধ্যায়নরত</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_pass_year">
							<label for="edu-method">উচ্চমাধ্যমিক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_pass_year">
								<option hidden selected></option>
								<option value="২০২৪">২০২৪</option>
								<option value="২০২৩">২০২৩</option>
								<option value="২০২২">২০২২</option>
								<option value="২০২১">২০২১</option>
								<option value="২০২০">২০২০</option>
								<option value="২০১৯">২০১৯</option>
								<option value="২০১৮">২০১৮</option>
								<option value="২০১৭">২০১৭</option>
								<option value="২০১৬">২০১৬</option>
								<option value="২০১৫">২০১৫</option>
								<option value="২০১৪">২০১৪</option>
								<option value="২০১৩">২০১৩</option>
								<option value="২০১২">২০১২</option>
								<option value="২০১১">২০১১</option>
								<option value="২০১০">২০১০</option>
								<option value="২০০৯">২০০৯</option>
								<option value="২০০৮">২০০৮</option>
								<option value="২০০৭">২০০৭</option>
								<option value="২০০৬">২০০৬</option>
								<option value="২০০৫">২০০৫</option>
								<option value="২০০৪">২০০৪</option>
								<option value="২০০৩">২০০৩</option>
								<option value="২০০২">২০০২</option>
								<option value="২০০১">২০০১</option>
								<option value="২০০০">২০০০</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_exam_year">
							<label for="edu-method">উচ্চমাধ্যমিক/সমমান বোর্ড পরীক্ষার বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_exam_year">
								<option hidden selected></option>
								<option value="২০৩০">২০৩০</option>
								<option value="২০২৯">২০২৯</option>
								<option value="২০২৮">২০২৮</option>
								<option value="২০২৭">২০২৭</option>
								<option value="২০২৬">২০২৬</option>
								<option value="২০২৫">২০২৫</option>
								<option value="২০২৪">২০২৪</option>
								<option value="২০২৩">২০২৩</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="higher_seconday_group">
							<label for="edu-method">উচ্চমাধ্যমিক/সমমানে গ্রুপ?<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_group">
								<option hidden selected></option>
								<option value="বিজ্ঞান">বিজ্ঞান শাখা</option>
								<option value="মানবিক শাখা">মানবিক শাখা</option>
								<option value="ব্যবসা ও বাণিজ্য শাখা">ব্যবসা ও বাণিজ্য শাখা</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="hrgnrl_mdrs_running_stdn">
							<label for="hrgnrl_mdrs_running_stdn">উচ্চমাধ্যমিক/সমমানে বর্তমান অধ্যায়নরত ক্লাস<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="gnrlmdrs_hrsecondary_rningstd" id="hrgnrl_mdrs_running_stdn" value="" size="250" maxlength="250" class="form-text required">
						</div>
						<!--Higher Seconday Education End -->


						<!--Diploma Higher Seconday Start -->
						<div class="shosurbari-biodata-field" id="doploma_hrscnd_pass">
							<label for="doploma_hrscdmethod">ডিপ্লোমা পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_pass" id="doploma_hrscdmethod">
								<option hidden selected></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="doploma_hrscnd_pass_year">
							<label for="doploma_hrscnd_pass_year">ডিপ্লোমা পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_pass_year">
								<option hidden selected></option>
								<option value="২০২৪">২০২৪</option>
								<option value="২০২৩">২০২৩</option>
								<option value="২০২২">২০২২</option>
								<option value="২০২১">২০২১</option>
								<option value="২০২০">২০২০</option>
								<option value="২০১৯">২০১৯</option>
								<option value="২০১৮">২০১৮</option>
								<option value="২০১৭">২০১৭</option>
								<option value="২০১৬">২০১৬</option>
								<option value="২০১৫">২০১৫</option>
								<option value="২০১৪">২০১৪</option>
								<option value="২০১৩">২০১৩</option>
								<option value="২০১২">২০১২</option>
								<option value="২০১১">২০১১</option>
								<option value="২০১০">২০১০</option>
								<option value="২০০৯">২০০৯</option>
								<option value="২০০৮">২০০৮</option>
								<option value="২০০৭">২০০৭</option>
								<option value="২০০৬">২০০৬</option>
								<option value="২০০৫">২০০৫</option>
								<option value="২০০৪">২০০৪</option>
								<option value="২০০৩">২০০৩</option>
								<option value="২০০২">২০০২</option>
								<option value="২০০১">২০০১</option>
								<option value="২০০০">২০০০</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="doploma_hrscnd_subject">
							<label for="edu-method">ডিপ্লোমায় আপনার সাবজেক্ট<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="diploma_hrsecondary_sub" id="diploma_secondary_subject"   size="250" maxlength="250" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="doploma_hrscnd_exam_year">
							<label for="edu-method">ডিপ্লোমা অধ্যায়ন সম্পন্ন হবে<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_endingyear">
								<option hidden selected></option>
								<option value="২০৩০">২০৩০</option>
								<option value="২০২৯">২০২৯</option>
								<option value="২০২৮">২০২৮</option>
								<option value="২০২৭">২০২৭</option>
								<option value="২০২৬">২০২৬</option>
								<option value="২০২৫">২০২৫</option>
								<option value="২০২৪">২০২৪</option>
								<option value="২০২৩">২০২৩</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="varsity_edumethod">
							<label for="university_edumethod">স্নাতক/সমমান শিক্ষার মাধ্যম<span class="form-required" title="This field is required.">*</span></label>
							<select name="varsity_edu_method" id="university_edumethod">
								<option hidden selected></option>
								<option value="জেনারেল">জেনারেল</option>
								<option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
								<option value="ডিপ্লোমা">ডিপ্লোমা</option>
								<option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
								<option value="অন্যান্য">অন্যান্য</option>
							</select>
						</div>
						<!--Diploma Higher Seconday End -->


						<!-- University Education Start -->
						<div class="shosurbari-biodata-field" id="varsity_pass">
							<label for="university_pass">স্নাতক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="uvarsity_pass" id="university_pass">
								<option hidden selected></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="varsity_pass_year">
							<label for="edu-method">স্নাতক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="varsity_passing_year">
								<option hidden selected></option>
								<option value="২০২৪">২০২৪</option>
								<option value="২০২৩">২০২৩</option>
								<option value="২০২২">২০২২</option>
								<option value="২০২১">২০২১</option>
								<option value="২০২০">২০২০</option>
								<option value="২০১৯">২০১৯</option>
								<option value="২০১৮">২০১৮</option>
								<option value="২০১৭">২০১৭</option>
								<option value="২০১৬">২০১৬</option>
								<option value="২০১৫">২০১৫</option>
								<option value="২০১৪">২০১৪</option>
								<option value="২০১৩">২০১৩</option>
								<option value="২০১২">২০১২</option>
								<option value="২০১১">২০১১</option>
								<option value="২০১০">২০১০</option>
								<option value="২০০৯">২০০৯</option>
								<option value="২০০৮">২০০৮</option>
								<option value="২০০৭">২০০৭</option>
								<option value="২০০৬">২০০৬</option>
								<option value="২০০৫">২০০৫</option>
								<option value="২০০৪">২০০৪</option>
								<option value="২০০৩">২০০৩</option>
								<option value="২০০২">২০০২</option>
								<option value="২০০১">২০০১</option>
								<option value="২০০০">২০০০</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="varsity_subject">
							<label for="edu-method">স্নাতক/সমমানে আপনার সাবজেক্ট<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="university_subject" id="varsity_subject"  value="" size="250" maxlength="250" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="varsity_exam_year">
							<label for="edu-method">স্নাতক/সমমান অধ্যায়ন সম্পন্ন হবে<span class="form-required" title="This field is required.">*</span></label>
							<select name="varsity_ending_year">
								<option hidden selected></option>
								<option value="২০৩০">২০৩০</option>
								<option value="২০২৯">২০২৯</option>
								<option value="২০২৮">২০২৮</option>
								<option value="২০২৭">২০২৭</option>
								<option value="২০২৬">২০২৬</option>
								<option value="২০২৫">২০২৫</option>
								<option value="২০২৪">২০২৪</option>
								<option value="২০২৩">২০২৩</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="varsity_name">
							<label for="edu-method">স্নাতকে/সমমানে শিক্ষা প্রতিষ্ঠান<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="uvarsity_name" id="university_name"  value="" size="250" maxlength="250" class="form-text required">
						</div>
						<!-- University Education End -->

						<div class="shosurbari-biodata-field">
							<label for="edu-method">অন্যান্য শিক্ষাগত যোগ্যতা<span style="color: gray; font-size:14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<textarea rows="4"  name="others_edu_qualification"  id="others_edu_qualification" placeholder="Describe your others education qualifications" class="form-text-describe"></textarea>
						</div>
					</div>
				</div>

		
				<script>
					// Function to show or hide sections based on the selected value
					function toggleSections() {
						var selectedValue = document.getElementById("secondary_edu_method").value;

						document.getElementById("dawra_pass_field").style.display = "none";
						document.getElementById("dawra_passing_year_field").style.display = "none";
						document.getElementById("current_edu_level_field").style.display = "none";

						// Hide all sections by default
						document.getElementById("hafez_field").style.display = "none";

						document.getElementById("maxedu_qualification").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_pass").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";  
						document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("higher_seconday_edumethod").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "none";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("doploma_hrscnd_pass").style.display = "none";
						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "none";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
						document.getElementById("varsity_edumethod").style.display = "none";

						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";

						// Show or hide sections based on the selected value
						if (selectedValue === "কওমি মাদ্রাসা") {
							document.getElementById("hafez_field").style.display = "block";
							document.getElementById("dawra_pass_field").style.display = "block";
							document.getElementById("dawra_passing_year_field").style.display = "none";
							document.getElementById("current_edu_level_field").style.display = "none";
						}

						// Show or hide sections based on the selected value
						else if (selectedValue === "অন্যান্য") {
							document.getElementById("maxedu_qualification").style.display = "block";
						}

						// Show or hide sections based on the selected value
						else if (selectedValue === "জেনারেল" || selectedValue === "আলিয়া মাদ্রাসা" || selectedValue === "ভোকেশনাল") {
							document.getElementById("gnrl_mdrs_scnd_pass").style.display = "block";
						}

						// Show or hide sections based on the selected value
						else if (selectedValue === "মাধ্যমিক পড়িনাই") {
							document.getElementById("maxedu_qualification").style.display = "block";
						}
					}

					// Function to show or hide fields based on the selected value of dawra_pass_field
					function toggleDawraFields() {
						var selectedValue = document.getElementById("dawra_pass").value;

						var dawraPassingYearField = document.getElementById("dawra_passing_year_field");
						var currentEduLevelField = document.getElementById("current_edu_level_field");

						// Show or hide fields based on the selected value
						if (selectedValue === "হ্যাঁ") {
							dawraPassingYearField.style.display = "block";
							currentEduLevelField.style.display = "none"; // Hide the current_edu_level_field
						}
						
						else if (selectedValue === "না, অধ্যায়নরত আছি") {
							dawraPassingYearField.style.display = "none";
							currentEduLevelField.style.display = "block";
						}

						else if (selectedValue === "না, বাদ দিয়েছি") {
							dawraPassingYearField.style.display = "none";
							currentEduLevelField.style.display = "none";
						}
					}

					// Function to show or hide fields based on the selected value of dawra_pass_field
					function toggleSecondaryFields() {
						var selectValue = document.getElementById("secondary_pass").value;

						document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";
						document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";
						document.getElementById("higher_seconday_edumethod").style.display = "none";

						// Show or hide fields based on the selected value
						if (selectValue === "হ্যাঁ") {
						document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "block";
						document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";
						document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";
						document.getElementById("higher_seconday_edumethod").style.display = "block";
						}
			
						else if (selectValue === "না, পরীক্ষার্থী") {
						document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "block";
						document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";
						document.getElementById("higher_seconday_edumethod").style.display = "none";

						document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "none";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("doploma_hrscnd_pass").style.display = "none";
						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "none";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
						document.getElementById("varsity_edumethod").style.display = "none";

						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}

						else if (selectValue === "না, অধ্যায়নরত আছি") {
						document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";
						document.getElementById("gnrl_mdrs_running_stdn").style.display = "block";

						document.getElementById("higher_seconday_edumethod").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "none";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("doploma_hrscnd_pass").style.display = "none";
						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "none";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
						document.getElementById("varsity_edumethod").style.display = "none";

						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}

						else if (selectValue === "অধ্যায়ন বাদ দিয়েছি") {
						document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";
						document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("higher_seconday_edumethod").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "none";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("doploma_hrscnd_pass").style.display = "none";
						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "none";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
						document.getElementById("varsity_edumethod").style.display = "none";

						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}
					}

					// Function to show or hide fields based on the selected value of dawra_pass_field
					function toggleHrsecondaryFields() {
						var selecteValue = document.getElementById("higherscndry_edumethod").value;

						document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "none";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("doploma_hrscnd_pass").style.display = "none";
						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "none";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";

						// Show or hide fields based on the selected value
						if (selecteValue === "জেনারেল" || selecteValue === "আলিয়া মাদ্রাসা") {
						document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "block";
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "none";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("doploma_hrscnd_pass").style.display = "none";
						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "none";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
						
						document.getElementById("varsity_edumethod").style.display = "none";
						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}

						else if (selecteValue === "ডিপ্লোমা") {
						document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "none";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("doploma_hrscnd_pass").style.display = "block";
						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "none";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";

						document.getElementById("varsity_edumethod").style.display = "none";
						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}

						else if (selecteValue === "অধ্যায়ন বাদ দিয়েছি") {
						document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "none";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("doploma_hrscnd_pass").style.display = "none";
						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "none";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";

						document.getElementById("varsity_edumethod").style.display = "none";
						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}

						else if (selecteValue === "অন্যান্য") {
						document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "none";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("doploma_hrscnd_pass").style.display = "none";
						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "none";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";

						document.getElementById("varsity_edumethod").style.display = "none";
						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}
					}

					// Function to show or hide fields based on the selected value of dawra_pass_field
					function toggleHrgnrmdrsFields() {
						var selecteValue = document.getElementById("hrsecondary_pass").value;

						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "none";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";
						document.getElementById("varsity_edumethod").style.display = "none";

						// Show or hide fields based on the selected value
						if (selecteValue === "হ্যাঁ") {
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "block";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "block";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";
						document.getElementById("varsity_edumethod").style.display = "block";
						}

						else if (selecteValue === "না, পরীক্ষার্থী") {
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "block";
						document.getElementById("higher_seconday_group").style.display = "block";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

						document.getElementById("varsity_edumethod").style.display = "none";
						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}

						else if (selecteValue === "না, এখনো অধ্যায়নরত") {
						document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
						document.getElementById("higher_seconday_group").style.display = "block";
						document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "block";

						document.getElementById("varsity_edumethod").style.display = "none";
						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}
					}

					// Function to show or hide fields based on the selected value of dawra_pass_field
					function toggleDiplomaFields() {
						var selecteValue = document.getElementById("doploma_hrscdmethod").value;

						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "none";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
						document.getElementById("varsity_edumethod").style.display = "none";

						// Show or hide fields based on the selected value
						if (selecteValue === "হ্যাঁ") {
						document.getElementById("doploma_hrscnd_pass_year").style.display = "block";
						document.getElementById("doploma_hrscnd_subject").style.display = "block";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
						document.getElementById("varsity_edumethod").style.display = "block";
						}

						else if (selecteValue === "না, অধ্যায়নরত আছি") {
						document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
						document.getElementById("doploma_hrscnd_subject").style.display = "block";
						document.getElementById("doploma_hrscnd_exam_year").style.display = "block";
						document.getElementById("varsity_edumethod").style.display = "none";

						document.getElementById("varsity_edumethod").style.display = "none";
						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}
					}

					// Function to show or hide fields based on the selected value of dawra_pass_field
					function toggleVarsityFields() {
						var selecteValue = document.getElementById("university_edumethod").value;

						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";

						// Show or hide fields based on the selected value
						if (selecteValue === "জেনারেল" || "আলিয়া মাদ্রাসা" || "ডিপ্লোমা") {
						document.getElementById("varsity_pass").style.display = "block";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}

						else if (selecteValue === "অধ্যায়ন বাদ দিয়েছি") {
						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}

						else if (selecteValue === "অন্যান্য") {
						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";
						}
					}

					// Function to show or hide fields based on the selected value of dawra_pass_field
					function toggleVarsityPassFields() {
						var selecteValue = document.getElementById("university_pass").value;

						document.getElementById("varsity_pass").style.display = "none";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "none";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "none";

						// Show or hide fields based on the selected value
						if (selecteValue === "হ্যাঁ") {
						document.getElementById("varsity_pass").style.display = "block";
						document.getElementById("varsity_pass_year").style.display = "block";
						document.getElementById("varsity_subject").style.display = "block";
						document.getElementById("varsity_exam_year").style.display = "none";
						document.getElementById("varsity_name").style.display = "block";
						}

						else if (selecteValue === "না, অধ্যায়নরত আছি") {
						document.getElementById("varsity_pass").style.display = "block";
						document.getElementById("varsity_pass_year").style.display = "none";
						document.getElementById("varsity_subject").style.display = "block";
						document.getElementById("varsity_exam_year").style.display = "block";
						document.getElementById("varsity_name").style.display = "block";
						}
					}

					// Attach the functions to the onchange events of the dropdowns
					document.getElementById("secondary_edu_method").onchange = toggleSections;
					document.getElementById("dawra_pass").onchange = toggleDawraFields;
					document.getElementById("gnrl_mdrs_scnd_pass").onchange = toggleSecondaryFields;
					document.getElementById("higher_seconday_edumethod").onchange = toggleHrsecondaryFields; // Update the event assignment to toggleHrsecondaryFields
					document.getElementById("gnrl_mdrs_hrscnd_pass").onchange = toggleHrgnrmdrsFields; // Update the event assignment to toggleHrsecondaryFields
					document.getElementById("doploma_hrscnd_pass").onchange = toggleDiplomaFields; // Update the event assignment to toggleHrsecondaryFields
					document.getElementById("varsity_edumethod").onchange = toggleVarsityFields; // Update the event assignment to toggleHrsecondaryFields
					document.getElementById("varsity_pass").onchange = toggleVarsityPassFields; // Update the event assignment to toggleHrsecondaryFields

					// Trigger the functions initially to set the initial state
					toggleSections();
					toggleDawraFields();
					toggleSecondaryFields();
					toggleHrsecondaryFields();
					toggleHrgnrmdrsFields();
					toggleDiplomaFields();
					toggleVarsityFields();
					toggleVarsityPassFields();
				</script>
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<!--3 fieldsets end-->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--  Educational Qualifications  / sb-biodata-3   --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->






			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                S  T  A  R  T                  --
			--       Address Details  /  sb-biodata-4        --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<?php
				include("includes/dbconn.php");

				//getting profile details from db
				$sql="SELECT * FROM 4bd_address_details WHERE user_id = $id";
				$result = mysqlexec($sql);

				if($result){
				$row=mysqli_fetch_assoc($result);
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

			<!--Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="addressDetails">			
					<div class="sb-biodata-field">
						<h2>বর্তমান এবং স্থায়ী ঠিকানা</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>স্থায়ী ঠিকানার বিভাগ<span class="form-required" title="This field is required.">*</span></label>
							<select name="permanent_division" required onchange="showSection(this.value)">
								<option hidden selected></option>
								<option value="বরিশাল">বরিশাল</option>
								<option value="চট্টগ্রাম">চট্টগ্রাম</option>
								<option value="ঢাকা">ঢাকা</option>
								<option value="খুলনা">খুলনা</option>
								<option value="ময়মনসিংহ">ময়মনসিংহ</option>
								<option value="রাজশাহী">রাজশাহী</option>
								<option value="রংপুর">রংপুর</option>
								<option value="সিলেট">সিলেট</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="বরিশাল" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_barishal">
								<option hidden selected></option>
								<option value="ঝালকাঠী">ঝালকাঠী</option>
								<option value="পটুয়াখালী">পটুয়াখালী</option> 
								<option value="পিরোজপুর">পিরোজপুর</option>
								<option value="বরিশাল">বরিশাল</option> 
								<option value="বরগুনা">বরগুনা</option>
								<option value="ভোলা">ভোলা</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="চট্টগ্রাম" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_chattogram">
								<option hidden selected></option>
								<option value="কক্সবাজার">কক্সবাজার</option>  
								<option value="কুমিল্লা">কুমিল্লা</option>
								<option value="খাগড়াছড়ি">খাগড়াছড়ি</option>
								<option value="চট্টগ্রাম">চট্টগ্রাম</option>
								<option value="চাঁদপুর">চাঁদপুর</option>
								<option value="নোয়াখালী">নোয়াখালী</option>
								<option value="ফেনী">ফেনী</option>
								<option value="বান্দরবান">বান্দরবান</option>
								<option value="ব্রাহ্মনবাড়ীয়া">ব্রাহ্মনবাড়ীয়া</option> 
								<option value="লক্ষীপুর">লক্ষীপুর</option>
								<option value="রাঙ্গামাটি">রাঙ্গামাটি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="ঢাকা" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_dhaka">
							<option hidden selected></option>
							<option value="কিশোরগঞ্জ">কিশোরগঞ্জ</option>
							<option value="গাজীপুর">গাজীপুর</option>
							<option value="গোপালগঞ্জ">গোপালগঞ্জ</option>
							<option value="টাঙ্গাইল">টাঙ্গাইল</option>
							<option value="ঢাকা">ঢাকা</option>
							<option value="নরসিংদী">নরসিংদী</option>
							<option value="নারায়ণগঞ্জ">নারায়ণগঞ্জ</option>
							<option value="ফরিদপুর">ফরিদপুর</option>
							<option value="মাদারীপুর">মাদারীপুর</option>
							<option value="মানিকগঞ্জ">মানিকগঞ্জ</option>
							<option value="মুন্সীগঞ্জ">মুন্সীগঞ্জ</option>
							<option value="রাজবাড়ী">রাজবাড়ী</option>
							<option value="শরীয়তপুর">শরীয়তপুর</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="খুলনা" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_khulna">
								<option hidden selected></option>
								<option value="কুষ্টিয়া">কুষ্টিয়া</option>
								<option value="খুলনা">খুলনা</option>
								<option value="চুয়াডাঙ্গা">চুয়াডাঙ্গা</option>
								<option value="ঝিনাইদহ">ঝিনাইদহ</option>
								<option value="নড়াইল">নড়াইল</option>
								<option value="বাগেরহাট">বাগেরহাট</option>
								<option value="মাগুরা">মাগুরা</option>
								<option value="মেহেরপুর">মেহেরপুর</option>
								<option value="যশোর">যশোর</option>
								<option value="সাতক্ষীরা">সাতক্ষীরা</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="ময়মনসিংহ" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_mymensingh">
								<option hidden selected></option>
								<option value="জামালপুর">জামালপুর</option>
								<option value="নেত্রকোনা">নেত্রকোনা</option>
								<option value="ময়মনসিংহ">ময়মনসিংহ</option> 
								<option value="শেরপুর">শেরপুর</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="রাজশাহী" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_rajshahi">
								<option hidden selected></option>
								<option value="চাঁপাই-নবাবগঞ্জ">চাঁপাই-নবাবগঞ্জ</option>
								<option value="জয়পুরহাট">জয়পুরহাট</option>
								<option value="নওগাঁ">নওগাঁ</option>
								<option value="নাটোর">নাটোর</option>
								<option value="পাবনা">পাবনা</option>
								<option value="বগুড়া">বগুড়া</option>
								<option value="রাজশাহী">রাজশাহী</option>
								<option value="সিরাজগঞ্জ">সিরাজগঞ্জ</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="রংপুর" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_rangpur">
								<option hidden selected></option>
								<option value="কুড়িগ্রাম">কুড়িগ্রাম</option>
								<option value="গাইবান্ধা">গাইবান্ধা</option>
								<option value="ঠাকুরগাঁও">ঠাকুরগাঁও</option>
								<option value="দিনাজপুর">দিনাজপুর</option>
								<option value="নীলফামারী">নীলফামারী</option>
								<option value="পঞ্চগড়">পঞ্চগড়</option>
								<option value="রংপুর">রংপুর</option>
								<option value="লালমনিরহাট">লালমনিরহাট</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="সিলেট" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_sylhet">
								<option hidden selected></option>
								<option value="মৌলভীবাজার">মৌলভীবাজার</option>
								<option value="সুনামগঞ্জ">সুনামগঞ্জ</option>
								<option value="সিলেট">সিলেট</option>
								<option value="হবিগঞ্জ">হবিগঞ্জ</option> 
							</select>
						</div>

						<script>
							function showSection(division) {
							// Hide all district sections
							var districtSections = document.getElementsByClassName("section");
							for (var i = 0; i < districtSections.length; i++) {
								districtSections[i].style.display = "none";
							}
							// Show the selected division's district section
							var selectedDivisionSection = document.getElementById(division);
							if (selectedDivisionSection) {
								selectedDivisionSection.style.display = "block";
							}
							}
						</script>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">যে দেশে বসবাস করেন<span class="form-required" title="This field is required.">*</span></label>
							<select name="country_present_address" required class="selectsearch">
								<option></option>
								<option value="Afghanistan">Afghanistan</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option> 
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Bahrain">Bahrain</option> 
								<option value="Bangladesh">Bangladesh</option> 
								<option value="Belgium">Belgium</option>
								<option value="Bhutan">Bhutan</option> 
								<option value="Brazil">Brazil</option>
								<option value="Canada">Canada</option>
								<option value="China">China</option> 
								<option value="Colombia">Colombia</option>
								<option value="Denmark">Denmark</option> 
								<option value="Egypt">Egypt</option>
								<option value="Finland">Finland</option> 
								<option value="France">France</option>
								<option value="Germany">Germany</option> 
								<option value="Greece">Greece</option>
								<option value="Hungary">Hungary</option> 
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option> 
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option> 
								<option value="Ireland">Ireland</option>
								<option value="Italy">Italy</option> 
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option> 
								<option value="Kazakhstan">Kazakhstan</option> 
								<option value="Korea, North">Korea, North</option>
								<option value="Korea, South">Korea, South</option> 
								<option value="Kuwait">Kuwait</option>
								<option value="Libya">Libya</option> 
								<option value="Luxembourg">Luxembourg</option>
								<option value="Malaysia">Malaysia</option> 
								<option value="Maldives">Maldives</option> 
								<option value="Mexico">Mexico</option>
								<option value="Morocco">Morocco</option>
								<option value="Myanmar">Myanmar</option>  
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option> 
								<option value="New Zealand">New Zealand</option>
								<option value="Norway">Norway</option> 
								<option value="Oman">Oman</option> 
								<option value="Pakistan">Pakistan</option>
								<option value="Palestine">Palestine</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Philippines">Philippines</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option> 
								<option value="Qatar">Qatar</option> 
								<option value="Russia">Russia</option> 
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Singapore">Singapore</option>
								<option value="South Africa">South Africa</option>  
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option> 
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syria</option> 
								<option value="Taiwan">Taiwan</option>  
								<option value="Tajikistan">Tajikistan</option>   
								<option value="Thailand">Thailand</option> 
								<option value="Turkey">Turkey</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>  
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States of America">United States of America</option> 
								<option value="Uruguay">Uruguay</option>
								<option value="Vietnam">Vietnam</option>
								<option value="Yemen">Yemen</option>
								<option value="Others">Others</option>    
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">বর্তমান বসবাসের ঠিকানা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="present_address_location" id="edit-name"  value="" size="100" maxlength="100" class="form-text required" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">বাল্যকালে কোথায় থেকেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="childhood" value="" size="100" maxlength="100" class="form-text required" required>
						</div>
					</div>
				</div>

				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<!--Fieldsets end-->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--       Address Details  /  sb-biodata-4        --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->








			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                S  T  A  R  T                  --
			--     Family Information  / sb-biodata-5        --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<?php
				include("includes/dbconn.php");

				//getting profile details from db
				$sql="SELECT * FROM 5bd_family_information WHERE user_id = $id";
				$result = mysqlexec($sql);

				if($result){
				$row=mysqli_fetch_assoc($result);
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

			<!--Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="familyInfo">
					<div class="sb-biodata-field">
						<h2>পারিবারিক ও সামাজিক তথ্য</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>বাবা বেঁচে আছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="father_alive" value="" size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label>বাবার পেশা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="fatheroccupation" value="" size="200" maxlength="200" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label>মা বেঁচে আছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="mother_alive"  value=""  size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label>মায়ের পেশা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="motheroccupation"  value=""  size="200" maxlength="200" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label>ভাইবোন কয়জন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="brosis_number"  value=""  size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label>ভাইবোন সম্পর্কিত তথ্য<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="8" name="brosis_info"   placeholder="Discribe Your Sisters & Brothers information" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label>মামা/চাচাদের পেশা<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="8" name="uncle_profession"  placeholder="Describe Profession of Your Uncles" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label>পারিবারিক শ্রেণী<span class="form-required" title="This field is required.">*</span></label>
							<select name="family_class" required>
								<option hidden selected></option>
								<option value="উচ্চ শ্রেণী">উচ্চ শ্রেণী</option>
								<option value="উচ্চ মধ্যম শ্রেণী">উচ্চ মধ্যম শ্রেণী</option> 
								<option value="মধ্যম শ্রেণী">মধ্যম শ্রেণী</option>
								<option value="নিম্নমধ্যম শ্রেণী">নিম্নমধ্যম শ্রেণী</option>
								<option value="নিম্ন শ্রেণী">নিম্ন শ্রেণী</option>  
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label>পরিবারের অর্থনৈতিক অবস্থা কেমন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="financial_condition" placeholder="Describe Your Financial Condition" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label>পারিবারিক ধর্মীয় ও সামাজিক অবস্থা কেমন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="family_religious_condition"  placeholder="Describe Your Family's Religious Condition" class="form-text-describe" required></textarea>
						</div>
					</div>
				</div>

				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<!--Fieldsets end-->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--     Family Information  / sb-biodata-5        --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->







			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                S  T  A  R  T                  --
			--   Male Marriage related Info / sb-biodata-6   --
			--  Female Marriage related Info / sb-biodata-7  --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<?php
				include("includes/dbconn.php");

				//bd_marriage_related_qs_male_6;
				//getting profile details from db
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
					if($row){
						$profileby=$row['profileby'];
					}
				}

				//bd_marriage_related_qs_female_7;
				//getting profile details from db
				$sql="SELECT * FROM 7bd_marriage_related_qs_female WHERE user_id = $id";
				$result = mysqlexec($sql);
				if($result){
					$row=mysqli_fetch_assoc($result);
					if($row){
						$guardians_agree=$row['guardians_agree'];
					}
					if($row){
						$studies_aftermarriage=$row['studies_aftermarriage'];
					}
					if($row){
						$anyjob_aftermarriage=$row['anyjob_aftermarriage'];
					}
					if($row){
						$agree_marriage_student=$row['agree_marriage_student'];
					}
					if($row){
						$profileby=$row['profileby'];
					}
				}

				//6bd_7bd_marital_status;
				//getting profile details from db
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


			<!--Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="maleMarriageInfo">
					<div class="sb-biodata-field">
						<h2>বিবাহ সম্পর্কিত তথ্য</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">বৈবাহিক অবস্থা<span class="form-required" title="This field is required.">*</span></label>
							<select name="maritalstatus" required onchange="toggleMaritalStatus(this.value)">
								<option hidden selected></option>
								<option value="অবিবাহিত">অবিবাহিত</option>
								<option value="ডিভোর্স">ডিভোর্স</option>
								<option value="বিধবা">বিধবা</option>
								<option value="বিপত্নীক">বিপত্নীক</option>
								<option value="বিবাহিত">বিবাহিত</option>
							</select>
						</div>

						<!-- Gurdians Aggress Without Married Sections -->
						<div class="shosurbari-biodata-field" id="gurdian-aggress-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">পরিবারের অনুমতি নিয়ে বায়োডাটা পোস্ট করতেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<input type="text" id="edit-name" name="guardians_agree"  value=""  size="100" maxlength="100" class="form-text">
							</div>
						</div>

						<!-- Divorce Section Start -->
						<div class="shosurbari-biodata-field" id="divorce-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">ডিভোর্সের কারণ বর্ণনা করুন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea rows="5" name="divorce_reason" placeholder="Describe Your Divorce Reason" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Divorce Section End -->


						<!-- Widow Section Start-->
						<div class="shosurbari-biodata-field" id="widow-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">স্বামী যেভাবে মারা গেছেন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea rows="5" name="how_widow" placeholder="Describe How You Became a Widow" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Widow Section End-->


						<!-- Widower Section Start-->
						<div class="shosurbari-biodata-field" id="widower-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">স্ত্রী যেভাবে মারা গেছেন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea rows="5" name="how_widower" placeholder="Describe How You Became a Widower" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Widower Section End-->


						<!-- Married Section Start-->
						<div class="shosurbari-biodata-field" id="married-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">বর্তমান স্ত্রীর অনুমতি নিয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
								<input type="text" id="edit-name" name="get_wife_permission"  value=""  size="100" maxlength="100" class="form-text">
							</div>

							<div class="shosurbari-biodata-field">
								<label for="edit-name">আপনার ও বর্তমান স্ত্রীর পরিবার থেকে অনুমতি নিয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
								<input type="text" id="edit-name" name="get_family_permission"  value=""  size="100" maxlength="100" class="form-text">
							</div>

							<div class="shosurbari-biodata-field">
								<label for="edit-name">আবার বিয়ে করার কারণ<span class="form-required" title="This field is required.">*</span></label>
								<textarea rows="5" name="why_again_married" placeholder="Describe How You Became a Widower" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Married Section End-->


						<div class="shosurbari-biodata-field" id="son-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">কয়টি সন্তান আছে<span class="form-required" title="This field is required.">*</span></label>
								<select name="how_many_son" onchange="toggleSonDetails(this.value)">
									<option hidden selected></option>
									<option value="কোনো সন্তান নেই">কোনো সন্তান নেই</option>
									<option value="১টি সন্তান">১টি সন্তান</option>
									<option value="২টি সন্তান">২টি সন্তান</option>
									<option value="৩টি সন্তান">৩টি সন্তান</option>
									<option value="৪টি সন্তান">৪টি সন্তান</option>
									<option value="৫টি সন্তান">৫টি সন্তান</option>
									<option value="৬টি সন্তান">৬টি সন্তান</option>
									<option value="৭টি সন্তান">৭টি সন্তান</option>
									<option value="৮টি সন্তান">৮টি সন্তান</option>
									<option value="৯টি সন্তান">৯টি সন্তান</option>
									<option value="১০টি সন্তান">১০টি সন্তান</option>
								</select>
							</div>

							<div class="shosurbari-biodata-field" id="son-details" style="display: none;">
								<label for="edit-name">সন্তান সম্পর্কিত তথ্য<span class="form-required" title="This field is required.">*</span></label>
								<textarea rows="5" name="son_details" placeholder="Describe Your Son Details" class="form-text-describe"></textarea>
							</div>
						</div>


						<!-- Bellow Two Sections For Male or Female -->
						<div class="shosurbari-biodata-field" id="male-allow-wife-job">
							<label for="edit-name">স্ত্রীকে চাকরি করতে দিতে ইচ্ছুক?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="allowjob_aftermarriage"  value=""  size="100" maxlength="100" class="form-text">
						</div>
						<!--Top Male | OR | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-job-after-marriage">
							<label for="edit-name">বিয়ের পর চাকরি করতে চান?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="anyjob_aftermarriage" value="" size="100" maxlength="100" class="form-text">
						</div>

						<div class="shosurbari-biodata-field" id="male-allow-wife-study">
							<label for="edit-name">স্ত্রীকে প্রাতিষ্ঠানিক পড়ালেখা করতে দিতে ইচ্ছুক?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="allowstudy_aftermarriage" value="" size="100" maxlength="100" class="form-text">
						</div>
						<!--Top Male | OR | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-study-after-marriage">
							<label for="edit-name">বিয়ের পর পড়াশোনা চালিয়ে যেতে চান?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="studies_aftermarriage"   value=""  size="200" maxlength="200" class="form-text">
						</div>
						
						<div class="shosurbari-biodata-field" id="male-live-with-wife">
							<label for="edit-name">বিয়ের পর স্ত্রীকে নিয়ে কোথায় থাকবেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="livewife_aftermarriage"  value=""  size="100" maxlength="100" class="form-text">
						</div>
						<!--Top Male | OR | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-agree-marriage-student">
							<label for="edit-name">শিক্ষার্থী বিয়ে করতে রাজি আছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="agree_marriage_student"   value=""size="200" maxlength="200" class="form-text">
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">বায়োডাটা টি যার জন্য পোস্ট করতেছেন, তার আপনি কে হন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="profileby" required>
								<option hidden selected></option>
								<option value="নিজের জন্য">নিজের জন্য</option>
								<option value="বাবা হই">বাবা হই</option>
								<option value="মা হই">মা হই</option>
								<option value="ভাই হই">ভাই হই</option>
								<option value="বোন হই">বোন হই</option>
								<option value="চাচা/মামা হই">চাচা/মামা হই</option> 
								<option value="চাচী/মামী হই">চাচী/মামী হই</option>
								<option value="নানা/দাদা হই">নানা/দাদা হই</option> 
								<option value="নানী/দাদী হই">নানী/দাদী হই</option> 
								<option value="অন্যান্য">অন্যান্য</option> 
							</select>
						</div>
					</div>    
				</div>

				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" />

				<script>
	function toggleGenderSections(selectedGender) {
		var maleallowJobwife = document.getElementById('male-allow-wife-job');
		var femaleJobSection = document.getElementById('female-job-after-marriage');
		var maleallowStudywife = document.getElementById('male-allow-wife-study');
		var femaleStudySection = document.getElementById('female-study-after-marriage');
		var maleliveWithwife = document.getElementById('male-live-with-wife');
		var femaleagreeMarriagestudent = document.getElementById('female-agree-marriage-student');

		if (selectedGender === 'পাত্রের বায়োডাটা') {
			maleallowJobwife.style.display = 'block';
			femaleJobSection.style.display = 'none';

			maleallowStudywife.style.display = 'block';
			femaleStudySection.style.display = 'none';

			maleliveWithwife.style.display = 'block';
			femaleagreeMarriagestudent.style.display = 'none';

			// Hide বিধবা option
			var maritalStatusSelect = document.getElementsByName('maritalstatus')[0];
			var optionWidow = maritalStatusSelect.querySelector('option[value="বিধবা"]');
			optionWidow.style.display = 'none';
		} else if (selectedGender === 'পাত্রীর বায়োডাটা') {
			maleallowJobwife.style.display = 'none';
			femaleJobSection.style.display = 'block';

			maleallowStudywife.style.display = 'none';
			femaleStudySection.style.display = 'block';

			maleliveWithwife.style.display = 'none';
			femaleagreeMarriagestudent.style.display = 'block';

			// Hide বিপত্নীক option
			var maritalStatusSelect = document.getElementsByName('maritalstatus')[0];
			var optionWidower = maritalStatusSelect.querySelector('option[value="বিপত্নীক"]');
			optionWidower.style.display = 'none';
		} else {
			maleallowJobwife.style.display = 'none';
			femaleJobSection.style.display = 'none';

			maleallowStudywife.style.display = 'none';
			femaleStudySection.style.display = 'none';

			maleliveWithwife.style.display = 'none';
			femaleagreeMarriagestudent.style.display = 'none';

			// Show all options
			var maritalStatusSelect = document.getElementsByName('maritalstatus')[0];
			var options = maritalStatusSelect.querySelectorAll('option');
			options.forEach(function(option) {
				option.style.display = 'block';
			});
		}
	}

	function toggleMaritalStatus(selectedStatus) {
		var gurdianAggressSection = document.getElementById('gurdian-aggress-section');
		var sonDetailsSection = document.getElementById('son-section');
		var divorceSection = document.getElementById('divorce-section');
		var widowSection = document.getElementById('widow-section');
		var widowerSection = document.getElementById('widower-section');
		var marriedSection = document.getElementById('married-section');

		// Hide all sections initially
		gurdianAggressSection.style.display = 'none';
		sonDetailsSection.style.display = 'none';
		divorceSection.style.display = 'none';
		widowSection.style.display = 'none';
		widowerSection.style.display = 'none';
		marriedSection.style.display = 'none';

		if (selectedStatus === 'অবিবাহিত') {
			gurdianAggressSection.style.display = 'block';
			sonDetailsSection.style.display = 'none';
		} else if (selectedStatus === 'ডিভোর্স') {
			divorceSection.style.display = 'block';
			gurdianAggressSection.style.display = 'block';
			sonDetailsSection.style.display = 'block';
		} else if (selectedStatus === 'বিধবা') {
			widowSection.style.display = 'block';
			sonDetailsSection.style.display = 'block';
			gurdianAggressSection.style.display = 'block';
		} else if (selectedStatus === 'বিপত্নীক') {
			widowerSection.style.display = 'block';
			gurdianAggressSection.style.display = 'block';
			sonDetailsSection.style.display = 'block';
		} else if (selectedStatus === 'বিবাহিত') {
			marriedSection.style.display = 'block';
			sonDetailsSection.style.display = 'block';
		}
	}

	function toggleSonDetails(selectedSonCount) {
		var sonAboutSection = document.getElementById('son-details');

		if (selectedSonCount !== 'কোনো সন্তান নেই') {
				sonAboutSection.style.display = 'block';
			} else {
				sonAboutSection.style.display = 'none';
			}
		}
</script>

			</fieldset>
			<!--Fieldsets end-->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--   Male Marriage related Info / sb-biodata-6   --
			--  Female Marriage related Info / sb-biodata-7  --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->








			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                S  T  A  R  T                  --
			--        Religion Details / sb-biodata-8        --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<?php
				include("includes/dbconn.php");

				//getting profile details from db
				$sql="SELECT * FROM 8bd_religion_details WHERE user_id = $id";
				$result = mysqlexec($sql);

				if($result){
				$row=mysqli_fetch_assoc($result);
				if($row){
				$religion=$row['religion'];
				}
				if($row){
				$yourreligion_condition=$row['yourreligion_condition'];
				}
				}
			?>


			<!--7 fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="religionDetails">
					<div class="sb-biodata-field">
						<h2>ধর্মীয় বিষয়</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label for="edit-pass">ধর্ম<span class="form-required" title="This field is required.">*</span></label>
							<select name="religion" required>
								<option hidden selected></option>
								<option value="ইসলাম ধর্ম">ইসলাম ধর্ম</option>
								<option value="হিন্দু ধর্ম">হিন্দু ধর্ম</option>
								<option value="খ্রিস্টান ধর্ম">খ্রিস্টান ধর্ম</option>
								<option value="বৌদ্ধ ধর্ম">বৌদ্ধ ধর্ম</option>
								<option value="অন্যান্য">অন্যান্য</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="about me">ধর্মীয় বিধিনিষেধ কতটুকু অনুসরণ করেন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="yourreligion_condition" placeholder="Describe Your Religious Condition" class="form-text-describe" required></textarea>
						</div>
					</div>
				</div>

				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<!--Fieldsets end-->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--        Religion Details / sb-biodata-8        --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->




			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                S  T  A  R  T                  --
			--     Expected Life Partner / sb-biodata-9      --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<?php
				include("includes/dbconn.php");

				//getting profile details from db
				$sql="SELECT * FROM 9bd_expected_life_partner WHERE user_id = $id";
				$result = mysqlexec($sql);

				if($result){
				$row=mysqli_fetch_assoc($result);
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
				}
			?>

			<!--Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="expectedPartner">
					<div class="sb-biodata-field">
						<h2>প্রত্যাশিত জীবনসঙ্গীর বিবরণ</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর ধর্মীয় বিষয়াবলী যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_religius"  value=""  size="200" maxlength="200" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গী যেই <span style="color: black; font-size: 15px;">জেলার</span> আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_district" value=""  size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বৈবাহিক অবস্থা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_maritialstatus"  value=""  size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বয়স</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_age" value=""  size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">শারীরিক বর্ণ</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_skintones"  value="" size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">উচ্চতা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_height"  value=""  size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">শিক্ষাগত যোগ্যতা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_education"  value=""  size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">পেশা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_profession"  value=""  size="200" maxlength="200" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">অর্থনৈতিক অবস্থা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_financial"  value=""  size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বৈশিষ্ঠ ও গুণাবলী</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="8" id="edit-name" name="partner_attributes" placeholder="Describe Expected Qualities or Attributes of Your Life Partner" class="form-text-describe" required></textarea>
						</div>
					</div>
				</div>

        		<input type="button" name="previous" class="previous action-button" value="Previous" />
				<button type="submit" id="edit-submit" name="op" class="biodata-submit"><span></span> Submit</button>			
    		</fieldset> 
			<!--Fieldsets end-->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--     Expected Life Partner / sb-biodata-9      --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
		</form>
	</div>

	

<!--=======================================
How Many Visitors View This Page.
This Script Connected to get_view_count.php
and page_views Database Table
========================================-->
<script>
	$(document).ready(function() {
	// Define an array of page names (without the .php extension)
	var pages = ["biodata_post"];

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

<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>




<script>
	// jQuery time
	var current_fs, next_fs, previous_fs; // fieldsets

	$(".next").click(function() {
		current_fs = $(this).closest("fieldset");
		next_fs = current_fs.next("fieldset");

		// Validate fields in the current fieldset
		if (!validateFields(current_fs)) {
			return; // Stop execution if fields are empty
		}

		// Activate next step on progressbar
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		// Show the next fieldset
		next_fs.show();
		// Hide the current fieldset
		current_fs.hide();

		// Smooth scroll to the top of the progress bar
		var progressBarHeight = $('#progressbar').outerHeight();
		var windowHeight = $(window).height();
		var marginTop = (windowHeight - progressBarHeight) / 15;
		var topMargin = 50;


		if ($(window).width() <= 735) {
    	topMargin = 85; // Update the scroll top value for screens under 735px
  		}

		  $('html, body').animate({ scrollTop: $('#progressbar').offset().top - marginTop - topMargin }, 800);
	});



	$(".previous").click(function() {
		current_fs = $(this).closest("fieldset");
		previous_fs = current_fs.prev("fieldset");

		// Show the previous fieldset
		previous_fs.show();
		// Hide the current fieldset
		current_fs.hide();

		// De-activate current step on progressbar
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		// Smooth scroll to the top of the progress bar
		var progressBarHeight = $('#progressbar').outerHeight();
		var windowHeight = $(window).height();
		var marginTop = (windowHeight - progressBarHeight) / 15;
		var topMargin = 50;

		if ($(window).width() <= 735) {
		topMargin = 85; // Update the scroll top value for screens under 735px
		}

  		$('html, body').animate({ scrollTop: $('#progressbar').offset().top - marginTop - topMargin }, 800);
	});



	// Validate the fields in the current fieldset
	function validateFields(current_fs) {
		var isValid = true;

		// Get all required input fields within the current fieldset
		var inputs = current_fs.find(":input[required]");

		// Remove previous error messages
		current_fs.find(".error-message-empty").remove();

		// Loop through each input field and check if it's empty
		inputs.each(function() {
			if ($(this).val().trim() === "") {
			$(this).addClass("error"); // Add error class to highlight the empty field
			isValid = false;

			// Show error message
			var errorMessage = "<span class='error-message-empty'>This field is required.</span>";
			$(this).after(errorMessage);
			} else {
			$(this).removeClass("error"); // Remove error class if the field is not empty
			}
		});


		// Scroll to the first empty input field
		if (!isValid) {
			var firstEmptyField = current_fs.find(".error").first();
			var windowHeight = $(window).height();
			var fieldTop = firstEmptyField.offset().top;
			var fieldHeight = firstEmptyField.outerHeight();
			var middleOffset = (windowHeight / 2) - (fieldHeight / 2);
			var scrollTo = fieldTop - middleOffset;

			$('html, body').animate({ scrollTop: scrollTo }, 800);
		}
		return isValid;
	}
</script>
