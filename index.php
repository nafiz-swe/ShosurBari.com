<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>


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
  <!-- ============================  Navigation Start =========================== -->
  <?php include_once("includes/navigation.php");?>
  <!-- ============================  Navigation End ============================ -->
 

  <section>
  <div class="shosurbari-home-banner">      </div>

    <div class="banner" style="--duration: 12s" id="slider-banner">
      <div class="banner-content" id="banner-content" target="_blank">
        <div class="sb-home-reg2">
        <h1>স্বপ্নময় জীবনসঙ্গী খুঁজে পেতে, আমরা আপনাকে সাহায্য করার জন্য নিবেদিত।</h1>
        <!-- <p>We are dedicated to helping you find your perfect life partner through our advanced matchmaking platform. Trusted online matrimonial service provider for Bengali community of all professions worldwide.</p> -->

          <?php
            if (!isloggedin()) {
              echo '<a href="register.php" class="sb-create-account"><button> বায়োডাটা পোস্ট করুন</button></a>';
            } else {
              echo '<a href="biodata_post.php" class="sb-create-account"><button>  বায়োডাটা পোস্ট করুন</button></a>';
            }
          ?>
        </div>
      </div>
      
      <div class="slide-indicators" id="slide-indicators" target="_blank"></div>
      
    </div>
  </section>













  <!-- <h3 id="banner_text"></h3> -->


  <!-- <div class="sb-home-search">
    <h1><span class="shosurbari-heading-span">জীবনসঙ্গী </span>খুঁজুন</h1>
    <div class="sbhome-heart-divider">
      <span class="grey-line"></span>
        <i class="fa fa-heart pink-heart"></i>
        <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
    </div>
  </div> -->


	<div class="droop-down">
    <h2> স্বপ্নময় জীবনসঙ্গী খুঁজুন দ্রুততম সময়ে</h2>
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

            <!-- Students Sector-->
            <!-- SSC -->
            <label class="label-search-options">মাধ্যমিক/সমমান শিক্ষার্থী</label> <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="কওমি মাদ্রাসার শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">কওমি মাদ্রাসার শিক্ষার্থী</span>
            <br>
                  
            <input type="checkbox" name="student_occupation_level[]" value="আলিয়া মাদ্রাসার দাখিল শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options"> দাখিল শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="মাধ্যমিক শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">জেনারেল মাধ্যমিক শিক্ষার্থী</span>
            <br>

            <label class="label-search-options">উচ্চমাধ্যমিক/সমমান শিক্ষার্থী</label><br>
            <!-- HSC -->

            <input type="checkbox" name="student_occupation_level[]" value="কলেজ শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">কলেজ শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="আলিয়া মাদ্রাসার আলিম শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">আলিম শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="পলিটেকনিক্যাল শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">পলিটেকনিক্যাল শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="পেরামেডিক্যাল শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">পেরামেডিক্যাল শিক্ষার্থী</span>
            <br>

            <input type="checkbox" name="student_occupation_level[]" value="নার্সিং শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">নার্সিং শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="মিডউইফারী শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">মিডউইফারী শিক্ষার্থী</span>
            <br>

            <!-- Honours -->
            <label class="label-search-options">স্নাতক/সমমান শিক্ষার্থী</label>
            <br>                 
            <input type="checkbox" name="student_occupation_level[]" value="মেডিকেল শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">মেডিকেল শিক্ষার্থী</span>
            <br>

            <input type="checkbox" name="student_occupation_level[]" value="ফার্মেসী শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">ফার্মেসী শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="বি.এসসি. ইঞ্জিনিয়ারিং শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">বি.এসসি. ইঞ্জিনিয়ারিং শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="বি.বি.এ. শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">বি.বি.এ. শিক্ষার্থী</span>
            <br>
           
            <input type="checkbox" name="student_occupation_level[]" value="বি.এসসি. শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">বি.এসসি. শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="বি.এ. শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">বি.এ. শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="বি.কম. শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">বি.কম. শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="আলিয়া মাদ্রাসার ফাজিল শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">ফাজিল শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="এম.এসসি. শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">এম.এসসি. শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="এম.এ. শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">এম.এ. শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="এম.কম. শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">এম.কম. শিক্ষার্থী</span>
            <br>
            
            <input type="checkbox" name="student_occupation_level[]" value="কামিল শিক্ষার্থী" class="SelectBox val" />
            <span class="search-options">কামিল শিক্ষার্থী</span>
            <br>

            <!-- Medical & Health Sector -->
            <label class="label-search-options">চিকিৎসা/স্বাস্থ্য </label>
            <br>
            <input type="checkbox" name="health_occupation_level[]" value="এম.বি.বি.এস. ডাক্তার" class="SelectBox val" />
            <span class="search-options">এম.বি.বি.এস. ডাক্তার</span>
            <br>
            
            <input type="checkbox" name="health_occupation_level[]" value="ইন্টার্নশীপ ডাক্তার" class="SelectBox val" />
            <span class="search-options">ইন্টার্নশীপ ডাক্তার</span>
            <br>
          
            <input type="checkbox" name="health_occupation_level[]" value="পশু চিকিৎসক" class="SelectBox val" />
            <span class="search-options">পশু চিকিৎসক</span>
            <br>
            
            <input type="checkbox" name="health_occupation_level[]" value="ফার্মাসিস্ট" class="SelectBox val" />
            <span class="search-options">ফার্মাসিস্ট</span>
            <br>
            
            <input type="checkbox" name="health_occupation_level[]" value="ডিপ্লোমা ডাক্তার" class="SelectBox val" />
            <span class="search-options">ডিপ্লোমা ডাক্তার</span>
            <br>
            
            <input type="checkbox" name="health_occupation_level[]" value="নার্স" class="SelectBox val" />
            <span class="search-options">নার্স</span>
            <br>
            
            <input type="checkbox" name="health_occupation_level[]" value="মিডউইফারী" class="SelectBox val" />
            <span class="search-options">মিডউইফারী</span>
            <br>
            
            <input type="checkbox" name="health_occupation_level[]" value="পল্লী চিকিৎসক" class="SelectBox val" />
            <span class="search-options">পল্লী চিকিৎসক</span>
            <br>

            <!--  Engineers Sector-->
            <label class="label-search-options">ইঞ্জিনিয়ার </label><br>
            
            <input type="checkbox" name="engineer_occupation_level[]" value="সফটওয়্যার ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">সফটওয়্যার ইঞ্জিনিয়ার</span>
            <br>
            
            <input type="checkbox" name="engineer_occupation_level[]" value="টেক্সটাইল ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">টেক্সটাইল ইঞ্জিনিয়ার</span>
            <br>
            
            <input type="checkbox" name="engineer_occupation_level[]" value="সিভিল ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">সিভিল ইঞ্জিনিয়ার</span>
            <br>
            
            <input type="checkbox" name="engineer_occupation_level[]" value="ইলেকট্রিক্যাল ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">ইলেকট্রিক্যাল ইঞ্জিনিয়ার</span>
            <br>
            
            <input type="checkbox" name="engineer_occupation_level[]" value="মেরিন ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">মেরিন ইঞ্জিনিয়ার</span>
            <br>
            
            <input type="checkbox" name="engineer_occupation_level[]" value="নেটওয়ার্ক ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">নেটওয়ার্ক ইঞ্জিনিয়ার</span>
            <br>
            
            <input type="checkbox" name="engineer_occupation_level[]" value="রোবোটিক্স ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">রোবোটিক্স ইঞ্জিনিয়ার</span>
            <br>
            
            <input type="checkbox" name="engineer_occupation_level[]" value="এগ্রিকালচার ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">এগ্রিকালচার ইঞ্জিনিয়ার</span>
            <br>
           
            <input type="checkbox" name="engineer_occupation_level[]" value="আর্কিটেকচার ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">আর্কিটেকচার ইঞ্জিনিয়ার</span>
            <br>
            
            <input type="checkbox" name="engineer_occupation_level[]" value="মেকানিক্যাল ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">মেকানিক্যাল ইঞ্জিনিয়ার</span>
            <br>
           
            <input type="checkbox" name="engineer_occupation_level[]" value="কেমিক্যাল ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">কেমিক্যাল ইঞ্জিনিয়ার</span>
            <br>
            
            <input type="checkbox" name="engineer_occupation_level[]" value="বিয়োমেডিক্যাল ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">বিয়োমেডিক্যাল ইঞ্জিনিয়ার</span>
            <br>
           
            <input type="checkbox" name="engineer_occupation_level[]" value="এরোস্পেস ইঞ্জিনিয়ার" class="SelectBox val" />
            <span class="search-options">এরোস্পেস ইঞ্জিনিয়ার</span>
            <br>

            <!-- Teacher Profession -->
            <label class="label-search-options">শিক্ষক/প্রফেসর </label><br>
            
            <input type="checkbox" name="teacher_occupation_level[]" value="কওমি মাদ্রাসার শিক্ষক" class="SelectBox val" />
            <span class="search-options">কওমি মাদ্রাসার শিক্ষক</span>
            <br>
            
            <input type="checkbox" name="teacher_occupation_level[]" value="আলিয়া মাদ্রাসার শিক্ষক" class="SelectBox val" />
            <span class="search-options">আলিয়া মাদ্রাসার শিক্ষক</span>
            <br>
            
            <input type="checkbox" name="teacher_occupation_level[]" value="স্কুল শিক্ষক" class="SelectBox val" />
            <span class="search-options">স্কুল শিক্ষক</span>
            <br>
            
            <input type="checkbox" name="teacher_occupation_level[]" value="কলেজ শিক্ষক" class="SelectBox val" />
            <span class="search-options">কলেজ শিক্ষক</span>
            <br>
           
            <input type="checkbox" name="teacher_occupation_level[]" value="বিশ্ববিদ্যালয় প্রফেসর" class="SelectBox val" />
            <span class="search-options">বিশ্ববিদ্যালয় প্রফেসর</span>
            <br>
            
            <input type="checkbox" name="teacher_occupation_level[]" value="ডিগ্রির প্রফেসর" class="SelectBox val" />
            <span class="search-options">ডিগ্রির প্রফেসর</span>
            <br>

            <!-- Defense Profession-->
            <label class="label-search-options">প্রতিরক্ষা বাহিনী </label><br>
            
            <input type="checkbox" name="defense_occupation_level[]" value="সেনাবাহিনী" class="SelectBox val" />
            <span class="search-options">সেনাবাহিনী</span>
            <br>
            
            <input type="checkbox" name="defense_occupation_level[]" value="বিমানবাহিনী" class="SelectBox val" />
            <span class="search-options">বিমানবাহিনী</span>
            <br>
            
            <input type="checkbox" name="defense_occupation_level[]" value="নৌবাহিনী" class="SelectBox val" />
            <span class="search-options">নৌবাহিনী</span>
            <br>
            
            <input type="checkbox" name="defense_occupation_level[]" value="পুলিশ" class="SelectBox val" />
            <span class="search-options">পুলিশ</span>
            <br>
           
            <input type="checkbox" name="defense_occupation_level[]" value="ফায়ার সার্ভিস" class="SelectBox val" />
            <span class="search-options">ফায়ার সার্ভিস</span>
            <br>
            
            <input type="checkbox" name="defense_occupation_level[]" value="ডিবি" class="SelectBox val" />
            <span class="search-options">ডিবি</span>
            <br>
            
            <input type="checkbox" name="defense_occupation_level[]" value="আনসার" class="SelectBox val" />
            <span class="search-options">আনসার</span>
            <br>

            <!-- Working Forign Sector-->
            <label class="label-search-options">বিদেশে </label><br>
            
            <input type="checkbox" name="foreigner_occupation_level[]" value="বিদেশে চাকরি করি" class="SelectBox val" />
            <span class="search-options">বিদেশে চাকরি</span>
            <br>
            
            <input type="checkbox" name="foreigner_occupation_level[]" value="বিদেশে কাজ করি" class="SelectBox val" />
            <span class="search-options">বিদেশে কাজ</span>
            <br>
            
            <input type="checkbox" name="foreigner_occupation_level[]" value="বিদেশে ব্যবসা করি" class="SelectBox val" />
            <span class="search-options">বিদেশে ব্যবসা</span>
            <br>
            
            <input type="checkbox" name="foreigner_occupation_level[]" value="বিদেশে পড়াশোনা করি" class="SelectBox val" />
            <span class="search-options">বিদেশে পড়াশোনা</span>
            <br>

            <!-- Garments Sector-->
            <label class="label-search-options">গার্মেন্টস  </label><br>
            
            <input type="checkbox" name="garments_occupation_level[]" value="গার্মেন্টস ম্যানেজার" class="SelectBox val" />
            <span class="search-options">গার্মেন্টস ম্যানেজার</span>
            <br>
            
            <input type="checkbox" name="garments_occupation_level[]" value="গার্মেন্টস বায়িং হাউস" class="SelectBox val" />
            <span class="search-options">গার্মেন্টস বায়িং হাউস</span>
            <br>
            
            <input type="checkbox" name="garments_occupation_level[]" value="গার্মেন্টস শ্রমিক" class="SelectBox val" />
            <span class="search-options">গার্মেন্টস শ্রমিক</span>
            <br>

            <!--  Driver Profession -->
            <label class="label-search-options">ড্রাইভার/চালক</label>  <br>
            
            <input type="checkbox" name="driver_occupation_level[]" value="বাস ড্রাইভার" class="SelectBox val" />
            <span class="search-options">বাস ড্রাইভার</span>
            <br>
            
            <input type="checkbox" name="driver_occupation_level[]" value="মাইক্রো বাস ড্রাইভার" class="SelectBox val" />
            <span class="search-options">মাইক্রো বাস ড্রাইভার</span>
            <br>
           
            <input type="checkbox" name="driver_occupation_level[]" value="কার ড্রাইভার" class="SelectBox val" />
            <span class="search-options">কার ড্রাইভার</span>
            <br>
            
            <input type="checkbox" name="driver_occupation_level[]" value="ট্রাক ড্রাইভার" class="SelectBox val" />
            <span class="search-options">ট্রাক ড্রাইভার</span>
            <br>
           
            <input type="checkbox" name="driver_occupation_level[]" value="পাঠাও/উবার রাইডার" class="SelectBox val" />
            <span class="search-options">পাঠাও/উবার রাইডার</span>
            <br>
            
            <input type="checkbox" name="driver_occupation_level[]" value="CNG চালকr" class="SelectBox val" />
            <span class="search-options">CNG চালক</span>
            <br>
          
            <input type="checkbox" name="driver_occupation_level[]" value="অটো চালক" class="SelectBox val" />
            <span class="search-options">অটো চালক</span>
            <br>
            
            <input type="checkbox" name="driver_occupation_level[]" value="রিক্সা চালক" class="SelectBox val" />
            <span class="search-options">রিক্সা চালক</span>
            <br>

            <!-- Common Profession-->
            <label class="label-search-options"> সার্ভিস/ইন্টারনেট/ফাইন্যান্স/অন্যান্য </label><br>

            <input type="checkbox" name="service_common_occupation_level[]" value="HR" class="SelectBox val" />
            <span class="search-options">HR</span>
            <br>

            <input type="checkbox" name="service_common_occupation_level[]" value="ব্যাংকার" class="SelectBox val" />
            <span class="search-options">ব্যাংকার</span>
            <br>

            <input type="checkbox" name="service_common_occupation_level[]" value="আইনজীবী" class="SelectBox val" />
            <span class="search-options">আইনজীবী</span>
            <br>

            <input type="checkbox" name="service_common_occupation_level[]" value="উদ্যোক্তা" class="SelectBox val" />
            <span class="search-options">উদ্যোক্তা</span>
            <br>

            <input type="checkbox" name="service_common_occupation_level[]" value="ফ্রীলান্সার" class="SelectBox val" />
            <span class="search-options">ফ্রীলান্সার</span>
            <br>
            
            <input type="checkbox" name="service_common_occupation_level[]" value="ইউটিউবার" class="SelectBox val" />
            <span class="search-options">ইউটিউবার</span>
            <br>
            
            <input type="checkbox" name="service_common_occupation_level[]" value="গ্রাফিক্স ডিজাইনার" class="SelectBox val" />
            <span class="search-options">গ্রাফিক্স ডিজাইনার</span>
            <br>
            
            <input type="checkbox" name="service_common_occupation_level[]" value="সেলস & মার্কেটিং(SR)" class="SelectBox val" />
            <span class="search-options">সেলস & মার্কেটিং(SR)</span>
            <br>
            
            <input type="checkbox" name="service_common_occupation_level[]" value="আর্ট/দেয়াল লিখন" class="SelectBox val" />
            <span class="search-options">আর্ট/দেয়াল লিখন</span>
            <br>
            
            <input type="checkbox" name="service_common_occupation_level[]" value="নিরাপত্তারক্ষী" class="SelectBox val" />
            <span class="search-options">নিরাপত্তারক্ষী</span>
            <br>
            
            <input type="checkbox" name="service_common_occupation_level[]" value="রোজ কামলা/শ্রমিক" class="SelectBox val" />
            <span class="search-options">রোজ কামলা/শ্রমিক</span>
            <br>

            <!-- Garments Sector-->
            <label class="label-search-options">মিস্ত্রি </label><br>
            
            <input type="checkbox" name="mistri_occupation_level[]" value="রাজ মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">রাজ মিস্ত্রি</span>
            <br>
            
            <input type="checkbox" name="mistri_occupation_level[]" value="কাঠ মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">কাঠ মিস্ত্রি</span>
            <br>
            
            <input type="checkbox" name="mistri_occupation_level[]" value="ইলেকট্রিক মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">ইলেকট্রিক মিস্ত্রি</span>
            <br>
            
            <input type="checkbox" name="mistri_occupation_level[]" value="স্যানিটারি মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">স্যানিটারি মিস্ত্রি</span>
            <br>
            
            <input type="checkbox" name="mistri_occupation_level[]" value="রড মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">রড মিস্ত্রি</span>
            <br>
           
            <input type="checkbox" name="mistri_occupation_level[]" value="রং মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">রং মিস্ত্রি</span>
            <br>
            
            <input type="checkbox" name="mistri_occupation_level[]" value="ফ্রিজ মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">ফ্রিজ মিস্ত্রি</span>
            <br>
            
            <input type="checkbox" name="mistri_occupation_level[]" value="গ্যাস মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">গ্যাস মিস্ত্রি</span>
            <br>
            
            <input type="checkbox" name="mistri_occupation_level[]" value="এসি মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">এসি মিস্ত্রি</span>
            <br>
            
            <input type="checkbox" name="mistri_occupation_level[]" value="সিসি ক্যামেরা মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">সিসি ক্যামেরা মিস্ত্রি</span>
            <br>
           
            <input type="checkbox" name="mistri_occupation_level[]" value="টাইলস ও মুজাইক মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">টাইলস ও মুজাইক মিস্ত্রি</span>
            <br>
           
            <input type="checkbox" name="mistri_occupation_level[]" value="থাই এলুমিনিয়াম ও গ্লাস মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">থাই এলুমিনিয়াম ও গ্লাস মিস্ত্রি</span>
            <br>
           
            <input type="checkbox" name="mistri_occupation_level[]" value="ওয়েলডিং/গ্রীল মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">ওয়েলডিং/গ্রীল মিস্ত্রি</span>
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
    $c_count = 0; // initialize counter to 0

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
          $other_occupation_sector=$row3['other_occupation_sector'];

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

          if ($occupation_count > 0) {
            $occupation_label = array_keys($occupation_levels)[0];
            $occupation_value = $occupation_levels[$occupation_label];

            echo "<div class=\"biodatalist\">";
            echo "<div class=\"sb_bio_header\">";

            // Start of Default Photo Show
            echo "<a href=\"view_profile.php?id={$profid}\" target=\"_blank\">";
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
            echo "<a href=\"view_profile.php?id={$profid}\" target=\"_blank\"> <button class=\"view_sb_profile\"> সম্পূর্ণ প্রোফাইল</button></a>";
            echo "</div></div>";

            $c_count++;
          }
        }
      }
    }
    echo '<script> var count = ' . $c_count . '; </script>';
  ?>




<script>
  //if gender not selected then show error
  function validateForm() {
    var biodataGender = document.querySelector('input[name="biodatagender"]:checked');
    if (!biodataGender) {
      var errorDiv = document.getElementById('gender-error-laptop');
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');

      // Change color multiple times
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function () {
        errorDiv.style.color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
      }, 500);

      // Scroll the error message to the center of the window
      var windowHeight = window.innerHeight;
      var errorDivHeight = errorDiv.offsetHeight;

      // Calculate the scroll position to center the error message vertically
      var scrollPosition = errorDiv.offsetTop - (windowHeight - errorDivHeight) / 2;

      // Ensure the scroll position doesn't go to the top of the display
      scrollPosition = Math.max(scrollPosition, 100); // Adjust this value if needed

      // Scroll to the calculated position
      window.scrollTo({ top: scrollPosition, behavior: 'smooth' });

      return false;
    }
    return true;
  }
</script>



<script>
let toggleLabels = document.querySelectorAll('.toggle-next');

toggleLabels.forEach(label => {
  label.addEventListener('click', () => {
    let targetId = label.getAttribute('data-target');
    let targetCheckbox = document.querySelector(`#${targetId}`);
    targetCheckbox.style.display = targetCheckbox.style.display === 'none' ? 'block' : 'none';
  });
});


  $(function() {
    
      setCheckboxSelectLabels();
      
      $('.toggle-next').click(function() {
        $(this).next('.checkboxes').slideToggle(400);
      });
      
      $('.SelectBox').change(function() {
        toggleCheckedAll(this);
        setCheckboxSelectLabels(); 
      });
      
    });
    
    function setCheckboxSelectLabels(elem) {
      var wrappers = $('.wrapper'); 
      $.each( wrappers, function( key, wrapper ) {
        var checkboxes = $(wrapper).find('.SelectBox');
        var label = $(wrapper).find('.checkboxes').attr('id');
        var prevText = '';
        $.each( checkboxes, function( i, checkbox ) {
          var button = $(wrapper).find('button');
          if( $(checkbox).prop('checked') == true) {
            var text = $(checkbox).next().html();
            var btnText = prevText + text;
            var numberOfChecked = $(wrapper).find('input.val:checkbox:checked').length;
            if(numberOfChecked >= 4) {
              btnText = numberOfChecked +' '+ label + ' selected';
            }
            $(button).text(btnText); 
            prevText = btnText + ', ';
          }
        });
      });
    }

    function toggleCheckedAll(checkbox) {
      var apply = $(checkbox).closest('.wrapper').find('.apply-selection');
      apply.fadeIn('slow'); 
      
      var val = $(checkbox).closest('.checkboxes').find('.val');
      var all = $(checkbox).closest('.checkboxes').find('.all');
      var SelectBox = $(checkbox).closest('.checkboxes').find('.SelectBox');

      if(!$(SelectBox).is(':checked')) {
        $(all).prop('checked', true);
        return;
      }

      if( $(checkbox).hasClass('all') ) {
        $(val).prop('checked', false);
      } else {
        $(all).prop('checked', false);
      }
    }
  </script>


<script>
  var bannerText = document.getElementById("banner_text");
  var animationDelay = 100; // in milliseconds (adjust the speed here)

  var textToType = "সার্চ ফিল্টার ব্যবহার করে খুঁজেনিন স্বপ্নময় জীবনসঙ্গী";
  var currentText = "";
  var currentIndex = 0;

  function typeText() {
    currentText += textToType[currentIndex];
    bannerText.textContent = currentText;

    currentIndex++;

    if (currentIndex < textToType.length) {
      setTimeout(typeText, animationDelay);
    } else {
      // Uncomment the next line if you want to repeat the typing animation
      // setTimeout(resetText, animationDelay * 2);
    }
  }

  function resetText() {
    currentText = "";
    currentIndex = 0;
    typeText();
  }

  typeText();
</script>


<style>
  .form-control {
    padding: 5px 6px;
  }
/* Style for the container of search options */
.droop-down {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding: 10px 0px;
  height: 160px;
  width: 1090px;
  margin: auto;
  margin-top: -54px;
  border-radius: 0px;
  background: #fff;
  /* box-shadow: 0 0 8px rgba(0,0,0,.1); */
  box-shadow: 0 10px 15px 0 rgb(0 0 0 / 16%);
  position: relative;
}

.droop-down h2{
  font-size: 25px;
  text-align: center;
  color: #06b6d4;
  font-weight: 500;
  margin: 10px auto 0 auto;
}

.inner-wrap {
  height: 177px;
}

/* Style for each search option section */
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

/* Style for the select elements */
.shosurbari-home-search select {
  width: 200px;
  margin-top: 5px;
}

/* Style for the submit button */
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
</style>
<!-- <script>
const intervalText = document.getElementById("interval-text");
const intervalRange = document.getElementById("interval");
const bannerContent = document.getElementById("banner-content");
const sliderBanner = document.getElementById("slider-banner");
const slideIndicators = document.getElementById("slide-indicators");

const json = `
[{
	"srcset": [
		"images/sb-banner2.png"
	],
	"text": "স্বপ্নময় জীবনসঙ্গী খুঁজুন দ্রুততম সময়ে ",
	"shhosurbari": "We are dedicated to helping you find your perfect life partner through our advanced matchmaking platform."
},
{
	"srcset": [
		"images/msb-banner2.png"
	],

	"text": "আপনার স্বপ্নময় জীবনসঙ্গী এখন শ্বশুরবাড়ি ডট কমে",
	"shhosurbari": "Trusted online matrimonial service provider for Bengali community of all professions worldwide."
}]
`;

const images = JSON.parse(json);

createSlides(images);

function createSlides(data) {
  const slides = [];
  const indicators = [];
  let interval = 12000; // Set the interval to 45 seconds

  data.forEach((slideData, index) => {
    const slide = document.createElement("div");
    slide.className = `slide slide-${index}`;
    if (index === 0) slide.classList.add("active");

    const text = document.createElement("h1");
    text.textContent = slideData.text;
    slide.append(text);

    const shhosurbariText = document.createElement("h5"); // Create a paragraph element for shhosurbari text
    shhosurbariText.textContent = slideData.shhosurbari; // Set the shhosurbari text content
    slide.append(shhosurbariText); // Append shhosurbari text to the slide

    const indicator = document.createElement("div");
    indicator.className = "slide-indicator";
    if (index === 0) indicator.classList.add("active");

    slides.push(slide);
    indicators.push(indicator);
  });

  bannerContent.append(...slides);
  slideIndicators.append(...indicators);

  let intervalID;

  function startSlideshow() {
    if (intervalID) {
      clearInterval(intervalID);
    }

    let currentIndex = 0;
    intervalID = setInterval(() => {
      slides[currentIndex].classList.remove("active");
      indicators[currentIndex].classList.remove("active");
      currentIndex = (currentIndex + 1) % slides.length;

      slides[currentIndex].classList.add("active");
      indicators[currentIndex].classList.add("active");
    }, interval);
  }

  startSlideshow();
}
</script> -->

  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                   S  T  A  R  T               --
  --           SHOSURBARI HOME PAGE / BANNER       --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
  <div class="banner2">
    <!-- <div class="banner_info">

      <h3 id="banner_text">Thousands of verified Members here</h3>
      <h1>বাংলাদেশী  ম্যাট্রিমনি<br>শশুরবাড়ি ডট কম</h1>

      <div class="shosurbari-title">
        <h4>“সকল ধর্ম, বর্ণ, জেলা, পেশার দেশি ও প্রবাসী বাঙালি পাত্র পাত্রী  খুঁজে পাওয়ার সহজ মাধ্যম।”</h4>
      </div>

    </div> -->



    <!-- <body onLoad="initClock()">
    <div class="clock" id="timedate">
      <h4>Today</h4>
      <p>Day: <a id="day"> </a></p>
      <p>Date: <a id="date"> </a> <a id="month"> <a id="year">  </a> </p>

      <p>Time: <a id="time">  </a> </p>
    </div>  -->
  </div> 


  <!-- <script>
    // START CLOCK SCRIPT
    Number.prototype.pad = function(n) {
      for (var r = this.toString(); r.length < n; r = '0' + r);
      return r;
    };

    function updateClock() {
      var now = new Date();
      var sec = now.getSeconds(),
      min = now.getMinutes(),
      hou = now.getHours(),
      dy = now.getDate(),
      mo = now.getMonth(),
      yr = now.getFullYear();
      var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

      var ampm = hou >= 12 ? 'PM' : 'AM';
      hou = hou % 12;
      hou = hou ? hou : 12;

      document.getElementById("day").textContent = days[now.getDay()];
      document.getElementById("date").textContent = dy;
      document.getElementById("month").textContent = months[mo];
      document.getElementById("year").textContent = yr;
      document.getElementById("time").textContent = hou.pad(2) + ":" + min.pad(2) + ":" + sec.pad(2) + " " + ampm;
    }

    function initClock() {
      updateClock();
      setInterval(updateClock, 1000);
    }
    // END CLOCK SCRIPT
  </script> -->
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                     E   N   D                 --
  --           SHOSURBARI HOME PAGE / BANNER       --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->

  <style>

@media screen and (max-width: 1200px) {
  .droop-down {
    display: block;
    flex-wrap: wrap;
    justify-content: center;
    height: auto;
    padding: 40px 42px;
    width: 550px;
    margin-top: -100px;


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

@media screen and (max-width: 768px) {
  .droop-down h2 {
    font-size: 23px;
    line-height: 32px;
  }
}

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
  margin-top: -100px;
}
}

@media screen and (max-width: 384px) {
  .shosurbari-home-search {
    width: 210px;
}
.droop-down {
  padding: 20px 25px;
  width: 260px;
}

.droop-down h2 {
  font-size: 20px;
  line-height: 27px;
}

.ellipsis {
  font-size: 16px;
}
}
</style>

<!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                 S  T  A  R  T                 --
  --    SHOSURBARI HOME PAGE / FEATURED PROFILES   --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
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

      <div class="sb-biodata-amount-list" style="margin: 0 auto;">
      </br><p style="text-align: center;">এখন পর্যন্ত যেই ২০ টি পাত্রপাত্রীর বায়োডাটা সব থেকে বেশি  দেখা হয়েছে।</p>
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
            echo "<a href=\"view_profile.php?id={$profid}\" target=\"_blank\">";
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
            echo "<a href=\"view_profile.php?id={$profid}\" target=\"_blank\"><button class=\"view_sb_profile_recentview\">সম্পূর্ণ প্রোফাইল</button> </a>";
            echo "</div></div>";
            echo "</li>";
          }
        }
      }
    }
  ?>
</ul>

      


      <!-- START FOR PROFILES ANIMATION SLIDE SHOW -->
      <script type="text/javascript">
        $(window).load(function() {
        $("#flexiselDemo3").flexisel({
          visibleItems: 4,
          animationSpeed: 700,
          autoPlay: false,
          autoPlaySpeed: 8000,    		
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


      <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    </div>
  </div>
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                     E   N   D                 --
  --    SHOSURBARI HOME PAGE / FEATURED PROFILES   --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->


  



  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                 S  T  A  R  T                 --
  --      SHOSURBARI HOME PAGE / BODY CONTENT      --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->



  <div class="sb-home-search">
    <h1><span class="shosurbari-heading-span"> বায়োডাটার </span>মূল্য তালিকা</h1>
    <div class="sbhome-heart-divider">
      <span class="grey-line"></span>
        <i class="fa fa-heart pink-heart"></i>
        <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
    </div>
  </div>

  <div class="shosurbari-biodata-form">
    <div class="shosurbari-animation-form">
        <form action="" method="post" name="SbLogForm" onsubmit="return SbLogineForm()">
            <div class="sb-biodata-amount-list">
                <p>শশুরবাড়ি ডট কমের পাত্রপাত্রীদের সাথে যোগাযোগ করতে চাইলে সামান্য সার্ভিস চার্জ প্রদান করতে হবে, যার বায়োডাটা তাদের থেকে কোনো টাকা নেয়া হয় না। আপনি চাইলে এক বা একাধিক পাত্র/পাত্রীর সাথে যোগাযোগ করতে পারবেন। আপনার পেমেন্ট সম্পন্ন হয়ে গেলে, পেমেন্ট তথ্যগুলো যাচাইবাচায়ের পর ২৪ ঘন্টার মধ্যেই আপনার নাম্বারে পাত্র/পাত্রীর অভিভাবকের নাম্বর পাঠিয়ে দেয়া হবে। <span style="color:#06b6d4;"> নিচের টাকা ব্যাতিত বিয়ের পর অথবা বিয়ের আগে আর কোনো টাকা নেয়া হয় না।</span> দেখেনিন ১ থেকে ১০টি বায়োডাটার মোট মূল্য সহ একাধিক বায়োডাটার এভারেজ মূল্য।</p>
                </br> <p> <span style="color:#ff0000; font-weight: 600;">বি: দ্র:</span> যোগাযোগের জন্য পাত্রপাত্রীর অভিভাবকের মোবাইল নাম্বার এবং পাত্রপাত্রীর ইমেইল প্রদান করা হবে। পাত্রপাত্রীর মোবাইল নাম্বার প্রদান করা হয় না।</p>
            </div>

		    <div class="flex-container">
                <div class="sb-register-login">

                    <div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
                        </div>
                    </div>

                    <div class="sb-biodata-field">
                        <h2>১ থেকে ৫টি বায়োডাটার মূল্য</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>বায়োডাটার পরিমান</th>
                                <th>প্যাকেজ মূল্য</th>
                                <th>এভারেজ মূল্য</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>১</td>
                                <td>১৪৫ ৳</td>
                                <td>১৪৫ ৳</td>
                            </tr>
                            <tr>
                                <td>২</td>
                                <td>২৮০ ৳</td>
                                <td>১৪০ ৳</td>
                            </tr>
                            <tr>
                                <td>৩</td>
                                <td>৩৯০ ৳</td>
                                <td>১৩০ ৳</td>
                            </tr>
                            <tr>
                                <td>৪</td>
                                <td>৫০০ ৳</td>
                                <td>১২৫ ৳</td>
                            </tr>
                            <tr>
                                <td>৫</td>
                                <td>৬০০ ৳</td>
                                <td>১২০ ৳</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="sb-register-login">

                    <div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                        <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
                        </div>
                    </div>

                    <div class="sb-biodata-field">
                        <h2>৬ থেকে ১০টি বায়োডাটার মূল্য</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>বায়োডাটার পরিমান</th>
                                <th>প্যাকেজ মূল্য</th>
                                <th>এভারেজ মূল্য</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>৬</td>
                                <td>৬৯০ ৳</td>
                                <td>১১৫ ৳</td>
                            </tr>
                            <tr>
                                <td>৭</td>
                                <td>৭৭০ ৳</td>
                                <td>১১০ ৳</td>
                            </tr>
                            <tr>
                                <td>৮</td>
                                <td>৮৪০ ৳</td>
                                <td>১০৫ ৳</td>
                            </tr>
                            <tr>
                                <td>৯</td>
                                <td>৯০০ ৳</td>
                                <td>১০০ ৳</td>
                            </tr>
                            <tr>
                                <td>১০</td>
                                <td>৯৮০ ৳</td>
                                <td>৯৮ ৳</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
	    </form>
    </div> 
</div>


<style>
table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  text-align: center;
  border: 1px solid #ddd;
}

th {
  background: linear-gradient(180deg, #00bbff61 0%,rgba(238,246,253,0) 100%);
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
  margin: auto;
  margin-top: 25px;
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

@media (max-width: 600px) {

th, td {
    font-size: 15px;
    padding: 8px;
}
}

@media (max-width:480px){
  .soshurbari-animation-icon h3,
  .sb-register-login h2{
    font-size: 20px;
  }

  .droop-down{
    margin-top: -50px;
}
}

@media (max-width: 384px) {
    th, td {
    font-size: 13px;
    padding: 5px;
}
}
</style>




  
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
    




  // Find Unique Visitors of my Website
  // Get the visitor's IP address
  $ip = $_SERVER['REMOTE_ADDR'];

  // Check if the IP address is already in the unique_visitors table
  $check_sql = "SELECT id FROM unique_visitors WHERE ip_address = ?";
  $check_stmt = $conn->prepare($check_sql);
  $check_stmt->bind_param("s", $ip);
  $check_stmt->execute();
  $check_stmt->store_result();

  if ($check_stmt->num_rows === 0) {
      // IP address is not in the database, meaning a unique visitor
      $insert_sql = "INSERT INTO unique_visitors (ip_address, visit_time) VALUES (?, NOW())";
      $insert_stmt = $conn->prepare($insert_sql);
      $insert_stmt->bind_param("s", $ip);

      if ($insert_stmt->execute()) {
          // Successfully inserted a new unique visitor record
      } else {
          // Handle the insert error
          echo "Error inserting new unique visitor: " . $conn->error;
      }
  }

  // Retrieve counts for different time intervals
  $last_year_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
  $last_month_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
  $last_week_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
  $last_24_hours_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 24 HOUR)";
  $last_1_hour_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 HOUR)";

  // Execute the queries to get counts
  $last_year_count = $conn->query($last_year_sql)->fetch_row()[0];
  $last_month_count = $conn->query($last_month_sql)->fetch_row()[0];
  $last_week_count = $conn->query($last_week_sql)->fetch_row()[0];
  $last_24_hours_count = $conn->query($last_24_hours_sql)->fetch_row()[0];
  $last_1_hour_count = $conn->query($last_1_hour_sql)->fetch_row()[0];

  mysqli_close($conn);
?>
    




    


<div class="sb-home-search">
  <h1><span class="shosurbari-heading-span"> শ্বশুরবাড়ি </span>সেবা গ্রহীতাদের পরিসংখ্যান</h1>
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
      <h3>মোট পাত্রপাত্রী</h3>
      <h2><?php echo $totalBiodataCount; ?></h2>
    </div>
  </div>

  <div class="card-wrap">
    <div class="card-header four">
      <img src="images/shosurbari-success-marriage.jpg" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
    </div>
    <div class="card-content">
      <h3>সফল বিবাহ</h3>
      <h2>100</h2>
    </div>
  </div>
</div>








<div class="sb-home-search">
  <h1><span class="shosurbari-heading-span"> শ্বশুরবাড়ির </span>সেবা যেভাবে গ্রহণ করবেন</h1>
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
      <h1 class="card-title">বায়োডাটা তৈরি করুন</h1>
      <p>শশুরবাড়ি ডট কমে একাউন্ট খোলা এবং বায়োডাটা পোস্ট করতে কোনো সার্ভিস চার্জ নেওয়া হয় না। পাত্রপাত্রী নিজেই অথবা তাদের অভিভাবক বায়োডাটা পোস্ট করতে পারবে খুব সহজেই।</p>
    </div>
  </div>

  <div class="card-wrap">
    <div class="card-header two">
      <img src="images/sb-home-search.jpg" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
    </div>
    <div class="card-content">
      <h1 class="card-title">বায়োডাটা খুঁজুন</h1>
      <p>সকল ধর্ম, বর্ণ, জেলা, পেশা, দেশি ও প্রবাসী বাঙালি পাত্র পাত্রী খুঁজে পাওয়ার সহজ মাধ্যম শশুরবাড়ি ডট কম। সার্চ ফিল্টার ব্যবহার করে খুঁজেনিন পছন্দের জীবনসঙ্গী।</p>
    </div>
  </div>

  <div class="card-wrap">
    <div class="card-header three">
      <img src="images/sb-home-contact.png" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
    </div>
    <div class="card-content">
      <h1 class="card-title">যোগাযোগ করুন</h1>
      <p>শশুরবাড়ি ডট কমে বায়োডাটা পছন্দ হবার পর অভিভাবকের সাথে যোগাযোগ করতে চাইলে সামান্য কিছু সার্ভিস চার্জ প্রদান করতে হবে। বায়োডাটা কতৃপক্ষের থেকে সার্ভিস চার্জ নেয়া হয় না।</p>
    </div>
  </div>

  <div class="card-wrap">
    <div class="card-header four">
      <img src="images/sb-home-married.png" style="height: 75px; widht: 75px; background: #fff; border-radius: 50%;">
    </div>
    <div class="card-content">
      <h1 class="card-title">বিবাহ সম্পন্ন করুন</h1>
      <p>পরিবার ও পাত্রপাত্রীর সম্পর্কে নিজ দায়িত্বে ভালভাবে খোঁজ নিয়ে তবেই বিয়ের কথা পাকা করুন। বিয়ের পূর্বেই পাত্র বা পাত্রীর পরিবারের সাথে টাকা লেনদেন করে প্রতারিত হবেন না।</p>
    </div>
  </div>
</div>



<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap');



.card-wrap{
  width: 230px;
  background: #fff;
  border-radius: 20px;
  border: 5px solid #fff;
  overflow: hidden;
  color: var(--color-text);
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
  cursor: pointer;
  transition: all .2s ease-in-out;
  box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
  border: 1px solid rgba(0,0,0,.05);
}

.card-wrap:hover{
  transform: scale(1.05);
}

.card-header{
  height: 120px;
  width: 100%;
  border-radius:100% 0% 100% 0% / 0% 50% 50% 100%;
  display: grid;
  place-items: center;
  background: linear-gradient(180deg, #00bbff61 0%,rgba(238,246,253,0) 100%);
  box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
}

.card-content{
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 60%;
  margin: 0 auto;
}

.card-content h2{
  font-size: 35px;
  margin-bottom: 25px;
  margin-top: -5px;
  width: 200px;
  text-align: center;
}

.card-content h3{
  text-align: center;
  text-transform: uppercase;
  font-size: 14px;
  color: black;
  margin-top: 10px;
  margin-bottom: 20px;
  width: 200px;
}

.card-content p{
  font-size: 14px;
  margin-bottom: 25px;
  margin-top: 0px;
  width: 200px;
  text-align: justify;
}

.card-title{
  text-align: center;
  text-transform: uppercase;
  font-size: 19px;
  color: black;
  margin-top: 10px;
  margin-bottom: 20px;
  width: 200px;
}

.card-text{
  text-align: center;
  font-size: 12px;
  margin-bottom: 20px;
}

.card-btn{
  border: none;
  border-radius: 100px;
  padding: 5px 30px;
  color: #fff;
  margin-bottom: 15px;
  text-transform: uppercase;
}

.shosurbari-heading-span{
  color: #06b6d4;
}
</style>




  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                 S  T  A  R  T                 --
  --       SHOSURBARI HOME PAGE / WEB  DETAILS     --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	

  
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                     E   N   D                 --
  --       SHOSURBARI HOME PAGE / WEB  DETAILS     --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	




  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                   E   N   D                    --
  --      SHOSURBARI HOME PAGE / BODY CONTENT      --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->






  <!--=======================================
  How Many Visitors View This Page.
  This Script Connected to get_view_count.php
  and page_views Database Table
  ========================================-->
  <script>
  $(document).ready(function() {
  // Define an array of page names (without the .php extension)
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


<!--=======  Footer Start ========-->
<?php include_once("footer.php");?>
<!--=======  Footer End  =========-->



<?php
// Include the database connection file
require_once("includes/dbconn.php");

// Get the visitor's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Check if the IP address is already in the unique_visitors table
$check_sql = "SELECT id FROM unique_visitors WHERE ip_address = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("s", $ip);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows === 0) {
    // IP address is not in the database, meaning a unique visitor
    $insert_sql = "INSERT INTO unique_visitors (ip_address, visit_time) VALUES (?, DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("s", $ip);

    if ($insert_stmt->execute()) {
        // Successfully inserted a new unique visitor record
    } else {
        // Handle the insert error
        echo "Error inserting new unique visitor: " . $conn->error;
    }
} else {
    // If you see this message, it means the IP is already in the database
    echo "This IP address is already in the database.";
}

// Retrieve counts for different time intervals
$last_year_sql = "SELECT COUNT(*) FROM unique_visitors WHERE DATE(visit_time) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)";
$last_month_sql = "SELECT COUNT(*) FROM unique_visitors WHERE DATE(visit_time) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
$last_week_sql = "SELECT COUNT(*) FROM unique_visitors WHERE DATE(visit_time) >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)";
$last_24_hours_sql = "SELECT COUNT(*) FROM unique_visitors WHERE DATE(visit_time) >= DATE_SUB(NOW(), INTERVAL 24 HOUR)";
$last_1_hour_sql = "SELECT COUNT(*) FROM unique_visitors WHERE DATE(visit_time) >= DATE_SUB(NOW(), INTERVAL 1 HOUR)";

// Execute the queries to get counts
$last_year_count = $conn->query($last_year_sql)->fetch_row()[0];
$last_month_count = $conn->query($last_month_sql)->fetch_row()[0];
$last_week_count = $conn->query($last_week_sql)->fetch_row()[0];
$last_24_hours_count = $conn->query($last_24_hours_sql)->fetch_row()[0];
$last_1_hour_count = $conn->query($last_1_hour_sql)->fetch_row()[0];

// Close the database connection
$conn->close();
?>


  
</body>
</html>	
