<?php
// Include necessary files and initialize the session
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
?>
<?php
error_reporting(0);
require_once("includes/dbconn.php");
if (!isset($_SESSION['id'])) {
  // Redirect the user to the login page or display an error message
  header("location: ../admin/admin_login.php");
  exit;
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - Update Family | ShosurBari</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
<!-- fa fa icon / logout icon
    ============================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<!-- ====== Admin Panel Navigation Bar ====== -->
<?php include("admin_navigation.php"); ?>
<!-- ========================================= -->


<?php
if (isset($_GET['id'])) {
    // Get the user ID from the URL
    $userId = $_GET['id'];

    // Establish a database connection (update these values with your database credentials)
    require_once("includes/dbconn.php");


    // Fetch user data for the specified user ID
    $sql = "SELECT * FROM 5bd_family_information WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Display the user data in input fields/options
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

// Handle form submission to update user data
if (isset($_POST['update'])) {
    // Retrieve the updated data from the form
    
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

    // Update user data in the database
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
        WHERE id = $userId";

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
        <!--Fieldsets start-->
        <fieldset>
            <div class="sb-biodata" id="familyInfo">
                <div class="sb-biodata-field">
                    <h2>পারিবারিক ও সামাজিক তথ্য</h2>
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
    /* margin-left: auto;
    margin-right: auto;
    display: block; */
}

html, body { /* Monitor Navigation Bar top Padding 0px */
    padding-top: 0px;
}

fieldset {
	margin-bottom: 100px;
}
</style>


  


<!-- ===== Admin Panel Footer Area ===== -->
<?php include("admin_footer.php"); ?>
<!-- =================================== -->


</body>

</html>
