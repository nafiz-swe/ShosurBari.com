<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
error_reporting(0);
if (!isset($_SESSION['id'])) {
  header("location: ../abdur-rahman/admin_login.php");
  exit;
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
  <title>Edit Religion-Admin | ShosurBari</title>
</head>
<body>
<!-- ====== Admin Panel Navigation Bar ====== -->
<?php include("admin_navigation.php"); ?>
<!-- ========================================= -->
<style>
input[type=submit] {
	cursor: pointer;
	height: 35px;
	width: 400px;
	margin-top: 10px;
	background: linear-gradient(#06b6d4, #0ea5e9);
	border: 1px solid #ccc;
	border-radius: 4px;
	color: #fff;
	box-shadow: 1px 1px 4px #888;
}
html, body {
	padding-top: 0px;
}
fieldset {
	margin-bottom: 100px;
}
</style>
<?php
	if (isset($_GET['id'])) {
	// Get the user ID from the URL
	$userId = $_GET['id'];
	require_once("includes/dbconn.php");
  // Fetch user data for the specified user ID
  $sql = "SELECT * FROM 8bd_religion_details WHERE user_id = $userId";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];
		$religion = $row['religion'];
		$yourreligion_condition = $row['yourreligion_condition'];
  } else {
  echo 'User not found.';
  mysqli_close($conn);
  exit;
  }
  if (isset($_POST['update'])) {
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $yourreligion_condition = mysqli_real_escape_string($conn, $_POST['yourreligion_condition']);
    $updateSql = "UPDATE 8bd_religion_details SET
      religion = '$religion',
      yourreligion_condition = '$yourreligion_condition'
    WHERE user_id = $userId";
    if (mysqli_query($conn, $updateSql)) {
      echo 'User data updated successfully.';
    } else {
      echo 'Error updating user data: ' . mysqli_error($conn);
    }
  }
  mysqli_close($conn);
  } else {
  echo 'User ID not specified.';
  exit;
  }
?>
<div class="shosurbari-biodata">
  <form action="" method="POST" id="biodataForm">
    <fieldset>
      <div class="sb-biodata" id="religionDetails">
        <div class="sb-biodata-field">
          <h2>ধর্মীয় বিষয়</h2>
          <h2>বায়োডাটা নং: <?php echo $user_id;?></h2>
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
            <textarea rows="5" name="yourreligion_condition" class="form-text-describe" required><?php echo $yourreligion_condition; ?></textarea>
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