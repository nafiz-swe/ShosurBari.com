<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
error_reporting(0);
if (!isset($_SESSION['admin_id'])) {
  header("location: ../abdur-rahman/admin_login.php");
  exit;
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
  <title>Edit Family-Admin | ShosurBari</title>
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
  $sql = "SELECT * FROM 5bd_family_information WHERE user_id = $userId";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];
    $father_name = $row['father_name'];
    $father_alive = $row['father_alive'];
    $fatheroccupation = $row['fatheroccupation'];
    $mother_alive = $row['mother_alive'];
    $motheroccupation = $row['motheroccupation'];
    $brosis_number = $row['brosis_number'];
    $brosis_info = $row['brosis_info'];
    $uncle_profession = $row['uncle_profession'];
    $family_class = $row['family_class'];
    $financial_condition = $row['financial_condition'];
    $family_religious_condition = $row['family_religious_condition'];                
  } else {
    echo 'User not found.';
    mysqli_close($conn);
    exit;
  }
  if (isset($_POST['update'])) {
    $father_name = mysqli_real_escape_string($conn, $_POST['father_name']);
    $father_alive = mysqli_real_escape_string($conn, $_POST['father_alive']);
    $fatheroccupation = mysqli_real_escape_string($conn, $_POST['fatheroccupation']);
    $mother_alive = mysqli_real_escape_string($conn, $_POST['mother_alive']);
    $motheroccupation = mysqli_real_escape_string($conn, $_POST['motheroccupation']);
    $brosis_number = mysqli_real_escape_string($conn, $_POST['brosis_number']);
    $brosis_info = mysqli_real_escape_string($conn, $_POST['brosis_info']);
    $uncle_profession = mysqli_real_escape_string($conn, $_POST['uncle_profession']);
    $family_class = mysqli_real_escape_string($conn, $_POST['family_class']);
    $financial_condition = mysqli_real_escape_string($conn, $_POST['financial_condition']);
    $family_religious_condition = mysqli_real_escape_string($conn, $_POST['family_religious_condition']);
    $updateSql = "UPDATE 5bd_family_information SET
      father_name = '$father_name',
      father_alive = '$father_alive',
      fatheroccupation = '$fatheroccupation',
      mother_alive = '$mother_alive',
      motheroccupation = '$motheroccupation',
      brosis_number = '$brosis_number',
      brosis_info = '$brosis_info',
      uncle_profession = '$uncle_profession',
      family_class = '$family_class',
      financial_condition = '$financial_condition',
      family_religious_condition = '$family_religious_condition'
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
      <div class="sb-biodata" id="familyInfo">
        <div class="sb-biodata-field">
          <h2>পারিবারিক ও সামাজিক তথ্য</h2>
          <h2>বায়োডাটা নং: <?php echo $user_id;?></h2>
        </div>
        <div class="sb-biodata-option">
          <div class="shosurbari-biodata-field">
            <label>বাবার নাম<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" name="father_name" value="<?php echo $father_name; ?>" size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label>বাবা বেঁচে আছেন?<span class="form-required" title="This field is required.">*</span></label>
            <input type="text"  name="father_alive" value="<?php echo $father_alive; ?>" size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label>বাবার পেশা<span class="form-required" title="This field is required.">*</span></label>
            <input type="text"  name="fatheroccupation" value="<?php echo $fatheroccupation; ?>" size="200" maxlength="200" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label>মা বেঁচে আছেন?<span class="form-required" title="This field is required.">*</span></label>
            <input type="text"  name="mother_alive"  value="<?php echo $mother_alive; ?>"  size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label>মায়ের পেশা<span class="form-required" title="This field is required.">*</span></label>
            <input type="text"  name="motheroccupation"  value="<?php echo $motheroccupation; ?>"  size="200" maxlength="200" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label>ভাইবোন কয়জন<span class="form-required" title="This field is required.">*</span></label>
            <input type="text"  name="brosis_number"  value="<?php echo $brosis_number; ?>"  size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label>ভাইবোন সম্পর্কিত তথ্য<span class="form-required" title="This field is required.">*</span></label>
            <textarea rows="8" name="brosis_info"   placeholder="" class="form-text-describe" required><?php echo $brosis_info; ?></textarea>
          </div>
          <div class="shosurbari-biodata-field">
            <label>মামা/চাচাদের পেশা<span class="form-required" title="This field is required.">*</span></label>
            <textarea rows="8" name="uncle_profession"  placeholder="" class="form-text-describe" required><?php echo $uncle_profession; ?></textarea>
          </div>
          <div class="shosurbari-biodata-field">
            <label>পারিবারিক শ্রেণী<span class="form-required" title="This field is required.">*</span></label>
            <select name="family_class" required>
              <option hidden selected><?php echo $family_class; ?></option>
              <option value="উচ্চ শ্রেণী">উচ্চ শ্রেণী</option>
              <option value="উচ্চ মধ্যম শ্রেণী">উচ্চ মধ্যম শ্রেণী</option> 
              <option value="মধ্যম শ্রেণী">মধ্যম শ্রেণী</option>
              <option value="নিম্নমধ্যম শ্রেণী">নিম্নমধ্যম শ্রেণী</option>
              <option value="নিম্ন শ্রেণী">নিম্ন শ্রেণী</option>  
            </select>
          </div>
          <div class="shosurbari-biodata-field">
            <label>পরিবারের অর্থনৈতিক অবস্থা কেমন?<span class="form-required" title="This field is required.">*</span></label>
            <textarea rows="5" name="financial_condition" placeholder="" class="form-text-describe" required><?php echo $financial_condition; ?></textarea>
          </div>
          <div class="shosurbari-biodata-field">
            <label>পরিবারের ধর্মীয় ও সামাজিক অবস্থা কেমন?<span class="form-required" title="This field is required.">*</span></label>
            <textarea rows="5" name="family_religious_condition"  placeholder="" class="form-text-describe" required><?php echo $family_religious_condition; ?></textarea>
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