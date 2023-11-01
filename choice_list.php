<?php
session_start();

$choiceList = [];

if (isset($_SESSION['choice_list'])) {
    $choiceList = $_SESSION['choice_list'];
}

if (isset($_POST['add_to_choice_list'])) {
    $profileid = $_POST['add_to_choice_list'];

    $found = false;
    foreach ($choiceList as $key => $item) {
        if (strpos($item, $profileid) === 0) {
            $found = true;
            $dateTime = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
            $formattedDateTime = $dateTime->format('l h:i A, d F Y');
            $choiceList[$key] = "$profileid, $formattedDateTime";
            break;
        }
    }

    if (!$found) {
        $dateTime = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
        $formattedDateTime = $dateTime->format('l h:i A, d F Y');
        $choiceList[] = "$profileid, $formattedDateTime";
    }

    $_SESSION['choice_list'] = $choiceList;
}



if (isset($_POST['remove_from_choice_list'])) {
    $profileidToRemove = $_POST['remove_from_choice_list'];
    $choiceList = array_diff($choiceList, [$profileidToRemove]);
    $_SESSION['choice_list'] = $choiceList;
}

$count = count($choiceList);

$idList = implode(', ', array_map(function($item) {
    return explode(', ', $item)[0];
}, $choiceList));

$totalAmount = 0;

foreach ($choiceList as $item) {
    $profileid = explode(', ', $item)[0];
    $fee = calculateFeeForProfileID($profileid);
    $totalAmount += $fee;
}

function calculateFeeForProfileID($profileid) {
    $fees = [
        '1' => 145,
        '2' => 280,
        '3' => 390,
        '4' => 500,
        '5' => 600,
        '6' => 690,
        '7' => 770,
        '8' => 840,
        '9' => 900,
        '10' => 980,
    ];

    return isset($fees[$profileid]) ? $fees[$profileid] : 0;
}
function englishToBanglaNumber($number) {
    $english = range(0, 9);
    $bangla = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
    $banglaNumber = str_replace($english, $bangla, $number);
    return $banglaNumber;
}
?>
<?php include_once("functions.php"); ?>



<!DOCTYPE HTML>
<html>


<head>
<title>Choice List | ShosurBari</title>
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

  <div class="grid_3">
    <div class="container">
      <div class="breadcrumb1">
        <ul>
          <a href="index.php"><i class="fa fa-home home_1"></i></a>
          <span class="divider">&nbsp;<|>&nbsp;</span>
          <li class="current-page"><h4>Choice List</h4></li>
        </ul>
      </div>
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

.remove-button {
    padding: 4px 7px;
}
}

@media (max-width:480px){
    .soshurbari-animation-icon h3,
    .sb-register-login h2{
        font-size: 20px;
    }

.shosurbari-biodata-form {
  margin-top: 70px;
}
}

@media (max-width: 384px) {
    th, td {
    font-size: 13px;
    padding: 5px;
}

.remove-button {
    padding: 3px 5px;
}

.contact-bio,
.copy-sbbio-link {
    margin-left: 5px;
    margin-right: 5px;
    font-size: 13px;
}
}
</style>






<div class="shosurbari-biodata-form">
  
  <div class="shosurbari-animation-form">
		  <div class="flex-container">
        <div class="sb-register-login">

          <div class="soshurbari-animation-icon">
            <div class="sb-icon-laptop">
              <h3> <img src="images/shosurbari-icon.png"> শশুরবাড়ি </h3>
            </div>
          </div>

          <div class="sb-biodata-field">
            <h2>পছন্দের বায়োডাটা গুলো</h2>
          </div>



          <?php
echo "<table>
    <tr>
        <th> বায়োডাটা</th>
        <th> তারিখ ও সময় </th>
        <th> বাদ দিন </th>
    </tr>";

foreach ($choiceList as $item) {
    // Split the item into profile ID and date
    list($profileid, $formattedDateTime) = explode(', ', $item);
    list($day, $time,) = explode(' ', $formattedDateTime, 2); // Split date and time

    // Format the date and time as "l h:i A d F Y"
    $formattedDateTime = date('l h:i A d F Y', strtotime($formattedDateTime));

    echo "<tr>
        <td> $profileid </td>
        <td> $formattedDateTime </td>
        <form method='POST' action='choice_list.php'>
            <input type='hidden' name='remove_from_choice_list' value='$item'>
            <td>  <button class='remove-button' type='submit'>Remove</button> </td>
        </form>
    </tr>";
}

echo "</table> </br>";

if (empty($choiceList)) {
    echo '<p style="color: #ff0000;">আপনি এখনো কোনো বায়োডাটা পছন্দের তালিকায় যোগ করেন নাই।</p>';
}
?>


    <?php if ($count > 0): ?>
        <p style="text-align: center;">পছন্দ করেছেন <?php echo englishToBanglaNumber($count); ?> টি বায়োডাটা, মোট <?php echo englishToBanglaNumber(calculateTotalAmount($count)); ?> টাকা</p>
    <?php endif; ?>

<?php
function calculateTotalAmount($count) {
    $fees = [
        '1' => 145,
        '2' => 280,
        '3' => 390,
        '4' => 500,
        '5' => 600,
        '6' => 690,
        '7' => 770,
        '8' => 840,
        '9' => 900,
        '10' => 980,
    ];

    if ($count >= 1 && $count <= 10) {
        return $fees[$count];
    } else {
        return 0;
    }
}
?>


    <script>
    // Function to set a cookie
    function setCookie(cookieName, cookieValue, daysToExpire) {
        var date = new Date();
        date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
        var expires = "expires=" + date.toUTCString();
        document.cookie = cookieName + "=" + cookieValue + "; " + expires;
    }

    // Get the number of IDs and set a browser cookie
    var numIds = <?php echo $count; ?>;
    setCookie("choice_list_ids", numIds, 30); // Change 30 to the number of days you want the cookie to persist
</script>



<?php
if (isset($_POST['make_payment'])) {
    // Redirect to contactbiodata.php and pass the IDs as a query parameter
    header("Location: contactbiodata.php?ids=" . urlencode($idList));
    exit; // Ensure that no further PHP code is executed after the redirection
}
?>


<div class="profile-btn">
    <div class="contact-bio">
        <a href="search.php">
            <button class="chatbtn">সার্চ পেজ</button>
        </a>
    </div>

    <?php
    if (!empty($choiceList)) {
        // Display the "Make Payment" button if $choiceList is not empty
        echo "<form method='GET' action='contactbiodata.php' class='copy-sbbio-link'>
            <input type='hidden' name='ids' value=\"$idList\">
            <button type='submit' class='copylink'>পেমেন্ট করুন</button>
        </form>";
    }
    ?>
</div>

        
</div>
</div>
</div> 
</div>



<div class="sb-home-search">
    <h1>বায়োডাটার মূল্য তালিকা</h1>
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
                <p>শশুরবাড়ি ডট কমের পাত্রপাত্রীদের সাথে যোগাযোগ করতে চাইলে সামান্য সার্ভিস চার্জ প্রদান করতে হবে। আপনি চাইলে এক বা একাধিক পাত্র/পাত্রীর সাথে যোগাযোগ করতে পারবেন। আপনার পেমেন্ট সম্পন্ন হয়ে গেলে, পেমেন্ট তথ্যগুলো যাচাইবাচায়ের পর ২৪ ঘন্টার মধ্যেই আপনার নাম্বারে পাত্র/পাত্রীর অভিভাবকের নাম্বর পাঠিয়ে দেয়া হবে। দেখেনিন ১ থেকে ১০টি বায়োডাটার মোট মূল্য সহ একাধিক বায়োডাটার এভারেজ মূল্য।</p>
                </br> <p> <span style="color:#ff0000; font-weight: 600;">বি: দ্র:</span> পাত্রপাত্রীর অভিভাবকের মোবাইল নাম্বার এবং পাত্রপাত্রীর ইমেইল প্রদান করা হবে। পাত্রপাত্রীদের মোবাইল নাম্বার প্রদান করা হয় না।</p>
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




	<!--=======  Footer Start ========-->
	<?php include_once("footer.php");?>
	<!--=======  Footer End  =========-->



</body>
</html>
