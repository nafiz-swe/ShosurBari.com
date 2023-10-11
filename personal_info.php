<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>

<?php
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	personal_info_update($id);
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
					<span class="divider">&nbsp;<|>&nbsp;</span>
					<li class="current-page"><h4>Edit Biodata</h4></li>
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
								<option hidden selected><?php echo $smoke;?></option>
								<option value="না">না</option>
								<option value="হ্যাঁ">হ্যাঁ</option> 
								<option value="মাঝে মাঝে করা হয়">মাঝে মাঝে করা হয়</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="occupation_sector">পেশা<span class="form-required" title="This field is required.">*</span></label>
							<select name="occupation_sector" required onchange="showOccupationSector(this.value)">
								<option hidden selected><?php echo $occupation_sector;?></option>
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
							<input type="text"  name="other_occupation_sector" value="<?php echo $other_occupation_sector;?>" placeholder="Enter your Occupation Sector" value="<?php echo $weight; ?>" size="100" maxlength="100" class="form-text">
						</div>

						<div class="shosurbari-biodata-field section"  id="Business" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="business_occupation_level" placeholder="Enter your Business name" value="<?php echo $business_occupation_level; ?>" size="100" maxlength="100" class="form-text">
						</div>

						<div class="shosurbari-biodata-field section" id="Student" style="display: none;">
							<label >পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="student_occupation_level">
								<option hidden selected><?php echo $student_occupation_level;?></option>
								<option></option>
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
								<option hidden selected><?php echo $health_occupation_level;?></option>
								<option></option>
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
								<option hidden selected><?php echo $engineer_occupation_level;?></option>
								<option></option>
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
								<option hidden selected><?php echo $teacher_occupation_level;?></option>
								<option></option>
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
								<option hidden selected><?php echo $defense_occupation_level;?></option>
								<option></option>
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
								<option hidden selected><?php echo $foreigner_occupation_level;?></option>
								<option></option>
								<option value="বিদেশে চাকরি করি">বিদেশে চাকরি করি</option>
								<option value="বিদেশে কাজ করি">বিদেশে কাজ করি</option>
								<option value="বিদেশে ব্যবসা করি">বিদেশে ব্যবসা করি</option>
								<option value="বিদেশে পড়াশোনা করি">বিদেশে পড়াশোনা করি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="Garments" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="garments_occupation_level">
								<option hidden selected><?php echo $garments_occupation_level;?></option>
								<option></option>
								<option value="গার্মেন্টস ম্যানেজার">গার্মেন্টস ম্যানেজার</option>
								<option value="গার্মেন্টস বায়িং হাউস">গার্মেন্টস বায়িং হাউস</option>
								<option value="গার্মেন্টস শ্রমিক">গার্মেন্টস শ্রমিক</option> 
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="Driver" style="display: none;">
							<label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
							<select name="driver_occupation_level">
								<option hidden selected><?php echo $driver_occupation_level;?></option>
								<option></option>
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
								<option hidden selected><?php echo $service_andcommon_occupation_level;?></option>
								<option></option>
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
							<option hidden selected><?php echo $mistri_occupation_level;?></option>
							<option></option>
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
							<textarea rows="5" name="occupation_describe" id="edit-name" placeholder="Describe your Occupation" class="form-text-describe" ><?php echo $occupation_describe; ?></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label>ঘর ও ঘরের বাহিরে কেমন ধরণের পোশাক পরেন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="dress_code" placeholder="Describe your Dress Code" class="form-text-describe" required><?php echo $dress_code; ?></textarea>
						</div>

						<div class="shosurbari-biodata-field">
							<label>আপনার সম্পর্কে কিছু লিখুন<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="aboutme" placeholder="Write about you" class="form-text-describe" required><?php echo $aboutme; ?></textarea>
						</div>

						
						<div class="shosurbari-biodata-field">
							<label for="edit-name">পাত্র/পাত্রীর ইমেইল<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required.">(এই অপশন লুকায়িত থাকবে)</span></label>
							<input type="text" id="edit-name" name="groom_bride_email" value="" size="100" maxlength="100" class="form-text" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">পাত্র/পাত্রীর মোবাইল নাম্বার <span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required.">(এই অপশন লুকায়িত থাকবে)</span></label>
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

				<button type="submit" id="edit-submit" name="op" class="biodata-submit"><span></span> Submit</button>			
			</fieldset>
			<!-- Fieldsets end-->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--     Personal & Life Style  / sb-biodata-2     --
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
	var pages = ["personal_info"];

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
