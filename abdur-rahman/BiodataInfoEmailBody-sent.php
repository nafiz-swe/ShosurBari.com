<?php
$id_customer = isset($_SESSION['id_customer']) ? $_SESSION['id_customer'] : 0;
require_once("includes/dbconn.php");
$sql = "SELECT request_date FROM customer WHERE id_customer = $id_customer";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $request_date = $row['request_date'];
    $formatted_date = date('j F Y, g:i:s A', strtotime($request_date));
} else {
    $formatted_date = "Date not found";
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        font-family: 'AdorshoLipi', 'Ubuntu', sans-serif !important;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 30px;
        background: #ddf4ff66;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .header {
        background: #0aa4ca;
        color: white;
        text-align: center;
        padding: 2px 20px;
        font-size: 12px;
        line-height: 30px;
        height: 80px;
    }
    .header h1 {
        font-size: 30px;
        line-height: 40px;
    }
    .content {
        text-align: center;
    }
    .content h3 {
        font-size: 16px;
        font-weight: 500;
        color: black;
        margin-top: 22px;
        margin-bottom: 22px;
        text-align: left;
        line-height: 25px;
    }
    .content h5 {
        text-align: justify;
        color: #696262;
        font-size: 12px;
        margin-top: 15px;
        line-height: 20px;
    }
    .sb-reg-info{
        text-align: left;
        padding: 20px;
        background: #fff;
        margin-bottom: 30px;
        box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
        border: 1px solid rgba(0,0,0,.05);
    }
    .sb-reg-info h2{
        text-align: center;
        padding-bottom: 0px;
        margin-top: 0px;
        color: #0aa4ca;
        margin-bottom: 10px;
        font-size: 25px;
    }
    .shosurbari-biodata-field{
        margin-bottom: 15px;
    }
    .sb-reg-info  .shosurbari-biodata-field label {
        color: #000;
        font-weight: bold;
        font-size: 14px;
    }
    .sb-reg-info  .shosurbari-biodata-field p{
        width: auto;
        height: auto;
        padding: 2px 12px;
        line-height: 22px;
        font-size: 14px;
        font-weight: 500;
        text-align: left;
        color: #696262;
        background-color: #4cafe809;
        border-radius: 4px;
    }
    .shosurbari-biodata-field a {
        font-size: 14px;
        color: #696262;
    } 
    .ii a[href] {
        text-decoration: none;
        color: #0aa4ca;
        font-size: 16px;
    }
    .sb-biodata-info-sent{
        background: #fff;
        padding: 15px;
        margin-top: 15px;
        box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
        border: 1px solid rgba(0,0,0,.05);
    }
    .sb-biodata{
        width: auto;
        margin-bottom: 0px;
    }
    .sb-biodata-info-sent h2 {
        font-size: 25px;
        margin-top: 10px;
    }
    .sb-biodata-field h2{
        font-size: 25px;
        margin-top: 15px;
    }
    .note{
        border: 1px solid #ccc;
        margin-top: 5px;
        padding: 13px;
    }
    .footer {
        background: #0aa4ca;
        color: white;
        text-align: center;
        padding: 5px 10px 25px 10px;
        margin-top: 0px;
        display: block;
    }
    .footer img{
        padding:10px;
        margin: auto;
        align-items: center;
    }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>যোগাযোগের তথ্য</h1>
        </div>
        <div class='content'>
            <h3>আমাদের সাথে থাকার জন্য আপনাকে ধন্যবাদ! শ্বশুরবাড়ি ডট কম শুধুমাত্র দুইটি পরিবারের মধ্যে যোগাযোগের মাধ্যম হিসাবে পরিচালিত। নিচে বায়োডাটা নং এ ক্লিক করে দেখে নিতেন পারেন সম্পূর্ণ প্রফাইলটি।</h3>
            <div class="sb-reg-info">
                <div class="sb-biodata" id="religionDetails">
                    <h2>রিসিভ আইডি: <?php echo "SBCR$sbo_id";?></h2>
                    <div class="sb-biodata-info-sent">
                        <div class="shosurbari-biodata-field">
                            <label for="edit-name">রিকোয়েস্ট আইডি</label>
                            <br> <?php echo $payment_order_id;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label for="edit-name">পেমেন্ট তারিখ</label>
                            <br> <?php echo $cust_payment_date;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label for="edit-name">মোট বায়োডাটা</label>
                            <br> <?php echo $payment_biodata_quantity;?> 
                        </div>
                    </div>


                    <?php if (!empty($biodata_number_1) || !empty($biodata_guardian_1) || !empty($biodata_patropatri_1)): ?>
                    <div class="sb-biodata-info-sent">
                        <h2>পছন্দের বায়োডাটার তথ্য ১</h2>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটা নং</label>
                            <br><a href="https://www.shosurbari.com/profile.php?/Biodata=<?php echo $biodata_number_1; ?>"><?php echo $biodata_number_1; ?></a>
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটার অভিভাবক</label>
                            <br> <?php echo $biodata_guardian_1; ?> 
                        </div>

                        <div class="shosurbari-biodata-field">
                            <label>পাত্র/পাত্রী</label>
                            <br> <?php echo $biodata_patropatri_1; ?> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- পছন্দের বায়োডাটার তথ্য ১ End -->
                    <?php if (!empty($biodata_number_2) || !empty($biodata_guardian_2) || !empty($biodata_patropatri_2)): ?>
                    <div class="sb-biodata-info-sent">
                        <h2>পছন্দের বায়োডাটার তথ্য ২</h2>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটা নং</label>
                            <br><a href="https://www.shosurbari.com/profile.php?/Biodata=<?php echo $biodata_number_2; ?>"><?php echo $biodata_number_2; ?></a>
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটার অভিভাবক</label>
                            <br> <?php echo $biodata_guardian_2;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>পাত্র/পাত্রী</label>
                            <br> <?php echo $biodata_patropatri_2;?> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- পছন্দের বায়োডাটার তথ্য ২ End -->
                    <?php if (!empty($biodata_number_3) || !empty($biodata_guardian_3) || !empty($biodata_patropatri_3)): ?>
                    <div class="sb-biodata-info-sent">
                        <h2>পছন্দের বায়োডাটার তথ্য ৩</h2>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটা নং</label>
                            <br><a href="https://www.shosurbari.com/profile.php?/Biodata=<?php echo $biodata_number_3; ?>"><?php echo $biodata_number_3; ?></a>
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটার অভিভাবক</label>
                            <br> <?php echo $biodata_guardian_3;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>পাত্র/পাত্রী</label>
                            <br> <?php echo $biodata_patropatri_3;?> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- পছন্দের বায়োডাটার তথ্য ৩ End -->
                    <?php if (!empty($biodata_number_4) || !empty($biodata_guardian_4) || !empty($biodata_patropatri_4)): ?>
                    <div class="sb-biodata-info-sent">
                        <h2>পছন্দের বায়োডাটার তথ্য ৪</h2>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটা নং</label>
                            <br><a href="https://www.shosurbari.com/profile.php?/Biodata=<?php echo $biodata_number_4; ?>"><?php echo $biodata_number_4; ?></a>
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটার অভিভাবক</label>
                            <br> <?php echo $biodata_guardian_4;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>পাত্র/পাত্রী</label>
                            <br> <?php echo $biodata_patropatri_4;?> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- পছন্দের বায়োডাটার তথ্য ৪ End -->
                    <?php if (!empty($biodata_number_5) || !empty($biodata_guardian_5) || !empty($biodata_patropatri_5)): ?>
                    <div class="sb-biodata-info-sent">
                        <h2>পছন্দের বায়োডাটার তথ্য ৫</h2>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটা নং</label>
                            <br><a href="https://www.shosurbari.com/profile.php?/Biodata=<?php echo $biodata_number_5; ?>"><?php echo $biodata_number_5; ?></a>
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটার অভিভাবক</label>
                            <br> <?php echo $biodata_guardian_5;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>পাত্র/পাত্রী</label>
                            <br> <?php echo $biodata_patropatri_5;?> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- পছন্দের বায়োডাটার তথ্য ৫ End -->
                    <?php if (!empty($biodata_number_6) || !empty($biodata_guardian_6) || !empty($biodata_patropatri_6)): ?>
                    <div class="sb-biodata-info-sent">
                        <h2>পছন্দের বায়োডাটার তথ্য ৬</h2>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটা নং</label>
                            <br><a href="https://www.shosurbari.com/profile.php?/Biodata=<?php echo $biodata_number_5; ?>"><?php echo $biodata_number_5; ?></a>
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটার অভিভাবক</label>
                            <br> <?php echo $biodata_guardian_6;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>পাত্র/পাত্রী</label>
                            <br> <?php echo $biodata_patropatri_6;?> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- পছন্দের বায়োডাটার তথ্য ৬ End -->
                    <?php if (!empty($biodata_number_7) || !empty($biodata_guardian_7) || !empty($biodata_patropatri_7)): ?>
                    <div class="sb-biodata-info-sent">
                        <h2>পছন্দের বায়োডাটার তথ্য ৭</h2>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটা নং</label>
                            <br><a href="https://www.shosurbari.com/profile.php?/Biodata=<?php echo $biodata_number_7; ?>"><?php echo $biodata_number_7; ?></a>
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটার অভিভাবক</label>
                            <br> <?php echo $biodata_guardian_7;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>পাত্র/পাত্রী</label>
                            <br> <?php echo $biodata_patropatri_7;?> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- পছন্দের বায়োডাটার তথ্য ৭ End -->
                    <?php if (!empty($biodata_number_8) || !empty($biodata_guardian_8) || !empty($biodata_patropatri_8)): ?>
                    <div class="sb-biodata-info-sent">
                        <h2>পছন্দের বায়োডাটার তথ্য ৮</h2>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটা নং</label>
                            <br><a href="https://www.shosurbari.com/profile.php?/Biodata=<?php echo $biodata_number_8; ?>"><?php echo $biodata_number_8; ?></a>
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটার অভিভাবক</label>
                            <br> <?php echo $biodata_guardian_8;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>পাত্র/পাত্রী</label>
                            <br> <?php echo $biodata_patropatri_8;?> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- পছন্দের বায়োডাটার তথ্য ৮ End -->
                    <?php if (!empty($biodata_number_9) || !empty($biodata_guardian_9) || !empty($biodata_patropatri_9)): ?>
                    <div class="sb-biodata-info-sent">
                        <h2>পছন্দের বায়োডাটার তথ্য ৯</h2>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটা নং</label>
                            <br><a href="https://www.shosurbari.com/profile.php?/Biodata=<?php echo $biodata_number_9; ?>"><?php echo $biodata_number_9; ?></a>
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটার অভিভাবক</label>
                            <br> <?php echo $biodata_guardian_9;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>পাত্র/পাত্রী</label>
                            <br> <?php echo $biodata_patropatri_9;?> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- পছন্দের বায়োডাটার তথ্য ৯ End -->
                    <?php if (!empty($biodata_number_10) || !empty($biodata_guardian_10) || !empty($biodata_patropatri_10)): ?>
                    <div class="sb-biodata-info-sent">
                        <h2>পছন্দের বায়োডাটার তথ্য ১০</h2>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটা নং</label>
                            <br><a href="https://www.shosurbari.com/profile.php?/Biodata=<?php echo $biodata_number_10; ?>"><?php echo $biodata_number_10; ?></a>
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>বায়োডাটার অভিভাবক</label>
                            <br>  <?php echo $biodata_guardian_10;?> 
                        </div>
                        <div class="shosurbari-biodata-field">
                            <label>পাত্র/পাত্রী</label>
                            <br> <?php echo $biodata_patropatri_10;?> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- পছন্দের বায়োডাটার তথ্য ১০ End -->
                </div>
            </div>
            <h5 class="note" style="font-weight: none;"> <strong style="color: red; font-weight: bold;">বি:দ্র: </strong> পরিবার ও পাত্র-পাত্রীর সম্পর্কে নিজ দায়িত্বে ভালভাবে খোঁজ নিয়ে তবেই বিয়ের কথা পাকা করুন। বিয়ের পূর্বেই পাত্র-পাত্রীর পরিবারের সাথে টাকা লেনদেন করে প্রতারিত হবেন না।</h5>
        </div>
        <div class='footer'>
            <p>&copy; 2022-23 ShosurBari.com | All Rights Reserved </p>
            <a href="https://www.shosurbari.com"> <img src="https://i.ibb.co/xqxgyDZ/shosurbari-email-icon.png" style=" border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
            <a href="https://www.facebook.com/ShosurBari.bd/"> <img src="https://i.postimg.cc/fytRD9ZK/shosurbari-facebook.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
            <a href="mailto:info@shosurbari.com"> <img src="https://i.postimg.cc/FsVx0d0z/shosurbari-email.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
            <a href="https://www.youtube.com/"> <img src="https://i.postimg.cc/T1zYw33X/shosurbari-youtube.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        </div>
    </div>
</body>
</html>
