<?php
include_once("includes/basic_includes.php");
require_once("includes/dbconn.php");
include_once("edit-biodata-update.php");
include_once("functions.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	family_update();
}
error_reporting(0);
if (!isset($_SESSION['admin_id'])) {
  header("location: ../abdur-rahman/admin_login.php");
  exit;
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
	<link rel="icon" href="../images/shosurbari-icon-admin.png" type="image/png">
	<title>Edit Family-Admin | ShosurBari</title>
</head>
<body>
<!-- ====== Admin Panel Navigation Bar ====== -->
<?php include("admin_navigation.php"); ?>
<!-- ========================================= -->
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
			$id = $_GET['id'];
			$sql = "SELECT * FROM 5bd_family_information WHERE user_id = $id";
			$result = mysqlexec($sql);
			if ($result) {
				$row = mysqli_fetch_assoc($result);
				// Check if data exists for each field and set variables accordingly
				$family_major_guardian = isset($row['family_major_guardian']) ? $row['family_major_guardian'] : '';
				$father_name = isset($row['father_name']) ? $row['father_name'] : '';
				$father_alive = isset($row['father_alive']) ? $row['father_alive'] : '';
				$fatheroccupation = isset($row['fatheroccupation']) ? $row['fatheroccupation'] : '';
				$mother_alive = isset($row['mother_alive']) ? $row['mother_alive'] : '';
				$motheroccupation = isset($row['motheroccupation']) ? $row['motheroccupation'] : '';
				$brosis_number = isset($row['brosis_number']) ? $row['brosis_number'] : '';
				$brosis_info = isset($row['brosis_info']) ? $row['brosis_info'] : '';
				$uncle_profession = isset($row['uncle_profession']) ? $row['uncle_profession'] : '';
				$family_class = isset($row['family_class']) ? $row['family_class'] : '';
				$financial_condition = isset($row['financial_condition']) ? $row['financial_condition'] : '';
				$family_religious_condition = isset($row['family_religious_condition']) ? $row['family_religious_condition'] : '';
				$childhood = isset($row['childhood']) ? $row['childhood'] : '';
			}
			?>
			<fieldset>
				<div class="sb-biodata" id="familyInfo">
          <div class="soshurbari-animation-icon">
            <div class="sb-icon-laptop">
              <h3> <img src="../images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
            </div>
          </div>
					<div class="sb-biodata-field">
						<h2>পারিবারিক ও সামাজিক তথ্য</h2>
            <h2>বায়োডাটা নং: <?php echo $id;?></h2>
					</div>
					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>পরিবারের প্রধান অভিভাবক কে?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="family_major_guardian" value="<?php echo $family_major_guardian; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label for="edit-name">বাবার নাম<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (অপশনটি লুকায়িত থাকবে)</span></label>
							<input type="text"  name="father_name" value="<?php echo $father_name; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>বাবা বেঁচে আছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="father_alive" value="<?php echo $father_alive; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>বাবার পেশা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="fatheroccupation" value="<?php echo $fatheroccupation; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>মা বেঁচে আছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="mother_alive"  value="<?php echo $mother_alive; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>মায়ের পেশা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="motheroccupation"  value="<?php echo $motheroccupation; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>ভাইবোন কয়জন<span class="form-required" title="This field is required.">*</span></label>
							<input type="text"  name="brosis_number"  value="<?php echo $brosis_number; ?>" class="form-text" required>
						</div>
						<div class="shosurbari-biodata-field">
							<label>ভাইবোন সম্পর্কিত তথ্য<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="brosis_info" class="form-text-describe" required><?php echo $brosis_info; ?></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>মামা/চাচাদের পেশা<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="uncle_profession" class="form-text-describe" required><?php echo $uncle_profession; ?></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পারিবারিক অর্থনৈতিক অবস্থা<span class="form-required" title="This field is required.">*</span></label>
							<select name="family_class" required>
								<option hidden selected><?php echo $family_class; ?></option>
								<option value="উচ্চবিত্ত">উচ্চবিত্ত</option>
								<option value="মধ্যবিত্ত">মধ্যবিত্ত</option>
								<option value="নিম্ন মধ্যবিত্ত">নিম্ন মধ্যবিত্ত</option>  
								<option value="নিম্নবিত্ত">নিম্নবিত্ত</option>  
							</select>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পরিবারের অর্থনৈতিক অবস্থার বর্ণনা<span class="form-required" title="This field is required.">*</span></label>
							<textarea type="text" rows="8" name="financial_condition"  class="form-text-describe" required><?php echo $financial_condition; ?></textarea>
						</div>
						<div class="shosurbari-biodata-field">
							<label>পরিবারের সকলের সামাজিক এবং ধর্মীয় মূল্যবোধ কেমন? সামাজিক এবং ধর্মীয় বিধিনিষেধ কত টুকু মেনে চলে?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
							<textarea type="text" rows="8" name="family_religious_condition" class="form-text-describe" required><?php echo $family_religious_condition; ?></textarea>
						</div>
					</div>
				</div>
				<input type="submit" name="update" value="Update">
			</fieldset>
		</form>
	</div>
<!-- ===== Admin Panel Footer Area ===== -->
<?php include("admin_footer.php"); ?>
<!-- =================================== -->
</body>
</html>