<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>About Us | ShosurBari</title>
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
					<li class="current-page"><h4>About Us</h4></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="shosurbari-about-contact">
		<div class="shosurbari-details">
			<h1>What is ShosurBari? </h1>
			<p> ShoshurBari.com, a Bangladeshi matrimonial platform since 2022, offers free account creation 
				to post biodata. Connect directly with preferred matches' parents. Find Bengali brides and grooms
				effortlessly, spanning professions, religions, districts, and both local and expatriate communities.
			</p>
			<h2>Our Mission </h2>
			<p> ShosurBari.com is on a mission to unite hearts across diverse backgrounds, fostering love 
				without boundaries. We're dedicated to creating a trusted platform, leveraging technology 
				to simplify the quest for a life partner. Our commitment lies in promoting inclusivity, 
				transparency, and unparalleled customer satisfaction, ensuring a seamless journey 
				towards lasting relationships.
			</p>
			<h3>Our Commitment</h3>
			<p> At ShosurBari.com, we are committed to upholding the values of diversity, inclusivity,
				and equality. We believe that love knows no boundaries and that every individual deserves
				to find their life partner, irrespective of their religion, profession, or cultural background.
			</p>
			<p> We constantly strive to improve our platform and services, incorporating the latest technologies
				and feedback from our users. Our goal is to create a trusted and transparent platform that simplifies
				the process of finding love and building lifelong relationships.
			</p>
			<p> Join ShosurBari.com today and embark on an exciting journey to discover your perfect life partner.
				 Let us be your trusted companion in your search for love and happiness.
			</p>
			<h4>Customer Satisfaction</h4>
			<p> We are passionate about delivering exceptional customer service and ensuring your satisfaction
				throughout your journey on ShosurBari.com. Our dedicated support team is available to assist you
				with any questions, concerns, or technical issues you may encounter. We are committed to providing
				prompt and reliable assistance to ensure a seamless and enjoyable experience on our platform.
			</p>
			<p> Join us at ShosurBari.com and embark on an exciting journey of finding your life partner. Discover a diverse
				community, meaningful connections, and the potential for a lifelong relationship. We are here to support 
				and guide you every step of the way. Start your search for love and companionship with us today.
			</p>
		</div>
	</div>
	<div class="about_middle">
    	<h2>Our Team</h2>
    	<div class="about_middle-grid1">
			<div class="col-sm-6 testi_grid list-item-0">
				<blockquote class="testi_grid_blockquote">
					<figure class="featured-thumbnail">
						<img src="images/nafiz-noyon.jpg"  class="img-responsive" alt=""/>
					</figure>
					<div>
						<h3>Nafiz Noyon</h3>
						<h4>Engineer, Customer Support & CEO</h4>
						<p>Manages website maintenance and provides customer support for shosurbari.com, a matrimony site for the Bengali community.</p>
						<div class="clearfix"></div>
					</div>
				</blockquote>
			</div>
			<div class="col-sm-6 testi_grid list-item-1">
				<blockquote class="testi_grid_blockquote">
					<figure class="featured-thumbnail">
						<img src="images/nayem-nasimul.jpg" class="img-responsive" alt=""/>
					</figure>
					<div>
						<h3>Dr. Nasimul Nayem</h3>
						<h4>Officer (Customer-Relationship)</h4>
						<p>Manages customer relationships at shosurbari.com, ensuring a smooth experience for Bengali community members.</p>
						<div class="clearfix"></div>
					</div>
        		</blockquote>
      		</div>
     		<div class="clearfix"> </div>
    	</div>
		<div class="about_middle-grid2">	
			<div class="col-sm-6 testi_grid list-item-0">
				<blockquote class="testi_grid_blockquote">
					<figure class="featured-thumbnail">
						<img src="images/aive-rukaiya.png" class="img-responsive" alt=""/>
					</figure>
					<div>
						<h3>Aive Akter</h3>
						<h4>Engineer & Admin Officer</h4>
						<p>Handles customers and administrative duties for shosurbari.com, supporting the Bengali community.</p>
						<div class="clearfix"></div>
					</div>
				</blockquote>
			</div>
      		<div class="col-sm-6 testi_grid list-item-1">
        		<blockquote class="testi_grid_blockquote">
					<figure class="featured-thumbnail">
						<img src="images/aive-rukaiya.png" class="img-responsive" alt=""/>
					</figure>
					<div>
						<h3>Rukaiya Akter</h3>
						<h4>Engineer & Admin Officer</h4>
						<p>Manages projects and administrative responsibilities for shosurbari.com, supporting the Bengali community.</p>
						<div class="clearfix"></div>
					</div>
        		</blockquote>
      		</div>
      		<div class="clearfix"> </div>
    	</div>
	</div>
	<!--=======================================
	How Many Visitors View This Page.
	This Script Connected to get_view_count.php
	and page_views Database Table
	========================================-->
	<script>
		$(document).ready(function() {
		var pages = ["about-us"];
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