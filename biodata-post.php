<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	post_biodata($id);
}
if(isloggedin()){
} else{
   header("location:login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Post Biodata | ShosurBari</title>
<meta name="description" content="Create and post your biodata on ShosurBari.com. Showcase your personality, preferences, and aspirations to find the perfect match.">
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
		@media screen and (min-width: 1400px) {
    .popup-container {
        width: 480px;
    }
	}
	@media (max-width: 1400px){
	.shosurbari-biodata-form{
		width: auto;
	}
	.popup-container {
        width: 450px;
    }
	}
	@media screen and (max-width: 1200px) {
    .popup-container {
        width: 420px;
    }
	}
	@media (max-width: 1024px) {
	.popup-container {
        width: 400px;
    }
	.shosurbari-animation-form {
		flex-basis: 100%;
		justify-content: center;
	}
	.shosurbari-biodata-form {
		width: auto;
	}
	}
		@media screen and (max-width: 768px) {
    .popup-container {
        width: 390px;
    }
}
@media screen and (max-width: 600px) {
    .popup-container {
        width: 380px;
    }
}
@media screen and (max-width: 480px) {
    .popup-container {
        width: 350px;
    }
}
@media screen and (max-width: 384px) {
    .popup-container {
        width: 300px;
    }
}
@media screen and (max-width: 320px) {
    .popup-container {
        width: 250px;
    }
}
	</style>
	<div class="grid_3">
		<div class="container">
			<div class="breadcrumb1">
				<ul>
					<a href="index.php"><i class="fa fa-home home_1"></i></a>
					<span class="divider">&nbsp;|&nbsp;</span>
					<li class="current-page"><h4>Biodata Post</h4></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="sb-home-search">
		<h1>পাত্র-পাত্রীর তথ্য দিন</h1>
        <p>সঠিক ও বিস্তারিত তথ্য প্রদানের মাধ্যমেই পাত্র-পাত্রীর সুন্দর ব্যক্তিত্বের প্রকাশ পাবে।</p>
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
				<li id="personalLife" data-bengali-number="2">ব্যক্তিগত</li>
				<li id="educationalQualifications" data-bengali-number="3">শিক্ষাগত</li>
				<li id="addressDetails" data-bengali-number="4">ঠিকানা</li>
				<li id="familyInfo" data-bengali-number="5">পারিবার</li>
				<li id="MarriageInfo" data-bengali-number="6">বিবাহ-সম্পর্কিত</li>
				<li id="religionDetails" data-bengali-number="7">ধর্মীয়</li>
				<li id="expectedPartner" data-bengali-number="8">জীবনসঙ্গীর-বিবরণ</li>
			</ul>
			<!-- START - Personal & Physical  / sb-biodata-1 -->
			<fieldset>
				<div class="sb-biodata" id="personalPhysical">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
							<h3> <img src="images/shosurbari-logo-form.png"></h3>
                        </div>
                    </div>
					<div class="sb-biodata-field">
						<h2>শারীরিক বিষয়াবলি</h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>বায়োডাটার ধরণ<span class="form-required" title="This field is required.">*</span></label>
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
							<label for="edit-pass">জন্ম মাস<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (আসল)</span></label>
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
							<label for="edit-pass">জন্ম সাল<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (আসল)</span></label>
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
							<label>শারীরিক বর্ণ<span class="form-required" title="This field is required.">*</span></label>
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
							<label>উচ্চতা<span class="form-required" title="This field is required.">*</span></label>
							<select name="height" required>
								<option hidden selected></option>
								<option value="জানা নেই">জানা নেই</option>
								<option style="color: #0aa4ca;" class="label-search-options" disabled="">৪ ফুটের সিরিয়াল 👇</option>
								<option value="৪ ফুটের কম">৪ ফুটের কম </option>
								<option value="৪ ফুট ০ ইঞ্চি">৪ ফুট ০ ইঞ্চি</option>
								<option value="৪ ফুট ১ ইঞ্চি">৪ ফুট ১ ইঞ্চি </option>
								<option value="৪ ফুট ২ ইঞ্চি">৪ ফুট ২ ইঞ্চি </option>
								<option value="৪ ফুট ৩ ইঞ্চি">৪ ফুট ৩ ইঞ্চি</option>
								<option value="৪ ফুট ৪ ইঞ্চি">৪ ফুট ৪ ইঞ্চি</option>
								<option value="৪ ফুট ৫ ইঞ্চি">৪ ফুট ৫ ইঞ্চি</option>
								<option value="৪ ফুট ৬ ইঞ্চি">৪ ফুট ৬ ইঞ্চি</option>
								<option value="৪ ফুট ৭ ইঞ্চি">৪ ফুট ৭ ইঞ্চি</option>
								<option value="৪ ফুট ৮ ইঞ্চি">৪ ফুট ৮ ইঞ্চি</option>
								<option value="৪ ফুট ৯ ইঞ্চি">৪ ফুট ৯ ইঞ্চি</option>
								<option value="৪ ফুট ১০ ইঞ্চি">৪ ফুট ১০ ইঞ্চি</option>
								<option value="৪ ফুট ১১ ইঞ্চি">৪ ফুট ১১ ইঞ্চি</option>
								<option style="color: #0aa4ca;" class="label-search-options" disabled="">৫ ফুটের সিরিয়াল 👇</option>
								<option value="৫ ফুট ০ ইঞ্চি">৫ ফুট ০ ইঞ্চি</option>
								<option value="৫ ফুট ১ ইঞ্চি">৫ ফুট ১ ইঞ্চি</option>
								<option value="৫ ফুট ২ ইঞ্চি">৫ ফুট ২ ইঞ্চি</option>
								<option value="৫ ফুট ৩ ইঞ্চি">৫ ফুট ৩ ইঞ্চি</option>
								<option value="৫ ফুট ৪ ইঞ্চি">৫ ফুট ৪ ইঞ্চি</option>
								<option value="৫ ফুট ৫ ইঞ্চি">৫ ফুট ৫ ইঞ্চি</option>
								<option value="৫ ফুট ৬ ইঞ্চি">৫ ফুট ৬ ইঞ্চি</option>
								<option value="৫ ফুট ৭ ইঞ্চি">৫ ফুট ৭ ইঞ্চি</option>
								<option value="৫ ফুট ৮ ইঞ্চি">৫ ফুট ৮ ইঞ্চি</option>
								<option value="৫ ফুট ৯ ইঞ্চি">৫ ফুট ৯ ইঞ্চি</option>
								<option value="৫ ফুট ১০ ইঞ্চি">৫ ফুট ১০ ইঞ্চি</option>
								<option value="৫ ফুট ১১ ইঞ্চি">৫ ফুট ১১ ইঞ্চি</option>
								<option style="color: #0aa4ca;" class="label-search-options" disabled="">৬ ফুটের সিরিয়াল 👇</option>
								<option value="৬ ফুট ০ ইঞ্চি">৬ ফুট ০ ইঞ্চি</option>
								<option value="৬ ফুট ১ ইঞ্চি">৬ ফুট ১ ইঞ্চি</option>
								<option value="৬ ফুট ২ ইঞ্চি">৬ ফুট ২ ইঞ্চি</option>
								<option value="৬ ফুট ৩ ইঞ্চি">৬ ফুট ৩ ইঞ্চি</option>
								<option value="৬ ফুট ৪ ইঞ্চি">৬ ফুট ৪ ইঞ্চি</option>
								<option value="৬ ফুট ৫ ইঞ্চি">৬ ফুট ৫ ইঞ্চি</option>
								<option value="৬ ফুট ৬ ইঞ্চি">৬ ফুট ৬ ইঞ্চি</option>
								<option value="৬ ফুট ৭ ইঞ্চি">৬ ফুট ৭ ইঞ্চি</option>
								<option value="৬ ফুট ৮ ইঞ্চি">৬ ফুট ৮ ইঞ্চি</option>
								<option value="৬ ফুট ৯ ইঞ্চি">৬ ফুট ৯ ইঞ্চি</option>
								<option value="৬ ফুট ১০ ইঞ্চি">৬ ফুট ১০ ইঞ্চি</option>
								<option value="৬ ফুট ১১ ইঞ্চি">৬ ফুট ১১ ইঞ্চি</option>
								<option style="color: #0aa4ca;" class="label-search-options" disabled="">৭ ফুটের সিরিয়াল 👇</option>
								<option value="৭ ফুট ০ ইঞ্চি">৭ ফুট ০ ইঞ্চি</option>
								<option value="৭ ফুট ১ ইঞ্চি">৭ ফুট ১ ইঞ্চি</option>
								<option value="৭ ফুট ২ ইঞ্চি">৭ ফুট ২ ইঞ্চি</option>
								<option value="৭ ফুট ২ ইঞ্চির উপরে">৭ ফুট ২ ইঞ্চির উপরে</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label>ওজন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="weight" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>রক্তের গ্রুপ<span class="form-required" title="This field is required.">*</span></label>
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
								<option value="জানিনা">জানিনা</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label>শারীরিক-মানসিক কোনো সমস্যা/রোগ আছে কি?<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8"  name="physicalstatus" value="" class="form-text-describe" required></textarea>
						</div>
					</div>
				</div>
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
			</fieldset>
			<!-- END - Personal & Physical  / sb-biodata-1 -->
			<!-- START - Personal & Life Style  / sb-biodata-2 -->
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
								<option hidden selected></option>
								<option></option>
								<option value="না">না</option>
								<option value="হ্যাঁ">হ্যাঁ</option> 
								<option value="মাঝে মাঝে করা হয়">মাঝে মাঝে করা হয়</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="occupation_sector">পেশা<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (এই অপশনটি প্রকাশিত না হয়ে এর সাব ক্যাটাগরি প্রকাশিত হবে, যেকোনো একটি পেশা সিলেক্ট করলেই পেশা অনুযায়ী সাব ক্যাটাগরি দেখতে পাবেন।)</span></label>
							<select name="occupation_sector" required onchange="showOccupationSector(this.value)">
								<option hidden selected></option>
								<option value="ব্যবসায়ী">ব্যবসায়ী</option>
								<option value="শিক্ষার্থী">শিক্ষার্থী</option>
								<option value="ইঞ্জিনিয়ার">ইঞ্জিনিয়ার</option>
								<option value="ডাক্তার/চিকিৎসা/স্বাস্থ্য">ডাক্তার/চিকিৎসা/স্বাস্থ্য</option>
								<option value="শিক্ষক/প্রফেসর">শিক্ষক/প্রফেসর</option>
								<option value="গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী">গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী</option>
								<option value="সার্ভিস/ফাইন্যান্স/ফ্রিল্যান্সার/উদ্যোক্তা">সার্ভিস/ফাইন্যান্স/ফ্রিল্যান্সার/উদ্যোক্তা</option>
								<option value="দোকান/শোরুমের স্বত্বাধিকারী">দোকান/শোরুমের স্বত্বাধিকারী(মালিক)</option>
								<option value="প্রবাসী/বিদেশ">প্রবাসী/বিদেশ</option>
								<option value="গার্মেন্টস/টেইলর">গার্মেন্টস/টেইলর</option>
								<option value="টেকনিশিয়ান/মিস্ত্রি/কারিগর">টেকনিশিয়ান/মিস্ত্রি/কারিগর</option>
								<option value="ড্রাইভার/চালক">ড্রাইভার/চালক</option>
								<option value="অন্যান্য">অন্যান্য</option>
								<option value="কিছু করিনা">কিছু করিনা</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="কিছু করিনা" style="display: none;">
							<label>পেশার নাম <span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (এখানে লিখুন: কিছু করিনা অথবা Nothing)</span></label>
							<input type="text" name="no_occupation" value="" class="form-text" maxlength="15">
						</div>
						<div class="shosurbari-biodata-field section"  id="অন্যান্য" style="display: none;">
							<label>পেশার নাম <span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (এখানে আপনার পেশার নাম লিখুন)</span></label>
							<input type="text"  name="other_occupation_sector" value="" class="form-text" maxlength="38">
						</div>
						<div class="shosurbari-biodata-field section"  id="ব্যবসায়ী" style="display: none;">
						<label>ব্যবসার নামটি লিখুন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="business_occupation_level" value="" class="form-text">
						</div>
						<div class="shosurbari-biodata-field section" id="শিক্ষার্থী" style="display: none;">
							<label >পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="student_occupation_level">
								<option hidden selected></option>
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
						<div class="shosurbari-biodata-field section" id="ডাক্তার/চিকিৎসা/স্বাস্থ্য" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="health_occupation_level">
								<option hidden selected></option>
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
						<div class="shosurbari-biodata-field section" id="ইঞ্জিনিয়ার" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="engineer_occupation_level">
								<option hidden selected></option>
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
						<div class="shosurbari-biodata-field section" id="শিক্ষক/প্রফেসর" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="teacher_occupation_level">
								<option hidden selected></option>
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
						<div class="shosurbari-biodata-field section" id="গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="defense_occupation_level">
								<option hidden selected></option>
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
							<div class="shosurbari-biodata-field section" id="দোকান/শোরুমের স্বত্বাধিকারী" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="shop_occupation_level">
								<option hidden selected></option>
								<option></option>
								<option value="স্বত্বাধিকারী-গাড়ির শোরুম">স্বত্বাধিকারী-গাড়ির শোরুম</option>
								<option value="স্বত্বাধিকারী-মোটরসাইকেলের শোরুম">স্বত্বাধিকারী-মোটরসাইকেলের শোরুম</option>
								<option value="স্বত্বাধিকারী-ইলেকট্রনিক্স শোরুম/শপ">স্বত্বাধিকারী-ইলেকট্রনিক্স শোরুম/শপ</option>
								<option value="স্বত্বাধিকারী-কম্পিউটার অ্যাক্সেসরিজ শপ">স্বত্বাধিকারী-কম্পিউটার অ্যাক্সেসরিজ শপ</option>
								<option value="স্বত্বাধিকারী-মোবাইল অ্যাক্সেসরিজ শপ">স্বত্বাধিকারী-মোবাইল অ্যাক্সেসরিজ শপ</option>
								<option value="স্বত্বাধিকারী-মোবাইল ফোনের শোরুম/শপ">স্বত্বাধিকারী-মোবাইল ফোনের শোরুম/শপ</option>
								<option value="স্বত্বাধিকারী-ফার্নিচারের শোরুম/শপ">স্বত্বাধিকারী-ফার্নিচারের শোরুম/শপ</option>
								<option value="স্বত্বাধিকারী-পোশাকের শোরুম/শপ">স্বত্বাধিকারী-পোশাকের শোরুম/শপ</option>
								<option value="স্বত্বাধিকারী-জুতার শোরুম/শপ">স্বত্বাধিকারী-জুতার শোরুম/শপ</option>
								<option value="স্বত্বাধিকারী-মুদির দোকান">স্বত্বাধিকারী-মুদির দোকান</option>
								<option value="স্বত্বাধিকারী-ঔষুধের দোকান">স্বত্বাধিকারী-ঔষুধের দোকান</option>
								<option value="স্বত্বাধিকারী-সার/কীটনাশকের দোকান">স্বত্বাধিকারী-সার/কীটনাশকের দোকান</option>
								<option value="স্বত্বাধিকারী-মেডিক্যাল ইকুইপমেন্ট শপ">স্বত্বাধিকারী-মেডিক্যাল ইকুইপমেন্ট শপ</option>
								<option value="স্বত্বাধিকারী-লাইব্রেরি/বুক শপ">স্বত্বাধিকারী-লাইব্রেরি/বুক শপ</option>
								<option value="স্বত্বাধিকারী-স্টেশনারি শপ">স্বত্বাধিকারী-স্টেশনারি শপ</option>
								<option value="স্বত্বাধিকারী-কসমেটিক্স শপ">স্বত্বাধিকারী-কসমেটিক্স শপ</option>
								<option value="স্বত্বাধিকারী-অপটিক্যাল শপ">স্বত্বাধিকারী-অপটিক্যাল শপ</option>
								<option value="স্বত্বাধিকারী-জুয়েলারি শপ">স্বত্বাধিকারী-জুয়েলারি শপ</option>
								<option value="স্বত্বাধিকারী-বেকারির শপ">স্বত্বাধিকারী-বেকারির শপ</option>
								<option value="স্বত্বাধিকারী-চকলেটের শপ">স্বত্বাধিকারী-চকলেটের শপ</option>
								<option value="স্বত্বাধিকারী-রেস্তোরাঁ">স্বত্বাধিকারী-রেস্তোরাঁ</option>
								<option value="স্বত্বাধিকারী-ক্যাফে">স্বত্বাধিকারী-ক্যাফে</option>
								<option value="স্বত্বাধিকারী-খাবার হোটেল">স্বত্বাধিকারী-খাবার হোটেল</option>
								<option value="স্বত্বাধিকারী-মিষ্টির দোকান">স্বত্বাধিকারী-মিষ্টির দোকান</option>
								<option value="স্বত্বাধিকারী-চায়ের দোকান">স্বত্বাধিকারী-চায়ের দোকান</option>
								<option value="স্বত্বাধিকারী-গোখাদ্য/ভূষিমালের দোকান">স্বত্বাধিকারী-গোখাদ্য/ভূষিমালের দোকান</option>
								<option value="স্বত্বাধিকারী-ফলের দোকান">স্বত্বাধিকারী-ফলের দোকান</option>
								<option value="স্বত্বাধিকারী-ফুলের দোকান">স্বত্বাধিকারী-ফুলের দোকান</option>
								<option value="স্বত্বাধিকারী-খেলনার দোকান">স্বত্বাধিকারী-খেলনার দোকান</option>
								<option value="স্বত্বাধিকারী-স্পোর্টস সামগ্রীর শপ">স্বত্বাধিকারী-স্পোর্টস সামগ্রীর শপ</option>
								<option value="স্বত্বাধিকারী-প্লাস্টিক সামগ্রীর শপ">স্বত্বাধিকারী-প্লাস্টিক সামগ্রীর শপ</option>
								<option value="স্বত্বাধিকারী-বাড়ির নির্মাণ সামগ্রীর দোকান">স্বত্বাধিকারী-বাড়ির নির্মাণ সামগ্রীর দোকান</option>
								<option value="স্বত্বাধিকারী-গৃহসজ্জা সামগ্রীর শপ">স্বত্বাধিকারী-গৃহসজ্জা সামগ্রীর শপ</option>
								<option value="স্বত্বাধিকারী-হোম ডেকোর শপ">স্বত্বাধিকারী-হোম ডেকোর শপ</option>
								<option value="স্বত্বাধিকারী-হার্ডওয়্যার শপ">স্বত্বাধিকারী-হার্ডওয়্যার শপ</option>
								<option value="স্বত্বাধিকারী-মোবাইল মেকানিক্স শপ">স্বত্বাধিকারী-মোবাইল মেকানিক্স শপ</option>
								<option value="স্বত্বাধিকারী-অটোমোবাইল মেকানিক্স শপ">স্বত্বাধিকারী-অটোমোবাইল মেকানিক্স শপ</option>
								<option value="স্বত্বাধিকারী-মোটরসাইকেল মেকানিক্স শপ">স্বত্বাধিকারী-মোটরসাইকেল মেকানিক্স শপ</option>
								<option value="স্বত্বাধিকারী-ইলেকট্রনিক্স মেকানিক্স শপ">স্বত্বাধিকারী-ইলেকট্রনিক্স মেকানিক্স শপ</option>
								<option value="স্বত্বাধিকারী-পোষা প্রাণীর শপ">স্বত্বাধিকারী-পোষা প্রাণীর শপ</option>
								<option value="স্বত্বাধিকারী-পেইন্টের শপ">স্বত্বাধিকারী-পেইন্টের শপ</option>
								<option value="স্বত্বাধিকারী-গার্ডেনিং এবং নার্সারি">স্বত্বাধিকারী-গার্ডেনিং এবং নার্সারি</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="প্রবাসী/বিদেশ" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="foreigner_occupation_level">
								<option hidden selected></option>
								<option></option>
								<option value="বিদেশে চাকরি">বিদেশে চাকরি</option>
								<option value="বিদেশে কাজ">বিদেশে কাজ</option>
								<option value="বিদেশে ব্যবসা">বিদেশে ব্যবসা</option>
								<option value="বিদেশে পড়াশোনা">বিদেশে পড়াশোনা</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="গার্মেন্টস/টেইলর" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="garments_occupation_level">
								<option hidden selected></option>
								<option></option>
								<option value="ফ্যাশন ডিজাইনার">ফ্যাশন ডিজাইনার</option>
								<option value="গার্মেন্টস ম্যানেজার">গার্মেন্টস ম্যানেজার</option>
								<option value="গার্মেন্টস বায়িং হাউস">গার্মেন্টস বায়িং হাউস</option>
								<option value="গার্মেন্টস শ্রমিক">গার্মেন্টস শ্রমিক</option>
								<option value="গার্মেন্টস টেকনিশিয়ান">গার্মেন্টস টেকনিশিয়ান</option>
								<option value="টেইলার্স/দর্জি">টেইলার্স/দর্জি</option> 
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="ড্রাইভার/চালক" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="driver_occupation_level">
								<option hidden selected></option>
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
						<div class="shosurbari-biodata-field section" id="সার্ভিস/ফাইন্যান্স/ফ্রিল্যান্সার/উদ্যোক্তা" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="service_andcommon_occupation_level">
								<option hidden selected></option>
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
						<div class="shosurbari-biodata-field section" id="টেকনিশিয়ান/মিস্ত্রি/কারিগর" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="mistri_occupation_level">
								<option hidden selected></option>
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
								if (occupation !== "কিছু করিনা") {
								occupationDescribeField.style.display = "block";
								}
							}
							}
						</script>
						<div class="shosurbari-biodata-field" id="occupation_describe_field" style="display: none;">
							<label>পেশার বিস্তারিত তথ্য<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="occupation_describe"  value=""  class="form-text-describe"></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>ঘরের বাহিরে সাধারণত কি ধরণের পোশাক পরেন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text"  rows="8" name="dress_code"  value="" class="form-text-describe" required></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>আপনার ব্যক্তিগত ইচ্ছা, শখ, স্বপ্ন, পছন্দ-অপছন্দ, রুচিবোধ ইত্যাদি বিষয়ে লিখুন<span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<textarea type="text" rows="8" name="aboutme" value="" class="form-text-describe"></textarea>
						</div><br>
						<div class="shosurbari-biodata-field">
							<p style="text-align: justify; line-height: 25px;"><i id="bell" class="fa fa-bell" style="color: #0aa4ca; margin-right: 10px;"></i> নিচে অবশ্যই একটিভ মোবাইল নাম্বার লিখবেন। 
                                বিয়ের জন্য আগ্রহী ইউজার এই বায়োডাটাটি পছন্দ করার পর, তার পেমেন্ট তথ্য যাচাই বাছাই করে শ্বশুরবাড়ির কাস্টমার সার্ভিস থেকে এই বায়োডাটার অভিভাবককে কল করবে। যদি আপনার (পাত্র-পাত্রীর) বিয়ে ঠিক না হয়ে থাকে তবেই অভিভাবকের মোবাইল নাম্বার আগ্রহী ইউজারকে প্রদান করা হবে।
							</p>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পাত্র/পাত্রীর নাম<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text" name="groom_bride_name" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পাত্র/পাত্রীর মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="tel" name="groom_bride_number" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>অভিভাবকের মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="tel" name="groom_bride_family_number" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>উক্ত মোবাইল নাম্বারটি যেই অভিভাবকের তার নাম লিখুন এবং অভিভাবক পাত্র/পাত্রীর কে হয়?<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text" name="family_member_name_relation" placeholder="যেমন:- রকিবুল ইসলাম, বাবা" value="" class="form-text" required>
						</div>
					</div>
				</div>
				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
			</fieldset>
			<!-- END - Personal & Life Style  / sb-biodata-2 -->
			<!-- START - Educational Qualifications  / sb-biodata-3 -->
			<fieldset>
				<div class="sb-biodata" id="educationalQualifications">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
							<h3> <img src="images/shosurbari-logo-form.png"></h3>
                        </div>
                    </div>
					<div class="sb-biodata-field">
						<h2>শিক্ষাগত যোগ্যতা</h2>
					</div>
					<div class="sb-biodata-option">
                        <div class="shosurbari-biodata-field">
							<label for="edu-method">মাধ্যমিক/সমমান কোন মাদ্ধমে পড়েছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="scndry_edu_method" id="secondary_edu_method" required>
                                <option hidden selected></option>
                                <option value="কওমী মাদ্রাসা">কওমী মাদ্রাসা</option>
								<option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
                                <option value="জেনারেল">জেনারেল</option>
                                <option value="ভোকেশনাল">ভোকেশনাল</option>
								<option value="মাধ্যমিক পড়িনাই">মাধ্যমিক পড়িনাই</option>
							</select>
						</div>
						<!-- For Kowmi Madrasa -->
						<div class="shosurbari-biodata-field" id="hafez_field">
							<label for="hafez">আপনি কি হাফেজ/হাফেজা?<span class="form-required" title="This field is required.">*</span></label>
							<select name="qawmi_madrasa_hafez" id="hafez">
                                <option hidden selected></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না">না</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field" id="dawra_pass_field">
							<label for="dawra_pass">দাওরায়ে হাদিস পাস করেছেন? (মাস্টার্স)<span class="form-required" title="This field is required.">*</span></label>
							<select name="qawmimadrasa_dawrapass" id="dawra_pass">
                                <option hidden selected></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
								<option value="না, বাদ দিয়েছি">না, বাদ দিয়েছি</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field" id="dawra_passing_year_field">
							<label for="dawra_passing_year">দাওরায়ে হাদিস পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="kowmi_dawrapas_year" id="dawra_passing_year">
                                <option hidden selected></option>
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
						<div class="shosurbari-biodata-field" id="current_edu_level_field">
							<label for="current_edu_level">মাদ্রাসায় বর্তমান অধ্যায়নরত জামাত<span class="form-required" title="This field is required.">*</span></label>
							<select name="kowmi_current_edu_level" id="current_edu_level">
                                <option hidden selected></option>
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
						<div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_pass">
							<label for="secondary_pass">মাধ্যমিক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrl_mdrs_secondary_pass" id="secondary_pass">
                                <option hidden selected></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, পরীক্ষার্থী">না, পরীক্ষার্থী</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
								<option value="না, অধ্যায়ন বাদ দিয়েছি">না, অধ্যায়ন বাদ দিয়েছি</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_pass_year">
							<label for="gnrl_mdrs_scnd_pass_year">মাধ্যমিক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrl_mdrs_secondary_pass_year" id="gnrl_mdrs_scnd_pass_year">
                                <option hidden selected></option>
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
						<div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_exam_year">
							<label for="gnrl_mdrs_scnd_exam_year">মাধ্যমিক/সমমান বোর্ড পরীক্ষার বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrl_mdrs_secondary_end_year" id="gnrl_mdrs_scnd_exam_year">
                                <option hidden selected></option>
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
						<div class="shosurbari-biodata-field" id="gnrl_mdrs_running_stdn">
							<label for="gnrl_mdrs_running_stdn">মাধ্যমিক/সমমান বর্তমান অধ্যায়নরত ক্লাস<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="gnrlmdrs_secondary_running_std" id="gnrl_mdrs_running_stdn"  value="" class="form-text required">
						</div>
						<div class="shosurbari-biodata-field" id="higher_seconday_edumethod">
							<label for="higherscndry_edumethod">বর্তমান শিক্ষাগত যোগ্যতা<span class="form-required" title="This field is required.">*</span></label>
							<select name="higher_secondary_edu_method" id="higherscndry_edumethod">
                                <option hidden selected></option>
								<option></option>
								<option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
								<option value="উচ্চমাধ্যমিক অধ্যায়নরত">উচ্চমাধ্যমিক অধ্যায়নরত</option>
								<option value="উচ্চমাধ্যমিক পাস">উচ্চমাধ্যমিক পাস</option>
                                <option value="ডিপ্লোমা অধ্যায়নরত">ডিপ্লোমা অধ্যায়নরত</option>
                                <option value="ডিপ্লোমা পাস">ডিপ্লোমা পাস</option>
								<option value="স্নাতক/অনার্স অধ্যায়নরত">স্নাতক/অনার্স অধ্যায়নরত</option>
								<option value="স্নাতক/অনার্স পাস">স্নাতক/অনার্স পাস</option>
								<option value="স্নাতকোত্তর/মাস্টার্স অধ্যায়নরত">স্নাতকোত্তর/মাস্টার্স অধ্যায়নরত</option>
								<option value="স্নাতকোত্তর/মাস্টার্স পাস">স্নাতকোত্তর/মাস্টার্স পাস</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field" id="current_max_subject">
							<label for="current_max_sub">সাবজেক্ট/গ্রুপের নাম লিখুন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="current_max_edu_subject" id="current_max_sub"  value="" class="form-text required">
						</div>
						<div class="shosurbari-biodata-field" id="current_inst">
							<label for="current_max_inst">শিক্ষা প্রতিষ্ঠানের নাম লিখুন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="current_max_institute" id="current_max_inst"  value="" class="form-text required">
						</div>
						<div class="shosurbari-biodata-field" id="current_passyear">
							<label for="current_max_passyear">পাসের বর্ষ<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (কত সালে পাস করেছেন সিলেক্ট করুন অথবা আপনি যদি চলমান শিক্ষার্থী হয়ে থাকেন তাহলে আপনার সম্ভাব্য পাসের বর্ষ সিলেক্ট করুন)</span></label>
							<select name="current_max_pass_year" id="current_max_passyear">
								<option hidden selected></option>
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
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edu-method">অন্যান্য শিক্ষাগত যোগ্যতা<span style="color: gray; font-size:14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<textarea type="text" rows="8"  name="others_edu_qualification" id="others_edu_qualification" class="form-text-describe"></textarea>
						</div>
					</div>
				</div>
				<script>
					// Function to show or hide sections based on the selected value
					function toggleSections() {
						var selectedValue = document.getElementById("secondary_edu_method").value;
						//Madrasa
						document.getElementById("dawra_pass_field").style.display = "none";
						document.getElementById("dawra_passing_year_field").style.display = "none";
						document.getElementById("current_edu_level_field").style.display = "none";
						document.getElementById("hafez_field").style.display = "none";
						//Secondary
						document.getElementById("gnrl_mdrs_scnd_pass").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";  
						document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";
						//Higher Secondary
						document.getElementById("higher_seconday_edumethod").style.display = "none";
                        document.getElementById("current_max_subject").style.display = "none";
                        document.getElementById("current_inst").style.display = "none";
                        document.getElementById("current_passyear").style.display = "none";
						//Madrasa
						var dawraPassField = document.getElementById("dawra_pass_field");
						var dawraPassingYearField = document.getElementById("dawra_passing_year_field");
						var currentEduLevelField = document.getElementById("current_edu_level_field");
						var hafezField = document.getElementById("hafez_field");
						//Secondary
						var gnrlMdrsScndPass = document.getElementById("gnrl_mdrs_scnd_pass");
						var gnrlMdrsScndPassYear = document.getElementById("gnrl_mdrs_scnd_pass_year");
						var gnrlMdrsScndExamYear = document.getElementById("gnrl_mdrs_scnd_exam_year");
						var gnrMmdrsRunningStdn = document.getElementById("gnrl_mdrs_running_stdn");
						//Higher Secondary
						var higherSecondayEdumethod = document.getElementById("higher_seconday_edumethod");
                        var currentMaxSubject = document.getElementById("current_max_subject");
                        var currentInst = document.getElementById("current_inst");
                        var currentPassyear = document.getElementById("current_passyear");
						// 1
						var selects = dawraPassField.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
						// 2
						var selects = dawraPassingYearField.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
						// 3
						var inputs = currentEduLevelField.getElementsByTagName("input");
						for (var j = 0; j < inputs.length; j++) {
						inputs[j].value = ""; 
						}
						var selects = currentEduLevelField.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
						// 4
						var selects = hafezField.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
						// 5 Noo Need for Max edu
						// 6
						var selects = gnrlMdrsScndPass.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
						// 7
						var selects = gnrlMdrsScndPassYear.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
						// 8
						var selects = gnrlMdrsScndExamYear.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
						// 9
						var selects = gnrMmdrsRunningStdn.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
						// 10
						var selects = higherSecondayEdumethod.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
                        var inputs = currentMaxSubject.getElementsByTagName("input");
						for (var j = 0; j < inputs.length; j++) {
						inputs[j].value = ""; 
						}
                        var inputs = currentInst.getElementsByTagName("input");
						for (var j = 0; j < inputs.length; j++) {
						inputs[j].value = ""; 
						}
						var selects = currentPassyear.getElementsByTagName("select");
						for (var k = 0; k < selects.length; k++) {
						selects[k].selectedIndex = 0; 
						}
						// Show or hide
						if (selectedValue === "কওমী মাদ্রাসা") {
							document.getElementById("hafez_field").style.display = "block";
							document.getElementById("dawra_pass_field").style.display = "block";
							document.getElementById("dawra_passing_year_field").style.display = "none";
							document.getElementById("current_edu_level_field").style.display = "none";
						}
						// Show or hide
						else if (selectedValue === "জেনারেল" || selectedValue === "আলিয়া মাদ্রাসা" || selectedValue === "ভোকেশনাল") {
							document.getElementById("gnrl_mdrs_scnd_pass").style.display = "block";
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
                        document.getElementById("current_max_subject").style.display = "none";
                        document.getElementById("current_inst").style.display = "none";
                        document.getElementById("current_passyear").style.display = "none";
						}
						else if (selectValue === "না, পরীক্ষার্থী") {
						//1
						document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "block";
						document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";
						document.getElementById("higher_seconday_edumethod").style.display = "none";

                        document.getElementById("current_max_subject").style.display = "none";
                        document.getElementById("current_inst").style.display = "none";
                        document.getElementById("current_passyear").style.display = "none";
						}
						else if (selectValue === "না, অধ্যায়নরত আছি") {
						//1
						document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";
						document.getElementById("gnrl_mdrs_running_stdn").style.display = "block";
						//2
						document.getElementById("higher_seconday_edumethod").style.display = "none";
                        document.getElementById("current_max_subject").style.display = "none";
                        document.getElementById("current_inst").style.display = "none";
                        document.getElementById("current_passyear").style.display = "none";
						}
						else if (selectValue === "না, অধ্যায়ন বাদ দিয়েছি") {
						//1
						document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
						document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";
						document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";
						//2
						document.getElementById("higher_seconday_edumethod").style.display = "none";
                        document.getElementById("current_max_subject").style.display = "none";
                        document.getElementById("current_inst").style.display = "none";
                        document.getElementById("current_passyear").style.display = "none";
						}
					}
					// Function to show or hide fields based on the selected value of dawra_pass_field
					function toggleHrsecondaryFields() {
						var selecteValue = document.getElementById("higherscndry_edumethod").value;
                        document.getElementById("current_max_subject").style.display = "none";
                        document.getElementById("current_inst").style.display = "none";
                        document.getElementById("current_passyear").style.display = "none";
						// Show or hide fields based on the selected value
						if (selecteValue === "উচ্চমাধ্যমিক অধ্যায়নরত" || selecteValue === "উচ্চমাধ্যমিক পাস" || selecteValue === "ডিপ্লোমা অধ্যায়নরত" || selecteValue === "ডিপ্লোমা পাস" || selecteValue === "স্নাতক/অনার্স অধ্যায়নরত" || selecteValue === "স্নাতক/অনার্স পাস" || selecteValue === "স্নাতকোত্তর/মাস্টার্স অধ্যায়নরত" || selecteValue === "স্নাতকোত্তর/মাস্টার্স পাস") {
						//1
                        document.getElementById("current_max_subject").style.display = "block";
                        document.getElementById("current_inst").style.display = "block";
                        document.getElementById("current_passyear").style.display = "block";
						}
						else if (selecteValue === "অধ্যায়ন বাদ দিয়েছি") {
						//1
                        document.getElementById("current_max_subject").style.display = "none";
                        document.getElementById("current_inst").style.display = "none";
                        document.getElementById("current_passyear").style.display = "none";
						}
					}
					// Attach the functions to the onchange events of the dropdowns
					document.getElementById("secondary_edu_method").onchange = toggleSections;
					document.getElementById("dawra_pass").onchange = toggleDawraFields;
					document.getElementById("gnrl_mdrs_scnd_pass").onchange = toggleSecondaryFields;
					document.getElementById("higher_seconday_edumethod").onchange = toggleHrsecondaryFields;
					document.getElementById("gnrl_mdrs_hrscnd_pass").onchange = toggleHrgnrmdrsFields;
					// Trigger the functions initially to set the initial state
					toggleSections();
					toggleDawraFields();
					toggleSecondaryFields();
					toggleHrsecondaryFields();
					toggleHrgnrmdrsFields();
				</script>
				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
			</fieldset>
			<!-- END -  Educational Qualifications  / sb-biodata-3  -->
			<!-- START - Address Details  /  sb-biodata-4  -->
			<fieldset>
				<div class="sb-biodata" id="addressDetails">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
							<h3> <img src="images/shosurbari-logo-form.png"></h3>
                        </div>
                    </div>
					<div class="sb-biodata-field">
						<h2>বর্তমান এবং স্থায়ী ঠিকানা</h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>আপনি কোন দেশের স্থায়ী নাগরিক/সিটিজেন<span class="form-required" title="This field is required.">*</span></label>
							<select name="country_present_address" required>
							<option hidden selected></option>
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
							<label>বাংলাদেশে স্থায়ী ঠিকানা-বিভাগ<span class="form-required" title="This field is required.">*</span></label>
							<select name="permanent_division" required onchange="showSection(this.value)">
								<option hidden selected></option>
								<option value="ঢাকা">ঢাকা</option>
								<option value="চট্টগ্রাম">চট্টগ্রাম</option>
								<option value="খুলনা">খুলনা</option>
								<option value="ময়মনসিংহ">ময়মনসিংহ</option>
								<option value="রাজশাহী">রাজশাহী</option>
								<option value="রংপুর">রংপুর</option>
								<option value="বরিশাল">বরিশাল</option>
								<option value="সিলেট">সিলেট</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="বরিশাল" style="display: none;">
							<label>বাংলাদেশে স্থায়ী ঠিকানা-জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_barishal">
								<option hidden selected></option>
								<option></option>
								<option value="ঝালকাঠী">ঝালকাঠী</option>
								<option value="পটুয়াখালী">পটুয়াখালী</option> 
								<option value="পিরোজপুর">পিরোজপুর</option>
								<option value="বরিশাল">বরিশাল</option> 
								<option value="বরগুনা">বরগুনা</option>
								<option value="ভোলা">ভোলা</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="চট্টগ্রাম" style="display: none;">
							<label>বাংলাদেশে স্থায়ী ঠিকানা-জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_chattogram">
								<option hidden selected></option>
								<option></option>
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
							<label>বাংলাদেশে স্থায়ী ঠিকানা-জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_dhaka">
							<option hidden selected></option>
							<option></option>
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
							<label>বাংলাদেশে স্থায়ী ঠিকানা-জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_khulna">
								<option hidden selected></option>
								<option></option>
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
							<label>বাংলাদেশে স্থায়ী ঠিকানা-জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_mymensingh">
								<option hidden selected></option>
								<option></option>
								<option value="জামালপুর">জামালপুর</option>
								<option value="নেত্রকোনা">নেত্রকোনা</option>
								<option value="ময়মনসিংহ">ময়মনসিংহ</option> 
								<option value="শেরপুর">শেরপুর</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section" id="রাজশাহী" style="display: none;">
							<label>স্বাংলাদেশে থায়ী ঠিকানা-জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_rajshahi">
								<option hidden selected></option>
								<option></option>
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
							<label>বাংলাদেশে স্থায়ী ঠিকানা-জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_rangpur">
								<option hidden selected></option>
								<option></option>
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
							<label>বাংলাদেশে স্থায়ী ঠিকানা-জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_sylhet">
								<option hidden selected></option>
								<option></option>
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
							var selects = selectedDivisionSection.getElementsByTagName("select");
							for (var k = 0; k < selects.length; k++) {
							selects[k].selectedIndex = 0; 
							}
							}
						</script>
						<div class="shosurbari-biodata-field">
							<label>বর্তমান যেখানে থাকেন শুধুমাত্র থানা এবং জেলার নাম লিখুন<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 12px;" class="form-required" title="This field is required."> (আপনি যদি বিদেশে থাকেন তাহলে- আপনার শহর এবং দেশের নাম লিখুন)</span></label>
							<input type="text" name="present_address_location"   value="" class="form-text required" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>উক্ত বর্তমান ঠিকানায় যেই উদ্দেশ্যে থাকা হয়?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span> </label>
							<textarea type="text" rows="8" name="present_address_living_purpose" value="" class="form-text-describe" required></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>বাল্যকালে যেই ঠিকানায় বড় হয়েছেন শুধুমাত্র থানা এবং জেলার নাম লিখুন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="childhood" value="" class="form-text required" required>
						</div>
					</div>
				</div>
				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
			</fieldset>
			<!-- END - Address Details  /  sb-biodata-4  -->
			<!-- START - Family Information  / sb-biodata-5  -->
			<fieldset>
				<div class="sb-biodata" id="familyInfo">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
							<h3> <img src="images/shosurbari-logo-form.png"></h3>
                        </div>
                    </div>
					<div class="sb-biodata-field">
						<h2>পারিবারিক ও সামাজিক তথ্য</h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>বাবার নাম<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text"  name="father_name" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>বাবা বেঁচে আছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="father_alive" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>বাবার পেশা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="fatheroccupation" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>মা বেঁচে আছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="mother_alive"  value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>মায়ের পেশা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="motheroccupation"  value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>ভাইবোন কয়জন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="brosis_number"  value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>ভাইবোন সম্পর্কিত তথ্য<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="brosis_info" value="" class="form-text-describe" required></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>মামা/চাচাদের পেশা<span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<textarea type="text" rows="8" name="uncle_profession" value="" class="form-text-describe"></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পরিবারের প্রধান অভিভাবক কে?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="family_major_guardian" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পারিবারিক অর্থনৈতিক অবস্থা<span class="form-required" title="This field is required.">*</span></label>
							<select name="family_class" required>
								<option hidden selected></option>
								<option value="উচ্চবিত্ত">উচ্চবিত্ত</option>
								<option value="মধ্যবিত্ত">মধ্যবিত্ত</option>
								<option value="নিম্ন মধ্যবিত্ত">নিম্ন মধ্যবিত্ত</option>  
								<option value="নিম্নবিত্ত">নিম্নবিত্ত</option>  
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পারিবারিক অর্থনৈতিক অবস্থার উৎস বর্ণনা করুন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="financial_condition" value="" class="form-text-describe" required></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পরিবারের সকলের সামাজিক এবং ধর্মীয় মূল্যবোধ কেমন? সামাজিক এবং ধর্মীয় যেই বিষয় গুলো মেনে চলে বিস্তারিত লিখুন<span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<textarea type="text" rows="8" name="family_religious_condition"  value="" class="form-text-describe"></textarea>
						</div>
					</div>
				</div>
				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
			</fieldset>
			<!-- END - Family Information  / sb-biodata-5  -->
			<!-- START - Male Marriage related Info / sb-biodata-6 
			& Female Marriage related Info / sb-biodata-7  -->
			<fieldset>
				<div class="sb-biodata" id="maleMarriageInfo">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
							<h3> <img src="images/shosurbari-logo-form.png"></h3>
                        </div>
                    </div>
					<div class="sb-biodata-field">
						<h2>বিবাহ সম্পর্কিত তথ্য</h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>বৈবাহিক অবস্থা<span class="form-required" title="This field is required.">*</span></label>
							<select name="maritalstatus" required onchange="toggleMaritalStatus(this.value)">
								<option hidden selected></option>
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
								<label>ডিভোর্সের কারণ বর্ণনা করুন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea type="text" rows="8" name="divorce_reason" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Divorce Section End -->
						<!-- Widow Section Start-->
						<div class="shosurbari-biodata-field" id="widow-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label>স্বামী যেভাবে মারা গেছে এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
								<textarea type="text"  rows="8" name="how_widow" value="" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Widow Section End-->
						<!-- Widower Section Start-->
						<div class="shosurbari-biodata-field" id="widower-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label>স্ত্রী যেভাবে মারা গেছে এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
								<textarea type="text" rows="8" name="how_widower" value="" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Widower Section End-->
						<!-- Married Section Start-->
						<div class="shosurbari-biodata-field" id="married-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label>বর্তমান স্ত্রীর অনুমতি নিয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
								<input type="text"  name="get_wife_permission" value="" class="form-text">
							</div>
							<div class="shosurbari-biodata-field" id="married-family-permission">
								<label>বর্তমান স্ত্রীর পরিবার থেকে অনুমতি নিয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
								<input type="text"  name="get_family_permission" value="" class="form-text">
							</div>
							<div class="shosurbari-biodata-field" id="why-again-married">
								<label>আবার বিয়ে করার কারণ<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
								<textarea type="text" rows="8" name="why_again_married" value="" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Married Section End-->
						<!-- This Sections For Divorce + Widow + Widower + Married Start-->
						<div class="shosurbari-biodata-field" id="son-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label>কয়টি সন্তান আছে<span class="form-required" title="This field is required.">*</span></label>
								<select name="how_many_son" onchange="toggleSonDetails(this.value)">
									<option hidden selected></option>
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
								<label>সন্তান সম্পর্কিত তথ্য<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
								<textarea type="text" rows="8" name="son_details"  value="" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- This Sections For Divorce + Widow + Widower + Married End-->
						<!-- Bellow Two Sections For Male or Female -->
						<div class="shosurbari-biodata-field" id="male-allow-wife-job">
							<label>বিয়ের পর স্ত্রীকে চাকরি করতে দিতে ইচ্ছুক? (স্ত্রী যদি চায়)<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="allowjob_aftermarriage"  value="" class="form-text">
						</div>
						<!--Top Male | & | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-job-after-marriage">
							<label>বিয়ের পর চাকরি করতে চান?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="anyjob_aftermarriage" value="" class="form-text">
						</div>
						<div class="shosurbari-biodata-field" id="male-allow-wife-study">
							<label>বিয়ের পর স্ত্রীকে প্রাতিষ্ঠানিক পড়ালেখা করতে দিতে ইচ্ছুক? (স্ত্রী যদি চায়)<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="allowstudy_aftermarriage" value="" class="form-text">
						</div>
						<!--Top Male | & | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-study-after-marriage">
							<label>বিয়ের পর পড়াশোনা চালিয়ে যেতে চান?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="studies_aftermarriage"   value="" class="form-text">
						</div>
						<div class="shosurbari-biodata-field" id="male-live-with-wife">
							<label>বিয়ের পর স্ত্রীকে নিয়ে কোথায় থাকবেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="livewife_aftermarriage"  value="" class="form-text">
						</div>
						<!--Top Male | & | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-agree-marriage-student">
							<label>শিক্ষার্থী বিয়ে করতে রাজি আছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="agree_marriage_student"   value="" class="form-text">
						</div>
						<div class="shosurbari-biodata-field">
							<label>বায়োডাটা টি যার তার আপনি কে হন?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<select name="profileby" required>
								<option hidden selected></option>
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
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
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
			<!-- END - Male Marriage related Info / sb-biodata-6 
			& Female Marriage related Info / sb-biodata-7  -->
			<!-- START - Religion Details / sb-biodata-8 -->
			<fieldset>
				<div class="sb-biodata" id="religionDetails">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
							<h3> <img src="images/shosurbari-logo-form.png"></h3>
                        </div>
                    </div>
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
							<label for="about me">আপনি ধর্মীয় যেই বিষয় গুলো মেনে চলেন বিস্তারিত লিখুন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text"  rows="8" name="yourreligion_condition" value="" class="form-text-describe" placeholder="১০০% পারফেক্ট হওয়াটা অনেক চ্যালেঞ্জিং, সবার পক্ষে সম্ভব হয়ে ওঠেনা। তবে আপনি যেই বিষয় গুলো মেনে চলেন সুন্দর করে উপস্থাপন করুন..." required></textarea>
						</div>
					</div>
				</div>
				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
			</fieldset>
			<!-- END -  Religion Details / sb-biodata-8 -->
			<!-- START - Expected Life Partner / sb-biodata-9  -->
			<fieldset>
				<div class="sb-biodata" id="expectedPartner">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
							<h3> <img src="images/shosurbari-logo-form.png"></h3>
                        </div>
                    </div>
					<div class="sb-biodata-field">
						<h2>প্রত্যাশিত জীবনসঙ্গীর বিবরণ</h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>জীবনসঙ্গীর নাগরিকত্ব/সিটিজেনশিপ কোন <span style="color: black; font-size: 15px;"> দেশ</span> আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="partner_citizen" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>জীবনসঙ্গী যেই <span style="color: black; font-size: 15px;">জেলার</span> আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8"  name="partner_district" value="" class="form-text-describe" required></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বৈবাহিক অবস্থা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="partner_maritialstatus"  value=""  class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বয়স</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="partner_age" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>জীবনসঙ্গীর <span style="color: black; font-size: 15px;">শারীরিক বর্ণ</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="partner_skintones" value=""  class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>জীবনসঙ্গীর <span style="color: black; font-size: 15px;">উচ্চতা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="partner_height" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>জীবনসঙ্গীর <span style="color: black; font-size: 15px;">শিক্ষাগত যোগ্যতা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8"  name="partner_education" value="" class="form-text-describe" required></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>জীবনসঙ্গীর <span style="color: black; font-size: 15px;">পেশা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8"  name="partner_profession" value="" class="form-text-describe" required></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>জীবনসঙ্গীর <span style="color: black; font-size: 15px;">অর্থনৈতিক অবস্থা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8"  name="partner_financial" value="" class="form-text-describe" required></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>জীবনসঙ্গীর যেসব <span style="color: black; font-size: 15px;">বৈশিষ্ঠ বা গুণাবলী </span>প্রত্যাশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8"  name="partner_attributes" value="" class="form-text-describe" required></textarea>
						</div> <br>
						<div class="sb-biodata-field" style="margin-top: 15px; background: #06b6d4;">
							<h2 style="text-align: center; color: #fff; padding: 15px 0; line-height: 20px;">প্রতিশ্রুতি গ্রহণ</h2>
						</div>
						<div class="shosurbari-biodata-field">
							<label>বিয়ের জন্য পাত্র/পাত্রী দেখার বিষয়টিতে আপনার পরিবার রাজি আছে?<span class="form-required" title="This field is required.">*</span></label>
							<select name="parents_permission" required>
								<option hidden selected></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label>সৃষ্টিকর্তার শপথ করে সাক্ষ্য দিন, শুরু থেকে শেষ পর্যন্ত যে তথ্যগুলো দিয়েছেন সব সত্য?<span class="form-required" title="This field is required.">*</span></label>
							<select name="real_info_commited" required>
								<option hidden selected></option>
								<option value="আমি সাক্ষ্য দিচ্ছিযে সকল তথ্য সত্য।">আমি সাক্ষ্য দিচ্ছিযে সকল তথ্য সত্য।</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label>কোনো মিথ্যা তথ্য প্রদান করলে দুনিয়াবী আইনগত এবং পরকালের দায়ভার ShosurBri.com কর্তৃপক্ষ নিবে না। আপনি কি সম্মত?<span class="form-required" title="This field is required.">*</span></label>
							<select name="authorities_no_responsible" required>
								<option hidden selected></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
							</select>
						</div>
					</div>
				</div>
        		<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<button type="submit" id="edit-submit" name="op" class="biodata-submit"><span></span> জমাদিন</button>			
    		</fieldset> 
			<!-- END - Expected Life Partner / sb-biodata-9 -->
		</form>
		<!-- Popup message -->
		<div class="popup-message">
			<h3></h3>
			<p></p>
		</div>
		<div class="overlay"></div>
		<script>
			document.addEventListener('DOMContentLoaded', function () {
				// Function to show loading message
				function showLoadingMessage() {
					document.querySelector('.overlay').style.display = 'block';
					var popup = document.querySelector('.popup-message');
					popup.style.display = 'block';
					popup.querySelector('h3').innerHTML = 'অপেক্ষা করুন...';
					popup.querySelector('p').innerHTML = 'আপনার তথ্য জমা হচ্ছে।';
				}
				// Function to show error message
				function showErrorMessage(message) {
					document.querySelector('.overlay').style.display = 'block';
					var popup = document.querySelector('.popup-message');
					popup.style.display = 'block';
					popup.querySelector('h3').innerHTML = 'সমস্যা দেখা দিয়েছে!';
					popup.querySelector('p').innerHTML = 'অনুগ্রহ করে এডমিনের সাথে যোগাযোগ করুন।';
					// Hide the message after 5 seconds
					setTimeout(function () {
						popup.style.display = 'none';
						document.querySelector('.overlay').style.display = 'none';
					}, 12000);
				}
				// Check for error message
				<?php
				if (isset($_SESSION['error_message'])) {
					$error_message = $_SESSION['error_message'];
					unset($_SESSION['error_message']); // Clear the error message after displaying
					echo "showErrorMessage('$error_message');";
				}
				?>
				// Submit form on button click
				document.getElementById('edit-submit').addEventListener('click', function () {
					showLoadingMessage(); // Show loading message on form submission
					document.getElementById('biodataForm').submit(); // Submit the form
				});
			});
		</script>
	</div>
		<style>
      /* Popup container */
    .popup-container {
        display: none;
        position: fixed;
        top: 15%;
        left: 50%;
        transform: translateX(-50%);
		color: red;
		box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
        z-index: 9999;
    }
/* Image style */
.popup-container img {
    display: block;
    margin: 0 auto; /* Center the image horizontally */
    max-width: 100%; /* Ensure the image doesn't exceed the container width */
	box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
}
    /* Button style */
    .popup-btn {
		padding: 7px 0px;
		margin: 0px auto 0px auto;
		background: rgb(255, 221, 238);
		color: red;
		font-weight: bold;
		width: 100%;
		border: none;
		cursor: pointer;
    }
    /* Button hover effect */
    .popup-btn:hover {
		background: linear-gradient(#0aa4ca, #06b6d4);
    }
</style>
<!-- Popup container -->
<div id="popup" class="popup-container">
	<img src="images/shosurbari-biodata-notice.jpg">
    <button id="okButton" class="popup-btn">ঠিক আছে</button>
</div>
<script>
    // Get the popup container
    var popup = document.getElementById('popup');

    // Get the OK button
    var okButton = document.getElementById('okButton');

    // Show the popup
    popup.style.display = 'block';

    // Hide the popup when OK button is clicked
    okButton.addEventListener('click', function() {
        popup.style.display = 'none';
    });
</script>
	<!--View This Page. Connected to get view count -->
	<script>
		$(document).ready(function() {
		var pages = ["biodata-post"];
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
	<!-- jQuery -->
	<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<!-- jQuery easing plugin -->
	<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
	<script>
		var current_fs, next_fs, previous_fs;
		$(".next").click(function() {
			current_fs = $(this).closest("fieldset");
			next_fs = current_fs.next("fieldset");
			// Validate fields in the current fieldset
			if (!validateFields(current_fs)) {
				return;
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
			var topMargin = 40;
			if ($(window).width() <= 735) {
			topMargin = 80; // Update the scroll top value for screens under 735px
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
			var topMargin = 40;
			if ($(window).width() <= 735) {
			topMargin = 80; // Update the scroll top value for screens under 735px
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
				var errorMessage = "<span class='error-message-empty'>অপশনটি অবশ্যই পূরণ করতে হবে!</span>";
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
</body>
</html>
