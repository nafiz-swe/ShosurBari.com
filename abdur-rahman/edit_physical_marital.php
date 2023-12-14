<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
error_reporting(0);
if (!isset($_SESSION['id'])) {
  header("location: ../abdur-rahman/admin_login.php");
  exit;
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
  <title>Edit PysicalMarital-Admin | ShosurBari</title>
</head>
<body>
<!-- ====== Admin Panel Navigation Bar ====== -->
<?php include("admin_navigation.php"); ?>
<!-- ========================================= -->
<style>
input[type=submit] {
	cursor: pointer;
	height: 35px;
	width: 400px;
	margin-top: 10px;
	background: linear-gradient(#06b6d4, #0ea5e9);
	border: 1px solid #ccc;
	border-radius: 4px;
	color: #fff;
	box-shadow: 1px 1px 4px #888;
}
html, body {
	padding-top: 0px;
}
fieldset {
	margin-bottom: 100px;
}
</style>
<?php
	if (isset($_GET['id'])) {
	// Get the user ID from the URL
	$userId = $_GET['id'];
	require_once("includes/dbconn.php");
  	// Fetch user data for the specified user ID
    $sql = "SELECT * FROM 1bd_personal_physical WHERE user_id = $userId";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
		$user_id = $row['user_id'];
        $biodatagender = $row['biodatagender'];
        $day = $row['dateofbirth'];
		$month = $row['dateofbirth'];
		$year = $row['dateofbirth'];
        $height = $row['height'];
        $weight = $row['weight'];
        $physicalstatus = $row['physicalstatus'];
        $Skin_tones = $row['Skin_tones'];
        $bloodgroup = $row['bloodgroup'];
        $mfSql = "SELECT * FROM 6bd_7bd_marital_status WHERE user_id = $userId";
        $mfResult = $conn->query($mfSql);
        if ($mfResult->num_rows == 1) {
		$mfRow = $mfResult->fetch_assoc();
		$maritalstatus = $mfRow['maritalstatus'];
		$divorce_reason = $mfRow['divorce_reason'];
		$how_widow = $mfRow['how_widow'];
		$how_widower = $mfRow['how_widower'];
		$how_many_son = $mfRow['how_many_son'];
		$son_details = $mfRow['son_details'];
		$get_wife_permission = $mfRow['get_wife_permission'];
		$get_family_permission = $mfRow['get_family_permission'];
		$why_again_married = $mfRow['why_again_married'];
        }
        $maleSql = "SELECT * FROM 6bd_marriage_related_qs_male WHERE user_id = $userId";
        $maleResult = $conn->query($maleSql);
        if ($maleResult->num_rows == 1) {
		$maleRow = $maleResult->fetch_assoc();
		$allowstudy_aftermarriage = $maleRow['allowstudy_aftermarriage'];
		$allowjob_aftermarriage = $maleRow['allowjob_aftermarriage'];
		$livewife_aftermarriage = $maleRow['livewife_aftermarriage'];
		$profileby = $maleRow['profileby'];
        }
        $femaleSql = "SELECT * FROM 7bd_marriage_related_qs_female WHERE user_id = $userId";
        $femaleResult = $conn->query($femaleSql);
        if ($femaleResult->num_rows == 1) {
		$femaleRow = $femaleResult->fetch_assoc();
		$anyjob_aftermarriage = $femaleRow['anyjob_aftermarriage'];
		$studies_aftermarriage = $femaleRow['studies_aftermarriage'];
		$agree_marriage_student = $femaleRow['agree_marriage_student'];
		$profileby = $femaleRow['profileby'];
        }
    } else {
	echo 'User not found.';
	$conn->close();
	exit;
    }
    if (isset($_POST['update'])) {
        // Below Pysical
        $biodatagender = $conn->real_escape_string($_POST['biodatagender']);
        $day = $conn->real_escape_string($_POST['day']);
		$month = $conn->real_escape_string($_POST['month']);
        $year = $conn->real_escape_string($_POST['year']);
		$dob = $conn->real_escape_string($day ."-" . $month . "-" .$year);
        $height = $conn->real_escape_string($_POST['height']);
        $weight = $conn->real_escape_string($_POST['weight']);
        $physicalstatus = $conn->real_escape_string($_POST['physicalstatus']);
        $Skin_tones = $conn->real_escape_string($_POST['Skin_tones']);
        $bloodgroup = $conn->real_escape_string($_POST['bloodgroup']);
        // Below Marital
        $maritalstatus = $conn->real_escape_string($_POST['maritalstatus']);
        $divorce_reason = $conn->real_escape_string($_POST['divorce_reason']);
        $how_widow = $conn->real_escape_string($_POST['how_widow']);
        $how_widower = $conn->real_escape_string($_POST['how_widower']);
        $how_many_son = $conn->real_escape_string($_POST['how_many_son']);
        $son_details = $conn->real_escape_string($_POST['son_details']);
        $get_wife_permission = $conn->real_escape_string($_POST['get_wife_permission']);
        $get_family_permission = $conn->real_escape_string($_POST['get_family_permission']);
        $why_again_married = $conn->real_escape_string($_POST['why_again_married']);
        // Male Question Marital
        $allowstudy_aftermarriage = $conn->real_escape_string($_POST['allowstudy_aftermarriage']);
        $allowjob_aftermarriage = $conn->real_escape_string($_POST['allowjob_aftermarriage']);
        $livewife_aftermarriage = $conn->real_escape_string($_POST['livewife_aftermarriage']);
        $profileby = $conn->real_escape_string($_POST['profileby']);
        // Female Question Marital
        $anyjob_aftermarriage = $conn->real_escape_string($_POST['anyjob_aftermarriage']);
        $studies_aftermarriage = $conn->real_escape_string($_POST['studies_aftermarriage']);
        $agree_marriage_student = $conn->real_escape_string($_POST['agree_marriage_student']);
        $profileby = $conn->real_escape_string($_POST['profileby']);
        $updateSql = "UPDATE 1bd_personal_physical SET
            biodatagender = '$biodatagender',
            dateofbirth = '$dob',
            height = '$height',
            weight = '$weight',
            physicalstatus = '$physicalstatus',
            Skin_tones = '$Skin_tones',
            bloodgroup = '$bloodgroup'
        WHERE user_id = $userId";
        $updateMaleFemaleSql = "UPDATE 6bd_7bd_marital_status SET
            maritalstatus = '$maritalstatus',
            divorce_reason = '$divorce_reason',
            how_widow = '$how_widow',
            how_widower = '$how_widower',
            how_many_son = '$how_many_son',
            son_details = '$son_details',
            get_wife_permission = '$get_wife_permission',
            get_family_permission = '$get_family_permission',
            why_again_married = '$why_again_married'
        WHERE user_id = $userId";
        $updateMaleSql = "UPDATE 6bd_marriage_related_qs_male SET
            allowstudy_aftermarriage = '$allowstudy_aftermarriage',
            allowjob_aftermarriage = '$allowjob_aftermarriage',
            livewife_aftermarriage = '$livewife_aftermarriage',
            profileby = '$profileby'
        WHERE user_id = $userId";
        $updateFemaleSql = "UPDATE 7bd_marriage_related_qs_female SET
            anyjob_aftermarriage = '$anyjob_aftermarriage',
            studies_aftermarriage = '$studies_aftermarriage',
            agree_marriage_student = '$agree_marriage_student',
            profileby = '$profileby'
        WHERE user_id = $userId";
        if (
            $conn->query($updateSql) === TRUE &&
            $conn->query($updateMaleFemaleSql) === TRUE &&
            $conn->query($updateMaleSql) === TRUE &&
            $conn->query($updateFemaleSql) === TRUE
        ) {
        echo "Education details updated successfully.";
        } else {
        echo "Error updating education details: " . $conn->error;
        }
    }
	$conn->close();
	} else {
	echo 'User ID not provided.';
	}
?>
<div class="shosurbari-biodata">
    <form action="" method="POST" id="biodataForm">
		<ul id="progressbar">
			<li class="active" id="personalPhysical">শারীরিক</li>
			<li id="MarriageInfo">বিবাহ-সম্পর্কিত</li>
		</ul>
		<fieldset>
			<div class="sb-biodata" id="personalPhysical">
				<div class="sb-biodata-field">
					<h2>শারীরিক অবস্থা</h2>
					<h2>বায়োডাটা নং: <?php echo $user_id;?></h2>
				</div>
				<div class="sb-biodata-option">
					<div class="shosurbari-biodata-field">
						<label for="edit-name">বায়োডাটার ধরণ<span class="form-required" title="This field is required.">*</span></label>
						<select name="biodatagender" required onchange="toggleGenderSections(this.value)">
							<option hidden selected><?php echo $biodatagender; ?></option>
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
						<label for="edit-pass">জন্ম মাস <span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (আসল)</span></label>
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
						<label for="edit-pass">জন্ম সাল <span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (আসল)</span></label>
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
						<label for="edit-name">শারীরিক বর্ণ<span class="form-required" title="This field is required.">*</span></label>
						<select name="Skin_tones" required>
							<option hidden selected><?php echo $Skin_tones; ?></option>
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
							<option hidden selected><?php echo $bloodgroup; ?></option>
							<option value="A+">A+</option>
							<option value="B+">B+</option> 
							<option value="AB+">AB+</option>
							<option value="O+">O+</option>
							<option value="A-">A-</option>
							<option value="B-">B-</option> 
							<option value="AB-">AB-</option>
							<option value="O-">O-</option>
							<option value="জানিনা">জানিনা</option>
						</select>
					</div>
					<div class="shosurbari-biodata-field">
						<label for="edit-name">উচ্চতা<span class="form-required" title="This field is required.">*</span></label>
						<input type="text" id="edit-name" name="height" value="<?php echo $height; ?>" size="100" maxlength="100" class="form-text" required>
					</div>
					<div class="shosurbari-biodata-field">
						<label for="edit-name">ওজন<span class="form-required" title="This field is required.">*</span></label>
						<input type="text" id="edit-name" name="weight" value="<?php echo $weight; ?>" size="100" maxlength="100" class="form-text" required>
					</div>
					<div class="shosurbari-biodata-field">
						<label for="edit-name">শারীরিক-মানসিক কোনো সমস্যা/রোগ আছে কি?<span class="form-required" title="This field is required.">*</span></label>
						<textarea rows="8" id="edit-name" name="physicalstatus" class="form-text-describe" required><?php echo $physicalstatus; ?></textarea>
					</div>
				</div>
			</div>
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<!--Fieldsets end -->
		<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
		--                   E   N   D                   --
		--       Personal & Physical  / sb-biodata-1     --
		-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
		<!-- End & Start -->
		<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
		--                S  T  A  R  T                  --
		--   Male Marriage related Info / sb-biodata-6   --
		--  Female Marriage related Info / sb-biodata-7  --
		-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
		<!--Fieldsets start-->
		<fieldset>
			<div class="sb-biodata" id="maleMarriageInfo">
				<div class="sb-biodata-field">
					<h2>বিবাহ সম্পর্কিত তথ্য</h2>
					<h2>বায়োডাটা নং: <?php echo $user_id;?></h2>
				</div>
				<div class="sb-biodata-option">
					<div class="shosurbari-biodata-field">
						<label for="edit-name">বৈবাহিক অবস্থা<span class="form-required" title="This field is required.">*</span></label>
						<select name="maritalstatus" required onchange="toggleMaritalStatus(this.value)">
							<option hidden selected><?php echo $maritalstatus; ?></option>
							<option value="অবিবাহিত">অবিবাহিত</option>
							<option value="ডিভোর্স">ডিভোর্স</option>
							<option value="বিধবা">বিধবা</option>
							<option value="বিপত্নীক">বিপত্নীক</option>
							<option value="বিবাহিত">বিবাহিত</option>
						</select>
					</div>
					<!-- Divorce Section Start -->
					<div class="shosurbari-biodata-field" id="divorce-section" style="display: none;">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">ডিভোর্সের কারণ বর্ণনা করুন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="divorce_reason" value="<?php echo $divorce_reason; ?>" placeholder="" class="form-text-describe"></textarea>
						</div>
					</div>
					<!-- Divorce Section End -->
					<!-- Widow Section Start-->
					<div class="shosurbari-biodata-field" id="widow-section" style="display: none;">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">স্বামী যেভাবে মারা গেছেন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="how_widow" value="<?php echo $how_widow; ?>" placeholder="" class="form-text-describe"></textarea>
						</div>
					</div>
					<!-- Widow Section End-->
					<!-- Widower Section Start-->
					<div class="shosurbari-biodata-field" id="widower-section" style="display: none;">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">স্ত্রী যেভাবে মারা গেছেন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="how_widower" value="<?php echo $how_widower; ?>" placeholder="" class="form-text-describe"></textarea>
						</div>
					</div>
					<!-- Widower Section End-->
					<!-- Married Section Start-->
					<div class="shosurbari-biodata-field" id="married-section" style="display: none;">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">বর্তমান স্ত্রীর অনুমতি নিয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="get_wife_permission"  value="<?php echo $get_wife_permission; ?>"  size="100" maxlength="100" class="form-text">
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">আপনার ও বর্তমান স্ত্রীর পরিবার থেকে অনুমতি নিয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="get_family_permission"  value="<?php echo $get_family_permission; ?>"  size="100" maxlength="100" class="form-text">
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">আবার বিয়ে করার কারণ<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="why_again_married" value="<?php echo $why_again_married; ?>" placeholder="" class="form-text-describe"></textarea>
						</div>
					</div>
					<!-- Married Section End-->
					<!-- This Sections For Divorce + Widow + Widower + Married Start-->
					<div class="shosurbari-biodata-field" id="son-section" style="display: none;">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">কয়টি সন্তান আছে<span class="form-required" title="This field is required.">*</span></label>
							<select name="how_many_son" onchange="toggleSonDetails(this.value)">
								<option hidden selected><?php echo $how_many_son; ?></option>
								<option></option>
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
							<textarea rows="5" name="son_details"  value="<?php echo $son_details; ?>" placeholder="" class="form-text-describe"></textarea>
						</div>
					</div>
					<!-- This Sections For Divorce + Widow + Widower + Married End-->
					<!-- Bellow Two Sections For Male or Female -->
					<div class="shosurbari-biodata-field" id="male-allow-wife-job">
						<label for="edit-name">বিয়ের পর স্ত্রীকে চাকরি করতে দিতে ইচ্ছুক?<span class="form-required" title="This field is required.">*</span></label>
						<input type="text" id="edit-name" name="allowjob_aftermarriage"  value="<?php echo $allowjob_aftermarriage; ?>"  size="100" maxlength="100" class="form-text">
					</div>
					<!--Top Male | OR | Bellow Female-->
					<div class="shosurbari-biodata-field" id="female-job-after-marriage">
						<label for="edit-name">বিয়ের পর চাকরি করতে চান?<span class="form-required" title="This field is required.">*</span></label>
						<input type="text" id="edit-name" name="anyjob_aftermarriage" value="<?php echo $anyjob_aftermarriage; ?>" size="100" maxlength="100" class="form-text">
					</div>
					<div class="shosurbari-biodata-field" id="male-allow-wife-study">
						<label for="edit-name">বিয়ের পর স্ত্রীকে প্রাতিষ্ঠানিক পড়ালেখা করতে দিতে ইচ্ছুক?<span class="form-required" title="This field is required.">*</span></label>
						<input type="text" id="edit-name" name="allowstudy_aftermarriage" value="<?php echo $allowstudy_aftermarriage; ?>" size="100" maxlength="100" class="form-text">
					</div>
					<!--Top Male | OR | Bellow Female-->
					<div class="shosurbari-biodata-field" id="female-study-after-marriage">
						<label for="edit-name">বিয়ের পর পড়াশোনা চালিয়ে যেতে চান?<span class="form-required" title="This field is required.">*</span></label>
						<input type="text" id="edit-name" name="studies_aftermarriage"   value="<?php echo $studies_aftermarriage; ?>"  size="200" maxlength="200" class="form-text">
					</div>
					<div class="shosurbari-biodata-field" id="male-live-with-wife">
						<label for="edit-name">বিয়ের পর স্ত্রীকে নিয়ে কোথায় থাকবেন?<span class="form-required" title="This field is required.">*</span></label>
						<input type="text" id="edit-name" name="livewife_aftermarriage"  value="<?php echo $livewife_aftermarriage; ?>"  size="100" maxlength="100" class="form-text">
					</div>
					<!--Top Male | OR | Bellow Female-->
					<div class="shosurbari-biodata-field" id="female-agree-marriage-student">
						<label for="edit-name">শিক্ষার্থী বিয়ে করতে রাজি আছেন?<span class="form-required" title="This field is required.">*</span></label>
						<input type="text" id="edit-name" name="agree_marriage_student"   value="<?php echo $agree_marriage_student; ?>"size="200" maxlength="200" class="form-text">
					</div>
					<div class="shosurbari-biodata-field">
						<label for="edit-name">বায়োডাটা টি যার তার আপনি কে হন?<span class="form-required" title="This field is required.">*</span></label>
						<select name="profileby" required>
							<option hidden selected><?php echo $profileby; ?></option>
							<option value="নিজের জন্য">নিজের জন্য</option>
							<option value="মা">মা</option>
							<option value="বাবা">বাবা</option>
							<option value="ভাই">ভাই</option>
							<option value="বোন/ভাবি">বোন/ভাবি</option>
							<option value="আঙ্কেল">আঙ্কেল</option> 
							<option value="আন্টি">আন্টি</option>
							<option value="দাদা/নানা">দাদা/নানা</option> 
							<option value="দাদী/নানী">দাদী/নানী</option> 
							<option value="শিক্ষক">শিক্ষক</option>
							<option value="বন্ধু/বান্ধবী">বন্ধু/বান্ধবী</option>
						</select>
					</div>
				</div>    
			</div>
			<input type="button" name="previous" class="previous action-button" value="Previous" />			
			<input type="submit" name="update" value="Update">
			<script>
			function toggleGenderSections(selectedGender) {
				var maleallowJobwife = document.getElementById('male-allow-wife-job');
				var femaleJobSection = document.getElementById('female-job-after-marriage');
				var maleallowStudywife = document.getElementById('male-allow-wife-study');
				var femaleStudySection = document.getElementById('female-study-after-marriage');
				var maleliveWithwife = document.getElementById('male-live-with-wife');
				var femaleagreeMarriagestudent = document.getElementById('female-agree-marriage-student');
				var maritalStatusSelect = document.getElementsByName('maritalstatus')[0];
				var optionWidow = maritalStatusSelect.querySelector('option[value="বিধবা"]');
				var optionWidower = maritalStatusSelect.querySelector('option[value="বিপত্নীক"]');
				// Reset the display property for all options before toggling
				optionWidow.style.display = 'block';
				optionWidower.style.display = 'block';
				if (selectedGender === 'পাত্রের বায়োডাটা') {
					maleallowJobwife.style.display = 'block';
					femaleJobSection.style.display = 'none';
					maleallowStudywife.style.display = 'block';
					femaleStudySection.style.display = 'none';
					maleliveWithwife.style.display = 'block';
					femaleagreeMarriagestudent.style.display = 'none';
					// Hide বিধবা option
					optionWidow.style.display = 'none';
				} else if (selectedGender === 'পাত্রীর বায়োডাটা') {
					maleallowJobwife.style.display = 'none';
					femaleJobSection.style.display = 'block';
					maleallowStudywife.style.display = 'none';
					femaleStudySection.style.display = 'block';
					maleliveWithwife.style.display = 'none';
					femaleagreeMarriagestudent.style.display = 'block';
					// Hide বিপত্নীক option
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
				var sonDetailsSection = document.getElementById('son-section');
				var divorceSection = document.getElementById('divorce-section');
				var widowSection = document.getElementById('widow-section');
				var widowerSection = document.getElementById('widower-section');
				var marriedSection = document.getElementById('married-section');
				// Hide all sections initially
				sonDetailsSection.style.display = 'none';
				divorceSection.style.display = 'none';
				widowSection.style.display = 'none';
				widowerSection.style.display = 'none';
				marriedSection.style.display = 'none';
				if (selectedStatus === 'অবিবাহিত') {
					sonDetailsSection.style.display = 'none';
				} else if (selectedStatus === 'ডিভোর্স') {
					divorceSection.style.display = 'block';
					sonDetailsSection.style.display = 'block';
				} else if (selectedStatus === 'বিধবা') {
					widowSection.style.display = 'block';
					sonDetailsSection.style.display = 'block';
				} else if (selectedStatus === 'বিপত্নীক') {
					widowerSection.style.display = 'block';
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
    </form>
</div>
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
<!-- ===== Admin Panel Footer Area ===== -->
<?php include("admin_footer.php"); ?>
<!-- =================================== -->
</body>
</html>