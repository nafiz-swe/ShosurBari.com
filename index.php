<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php");
require_once("includes/dbconn.php");
// Increment the unique visitor count
$ip_address = $_SERVER['REMOTE_ADDR'];
saveUniqueVisitor($conn, $ip_address);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Home | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
<!--Below Link Search Filter Settings Icon Spring -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="runtext-container" id="maintenanceNotice">
    <div class="main-runtext">
      <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">
        <div class="holder">
          <!-- 🛠️ মেনটেন্যান্স নোটিস: -->
          <!-- <div class="text-container">
            <a data-fancybox-group="gallery" class="fancybox"><span style="font-weight: bold; color: red;">🛠️ মেনটেন্যান্স নোটিস:</span> আমরা ওয়েবসাইট আপডেট করতে চলেছি, যার কারণে ওয়েবসাইটে যেকোনো সময় অসুবিধার মুখোমুখি হতে পারেন। আমরা শীঘ্রই সমস্যাটি সমাধান করতে চেষ্টা করব, আমরা তার জন্য দুঃখিত এবং আপনার সহযোগিতার জন্য আমরা কৃতজ্ঞ। ধন্যবাদ!</a>
          </div> -->
          <!-- নোটিস: শ্বশুরবাড়ি ডট কমের যাত্রা ( use for space: &nbsp; &nbsp;)--> 
          <div class="text-container">
            <a data-fancybox-group="gallery" class="fancybox"><span style="font-weight: bold; color: red;">জরুরি বিজ্ঞপ্তি:</span> শ্বশুরবাড়ি ডট কমের যাত্রা শুরু হয় ২০২২ থেকে। আমরা আপনাদের সুবিধার কথা চিন্তা করে আমাদের পূর্বের সকল নীতিমালা এবং ওয়েবসাইটের ফিচার পরিবর্তন করে ২০২৪ এর জানুয়ারি থেকে পুনরায় যাত্রা শুরু করেছি। কোনো সার্ভিস চার্জ ছাড়াই শ্বশুরবাড়ি ডটকমে একাউন্ট খুলে বায়োডাটা পোস্ট করুন। বায়োডাটা পোস্ট করে খুঁজেনিন সপ্নময় জীবনসঙ্গী। আপনার সহযোগিতার জন্য আমরা কৃতজ্ঞ। ধন্যবাদ!</a>
          </div>
        </div>
      </marquee>
    </div>
    <button onclick="document.getElementById('maintenanceNotice').style.display = 'none'">Close</button>
  </div>
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
  <style>
  .shosurbari-heading-span{
    color: #06b6d4;
  }
  .form-control {
    padding: 5px 6px;
  }
  .card-package h1 {
    text-align: center;
    text-transform: uppercase;
    font-size: 22px;
    color: black;
    margin-top: -80px;
    margin-bottom: 15px;
    width: 200px;
  }
  /* for the container of search options */
  .droop-down {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 10px 0px;
    height: 160px;
    width: 1090px;
    margin: auto;
    margin-top: -54px;
    background: #fff;
    box-shadow: 0 10px 15px 0 rgb(0 0 0 / 16%);
    position: relative;
  }
  .droop-down h2{
    font-size: 25px;
    text-align: center;
    color: #000;
    font-weight: 500;
    margin: 10px auto 0 auto;
  }
  .inner-wrap {
    height: 177px;
  }
  /* for each search option section */
  .shosurbari-home-search {
    display:  inline-flex;
    flex-direction: column;
    width: 160px;
    margin: 10px 2px 20px 2px;
    padding: 6px;
    background-color: #f1f1f1;
    box-shadow: 1px 1px 4px #888;
    border-radius: 4px;
  }
  .ellipsis {
    font-size: 17px;
  }
  .shosurbari-home-search select {
    width: 200px;
    margin-top: 5px;
  }
  .shosurbari-home-search input[type="submit"] {
    margin: 2px auto;
  }
  .sort-by select {
    width: 140px;
    height: 35px;
    border:1px solid #fff;
    outline:none;
  }
  .sort-by label{
    margin-right:10px;
    font-size: 1.2em;
  }
  form {
    background: none;
    max-width: 1011px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    padding: 10px 5px;
    text-align: center;
    border: 1px solid #ddd;
  }
  th {
    background: #f0f0f0;
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
    line-height: 35px;
  }
  .shosurbari-biodata-form {
    align-items: center;
    flex-wrap: wrap;
    width: 1400px;
    margin: 25px auto 59px auto;
    padding-top: 0px;
    padding-bottom: 30px
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
  @keyframes slide {
    0% {
    background-position: 100% 0;
    }
    100% {
    background-position: 0 0;
    }
  }
  .gender-radio-select .gender-option label {
    padding: 2px 1px;
    margin: auto -36px;
  }
  .gender-radio-select {
    padding: 4px 2px;
  }
  .gender-radio-select .gender-option {
    margin-left: 31px;
    margin-right: -20px;
  }
  @media (max-width: 1400px){
  .shosurbari-biodata-form{
    width: auto;
  }
  }
  @media screen and (max-width: 1200px) {
  .droop-down {
    display: block;
    flex-wrap: wrap;
    justify-content: center;
    height: auto;
    padding: 40px 42px;
    width: 550px;
    margin-top: 150px;
  }
  .droop-down h2 {
    margin: 0px auto 20px auto;
    line-height: 32px;
  }
  .shosurbari-home-search {
    margin: 5px 10px;
    width: 210px;
  }
  .form-control{
    padding: 5px 10px;
  }
  .ellipsis{
    padding: 5px 10px;
  }
  .gender-radio-select .gender-option {
    margin-left: 25px;
    margin-right: 5px;
    width: 40%;
  }
  .gender-radio-select {
    padding: 0;
  }
  .gender-radio-select .gender-option label {
    padding: 2px 4px;
  }
  }
  /* Max Width 1024px  */
  @media (max-width: 1024px) {
  .shosurbari-animation-form {
    flex-basis: 100%;
    justify-content: center;
  }
  .shosurbari-biodata-form {
    width: auto;
  }
  }
  /* Max Width 768px  */
  @media screen and (max-width: 768px) {
  .droop-down h2 {
    font-size: 23px;
    line-height: 32px;
  }
  .droop-down{
    margin-top: -30px;
  }
  }
  /* Max Width 600px  */
  @media screen and (max-width: 600px) {
  .droop-down h2 {
    font-size: 22px;
    line-height: 30px;
  }
  .shosurbari-home-search{
    margin: 5px auto;
    width: 240px;
  }
  .droop-down {
    padding: 40px 50px;
    width: 340px;
  }
  th, td {
    font-size: 15px;
    padding: 8px;
  }
  }
  /* Max Width 480px  */
  @media (max-width:480px){
  .soshurbari-animation-icon h3,
  .sb-register-login h2{
    font-size: 20px;
  }
  }
  /* Max Width 384px  */
  @media screen and (max-width: 384px) {
  .shosurbari-home-search {
    width: 210px;
  }
  .droop-down {
    padding: 20px 25px;
    width: 260px;
    margin-top: 60px;
  }
  .droop-down h2 {
    font-size: 20px;
    line-height: 27px;
  }
  .ellipsis {
    font-size: 16px;
  }
  th, td {
    font-size: 13px;
    padding: 5px;
  }
  }
  </style>
  <section>
    <div class="shosurbari-home-banner">
    </div>
    <div class="banner" style="--duration: 12s" id="slider-banner">
      <div class="banner-content" id="banner-content" target="_blank">
        <div class="sb-home-reg2">
          <h1>স্বপ্নময় জীবনসঙ্গী খুঁজে পেতে, আমরা আপনাকে সাহায্য করার জন্য নিবেদিত।</h1>
          <?php
            if (!isloggedin()) {
              echo '<a href="register.php" class="sb-create-account"><button> বায়োডাটা পোস্ট করুন</button></a>';
            } else {
              echo '<a href="biodata-post.php" class="sb-create-account"><button>  বায়োডাটা পোস্ট করুন</button></a>';
            }
          ?>
        </div>
      </div>
      <div class="slide-indicators" id="slide-indicators" target="_blank"></div>
    </div>
  </section>
	<div class="droop-down">
    <h2> <span class="shosurbari-heading-span">স্বপ্নময় জীবনসঙ্গী</span> খুঁজুন দ্রুততম সময়ে</h2>
    <form action="search.php" method="post">
      <div class="shosurbari-home-search">
        <div class="gender-radio-select">
          <label class="ellipsis" for="Looking">খুঁজছি:</label>
          <div class="gender-option">
            <input type="radio" name="biodatagender" id="male_mob" value="পাত্রের বায়োডাটা" required/>
            <label for="male_mob"><i class="fa fa-male"></i> পাত্র </label>
          </div>
          <div class="gender-option">
            <input type="radio" name="biodatagender" id="female_mob" value="পাত্রীর বায়োডাটা"/>
            <label for="female_mob"><i class="fa fa-female"></i> পাত্রী</label><br>
          </div>
        </div>
        <div id="gender-error-laptop" class="error-message" style=" padding-top: 4px; font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;">বায়োডাটা নির্বাচন করুন!</div>
      </div>
      <div class="shosurbari-home-search">
        <label class="form-control toggle-next ellipsis">বৈবাহিক অবস্থা <span style="color:#06b6d4;"><i class="fa fa-chevron-down"></i></span></label>
        <div class="checkboxes" id="Lorems">
          <div class="inner-wrap">
            <input type="checkbox" name="maritalstatus[]" value="Any Marital Status" class="SelectBox all" onchange="handleAllMaritalStatus(this)" checked />
            <span class="search-options"> সকল বৈবাহিক অবস্থা</span>
            <br>
            <input type="checkbox" name="maritalstatus[]" value="অবিবাহিত" class="SelectBox val" />
            <span class="search-options">অবিবাহিত </span>
            <br>
            <input type="checkbox" name="maritalstatus[]" value="ডিভোর্স" class="SelectBox val" />
            <span class="search-options">ডিভোর্স</span>
            <br>
            <input type="checkbox" name="maritalstatus[]" value="বিধবা" class="SelectBox val" />
            <span class="search-options">বিধবা</span>
            <br>
            <input type="checkbox" name="maritalstatus[]" value="বিপত্নীক" class="SelectBox val" />
            <span class="search-options">বিপত্নীক</span>
            <br>
            <input type="checkbox" name="maritalstatus[]" value="বিবাহিত" class="SelectBox val" />
            <span class="search-options">বিবাহিত</span>
          </div>
        </div>
			</div>
      <div class="shosurbari-home-search">
        <!--Biodata Occupation Option -->
        <label class="form-control toggle-next ellipsis">পেশা <span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
        <div class="checkboxes" id="Lorems">
          <div class="inner-wrap">
            <input type="checkbox" name="occupation_sector[]" value="Any Occupation" class="SelectBox all" onchange="handleAllOccupations(this)" checked />
            <span>সকল পেশা</span>
            <br>
            <!-- Teacher Profession -->                  
            <input type="checkbox" name="occupation_sector[]" value="ব্যবসায়ী" class="SelectBox val" />
            <span class="search-options">ব্যবসায়ী</span>
            <br>
            <!-- Students Sector-->
            <input type="checkbox" name="occupation_sector[]" value="শিক্ষার্থী" class="SelectBox val" onchange="handleStudentOccupation(this)" />
            <span class="search-options">সকল শিক্ষার্থী</span>
            <br>
            <!-- Students Sector-->
            <input type="checkbox" name="student_occupation_level[]" value="কওমী মাদ্রাসার শিক্ষার্থী" class="SelectBox val student-option" onchange="handleStudentOptions(this)" />
            <span class="search-options">শিক্ষার্থী-কওমী মাদ্রাসা</span>
            <br>
            <!-- Students Sector-->
            <input type="checkbox" name="student_occupation_level[]" value="বি.এসসি. ইঞ্জিনিয়ারিং শিক্ষার্থী" class="SelectBox val student-option" onchange="handleStudentOptions(this)" />
            <span class="search-options">শিক্ষার্থী-বি.এসসি. ইঞ্জিনিয়ারিং</span>
            <br>
            <!-- Students Sector-->
            <input type="checkbox" name="student_occupation_level[]" value="মেডিকেল শিক্ষার্থী" class="SelectBox val student-option" onchange="handleStudentOptions(this)" />
            <span class="search-options">শিক্ষার্থী-মেডিকেল</span>
            <br>
            <!-- Medical & Health Sector -->                  
            <input type="checkbox" name="occupation_sector[]" value="ডাক্তার/চিকিৎসা/স্বাস্থ্য" class="SelectBox val" />
            <span class="search-options">ডাক্তার/চিকিৎসা/স্বাস্থ্য</span>
            <br>
            <!--  Engineers Sector-->                  
            <input type="checkbox" name="occupation_sector[]" value="বি.এসসি. ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">বি.এসসি. ইঞ্জিনিয়ার</span>
            <br>
            <!-- Teacher Profession -->                  
            <input type="checkbox" name="occupation_sector[]" value="শিক্ষক/প্রফেসর" class="SelectBox val" />
            <span class="search-options">শিক্ষক/প্রফেসর</span>
            <br>
            <!-- Defense Profession-->                  
            <input type="checkbox" name="occupation_sector[]" value="গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী" class="SelectBox val" />
            <span class="search-options">গোয়েন্দা/প্রতিরক্ষা/সশস্ত্রবাহিনী</span>
            <br>
            <!-- Common Profession-->
            <input type="checkbox" name="occupation_sector[]" value="সার্ভিস/ফাইন্যান্স/ফ্রিল্যান্সার/উদ্যোক্তা" class="SelectBox val" />
            <span class="search-options">সার্ভিস/ফাইন্যান্স/ফ্রিল্যান্সার/উদ্যোক্তা</span>
            <br>
            <!-- Working Forign Sector-->                  
            <input type="checkbox" name="occupation_sector[]" value="প্রবাসী/বিদেশ" class="SelectBox val" />
            <span class="search-options">প্রবাসী/বিদেশ</span>
            <br>
            <!-- Garments Sector-->                  
            <input type="checkbox" name="occupation_sector[]" value="গার্মেন্টস/পোশাক" class="SelectBox val" />
            <span class="search-options">গার্মেন্টস/পোশাক</span>
            <br>
            <!--  Driver Profession -->                  
            <input type="checkbox" name="occupation_sector[]" value="ড্রাইভার/চালক" class="SelectBox val" />
            <span class="search-options">ড্রাইভার/চালক</span>
            <br>
            <!-- Mistri Sector-->                  
            <input type="checkbox" name="occupation_sector[]" value="টেকনিশিয়ান/মিস্ত্রি/কারিগর" class="SelectBox val" />
            <span class="search-options">টেকনিশিয়ান/মিস্ত্রি/কারিগর</span>
            <br>
            <!-- Other Sector-->                  
            <input type="checkbox" name="occupation_sector[]" value="অন্যান্য" class="SelectBox val" />
            <span class="search-options">অন্যান্য</span>
            <br>
            <!-- No Profession Sector-->                  
            <input type="checkbox" name="occupation_sector[]" value="কিছু করিনা" class="SelectBox val" />
            <span class="search-options">কিছু করিনা</span>
            <br>
            </div>
        </div>
      </div>
      <div class="shosurbari-home-search">
        <!--Biodata District Option -->
        <label class="form-control toggle-next ellipsis">স্থায়ী ঠিকানা<span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
        <div class="checkboxes" id="Lorems">
          <div class="inner-wrap">             
            <input type="checkbox" name="permanent_division[]" value="Any District" class="SelectBox all" onchange="handleAllDistricts(this)" checked />
            <span class="search-options">সকল জেলা</span>
            <br>
            <!--  D H A K A -->
            <label class="label-search-options">ঢাকা বিভাগ</label> <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="কিশোরগঞ্জ" class="SelectBox val" />
            <span class="search-options">কিশোরগঞ্জ</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="গাজীপুর" class="SelectBox val" />
            <span class="search-options">গাজীপুর</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="গোপালগঞ্জ" class="SelectBox val" />
            <span class="search-options">গোপালগঞ্জ</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="টাঙ্গাইল" class="SelectBox val" />
            <span class="search-options">টাঙ্গাইল</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="ঢাকা" class="SelectBox val" />
            <span class="search-options">ঢাকা</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="নরসিংদী" class="SelectBox val" />
            <span class="search-options">নরসিংদী</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="নারায়ণগঞ্জ" class="SelectBox val" />
            <span class="search-options">নারায়ণগঞ্জ</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="ফরিদপুর" class="SelectBox val" />
            <span class="search-options">ফরিদপুর</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="মাদারীপুর" class="SelectBox val" />
            <span class="search-options">মাদারীপুর</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="মানিকগঞ্জ" class="SelectBox val" />
            <span class="search-options">মানিকগঞ্জ</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="মুন্সীগঞ্জ" class="SelectBox val" />
            <span class="search-options">মুন্সীগঞ্জ</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="রাজবাড়ী" class="SelectBox val" />
            <span class="search-options">রাজবাড়ী</span>
            <br>
            <input type="checkbox" name="home_district_under_dhaka[]" value="শরীয়তপুর" class="SelectBox val" />
            <span class="search-options">শরীয়তপুর</span>
            <br>
            <!-- C H A T T O G R A M -->
            <label class="label-search-options">চট্টগ্রাম বিভাগ </label><br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="কক্সবাজার" class="SelectBox val" />
            <span class="search-options">কক্সবাজার</span>
            <br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="কুমিল্লা" class="SelectBox val" />
            <span class="search-options">কুমিল্লা</span>
            <br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="খাগড়াছড়ি" class="SelectBox val" />
            <span class="search-options">খাগড়াছড়ি</span>
            <br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="চট্টগ্রাম" class="SelectBox val" />
            <span class="search-options">চট্টগ্রাম</span>
            <br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="চাঁদপুর" class="SelectBox val" />
            <span class="search-options">চাঁদপুর</span>
            <br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="নোয়াখালী" class="SelectBox val" />
            <span class="search-options">নোয়াখালী</span>
            <br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="ফেনী" class="SelectBox val" />
            <span class="search-options">ফেনী</span>
            <br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="বান্দরবান" class="SelectBox val" />
            <span class="search-options">বান্দরবান</span>
            <br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="ব্রাহ্মনবাড়ীয়া" class="SelectBox val" />
            <span class="search-options">ব্রাহ্মনবাড়ীয়া</span>
            <br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="লক্ষীপুর" class="SelectBox val" />
            <span class="search-options">লক্ষীপুর</span>
            <br>
            <input type="checkbox" name="home_district_under_chattogram[]" value="রাঙ্গামাটি" class="SelectBox val" />
            <span class="search-options">রাঙ্গামাটি</span>
            <br>
            <!-- K H U L N A-->
            <label class="label-search-options">খুলনা বিভাগ</label> <br>
            <input type="checkbox" name="home_district_under_khulna[]" value="কুষ্টিয়া" class="SelectBox val" />
            <span class="search-options">কুষ্টিয়া</span>
            <br>
            <input type="checkbox" name="home_district_under_khulna[]" value="খুলনা" class="SelectBox val" />
            <span class="search-options">খুলনা</span>
            <br>
            <input type="checkbox" name="home_district_under_khulna[]" value="চুয়াডাঙ্গা" class="SelectBox val" />
            <span class="search-options">চুয়াডাঙ্গা</span>
            <br>
            <input type="checkbox" name="home_district_under_khulna[]" value="ঝিনাইদহ" class="SelectBox val" />
            <span class="search-options">ঝিনাইদহ</span>
            <br>
            <input type="checkbox" name="home_district_under_khulna[]" value="নড়াইল" class="SelectBox val" />
            <span class="search-options">নড়াইল</span>
            <br>
            <input type="checkbox" name="home_district_under_khulna[]" value="বাগেরহাট" class="SelectBox val" />
            <span class="search-options">বাগেরহাট</span>
            <br>
            <input type="checkbox" name="home_district_under_khulna[]" value="মাগুরা" class="SelectBox val" />
            <span class="search-options">মাগুরা</span>
            <br>
            <input type="checkbox" name="home_district_under_khulna[]" value="মেহেরপুর" class="SelectBox val" />
            <span class="search-options">মেহেরপুর</span>
            <br>
            <input type="checkbox" name="home_district_under_khulna[]" value="যশোর" class="SelectBox val" />
            <span class="search-options">যশোর</span>
            <br>
            <input type="checkbox" name="home_district_under_khulna[]" value="সাতক্ষীরা" class="SelectBox val" />
            <span class="search-options">সাতক্ষীরা</span>
            <br>
            <!-- M Y M E N S I N G H -->
            <label class="label-search-options"> ময়মনসিংহ বিভাগ</label> <br>
            <input type="checkbox" name="home_district_under_mymensingh[]" value="জামালপুর" class="SelectBox val" />
            <span class="search-options">জামালপুর</span>
            <br>
            <input type="checkbox" name="home_district_under_mymensingh[]" value="নেত্রকোনা" class="SelectBox val" />
            <span class="search-options">নেত্রকোনা</span>
            <br>
            <input type="checkbox" name="home_district_under_mymensingh[]" value="ময়মনসিংহ" class="SelectBox val" />
            <span class="search-options">ময়মনসিংহ</span>
            <br>
            <input type="checkbox" name="home_district_under_mymensingh[]" value="শেরপুর" class="SelectBox val" />
            <span class="search-options">শেরপুর</span>
            <br>
            <!--  R A J S H A H I -->
            <label class="label-search-options">রাজশাহী বিভাগ </label><br>
            <input type="checkbox" name="home_district_under_rajshahi[]" value="চাঁপাই-নবাবগঞ্জ" class="SelectBox val" />
            <span class="search-options">চাঁপাই-নবাবগঞ্জ</span>
            <br>
            <input type="checkbox" name="home_district_under_rajshahi[]" value="জয়পুরহাট" class="SelectBox val" />
            <span class="search-options">জয়পুরহাট</span>
            <br>
            <input type="checkbox" name="home_district_under_rajshahi[]" value="নওগাঁ" class="SelectBox val" />
            <span class="search-options">নওগাঁ</span>
            <br>
            <input type="checkbox" name="home_district_under_rajshahi[]" value="নাটোর" class="SelectBox val" />
            <span class="search-options">নাটোর</span>
            <br>
            <input type="checkbox" name="home_district_under_rajshahi[]" value="পাবনা" class="SelectBox val" />
            <span class="search-options">পাবনা</span>
            <br>
            <input type="checkbox" name="home_district_under_rajshahi[]" value="বগুড়া" class="SelectBox val" />
            <span class="search-options">বগুড়া</span>
            <br>
            <input type="checkbox" name="home_district_under_rajshahi[]" value="রাজশাহী" class="SelectBox val" />
            <span class="search-options">রাজশাহী</span>
            <br>
            <input type="checkbox" name="home_district_under_rajshahi[]" value="সিরাজগঞ্জ" class="SelectBox val" />
            <span class="search-options">সিরাজগঞ্জ</span>
            <br>
            <!--  R A N G P U R -->
            <label class="label-search-options">রংপুর বিভাগ </label><br>
            <input type="checkbox" name="home_district_under_rangpur[]" value="কুড়িগ্রাম" class="SelectBox val" />
            <span class="search-options">কুড়িগ্রাম</span>
            <br>
            <input type="checkbox" name="home_district_under_rangpur[]" value="গাইবান্ধা" class="SelectBox val" />
            <span class="search-options">গাইবান্ধা</span>
            <br>
            <input type="checkbox" name="home_district_under_rangpur[]" value="ঠাকুরগাঁও" class="SelectBox val" />
            <span class="search-options">ঠাকুরগাঁও</span>
            <br>
            <input type="checkbox" name="home_district_under_rangpur[]" value="দিনাজপুর" class="SelectBox val" />
            <span class="search-options">দিনাজপুর</span>
            <br>
            <input type="checkbox" name="home_district_under_rangpur[]" value="নীলফামারী" class="SelectBox val" />
            <span class="search-options">নীলফামারী</span>
            <br>
            <input type="checkbox" name="home_district_under_rangpur[]" value="পঞ্চগড়" class="SelectBox val" />
            <span class="search-options">পঞ্চগড়</span>
            <br>
            <input type="checkbox" name="home_district_under_rangpur[]" value="রংপুর" class="SelectBox val" />
            <span class="search-options">রংপুর</span>
            <br>
            <input type="checkbox" name="home_district_under_rangpur[]" value="লালমনিরহাট" class="SelectBox val" />
            <span class="search-options">লালমনিরহাট</span>
            <br>
            <!-- B A R I S H A L -->
            <label class="label-search-options">বরিশাল বিভাগ </label><br>
            <input type="checkbox" name="home_district_under_barishal[]" value="ঝালকাঠী" class="SelectBox val" />
            <span class="search-options">ঝালকাঠী</span>
            <br>
            <input type="checkbox" name="home_district_under_barishal[]" value="পটুয়াখালী" class="SelectBox val" />
            <span class="search-options">পটুয়াখালী</span>
            <br>
            <input type="checkbox" name="home_district_under_barishal[]" value="পিরোজপুর" class="SelectBox val" />
            <span class="search-options">পিরোজপুর</span>
            <br>
            <input type="checkbox" name="home_district_under_barishal[]" value="বরিশাল" class="SelectBox val" />
            <span class="search-options">বরিশাল</span>
            <br>
            <input type="checkbox" name="home_district_under_barishal[]" value="বরগুনা" class="SelectBox val" />
            <span class="search-options">বরগুনা</span>
            <br>
            <input type="checkbox" name="home_district_under_barishal[]" value="ভোলা" class="SelectBox val" />
            <span class="search-options">ভোলা</span>
            <br>
            <!-- S Y L H E T-->
            <label class="label-search-options">সিলেট বিভাগ </label><br>
            <input type="checkbox" name="home_district_under_sylhet[]" value="মৌলভীবাজার" class="SelectBox val" />
            <span class="search-options">মৌলভীবাজার</span>
            <br>
            <input type="checkbox" name="home_district_under_sylhet[]" value="সুনামগঞ্জ" class="SelectBox val" />
            <span class="search-options">সুনামগঞ্জ</span>
            <br>
            <input type="checkbox" name="home_district_under_sylhet[]" value="সিলেট" class="SelectBox val" />
            <span class="search-options">সিলেট</span>
            <br>
            <input type="checkbox" name="home_district_under_sylhet[]" value="হবিগঞ্জ" class="SelectBox val" />
            <span class="search-options">হবিগঞ্জ</span>
          </div>
        </div>
      </div>
      <!-- Religion Start -->
      <div class="shosurbari-home-search">
        <label class="form-control toggle-next ellipsis">ধর্ম  <span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
        <div class="checkboxes" id="Lorems">
          <div class="inner-wrap">
            <input type="checkbox" name="religion[]" value="Any Religion" class="SelectBox all" onchange="handleAllReligions(this)" checked />
            <span class="search-options">সকল ধর্ম</span>
            <br>
            <input type="checkbox" name="religion[]" value="ইসলাম ধর্ম" class="SelectBox val" />
            <span class="search-options">ইসলাম ধর্ম</span>
            <br>
            <input type="checkbox" name="religion[]" value="হিন্দু ধর্ম" class="SelectBox val" />
            <span class="search-options">হিন্দু ধর্ম</span>
            <br>
            <input type="checkbox" name="religion[]" value="খ্রিস্টান ধর্ম" class="SelectBox val" />
            <span class="search-options">খ্রিস্টান ধর্ম</span>
            <br>
            <input type="checkbox" name="religion[]" value="বৌদ্ধ ধর্ম" class="SelectBox val" />
            <span class="search-options">বৌদ্ধ ধর্ম</span>
            <br>
            <input type="checkbox" name="religion[]" value="অন্যান্য" class="SelectBox val" />
            <span class="search-options">অন্যান্য</span>
          </div>
        </div>
      </div>
      <div class="shosurbari-home-search">
        <input type="submit" name="search" value="বায়োডাটা খুঁজুন" onclick="return validateForm();"/>
      </div>
    </form>				
		<div class="clearfix"></div>
	</div>
  <?php
    $c_count = 0;
    if (isset($_POST['search'])) {
      while ($row = mysqli_fetch_assoc($result)) {
        // 1bd_personal_physical
        $profid = $row['user_id'];
        $Skin_tones = $row['Skin_tones'];
        $height = $row['height'];
        $dateofbirth = $row['dateofbirth'];
        // Picture
        $sql2 = "SELECT * FROM photos WHERE user_id=$profid";
        $result2 = mysqlexec($sql2);
        if ($result2)
        $row2 = mysqli_fetch_array($result2);
        $pic1 = $row2['pic1'];
        // 4bd_address_details
        $sql5="SELECT * FROM 4bd_address_details WHERE user_id=$profid";		
        $result5=mysqlexec($sql5);
        if($result5)
        while($row5=mysqli_fetch_assoc($result5))
        $permanent_division=$row5['permanent_division'];
        $home_district_under_barishal=$row5['home_district_under_barishal'];
        $home_district_under_chattogram=$row5['home_district_under_chattogram'];
        $home_district_under_dhaka=$row5['home_district_under_dhaka'];
        $home_district_under_khulna=$row5['home_district_under_khulna'];
        $home_district_under_mymensingh=$row5['home_district_under_mymensingh'];
        $home_district_under_rajshahi=$row5['home_district_under_rajshahi'];
        $home_district_under_rangpur=$row5['home_district_under_rangpur'];
        $home_district_under_sylhet=$row5['home_district_under_sylhet'];
        $country_present_address=$row5['country_present_address'];
        // 6bd_7bd_marital_status
        $sql6="SELECT * FROM 6bd_7bd_marital_status WHERE user_id=$profid";		
        $result6=mysqlexec($sql6);
        if($result6)
        while($row6=mysqli_fetch_assoc($result6))
        $maritalstatus=$row6['maritalstatus'];
        // 8bd_religion_details
        $sql7="SELECT * FROM 8bd_religion_details WHERE user_id=$profid";		
        $result7=mysqlexec($sql7);
        if($result7)
        while($row7=mysqli_fetch_assoc($result7))
        $religion=$row7['religion'];
        // 2bd_personal_lifestyle
        $sql3 = "SELECT * FROM 2bd_personal_lifestyle WHERE user_id=$profid";
        $result3 = mysqlexec($sql3);
        if ($result3 && mysqli_num_rows($result3) > 0) {
        $row3 = mysqli_fetch_assoc($result3);
        $occupation_sector=$row3['occupation_sector'];
        $occupation_sector = array_filter($occupation_sector); // Remove empty values
        $occupation_count = count($occupation_sector);
        if ($occupation_count > 0) {
        $occupation_sector = array_keys($occupation_sector)[0];
        $occupation_value = $occupation_sector[$occupation_sector];
        echo "<div class=\"biodatalist\">";
        echo "<div class=\"sb_bio_header\">";
        // Start of Default Photo Show
        echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\">";
        if (!empty($pic1)) {
        echo "<img class=\"img-responsive\" src=\"profile/{$profid}/{$pic1}\"/>";
        } else {
        echo "<img class=\"img-responsive\" src=\"images/shosurbari-male-icon.jpg\"/>";
        }
        echo "</a>";
        // End of Default photo Show
        echo "<div class=\"sb_bio_number\"><span class=\"sb_biodatanumber\"> {$profid} <br> বায়োডাটা নং </span> </div>";
        echo "</div>";
        echo "<div class=\"sb_user\">";
        echo "<span class=\"sb_single_data\"> <span class=\"sb_value\"> ধর্ম </span> <span class=\"sb_data\"> {$religion}</span></span>";
        echo "<span class=\"sb_single_data\"> <span class=\"sb_value\"> শারীরিক বর্ণ </span> <span class=\"sb_data\">{$Skin_tones}</span></span>";
        echo "<span class=\"sb_single_data\"> <span class=\"sb_value\"> উচ্চতা </span> <span class=\"sb_data\">{$height}</span></span>";
        echo "<span class=\"sb_single_data\"> <span class=\"sb_value\"> পেশা </span> <span class=\"sb_data\"> {$occupation_value}</span></span>";
        echo "<span class=\"sb_single_data\"> <span class=\"sb_value\"> জন্ম সন </span> <span class=\"sb_data\"> {$dateofbirth}</span></span>";
        echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\"> <button class=\"view_sb_profile\"> সম্পূর্ণ বায়োডাটা</button></a>";
        echo "</div></div>";
        $c_count++;
        }
        }
      }
    }
    echo '<script> var count = ' . $c_count . '; </script>';
  ?>
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  --                 S  T  A  R  T                 --
  --    SHOSURBARI HOME PAGE / FEATURED PROFILES   --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
  <div class="grid_1">
    <div class="sb-featured-profiles">
      <h1><span class="shosurbari-heading-span"> জনপ্রিয়</span> বায়োডাটা</h1>
      <div class="sbhome-heart-divider">
        <span class="grey-line"></span>
          <i class="fa fa-heart pink-heart"></i>
          <i class="fa fa-heart grey-heart"></i>
        <span class="grey-line"></span>
      </div>
    </div>
    <ul id="flexiselDemo3">
      <?php
        // Modify the SQL query to join users and 1bd_personal_physical tables and check for activation status
        $sql = "SELECT p.*, u.active
        FROM 1bd_personal_physical p
        INNER JOIN users u ON p.user_id = u.id
        WHERE u.active = 1
        ORDER BY p.view_count DESC LIMIT 20"; // Top 10 profiles by view_count of active users
        $result = mysqlexec($sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            // Check if the user is active
            if ($row['active'] == 1) {
            $profid = $row['user_id'];
            $biodatagender = $row['biodatagender'];
            $dateofbirth = $row['dateofbirth'];
            $sql5 = "SELECT * FROM 8bd_religion_details WHERE user_id=$profid";
            $result5 = mysqlexec($sql5);
            if ($result5) {
            while ($row5 = mysqli_fetch_assoc($result5)) {
            $religion = $row5['religion'];
            }
            }
            $sql2 = "SELECT * FROM photos WHERE user_id = $profid";
            $result2 = mysqlexec($sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $pic1 = $row2['pic1'];
            $defaultImages = [
            'পাত্রের বায়োডাটা' => "shosurbari-male-icon.jpg",
            'পাত্রীর বায়োডাটা' => "shosurbari-female-icon.png",
            ];
            $defaultImage = "shosurbari-default-icon.png";
            if (isset($row['biodatagender']) && isset($defaultImages[$row['biodatagender']])) {
            $defaultImage = $defaultImages[$row['biodatagender']];
            }
            $sql3 = "SELECT * FROM 2bd_personal_lifestyle WHERE user_id=$profid";
            $result3 = mysqlexec($sql3);
            if ($result3 && mysqli_num_rows($result3) > 0) {
            $row3 = mysqli_fetch_assoc($result3);
            $other_occupation_sector = $row3['other_occupation_sector'];
            $occupation_levels = array(
            'business_occupation_level' => $row3['business_occupation_level'],
            'student_occupation_level' => $row3['student_occupation_level'],
            'health_occupation_level' => $row3['health_occupation_level'],
            'engineer_occupation_level' => $row3['engineer_occupation_level'],
            'teacher_occupation_level' => $row3['teacher_occupation_level'],
            'defense_occupation_level' => $row3['defense_occupation_level'],
            'foreigner_occupation_level' => $row3['foreigner_occupation_level'],
            'garments_occupation_level' => $row3['garments_occupation_level'],
            'driver_occupation_level' => $row3['driver_occupation_level'],
            'service_andcommon_occupation_level' => $row3['service_andcommon_occupation_level'],
            'mistri_occupation_level' => $row3['mistri_occupation_level'],
            );
            $occupation_levels = array_filter($occupation_levels); // Remove empty values
            $occupation_count = count($occupation_levels);
            if ($occupation_count > 0) 
            $occupation_label = array_keys($occupation_levels)[0];
            $occupation_value = $occupation_levels[$occupation_label];
            //PRINTING THE PROFILE
            echo "<li class=\"sb_newbiodata\">";
            echo "<div class=\"sb_featured_profile_head\">";
            echo "<div class=\"sbbio_header_recent_view\">";
            // Start of Default Photo Show
            echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\">";
            if (!empty($pic1)) {
            echo "<img class=\"img-responsive\" src=\"profile/{$profid}/{$pic1}\"/>";
            } else {
            echo "<img class=\"img-responsive\" src=\"images/{$defaultImage}\"/>";
            }
            echo "</a>";
            // End of Default photo Show
            echo "<div class=\"sbbio_number_recentview\"><span class=\"sb_biodatanumber_recentview\"> {$profid} <br> বায়োডাটা নং </span> </div>";
            echo "</div>";
            echo "<div class=\"sb_user_recentview\">";
            echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> বায়োডাটা </span>  <span class=\"sb_data_recentview\">{$biodatagender}</span></span>";
            echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> ধর্ম </span>  <span class=\"sb_data_recentview\">{$religion}</span></span>";
            echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> পেশা </span>  <span class=\"sb_data_recentview\">{$occupation_value}</span></span>";
            echo "<span class=\"sb_single_data_recentview\"> <span class=\"sb_value_recentview\"> জন্ম সন</span>        <span class=\"sb_data_recentview\"> {$dateofbirth}</span></span>";
            echo "<a href=\"profile.php?/Biodata={$profid}\" target=\"_blank\"><button class=\"view_sb_profile_recentview\">সম্পূর্ণ বায়োডাটা</button> </a>";
            echo "</div></div>";
            echo "</li>";
            }
            }
          }
        }
      ?>
    </ul>
  </div>
  <script type="text/javascript" src="js/jquery.flexisel.js"></script>
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  --                     E   N   D                 --
  --    SHOSURBARI HOME PAGE / FEATURED PROFILES   --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
  <!-- End & Start -->
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  --                 S  T  A  R  T                 --
  --      SHOSURBARI HOME PAGE / BODY CONTENT      --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
  <div class="sb-home-search">
    <h1><span class="shosurbari-heading-span"> আমাদের </span>সার্ভিস</h1>
    <div class="sbhome-heart-divider">
      <span class="grey-line"></span>
        <i class="fa fa-heart pink-heart"></i>
        <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
    </div>
  </div>
  <div class="shosurbari-user-info">
    <div class="sb-biodata-amount-list">
      <p><i id="bell" class="fa fa-bell"></i> বিয়ের জন্য শ্বশুরবাড়ি ডট কমের পাত্র-পাত্রীর সাথে যোগাযোগ করতে আগ্রহী হইলে সার্ভিস চার্জ প্রদান করতে হবে, বায়োডাটা কতৃপক্ষের থেকে কোনো সার্ভিস চার্জ নেয়া হয় না। সার্চ ফিল্টার ব্যবহার করে খুঁজেনিন স্বপ্নময় জীবনসঙ্গী। আপনার পেমেন্ট সম্পন্ন হবার পর ২৪ ঘন্টার মধ্যে যোগাযোগের জন্য কাঙ্ক্ষিত তথ্য আপনাকে পাঠিয়ে দেয়া হবে।
      <span style="color:#06b6d4;">  বিস্তারিত জানতে নিচে আমাদের প্রশ্ন ও উত্তর সেকশনের ১০ থেকে ১৪ নাম্বার পর্যন্ত আর্টিকেল গুলো পড়ুন।</p>
    </div>
    <div class="shoshurbari-package-card">
      <div class="card-header">
        <h1>BRONZE</h1>
      </div>
      <div class="card-package">
        <h1>১৪৫ ৳</h1>
        <p>বায়োডাটা: ১টি</p>
        <p class="sb-package-avr-amount">এভারেজ মূল্য: ১৪৫ ৳</p>
        <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর ই-মেইল: <i class="fa fa-close"></i></p>
        <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
      </div>
    </div>
    <div class="shoshurbari-package-card">
      <div class="card-header">
        <h1>SILVER</h1>
      </div>
      <div class="card-package">
        <h1>২৮০ ৳</h1>
        <p>বায়োডাটা: ২টি</p>
        <p class="sb-package-avr-amount">এভারেজ মূল্য: ১৪০ ৳</p>
        <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর ই-মেইল: <i class="fa fa-close"></i></p>
        <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
      </div>
    </div>
    <div class="shoshurbari-package-card">
      <div class="card-header">
        <h1>GOLD</h1>
      </div>
      <div class="card-package">
        <h1>৩৯০ ৳</h1>
        <p>বায়োডাটা: ৩টি</p>
        <p class="sb-package-avr-amount">এভারেজ মূল্য: ১৩০ ৳</p>
        <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর ই-মেইল: <i class="fa fa-close"></i></p>
        <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
      </div>
    </div>
    <div class="shoshurbari-package-card">
      <div class="card-header">
        <h1>PLATINUM</h1>
      </div>
      <div class="card-package">
        <h1>৫০০ ৳</h1>
        <p>বায়োডাটা: ৪টি</p>
        <p class="sb-package-avr-amount">এভারেজ মূল্য: ১২৫ ৳</p>
        <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর ই-মেইল: <i class="fa fa-close"></i></p>
        <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
      </div>
    </div>
    <div class="shoshurbari-package-card">
      <div class="sb-recommendation">
        <h2>Our Recommendation</h2>
      </div>
      <div class="card-header">
        <h1>DIAMOND</h1>
      </div>
      <div class="card-package">
        <h1>৬০০ ৳</h1>
        <p>বায়োডাটা: ৫টি</p>
        <p class="sb-package-avr-amount">এভারেজ মূল্য: ১২০ ৳</p>
        <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর ই-মেইল: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
      </div>
    </div>
    <div class="shoshurbari-package-card">
      <div class="card-header">
        <h1>TITANIUM</h1>
      </div>
      <div class="card-package">
        <h1>৬৯০ ৳</h1>
        <p>বায়োডাটা: ৬টি</p>
        <p class="sb-package-avr-amount">এভারেজ মূল্য: ১১৫ ৳</p>
        <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর ই-মেইল: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
      </div>
    </div>
    <div class="shoshurbari-package-card">
      <div class="card-header">
        <h1>RUBY</h1>
      </div>
      <div class="card-package">
        <h1>৭৭০ ৳</h1>
        <p>বায়োডাটা: ৭টি</p>
        <p class="sb-package-avr-amount">এভারেজ মূল্য: ১১০ ৳</p>
        <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর ই-মেইল: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
      </div>
    </div>
    <div class="shoshurbari-package-card">
      <div class="card-header">
        <h1>EMERALD</h1>
      </div>
      <div class="card-package">
        <h1>৮৪০ ৳</h1>
        <p>বায়োডাটা: ৮টি</p>
        <p class="sb-package-avr-amount">এভারেজ মূল্য: ১০৫ ৳</p>
        <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর ই-মেইল: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
      </div>
    </div>
    <div class="shoshurbari-package-card">
      <div class="card-header">
        <h1>SAPPHIRE</h1>
      </div>
      <div class="card-package">
        <h1>৯০০ ৳</h1>
        <p>বায়োডাটা: ৯টি</p>
        <p class="sb-package-avr-amount">এভারেজ মূল্য: ১০০ ৳</p>
        <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর ই-মেইল: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
      </div>
    </div>
    <div class="shoshurbari-package-card">
      <div class="card-header">
        <h1>TOPAZ</h1>
      </div>
      <div class="card-package">
        <h1>৯৮০ ৳</h1>
        <p>বায়োডাটা: ১০টি</p>
        <p class="sb-package-avr-amount">এভারেজ মূল্য: ৯৮ ৳</p>
        <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর ই-মেইল: <i class="fa fa-check"></i></p>
        <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-check"></i></p>
      </div>
    </div>
  </div>
  <div class="sb-home-search">
    <h1><span class="shosurbari-heading-span"> প্রশ্ন </span>ও উত্তর</h1>
    <div class="sbhome-heart-divider">
      <span class="grey-line"></span>
      <i class="fa fa-heart pink-heart"></i>
      <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
    </div>
  </div>
  <div class="shosurbari-faq">
		<div class="shosurbari-details">
			<div class="accordation">
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion1"><span class="shosurbari-faq-point">১</span> শ্বশুরবাড়ি ডটকম কী? এটি কাদের জন্য? <i class="fa fa-minus-circle"> </i></button>
					<div id="accordion1" class="jb-accordion-content collapse in">
            <p>শ্বশুরবাড়ি ডটকম একটি বাংলাদেশী ম্যাট্রিমনি ওয়েবসাইট। প্রাথমিক পর্যায়ে এটির যাত্রা শুরু হয় ২০২২ সাল থেকে। কোনো সার্ভিস চার্জ ছাড়াই একাউন্ট খুলে পাত্র-পাত্রী নিজে অথবা অভিভাবক বায়োডাটা পোস্ট করতে পারবে। 
							একই সাথে পছন্দের পাত্র-পাত্রীর অভিভাবকের সাথে সরাসরি যোগাযোগ করা যায়। দেশি ও প্রবাসী বাংলাদেশী বাঙ্গালী পাত্র-পাত্রী খুঁজে পাওয়ার সহজ মাধ্যম।
						</p>
          </div>  
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion2"><span class="shosurbari-faq-point">২</span> বায়োডাটা পোস্ট করতে কত টাকা লাগে? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion2" class="jb-accordion-content collapse">
            <p>শ্বশুরবাড়ি ডটকমে বায়োডাটা পোস্ট করার জন্য সার্ভিস চার্জ প্রযোজ্য নয় (ফ্রি)।</p>
					</div>
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion3"><span class="shosurbari-faq-point">৩</span> অভিভাবকের অনুমতি ছাড়া বায়োডাটা পোস্ট করতে পারবো? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion3" class="jb-accordion-content collapse">
						<p>না! অবশ্যই শ্বশুরবাড়ি ডটকমে পাত্র-পাত্রীর বায়োডাটার বিষয়টি নিজ নিজ অভিভাবকে জানা থাকতে হবে। পাত্র-পাত্রীর তথ্য যাচাই বাছাইয়ের পর যদি প্রমাণিত হয় অভিভাবক বিষয়টি জানেন না। বায়োডাটার বিষয়টি অভিভাবকের অজানা থাকার কারণে যেকোনো সময় বিনা নোটিশে শ্বশুরবাড়ি ডটকম থেকে বায়োডাটা ডিলিট করে দেয়া হবে।</p>
					</div>
				</div>
        <div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion4"><span class="shosurbari-faq-point">৪</span> প্রোফাইলে ছবি আপলোড করা কি বাধ্যতামূলক? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion4" class="jb-accordion-content collapse">
						<p>না! শ্বশুরবাড়ি ডটকমে একাউন্ট খোলার পর প্রোফাইলে পাত্র-পাত্রীর ছবি আপলোড করা বাধ্যতা মূলক নয়। তবে পাত্র-পাত্রীর ছবি ছাড়া অন্য যেকোনো কিছুর ছবি আপলোড করলে বিনা নোটিশে সম্পূর্ণ বায়োডাটা ডিলিট করে দেয়া হবে। প্রোফাইলে ছবি আপলোড করার পর যেকোনো সময় ছবি ডিলিট করতে পারবেন।
              <br> <br> বায়োডাটার সাথে যোগাযোগের জন্য শ্বশুরবাড়ি ডটকমের পাত্র-পাত্রীদের ছবি কোনো তৃতীয় পক্ষকে (ইউজারকে) প্রদান করা হয়না। পাত্র-পাত্রীদের নিজ নিজ বায়োডাটার প্রোফাইলে যেই ছবি দেখতে পাবেন সেই ছবি অনুযায়ী তাদেরকে পছন্দ-অপছন্দ করার বিষয়টা একান্তই আপনার উপর নির্ভর করছে।
            </p>
					</div>
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion5"><span class="shosurbari-faq-point">৫</span> কিভাবে বায়োডাটা পোস্ট করবো? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion5" class="jb-accordion-content collapse">
            <p>পাত্র-পাত্রী নিজেই অথবা অভিভাবক বায়োডাটা পোস্ট করতে পারবেন সহজেই। প্রথমে <a href="register.php">Register</a> পেজ থেকে বায়োডাটা পোস্ট কারীর Name, Username, Email, Number, Gender, Password অপশন পূরণ করে নতুন একটি একাউন্ট খুলতে হবে। তারপর পাত্র-পাত্রীর বায়োডাটা পোস্ট করতে পারবেন সহজেই।
						<br><br>একাউন্ট সফল ভাবে রেজিস্ট্রার হবার পর, My Account পেজ থেকে “বায়োডাটা পোস্ট” সেকশনে ক্লিক করে হাতে যথেষ্ট সময় নিয়ে পাত্র-পাত্রীর বায়োডাটা পোস্ট করুন। প্রোফাইলে পাত্র-পাত্রীর ছবি আপলোড করা বাধ্যতা মূলক নয়।</p>
					</div>
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion6"><span class="shosurbari-faq-point">৬</span> শ্বশুরবাড়ি ডটকমে বায়োডাটা পোস্ট করলে আমার তথ্য কতটুকু গোপন থাকবে? কতটুকু প্রকাশিত হবে? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion6" class="jb-accordion-content collapse">
						<p>পাত্র-পাত্রীর ও অভিভাবকের নাম, মোবাইল নাম্বার এবং ইমেইল গোপন থাকবে, বায়োডাটার বাকি সকল তথ্য সাধারণ ইউজাররা দেখতে পারবে।
						<br> <br>যদি কেউ বিয়ের জন্য বায়োডাটার সাথে সরাসরি যোগাযোগ করতে আগ্রহী হয় তাহলে, আগ্রহী ইউজারকে সার্ভিস চার্জ প্রদান করতে হবে। দেখেনিন কোন কোন আগ্রহী ইউজারকে আমরা পাত্রপাত্রীর মোবাইল নাম্বার ইমেইল এবং অভিভাবকের নাম্বার প্রদান করি।
            <br> <br> ১ থেকে ৪টি বায়োডাটার সাথে যোগাযোগ করতে চাওয়া আগ্রহী ইউজারকে শুধুমাত্র অভিভাবকের মোবাইল নাম্বার প্রদান করা হবে।
            <br> ৫ থেকে ৯টি বায়োডাটার সাথে যোগাযোগ করতে চাওয়া আগ্রহী ইউজারকে পাত্রপাত্রীর ই-মেইল এবং অভিভাবকের মোবাইল নাম্বার প্রদান করা হবে।
            <br> TOPAZ প্লান বা ১০টি বায়োডাটার সাথে যোগাযোগ করতে চাওয়া আগ্রহী ইউজারকে পাত্রপাত্রীর মোবাইল নাম্বার, ই-মেইল এবং অভিভাবকের মোবাইল নাম্বার প্রদান করা হবে।
						</p>
					</div>
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion7"><span class="shosurbari-faq-point">৭</span> অভিভাবক পাত্র-পাত্রীর বায়োডাটা জমা দিতে পারবে?  <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion7" class="jb-accordion-content collapse">
						<p>হ্যাঁ! অভিভাবক কে প্রথমে <a href="register.php">Register</a> পেজ থেকে নিজের Name, Username, Email, Number, Gender, Password অপশন পূরণ করে নতুন একটি একাউন্ট খুলতে হবে। তারপর পাত্র-পাত্রীর বায়োডাটা পোস্ট করতে পারবেন সহজেই। কোনো সার্ভিস চার্জ প্রয়োজন নেই।</p>
					</div>
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion8"><span class="shosurbari-faq-point">৮</span> বায়োডাটা এডিট/আপডেট করবো কিভাবে? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion8" class="jb-accordion-content collapse">
						<p>আপনার একাউন্ট লগইন করে My Account পেজ থেকে “বায়োডাটা আপডেট” সেকশনে ক্লিক করুন ড্রপডাউন ৭টি অপশন পেয়ে যাবে। বায়োডাটার যেই অপশনটি আপডেট করতে চান সেই অপশনে ক্লিক করে সহজেই আপনার তথ্য পরিবর্তন করুন।</p>
					</div>  
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion9"><span class="shosurbari-faq-point">৯</span> বায়োডাটা যেকোনো সময় গোপন/ডিলিট করতে পারবো? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion9" class="jb-accordion-content collapse">
						<p>আপনার একাউন্ট সহজেই ডিএক্টিভেশন/গোপন করে রাখতে পারবেন তবে সহজেই ডিলিট করতে পারবেন না। আপনার একাউন্ট লগইন করে My Account পেজ থেকে যেকোনো সময় বায়োডাটাটি ডিএক্টিভেশন/গোপন করে রাখতে পারবেন। পরবর্তীতে আবার যেকোনো সময় আপনার একাউন্ট একটিভ করতে পারবেন।
						<br> <br> একাউন্ট ডিলিট করতে চাইলে সরাসরি শ্বশুরবাড়ি ডটকমের এডমিনের সাথে যোগাযোগ করতে হবে। এডমিনের সাথে যোগাযোগ করতে আমাদের <a target="_blank" href="https://www.facebook.com/ShosurBari.bd">FaceBook</a> পেজ অনুসরণ করুন অথবা <a href="contact-us.php">Contacts</a> পেজে প্রবেশ করে আপনার সমস্যার কথা জানিয়ে Contact Us ফর্ম টি পূরণ করে Submit করুন। পরবর্তীতে আপনার সাথে এডমিন যোগাযোগ করে একাউন্ট ডিলিট করে দেবে।
						</p>
					</div>  
				</div>
        <div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion10"><span class="shosurbari-faq-point">১০</span> পেমেন্ট, বায়োডাটার লিমিটেশন এবং পছন্দের তালিকা<i class="fa fa-plus-circle"> </i></button>
					<div id="accordion10" class="jb-accordion-content collapse">
						<p>আপনি যেই কয়টি বায়োডাটার সাথে সরাসরি যোগাযোগ করতে আগ্রহী শুধুমাত্র সেই কয়টি বায়োডাটার জন্য পেমেন্ট করতে হবে। আপনি একই সাথে সর্বোচ্চ ১০টি বায়োডাটা পছন্দ করে পেমেন্ট করতে পারবেন। একই সাথে ১০টির অধিক বায়োডাটার সাথে যোগাযোগ করতে আগ্রহী হইলে আপনাকে ১০টি করে বায়োডাটা পছন্দের তালিকায় যুক্ত করে পেমেন্ট সম্পন্ন করতে হবে।
            <br><br>শ্বশুরবাড়ি ডট কমে কোনো একাউন্ট ছাড়া পছন্দের তালিকায় কোনো বায়োডাটা যুক্ত করে রাখতে পারবেন না। এক সাথে একের অধিক বায়োডাটার সাথে যোগাযোগের জন্য এবং পছন্দের তালিকায় পছন্দের বায়োডাটা গুলো যুক্ত করতে অবশ্যই শ্বশুরবাড়ি ডট কমে আপনার একাউন্ট লগইন থাকতে হবে।
            </p>
					</div>
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion11"><span class="shosurbari-faq-point">১১</span> যেকোনো বায়োডাটা পছন্দ হবার পর পাত্র-পাত্রীর সাথে কিভাবে যোগাযোগ করবো? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion11" class="jb-accordion-content collapse">
						<p> বিয়ের জন্য শ্বশুরবাড়ি ডট কমের পাত্র-পাত্রীর সাথে যোগাযোগ করতে আগ্রহী হইলে সার্ভিস চার্জ প্রদান করতে হবে, বায়োডাটা কতৃপক্ষের থেকে কোনো সার্ভিস চার্জ নেয়া হয় না। আপনার পেমেন্ট সম্পন্ন হবার পর ২৪ ঘন্টার মধ্যে যোগাযোগের জন্য কাঙ্ক্ষিত তথ্য আপনাকে SMS বা ই-মেইলের মাধ্যমে পাঠিয়ে দেয়া হবে।
						<br> <br>পরিবার ও পাত্র-পাত্রীর সম্পর্কে নিজ দায়িত্বে ভালভাবে খোঁজ নিয়ে তবেই বিয়ের কথা পাকা করুন। বিয়ের পূর্বেই পাত্র বা পাত্রীর পরিবারের সাথে টাকা লেনদেন করে প্রতারিত হবেন না। কোনো কিছু লেনদেন করে প্রতারিত হইলে কোনো ভাবেই শ্বশুরবাড়ি ডটকম কর্তৃপক্ষ দায়ী থাকিবে না। শ্বশুরবাড়ি ডটকম শুধুমাত্র দুইটি পরিবারের মধ্যে যোগাযোগের মাধ্যম হিসাবে পরিচালিত।
						</p>
					</div>
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion12"><span class="shosurbari-faq-point">১২</span> পাত্র-পাত্রীর সাথে যোগাযোগের জন্য পাত্র-পাত্রীর মোবাইল নাম্বার দেয়া হয়? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion12" class="jb-accordion-content collapse">
						<p>১ থেকে ৪টি বায়োডাটার সাথে যোগাযোগ করতে চাওয়া আগ্রহী ইউজারকে শুধুমাত্র অভিভাবকের মোবাইল নাম্বার প্রদান করা হবে।
            <br> <br>৫ থেকে ৯টি বায়োডাটার সাথে যোগাযোগ করতে চাওয়া আগ্রহী ইউজারকে পাত্রপাত্রীর ই-মেইল এবং অভিভাবকের মোবাইল নাম্বার প্রদান করা হবে।
            <br> <br>TOPAZ প্লান বা ১০টি বায়োডাটার সাথে যোগাযোগ করতে চাওয়া আগ্রহী ইউজারকে পাত্রপাত্রীর মোবাইল নাম্বার, ই-মেইল এবং অভিভাবকের মোবাইল নাম্বার প্রদান করা হবে।
            </p>
					</div>
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion13"><span class="shosurbari-faq-point">১৩</span> পাত্র-পাত্রীর সাথে যোগাযোগের জন্য প্রদান কৃত সার্ভিস চার্জ কি ফেরত যোগ্য? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion13" class="jb-accordion-content collapse">
						<p>হ্যাঁ ফেরত যোগ্য! সার্ভিস চার্জ ফেরত দেয়ার পূর্বে শ্বশুরবাড়ি ডটকমের কাস্টমার সার্ভিস থেকে বিষয়টা নিয়ে তদন্ত করবে। বায়োডাটার (পাত্র-পাত্রীর) যদি বিয়ে ঠিক হয়ে যায় সেক্ষেত্রে আগ্রহী ইউজারকে সার্ভিস চার্জ ফেরত দেয়া হবে।
							<br><br> আগ্রহী ইউজারের ব্যক্তিগত কোনো কারণে সার্ভিস চার্জ ফেরত যোগ্য নয়।
						</p>
					</div>
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion14"><span class="shosurbari-faq-point">১৪</span> শ্বশুরবাড়ি ডটকমের মাধ্যমে বিয়ে হইলে বিবাহ পরবর্তীতে কোনো সার্ভিস চার্জ দিতে হবে? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion14" class="jb-accordion-content collapse">
						<p>না! বিয়ের পর কোনো সার্ভিস চার্জ দিতে হবে না। আমাদের মাধ্যমে বিবাহ সম্পন্ন হইলে বিয়ের পরবর্তীতে শ্বশুরবাড়ি ডটকমের কতৃপক্ষকে পাত্র-পাত্রীর পক্ষ থেকে কোনো সার্ভিস চার্জ দিতে হবে না।</p>
					</div>
				</div>
				<div class="jb-accordion-wrapper">
					<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion15"><span class="shosurbari-faq-point">১৫</span> যেকোনো প্রয়োজনে শ্বশুরবাড়ি ডটকমের এডমিনের সাথে কিভাবে যোগাযোগ করবো? <i class="fa fa-plus-circle"> </i></button>
					<div id="accordion15" class="jb-accordion-content collapse">
						<p>এডমিনের সাথে যোগাযোগ করতে আমাদের <a target="_blank" href="https://www.facebook.com/ShosurBari.bd">FaceBook</a> পেজ অনুসরণ করুন অথবা <a href="contact-us.php">Contacts</a> পেজে প্রবেশ করে আপনার সমস্যার কথা জানিয়ে Contact Us ফর্ম টি পূরণ করে Submit করুন। পরবর্তী যেকোনো সময় আপনার সাথে এডমিন যোগাযোগ করবে।</p>
					</div>
				</div>
			</div>
		</div>
  </div>
  <?php
    require_once("includes/dbconn.php");
    // Query to get male count
    $maleQuery = "SELECT COUNT(*) as maleCount FROM 1bd_personal_physical WHERE biodatagender = 'পাত্রের বায়োডাটা'";
    $maleResult = mysqli_query($conn, $maleQuery);
    $maleData = mysqli_fetch_assoc($maleResult);
    $maleCount = $maleData['maleCount'];
    // Query to get female count
    $femaleQuery = "SELECT COUNT(*) as femaleCount FROM 1bd_personal_physical WHERE biodatagender = 'পাত্রীর বায়োডাটা'";
    $femaleResult = mysqli_query($conn, $femaleQuery);
    $femaleData = mysqli_fetch_assoc($femaleResult);
    $femaleCount = $femaleData['femaleCount'];
    // Calculate total biodata count
    $totalBiodataCount = $maleCount + $femaleCount;
    mysqli_close($conn);
  ?>
  <div class="sb-home-search">
    <h1><span class="shosurbari-heading-span"> শ্বশুরবাড়ির </span>সেবা গ্রহীতা</h1>
    <div class="sbhome-heart-divider">
      <span class="grey-line"></span>
      <i class="fa fa-heart pink-heart"></i>
      <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
    </div>
  </div>
  <div class="shosurbari-user-info">
    <div class="card-wrap">
      <div class="card-header one">
        <img src="images/shosurbari-male-icon.jpg" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
      </div>
      <div class="card-content">
        <h3>সর্বমোট পাত্র</h3>
        <h2><?php echo $maleCount; ?> </h2>
      </div>
    </div>
    <div class="card-wrap">
      <div class="card-header two">
        <img src="images/shosurbari-female-icon.png" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
      </div>
      <div class="card-content">
        <h3>সর্বমোট পাত্রী</h3>
        <h2><?php echo $femaleCount; ?></h2>
      </div>
    </div>
    <div class="card-wrap">
      <div class="card-header three">
        <img src="images/shosurbari-groom-bride.png" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
      </div>
      <div class="card-content">
        <h3>মোট পাত্র-পাত্রী</h3>
        <h2><?php echo $totalBiodataCount; ?></h2>
      </div>
    </div>
    <div class="card-wrap">
      <div class="card-header four">
        <img src="images/shosurbari-success-marriage.jpg" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
      </div>
      <div class="card-content">
        <h3>সফল বিবাহ</h3>
        <h2 style="font-size: 18px;">আপনার অপেক্ষায়</h2>
      </div>
    </div>
  </div>
  <div class="sb-home-search">
    <h1><span class="shosurbari-heading-span"> শ্বশুরবাড়ির </span>সেবা গ্রহণ</h1>
    <div class="sbhome-heart-divider">
      <span class="grey-line"></span>
      <i class="fa fa-heart pink-heart"></i>
      <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
    </div>
  </div>
  <div class="shosurbari-user-info">
    <div class="card-wrap">
      <div class="card-header one">
        <img src="images/sb-home-createaccount.png" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
      </div>
      <div class="card-content">
        <h1>বায়োডাটা পোস্ট করুন</h1>
        <p>কোনো সার্ভিস চার্জ ছাড়াই শ্বশুরবাড়ি ডটকমে একাউন্ট খুলে বায়োডাটা পোস্ট করুন। পাত্র-পাত্রী নিজেই অথবা অভিভাবক বায়োডাটা পোস্ট করতে পারবে সহজেই।</p>
      </div>
    </div>
    <div class="card-wrap">
      <div class="card-header two">
        <img src="images/sb-home-search.jpg" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
      </div>
      <div class="card-content">
        <h1>বায়োডাটা খুঁজুন</h1>
        <p>দেশি ও প্রবাসী বাংলাদেশী বাঙ্গালী পাত্র-পাত্রী খুঁজে পাওয়ার সহজ মাধ্যম শ্বশুরবাড়ি ডট কম। সার্চ ফিল্টার ব্যবহার করে এক্ষনি খুঁজেনিন স্বপ্নময় জীবনসঙ্গী দ্রুততম সময়ে।</p>
      </div>
    </div>
    <div class="card-wrap">
      <div class="card-header three">
        <img src="images/sb-home-contact.png" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
      </div>
      <div class="card-content">
        <h1>যোগাযোগ করুন</h1>
        <p>শ্বশুরবাড়ি ডটকমে বায়োডাটা পছন্দ হবার পর অভিভাবকের সাথে যোগাযোগ করতে চাইলে সামান্য কিছু সার্ভিস চার্জ প্রদান করতে হবে। বায়োডাটা কতৃপক্ষের থেকে সার্ভিস চার্জ নেয়া হয় না।</p>
      </div>
    </div>
    <div class="card-wrap">
      <div class="card-header four">
        <img src="images/sb-home-married.png" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
      </div>
      <div class="card-content">
        <h1>বিবাহ সম্পন্ন করুন</h1>
        <p>পরিবার ও পাত্র-পাত্রীর সম্পর্কে নিজ দায়িত্বে ভালভাবে খোঁজ নিয়ে তবেই বিয়ের কথা পাকা করুন। বিয়ের পূর্বেই পাত্র-পাত্রীর পরিবারের সাথে টাকা লেনদেন করে প্রতারিত হবেন না।</p>
      </div>
    </div>
  </div>
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  --                   E   N   D                    --
  --      SHOSURBARI HOME PAGE / BODY CONTENT      --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
  <!--=======================================
  How Many Visitors View This Page.
  This Script Connected to get_view_count.php
  and page_views Database Table
  ========================================-->
  <script>
  $(document).ready(function() {
  var pages = ["index"];
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
    <!-- START FOR PROFILES ANIMATION SLIDE SHOW -->
    <script type="text/javascript">
    $(window).load(function() {
    $("#flexiselDemo3").flexisel({
    visibleItems: 4,
    animationSpeed: 700,
    autoPlay: true,
    autoPlaySpeed: 9000,    		
    pauseOnHover: true,
    enableResponsiveBreakpoints: true,
    responsiveBreakpoints: { 
    portrait: { 
    changePoint:480,
    visibleItems: 1
    }, 
    landscape: { 
    changePoint:601,
    visibleItems: 2
    },
    tablet: { 
    changePoint:769,
    visibleItems: 3
    }
    }
    });   
    });
  </script>
  <!-- ENDT FOR PROFILES ANIMATION SLIDE SHOW -->
  <script>
    // Search Options Gender Error Show
    function validateForm() {
      var biodataGender = document.querySelector('input[name="biodatagender"]:checked');
      if (!biodataGender) {
      var errorDiv = document.getElementById('gender-error-laptop');
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
      errorDiv.style.color = colors[colorIndex];
      colorIndex = (colorIndex + 1) % colors.length;
      }, 500);
      var windowHeight = window.innerHeight;
      var errorDivHeight = errorDiv.offsetHeight;
      var scrollPosition = errorDiv.offsetTop - (windowHeight - errorDivHeight) / 2;
      scrollPosition = Math.max(scrollPosition, 100);
      window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
      return false;
      }
      return true;
    }
    // Search Options Check Box Check Start
    $(function () {
      setCheckboxSelectLabels();
      $('.toggle-next').click(function () {
        var checkboxes = $(this).next('.checkboxes');
        checkboxes.slideToggle(400);
        toggleChevronIcon(checkboxes);
      });
      $('.SelectBox').change(function () {
        toggleCheckedAll(this);
        setCheckboxSelectLabels();
      });
    });
    function toggleChevronIcon(checkboxes) {
      var chevronIcon = checkboxes.closest('.shosurbari-home-search').find('.fa-chevron-down');
      chevronIcon.toggleClass('rotate');
    }
    function setCheckboxSelectLabels(elem) {
      var wrappers = $('.shosurbari-home-search');
      $.each(wrappers, function (key, wrapper) {
      var checkboxes = $(wrapper).find('.SelectBox');
      var label = $(wrapper).find('.checkboxes').attr('id');
      var prevText = '';
      $.each(checkboxes, function (i, checkbox) {
      var button = $(wrapper).find('button');
      if ($(checkbox).prop('checked') == true) {
      var text = $(checkbox).next().html();
      var btnText = prevText + text;
      var numberOfChecked = $(wrapper).find('input.val:checkbox:checked').length;
      if (numberOfChecked >= 4) {
        btnText = numberOfChecked + ' ' + label + ' selected';
      }
      $(button).text(btnText);
      prevText = btnText + ', ';
      }
      });
      });
    }
    function toggleCheckedAll(checkbox) {
      var apply = $(checkbox).closest('.shosurbari-home-search').find('.apply-selection');
      apply.fadeIn('slow');
      var val = $(checkbox).closest('.checkboxes').find('.val');
      var all = $(checkbox).closest('.checkboxes').find('.all');
      var SelectBox = $(checkbox).closest('.checkboxes').find('.SelectBox');
      if (!$(SelectBox).is(':checked')) {
        $(all).prop('checked', true);
        return;
      }
      if ($(checkbox).hasClass('all')) {
        $(val).prop('checked', false);
      } else {
        $(all).prop('checked', false);
      }
    }
    // chevron icons in the "up" position
    $('.fa-chevron-down').removeClass('rotate');
    // Occupations if All Students select then other three options disable 
    function handleAllOccupations(checkbox) {
      var studentOccupationCheckbox = document.querySelector('.SelectBox.val');
      var studentOptionCheckboxes = document.querySelectorAll('.SelectBox.val.student-option');
      studentOccupationCheckbox.disabled = checkbox.checked;
      for (var i = 0; i < studentOptionCheckboxes.length; i++) {
      studentOptionCheckboxes[i].disabled = checkbox.checked;
      if (checkbox.checked) {
        studentOptionCheckboxes[i].checked = false;
      }
      }
    }
    function handleStudentOccupation(checkbox) {
      var allCheckbox = document.querySelector('.SelectBox.all');
      allCheckbox.disabled = checkbox.checked;
      if (checkbox.checked) {
      allCheckbox.checked = false;
      }
      var studentOptionCheckboxes = document.querySelectorAll('.SelectBox.val.student-option');
      for (var i = 0; i < studentOptionCheckboxes.length; i++) {
      studentOptionCheckboxes[i].disabled = checkbox.checked;
      if (checkbox.checked) {
      studentOptionCheckboxes[i].checked = false;
      }
      }
    }
    function handleStudentOptions(checkbox) {
      var allCheckbox = document.querySelector('.SelectBox.all');
      allCheckbox.disabled = false;
    }
  //FAQ
  $(document).ready(function () {
  $('.jb-accordion-button').click(function () {
  $(this).find('.fa').toggleClass('fa-plus-circle fa-minus-circle');
  });
  });
  </script>
  <!--=======  Footer Start ========-->
  <?php include_once("footer.php");?>
  <!--=======  Footer End  =========-->
</body>
</html>	
