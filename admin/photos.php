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

<div class="sbbiodata_profile_recentview">
    <h3>Profiles Recent View</h3>
    <?php
    // Getting unique user IDs
    $sql = "SELECT DISTINCT user_id FROM photos";
    $result = mysqlexec($sql);

    echo "<table>";

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
                echo "<th>বায়োডাটা নং : {$profid}</th>";

                foreach ($user_photos as $photo) {
                    if ($photo !== "." && $photo !== "..") {
                        // Check if $photo is a directory (folder)
                        if (!is_dir("{$user_folder}{$photo}")) {
                            echo "<td>";
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
    ?>
</div>






<style>
    .sbbiodata_profile_recentview {
        margin: 20px; /* Add margin to the container for spacing */
    }

    table {
        width: 300px;;
        border-collapse: collapse;
    }

    th {
        text-align: center;
        border: 2px solid #00c292;
        white-space: nowrap;
        padding: 10px; /* Add padding to the table headers for spacing */
    }

    td {
        border: 2px solid #00c292;
        padding: 15px; /* Add padding to the table cells for spacing */
    }

    img {
    height: 175px;
    width: 220px;
    object-fit: fill;
    border: 4px solid #fff;
    position: relative;
    top: 5px;
    z-index: 5;
    background: rgb(245, 242, 242);
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    margin: 0 auto;
    display: block;
    }


td form,
td a {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px; /* Adjust the gap between buttons as needed */
}

/* Optionally, you can style the buttons for better visibility */
td form input[type="submit"] {
    color: white;
    border: none;
    cursor: pointer;
    text-align: center;

    cursor: pointer;
    width: 90px;
    height: 30px;
    margin: 15px auto;
    /* background: linear-gradient(#06b6d4, #0ea5e9); */
    background: red;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: #fff;
    box-shadow: 1px 1px 4px #888;
}

td form a{
    color: white;
    border: none;
    cursor: pointer;

    cursor: pointer;
    width: 90px;
    height: 30px;
    margin: 15px auto;
    background: green;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: #fff;
    box-shadow: 1px 1px 4px #888;
}

td form input[type="submit"]:hover, td form a:hover{
    color: white;
    background: linear-gradient(#0aa4ca, #0acef1);
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