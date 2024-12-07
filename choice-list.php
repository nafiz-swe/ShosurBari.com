<?php include_once("functions.php"); ?>

<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

session_start();
if(isloggedin()){
} else{
 header("location:login.php");
}
$host = "localhost";
$username = "shosurbaricom";
$password = "SoftwareEngineer@480";
$dbname = "shosurbaridb";
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
    VALUES (:user_id, :profile_id, NOW())
    ON DUPLICATE KEY UPDATE added_timestamp = NOW()";

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
    // Get the profile_id and datetime part
    $profileidToRemove = $_POST['remove_from_choice_list'];
    list($profileid, $formattedDateTime) = explode(', ', $profileidToRemove);  // Split by comma to get profile_id

    // Remove the profile_id from the session choice list
    $choiceList = array_diff($choiceList, [$profileidToRemove]);
    $_SESSION['choice_list'] = $choiceList;

    // Delete the record from the database using the correct profile_id
    if ($user_id !== 0) {
        $sql = "DELETE FROM choice_list WHERE user_id = :user_id AND profile_id = :profile_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':profile_id' => $profileid,  // Pass only profile_id here
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
        '1' => 70,
        '2' => 135,
        '3' => 195,
        '4' => 250,
        '5' => 300,
        '6' => 345,
        '7' => 385,
        '8' => 415,
        '9' => 440,
        '10' => 460,
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
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="description" content="Curate your preferences with ShosurBari's Choice List. Tailor your search for a Bengali life partner based on your preferences and priorities.">
<link rel="icon" href="images/shosurbari-icon.png" type="image/png"/>
<meta property="og:image" content="https://www.shosurbari.com/images/shosurbari-social-share.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Atma" rel="stylesheet" media="print" onload="this.media='all'">
<link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet" media="print" onload="this.media='all'">
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css' media="print" onload="this.media='all'">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script defer>
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        var gtmScript = document.createElement('script');
        gtmScript.async = true;
        gtmScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-2Q53085HTX';
        document.head.appendChild(gtmScript);
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-2Q53085HTX');
    }, 3000);  // Delay for 3 seconds 
});
</script>  <!-- Google Analytics / Users Monitoring -->
</head>
<body>
	<!-- ===========  Navigation Start =========== -->
	<?php include_once("includes/navigation.php");?>
	<!-- ===========  Navigation End ============= -->
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
        background: #007a9a;
		color: #fff;
		font-weight: 500;
    }
    .card-package h1 {
        text-align: center;
        text-transform: uppercase;
        font-size: 22px;
        color: black;
        margin-top: -80px;
        margin-bottom: 15px;
        width: 200px;
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
    }
    </style>
    <div class="grid_3">
        <div class="container">
            <div class="breadcrumb1">
                <ul>
				 <li><a href="index.php" aria-label="ShosurBari Home"><i class="fa fa-home home_1"></i></a></li>
				 <li><span class="divider">&nbsp;|&nbsp;</span></li>
                <li class="current-page"><h4>Choice List</h4></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sb-home-search">
		<h1><span class="shosurbari-heading-span"> পছন্দের বায়োডাটার </span>তালিকা</h1>
		<div class="sbhome-heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
		</div>
	</div>
    <div class="sb-choice-list-notice">
        <p>আপনি যেই কয়টি বায়োডাটার সাথে সরাসরি যোগাযোগ করতে আগ্রহী শুধুমাত্র সেই কয়টি বায়োডাটার জন্য পেমেন্ট করতে হবে। আপনি একই সাথে সর্বোচ্চ ১০টি বায়োডাটা পছন্দের তালিকায় যুক্ত করে পেমেন্ট করতে পারবেন। ১০টির অধিক বায়োডাটার সাথে যোগাযোগ করতে আগ্রহী হইলে আপনাকে প্রথমে ১০টি বায়োডাটার জন্য পেমেন্ট সম্পন্ন করতে হবে, পেমেন্ট সম্পন্ন হবার পর এই পেজে এসে পূর্বের সব কয়টি বায়োডাটা রিমুভ করুন, তারপর নতুন করে বায়োডাটা যুক্ত করে পেমেন্ট করতে হবে। </p>
    </div>
    <div class="shosurbari-biodata-form">
        <div class="shosurbari-animation-form">
            <div class="flex-container">
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
                <div class="payment-form">
                    <div class="soshurbari-animation-icon">
                        <div class="sb-icon-laptop">
                            <h3> <img src="images/shosurbari-logo-form.png" alt="ShosurBari Form Icon"></h3>
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
                    $formattedDate = date('D h:i A, d F Y', strtotime($formattedDateTime));
                    $profileLink = "<a href='profile.php?/Biodata=$profileid' target='_blank'>$profileid <span>View</span></a>";
                    echo "<tr>
                    <td class=\"choice-list-id\"> $profileLink</td>
                    <td class=\"choice-list-date\"> $formattedDate </td>
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
                        <p style="text-align: left;">পছন্দ করেছেন <?php echo englishToBanglaNumber($rowCount); ?> টি বায়োডাটা, মোট <?php echo englishToBanglaNumber(calculateTotalAmount($rowCount)); ?> টাকা।</p>
                    <?php endif; ?>
                    <?php
                    function calculateTotalAmount($rowCount) {
                    $fees = [
                    '1' => 70,
                    '2' => 135,
                    '3' => 195,
                    '4' => 250,
                    '5' => 300,
                    '6' => 345,
                    '7' => 385,
                    '8' => 415,
                    '9' => 440,
                    '10' => 460,
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
        <h1><span class="shosurbari-heading-span"> আমাদের </span>সার্ভিস</h1>
        <div class="sbhome-heart-divider">
            <span class="grey-line"></span>
                <i class="fa fa-heart pink-heart"></i>
                <i class="fa fa-heart grey-heart"></i>
            <span class="grey-line"></span>
        </div>
    </div>
    <div class="shosurbari-user-info">
        <div class="sb-biodata-amount-list">
        <p><i id="bell" class="fa fa-bell"></i> বিয়ের জন্য শ্বশুরবাড়ি ডট কমের পাত্র-পাত্রীর সাথে যোগাযোগ করতে আগ্রহী হইলে সার্ভিস চার্জ প্রদান করতে হবে, বায়োডাটা কতৃপক্ষের থেকে কোনো সার্ভিস চার্জ নেয়া হয় না। সার্চ ফিল্টার ব্যবহার করে খুঁজেনিন স্বপ্নময় জীবনসঙ্গী। আপনার পেমেন্ট সম্পন্ন হবার পর, ২৪ ঘন্টার মধ্যে যোগাযোগের জন্য অভিভাবকের মোবাইল নাম্বার আপনাকে SMS বা ই-মেইলের মাধ্যমে প্রদান করা হবে।
        <span style="color:#007a9a;">  বিস্তারিত জানতে আমাদের <a href="faq.php">প্রশ্ন ও উত্তর</a> সেকশনের ১০ থেকে ১৪ নাম্বার পর্যন্ত আর্টিকেল গুলো পড়ুন।</p>
        </div>
        <div class="shoshurbari-package-card">
            <div class="card-header">
                <h1>BRONZE</h1>
            </div>
            <div class="card-package">
                <h1>৭০ ৳</h1>
                <p>বায়োডাটা: ১টি</p>
                <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
                <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
            </div>
        </div>
        <div class="shoshurbari-package-card">
            <div class="card-header">
                <h1>SILVER</h1>
            </div>
            <div class="card-package">
                <h1>১৩৫ ৳</h1>
                <p>বায়োডাটা: ২টি</p>
                <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
                <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
            </div>
        </div>
        <div class="shoshurbari-package-card">
            <div class="card-header">
                <h1>GOLD</h1>
            </div>
            <div class="card-package">
                <h1>১৯৫ ৳</h1>
                <p>বায়োডাটা: ৩টি</p>
                <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
                <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
            </div>
        </div>
        <div class="shoshurbari-package-card">
            <div class="card-header">
                <h1>PLATINUM</h1>
            </div>
            <div class="card-package">
                <h1>২৫০ ৳</h1>
                <p>বায়োডাটা: ৪টি</p>
                <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
                <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
            </div>
        </div>
        <div class="shoshurbari-package-card">
            <div class="card-header">
                <h1>DIAMOND</h1>
            </div>
            <div class="card-package">
                <h1>৩০০ ৳</h1>
                <p>বায়োডাটা: ৫টি</p>
                <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
                <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
            </div>
        </div>
        <div class="shoshurbari-package-card">
            <div class="card-header">
                <h1>TITANIUM</h1>
            </div>
            <div class="card-package">
                <h1>৩৪৫ ৳</h1>
                <p>বায়োডাটা: ৬টি</p>
                <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
                <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
            </div>
        </div>
        <div class="shoshurbari-package-card">
            <div class="card-header">
                <h1>RUBY</h1>
            </div>
            <div class="card-package">
                <h1>৩৮৫ ৳</h1>
                <p>বায়োডাটা: ৭টি</p>
                <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
                <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
            </div>
        </div>
        <div class="shoshurbari-package-card">
            <div class="card-header">
                <h1>EMERALD</h1>
            </div>
            <div class="card-package">
                <h1>৪১৫ ৳</h1>
                <p>বায়োডাটা: ৮টি</p>
                <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
                <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
            </div>
        </div>
        <div class="shoshurbari-package-card">
            <div class="card-header">
                <h1>SAPPHIRE</h1>
            </div>
            <div class="card-package">
                <h1>৪৪০ ৳</h1>
                <p>বায়োডাটা: ৯টি</p>
                <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
                <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
            </div>
        </div>
        <div class="shoshurbari-package-card">
            <div class="card-header">
                <h1>TOPAZ</h1>
            </div>
            <div class="card-package">
                <h1>৪৬০ ৳</h1>
                <p>বায়োডাটা: ১০টি</p>
                <p>অভিভাবকের নাম্বার: <i class="fa fa-check"></i></p>
                <p>পাত্র-পাত্রীর নাম্বার: <i class="fa fa-close"></i></p>
            </div>
        </div>
    </div>
	<!--View This Page. Connected to get view count -->
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
