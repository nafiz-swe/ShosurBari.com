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
    <title>Admin - Update LifeStyle | ShosurBari</title>
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
    $sql = "SELECT * FROM 2bd_personal_lifestyle WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Display the user data in input fields/options
        $smoke = $row['smoke'];
        $occupation_sector = $row['occupation_sector'];
        $other_occupation_sector = $row['other_occupation_sector'];
        $business_occupation_level = $row['business_occupation_level'];
        $student_occupation_level = $row['student_occupation_level'];
        $health_occupation_level = $row['health_occupation_level'];
        $engineer_occupation_level = $row['engineer_occupation_level'];
        $teacher_occupation_level = $row['teacher_occupation_level'];
        $defense_occupation_level = $row['defense_occupation_level'];
        $foreigner_occupation_level = $row['foreigner_occupation_level'];
        $garments_occupation_level = $row['garments_occupation_level'];
        $driver_occupation_level = $row['driver_occupation_level'];
        $service_andcommon_occupation_level = $row['service_andcommon_occupation_level'];
        $mistri_occupation_level = $row['mistri_occupation_level'];

        $occupation_describe = $row['occupation_describe'];
        $dress_code = $row['dress_code'];
        $aboutme = $row['aboutme'];
        $groom_bride_email = $row['groom_bride_email'];
        $groom_bride_number = $row['groom_bride_number'];
        $groom_bride_family_number = $row['groom_bride_family_number'];
        $family_number_relation = $row['family_number_relation'];

    } else {
        echo 'User not found.';
        mysqli_close($conn);
        exit;
    }

// Handle form submission to update user data
if (isset($_POST['update'])) {
    // Retrieve the updated data from the form
    $smoke = mysqli_real_escape_string($conn, $_POST['smoke']);
    $occupation_sector = mysqli_real_escape_string($conn, $_POST['occupation_sector']);
    $other_occupation_sector = mysqli_real_escape_string($conn, $_POST['other_occupation_sector']);
    $business_occupation_level = mysqli_real_escape_string($conn, $_POST['business_occupation_level']);
    $student_occupation_level = mysqli_real_escape_string($conn, $_POST['student_occupation_level']);
    $health_occupation_level = mysqli_real_escape_string($conn, $_POST['health_occupation_level']);
    $engineer_occupation_level = mysqli_real_escape_string($conn, $_POST['engineer_occupation_level']);
    $teacher_occupation_level = mysqli_real_escape_string($conn, $_POST['teacher_occupation_level']);
    $defense_occupation_level = mysqli_real_escape_string($conn, $_POST['defense_occupation_level']);
    $foreigner_occupation_level = mysqli_real_escape_string($conn, $_POST['foreigner_occupation_level']);
    $garments_occupation_level = mysqli_real_escape_string($conn, $_POST['garments_occupation_level']);
    $driver_occupation_level = mysqli_real_escape_string($conn, $_POST['driver_occupation_level']);
    $service_andcommon_occupation_level = mysqli_real_escape_string($conn, $_POST['service_andcommon_occupation_level']);
    $mistri_occupation_level = mysqli_real_escape_string($conn, $_POST['mistri_occupation_level']);

    $occupation_describe = mysqli_real_escape_string($conn, $_POST['occupation_describe']);
    $dress_code = mysqli_real_escape_string($conn, $_POST['dress_code']);
    $aboutme = mysqli_real_escape_string($conn, $_POST['aboutme']);
    $groom_bride_email = mysqli_real_escape_string($conn, $_POST['groom_bride_email']);
    $groom_bride_number = mysqli_real_escape_string($conn, $_POST['groom_bride_number']);
    $groom_bride_family_number = mysqli_real_escape_string($conn, $_POST['groom_bride_family_number']);
    $family_number_relation = mysqli_real_escape_string($conn, $_POST['family_number_relation']);


    // Update user data in the database
    $updateSql = "UPDATE 2bd_personal_lifestyle SET
        smoke = '$smoke',
        occupation_sector = '$occupation_sector',
        other_occupation_sector = '$other_occupation_sector',
        business_occupation_level = '$business_occupation_level',
        student_occupation_level = '$student_occupation_level',
        health_occupation_level = '$health_occupation_level',
        engineer_occupation_level = '$engineer_occupation_level',
        teacher_occupation_level = '$teacher_occupation_level',
        defense_occupation_level = '$defense_occupation_level',
        foreigner_occupation_level = '$foreigner_occupation_level',
        garments_occupation_level = '$garments_occupation_level',
        driver_occupation_level = '$driver_occupation_level',
        service_andcommon_occupation_level = '$service_andcommon_occupation_level',
        mistri_occupation_level = '$mistri_occupation_level',

        occupation_describe = '$occupation_describe',
        dress_code = '$dress_code',
        aboutme = '$aboutme',
        groom_bride_email = '$groom_bride_email',
        groom_bride_number = '$groom_bride_number',
        groom_bride_family_number = '$groom_bride_family_number',
        family_number_relation = '$family_number_relation'

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
        <!-- Fieldsets start-->
        <fieldset>
            <div class="sb-biodata" id="personalLife">
                <div class="sb-biodata-field">
                    <h2>ব্যক্তিগত তথ্য</h2>
                </div>

                <div class="sb-biodata-option">
                    <div class="shosurbari-biodata-field">
                        <label for="edit-name">ধূমপান করা হয়?<span style="color: gray; font-size: 14px;" class="form-required" title="This field is required."> (বাধ্যতামূলক নয়)</span></label>
                        <select name="smoke">
                            <option hidden selected><?php echo $smoke;?></option>
                            <option value="না">না</option>
                            <option value="হ্যাঁ">হ্যাঁ</option> 
                            <option value="মাঝে মাঝে করা হয়">মাঝে মাঝে করা হয়</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field">
                        <label for="occupation_sector">পেশা<span class="form-required" title="This field is required.">*</span></label>
                        <select name="occupation_sector" required onchange="showOccupationSector(this.value)">
                            <option hidden selected><?php echo $occupation_sector;?></option>
                            <option value="Business">ব্যবসা</option>
                            <option value="Student">শিক্ষার্থী</option>
                            <option value="Common">সার্ভিস/ইন্টারনেট/ফাইন্যান্স</option>
                            <option value="Health">চিকিৎসা/স্বাস্থ্য</option>
                            <option value="Engineer">ইঞ্জিনিয়ার</option>
                            <option value="Teacher">শিক্ষক/প্রফেসর</option>
                            <option value="Defense">প্রতিরক্ষা বাহিনী</option>
                            <option value="Foreigner">বিদেশে</option>
                            <option value="Garments">গার্মেন্টস</option>
                            <option value="Mistri">কারিগর/মিস্ত্রি</option>
                            <option value="Driver">ড্রাইভার/চালক</option>
                            <option value="Other">অন্যান্য</option>
                            <option value="No Profession">No Occupation</option>
                        </select>
                    </div>
                                
                    <div class="shosurbari-biodata-field section"  id="Other" style="display: none;">
                        <label>পেশা<span class="form-required" title="This field is required.">*</span></label>
                        <input type="text"  name="other_occupation_sector" value="<?php echo $other_occupation_sector;?>" placeholder="Enter your Occupation Sector" value="<?php echo $weight; ?>" size="100" maxlength="100" class="form-text">
                    </div>

                    <div class="shosurbari-biodata-field section"  id="Business" style="display: none;">
                        <label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <input type="text"  name="business_occupation_level" placeholder="Enter your Business name" value="<?php echo $business_occupation_level; ?>" size="100" maxlength="100" class="form-text">
                    </div>

                    <div class="shosurbari-biodata-field section" id="Student" style="display: none;">
                        <label >পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <select name="student_occupation_level">
                            <option hidden selected><?php echo $student_occupation_level;?></option>
                            <option></option>
                            <option value="কওমি মাদ্রাসার শিক্ষার্থী">কওমি মাদ্রাসার শিক্ষার্থী</option>
                            <option value="আলিয়া মাদ্রাসার দাখিল শিক্ষার্থী">আলিয়া মাদ্রাসার দাখিল শিক্ষার্থী</option> 
                            <option value="মাধ্যমিক শিক্ষার্থী">মাধ্যমিক শিক্ষার্থী</option>

                            <option value="কলেজ শিক্ষার্থী">কলেজ শিক্ষার্থী</option>
                            <option value="আলিয়া মাদ্রাসার আলিম শিক্ষার্থী">আলিয়া মাদ্রাসার আলিম শিক্ষার্থী</option> 
                            <option value="পলিটেকনিক্যাল শিক্ষার্থী">পলিটেকনিক্যাল শিক্ষার্থী</option>
                            <option value="নার্সিং শিক্ষার্থী">নার্সিং শিক্ষার্থী</option>
                            <option value="মিডউইফারী শিক্ষার্থী">মিডউইফারী শিক্ষার্থী</option>
                            <option value="পেরামেডিক্যাল শিক্ষার্থী">পেরামেডিক্যাল শিক্ষার্থী</option>

                            <option value="মেডিকেল শিক্ষার্থী">মেডিকেল শিক্ষার্থী</option>
                            <option value="ফার্মেসী শিক্ষার্থী">ফার্মেসী শিক্ষার্থী</option> 
                            <option value="বি.এসসি. ইঞ্জিনিয়ারিং শিক্ষার্থী">বি.এসসি. ইঞ্জিনিয়ারিং শিক্ষার্থী</option>
                            <option value="বি.বি.এ. শিক্ষার্থী">বি.বি.এ. শিক্ষার্থী</option> 


                            <option value="বি.এসসি. শিক্ষার্থী">বি.এসসি. শিক্ষার্থী</option>
                            <option value="বি.এ. শিক্ষার্থী">বি.এ. শিক্ষার্থী</option>
                            <option value="বি.কম. শিক্ষার্থী">বি.কম. শিক্ষার্থী</option> 
                            <option value="আলিয়া মাদ্রাসার ফাজিল শিক্ষার্থী">আলিয়া মাদ্রাসার ফাজিল শিক্ষার্থী</option> 

                            <option value="এম.এসসি. শিক্ষার্থী">এম.এসসি. শিক্ষার্থী</option>
                            <option value="এম.এ. শিক্ষার্থী">এম.এ. শিক্ষার্থী</option> 
                            <option value="এম.কম. শিক্ষার্থী">এম.কম. শিক্ষার্থী</option>
                            <option value="কামিল শিক্ষার্থী">কামিল শিক্ষার্থী</option> 
                        </select>
                    </div>			

                    <div class="shosurbari-biodata-field section" id="Health" style="display: none;">
                        <label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <select name="health_occupation_level">
                            <option hidden selected><?php echo $health_occupation_level;?></option>
                            <option></option>
                            <option value="এম.বি.বি.এস. ডাক্তার">এম.বি.বি.এস. ডাক্তার</option>
                            <option value="ইন্টার্নশীপ ডাক্তার">ইন্টার্নশীপ ডাক্তার</option> 
                            <option value="পশু চিকিৎসক">পশু চিকিৎসক</option>
                            <option value="ফার্মাসিস্ট">ফার্মাসিস্ট</option>
                            <option value="ডিপ্লোমা ডাক্তার">ডিপ্লোমা ডাক্তার</option>
                            <option value="নার্স">নার্স</option>
                            <option value="মিডউইফারী">মিডউইফারী</option>
                            <option value="পল্লী চিকিৎসক">পল্লী চিকিৎসক</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field section" id="Engineer" style="display: none;">
                        <label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <select name="engineer_occupation_level">
                            <option hidden selected><?php echo $engineer_occupation_level;?></option>
                            <option></option>
                            <option value="সফটওয়্যার ইঞ্জিনিয়ার">সফটওয়্যার ইঞ্জিনিয়ার</option> 
                            <option value="টেক্সটাইল ইঞ্জিনিয়ার">টেক্সটাইল ইঞ্জিনিয়ার</option>
                            <option value="সিভিল ইঞ্জিনিয়ার">সিভিল ইঞ্জিনিয়ার</option>
                            <option value="ইলেকট্রিক্যাল ইঞ্জিনিয়ার">ইলেকট্রিক্যাল ইঞ্জিনিয়ার</option>
                            <option value="মেরিন ইঞ্জিনিয়ার">মেরিন ইঞ্জিনিয়ার</option> 
                            <option value="নেটওয়ার্ক ইঞ্জিনিয়ার">নেটওয়ার্ক ইঞ্জিনিয়ার</option> 
                            <option value="রোবোটিক্স ইঞ্জিনিয়ার">রোবোটিক্স ইঞ্জিনিয়ার</option>
                            <option value="এগ্রিকালচার ইঞ্জিনিয়ার">এগ্রিকালচার ইঞ্জিনিয়ার</option>
                            <option value="আর্কিটেকচার ইঞ্জিনিয়ার">আর্কিটেকচার ইঞ্জিনিয়ার</option>
                            <option value="মেকানিক্যাল ইঞ্জিনিয়ার">মেকানিক্যাল ইঞ্জিনিয়ার</option>
                            <option value="কেমিক্যাল ইঞ্জিনিয়ার">কেমিক্যাল ইঞ্জিনিয়ার</option>
                            <option value="বিয়োমেডিক্যাল ইঞ্জিনিয়ার">বিয়োমেডিক্যাল ইঞ্জিনিয়ার</option>
                            <option value="এরোস্পেস ইঞ্জিনিয়ারিং">এরোস্পেস ইঞ্জিনিয়ারিং</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field section" id="Teacher" style="display: none;">
                        <label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <select name="teacher_occupation_level">
                            <option hidden selected><?php echo $teacher_occupation_level;?></option>
                            <option></option>
                            <option value="কওমি মাদ্রাসার শিক্ষক">কওমি মাদ্রাসার শিক্ষক</option>
                            <option value="আলিয়া মাদ্রাসার শিক্ষক">আলিয়া মাদ্রাসার শিক্ষক</option>  
                            <option value="স্কুল শিক্ষক">স্কুল শিক্ষক</option> 
                            <option value="কলেজ শিক্ষক">কলেজ শিক্ষক</option>
                            <option value="বিশ্ববিদ্যালয় প্রফেসর">বিশ্ববিদ্যালয় প্রফেসর</option>
                            <option value="ডিগ্রির প্রফেসর">ডিগ্রির প্রফেসর</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field section" id="Defense" style="display: none;">
                        <label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <select name="defense_occupation_level">
                            <option hidden selected><?php echo $defense_occupation_level;?></option>
                            <option></option>
                            <option value="সেনাবাহিনী">সেনাবাহিনী</option> 
                            <option value="বিমানবাহিনী">বিমানবাহিনী</option>
                            <option value="নৌবাহিনী">নৌবাহিনী</option>
                            <option value="পুলিশ">পুলিশ</option>
                            <option value="ফায়ার সার্ভিস">ফায়ার সার্ভিস</option> 
                            <option value="ডিবি">ডিবি</option>
                            <option value="আনসার">আনসার</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field section" id="Foreigner" style="display: none;">
                        <label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <select name="foreigner_occupation_level">
                            <option hidden selected><?php echo $foreigner_occupation_level;?></option>
                            <option></option>
                            <option value="বিদেশে চাকরি করি">বিদেশে চাকরি করি</option>
                            <option value="বিদেশে কাজ করি">বিদেশে কাজ করি</option>
                            <option value="বিদেশে ব্যবসা করি">বিদেশে ব্যবসা করি</option>
                            <option value="বিদেশে পড়াশোনা করি">বিদেশে পড়াশোনা করি</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field section" id="Garments" style="display: none;">
                        <label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <select name="garments_occupation_level">
                            <option hidden selected><?php echo $garments_occupation_level;?></option>
                            <option></option>
                            <option value="গার্মেন্টস ম্যানেজার">গার্মেন্টস ম্যানেজার</option>
                            <option value="গার্মেন্টস বায়িং হাউস">গার্মেন্টস বায়িং হাউস</option>
                            <option value="গার্মেন্টস শ্রমিক">গার্মেন্টস শ্রমিক</option> 
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field section" id="Driver" style="display: none;">
                        <label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <select name="driver_occupation_level">
                            <option hidden selected><?php echo $driver_occupation_level;?></option>
                            <option></option>
                            <option value="বাস ড্রাইভার">বাস ড্রাইভার</option> 
                            <option value="মাইক্রো বাস ড্রাইভার">মাইক্রো বাস ড্রাইভার</option> 
                            <option value="কার ড্রাইভার">কার ড্রাইভার</option> 
                            <option value="ট্রাক ড্রাইভার">ট্রাক ড্রাইভার</option>
                            <option value="পাঠাও/উবার রাইডার">পাঠাও/উবার রাইডার</option>
                            <option value="CNG চালক">CNG চালক</option> 
                            <option value="অটো চালক">অটো চালক</option>
                            <option value="রিক্সা চালক">রিক্সা চালক</option>
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field section" id="Common" style="display: none;">
                        <label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <select name="service_andcommon_occupation_level">
                            <option hidden selected><?php echo $service_andcommon_occupation_level;?></option>
                            <option></option>
                            <option value="HR">HR</option>
                            <option value="ব্যাংকার">ব্যাংকার</option>
                            <option value="আইনজীবী">আইনজীবী</option> 
                            <option value="উদ্যোক্তা">উদ্যোক্তা</option> 
                            <option value="ফ্রীলান্সার">ফ্রীলান্সার</option>
                            <option value="ইউটিউবার">ইউটিউবার</option>
                            <option value="গ্রাফিক্স ডিজাইনার">গ্রাফিক্স ডিজাইনার</option>
                            <option value="সেলস & মার্কেটিং(SR)">সেলস & মার্কেটিং(SR)</option>
                            <option value="আর্ট/দেয়াল লিখন">আর্ট/দেয়াল লিখন</option>
                            <option value="নিরাপত্তারক্ষী">নিরাপত্তারক্ষী</option>
                            <option value="রোজ কামলা/শ্রমিক">রোজ কামলা / শ্রমিক</option>  
                        </select>
                    </div>

                    <div class="shosurbari-biodata-field section" id="Mistri" style="display: none;">
                        <label>পেশার অবস্থান<span class="form-required" title="This field is required.">*</span></label>
                        <select name="mistri_occupation_level">
                        <option hidden selected><?php echo $mistri_occupation_level;?></option>
                        <option></option>
                        <option value="রাজ মিস্ত্রি">রাজ মিস্ত্রি</option>
                        <option value="কাঠ মিস্ত্রি">কাঠ মিস্ত্রি</option>
                        <option value="ইলেকট্রিক মিস্ত্রি">ইলেকট্রিক মিস্ত্রি</option>
                        <option value="স্যানিটারি মিস্ত্রি">স্যানিটারি মিস্ত্রি</option>
                        <option value="রড মিস্ত্রি">রড মিস্ত্রি</option>
                        <option value="রং মিস্ত্রি">রং মিস্ত্রি</option>
                        <option value="ফ্রিজ মিস্ত্রি">ফ্রিজমিস্ত্রি</option>
                        <option value="গ্যাস মিস্ত্রি">গ্যাস মিস্ত্রি</option>
                        <option value="এসি মিস্ত্রি">এসি মিস্ত্রি</option>
                        <option value="সিসি ক্যামেরা মিস্ত্রি">সিসি ক্যামেরা মিস্ত্রি</option>
                        <option value="টাইলস ও মুজাইক মিস্ত্রি">টাইলস ও মুজাইক মিস্ত্রি</option>
                        <option value="থাই এলুমিনিয়াম ও গ্লাস মিস্ত্রি">থাই এলুমিনিয়াম ও গ্লাস মিস্ত্রি</option>
                        <option value="ওয়েলডিং/গ্রীল মিস্ত্রি">ওয়েলডিং / গ্রীল মিস্ত্রি</option>
                        </select>
                    </div>

                    <script>
                        function showOccupationSector(occupation) {
                            // Hide the occupation_describe_field by default
                            var occupationDescribeField = document.getElementById("occupation_describe_field");
                            occupationDescribeField.style.display = "none";

                            // Hide all occupation sections
                            var occupationSections = document.getElementsByClassName("section");
                            for (var i = 0; i < occupationSections.length; i++) {
                                occupationSections[i].style.display = "none";
                            }

                            // Show the selected occupation section
                            var selectedOccupationSection = document.getElementById(occupation);
                            if (selectedOccupationSection) {
                                selectedOccupationSection.style.display = "block";
                                // Show the occupation_describe_field if occupation is not "No Profession"
                                if (occupation !== "No Profession") {
                                    occupationDescribeField.style.display = "block";
                                }
                            }
                        }
                    </script>								

                    <div class="shosurbari-biodata-field" id="occupation_describe_field" style="display: none;">
                        <label>পেশার বিস্তারিত তথ্য<span class="form-required" title="This field is required.">*</span></label>
                        <textarea rows="5" name="occupation_describe" id="edit-name" placeholder="Describe your Occupation" class="form-text-describe" ><?php echo $occupation_describe; ?></textarea>
                    </div>

                    <div class="shosurbari-biodata-field">
                        <label>ঘর ও ঘরের বাহিরে কেমন ধরণের পোশাক পরেন?<span class="form-required" title="This field is required.">*</span></label>
                        <textarea rows="5" name="dress_code" placeholder="Describe your Dress Code" class="form-text-describe" required><?php echo $dress_code; ?></textarea>
                    </div>

                    <div class="shosurbari-biodata-field">
                        <label>আপনার সম্পর্কে কিছু লিখুন<span class="form-required" title="This field is required.">*</span></label>
                        <textarea rows="5" name="aboutme" placeholder="Write about you" class="form-text-describe" required><?php echo $aboutme; ?></textarea>
                    </div>

                    
                    <div class="shosurbari-biodata-field">
                        <label for="edit-name">পাত্র/পাত্রীর ইমেইল<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required.">(এই অপশন লুকায়িত থাকবে)</span></label>
                        <input type="text" id="edit-name" name="groom_bride_email" value="<?php echo $groom_bride_email;?>" size="100" maxlength="100" class="form-text" required>
                    </div>

                    <div class="shosurbari-biodata-field">
                        <label for="edit-name">পাত্র/পাত্রীর মোবাইল নাম্বার <span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required.">(এই অপশন লুকায়িত থাকবে)</span></label>
                        <input type="text" id="edit-name" name="groom_bride_number" value="<?php echo $groom_bride_number;?>" size="100" maxlength="100" class="form-text" required>
                    </div>

                    <div class="shosurbari-biodata-field">
                        <label for="edit-name">পিতামাতা/আত্মীয়র মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span><span style="color: gray; font-size: 14px;" class="form-required" title="This field is required.">(এই অপশন লুকায়িত থাকবে)</span></label>
                        <input type="text" id="edit-name" name="groom_bride_family_number" value="<?php echo $groom_bride_family_number;?>" size="100" maxlength="100" class="form-text" required>
                    </div>

                    <div class="shosurbari-biodata-field">
                        <label for="edit-name">পিতামাতা/আত্মীয়র অপশনে মোবাইল নাম্বার টি যার, তার সাথে পাত্রপাত্রীর কি সম্পর্ক<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size: 14px;" class="form-required" title="This field is required.">(এই অপশন লুকায়িত থাকবে)</span></label>
                        <input type="text" id="edit-name" name="family_number_relation" value="<?php echo $family_number_relation;?>" size="100" maxlength="100" class="form-text" required>
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


 


<!-- ===== Admin Panel Footer Area ===== -->
<?php include("admin_footer.php"); ?>
<!-- =================================== -->


</body>

</html>