<?php
// Include necessary files and initialize the session
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
?>
<?php
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
    <title>Admin - Customer | ShosurBari</title>
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
<!-- fa fa icon / logout icon
    ============================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index.html">Dashboard</a></li>
                                        <li><a href="analytics.html">Analytics</a></li>
                                    </ul>
                                </li>

                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                    <ul class="notika-main-menu-dropdown">
                                      <li><a href="customer.php">Customer</a></li>
                                      <li><a href="contact_us.php">ContactUs</a></li>
                                      <li><a href="photos.php">Photos</a></li>
                                      <li><a href="users.php">Users</a></li>
                                      <li><a href="dataphysical_marital.php">PhysicalMarital</a></li>
                                      <li><a href="datalifestyle.php">LifeStyle</a></li>
                                      <li><a href="dataeducation.php">Edcation</a></li>
                                      <li><a href="dataaddress.php">Address</a></li>
                                      <li><a href="datareligion.php">Religion</a></li>
                                      <li><a href="datafamily.php">Family</a></li>
                                      <li><a href="datapartner.php">Partner</a></li>
                                      <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) { ?>
                                        <!-- User is logged in, show logout option -->
                                        <li><a href="admin_logout.php" style="padding: 8px 15px;"><i class="fa fa-sign-out"></i></a></li>
                                      <?php } else { ?>
                                        <!-- User is not logged in, show login option -->
                                        <li><a href="admin_login.php">Login</a></li>
                                      <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->



    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Manage</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane active in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.html">Dashboard</a>
                                </li>
                                <li><a href="analytics.html">Analytics</a>
                                </li>
                            </ul>
                        </div>

                        <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                            <li><a href="customer.php">Customer</a></li>
                              <li><a href="contact_us.php">ContactUs</a></li>
                              <li><a href="photos.php">Photos</a></li>
                              <li><a href="users.php">Users</a></li>
                              <li><a href="dataphysical_marital.php">PhysicalMarital</a></li>
                              <li><a href="datalifestyle.php">LifeStyle</a></li>
                              <li><a href="dataeducation.php">Edcation</a></li>
                              <li><a href="dataaddress.php">Address</a></li>
                              <li><a href="datareligion.php">Religion</a></li>
                              <li><a href="datafamily.php">Family</a></li>
                              <li><a href="datapartner.php">Partner</a></li>
                              <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) { ?>
                                <!-- User is logged in, show logout option -->
                                <li><a href="admin_logout.php" style="padding: 8px 15px;"><i class="fa fa-sign-out"></i></a></li>
                              <?php } else { ?>
                                <!-- User is not logged in, show login option -->
                                <li><a href="admin_login.php">Login</a></li>
                              <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->



<?php

echo '<style>
h1{
  padding: 10px 0;
  margin: 150px auto 0px auto;
  text-align: center;
  font-size: 35px;
  color: #00c292;
}

h3{
  padding: 10px 0;
  margin: 20px auto 0px auto;
  font-size: 25px;
  color: #00c292;
}
    table {
        border-collapse: collapse;
        width: 100%;
        padding: 20px;
        border: 2px solid #00c292;
        margin-bottom: 20px;
    }
    
    th, td {
        border: 2px solid #00c292;
        padding: 8px;
        text-align: center;
    }
    
    th {
        background-color: #00c292;
        color: white;
        border: 2px solid #ccc;
    }

    #search-form {
        margin-bottom: 20px;
    }

    form{
        margin-left: 0px;
        margin-top: 0px;
        padding: 10px 0px;
    }

    label {
        font-size: 16px;
        color: #00c292;
    }

    .input-group input[type="text"], select {
      font-size: 17px;
      width: 110px;
    }

    .table-container {
        padding: 0 20px;
        border: 10px solid #00c292;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    .table-wrapper {
      overflow: hidden;
      width: 3080px;
      margin: auto;
    }

    .table-wrapper table {
        border-collapse: collapse;
        width: 100%;
        padding: 20px;
        border: 2px solid #00c292;
        border-radius: 10px;
        margin-bottom: 20px;
        margin-top: -30px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    /* Progress bar styling */
    .progress-container {
        height: 8px;
        background-color: #ddd;
    }

    .progress-bar {
        height: 100%;
        width: 100%;
        background-color: #00c292;
    }

    .pagination{
      display: inline-block;
      margin-top: 30px;
      margin-bottom: 30px;
      margin-left:  auto;
      margin-right: auto;
      padding: 0;
      list-style: none;
      align-items: center;
      justify-content:center;
    }
    
    .page-link{
      color: #000;
      padding: 8px 12px;
      text-decoration: none;
      font-size: 14px;
      background-color: #eee;
      border-radius: 50%;
      margin: 0 3px;
    }
    
    .page-link:hover{
        background: #00c292;
      color: #fff;
    }
    
    .page-link.active{
      background: #00c292;
      color: #fff;
    }
</style>';



// Include the database connection code from datalifestyle.php
require_once("includes/dbconn.php");

// Number of profiles to display per page
$profilesPerPage = isset($_GET['per_page']) ? intval($_GET['per_page']) : 2;
$limit = ($profilesPerPage == 'all') ? '' : "LIMIT $profilesPerPage";

// Pagination variables
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $profilesPerPage;

// Execute the SQL query to count the total number of user profiles
$sql = "SELECT COUNT(*) AS user_count FROM customer";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $userCount = $row["user_count"];
} else {
    echo "Error: " . mysqli_error($conn);
}

echo '<div class="table-container">';
echo "<h1>কাস্টমার ও পেমেন্ট</h1>";

echo '<div class="table-wrapper">';
echo "<h3>Total number of user profiles: " . $userCount . "</h3>";

echo '<div id="search-form">
<form method="POST">
    <label for="search-user-id">Search User ID:</label>
    <input type="text" id="search-user-id" name="search-user-id">

    <select style="margin-top: 20px;" name="search-criteria" id="search-criteria">
        <option value="cust_email">User Email</option>
        <option value="cust_name">Name</option>
        <option value="cust_number">Phone Number</option>
    </select>

    <label for="search-keyword">Search Keyword:</label>
    <input type="text" id="search-keyword" name="search-keyword">

    <button type="submit" name="search">Search</button>
    <button type="submit" name="clear" style="margin-left: 10px;">Clear Search</button></br>
    
    <label for="per-page" style="margin-top: 20px;">Profiles Show</label>
    <select name="per_page" id="per-page" onchange="this.form.submit()">
        <option value=""> </option>
        <option value="10" ' . ($profilesPerPage == 10 ? 'selected' : '') . '>10</option>
        <option value="50" ' . ($profilesPerPage == 50 ? 'selected' : '') . '>50</option>
        <option value="100" ' . ($profilesPerPage == 100 ? 'selected' : '') . '>100</option>
        <option value="500" ' . ($profilesPerPage == 500 ? 'selected' : '') . '>500</option>
        <option value="1000" ' . ($profilesPerPage == 1000 ? 'selected' : '') . '>1000</option>
        <option value="10000" ' . ($profilesPerPage == 10000 ? 'selected' : '') . '>10000</option>
    </select>
</form>
</div>';

$searchUserId = isset($_POST['search-user-id']) ? $_POST['search-user-id'] : '';
$searchCriteria = isset($_POST['search-criteria']) ? $_POST['search-criteria'] : '';
$searchKeyword = isset($_POST['search-keyword']) ? mysqli_real_escape_string($conn, $_POST['search-keyword']) : '';

if (!empty($searchKeyword)) {
    if ($searchCriteria == 'cust_email') {
        $sql = "SELECT * FROM customer WHERE cust_email LIKE '%$searchKeyword%' $limit";
    } elseif ($searchCriteria == 'cust_name') {
        $sql = "SELECT * FROM customer WHERE cust_name LIKE '%$searchKeyword%' $limit";
      } elseif ($searchCriteria == 'cust_number') {
        // Remove non-numeric characters from the search keyword
        $searchKeyword = preg_replace("/[^0-9]/", "", $searchKeyword);
        $sql = "SELECT * FROM customer WHERE REPLACE(cust_number, ' ', '') LIKE '%$searchKeyword%' $limit";
    }
    
} elseif (!empty($searchUserId)) {
    $searchUserId = mysqli_real_escape_string($conn, $searchUserId);
    $sql = "SELECT * FROM customer WHERE user_id = $searchUserId $limit";
} else {
    $sql = "SELECT * FROM customer $limit OFFSET $start";
}

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Display user data
    echo "<table>";
    echo '<tr>
    <th>আইডি নং</th>
    <th>রেজিস্টার ইউজার /</br> বায়োডাটা নং</th>
    <th>কাস্টমার নাম</th>
    <th>কাস্টমার মোবাইল নম্বর</th>
    <th>কাস্টমার ইমেইল</th>
    <th>কাস্টমার স্থায়ী ঠিকানা</th>
    <th>রিকোয়েস্ট বায়োডাটা</th>
    <th>কয়টি বায়োডাটা &</br> মোট টাকা</th>
    <th>পেমেন্ট মেথড</th>
    <th>বিকাশ নাম্বার</th>
    <th>বিকাশ ট্রানজেকশন আইডি</th>
    <th>নগদ নাম্বার</th>
    <th>নগদ ট্রানজেকশন আইডি</th>
    <th>রকেট নাম্বার</th>
    <th>রকেট ট্রানজেকশন আইডি</th>
    <th>তারিখ সময়</th>
</tr>';
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>' . $row['id_customer'] . '</td>';
      echo '<td>' . $row['user_id'] . '</td>';
      echo '<td>' . $row['cust_name'] . '</td>';
      echo '<td>' . $row['cust_number'] . '</td>';
      echo '<td>' . $row['cust_email'] . '</td>';
      echo '<td>' . $row['cust_permanent_address'] . '</td>';
      echo '<td>' . $row['request_biodata_number'] . '</td>';
      echo '<td>' . $row['biodata_quantities'] . '</td>';
      echo '<td>' . $row['payment_method'] . '</td>';
      echo '<td>' . $row['bkash_number'] . '</td>';
      echo '<td>' . $row['bkash_transaction_id'] . '</td>';
      echo '<td>' . $row['nagad_number'] . '</td>';
      echo '<td>' . $row['nagad_transaction_id'] . '</td>';
      echo '<td>' . $row['roket_number'] . '</td>';
      echo '<td>' . $row['roket_transaction_id'] . '</td>';
      echo '<td>' . $row['request_date'] . '</td>';
      echo '</tr>';
    }
    echo '</table>';

    // Progress bar at the bottom
    echo '<div class="progress-container">
    <div class="progress-bar"></div>
    </div>';

    // Calculate the total number of pages
    $total_pages = ceil($userCount / $profilesPerPage);

    // Define how many pages to show before and after the current page
    $pages_to_show = 1; // You can adjust this number as needed

    // Pagination links
    echo "<div class='pagination'>";
    if ($total_pages > 1) {
        if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . "&per_page=$profilesPerPage' class='page-link'>Previous</a>";
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == 1 || $i == $total_pages || ($i >= $page - $pages_to_show && $i <= $page + $pages_to_show)) {
                $active = $i == $page ? "active" : "";
                echo "<a href='?page=$i&per_page=$profilesPerPage' class='page-link $active'>$i</a>";
            } elseif ($i == $page - $pages_to_show - 1 || $i == $page + $pages_to_show + 1) {
                // Add "dot dot" nodes
                echo "<span class='page-link'>...</span>";
            }
        }

        if ($page < $total_pages) {
            echo "<a href='?page=" . ($page + 1) . "&per_page=$profilesPerPage' class='page-link'>Next</a>";
        }
    }
    echo "</div>";
} else {
    echo 'No users found.';
}

echo '</div>'; // Close the table-wrapper div
echo '</div>'; // Close the table-container div

mysqli_close($conn);
?>





<script>
function updateProfilesPerPage() {
    const perPageSelect = document.getElementById('per-page');
    const selectedValue = perPageSelect.value;
    window.location.href = `?per_page=${selectedValue}`;
}
</script>



    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.orderBars.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  Chat JS
		============================================ -->
	<script src="js/chat/moment.min.js"></script>
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
</body>

</html>