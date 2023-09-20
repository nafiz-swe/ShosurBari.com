<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>

<?php
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	religion_update($id);
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
								<option hidden selected><?php echo $religion;?></option>
								<option value="ইসলাম ধর্ম">ইসলাম ধর্ম</option>
								<option value="হিন্দু ধর্ম">হিন্দু ধর্ম</option>
								<option value="খ্রিস্টান ধর্ম">খ্রিস্টান ধর্ম</option>
								<option value="বৌদ্ধ ধর্ম">বৌদ্ধ ধর্ম</option>
								<option value="অন্যান্য">অন্যান্য</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="about me">ধর্মীয় বিধিনিষেধ কতটুকু অনুসরণ করেন?<span class="form-required" title="This field is required.">*</span></label>
							<textarea rows="5" name="yourreligion_condition" placeholder="Describe Your Religious Condition" class="form-text-describe" required><?php echo $yourreligion_condition; ?></textarea>
						</div>
					</div>
				</div>

				<button type="submit" id="edit-submit" name="op" class="biodata-submit"><span></span> Submit</button>			
			</fieldset>
			<!--Fieldsets end-->
			<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
			-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
			--                   E   N   D                   --
			--        Religion Details / sb-biodata-8        --
			--                                               --
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
			-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
        </form>
	</div>
	<?php include_once("footer.php");?>
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
