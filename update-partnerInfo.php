<?php 
include_once("includes/basic_includes.php");
include_once("functions.php"); 
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	partner_update($id);
}
if(isloggedin()){
} else{
   header("location:login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Partner Info Update | ShosurBari</title>
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
					<li class="current-page"><h4>Update Partner Info</h4></li>
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
		<?php
			include("includes/dbconn.php");
			$sql = "SELECT * FROM 9bd_expected_life_partner WHERE user_id = $id";
			$result = mysqlexec($sql);
			if ($result) {
				$row = mysqli_fetch_assoc($result);
				// Check if data exists for each field and set variables accordingly
				$partner_citizen = isset($row['partner_citizen']) ? $row['partner_citizen'] : '';
				$partner_district = isset($row['partner_district']) ? $row['partner_district'] : '';
				$partner_maritialstatus = isset($row['partner_maritialstatus']) ? $row['partner_maritialstatus'] : '';
				$partner_age = isset($row['partner_age']) ? $row['partner_age'] : '';
				$partner_skintones = isset($row['partner_skintones']) ? $row['partner_skintones'] : '';
				$partner_height = isset($row['partner_height']) ? $row['partner_height'] : '';
				$partner_education = isset($row['partner_education']) ? $row['partner_education'] : '';
				$partner_profession = isset($row['partner_profession']) ? $row['partner_profession'] : '';
				$partner_financial = isset($row['partner_financial']) ? $row['partner_financial'] : '';
				$partner_attributes = isset($row['partner_attributes']) ? $row['partner_attributes'] : '';
				$parents_permission = isset($row['parents_permission']) ? $row['parents_permission'] : '';
				$real_info_commited = isset($row['real_info_commited']) ? $row['real_info_commited'] : '';
				$authorities_no_responsible = isset($row['authorities_no_responsible']) ? $row['authorities_no_responsible'] : '';
			}
			?>
				<fieldset>
				<div class="sb-biodata" id="expectedPartner">
					<div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
                        </div>
                    </div>
					<div class="sb-biodata-field">
						<h2>প্রত্যাশিত জীবনসঙ্গীর বিবরণ</h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর নাগরিকত্ব/সিটিজেনশিপ কোন <span style="color: black; font-size: 15px;"> দেশ</span> আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_citizen" value="<?php echo $partner_citizen; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গী যেই <span style="color: black; font-size: 15px;">জেলার</span> আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="partner_district" class="form-text-describe" required><?php echo $partner_district; ?></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বৈবাহিক অবস্থা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_maritialstatus"  value="<?php echo $partner_maritialstatus; ?>"  class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বয়স</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_age" value="<?php echo $partner_age; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">গাত্র বর্ণ</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_skintones" value="<?php echo $partner_skintones; ?>"  class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">উচ্চতা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="partner_height" value="<?php echo $partner_height; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">শিক্ষাগত যোগ্যতা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="partner_education" class="form-text-describe" required><?php echo $partner_education; ?></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">পেশা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="partner_profession" class="form-text-describe" required><?php echo $partner_profession; ?></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">অর্থনৈতিক অবস্থা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="partner_financial" class="form-text-describe" required><?php echo $partner_financial; ?></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">জীবনসঙ্গীর যেসব <span style="color: black; font-size: 15px;">বৈশিষ্ঠ বা গুণাবলী </span>প্রত্যাশা করেন<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" id="edit-name" name="partner_attributes" class="form-text-describe" required><?php echo $partner_attributes; ?></textarea>
						</div> </br>
						<div class="sb-biodata-field" style="margin-top: 15px;">
							<h2>প্রতিশ্রুতি গ্রহণ</h2>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">পরিবারের অনুমতি নিয়ে বায়োডাটা জমা দিচ্ছেন?<span class="form-required" title="This field is required.">*</span></label>
							<select name="parents_permission" required>
								<option hidden selected><?php echo $parents_permission; ?></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">সৃষ্টিকর্তার শপথ করে সাক্ষ্য দিন, শুরু থেকে শেষ পর্যন্ত যে তথ্যগুলো দিয়েছেন সব সত্য?<span class="form-required" title="This field is required.">*</span></label>
							<select name="real_info_commited" required>
								<option hidden selected><?php echo $real_info_commited; ?></option>
								<option value="আমি সাক্ষ্য দিচ্ছিযে সকল তথ্য সত্য।">আমি সাক্ষ্য দিচ্ছিযে সকল তথ্য সত্য।</option>
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label>কোনো মিথ্যা তথ্য প্রদান করলে দুনিয়াবী আইনগত এবং পরকালের দায়ভার ShosurBri.com কর্তৃপক্ষ নিবে না। আপনি কি সম্মত?<span class="form-required" title="This field is required.">*</span></label>
							<select name="authorities_no_responsible" required>
								<option hidden selected><?php echo $authorities_no_responsible; ?></option>
								<option value="হ্যাঁ">হ্যাঁ</option>
							</select>
						</div>
					</div>
				</div>
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
		var pages = ["update-partnerInfo"];
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
		// Validate the fields in the current fieldset
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