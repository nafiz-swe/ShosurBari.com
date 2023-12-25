<?php include_once("functions.php"); ?>
<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "matrimony";
// Create a PDO database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
$choiceList = [];
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $sql = "SELECT profile_id, added_timestamp FROM choice_list WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':user_id' => $user_id]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $profileid = $row['profile_id'];
        $formattedDateTime = date('l h:i A d F Y', strtotime($row['added_timestamp']));
        $choiceList[] = "$profileid, $formattedDateTime";
    }
} else {
    if (isset($_SESSION['choice_list'])) {
        $choiceList = $_SESSION['choice_list'];
    }
}
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
} else {
    $user_id = 1; // Default value for non-logged-in users
}
if (isset($_POST['add_to_choice_list'])) {
    $profileid = $_POST['add_to_choice_list'];
    // Check if the user has reached the limit of 10 rows
    $check_sql = "SELECT COUNT(*) AS count FROM choice_list WHERE user_id = :user_id";
    $check_stmt = $pdo->prepare($check_sql);
    $check_stmt->execute([':user_id' => $user_id]);
    $row = $check_stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['count'] < 10) {
        $sql = "INSERT INTO choice_list (user_id, profile_id, added_timestamp) 
        VALUES (:user_id, :profile_id, DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))
        ON DUPLICATE KEY UPDATE added_timestamp = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':profile_id' => $profileid,
        ]);
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
}
if (isset($_POST['remove_from_choice_list'])) {
    $profileidToRemove = $_POST['remove_from_choice_list'];
    $choiceList = array_diff($choiceList, [$profileidToRemove]);
    $_SESSION['choice_list'] = $choiceList;
    // Delete the record from the database
    if ($user_id !== 0) {
        $sql = "DELETE FROM choice_list WHERE user_id = :user_id AND profile_id = :profile_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':profile_id' => $profileidToRemove,
        ]);
    }
}
$rowCount = count($choiceList);
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
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
    <div class="grid_3">
        <div class="container">
            <div class="breadcrumb1">
                <ul>
                <a href="index.php"><i class="fa fa-home home_1"></i></a>
                <span class="divider">&nbsp;|&nbsp;</span>
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
        padding: 10px 5px;
        text-align: center;
        border: 1px solid #ddd;
    }
    th {
        background: #f0f0f0;
    }
    .sb-biodata-field{
        background: none;
    }
    .payment-form h2{
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
        margin: 25px auto 59px auto;
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
    @media (max-width:480px){
    .soshurbari-animation-icon h3,
    .payment-form h2{
        font-size: 20px;
    }
    th, td {
        padding: 8px 4px;
    }
    }
    @media (max-width: 384px) {
        th, td {
        padding: 5px;
    }
    th {
        font-size: 14px;
    }
    .choice-list-date,
    .remove-button,
    .choice-list-id a span {
        font-size: 12px;
    }
    .contact-bio,
    .copy-sbbio-link {
        margin-left: 10px;
        margin-right: 10px;
        font-size: 13px;
    }
    }
    </style>
    <div class="sb-choice-list-notice">
        <p>আপনি যদি আপনার একাউন্ট লগইন না করেই পছন্দের বায়োডাটাগুলো চয়েস লিস্টে তালিকা ভুক্ত করেন, পরবর্তীতে ব্রাউজার হিস্টোরী ডিলেট অথবা ওয়েবসাইট থেকে যদি বের হয়ে যান, তবে চয়েস লিস্টের বায়োডাটা নাম্বার গুলো অটো রিমুভ হয়ে যাবে। অনুগ্রহ করে আপনার একাউন্ট লগইন করুন।</p>
    </div>
    <div class="shosurbari-biodata-form">
        <div class="shosurbari-animation-form">
            <div class="flex-container">
                <div class="payment-form">
                    <div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                            <h3> <img src="images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
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
                    $rowCount = 0; // Initialize row count variable
                    foreach ($choiceList as $item) {
                    // Split the item into profile ID and date
                    list($profileid, $formattedDateTime) = explode(', ', $item);
                    list($day, $time,) = explode(' ', $formattedDateTime, 2); // Split date and time
                    $formattedTime = date('l h:i A', strtotime($formattedDateTime));
                    $formattedDate = date('d F Y', strtotime($formattedDateTime));
                    $profileLink = "<a href='profile.php?/Biodata=$profileid' target='_blank'>$profileid <span>View</span></a>";
                    echo "<tr>
                    <td class=\"choice-list-id\"> $profileLink</td>
                    <td class=\"choice-list-date\"> $formattedTime <br> $formattedDate </td>
                    <form method='POST' action='choice-list.php'>
                    <input type='hidden' name='remove_from_choice_list' value='$item'>
                    <td>  <button class='remove-button' type='submit'>Remove</button> </td>
                    </form>
                    </tr>";
                    $rowCount++;
                    if ($rowCount >= 10) {
                    echo '<p style="color: #ff0000; margin-bottom: 20px;">পছন্দের তালিকায় ১০টির বেশি বায়োডাটা রাখতে পারবেন না।</p>';
                    break;
                    }
                    }
                    echo "</table> </br>";
                    if (empty($choiceList)) {
                    echo '<p style="color: #ff0000;">আপনি এখনো কোনো বায়োডাটা পছন্দের তালিকায় যুক্ত করেন নাই।</p>';
                    }
                    ?>
                    <?php if ($rowCount > 0): ?>
                        <p style="text-align: left;">পছন্দ করেছেন <?php echo englishToBanglaNumber($rowCount); ?> টি বায়োডাটা, মোট <?php echo englishToBanglaNumber(calculateTotalAmount($rowCount)); ?> টাকা</p>
                    <?php endif; ?>
                    <?php
                    function calculateTotalAmount($rowCount) {
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
                    if ($rowCount >= 1 && $rowCount <= 10) {
                    return $fees[$rowCount];
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
                    var numIds = <?php echo $rowCount; ?>;
                    setCookie("choice_list_ids", numIds, 30); // Change 30 to the number of days you want the cookie to persist
                    </script>
                    <?php
                    if (isset($_POST['make_payment'])) {
                        header("Location: payment-shosurbari.php?Biodata=" . urlencode($idList));
                        exit;
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
                        echo "<form method='GET' action='payment-shosurbari.php' class='copy-sbbio-link'>
                        <input type='hidden' name='Biodata' value=\"$idList\">
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
    <h1><span class="shosurbari-heading-span"> বায়োডাটার </span>মূল্য তালিকা</h1>
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
                <p><i class="fa fa-bell" style="color: #0aa4ca; margin-right: 10px;"></i>শ্বশুরবাড়ি ডট কমের পাত্র-পাত্রীদের সাথে যোগাযোগ করতে চাইলে সামান্য সার্ভিস চার্জ প্রদান করতে হবে, যার বায়োডাটা তাদের থেকে কোনো টাকা নেয়া হয় না। আপনার পেমেন্ট সম্পন্ন হয়ে গেলে, পেমেন্ট তথ্যগুলো যাচাইবাচায়ের পর ২৪ ঘন্টার মধ্যে আপনাকে পাত্র/পাত্রীর অভিভাবকের নাম্বর পাঠিয়ে দেয়া হবে। <span style="color:#06b6d4;"> নিচের টাকা ব্যাতিত বিয়ের পর অথবা বিয়ের আগে আর কোনো টাকা নেয়া হয় না।</span> আপনি চাইলে এক বা একাধিক পাত্র/পাত্রীর সাথে যোগাযোগ করতে পারবেন। দেখেনিন ১ থেকে ১০টি বায়োডাটার প্যাকেজ মূল্য সহ এভারেজ মূল্য।</p>
                </br><p><i class="fa fa-bell-slash" style="color: #ff0080; margin-right: 10px;"></i>যোগাযোগের জন্য পাত্র-পাত্রীর অভিভাবকের মোবাইল নাম্বার প্রদান করা হবে। পাত্র-পাত্রীর মোবাইল নাম্বার প্রদান করা হয় না। তবে অভিভাবক অনুমতি দিলে পাত্র-পাত্রীর ই-মেইল প্রদান করা হবে।</p>
            </div>
            <div class="sb-package">
                <div class="sb-package-list" style="background: #c4b5fd;">
                    <h2>বায়োডাটা: ১টি</h2>
                    <h3>প্যাকেজ মূল্য: ১৪৫ ৳</h3>
                    <p>এভারেজ মূল্য: ১৪৫ ৳</p>
                </div>
                <div class="sb-package-list" style="background: #fed7aa;">
                    <h2>বায়োডাটা: ২টি</h2>
                    <h3>প্যাকেজ মূল্য: ২৮০ ৳</h3>
                    <p>এভারেজ মূল্য: ১৪০ ৳</p>
                </div>
                <div class="sb-package-list" style="background: #bae6fd;">
                    <h2>বায়োডাটা: ৩টি</h2>
                    <h3>প্যাকেজ মূল্য: ৩৯০ ৳</h3>
                    <p>এভারেজ মূল্য: ১৩০ ৳</p>
                </div>
                <div class="sb-package-list" style="background: #d9f99d;">
                    <h2>বায়োডাটা: ৪টি</h2>
                    <h3>প্যাকেজ মূল্য: ৫০০ ৳</h3>
                    <p>এভারেজ মূল্য: ১২৫ ৳</p>
                </div>
                <div class="sb-package-list" style="background: #a5f3fc;">
                    <h2>বায়োডাটা: ৫টি</h2>
                    <h3>প্যাকেজ মূল্য: ৬০০ ৳</h3>
                    <p>এভারেজ মূল্য: ১২০ ৳</p>
                </div>
                <div class="sb-package-list" style="background: #cbd5e1;">
                    <h2>বায়োডাটা: ৬টি</h2>
                    <h3>প্যাকেজ মূল্য: ৬৯০ ৳</h3>
                    <p>এভারেজ মূল্য: ১১৫ ৳</p>
                </div>
                <div class="sb-package-list" style="background: #fde68a;">
                    <h2>বায়োডাটা: ৭টি</h2>
                    <h3>প্যাকেজ মূল্য: ৭৭০ ৳</h3>
                    <p>এভারেজ মূল্য: ১১০ ৳</p>
                </div>
                <div class="sb-package-list" style="background: #fca5a5;">
                    <h2>বায়োডাটা: ৮টি</h2>
                    <h3>প্যাকেজ মূল্য: ৮৪০ ৳</h3>
                    <p>এভারেজ মূল্য: ১০৫ ৳</p>
                </div>
                <div class="sb-package-list" style="background: #f5d0fe;">
                    <h2>বায়োডাটা: ৯টি</h2>
                    <h3>প্যাকেজ মূল্য: ৯০০ ৳</h3>
                    <p>এভারেজ মূল্য: ১০০ ৳</p>
                </div>
                <div class="sb-package-list" style="background: #bbf7d0;">
                    <h2>বায়োডাটা: ১০টি</h2>
                    <h3>প্যাকেজ মূল্য: ৯৮০ ৳</h3>
                    <p>এভারেজ মূল্য: ৯৮ ৳</p>
                </div>
            </div>
	    </form>
    </div> 
  </div>
    <!--=======================================
    How Many Visitors View This Page.
    This Script Connected to get_view_count.php
    and page_views Database Table
    ========================================-->
    <script>
    $(document).ready(function() {
    var pages = ["choice-list"];
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
	<!--=======  Footer Start ========-->
	<?php include_once("footer.php");?>
	<!--=======  Footer End  =========-->
</body>
</html>