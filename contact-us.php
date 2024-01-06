<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
  contact_us(); 
  error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Contact Us | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!--font-Awesome-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- Country Code with Flag for Number input field below 2 link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
<!--font-Awesome-->
</head>
<body>
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
  <div class="grid_3">
		<div class="container">
			<div class="breadcrumb1">
				<ul>
					<a href="index.php"><i class="fa fa-home home_1"></i></a>
					<span class="divider">&nbsp;|&nbsp;</span>
					<li class="current-page"><h4>Contact Us</h4></li>
				</ul>
			</div>
		</div>
	</div>
  <style>
  .shosurbari-form-error{
    font-size: 16px;
    margin-top: 0px;
    background: rgb(255, 221, 238);
    border-radius: 2px 2px 4px 4px;
    text-align: center;
    display: none;
  }
  .sb-biodata-field{
    background: none;
  }
  .sb-register-login h2{
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
    padding-bottom: 30px;
    margin-bottom: 70px
  }
  .soshurbari-animation-icon,
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
  .soshurbari-animation-icon img {
    justify-content: flex-end;
    margin: auto;
    width: 37px;
    height: 35px;
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
  </style>
  <div class="shosurbari-about-contact">
    <div class="shosurbari-details">
      <h1>How to Contact ShosurBari? </h1>
      <p>
        We're here to help you! If you have any questions, feedback, or inquiries, please feel free to get
        in touch with us using the contact form below. Simply provide us with your details and message, and 
        we'll get back to you as soon as possible.
      </p><br>
      <p>
        Please ensure that you provide accurate contact information so that we can 
        reach you effectively. We value your privacy and assure you that your personal 
        details will be handled with utmost confidentiality.
      </p><br>
      <p>
        Our dedicated team is committed to providing excellent customer service, 
        and we strive to respond to all inquiries promptly. Whether you have a 
        question about our services, need assistance with your account, or have 
        any other concerns, we're here to assist you.
      </p><br>
      <p>
        Thank you for choosing shosurbari.com as your trusted matrimonial service 
        provider. We look forward to serving you and helping you find your perfect match.
      </p>
    </div>  
  </div>
  <div class="shosurbari-biodata-form">
    <div class="shosurbari-animation-form">
      <div class="shosurbari-animation-form">
        <form action="" method="POST" name="myForm" onsubmit="return validateForm()">
          <div class="flex-container">
            <div class="sb-register-login">
              <div class="soshurbari-animation-icon">
                <div class="sb-icon-laptop">
                  <h3> <img src="images/shosurbari-icon.png"> ShosurBari </h3>
                </div>
              </div>
              <div class="sb-biodata-field">
                <h2>Contact Us</h2>
              </div>
              <?php
              session_start();
              include("includes/basic_includes.php");
              if(isset($_SESSION['id'])){
              $id = $_SESSION['id'];
              include("includes/dbconn.php");
              $sql = "SELECT * FROM users WHERE id = $id";
              $result = mysqlexec($sql);
              if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $fullname = $row['fullname'];
              $email = $row['email'];
              $pnumber = $row['number'];
              }
              } else {
              $fullname = '';
              $email = '';
              $pnumber = '';
              }
              ?>
              <div class="form-group">
                <input type="text" id="name_contactus" placeholder="আপনার পুরো নাম" name="name_contactus" value="<?php echo $fullname; ?>" size="60" maxlength="60" class="form-text required">
                <span id="name-error" class="shosurbari-form-error"></span>
              </div>
              <div class="form-group">
                <input type="email" id="email_contactus" placeholder="আপনার ই-মেইল" name="email_contactus" value="<?php echo $email; ?>" size="60" maxlength="60" class="form-text">
                <span id="email-error" class="shosurbari-form-error"></span>
              </div>
              <div class="form-group">
                <input type="tel" id="number_contactus" placeholder="আপনার ফোন নাম্বার" name="number_contactus" value="<?php echo $pnumber; ?>" size="50" maxlength="15" class="form-text required">
                <input type="hidden" id="selectedCountryCode" name="selectedCountryCode">
                <input type="hidden" id="selectedCountryName" name="selectedCountryName">
                <span id="phone-error" class="shosurbari-form-error"></span>
              </div>
              <div class="form-group">
                <input type="text" id="subject" placeholder="বিষয়" name="subject" value="" class="form-text required">
                <span id="subject-error" class="shosurbari-form-error"></span>
              </div>
              <div class="form-group">
                <textarea rows="6" id="message_contactus" name="message_contactus" placeholder=" ৫০০ অক্ষরের মধ্যে আপনার বার্তা লিখুন..." class="form-text-describe required" maxlength="500"></textarea>
                <span id="message-error" class="shosurbari-form-error"></span>
              </div>
              <div class="form-actions">
                <button type="submit" id="edit-submit" name="op" class="btn_1 submit">Submit</button>
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
    </div>
  </div>
  <!--=======================================
  How Many Visitors View This Page.
  This Script Connected to get_view_count.php
  and page_views Database Table
  ========================================-->
  <script>
  $(document).ready(function() {
  var pages = ["contact-us"];
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
  <!-- Phone Number Country Code With Country Flag -->
  <script>
    $(document).ready(function() {
      var input = document.querySelector("#number_contactus");
      window.intlTelInput(input, {
      separateDialCode: true,
      preferredCountries: ["bd"]
      });
    });

  // Phone Number Country Code With Country Flag Start
  $(document).ready(function () {
  var input = document.querySelector("#number_contactus");
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
  // Phone Number Country Code With Country Flag End
  </script>
  <!-- Contact Form Validation -->
  <script>
    function validateForm() {
      var name = document.getElementById("name_contactus").value.trim();
      var email = document.getElementById("email_contactus").value.trim();
      var phone = document.getElementById("number_contactus").value.trim();
      var subject = document.getElementById("subject").value.trim();
      var messageInput = document.getElementById("message_contactus");
      var message = messageInput.value.trim();
      var nameError = document.getElementById("name-error");
      var emailError = document.getElementById("email-error");
      var phoneError = document.getElementById("phone-error");
      var subjectError = document.getElementById("subject-error");
      var messageError = document.getElementById("message-error");
      var valid = true;
    // Full Name validation
    if (name == "") {
      var nameElement = document.getElementById('name_contactus');
      nameElement.style.borderColor = "red";
      nameElement.scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
      var errorDiv = document.getElementById('name-error');
      errorDiv.innerHTML = "উফফ! আপনার সম্পূর্ণ নাম লিখুন।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
        errorDiv.style.color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else {
      // Reset styles for a valid input
      document.getElementById('name_contactus').style.borderColor = "green";
      var errorDiv = document.getElementById('name-error');
      errorDiv.innerHTML = "";
      errorDiv.style.display = 'none';
      errorDiv.style.padding = '0';
    }
    // Email validation Start
    if (email == "") {
      var emailElement = document.getElementById('email_contactus');
      emailElement.style.borderColor = "red";
      emailElement.scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
      var errorDiv = document.getElementById('email-error');
      errorDiv.innerHTML = "উফফ! আপনার ই-মেইল লিখুন।";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
        errorDiv.style.color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else if (!/^[a-zA-Z0-9._-]+@(gmail|outlook|hotmail|yahoo).com$/.test(email)) {
      var emailElement = document.getElementById('email_contactus');
      emailElement.style.borderColor = "red";
      emailElement.scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
      var errorDiv = document.getElementById('email-error');
      errorDiv.innerHTML = "উফফ! ই-মেইল হিসাবে শুধুমাত্র ব্যবহার করা যাবে: '@' gmail, outlook, hotmail, yahoo '.com'";
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      errorDiv.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
        errorDiv.style.color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else {
      document.getElementById('email_contactus').style.borderColor = "green";
      var errorDiv = document.getElementById('email-error');
      errorDiv.innerHTML = "";
      errorDiv.style.display = 'none';
      errorDiv.style.padding = '0';
    }
    // Phone number validation Start
    if (phone.trim().length === 0) {
      document.getElementById('number_contactus').style.borderColor = "red";
      document.getElementById('number_contactus').scrollIntoView({
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
    } else if (!/^\d+$/.test(phone) || phone.length < 9 || phone.length > 15) {
      document.getElementById('number_contactus').style.borderColor = "red";
      document.getElementById('number_contactus').scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
      phoneError.innerHTML = "উফফ! নাম্বারের মধ্যে কোন চিহ্ন, বাংলা বা স্পেস গ্রহণ যোগ্য নয় এবং এর সীমা ৯ থেকে ১৫ ডিজিট।";
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
    } else {
      document.getElementById('number_contactus').style.borderColor = "green";
      phoneError.innerHTML = "";
      phoneError.style.display = 'none';
      phoneError.style.padding = '0';
    }
    // Subject Message Start
    if (subject == "") {
      document.getElementById('subject').style.borderColor = "red";
      document.getElementById('subject').scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
      subjectError.innerHTML = "উফফ! আপনার মেসেজের বিষয় লিখুন।";
      subjectError.style.display = 'block';
      subjectError.classList.add('fade-in');
      subjectError.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
        subjectError.style.color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else {
      document.getElementById('subject').style.borderColor = "green";
      subjectError.innerHTML = "";
      subjectError.style.display = 'none';
      subjectError.style.padding = '0';
    }
    // Validate Message Start
    if (message === "") {
      messageInput.style.borderColor = "red";
      messageInput.scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
      messageError.innerHTML = "উফফ! আপনার মেসেজ লিখুন।";
      messageError.style.display = 'block';
      messageError.classList.add('fade-in');
      messageError.style.padding = '5px';
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
        messageError.style.color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      return false;
    } else {
      messageInput.style.borderColor = "green";
      messageError.innerHTML = "";
      messageError.style.display = 'none';
      messageError.style.padding = '0';
    }
    return valid;
  }
  </script>
  <!-- After Submit the FeedBack then Show PoP Up Message -->
  <script> 
    // Show the loading message
    function showLoadingMessage() {
      document.querySelector('.overlay').style.display = 'block';
      var popup = document.querySelector('.popup-message');
      popup.style.display = 'block';
      popup.querySelector('h3').innerHTML = 'অপেক্ষা করুন...';
      popup.querySelector('p').innerHTML = 'আপনার তথ্য যাচাইকরণ চলছে।';
    }
    function showSuccessMessage() {
      document.querySelector('.overlay').style.display = 'block';
      var popup = document.querySelector('.popup-message');
      popup.style.display = 'block';
      popup.querySelector('h3').innerHTML = 'ধন্যবাদ!';
      popup.querySelector('p').innerHTML = 'আপনার তথ্য সফল ভাবেই জমা হয়েছে। শীঘ্রই আপনার সাথে যোগাযোগ করা হবে ইনশাআল্লাহ।';
      var closeButton = document.createElement('button');
      closeButton.innerHTML = 'ঠিক আছে';
      closeButton.classList.add('close-button');
      popup.appendChild(closeButton);
      closeButton.addEventListener('click', function() {
      popup.style.display = 'none';
      document.querySelector('.overlay').style.display = 'none';
      });
    }
    // Change the form submission code to the following
    $('form[name="myForm"]').submit(function(e) {
      e.preventDefault();
      if (validateForm()) {
      showLoadingMessage();
      $.ajax({
        url: 'contact-us.php',
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
  <!--=======  Footer Start ========-->
  <?php include_once("footer.php");?>
  <!--=======  Footer End  =========-->
</body>
</html>	
