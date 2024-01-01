<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
$_SESSION['user_logged_in'] = true;
error_reporting(0);
if (!isset($_SESSION['admin_id'])) {
  header("location: ../abdur-rahman/admin_login.php");
  exit;
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <link rel="icon" href="../images/shosurbari-icon-admin.png" type="image/png">
    <title>Home-Admin | ShosurBari</title>
</head>
<body>
    <!-- ====== Admin Panel Navigation Bar ====== -->
    <?php include("admin_navigation.php"); ?>
    <!-- ========================================= -->
    <style>
    .sb-admin-info{
        margin: auto;
        overflow-y: hidden;
        background: #fff;
    }
    .recent-post-wrapper {
        margin: auto;
        overflow-y: hidden;
    }
    .sb-admin-title{
        text-align: left;
        font-size: 20px;
        color: #333;
        margin: 0px auto 0px auto;
        background: #fff;
    }
   .recent-post-title h2,
   .realtime-title h2 {
        color: #fff;
        background: #00c292;
        text-align: left;
        font-size: 25px;
        margin: 0px auto 0px auto;
        padding: 20px;
        padding-bottom: 10px;
        padding: 10px;
    }
    .realtime-ctn {
        color: #fff;
        background: #00c292;
        text-align: left;
        font-size: 25px;
        margin: 0px auto 0px auto;
        padding: 20px;
        padding-bottom: 10px;
        padding: 10px;
    }
    .sb-all-page-view {
        text-align: left;
        font-size: 25px;
        margin: 0px auto 0px auto;
        padding: 20px;
        padding-bottom: 10px;
        color: #fff;
        padding: 10px;
    }

    table {
    border: none;
    margin: auto;
    text-align: center;
    width: auto;
    min-width: 500px;
    max-height: 400px;
    overflow-y: scroll; /* Always show scrollbar */
}

tbody {
    display: block;
    overflow-y: scroll;
    max-height: inherit;
}


    th{
        background: #00c292;
        color: #fff;
        padding: 4px;
        text-align: center;
    }
    td{
        border: 1px solid #ccc;
        padding: 6px;
    }
    .row .col-lg-4 {
        margin-bottom: 30px;
    }
    .col-lg-4{
        margin-top: 150px;
    }
    .notika-status-area{
        margin-top: 50px;
        margin-bottom: 50px;
    }
    </style>
    <!-- Start Email Statistic area-->
    <div class="notika-email-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-post-title">
                        <h2 class='sb-all-page-view'>Web Visitors Page View</h2>
                    </div>
                    <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <?php
                            require_once("includes/dbconn.php");
                            $totalViewCount = 0;
                            // Function to capitalize the first letter of each word
                            function capitalizeWords($str) {
                                return ucwords($str);
                            }
                            // Get the visitor's IP address
                            $visitorIP = $_SERVER['REMOTE_ADDR'];
                            // Check if the visitor's IP is already recorded in the database
                            $check_visitor_sql = "SELECT COUNT(*) AS visitor_count FROM page_views WHERE visitor_ip = '$visitorIP'";
                            $check_result = $conn->query($check_visitor_sql);
                            if ($check_result) {
                                $visitor_row = $check_result->fetch_assoc();
                                $visitorCount = $visitor_row['visitor_count'];
                                // If the visitor is not recorded, add their IP to the database
                                if ($visitorCount === 0) {
                                    $add_visitor_sql = "INSERT INTO page_views (page_name, visitor_ip, view_count, last_update) VALUES ('Visitor Page', '$visitorIP', 1, NOW())";
                                    $conn->query($add_visitor_sql);
                                }
                            }
                            // Retrieve page view counts from the database
                            $select_all_sql = "SELECT page_name, view_count, last_update FROM page_views WHERE page_name != 'Visitor Page'";
                            $result = $conn->query($select_all_sql);
                            if ($result) {
                                // Create an array to store the rows
                                $rows = array();
                                while ($row = $result->fetch_assoc()) {
                                    $pageName = $row['page_name'];
                                    $viewCount = $row['view_count'];
                                    $lastUpdate = $row['last_update'];
                                    $rows[] = array(
                                        "pageName" => $pageName,
                                        "viewCount" => $viewCount,
                                        "lastUpdate" => $lastUpdate
                                    );
                                    $totalViewCount += $viewCount;
                                }
                                // Sort the array by the "View" column in descending order
                                usort($rows, function($a, $b) {
                                    return $b['viewCount'] - $a['viewCount'];
                                });
                                echo "<table>";
                                echo "<tr>
                                    <th>Page Name</th>
                                    <th style=\"border: 1px solid #f0f0f0;\">View</th>
                                    <th>Last Visit</th>
                                </tr>";
                                // Display the sorted rows
                                foreach ($rows as $row) {
                                    $pageName = $row['pageName'];
                                    $viewCount = $row['viewCount'];
                                    $lastUpdate = $row['lastUpdate'];
                                    $pageName = str_replace("get_view_count.php?page=", "", $pageName);
                                    // Capitalize the first letter of each word in pageName
                                    $pageName = capitalizeWords($pageName);
                                    echo "<tr>
                                        <td style=\"text-align:center;\">$pageName</td>
                                        <td style=\"text-align:center;\">$viewCount</td>
                                        <td>$lastUpdate</td>
                                    </tr>";
                                }
                                echo "</table>";
                                $totalViewCount += $viewCount;

                            } else {
                                echo "Error retrieving page view counts: " . $conn->error;
                            }
                            // Unique Visitor Activity List START
                            $total_visitor_sql = "SELECT COUNT(*) FROM unique_visitors";
                            $total_visitor_count = $conn->query($total_visitor_sql)->fetch_row()[0];
                            //last year unique visitor count
                            $last_year_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
                            $last_year_count = $conn->query($last_year_sql)->fetch_row()[0];
                            //last month unique visitor count
                            $last_month_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
                            $last_month_count = $conn->query($last_month_sql)->fetch_row()[0];
                            //last week unique visitor count
                            $last_week_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                            $last_week_count = $conn->query($last_week_sql)->fetch_row()[0];
                            //last 24 hours unique visitor count
                            $last_24_hours_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 24 HOUR)";
                            $last_24_hours_count = $conn->query($last_24_hours_sql)->fetch_row()[0];
                            //last 1 hour unique visitor count
                            $last_1_hour_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 HOUR)";
                            $last_1_hour_count = $conn->query($last_1_hour_sql)->fetch_row()[0];
                            //Unique Visitor Activity List END
                            // Customers Activity and Sale Biodata Result START
                            $sql = "SELECT COUNT(*) as totalCustomers FROM customer_sent_info_complete";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $totalCustomers = $row['totalCustomers'];
                            // Calculate the totals for each payment method
// Function to get the count of records for a specific payment method
function getPaymentMethodCount($conn, $paymentMethod)
{
    $sql = "SELECT COUNT(*) as count FROM customer_sent_info_complete WHERE real_payment_method LIKE '%$paymentMethod%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = $result->fetch_assoc()['count'];
        return $count;
    } else {
        return 0; // No rows found
    }
}

// Example usage
$bkashTotal = getPaymentMethodCount($conn, 'বিকাশ');
$nagadTotal = getPaymentMethodCount($conn, 'নগদ');
$roketTotal = getPaymentMethodCount($conn, 'রকেট');
                            // Query to get the total number of distinct user_ids in the 'customer' table
                           
                            $sql = "SELECT COUNT(DISTINCT user_id) as totalUsers FROM customer_sent_info_complete WHERE user_id != 0 AND user_id IS NOT NULL";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $totalUsers = $row['totalUsers'];
                            // Customers Activity and Sale Biodata Result END


                            // Which Package Howmany Sale START
                            // Biodata 1
                            $sqlValue1 = "SELECT COUNT(*) as countValue1 FROM customer_sent_info_complete WHERE payment_biodata_quantity REGEXP '১[[:space:]]*টি*'";
                            $resultValue1 = mysqli_query($conn, $sqlValue1);
                            $rowValue1 = mysqli_fetch_assoc($resultValue1);
                            $countValue1 = $rowValue1['countValue1'];
                            // Biodata 2
                            $sqlValue2 = "SELECT COUNT(*) as countValue2 FROM customer_sent_info_complete WHERE payment_biodata_quantity REGEXP '২[[:space:]]*টি*'";
                            $resultValue2 = mysqli_query($conn, $sqlValue2);
                            $rowValue2 = mysqli_fetch_assoc($resultValue2);
                            $countValue2 = $rowValue2['countValue2'];
                            // Biodata 3
                            $sqlValue3 = "SELECT COUNT(*) as countValue3 FROM customer_sent_info_complete WHERE payment_biodata_quantity REGEXP '৩[[:space:]]*টি*'";
                            $resultValue3 = mysqli_query($conn, $sqlValue3);
                            $rowValue3 = mysqli_fetch_assoc($resultValue3);
                            $countValue3 = $rowValue3['countValue3'];
                            // Biodata 4
                            $sqlValue4 = "SELECT COUNT(*) as countValue4 FROM customer_sent_info_complete WHERE payment_biodata_quantity REGEXP '৪[[:space:]]*টি*'";
                            $resultValue4 = mysqli_query($conn, $sqlValue4);
                            $rowValue4 = mysqli_fetch_assoc($resultValue4);
                            $countValue4 = $rowValue4['countValue4'];
                            // Biodata 5
                            $sqlValue5 = "SELECT COUNT(*) as countValue5 FROM customer_sent_info_complete WHERE payment_biodata_quantity REGEXP '৫[[:space:]]*টি*'";
                            $resultValue5 = mysqli_query($conn, $sqlValue5);
                            $rowValue5 = mysqli_fetch_assoc($resultValue5);
                            $countValue5 = $rowValue5['countValue5'];
                            // Biodata 6
                            $sqlValue6 = "SELECT COUNT(*) as countValue6 FROM customer_sent_info_complete WHERE payment_biodata_quantity REGEXP '৬[[:space:]]*টি*'";
                            $resultValue6 = mysqli_query($conn, $sqlValue6);
                            $rowValue6 = mysqli_fetch_assoc($resultValue6);
                            $countValue6 = $rowValue6['countValue6'];
                            // Biodata 7
                            $sqlValue7 = "SELECT COUNT(*) as countValue7 FROM customer_sent_info_complete WHERE payment_biodata_quantity REGEXP '৭[[:space:]]*টি*'";
                            $resultValue7 = mysqli_query($conn, $sqlValue7);
                            $rowValue7 = mysqli_fetch_assoc($resultValue7);
                            $countValue7 = $rowValue7['countValue7'];
                            // Biodata 8
                            $sqlValue8 = "SELECT COUNT(*) as countValue8 FROM customer_sent_info_complete WHERE payment_biodata_quantity REGEXP '৮[[:space:]]*টি*'";
                            $resultValue8 = mysqli_query($conn, $sqlValue8);
                            $rowValue8 = mysqli_fetch_assoc($resultValue8);
                            $countValue8 = $rowValue8['countValue8'];
                            // Biodata 9
                            $sqlValue9 = "SELECT COUNT(*) as countValue9 FROM customer_sent_info_complete WHERE payment_biodata_quantity REGEXP '৯[[:space:]]*টি*'";
                            $resultValue9 = mysqli_query($conn, $sqlValue9);
                            $rowValue9 = mysqli_fetch_assoc($resultValue9);
                            $countValue9 = $rowValue9['countValue9'];
                            // Biodata 10
                            $sqlValue10 = "SELECT COUNT(*) as countValue10 FROM customer_sent_info_complete WHERE payment_biodata_quantity REGEXP '১০[[:space:]]*টি*'";
                            $resultValue10 = mysqli_query($conn, $sqlValue10);
                            $rowValue10 = mysqli_fetch_assoc($resultValue10);
                            $countValue10 = $rowValue10['countValue10'];
                            // Which Package Howmany Sale END



                            function banglaNumberToInteger($banglaNumber)
                            {
                                $numberMap = [
                                    '১' => 1,
                                    '২' => 2,
                                    '৩' => 3,
                                    '৪' => 4,
                                    '৫' => 5,
                                    '৬' => 6,
                                    '৭' => 7,
                                    '৮' => 8,
                                    '৯' => 9,
                                    '১০' => 10,
                                ];
                            
                                // Remove 'টি' and spaces
                                $cleanedNumber = str_replace(['টি', ' '], '', $banglaNumber);
                            
                                // Convert to integer using the mapping
                                $integerValue = $numberMap[$cleanedNumber];
                            
                                return $integerValue;
                            }
                            
                            function calculateBanglaNumberSumFromDatabase($conn)
                            {
                                $sql = "SELECT payment_biodata_quantity FROM customer_sent_info_complete";
                                $result = $conn->query($sql);
                            
                                if ($result->num_rows > 0) {
                                    $sum = 0;
                            
                                    while ($row = $result->fetch_assoc()) {
                                        $banglaNumber = $row['payment_biodata_quantity'];
                                        $sum += banglaNumberToInteger($banglaNumber);
                                    }
                            
                                    return $sum;
                                } else {
                                    return 0; // No rows found
                                }
                            }
                            
                            // Example usage
                            $totalBiodata = calculateBanglaNumberSumFromDatabase($conn);






// Initialize variables to store sums for different time periods
$valuesToFind = [145, 280, 390, 500, 600, 690, 770, 840, 900, 980];
$totalSum = 0;
$todaySum = 0;
$thisWeekSum = 0;
$lastWeekSum = 0;
$thisMonthSum = 0;
$lastMonthSum = 0;
$thisYearSum = 0;
$lastYearSum = 0;

$query = "SELECT payment_amount, cust_payment_date FROM customer_sent_info_complete";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data = $row['payment_amount'];
        $requestDate = DateTime::createFromFormat('D d F Y, g:i A', $row['cust_payment_date']);

        // Use a regular expression to extract numbers from the text
        preg_match_all('/\d+/', $data, $matches);
        $quantities = $matches[0];

        foreach ($quantities as $quantity) {
            $quantity = (int) $quantity;

            if (in_array($quantity, $valuesToFind)) {
                $totalSum += $quantity;

                $startOfDay = new DateTime('today');
                $endOfDay = new DateTime('tomorrow');

                if ($requestDate >= $startOfDay && $requestDate < $endOfDay) {
                    $todaySum += $quantity;
                }

                $startOfThisWeek = new DateTime('last Saturday');
                $endOfThisWeek = new DateTime('next Saturday');

                // Adjust the end of the week to be on Friday
                $endOfThisWeek->modify('-1 day');

                if ($requestDate >= $startOfThisWeek && $requestDate < $endOfThisWeek) {
                    $thisWeekSum += $quantity;
                }

                $startOfLastWeek = new DateTime('2 Saturdays ago');
                $endOfLastWeek = new DateTime('last Friday');

                if ($requestDate >= $startOfLastWeek && $requestDate <= $endOfLastWeek) {
                    $lastWeekSum += $quantity;
                }

                $startOfMonth = new DateTime('first day of this month');
                $endOfMonth = new DateTime('first day of next month');

                if ($requestDate >= $startOfMonth && $requestDate < $endOfMonth) {
                    $thisMonthSum += $quantity;
                }

                $startOfLastMonth = new DateTime('first day of last month');
                $endOfLastMonth = new DateTime('first day of this month');

                if ($requestDate >= $startOfLastMonth && $requestDate < $endOfLastMonth) {
                    $lastMonthSum += $quantity;
                }

                $startOfYear = new DateTime('first day of this year');
                $endOfYear = new DateTime('first day of next year');

                if ($requestDate >= $startOfYear && $requestDate < $endOfYear) {
                    $thisYearSum += $quantity;
                }

                $startOfLastYear = new DateTime('first day of last year');
                $endOfLastYear = new DateTime('first day of this year');

                if ($requestDate >= $startOfLastYear && $requestDate < $endOfLastYear) {
                    $lastYearSum += $quantity;
                }
            }
        }
    }
} else {
    echo "Error in SQL query: " . mysqli_error($conn);
}

// Now you have $totalSum, $todaySum, $thisWeekSum, $lastWeekSum, $thisMonthSum, $lastMonthSum, $thisYearSum, $lastYearSum for different time periods.


// Now you have $totalSum, $todaySum, $thisWeekSum, $lastWeekSum, $thisMonthSum, $lastMonthSum, $thisYearSum, $lastYearSum for different time periods.


// Now you have $totalSum, $todaySum, $thisWeekSum, $lastWeekSum, $thisMonthSum, $lastMonthSum, $thisYearSum, $lastYearSum for different time periods.


                            // Total Profit of Last time END
                            // Last Time Show, Sale Biodata START
                            function getRequestDateForLastCustomerId($conn) {
                                // Query to retrieve the last inserted record's request_date
                                $sql = "SELECT request_date FROM customer WHERE id_customer = (SELECT MAX(id_customer) FROM customer)";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $lastRequestDate = $row['request_date'];

                                        return $lastRequestDate;
                                    } else {
                                        return "No records found"; // Handle the case where no records exist in the table
                                    }
                                } else {
                                    echo "Error in SQL query: " . mysqli_error($conn);
                                    return "Error in SQL query";
                                }
                            }
                            // Call the function to get the request_date for the last customer ID
                            $lastRequestDate = getRequestDateForLastCustomerId($conn);
                            // Your existing code for displaying admins
                            $admins_query = "SELECT * FROM admin";
                            $admins_result = mysqli_query($conn, $admins_query);
                            // Last Time Show, Sale Biodata END
                            $conn->close(); 
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-post-title">
                        <h2 class="sb-all-page-view">Realtime Visitors</h2>
                    </div>
                    <div class="realtime-wrap notika-shadow mg-t-30">
                        <div class="realtime-visitor-ctn">
                            <div class="realtime-vst-sg">
                                <h4><span class="counter"><?php echo $last_1_hour_count; ?></span></h4>
                                <p>Visitors last 1h</p>
                            </div>
                            <div class="realtime-vst-sg">
                                <h4><span class="counter"><?php echo $last_24_hours_count; ?></span></h4>
                                <p>Visitors last 24h</p>
                            </div>
                        </div>
                        <div class="realtime-map">
                            <div class="vectorjsmarp" id="world-map"></div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-post-title">
                        <h2 class="sb-all-page-view">Admins</h2>
                    </div>
                    <div class="email-statis-inner notika-shadow">
                    <?php
if ($admins_result) {
    echo "<div class='sb-admin-info'>";
    echo "<table border='1'>";
    echo "<tr><th>Full Name</th><th>Username</th><th>Email</th><th>Register Date</th><th>Last_Login</th><th>Status</th><th>Action</th></tr>";

    while ($admin_row = mysqli_fetch_assoc($admins_result)) {
        $admin_id = $admin_row['admin_id'];
        $fullname = $admin_row['fullname'];
        $username = $admin_row['username'];
        $email = $admin_row['email'];
        $register_date = $admin_row['register_date'];
        $last_login = $admin_row['last_login'];
        $status = $admin_row['active']; // Assuming 'active' is the column name for the active/deactivate status
    
        // Set the background color based on the status
        $bgColor = ($status == '1') ? '' : '#ff0080';
    
        echo "<tr style='background-color: $bgColor;'><td>$fullname</td><td>$username</td><td>$email</td><td>$register_date</td><td>$last_login</td><td id='status_$admin_id'>$status</td>";
        echo "<td><button onclick='confirmToggleStatus($admin_id)'>A/D</button></td></tr>";
    }
    

    echo "</table>";
    echo "</div>";

}
?>

                    </div>
                </div>
                

            </div>
        </div>
    </div>
    <!-- End Email Statistic area-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="recent-post-title">
                <h2 class="sb-all-page-view">Website Traffics</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0dabe229;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"> <?php echo $last_week_count; ?></span></h2>
                            <p>Last Week Visitors</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0dabe229;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $last_month_count; ?></span></h2>
                            <p>Last Month Visitors</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0dabe229;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $last_year_count; ?></span></h2>
                            <p>Last Year Visitors</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0dabe229;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $total_visitor_count; ?></span></h2>
                            <p>Total Visitors</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="recent-post-title">
                <h2 class="sb-all-page-view">Customers & Registered Biodata</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0a11c526;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $totalCustomers; ?></span></h2>
                            <p>How Many Times sold</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0a11c526;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $totalUsers; ?></span></h2>
                            <p>Registered Customers</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0a11c526;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $totalBiodata; ?></span></h2>
                            <p>Total Biodata Sales</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0a11c526;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2 style="font-size: 15px; margin-top: -10px; margin-bottom: 0px; line-height: 24px;"><?php echo $lastRequestDate; ?></h2>
                            <p>Last Biodata Request</p>
                        </div>
                        <div class="sparkline-bar-stats3">3,5,8,4,7,9,4,8,9,5,9,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="recent-post-title">
                <h2 class="sb-all-page-view">Payment Method & Revenue</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $bkashTotal; ?></span></h2>
                            <p>Total Bkash Payment</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"> <?php echo $roketTotal; ?></span></h2>
                            <p>Total Rocket Payment</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $nagadTotal; ?></span></h2>
                            <p>Total Nagad Payment</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $totalSum; ?></span> ৳</h2>
                            <p>Total Revenue</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->
    <!-- Start Pakeges area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $todaySum; ?> </span> ৳</h2>
                            <p>Today's Revenue</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"> <?php echo $thisWeekSum; ?></span> ৳</h2>
                            <p>This Week's Revenue</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $thisMonthSum; ?></span> ৳</h2>
                        <p>This Month's Revenue</p>
                        </div>
                        <div class="sparkline-bar-stats3">3,5,8,4,7,9,4,8,9,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"> <?php echo $thisYearSum; ?></span> ৳</h2>
                            <p>This Year's Revenue</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $lastWeekSum; ?></span> ৳</h2>
                            <p>Last Week's Revenue</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $lastMonthSum; ?> </span> ৳</h2>
                            <p>Last Month's Revenue</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $lastYearSum; ?></span> ৳</h2>
                            <p>Last Year's Revenue</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="notika-status-area">
        <div class="container">
            <div class="recent-post-title">
                <h2 class="sb-all-page-view">Popular Package</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $countValue1; ?></span></h2>
                        <p>BRONZE | ১টি | ১৪৫ ৳</p>
                        </div>
                        <div class="sparkline-bar-stats3">3,5,8,4,7,9,4,8,9,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $countValue2; ?></span></h2>
                        <p>SILVER | ২টি | ২৮০ ৳</p>
                        </div>
                        <div class="sparkline-bar-stats3">3,5,8,4,7,9,4,8,9,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $countValue3; ?></span></h2>
                            <p>GOLD | ৩টি | ৩৯০ ৳</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $countValue4; ?></span></h2>
                            <p>PLATINUM | ৪টি | ৫০০ ৳</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $countValue5; ?></span></h2>
                            <p>DIAMOND | ৫টি | ৬০০ ৳</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $countValue6; ?></span></h2>
                        <p>TITANIUM | ৬টি | ৬৯০ ৳</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $countValue7; ?></span></h2>
                            <p>RUBY | ৭টি | ৭৭০ ৳</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $countValue8; ?></span></h2>
                        <p>EMERALD | ৮টি | ৮৪০ ৳</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
            </div>
        </div>
    </div>
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $countValue9; ?></span></h2>
                            <p>SAPPHIRE | ৯টি | ৯০০ ৳</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $countValue10; ?></span></h2>
                        <p>TOPAZ | ১০টি | ৯৮০ ৳</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pakeges area-->
    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="recent-post-title">
                        <h2 class="sb-all-page-view">Total Page Views</h2>
                    </div>
                    <div class="statistic-right-area notika-shadow mg-tb-0 sm-res-mg-t-0">
						<div class="dash-widget-visits"></div>
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                               <h3><span class="counter"><?php echo $totalViewCount; ?></span></h3>
                               <p>Total Page Views</p>
                            </div>
                            <div class="past-statistic-graph">
                                <div class="stats-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Sales Statistics</h2>
                                <p>Vestibulum purus quam scelerisque, mollis nonummy metus</p>
                            </div>
                        </div>
                        <div id="dynamic-chart" class="flot-chart dyn-ctn-fr bar-hm-three"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
function confirmToggleStatus(adminId) {
    var statusElement = document.getElementById('status_' + adminId);
    var currentStatus = statusElement.textContent.trim();

    // Calculate the new status
    var newStatus = (currentStatus == '1') ? '0' : '1';

    // Show a confirmation dialog
    var confirmMessage = (currentStatus == '1') ? "Are you sure you want to deactivate this account?" : "Are you sure you want to activate this account?";
    var userConfirmed = confirm(confirmMessage);

    if (userConfirmed) {
        // Send an asynchronous request to update the status
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the displayed status dynamically
                statusElement.textContent = newStatus;
            }
        };
        xhttp.open('GET', 'admin_status.php?admin_id=' + adminId + '&new_status=' + newStatus, true);
        xhttp.send();
    }
}
</script>
    <!-- End Sale Statistic area-->
    <!-- ===== Admin Panel Footer Area ===== -->
    <?php include("admin_footer.php"); ?>
    <!-- =================================== -->
</body>
</html>