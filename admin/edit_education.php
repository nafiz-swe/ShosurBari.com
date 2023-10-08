<?php
// Include necessary files and initialize the session
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin | ShosurBari</title>
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
	<link rel="stylesheet" href="../css/style.css">
	<link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
                                      <li><a href="dataphysical_marital.php">PysicalMarital</a>
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
                                <li><a href="dataphysical_marital.php">PysicalMarital</a>
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

    // Fetch user data for the specified user ID from the 3bd_secondaryedu_method table
    $sql = "SELECT * FROM 3bd_secondaryedu_method WHERE user_id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Display the user data in input fields/options
        $scndry_edu_method = $row['scndry_edu_method'];
        $maxedu_qulfctn = $row['maxedu_qulfctn'];
        $gnrl_mdrs_secondary_pass = $row['gnrl_mdrs_secondary_pass'];
        $gnrl_mdrs_secondary_pass_year = $row['gnrl_mdrs_secondary_pass_year'];
        $gnrl_mdrs_secondary_end_year = $row['gnrl_mdrs_secondary_end_year'];
        $gnrlmdrs_secondary_running_std = $row['gnrlmdrs_secondary_running_std'];

        // Fetch additional user data from the 3bd_higher_secondaryedu_method table
        $hscSql = "SELECT * FROM 3bd_higher_secondaryedu_method WHERE user_id = $userId";
        $hscResult = $conn->query($hscSql);
        if ($hscResult->num_rows == 1) {
            $hscRow = $hscResult->fetch_assoc();
            $higher_secondary_edu_method = $hscRow['higher_secondary_edu_method'];
            $gnrlmdrs_hrsecondary_pass = $hscRow['gnrlmdrs_hrsecondary_pass'];
            $gnrlmdrs_hrsecondary_pass_year = $hscRow['gnrlmdrs_hrsecondary_pass_year'];
            $gnrlmdrs_hrsecondary_exam_year = $hscRow['gnrlmdrs_hrsecondary_exam_year'];
            $gnrlmdrs_hrsecondary_group = $hscRow['gnrlmdrs_hrsecondary_group'];
            $gnrlmdrs_hrsecondary_rningstd = $hscRow['gnrlmdrs_hrsecondary_rningstd'];
            $diploma_hrsecondary_pass = $hscRow['diploma_hrsecondary_pass'];
            $diploma_hrsecondary_pass_year = $hscRow['diploma_hrsecondary_pass_year'];
            $diploma_hrsecondary_sub = $hscRow['diploma_hrsecondary_sub'];
            $diploma_hrsecondary_endingyear = $hscRow['diploma_hrsecondary_endingyear'];
        }

        // Fetch additional user data from the 3bd_universityedu_method table
        $varsitySql = "SELECT * FROM 3bd_universityedu_method WHERE user_id = $userId";
        $varsityResult = $conn->query($varsitySql);
        if ($varsityResult->num_rows == 1) {
            $varsityRow = $varsityResult->fetch_assoc();
            $varsity_edu_method = $varsityRow['varsity_edu_method'];
            $uvarsity_pass = $varsityRow['uvarsity_pass'];
            $varsity_passing_year = $varsityRow['varsity_passing_year'];
            $university_subject = $varsityRow['university_subject'];
            $varsity_ending_year = $varsityRow['varsity_ending_year'];
            $uvarsity_name = $varsityRow['uvarsity_name'];
            $others_edu_qualification = $varsityRow['others_edu_qualification'];
        }

        // Fetch additional user data from the 3bd_kowmi_madrasaedu_method table
        $madrasaSql = "SELECT * FROM 3bd_kowmi_madrasaedu_method WHERE user_id = $userId";
        $madrasaResult = $conn->query($madrasaSql);
        if ($madrasaResult->num_rows == 1) {
            $madrasaRow = $madrasaResult->fetch_assoc();
            $qawmi_madrasa_hafez = $madrasaRow['qawmi_madrasa_hafez'];
            $qawmimadrasa_dawrapass = $madrasaRow['qawmimadrasa_dawrapass'];
            $kowmi_dawrapas_year = $madrasaRow['kowmi_dawrapas_year'];
            $kowmi_current_edu_level = $madrasaRow['kowmi_current_edu_level'];
        }
    } else {
        echo 'User not found.';
        $conn->close();
        exit;
    }

    // Handle form submission to update user data
    if (isset($_POST['update'])) {
        // Retrieve the updated data from the form
        $scndry_edu_method = $conn->real_escape_string($_POST['scndry_edu_method']);
        $maxedu_qulfctn = $conn->real_escape_string($_POST['maxedu_qulfctn']);
        $gnrl_mdrs_secondary_pass = $conn->real_escape_string($_POST['gnrl_mdrs_secondary_pass']);
        $gnrl_mdrs_secondary_pass_year = $conn->real_escape_string($_POST['gnrl_mdrs_secondary_pass_year']);
        $gnrl_mdrs_secondary_end_year = $conn->real_escape_string($_POST['gnrl_mdrs_secondary_end_year']);
        $gnrlmdrs_secondary_running_std = $conn->real_escape_string($_POST['gnrlmdrs_secondary_running_std']);

        $higher_secondary_edu_method = $conn->real_escape_string($_POST['higher_secondary_edu_method']);
        $gnrlmdrs_hrsecondary_pass = $conn->real_escape_string($_POST['gnrlmdrs_hrsecondary_pass']);
        $gnrlmdrs_hrsecondary_pass_year = $conn->real_escape_string($_POST['gnrlmdrs_hrsecondary_pass_year']);
        $gnrlmdrs_hrsecondary_exam_year = $conn->real_escape_string($_POST['gnrlmdrs_hrsecondary_exam_year']);
        $gnrlmdrs_hrsecondary_group = $conn->real_escape_string($_POST['gnrlmdrs_hrsecondary_group']);
        $gnrlmdrs_hrsecondary_rningstd = $conn->real_escape_string($_POST['gnrlmdrs_hrsecondary_rningstd']);
        $diploma_hrsecondary_pass = $conn->real_escape_string($_POST['diploma_hrsecondary_pass']);
        $diploma_hrsecondary_pass_year = $conn->real_escape_string($_POST['diploma_hrsecondary_pass_year']);
        $diploma_hrsecondary_sub = $conn->real_escape_string($_POST['diploma_hrsecondary_sub']);
        $diploma_hrsecondary_endingyear = $conn->real_escape_string($_POST['diploma_hrsecondary_endingyear']);

        $varsity_edu_method = $conn->real_escape_string($_POST['varsity_edu_method']);
        $uvarsity_pass = $conn->real_escape_string($_POST['uvarsity_pass']);
        $varsity_passing_year = $conn->real_escape_string($_POST['varsity_passing_year']);
        $university_subject = $conn->real_escape_string($_POST['university_subject']);
        $varsity_ending_year = $conn->real_escape_string($_POST['varsity_ending_year']);
        $uvarsity_name = $conn->real_escape_string($_POST['uvarsity_name']);
        $others_edu_qualification = $conn->real_escape_string($_POST['others_edu_qualification']);

        $qawmi_madrasa_hafez = $conn->real_escape_string($_POST['qawmi_madrasa_hafez']);
        $qawmimadrasa_dawrapass = $conn->real_escape_string($_POST['qawmimadrasa_dawrapass']);
        $kowmi_dawrapas_year = $conn->real_escape_string($_POST['kowmi_dawrapas_year']);
        $kowmi_current_edu_level = $conn->real_escape_string($_POST['kowmi_current_edu_level']);

        // Update the user's education data in the database
        $updateSql = "UPDATE 3bd_secondaryedu_method SET
            scndry_edu_method = '$scndry_edu_method',
            maxedu_qulfctn = '$maxedu_qulfctn',
            gnrl_mdrs_secondary_pass = '$gnrl_mdrs_secondary_pass',
            gnrl_mdrs_secondary_pass_year = '$gnrl_mdrs_secondary_pass_year',
            gnrl_mdrs_secondary_end_year = '$gnrl_mdrs_secondary_end_year',
            gnrlmdrs_secondary_running_std = '$gnrlmdrs_secondary_running_std'
            WHERE user_id = $userId";

        $updateHscSql = "UPDATE 3bd_higher_secondaryedu_method SET
            higher_secondary_edu_method = '$higher_secondary_edu_method',
            gnrlmdrs_hrsecondary_pass = '$gnrlmdrs_hrsecondary_pass',
            gnrlmdrs_hrsecondary_pass_year = '$gnrlmdrs_hrsecondary_pass_year',
            gnrlmdrs_hrsecondary_exam_year = '$gnrlmdrs_hrsecondary_exam_year',
            gnrlmdrs_hrsecondary_group = '$gnrlmdrs_hrsecondary_group',
            gnrlmdrs_hrsecondary_rningstd = '$gnrlmdrs_hrsecondary_rningstd',
            diploma_hrsecondary_pass = '$diploma_hrsecondary_pass',
            diploma_hrsecondary_pass_year = '$diploma_hrsecondary_pass_year',
            diploma_hrsecondary_sub = '$diploma_hrsecondary_sub',
            diploma_hrsecondary_endingyear = '$diploma_hrsecondary_endingyear'
            WHERE user_id = $userId";

        $updateVarsitySql = "UPDATE 3bd_universityedu_method SET
            varsity_edu_method = '$varsity_edu_method',
            uvarsity_pass = '$uvarsity_pass',
            varsity_passing_year = '$varsity_passing_year',
            university_subject = '$university_subject',
            varsity_ending_year = '$varsity_ending_year',
            uvarsity_name = '$uvarsity_name',
            others_edu_qualification = '$others_edu_qualification'
            WHERE user_id = $userId";

        $updateMadrasaSql = "UPDATE 3bd_kowmi_madrasaedu_method SET
            qawmi_madrasa_hafez = '$qawmi_madrasa_hafez',
            qawmimadrasa_dawrapass = '$qawmimadrasa_dawrapass',
            kowmi_dawrapas_year = '$kowmi_dawrapas_year',
            kowmi_current_edu_level = '$kowmi_current_edu_level'
            WHERE user_id = $userId";

        // Perform the updates
        if (
            $conn->query($updateSql) === TRUE &&
            $conn->query($updateHscSql) === TRUE &&
            $conn->query($updateVarsitySql) === TRUE &&
            $conn->query($updateMadrasaSql) === TRUE
        ) {
            echo "Education details updated successfully.";
        } else {
            echo "Error updating education details: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
} else {
    echo 'User ID not provided.';
}
?>






<div class="shosurbari-biodata">
    <!-- multistep form -->
    <form action="" method="POST" id="biodataForm">
        <!-- Fieldsets start-->
        <fieldset>
            <div class="sb-biodata" id="educationalQualifications">
                <div class="sb-biodata-field">
                    <h2>শিক্ষাগত যোগ্যতা</h2>
                </div>

                <div class="sb-biodata-option">
                    <div class="shosurbari-biodata-field">
                        <label for="edu-method">মাধ্যমিক/ সমমান কোন মাদ্ধমে পড়েছেন?<span class="form-required" title="This field is required.">*</span></label>
                        <select name="scndry_edu_method" id="secondary_edu_method" required>
                            <option hidden selected><?php echo $scndry_edu_method;?></option>
                            <option></option>
                            <option value="জেনারেল">জেনারেল</option>
                            <option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
                            <option value="ভোকেশনাল">ভোকেশনাল</option>
                            <option value="কওমি মাদ্রাসা">কওমি মাদ্রাসা</option>
                            <option value="মাধ্যমিক পড়িনাই">মাধ্যমিক পড়িনাই</option>
                            <option value="অন্যান্য">অন্যান্য</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field"  id="maxedu_qualification">
                        <label for="highest_qualification">আপনার সর্বোচ্চ শিক্ষাগত যোগ্যতা?<span class="form-required" title="This field is required.">*</span></label>
                        <input type="text" id="maxedu_qualification" name="maxedu_qulfctn" value="<?php echo $maxedu_qulfctn;?>" size="250" maxlength="250" class="form-text required">
                    </div>

                    <!-- For Kowmi Madrasa -->
                    <div class="shosurbari-biodata-field" id="hafez_field">
                        <label for="hafez">আপনি কি হাফেজ/হাফেজা?<span class="form-required" title="This field is required.">*</span></label>
                        <select name="qawmi_madrasa_hafez" id="hafez">
                            <option hidden selected><?php echo $qawmi_madrasa_hafez;?></option>
                            <option></option>
                            <option value="হ্যাঁ">হ্যাঁ</option>
                            <option value="না">না</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="dawra_pass_field">
                        <label for="dawra_pass">দাওরায়ে হাদিস পাস করেছেন? (মাস্টার্স)<span class="form-required" title="This field is required.">*</span></label>
                        <select name="qawmimadrasa_dawrapass" id="dawra_pass">
                            <option hidden selected><?php echo $qawmimadrasa_dawrapass;?></option>
                            <option></option>
                            <option value="হ্যাঁ">হ্যাঁ</option>
                            <option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
                            <option value="না, বাদ দিয়েছি">না, বাদ দিয়েছি</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="dawra_passing_year_field">
                        <label for="dawra_passing_year">দাওরায়ে হাদিস পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
                        <select name="kowmi_dawrapas_year" id="dawra_passing_year">
                            <option hidden selected><?php echo $kowmi_dawrapas_year;?></option>
                            <option></option>
                            <option value="২০২৪">২০২৪</option>
                            <option value="২০২৩">২০২৩</option>
                            <option value="২০২২">২০২২</option>
                            <option value="২০২১">২০২১</option>
                            <option value="২০২০">২০২০</option>
                            <option value="২০১৯">২০১৯</option>
                            <option value="২০১৮">২০১৮</option>
                            <option value="২০১৭">২০১৭</option>
                            <option value="২০১৬">২০১৬</option>
                            <option value="২০১৫">২০১৫</option>
                            <option value="২০১৪">২০১৪</option>
                            <option value="২০১৩">২০১৩</option>
                            <option value="২০১২">২০১২</option>
                            <option value="২০১১">২০১১</option>
                            <option value="২০১০">২০১০</option>
                            <option value="২০০৯">২০০৯</option>
                            <option value="২০০৮">২০০৮</option>
                            <option value="২০০৭">২০০৭</option>
                            <option value="২০০৬">২০০৬</option>
                            <option value="২০০৫">২০০৫</option>
                            <option value="২০০৪">২০০৪</option>
                            <option value="২০০৩">২০০৩</option>
                            <option value="২০০২">২০০২</option>
                            <option value="২০০১">২০০১</option>
                            <option value="২০০০">২০০০</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="current_edu_level_field">
                        <label for="current_edu_level">মাদ্রাসায় বর্তমান অধ্যায়নরত জামাত<span class="form-required" title="This field is required.">*</span></label>
                        <select name="kowmi_current_edu_level" id="current_edu_level">
                            <option hidden selected><?php echo $kowmi_current_edu_level;?></option>
                            <option></option>
                            <option value="জামাতে তাইসীর">জামাতে তাইসীর</option>
                            <option value="জামাতে মীযান">জামাতে মীযান</option>
                            <option value="জামাতে নাহবে মীর">জামাতে নাহবে মীর</option>
                            <option value="জামাতে হেদায়াতুন্নাহূ">জামাতে হেদায়াতুন্নাহূ</option>
                            <option value="জামাতে কাফিয়া">জামাতে কাফিয়া</option>
                            <option value="জামাতে শরহে জামী">জামাতে শরহে জামী</option>
                            <option value="জামাতে জালালাইন">জামাতে জালালাইন</option>
                            <option value="জামাতে মেশকাত">জামাতে মেশকাত</option>
                            <option value="দাওরায়ে হাদীস পরীক্ষার্থী">দাওরায়ে হাদীস পরীক্ষার্থী</option>
                        </select>
                    </div>
                    <!--Kowmi Madrasa ending -->
    

                    <!-- Secondary Education Start -->
                    <div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_pass">
                        <label for="secondary_pass">মাধ্যমিক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
                        <select name="gnrl_mdrs_secondary_pass" id="secondary_pass">
                            <option hidden selected><?php echo $gnrl_mdrs_secondary_pass;?></option>
                            <option></option>
                            <option value="হ্যাঁ">হ্যাঁ</option>
                            <option value="না, পরীক্ষার্থী">না, পরীক্ষার্থী</option>
                            <option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
                            <option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_pass_year">
                        <label for="gnrl_mdrs_scnd_pass_year">মাধ্যমিক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
                        <select name="gnrl_mdrs_secondary_pass_year" id="gnrl_mdrs_scnd_pass_year">
                            <option hidden selected><?php echo $gnrl_mdrs_secondary_pass_year;?></option>
                            <option></option>
                            <option value="২০২৪">২০২৪</option>
                            <option value="২০২৩">২০২৩</option>
                            <option value="২০২২">২০২২</option>
                            <option value="২০২১">২০২১</option>
                            <option value="২০২০">২০২০</option>
                            <option value="২০১৯">২০১৯</option>
                            <option value="২০১৮">২০১৮</option>
                            <option value="২০১৭">২০১৭</option>
                            <option value="২০১৬">২০১৬</option>
                            <option value="২০১৫">২০১৫</option>
                            <option value="২০১৪">২০১৪</option>
                            <option value="২০১৩">২০১৩</option>
                            <option value="২০১২">২০১২</option>
                            <option value="২০১১">২০১১</option>
                            <option value="২০১০">২০১০</option>
                            <option value="২০০৯">২০০৯</option>
                            <option value="২০০৮">২০০৮</option>
                            <option value="২০০৭">২০০৭</option>
                            <option value="২০০৬">২০০৬</option>
                            <option value="২০০৫">২০০৫</option>
                            <option value="২০০৪">২০০৪</option>
                            <option value="২০০৩">২০০৩</option>
                            <option value="২০০২">২০০২</option>
                            <option value="২০০১">২০০১</option>
                            <option value="২০০০">২০০০</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="gnrl_mdrs_scnd_exam_year">
                        <label for="gnrl_mdrs_scnd_exam_year">মাধ্যমিক/সমমান বোর্ড পরীক্ষার বর্ষ<span class="form-required" title="This field is required.">*</span></label>
                        <select name="gnrl_mdrs_secondary_end_year" id="gnrl_mdrs_scnd_exam_year">
                            <option hidden selected><?php echo $gnrl_mdrs_secondary_end_year;?></option>
                            <option></option>
                            <option value="২০৩০">২০৩০</option>
                            <option value="২০২৯">২০২৯</option>
                            <option value="২০২৮">২০২৮</option>
                            <option value="২০২৭">২০২৭</option>
                            <option value="২০২৬">২০২৬</option>
                            <option value="২০২৫">২০২৫</option>
                            <option value="২০২৪">২০২৪</option>
                            <option value="২০২৩">২০২৩</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="gnrl_mdrs_running_stdn">
                        <label for="gnrl_mdrs_running_stdn">মাধ্যমিক/সমমান বর্তমান অধ্যায়নরত ক্লাস<span class="form-required" title="This field is required.">*</span></label>
                        <input type="text" name="gnrlmdrs_secondary_running_std" id="gnrl_mdrs_running_stdn"  value="<?php echo $gnrlmdrs_secondary_running_std;?>" size="250" maxlength="250" class="form-text required">
                    </div>

                    <div class="shosurbari-biodata-field" id="higher_seconday_edumethod">
                        <label for="higherscndry_edumethod">উচ্চমাধ্যমিক/সমমান শিক্ষার মাধ্যম<span class="form-required" title="This field is required.">*</span></label>
                        <select name="higher_secondary_edu_method" id="higherscndry_edumethod">
                            <option hidden selected><?php echo $higher_secondary_edu_method;?></option>
                            <option></option>
                            <option value="জেনারেল">জেনারেল</option>
                            <option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
                            <option value="ডিপ্লোমা">ডিপ্লোমা</option>
                            <option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
                            <option value="অন্যান্য">অন্যান্য</option>
                        </select>
                    </div>
                    <!-- Secondary Education End -->


                    <!-- Higher Secondary start -->
                    <div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_pass">
                        <label for="hrsecondary_pass">উচ্চমাধ্যমিক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
                        <select name="gnrlmdrs_hrsecondary_pass" id="hrsecondary_pass">
                            <option hidden selected><?php echo $gnrlmdrs_hrsecondary_pass;?></option>
                            <option></option>
                            <option value="হ্যাঁ">হ্যাঁ</option>
                            <option value="না, পরীক্ষার্থী">না, পরীক্ষার্থী</option>
                            <option value="না, এখনো অধ্যায়নরত">না, এখনো অধ্যায়নরত</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_pass_year">
                        <label for="edu-method">উচ্চমাধ্যমিক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
                        <select name="gnrlmdrs_hrsecondary_pass_year">
                            <option hidden selected><?php echo $gnrlmdrs_hrsecondary_pass_year;?></option>
                            <option></option>
                            <option value="২০২৪">২০২৪</option>
                            <option value="২০২৩">২০২৩</option>
                            <option value="২০২২">২০২২</option>
                            <option value="২০২১">২০২১</option>
                            <option value="২০২০">২০২০</option>
                            <option value="২০১৯">২০১৯</option>
                            <option value="২০১৮">২০১৮</option>
                            <option value="২০১৭">২০১৭</option>
                            <option value="২০১৬">২০১৬</option>
                            <option value="২০১৫">২০১৫</option>
                            <option value="২০১৪">২০১৪</option>
                            <option value="২০১৩">২০১৩</option>
                            <option value="২০১২">২০১২</option>
                            <option value="২০১১">২০১১</option>
                            <option value="২০১০">২০১০</option>
                            <option value="২০০৯">২০০৯</option>
                            <option value="২০০৮">২০০৮</option>
                            <option value="২০০৭">২০০৭</option>
                            <option value="২০০৬">২০০৬</option>
                            <option value="২০০৫">২০০৫</option>
                            <option value="২০০৪">২০০৪</option>
                            <option value="২০০৩">২০০৩</option>
                            <option value="২০০২">২০০২</option>
                            <option value="২০০১">২০০১</option>
                            <option value="২০০০">২০০০</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="gnrl_mdrs_hrscnd_exam_year">
                        <label for="edu-method">উচ্চমাধ্যমিক/সমমান বোর্ড পরীক্ষার বর্ষ<span class="form-required" title="This field is required.">*</span></label>
                        <select name="gnrlmdrs_hrsecondary_exam_year">
                            <option hidden selected><?php echo $gnrlmdrs_hrsecondary_exam_year;?></option>
                            <option></option>
                            <option value="২০৩০">২০৩০</option>
                            <option value="২০২৯">২০২৯</option>
                            <option value="২০২৮">২০২৮</option>
                            <option value="২০২৭">২০২৭</option>
                            <option value="২০২৬">২০২৬</option>
                            <option value="২০২৫">২০২৫</option>
                            <option value="২০২৪">২০২৪</option>
                            <option value="২০২৩">২০২৩</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="higher_seconday_group">
                        <label for="edu-method">উচ্চমাধ্যমিক/সমমানে গ্রুপ?<span class="form-required" title="This field is required.">*</span></label>
                        <select name="gnrlmdrs_hrsecondary_group">
                            <option hidden selected><?php echo $gnrlmdrs_hrsecondary_group;?></option>
                            <option></option>
                            <option value="বিজ্ঞান">বিজ্ঞান শাখা</option>
                            <option value="মানবিক শাখা">মানবিক শাখা</option>
                            <option value="ব্যবসা ও বাণিজ্য শাখা">ব্যবসা ও বাণিজ্য শাখা</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="hrgnrl_mdrs_running_stdn">
                        <label for="hrgnrl_mdrs_running_stdn">উচ্চমাধ্যমিক/সমমানে বর্তমান অধ্যায়নরত ক্লাস<span class="form-required" title="This field is required.">*</span></label>
                        <input type="text"  name="gnrlmdrs_hrsecondary_rningstd" id="hrgnrl_mdrs_running_stdn" value="<?php echo $gnrlmdrs_hrsecondary_rningstd;?>" size="250" maxlength="250" class="form-text required">
                    </div>
                    <!--Higher Seconday Education End -->


                    <!--Diploma Higher Seconday Start -->
                    <div class="shosurbari-biodata-field" id="doploma_hrscnd_pass">
                        <label for="doploma_hrscdmethod">ডিপ্লোমা পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
                        <select name="diploma_hrsecondary_pass" id="doploma_hrscdmethod">
                            <option hidden selected><?php echo $diploma_hrsecondary_pass;?></option>
                            <option></option>
                            <option value="হ্যাঁ">হ্যাঁ</option>
                            <option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="doploma_hrscnd_pass_year">
                        <label for="doploma_hrscnd_pass_year">ডিপ্লোমা পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
                        <select name="diploma_hrsecondary_pass_year">
                            <option hidden selected><?php echo $diploma_hrsecondary_pass_year;?></option>
                            <option></option>
                            <option value="২০২৪">২০২৪</option>
                            <option value="২০২৩">২০২৩</option>
                            <option value="২০২২">২০২২</option>
                            <option value="২০২১">২০২১</option>
                            <option value="২০২০">২০২০</option>
                            <option value="২০১৯">২০১৯</option>
                            <option value="২০১৮">২০১৮</option>
                            <option value="২০১৭">২০১৭</option>
                            <option value="২০১৬">২০১৬</option>
                            <option value="২০১৫">২০১৫</option>
                            <option value="২০১৪">২০১৪</option>
                            <option value="২০১৩">২০১৩</option>
                            <option value="২০১২">২০১২</option>
                            <option value="২০১১">২০১১</option>
                            <option value="২০১০">২০১০</option>
                            <option value="২০০৯">২০০৯</option>
                            <option value="২০০৮">২০০৮</option>
                            <option value="২০০৭">২০০৭</option>
                            <option value="২০০৬">২০০৬</option>
                            <option value="২০০৫">২০০৫</option>
                            <option value="২০০৪">২০০৪</option>
                            <option value="২০০৩">২০০৩</option>
                            <option value="২০০২">২০০২</option>
                            <option value="২০০১">২০০১</option>
                            <option value="২০০০">২০০০</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="doploma_hrscnd_subject">
                        <label for="edu-method">ডিপ্লোমায় আপনার সাবজেক্ট<span class="form-required" title="This field is required.">*</span></label>
                        <input type="text" name="diploma_hrsecondary_sub" value="<?php echo $diploma_hrsecondary_sub;?>" id="diploma_secondary_subject"   size="250" maxlength="250" class="form-text required">
                    </div>

                    <div class="shosurbari-biodata-field" id="doploma_hrscnd_exam_year">
                        <label for="edu-method">ডিপ্লোমা অধ্যায়ন সম্পন্ন হবে<span class="form-required" title="This field is required.">*</span></label>
                        <select name="diploma_hrsecondary_endingyear">
                            <option hidden selected><?php echo $diploma_hrsecondary_endingyear;?></option>
                            <option></option>
                            <option value="২০৩০">২০৩০</option>
                            <option value="২০২৯">২০২৯</option>
                            <option value="২০২৮">২০২৮</option>
                            <option value="২০২৭">২০২৭</option>
                            <option value="২০২৬">২০২৬</option>
                            <option value="২০২৫">২০২৫</option>
                            <option value="২০২৪">২০২৪</option>
                            <option value="২০২৩">২০২৩</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="varsity_edumethod">
                        <label for="university_edumethod">স্নাতক/সমমান শিক্ষার মাধ্যম<span class="form-required" title="This field is required.">*</span></label>
                        <select name="varsity_edu_method" id="university_edumethod">
                            <option hidden selected><?php echo $varsity_edu_method;?></option>
                            <option></option>
                            <option value="জেনারেল">জেনারেল</option>
                            <option value="আলিয়া মাদ্রাসা">আলিয়া মাদ্রাসা</option>
                            <option value="ডিপ্লোমা">ডিপ্লোমা</option>
                            <option value="অধ্যায়ন বাদ দিয়েছি">অধ্যায়ন বাদ দিয়েছি</option>
                            <option value="অন্যান্য">অন্যান্য</option>
                        </select>
                    </div>
                    <!--Diploma Higher Seconday End -->


                    <!-- Higher Education Start -->
                    <div class="shosurbari-biodata-field" id="varsity_pass">
                        <label for="university_pass">স্নাতক/সমমান পাস করেছেন?<span class="form-required" title="This field is required.">*</span></label>
                        <select name="uvarsity_pass" id="university_pass">
                            <option hidden selected><?php echo $uvarsity_pass;?></option>
                            <option></option>
                            <option value="হ্যাঁ">হ্যাঁ</option>
                            <option value="না, অধ্যায়নরত আছি">না, অধ্যায়নরত আছি </option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="varsity_pass_year">
                        <label for="edu-method">স্নাতক/সমমান পাসের বর্ষ<span class="form-required" title="This field is required.">*</span></label>
                        <select name="varsity_passing_year">
                            <option hidden selected><?php echo $varsity_passing_year;?></option>
                            <option></option>
                            <option value="২০২৪">২০২৪</option>
                            <option value="২০২৩">২০২৩</option>
                            <option value="২০২২">২০২২</option>
                            <option value="২০২১">২০২১</option>
                            <option value="২০২০">২০২০</option>
                            <option value="২০১৯">২০১৯</option>
                            <option value="২০১৮">২০১৮</option>
                            <option value="২০১৭">২০১৭</option>
                            <option value="২০১৬">২০১৬</option>
                            <option value="২০১৫">২০১৫</option>
                            <option value="২০১৪">২০১৪</option>
                            <option value="২০১৩">২০১৩</option>
                            <option value="২০১২">২০১২</option>
                            <option value="২০১১">২০১১</option>
                            <option value="২০১০">২০১০</option>
                            <option value="২০০৯">২০০৯</option>
                            <option value="২০০৮">২০০৮</option>
                            <option value="২০০৭">২০০৭</option>
                            <option value="২০০৬">২০০৬</option>
                            <option value="২০০৫">২০০৫</option>
                            <option value="২০০৪">২০০৪</option>
                            <option value="২০০৩">২০০৩</option>
                            <option value="২০০২">২০০২</option>
                            <option value="২০০১">২০০১</option>
                            <option value="২০০০">২০০০</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="varsity_subject">
                        <label for="edu-method">স্নাতক/সমমানে আপনার সাবজেক্ট<span class="form-required" title="This field is required.">*</span></label>
                        <input type="text" name="university_subject" id="varsity_subject"  value="<?php echo $university_subject;?>" size="250" maxlength="250" class="form-text required">
                    </div>

                    <div class="shosurbari-biodata-field" id="varsity_exam_year">
                        <label for="edu-method">স্নাতক/সমমান অধ্যায়ন সম্পন্ন হবে<span class="form-required" title="This field is required.">*</span></label>
                        <select name="varsity_ending_year">
                            <option hidden selected><?php echo $varsity_ending_year;?></option>
                            <option></option>
                            <option value="২০৩০">২০৩০</option>
                            <option value="২০২৯">২০২৯</option>
                            <option value="২০২৮">২০২৮</option>
                            <option value="২০২৭">২০২৭</option>
                            <option value="২০২৬">২০২৬</option>
                            <option value="২০২৫">২০২৫</option>
                            <option value="২০২৪">২০২৪</option>
                            <option value="২০২৩">২০২৩</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field" id="varsity_name">
                        <label for="edu-method">স্নাতকে/সমমানে শিক্ষা প্রতিষ্ঠান<span class="form-required" title="This field is required.">*</span></label>
                        <input type="text" name="uvarsity_name" id="university_name"  value="<?php echo $uvarsity_name;?>" size="250" maxlength="250" class="form-text required">
                    </div>
                    <!-- Higher Education End -->

                    <div class="shosurbari-biodata-field">
                        <label for="edu-method">অন্যান্য শিক্ষাগত যোগ্যতা<span style="color: gray; font-size:14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
                        <textarea rows="4"  name="others_edu_qualification" value="<?php echo $others_edu_qualification;?>"  id="others_edu_qualification" placeholder="Describe your others education qualifications" class="form-text-describe"></textarea>
                    </div>
                </div>
            </div>

    
            <script>
                // Function to show or hide sections based on the selected value
                function toggleSections() {
                    var selectedValue = document.getElementById("secondary_edu_method").value;

                    document.getElementById("dawra_pass_field").style.display = "none";
                    document.getElementById("dawra_passing_year_field").style.display = "none";
                    document.getElementById("current_edu_level_field").style.display = "none";

                    // Hide all sections by default
                    document.getElementById("hafez_field").style.display = "none";

                    document.getElementById("maxedu_qualification").style.display = "none";
                    document.getElementById("gnrl_mdrs_scnd_pass").style.display = "none";
                    document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";  
                    document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("higher_seconday_edumethod").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "none";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("doploma_hrscnd_pass").style.display = "none";
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "none";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
                    document.getElementById("varsity_edumethod").style.display = "none";

                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";

                    // Show or hide sections based on the selected value
                    if (selectedValue === "কওমি মাদ্রাসা") {
                        document.getElementById("hafez_field").style.display = "block";
                        document.getElementById("dawra_pass_field").style.display = "block";
                        document.getElementById("dawra_passing_year_field").style.display = "none";
                        document.getElementById("current_edu_level_field").style.display = "none";
                    }

                    // Show or hide sections based on the selected value
                    else if (selectedValue === "অন্যান্য") {
                        document.getElementById("maxedu_qualification").style.display = "block";
                    }

                    // Show or hide sections based on the selected value
                    else if (selectedValue === "জেনারেল" || selectedValue === "আলিয়া মাদ্রাসা" || selectedValue === "ভোকেশনাল") {
                        document.getElementById("gnrl_mdrs_scnd_pass").style.display = "block";
                    }

                    // Show or hide sections based on the selected value
                    else if (selectedValue === "মাধ্যমিক পড়িনাই") {
                        document.getElementById("maxedu_qualification").style.display = "block";
                    }
                }

                // Function to show or hide fields based on the selected value of dawra_pass_field
                function toggleDawraFields() {
                    var selectedValue = document.getElementById("dawra_pass").value;

                    var dawraPassingYearField = document.getElementById("dawra_passing_year_field");
                    var currentEduLevelField = document.getElementById("current_edu_level_field");

                    // Show or hide fields based on the selected value
                    if (selectedValue === "হ্যাঁ") {
                        dawraPassingYearField.style.display = "block";
                        currentEduLevelField.style.display = "none"; // Hide the current_edu_level_field
                    }
                    
                    else if (selectedValue === "না, অধ্যায়নরত আছি") {
                        dawraPassingYearField.style.display = "none";
                        currentEduLevelField.style.display = "block";
                    }

                    else if (selectedValue === "না, বাদ দিয়েছি") {
                        dawraPassingYearField.style.display = "none";
                        currentEduLevelField.style.display = "none";
                    }
                }

                // Function to show or hide fields based on the selected value of dawra_pass_field
                function toggleSecondaryFields() {
                    var selectValue = document.getElementById("secondary_pass").value;

                    document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";
                    document.getElementById("higher_seconday_edumethod").style.display = "none";

                    // Show or hide fields based on the selected value
                    if (selectValue === "হ্যাঁ") {
                    document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "block";
                    document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";
                    document.getElementById("higher_seconday_edumethod").style.display = "block";
                    }
        
                    else if (selectValue === "না, পরীক্ষার্থী") {
                    document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "block";
                    document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";
                    document.getElementById("higher_seconday_edumethod").style.display = "none";

                    document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "none";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("doploma_hrscnd_pass").style.display = "none";
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "none";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
                    document.getElementById("varsity_edumethod").style.display = "none";

                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }

                    else if (selectValue === "না, অধ্যায়নরত আছি") {
                    document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_running_stdn").style.display = "block";

                    document.getElementById("higher_seconday_edumethod").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "none";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("doploma_hrscnd_pass").style.display = "none";
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "none";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
                    document.getElementById("varsity_edumethod").style.display = "none";

                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }

                    else if (selectValue === "অধ্যায়ন বাদ দিয়েছি") {
                    document.getElementById("gnrl_mdrs_scnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_scnd_exam_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("higher_seconday_edumethod").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "none";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("doploma_hrscnd_pass").style.display = "none";
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "none";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
                    document.getElementById("varsity_edumethod").style.display = "none";

                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }
                }

                // Function to show or hide fields based on the selected value of dawra_pass_field
                function toggleHrsecondaryFields() {
                    var selecteValue = document.getElementById("higherscndry_edumethod").value;

                    document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "none";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("doploma_hrscnd_pass").style.display = "none";
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "none";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";

                    // Show or hide fields based on the selected value
                    if (selecteValue === "জেনারেল" || selecteValue === "আলিয়া মাদ্রাসা") {
                    document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "block";
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "none";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("doploma_hrscnd_pass").style.display = "none";
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "none";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
                    
                    document.getElementById("varsity_edumethod").style.display = "none";
                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }

                    else if (selecteValue === "ডিপ্লোমা") {
                    document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "none";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("doploma_hrscnd_pass").style.display = "block";
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "none";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";

                    document.getElementById("varsity_edumethod").style.display = "none";
                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }

                    else if (selecteValue === "অধ্যায়ন বাদ দিয়েছি") {
                    document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "none";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("doploma_hrscnd_pass").style.display = "none";
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "none";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";

                    document.getElementById("varsity_edumethod").style.display = "none";
                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }

                    else if (selecteValue === "অন্যান্য") {
                    document.getElementById("gnrl_mdrs_hrscnd_pass").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "none";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("doploma_hrscnd_pass").style.display = "none";
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "none";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";

                    document.getElementById("varsity_edumethod").style.display = "none";
                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }
                }

                // Function to show or hide fields based on the selected value of dawra_pass_field
                function toggleHrgnrmdrsFields() {
                    var selecteValue = document.getElementById("hrsecondary_pass").value;

                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "none";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";
                    document.getElementById("varsity_edumethod").style.display = "none";

                    // Show or hide fields based on the selected value
                    if (selecteValue === "হ্যাঁ") {
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "block";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "block";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";
                    document.getElementById("varsity_edumethod").style.display = "block";
                    }

                    else if (selecteValue === "না, পরীক্ষার্থী") {
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "block";
                    document.getElementById("higher_seconday_group").style.display = "block";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "none";

                    document.getElementById("varsity_edumethod").style.display = "none";
                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }

                    else if (selecteValue === "না, এখনো অধ্যায়নরত") {
                    document.getElementById("gnrl_mdrs_hrscnd_pass_year").style.display = "none";
                    document.getElementById("gnrl_mdrs_hrscnd_exam_year").style.display = "none";
                    document.getElementById("higher_seconday_group").style.display = "block";
                    document.getElementById("hrgnrl_mdrs_running_stdn").style.display = "block";

                    document.getElementById("varsity_edumethod").style.display = "none";
                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }
                }

                // Function to show or hide fields based on the selected value of dawra_pass_field
                function toggleDiplomaFields() {
                    var selecteValue = document.getElementById("doploma_hrscdmethod").value;

                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "none";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
                    document.getElementById("varsity_edumethod").style.display = "none";

                    // Show or hide fields based on the selected value
                    if (selecteValue === "হ্যাঁ") {
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "block";
                    document.getElementById("doploma_hrscnd_subject").style.display = "block";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "none";
                    document.getElementById("varsity_edumethod").style.display = "block";
                    }

                    else if (selecteValue === "না, অধ্যায়নরত আছি") {
                    document.getElementById("doploma_hrscnd_pass_year").style.display = "none";
                    document.getElementById("doploma_hrscnd_subject").style.display = "block";
                    document.getElementById("doploma_hrscnd_exam_year").style.display = "block";
                    document.getElementById("varsity_edumethod").style.display = "none";

                    document.getElementById("varsity_edumethod").style.display = "none";
                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }
                }

                // Function to show or hide fields based on the selected value of dawra_pass_field
                function toggleVarsityFields() {
                    var selecteValue = document.getElementById("university_edumethod").value;

                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";

                    // Show or hide fields based on the selected value
                    if (selecteValue === "জেনারেল" || "আলিয়া মাদ্রাসা" || "ডিপ্লোমা") {
                    document.getElementById("varsity_pass").style.display = "block";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }

                    else if (selecteValue === "অধ্যায়ন বাদ দিয়েছি") {
                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }

                    else if (selecteValue === "অন্যান্য") {
                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";
                    }
                }

                // Function to show or hide fields based on the selected value of dawra_pass_field
                function toggleVarsityPassFields() {
                    var selecteValue = document.getElementById("university_pass").value;

                    document.getElementById("varsity_pass").style.display = "none";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "none";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "none";

                    // Show or hide fields based on the selected value
                    if (selecteValue === "হ্যাঁ") {
                    document.getElementById("varsity_pass").style.display = "block";
                    document.getElementById("varsity_pass_year").style.display = "block";
                    document.getElementById("varsity_subject").style.display = "block";
                    document.getElementById("varsity_exam_year").style.display = "none";
                    document.getElementById("varsity_name").style.display = "block";
                    }

                    else if (selecteValue === "না, অধ্যায়নরত আছি") {
                    document.getElementById("varsity_pass").style.display = "block";
                    document.getElementById("varsity_pass_year").style.display = "none";
                    document.getElementById("varsity_subject").style.display = "block";
                    document.getElementById("varsity_exam_year").style.display = "block";
                    document.getElementById("varsity_name").style.display = "block";
                    }
                }

                // Attach the functions to the onchange events of the dropdowns
                document.getElementById("secondary_edu_method").onchange = toggleSections;
                document.getElementById("dawra_pass").onchange = toggleDawraFields;
                document.getElementById("gnrl_mdrs_scnd_pass").onchange = toggleSecondaryFields;
                document.getElementById("higher_seconday_edumethod").onchange = toggleHrsecondaryFields; // Update the event assignment to toggleHrsecondaryFields
                document.getElementById("gnrl_mdrs_hrscnd_pass").onchange = toggleHrgnrmdrsFields; // Update the event assignment to toggleHrsecondaryFields
                document.getElementById("doploma_hrscnd_pass").onchange = toggleDiplomaFields; // Update the event assignment to toggleHrsecondaryFields
                document.getElementById("varsity_edumethod").onchange = toggleVarsityFields; // Update the event assignment to toggleHrsecondaryFields
                document.getElementById("varsity_pass").onchange = toggleVarsityPassFields; // Update the event assignment to toggleHrsecondaryFields

                // Trigger the functions initially to set the initial state
                toggleSections();
                toggleDawraFields();
                toggleSecondaryFields();
                toggleHrsecondaryFields();
                toggleHrgnrmdrsFields();
                toggleDiplomaFields();
                toggleVarsityFields();
                toggleVarsityPassFields();
            </script>
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

