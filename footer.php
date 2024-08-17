<style>
.col_2 {
    margin-left: auto;
    margin-right: auto;
    margin-top: 0px;
    padding: 20px 0;
}
.col_2 h4,
.col_2 h6 {
	color: #fff;
	font-size:1.3em;
	margin-bottom:1em;
    text-align: right;
}
@media (max-width:992px){
	.col_2 h6,
	.col_2 h4 {
		margin-bottom: 0;
	}
}
@media (max-width:930px){
	.col_2 {
		padding: 15px;
	}
	.col_2 h4,
	.col_2 h6 {
        text-align: center;
    }
}
@media (max-width: 736px){
	.col_2 {
    	padding: 0;
		margin-bottom: 1.7em;
	}
}
@media (max-width: 320px){
    .col_2 h4 {
        font-size: 1.1em;
    }
}
</style>
<div class="footer">
    <div class="container">
    	<div class="col-md-4 col_2">
    		<h4>About Us</h4>
    		<p>ShosurBari.com, dedicated to Bangladeshi Matrimony, connects Bengali brides and grooms to discover ideal life partners for a fulfilling marriage journey, fostering compatibility with dedication.</p>
    	</div>
    	<div class="col-md-2 col_2">
    		<h4>Help & Support</h4>
    		<ul class="footer_links">
    			<li><a href="https://www.facebook.com/ShosurBari.Matrimony" target="_blank">24x7 Live help <i class="fa fa-angle-double-left"></i></a></li>
    			<li><a href="about-us.php">About Us <i class="fa fa-angle-double-left"></i></a></li>
    			<li><a href="faq.php">FAQs <i class="fa fa-angle-double-left"></i></a></li>
    		</ul>
    	</div>
    	<div class="col-md-2 col_2">
    		<h4>Quick Links</h4>
    		<ul class="footer_links">
				<li><a href="terms.php">Terms & Conditions <i class="fa fa-angle-double-left"></i></a></li>
    			<li><a href="privacy.php">Privacy Policy <i class="fa fa-angle-double-left"></i></a></li>
    			<li><a href="services.php">Services <i class="fa fa-angle-double-left"></i></a></li>
    		</ul>
    	</div>
    	<div class="col-md-2 col_2">
    		<h6>Follow Us</h6>
    		<ul class="footer_social">
				<li>
					<a id="facebookLink" href="https://www.facebook.com/ShosurBari.Matrimony" target="_blank" aria-label="Visit ShosurBari on Facebook">
					<i class="fa fa-facebook fa1"></i>
					</a>
				</li>
				<li><a href="#" aria-label="Placeholder Link"><i class="fa fa-twitter fa1"> </i></a></li>
				<li><a  href="mailto:info@shosurbari.com" aria-label="Contact ShosurBari via Email"><i class="fa fa-google-plus fa1"> </i></a></li>
				<li>
					<a id="youtubeLink" href="#" aria-label="Visit ShosurBari on YouTube">
					<i class="fa fa-youtube fa1"></i>
					</a>
				</li>
			</ul>
    	</div>
    	<div class="clearfix"> </div>
			<div class="shosurbari-copy-right">
				<p> Copyright © 2022-24 ShosurBari.com | All Rights Reserved </p>
			</div>
    	</div>
	</div>
	<!--Scrolling Bottom to top -->
	<div id="scroll-up-btn" onclick="scrollToTop()">
		<i class="fa fa-angle-double-up"></i>
	</div>
</div>
<!--All Page Scrolling Bottom to top -->
<script>
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
	var scrollBtn = document.getElementById("scroll-up-btn");
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	scrollBtn.style.display = "block";
	} else {
	scrollBtn.style.display = "none";
	}
}
function scrollToTop() {
	var scrollOptions = {
	top: 0,
	left: 0,
	behavior: 'smooth'
};
document.documentElement.scrollTo(scrollOptions);
}
</script>
<!-- Navigation Bar Bottom Shadow when scroll down -->
<script>
	window.addEventListener("scroll", function() {
		var navbar = document.querySelector(".navbar-inner_1");
		if (window.pageYOffset > 50) {
		navbar.style.boxShadow = "0 -3px 12px 0 #000";
		} else {
		navbar.style.boxShadow = "none";
		}
	});
</script>
<script>
  // Check if the user is on a mobile device
  const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
  // Get the social link elements
  const facebookLink = document.getElementById('facebookLink');
  const youtubeLink = document.getElementById('youtubeLink');
  // Define the mobile and desktop URLs for Facebook and YouTube
  const facebookMobileUrl = 'fb://page/102433621463638';
  const facebookDesktopUrl = 'https://www.facebook.com/ShosurBari.Matrimony';
  const youtubeMobileUrl = 'vnd.youtube://www.youtube.com/channel/your_youtube_channel_id'; // Replace with your YouTube channel ID
  const youtubeDesktopUrl = 'https://www.youtube.com/channel/your_youtube_channel_id';
  // Set the href attribute based on the device type for Facebook
  facebookLink.href = isMobile ? facebookMobileUrl : facebookDesktopUrl;
  // Set the href attribute based on the device type for YouTube
  youtubeLink.href = isMobile ? youtubeMobileUrl : youtubeDesktopUrl;
</script>
