<?php
$id_customer = isset($_SESSION['id_customer']) ? $_SESSION['id_customer'] : 0;
require_once("includes/dbconn.php");
$sql = "SELECT request_date FROM customer WHERE id_customer = $id_customer";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $request_date = $row['request_date'];
    $formatted_date = date('D d F Y, g:i A', strtotime($request_date));
} else {
    $formatted_date = "Date not found";
}
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>  
@import url('https://fonts.maateen.me/adorsho-lipi/font.css');
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap');
@font-face {
font-family: 'AdorshoLipi';
src: url('font/AdorshoLipi.eot');
src: url('font/AdorshoLipi.woff') format('woff'),
url('font/AdorshoLipi.ttf') format('truetype'),
url('font/AdorshoLipi.svg#AdorshoLipi') format('svg'),
url('font/AdorshoLipi.eot?#iefix') format('embedded-opentype');
font-weight: normal;
font-style: normal;
}
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
h2 {
    margin-top: 5px;
    margin-bottom: 20px;
    color: #0aa4ca;
    font-size: 20px;
}
.content h3 {
    font-size: 16px;
    font-weight: 500;
    color: black;
    margin-top: 22px;
    margin-bottom: 22px;
    text-align: left;
    line-height: 22px;
}
.content h5 {
    text-align: justify;
    color: #696262;
    font-size: 12px;
    margin-top: 15px;
    line-height: 20px;
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
span a {
    text-decoration: none;
    color: black;
    font-size: 12px;
}
table {
    border: 1px #ccc;
    border-collapse: collapse;
    border-spacing: 0;
    margin: auto;
    width: 100%;
}
.sb-reg-info{
    padding: 20px;
    background: #fff;
    margin-bottom: 22px;
    box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
    border: 1px solid rgba(0,0,0,.05);
}
.sb-reg-info-heading{
    font-size: 12px;
    color: #000000;
    padding: 5px;
    padding-right: 10px;
    font-weight: 450;
    width: 35%;
    position: inherit;
    text-align: right;
    border: 1px solid #ccc;
    border-style: groove;
}
.sb-reg-info-data {
    font-size: 12px;
    color: #0aa4ca;
    padding: 5px;
    padding-left: 10px;
    font-weight: 450;
    width: 65%;
    position: inherit;
    text-align: left;
    text-decoration: none;
    border: 1px solid #ccc;
    border-style: groove;
}
.sb-reg-info-data a {
    font-size: 12px;
    color: #0aa4ca;
}
.ii a[href] {
    text-decoration: none;
    color: #0aa4ca;
    font-size: 12px;
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
    padding: 5px 10px 20px 10px;
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
            <h1>Your Order is Processing!</h1>
        </div>
        <div class='content'>
            <h3>ধন্যবাদ! আপনার পেমেন্ট তথ্য সফল ভাবেই জমা হয়েছে। আপনার পেমেন্ট তথ্য যাচাই বাছাইয়ের পর ২৪ ঘন্টার মধ্যে যোগাযোগের জন্য কাঙ্ক্ষিত তথ্য আপনাকে পাঠিয়ে দেয়া হবে।</h3>
            <div class="sb-reg-info">
                <h2>রিকোয়েস্ট আইডি: <?php echo "SBBR$id_customer";?></h2>
                <table>
                    <tbody>
                        <tr>
                            <td class="sb-reg-info-heading">নাম</td>
                            <td class="sb-reg-info-data"> <?php echo $cust_name; ?> </td>
                        </tr>
                        <tr>
                            <td class="sb-reg-info-heading">ই-মেইল</td>
                            <td class="sb-reg-info-data"> <?php echo $cust_email; ?> </td>
                        </tr>
                        <tr>
                            <td class="sb-reg-info-heading">মোবাইল নাম্বার</td>
                            <td class="sb-reg-info-data"> <?php echo "$selectedCountryCode $cust_number"; ?> </td>
                        </tr>
                        <tr>
                            <td class="sb-reg-info-heading">ঠিকানা</td>
                            <td class="sb-reg-info-data"> <?php echo $cust_permanent_address; ?> </td>
                        </tr>
                        <tr>
                            <td class="sb-reg-info-heading">পছন্দের বায়োডাটা</td>
                            <td class="sb-reg-info-data"> <?php echo $request_biodata_number; ?> </td>
                        </tr>
                        <tr>
                            <td class="sb-reg-info-heading">মোট টাকা</td>
                            <td class="sb-reg-info-data"> <?php echo $fee; ?> </td>
                        </tr>
                        <tr>
                            <td class="sb-reg-info-heading">পেমেন্ট মেথড</td>
                            <td class="sb-reg-info-data"> <?php echo $payment_method; ?> </td>
                        </tr>
                        <tr>
                            <td class="sb-reg-info-heading">পেমেন্ট নাম্বার</td>
                            <td class="sb-reg-info-data">
                            <?php
                            switch ($payment_method) {
                            case 'বিকাশ':
                            echo $bkash_number;
                            break;
                            case 'নগদ':
                            echo $nagad_number;
                            break;
                            case 'রকেট':
                            echo $roket_number;
                            break;
                            default:
                            echo "N/A";
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="sb-reg-info-heading">ট্রানজেকশন আইডি</td>
                            <td class="sb-reg-info-data">
                            <?php
                            switch ($payment_method) {
                            case 'বিকাশ':
                            echo $bkash_transaction_id;
                            break;
                            case 'নগদ':
                            echo $nagad_transaction_id;
                            break;
                            case 'রকেট':
                            echo $roket_transaction_id;
                            break;
                            default:
                            echo "N/A";
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="sb-reg-info-heading">রিকোয়েস্ট তারিখ</td>
                            <td class="sb-reg-info-data"><?php echo $formatted_date; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5 class="note" style="font-weight: none;"> <strong style="color: red; font-weight: bold;">বি:দ্র: </strong> বায়োডাটার (পাত্র-পাত্রীর) যদি বিয়ে ঠিক হয়ে যায় সেক্ষেত্রে আপনাকে যোগাযোগের তথ্য প্রদান না করে সার্ভিস চার্জ ফেরত দেয়া হবে।</h5>
        </div>
        <div class='footer'>
            <p>&copy; 2022-23 ShosurBari.com | All Rights Reserved</p>
            <a href="https://www.shosurbari.com"> <img src="https://i.ibb.co/xqxgyDZ/shosurbari-email-icon.png" style=" border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
            <a href="https://www.facebook.com/ShosurBari.bd/"> <img src="https://i.postimg.cc/fytRD9ZK/shosurbari-facebook.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
            <a href="mailto:info@shosurbari.com"> <img src="https://i.postimg.cc/FsVx0d0z/shosurbari-email.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
            <a href="https://www.youtube.com/"> <img src="https://i.postimg.cc/T1zYw33X/shosurbari-youtube.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        </div>
    </div>
</body>
</html>
