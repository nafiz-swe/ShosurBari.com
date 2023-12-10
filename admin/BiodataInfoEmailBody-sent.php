<?php
// Retrieve the id_customer (assuming it's passed or stored in the session)
$id_customer = isset($_SESSION['id_customer']) ? $_SESSION['id_customer'] : 0;

// Assuming you have a database connection established
require_once("includes/dbconn.php");

// Fetch the request_date based on the id_customer
$sql = "SELECT request_date FROM customer WHERE id_customer = $id_customer";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $request_date = $row['request_date'];

    // Format the date using the same format as in functions.php
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
    font-family: Arial, sans-serif;
    font-family: 'AdorshoLipi', Arial, sans-serif !important;
    background-color: #2ecc71; /* Updated background color */
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 30px;
    background: #ffffff;
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

.sb-reg-info{
    /* border: 2px solid #0aa4ca;
    padding: 25px; */
    text-align: left;
}

.sb-reg-info h2{
    text-align: center;
    padding-bottom: 0px;
    text-decoration: underline;
}

.shosurbari-biodata-field{
    margin-top: 25px;
    margin-bottom: 5px;
}

.sb-reg-info  .shosurbari-biodata-field label {
    color: #0aa4ca;
    font-weight: bold;
    font-size: 16px;
}

.sb-reg-info  .shosurbari-biodata-field p{
    width: auto;
    height: auto;
    line-height: 30px;
    padding: 6px 12px;
    font-size: 16px;
    font-weight: 500;
    text-align: left;
    color: black;
    background-color: #4cafe809;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top: 0px;
} 

p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}


.note{
    border: 1.5px solid #ccc;
    margin-top: 5px;
    padding: 13px;
}

.content p {
    font-size: 12px;
    color: #000;
    font-weight: bold;
    padding: 2px;
    margin-top: 0px;
    margin-bottom: 0px;
    text-align: left;
}

.content p span{
    font-size: 10px;
    color: #000;
}

.content span{
    text-decoration: none;
    color: #0aa4ca;
    font-size: 12px;
}

.ii a[href] {
    text-decoration: none;
    color: #0aa4ca;
    font-size: 12px;
}

span a {
    text-decoration: none;
    color: black;
    font-size: 12px;
}

h2 {
    margin-top: 0px;
    color: #0aa4ca;
    margin-bottom: 10px;
    font-size: 25px;
}

.content h3 {
    font-size: 15px;
    font-weight: none;
    color: black;
    margin-bottom: 22px;
    text-align: left;
    line-height: 25px;
}

.content h5 {
    text-align: justify;
    color: #696262;
    font-size: 12px;
    margin-top: 15px;
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



  .sb-biodata-info-sent{
    background: #ddf4ff66;
    border: 1px solid #0aa4ca;
    padding: 15px;
    margin: 40px auto;
    margin-bottom: 5px;
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
</style>

</head>

<body>

<div class='container'>
    <div class='header'>
        <h1>Guardian Contact Details</h1>
    </div>

    <div class='content'>
        <h3>আমাদের সাথে থাকার জন্য আপনাকে ধন্যবাদ! শ্বশুরবাড়ি ডট কম শুধুমাত্র দুইটি পরিবারের মধ্যে যোগাযোগের মাধ্যম হিসাবে পরিচালিত। নিচে বায়োডাটা নং এ ক্লিক করে দেখে নিতেন পারেন সম্পূর্ণ প্রফাইলটি।</h3>
        
        <div class="sb-reg-info">
            <h2>Receipt ID: <?php echo "SB$sbo_id";?></h2>
            <div class="sb-biodata" id="religionDetails">

                <div class="shosurbari-biodata-field">
                <label for="edit-name">পেমেন্ট অর্ডার আইডি</label>
                <p> <?php echo $payment_order_id;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label for="edit-name">পেমেন্ট তারিখ</label>
                <p> <?php echo $cust_payment_date;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label for="edit-name">মোট বায়োডাটা</label>
                <p> <?php echo $payment_biodata_quantity;?> </p>
                </div>


                <?php if (!empty($biodata_number_1) || !empty($biodata_guardian_1) || !empty($biodata_patropatri_1)): ?>
                <div class="sb-biodata-info-sent">
                <h2>বায়োডাটার তথ্য: ১</h2>
                <div class="shosurbari-biodata-field">
                <label>বায়োডাটা নং</label>
                <p>
                    <a href="http://localhost:8000/profile.php?/Biodata=<?php echo $biodata_number_1; ?>">
                        <?php echo $biodata_number_1; ?>
                    </a>
                </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>বায়োডাটার অভিভাবক</label>
                <p> <?php echo $biodata_guardian_1; ?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>পাত্র/পাত্রী</label>
                <p> <?php echo $biodata_patropatri_1; ?> </p>
                </div>
                </div>
                <?php endif; ?>


                <?php if (!empty($biodata_number_2) || !empty($biodata_guardian_2) || !empty($biodata_patropatri_2)): ?>
                <div class="sb-biodata-info-sent">
                <h2>বায়োডাটার তথ্য: ২</h2>
                <div class="shosurbari-biodata-field">
                <label>বায়োডাটা নং</label>
                <p>
                    <a href="http://localhost:8000/profile.php?/Biodata=<?php echo $biodata_number_2; ?>">
                        <?php echo $biodata_number_2; ?>
                    </a>
                </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>বায়োডাটার অভিভাবক</label>
                <p> <?php echo $biodata_guardian_2;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>পাত্র/পাত্রী</label>
                <p> <?php echo $biodata_patropatri_2;?> </p>
                </div>
                </div>
                <?php endif; ?>



                <?php if (!empty($biodata_number_3) || !empty($biodata_guardian_3) || !empty($biodata_patropatri_3)): ?>
                <div class="sb-biodata-info-sent">
                <h2>বায়োডাটার তথ্য: ৩</h2>
                <div class="shosurbari-biodata-field">
                <label>বায়োডাটা নং</label>
                <p>
                    <a href="http://localhost:8000/profile.php?/Biodata=<?php echo $biodata_number_3; ?>">
                        <?php echo $biodata_number_3; ?>
                    </a>
                </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>বায়োডাটার অভিভাবক</label>
                <p> <?php echo $biodata_guardian_3;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>পাত্র/পাত্রী</label>
                <p> <?php echo $biodata_patropatri_3;?> </p>
                </div>
                </div>
                <?php endif; ?>



                <?php if (!empty($biodata_number_4) || !empty($biodata_guardian_4) || !empty($biodata_patropatri_4)): ?>
                <div class="sb-biodata-info-sent">
                <h2>বায়োডাটার তথ্য: ৪</h2>
                <div class="shosurbari-biodata-field">
                <label>বায়োডাটা নং</label>
                <p>
                    <a href="http://localhost:8000/profile.php?/Biodata=<?php echo $biodata_number_4; ?>">
                        <?php echo $biodata_number_4; ?>
                    </a>
                </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>বায়োডাটার অভিভাবক</label>
                <p> <?php echo $biodata_guardian_4;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>পাত্র/পাত্রী</label>
                <p> <?php echo $biodata_patropatri_4;?> </p>
                </div>
                </div>
                <?php endif; ?>



                <?php if (!empty($biodata_number_5) || !empty($biodata_guardian_5) || !empty($biodata_patropatri_5)): ?>
                <div class="sb-biodata-info-sent">
                <h2>বায়োডাটার তথ্য: ৫</h2>
                <div class="shosurbari-biodata-field">
                <label>বায়োডাটা নং</label>
                <p>
                    <a href="http://localhost:8000/profile.php?/Biodata=<?php echo $biodata_number_5; ?>">
                        <?php echo $biodata_number_5; ?>
                    </a>
                </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>বায়োডাটার অভিভাবক</label>
                <p> <?php echo $biodata_guardian_5;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>পাত্র/পাত্রী</label>
                <p> <?php echo $biodata_patropatri_5;?> </p>
                </div>
                </div>
                <?php endif; ?>



                <?php if (!empty($biodata_number_6) || !empty($biodata_guardian_6) || !empty($biodata_patropatri_6)): ?>
                <div class="sb-biodata-info-sent">
                <h2>বায়োডাটার তথ্য: ৬</h2>
                <div class="shosurbari-biodata-field">
                <label>বায়োডাটা নং</label>
                <p>
                    <a href="http://localhost:8000/profile.php?/Biodata=<?php echo $biodata_number_6; ?>">
                        <?php echo $biodata_number_6; ?>
                    </a>
                </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>বায়োডাটার অভিভাবক</label>
                <p> <?php echo $biodata_guardian_6;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>পাত্র/পাত্রী</label>
                <p> <?php echo $biodata_patropatri_6;?> </p>
                </div>
                </div>
                <?php endif; ?>



                <?php if (!empty($biodata_number_7) || !empty($biodata_guardian_7) || !empty($biodata_patropatri_7)): ?>
                <div class="sb-biodata-info-sent">
                <h2>বায়োডাটার তথ্য: ৭</h2>
                <div class="shosurbari-biodata-field">
                <label>বায়োডাটা নং</label>
                <p>
                    <a href="http://localhost:8000/profile.php?/Biodata=<?php echo $biodata_number_7; ?>">
                        <?php echo $biodata_number_7; ?>
                    </a>
                </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>বায়োডাটার অভিভাবক</label>
                <p> <?php echo $biodata_guardian_7;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>পাত্র/পাত্রী</label>
                <p> <?php echo $biodata_patropatri_7;?> </p>
                </div>
                </div>
                <?php endif; ?>



                <?php if (!empty($biodata_number_8) || !empty($biodata_guardian_8) || !empty($biodata_patropatri_8)): ?>
                <div class="sb-biodata-info-sent">
                <h2>বায়োডাটার তথ্য: ৮</h2>
                <div class="shosurbari-biodata-field">
                <label>বায়োডাটা নং</label>
                <p>
                    <a href="http://localhost:8000/profile.php?/Biodata=<?php echo $biodata_number_8; ?>">
                        <?php echo $biodata_number_8; ?>
                    </a>
                </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>বায়োডাটার অভিভাবক</label>
                <p> <?php echo $biodata_guardian_8;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>পাত্র/পাত্রী</label>
                <p> <?php echo $biodata_patropatri_8;?> </p>
                </div>
                </div>
                <?php endif; ?>



                <?php if (!empty($biodata_number_9) || !empty($biodata_guardian_9) || !empty($biodata_patropatri_9)): ?>
                <div class="sb-biodata-info-sent">
                <h2>বায়োডাটার তথ্য: ৯</h2>
                <div class="shosurbari-biodata-field">
                <label>বায়োডাটা নং</label>
                <p>
                    <a href="http://localhost:8000/profile.php?/Biodata=<?php echo $biodata_number_9; ?>">
                        <?php echo $biodata_number_9; ?>
                    </a>
                </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>বায়োডাটার অভিভাবক</label>
                <p> <?php echo $biodata_guardian_9;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>পাত্র/পাত্রী</label>
                <p> <?php echo $biodata_patropatri_9;?> </p>
                </div>
                </div>
                <?php endif; ?>


                <?php if (!empty($biodata_number_10) || !empty($biodata_guardian_10) || !empty($biodata_patropatri_10)): ?>
                <div class="sb-biodata-info-sent">
                <h2>বায়োডাটার তথ্য: ১০</h2>
                <div class="shosurbari-biodata-field">
                <label>বায়োডাটা নং</label>
                <p>
                    <a href="http://localhost:8000/profile.php?/Biodata=<?php echo $biodata_number_10; ?>">
                        <?php echo $biodata_number_10; ?>
                    </a>
                </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>বায়োডাটার অভিভাবক</label>
                <p>  <?php echo $biodata_guardian_10;?> </p>
                </div>

                <div class="shosurbari-biodata-field">
                <label>পাত্র/পাত্রী</label>
                <p> <?php echo $biodata_patropatri_10;?> </p>
                </div>
                </div>
                <?php endif; ?>

            </div>

        </div>

        <h5 class="note" style="font-weight: none;"> <strong style="color: red; font-weight: bold;">বি:দ্র: </strong> পরিবার ও পাত্র-পাত্রীর সম্পর্কে নিজ দায়িত্বে ভালভাবে খোঁজ নিয়ে তবেই বিয়ের কথা পাকা করুন। বিয়ের পূর্বেই পাত্র-পাত্রীর পরিবারের সাথে টাকা লেনদেন করে প্রতারিত হবেন না।</h5>
    </div>

    <div class='footer'>
        <p>&copy; 2022-23 ShosurBari.com | All Rights Reserved</p>
        <a href="http://www.shoshurbari.rf.gd/login.php"> <img src="https://i.ibb.co/xqxgyDZ/shosurbari-email-icon.png" style=" border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        <a href="https://www.facebook.com/ShosurBari.bd/"> <img src="https://i.postimg.cc/fytRD9ZK/shosurbari-facebook.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        <a href="mailto:info@shosurbari.com"> <img src="https://i.postimg.cc/FsVx0d0z/shosurbari-email.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        <a href="https://www.youtube.com/"> <img src="https://i.postimg.cc/T1zYw33X/shosurbari-youtube.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
    </div>
</div>

</body>
</html>
