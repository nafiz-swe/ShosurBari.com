<?php
// Include necessary files and initialize the session
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin | ShosurBari</title>
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
                                    <li><a href="admin_login.php">Login</a>
                                    </li>
                                    <li><a href="customer.php">Customer</a>
                                    </li>
                                    <li><a href="contact_us.php">ContactUs</a>
                                    </li>
                                    <li><a href="photos.php">Photos</a>
                                    </li>
                                    <li><a href="users.php">Users</a>
                                    </li>
                                    <li><a href="dataphysical_marital.php">PysicalMarital</a>
                                    </li>
                                    <li><a href="datalifestyle.php">LifeStyle</a>
                                    </li>
                                    <li><a href="dataeducation.php">Edcation</a>
                                    </li>
                                    <li><a href="dataaddress.php">Address</a>
                                    </li>
                                    <li><a href="datareligion.php">Religion</a>
                                    </li>
                                    <li><a href="datafamily.php">Family</a>
                                    </li>
                                    <li><a href="datapartner.php">Partner</a>
                                    </li>
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
                            <li><a href="admin_login.php">Login</a>
                            </li>
                            <li><a href="customer.php">Customer</a>
                            </li>
                            <li><a href="contact_us.php">ContactUs</a>
                            </li>
                            <li><a href="photos.php">Photos</a>
                            </li>
                            <li><a href="users.php">Users</a>
                            </li>
                            <li><a href="dataphysical_marital.php">PysicalMarital</a>
                            </li>
                            <li><a href="datalifestyle.php">LifeStyle</a>
                            </li>
                            <li><a href="dataeducation.php">Edcation</a>
                            </li>
                            <li><a href="dataaddress.php">Address</a>
                            </li>
                            <li><a href="datareligion.php">Religion</a>
                            </li>
                            <li><a href="datafamily.php">Family</a>
                            </li>
                            <li><a href="datapartner.php">Partner</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->


    <?php
// Display the combined results
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
        text-align: left;
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
        font-size: 18px;
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
      width: 2880px;
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
</style>';

// Establish a database connection (update these values with your database credentials)
require_once("includes/dbconn.php");

// Execute the SQL query to get the user count from the first table
$sql = "SELECT COUNT(DISTINCT user_id) AS user_count FROM 3bd_higher_secondaryedu_method";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    $row = $result->fetch_assoc();
    $userCount = $row["user_count"];
} else {
    echo "Error: " . $conn->error;
}

// Number of profiles to display per page
$profilesPerPage = isset($_GET['per_page']) ? intval($_GET['per_page']) : '50';

// Create an empty array to store the combined results
$combinedResults = [];

// Execute a single SQL query to retrieve data from all tables
$sql = "SELECT
            s.user_id,

            s.scndry_edu_method,
            s.maxedu_qulfctn,
            s.gnrl_mdrs_secondary_pass,
            s.gnrl_mdrs_secondary_pass_year,
            s.gnrl_mdrs_secondary_end_year,
            s.gnrlmdrs_secondary_running_std,
            s.profilecreationdate,  -- Add profilecreationdate from secondaryedu_method


            h.higher_secondary_edu_method,
            h.gnrlmdrs_hrsecondary_pass,
            h.gnrlmdrs_hrsecondary_pass_year,
            h.gnrlmdrs_hrsecondary_exam_year,
            h.gnrlmdrs_hrsecondary_group,
            h.gnrlmdrs_hrsecondary_rningstd,
            h.diploma_hrsecondary_pass,
            h.diploma_hrsecondary_pass_year,
            h.diploma_hrsecondary_sub,
            h.diploma_hrsecondary_endingyear,

            u.varsity_edu_method,
            u.uvarsity_pass,
            u.varsity_passing_year,
            u.university_subject,
            u.varsity_ending_year,
            u.uvarsity_name,
            u.others_edu_qualification,

            k.qawmi_madrasa_hafez,
            k.qawmimadrasa_dawrapass,
            k.kowmi_dawrapas_year,
            k.kowmi_current_edu_level
        FROM 3bd_secondaryedu_method AS s
        LEFT JOIN 3bd_higher_secondaryedu_method AS h ON s.user_id = h.user_id
        LEFT JOIN 3bd_universityedu_method AS u ON s.user_id = u.user_id
        LEFT JOIN 3bd_kowmi_madrasaedu_method AS k ON s.user_id = k.user_id";

$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $combinedResults[] = $row;
    }
} else {
    echo "Error: " . $conn->error;
}

echo '<div class="table-container">';
echo "<h1>বর্তমান এবং স্থায়ী ঠিকানা</h1>";

echo '<div class="table-wrapper">';
echo "<h3>Total number of user profiles: " . $userCount . "</h3>";

echo '<div id="search-form">
    <form method="POST">
        <label for="search-user-id">Search by User ID:</label>
        <input type="text" id="search-user-id" name="search-user-id">
        <button type="submit" name="search">Search</button>
        <button type="submit" name="clear" style="margin-left: 10px;">Clear Search</button></br>
        
        <!-- Dropdown for profiles per page -->
        <label for="per-page">Profiles Show</label>
        <select id="per-page" name="per_page" onchange="updateProfilesPerPage()">
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

// Process the combined results
if (isset($_POST['search'])) {
    $searchUserId = mysqli_real_escape_string($conn, $_POST['search-user-id']);
    // Filter the combined results based on the user ID
    $filteredResults = array_filter($combinedResults, function ($row) use ($searchUserId) {
        return $row['user_id'] == $searchUserId;
    });

    // Display the filtered results
    displayResults($filteredResults);
} else {
    // Display all combined results
    displayResults($combinedResults);
}

// Function to display results
function displayResults($results)
{
    if (!empty($results)) {
        echo '<table>';
        echo '<tr>
            <th>বায়োডাটা নং</th>
            <th>মাধ্যমিক শিক্ষার মাধ্যম</th>
            <th>সর্বোচ্চ শিক্ষাগত যোগ্যতা</th>
            <th>মাধ্যমিক পাস করেছেন?</th>
            <th>মাধ্যমিক পাসের বর্ষ</th>
            <th>মাধ্যমিক বোর্ড পরীক্ষার বর্ষ</th>
            <th>মাধ্যমিক বর্তমান অধ্যায়নরত ক্লাস</th>

            <th style="color: #ad0000;">উচ্চমাধ্যমিক শিক্ষার মাধ্যম</th>
            <th style="color: #ad0000;">উচ্চমাধ্যমিক পাস করেছেন?</th>
            <th style="color: #ad0000;">উচ্চমাধ্যমিক পাসের বর্ষ</th>
            <th style="color: #ad0000;">উচ্চমাধ্যমিক বোর্ড পরীক্ষার বর্ষ</th>
            <th style="color: #ad0000;">উচ্চমাধ্যমিক গ্রুপ</th>
            <th style="color: #ad0000;">উচ্চমাধ্যমিক বর্তমান অধ্যায়নরত ক্লাস</th>
            <th style="color: #ad0000;">ডিপ্লোমা পাস করেছেন?</th>
            <th style="color: #ad0000;">ডিপ্লোমা পাসের বর্ষ</th>
            <th style="color: #ad0000;">ডিপ্লোমায় আপনার সাবজেক্ট</th>
            <th style="color: #ad0000;">ডিপ্লোমা অধ্যায়ন সম্পন্ন হবে</th>
            
            <th style="color: blue;">স্নাতক শিক্ষার মাধ্যম</th>
            <th style="color: blue;">স্নাতক পাস করেছেন?</th>
            <th style="color: blue;">স্নাতক পাসের বর্ষ</th>
            <th style="color: blue;">স্নাতক আপনার সাবজেক্ট</th>
            <th style="color: blue;">স্নাতক অধ্যায়ন সম্পন্ন হবে</th>
            <th style="color: blue;">স্নাতকে শিক্ষা প্রতিষ্ঠান</th>
            <th style="color: blue;">অন্যান্য শিক্ষাগত যোগ্যতা</th>
            
            <th style="color: #b206a9;">আপনি কি হাফেজ</th>
            <th style="color: #b206a9;">দাওরায়ে হাদিস পাস করেছেন?</th>
            <th style="color: #b206a9;">দাওরায়ে হাদিস পাসের বর্ষ</th>
            <th style="color: #b206a9;">মাদ্রাসায় বর্তমান অধ্যায়নরত জামাত</th>

            <th>Data Upload</th>
            <th>Action</th>
        </tr>';

        // Output the data rows
        foreach ($results as $row) {
            echo '<tr>';
            echo '<td>' . $row['user_id'] . '</td>';

            echo '<td>' . $row['scndry_edu_method'] . '</td>';
            echo '<td>' . $row['maxedu_qulfctn'] . '</td>';
            echo '<td>' . $row['gnrl_mdrs_secondary_pass'] . '</td>';
            echo '<td>' . $row['gnrl_mdrs_secondary_pass_year'] . '</td>';
            echo '<td>' . $row['gnrl_mdrs_secondary_end_year'] . '</td>';
            echo '<td>' . $row['gnrlmdrs_secondary_running_std'] . '</td>';

            echo '<td style="color: #ad0000;">' . $row['higher_secondary_edu_method'] . '</td>';
            echo '<td style="color: #ad0000;">' . $row['gnrlmdrs_hrsecondary_pass'] . '</td>';
            echo '<td style="color: #ad0000;">' . $row['gnrlmdrs_hrsecondary_pass_year'] . '</td>';
            echo '<td style="color: #ad0000;">' . $row['gnrlmdrs_hrsecondary_exam_year'] . '</td>';
            echo '<td style="color: #ad0000;">' . $row['gnrlmdrs_hrsecondary_group'] . '</td>';
            echo '<td style="color: #ad0000;">' . $row['gnrlmdrs_hrsecondary_rningstd'] . '</td>';
            echo '<td style="color: #ad0000;">' . $row['diploma_hrsecondary_pass'] . '</td>';
            echo '<td style="color: #ad0000;">' . $row['diploma_hrsecondary_pass_year'] . '</td>';
            echo '<td style="color: #ad0000;">' . $row['diploma_hrsecondary_sub'] . '</td>';
            echo '<td style="color: #ad0000;">' . $row['diploma_hrsecondary_endingyear'] . '</td>';
            
            echo '<td style="color: blue;">' . $row['varsity_edu_method'] . '</td>';
            echo '<td style="color: blue;">' . $row['uvarsity_pass'] . '</td>';
            echo '<td style="color: blue;">' . $row['varsity_passing_year'] . '</td>';
            echo '<td style="color: blue;">' . $row['university_subject'] . '</td>';
            echo '<td style="color: blue;">' . $row['varsity_ending_year'] . '</td>';
            echo '<td style="color: blue;">' . $row['uvarsity_name'] . '</td>';
            echo '<td style="color: blue;">' . $row['others_edu_qualification'] . '</td>';

            
            echo '<td style="color: #b206a9;">' . $row['qawmi_madrasa_hafez'] . '</td>';
            echo '<td style="color: #b206a9;">' . $row['qawmimadrasa_dawrapass'] . '</td>';
            echo '<td style="color: #b206a9;">' . $row['kowmi_dawrapas_year'] . '</td>';
            echo '<td style="color: #b206a9;">' . $row['kowmi_current_edu_level'] . '</td>';

            echo '<td>' . $row['profilecreationdate'] . '</td>';
            echo '<td><a href="edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>';
            echo '</tr>';
        }
        echo '</table>';

        // Progress bar at the bottom
        echo '<div class="progress-container">
            <div class="progress-bar"></div>
        </div>';
    } else {
        echo 'No users found.';
    }
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
