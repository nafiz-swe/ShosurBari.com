<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	education_update($id);
}
if(isloggedin()){
} else{
   header("location:login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Education Update | ShosurBari</title>
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
	<div class="grid_3">
		<div class="container">
			<div class="breadcrumb1">
				<ul>
					<a href="index.php"><i class="fa fa-home home_1"></i></a>
					<span class="divider">&nbsp;|&nbsp;</span>
					<li class="current-page"><h4>Update Education Info</h4></li>
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
	<div class="shosurbari-biodata">
		<form action="" method="POST" id="biodataForm">
			<?php
				include("includes/dbconn.php");

                $sql = "SELECT * FROM 3bd_secondaryedu_method WHERE user_id = $id";
                $result = mysqlexec($sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    // Check if data exists for each field and set variables accordingly
                    $scndry_edu_method = isset($row['scndry_edu_method']) ? $row['scndry_edu_method'] : '';
                    $maxedu_qulfctn = isset($row['maxedu_qulfctn']) ? $row['maxedu_qulfctn'] : '';
                    $gnrl_mdrs_secondary_pass = isset($row['gnrl_mdrs_secondary_pass']) ? $row['gnrl_mdrs_secondary_pass'] : '';
                    $gnrl_mdrs_secondary_pass_year = isset($row['gnrl_mdrs_secondary_pass_year']) ? $row['gnrl_mdrs_secondary_pass_year'] : '';
                    $gnrl_mdrs_secondary_end_year = isset($row['gnrl_mdrs_secondary_end_year']) ? $row['gnrl_mdrs_secondary_end_year'] : '';
                    $gnrlmdrs_secondary_running_std = isset($row['gnrlmdrs_secondary_running_std']) ? $row['gnrlmdrs_secondary_running_std'] : '';
                    // Show or hide fields based on the existence of data
                    $scndryEduMethod = $scndry_edu_method ? 'block' : 'none';
                    $maxeduQulfctn = $maxedu_qulfctn ? 'block' : 'none';
                    $gnrlMdrsSecondaryPass = $gnrl_mdrs_secondary_pass ? 'block' : 'none';
                    $gnrlMdrsSecondaryPassYear = $gnrl_mdrs_secondary_pass_year ? 'block' : 'none';
                    $gnrlMdrsSecondaryEndYear = $gnrl_mdrs_secondary_end_year ? 'block' : 'none';
                    $gnrlmdrsSecondaryRunningStd = $gnrlmdrs_secondary_running_std ? 'block' : 'none';
                }

                $sql = "SELECT * FROM 3bd_kowmi_madrasaedu_method WHERE user_id = $id";
                $result = mysqlexec($sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    // Check if data exists for each field and set variables accordingly
                    $qawmi_madrasa_hafez = isset($row['qawmi_madrasa_hafez']) ? $row['qawmi_madrasa_hafez'] : '';
                    $qawmimadrasa_dawrapass = isset($row['qawmimadrasa_dawrapass']) ? $row['qawmimadrasa_dawrapass'] : '';
                    $kowmi_dawrapas_year = isset($row['kowmi_dawrapas_year']) ? $row['kowmi_dawrapas_year'] : '';
                    $kowmi_current_edu_level = isset($row['kowmi_current_edu_level']) ? $row['kowmi_current_edu_level'] : '';
                    // Show or hide fields based on the existence of data
                    $qawmiMadrasaHafez = $qawmi_madrasa_hafez ? 'block' : 'none';
                    $qawmimadrasaDawrapass = $qawmimadrasa_dawrapass ? 'block' : 'none';
                    $kowmiDawrapasYear = $kowmi_dawrapas_year ? 'block' : 'none';
                    $kowmiCurrentEduLevel = $kowmi_current_edu_level ? 'block' : 'none';
                }



                $sql = "SELECT * FROM 3bd_higher_secondaryedu_method WHERE user_id = $id";
                $result = mysqlexec($sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    // Check if data exists for each field and set variables accordingly
                    $higher_secondary_edu_method = isset($row['higher_secondary_edu_method']) ? $row['higher_secondary_edu_method'] : '';
                    $gnrlmdrs_hrsecondary_pass = isset($row['gnrlmdrs_hrsecondary_pass']) ? $row['gnrlmdrs_hrsecondary_pass'] : '';
                    $gnrlmdrs_hrsecondary_pass_year = isset($row['gnrlmdrs_hrsecondary_pass_year']) ? $row['gnrlmdrs_hrsecondary_pass_year'] : '';
                    $gnrlmdrs_hrsecondary_exam_year = isset($row['gnrlmdrs_hrsecondary_exam_year']) ? $row['gnrlmdrs_hrsecondary_exam_year'] : '';
                    $gnrlmdrs_hrsecondary_group = isset($row['gnrlmdrs_hrsecondary_group']) ? $row['gnrlmdrs_hrsecondary_group'] : '';
                    $gnrlmdrs_hrsecondary_rningstd = isset($row['gnrlmdrs_hrsecondary_rningstd']) ? $row['gnrlmdrs_hrsecondary_rningstd'] : '';
                    $diploma_hrsecondary_pass = isset($row['diploma_hrsecondary_pass']) ? $row['diploma_hrsecondary_pass'] : '';
                    $diploma_hrsecondary_pass_year = isset($row['diploma_hrsecondary_pass_year']) ? $row['diploma_hrsecondary_pass_year'] : '';
                    $diploma_hrsecondary_sub = isset($row['diploma_hrsecondary_sub']) ? $row['diploma_hrsecondary_sub'] : '';
                    $diploma_hrsecondary_endingyear = isset($row['diploma_hrsecondary_endingyear']) ? $row['diploma_hrsecondary_endingyear'] : '';
                    // Show or hide fields based on the existence of data
                    $higherSecondaryEduMethod = $higher_secondary_edu_method ? 'block' : 'none';
                    $gnrlmdrsHrsecondaryPass = $gnrlmdrs_hrsecondary_pass ? 'block' : 'none';
                    $gnrlmdrsHrsecondaryPassYear = $gnrlmdrs_hrsecondary_pass_year ? 'block' : 'none';
                    $gnrlmdrsHrsecondaryExamYear = $gnrlmdrs_hrsecondary_exam_year ? 'block' : 'none';
                    $gnrlmdrsHrsecondaryGroup = $gnrlmdrs_hrsecondary_group ? 'block' : 'none';
                    $gnrlmdrsHrsecondaryRningstd = $gnrlmdrs_hrsecondary_rningstd ? 'block' : 'none';
                    $diplomaHrsecondaryPass = $diploma_hrsecondary_pass ? 'block' : 'none';
                    $diplomaHrsecondaryPassYear = $diploma_hrsecondary_pass_year ? 'block' : 'none';
                    $diplomaHrsecondarySub = $diploma_hrsecondary_sub ? 'block' : 'none';
                    $diplomaHrsecondaryEndingyear = $diploma_hrsecondary_endingyear ? 'block' : 'none';
                }

                $sql = "SELECT * FROM 3bd_universityedu_method WHERE user_id = $id";
                $result = mysqlexec($sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    // Check if data exists for each field and set variables accordingly
                    $varsity_edu_method = isset($row['varsity_edu_method']) ? $row['varsity_edu_method'] : '';
                    $uvarsity_pass = isset($row['uvarsity_pass']) ? $row['uvarsity_pass'] : '';
                    $varsity_passing_year = isset($row['varsity_passing_year']) ? $row['varsity_passing_year'] : '';
                    $university_subject = isset($row['university_subject']) ? $row['university_subject'] : '';
                    $varsity_ending_year = isset($row['varsity_ending_year']) ? $row['varsity_ending_year'] : '';
                    $uvarsity_name = isset($row['uvarsity_name']) ? $row['uvarsity_name'] : '';
                    $others_edu_qualification = isset($row['others_edu_qualification']) ? $row['others_edu_qualification'] : '';
                    // Show or hide fields based on the existence of data
                    $varsityEduMethod = $varsity_edu_method ? 'block' : 'none';
                    $uvarsityPass = $uvarsity_pass ? 'block' : 'none';
                    $varsityPassingYear = $varsity_passing_year ? 'block' : 'none';
                    $universitySubject = $university_subject ? 'block' : 'none';
                    $varsityEndingYear = $varsity_ending_year ? 'block' : 'none';
                    $uvarsityName = $uvarsity_name ? 'block' : 'none';
                }
			?>
			<fieldset>
				<div class="sb-biodata" id="educationalQualifications">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
                        </div>
                    </div>

					<div class="sb-biodata-field">
						<h2>শিক্ষাগত যোগ্যতা</h2>
					</div>

					<div class="sb-biodata-option">
                        <div class="shosurbari-biodata-field" style="display: <?php echo $scndryEduMethod; ?>;">
							<label for="edu-method">মাধ্যমিক/ সমমান কোন মাদ্ধমে পড়েছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="scndry_edu_method" id="secondary_edu_method" required>
                                <option hidden selected><?php echo $scndry_edu_method;?></option>
								<option value="জেনারেল">জেনারেল</option>
								<option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
								<option value="ভোকেশনাল">ভোকেশনাল</option>
								<option value="কওমী মাদ্রাসা">কওমী মাদ্রাসা</option>
								<option value="মাধ্যমিক পড়িনাই">মাধ্যমিক পড়িনাই</option>
								<option value="অন্যান্য">অন্যান্য</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field"  id="maxedu_qualification" style="display: <?php echo $maxeduQulfctn; ?>;">
							<label for="highest_qualification">সর্বোচ্চ শিক্ষাগত যোগ্যতা<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8"  id="maxedu_qualification" name="maxedu_qulfctn" class="form-text-describe"><?php echo $maxedu_qulfctn;?></textarea>
						</div>

						<!-- For Kowmi Madrasa -->
						<div class="shosurbari-biodata-field" id="hafez_field" style="display: <?php echo $qawmiMadrasaHafez; ?>;">
							<label for="hafez">আপনি কি হাফেজ/হাফেজা?<span class="form-required" title="This field is required.">*</span></label>
							<select name="qawmi_madrasa_hafez" id="hafez">
                                <option hidden selected><?php echo $qawmi_madrasa_hafez;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না">না</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="dawra_pass_field" style="display: <?php echo $qawmimadrasaDawrapass; ?>;">
							<label for="dawra_pass">দাওরায়ে হাদিস পাস করেছেন? (মাস্টার্স)<span class="form-required" title="This field is required.">*</span></label>
							<select name="qawmimadrasa_dawrapass" id="dawra_pass">
                                <option hidden selected><?php echo $qawmimadrasa_dawrapass;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
								<option value="না, বাদ দিয়েছি">না, বাদ দিয়েছি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="dawra_passing_year_field" style="display: <?php echo $kowmiDawrapasYear; ?>;">
							<label for="dawra_passing_year">দাওরায়ে হাদিস পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="kowmi_dawrapas_year" id="dawra_passing_year">
                                <option hidden selected><?php echo $kowmi_dawrapas_year;?></option>
								<option></option>
                                <option value="২০২৫">২০২৫</option>
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
							</select>
						</div>
						<div class="shosurbari-biodata-field" id="current_edu_level_field" style="display: <?php echo $kowmiCurrentEduLevel; ?>;">
							<label for="current_edu_level">মাদ্রাসায় বর্তমান অধ্যায়নরত জামাত<span class="form-required" title="This field is required.">*</span></label>
							<select name="kowmi_current_edu_level" id="current_edu_level">
                                <option hidden selected><?php echo $kowmi_current_edu_level;?></option>
								<option></option>
								<option value="জামাতে তাইসীর">জামাতে তাইসীর</option>
								<option value="জামাতে মীযান">জামাতে মীযান</option>
								<option value="জামাতে নাহবেমীর">জামাতে নাহবেমীর</option>
								<option value="জামাতে হেদায়াতুন নাহু">জামাতে হেদায়াতুন নাহু</option>
								<option value="জামাতে কাফিয়া">জামাতে কাফিয়া</option>
								<option value="জামাতে শরহে জামী">জামাতে শরহে জামী</option>
								<option value="জামাতে জালালাইন">জামাতে জালালাইন</option>
								<option value="জামাতে মেশকাত">জামাতে মেশকাত</option>
								<option value="জামাতে তাকমিল">জামাতে তাকমিল</option>
							</select>
						</div>
						<!--Kowmi Madrasa ending -->
		

						<!-- Secondary Education Start -->
						<div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_pass" style="display: <?php echo $gnrlMdrsSecondaryPass; ?>;">
							<label for="secondary_pass">মাধ্যমিক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrl_mdrs_secondary_pass" id="secondary_pass">
                                <option hidden selected><?php echo $gnrl_mdrs_secondary_pass;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, পরীক্ষার্থী">না, পরীক্ষার্থী</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
								<option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_pass_year" style="display: <?php echo $gnrlMdrsSecondaryPassYear; ?>;">
							<label for="gnrl_mdrs_scnd_pass_year">মাধ্যমিক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrl_mdrs_secondary_pass_year" id="gnrl_mdrs_scnd_pass_year">
                                <option hidden selected><?php echo $gnrl_mdrs_secondary_pass_year;?></option>
								<option></option>
                                <option value="২০২৫">২০২৫</option>
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
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_exam_year" style="display: <?php echo $gnrlMdrsSecondaryEndYear; ?>;">
							<label for="gnrl_mdrs_scnd_exam_year">মাধ্যমিক/সমমান বোর্ড পরীক্ষার বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrl_mdrs_secondary_end_year" id="gnrl_mdrs_scnd_exam_year">
                                <option hidden selected><?php echo $gnrl_mdrs_secondary_end_year;?></option>
								<option></option>
								<option value="২০৩৫">২০৩৫</option>
								<option value="২০৩৪">২০৩৪</option>
								<option value="২০৩৩">২০৩৩</option>
								<option value="২০৩২">২০৩২</option>
								<option value="২০৩১">২০৩১</option>
								<option value="২০৩০">২০৩০</option>
								<option value="২০২৯">২০২৯</option>
								<option value="২০২৮">২০২৮</option>
								<option value="২০২৭">২০২৭</option>
								<option value="২০২৬">২০২৬</option>
								<option value="২০২৫">২০২৫</option>
								<option value="২০২৪">২০২৪</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_running_stdn" style="display: <?php echo $gnrlmdrsSecondaryRunningStd; ?>;">
							<label for="gnrl_mdrs_running_stdn">মাধ্যমিক/সমমান বর্তমান অধ্যায়নরত ক্লাস<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="gnrlmdrs_secondary_running_std" id="gnrl_mdrs_running_stdn"  value="<?php echo $gnrlmdrs_secondary_running_std;?>" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="higher_seconday_edumethod" style="display: <?php echo $higherSecondaryEduMethod; ?>;">
							<label for="higherscndry_edumethod">উচ্চমাধ্যমিক/সমমান শিক্ষার মাধ্যম<span class="form-required" title="This field is required.">*</span></label>
							<select name="higher_secondary_edu_method" id="higherscndry_edumethod">
                                <option hidden selected><?php echo $higher_secondary_edu_method;?></option>
								<option></option>
								<option value="জেনারেল">জেনারেল</option>
								<option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
								<option value="ডিপ্লোমা">ডিপ্লোমা</option>
								<option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
								<option value="অন্যান্য">অন্যান্য</option>
							</select>
						</div>
						<!-- Secondary Education End -->


						<!-- Higher Secondary start -->
						<div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_pass" style="display: <?php echo $gnrlmdrsHrsecondaryPass; ?>;">
							<label for="hrsecondary_pass">উচ্চমাধ্যমিক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_pass" id="hrsecondary_pass">
                                <option hidden selected><?php echo $gnrlmdrs_hrsecondary_pass;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, পরীক্ষার্থী">না, পরীক্ষার্থী</option>
								<option value="না, এখনো অধ্যায়নরত">না, এখনো অধ্যায়নরত</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_pass_year" style="display: <?php echo $gnrlmdrsHrsecondaryPassYear; ?>;">
							<label for="edu-method">উচ্চমাধ্যমিক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_pass_year">
                            <option hidden selected><?php echo $gnrlmdrs_hrsecondary_pass_year;?></option>
                            <option></option>
                                <option value="২০২৫">২০২৫</option>
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
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_exam_year" style="display: <?php echo $gnrlmdrsHrsecondaryExamYear; ?>;">
							<label for="edu-method">উচ্চমাধ্যমিক/সমমান বোর্ড পরীক্ষার বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_exam_year">
                                <option hidden selected><?php echo $gnrlmdrs_hrsecondary_exam_year;?></option>
								<option></option>
								<option value="২০৩৫">২০৩৫</option>
								<option value="২০৩৪">২০৩৪</option>
								<option value="২০৩৩">২০৩৩</option>
								<option value="২০৩২">২০৩২</option>
								<option value="২০৩১">২০৩১</option>
								<option value="২০৩০">২০৩০</option>
								<option value="২০২৯">২০২৯</option>
								<option value="২০২৮">২০২৮</option>
								<option value="২০২৭">২০২৭</option>
								<option value="২০২৬">২০২৬</option>
								<option value="২০২৫">২০২৫</option>
								<option value="২০২৪">২০২৪</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="higher_seconday_group" style="display: <?php echo $gnrlmdrsHrsecondaryGroup; ?>;">
							<label for="edu-method">উচ্চমাধ্যমিক/সমমানে গ্রুপ?<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_group">
                                <option hidden selected><?php echo $gnrlmdrs_hrsecondary_group;?></option>
								<option></option>
								<option value="বিজ্ঞান">বিজ্ঞান শাখা</option>
								<option value="মানবিক শাখা">মানবিক শাখা</option>
								<option value="ব্যবসা ও বাণিজ্য শাখা">ব্যবসা ও বাণিজ্য শাখা</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="hrgnrl_mdrs_running_stdn" style="display: <?php echo $gnrlmdrsHrsecondaryRningstd; ?>;">
							<label for="hrgnrl_mdrs_running_stdn">উচ্চমাধ্যমিক/সমমানে বর্তমান অধ্যায়নরত ক্লাস<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="gnrlmdrs_hrsecondary_rningstd" id="hrgnrl_mdrs_running_stdn" value="<?php echo $gnrlmdrs_hrsecondary_rningstd;?>" class="form-text required">
						</div>
						<!--Higher Seconday Education End -->


						<!--Diploma Higher Seconday Start -->
						<div class="shosurbari-biodata-field" id="doploma_hrscnd_pass" style="display: <?php echo $diplomaHrsecondaryPass; ?>;">
							<label for="doploma_hrscdmethod">ডিপ্লোমা পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_pass" id="doploma_hrscdmethod">
                                <option hidden selected><?php echo $diploma_hrsecondary_pass;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="doploma_hrscnd_pass_year" style="display: <?php echo $diplomaHrsecondaryPassYear; ?>;">
							<label for="doploma_hrscnd_pass_year">ডিপ্লোমা পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_pass_year">
                                <option hidden selected><?php echo $diploma_hrsecondary_pass_year;?></option>
								<option></option>
                                <option value="২০২৫">২০২৫</option>
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
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="doploma_hrscnd_subject" style="display: <?php echo $diplomaHrsecondarySub; ?>;">
							<label for="edu-method">ডিপ্লোমায় আপনার সাবজেক্ট<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="diploma_hrsecondary_sub" value="<?php echo $diploma_hrsecondary_sub;?>" id="diploma_secondary_subject" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="doploma_hrscnd_exam_year" style="display: <?php echo $diplomaHrsecondaryEndingyear; ?>;">
							<label for="edu-method">ডিপ্লোমা অধ্যায়ন সম্পন্ন হবে<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_endingyear">
                                <option hidden selected><?php echo $diploma_hrsecondary_endingyear;?></option>
								<option></option>
								<option value="২০৩৫">২০৩৫</option>
								<option value="২০৩৪">২০৩৪</option>
								<option value="২০৩৩">২০৩৩</option>
								<option value="২০৩২">২০৩২</option>
								<option value="২০৩১">২০৩১</option>
								<option value="২০৩০">২০৩০</option>
								<option value="২০২৯">২০২৯</option>
								<option value="২০২৮">২০২৮</option>
								<option value="২০২৭">২০২৭</option>
								<option value="২০২৬">২০২৬</option>
								<option value="২০২৫">২০২৫</option>
								<option value="২০২৪">২০২৪</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="varsity_edumethod" style="display: <?php echo $varsityEduMethod; ?>;">
							<label for="university_edumethod">স্নাতক/সমমান শিক্ষার মাধ্যম<span class="form-required" title="This field is required.">*</span></label>
							<select name="varsity_edu_method" id="university_edumethod">
                                <option hidden selected><?php echo $varsity_edu_method;?></option>
								<option></option>
								<option value="জেনারেল">জেনারেল</option>
								<option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
								<option value="ডিপ্লোমা">ডিপ্লোমা</option>
								<option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
								<option value="অন্যান্য">অন্যান্য</option>
							</select>
						</div>
						<!--Diploma Higher Seconday End -->


						<!-- University Education Start -->
						<div class="shosurbari-biodata-field" id="varsity_pass" style="display: <?php echo $uvarsityPass; ?>;">
							<label for="university_pass">স্নাতক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="uvarsity_pass" id="university_pass">
                                <option hidden selected><?php echo $uvarsity_pass;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="varsity_pass_year" style="display: <?php echo $varsityPassingYear; ?>;">
							<label for="edu-method">স্নাতক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="varsity_passing_year">
                                <option hidden selected><?php echo $varsity_passing_year;?></option>
								<option></option>
                                <option value="২০২৫">২০২৫</option>
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
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="varsity_subject" style="display: <?php echo $universitySubject; ?>;">
							<label for="edu-method">স্নাতক/সমমানে আপনার সাবজেক্ট<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="university_subject" id="varsity_subject"  value="<?php echo $university_subject;?>" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="varsity_exam_year" style="display: <?php echo $varsityEndingYear; ?>;">
							<label for="edu-method">স্নাতক/সমমান অধ্যায়ন সম্পন্ন হবে<span class="form-required" title="This field is required.">*</span></label>
							<select name="varsity_ending_year">
                                <option hidden selected><?php echo $varsity_ending_year;?></option>
								<option></option>
								<option value="২০৩৫">২০৩৫</option>
								<option value="২০৩৪">২০৩৪</option>
								<option value="২০৩৩">২০৩৩</option>
								<option value="২০৩২">২০৩২</option>
								<option value="২০৩১">২০৩১</option>
								<option value="২০৩০">২০৩০</option>
								<option value="২০২৯">২০২৯</option>
								<option value="২০২৮">২০২৮</option>
								<option value="২০২৭">২০২৭</option>
								<option value="২০২৬">২০২৬</option>
								<option value="২০২৫">২০২৫</option>
								<option value="২০২৪">২০২৪</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="varsity_name" style="display: <?php echo $uvarsityName; ?>;">
							<label for="edu-method">স্নাতকে/সমমানে শিক্ষা প্রতিষ্ঠান<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="uvarsity_name" value="<?php echo $uvarsity_name;?>" id="university_name" class="form-text required">
						</div>
						<!-- University Education End -->

						<div class="shosurbari-biodata-field">
							<label for="edu-method">অন্যান্য শিক্ষাগত যোগ্যতা<span style="color: gray; font-size:14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<textarea type="text" rows="8"  name="others_edu_qualification" id="others_edu_qualification" class="form-text-describe"><?php echo $others_edu_qualification;?></textarea>
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


						//start
						var dawraPassField = document.getElementById("dawra_pass_field");
						var dawraPassingYearField = document.getElementById("dawra_passing_year_field");
						var currentEduLevelField = document.getElementById("current_edu_level_field");
						var hafezField = document.getElementById("hafez_field");

						var maxeduQualification = document.getElementById("maxedu_qualification");
						var gnrlMdrsScndPass = document.getElementById("gnrl_mdrs_scnd_pass");
						var gnrlMdrsScndPassYear = document.getElementById("gnrl_mdrs_scnd_pass_year");
						var gnrlMdrsScndExamYear = document.getElementById("gnrl_mdrs_scnd_exam_year");
						var gnrMmdrsRunningStdn = document.getElementById("gnrl_mdrs_running_stdn");

						var higherSecondayEdumethod = document.getElementById("higher_seconday_edumethod");
						var gnrlMdrsHrscndPass = document.getElementById("gnrl_mdrs_hrscnd_pass");
						var gnrlMdrsHrscndPassYear = document.getElementById("gnrl_mdrs_hrscnd_pass_year");
						var gnrlMdrsHrscndExamYear = document.getElementById("gnrl_mdrs_hrscnd_exam_year");
						var higherSecondayGroup = document.getElementById("higher_seconday_group");
						var hrgnrlMdrsRunningStdn = document.getElementById("hrgnrl_mdrs_running_stdn");

						var doplomaHrscndPass = document.getElementById("doploma_hrscnd_pass");
						var doplomaHrscndPassYear = document.getElementById("doploma_hrscnd_pass_year");
						var doplomaHrscndSubject = document.getElementById("doploma_hrscnd_subject");
						var doplomaHrscndExamYear = document.getElementById("doploma_hrscnd_exam_year");
						var varsityEdumethod = document.getElementById("varsity_edumethod");

						var varsityPass = document.getElementById("varsity_pass");
						var varsityPassYear = document.getElementById("varsity_pass_year");
						var varsitySubject = document.getElementById("varsity_subject");
						var varsityExamYear = document.getElementById("varsity_exam_year");
						var varsityName = document.getElementById("varsity_name");


						// 1
// var inputs = dawraPassField.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = dawraPassField.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 2
// var inputs = dawraPassingYearField.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = dawraPassingYearField.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 3
// var inputs = currentEduLevelField.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = currentEduLevelField.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 4
// var inputs = hafezField.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = hafezField.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 5
// var inputs = maxeduQualification.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = maxeduQualification.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}


// 6
// var inputs = gnrlMdrsScndPass.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = gnrlMdrsScndPass.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 7
// var inputs = gnrlMdrsScndPassYear.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = gnrlMdrsScndPassYear.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 8
// var inputs = gnrlMdrsScndExamYear.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = gnrlMdrsScndExamYear.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 9
// var inputs = gnrMmdrsRunningStdn.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = gnrMmdrsRunningStdn.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 10
// var inputs = higherSecondayEdumethod.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = higherSecondayEdumethod.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}


// 11
// var inputs = gnrlMdrsHrscndPass.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = gnrlMdrsHrscndPass.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 12
// var inputs = gnrlMdrsHrscndPassYear.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = gnrlMdrsHrscndPassYear.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 13
// var inputs = gnrlMdrsHrscndExamYear.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = gnrlMdrsHrscndExamYear.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 14
// var inputs = higherSecondayGroup.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = higherSecondayGroup.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 15
// var inputs = hrgnrlMdrsRunningStdn.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = hrgnrlMdrsRunningStdn.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}


// 16
// var inputs = doplomaHrscndPass.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = doplomaHrscndPass.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 17
// var inputs = doplomaHrscndPassYear.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = doplomaHrscndPassYear.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 18
// var inputs = doplomaHrscndSubject.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = doplomaHrscndSubject.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 19
// var inputs = doplomaHrscndExamYear.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = doplomaHrscndExamYear.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 20
// var inputs = varsityEdumethod.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = varsityEdumethod.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 21
// var inputs = varsityPass.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = varsityPass.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 22
// var inputs = varsityPassYear.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = varsityPassYear.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}


// 23
// var inputs = varsitySubject.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = varsitySubject.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 24
// var inputs = varsityExamYear.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = varsityExamYear.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

// 25
// var inputs = varsityName.getElementsByTagName("input");
// for (var j = 0; j < inputs.length; j++) {
// inputs[j].value = ""; 
// }
var selects = varsityName.getElementsByTagName("select");
for (var k = 0; k < selects.length; k++) {
selects[k].selectedIndex = 0; 
}

						// Show or hide sections based on the selected value
						if (selectedValue === "কওমী মাদ্রাসা") {
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
				<button type="submit" id="edit-submit" name="op" class="biodata-submit"><span></span> আপডেট করুন</button>			
			</fieldset>
		</form>
	</div>
	<!--=======================================
	How Many Visitors View This Page.
	This Script Connected to get_view_count.php
	and page_views Database Table
	========================================-->
	<script>
		$(document).ready(function() {
		var pages = ["update-education"];
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
			$('html, body').animate({ scrollTop: $('#progressbar').offset().top }, 800);
		});
		$(".previous").click(function() {
			current_fs = $(this).closest("fieldset");
			previous_fs = current_fs.prev("fieldset");
			previous_fs.show();
			current_fs.hide();
			$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
			$('html, body').animate({ scrollTop: $('#progressbar').offset().top }, 800);
		});
		function validateFields(current_fs) {
			var isValid = true;
			var inputs = current_fs.find(":input[required]");
			current_fs.find(".error-message-empty").remove();
			inputs.each(function() {
				if ($(this).val().trim() === "") {
				$(this).addClass("error"); 
				isValid = false;
				var errorMessage = "<span class='error-message-empty'>This field is required.</span>";
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