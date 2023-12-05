<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>

<?php
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	education_update($id);
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
<title>Edit Biodata | ShosurBari</title>
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
					<li class="current-page"><h4>Edit Biodata</h4></li>
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


	<div class="shosurbari-biodata">
		<!-- multistep form -->
		<form action="" method="POST" id="biodataForm">
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
					$scndry_edu_method=$row['scndry_edu_method'];
					}
					if($row){
					$higher_secondary_edu_method=$row['higher_secondary_edu_method'];
					}
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
								<option hidden selected><?php echo $scndry_edu_method;?></option>
								<option></option>
								<option value="জেনারেল">জেনারেল</option>
								<option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
								<option value="ভোকেশনাল">ভোকেশনাল</option>
								<option value="কওমি মাদ্রাসা">কওমি মাদ্রাসা</option>
								<option value="মাধ্যমিক পড়িনাই">মাধ্যমিক পড়িনাই</option>
								<option value="অন্যান্য">অন্যান্য</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field"  id="maxedu_qualification">
							<label for="highest_qualification">আপনার সর্বোচ্চ শিক্ষাগত যোগ্যতা?<span style="color: gray; font-size:14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<input type="text" id="maxedu_qualification" name="maxedu_qulfctn" value="<?php echo $maxedu_qulfctn;?>" size="250" maxlength="250" class="form-text required">
						</div>

						<!-- For Kowmi Madrasa -->
						<div class="shosurbari-biodata-field" id="hafez_field">
							<label for="hafez">আপনি কি হাফেজ/হাফেজা?<span class="form-required" title="This field is required.">*</span></label>
							<select name="qawmi_madrasa_hafez" id="hafez">
								<option hidden selected><?php echo $qawmi_madrasa_hafez;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না">না</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="dawra_pass_field">
							<label for="dawra_pass">দাওরায়ে হাদিস পাস করেছেন? (মাস্টার্স)<span class="form-required" title="This field is required.">*</span></label>
							<select name="qawmimadrasa_dawrapass" id="dawra_pass">
								<option hidden selected><?php echo $qawmimadrasa_dawrapass;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
								<option value="না, বাদ দিয়েছি">না, বাদ দিয়েছি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="dawra_passing_year_field">
							<label for="dawra_passing_year">দাওরায়ে হাদিস পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="kowmi_dawrapas_year" id="dawra_passing_year">
								<option hidden selected><?php echo $kowmi_dawrapas_year;?></option>
								<option></option>
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
								<option hidden selected><?php echo $kowmi_current_edu_level;?></option>
								<option></option>
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
								<option hidden selected><?php echo $gnrl_mdrs_secondary_pass;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, পরীক্ষার্থী">না, পরীক্ষার্থী</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
								<option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_pass_year">
							<label for="gnrl_mdrs_scnd_pass_year">মাধ্যমিক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrl_mdrs_secondary_pass_year" id="gnrl_mdrs_scnd_pass_year">
								<option hidden selected><?php echo $gnrl_mdrs_secondary_pass_year;?></option>
								<option></option>
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
								<option hidden selected><?php echo $gnrl_mdrs_secondary_end_year;?></option>
								<option></option>
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
							<input type="text" name="gnrlmdrs_secondary_running_std" id="gnrl_mdrs_running_stdn"  value="<?php echo $gnrlmdrs_secondary_running_std;?>" size="250" maxlength="250" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="higher_seconday_edumethod">
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
						<div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_pass">
							<label for="hrsecondary_pass">উচ্চমাধ্যমিক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_pass" id="hrsecondary_pass">
								<option hidden selected><?php echo $gnrlmdrs_hrsecondary_pass;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, পরীক্ষার্থী">না, পরীক্ষার্থী</option>
								<option value="না, এখনো অধ্যায়নরত">না, এখনো অধ্যায়নরত</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_pass_year">
							<label for="edu-method">উচ্চমাধ্যমিক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="gnrlmdrs_hrsecondary_pass_year">
								<option hidden selected><?php echo $gnrlmdrs_hrsecondary_pass_year;?></option>
								<option></option>
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
								<option hidden selected><?php echo $gnrlmdrs_hrsecondary_exam_year;?></option>
								<option></option>
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
								<option hidden selected><?php echo $gnrlmdrs_hrsecondary_group;?></option>
								<option></option>
								<option value="বিজ্ঞান">বিজ্ঞান শাখা</option>
								<option value="মানবিক শাখা">মানবিক শাখা</option>
								<option value="ব্যবসা ও বাণিজ্য শাখা">ব্যবসা ও বাণিজ্য শাখা</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="hrgnrl_mdrs_running_stdn">
							<label for="hrgnrl_mdrs_running_stdn">উচ্চমাধ্যমিক/সমমানে বর্তমান অধ্যায়নরত ক্লাস<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="gnrlmdrs_hrsecondary_rningstd" id="hrgnrl_mdrs_running_stdn" value="<?php echo $gnrlmdrs_hrsecondary_rningstd;?>" size="250" maxlength="250" class="form-text required">
						</div>
						<!--Higher Seconday Education End -->


						<!--Diploma Higher Seconday Start -->
						<div class="shosurbari-biodata-field" id="doploma_hrscnd_pass">
							<label for="doploma_hrscdmethod">ডিপ্লোমা পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_pass" id="doploma_hrscdmethod">
								<option hidden selected><?php echo $diploma_hrsecondary_pass;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="doploma_hrscnd_pass_year">
							<label for="doploma_hrscnd_pass_year">ডিপ্লোমা পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_pass_year">
								<option hidden selected><?php echo $diploma_hrsecondary_pass_year;?></option>
								<option></option>
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
							<input type="text" name="diploma_hrsecondary_sub" value="<?php echo $diploma_hrsecondary_sub;?>" id="diploma_secondary_subject"   size="250" maxlength="250" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="doploma_hrscnd_exam_year">
							<label for="edu-method">ডিপ্লোমা অধ্যায়ন সম্পন্ন হবে<span class="form-required" title="This field is required.">*</span></label>
							<select name="diploma_hrsecondary_endingyear">
								<option hidden selected><?php echo $diploma_hrsecondary_endingyear;?></option>
								<option></option>
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


						<!-- Higher Education Start -->
						<div class="shosurbari-biodata-field" id="varsity_pass">
							<label for="university_pass">স্নাতক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="uvarsity_pass" id="university_pass">
								<option hidden selected><?php echo $uvarsity_pass;?></option>
								<option></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
								<option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
							</select>
						</div>

						<div class="shosurbari-biodata-field" id="varsity_pass_year">
							<label for="edu-method">স্নাতক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
							<select name="varsity_passing_year">
								<option hidden selected><?php echo $varsity_passing_year;?></option>
								<option></option>
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
							<input type="text" name="university_subject" id="varsity_subject"  value="<?php echo $university_subject;?>" size="250" maxlength="250" class="form-text required">
						</div>

						<div class="shosurbari-biodata-field" id="varsity_exam_year">
							<label for="edu-method">স্নাতক/সমমান অধ্যায়ন সম্পন্ন হবে<span class="form-required" title="This field is required.">*</span></label>
							<select name="varsity_ending_year">
								<option hidden selected><?php echo $varsity_ending_year;?></option>
								<option></option>
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
							<input type="text" name="uvarsity_name" id="university_name"  value="<?php echo $uvarsity_name;?>" size="250" maxlength="250" class="form-text required">
						</div>
						<!-- Higher Education End -->

						<div class="shosurbari-biodata-field">
							<label for="edu-method">অন্যান্য শিক্ষাগত যোগ্যতা<span style="color: gray; font-size:14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
							<textarea rows="4"  name="others_edu_qualification" value="<?php echo $others_edu_qualification;?>"  id="others_edu_qualification" placeholder="Describe your others education qualifications" class="form-text-describe"></textarea>
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
				<button type="submit" id="edit-submit" name="op" class="biodata-submit"><span></span> আপডেট করুন</button>			
			</fieldset>
			<!--3 fieldsets end-->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--  Educational Qualifications  / sb-biodata-3   --
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
	var pages = ["education"];

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
		$('html, body').animate({ scrollTop: $('#progressbar').offset().top }, 800);
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
		$('html, body').animate({ scrollTop: $('#progressbar').offset().top }, 800);
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
