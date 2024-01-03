<?php 
include_once("includes/basic_includes.php");
include_once("functions.php"); 
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	physical_marital_update($id);
}
if(isloggedin()){
} else{
   header("location:login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Physical & Marital Update | ShosurBari</title>
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
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
	<style>
	.sb-biodata-field{
		background: none;
	}
	.sb-biodata-field h2{
		color: #000;
		font-size: 23px;
		font-weight: bold;
		background: none;
		text-align: left;
	}
	.shosurbari-biodata-form {
		align-items: center;
		flex-wrap: wrap;
		width: 1400px;
		margin: auto;
		padding-top: 30px;
		padding-bottom: 30px
	}
	.soshurbari-animation-icon,
	.shosurbari-animation-form {
		flex-basis: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.soshurbari-animation-icon h3 {
		font-size: 23px;
		font-weight: bold;
		margin-bottom: 15px;
		margin-top: 15px;
	}
	.soshurbari-animation-icon img {
		justify-content: flex-end;
		margin: auto;
		width: 37px;
		height: 35px;
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
	<?php
    session_start();
    if (isset($_SESSION['updateMessage'])) {
        $messageType = ($_SESSION['messageType'] == 'success') ? 'success' : 'error';
        $updateMessage = $_SESSION['updateMessage'];
        echo "<div style='
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: " . ($messageType == 'success' ? '#22c55e' : '#ff0080') . ";
        color: #fff;
        box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
        border: 1px solid rgba(0,0,0,.05);
        border-radius: 2px;
        padding: 10px;
        width: 262px;
        text-align: center;
        z-index: 9999;
        '>$updateMessage
        <button class='cancel-button' style='
        position: absolute;
        cursor: pointer;
        right: 3px;
        margin-right: -20px;
        margin-top: -67px;
        margin-bottom: 15px;
        padding-bottom: 5px;
        line-height: 5px;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 1px solid #ccc;
        font-size: 20px;
        font-weight: 600;
        color: white;
        background: " . ($messageType == 'success' ? '#0aa4ca' : '#0aa4ca') . ";
        ' onclick='this.parentNode.style.display = \"none\";'>x</button>
        </div>";
        unset($_SESSION['updateMessage']);
        unset($_SESSION['messageType']);
    }
    ?>
	<div class="grid_3">
		<div class="container">
			<div class="breadcrumb1">
				<ul>
					<a href="index.php"><i class="fa fa-home home_1"></i></a>
					<span class="divider">&nbsp;|&nbsp;</span>
					<li class="current-page"><h4>Update Physical & Marital</h4></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="sb-home-search">
		<h1>তথ্য পরিবর্তন করুন</h1>
		<div class="sbhome-heart-divider">
		<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
		<span class="grey-line"></span>
		</div>
	</div>
	<div class="shosurbari-biodata">
		<form action="" method="POST" id="biodataForm">
			<ul id="progressbar">
				<li class="active" id="personalPhysical" data-bengali-number="1">শারীরিক</li>
				<li id="MarriageInfo" data-bengali-number="2">বিবাহ-সম্পর্কিত</li>
			</ul>
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			--                S  T  A  R  T                  --
			--      Personal & Physical  / sb-biodata-1      --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<?php
				include("includes/dbconn.php");
				$sql="SELECT * FROM 1bd_personal_physical WHERE user_id = $id";
				$result = mysqlexec($sql);
				if($result){
				$row=mysqli_fetch_assoc($result);
				$biodatagender = isset($row['biodatagender']) ? $row['biodatagender'] : '';
				$day = isset($row['dateofbirth']) ? $row['dateofbirth'] : '';
				$month = isset($row['dateofbirth']) ? $row['dateofbirth'] : '';
				$year = isset($row['dateofbirth']) ? $row['dateofbirth'] : '';
				$height = isset($row['height']) ? $row['height'] : '';
				$weight = isset($row['weight']) ? $row['weight'] : '';
				$Skin_tones = isset($row['Skin_tones']) ? $row['Skin_tones'] : '';
				$bloodgroup = isset($row['bloodgroup']) ? $row['bloodgroup'] : '';
				$physicalstatus = isset($row['physicalstatus']) ? $row['physicalstatus'] : '';
				$Displaybiodatagender = $biodatagender ? 'block' : 'none';

				}
			?>
			<fieldset>
				<div class="sb-biodata" id="personalPhysical">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
                        </div>
                    </div>
					<div class="sb-biodata-field">
						<h2>শারীরিক বিষয়াবলি</h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field" style="display: <?php echo $Displaybiodatagender; ?>;">
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
								<option value="১৯৭৪">১৯৭৪</option>
								<option value="১৯৭৩">১৯৭৩</option>
								<option value="১৯৭২">১৯৭২</option>
								<option value="১৯৭১">১৯৭১</option>
								<option value="১৯৭০">১৯৭০</option>
								<option value="১৯৬৯">১৯৬৯</option>
								<option value="১৯৬৮">১৯৬৮</option>
								<option value="১৯৬৭">১৯৬৭</option>
								<option value="১৯৬৬">১৯৬৬</option>
								<option value="১৯৬৫">১৯৬৫</option>
								<option value="১৯৬৪">১৯৬৪</option>
								<option value="১৯৬৩">১৯৬৩</option>
								<option value="১৯৬২">১৯৬২</option>
								<option value="১৯৬১">১৯৬১</option>
								<option value="১৯৬০">১৯৬০</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">গাত্র বর্ণ<span class="form-required" title="This field is required.">*</span></label>
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
							<label for="edit-name">উচ্চতা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="height" value="<?php echo $height; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">ওজন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="weight" value="<?php echo $weight; ?>" class="form-text" required>
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
							<label for="edit-name">শারীরিক-মানসিক কোনো সমস্যা/রোগ আছে কি?<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="8" id="edit-name" name="physicalstatus" placeholder="" class="form-text-describe" required><?php echo $physicalstatus; ?></textarea>
						</div>
					</div>
				</div>
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
			</fieldset>
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			--                   E   N   D                   --
			--       Personal & Physical  / sb-biodata-1     --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<!-- End & Start -->
            <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			--                S  T  A  R  T                  --
			--			  Marriage related Info				 --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
			<?php
				include("includes/dbconn.php");
				// 6bd_7bd_marital_status
				$sql="SELECT * FROM 6bd_7bd_marital_status WHERE user_id = $id";
				$result = mysqlexec($sql);
				if($result){
					$row=mysqli_fetch_assoc($result);
					$maritalstatus = isset($row['maritalstatus']) ? $row['maritalstatus'] : '';
					$agree_marriage_other_religion = isset($row['agree_marriage_other_religion']) ? $row['agree_marriage_other_religion'] : '';
					$divorce_reason = isset($row['divorce_reason']) ? $row['divorce_reason'] : '';
					$how_widow = isset($row['how_widow']) ? $row['how_widow'] : '';
					$how_widower = isset($row['how_widower']) ? $row['how_widower'] : '';
					$how_many_son = isset($row['how_many_son']) ? $row['how_many_son'] : '';
					$son_details = isset($row['son_details']) ? $row['son_details'] : '';
					$get_wife_permission = isset($row['get_wife_permission']) ? $row['get_wife_permission'] : '';
					$get_family_permission = isset($row['get_family_permission']) ? $row['get_family_permission'] : '';
					$why_again_married = isset($row['why_again_married']) ? $row['why_again_married'] : '';
					// Show or hide fields based on the existence of data
					$displayMaritalstatus = $maritalstatus ? 'block' : 'none';
					$divorceReason = $divorce_reason ? 'block' : 'none';
					$howWidow = $how_widow ? 'block' : 'none';
					$howWidower = $how_widower ? 'block' : 'none';
					$howManySon = $how_many_son ? 'block' : 'none';
					$DisplaysonDetails = $son_details ? 'block' : 'none';
					$getWifePermission = $get_wife_permission ? 'block' : 'none';
				}
				//6bd_marriage_related_qs_male;
				$sql="SELECT * FROM 6bd_marriage_related_qs_male WHERE user_id = $id";
				$result = mysqlexec($sql);
				if($result){
					$row=mysqli_fetch_assoc($result);
					$allowstudy_aftermarriage = isset($row['allowstudy_aftermarriage']) ? $row['allowstudy_aftermarriage'] : '';
					$allowjob_aftermarriage = isset($row['allowjob_aftermarriage']) ? $row['allowjob_aftermarriage'] : '';
					$livewife_aftermarriage = isset($row['livewife_aftermarriage']) ? $row['livewife_aftermarriage'] : '';
					$profileby = isset($row['profileby']) ? $row['profileby'] : '';
					// Show or hide fields based on the existence of data
					$allowstudyAftermarriage = $allowstudy_aftermarriage ? 'block' : 'none';
					$allowjobAftermarriage = $allowjob_aftermarriage ? 'block' : 'none';
					$livewifeAftermarriage = $livewife_aftermarriage ? 'block' : 'none';
				}
				//7bd_marriage_related_qs_female;
				$sql="SELECT * FROM 7bd_marriage_related_qs_female WHERE user_id = $id";
				$result = mysqlexec($sql);
				if($result){
					$row=mysqli_fetch_assoc($result);
					$anyjob_aftermarriage = isset($row['anyjob_aftermarriage']) ? $row['anyjob_aftermarriage'] : '';
					$studies_aftermarriage = isset($row['studies_aftermarriage']) ? $row['studies_aftermarriage'] : '';
					$agree_marriage_student = isset($row['agree_marriage_student']) ? $row['agree_marriage_student'] : '';
					$profileby = isset($row['profileby']) ? $row['profileby'] : '';
					// Show or hide fields based on the existence of data
					$anyjobAftermarriage = $anyjob_aftermarriage ? 'block' : 'none';
					$studiesAftermarriage = $studies_aftermarriage ? 'block' : 'none';
					$agreeMarriageStudent = $agree_marriage_student ? 'block' : 'none';
				}
			?>
			<fieldset>
				<div class="sb-biodata" id="maleMarriageInfo">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
                        </div>
                    </div>
					<div class="sb-biodata-field">
						<h2>বিবাহ সম্পর্কিত তথ্য</h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field" style="display: <?php echo $displayMaritalstatus; ?>;">
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
						<div class="shosurbari-biodata-field" id="divorce-section" style="display: <?php echo $divorceReason; ?>;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">ডিভোর্সের কারণ বর্ণনা করুন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea type="text" rows="8" name="divorce_reason" class="form-text-describe"><?php echo $divorce_reason; ?></textarea>
							</div>
						</div>
						<!-- Divorce Section End -->
						<!-- Widow Section Start-->
						<div class="shosurbari-biodata-field" id="widow-section" style="display: <?php echo $howWidow; ?>;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">স্বামী যেভাবে মারা গেছে এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
								<textarea type="text"  rows="8" name="how_widow"  class="form-text-describe"><?php echo $how_widow; ?></textarea>
							</div>
						</div>
						<!-- Widow Section End-->
						<!-- Widower Section Start-->
						<div class="shosurbari-biodata-field" id="widower-section" style="display: <?php echo $howWidower; ?>;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">স্ত্রী যেভাবে মারা গেছে এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
								<textarea type="text" rows="8" name="how_widower" class="form-text-describe"><?php echo $how_widower; ?></textarea>
							</div>
						</div>
						<!-- Widower Section End-->
						<!-- Married Section Start-->
						<div class="shosurbari-biodata-field" id="married-section" style="display: <?php echo $getWifePermission; ?>;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">বর্তমান স্ত্রীর অনুমতি নিয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
								<input type="text" id="edit-name" name="get_wife_permission"  value="<?php echo $get_wife_permission; ?>" class="form-text">
							</div>

							<div class="shosurbari-biodata-field">
								<label for="edit-name">বর্তমান স্ত্রীর পরিবার থেকে অনুমতি নিয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
								<input type="text" id="edit-name" name="get_family_permission"  value="<?php echo $get_family_permission; ?>" class="form-text">
							</div>

							<div class="shosurbari-biodata-field" >
								<label for="edit-name">আবার বিয়ে করার কারণ<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
								<textarea rows="5" name="why_again_married" class="form-text-describe"><?php echo $why_again_married; ?></textarea>
							</div>
						</div>
						<!-- Married Section End-->
						<!-- This Sections For Divorce + Widow + Widower + Married Start-->
						<div class="shosurbari-biodata-field" id="son-section" style="display: <?php echo $howManySon; ?>;">
							<div class="shosurbari-biodata-field" id="how-many-son">
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
							<div class="shosurbari-biodata-field" id="son-details" style="display: <?php echo $DisplaysonDetails; ?>;">
							<label for="edit-name">সন্তান সম্পর্কিত তথ্য<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
								<textarea rows="5" name="son_details" class="form-text-describe"><?php echo $son_details; ?></textarea>
							</div>
						</div>
						<!-- This Sections For Divorce + Widow + Widower + Married End-->
						<!-- Bellow Two Sections For Male or Female -->
						<div class="shosurbari-biodata-field" id="male-allow-wife-job" style="display: <?php echo $allowjobAftermarriage; ?>;">
						<label for="edit-name">বিয়ের পর স্ত্রীকে চাকরি করতে দিতে ইচ্ছুক?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="allowjob_aftermarriage"  value="<?php echo $allowjob_aftermarriage; ?>" class="form-text">
						</div>
						<!--Top Male | & | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-job-after-marriage" style="display: <?php echo $anyjobAftermarriage; ?>;">
						<label for="edit-name">বিয়ের পর চাকরি করতে চান?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="anyjob_aftermarriage" value="<?php echo $anyjob_aftermarriage; ?>" class="form-text">
						</div>
						<div class="shosurbari-biodata-field" id="male-allow-wife-study" style="display: <?php echo $allowstudyAftermarriage; ?>;">
						<label for="edit-name">বিয়ের পর স্ত্রীকে প্রাতিষ্ঠানিক পড়ালেখা করতে দিতে ইচ্ছুক?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="allowstudy_aftermarriage" value="<?php echo $allowstudy_aftermarriage; ?>" class="form-text">
						</div>
						<!--Top Male | & | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-study-after-marriage" style="display: <?php echo $studiesAftermarriage; ?>;">
						<label for="edit-name">বিয়ের পর পড়াশোনা চালিয়ে যেতে চান?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="studies_aftermarriage"   value="<?php echo $studies_aftermarriage; ?>" class="form-text">
						</div>
						<div class="shosurbari-biodata-field" id="male-live-with-wife" style="display: <?php echo $livewifeAftermarriage; ?>;">
						<label for="edit-name">বিয়ের পর স্ত্রীকে নিয়ে কোথায় থাকবেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="livewife_aftermarriage"  value="<?php echo $livewife_aftermarriage; ?>" class="form-text">
						</div>
						<!--Top Male | & | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-agree-marriage-student" style="display: <?php echo $agreeMarriageStudent; ?>;">
						<label for="edit-name">শিক্ষার্থী বিয়ে করতে রাজি আছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="agree_marriage_student"   value="<?php echo $agree_marriage_student; ?>" class="form-text">
						</div>
						<div class="shosurbari-biodata-field">
						<label for="edit-name">অন্য ধর্মের অনুসারী যে কাওকে বিয়ে করতে রাজি হবেন যদি সে আপনার ধর্ম গ্রহণ করে?<span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<input type="text" id="edit-name" name="agree_marriage_other_religion"   value="<?php echo $agree_marriage_other_religion; ?>" class="form-text">
						</div>
						<div class="shosurbari-biodata-field">
						<label for="edit-name">বায়োডাটা টি যার তার আপনি কে হন?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
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
				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<button type="submit" id="edit-submit" name="op" class="biodata-submit"><span></span> আপডেট করুন</button>			
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
						var optionMarriade = maritalStatusSelect.querySelector('option[value="বিবাহিত"]');
						// Reset the display property for all options before toggling
						optionWidow.style.display = 'block';
						optionWidower.style.display = 'block';
						optionMarriade.style.display = 'block';
						if (selectedGender === 'পাত্রের বায়োডাটা') {
							maleallowJobwife.style.display = 'block';
							femaleJobSection.style.display = 'none';
							maleallowStudywife.style.display = 'block';
							femaleStudySection.style.display = 'none';
							maleliveWithwife.style.display = 'block';
							femaleagreeMarriagestudent.style.display = 'none';
							optionWidow.style.display = 'none'; // Hide বিধবা option
						} else if (selectedGender === 'পাত্রীর বায়োডাটা') {
							maleallowJobwife.style.display = 'none';
							femaleJobSection.style.display = 'block';
							maleallowStudywife.style.display = 'none';
							femaleStudySection.style.display = 'block';
							maleliveWithwife.style.display = 'none';
							femaleagreeMarriagestudent.style.display = 'block';
							optionWidower.style.display = 'none'; // Hide বিপত্নীক option
							optionMarriade.style.display = 'none'; // Hide বিবাহিত option
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
						//1
						var selects = sonDetailsSection.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
						var textarea = sonDetailsSection.getElementsByTagName("textarea");
						for (var l = 0; l < textarea.length; l++) {
							textarea[l].value = ""; 
						}
						//2
						var textarea = divorceSection.getElementsByTagName("textarea");
						for (var l = 0; l < textarea.length; l++) {
							textarea[l].value = ""; 
						}
						//3
						var textarea = widowSection.getElementsByTagName("textarea");
						for (var l = 0; l < textarea.length; l++) {
							textarea[l].value = ""; 
						}
						//4
						var textarea = widowerSection.getElementsByTagName("textarea");
						for (var l = 0; l < textarea.length; l++) {
							textarea[l].value = ""; 
						}
						//5
						var inputs = marriedSection.getElementsByTagName("input");
						for (var j = 0; j < inputs.length; j++) {
						inputs[j].value = ""; 
						}
						var textarea = marriedSection.getElementsByTagName("textarea");
						for (var l = 0; l < textarea.length; l++) {
							textarea[l].value = ""; 
						}
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
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			--                   E   N   D                   --
			--   Male Marriage related Info / sb-biodata-6   --
			--  Female Marriage related Info / sb-biodata-7  --
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
		var pages = ["update-physical-marital"];
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
	<script>
		var current_fs, next_fs, previous_fs;
		$(".next").click(function() {
			current_fs = $(this).closest("fieldset");
			next_fs = current_fs.next("fieldset");
			if (!validateFields(current_fs)) {
				return;
			}
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
			next_fs.show();
			current_fs.hide();
			var progressBarHeight = $('#progressbar').outerHeight();
			var windowHeight = $(window).height();
			var marginTop = (windowHeight - progressBarHeight) / 15;
			var topMargin = 50;
			$('html, body').animate({ scrollTop: $('#progressbar').offset().top - marginTop - topMargin }, 800);
		});
		$(".previous").click(function() {
			current_fs = $(this).closest("fieldset");
			previous_fs = current_fs.prev("fieldset");
			previous_fs.show();
			current_fs.hide();
			$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
			var progressBarHeight = $('#progressbar').outerHeight();
			var windowHeight = $(window).height();
			var marginTop = (windowHeight - progressBarHeight) / 15;
			var topMargin = 50;

			$('html, body').animate({ scrollTop: $('#progressbar').offset().top - marginTop - topMargin }, 800);
		});
		function validateFields(current_fs) {
			var isValid = true;
			var inputs = current_fs.find(":input[required]");
			current_fs.find(".error-message-empty").remove();
			inputs.each(function() {
				if ($(this).val().trim() === "") {
				$(this).addClass("error");
				isValid = false;
				var errorMessage = "<span class='error-message-empty'>অপশনটি অবশ্যই পূরণ করতে হবে!</span>";
				$(this).after(errorMessage);
				} else {
				$(this).removeClass("error");
				}
			});
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
	<!-- jQuery -->
	<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<!-- jQuery easing plugin -->
	<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
	<!--=======  Footer Start ========-->
	<?php include_once("footer.php");?>
	<!--=======  Footer End  =========-->
</body>
</html>
