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
$userId = $_SESSION['id'];
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
					<span class="divider">&nbsp;|&nbsp;</span>
					<li class="current-page"><h4>Biodata Post</h4></li>
				</ul>
			</div>
		</div>
	</div>


	
	<div class="sb-home-search">
		<h1>পাত্র-পাত্রীর সঠিক তথ্য দিন</h1>
		<div class="sbhome-heart-divider">
		<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
		<span class="grey-line"></span>
		</div>
	</div>

	<div class="shosurbari-biodata">
		<!-- multistep form -->
		<form action="" method="POST" id="biodataForm">
			<!-- progressbar -->
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

			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                S  T  A  R  T                  --
			--      Personal & Physical  / sb-biodata-1      --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->

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
			<!-- Start Fieldset -->
			<fieldset>
				<div class="sb-biodata" id="personalPhysical">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
                        </div>
                    </div>

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
							<label for="edit-name">গাত্র বর্ণ<span class="form-required" title="This field is required.">*</span></label>
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
								<option value="জানিনা">জানিনা</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">উচ্চতা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="height" value="" class="form-text" required>
						</div>
					
						<div class="shosurbari-biodata-field">
							<label for="edit-name">ওজন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="weight" value="" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">শারীরিক-মানসিক কোনো সমস্যা/রোগ আছে কি?<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="physicalstatus" value="" class="form-text-describe" required></textarea>
						</div>
					</div>
				</div>

				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
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

			<!-- Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="personalLife">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
                        </div>
                    </div>

					<div class="sb-biodata-field">
						<h2>ব্যক্তিগত তথ্য</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">ধূমপান করা হয়?<span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<select name="smoke">
								<option hidden selected></option>
								<option>...</option>
								<option value="না">না</option>
								<option value="হ্যাঁ">হ্যাঁ</option> 
								<option value="মাঝে মাঝে করা হয়">মাঝে মাঝে করা হয়</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="occupation_sector">পেশা<span class="form-required" title="This field is required.">*</span></label>
							<select name="occupation_sector" required onchange="showOccupationSector(this.value)">
								<option hidden selected></option>
								<option value="ব্যবসায়ী">ব্যবসায়ী</option>
								<option value="শিক্ষার্থী">শিক্ষার্থী</option>
								<option value="বি.এসসি. ইঞ্জিনিয়ার">বি.এসসি. ইঞ্জিনিয়ার</option>
								<option value="ডাক্তার/চিকিৎসা/স্বাস্থ্য">ডাক্তার/চিকিৎসা/স্বাস্থ্য</option>
								<option value="শিক্ষক/প্রফেসর">শিক্ষক/প্রফেসর</option>
								<option value="গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী">গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী</option>
								<option value="সার্ভিস/ব্যাংকার/ফ্রিল্যান্সার/উদ্যোক্তা">সার্ভিস/ব্যাংকার/ফ্রিল্যান্সার/উদ্যোক্তা</option>
								<option value="প্রবাসী/বিদেশে">প্রবাসী/বিদেশে</option>
								<option value="গার্মেন্টস সেক্টর">গার্মেন্টস সেক্টর</option>
								<option value="কারিগর/মিস্ত্রি">কারিগর/মিস্ত্রি</option>
								<option value="ড্রাইভার/চালক">ড্রাইভার/চালক</option>
								<option value="অন্যান্য">অন্যান্য</option>
								<option value="কিছু করিনা">কিছু করিনা</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field section"  id="অন্যান্য" style="display: none;">
							<label>পেশার নাম <span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="other_occupation_sector" value="" class="form-text">
						</div>

						<div class="shosurbari-biodata-field section"  id="ব্যবসায়ী" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="business_occupation_level" value="" class="form-text">
						</div>

						<div class="shosurbari-biodata-field section" id="শিক্ষার্থী" style="display: none;">
							<label >পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="student_occupation_level">
								<option hidden selected></option>
								<option>...</option>
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

						<div class="shosurbari-biodata-field section" id="ডাক্তার/চিকিৎসা/স্বাস্থ্য" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="health_occupation_level">
								<option hidden selected></option>
								<option>...</option>
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

						<div class="shosurbari-biodata-field section" id="বি.এসসি. ইঞ্জিনিয়ার" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="engineer_occupation_level">
								<option hidden selected></option>
								<option>...</option>
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

						<div class="shosurbari-biodata-field section" id="শিক্ষক/প্রফেসর" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="teacher_occupation_level">
								<option hidden selected></option>
								<option>...</option>
								<option value="কওমি মাদ্রাসার শিক্ষক">কওমি মাদ্রাসার শিক্ষক</option>
								<option value="আলিয়া মাদ্রাসার শিক্ষক">আলিয়া মাদ্রাসার শিক্ষক</option>  
								<option value="স্কুল শিক্ষক">স্কুল শিক্ষক</option> 
								<option value="কলেজ শিক্ষক">কলেজ শিক্ষক</option>
								<option value="বিশ্ববিদ্যালয় প্রফেসর">বিশ্ববিদ্যালয় শিক্ষক</option>
								<option value="ডিগ্রির প্রফেসর">ডিগ্রির শিক্ষক</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="defense_occupation_level">
								<option hidden selected></option>
								<option>...</option>
								<option value="সেনাবাহিনী">সেনাবাহিনী</option> 
								<option value="বিমানবাহিনী">বিমানবাহিনী</option>
								<option value="নৌবাহিনী">নৌবাহিনী</option>
								<option value="পুলিশ">পুলিশ</option>
								<option value="ফায়ার সার্ভিস">ফায়ার সার্ভিস</option> 
								<option value="এন.এস.আই">এন.এস.আই</option>
								<option value="ডিজি.এফ.আই">ডিজি.এফ.আই</option>
								<option value="সি.আই.ডি">সি.আই.ডি</option>
								<option value="এস.বি">এস.বি</option>
								<option value="ডিবি">ডিবি</option>
								<option value="আনসার">আনসার</option>
								<option value="নিরাপত্তারক্ষী">নিরাপত্তারক্ষী</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="প্রবাসী/বিদেশে" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="foreigner_occupation_level">
								<option hidden selected></option>
								<option>...</option>
								<option value="বিদেশে চাকরি করি">বিদেশে চাকরি করি</option>
								<option value="বিদেশে কাজ করি">বিদেশে কাজ করি</option>
								<option value="বিদেশে ব্যবসা করি">বিদেশে ব্যবসা করি</option>
								<option value="বিদেশে পড়াশোনা করি">বিদেশে পড়াশোনা করি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="গার্মেন্টস সেক্টর" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="garments_occupation_level">
								<option hidden selected></option>
								<option>...</option>
								<option value="গার্মেন্টস ম্যানেজার">গার্মেন্টস ম্যানেজার</option>
								<option value="গার্মেন্টস বায়িং হাউস">গার্মেন্টস বায়িং হাউস</option>
								<option value="গার্মেন্টস শ্রমিক">গার্মেন্টস শ্রমিক</option> 
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="ড্রাইভার/চালক" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="driver_occupation_level">
								<option hidden selected></option>
								<option>...</option>
								<option value="পাঠাও/উবার রাইডার">পাঠাও/উবার রাইডার</option>
								<option value="বাস ড্রাইভার">বাস ড্রাইভার</option> 
								<option value="মাইক্রো বাস ড্রাইভার">মাইক্রো বাস ড্রাইভার</option> 
								<option value="কার ড্রাইভার">কার ড্রাইভার</option> 
								<option value="ট্রাক ড্রাইভার">ট্রাক ড্রাইভার</option>
								<option value="CNG চালক">CNG চালক</option> 
								<option value="অটো চালক">অটো চালক</option>
								<option value="রিক্সা চালক">রিক্সা চালক</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="সার্ভিস/ব্যাংকার/ফ্রিল্যান্সার/উদ্যোক্তা" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="service_andcommon_occupation_level">
								<option hidden selected></option>
								<option>...</option>
								<option value="HR">HR</option>
								<option value="ব্যাংকার">ব্যাংকার</option>
								<option value="আইনজীবী">আইনজীবী</option> 
								<option value="উদ্যোক্তা">উদ্যোক্তা</option> 
								<option value="ফ্রিল্যান্সার">ফ্রিল্যান্সার</option>
								<option value="ইউটিউবার">ইউটিউবার</option>
								<option value="গ্রাফিক্স ডিজাইনার">গ্রাফিক্স ডিজাইনার</option>
								<option value="সেলস & মার্কেটিং(SR)">সেলস & মার্কেটিং(SR)</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="কারিগর/মিস্ত্রি" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="mistri_occupation_level">
							<option hidden selected></option>
							<option>...</option>
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
      var occupationSections = document.getElementsByClassName("shosurbari-biodata-field section");
      for (var i = 0; i < occupationSections.length; i++) {
        occupationSections[i].style.display = "none";

        // Clear the value of input and select fields inside the hidden section
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

						<!-- <script>
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
						</script> -->

									

						<div class="shosurbari-biodata-field" id="occupation_describe_field" style="display: none;">
							<label>পেশার বিস্তারিত তথ্য<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="occupation_describe"  value="" id="edit-name" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label>ঘরের বাহিরে সাধারণত কি ধরণের পোষাক পরেন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text"  rows="8" name="dress_code"  value="" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label>ব্যক্তিগত ইচ্ছা, শখ, স্বপ্ন, পছন্দ-অপছন্দ, রুচিবোধ ইত্যাদি বিষয়ে লিখুন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="aboutme" value="" class="form-text-describe" required></textarea>
						</div><br>

						<div class="shosurbari-biodata-field">
							<p style="text-align: justify;"><i class="fa fa-bell" style="color: #0aa4ca; margin-right: 10px;"></i>নিচে অবশ্যই একটিভ মোবাইল নাম্বার এবং 
								ই-মেইল লিখবেন। আগ্রহী ইউজার আপনার এই বায়োডাটাটি পছন্দ করার পর, তার পেমেন্ট তথ্য যাচাই-বাছাই করে শ্বশুরবাড়ি ডটকমের 
								কাস্টমার সার্ভিস থেকে এই বায়োডাটার অভিভাবক কে কল করবে। অভিভাবক অনুমতি দিলে আগ্রহী ইউজারকে ২৪ ঘন্টার মধ্যে অভিভাবকের মোবাইল নাম্বার প্রদান করা হবে।
								আগ্রহী ইউজারকে পাত্র-পাত্রীর মোবাইল নাম্বার প্রদান করা হয় না। তবে অভিভাবক অনুমতি দিলে আগ্রহী ইউজারকে পাত্র-পাত্রীর ই-মেইল প্রদান করা হবে।
							</p>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">পাত্র/পাত্রীর নাম<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text" id="edit-name" name="groom_bride_name" value="" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">পাত্র/পাত্রীর ই-মেইল<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text" id="edit-name" name="groom_bride_email" value="" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">পাত্র/পাত্রীর মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text" id="edit-name" name="groom_bride_number" value="" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">অভিভাবকের মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text" id="edit-name" name="groom_bride_family_number" value="" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">উক্ত মোবাইল নাম্বারটি যেই অভিভাবকের তার নাম লিখুন এবং অভিভাবক পাত্র/পাত্রীর কে হয়?<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text" id="edit-name" name="family_member_name_relation" value="" class="form-text" required>
						</div>

					</div>
				</div>

				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
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



			<!-- Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="educationalQualifications">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
                        </div>
                    </div>

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
							<label for="highest_qualification">সর্বোচ্চ শিক্ষাগত যোগ্যতা<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8"  id="maxedu_qualification" name="maxedu_qulfctn" value="" class="form-text-describe"></textarea>
						</div>

						<!-- For Kowmi Madrasa -->
						<div class="shosurbari-biodata-field" id="hafez_field">
							<label for="hafez">আপনি কি হাফেজ/হাফেজা?<span class="form-required" title="This field is required.">*</span></label>
							<select name="qawmi_madrasa_hafez" id="hafez">
								<option hidden selected></option>
								<option>...</option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না">না</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="dawra_pass_field">
							<label for="dawra_pass">দাওরায়ে হাদিস পাস করেছেন? (মাস্টার্স)<span class="form-required" title="This field is required.">*</span></label>
							<select name="qawmimadrasa_dawrapass" id="dawra_pass">
								<option hidden selected></option>
								<option>...</option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
								<option value="না, বাদ দিয়েছি">না, বাদ দিয়েছি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="dawra_passing_year_field">
							<label for="dawra_passing_year">দাওরায়ে হাদিস পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="kowmi_dawrapas_year" id="dawra_passing_year">
								<option hidden selected></option>
								<option>...</option>
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
								<option>...</option>
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
								<option>...</option>
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
								<option>...</option>
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
								<option>...</option>
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
							<input type="text" name="gnrlmdrs_secondary_running_std" id="gnrl_mdrs_running_stdn"  value="" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="higher_seconday_edumethod">
							<label for="higherscndry_edumethod">উচ্চমাধ্যমিক/সমমান শিক্ষার মাধ্যম<span class="form-required" title="This field is required.">*</span></label>
							<select name="higher_secondary_edu_method" id="higherscndry_edumethod">
								<option hidden selected></option>
								<option>...</option>
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
								<option>...</option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, পরীক্ষার্থী">না, পরীক্ষার্থী</option>
								<option value="না, এখনো অধ্যায়নরত">না, এখনো অধ্যায়নরত</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_pass_year">
							<label for="edu-method">উচ্চমাধ্যমিক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_pass_year">
								<option hidden selected></option>
								<option>...</option>
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
								<option>...</option>
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
								<option>...</option>
								<option value="বিজ্ঞান">বিজ্ঞান শাখা</option>
								<option value="মানবিক শাখা">মানবিক শাখা</option>
								<option value="ব্যবসা ও বাণিজ্য শাখা">ব্যবসা ও বাণিজ্য শাখা</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="hrgnrl_mdrs_running_stdn">
							<label for="hrgnrl_mdrs_running_stdn">উচ্চমাধ্যমিক/সমমানে বর্তমান অধ্যায়নরত ক্লাস<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="gnrlmdrs_hrsecondary_rningstd" id="hrgnrl_mdrs_running_stdn" value="" class="form-text required">
						</div>
						<!--Higher Seconday Education End -->


						<!--Diploma Higher Seconday Start -->
						<div class="shosurbari-biodata-field" id="doploma_hrscnd_pass">
							<label for="doploma_hrscdmethod">ডিপ্লোমা পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_pass" id="doploma_hrscdmethod">
								<option hidden selected></option>
								<option>...</option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="doploma_hrscnd_pass_year">
							<label for="doploma_hrscnd_pass_year">ডিপ্লোমা পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_pass_year">
								<option hidden selected></option>
								<option>...</option>
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
							<input type="text" name="diploma_hrsecondary_sub" value="" id="diploma_secondary_subject" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="doploma_hrscnd_exam_year">
							<label for="edu-method">ডিপ্লোমা অধ্যায়ন সম্পন্ন হবে<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_endingyear">
								<option hidden selected></option>
								<option>...</option>
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
								<option>...</option>
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
								<option>...</option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="varsity_pass_year">
							<label for="edu-method">স্নাতক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="varsity_passing_year">
								<option hidden selected></option>
								<option>...</option>
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
							<input type="text" name="university_subject" id="varsity_subject"  value="" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="varsity_exam_year">
							<label for="edu-method">স্নাতক/সমমান অধ্যায়ন সম্পন্ন হবে<span class="form-required" title="This field is required.">*</span></label>
							<select name="varsity_ending_year">
								<option hidden selected></option>
								<option>...</option>
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
							<input type="text" name="uvarsity_name" value="" id="university_name" class="form-text required">
						</div>
						<!-- University Education End -->

						<div class="shosurbari-biodata-field">
							<label for="edu-method">অন্যান্য শিক্ষাগত যোগ্যতা<span style="color: gray; font-size:14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<textarea type="text" rows="8"  name="others_edu_qualification" value="" id="others_edu_qualification" class="form-text-describe"></textarea>
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
				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
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

			<!--Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="addressDetails">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
                        </div>
                    </div>

					<div class="sb-biodata-field">
						<h2>বর্তমান এবং স্থায়ী ঠিকানা</h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">আপনি কোন দেশের স্থায়ী নাগরিক/সিটিজেন<span class="form-required" title="This field is required.">*</span></label>
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
						<script>
							jQuery('.selectsearch').chosen();
						</script>
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
								<option>...</option>
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
								<option>...</option>
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
							<option>...</option>
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
							<option>...</option>
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
							<label>বাংলাদেশে স্থায়ী ঠিকানা-জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_mymensingh">
								<option hidden selected></option>
								<option>...</option>
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
								<option>...</option>
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
								<option>...</option>
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
								<option>...</option>
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
							<label for="edit-name">বর্তমানে যেখানে থাকেন পুরো ঠিকানা লিখুন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="present_address_location" id="edit-name"  value="" class="form-text required" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>উক্ত বর্তমান ঠিকানায় কোন উদ্দেশ্যে থাকা হয়, আপনার সাথে পরিবারের সদস্য থাকছে কিনা এবং সেখানে কত দিন যাবৎ থাকছেন?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span> </label>
							<textarea type="text" rows="8" name="present_address_living_purpose" value="" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">বাল্যকালে কোন ঠিকানায় বড় হয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="childhood" value="" class="form-text required" required>
						</div>
					</div>
				</div>

				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
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
			<!--Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="familyInfo">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
                        </div>
                    </div>

					<div class="sb-biodata-field">
						<h2>পারিবারিক ও সামাজিক তথ্য</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>পরিবারের প্রধান অভিভাবক কে?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="family_major_guardian" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">বাবার নাম<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
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
							<label>মামা/চাচাদের পেশা<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="uncle_profession" value="" class="form-text-describe" required></textarea>
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
							<label>পরিবারের অর্থনৈতিক অবস্থার বর্ণনা<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="financial_condition" value="" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label>পরিবারের সকলের সামাজিক এবং ধর্মীয় মূল্যবোধ কেমন? সামাজিক এবং ধর্মীয় বিধিনিষেধ কত টুকু মেনে চলে?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
							<textarea type="text" rows="8" name="family_religious_condition"  value="" class="form-text-describe" required></textarea>
						</div>
					</div>
				</div>

				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
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

			<!--Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="maleMarriageInfo">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
                        </div>
                    </div>
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

						<!-- Divorce Section Start -->
						<div class="shosurbari-biodata-field" id="divorce-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">ডিভোর্সের কারণ বর্ণনা করুন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea type="text" rows="8" name="divorce_reason" value="" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Divorce Section End -->


						<!-- Widow Section Start-->
						<div class="shosurbari-biodata-field" id="widow-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">স্বামী যেভাবে মারা গেছেন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea type="text"  rows="8" name="how_widow" value="" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Widow Section End-->


						<!-- Widower Section Start-->
						<div class="shosurbari-biodata-field" id="widower-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">স্ত্রী যেভাবে মারা গেছেন এবং কতদিন সংসার করেছেন?<span class="form-required" title="This field is required.">*</span></label>
								<textarea type="text" rows="8" name="how_widower" value="" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Widower Section End-->


						<!-- Married Section Start-->
						<div class="shosurbari-biodata-field" id="married-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">বর্তমান স্ত্রীর অনুমতি নিয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
								<input type="text" id="edit-name" name="get_wife_permission" value="" class="form-text">
							</div>

							<div class="shosurbari-biodata-field">
								<label for="edit-name">আপনার ও বর্তমান স্ত্রীর পরিবার থেকে অনুমতি নিয়েছেন?<span class="form-required" title="This field is required.">*</span></label>
								<input type="text" id="edit-name" name="get_family_permission" value="" class="form-text">
							</div>

							<div class="shosurbari-biodata-field">
								<label for="edit-name">আবার বিয়ে করার কারণ<span class="form-required" title="This field is required.">*</span></label>
								<textarea type="text" rows="8" name="why_again_married" value="" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- Married Section End-->


						<!-- This Sections For Divorce + Widow + Widower + Married Start-->
						<div class="shosurbari-biodata-field" id="son-section" style="display: none;">
							<div class="shosurbari-biodata-field">
								<label for="edit-name">কয়টি সন্তান আছে<span class="form-required" title="This field is required.">*</span></label>
								<select name="how_many_son" onchange="toggleSonDetails(this.value)">
									<option hidden selected></option>
									<option>...</option>
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
								<textarea type="text" rows="8" name="son_details"  value="" class="form-text-describe"></textarea>
							</div>
						</div>
						<!-- This Sections For Divorce + Widow + Widower + Married End-->



						<!-- Bellow Two Sections For Male or Female -->
						<div class="shosurbari-biodata-field" id="male-allow-wife-job">
							<label for="edit-name">বিয়ের পর স্ত্রীকে চাকরি করতে দিতে ইচ্ছুক?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="allowjob_aftermarriage"  value="" class="form-text">
						</div>
						<!--Top Male | & | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-job-after-marriage">
							<label for="edit-name">বিয়ের পর চাকরি করতে চান?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="anyjob_aftermarriage" value="" class="form-text">
						</div>

						<div class="shosurbari-biodata-field" id="male-allow-wife-study">
							<label for="edit-name">বিয়ের পর স্ত্রীকে প্রাতিষ্ঠানিক পড়ালেখা করতে দিতে ইচ্ছুক?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="allowstudy_aftermarriage" value="" class="form-text">
						</div>
						<!--Top Male | & | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-study-after-marriage">
							<label for="edit-name">বিয়ের পর পড়াশোনা চালিয়ে যেতে চান?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="studies_aftermarriage"   value="" class="form-text">
						</div>
						
						<div class="shosurbari-biodata-field" id="male-live-with-wife">
							<label for="edit-name">বিয়ের পর স্ত্রীকে নিয়ে কোথায় থাকবেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="livewife_aftermarriage"  value="" class="form-text">
						</div>
						<!--Top Male | & | Bellow Female-->
						<div class="shosurbari-biodata-field" id="female-agree-marriage-student">
							<label for="edit-name">শিক্ষার্থী বিয়ে করতে রাজি আছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="agree_marriage_student"   value="" class="form-text">
						</div>
						<div class="shosurbari-biodata-field" id="female-agree-marriage-student">
							<label for="edit-name">অন্য ধর্মের অনুসারী যে কাওকে বিয়ে করতে রাজি হবেন যদি সে আপনার ধর্ম গ্রহণ করে?<span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<input type="text" id="edit-name" name="agree_marriage_other_religion"   value="" class="form-text">
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">বায়োডাটা টি যার তার আপনি কে হন?<span class="form-required" title="This field is required.">*</span></label>
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


			<!--7 fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="religionDetails">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
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
							<label for="about me">ধর্মীয় বিধিনিষেধ কতটুকু অনুসরণ করেন?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
							<textarea type="text"  rows="8" name="yourreligion_condition" value="" class="form-text-describe" required></textarea>
						</div>
					</div>
				</div>

				<input type="button" name="previous" class="previous action-button" value="পূর্বের ধাপ" />
				<input type="button" name="next" class="next action-button" value="পরবর্তী ধাপ" />
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

			<!--Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="expectedPartner">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
                        </div>
                    </div>

					<div class="sb-biodata-field">
						<h2>প্রত্যাশিত জীবনসঙ্গীর বিবরণ</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর নাগরিকত্ব/সিটিজেনশিপ কোন <span style="color: black; font-size: 15px;"> দেশ</span> আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_citizen" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গী যেই <span style="color: black; font-size: 15px;">জেলার</span> আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="partner_district" value="" class="form-text-describe" required></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বৈবাহিক অবস্থা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_maritialstatus"  value=""  class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বয়স</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_age" value="" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">গাত্র বর্ণ</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_skintones" value=""  class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">উচ্চতা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_height" value="" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">শিক্ষাগত যোগ্যতা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="partner_education" value="" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">পেশা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="partner_profession" value="" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">অর্থনৈতিক অবস্থা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="partner_financial" value="" class="form-text-describe" required></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর যেসব <span style="color: black; font-size: 15px;">বৈশিষ্ঠ বা গুণাবলী </span>প্রত্যাশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="partner_attributes" value="" class="form-text-describe" required></textarea>
						</div>

						<div class="sb-biodata-field" style="margin-top: 15px;">
							<h2>প্রতিশ্রুতি গ্রহণ</h2>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">পরিবারের অনুমতি নিয়ে বায়োডাটা জমা দিচ্ছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="parents_permission" required>
								<option hidden selected></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">সৃষ্টিকর্তার শপথ করে সাক্ষ্য দিন, শুরু থেকে শেষ পর্যন্ত যে তথ্যগুলো দিয়েছেন সব সত্য?<span class="form-required" title="This field is required.">*</span></label>
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
	var pages = ["biodata-post"];

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