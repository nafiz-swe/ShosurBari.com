<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
error_reporting(0);
customer_sent_info_complete(); 
if (!isset($_SESSION['admin_id'])) {
  header("location: ../abdur-rahman/admin_login.php");
  exit;
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
  <title>BiodataInfo Sent-Admin | ShosurBari</title>
</head>
<body>
  <!-- ====== Admin Panel Navigation Bar ====== -->
  <?php include("admin_navigation.php"); ?>
  <!-- ========================================= -->
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
  }
  html, body { 
    padding-top: 0px; /*Monitor Navigation Bar top*/
  }
  fieldset {
    margin-bottom: 100px;
  }
  /* PoPup Message Show Start*/
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
    background: #22c55e;
    color: white;
    font-size: 16px;
  }
  .error {
    background: #f44336;
    color: white;
    font-size: 16px;
  }
  </style>
  <div class="shosurbari-biodata">
    <form action="" method="POST" id="biodataForm">
      <fieldset>
        <div class="sb-biodata" id="religionDetails">
          <div class="sb-biodata-field">
            <h2>কাস্টমারকে বায়োডাটার তথ্য প্রদান</h2>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">রিকোয়েস্ট আইডি<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" name="payment_order_id" value="SB" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">ইউজার আইডি<span class="form-required" title="This field is required.">*</span></label>
            <input type="number" name="user_id" value="" placeholder="রেজিস্টার ইউজার/বায়োডাটা নং" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">কাস্টমার নাম<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" name="payment_cust_name" value="" placeholder="কাস্টমার নাম" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">কাস্টমার মোবাইল নাম্বার<span class="form-required" title="This field is required.">*</span></label>
            <input type="number" name="payment_cust_number" value="" placeholder="কাস্টমার মোবাইল নাম্বার" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">কাস্টমার ই-মেইল<span class="form-required" title="This field is required.">*</span></label>
            <input type="email" name="payment_cust_email" value="" placeholder="কাস্টমার ই-মেইল" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">পেমেন্ট তারিখ<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" name="cust_payment_date" value="" placeholder="পেমেন্ট তারিখ/রিকোয়েস্ট তারিখ" class="form-text" required>
          </div>
          <div class="shosurbari-biodata-field">
            <label for="edit-name">মোট বায়োডাটা<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" name="payment_biodata_quantity" value="১,২,৩,৪,৫,৬,৭,৮,৯,১০ টি" class="form-text" required>
          </div>
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ১</h2>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটা নং<span class="form-required" title="This field is required.">*</span></label>
              <input type="text" name="biodata_number_1" value=""  placeholder="পছন্দের বায়োডাটা নং" class="form-text" required>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটার অভিভাবক<span class="form-required" title="This field is required.">*</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_1" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:" class="form-text" required></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">পাত্র-পাত্রীর<span class="form-required" title="This field is required.">*</span></label>
              <input type="text" name="biodata_patropatri_1" value="" placeholder="নাম:,  ই-মেইল:" class="form-text" required>
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ১ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ২</h2>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটা নং</label>
              <input type="text" name="biodata_number_2" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটার অভিভাবক</label>
              <textarea rows="4" type="text" name="biodata_guardian_2" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">পাত্র-পাত্রীর</label>
              <input type="text" name="biodata_patropatri_2" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ২ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৩</h2>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটা নং</label>
              <input type="text" name="biodata_number_3" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটার অভিভাবক</label>
              <textarea rows="4" type="text" name="biodata_guardian_3" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">পাত্র-পাত্রীর</label>
              <input type="text" name="biodata_patropatri_3" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৩ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৪</h2>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটা নং</label>
              <input type="text" name="biodata_number_4" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটার অভিভাবক</label>
              <textarea rows="4" type="text" name="biodata_guardian_4" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">পাত্র-পাত্রীর</label>
              <input type="text" name="biodata_patropatri_4" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৪ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৫</h2>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটা নং</label>
              <input type="text" name="biodata_number_5" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটার অভিভাবক</label>
              <textarea rows="4" type="text" name="biodata_guardian_5" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">পাত্র-পাত্রীর</label>
              <input type="text" name="biodata_patropatri_5" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৫ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৬</h2>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটা নং</label>
              <input type="text" name="biodata_number_6" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটার অভিভাবক</label>
              <textarea rows="4" type="text" name="biodata_guardian_6" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">পাত্র-পাত্রীর</label>
              <input type="text" name="biodata_patropatri_6" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৬ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৭</h2>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটা নং</label>
              <input type="text" name="biodata_number_7" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটার অভিভাবক</label>
              <textarea rows="4" type="text" name="biodata_guardian_7" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">পাত্র-পাত্রীর</label>
              <input type="text" name="biodata_patropatri_7" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৭ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৮</h2>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটা নং</label>
              <input type="text" name="biodata_number_8" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটার অভিভাবক</label>
              <textarea rows="4" type="text" name="biodata_guardian_8" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">পাত্র-পাত্রীর</label>
              <input type="text" name="biodata_patropatri_8" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৮ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৯</h2>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটা নং</label>
              <input type="text" name="biodata_number_9" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটার অভিভাবক</label>
              <textarea rows="4" type="text" name="biodata_guardian_9" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">পাত্র-পাত্রীর</label>
              <input type="text" name="biodata_patropatri_9" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৯ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ১০</h2>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটা নং</label>
              <input type="text" name="biodata_number_10" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">বায়োডাটার অভিভাবক</label>
              <textarea rows="4" type="text" name="biodata_guardian_10" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="about me">পাত্র-পাত্রীর</label>
              <input type="text" name="biodata_patropatri_10" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ১০ End-->
        </div>
        <input type="submit" name="update" value="কনফার্ম   ই-মেইল">
      </fieldset>
    </form>
  </div>
  <!-- PopUp Message Show Start -->
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
  <!-- PopUp Message Show End -->
  <!-- ===== Admin Panel Footer Area ===== -->
  <?php include("admin_footer.php"); ?>
  <!-- =================================== -->
</body>
</html>