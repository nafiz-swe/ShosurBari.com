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
  <title>Edit Partner-Admin | ShosurBari</title>
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
  $sql = "SELECT * FROM 9bd_expected_life_partner WHERE user_id = $userId";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];
		$partner_religius = $row['partner_religius'];
    $partner_citizen = $row['partner_citizen'];
		$partner_district = $row['partner_district'];
		$partner_maritialstatus = $row['partner_maritialstatus'];
		$partner_age = $row['partner_age'];
		$partner_skintones = $row['partner_skintones'];
		$partner_height = $row['partner_height'];
		$partner_education = $row['partner_education'];
		$partner_profession = $row['partner_profession'];
		$partner_financial = $row['partner_financial'];
		$partner_attributes = $row['partner_attributes'];
    $parents_permission = $row['parents_permission'];
		$real_info_commited = $row['real_info_commited'];
		$authorities_no_responsible = $row['authorities_no_responsible'];
            
  } else {
  echo 'User not found.';
  mysqli_close($conn);
  exit;
  }
  if (isset($_POST['update'])) {
    $partner_religius = mysqli_real_escape_string($conn, $_POST['partner_religius']);
    $partner_citizen = mysqli_real_escape_string($conn, $_POST['partner_citizen']);
    $partner_district = mysqli_real_escape_string($conn, $_POST['partner_district']);
    $partner_maritialstatus = mysqli_real_escape_string($conn, $_POST['partner_maritialstatus']);
    $partner_age = mysqli_real_escape_string($conn, $_POST['partner_age']);
    $partner_skintones = mysqli_real_escape_string($conn, $_POST['partner_skintones']);
    $partner_height = mysqli_real_escape_string($conn, $_POST['partner_height']);
    $partner_education = mysqli_real_escape_string($conn, $_POST['partner_education']);
    $partner_profession = mysqli_real_escape_string($conn, $_POST['partner_profession']);
    $partner_financial = mysqli_real_escape_string($conn, $_POST['partner_financial']);
    $partner_attributes = mysqli_real_escape_string($conn, $_POST['partner_attributes']);
    $parents_permission = mysqli_real_escape_string($conn, $_POST['parents_permission']);
    $real_info_commited = mysqli_real_escape_string($conn, $_POST['real_info_commited']);
    $authorities_no_responsible = mysqli_real_escape_string($conn, $_POST['authorities_no_responsible']);
    $updateSql = "UPDATE 9bd_expected_life_partner SET
      partner_religius = '$partner_religius',
      partner_citizen = '$partner_citizen',
      partner_district = '$partner_district',
      partner_maritialstatus = '$partner_maritialstatus',
      partner_age = '$partner_age',
      partner_skintones = '$partner_skintones',
      partner_height = '$partner_height',
      partner_education = '$partner_education',
      partner_profession = '$partner_profession',
      partner_financial = '$partner_financial',
      partner_attributes = '$partner_attributes',
      parents_permission = '$parents_permission',
      real_info_commited = '$real_info_commited',
      authorities_no_responsible = '$authorities_no_responsible'
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
      <div class="sb-biodata" id="expectedPartner">
        <div class="sb-biodata-field">
          <h2>প্রত্যাশিত জীবনসঙ্গীর বিবরণ</h2>
          <h2>বায়োডাটা নং: <?php echo $user_id;?></h2>
        </div>
        <div class="sb-biodata-option">
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গীর নাগরিকত্ব/সিটিজেনশিপ কোন <span style="color: black; font-size: 15px;"> দেশ</span> আশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="edit-name" name="partner_citizen" value="<?php echo $partner_citizen; ?>"  size="1000" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গী যেই <span style="color: black; font-size: 15px;">জেলার</span> আশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="edit-name" name="partner_district" value="<?php echo $partner_district; ?>"  size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বৈবাহিক অবস্থা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="edit-name" name="partner_maritialstatus"  value="<?php echo $partner_maritialstatus; ?>"  size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">বয়স</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="edit-name" name="partner_age" value="<?php echo $partner_age; ?>"  size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">শারীরিক বর্ণ</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="edit-name" name="partner_skintones"  value="<?php echo $partner_skintones; ?>" size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">উচ্চতা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="edit-name" name="partner_height"  value="<?php echo $partner_height; ?>"  size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">শিক্ষাগত যোগ্যতা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="edit-name" name="partner_education"  value="<?php echo $partner_education; ?>"  size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">পেশা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="edit-name" name="partner_profession"  value="<?php echo $partner_profession; ?>"  size="200" maxlength="200" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">অর্থনৈতিক অবস্থা</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="edit-name" name="partner_financial"  value="<?php echo $partner_financial; ?>"  size="100" maxlength="100" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গীর <span style="color: black; font-size: 15px;">ধর্মীয় বিষয়াবলী</span> যেমনটা আশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <textarea rows="8" id="edit-name" name="partner_religius" placeholder="" class="form-text-describe" required><?php echo $partner_religius; ?></textarea>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">জীবনসঙ্গীর যেসব <span style="color: black; font-size: 15px;">বৈশিষ্ঠ বা গুণাবলী </span>প্রত্যাশা করেন<span class="form-required" title="This field is required.">*</span></label>
            <textarea rows="8" id="edit-name" name="partner_attributes" placeholder="" class="form-text-describe" required><?php echo $partner_attributes; ?></textarea>
          </div>
          <div class="sb-biodata-field" style="margin-top: 15px;">
            <h2>প্রতিশ্রুতি গ্রহণ</h2>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">পরিবারের অনুমতি নিয়ে বায়োডাটা জমা দিচ্ছেন?<span class="form-required" title="This field is required.">*</span></label>
            <select name="parents_permission" required>
              <option hidden selected><?php echo $parents_permission;?></option>
              <option value="হ্যাঁ">হ্যাঁ</option>
            </select>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">সৃষ্টিকর্তার শপথ করে সাক্ষ্য দিন, শুরু থেকে শেষ পর্যন্ত যে তথ্যগুলো দিয়েছেন সব সত্য?<span class="form-required" title="This field is required.">*</span></label>
            <select name="real_info_commited" required>
              <option hidden selected><?php echo $real_info_commited;?></option>
              <option value="আমি সাক্ষ্য দিচ্ছিযে সকল তথ্য সত্য।">আমি সাক্ষ্য দিচ্ছিযে সকল তথ্য সত্য।</option>
            </select>
          </div>
          <div class="shosurbari-biodata-field">
            <label>কোনো মিথ্যা তথ্য প্রদান করলে দুনিয়াবী আইনগত এবং পরকালের দায়ভার ShosurBri.com কর্তৃপক্ষ নিবে না। আপনি কি সম্মত?<span class="form-required" title="This field is required.">*</span></label>
            <select name="authorities_no_responsible" required>
              <option hidden selected><?php echo $authorities_no_responsible;?></option>
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