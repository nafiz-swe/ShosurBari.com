<?php
include_once("includes/basic_includes.php");
require_once("includes/dbconn.php");
include_once("edit-biodata-update.php");
include_once("functions.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	partner_update();
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
	<title>Edit Partner-Admin | ShosurBari</title>
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
						<h3> <img src="../images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
						</div>
					</div>
					<div class="sb-biodata-field">
						<h2>প্রত্যাশিত জীবনসঙ্গীর বিবরণ</h2>
            			<h2>বায়োডাটা নং: <?php echo $id;?></h2>
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
        <input type="submit" name="update" value="Update">
    	</fieldset> 
		</form>
	</div>
<!-- ===== Admin Panel Footer Area ===== -->
<?php include("admin_footer.php"); ?>
<!-- =================================== -->
</body>
</html>