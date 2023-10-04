<?php
// Include necessary files and initialize the session
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
?>

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css"> <!-- You can create a CSS file for styling -->
</head>
<body>









    <h1>Edit User</h1>
    <form method="POST">
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

    <a href="dataaddress.php">Back to User List</a>
</body>
</html>
