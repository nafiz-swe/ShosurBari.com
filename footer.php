
<style>
.col_2 h6 {
	text-align: right;
}
@media (max-width:930px){
	.col_2 h6 {
		text-align: center;
	}
}
</style>
<div class="footer">
    <div class="container">
    	<div class="col-md-4 col_2">
    		<h4>About Us</h4>
    		<p>"Easy way to find Bangladeshi Bengali matchmakers of all professions, religions,
			districts, natives and expatriates. Find your perfect life partner today."</p>
    	</div>
    	<div class="col-md-2 col_2">
    		<h4>Help & Support</h4>
    		<ul class="footer_links">
    			<li><a href="https://www.facebook.com/ShosurBari.bd" target="_blank">24x7 Live help <i class="fa fa-angle-double-left"></i></a></li>
    			<li><a href="about-us.php">About Us <i class="fa fa-angle-double-left"></i></a></li>
    			<li><a href="faq.php">FAQs <i class="fa fa-angle-double-left"></i></a></li>
    		</ul>
    	</div>
    	<div class="col-md-2 col_2">
    		<h4>Quick Links</h4>
    		<ul class="footer_links">
				<li><a href="terms.php">Terms and Conditions <i class="fa fa-angle-double-left"></i></a></li>
    			<li><a href="privacy.php">Privacy Policy <i class="fa fa-angle-double-left"></i></a></li>
    			<li><a href="services.php">Services <i class="fa fa-angle-double-left"></i></a></li>
    		</ul>
    	</div>
    	<div class="col-md-2 col_2">
    		<h6 style="color: #fff; font-size:1.3em; margin-bottom:1em;">Follow Us</h6>
    		<ul class="footer_social">
				<li><a href="https://www.facebook.com/ShosurBari.bd" target="blank"><i class="fa fa-facebook fa1"> </i></a></li>
				<li><a href="#"><i class="fa fa-twitter fa1"> </i></a></li>
				<li><a  href="mailto:shosurbari@gmail.com" target="blank"><i class="fa fa-google-plus fa1"> </i></a></li>
				<li><a href="#"><i class="fa fa-youtube fa1"> </i></a></li>
			</ul>
    	</div>
    	<div class="clearfix"> </div>
			<div class="shosurbari-copy-right">
				<p>
					Copyright © 2022-23 ShosurBari.com | All Rights Reserved | Developed By <i class="fa fa-angle-double-right"></i>
					<a href="https://nafiz-swe-diu.github.io/NafizNoyon.info" target="_blank">
					<img src="images/noyon.png" alt="Nafiz Noyon" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
					</a>
				</p>
			</div>
			<div class="shosurbari-payment">
			<h4 style="color: white; font-size: 13px; font-weight: 500;"> We Accept	<img class="brn-payment" src="images/brn.png"> </h4>
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