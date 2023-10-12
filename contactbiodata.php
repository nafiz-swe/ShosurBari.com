<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php biodata_sale_customer(); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Contact Biodata | ShosurBari</title>
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

<!-- Country Code with Flag for Number input field -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />

</head>
<body>
<!-- ============================  Navigation Start =========================== -->
<?php include_once("includes/navigation.php");?>
<!-- ============================  Navigation End ============================ -->
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;<|>&nbsp;</span>
        <li class="current-page"><h4>Contact Biodata</h4></li>
     </ul>
   </div>
</div>
</div>


<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
-- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
--                S  T  A  R  T                  --
--   SHOSURBARI BIODATA FORM FIELD ALL SECTION   --
--                                               --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
<div class="shosurbari-biodata">
  <form action="" method="POST" name="myForm" onsubmit="return validateForm()">
    <div class="flex-container">
      <div class="sb-register-login">
        <div class="sb-biodata-field" style="background: #06b6d4 !important;">
          <h2>Contact Biodata</h2>
        </div>

        <div class="form-group">
          <input type="text" id="cust_name" placeholder="Your Full Name" name="cust_name" value="" size="60" maxlength="60" class="form-text required">
          <span id="name-error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
        </div>

        <div class="form-group">
          <input type="email" id="cust_email" placeholder="Your Email" name="cust_email" value="" size="60" maxlength="60" class="form-text">
          <span id="email-error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
        </div>

        <div class="form-group">
          <input type="tel" id="pnumber" placeholder="Your Phone Number" name="cust_number" value="" size="60" minlength="10" maxlength="15" class="form-text required">
          <span id="phone-error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
        </div>

  <script>
    $(document).ready(function() {
      var input = document.querySelector("#pnumber");
      window.intlTelInput(input, {
        separateDialCode: true,
        preferredCountries: ["bd"]
      });
    });
  </script>


        <div class="form-group">
          <input type="text" id="permanent_address" name="cust_permanent_address" placeholder="Your Permanent Address" value="" size="100" maxlength="100" class="form-text required">
          <span id="address-error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
        </div>

        <div class="form-group">
          <textarea rows="4" id="contact_biodatas_number" name="request_biodata_number" placeholder="Biodatas Number. EX: 0000, 982..." class="form-text required"></textarea>
          <span id="biodata-error" style="font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
        </div>

        <div class="form-actions">
        <button type="button" class="next-btn">Make Payment</button>
        </div>

      </div>



<script>
  $('.next-btn').click(function(){
    $('.payment-form').css('display', 'block');
    $('html, body').animate({
        scrollTop: $(".payment-form").offset().top - ($(window).height()/3)
    }, 500);
});
  </script>


<div class="payment-form" style="display: none;">
<div class="sb-biodata-field" style="background: #06b6d4 !important;">
          <h2>Payment Getway</h2>
        </div>
<div class="shosurbari-biodata-field">
            <label for="edit-name">How many Biodatas do you want to contact?</label> <br>
                <select name="biodata_quantities" id="biodata_quantities" required>
                <option value="" disabled selected>Biodata Quantities</option>
                    <option value="1 Biodata 145 Tk">1 Biodata</option>
                    <option value="2 Biodata 270 Tk">2 Biodata</option>
                    <option value="3 Biodata 375 Tk">3 Biodata</option>
                    <option value="4 Biodata 460 Tk">4 Biodata</option>
                    <option value="5 Biodata 525 Tk">5 Biodata</option>
                    <option value="10 Biodata 990 Tk">10 Biodata</option>
                </select>
                <div id="payment-message" class="form-group" style="display: none;">Please pay <span id="payment-amount">70</span> Tk to continue.</div>
            </div>
            
            <div class="shosurbari-biodata-field">
                <label for="edit-name">Choose your preferred payment method.</label>  <br>
                <select name="payment_method" id="payment_method" required>
                <option value=""  disabled selected>Payment Method</option>
                    <option value="bkash">Bkash</option>
                    <option value="nagad">Nagad</option>
                    <option  value="roket">Roket</option>
                </select>
            </div>

            <div class="payment-method bkash">
                <div class="form-group">
                <p> Please send money to personal Bkash number 01737-226404</p> <br>
                  <label> Your Bkash Number</label>
                  <input type="text" id="bkash_number" name="bkash_number" placeholder="Enter Number" class="form-text required" />
                  <span  id="bkashnumber-error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
                </div>
                <div class="form-group">
                    <label>Bkash Transaction ID</label>
                    <input type="text" id="bkash_trxid" name="bkash_transaction_id" placeholder="Enter TrxID" class="form-text required"/>
                    <span  id="bkash-error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
                </div>
            </div>
            
          <div class="payment-method nagad">
            <div class="form-group">
            <p> Please send money to personal Nagad number 01737-226404</p> <br>
                    <label> Your Nagad Number</label>
                    <input type="text" id="nagad_number" name="nagad_number" placeholder="Enter Number" class="form-text required"/>
                    <span  id="nagadnumber-error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
                </div>
                <div class="form-group">
                    <label> Nagad Transaction ID</label>
                    <input type="text" id="nagad_trxid" name="nagad_transaction_id" placeholder="Enter TxnID" class="form-text required"/>
                    <span  id="nagad-error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
                </div>
          </div>
          
            
            
          <div class="payment-method roket">
              <div class="form-group">
              <p> Please send money to personal Roket number 01737-2264044</p> <br>
                    <label> Your Roket Number</label>
                    <input type="text" id="roket_number" name="roket_number" placeholder="Enter Number" class="form-text required"/>
                    <span  id="roketnumber-error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
              </div>
              <div class="form-group">
                    <label> Roket Transaction ID</label>
                    <input type="text" id="roket_trxid" name="roket_transaction_id" placeholder="Enter TxnID" class="form-text required"/>
                    <span  id="roket-error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
                </div>
          </div>



<div class="form-actions">
  <button type="submit" id="edit-submit" name="op">Submit</button>
</div>


<!-- Popup message -->
<div class="popup-message">
<h3></h3>
<p></p>
</div>
<!-- Overlay -->
<div class="overlay"></div>


</div>
</div>
</form>
</div>


<div class="soshurbari-animation-icon">
<h2>বিকাশ সেন্ড মানি</h2>
    <div class="sb-icon-laptop">
      <img src="images/shosurbari-bkash-payment.png">
    </div>
</div>




    <script>
        let paymentOptions = {
            '1 Biodata 145 Tk': 145,
            '2 Biodata 270 Tk': 270,
            '3 Biodata 375 Tk': 375,
            '4 Biodata 460 Tk': 460,
            '5 Biodata 525 Tk': 525,
            '10 Biodata 990 Tk': 990
        }
        let paymentMethodElements = document.querySelectorAll('.payment-method');
        let paymentMessageElement = document.querySelector('#payment-message');
        let paymentAmountElement = document.querySelector('#payment-amount');
        let biodataQuantitiesElement = document.querySelector('#biodata_quantities');
        let paymentMethodElement = document.querySelector('#payment_method');

        biodataQuantitiesElement.addEventListener('change', function() {
            let paymentAmount = paymentOptions[this.value];
            paymentAmountElement.innerText = paymentAmount;
            paymentMessageElement.style.display = 'block';
        });

        paymentMethodElement.addEventListener('change', function() {
            let selectedMethod = this.value;
            paymentMethodElements.forEach(function(methodElement) {
                if (methodElement.classList.contains(selectedMethod)) {
                    methodElement.style.display = 'block';
                } else {
                    methodElement.style.display = 'none';
                }
            });
        });
    </script>





<script>
  function validateForm() {
  var name = document.getElementById("cust_name").value.trim();
  var email = document.getElementById("cust_email").value.trim();
  var phone = document.getElementById("pnumber").value.trim();
  var address = document.getElementById("permanent_address").value.trim();
  var biodata = document.getElementById("contact_biodatas_number").value.trim();


  var bkashnumber = document.getElementById("bkash_number").value.trim();
  var bkash = document.getElementById("bkash_trxid").value.trim();
  var nagadnumber = document.getElementById("nagad_number").value.trim();
  var nagad = document.getElementById("nagad_trxid").value.trim();
  var roketnumber = document.getElementById("roket_number").value.trim();
  var roket = document.getElementById("roket_trxid").value.trim();


  var nameError = document.getElementById("name-error");
  var emailError = document.getElementById("email-error");
  var phoneError = document.getElementById("phone-error");
  var addressError = document.getElementById("address-error");
  var biodataError = document.getElementById("biodata-error");


  var bkashnumberError = document.getElementById("bkashnumber-error");
  var bkashError = document.getElementById("bkash-error");
  var nagadnumberError = document.getElementById("nagadnumber-error");
  var nagadError = document.getElementById("nagad-error");
  var roketnumberError = document.getElementById("roketnumber-error");
  var roketError = document.getElementById("roket-error");


  var selectedOption = document.getElementById("payment_method").value;
  var valid = true;

  // Validate name



//Full Name validation
        if (name == "") {
        document.getElementById('cust_name').style.borderColor = "red";
        document.getElementById('cust_name').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

        var errorDiv = document.getElementById('name-error');
        errorDiv.innerHTML = "Please Enter Your Full Name !";
        errorDiv.style.display = 'block';
        errorDiv.classList.add('fade-in');

        // Change color multiple times
        var colors = ['green', 'blue', 'red'];
        var colorIndex = 0;
        setInterval(function() {
          errorDiv.style.color = colors[colorIndex];
          colorIndex = (colorIndex + 1) % colors.length;
        }, 500);

        return false;
      }else{
        document.getElementById('cust_name').style.borderColor = "green";
        document.getElementById('name-error').innerHTML = "";
      }






          
      //Email validation
      if (email == "") {
        document.getElementById('cust_email').style.borderColor = "red";
        document.getElementById('cust_email').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

        var errorDiv = document.getElementById('email-error');
        errorDiv.innerHTML = "Please Enter Your Email !";
        errorDiv.style.display = 'block';
        errorDiv.classList.add('fade-in');

        // Change color multiple times
        var colors = ['green', 'blue', 'red'];
        var colorIndex = 0;
        setInterval(function() {
          errorDiv.style.color = colors[colorIndex];
          colorIndex = (colorIndex + 1) % colors.length;
        }, 500);

        return false;
      }else if(! /^[a-zA-Z0-9._-]+@(gmail|outlook|hotmail|yahoo).com$/.test(email)){
        document.getElementById('cust_email').style.borderColor = "red";
        document.getElementById('cust_email').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

        var errorDiv = document.getElementById('email-error');
        errorDiv.innerHTML = "Please Enter a Valid Email. Only Used: (@gmail or @outlook or @hotmail or @yahoo).com";
        errorDiv.style.display = 'block';
        errorDiv.classList.add('fade-in');

        // Change color multiple times
        var colors = ['green', 'blue', 'red'];
        var colorIndex = 0;
        setInterval(function() {
          errorDiv.style.color = colors[colorIndex];
          colorIndex = (colorIndex + 1) % colors.length;
        }, 500);

        return false;
      }else{
        document.getElementById('cust_email').style.borderColor = "green";
        document.getElementById('email-error').innerHTML = "";
      }





        //Phone number validation
        if (phone == "") {
        document.getElementById('pnumber').style.borderColor = "red";
        document.getElementById('pnumber').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

  var errorDiv = document.getElementById('phone-error');
  errorDiv.innerHTML = "Please Enter Your Phone Number !";
  errorDiv.style.display = 'block';
  errorDiv.classList.add('fade-in');

  // Change color multiple times
  var colors = ['green', 'blue', 'red'];
  var colorIndex = 0;
  setInterval(function() {
    errorDiv.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
  }, 500);

  
        return false;
     // } else if (!/^[0-9]{10,13}$/.test(pnumber)) {
      }else if(pnumber.length < 10 || pnumber.length > 14){
        document.getElementById('pnumber').style.borderColor = "red";
        document.getElementById('phone-error').innerHTML = "Phone Number Must Be Between 10 To 14 Digits. Don't Used Space & Plus Symbol !";
        document.getElementById('pnumber').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

  var errorDiv = document.getElementById('phone-error');
  errorDiv.innerHTML = "Please Enter Your Phone Number !";
  errorDiv.style.display = 'block';
  errorDiv.classList.add('fade-in');

  // Change color multiple times
  var colors = ['green', 'blue', 'red'];
  var colorIndex = 0;
  setInterval(function() {
    errorDiv.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
  }, 500);

        return false;
      }else{
        document.getElementById('pnumber').style.borderColor = "green";
        document.getElementById('phone-error').innerHTML = "";
      }









  // Validate address
  if (address == "") {
        document.getElementById('permanent_address').style.borderColor = "red";
        document.getElementById('permanent_address').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

  var errorDiv = document.getElementById('address-error');
  errorDiv.innerHTML = "Please Enter Your Address !";
  errorDiv.style.display = 'block';
  errorDiv.classList.add('fade-in');

  // Change color multiple times
  var colors = ['green', 'blue', 'red'];
  var colorIndex = 0;
  setInterval(function() {
    errorDiv.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
  }, 500);

        return false;
      }else{
        document.getElementById('permanent_address').style.borderColor = "green";
        document.getElementById('address-error').innerHTML = "";
      }


  // Validate biodata
  if (biodata == "") {
        document.getElementById('contact_biodatas_number').style.borderColor = "red";
        document.getElementById('contact_biodatas_number').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

  var errorDiv = document.getElementById('biodata-error');
  errorDiv.innerHTML = "Please Enter Biodata Number !";
  errorDiv.style.display = 'block';
  errorDiv.classList.add('fade-in');

  // Change color multiple times
  var colors = ['green', 'blue', 'red'];
  var colorIndex = 0;
  setInterval(function() {
    errorDiv.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
  }, 500);

        return false;
      }else{
        document.getElementById('contact_biodatas_number').style.borderColor = "green";
        document.getElementById('biodata-error').innerHTML = "";
      }












  // Validate Bkash
  if (selectedOption === "bkash") {
    nagadnumberError.style.display = "none";
    nagadError.style.display = "none";
    roketnumberError.style.display = "none";
    roketError.style.display = "none";

// Check if Bkash fields are filled in
// Bkash Number
  if (bkashnumber == "") {
        document.getElementById('bkash_number').style.borderColor = "red";
        document.getElementById('bkash_number').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

  var errorDiv = document.getElementById('bkashnumber-error');
  errorDiv.innerHTML = "Please Enter Your Bkash Number !";
  errorDiv.style.display = 'block';
  errorDiv.classList.add('fade-in');

  // Change color multiple times
  var colors = ['green', 'blue', 'red'];
  var colorIndex = 0;
  setInterval(function() {
    errorDiv.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
  }, 500);

        return false;
      }else{
        document.getElementById('bkash_number').style.borderColor = "green";
        document.getElementById('bkashnumber-error').innerHTML = "";
      }



// Bkash TrxID
    if (bkash == "") {
        document.getElementById('bkash_trxid').style.borderColor = "red";
        document.getElementById('bkash_trxid').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

  var errorDiv = document.getElementById('bkash-error');
  errorDiv.innerHTML = "Please Enter Bkash TrxID From Your SMS Box !";
  errorDiv.style.display = 'block';
  errorDiv.classList.add('fade-in');

  // Change color multiple times
  var colors = ['green', 'blue', 'red'];
  var colorIndex = 0;
  setInterval(function() {
    errorDiv.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
  }, 500);

        return false;
      }else{
        document.getElementById('bkash_trxid').style.borderColor = "green";
        document.getElementById('bkash-error').innerHTML = "";
      }
  } 


  
  
// Validate Nagad
  else if (selectedOption === "nagad") {
    bkashnumberError.style.display = "none";
    bkashError.style.display = "none";
    roketnumberError.style.display = "none";
    roketError.style.display = "none";

    
// Check if Nagad fields are filled in
// Nagad Number
       if (nagadnumber == "") {
        document.getElementById('nagad_number').style.borderColor = "red";
        document.getElementById('nagad_number').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

        var errorDiv = document.getElementById('nagadnumber-error');
  errorDiv.innerHTML = "Please Enter Your Nagad Number !";
  errorDiv.style.display = 'block';
  errorDiv.classList.add('fade-in');

  // Change color multiple times
  var colors = ['green', 'blue', 'red'];
  var colorIndex = 0;
  setInterval(function() {
    errorDiv.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
  }, 500);

        return false;
      }else{
        document.getElementById('nagad_number').style.borderColor = "green";
        document.getElementById('nagadnumber-error').innerHTML = "";
      }



// Nagad TxnID
        if (nagad == "") {
        document.getElementById('nagad_trxid').style.borderColor = "red";
        document.getElementById('nagad_trxid').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

  var errorDiv = document.getElementById('nagad-error');
  errorDiv.innerHTML = "Please Enter Nagad TxnID From Your SMS Box !";
  errorDiv.style.display = 'block';
  errorDiv.classList.add('fade-in');

  // Change color multiple times
  var colors = ['green', 'blue', 'red'];
  var colorIndex = 0;
  setInterval(function() {
    errorDiv.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
  }, 500);

        return false;
      }else{
        document.getElementById('nagad_trxid').style.borderColor = "green";
        document.getElementById('nagad-error').innerHTML = "";
      }
  } 
  
  



// Validate Roket
  else if (selectedOption === "roket") {
    bkashnumberError.style.display = "none";
    bkashError.style.display = "none";
    nagadnumberError.style.display = "none";
    nagadError.style.display = "none";

 // Check if roket fields are filled in
// Roket Number
        if (roketnumber == "") {
        document.getElementById('roket_number').style.borderColor = "red";
        document.getElementById('roket_number').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

  var errorDiv = document.getElementById('roketnumber-error');
  errorDiv.innerHTML = "Please Enter Your Roket Number !";
  errorDiv.style.display = 'block';
  errorDiv.classList.add('fade-in');

  // Change color multiple times
  var colors = ['green', 'blue', 'red'];
  var colorIndex = 0;
  setInterval(function() {
    errorDiv.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
  }, 500);

        return false;
      }else{
        document.getElementById('roket_number').style.borderColor = "green";
        document.getElementById('roketnumber-error').innerHTML = "";
      }

// Roket TxnID
        if (roket == "") {
        document.getElementById('roket_trxid').style.borderColor = "red";
        document.getElementById('roket_trxid').scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });

  var errorDiv = document.getElementById('roket-error');
  errorDiv.innerHTML = "Please Enter Roket TxnID From Your SMS Box !";
  errorDiv.style.display = 'block';
  errorDiv.classList.add('fade-in');

  // Change color multiple times
  var colors = ['green', 'blue', 'red'];
  var colorIndex = 0;
  setInterval(function() {
    errorDiv.style.color = colors[colorIndex];
    colorIndex = (colorIndex + 1) % colors.length;
  }, 500);
        
        return false;
      }else{
        document.getElementById('roket_trxid').style.borderColor = "green";
        document.getElementById('roket-error').innerHTML = "";
      }
  } 
  
  
  
  else {
// No Option Selected
    bkashnumberError.style.display = "none";
    bkashError.style.display = "none";

    nagadnumberError.style.display = "none";
    nagadError.style.display = "none";

    roketnumberError.style.display = "none";
    roketError.style.display = "none";
    valid = false;
  }


  return valid;
}
  </script>






<script> 
function showSuccessMessage() {
  // Show the overlay
  document.querySelector('.overlay').style.display = 'block';

  // Show the popup message
  var popup = document.querySelector('.popup-message');
  popup.style.display = 'block';

  // Set the message text
  popup.querySelector('h3').innerHTML = 'Thank you!';
  popup.querySelector('p').innerHTML = 'আপনার তথ্য সফলভাবে জমা হয়েছে। আপনার তথ্য যাচাই করার পর- ৪৮ ঘন্টার মধ্যে যোগাযোগের কাঙ্ক্ষিত তথ্য পাঠানো হবে। অনুগ্রহ করে আপনার ফোনের SMS বক্স বা Email বক্স ফলো করুন।';


  // Add a close button to the popup message
  var closeButton = document.createElement('button');
  closeButton.innerHTML = 'Close';
  closeButton.classList.add('close-button');
  popup.appendChild(closeButton);

  // Hide the popup and overlay when the close button is clicked
  closeButton.addEventListener('click', function() {
    popup.style.display = 'none';
    document.querySelector('.overlay').style.display = 'none';
  });
}

// Change the form submission code to the following
$('form[name="myForm"]').submit(function(e) {
  e.preventDefault(); // Prevent the default form submission

  if (validateForm()) {
    // Submit the form data using AJAX
    $.ajax({
      url: 'contactbiodata.php', // Replace this with the URL of your server-side script
      type: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        // Show the success message
        showSuccessMessage();

        // Clear the form
        $('form[name="myForm"]')[0].reset();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle errors here
      }
    });
  }
});
</script>


<script>
const nextBtn = document.querySelector('.next-btn');
const paymentForm = document.querySelector('.payment-form');

nextBtn.addEventListener('click', () => {
  paymentForm.style.display = 'block';
});
</script>


<style>
.sb-icon-laptop img{
  height: 500px;
  width: 750px;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.soshurbari-animation-icon h2 {
line-height: 50px;
margin: 150px auto 30px auto;
padding: 5px 25px;
text-align: center;
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
  border: 1px solid #ccc;
  padding: 6px;
  border-radius: 4px;
  background: #06b6d4;
  cursor: pointer;
  position: relative;
  transition: all .2s ease;
  white-space: nowrap;
  font-size: 0.60em;
}

.form-actions button:hover{
  color: #fff;
  background: #0aa4ca;
}

.flex-container{
  padding-top: 50px;
  padding-bottom: 50px;
}

@media(max-width: 930px){
  .flex-container{
    display: block;
  }
}

@media (max-width: 768px){
  .sb-icon-laptop img{
    height: 325px;
    width: 460px;
  }

  .soshurbari-animation-icon h2 {
    margin: 90px auto 10px auto;
  }
}

@media (max-width: 480px){
  .sb-icon-laptop img{
    height: 280px;
    width: 370px;
  }
}

@media (max-width: 384px){
  .sb-icon-laptop img{
    height: 250px;
    width: 314px;
  }
}

@media (max-width: 320px){
  .sb-icon-laptop img{
    height: 210px;
    width: 275px;
  }
}
</style>


  <!--=======================================
  How Many Visitors View This Page.
  This Script Connected to get_view_count.php
  and page_views Database Table
  ========================================-->
  <script>
  $(document).ready(function() {
  // Define an array of page names (without the .php extension)
  var pages = ["contactbiodata"];

  // Fetch and display view counts for each page
  for (var i = 0; i < pages.length; i++) {
    var page = pages[i];
    $.ajax({
    url: 'get_view_count.php?page=' + page, // Adjust the URL to your PHP script
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
