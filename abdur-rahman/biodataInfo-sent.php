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
  <link rel="icon" href="../images/shosurbari-icon-admin.png" type="image/png">
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
  .sb-biodata-info-sent h3 {
    font-size: 18px;
    margin-top: 10px;
  }
  .sb-biodata-field h2{
    font-size: 25px;
    margin-top: 15px;
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
          <div class="sb-biodata-info-sent">
            <h2>কাস্টমার তথ্য</h2>
            <div class="shosurbari-biodata-field">
              <label for="edit-name">রিকোয়েস্ট আইডি<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (SBBR: ShosurBari Biodata Request)</span> </label>
              <input type="text" name="payment_order_id" value="SBBR" class="form-text" required>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="edit-name">রেজিস্টার ইউজার/বায়োডাটা নং<span class="form-required" title="This field is required.">***</span> <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (কাস্টমার পেজের "রেজিস্টার ইউজার/বায়োডাটা নং" কলামে যেই নাম্বার থাকবে সেই নাম্বার লিখতে হবে। যদি "0" থাকে তাহলে বুঝে নিতে হবে এই কাস্টমার রেজিস্টার ইউজার না। সেক্ষেত্রেও এই অপশনে "0" লিখতে হবে। যাদের "0" থাকবে না তখন বুঝে নিতে হবে আমাদের ওয়েবসাইট এই কাস্টোমারের একটি একাউন্ট আছে এবং সেই নাম্বারটি হচ্ছে বায়োডাটা নাম্বার। সেক্ষেত্রে এই অপশনে "বায়োডাটা নাম্বারটি" লিখতে হবে, তাহলে সেই ইউজার তার একাউন্ট থেকেও এই তথ্য গুলো দেখতে পাবে।)</span></label>
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
              <label for="edit-name">কাস্টমার ই-মেইল<span class="form-required" title="This field is required.">***</span> <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (এখানে কাস্টমারের যেই ই-মেইলটি লিখা হবে, সেই ই-মেইলে এই তথ্য গুলো অটোমেটিক চলে যাবে।)</span></label>
              <input type="email" name="payment_cust_email" value="" placeholder="কাস্টমার ই-মেইল" class="form-text" required>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="edit-name">পেমেন্ট তারিখ<span class="form-required" title="This field is required.">*</span></label>
              <input type="text" name="cust_payment_date" value="" placeholder="পেমেন্ট তারিখ/রিকোয়েস্ট তারিখ" class="form-text" required>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="edit-name">পেমেন্ট মেথড<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (পেমেন্ট মেথড অবশ্যয় বাংলায় হইতে হবে, কাস্টমারস পেজ থেকে কপি করে বসাতে হবে।)</span></label>
              <input type="text" name="real_payment_method" value="" placeholder="পেমেন্ট মেথড" class="form-text" required>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="edit-name">মোট টাকা<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (মোট টাকা ইংরেজি নাম্বার হইতে হবে, কাস্টমারস পেজ থেকে কপি করে বসাতে হবে।)</span></label>
              <input type="text" name="payment_amount" value="" placeholder="মোট টাকা" class="form-text" required>
            </div>
            <div class="shosurbari-biodata-field">
              <label for="edit-name">মোট বায়োডাটা<span class="form-required" title="This field is required.">*</span></label>
              <input type="text" name="payment_biodata_quantity" value="১টি-২টি-৩টি-৪টি-৫টি-৬টি-৭টি-৮টি-৯টি-১০টি" class="form-text" required>
            </div>
          </div>
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ১</h2>
            <h3>BRONZE - ১৪৫ ৳</h3>
            <div class="shosurbari-biodata-field">
              <label>রিকোয়েস্ট বায়োডাটা/পছন্দের বায়োডাটা<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: 987)</span></label>
              <input type="text" name="biodata_number_1" value=""  placeholder="পছন্দের বায়োডাটা নং" class="form-text" required>
            </div>
            <div class="shosurbari-biodata-field">
              <label>বায়োডাটার অভিভাবক<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: বাবা, আব্দুর রহিম, 01737-226404)</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_1" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:" class="form-text" required></textarea>
            </div>
            <div class="shosurbari-biodata-field">
              <label>পাত্র-পাত্রীর<span class="form-required" title="This field is required.">*</span> <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: খালিদ/সুমাইয়া, grrom-bride@gmail.com)</span></label>
              <input type="text" name="biodata_patropatri_1" value="" placeholder="নাম:,  ই-মেইল:" class="form-text" required>
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ১ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ২</h2>
            <h3>SILVER - ২৮০ ৳</h3>
            <div class="shosurbari-biodata-field">
              <label>রিকোয়েস্ট বায়োডাটা/পছন্দের বায়োডাটা <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: 987)</span></label>
              <input type="text" name="biodata_number_2" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label>বায়োডাটার অভিভাবক <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: বাবা, আব্দুর রহিম, 01737-226404)</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_2" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
                <label>পাত্র-পাত্রীর <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: খালিদ/সুমাইয়া, grrom-bride@gmail.com)</span></label>
              <input type="text" name="biodata_patropatri_2" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ২ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৩</h2>
            <h3>GOLD - ৩৯০ ৳</h3>
            <div class="shosurbari-biodata-field">
              <label>রিকোয়েস্ট বায়োডাটা/পছন্দের বায়োডাটা <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: 987)</span></label>
              <input type="text" name="biodata_number_3" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label>বায়োডাটার অভিভাবক <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: বাবা, আব্দুর রহিম, 01737-226404)</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_3" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
                <label>পাত্র-পাত্রীর <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: খালিদ/সুমাইয়া, grrom-bride@gmail.com)</span></label>
              <input type="text" name="biodata_patropatri_3" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৩ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৪</h2>
            <h3>PLATINUM - ৫০০ ৳</h3>
            <div class="shosurbari-biodata-field">
              <label>রিকোয়েস্ট বায়োডাটা/পছন্দের বায়োডাটা <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: 987)</span></label>
              <input type="text" name="biodata_number_4" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label>বায়োডাটার অভিভাবক <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: বাবা, আব্দুর রহিম, 01737-226404)</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_4" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
                <label>পাত্র-পাত্রীর <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: খালিদ/সুমাইয়া, grrom-bride@gmail.com)</span></label>
              <input type="text" name="biodata_patropatri_4" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৪ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৫</h2>
            <h3>DIAMOND - ৬০০ ৳</h3>
            <div class="shosurbari-biodata-field">
              <label>রিকোয়েস্ট বায়োডাটা/পছন্দের বায়োডাটা <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: 987)</span></label>
              <input type="text" name="biodata_number_5" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label>বায়োডাটার অভিভাবক <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: বাবা, আব্দুর রহিম, 01737-226404)</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_5" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
                <label>পাত্র-পাত্রীর <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: খালিদ/সুমাইয়া, grrom-bride@gmail.com)</span></label>
              <input type="text" name="biodata_patropatri_5" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৫ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৬</h2>
            <h3>TITANIUM - ৬৯০ ৳</h3>
            <div class="shosurbari-biodata-field">
              <label>রিকোয়েস্ট বায়োডাটা/পছন্দের বায়োডাটা <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: 987)</span></label>
              <input type="text" name="biodata_number_6" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label>বায়োডাটার অভিভাবক <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: বাবা, আব্দুর রহিম, 01737-226404)</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_6" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
                <label>পাত্র-পাত্রীর <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: খালিদ/সুমাইয়া, grrom-bride@gmail.com)</span></label>
              <input type="text" name="biodata_patropatri_6" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৬ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৭</h2>
            <h3>RUBY - ৭৭০ ৳</h3>
            <div class="shosurbari-biodata-field">
              <label>রিকোয়েস্ট বায়োডাটা/পছন্দের বায়োডাটা <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: 987)</span></label>
              <input type="text" name="biodata_number_7" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label>বায়োডাটার অভিভাবক <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: বাবা, আব্দুর রহিম, 01737-226404)</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_7" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
                <label>পাত্র-পাত্রীর <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: খালিদ/সুমাইয়া, grrom-bride@gmail.com)</span></label>
              <input type="text" name="biodata_patropatri_7" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৭ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৮</h2>
            <h3>EMERALD - ৮৪০ ৳</h3>
            <div class="shosurbari-biodata-field">
              <label>রিকোয়েস্ট বায়োডাটা/পছন্দের বায়োডাটা <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: 987)</span></label>
              <input type="text" name="biodata_number_8" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label>বায়োডাটার অভিভাবক <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: বাবা, আব্দুর রহিম, 01737-226404)</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_8" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
                <label>পাত্র-পাত্রীর <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: খালিদ/সুমাইয়া, grrom-bride@gmail.com)</span></label>
              <input type="text" name="biodata_patropatri_8" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৮ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ৯</h2>
            <h3>SAPPHIRE - ৯০০ ৳</h3>
            <div class="shosurbari-biodata-field">
              <label>রিকোয়েস্ট বায়োডাটা/পছন্দের বায়োডাটা <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: 987)</span></label>
              <input type="text" name="biodata_number_9" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label>বায়োডাটার অভিভাবক <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: বাবা, আব্দুর রহিম, 01737-226404)</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_9" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
                <label>পাত্র-পাত্রীর <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: খালিদ/সুমাইয়া, grrom-bride@gmail.com)</span></label>
              <input type="text" name="biodata_patropatri_9" value="" placeholder="নাম:,  ই-মেইল:" class="form-text">
            </div>
          </div>
          <!-- পছন্দের বায়োডাটার তথ্য ৯ End-->
          <div class="sb-biodata-info-sent">
            <h2>পছন্দের বায়োডাটার তথ্য ১০</h2>
            <h3>TOPAZ - ৯৮০ ৳</h3>
            <div class="shosurbari-biodata-field">
              <label>রিকোয়েস্ট বায়োডাটা/পছন্দের বায়োডাটা <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: 987)</span></label>
              <input type="text" name="biodata_number_10" value="" placeholder="পছন্দের বায়োডাটা নং" class="form-text">
            </div>
            <div class="shosurbari-biodata-field">
              <label>বায়োডাটার অভিভাবক <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: বাবা, আব্দুর রহিম, 01737-226404)</span></label>
              <textarea rows="4" type="text" name="biodata_guardian_10" value="" placeholder="অভিভাবক:, নাম:, মোবাইল-নাম্বার:"  class="form-text"></textarea>
            </div>
            <div class="shosurbari-biodata-field">
                <label>পাত্র-পাত্রীর <span style="color: gray; font-size:12px;" class="form-required" title="This field is required."> (যেমন: খালিদ/সুমাইয়া, grrom-bride@gmail.com)</span></label>
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