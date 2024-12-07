<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
//error_reporting(0);
error_reporting(E_ALL);  // সব ধরনের এরর দেখাবে
ini_set('display_errors', 1);  // এরর স্ক্রীনে দেখাবে

contact_us(); 

//include("includes/basic_includes.php");
if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
  include("includes/dbconn.php");
  $sql = "SELECT * FROM users WHERE id = $id";
  $result = mysqlexec($sql);
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $fullname = $row['fullname'];
    $email = $row['email'];
  }
} else {
  $fullname = '';
  $email = '';
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Contact Us | ShosurBari</title>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="description" content="শ্বশুরবাড়ি: ShosurBari.com welcomes your inquiries and is ready to assist you. Our support team is committed to helping you in your exploration of Bangladeshi matrimony, guiding you towards your ideal life partner">
<link rel="icon" href="images/shosurbari-icon.png" type="image/png"/>
<meta property="og:image" content="https://www.shosurbari.com/images/shosurbari-social-share.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Atma" rel="stylesheet" media="print" onload="this.media='all'">
<link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet" media="print" onload="this.media='all'">
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css' media="print" onload="this.media='all'">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js" defer></script>
<!-- Country Code with Flag for Number input field below 2 link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
<script defer>
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        var gtmScript = document.createElement('script');
        gtmScript.async = true;
        gtmScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-2Q53085HTX';
        document.head.appendChild(gtmScript);
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-2Q53085HTX');
    }, 3000);  // Delay for 3 seconds 
});
</script>  <!-- Google Analytics / Users Monitoring -->
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
  .sb-register-login{
    margin: 0 auto 20px auto;
  }
  .sb-biodata-field h2 {
    margin-bottom: 40px;
  }
  .shosurbari-biodata-form {
    align-items: center;
    flex-wrap: wrap;
    width: 1400px;
    margin: auto;
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
  <div class="grid_3">
		<div class="container">
			<div class="breadcrumb1">
				<ul>
		  			<li><a href="index.php" aria-label="ShosurBari Home"><i class="fa fa-home home_1"></i></a></li>
		  			<li><span class="divider">&nbsp;|&nbsp;</span></li>
					<li class="current-page"><h4>Contact Us</h4></li>
				</ul>
			</div>
		</div>
	</div>
  <div class="sb-home-search">
		<h1><span class="shosurbari-heading-span"> Contact </span>Us</h1>
		<div class="sbhome-heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
		</div>
	</div>
  <div class="shosurbari-about-contact">
    <div class="shosurbari-details">
      <h1>How to Contact ShosurBari? </h1>
      <p>
        We're here to help you! If you have any questions, feedback, or inquiries, please feel free to get
        in touch with us using the contact form below. Simply provide us with your details and message, and 
        we'll get back to you as soon as possible.
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
                  <h3> <img src="images/shosurbari-logo-form.png" alt="ShosurBari Form Icon"></h3>
                </div>
              </div>
              <div class="sb-biodata-field">
                <h2>আমাদের সাথে যোগাযোগ</h2>
              </div>

              <div class="form-group">
                <input type="text" id="name_contactus" placeholder="আপনার পুরো নাম" name="name_contactus" value="<?php echo $fullname; ?>" size="50" minlength="4" maxlength="50" class="form-text required">
                <span id="name-error" class="shosurbari-form-error"></span>
              </div>
              <div class="form-group">
                <input type="email" id="email_contactus" style="font-family: 'Ubuntu';" placeholder="আপনার ই-মেইল" name="email_contactus" value="<?php echo $email; ?>" size="60" maxlength="60" class="form-text">
                <span id="email-error" class="shosurbari-form-error"></span>
              </div>
              <div class="form-group">
                <input type="tel" id="number_contactus" placeholder="আপনার ফোন নাম্বার" name="number_contactus" value="" size="50" maxlength="14" class="form-text required">
                <input type="hidden" id="selectedCountryCode" name="selectedCountryCode">
                <input type="hidden" id="selectedCountryName" name="selectedCountryName">
                <span id="phone-error" class="shosurbari-form-error"></span>
              </div>
              <div class="form-group">
                <input type="text" id="subject" placeholder="বিষয়" name="subject" value="" class="form-text required">
                <span id="subject-error" class="shosurbari-form-error"></span>
              </div>
              <div class="form-group">
                <textarea rows="6" id="message_contactus" name="message_contactus" placeholder="কমপক্ষে ২০টি শব্দ/ওয়ার্ড এবং সর্বাধিক ৭০টি শব্দ/ওয়ার্ড এর মধ্যেই আপনার বার্তা লিখুন..." class="form-text-describe required" maxlength="550"></textarea>
                <span id="message-error" class="shosurbari-form-error"></span>
              </div>
              <div class="form-actions">
                <button type="submit" id="edit-submit" name="op" class="btn_1">জমা দিন</button>
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
	<!--View This Page. Connected to get view count -->
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
	    function convertToBanglaNumber(number) {
    const banglaDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    return number.toString().split('').map(digit => banglaDigits[digit]).join('');
  }
	  
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
      errorDiv.innerHTML = "আপনার সম্পূর্ণ নাম লিখুন।";
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
        errorDiv.innerHTML = "আপনার ই-মেইল লিখুন।";
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
	} else if (!/^[a-zA-Z0-9._-]+@(gmail|icloud|outlook|hotmail|yahoo)\.com$/.test(email)) {
        var emailElement = document.getElementById('email_contactus');
        emailElement.style.borderColor = "red";
        emailElement.scrollIntoView({
            behavior: 'smooth',
            block: 'center',
        });
        var errorDiv = document.getElementById('email-error');
        errorDiv.innerHTML = "দুঃখিত! আপনার ইমেলটি গ্রহণ যোগ্য নয়।";
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
      phoneError.innerHTML = "আপনার মোবাইল নাম্বার লিখুন।";
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
    } else if (!/^\d+$/.test(phone) || phone.length < 7 || phone.length > 14) {
      document.getElementById('number_contactus').style.borderColor = "red";
      document.getElementById('number_contactus').scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
      phoneError.innerHTML = "নাম্বারটি সঠিক নয়! এর মধ্যে কোন চিহ্ন, বাংলা বা স্পেস গ্রহণ যোগ্য নয়।";
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
      subjectError.innerHTML = "আপনার মেসেজের বিষয় লিখুন।";
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
    // Message Validation
    if (message === "" || /www\.|\.com|\.org|\.net|http|https|http:|https:|https:\/\/|bit\.ly|xyz|==/.test(message)) {
      messageInput.style.borderColor = "red";
      messageInput.scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
      messageError.innerHTML = "আপনার মেসেজ লিখুন, লিংক অনুমোদিত নয়।";
      messageError.style.display = 'block';
      messageError.classList.add('fade-in');
      messageError.style.padding = '5px';
      valid = false;
    } else {
      // Count valid words (3 or more characters)
      var words = message.split(/\s+/).filter(word => word.length >= 3);
      var wordCount = words.length;
      // Validate word count: minimum 20 words, maximum 70 words 
      if (wordCount < 20) {
        messageInput.style.borderColor = "red";
        messageInput.scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });
        messageError.innerHTML = "কমপক্ষে ২০টি শব্দ/ওয়ার্ড লিখতে হবে।";
        messageError.style.display = 'block';
        messageError.classList.add('fade-in');
        messageError.style.padding = '5px';
        valid = false;
      } else if (wordCount > 70) {
        var extraWords = wordCount - 70;
        // Logging extra words to check if it's working
        console.log("Extra words: " + extraWords);
        var extraWordsBangla = convertToBanglaNumber(extraWords);
        // Logging converted Bangla number to check if it's working
        console.log("Extra words in Bangla: " + extraWordsBangla);
        messageInput.style.borderColor = "red";
        messageInput.scrollIntoView({
          behavior: 'smooth',
          block: 'center',
        });
        messageError.innerHTML = "সর্বাধিক ৭০টি শব্দ/ওয়ার্ড লিখতে পারবেন। দয়া করে অতিরিক্ত " + extraWordsBangla + "টি শব্দ/ওয়ার্ড মুছে ফেলুন।";
        messageError.style.display = 'block';
        messageError.classList.add('fade-in');
        messageError.style.padding = '5px';
        valid = false;
      } else {
        messageInput.style.borderColor = "green";
        messageError.innerHTML = "";
        messageError.style.display = 'none';
        messageError.style.padding = '0';
      }
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
      popup.querySelector('p').innerHTML = 'আপনার তথ্য সফল ভাবে জমা হয়েছে। শীঘ্রই আপনার সাথে যোগাযোগ করা হবে।';
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
