<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>

<?php
$result=search();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Profile 404 | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
</head>
<body>

   
<div class="shosurbari-error-form">
    <div class="soshurbari-animation-icon">
        <div class="sb-icon-laptop">
            <img src="images/shosurbari-error.png">
        </div>
    </div>

    <!-- 404 Page area Start-->
    <div class="error-page-area">
        <h2>দুঃখিত! বায়োডাটাটি খুঁজে পাওয়া যায়নি।</h2>
        <p> আপনি যেই বায়োডাটাটি খুঁজচ্ছেন বর্তমানে সেই একাউন্টটি ডিএক্টিভেট রয়েছে। অথবা সঠিক বায়োডাটা নাম্বার দিয়ে পুনরায় চেষ্টা করুন।</p>

        <div class="button-container">
            <a href="index.php" class="btn">হোম পেজ</a>
            <a href="contact.php" class="btn error-btn-mg">রিপোর্ট করুন</a>
        </div>

    </div>
</div>

<!-- 404 Page area End-->
 

<style>
body {
  margin: 0;
  margin-top: 40px;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.shosurbari-error-form {
  text-align: center;
  width: 100%;
}

.soshurbari-animation-icon {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 0px; 

}

.sb-icon-laptop img {
  height: 300px;
  width: 300px;
}

.error-page-area {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 500px;
  margin: auto;
}

.error-page-area h2 {
  width: 710px;
  font-size: 28px;
  line-height: 50px;
  margin-top: 5px;
  margin-bottom: 0;
  margin-left: 50px;
  margin-right: 50px;
  font-weight: 500;
}

.error-page-area p {
  font-size: 15px;
  line-height: 30px;
}

.button-container {
  display: flex; /* Display buttons in the same row */
  justify-content: center; /* Center the buttons horizontally */
  align-items: center; /* Center the buttons vertically */
}

.btn {
  display: flex;
  padding: 10px;
  background: #06b6d4;
  color: #fff; /* Set your desired button text color */
  text-decoration: none;
  border-radius: 2px;
  margin: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, .16), 0 2px 10px rgba(0, 0, 0, .12);
  font-size: 1rem;
  width: auto;
  text-align: center;
}

.btn:hover{
	background:#0aa4ca;
	color:#fff;
}

.error-btn-mg {
  /* Add any specific styles you need for the "Report Problem" button */
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
	var pages = ["404"];

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

</body>
</html>	