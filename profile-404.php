<?php 
include_once("includes/basic_includes.php");
include_once("functions.php");
$result=search();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Profile 404 | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
</head>
<body>
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
    display: flex; 
    justify-content: center; 
    align-items: center;
  }
  .btn {
    display: flex;
    padding: 10px;
    background: #06b6d4;
    color: #fff; 
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
  </style>
  <div class="shosurbari-error-form">
    <div class="soshurbari-animation-icon">
      <div class="sb-icon-laptop">
        <img src="images/shosurbari-error.png">
      </div>
    </div>
    <div class="error-page-area">
      <h2>দুঃখিত! বায়োডাটাটি খুঁজে পাওয়া যায়নি।</h2>
      <p> আপনি যেই বায়োডাটাটি খুঁজচ্ছেন বর্তমানে সেই একাউন্টটি ডিএক্টিভেট রয়েছে। অথবা সঠিক বায়োডাটা নাম্বার দিয়ে পুনরায় চেষ্টা করুন।</p>
      <div class="button-container">
        <a href="index.php" class="btn">হোম পেজ</a>
        <a href="contact.php" class="btn error-btn-mg">রিপোর্ট করুন</a>
      </div>
    </div>
  </div>
  <!--=======================================
  How Many Visitors View This Page.
  This Script Connected to get_view_count.php
  and page_views Database Table
  ========================================-->
  <script>
    $(document).ready(function() {
    var pages = ["404"];
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
</body>
</html>	