<?php
// Include necessary files and initialize the session
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
?>
<?php customer_sent_info_complete(); 
error_reporting(0);
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - Update Religion | ShosurBari</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
<!-- fa fa icon / logout icon
    ============================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


<!-- ====== Admin Panel Navigation Bar ====== -->
<?php include("admin_navigation.php"); ?>
<!-- ========================================= -->




<div class="shosurbari-biodata">
  <form action="" method="POST" id="biodataForm">
    <!--7 fieldsets start-->
    <fieldset>
      <div class="sb-biodata" id="religionDetails">
        <div class="sb-biodata-field">
          <h2>কাস্টমারকে বায়োডাটার তথ্য প্রদান</h2>
        </div>

        <div class="shosurbari-biodata-field">
          <label for="edit-name">পেমেন্ট অর্ডার আইডি<span class="form-required" title="This field is required.">*</span></label>
          <input type="text" name="payment_order_id" value="" class="form-text" required>
        </div>

        <div class="shosurbari-biodata-field">
          <label for="edit-name">কাস্টমার নাম<span class="form-required" title="This field is required.">*</span></label>
          <input type="text" name="payment_cust_name" value="" class="form-text" required>
        </div>

        <div class="shosurbari-biodata-field">
          <label for="edit-name">কাস্টমার ই-মেইল<span class="form-required" title="This field is required.">*</span></label>
          <input type="email" name="payment_cust_email" value="" class="form-text" required>
        </div>

        <div class="shosurbari-biodata-field">
          <label for="edit-name">কাস্টমার মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span></label>
          <input type="number" name="payment_cust_number" value="" class="form-text" required>
        </div>

        <div class="shosurbari-biodata-field">
          <label for="edit-name">পেমেন্ট তারিখ<span class="form-required" title="This field is required.">*</span></label>
          <input type="text" name="cust_payment_date" value="" class="form-text" required>
        </div>

        <div class="shosurbari-biodata-field">
          <label for="edit-name">মোট বায়োডাটা<span class="form-required" title="This field is required.">*</span></label>
          <input type="text" name="payment_biodata_quantity" value="১,২,৩,৪,৫,৬,৭,৮,৯,১০ টি" class="form-text" required>
        </div>


        <div class="sb-biodata-info-sent">
          <h2>বায়োডাটা নাম্বার ১</h2>
        
          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটা নাম্বার<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" name="biodata_number_1" value="" class="form-text" required>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটার অভিভাবক<span class="form-required" title="This field is required.">*</span></label>
            <textarea rows="4" type="text" name="biodata_guardian_1" value="অভিভাবক: ,   নাম: ,   মোবাইল-নাম্বার: " class="form-text" required></textarea>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">পাত্র-পাত্রীর<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" name="biodata_patropatri_1" value="নাম:  ই-মেইল:" class="form-text" required>
          </div>
        </div>

        <div class="sb-biodata-info-sent">
          <h2>বায়োডাটা নাম্বার ২</h2>
        
          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটা নাম্বার</label>
            <input type="text" name="biodata_number_2" value="" class="form-text">
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটার অভিভাবক</label>
            <textarea rows="4" type="text" name="biodata_guardian_2" value="" class="form-text"></textarea>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">পাত্র-পাত্রীর</label>
            <input type="text" name="biodata_patropatri_2" value="" class="form-text">
          </div>
        </div>

        <div class="sb-biodata-info-sent">
          <h2>বায়োডাটা নাম্বার ৩</h2>
        
          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটা নাম্বার</label>
            <input type="text" name="biodata_number_3" value="" class="form-text">
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটার অভিভাবক</label>
            <textarea rows="4" type="text" name="biodata_guardian_3" value="" class="form-text"></textarea>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">পাত্র-পাত্রীর</label>
            <input type="text" name="biodata_patropatri_3" value="" class="form-text">
          </div>
        </div>

        <div class="sb-biodata-info-sent">
          <h2>বায়োডাটা নাম্বার ৪</h2>
        
          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটা নাম্বার</label>
            <input type="text" name="biodata_number_4" value="" class="form-text">
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটার অভিভাবক</label>
            <textarea rows="4" type="text" name="biodata_guardian_4" value="" class="form-text"></textarea>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">পাত্র-পাত্রীর</label>
            <input type="text" name="biodata_patropatri_4" value="" class="form-text">
          </div>
        </div>

        <div class="sb-biodata-info-sent">
          <h2>বায়োডাটা নাম্বার ৫</h2>
        
          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটা নাম্বার</label>
            <input type="text" name="biodata_number_5" value="" class="form-text">
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটার অভিভাবক</label>
            <textarea rows="4" type="text" name="biodata_guardian_5" value="" class="form-text"></textarea>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">পাত্র-পাত্রীর</label>
            <input type="text" name="biodata_patropatri_5" value="" class="form-text">
          </div>
        </div>

        <div class="sb-biodata-info-sent">
          <h2>বায়োডাটা নাম্বার ৬</h2>
        
          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটা নাম্বার</label>
            <input type="text" name="biodata_number_6" value="" class="form-text">
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটার অভিভাবক</label>
            <textarea rows="4" type="text" name="biodata_guardian_6" value="" class="form-text"></textarea>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">পাত্র-পাত্রীর</label>
            <input type="text" name="biodata_patropatri_6" value="" class="form-text">
          </div>
        </div>

        <div class="sb-biodata-info-sent">
          <h2>বায়োডাটা নাম্বার ৭</h2>
        
          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটা নাম্বার</label>
            <input type="text" name="biodata_number_7" value="" class="form-text">
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটার অভিভাবক</label>
            <textarea rows="4" type="text" name="biodata_guardian_7" value="" class="form-text"></textarea>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">পাত্র-পাত্রীর</label>
            <input type="text" name="biodata_patropatri_7" value="" class="form-text">
          </div>
        </div>

        <div class="sb-biodata-info-sent">
          <h2>বায়োডাটা নাম্বার ৮</h2>
        
          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটা নাম্বার</label>
            <input type="text" name="biodata_number_8" value="" class="form-text">
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটার অভিভাবক</label>
            <textarea rows="4" type="text" name="biodata_guardian_8" value="" class="form-text"></textarea>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">পাত্র-পাত্রীর</label>
            <input type="text" name="biodata_patropatri_8" value="" class="form-text">
          </div>
        </div>

        <div class="sb-biodata-info-sent">
          <h2>বায়োডাটা নাম্বার ৯</h2>
        
          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটা নাম্বার</label>
            <input type="text" name="biodata_number_9" value="" class="form-text">
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটার অভিভাবক</label>
            <textarea rows="4" type="text" name="biodata_guardian_9" value="" class="form-text"></textarea>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">পাত্র-পাত্রীর</label>
            <input type="text" name="biodata_patropatri_9" value="" class="form-text">
          </div>
        </div>

        <div class="sb-biodata-info-sent">
          <h2>বায়োডাটা নাম্বার ১০</h2>
        
          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটা নাম্বার</label>
            <input type="text" name="biodata_number_10" value="" class="form-text">
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">বায়োডাটার অভিভাবক</label>
            <textarea rows="4" type="text" name="biodata_guardian_10" value="" class="form-text"></textarea>
          </div>

          <div class="shosurbari-biodata-field">
            <label for="about me">পাত্র-পাত্রীর</label>
            <input type="text" name="biodata_patropatri_10" value="" class="form-text">
          </div>
        </div>

      </div>
      <input type="submit" name="update" value="কনফার্ম   ই-মেইল">
    </fieldset>
  </form>
</div>




<style>
  .sb-biodata-info-sent{
    background: #ddf4ff66;
    border: 1px solid #00c292;
    padding: 15px;
    margin: 40px auto;
  }

  .sb-biodata-info-sent h2 {
    font-size: 25px;
    margin-top: 15px;
  }

  .sb-biodata-field h2{
    font-size: 25px;
    margin-top: 15px;
  }


input[type=submit] {
    cursor: pointer;
    height: 35px;
	width: 400px;
    margin-top: 10px;
    background: linear-gradient(#06b6d4, #0ea5e9);
    border: 1px solid #ccc;
	border-radius: 4px;
    color: #fff;
    box-shadow: 1px 1px 4px #888;
    /* margin-left: auto;
    margin-right: auto;
    display: block; */
}

html, body { /* Monitor Navigation Bar top Padding 0px */
    padding-top: 0px;
}

fieldset {
	margin-bottom: 100px;
}


/* PoPup Message Show */
.message-container {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: opacity 0.5s ease-in-out;
  background: #22c55e;
  box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
  border: 1px solid rgba(0,0,0,.05);
  border-radius: 2px;
  padding: 15px;
  z-index: 9999;
}

.success {
  background: #22c55e; /* Green */
  color: white;
  font-size: 16px;
}

.error {
  background: #f44336; /* Red */
  color: white;
  font-size: 16px;
}
</style>



<script>
    function showMessage(type, message) {
        var container = document.createElement('div');
        container.className = 'message-container ' + type;
        container.innerHTML = message;
        document.body.appendChild(container);

        setTimeout(function() {
            container.style.opacity = '1';
        }, 100);

        setTimeout(function() {
            container.style.opacity = '0';
        }, 9000);

        setTimeout(function() {
            container.remove();
        }, 10000);
    }
</script>


<!-- ===== Admin Panel Footer Area ===== -->
<?php include("admin_footer.php"); ?>
<!-- =================================== -->


</body>

</html>