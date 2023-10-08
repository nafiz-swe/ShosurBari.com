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


    // Fetch user data for the specified user ID
    $sql = "SELECT * FROM 4bd_address_details WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

		// Display the user data in input fields/options
		$permanent_division = $row['permanent_division'];
		$home_district_under_barishal = $row['home_district_under_barishal'];
		$home_district_under_chattogram = $row['home_district_under_chattogram'];
		$home_district_under_dhaka = $row['home_district_under_dhaka'];
		$home_district_under_khulna = $row['home_district_under_khulna'];
		$home_district_under_mymensingh = $row['home_district_under_mymensingh'];
		$home_district_under_rajshahi = $row['home_district_under_rajshahi'];
		$home_district_under_rangpur = $row['home_district_under_rangpur'];
		$home_district_under_sylhet = $row['home_district_under_sylhet'];
		$country_present_address = $row['country_present_address'];
		$present_address_location = $row['present_address_location'];
		$childhood = $row['childhood'];
                
    } else {
        echo 'User not found.';
        mysqli_close($conn);
        exit;
    }

// Handle form submission to update user data
if (isset($_POST['update'])) {
    // Retrieve the updated data from the form
    $permanent_division = mysqli_real_escape_string($conn, $_POST['permanent_division']);
    $home_district_under_barishal = mysqli_real_escape_string($conn, $_POST['home_district_under_barishal']);
    $home_district_under_chattogram = mysqli_real_escape_string($conn, $_POST['home_district_under_chattogram']);
    $home_district_under_dhaka = mysqli_real_escape_string($conn, $_POST['home_district_under_dhaka']);
    $home_district_under_khulna = mysqli_real_escape_string($conn, $_POST['home_district_under_khulna']);
    $home_district_under_mymensingh = mysqli_real_escape_string($conn, $_POST['home_district_under_mymensingh']);
    $home_district_under_rajshahi = mysqli_real_escape_string($conn, $_POST['home_district_under_rajshahi']);
    $home_district_under_rangpur = mysqli_real_escape_string($conn, $_POST['home_district_under_rangpur']);
    $home_district_under_sylhet = mysqli_real_escape_string($conn, $_POST['home_district_under_sylhet']);
    $country_present_address = mysqli_real_escape_string($conn, $_POST['country_present_address']);
    $present_address_location = mysqli_real_escape_string($conn, $_POST['present_address_location']);
    $childhood = mysqli_real_escape_string($conn, $_POST['childhood']);

    // Update user data in the database
    $updateSql = "UPDATE 4bd_address_details SET
        permanent_division = '$permanent_division',
        home_district_under_barishal = '$home_district_under_barishal',
        home_district_under_chattogram = '$home_district_under_chattogram',
        home_district_under_dhaka = '$home_district_under_dhaka',
        home_district_under_khulna = '$home_district_under_khulna',
        home_district_under_mymensingh = '$home_district_under_mymensingh',
        home_district_under_rajshahi = '$home_district_under_rajshahi',
        home_district_under_rangpur = '$home_district_under_rangpur',
        home_district_under_sylhet = '$home_district_under_sylhet',
        country_present_address = '$country_present_address',
        present_address_location = '$present_address_location',
        childhood = '$childhood'
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
		<!-- multistep form -->
		<form action="" method="POST" id="biodataForm">
            <!--Fieldsets start-->
			<fieldset>
				<div class="sb-biodata" id="addressDetails">			
					<div class="sb-biodata-field">
						<h2>বর্তমান এবং স্থায়ী ঠিকানা</h2>
					</div>

					<div class="sb-biodata-option">
						<div class="shosurbari-biodata-field">
							<label>স্থায়ী ঠিকানার বিভাগ<span class="form-required" title="This field is required.">*</span></label>
							<select name="permanent_division" required onchange="showSection(this.value)">
								<option hidden selected><?php echo $permanent_division;?></option>
								<option></option>
								<option value="বরিশাল">বরিশাল</option>
								<option value="চট্টগ্রাম">চট্টগ্রাম</option>
								<option value="ঢাকা">ঢাকা</option>
								<option value="খুলনা">খুলনা</option>
								<option value="ময়মনসিংহ">ময়মনসিংহ</option>
								<option value="রাজশাহী">রাজশাহী</option>
								<option value="রংপুর">রংপুর</option>
								<option value="সিলেট">সিলেট</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="বরিশাল" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_barishal">
								<option hidden selected><?php echo $home_district_under_barishal;?></option>
								<option></option>
								<option value="ঝালকাঠী">ঝালকাঠী</option>
								<option value="পটুয়াখালী">পটুয়াখালী</option> 
								<option value="পিরোজপুর">পিরোজপুর</option>
								<option value="বরিশাল">বরিশাল</option> 
								<option value="বরগুনা">বরগুনা</option>
								<option value="ভোলা">ভোলা</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="চট্টগ্রাম" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_chattogram">
								<option hidden selected><?php echo $home_district_under_chattogram;?></option>
								<option></option>
								<option value="কক্সবাজার">কক্সবাজার</option>  
								<option value="কুমিল্লা">কুমিল্লা</option>
								<option value="খাগড়াছড়ি">খাগড়াছড়ি</option>
								<option value="চট্টগ্রাম">চট্টগ্রাম</option>
								<option value="চাঁদপুর">চাঁদপুর</option>
								<option value="নোয়াখালী">নোয়াখালী</option>
								<option value="ফেনী">ফেনী</option>
								<option value="বান্দরবান">বান্দরবান</option>
								<option value="ব্রাহ্মনবাড়ীয়া">ব্রাহ্মনবাড়ীয়া</option> 
								<option value="লক্ষীপুর">লক্ষীপুর</option>
								<option value="রাঙ্গামাটি">রাঙ্গামাটি</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="ঢাকা" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_dhaka">
							<option hidden selected><?php echo $home_district_under_dhaka;?></option>
							<option></option>
							<option value="কিশোরগঞ্জ">কিশোরগঞ্জ</option>
							<option value="গাজীপুর">গাজীপুর</option>
							<option value="গোপালগঞ্জ">গোপালগঞ্জ</option>
							<option value="টাঙ্গাইল">টাঙ্গাইল</option>
							<option value="ঢাকা">ঢাকা</option>
							<option value="নরসিংদী">নরসিংদী</option>
							<option value="নারায়ণগঞ্জ">নারায়ণগঞ্জ</option>
							<option value="ফরিদপুর">ফরিদপুর</option>
							<option value="মাদারীপুর">মাদারীপুর</option>
							<option value="মানিকগঞ্জ">মানিকগঞ্জ</option>
							<option value="মুন্সীগঞ্জ">মুন্সীগঞ্জ</option>
							<option value="রাজবাড়ী">রাজবাড়ী</option>
							<option value="শরীয়তপুর">শরীয়তপুর</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="খুলনা" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_khulna">
								<option hidden selected><?php echo $home_district_under_khulna;?></option>
								<option></option>
								<option value="কুষ্টিয়া">কুষ্টিয়া</option>
								<option value="খুলনা">খুলনা</option>
								<option value="চুয়াডাঙ্গা">চুয়াডাঙ্গা</option>
								<option value="ঝিনাইদহ">ঝিনাইদহ</option>
								<option value="নড়াইল">নড়াইল</option>
								<option value="বাগেরহাট">বাগেরহাট</option>
								<option value="মাগুরা">মাগুরা</option>
								<option value="মেহেরপুর">মেহেরপুর</option>
								<option value="যশোর">যশোর</option>
								<option value="সাতক্ষীরা">সাতক্ষীরা</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="ময়মনসিংহ" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_mymensingh">
								<option hidden selected><?php echo $home_district_under_mymensingh;?></option>
								<option></option>
								<option value="জামালপুর">জামালপুর</option>
								<option value="নেত্রকোনা">নেত্রকোনা</option>
								<option value="ময়মনসিংহ">ময়মনসিংহ</option> 
								<option value="শেরপুর">শেরপুর</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="রাজশাহী" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_rajshahi">
								<option hidden selected><?php echo $home_district_under_rajshahi;?></option>
								<option></option>
								<option value="চাঁপাই-নবাবগঞ্জ">চাঁপাই-নবাবগঞ্জ</option>
								<option value="জয়পুরহাট">জয়পুরহাট</option>
								<option value="নওগাঁ">নওগাঁ</option>
								<option value="নাটোর">নাটোর</option>
								<option value="পাবনা">পাবনা</option>
								<option value="বগুড়া">বগুড়া</option>
								<option value="রাজশাহী">রাজশাহী</option>
								<option value="সিরাজগঞ্জ">সিরাজগঞ্জ</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="রংপুর" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_rangpur">
								<option hidden selected><?php echo $home_district_under_rangpur;?></option>
								<option></option>
								<option value="কুড়িগ্রাম">কুড়িগ্রাম</option>
								<option value="গাইবান্ধা">গাইবান্ধা</option>
								<option value="ঠাকুরগাঁও">ঠাকুরগাঁও</option>
								<option value="দিনাজপুর">দিনাজপুর</option>
								<option value="নীলফামারী">নীলফামারী</option>
								<option value="পঞ্চগড়">পঞ্চগড়</option>
								<option value="রংপুর">রংপুর</option>
								<option value="লালমনিরহাট">লালমনিরহাট</option>
							</select>
						</div>

						<div class="shosurbari-biodata-field section" id="সিলেট" style="display: none;">
							<label>স্থায়ী ঠিকানার জেলা<span class="form-required" title="This field is required.">*</span></label>
							<select name="home_district_under_sylhet">
								<option hidden selected><?php echo $home_district_under_sylhet;?></option>
								<option></option>
								<option value="মৌলভীবাজার">মৌলভীবাজার</option>
								<option value="সুনামগঞ্জ">সুনামগঞ্জ</option>
								<option value="সিলেট">সিলেট</option>
								<option value="হবিগঞ্জ">হবিগঞ্জ</option> 
							</select>
						</div>

						<script>
							function showSection(division) {
								// Hide all district sections
								var districtSections = document.getElementsByClassName("section");
								for (var i = 0; i < districtSections.length; i++) {
									districtSections[i].style.display = "none";
								}
								// Show the selected division's district section
								var selectedDivisionSection = document.getElementById(division);
								if (selectedDivisionSection) {
									selectedDivisionSection.style.display = "block";
								}
							}
						</script>

						<!-- Link for Select Field Search Option -->
						<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">যে দেশে বসবাস করেন<span class="form-required" title="This field is required.">*</span></label>
							<select name="country_present_address" required class="selectsearch">
								<option hidden selected><?php echo $country_present_address;?></option>
								<option></option>
								<option hidden disabled>Search Country</option>
								<option value="Afghanistan">Afghanistan</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option> 
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Bahrain">Bahrain</option> 
								<option value="Bangladesh">Bangladesh</option> 
								<option value="Belgium">Belgium</option>
								<option value="Bhutan">Bhutan</option> 
								<option value="Brazil">Brazil</option>
								<option value="Canada">Canada</option>
								<option value="China">China</option> 
								<option value="Colombia">Colombia</option>
								<option value="Denmark">Denmark</option> 
								<option value="Egypt">Egypt</option>
								<option value="Finland">Finland</option> 
								<option value="France">France</option>
								<option value="Germany">Germany</option> 
								<option value="Greece">Greece</option>
								<option value="Hungary">Hungary</option> 
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option> 
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option> 
								<option value="Ireland">Ireland</option>
								<option value="Italy">Italy</option> 
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option> 
								<option value="Kazakhstan">Kazakhstan</option> 
								<option value="Korea, North">Korea, North</option>
								<option value="Korea, South">Korea, South</option> 
								<option value="Kuwait">Kuwait</option>
								<option value="Libya">Libya</option> 
								<option value="Luxembourg">Luxembourg</option>
								<option value="Malaysia">Malaysia</option> 
								<option value="Maldives">Maldives</option> 
								<option value="Mexico">Mexico</option>
								<option value="Morocco">Morocco</option>
								<option value="Myanmar">Myanmar</option>  
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option> 
								<option value="New Zealand">New Zealand</option>
								<option value="Norway">Norway</option> 
								<option value="Oman">Oman</option> 
								<option value="Pakistan">Pakistan</option>
								<option value="Palestine">Palestine</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Philippines">Philippines</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option> 
								<option value="Qatar">Qatar</option> 
								<option value="Russia">Russia</option> 
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Singapore">Singapore</option>
								<option value="South Africa">South Africa</option>  
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option> 
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syria</option> 
								<option value="Taiwan">Taiwan</option>  
								<option value="Tajikistan">Tajikistan</option>   
								<option value="Thailand">Thailand</option> 
								<option value="Turkey">Turkey</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>  
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States of America">United States of America</option> 
								<option value="Uruguay">Uruguay</option>
								<option value="Vietnam">Vietnam</option>
								<option value="Yemen">Yemen</option>
								<option value="Others">Others</option>    
							</select>
						</div>

						<script>
							jQuery('.selectsearch').chosen();
						</script>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">বর্তমান বসবাসের ঠিকানা<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" name="present_address_location" id="edit-name"  value="<?php echo $present_address_location; ?>" size="100" maxlength="100" class="form-text required" required>
						</div>

						<div class="shosurbari-biodata-field">
							<label for="edit-name">বাল্যকালে কোথায় থেকেছেন?<span class="form-required" title="This field is required.">*</span></label>
							<input type="text" id="edit-name" name="childhood" value="<?php echo $childhood; ?>" size="100" maxlength="100" class="form-text required" required>
						</div>
					</div>
				</div>
                <input type="submit" name="update" value="Update">
				<!-- <button type="submit" id="edit-submit" name="op" class="biodata-submit"><span></span>Submit</button>			 -->
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

