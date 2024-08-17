<?php 
include_once("includes/basic_includes.php");
include_once("functions.php");
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	personal_info_update($id);
}
if(isloggedin()){
} else{
   header("location:login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Personal Info Update | ShosurBari</title>
<meta name="description" content="Elevate your ShosurBari presence with the Biodata Update Page. Seamlessly refine and enhance your profile, share new chapters of your life, and stay connected with potential life partners.">
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
<link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
	<style>
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
    if (isset($_SESSION['updateMessage'])) {
        $messageType = ($_SESSION['messageType'] == 'success') ? 'success' : 'error';
        $updateMessage = $_SESSION['updateMessage'];
        echo "<div id='updateMessage' style='
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: " . ($messageType == 'success' ? '#22c55e' : '#ffddee') . ";
            color: " . ($messageType == 'success' ? '#fff' : 'red') . ";
            box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
            border: 1px solid rgba(0,0,0,.05);
            border-radius: 2px;
            padding: 10px;
            width: 263px;
            text-align: center;
            z-index: 9999;
        '>$updateMessage</div>";
        //auto-hide the message after 7 seconds
        echo "<script>
                setTimeout(function() {
                    var updateMessage = document.getElementById('updateMessage');
                    if (updateMessage) {
                        updateMessage.style.display = 'none';
                    }
                }, 7000);
            </script>";
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
					<li class="current-page"><h4>Update Personal Info</h4></li>
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
	<div class="sb-choice-list-notice">
      <p>একই অপশন যদি একাধিকবার ভিন্ন-ভিন্ন তথ্যে আপডেট হয়ে যায়, সেক্ষেত্রে যেই তথ্য প্রয়োজনীয় নয় সেই অপশনের তথ্য রিমুভ/ফাঁকা অপশন সিলেক্ট করে প্রয়োজনীয় তথ্যগুলো ঠিক রেখে পুনরায় আপডেট করুন।</p>
	</div>
	<div class="shosurbari-biodata">
		<form action="" method="POST" id="biodataForm">
		<?php
			include("includes/dbconn.php");
			$sql = "SELECT * FROM 2bd_personal_lifestyle WHERE user_id = $id";
			$result = mysqlexec($sql);
			if ($result) {
				$row = mysqli_fetch_assoc($result);
				// Check if data exists for each field and set variables accordingly
				$smoke = isset($row['smoke']) ? $row['smoke'] : '';
				$occupation_sector = isset($row['occupation_sector']) ? $row['occupation_sector'] : '';
				$no_occupation = isset($row['no_occupation']) ? $row['no_occupation'] : '';
				$other_occupation_sector = isset($row['other_occupation_sector']) ? $row['other_occupation_sector'] : '';
				$business_occupation_level = isset($row['business_occupation_level']) ? $row['business_occupation_level'] : '';
				$student_occupation_level = isset($row['student_occupation_level']) ? $row['student_occupation_level'] : '';
				$health_occupation_level = isset($row['health_occupation_level']) ? $row['health_occupation_level'] : '';
				$engineer_occupation_level = isset($row['engineer_occupation_level']) ? $row['engineer_occupation_level'] : '';
				$teacher_occupation_level = isset($row['teacher_occupation_level']) ? $row['teacher_occupation_level'] : '';
				$defense_occupation_level = isset($row['defense_occupation_level']) ? $row['defense_occupation_level'] : '';
				$foreigner_occupation_level = isset($row['foreigner_occupation_level']) ? $row['foreigner_occupation_level'] : '';
				$garments_occupation_level = isset($row['garments_occupation_level']) ? $row['garments_occupation_level'] : '';
				$driver_occupation_level = isset($row['driver_occupation_level']) ? $row['driver_occupation_level'] : '';
				$service_andcommon_occupation_level = isset($row['service_andcommon_occupation_level']) ? $row['service_andcommon_occupation_level'] : '';
				$mistri_occupation_level = isset($row['mistri_occupation_level']) ? $row['mistri_occupation_level'] : '';
				$occupation_describe = isset($row['occupation_describe']) ? $row['occupation_describe'] : '';
				$dress_code = isset($row['dress_code']) ? $row['dress_code'] : '';
				$aboutme = isset($row['aboutme']) ? $row['aboutme'] : '';
				$groom_bride_name = isset($row['groom_bride_name']) ? $row['groom_bride_name'] : '';
				$groom_bride_number = isset($row['groom_bride_number']) ? $row['groom_bride_number'] : '';
				$groom_bride_family_number = isset($row['groom_bride_family_number']) ? $row['groom_bride_family_number'] : '';
				$family_member_name_relation = isset($row['family_member_name_relation']) ? $row['family_member_name_relation'] : '';
				// Show or hide fields based on the existence of data
				$occupationSector = $occupation_sector ? 'block' : 'none';
				$noOccupation = $no_occupation ? 'block' : 'none';
				$otherOccupationSector = $other_occupation_sector ? 'block' : 'none';
				$businessOccupationLevel = $business_occupation_level ? 'block' : 'none';
				$studentOccupationLevel = $student_occupation_level ? 'block' : 'none';
				$healthOccupationLevel = $health_occupation_level ? 'block' : 'none';
				$engineerOccupationLevel = $engineer_occupation_level ? 'block' : 'none';
				$teacherOccupationLevel = $teacher_occupation_level ? 'block' : 'none';
				$defenseOccupationLevel = $defense_occupation_level ? 'block' : 'none';
				$foreignerOccupationLevel = $foreigner_occupation_level ? 'block' : 'none';
				$garmentsOccupationLevel = $garments_occupation_level ? 'block' : 'none';
				$driverOccupationLevel = $driver_occupation_level ? 'block' : 'none';
				$serviceAndcommonOccupationLevel = $service_andcommon_occupation_level ? 'block' : 'none';
				$mistriOccupationLevel = $mistri_occupation_level ? 'block' : 'none';
				$occupationDescribe = $occupation_describe ? 'block' : 'none';
			}
			?>
			<fieldset>
				<div class="sb-biodata" id="personalLife">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-logo-form.png"></h3>
                        </div>
                    </div>
					<div class="sb-biodata-field">
						<h2>ব্যক্তিগত তথ্য</h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>ধূমপান করা হয়?<span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<select name="smoke">
								<option hidden selected><?php echo $smoke;?></option>
								<option></option>
								<option value="না">না</option>
								<option value="হ্যাঁ">হ্যাঁ</option> 
								<option value="মাঝে মাঝে করা হয়">মাঝে মাঝে করা হয়</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field" style="display: <?php echo $occupationSector; ?>;">
							<label for="occupation_sector">পেশা<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (এই অপশনটি প্রকাশিত না হয়ে এর সাব ক্যাটাগরি প্রকাশিত হবে, যেকোনো একটি পেশা সিলেক্ট করলেই পেশা অনুযায়ী সাব ক্যাটাগরি দেখতে পাবেন।)</span></label>
							<select name="occupation_sector" required onchange="showOccupationSector(this.value)">
								<option hidden selected><?php echo $occupation_sector;?></option>
								<option value="ব্যবসায়ী">ব্যবসায়ী</option>
								<option value="শিক্ষার্থী">শিক্ষার্থী</option>
								<option value="ইঞ্জিনিয়ার">ইঞ্জিনিয়ার</option>
								<option value="ডাক্তার/চিকিৎসা/স্বাস্থ্য">ডাক্তার/চিকিৎসা/স্বাস্থ্য</option>
								<option value="শিক্ষক/প্রফেসর">শিক্ষক/প্রফেসর</option>
								<option value="গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী">গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী</option>
								<option value="সার্ভিস/ফাইন্যান্স/ফ্রিল্যান্সার/উদ্যোক্তা">সার্ভিস/ফাইন্যান্স/ফ্রিল্যান্সার/উদ্যোক্তা</option>
								<option value="প্রবাসী/বিদেশ">প্রবাসী/বিদেশ</option>
								<option value="গার্মেন্টস/টেইলর">গার্মেন্টস/টেইলর</option>
								<option value="টেকনিশিয়ান/মিস্ত্রি/কারিগর">টেকনিশিয়ান/মিস্ত্রি/কারিগর</option>
								<option value="ড্রাইভার/চালক">ড্রাইভার/চালক</option>
								<option value="অন্যান্য">অন্যান্য</option>
								<option value="কিছু করিনা">কিছু করিনা</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="কিছু করিনা" style="display: <?php echo $noOccupation; ?>;">
							<label>পেশার নাম <span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (এখানে লিখুন: কিছু করিনা অথবা Nothing)</span></label>
							<input type="text" name="no_occupation" value="<?php echo $no_occupation;?>" class="form-text" maxlength="15">
						</div>
						<div class="shosurbari-biodata-field section"  id="অন্যান্য" style="display: <?php echo $otherOccupationSector; ?>;">
							<label>পেশার নাম <span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (এখানে আপনার পেশার নাম লিখুন)</span></label>
							<input type="text"  name="other_occupation_sector" value="<?php echo $other_occupation_sector;?>" class="form-text" maxlength="38">
						</div>
						<div class="shosurbari-biodata-field section"  id="ব্যবসায়ী" style="display: <?php echo $businessOccupationLevel; ?>;">
							<label>ব্যবসার নামটি লিখুন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="business_occupation_level" value="<?php echo $business_occupation_level;?>" class="form-text">
						</div>
						<div class="shosurbari-biodata-field section" id="শিক্ষার্থী" style="display: <?php echo $studentOccupationLevel; ?>;">
							<label >পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="student_occupation_level">
								<option hidden selected><?php echo $student_occupation_level;?></option>
								<option></option>
								<!-- স্পেশাল -->
								<option style="color: #0aa4ca;" class="label-search-options" disabled>স্পেশাল 👇</option>
								<option value="শিক্ষার্থী-কওমী মাদ্রাসা">শিক্ষার্থী-কওমী মাদ্রাসা</option>
								<option value="শিক্ষার্থী-মেডিকেল">শিক্ষার্থী-মেডিকেল</option>
								<option value="শিক্ষার্থী-বি.এসসি. ইঞ্জিনিয়ারিং">শিক্ষার্থী-বি.এসসি. ইঞ্জিনিয়ারিং</option>
								<!-- সকল শিক্ষার্থী -->
								<option style="color: #0aa4ca;" class="label-search-options" disabled>সকল শিক্ষার্থী 👇</option>
								<option value="শিক্ষার্থী-মাধ্যমিক/সমমান">শিক্ষার্থী-মাধ্যমিক/সমমান</option>
								<option value="শিক্ষার্থী-উচ্চমাধ্যমিক/সমমান">শিক্ষার্থী-উচ্চমাধ্যমিক/সমমান</option>
								<option value="শিক্ষার্থী-ডিপ্লোমা">শিক্ষার্থী-ডিপ্লোমা </option>
								<option value="শিক্ষার্থী-ডিপ্লোমা আন্ডারগ্রাজুয়েট">শিক্ষার্থী-ডিপ্লোমা আন্ডারগ্রাজুয়েট</option>   
								<option value="শিক্ষার্থী-ডিপ্লোমা পোস্টগ্রাজুয়েট">শিক্ষার্থী-ডিপ্লোমা পোস্টগ্রাজুয়েট</option>
								<option value="শিক্ষার্থী-ডিগ্রী">শিক্ষার্থী-ডিগ্রী </option>   
								<option value="শিক্ষার্থী-স্নাতক/ব্যাচেলর">শিক্ষার্থী-স্নাতক/ব্যাচেলর</option>
								<option value="শিক্ষার্থী-স্নাতকোত্তর/মাস্টার্স">শিক্ষার্থী-স্নাতকোত্তর/মাস্টার্স</option>
							</select>
						</div>			
						<div class="shosurbari-biodata-field section" id="ডাক্তার/চিকিৎসা/স্বাস্থ্য" style="display: <?php echo $healthOccupationLevel; ?>;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="health_occupation_level">
								<option hidden selected><?php echo $health_occupation_level;?></option>
								<option></option>
								<option value="এম.বি.বি.এস. ডাক্তার">এম.বি.বি.এস. ডাক্তার</option>
								<option value="ডেন্টিস্ট">ডেন্টিস্ট</option>
								<option value="ইন্টার্ন ডাক্তার (MBBS)">ইন্টার্ন ডাক্তার (MBBS)</option> 
								<option value="পশু চিকিৎসক">পশু চিকিৎসক</option>
								<option value="ফার্মাসিস্ট">ফার্মাসিস্ট</option>
								<option value="হোমিও ডাক্তার">হোমিও ডাক্তার</option>
								<option value="মেডিকেল অ্যাসিস্ট্যান্ট">মেডিকেল অ্যাসিস্ট্যান্ট</option>
								<option value="মেডিকেল টেকনোলজিস্ট">মেডিকেল টেকনোলজিস্ট</option>
								<option value="প্যারামেডিকেল">প্যারামেডিকেল</option>
								<option value="নার্স">নার্স</option>
								<option value="ওয়ার্ড বয়">ওয়ার্ড বয়</option>
								<option value="আয়া">আয়া</option>
								<option value="মিডওয়াইফারি">মিডওয়াইফারি</option>
								<option value="পল্লী চিকিৎসক">পল্লী চিকিৎসক</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="ইঞ্জিনিয়ার" style="display: <?php echo $engineerOccupationLevel; ?>;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="engineer_occupation_level">
								<option hidden selected><?php echo $engineer_occupation_level;?></option>
								<option></option>
								<option value="সাপোর্ট ইঞ্জিনিয়ার">সাপোর্ট ইঞ্জিনিয়ার</option>  
								<option value="ডিপ্লোমা ইঞ্জিনিয়ার">ডিপ্লোমা ইঞ্জিনিয়ার</option>  
								<option value="সফটওয়্যার ইঞ্জিনিয়ার">সফটওয়্যার ইঞ্জিনিয়ার</option>
								<option value="টেক্সটাইল ইঞ্জিনিয়ার">টেক্সটাইল ইঞ্জিনিয়ার</option>
								<option value="সিভিল ইঞ্জিনিয়ার">সিভিল ইঞ্জিনিয়ার</option>
								<option value="ইলেকট্রিক্যাল ইঞ্জিনিয়ার">ইলেকট্রিক্যাল ইঞ্জিনিয়ার</option>
								<option value="ইলেকট্রনিক্স ইঞ্জিনিয়ার">ইলেকট্রনিক্স ইঞ্জিনিয়ার</option>
								<option value="মেরিন ইঞ্জিনিয়ার">মেরিন ইঞ্জিনিয়ার</option> 
								<option value="নেটওয়ার্ক ইঞ্জিনিয়ার">নেটওয়ার্ক ইঞ্জিনিয়ার</option> 
								<option value="রোবোটিক্স ইঞ্জিনিয়ার">রোবোটিক্স ইঞ্জিনিয়ার</option>
								<option value="এগ্রিকালচার ইঞ্জিনিয়ার">এগ্রিকালচার ইঞ্জিনিয়ার</option>
								<option value="আর্কিটেকচার ইঞ্জিনিয়ার">আর্কিটেকচার ইঞ্জিনিয়ার</option>
								<option value="মেকানিক্যাল ইঞ্জিনিয়ার">মেকানিক্যাল ইঞ্জিনিয়ার</option>
								<option value="কেমিক্যাল ইঞ্জিনিয়ার">কেমিক্যাল ইঞ্জিনিয়ার</option>
								<option value="বায়োমেডিকেল ইঞ্জিনিয়ার">বায়োমেডিকেল ইঞ্জিনিয়ার</option>
								<option value="এরোস্পেস ইঞ্জিনিয়ার">এরোস্পেস ইঞ্জিনিয়ার</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="শিক্ষক/প্রফেসর" style="display: <?php echo $teacherOccupationLevel; ?>;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="teacher_occupation_level">
								<option hidden selected><?php echo $teacher_occupation_level;?></option>
								<option></option>
								<option value="কওমী মাদ্রাসার শিক্ষক">কওমী মাদ্রাসার শিক্ষক</option>
								<option value="আলিয়া মাদ্রাসার শিক্ষক">আলিয়া মাদ্রাসার শিক্ষক</option>  
								<option value="স্কুল শিক্ষক">স্কুল শিক্ষক</option> 
								<option value="কলেজ শিক্ষক">কলেজ শিক্ষক</option>
								<option value="বিশ্ববিদ্যালয়ের শিক্ষক">বিশ্ববিদ্যালয়ের শিক্ষক</option>
								<option value="ডিগ্রির শিক্ষক">ডিগ্রির শিক্ষক</option>
								<option value="প্রফেসর">প্রফেসর</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী" style="display: <?php echo $defenseOccupationLevel; ?>;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="defense_occupation_level">
								<option hidden selected><?php echo $defense_occupation_level;?></option>
								<option></option>
								<option value="সেনাবাহিনী">সেনাবাহিনী</option> 
								<option value="বিমানবাহিনী">বিমানবাহিনী</option>
								<option value="নৌবাহিনী">নৌবাহিনী</option>
								<option value="পুলিশ">পুলিশ</option>
								<option value="ফায়ার সার্ভিস">ফায়ার সার্ভিস</option> 
								<option value="এন.এস.আই">এন.এস.আই</option>
								<option value="ডিজি.এফ.আই">ডিজি.এফ.আই</option>
								<option value="সি.আই.ডি">সি.আই.ডি</option>
								<option value="এস.বি">এস.বি</option>
								<option value="র‍্যাব">র‍্যাব</option>
								<option value="ডিবি">ডিবি</option>
								<option value="আনসার">আনসার</option>
								<option value="নিরাপত্তারক্ষী">নিরাপত্তারক্ষী</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="প্রবাসী/বিদেশ" style="display: <?php echo $foreignerOccupationLevel; ?>;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="foreigner_occupation_level">
								<option hidden selected><?php echo $foreigner_occupation_level;?></option>
								<option></option>
								<option value="বিদেশে চাকরি">বিদেশে চাকরি</option>
								<option value="বিদেশে কাজ">বিদেশে কাজ</option>
								<option value="বিদেশে ব্যবসা">বিদেশে ব্যবসা</option>
								<option value="বিদেশে পড়াশোনা">বিদেশে পড়াশোনা</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="গার্মেন্টস/টেইলর" style="display: <?php echo $garmentsOccupationLevel; ?>;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="garments_occupation_level">
								<option hidden selected><?php echo $garments_occupation_level;?></option>
								<option></option>
								<option value="ফ্যাশন ডিজাইনার">ফ্যাশন ডিজাইনার</option>
								<option value="গার্মেন্টস ম্যানেজার">গার্মেন্টস ম্যানেজার</option>
								<option value="গার্মেন্টস বায়িং হাউস">গার্মেন্টস বায়িং হাউস</option>
								<option value="গার্মেন্টস শ্রমিক">গার্মেন্টস শ্রমিক</option>
								<option value="গার্মেন্টস টেকনিশিয়ান">গার্মেন্টস টেকনিশিয়ান</option>
								<option value="টেইলার্স/দর্জি">টেইলার্স/দর্জি</option> 
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="ড্রাইভার/চালক" style="display: <?php echo $driverOccupationLevel; ?>;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="driver_occupation_level">
								<option hidden selected><?php echo $driver_occupation_level;?></option>
								<option></option>
								<option value="পাঠাও/উবার রাইডার">পাঠাও/উবার রাইডার</option>
								<option value="বাস ড্রাইভার">বাস ড্রাইভার</option> 
								<option value="মাইক্রো বাস ড্রাইভার">মাইক্রো বাস ড্রাইভার</option> 
								<option value="কার ড্রাইভার">কার ড্রাইভার</option>
								<option value="কাভার্ড ভ্যান ড্রাইভার">কাভার্ড ভ্যান ড্রাইভার</option> 
								<option value="পিকআপ ড্রাইভার">পিকআপ ড্রাইভার</option> 
								<option value="ট্রাক ড্রাইভার">ট্রাক ড্রাইভার</option>
								<option value="লেগুনা চালক">লেগুনা চালক</option>
								<option value="CNG চালক">CNG চালক</option>  
								<option value="অটো চালক">অটো চালক</option>
								<option value="রিক্সা/ভ্যান চালক">রিক্সা/ভ্যান চালক</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="সার্ভিস/ফাইন্যান্স/ফ্রিল্যান্সার/উদ্যোক্তা" style="display: <?php echo $serviceAndcommonOccupationLevel; ?>;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="service_andcommon_occupation_level">
								<option hidden selected><?php echo $service_andcommon_occupation_level;?></option>
								<option></option>
								<option value="HR">HR</option>
								<option value="ম্যানেজার">ম্যানেজার</option>   
								<option value="আইনজীবী">আইনজীবী</option>
								<option value="ব্যাংকার">ব্যাংকার</option>
								<option value="এডমিনিস্ট্রেটিভ অফিসার">এডমিনিস্ট্রেটিভ অফিসার</option>
								<option value="উদ্যোক্তা">উদ্যোক্তা</option> 
								<option value="ফ্রিল্যান্সার">ফ্রিল্যান্সার</option>
								<option value="কম্পিউটার অপারেটর">কম্পিউটার অপারেটর</option>
								<option value="কন্টেন্ট ক্রিয়েটর">কন্টেন্ট ক্রিয়েটর</option>
								<option value="গ্রাফিক্স ডিজাইনার">গ্রাফিক্স ডিজাইনার</option>
								<option value="ডিজিটাল মার্কেটিং">ডিজিটাল মার্কেটিং</option>
								<option value="সেলস রিপ্রেজেন্টেটিভ(SR)">সেলস রিপ্রেজেন্টেটিভ(SR)</option>
								<option value="শো-রুম সহকারী/সেলসম্যান">শো-রুম সহকারী/সেলসম্যান</option>
								<option value="কাস্টমার সার্ভিস/কল সেন্টার">কাস্টমার সার্ভিস/কল সেন্টার</option>
								<option value="কন্সাল্ট্যান্টস/কনসাল্টিং">কন্সাল্ট্যান্টস/কনসাল্টিং</option>
								<option value="অফিস সহকারী">অফিস সহকারী</option>
								<option value="মসজিদের ইমাম/কুরআন শিক্ষক">মসজিদের ইমাম/কুরআন শিক্ষক</option>
								<option value="পুরোহিত">পুরোহিত</option>
								<option value="ওয়েটার">ওয়েটার</option>
								<option value="শেফ/বাবুর্চী">শেফ/বাবুর্চী</option>
								<option value="ডেলিভারী ম্যান">ডেলিভারী ম্যান</option>
								<option value="পিয়ন">পিয়ন</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="টেকনিশিয়ান/মিস্ত্রি/কারিগর" style="display: <?php echo $mistriOccupationLevel; ?>;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="mistri_occupation_level">
								<option hidden selected><?php echo $mistri_occupation_level;?></option>
								<option></option>
								<option value="ইলেকট্রিশিয়ান">ইলেকট্রিশিয়ান</option>
								<option value="ইলেকট্রনিক্স টেকনিশিয়ান">ইলেকট্রনিক্স টেকনিশিয়ান</option>
								<option value="মটর টেকনিশিয়ান ">মটর টেকনিশিয়ান</option>
								<option value="ফ্রিজ টেকনিশিয়ান">ফ্রিজ টেকনিশিয়ান</option>
								<option value="এসি টেকনিশিয়ান">এসি টেকনিশিয়ান</option>
								<option value="সিসি ক্যামেরা টেকনিশিয়ান">সিসি ক্যামেরা টেকনিশিয়ান</option>
								<option value="ওয়েল্ডিং টেকনিশিয়ান">ওয়েল্ডিং টেকনিশিয়ান</option>
								<option value="প্লাম্বার">প্লাম্বার</option>
								<option value="রং মিস্ত্রি">রং মিস্ত্রি</option>
								<option value="রড মিস্ত্রি">রড মিস্ত্রি</option>
								<option value="কাঠ মিস্ত্রি">কাঠ মিস্ত্রি</option>
								<option value="রাজ মিস্ত্রি">রাজ মিস্ত্রি</option>
								<option value="গ্যাস মিস্ত্রি">গ্যাস মিস্ত্রি</option>
								<option value="স্যানিটারি মিস্ত্রি">স্যানিটারি মিস্ত্রি</option>
								<option value="টাইলস ও মুজাইক মিস্ত্রি">টাইলস ও মুজাইক মিস্ত্রি</option>
								<option value="থাই অ্যালুমিনিয়াম ও গ্লাস মিস্ত্রি">থাই অ্যালুমিনিয়াম ও গ্লাস মিস্ত্রি</option>
							</select>
						</div>
						<script>
							function showOccupationSector(occupation) {
							// Hide the occupation_describe_field by default
							var occupationDescribeField = document.getElementById("occupation_describe_field");
							occupationDescribeField.style.display = "none";
							// Hide all occupation sections
							var occupationSections = document.getElementsByClassName("shosurbari-biodata-field section");
							for (var i = 0; i < occupationSections.length; i++) {
								occupationSections[i].style.display = "none";
								var inputs = occupationSections[i].getElementsByTagName("input");
								for (var j = 0; j < inputs.length; j++) {
								inputs[j].value = "";
								}
								var selects = occupationSections[i].getElementsByTagName("select");
								for (var k = 0; k < selects.length; k++) {
								selects[k].selectedIndex = 0;
								}
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
						<div class="shosurbari-biodata-field" id="occupation_describe_field" style="display: <?php echo $occupationDescribe; ?>;">
							<label>পেশার বিস্তারিত তথ্য<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="occupation_describe" class="form-text-describe"><?php echo $occupation_describe;?></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>ঘরের বাহিরে সাধারণত কি ধরণের পোশাক পরেন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text"  rows="8" name="dress_code"  class="form-text-describe" required><?php echo $dress_code;?></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>আপনার ব্যক্তিগত ইচ্ছা, শখ, স্বপ্ন, পছন্দ-অপছন্দ, রুচিবোধ ইত্যাদি বিষয়ে লিখুন<span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<textarea type="text" rows="8" name="aboutme" class="form-text-describe"><?php echo $aboutme;?></textarea>
						</div><br>
						<div class="shosurbari-biodata-field">
						<p style="text-align: justify; line-height: 25px;"><i id="bell" class="fa fa-bell" style="color: #0aa4ca; margin-right: 10px;"></i> নিচে অবশ্যই একটিভ মোবাইল নাম্বার লিখবেন। 
							বিয়ের জন্য আগ্রহী ইউজার এই বায়োডাটাটি পছন্দ করার পর, তার পেমেন্ট তথ্য যাচাই বাছাই করে শ্বশুরবাড়ির কাস্টমার সার্ভিস থেকে এই বায়োডাটার অভিভাবককে কল করবে। যদি আপনার (পাত্র-পাত্রীর) বিয়ে ঠিক না হয়ে থাকে তবেই অভিভাবকের মোবাইল নাম্বার আগ্রহী ইউজারকে প্রদান করা হবে।
						</p>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পাত্র/পাত্রীর নাম<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text" name="groom_bride_name" value="<?php echo $groom_bride_name;?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পাত্র/পাত্রীর মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="tel" name="groom_bride_number" value="<?php echo $groom_bride_number;?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>অভিভাবকের মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="tel" name="groom_bride_family_number" value="<?php echo $groom_bride_family_number;?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>উক্ত মোবাইল নাম্বারটি যেই অভিভাবকের তার নাম লিখুন এবং অভিভাবক পাত্র/পাত্রীর কে হয়?<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text" name="family_member_name_relation" placeholder="যেমন:- রকিবুল ইসলাম, বাবা" value="<?php echo $family_member_name_relation;?>" class="form-text" required>
						</div>
					</div>
				</div>
				<button type="submit" id="edit-submit" name="op" class="biodata-submit"><span></span> আপডেট করুন</button>			
			</fieldset>
		</form>
	</div>	
	<!--View This Page. Connected to get view count -->
	<script>
	$(document).ready(function() {
	var pages = ["update-personalInfo"];
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

	<!--=======  Footer Start ========-->
	<?php include_once("footer.php");?>
	<!--=======  Footer End  =========-->
	<!-- jQuery -->
	<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<!-- jQuery easing plugin -->
	<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
</body>
</html>
