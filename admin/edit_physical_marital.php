<?php
// Include necessary files and initialize the session
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
?>
<?php
error_reporting(0);
require_once("includes/dbconn.php");
if (!isset($_SESSION['id'])) {
  // Redirect the user to the login page or display an error message
  header("location: ../admin/admin_login.php");
  exit;
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - Update PhysicalMarital | ShosurBari</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
<!-- fa fa icon / logout icon
    ============================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


<!-- ====== Admin Panel Navigation Bar ====== -->
<?php include("admin_navigation.php"); ?>
<!-- ========================================= -->


    <?php
if (isset($_GET['id'])) {
    // Get the user ID from the URL
    $userId = $_GET['id'];

    // Establish a database connection (update these values with your database credentials)
    require_once("includes/dbconn.php");

    // Fetch user data for the specified user ID from the 1bd_personal_physical table
    $sql = "SELECT * FROM 1bd_personal_physical WHERE user_id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Display the user data in input fields/options
        $biodatagender = $row['biodatagender'];
        $day = $row['dateofbirth'];
		$month = $row['dateofbirth'];
		$year = $row['dateofbirth'];
        $height = $row['height'];
        $weight = $row['weight'];
        $physicalstatus = $row['physicalstatus'];
        $Skin_tones = $row['Skin_tones'];
        $bloodgroup = $row['bloodgroup'];

        // Fetch additional user data from the 6bd_7bd_marital_status table
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

        // Fetch additional user data from the 6bd_marriage_related_qs_male table
        $maleSql = "SELECT * FROM 6bd_marriage_related_qs_male WHERE user_id = $userId";
        $maleResult = $conn->query($maleSql);
        if ($maleResult->num_rows == 1) {
            $maleRow = $maleResult->fetch_assoc();
            $guardians_agree = $maleRow['guardians_agree'];
            $allowstudy_aftermarriage = $maleRow['allowstudy_aftermarriage'];
            $allowjob_aftermarriage = $maleRow['allowjob_aftermarriage'];
            $livewife_aftermarriage = $maleRow['livewife_aftermarriage'];
            $profileby = $maleRow['profileby'];
        }

        // Fetch additional user data from the 7bd_marriage_related_qs_female table
        $femaleSql = "SELECT * FROM 7bd_marriage_related_qs_female WHERE user_id = $userId";
        $femaleResult = $conn->query($femaleSql);
        if ($femaleResult->num_rows == 1) {
            $femaleRow = $femaleResult->fetch_assoc();
            $guardians_agree = $femaleRow['guardians_agree'];
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

    // Handle form submission to update user data
    if (isset($_POST['update'])) {
        // Retrieve the updated data from the form
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

        $maritalstatus = $conn->real_escape_string($_POST['maritalstatus']);
        $divorce_reason = $conn->real_escape_string($_POST['divorce_reason']);
        $how_widow = $conn->real_escape_string($_POST['how_widow']);
        $how_widower = $conn->real_escape_string($_POST['how_widower']);
        $how_many_son = $conn->real_escape_string($_POST['how_many_son']);
        $son_details = $conn->real_escape_string($_POST['son_details']);
        $get_wife_permission = $conn->real_escape_string($_POST['get_wife_permission']);
        $get_family_permission = $conn->real_escape_string($_POST['get_family_permission']);
        $why_again_married = $conn->real_escape_string($_POST['why_again_married']);

        $guardians_agree = $conn->real_escape_string($_POST['guardians_agree']);
        $allowstudy_aftermarriage = $conn->real_escape_string($_POST['allowstudy_aftermarriage']);
        $allowjob_aftermarriage = $conn->real_escape_string($_POST['allowjob_aftermarriage']);
        $livewife_aftermarriage = $conn->real_escape_string($_POST['livewife_aftermarriage']);
        $profileby = $conn->real_escape_string($_POST['profileby']);

        $guardians_agree = $conn->real_escape_string($_POST['guardians_agree']);
        $anyjob_aftermarriage = $conn->real_escape_string($_POST['anyjob_aftermarriage']);
        $studies_aftermarriage = $conn->real_escape_string($_POST['studies_aftermarriage']);
        $agree_marriage_student = $conn->real_escape_string($_POST['agree_marriage_student']);
        $profileby = $conn->real_escape_string($_POST['profileby']);

        // Update the user's education data in the database
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
            guardians_agree = '$guardians_agree',
            allowstudy_aftermarriage = '$allowstudy_aftermarriage',
            allowjob_aftermarriage = '$allowjob_aftermarriage',
            livewife_aftermarriage = '$livewife_aftermarriage',
            profileby = '$profileby'
            WHERE user_id = $userId";

        $updateFemaleSql = "UPDATE 7bd_marriage_related_qs_female SET
            guardians_agree = '$guardians_agree',
            anyjob_aftermarriage = '$anyjob_aftermarriage',
            studies_aftermarriage = '$studies_aftermarriage',
            agree_marriage_student = '$agree_marriage_student',
            profileby = '$profileby'
            WHERE user_id = $userId";

        // Perform the updates
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

    // Close the database connection
    $conn->close();
} else {
    echo 'User ID not provided.';
}
?>






<div class="shosurbari-biodata">
    <!-- multistep form -->
    <form action="" method="POST" id="biodataForm">
            <!-- progressbar -->
			<ul id="progressbar">
				<li class="active" id="personalPhysical">শারীরিক</li>
				<li id="MarriageInfo">বিবাহ-সম্পর্কিত</li>
			</ul>

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
							<label for="edit-pass">জন্ম তারিখ<span class="form-required" title="This field is required.">*</span></label>
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
							<label for="edit-pass">জন্ম তারিখ<span class="form-required" title="This field is required.">*</span></label>
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
							<input type="text" id="edit-name" name="height" value="<?php echo $height; ?>" size="100" maxlength="100" class="form-text" placeholder="Please enter your height" required>
						</div>

					
						<div class="shosurbari-biodata-field">
							<label for="edit-name">ওজন <span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="weight" value="<?php echo $weight; ?>" size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">শারীরিক সমস্যা আছে কি?<span class="form-required" title="This field is required.">*</span></label>
							<select name="physicalstatus" required>
								<option hidden selected><?php echo $physicalstatus; ?></option>
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
			--   Male Marriage related Info / sb-biodata-6   --
			--  Female Marriage related Info / sb-biodata-7  --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->


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
								<option hidden selected><?php echo $maritalstatus; ?></option>
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
								<input type="text" id="edit-name" name="guardians_agree"  value="<?php echo $guardians_agree; ?>"  size="100" maxlength="100" class="form-text">
							</div>
						</div>

						<!-- Divorce Section Start -->
						<div class="shosurbari-biodata-field" id="divorce-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">ডিভোর্সের কারণ বর্ণনা করুন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea rows="5" name="divorce_reason" value="<?php echo $divorce_reason; ?>" placeholder="Describe Your Divorce Reason" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Divorce Section End -->


						<!-- Widow Section Start-->
						<div class="shosurbari-biodata-field" id="widow-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">স্বামী যেভাবে মারা গেছেন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea rows="5" name="how_widow" value="<?php echo $how_widow; ?>" placeholder="Describe How You Became a Widow" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Widow Section End-->


						<!-- Widower Section Start-->
						<div class="shosurbari-biodata-field" id="widower-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">স্ত্রী যেভাবে মারা গেছেন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea rows="5" name="how_widower" value="<?php echo $how_widower; ?>" placeholder="Describe How You Became a Widower" class="form-text-describe"></textarea>
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
								<textarea rows="5" name="why_again_married" value="<?php echo $why_again_married; ?>" placeholder="Describe How You Became a Widower" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Married Section End-->


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
								<textarea rows="5" name="son_details"  value="<?php echo $son_details; ?>" placeholder="Describe Your Son Details" class="form-text-describe"></textarea>
							</div>
						</div>


						<!-- Bellow Two Sections For Male or Female -->
						<div class="shosurbari-biodata-field" id="male-allow-wife-job">
							<label for="edit-name">স্ত্রীকে চাকরি করতে দিতে ইচ্ছুক?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="allowjob_aftermarriage"  value="<?php echo $allowjob_aftermarriage; ?>"  size="100" maxlength="100" class="form-text">
						</div>
						<!--Top Male | OR | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-job-after-marriage">
							<label for="edit-name">বিয়ের পর চাকরি করতে চান?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="anyjob_aftermarriage" value="<?php echo $anyjob_aftermarriage; ?>" size="100" maxlength="100" class="form-text">
						</div>

						<div class="shosurbari-biodata-field" id="male-allow-wife-study">
							<label for="edit-name">স্ত্রীকে প্রাতিষ্ঠানিক পড়ালেখা করতে দিতে ইচ্ছুক?<span class="form-required" title="This field is required.">*</span></label>
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
							<label for="edit-name">বায়োডাটা টি যার জন্য পোস্ট করতেছেন, তার আপনি কে হন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="profileby" required>
								<option hidden selected><?php echo $profileby; ?></option>
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
                <input type="submit" name="update" value="Update">
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

<style>
.sb-biodata { /*Table body design & width*/
    border: 1px solid #ccc;
    border-radius: 6px;
    width: 400px;
    gap: 1.5rem;
    padding: 20px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 40px;
    margin-top: 100px;
    background: white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

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
    /* margin-left: auto;
    margin-right: auto;
    display: block; */
}

html, body { /* Monitor Navigation Bar top Padding 0px */
    padding-top: 0px;
}

fieldset {
	margin-bottom: 100px;
}
</style>


    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.orderBars.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  Chat JS
		============================================ -->
	<script src="js/chat/moment.min.js"></script>
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
</body>

</html>

