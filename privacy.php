<?php 
include_once("includes/basic_includes.php");
include_once("functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Privacy & Policy | ShosurBari</title>
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
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
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
					<li class="current-page"><h4>Privacy & Policy</h4></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="shosurbari-trmcnd-prvplcy">
		<div class="shosurbari-security">
			<h1> ShosurBari Privacy & Policy </h1>
			<p> Welcome to ShosurBari.com, the trusted online matrimony service provider. This Privacy Policy
				explains how we collect, use, share, and protect your personal information when you use our 
				services. We are committed to ensuring your privacy and maintaining the security of your data.
				By using ShosurBari.com, you consent to the practices described in this Privacy Policy.
			</p>
			<h2> 1. Collection of Personal Information </h2>
			<p> To provide our services, we collect the following information when you create a new account or update your profile: </p>
			<ol>
				<li>
					Contact Information: This includes your name, email address, phone number, and other relevant contact details.
				</li>
				<li>
					Biodata and Profile Information: We collect information about your personal and family background, address, educational qualifications, profession, and other details necessary for matrimonial purposes.
				</li>
				<li>
					Profile Photo: You have the option to upload a profile photo, which can be viewed by other members of ShosurBari.com.
				</li>
			</ol>
			<h2> 2. Use of Collected Information </h2>
			<p> We utilize the information we collect for the following purposes: </p>
			<ol>
				<li>
					Matchmaking: Your personal and profile information helps us in suggesting potential matches that align with your preferences and criteria.
				</li>
				<li>
					Communication: We use your contact information to facilitate communication between you and other members, enabling you to connect and interact on our platform.
				</li>
				<li>
					Profile Verification: We may verify the accuracy and authenticity of your profile to ensure the reliability of our services.
				</li>
				<li>
					Service Enhancement: Your feedback and usage patterns may be used to improve our platform, features, and user experience.
				</li>
			</ol>
			<h3> 3. Privacy and Data Sharing</h3>
			<p> At ShosurBari.com, your privacy is paramount, and we refrain from sharing your personal information for marketing purposes. However, in specific instances, we may disclose information as outlined below: </p>
			<ol>
				<li>
					Matchmaking and Communication: For an enriched matchmaking experience, we may disclose specific details to potential matches, aligning with your preferences. This disclosure encompasses sharing the groom/bride's mobile number, email, and guardian's mobile number to facilitate seamless connections.
				</li>

				<li>
					Legal Requirements: We may disclose your information in response to legal requests, court orders, or to comply with applicable laws and regulations.
				</li>
			</ol>
			<h3> 4. Control and Access to Your Information </h3>
			<p> 
				You can access, update, or deactivate your biodata by logging into your account on ShosurBari.com.
				You have the flexibility to manage your profile information, including your profile photo, at any time. 
				Additionally, you can change your password to maintain account security.
			</p>
			<h4> 5. Security Measures </h4>
			<p> 
				We take comprehensive measures to protect your personal information from unauthorized access, misuse, or loss.
				We employ industry-standard security technologies, encryption protocols, and secure servers to ensure the confidentiality and integrity of your data.
			</p>
			<h4> 6. Retention of Personal Information </h4>
			<p>
				We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law.
			</p>
			<h5> 7. Updates to Privacy Policy </h5>
			<p>
				We may update our Privacy Policy from time to time. Any modifications will be communicated to you through the email address associated with your account or by posting a notice on our website.
				It is recommended to review our Privacy Policy periodically to stay informed about how we handle your information.
			</p>
			<h4> 8. Use of Cookies </h5>
			<p>
				ShosurBari.com uses cookies to enhance your browsing experience and provide personalized features. Cookies are small files stored on your device
				 that enable us to recognize you and remember your preferences for future visits. By using our website, you consent to the use of cookies in accordance with our Cookie Policy.
			</p>
			<h4> 9. Contact Us </h5>
			<p>
				If you have any questions, concerns, or feedback regarding our Privacy Policy or the handling of your personal information, please <a href="contact-us.php"> contact us </a> using the provided contact details on our website.
				We will strive to address your inquiries promptly and resolve any issues to your satisfaction.
			</p>
			<p>
				By using ShosurBari.com, you acknowledge that you have read, understood, and agreed to the terms and practices outlined in this Privacy Policy.
			</p>
		</div>
	</div>
	<!--=======================================
	How Many Visitors View This Page.
	This Script Connected to get_view_count.php
	and page_views Database Table
	========================================-->
  	<script>
		$(document).ready(function() {
		var pages = ["privacy"];
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