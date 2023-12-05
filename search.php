<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>

<?php
$result=search();
?>
<!DOCTYPE HTML>
<html>


<head>
<title>Search | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


  <style>
  #close-button {
    margin-top: -29px;
    margin-bottom: 15px;
    color: white;
    margin-right: -29px;
    width: 37px;
    height: 37px;
    border-radius: 50%;
    border: 1px solid #ccc;
    font-size: 20px;
    background: #06b6d4;
  }
  </style>

  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                 S  T  A  R  T                 --
  --   SHOSURBARI MULTIPLE SEARCH / MOBILE SCREEN  --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	
  <div class="flex-container-shosurbaribio">
    <script>
      let label = document.querySelector('.toggle-next');
      let checkbox = document.querySelector('#Lorems');

      label.addEventListener('click', () => {
        if (checkbox.style.display === 'none') {
        checkbox.style.display = 'block';
        } else {
        checkbox.style.display = 'none';
        }
      });
    </script>

    <div id="search-bar">
      <div class="sb_mobilesearch">     <!-- Biodata Single Profile Search For Mobile Start -->
        <div class="sb_singlebio_mobilesearch">

          <div class="search-title">
            <h4>একটি পাত্রপাত্রীর বায়োডাটা খুঁজুন</h4>
          </div>

          <input type="text"  id="profid" name="profid" placeholder="Enter Biodata Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required>
          <button type="submit" onclick="viewprofile();"  value="search">বায়োডাটা খুঁজুন</button>
          
          <script type="text/javascript">
            function viewprofile(){
            var profid=document.getElementById("profid").value;
            window.location.href="view_profile.php?id="+profid;
            }
          </script>
        </div>

        <div id="search-button">
          <p><i class="fa fa-gear fa-spin" style="font-size:24px"> </i> সার্চ ফিল্টার</p>
        </div>
      </div>


      <div id="filters">
        <div class="sbbiodata-search-mobile">
          <form action="" method="post">
            <div id="close-button">
              <i class="fa fa-close"></i>
            </div>

            <div class="search-title">
              <h4>স্বপ্নময় জীবনসঙ্গী খুঁজুন দ্রুততম সময়ে</h4>
            </div>

            <!--Biodata Gender Lookin Option START-->
            <div class="wrapper">
              <div class="gender-radio-select">
                <label class="ellipsis" for="Looking">খুঁজছি : </label>

                <div class="gender-option">
                  <input type="radio" name="biodatagender" id="male_mob" value="পাত্রের বায়োডাটা" required/>
                  <label for="male_mob"><i class="fa fa-male"></i> পাত্র </label>
                </div>
            
                <div class="gender-option">
                  <input type="radio" name="biodatagender" id="female_mob" value="পাত্রীর বায়োডাটা"/>
                  <label for="female_mob"><i class="fa fa-female"></i> পাত্রী</label><br>
                </div>

              </div>
              <div id="gender-error-mob" class="error-message" style="padding-top: 4px; font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;">বায়োডাটা নির্বাচন করুন!</div>
            </div>
            <!--Biodata Gender Lookin Option END-->


            <!-- Biodata Religion Option START-->
            <div class="wrapper">
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
            <!-- Biodata Religion Option END-->


            <!--Biodata Marital Status Option START-->
            <div class="wrapper">
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
            <!--Biodata Marital Status Option END-->


            <!--Biodata Skin Tones Option START-->
            <div class="wrapper">
              <label class="form-control toggle-next ellipsis">শারীরিক বর্ণ<span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
              <div class="checkboxes" id="Lorems">
                <div class="inner-wrap">

                  <input type="checkbox" name="Skin_tones[]" value="Any Skin Tones" class="SelectBox all" onchange="handleAllSkinTones(this)" checked />
                  <span class="search-options">সকল শারীরিক বর্ণ</span>
                  <br>

                  <input type="checkbox" name="Skin_tones[]" value="উজ্জ্বল ফর্সা" class="SelectBox val" />
                  <span class="search-options">উজ্জ্বল ফর্সা</span>
                  <br>

                  <input type="checkbox" name="Skin_tones[]" value="ফর্সা" class="SelectBox val" />
                  <span class="search-options">ফর্সা</span>
                  <br>

                  <input type="checkbox" name="Skin_tones[]" value="উজ্জ্বল শ্যামবর্ণ" class="SelectBox val" />
                  <span class="search-options">উজ্জ্বল শ্যামবর্ণ</span>
                  <br>

                  <input type="checkbox" name="Skin_tones[]" value="শ্যামবর্ণ" class="SelectBox val" />
                  <span class="search-options">শ্যামবর্ণ</span>
                  <br>

                  <input type="checkbox" name="Skin_tones[]" value="কালো" class="SelectBox val" />
                  <span class="search-options">কালো</span>

                </div>
              </div>
            </div>
            <!--Biodata Skin Tones Option END-->


            <!--Biodata Rasidencial Country Option START-->
            <div class="wrapper">
              <label class="form-control toggle-next ellipsis">নাগরিকত্ব/সিটিজেনশিপ<span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
              <div class="checkboxes" id="Lorems">
                <div class="inner-wrap">
                  
                  <input type="checkbox" name="country_present_address[]" value="Any Country" class="SelectBox all" onchange="handleAllCountries(this)" checked />
                  <span class="search-options">সকল দেশ</span>
                  <br>
                  
                  <input type="checkbox" name="country_present_address[]" value="Afghanistan" class="SelectBox val" />
                  <span class="search-options">Afghanistan</span>
                  <br>
                  
                  <input type="checkbox" name="country_present_address[]" value="Argentina" class="SelectBox val" />
                  <span class="search-options">Argentina</span>
                  <br>
                  
                  <input type="checkbox" name="country_present_address[]" value="Armenia" class="SelectBox val" />
                  <span class="search-options">Armenia</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Australia" class="SelectBox val" />
                  <span class="search-options">Australia</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Austria" class="SelectBox val" />
                  <span class="search-options">Austria</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Bahrain" class="SelectBox val" />
                  <span class="search-options">Bahrain</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Bangladesh" class="SelectBox val" />
                  <span class="search-options">Bangladesh</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Belgium" class="SelectBox val" />
                  <span class="search-options">Belgium</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Bhutan" class="SelectBox val" />
                  <span class="search-options">Bhutan</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Brazil" class="SelectBox val" />
                  <span class="search-options">Brazil</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Canada" class="SelectBox val" />
                  <span class="search-options">Canada</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="China" class="SelectBox val" />
                  <span class="search-options">China</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Colombia" class="SelectBox val" />
                  <span class="search-options">Colombia</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Denmark" class="SelectBox val" />
                  <span class="search-options">Denmark</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Egypt" class="SelectBox val" />
                  <span class="search-options">Egypt</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Finland" class="SelectBox val" />
                  <span class="search-options">Finland</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="France" class="SelectBox val" />
                  <span class="search-options">France</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Germany" class="SelectBox val" />
                  <span class="search-options">Germany</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Greece" class="SelectBox val" />
                  <span class="search-options">Greece</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Hungary" class="SelectBox val" />
                  <span class="search-options">Hungary</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="India" class="SelectBox val" />
                  <span class="search-options">India</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Indonesia" class="SelectBox val" />
                  <span class="search-options">Indonesia</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Iran" class="SelectBox val" />
                  <span class="search-options">Iran</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Iraq" class="SelectBox val" />
                  <span class="search-options">Iraq</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Ireland" class="SelectBox val" />
                  <span class="search-options">Ireland</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Italy" class="SelectBox val" />
                  <span class="search-options">Italy</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Japan" class="SelectBox val" />
                  <span class="search-options">Japan</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Jordan" class="SelectBox val" />
                  <span class="search-options">Jordan</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Kazakhstan" class="SelectBox val" />
                  <span class="search-options">Kazakhstan</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Korea, North" class="SelectBox val" />
                  <span class="search-options">Korea, North</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Korea, South" class="SelectBox val" />
                  <span class="search-options">Korea, South</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Kuwait" class="SelectBox val" />
                  <span class="search-options">Kuwait</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Libya" class="SelectBox val" />
                  <span class="search-options">Libya</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Luxembourg" class="SelectBox val" />
                  <span class="search-options">Luxembourg</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Malaysia" class="SelectBox val" />
                  <span class="search-options">Malaysia</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Maldives" class="SelectBox val" />
                  <span class="search-options">Maldives</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Mexico" class="SelectBox val" />
                  <span class="search-options">Mexico</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Morocco" class="SelectBox val" />
                  <span class="search-options">Morocco</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Myanmar" class="SelectBox val" />
                  <span class="search-options">Myanmar</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Nepal" class="SelectBox val" />
                  <span class="search-options">Nepal</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Netherlands" class="SelectBox val" />
                  <span class="search-options">Netherlands</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="New Zealand" class="SelectBox val" />
                  <span class="search-options">New Zealand</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Norway" class="SelectBox val" />
                  <span class="search-options">Norway</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Oman" class="SelectBox val" />
                  <span class="search-options">Oman</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Pakistan" class="SelectBox val" />
                  <span class="search-options">Pakistan</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Palestine" class="SelectBox val" />
                  <span class="search-options">Palestine</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Paraguay" class="SelectBox val" />
                  <span class="search-options">Paraguay</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Philippines" class="SelectBox val" />
                  <span class="search-options">Philippines</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Poland" class="SelectBox val" />
                  <span class="search-options">Poland</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Portugal" class="SelectBox val" />
                  <span class="search-options">Portugal</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Qatar" class="SelectBox val" />
                  <span class="search-options">Qatar</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Russia" class="SelectBox val" />
                  <span class="search-options">Russia</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Saudi Arabia" class="SelectBox val" />
                  <span class="search-options">Saudi Arabia</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Singapore" class="SelectBox val" />
                  <span class="search-options">Singapore</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="South Africa" class="SelectBox val" />
                  <span class="search-options">South Africa</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Spain" class="SelectBox val" />
                  <span class="search-options">Spain</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Sri Lanka" class="SelectBox val" />
                  <span class="search-options">Sri Lanka</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Sudan" class="SelectBox val" />
                  <span class="search-options">Sudan</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Sweden" class="SelectBox val" />
                  <span class="search-options">Sweden</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Switzerland" class="SelectBox val" />
                  <span class="search-options">Switzerland</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Syria" class="SelectBox val" />
                  <span class="search-options">Syria</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Taiwan" class="SelectBox val" />
                  <span class="search-options">Taiwan</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Tajikistan" class="SelectBox val" />
                  <span class="search-options">Tajikistan</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Thailand" class="SelectBox val" />
                  <span class="search-options">Thailand</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Turkey" class="SelectBox val" />
                  <span class="search-options">Turkey</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Ukraine" class="SelectBox val" />
                  <span class="search-options">Ukraine</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="United Arab Emirates" class="SelectBox val" />
                  <span class="search-options">United Arab Emirates</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="United Kingdom" class="SelectBox val" />
                  <span class="search-options">United Kingdom</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="United States of America" class="SelectBox val" />
                  <span class="search-options">United States of America</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Uruguay" class="SelectBox val" />
                  <span class="search-options">Uruguay</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Vietnam" class="SelectBox val" />
                  <span class="search-options">Vietnam</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Yemen" class="SelectBox val" />
                  <span class="search-options">Yemen</span>
                  <br>

                  <input type="checkbox" name="country_present_address[]" value="Others" class="SelectBox val" />
                  <span class="search-options">Others</span>
                  <br>
                  
                </div>
              </div>
            </div>
            <!--Biodata Rasidencial Country Option END-->


            <!--Biodata District Option START-->
            <div class="wrapper">
              <label class="form-control toggle-next ellipsis">স্থায়ী ঠিকানা জেলা <span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
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
            <!--Biodata District Option END-->



            <!--Biodata Family Condition Option START-->
            <div class="wrapper">
              <label class="form-control toggle-next ellipsis">পারিবারিক অবস্থা <span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
              <div class="checkboxes" id="Lorems">
                <div class="inner-wrap">
                
                  <input type="checkbox" name="family_class[]" value="Any Family Class" class="SelectBox all" onchange="handleAllFamilyClasses(this)" checked />
                  <span class="search-options">সকল পারিবার</span>
                  <br>

                  <input type="checkbox" name="family_class[]" value="উচ্চ শ্রেণী" class="SelectBox val" />
                  <span class="search-options">উচ্চবিত্ত</span>
                  <br>

                  <input type="checkbox" name="family_class[]" value="উচ্চ মধ্যম শ্রেণী" class="SelectBox val" />
                  <span class="search-options">উচ্চ মধ্যবিত্ত</span>
                  <br>

                  <input type="checkbox" name="family_class[]" value="মধ্যম শ্রেণী" class="SelectBox val" />
                  <span class="search-options">মধ্যবিত্ত</span>
                  <br>

                  <input type="checkbox" name="family_class[]" value="নিম্নমধ্যম শ্রেণী" class="SelectBox val" />
                  <span class="search-options">নিম্নমধ্যবিত্ত</span>
                  <br> 

                  <input type="checkbox" name="family_class[]" value="নিম্ন শ্রেণী" class="SelectBox val" />
                  <span class="search-options">নিম্নবিত্ত</span>

                </div>
              </div>
            </div>
            <!--Biodata Family Condition Option END-->



            <!--Biodata Occupation Option START-->
            <div class="wrapper">
              <label class="form-control toggle-next ellipsis">পেশা<span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
              <div class="checkboxes" id="Lorems">
                <div class="inner-wrap">

                  <!-- All Occupations -->
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
                  <input type="checkbox" name="student_occupation_level[]" value="কওমি মাদ্রাসার শিক্ষার্থী" class="SelectBox val student-option" onchange="handleStudentOptions(this)" />
                  <span class="search-options">শিক্ষার্থী-কওমি মাদ্রাসা</span>
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
                  <input type="checkbox" name="occupation_sector[]" value="সার্ভিস/ব্যাংকার/ফ্রিল্যান্সার/উদ্যোক্তা" class="SelectBox val" />
                  <span class="search-options">সার্ভিস/ব্যাংকার/ফ্রিল্যান্সার/উদ্যোক্তা</span>
                  <br>

                  <!-- Working Forign Sector-->                  
                  <input type="checkbox" name="occupation_sector[]" value="প্রবাসী/বিদেশে" class="SelectBox val" />
                  <span class="search-options">প্রবাসী/বিদেশে</span>
                  <br>

                  <!-- Garments Sector-->                  
                  <input type="checkbox" name="occupation_sector[]" value="গার্মেন্টস সেক্টর" class="SelectBox val" />
                  <span class="search-options">গার্মেন্টস সেক্টর</span>
                  <br>

                  <!--  Driver Profession -->                  
                  <input type="checkbox" name="occupation_sector[]" value="ড্রাইভার/চালক" class="SelectBox val" />
                  <span class="search-options">ড্রাইভার/চালক</span>
                  <br>

                  <!-- Mistri Sector-->                  
                  <input type="checkbox" name="occupation_sector[]" value="কারিগর/মিস্ত্রি" class="SelectBox val" />
                  <span class="search-options">কারিগর/মিস্ত্রি</span>
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
            <!--Biodata Occupation Option END-->



            <!--Biodata Education Method Option START-->
            <div class="wrapper">
              <label class="form-control toggle-next ellipsis">মাধ্যমিক শিক্ষার মাধ্যম <span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
              <div class="checkboxes" id="Lorems">
                <div class="inner-wrap">

                  <input type="checkbox" name="scndry_edu_method[]" value="Any Education Method" class="SelectBox all" onchange="handleAllEducationMethods(this)" checked />
                  <span class="search-options">সকল মাধ্যম</span>
                  <br>

                  <input type="checkbox" name="scndry_edu_method[]" value="কওমি মাদ্রাসা" class="SelectBox val" />
                  <span class="search-options">কওমি মাদ্রাসা</span>
                  <br>

                  <input type="checkbox" name="scndry_edu_method[]" value="জেনারেল" class="SelectBox val" />
                  <span class="search-options">জেনারেল</span>
                  <br>

                  <input type="checkbox" name="scndry_edu_method[]" value="আলিয়া মাদ্রাসা" class="SelectBox val" />
                  <span class="search-options">আলিয়া মাদ্রাসা</span>
                  <br>

                  <input type="checkbox" name="scndry_edu_method[]" value="ভোকেশনাল" class="SelectBox val" />
                  <span class="search-options">ভোকেশনাল</span>
                  <br>

                  <input type="checkbox" name="scndry_edu_method[]" value="মাধ্যমিক পড়িনাই" class="SelectBox val" />
                  <span class="search-options">পড়ালেখা করিনি</span>
                  <br> 

                  <input type="checkbox" name="scndry_edu_method[]" value="অন্যান্য" class="SelectBox val" />
                  <span class="search-options">অন্যান্য</span>
            
                </div>
              </div>
            </div>
            <!--Biodata Education Method Option END-->


            <div class="form_but1">
              <div class="clearfix"> </div>
              <input type="submit" name="search" value="বায়োডাটা খুঁজুন" onclick="return validateForm();"/>
            </div>
        </form>
      </div>
    </div>
  </div>
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                     E   N   D                 --
  --   SHOSURBARI MULTIPLE SEARCH / MOBILE SCREEN  --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	



  <div class="heart-divider">
    <h1>স্বপ্নময় জীবনসঙ্গী খুঁজুন</h1>
		<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
		<span class="grey-line"></span>


    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var countDisplay = document.querySelector(".count-display");
        if (countDisplay) {
          // Assuming "count" is a numeric variable containing the count value
          var banglaNumber = count.toLocaleString("bn-BD");

          countDisplay.innerHTML = "খুঁজে পাওয়া গেছে <span style='color: #0aa4ca;'>" + banglaNumber + "</span> টি বায়োডাটা";
        }
      });
    </script>
    <div class="count-display"> <span> <script>document.write(banglaNumber)</script></span></div>
  </div>
  <!-- </div> -->
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                 S  T  A  R  T                 --
  --   SHOSURBARI MULTIPLE SEARCH / LAPTOP SCREEN  --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	

  <div class="sbbiodata-search">
    <div class="sb_singlebio_search">

      <div class="search-title">
        <h4>একটি পাত্রপাত্রীর বায়োডাটা খুঁজুন</h4>
      </div>

      <input type="text"  id="sbprofid" name="sbprofid" placeholder="Enter Biodata Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required>
      <button type="submit" onclick="viewprofile2();"  value="search">বায়োডাটা খুঁজুন</button>
      
      <script type="text/javascript">
        function viewprofile2(){
        var sbprofid=document.getElementById("sbprofid").value;
        window.location.href="view_profile.php?id="+sbprofid;
        }
      </script>
    </div>

    <form action="" method="post">
      <div class="search-title">
        <h4>স্বপ্নময় জীবনসঙ্গী খুঁজুন দ্রুততম সময়ে</h4>
      </div>

      <!--Biodata Gender Lookin Option START-->
      <div class="wrapper">
        <div class="gender-radio-select">
          <label class="ellipsis" for="Looking">খুঁজছি :</label>

          <div class="gender-option">
            <input type="radio" name="biodatagender" id="male" value="পাত্রের বায়োডাটা" required/>
            <label for="male"><i class="fa fa-male"></i> পাত্র</label>
          </div>

          <div class="gender-option">
            <input type="radio" name="biodatagender" id="female" value="পাত্রীর বায়োডাটা"/>
            <label for="female"><i class="fa fa-female"></i> পাত্রী</label><br>
          </div>

        </div>
        <div id="gender-error-laptop" class="error-message" style="padding-top: 4px; font-size: 16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;">বায়োডাটা নির্বাচন করুন!</div>
      </div>
      <!--Biodata Gender Lookin Option END-->


      <!-- Biodata Religion Option START-->
      <div class="wrapper">
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
      <!-- Biodata Religion Option END-->


      <!--Biodata Marital Status Option START-->
      <div class="wrapper">
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
      <!--Biodata Marital Status Option END-->


      <!--Biodata Skin Tones Option START-->
      <div class="wrapper">
        <label class="form-control toggle-next ellipsis">শারীরিক বর্ণ<span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
        <div class="checkboxes" id="Lorems">
          <div class="inner-wrap">

            <input type="checkbox" name="Skin_tones[]" value="Any Skin Tones" class="SelectBox all" onchange="handleAllSkinTones(this)" checked />
            <span class="search-options">সকল শারীরিক বর্ণ</span>
            <br>

            <input type="checkbox" name="Skin_tones[]" value="উজ্জ্বল ফর্সা" class="SelectBox val" />
            <span class="search-options">উজ্জ্বল ফর্সা</span>
            <br>

            <input type="checkbox" name="Skin_tones[]" value="ফর্সা" class="SelectBox val" />
            <span class="search-options">ফর্সা</span>
            <br>

            <input type="checkbox" name="Skin_tones[]" value="উজ্জ্বল শ্যামবর্ণ" class="SelectBox val" />
            <span class="search-options">উজ্জ্বল শ্যামবর্ণ</span>
            <br>

            <input type="checkbox" name="Skin_tones[]" value="শ্যামবর্ণ" class="SelectBox val" />
            <span class="search-options">শ্যামবর্ণ</span>
            <br>

            <input type="checkbox" name="Skin_tones[]" value="কালো" class="SelectBox val" />
            <span class="search-options">কালো</span>

          </div>
        </div>
      </div>
      <!--Biodata Skin Tones Option END-->


      <!--Biodata Rasidencial Country Option START-->
      <div class="wrapper">
        <label class="form-control toggle-next ellipsis">নাগরিকত্ব/সিটিজেনশিপ<span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
        <div class="checkboxes" id="Lorems">
          <div class="inner-wrap">
            
            <input type="checkbox" name="country_present_address[]" value="Any Country" class="SelectBox all" onchange="handleAllCountries(this)" checked />
            <span class="search-options">সকল দেশ</span>
            <br>
            
            <input type="checkbox" name="country_present_address[]" value="Afghanistan" class="SelectBox val" />
            <span class="search-options">Afghanistan</span>
            <br>
            
            <input type="checkbox" name="country_present_address[]" value="Argentina" class="SelectBox val" />
            <span class="search-options">Argentina</span>
            <br>
            
            <input type="checkbox" name="country_present_address[]" value="Armenia" class="SelectBox val" />
            <span class="search-options">Armenia</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Australia" class="SelectBox val" />
            <span class="search-options">Australia</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Austria" class="SelectBox val" />
            <span class="search-options">Austria</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Bahrain" class="SelectBox val" />
            <span class="search-options">Bahrain</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Bangladesh" class="SelectBox val" />
            <span class="search-options">Bangladesh</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Belgium" class="SelectBox val" />
            <span class="search-options">Belgium</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Bhutan" class="SelectBox val" />
            <span class="search-options">Bhutan</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Brazil" class="SelectBox val" />
            <span class="search-options">Brazil</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Canada" class="SelectBox val" />
            <span class="search-options">Canada</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="China" class="SelectBox val" />
            <span class="search-options">China</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Colombia" class="SelectBox val" />
            <span class="search-options">Colombia</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Denmark" class="SelectBox val" />
            <span class="search-options">Denmark</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Egypt" class="SelectBox val" />
            <span class="search-options">Egypt</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Finland" class="SelectBox val" />
            <span class="search-options">Finland</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="France" class="SelectBox val" />
            <span class="search-options">France</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Germany" class="SelectBox val" />
            <span class="search-options">Germany</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Greece" class="SelectBox val" />
            <span class="search-options">Greece</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Hungary" class="SelectBox val" />
            <span class="search-options">Hungary</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="India" class="SelectBox val" />
            <span class="search-options">India</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Indonesia" class="SelectBox val" />
            <span class="search-options">Indonesia</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Iran" class="SelectBox val" />
            <span class="search-options">Iran</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Iraq" class="SelectBox val" />
            <span class="search-options">Iraq</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Ireland" class="SelectBox val" />
            <span class="search-options">Ireland</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Italy" class="SelectBox val" />
            <span class="search-options">Italy</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Japan" class="SelectBox val" />
            <span class="search-options">Japan</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Jordan" class="SelectBox val" />
            <span class="search-options">Jordan</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Kazakhstan" class="SelectBox val" />
            <span class="search-options">Kazakhstan</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Korea, North" class="SelectBox val" />
            <span class="search-options">Korea, North</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Korea, South" class="SelectBox val" />
            <span class="search-options">Korea, South</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Kuwait" class="SelectBox val" />
            <span class="search-options">Kuwait</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Libya" class="SelectBox val" />
            <span class="search-options">Libya</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Luxembourg" class="SelectBox val" />
            <span class="search-options">Luxembourg</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Malaysia" class="SelectBox val" />
            <span class="search-options">Malaysia</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Maldives" class="SelectBox val" />
            <span class="search-options">Maldives</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Mexico" class="SelectBox val" />
            <span class="search-options">Mexico</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Morocco" class="SelectBox val" />
            <span class="search-options">Morocco</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Myanmar" class="SelectBox val" />
            <span class="search-options">Myanmar</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Nepal" class="SelectBox val" />
            <span class="search-options">Nepal</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Netherlands" class="SelectBox val" />
            <span class="search-options">Netherlands</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="New Zealand" class="SelectBox val" />
            <span class="search-options">New Zealand</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Norway" class="SelectBox val" />
            <span class="search-options">Norway</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Oman" class="SelectBox val" />
            <span class="search-options">Oman</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Pakistan" class="SelectBox val" />
            <span class="search-options">Pakistan</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Palestine" class="SelectBox val" />
            <span class="search-options">Palestine</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Paraguay" class="SelectBox val" />
            <span class="search-options">Paraguay</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Philippines" class="SelectBox val" />
            <span class="search-options">Philippines</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Poland" class="SelectBox val" />
            <span class="search-options">Poland</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Portugal" class="SelectBox val" />
            <span class="search-options">Portugal</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Qatar" class="SelectBox val" />
            <span class="search-options">Qatar</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Russia" class="SelectBox val" />
            <span class="search-options">Russia</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Saudi Arabia" class="SelectBox val" />
            <span class="search-options">Saudi Arabia</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Singapore" class="SelectBox val" />
            <span class="search-options">Singapore</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="South Africa" class="SelectBox val" />
            <span class="search-options">South Africa</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Spain" class="SelectBox val" />
            <span class="search-options">Spain</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Sri Lanka" class="SelectBox val" />
            <span class="search-options">Sri Lanka</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Sudan" class="SelectBox val" />
            <span class="search-options">Sudan</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Sweden" class="SelectBox val" />
            <span class="search-options">Sweden</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Switzerland" class="SelectBox val" />
            <span class="search-options">Switzerland</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Syria" class="SelectBox val" />
            <span class="search-options">Syria</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Taiwan" class="SelectBox val" />
            <span class="search-options">Taiwan</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Tajikistan" class="SelectBox val" />
            <span class="search-options">Tajikistan</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Thailand" class="SelectBox val" />
            <span class="search-options">Thailand</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Turkey" class="SelectBox val" />
            <span class="search-options">Turkey</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Ukraine" class="SelectBox val" />
            <span class="search-options">Ukraine</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="United Arab Emirates" class="SelectBox val" />
            <span class="search-options">United Arab Emirates</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="United Kingdom" class="SelectBox val" />
            <span class="search-options">United Kingdom</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="United States of America" class="SelectBox val" />
            <span class="search-options">United States of America</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Uruguay" class="SelectBox val" />
            <span class="search-options">Uruguay</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Vietnam" class="SelectBox val" />
            <span class="search-options">Vietnam</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Yemen" class="SelectBox val" />
            <span class="search-options">Yemen</span>
            <br>

            <input type="checkbox" name="country_present_address[]" value="Others" class="SelectBox val" />
            <span class="search-options">Others</span>
            <br>
            
          </div>
        </div>
      </div>
      <!--Biodata Rasidencial Country Option END-->


      <!--Biodata District Option START-->
      <div class="wrapper">
        <label class="form-control toggle-next ellipsis">স্থায়ী ঠিকানা জেলা <span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
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
      <!--Biodata District Option END-->



      <!--Biodata Family Condition Option START-->
      <div class="wrapper">
        <label class="form-control toggle-next ellipsis">পারিবারিক অবস্থা <span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
        <div class="checkboxes" id="Lorems">
          <div class="inner-wrap">
          
            <input type="checkbox" name="family_class[]" value="Any Family Class" class="SelectBox all" onchange="handleAllFamilyClasses(this)" checked />
            <span class="search-options">সকল পারিবার</span>
            <br>

            <input type="checkbox" name="family_class[]" value="উচ্চ শ্রেণী" class="SelectBox val" />
            <span class="search-options">উচ্চবিত্ত</span>
            <br>

            <input type="checkbox" name="family_class[]" value="উচ্চ মধ্যম শ্রেণী" class="SelectBox val" />
            <span class="search-options">উচ্চ মধ্যবিত্ত</span>
            <br>

            <input type="checkbox" name="family_class[]" value="মধ্যম শ্রেণী" class="SelectBox val" />
            <span class="search-options">মধ্যবিত্ত</span>
            <br>

            <input type="checkbox" name="family_class[]" value="নিম্নমধ্যম শ্রেণী" class="SelectBox val" />
            <span class="search-options">নিম্নমধ্যবিত্ত</span>
            <br> 

            <input type="checkbox" name="family_class[]" value="নিম্ন শ্রেণী" class="SelectBox val" />
            <span class="search-options">নিম্নবিত্ত</span>

          </div>
        </div>
      </div>
      <!--Biodata Family Condition Option END-->



      <!--Biodata Occupation Option START-->
      <div class="wrapper">
        <label class="form-control toggle-next ellipsis">পেশা<span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
        <div class="checkboxes" id="Lorems">
          <div class="inner-wrap">

            <!-- All Occupations -->
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
            <input type="checkbox" name="student_occupation_level[]" value="কওমি মাদ্রাসার শিক্ষার্থী" class="SelectBox val student-option" onchange="handleStudentOptions(this)" />
            <span class="search-options">শিক্ষার্থী-কওমি মাদ্রাসা</span>
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
            <input type="checkbox" name="occupation_sector[]" value="সার্ভিস/ব্যাংকার/ফ্রিল্যান্সার/উদ্যোক্তা" class="SelectBox val" />
            <span class="search-options">সার্ভিস/ব্যাংকার/ফ্রিল্যান্সার/উদ্যোক্তা</span>
            <br>

            <!-- Working Forign Sector-->                  
            <input type="checkbox" name="occupation_sector[]" value="প্রবাসী/বিদেশে" class="SelectBox val" />
            <span class="search-options">প্রবাসী/বিদেশে</span>
            <br>

            <!-- Garments Sector-->                  
            <input type="checkbox" name="occupation_sector[]" value="গার্মেন্টস সেক্টর" class="SelectBox val" />
            <span class="search-options">গার্মেন্টস সেক্টর</span>
            <br>

            <!--  Driver Profession -->                  
            <input type="checkbox" name="occupation_sector[]" value="ড্রাইভার/চালক" class="SelectBox val" />
            <span class="search-options">ড্রাইভার/চালক</span>
            <br>

            <!-- Mistri Sector-->                  
            <input type="checkbox" name="occupation_sector[]" value="কারিগর/মিস্ত্রি" class="SelectBox val" />
            <span class="search-options">কারিগর/মিস্ত্রি</span>
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
      <!--Biodata Occupation Option END-->



      <!--Biodata Education Method Option START-->
      <div class="wrapper">
        <label class="form-control toggle-next ellipsis">মাধ্যমিক শিক্ষার মাধ্যম <span style=" color:#06b6d4;">   <i class="fa fa-chevron-down"></i></span></label>
        <div class="checkboxes" id="Lorems">
          <div class="inner-wrap">

            <input type="checkbox" name="scndry_edu_method[]" value="Any Education Method" class="SelectBox all" onchange="handleAllEducationMethods(this)" checked />
            <span class="search-options">সকল মাধ্যম</span>
            <br>

            <input type="checkbox" name="scndry_edu_method[]" value="কওমি মাদ্রাসা" class="SelectBox val" />
            <span class="search-options">কওমি মাদ্রাসা</span>
            <br>

            <input type="checkbox" name="scndry_edu_method[]" value="জেনারেল" class="SelectBox val" />
            <span class="search-options">জেনারেল</span>
            <br>

            <input type="checkbox" name="scndry_edu_method[]" value="আলিয়া মাদ্রাসা" class="SelectBox val" />
            <span class="search-options">আলিয়া মাদ্রাসা</span>
            <br>

            <input type="checkbox" name="scndry_edu_method[]" value="ভোকেশনাল" class="SelectBox val" />
            <span class="search-options">ভোকেশনাল</span>
            <br>

            <input type="checkbox" name="scndry_edu_method[]" value="মাধ্যমিক পড়িনাই" class="SelectBox val" />
            <span class="search-options">পড়ালেখা করিনি</span>
            <br> 

            <input type="checkbox" name="scndry_edu_method[]" value="অন্যান্য" class="SelectBox val" />
            <span class="search-options">অন্যান্য</span>
      
          </div>
        </div>
      </div>
      <!--Biodata Education Method Option END-->

      <div class="form_but1">
        <input type="submit" name="search" value="বায়োডাটা খুঁজুন" onclick="return validateForm();"/>
      </div>
    </form>
  </div>


  <script>
  function handleAllReligions(checkbox) {
    const otherReligionCheckboxes = document.querySelectorAll('.SelectBox.val');

    if (checkbox.checked) {
    // If "সকল ধর্ম" checkbox is checked, show other religion options
    otherReligionCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'inline';
    });
    } else {
    // If "সকল ধর্ম" checkbox is unchecked, hide other religion options
    otherReligionCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'none';
    });
    }
  }


  function handleAllMaritalStatus(checkbox) {
    const otherMaritalStatusCheckboxes = document.querySelectorAll('.SelectBox.val');

    if (checkbox.checked) {
    // If "সকল" checkbox is checked, show other marital status options
    otherMaritalStatusCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'inline';
    });
    } else {
    // If "সকল" checkbox is unchecked, hide other marital status options
    otherMaritalStatusCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'none';
    });
    }
  }


  function handleAllSkinTones(checkbox) {
    const otherSkinToneCheckboxes = document.querySelectorAll('.SelectBox.val');

    if (checkbox.checked) {
    // If "সকল বর্ণ" checkbox is checked, show other skin tone options
    otherSkinToneCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'inline';
    });
    } else {
    // If "সকল বর্ণ" checkbox is unchecked, hide other skin tone options
    otherSkinToneCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'none';
    });
    }
  }


  function handleAllCountries(checkbox) {
    const otherCountryCheckboxes = document.querySelectorAll('.SelectBox.country');

    if (checkbox.checked) {
    // If "সকল দেশ" checkbox is checked, show other country options
    otherCountryCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'inline';
    });
    } else {
    // If "সকল দেশ" checkbox is unchecked, hide other country options
    otherCountryCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'none';
    });
    }
  }


  function handleAllDistricts(checkbox) {
    const otherDistrictCheckboxes = document.querySelectorAll('.SelectBox.district');

    if (checkbox.checked) {
    // If "সকল জেলা" checkbox is checked, show other district options
    otherDistrictCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'inline';
    });
    } else {
    // If "সকল জেলা" checkbox is unchecked, hide other district options
    otherDistrictCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'none';
    });
    }
  }


  function handleAllFamilyClasses(checkbox) {
    const otherFamilyClassCheckboxes = document.querySelectorAll('.SelectBox.family');

    if (checkbox.checked) {
    // If "সকল শ্রেণী" checkbox is checked, show other family class options
    otherFamilyClassCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'inline';
    });
    } else {
    // If "সকল শ্রেণী" checkbox is unchecked, hide other family class options
    otherFamilyClassCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'none';
    });
    }
  }


  //Occupations Start
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
  //Occupations End


  function handleAllEducationMethods(checkbox) {
    const otherEducationMethodCheckboxes = document.querySelectorAll('.SelectBox.method');

    if (checkbox.checked) {
    // If "সকল মাধ্যম" checkbox is checked, show other education method options
    otherEducationMethodCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'inline';
    });
    } else {
    // If "সকল মাধ্যম" checkbox is unchecked, hide other education method options
    otherEducationMethodCheckboxes.forEach(checkbox => {
    checkbox.style.display = 'none';
    });
    }
  }
  </script>



  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                 S  T  A  R  T                 --
  --   SHOSURBARI PROFILE DETAILS AFTER SEARCH     --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	
  <div class="sb_biodata_profile">
    <?php
      $c_count = 0; // initialize counter to 0

      if (isset($_POST['search'])) {
        while ($row = mysqli_fetch_assoc($result)) {
          $profid = $row['user_id'];

          // Check if the user's account is active
          $active_query = "SELECT active FROM users WHERE id = $profid";
          $active_result = mysqlexec($active_query);
          $active_row = mysqli_fetch_assoc($active_result);

          // Check if the user's account is active
          if ($active_row['active'] == 1) {
            $Skin_tones = $row['Skin_tones'];
            $height = $row['height'];
            $dateofbirth = $row['dateofbirth'];

            // 3bd_educational_qualifications
            $sql4="SELECT * FROM 3bd_secondaryedu_method WHERE user_id=$profid";		
            $result4=mysqlexec($sql4);
            if($result4)
            while($row4=mysqli_fetch_assoc($result4))
            $scndry_edu_method=$row4['scndry_edu_method'];


            // 3bd_educational_qualifications
            $sql8="SELECT * FROM 5bd_family_information WHERE user_id=$profid";		
            $result8=mysqlexec($sql8);
            if($result8)
            while($row8=mysqli_fetch_assoc($result8))
            $family_class=$row8['family_class'];


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

              if ($occupation_count > 0) 
              $occupation_label = array_keys($occupation_levels)[0];
              $occupation_value = $occupation_levels[$occupation_label];

              // Picture
              $sql2 = "SELECT * FROM photos WHERE user_id = $profid";
              $result2 = mysqlexec($sql2);
              if ($result2) {
                $row2 = mysqli_fetch_array($result2);
                $pic1 = $row2['pic1'];
              }

              $defaultImages = [
                'পাত্রের বায়োডাটা' => "shosurbari-male-icon.jpg",
                'পাত্রীর বায়োডাটা' => "shosurbari-female-icon.png",
              ];

              $defaultImage = "shosurbari-default-icon.png";

              if (isset($row['biodatagender']) && isset($defaultImages[$row['biodatagender']])) {
                $defaultImage = $defaultImages[$row['biodatagender']];
              }

              echo "<div class=\"biodatalist\">";
              echo "<div class=\"sb_bio_header\">";
              // Start of photo Show
              echo "<a href=\"view_profile.php?id={$profid}\" target=\"_blank\">";
              if (!empty($pic1)) {
                echo "<img class=\"img-responsive\" src=\"profile/{$profid}/{$pic1}\"/>";
              } else {
                echo "<img class=\"img-responsive\" src=\"images/{$defaultImage}\"/>";
              }
              echo "</a>";
              // End of photo Show

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

    <!--Next & Previous Button For More Profile Show -->
    <div class="pagination">
      <span id="profiles-show-info" ></span>  </br>
      <a href="#" id="prev-page-btn" style="display:none">&laquo;</a>
      <span id="page-numbers"></span>
      <a href="#" id="next-page-btn" style="display:none">&raquo;</a>
      <!-- <a href="#" id="next-page-btn">Next &raquo;</a> -->
      </br><span id="profiles-info"></span>
    </div>


    <script>
    // After Search Number of ShosurBari Users Profiles Show Per Page.
    const profilesPerPage = 5;
    // Total number of profiles found
    const totalProfiles = <?php echo $c_count ?>;
    // Calculate the total number of pages
    const totalPages = Math.ceil(totalProfiles / profilesPerPage);
    // Initialize the current page to the first page
    let currentPage = 1;
    // Define how many pages to show before and after the current page
    const pagesToShowBeforeAndAfter = 2;


    // Function to generate page numbers with "dot dot" nodes
    function generatePageNumbers() {
      // Clear the page numbers
      const pageNumbersContainer = document.getElementById("page-numbers");
      pageNumbersContainer.innerHTML = "";

      // Define how many pages to show before and after the current page
      const pagesToShowBeforeAndAfter = 1; // You can adjust this number as needed

      // Loop through all pages and generate page numbers
      for (let i = 1; i <= totalPages; i++) {
        if (i === 1 || i === totalPages || (i >= currentPage - pagesToShowBeforeAndAfter && i <= currentPage + pagesToShowBeforeAndAfter)) {
          // Create a page number element
          const pageNumberElem = document.createElement("a");
          pageNumberElem.href = "#";
          pageNumberElem.innerText = convertToBanglaNumber(i); // Use the Bangla page number

          // Add the same class as the page number nodes
          pageNumberElem.classList.add("page-link");

          // Add an active class to the current page
          if (i === currentPage) {
            pageNumberElem.classList.add("active");
          }

          // Add a click event listener to switch pages
          pageNumberElem.addEventListener("click", () => {
            currentPage = i;
            showProfiles();
          });

          // Append the page number element to the page numbers container
          pageNumbersContainer.appendChild(pageNumberElem);
        } else if (i === currentPage - pagesToShowBeforeAndAfter - 1 || i === currentPage + pagesToShowBeforeAndAfter + 1) {
          // Create a "dot dot" node
          const dotDotNode = document.createElement("span");
          dotDotNode.innerText = "...";

          // Add the same class as the page number nodes
          dotDotNode.classList.add("page-link");

          // Append the "dot dot" node to the page numbers container
          pageNumbersContainer.appendChild(dotDotNode);
        }
      }
    }



    function convertToBanglaNumber(number) {
      const banglaNumbers = {
      0: '০',
      1: '১',
      2: '২',
      3: '৩',
      4: '৪',
      5: '৫',
      6: '৬',
      7: '৭',
      8: '৮',
      9: '৯',
      };
      return number.toString().replace(/[0-9]/g, (digit) => banglaNumbers[digit]);
    }



    function showProfiles() {
      // Hide all sections initially
      document.getElementById("profiles-info").innerHTML = "";
      document.getElementById("profiles-show-info").innerHTML = "";
      document.getElementById("prev-page-btn").style.display = "none"; // Hide the "Prev" button initially

      // Calculate the starting index and ending index of the profiles to show
      const startIndex = (currentPage - 1) * profilesPerPage;
      const endIndex = Math.min(startIndex + profilesPerPage, totalProfiles);

      // Check if there are profiles to show
      if (totalProfiles > 0) {
        // Display the "Next" button
        document.getElementById("next-page-btn").style.display = "inline-block";
        
        // Loop through the profiles and show only the profiles for the current page
        for (let i = 0; i < totalProfiles; i++) {
          const profileElem = document.getElementsByClassName("biodatalist")[i];
          if (i >= startIndex && i < endIndex) {
            profileElem.style.display = "block";
          } else {
            profileElem.style.display = "none";
          }
        }
      
        // Update the page numbers
        generatePageNumbers();
      
        // Hide previous button if the current page is the first page
        if (currentPage === 1) {
          document.getElementById("prev-page-btn").style.display = "none";
        } else {
          document.getElementById("prev-page-btn").style.display = "inline-block";
        }
      
        // Hide next button if the current page is the last page
        if (currentPage === totalPages) {
          document.getElementById("next-page-btn").style.display = "none";
        } else {
          document.getElementById("next-page-btn").style.display = "inline-block";
        }
      
        // Update the text in the profiles-info span
        const profilesLeft = totalProfiles - endIndex;
        document.getElementById("profiles-info").innerHTML = `“বাকি রয়েছে <span style="color: #0aa4ca;">${convertToBanglaNumber(profilesLeft)}</span> টি বায়োডাটা”`;
      
        let profilesshow;
        if (totalProfiles > 0) {
          const startIndexBangla = convertToBanglaNumber(startIndex + 1);
          const endIndexBangla = convertToBanglaNumber(Math.min(endIndex, totalProfiles));
          profilesshow = `“এখন দেখছেন <span class="highlight-start">${startIndexBangla}</span> থেকে <span class="highlight-end">${endIndexBangla}</span> পর্যন্ত বায়োডাটা গুলো”`;
        }
      
        document.getElementById("profiles-show-info").innerHTML = profilesshow;
      } else {
        // No profiles to show, hide the "Next" button
        document.getElementById("next-page-btn").style.display = "none";
      }
    }

    // Show the profiles for the first page
    showProfiles();


    // add click event listeners to the previous page and next page buttons
    document.getElementById("prev-page-btn").addEventListener("click", () => {
      if (currentPage > 1) {
        currentPage--;
        showProfiles();
      }
    });

    document.getElementById("next-page-btn").addEventListener("click", () => {
      if (currentPage < totalPages) {
      currentPage++;
      showProfiles();
      }
    });
    </script>
  </div>
  </div> <!--extra dive / Here maybe error for footer-->


  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                 S  T  A  R  T                 --
  --    MULTIPLE SELECT OPTION SHOW & CHECK BOX    --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	

  <script>
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

  // Initialize the chevron icons in the "down" position
  $('.fa-chevron-down').removeClass('rotate');

  });


  function toggleChevronIcon(checkboxes) {
  var chevronIcon = checkboxes.closest('.wrapper').find('.fa-chevron-down');
  chevronIcon.toggleClass('rotate');
  }


  function setCheckboxSelectLabels(elem) {
  var wrappers = $('.wrapper');
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
  var apply = $(checkbox).closest('.wrapper').find('.apply-selection');
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
  </script>
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                     E   N   D                 --
  --    MULTIPLE SELECT OPTION SHOW & CHECK BOX    --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	


  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                 S  T  A  R  T                 --
  --        MULTIPLE SEARCH FILTER FOR MOBILE      --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	
  <script>
  var searchButton = document.getElementById('search-button');
  var closeButton = document.getElementById('close-button');
  var filters = document.getElementById('filters');
  searchButton.addEventListener('click', function(){
    if(filters.style.display == 'block') {
      filters.style.display = 'none';
      closeButton.style.display = 'none';
    }

    else {
      filters.style.display = 'block';
      closeButton.style.display = 'block';
    }
  });

  closeButton.addEventListener('click', function(){
    filters.style.display = 'none';
    closeButton.style.display = 'none';
  });
  </script>
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                     E   N   D                 --
  --        MULTIPLE SEARCH FILTER FOR MOBILE      --
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	




  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                 S  T  A  R  T                 --
  --WHEN SEARCH BIODATA, IF IMPTY GENDER SHOW ERROR--
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->	
  <script>
  //if gender no select then show error
  function validateForm() {
    var biodataGender = document.querySelector('input[name="biodatagender"]:checked');
    if (!biodataGender) {
      var errorDiv;
      if (window.innerWidth <= 768) {
        errorDiv = document.getElementById('gender-error-mob');
      }
      
      else {
      errorDiv = document.getElementById('gender-error-laptop');
      }
      errorDiv.style.display = 'block';
      errorDiv.classList.add('fade-in');

      // Change color multiple times
      var colors = ['green', 'blue', 'red'];
      var colorIndex = 0;
      setInterval(function() {
        errorDiv.style.color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
      }, 500);

      // Scroll the error message to the center of the window
      var windowHeight = window.innerHeight;
      var errorDivHeight = errorDiv.offsetHeight;

      // Calculate the scroll position to center the error message vertically
      var scrollPosition = errorDiv.offsetTop - (windowHeight - errorDivHeight) / 2;

      // Ensure the scroll position doesn't go to the top of the display
      scrollPosition = Math.max(scrollPosition, 235);

      // Scroll to the calculated position
      window.scrollTo({ top: scrollPosition, behavior: 'smooth' });


      return false;
    }
    return true;
  }
  </script>
  <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
  -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
  --                     E   N   D                 --
  --WHEN SEARCH BIODATA, IF IMPTY GENDER SHOW ERROR--
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
  var pages = ["search"];

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

  <!-- FlexSlider -->
  <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="js/jquery.flexslider.js"></script>
  <script type="text/javascript">
  $(function(){
    SyntaxHighlighter.all();
  });
  $(window).load(function(){
    $('.flexslider').flexslider({
    animation: "slide",
    start: function(slider){
      $('body').removeClass('loading');
    }
    });
  });
  </script>
  <!-- FlexSlider -->
</body>
</html>	