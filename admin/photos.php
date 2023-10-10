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
                                      <li><a href="trash.php">Trash</a>
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
                                <li><a href="trash.php">Trash</a>
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



<div class="sbbiodata_profile_recentview">
    <h1>User Uploaded Profile Pictures</h1>

    <?php
    // Establish a database connection (update these values with your database credentials)
    require_once("includes/dbconn.php");


        // Execute the SQL query
        $sql = "SELECT COUNT(DISTINCT user_id) AS user_count FROM photos";
        $result = $conn->query($sql);
    
        // Check if the query was successful
        if ($result) {
            $row = $result->fetch_assoc();
            $userCount = $row["user_count"];
        } else {
            echo "Error: " . $conn->error;
        }


    // Number of profiles to display per page
    $profilesPerPage = isset($_GET['per_page']) ? intval($_GET['per_page']) : 2;

    // Get the current page number
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Calculate the OFFSET for SQL LIMIT
    $offset = ($currentPage - 1) * $profilesPerPage;

    // Execute the SQL query with LIMIT and OFFSET
    $sql = "SELECT DISTINCT user_id FROM photos LIMIT $profilesPerPage OFFSET $offset";
    $result = mysqlexec($sql);

    echo "<h3>Total number of user profiles: " . $userCount . "</h3>";
    echo '<div class="table-wrapper">';
    echo "<table>";
    echo '<div id="search-form">
    <form method="POST">
        <label for="search-user-id">Search User ID:</label>
        <input type="text" id="search-user-id" name="search-user-id" required>
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



if (isset($_POST['search'])) {
  $searchUserId = mysqli_real_escape_string($conn, $_POST['search-user-id']);
  $sql = "SELECT * FROM photos WHERE user_id = $searchUserId";
  $result = mysqli_query($conn, $sql);
}





    // Add the top row with column headings
    echo "<tr>";
    echo "<th>বায়োডাটা নং</th>"; // Left heading

    // Dynamically generate column headings for images
    for ($i = 1; $i <= 20; $i++) {
        echo "<th>Image-$i</th>";
    }

    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
      $profid = $row['user_id'];
  
      // Get the user's folder path
      $user_folder = "../profile/{$profid}/";
      $trash_folder = "../profile/{$profid}/trash/";
  
      // Check if the folder exists
      if (is_dir($user_folder)) {
          // Open the user's folder
          $user_photos = scandir($user_folder);
  
          // Check if the user has photos
          if (count($user_photos) > 2) { // 2 because . and .. are also counted
              echo "<tr>";
              echo "<td>{$profid}</td>"; // Left heading content
  
              foreach ($user_photos as $photo) {
                if ($photo !== "." && $photo !== "..") {
                    // Check if $photo is a directory (folder)
                    if (!is_dir("{$user_folder}{$photo}")) {
                        echo "<td>";
            
                        // Use the previously stored timestamp for this image
                        // Assuming you have previously retrieved and stored timestamps in the $imageTimestamps array
                        if (isset($imageTimestamps[$profid][$photo])) {
                            $timestamp = strtotime($imageTimestamps[$profid][$photo]);
                        } else {
                            // Get the file modification time and format it as desired
                            $imageTimestamp = filemtime("{$user_folder}{$photo}");
                            $timestamp = strtotime("@" . $imageTimestamp);
                            $formattedTimestamp = date("j F Y, g:i A", $timestamp);
                            
                            // Store the formatted timestamp in the array for future use
                            $imageTimestamps[$profid][$photo] = $formattedTimestamp;
                        }
            
                        // Display the formatted timestamp in Asia/Dhaka (Bangladesh) timezone
                        date_default_timezone_set('Asia/Dhaka');
                        echo "<p>" . date("j F Y, g:i A", $timestamp) . "</p>";
                        
                        echo "<a href=\"../view_profile.php?id={$profid}\" target=\"_blank\">";
                        echo "<img src=\"{$user_folder}{$photo}\"/>";
                        echo "</a>";
            
                        // Add a delete button for each image
                        echo "<form method=\"POST\" action=\"delete_img.php\">";
                        echo "<input type=\"hidden\" name=\"image_path\" value=\"{$user_folder}{$photo}\" />";
                        echo "<input type=\"hidden\" name=\"user_id\" value=\"{$profid}\" />";
                        echo "<input type=\"submit\" name=\"delete_image\" value=\"Delete\" />";
                        echo "<a href=\"download_image.php?image_path={$user_folder}{$photo}\" download>Download</a>";
                        echo "</form>";
            
                        // Add a restore button for each image in the trash folder
                        if (is_dir($trash_folder)) {
                            $trash_photos = scandir($trash_folder);
                            if (in_array($photo, $trash_photos)) {
                                echo "<form method=\"POST\" action=\"restore_img.php\">";
                                echo "<input type=\"hidden\" name=\"image_path\" value=\"{$trash_folder}{$photo}\" />";
                                echo "<input type=\"hidden\" name=\"user_id\" value=\"{$profid}\" />";
                                echo "<input type=\"submit\" name=\"restore_image\" value=\"Restore\" />";
                                echo "</form>";
                            }
                        }
            
                        echo "</td>";
                    }
                }
            }
            
            
  
              echo "</tr>";
          }
      }
  }
  

    echo "</table>";

    // Progress bar at the bottom
    echo '<div class="progress-container">
    <div class="progress-bar"></div>
    </div>';

    // Calculate the total number of pages
$total_pages = ceil($userCount / $profilesPerPage);
$pages_to_show = 1; // You can adjust this number as needed

// Pagination links
echo "<div class='pagination'>";
if ($total_pages > 1) {
    if ($currentPage > 1) {
        echo "<a href='photos.php?page=" . ($currentPage - 1) . "&per_page=$profilesPerPage' class='page-link'>Previous</a>";
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == 1 || $i == $total_pages || ($i >= $currentPage - $pages_to_show && $i <= $currentPage + $pages_to_show)) {
            $active = $i == $currentPage ? "active" : "";
            echo "<a href='photos.php?page=$i&per_page=$profilesPerPage' class='page-link $active'>$i</a>";
        } elseif ($i == $currentPage - $pages_to_show - 1 || $i == $currentPage + $pages_to_show + 1) {
            // Add "dot dot" nodes
            echo "<span class='page-link'>...</span>";
        }
    }

    if ($currentPage < $total_pages) {
        echo "<a href='photos.php?page=" . ($currentPage + 1) . "&per_page=$profilesPerPage' class='page-link'>Next</a>";
    }
}
echo "</div>";


    echo '</div>'; // Close the table-wrapper div

    
    ?>
</div>



<script>
function updateProfilesPerPage() {
    const perPageSelect = document.getElementById('per-page');
    const selectedValue = perPageSelect.value;
    window.location.href = `?per_page=${selectedValue}`;
}
</script>


<style>
  h1 {
    padding: 10px 0;
    margin: 150px auto 0px auto;
    text-align: center;
    font-size: 35px;
    color: #00c292;
  }

  .sbbiodata_profile_recentview  h3{
  margin: 20px auto 0px auto;
  padding: 10px 0;
  font-size: 25px;
  color: #00c292;
  text-align: left;
}

form {
    margin-left: 0px;
    margin-top: 0px;
    padding: 5px 0px;
}

  .sbbiodata_profile_recentview {
    margin: 0px auto; 
    padding: 0 20px;
    border: 10px solid #00c292;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
  }


  table {
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  tr{
    border: 2px solid #00c292;
  }

  th {
    background-color: #00c292;
    color: white;
    border: 2px solid #ccc;
    text-align: center;
    white-space: nowrap;
    padding: 10px; /* Add padding to the table headers for spacing */
  }

  td {
    border: 2px solid #00c292;
    padding: 15px;
    text-align: center;
    font-size: 25px;
    color: #00c292;
    font-weight: bold;
  }

  td p{
    font-size: 14px;
    color: #00c292;
    margin: -5px auto 10px auto;
  }

  label {
        font-size: 16px;
        color: #00c292;
    }

.input-group input[type="text"], select {
    border-radius: 4px;
    border: 1px solid #ccc;
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    font-size: 17px;
    width: 110px;
    padding: 5px;
    display: block;
    color: black;
    outline: none;
    height: 33px;
    background-color: #fff;
    background: linear-gradient(#fff 20%,#f6f6f6 50%,#eee 52%,#f4f4f4 100%);
    background-clip: padding-box;
    -webkit-box-shadow: 0 0 3px #fff inset, 0 1px 1px rgb(0 0 0 / 10%);
    box-shadow: 0 0 3px #fff inset, 0 1px 1px rgb(0 0 0 / 10%);
}

  img {
    height: 175px;
    width: 220px;
    object-fit: fill;
    border: 4px solid #fff;
    position: relative;
    top: -5px;
    z-index: 5;
    background: rgb(245, 242, 242);
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    margin: 0 auto;
    display: block;
  }

  td form,
  td a {
    margin: 5px auto -20px auto;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
  }

  /* Optionally, you can style the buttons for better visibility */
  td form input[type="submit"] {
    border: none;
    cursor: pointer;
    text-align: center;
    cursor: pointer;
    width: 90px;
    height: 30px;
    margin: 15px auto;
    background: red;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 1px 1px 4px #888;
    font-size: 14px;
    color: #fff;
    font-weight: 400;
  }

  td form a {
    border: none;
    cursor: pointer;
    cursor: pointer;
    width: 90px;
    height: 30px;
    margin: 15px auto;
    background: green;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 1px 1px 4px #888;
    font-size: 14px;
    color: #fff;
    font-weight: 400;
  }

  td form input[type="submit"]:hover,
  td form a:hover {
    color: white;
    background: linear-gradient(#0aa4ca, #0acef1);
  }

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
</style>






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