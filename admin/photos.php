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








    <div class="sbbiodata_profile_recentview">
    <h1>User Uploaded Profile Pictures</h1>
    <?php

    // Getting unique user IDs
    $sql = "SELECT DISTINCT user_id FROM photos";
    $result = mysqlexec($sql);
    echo '<div class="table-wrapper">';
    echo "<table>";

    // Add the top row with column headings
    echo "<tr>";
    echo "<th>বায়োডাটা নং</th>"; // Left heading
    echo "<th>Image-1</th>"; // New column heading with auto width
    echo "<th>Image-2</th>";
    echo "<th>Image-3</th>";
    echo "<th>Image-4</th>";
    echo "<th>Image-5</th>";
    echo "<th>Image-6</th>";
    echo "<th>Image-7</th>";
    echo "<th>Image-8</th>";
    echo "<th>Image-9</th>";
    echo "<th>Image-10</th>";
    echo "<th>Image-11</th>";
    echo "<th>Image-12</th>";
    echo "<th>Image-13</th>";
    echo "<th>Image-14</th>";




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

                            // Retrieve profilecreationdate from the database
                            $date_sql = "SELECT profilecreationdate FROM photos WHERE user_id = '$profid' AND pic1 = '$photo'";
                            $date_result = mysqlexec($date_sql);
                            if ($date_row = mysqli_fetch_assoc($date_result)) {
                                $profile_creation_date = $date_row['profilecreationdate'];
                                echo "<p>{$profile_creation_date}</p>";
                            }

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

    echo '</div>'; // Close the table-wrapper div

    ?>
</div>







<style>
  h1 {
    padding: 10px 0;
    margin: 150px auto 50px auto;
    text-align: center;
    font-size: 35px;
    color: #00c292;
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
    margin: 10px auto -10px auto;
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
        margin-bottom: 16.7px;
        height: 8px;
        background-color: #ddd;
    }

    .progress-bar {
    height: 100%;
    width: 100%;
    background-color: #00c292;
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