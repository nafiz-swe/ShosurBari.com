<?php
include_once("includes/basic_includes.php");
require_once("includes/dbconn.php");
include_once("edit-biodata-update.php");
include_once("functions.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	religion_update();
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
  <title>Edit Religion-Admin | ShosurBari</title>
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
				$sql="SELECT * FROM 8bd_religion_details WHERE user_id = $id";
				$result = mysqlexec($sql);
				if($result){
				$row=mysqli_fetch_assoc($result);
				// Check if data exists for each field and set variables accordingly
				$religion = isset($row['religion']) ? $row['religion'] : '';
				$yourreligion_condition = isset($row['yourreligion_condition']) ? $row['yourreligion_condition'] : '';
				}
			?>
			<fieldset>
				<div class="sb-biodata" id="religionDetails">
					<div class="soshurbari-animation-icon">
            <div class="sb-icon-laptop">
            <h3> <img src="../images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
            </div>
          </div>
					<div class="sb-biodata-field">
						<h2>ধর্মীয় বিষয়</h2>
            <h2>বায়োডাটা নং: <?php echo $id;?></h2>
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
							<label for="about me">ধর্মীয় বিধিনিষেধ কতটুকু অনুসরণ করেন?<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বিস্তারিত লিখুন)</span></label>
							<textarea type="text"  rows="8" name="yourreligion_condition" class="form-text-describe" required><?php echo $yourreligion_condition; ?></textarea>
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