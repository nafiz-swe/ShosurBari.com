

<?php
// Include necessary files and initialize the session
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
?>

<?php
// When user logs in, set a session variable
$_SESSION['user_logged_in'] = true;

error_reporting(0);
require_once("includes/dbconn.php");
if (!isset($_SESSION['id'])) {
  // Redirect the user to the login page or display an error message
  header("location: ../admin/admin_login.php");
  exit;
}
?>



<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - Home | ShosurBari</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Page Views Count -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>

<body>


<!-- ====== Admin Panel Navigation Bar ====== -->
<?php include("admin_navigation.php"); ?>
<!-- ========================================= -->



    <!-- Start Email Statistic area-->
    <div class="notika-email-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="recent-post-ctn">
                            <div class="recent-post-title">
                                <h2>All Page Views</h2>
                            </div>
                        </div>
                        <?php
                           // Include your database connection
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

                                    // Add the row to the array
                                    $rows[] = array(
                                        "pageName" => $pageName,
                                        "viewCount" => $viewCount,
                                        "lastUpdate" => $lastUpdate
                                    );

                                    // Add the view count to the total
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

                                    // Extract just the page name without the URL parameter
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

                                // Add the view count to the total
                                $totalViewCount += $viewCount;

                            } else {
                                echo "Error retrieving page view counts: " . $conn->error;
                            }



                            // Unique Visitor Activity List START
                            // Retrieve total unique visitor count
                            $total_visitor_sql = "SELECT COUNT(*) FROM unique_visitors";
                            $total_visitor_count = $conn->query($total_visitor_sql)->fetch_row()[0];

                            // Retrieve last year unique visitor count
                            $last_year_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
                            $last_year_count = $conn->query($last_year_sql)->fetch_row()[0];

                            // Retrieve last month unique visitor count
                            $last_month_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
                            $last_month_count = $conn->query($last_month_sql)->fetch_row()[0];

                            // Retrieve last week unique visitor count
                            $last_week_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                            $last_week_count = $conn->query($last_week_sql)->fetch_row()[0];

                            // Retrieve last 24 hours unique visitor count
                            $last_24_hours_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 24 HOUR)";
                            $last_24_hours_count = $conn->query($last_24_hours_sql)->fetch_row()[0];

                            // Retrieve last 1 hour unique visitor count
                            $last_1_hour_sql = "SELECT COUNT(*) FROM unique_visitors WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 HOUR)";
                            $last_1_hour_count = $conn->query($last_1_hour_sql)->fetch_row()[0];
                            // Unique Visitor Activity List END






                            // Customers Activity and Sale Biodata Result START
                            // Query to get the total number of customers
                            $sql = "SELECT COUNT(*) as totalCustomers FROM customer";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $totalCustomers = $row['totalCustomers'];

                            // Calculate the totals for each payment method
                            $bkashTotal = mysqli_query($conn, "SELECT COUNT(*) as count FROM customer WHERE payment_method = 'বিকাশ'")->fetch_assoc()['count'];
                            $nagadTotal = mysqli_query($conn, "SELECT COUNT(*) as count FROM customer WHERE payment_method = 'নগদ'")->fetch_assoc()['count'];
                            $roketTotal = mysqli_query($conn, "SELECT COUNT(*) as count FROM customer WHERE payment_method = 'রকেট'")->fetch_assoc()['count'];

                            // Query to get the total number of distinct user_ids in the 'customer' table
                            $sql = "SELECT COUNT(DISTINCT user_id) as totalUsers FROM customer";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $totalUsers = $row['totalUsers'];
                            // Customers Activity and Sale Biodata Result END



                            // Which Package Howmany Sale START
                            // Value 1: Biodata 145 Tk
                            $sqlValue1 = "SELECT COUNT(*) as countValue1 FROM customer WHERE biodata_quantities = '1 Biodata 145 Tk'";
                            $resultValue1 = mysqli_query($conn, $sqlValue1);
                            $rowValue1 = mysqli_fetch_assoc($resultValue1);
                            $countValue1 = $rowValue1['countValue1'];

                            // Value 2: Biodata 270 Tk
                            $sqlValue2 = "SELECT COUNT(*) as countValue2 FROM customer WHERE biodata_quantities = '2 Biodata 270 Tk'";
                            $resultValue2 = mysqli_query($conn, $sqlValue2);
                            $rowValue2 = mysqli_fetch_assoc($resultValue2);
                            $countValue2 = $rowValue2['countValue2'];

                            // Value 3: Biodata 375 Tk
                            $sqlValue3 = "SELECT COUNT(*) as countValue3 FROM customer WHERE biodata_quantities = '3 Biodata 375 Tk'";
                            $resultValue3 = mysqli_query($conn, $sqlValue3);
                            $rowValue3 = mysqli_fetch_assoc($resultValue3);
                            $countValue3 = $rowValue3['countValue3'];

                            // Value 4: Biodata 460 Tk
                            $sqlValue4 = "SELECT COUNT(*) as countValue4 FROM customer WHERE biodata_quantities = '4 Biodata 460 Tk'";
                            $resultValue4 = mysqli_query($conn, $sqlValue4);
                            $rowValue4 = mysqli_fetch_assoc($resultValue4);
                            $countValue4 = $rowValue4['countValue4'];

                            // Value 5: Biodata 525 Tk
                            $sqlValue5 = "SELECT COUNT(*) as countValue5 FROM customer WHERE biodata_quantities = '5 Biodata 525 Tk'";
                            $resultValue5 = mysqli_query($conn, $sqlValue5);
                            $rowValue5 = mysqli_fetch_assoc($resultValue5);
                            $countValue5 = $rowValue5['countValue5'];

                            // Value 10: Biodata 990 Tk
                            $sqlValue10 = "SELECT COUNT(*) as countValue10 FROM customer WHERE biodata_quantities = '10 Biodata 990 Tk'";
                            $resultValue10 = mysqli_query($conn, $sqlValue10);
                            $rowValue10 = mysqli_fetch_assoc($resultValue10);
                            $countValue10 = $rowValue10['countValue10'];
                            // Now you can use $countValue1, $countValue2, etc., to access the count for each value.
                            // Which Package Howmany Sale END





                            // Total Biodata Sale Count START
                            // Calculate the total separate data count in the 'request_biodata_number' column
                            $totalSeparateDataCount = 0;

                            $sql = "SELECT request_biodata_number FROM customer";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $request_biodata_number = $row['request_biodata_number'];
                                    // Use regular expression to split the data using any special characters or spaces
                                    $dataPoints = preg_split('/[ ,\-\_&:\.]+/', $request_biodata_number);
                                    // Count the number of separate data points and add it to the total count
                                    $totalSeparateDataCount += count($dataPoints);
                                }
                                mysqli_free_result($result);
                            } else {
                                echo "Error in SQL query: " . mysqli_error($conn);
                            }
                            // Total Biodata Sale Count End
















                            // Total Profit Amount START
                            // Define the values to search for
                            $valuesToFind = [145, 280, 390, 500, 600, 690, 770, 840, 900, 980];

                            // Initialize variables to store sums for different time periods
                            $totalSum = 0; // Total sum
                            $todaySum = 0; // Sum for today
                            $thisWeekSum = 0; // Sum for this week
                            $lastWeekSum = 0; // Sum for the last week
                            $thisMonthSum = 0; // Sum for this month
                            $lastMonthSum = 0; // Sum for last month
                            $thisYearSum = 0; // Sum for this year
                            $lastYearSum = 0; // Sum for last year

                            // Get current date and time
                            $currentDateTime = date("Y-m-d H:i:s");

                            // Get the date for one week ago from the current date
                            $oneWeekAgo = date("Y-m-d H:i:s", strtotime("-1 week"));

                            // Get the first day of the current month
                            $firstDayOfThisMonth = date("Y-m-01 00:00:00");

                            // Get the first day of the previous month
                            $firstDayOfLastMonth = date("Y-m-01 00:00:00", strtotime("-1 month"));

                            // Get the first day of the current year
                            $firstDayOfThisYear = date("Y-01-01 00:00:00");

                            // Get the first day of the previous year
                            $firstDayOfLastYear = date("Y-01-01 00:00:00", strtotime("-1 year"));

                            // Query the database to retrieve relevant data
                            $query = "SELECT biodata_quantities, request_date FROM customer";
                            $result = mysqli_query($conn, $query);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data = $row['biodata_quantities'];
                                    $requestDate = strtotime($row['request_date']);

                                    // Use a regular expression to extract numbers from the text
                                    preg_match_all('/\d+/', $data, $matches);
                                    $quantities = $matches[0];

                                    foreach ($quantities as $quantity) {
                                        $quantity = (int) $quantity;
                                        if (in_array($quantity, $valuesToFind)) {
                                            $totalSum += $quantity;

                                            // Check for different time periods
                                            if ($requestDate >= strtotime($oneWeekAgo)) {
                                                $lastWeekSum += $quantity;
                                            }

                                            // Check for today
                                            if (date("Y-m-d", $requestDate) == date("Y-m-d")) {
                                                $todaySum += $quantity;
                                            }

                                            // Check for this week (starting from Sunday)
                                            if (date("W", $requestDate) == date("W")) {
                                                $thisWeekSum += $quantity;
                                            }

                                            // Check for this month
                                            if ($requestDate >= strtotime($firstDayOfThisMonth)) {
                                                $thisMonthSum += $quantity;
                                            }

                                            // Check for last month
                                            if ($requestDate >= strtotime($firstDayOfLastMonth) && $requestDate < strtotime($firstDayOfThisMonth)) {
                                                $lastMonthSum += $quantity;
                                            }

                                            // Check for this year
                                            if ($requestDate >= strtotime($firstDayOfThisYear)) {
                                                $thisYearSum += $quantity;
                                            }

                                            // Check for last year
                                            if ($requestDate >= strtotime($firstDayOfLastYear) && $requestDate < strtotime($firstDayOfThisYear)) {
                                                $lastYearSum += $quantity;
                                            }
                                        }
                                    }
                                }
                            } else {
                                echo "Error in SQL query: " . mysqli_error($conn);
                            }
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
                            // Last Time Show, Sale Biodata END


                            // Close the database connection
                            $conn->close(); 
                        ?>

                    </div>
                </div>


                                
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="realtime-wrap notika-shadow mg-t-30">
                        <div class="realtime-ctn">
                            <div class="realtime-title">
                                <h2>Realtime Visitors</h2>
                            </div>
                        </div>
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
                        <div class="realtime-country-ctn realtime-ltd-mg">
                            <h5>September 4, 21:44:02 (2 Mins 56 Seconds)</h5>
                            <div class="realtime-ctn-bw">
                                <div class="realtime-ctn-st">
                                    <span><img src="img/country/1.png" alt="" /></span> <span>United States</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Firefox</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Mac OSX</span>
                                </div>
                            </div>
                        </div>
                        <div class="realtime-country-ctn">
                            <h5>September 7, 20:44:02 (5 Mins 56 Seconds)</h5>
                            <div class="realtime-ctn-bw">
                                <div class="realtime-ctn-st">
                                    <span><img src="img/country/2.png" alt="" /></span> <span>Australia</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Firefox</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Mac OSX</span>
                                </div>
                            </div>
                        </div>
                        <div class="realtime-country-ctn">
                            <h5>September 9, 19:44:02 (10 Mins 56 Seconds)</h5>
                            <div class="realtime-ctn-bw">
                                <div class="realtime-ctn-st">
                                    <span><img src="img/country/3.png" alt="" /></span> <span>Brazil</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Firefox</span>
                                </div>
                                <div class="realtime-bw">
                                    <span>Mac OSX</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="email-statis-inner notika-shadow">
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
								<h2>Email Statistics</h2>
							</div>
                            <div class="email-statis-wrap">
                                <div class="email-round-nock">
                                    <input type="text" class="knob" value="0" data-rel="55" data-linecap="round" data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true">
                                </div>
                                <div class="email-ctn-nock">
                                    <p>Total Emails Sent</p>
                                </div>
                            </div>
                            <div class="email-round-gp">
                                <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="75" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Bounce Rate</p>
                                    </div>
                                </div>
                                <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="35" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Total Opened</p>
                                    </div>
                                </div>
                                <div class="email-round-pro sm-res-ds-n lg-res-mg-bl">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="45" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Total Ignored</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                            <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                                <div class="past-day-statis">
                                    <h2>For The All Page Total Views</h2>
                                </div>
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
                </div>

            </div>
        </div>
    </div>
    <!-- End Email Statistic area-->






    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0dabe229;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $total_visitor_count; ?></span></h2>
                            <p>Total Website Traffics</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>

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

            </div>
        </div>
    </div>
    <!-- End Status area-->
    
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0a11c526;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $totalCustomers; ?></span></h2>
                            <p>Total Customers</p>
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
                            <h2><span class="counter"><?php echo $totalSeparateDataCount; ?></span></h2>
                            <p>Total Biodata Sales</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #0a11c526;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2 style="font-size: 15px; margin-top: 4px; margin-bottom: 0px; line-height: 24px;"><?php echo $lastRequestDate; ?></h2>
                            <p>Last Biodata Sales Time</p>
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
                            <p>Net Income</p>
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
                            <p>Today's sale</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"> <?php echo $thisWeekSum; ?></span> ৳</h2>
                            <p>This week's sale</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $lastWeekSum; ?></span> ৳</h2>
                            <p>Last week's sale</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $thisMonthSum; ?></span> ৳</h2>
                        <p>This month's sale</p>
                        </div>
                        <div class="sparkline-bar-stats3">3,5,8,4,7,9,4,8,9,5,9,5</div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $lastMonthSum; ?> </span> ৳</h2>
                            <p>Last month's sale</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"> <?php echo $thisYearSum; ?></span> ৳</h2>
                            <p>This year's sale</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #e2470e1c;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $lastYearSum; ?></span> ৳</h2>
                            <p>Last year's sale</p>
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
                        <h2><span class="counter"><?php echo $countValue1; ?></span></h2>
                        <p>Package [1 SbBd 145 Tk]</p>
                        </div>
                        <div class="sparkline-bar-stats3">3,5,8,4,7,9,4,8,9,5,9,5</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $countValue2; ?></span></h2>
                        <p>Package [2 SbBd 270 Tk]</p>
                        </div>
                        <div class="sparkline-bar-stats3">3,5,8,4,7,9,4,8,9,5,9,5</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $countValue3; ?></span></h2>
                            <p>Package [3 SbBd 375 Tk]</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $countValue4; ?></span></h2>
                            <p>Package [4 SbBd 460 Tk]</p>
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
                            <p>Package [5 SbBd 525 Tk]</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background: #07e27e2b;" class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $countValue10; ?></span></h2>
                        <p>Package [10 SbBd 990 Tk]</p>
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
                    <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                        <div class="past-day-statis">
                            <h2>For All Page Total Views</h2>
                        </div>
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
                        <!-- <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <h3><span class="counter"><?php echo $visitorCount; ?></span></h3>
                                <p>Unique Visitors</p>
                            </div>
                            <div class="past-statistic-graph">
                                <div class="stats-line"></div>
                            </div>
                        </div> -->
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <h3><span class="counter"><?php echo $visitorCount; ?></span></h3>
                                <p>Unique Visitors</p>
                            </div>
                            <div class="past-statistic-graph">
                                <div class="stats-bar-2"></div>
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
    <!-- End Sale Statistic area-->

 
    <style>
    th{
        background: #00c292;
        color: #fff;
        padding: 4px;
        text-align: center;
    }

    td{
        border: 1px solid #00c292;
        padding: 4px;
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


<!-- ===== Admin Panel Footer Area ===== -->
<?php include("admin_footer.php"); ?>
<!-- =================================== -->


</body>

</html>