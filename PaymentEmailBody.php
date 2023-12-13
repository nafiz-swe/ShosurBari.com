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
    padding: 10px;
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
    height: 60px;
}

.content {
    padding: 10px 15px;
    border-right: 20px solid #0aa4ca;
    border-left: 20px solid #0aa4ca;
    text-align: center;
}

table {
    border: 1px #ccc;
    border-collapse: collapse;
    border-spacing: 0;
    margin: auto;
    width: 100%;
}

.sb-reg-info{
    border: 2px solid #0aa4ca;
    padding: 25px;
}

.sb-reg-info-heading{
    font-size: 15px;
    color: #000000;
    padding: 5px;
    padding-left: 10px;
    font-weight: 450;
    width: 33%;
    position: inherit;
    text-align: left;
    border: 1px solid #ccc;
    border-style: groove;
}

.sb-reg-info-data{
    font-size: 15px;
    color: #0aa4ca;
    padding: 5px;
    padding-left: 10px;
    font-weight: 450;
    width: 67%;
    position: inherit;
    text-align: left;
    text-decoration: none;
    border: 1px solid #ccc;
    border-style: groove;
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
    margin-bottom: 25px;
}

.content h3 {
    font-size: 15px;
    font-weight: none;
    color: black;
    margin-bottom: 22px;
    text-align: left;
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
        <h3>ধন্যবাদ! আপনার পেমেন্ট তথ্য সফল ভাবেই জমা হয়েছে। আপনার পেমেন্ট তথ্য যাচাই বাছাইয়ের পর ২৪ ঘন্টার মধ্যে আপনাকে SMS বা ই-মেইলের মাধ্যমে অভিভাবকের মোবাইল নাম্বার প্রদান করা হবে।</h3>
        <div class="sb-reg-info">

        <h2>রিকোয়েস্ট আইডি: <?php echo "SB$id_customer";?></h2>

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
                    <td class="sb-reg-info-data"> <?php echo $cust_number; ?> </td>
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
                        // Check which payment method was used and display the corresponding number
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
                        // Check which payment method was used and display the corresponding transaction ID
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


    <h5 class="note" style="font-weight: none;"> <strong style="color: red; font-weight: bold;">বি:দ্র: </strong> ব্যক্তিগত কোনো কারণে অভিভাবক অনুমতি না দিলে যোগাযোগের তথ্য প্রদান না করে টাকা ফেরত দেয়া হবে।</h5>
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
