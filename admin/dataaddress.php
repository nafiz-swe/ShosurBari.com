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
    <title>Admin - Address| ShosurBari</title>
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

<!-- ====== Admin Panel Navigation Bar ====== -->
<?php include("admin_navigation.php"); ?>
<!-- ========================================= -->


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
        font-size: 16px;
        color: #00c292;
        margin-top: 20px;
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



// Establish a database connection (update these values with your database credentials)
require_once("includes/dbconn.php");

// Number of profiles to display per page
$profilesPerPage = isset($_GET['per_page']) ? intval($_GET['per_page']) : 2;
$limit = ($profilesPerPage == 'all') ? '' : "LIMIT $profilesPerPage";

// Pagination variables
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $profilesPerPage;

// Execute the SQL query to count the total number of user profiles
$sql = "SELECT COUNT(DISTINCT user_id) AS user_count FROM 4bd_address_details";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    $row = $result->fetch_assoc();
    $userCount = $row["user_count"];
} else {
    echo "Error: " . $conn->error;
}

// Fetch user data from the database with pagination
$sql = "SELECT * FROM 4bd_address_details $limit OFFSET $start";
$result = mysqli_query($conn, $sql);

echo '<div class="table-container">';
echo "<h1>বর্তমান এবং স্থায়ী ঠিকানা</h1>";

echo '<div class="table-wrapper">';
echo "<h3>Total number of user profiles: " . $userCount . "</h3>";

echo '<div id="search-form">
    <form method="POST">
        <input type="text" id="search-user-id" name="search-user-id" placeholder="Search User ID" required>
        <button class="search-admin" type="submit" name="search">Search</button>
        <button class="search-clear-admin" type="submit" name="clear">Clear Search</button></br>
        
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

if (isset($_POST['search'])) {
    $searchUserId = mysqli_real_escape_string($conn, $_POST['search-user-id']);
    $sql = "SELECT * FROM 4bd_address_details WHERE user_id = $searchUserId $limit";
    $result = mysqli_query($conn, $sql);
}

if (mysqli_num_rows($result) > 0) {
    echo '<table>';
    echo '<tr>
    <th>বায়োডাটা নং</th>
    <th>স্থায়ী ঠিকানার বিভাগ</th>
    <th>বরিশাল</th>
    <th>চট্টগ্রাম</th>
    <th>ঢাকা</th>
    <th>খুলনা</th>
    <th>ময়মনসিংহ</th>
    <th>রাজশাহী</th>
    <th>রংপুর</th>
    <th>সিলেট</th>
    <th>যে দেশে আছেন</th>
    <th>বর্তমান বসবাসের ঠিকানা</th>
    <th>বাল্যকালে কোথায় থেকেছেন?</th>
    <th>তারিখ সময়</th>
    <th>ডাটা ইডিট</th>
    </tr>';
    
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        if ($profilesPerPage !== 'all' && $count > $profilesPerPage) {
            // Hide profiles beyond the selected per page limit
            continue;
        }
        echo '<tr>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['permanent_division'] . '</td>';
        echo '<td>' . $row['home_district_under_barishal'] . '</td>';
        echo '<td>' . $row['home_district_under_chattogram'] . '</td>';
        echo '<td>' . $row['home_district_under_dhaka'] . '</td>';
        echo '<td>' . $row['home_district_under_khulna'] . '</td>';
        echo '<td>' . $row['home_district_under_mymensingh'] . '</td>';
        echo '<td>' . $row['home_district_under_rajshahi'] . '</td>';
        echo '<td>' . $row['home_district_under_rangpur'] . '</td>';
        echo '<td>' . $row['home_district_under_sylhet'] . '</td>';
        echo '<td>' . $row['country_present_address'] . '</td>';
        echo '<td>' . $row['present_address_location'] . '</td>';
        echo '<td>' . $row['childhood'] . '</td>';
        echo '<td>' . $row['profilecreationdate'] . '</td>';
        echo '<td><a href="edit_address.php?id=' . $row['id'] . '">Edit</a></td>';
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



 


<!-- ===== Admin Panel Footer Area ===== -->
<?php include("admin_footer.php"); ?>
<!-- =================================== -->


</body>

</html>