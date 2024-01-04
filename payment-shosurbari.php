<?php 
include_once("includes/basic_includes.php");
include_once("functions.php"); 
biodata_sale_customer(); 
error_reporting(0);
if (isset($_GET['Biodata'])) {
  $ids = $_GET['Biodata'];
  // Explode the IDs by comma and space to count them
  $idArray = explode(', ', $ids);
  // Limit the array to contain a maximum of 10 IDs
  $idArray = array_slice($idArray, 0, 10);
  $idCount = count($idArray);
  // Calculate the fee based on the number of IDs
  $fee = 0;
  if ($idCount === 1) {
  $fee = 145;
  } elseif ($idCount === 2) {
  $fee = 280;
  } elseif ($idCount === 3) {
  $fee = 390;
  } elseif ($idCount === 4) {
  $fee = 500;
  } elseif ($idCount === 5) {
  $fee = 600;
  } elseif ($idCount === 6) {
  $fee = 690;
  } elseif ($idCount === 7) {
  $fee = 770;
  } elseif ($idCount === 8) {
  $fee = 840;
  } elseif ($idCount === 9) {
  $fee = 900;
  } elseif ($idCount >= 10) {
  $fee = 980;
  }
} else {
  $ids = ''; // Set a default value if the parameter is not provided
  $idCount = 0;
  $fee = 0;
}
// Check if the browser cookie is set and use it to populate the input field
$cookieName = "choice_list_ids";
if (isset($_COOKIE[$cookieName])) {
  $numIdsFromCookie = $_COOKIE[$cookieName];
  // Automatically fill the input field with the number of IDs from the cookie
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Payment | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" /><!-- eye icon password show -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<script src="js/optionsearch.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!--font-Awesome-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--font-Awesome-->
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Add icon library end -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Country Code with Flag for Number input field below 2 link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
</head>
<body>
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
  <style>
  .shosurbari-form-error{
    font-size: 16px;
    margin-top: 0px;
    background: rgb(255, 221, 238);
    border-radius: 2px 2px 4px 4px;
    text-align: center;
    display: none;
  }
  input[type="radio"] {
    display: none;
  }
  .custom-radio-option {
    display: inline-block;
    width: 20px;
    height: 26px;
    margin: 5px 5px 7px 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    cursor: pointer;
    position: relative;
  }
  input[type="radio"]:checked + label {
    background: linear-gradient(#06b6d4, #0aa4ca);
    color: #fff;
    border: 1px solid #06b6d4;
  }
  input[type="radio"] + label {
    display: inline-block;
    line-height: 8px;
    padding: 10px;
    border-radius: 2px;
    width: auto;
    transition: transform 0.3s;
  }
  input[type="radio"] + label:hover {
    background: linear-gradient(#0aa4ca, #06b6d4);
    color: #fff;
    border: 1px solid #ccc;
    transition: transform 0.3s;
    transform: scale(1.1);
  }
  label {
    margin-bottom: 2px;
    color: #000;
    font-weight: 500;
    font-size: 16px;
  }
  .shosurbari-biodata-field {
    padding: 10px 0px;
    text-align: center;
  }
  .sb-biodata-field{
    background: none;
  }
  .payment-form h2,
  .sb-biodata-field h2{
    color: #000;
    font-size: 23px;
    font-weight: bold;
    background: none;
    text-align: left;
  }
  .shosurbari-biodata-form {
    align-items: center;
    flex-wrap: wrap;
    width: 1400px;
    margin: auto;
    padding-top: 30px;
    padding-bottom: 30px
  }
  .soshurbari-animation-icon,
  .soshurbari-payment-icon,
  .shosurbari-animation-form {
    flex-basis: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .soshurbari-animation-icon h3 {
    font-size: 23px;
    font-weight: bold;
    margin-bottom: 15px;
    margin-top: 15px;
  }
  .soshurbari-payment-icon h4 {
    color: #fff;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
    margin-top: 10px;
  }
  .soshurbari-animation-icon img {
    justify-content: flex-end;
    margin: auto;
    width: 37px;
    height: 35px;
  }
  .soshurbari-payment-icon img {
    justify-content: flex-end;
    margin: auto;
    width: 80px;
    height: 35px;
    border-radius: 3px;
  }
  .shosurbari-biodata form{
    margin-left: auto;
    margin-right: auto;
    margin-bottom: auto;
    margin-top: 0px;
  }
  .form-actions button{
    display: block;
    margin: 25px auto 0px auto;
    width: 100%;
    color: #fff;
    padding: 6px;
    border-radius: 3px;
    background: linear-gradient(#06b6d4, #0aa4ca);
    cursor: pointer;
    position: relative;
    transition: all .2s ease;
    white-space: nowrap;
    font-size: 0.60em;
    height: 40px;
    line-height: 27px;
    box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
    border: 1px solid rgba(0,0,0,.05);
  }
  .form-actions button:hover{
    color: #fff;
    background: linear-gradient(#0aa4ca, #06b6d4);
  }
  .flex-container{
    padding-bottom: 50px;
  }
  @media (max-width: 1400px){
  .shosurbari-biodata-form{
    width: auto;
  }
  }
  @media (max-width: 1024px) {
  .shosurbari-animation-form {
    flex-basis: 100%;
    justify-content: center;
  }
  .shosurbari-biodata-form {
    width: auto;
  }
  }
  @media(max-width: 930px){
  .flex-container{
    display: block;
  }
  }
  @media (max-width:480px){
  .soshurbari-animation-icon h3,
  .payment-form h2{
    font-size: 20px;
  }
  }
  </style>
  <div class="grid_3">
    <div class="container">
      <div class="breadcrumb1">
        <ul>
          <a href="index.php"><i class="fa fa-home home_1"></i></a>
          <span class="divider">&nbsp;|&nbsp;</span>
          <li class="current-page"><h4>Payment</h4></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  --                S  T  A  R  T                  --
  --   SHOSURBARI BIODATA FORM FIELD ALL SECTION   --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
  <div class="shosurbari-biodata">
    <form action="" method="POST" name="myForm" onsubmit="return validateForm()">
      <div class="flex-container">
        <div class="payment-form">
          <div class="soshurbari-animation-icon">
            <div class="sb-icon-laptop">
              <h3> <img src="images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
            </div>
          </div>
          <div class="sb-biodata-field">
            <h2>কাস্টমার তথ্য</h2>
          </div>
          <?php
            session_start();
            include("includes/basic_includes.php");
            // Check if user is logged in
            if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            // Include database connection file
            include("includes/dbconn.php");
            // Retrieve user data from 'users' table
            $userSql = "SELECT * FROM users WHERE id = $id";
            $userResult = mysqlexec($userSql);
            if ($userResult && mysqli_num_rows($userResult) > 0) {
            $userRow = mysqli_fetch_assoc($userResult);
            $fullname = $userRow['fullname'];
            $email = $userRow['email'];
            $pnumber = $userRow['number'];
            // Retrieve permanent_address from 'sb_adddress' table
            $addressSql = "SELECT childhood FROM 4bd_address_details WHERE user_id = $id";
            $addressResult = mysqlexec($addressSql);
            if ($addressResult && mysqli_num_rows($addressResult) > 0) {
            $addressRow = mysqli_fetch_assoc($addressResult);
            $permanent_address = $addressRow['childhood'];
            } else {
            $permanent_address = ''; // No address found
            }
            }
            } else {
            $fullname = '';
            $email = '';
            $pnumber = '';
            $permanent_address = '';
            }
          ?>
          <div class="form-group">
            <label>নাম<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="cust_name" placeholder="আপনার পুরো নাম" name="cust_name" value="<?php echo $fullname; ?>" size="60" maxlength="60" class="form-text required">
            <span id="name-error" class="shosurbari-form-error"></span>
          </div>
          <div class="form-group">
            <label>ই-মেইল<span class="form-required" title="This field is required.">*</span></label>
            <input type="email" id="cust_email" placeholder="আপনার ই-মেইল" name="cust_email" value="<?php echo $email; ?>" size="60" maxlength="60" class="form-text">
            <span id="email-error" class="shosurbari-form-error"></span>
          </div>
          <div class="form-group">
            <label>মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span></label>
            <input type="tel" id="pnumber" placeholder="আপনার ফোন নাম্বার" name="cust_number" value="<?php echo $pnumber; ?>" size="60" minlength="10" maxlength="14" class="form-text required">
            <input type="hidden" id="selectedCountryCode" name="selectedCountryCode">
            <input type="hidden" id="selectedCountryName" name="selectedCountryName">
            <span id="phone-error" class="shosurbari-form-error"></span>
          </div>
          <script>
          // Phone Number Country Code With Country Flag
          $(document).ready(function () {
          var input = document.querySelector("#pnumber");
          var iti = window.intlTelInput(input, {
          separateDialCode: true,
          preferredCountries: ["bd"]
          });
          input.addEventListener("countrychange", function () {
          var selectedCountry = iti.getSelectedCountryData();
          $("#selectedCountryCode").val(selectedCountry.dialCode);
          $("#selectedCountryName").val(selectedCountry.name);
          });
          // Set default country code and name if no country is selected
          var defaultCountry = iti.getSelectedCountryData();
          $("#selectedCountryCode").val(defaultCountry.dialCode);
          $("#selectedCountryName").val(defaultCountry.name);
          });
          </script>
          <div class="form-group">
            <label>স্থায়ী ঠিকানা<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="permanent_address" name="cust_permanent_address" placeholder="আপনার স্থায়ী ঠিকানা" value="<?php echo $permanent_address; ?>" size="100" maxlength="100" class="form-text required">
            <span id="address-error" class="shosurbari-form-error"></span>
          </div>
          <div class="form-group">
            <label>পছন্দের বায়োডাটা<span class="form-required" title="This field is required.">*</span><span style="color: #7b7b7b; font-size: 14px; font-weight: 500;" class="form-required" title="This field is required."> (অপরিবর্তনশীল)</span></label>
            <textarea rows="4" id="contact_biodatas_number" name="request_biodata_number" class="form-text required" style="background: #ecfeff;" readonly><?php
              if (isset($_GET['/Biodata'])) {
              $profileid = $_GET['/Biodata'];
              echo htmlspecialchars($profileid);
              } else {
              if (is_array($idArray)) {
              echo htmlspecialchars(implode(', ', $idArray));
              }}?></textarea>
            <span id="biodata-error" class="shosurbari-form-error"></span>
          </div>
          <div class="form-actions">
            <button type="button" class="next-btn">পেমেন্ট সম্পন্ন করুন</button>
          </div>
        </div>
        <script>
          $('.next-btn').click(function(){
            $('.payment-form').css('display', 'block');
            const windowHeight = $(window).height();
            const paymentFormHeight = $(".payment-form").height();
            let scrollPosition = $(".payment-form").offset().top - (windowHeight / 2) + (paymentFormHeight / 2);
            // Apply different scroll behavior for screens with a width of 930px or below
            if ($(window).width() <= 930) {
            // Increase the multiplier to scroll further down
            scrollPosition = $(".payment-form").offset().top - (windowHeight / 14) + (paymentFormHeight);
            }
            $('html, body').animate({
            scrollTop: scrollPosition
            }, 500);
          });
          // 2nd part
          const nextBtn = document.querySelector('.next-btn');
          const paymentForm = document.querySelector('.payment-form');
          nextBtn.addEventListener('click', () => {
            paymentForm.style.display = 'block';
            const windowHeight = window.innerHeight;
            const paymentFormHeight = paymentForm.offsetHeight;
            let scrollPosition = paymentForm.offsetTop - (windowHeight / 2) + (paymentFormHeight / 2);
            // Apply different scroll behavior for screens with a width of 930px or below
            if (window.innerWidth <= 930) {
            // Increase the multiplier to scroll further down
            scrollPosition = paymentForm.offsetTop - (windowHeight / 14) + (paymentFormHeight);
            }
            window.scrollTo({
            top: scrollPosition,
            behavior: 'smooth'
            });
          });
        </script>
        <div class="payment-form" style="display: none;">
          <div class="soshurbari-animation-icon">
            <div class="sb-icon-laptop">
              <h3> <img src="images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
            </div>
          </div>
          <div class="sb-biodata-field">
            <h2>সেন্ড মানি করুন</h2>
          </div>
          <?php
            function englishToBanglaNumber($number) {
            $english = range(0, 9);
            $bangla = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
            $banglaNumber = str_replace($english, $bangla, $number);
            return $banglaNumber;
            }
            if (isset($_GET['/Biodata'])) {
            $profileid = $_GET['/Biodata'];
            $idCountOne = '1';
            $feeOne = '145';
            $idCountOneBD = englishToBanglaNumber($idCountOne);
            $feeOneBD = englishToBanglaNumber($feeOne);
            // Set idCount and fee to the specific values
            $idCount = $idCountOne;
            $fee = $feeOne;
            echo "<div id=\"payment-amount\" class=\"payment-amount\">$idCountOneBD টি বায়োডাটা, মোট $feeOneBD টাকা।</div>";
            } elseif ($idCount > 0) {
            $idCountBangla = englishToBanglaNumber($idCount);
            $feeBangla = englishToBanglaNumber($fee);
            echo "<div id=\"payment-amount\" class=\"payment-amount\">$idCountBangla টি বায়োডাটা, মোট $feeBangla টাকা।</div>";
            }
          ?>
          <div class="shosurbari-biodata-field" id="payment-border-error" style="border: 1px solid #ccc; margin-bottom: 20px;">
            <label for="edit-name" style="font-weight: bold;">পছন্দের পেমেন্ট পদ্ধতি বেছে নিন।<span class="form-required" title="This field is required.">*</span></label> <br>
            <input type="radio" name="payment_method" id="bkash_radio" value="বিকাশ">
            <label class="custom-radio-option" for="bkash_radio">বিকাশ</label>
            <input type="radio" name="payment_method" id="nagad_radio" value="নগদ">
            <label class="custom-radio-option" for="nagad_radio">নগদ</label>
            <input type="radio" name="payment_method" id="roket_radio" value="রকেট">
            <label class="custom-radio-option" for="roket_radio">রকেট</label>
            <div id="payment-method-error" class="shosurbari-form-error"></div>
          </div>
          <div class="payment-method বিকাশ" style="background: #e2136e; padding: 20px;">
            <div class="soshurbari-payment-icon">
              <div class="sb-icon-laptop">
                <h4> <img src="images/payment-bkash.png"> Send Money </h4>
              </div>
            </div>
            <div class="form-group">
              <p style="color: #fff; text-align: justify;">আপনার মোবাইলের বিকাশ এপ্স অথবা *247# ডায়েল করে মোট টাকা "Send Money" করুন পার্সোনাল বিকাশ নাম্বারে: 01737-226404</p>
              <label style="color: #fff;" >আপনার বিকাশ নাম্বার</label>
              <input style="background: #fff; border-radius: 0px;" type="text" id="bkash_number" name="bkash_number" placeholder="01XX-XXX XXX" class="form-text" />
              <span id="bkashnumber-error" class="shosurbari-form-error"></span>
            </div>
            <div class="form-group">
              <label style="color: #fff;" >ট্রানজেকশন আইডি (TrxID)</label>
              <input style="background: #fff; border-radius: 0px;" type="text" id="bkash_trxid" name="bkash_transaction_id" placeholder="AHV6U3TJ5K" class="form-text" />
              <span id="bkash-error" class="shosurbari-form-error"></span>
            </div>
          </div>
          <div class="payment-method নগদ" style="background: #ec1c24; padding: 20px;">
            <div class="soshurbari-payment-icon">
              <div class="sb-icon-laptop">
                <h4> <img src="images/payment-nagad.png"> Send Money </h4>
              </div>
            </div>
            <div class="form-group">
              <p style="color: #fff; text-align: justify;">আপনার মোবাইলের নগদ এপ্স অথবা *167# ডায়েল করে মোট টাকা "Send Money" করুন পার্সোনাল নগদ নাম্বারে: 01737-226404</p>
              <label style="color: #fff;">আপনার নগদ নাম্বার</label>
              <input style="background: #fff; border-radius: 0px;" type="text" id="nagad_number" name="nagad_number" placeholder="01XX-XXX XXX" class="form-text" />
              <span id="nagadnumber-error" class="shosurbari-form-error"></span>
            </div>
            <div class="form-group">
              <label style="color: #fff;">ট্রানজেকশন আইডি (TxnId)</label>
              <input style="background: #fff; border-radius: 0px;" type="text" id="nagad_trxid" name="nagad_transaction_id" placeholder="72449QUT" class="form-text" />
              <span id="nagad-error" class="shosurbari-form-error"></span>
            </div>
          </div>
          <div class="payment-method রকেট" style="background: #8C3494; padding: 20px;">
            <div class="soshurbari-payment-icon">
              <div class="sb-icon-laptop">
                <h4> <img src="images/payment-rocket.png"> Send Money </h4>
              </div>
            </div>
            <div class="form-group">
              <p style="color: #fff; text-align: justify;">আপনার মোবাইলের রকেট এপ্স অথবা *322# ডায়েল করে মোট টাকা "Send Money" করুন পার্সোনাল রকেট নাম্বারে: 01737-226404-4</p>
              <label style="color: #fff;">আপনার রকেট নাম্বার</label>
              <input style="background: #fff; border-radius: 0px;" type="text" id="roket_number" name="roket_number" placeholder="01XX-XXX XXX-X" class="form-text" />
              <span id="roketnumber-error" class="shosurbari-form-error"></span>
            </div>
            <div class="form-group">
              <label style="color: #fff;">ট্রানজেকশন আইডি (TxnId)</label>
              <input style="background: #fff; border-radius: 0px;" type="text" id="roket_trxid" name="roket_transaction_id" placeholder="3956466293" class="form-text" />
              <span id="roket-error" class="shosurbari-form-error"></span>
            </div>
          </div>
          <div class="payment-option">
            <div class="payment-choich-list">
              <a href="choice-list.php">
                <button class="choichbtn" id="back-btn">চয়েস লিস্ট</button>
              </a>
            </div>
            <input type="hidden" name="idCount" value="<?php echo $idCount; ?>">
            <input type="hidden" name="fee" value="<?php echo $fee; ?>">
            <div class="payment-confirm">
              <button class="sb-pay-confirm" type="submit" id="edit-submit" name="op">কনফার্ম</button>
            </div>
          </div>
          <!-- Popup message -->
          <div class="popup-message">
            <h3></h3>
            <p></p>
          </div>
          <div class="overlay"></div>
        </div>
      </div>
    </form>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    var radioButtons = document.querySelectorAll('input[name="payment_method"]');
    radioButtons.forEach(function (radio) {
    radio.addEventListener('change', function () {
    var paymentMethodForms = document.querySelectorAll('.payment-method');
    paymentMethodForms.forEach(function (method) {
      method.style.display = 'none';
    });
    var selectedMethod = document.querySelector('.payment-method.' + radio.value);
    if (selectedMethod) {
      selectedMethod.style.display = 'block';
    }
    // Hide the error message
    var paymentMethodError = document.getElementById('payment-method-error');
    paymentMethodError.style.display = 'none';
    });
    });
    var form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
    var selectedOption = document.querySelector('input[name="payment_method"]:checked');
    var paymentMethodError = document.getElementById('payment-method-error');
    if (!selectedOption) {
      paymentMethodError.style.display = 'block';
      e.preventDefault();
    }
    });
    });
  </script>
  <script>
    document.getElementById("back-btn").addEventListener("click", function() {
    window.location.href = "choice-list.php";
    });
    function validateForm() {
    var name = document.getElementById("cust_name").value.trim();
    var email = document.getElementById("cust_email").value.trim();
    var phone = document.getElementById("pnumber").value.trim();
    var address = document.getElementById("permanent_address").value.trim();
    var biodata = document.getElementById("contact_biodatas_number").value.trim();
    var nameError = document.getElementById("name-error");
    var emailError = document.getElementById("email-error");
    var phoneError = document.getElementById("phone-error");
    var addressError = document.getElementById("address-error");
    var biodataError = document.getElementById("biodata-error");
    // Full Name validation
    if (name == "") {
    var custName = document.getElementById('cust_name');
    custName.style.borderColor = "red";
    custName.scrollIntoView({
    behavior: 'smooth',
    block: 'center',
    });
    nameError.innerHTML = "উফফ! আপনার সম্পূর্ণ নাম লিখুন।";
    nameError.style.display = 'block';
    nameError.classList.add('fade-in');
    nameError.style.padding = '5px';
    var colors = ['green', 'blue', 'red'];
    var colorIndex = 0;
    setInterval(function () {
    nameError.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
    }, 500);
    return false;
    } else {
    var custName = document.getElementById('cust_name');
    custName.style.borderColor = "green";
    nameError.innerHTML = "";
    nameError.style.display = 'none';
    }
    // Email validation
    if (email == "") {
    document.getElementById('cust_email').style.borderColor = "red";
    document.getElementById('cust_email').scrollIntoView({
    behavior: 'smooth',
    block: 'center',
    });
    emailError.innerHTML = "উফফ! আপনার ই-মেইল লিখুন।";
    emailError.style.display = 'block';
    emailError.classList.add('fade-in');
    emailError.style.padding = '5px';
    var colors = ['green', 'blue', 'red'];
    var colorIndex = 0;
    setInterval(function () {
    emailError.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
    }, 500);
    return false;
    } else if (!/^[a-zA-Z0-9._-]+@(gmail|outlook|hotmail|yahoo).com$/.test(email)) {
    document.getElementById('cust_email').style.borderColor = "red";
    document.getElementById('cust_email').scrollIntoView({
    behavior: 'smooth',
    block: 'center',
    });
    emailError.innerHTML = "উফফ! ই-মেইল হিসাবে শুধুমাত্র ব্যবহার করা যাবে: '@' gmail, outlook, hotmail, yahoo '.com'";
    emailError.style.display = 'block';
    emailError.classList.add('fade-in');
    emailError.style.padding = '5px';
    var colors = ['green', 'blue', 'red'];
    var colorIndex = 0;
    setInterval(function () {
    emailError.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
    }, 500);
    return false;
    } else {
    document.getElementById('cust_email').style.borderColor = "green";
    emailError.innerHTML = "";
    emailError.style.display = 'none';
    }
    // Phone number validation
    if (phone == "") {
    var pnumber = document.getElementById('pnumber');
    pnumber.style.borderColor = "red";
    pnumber.scrollIntoView({
    behavior: 'smooth',
    block: 'center',
    });
    phoneError.innerHTML = "উফফ! আপনার মোবাইল নাম্বার লিখুন।";
    phoneError.style.display = 'block';
    phoneError.classList.add('fade-in');
    phoneError.style.padding = '5px';
    var colors = ['green', 'blue', 'red'];
    var colorIndex = 0;
    setInterval(function () {
    phoneError.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
    }, 500);
    return false;
    } else if (phone.length < 10 || phone.length > 14) {
    var pnumber = document.getElementById('pnumber');
    pnumber.style.borderColor = "red";
    document.getElementById('phone-error').innerHTML = "উফফ! নাম্বারের মধ্যে কোন চিহ্ন বা স্পেস গ্রহণ যোগ্য নয় এবং এর সীমা ৯ থেকে ১৫ ডিজিট।";
    pnumber.scrollIntoView({
    behavior: 'smooth',
    block: 'center',
    });
    var colors = ['green', 'blue', 'red'];
    var colorIndex = 0;
    setInterval(function () {
    phoneError.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
    }, 500);
    return false;
    } else {
    var pnumber = document.getElementById('pnumber');
    pnumber.style.borderColor = "green";
    phoneError.innerHTML = "";
    phoneError.style.display = 'none'; 
    }
    // Validate address
    if (address == "") {
    var permanentAddress = document.getElementById('permanent_address');
    permanentAddress.style.borderColor = "red";
    permanentAddress.scrollIntoView({
    behavior: 'smooth',
    block: 'center',
    });
    addressError.innerHTML = "উফফ! আপনার স্থায়ী ঠিকানা লিখুন।";
    addressError.style.display = 'block';
    addressError.classList.add('fade-in');
    addressError.style.padding = '5px';
    var colors = ['green', 'blue', 'red'];
    var colorIndex = 0;
    setInterval(function () {
    addressError.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
    }, 500);
    return false;
    } else {
    var permanentAddress = document.getElementById('permanent_address');
    permanentAddress.style.borderColor = "green";
    addressError.innerHTML = "";
    addressError.style.display = 'none';
    }
    // Validate biodata
    if (biodata == "") {
    var contactBiodatasNumber = document.getElementById('contact_biodatas_number');
    contactBiodatasNumber.style.borderColor = "red";
    contactBiodatasNumber.scrollIntoView({
    behavior: 'smooth',
    block: 'center',
    });
    biodataError.innerHTML = "উফফ! আপনার পছন্দের বায়োডাটা নং যুক্ত করতে বায়োডাটার প্রোফাইলে প্রবেশ করুন।";
    biodataError.style.display = 'block';
    biodataError.classList.add('fade-in');
    biodataError.style.padding = '5px';
    var colors = ['green', 'blue', 'red'];
    var colorIndex = 0;
    setInterval(function () {
    biodataError.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
    }, 500);
    return false;
    } else {
    var contactBiodatasNumber = document.getElementById('contact_biodatas_number');
    contactBiodatasNumber.style.borderColor = "green";
    biodataError.innerHTML = "";
    biodataError.style.display = 'none';
    }
    var selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
    // Check if a payment method is selected
    if (!selectedPaymentMethod) {
    var paymentMethodError = document.getElementById('payment-method-error');
    var paymentBorderError = document.getElementById('payment-border-error');
    paymentMethodError.style.display = 'block';
    paymentBorderError.style.borderColor = "red";
    paymentBorderError.scrollIntoView({
    behavior: 'smooth',
    block: 'center',
    });
    paymentMethodError.innerHTML = "উফফ! আপনার পেমেন্ট অপশন সিলেক্ট করুন।";
    paymentMethodError.style.display = 'block';
    paymentMethodError.classList.add('fade-in');
    paymentMethodError.style.padding = '5px'; 
    var colors = ['green', 'blue', 'red'];
    var colorIndex = 0;
    setInterval(function () {
    paymentMethodError.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
    }, 500);
    return false;
    } else {
    var paymentBorderError = document.getElementById('payment-border-error');
    document.getElementById('payment-method-error').style.display = 'none';
    paymentBorderError.style.borderColor = "green";
    }
    function continuouslyChangeColor(element, message) {
    var colors = ['green', 'blue', 'red'];
    var index = 0; 
    element.innerText = message;
    element.style.display = 'block';
    function changeColor() {
    element.style.color = colors[index];
    index = (index + 1) % colors.length;
    setTimeout(changeColor, 1000);
    }
    changeColor();
    }
    // BKASH START
    // Determine which payment method is selected and validate the corresponding input fields
    if (selectedPaymentMethod.value === 'বিকাশ') {
      var bkashNumberInput = document.getElementById('bkash_number');
      var bkashTrxIdInput = document.getElementById('bkash_trxid');
      var bkashNumberError = document.getElementById('bkashnumber-error');
      var bkashError = document.getElementById('bkash-error');
      bkashNumberInput.style.borderColor = "red";
      bkashNumberInput.scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
      bkashTrxIdInput.style.borderColor = "red";
      bkashTrxIdInput.scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
      var bkashNumber = bkashNumberInput.value.trim();
      var bkashTrxId = bkashTrxIdInput.value.trim();
      // Check if the input fields for the selected payment method are empty
      if (bkashNumber === '') {
        showErrorMessage(bkashNumberError, 'উফফ! আপনার বিকাশ নাম্বার লিখুন।');
        return false;
      } else {
        hideErrorMessage(bkashNumberError);
        bkashNumberInput.style.borderColor = "green";
      }
      if (bkashTrxId === '') {
        showErrorMessage(bkashError, 'উফফ! আপনার বিকাশ TrxId লিখুন।');
        return false;
      } else {
        hideErrorMessage(bkashError);
        bkashTrxIdInput.style.borderColor = "green";
      }
      function showErrorMessage(element, errorMessage) {
      element.style.display = 'block';
      element.innerHTML = errorMessage;
      element.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
        element.style.color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      }
      function hideErrorMessage(element) {
        element.style.display = 'none';
        element.style.padding = '0';
      }
    }
    // BKASH END
    // NAGAD START
    else if (selectedPaymentMethod.value === 'নগদ') {
    var nagadNumberInput = document.getElementById('nagad_number');
    var nagadTrxIdInput = document.getElementById('nagad_trxid');
    var nagadNumberError = document.getElementById('nagadnumber-error');
    var nagadError = document.getElementById('nagad-error');
    nagadNumberInput.style.borderColor = "red";
    nagadNumberInput.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
    });
    nagadTrxIdInput.style.borderColor = "red";
    nagadTrxIdInput.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
    });
    var nagadNumber = nagadNumberInput.value.trim();
    var nagadTrxId = nagadTrxIdInput.value.trim();
    if (nagadNumber === '') {
      showErrorMessage(nagadNumberError, 'উফফ! আপনার নগদ নাম্বার লিখুন।');
      return false;
    } else {
      hideErrorMessage(nagadNumberError);
      nagadNumberInput.style.borderColor = "green";
    }
    if (nagadTrxId === '') {
      showErrorMessage(nagadError, 'উফফ! আপনার নগদ TxnId লিখুন।');
      return false;
    } else {
      hideErrorMessage(nagadError);
      nagadTrxIdInput.style.borderColor = "green";
    }
    function showErrorMessage(element, errorMessage) {
    element.style.display = 'block';
    element.innerHTML = errorMessage;
    element.style.padding = '5px';
    var colors = ['green', 'blue', 'red'];
    var colorIndex = 0;
    setInterval(function () {
      element.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
    }, 500);
    }
    function hideErrorMessage(element) {
      element.style.display = 'none';
      element.style.padding = '0';
    }
    }
    // NAGAD END
    // ROCKET START
    else if (selectedPaymentMethod.value === 'রকেট') {
    var roketNumberInput = document.getElementById('roket_number');
    var roketTrxIdInput = document.getElementById('roket_trxid');
    var roketNumberError = document.getElementById('roketnumber-error');
    var roketError = document.getElementById('roket-error');
    roketNumberInput.style.borderColor = "red";
    roketNumberInput.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
    });
    roketTrxIdInput.style.borderColor = "red";
    roketTrxIdInput.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
    });
    var roketNumber = roketNumberInput.value.trim();
    var roketTrxId = roketTrxIdInput.value.trim();
    if (roketNumber === '') {
      showErrorMessage(roketNumberError, 'উফফ! আপনার রকেট নাম্বার লিখুন।');
      return false;
    } else {
      hideErrorMessage(roketNumberError);
      roketNumberInput.style.borderColor = "green";
    }
    if (roketTrxId === '') {
      showErrorMessage(roketError, 'উফফ! আপনার রকেট TxnId লিখুন।');
      return false;
    } else {
      hideErrorMessage(roketError);
      roketTrxIdInput.style.borderColor = "green";
    }
    function showErrorMessage(element, errorMessage) {
      element.style.display = 'block';
      element.innerHTML = errorMessage;
      element.style.padding = '5px'; 
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
        element.style.color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
    }
    function hideErrorMessage(element) {
        element.style.display = 'none';
        element.style.padding = '0';
    }
    }
    // ROCKET END
    return true;
    }
    // Show the loading message
    function showLoadingMessage() {
      document.querySelector('.overlay').style.display = 'block';
      var popup = document.querySelector('.popup-message');
      popup.style.display = 'block';
      popup.querySelector('h3').innerHTML = 'অপেক্ষা করুন...';
      popup.querySelector('p').innerHTML = 'আপনার তথ্য যাচাইকরণ চলছে।';
    }
    function showSuccessMessage() {
      var popup = document.querySelector('.popup-message');
      popup.querySelector('h3').innerHTML = 'ধন্যবাদ!';
      popup.querySelector('p').innerHTML = 'আপনার তথ্য সফলভাবে জমা হয়েছে। পেমেন্ট তথ্য যাচাই বাছাইয়ের পর ২৪ ঘন্টার মধ্যে যোগাযোগের কাঙ্ক্ষিত তথ্য প্রদান করা হবে।';
      var closeButton = document.createElement('button');
      closeButton.innerHTML = 'ঠিক আছে';
      closeButton.classList.add('close-button');
      popup.appendChild(closeButton);
      closeButton.addEventListener('click', function() {
      popup.style.display = 'none';
      document.querySelector('.overlay').style.display = 'none';
      if (isLoggedIn) {
      window.location.href = 'my-account.php';
      } else {
      window.location.href = 'search.php';
      }
      });
    }
    // Change the form submission code to the following
    $('form[name="myForm"]').submit(function(e) {
      e.preventDefault();
      if (validateForm()) {
      showLoadingMessage();
      $.ajax({
      url: 'payment-shosurbari.php', 
      type: 'POST',
      data: $(this).serialize(),
      success: function(response) {
      $('.overlay').hide();
      showSuccessMessage();
      $('form[name="myForm"]')[0].reset();
      },
      error: function(jqXHR, textStatus, errorThrown) {
      }
      });
      }
    });
  </script>
  <?php
  session_start();
  //JavaScript variable based on the PHP session
  echo '<script>';
  if(isset($_SESSION['id'])) {
      echo 'var isLoggedIn = true;';
  } else {
      echo 'var isLoggedIn = false;';
  }
  echo '</script>';
  ?>
  <!--=======================================
  How Many Visitors View This Page.
  This Script Connected to get_view_count.php
  and page_views Database Table
  ========================================-->
  <script>
    $(document).ready(function() {
    var pages = ["payment-shosurbari"];
    for (var i = 0; i < pages.length; i++) {
      var page = pages[i];
      $.ajax({
      url: 'get_view_count.php?page=' + page,
      type: 'GET',
      success: function(data) {
      $('#viewCount' + page.replace("_", "")).html(data);
      }
      });
    }
    });
  </script>
  <!--=======  Footer Start ========-->
  <?php include_once("footer.php");?>
  <!--=======  Footer End  =========-->
</body>
</html>

