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


    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index.html">Dashboard</a></li>
                                        <li><a href="analytics.html">Analytics</a></li>
                                    </ul>
                                </li>

                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                    <ul class="notika-main-menu-dropdown">
                                      <li><a href="customer.php">Customer</a></li>
                                      <li><a href="contact_us.php">ContactUs</a></li>
                                      <li><a href="photos.php">Photos</a></li>
                                      <li><a href="users.php">Users</a></li>
                                      <li><a href="dataphysical_marital.php">PhysicalMarital</a></li>
                                      <li><a href="datalifestyle.php">LifeStyle</a></li>
                                      <li><a href="dataeducation.php">Edcation</a></li>
                                      <li><a href="dataaddress.php">Address</a></li>
                                      <li><a href="datareligion.php">Religion</a></li>
                                      <li><a href="datafamily.php">Family</a></li>
                                      <li><a href="datapartner.php">Partner</a></li>
                                      <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) { ?>
                                        <!-- User is logged in, show logout option -->
                                        <li><a href="admin_logout.php" style="padding: 8px 15px;"><i class="fa fa-sign-out"></i></a></li>
                                      <?php } else { ?>
                                        <!-- User is not logged in, show login option -->
                                        <li><a href="admin_login.php">Login</a></li>
                                      <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->



    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Manage</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane active in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.html">Dashboard</a>
                                </li>
                                <li><a href="analytics.html">Analytics</a>
                                </li>
                            </ul>
                        </div>

                        <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                            <li><a href="customer.php">Customer</a></li>
                              <li><a href="contact_us.php">ContactUs</a></li>
                              <li><a href="photos.php">Photos</a></li>
                              <li><a href="users.php">Users</a></li>
                              <li><a href="dataphysical_marital.php">PhysicalMarital</a></li>
                              <li><a href="datalifestyle.php">LifeStyle</a></li>
                              <li><a href="dataeducation.php">Edcation</a></li>
                              <li><a href="dataaddress.php">Address</a></li>
                              <li><a href="datareligion.php">Religion</a></li>
                              <li><a href="datafamily.php">Family</a></li>
                              <li><a href="datapartner.php">Partner</a></li>
                              <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) { ?>
                                <!-- User is logged in, show logout option -->
                                <li><a href="admin_logout.php" style="padding: 8px 15px;"><i class="fa fa-sign-out"></i></a></li>
                              <?php } else { ?>
                                <!-- User is not logged in, show login option -->
                                <li><a href="admin_login.php">Login</a></li>
                              <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->


    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Manage</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane active in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.html">Dashboard</a>
                                </li>
                                <li><a href="analytics.html">Analytics</a>
                                </li>
                            </ul>
                        </div>

                        <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="admin_login.php">Login</a>
                                </li>
                                <li><a href="customer.php">Customer</a>
                                </li>
                                <li><a href="contact_us.php">ContactUs</a>
                                </li>
                                <li><a href="photos.php">Photos</a>
                                </li>
                                <li><a href="users.php">Users</a>
                                </li>
                                <li><a href="dataphysical_marital.php">PhysicalMarital</a>
                                </li>
                                <li><a href="datalifestyle.php">LifeStyle</a>
                                </li>
                                <li><a href="dataeducation.php">Edcation</a>
                                </li>
                                <li><a href="dataaddress.php">Address</a>
                                </li>
                                <li><a href="datareligion.php">Religion</a>
                                </li>
                                <li><a href="datafamily.php">Family</a>
                                </li>
                                <li><a href="datapartner.php">Partner</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->


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
                        <textarea rows="8" name="brosis_info"   placeholder="Discribe Your Sisters & Brothers information" class="form-text-describe" required><?php echo $brosis_info; ?></textarea>
                    </div>

                    <div class="shosurbari-biodata-field">
                        <label>মামা/চাচাদের পেশা<span class="form-required" title="This field is required.">*</span></label>
                        <textarea rows="8" name="uncle_profession"  placeholder="Describe Profession of Your Uncles" class="form-text-describe" required><?php echo $uncle_profession; ?></textarea>
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
                        <textarea rows="5" name="financial_condition" placeholder="Describe Your Financial Condition" class="form-text-describe" required><?php echo $financial_condition; ?></textarea>
                    </div>

                    <div class="shosurbari-biodata-field">
                        <label>পারিবারিক ধর্মীয় ও সামাজিক অবস্থা কেমন?<span class="form-required" title="This field is required.">*</span></label>
                        <textarea rows="5" name="family_religious_condition"  placeholder="Describe Your Family's Religious Condition" class="form-text-describe" required><?php echo $family_religious_condition; ?></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" name="update" value="Update">
        </fieldset>
    </form>
</div>




<style>
.sb-biodata { /*Table body design & width*/
    border: 1px solid #ccc;
    border-radius: 6px;
    width: 400px;
    gap: 1.5rem;
    padding: 20px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 40px;
    margin-top: 100px;
    background: white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

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


    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.orderBars.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  Chat JS
		============================================ -->
	<script src="js/chat/moment.min.js"></script>
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
</body>

</html>

