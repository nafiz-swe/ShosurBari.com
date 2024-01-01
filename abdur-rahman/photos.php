<?php
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
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
  <title>Photos-Admin | ShosurBari</title>
</head>
<body>
  <!-- ====== Admin Panel Navigation Bar ====== -->
  <?php include("admin_navigation.php"); ?>
  <!-- ========================================= -->
  <style>

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
  td form a,
  td form input[type="submit"] {
    border: none;
    cursor: pointer;
    text-align: center;
    cursor: pointer;
    width: 90px;
    height: 40px;
    line-height: 25px;
    margin: 15px auto;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 1px 1px 4px #888;
    font-size: 14px;
    color: #fff;
    font-weight: 400;
  }
  td form input[type="submit"] {
    background: red;
  }
  td form a {
    background: #22c55e;
  }
  td form input[type="submit"]:hover,
  td form a:hover {
    color: white;
    background: #079f79;
  }








  h1{
    padding: 10px 0;
    padding-top:120px;
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
    min-width: 2500px;
    padding: 20px;
    border: 2px solid #f0f0f0;
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
    max-height: 90vh;
    width: 90%;
    margin: auto;
  }
  .table-wrapper {
    overflow: hidden;
    margin: 20px auto 0px auto;
    width: 90%;
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
  /* Progress bar styling */
  .pagination{
    display: block;
    padding: 0;
    list-style: none;
    width: 90%;
    margin: 50px auto 120px auto;
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
    <h1>পাত্রপাত্রীদের প্রোফাইল ছবি</h1>
    <?php
    require_once("includes/dbconn.php");
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
    $profilesPerPage = isset($_GET['per_page']) ? intval($_GET['per_page']) : 25;
    // Get the current page number
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    // Calculate the OFFSET for SQL LIMIT
    $offset = ($currentPage - 1) * $profilesPerPage;
    $sql = "SELECT DISTINCT user_id FROM photos LIMIT $profilesPerPage OFFSET $offset";
    $result = mysqlexec($sql);
    echo '<div class="table-wrapper">';
      echo "<h3>Total number of user profiles: " . $userCount . "</h3>";
        echo '<div id="search-form">
          <form method="POST">
            <input type="text" id="search-user-id" name="search-user-id" placeholder="বায়োডাটা নং" required>
            <button class="search-admin" type="submit" name="search">Search</button>
            <button class="search-clear-admin" type="submit" name="clear">Clear Search</button></br>
          </form>
          <form method="GET">
          <label for="per-page" style="margin-top: 20px;">প্রতি পেজে কয়টি প্রোফাইল দেখতে চান</label>
          <select id="per-page" name="per_page" onchange="updateProfilesPerPage()">
              <option>.....??</option>
              <option value="50" ' . ($profilesPerPage == 50 ? 'selected' : '') . '>50</option>
              <option value="100" ' . ($profilesPerPage == 100 ? 'selected' : '') . '>100</option>
              <option value="500" ' . ($profilesPerPage == 500 ? 'selected' : '') . '>500</option>
              <option value="1000" ' . ($profilesPerPage == 1000 ? 'selected' : '') . '>1000</option>
              <option value="10000" ' . ($profilesPerPage == 10000 ? 'selected' : '') . '>10000</option>
              <option value="20000" ' . ($profilesPerPage == 20000 ? 'selected' : '') . '>20000</option>
            </select>
          </form>
        </div>';
        echo '</div>'; // Close the table-wrapper div

        echo '<div class="table-container">';
        echo "<table>";
        if (isset($_POST['search'])) {
          $searchUserId = mysqli_real_escape_string($conn, $_POST['search-user-id']);
          $sql = "SELECT * FROM photos WHERE user_id = $searchUserId";
          $result = mysqli_query($conn, $sql);
        }
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
          echo "<a href=\"../profile.php?/Biodata={$profid}\" target=\"_blank\">";
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
          }}}
          echo "</tr>";
          }
        }
      }
      echo "</table>";
      echo '</div>'; // Close the table-container div
      // Calculate the total number of pages
      $total_pages = ceil($userCount / $profilesPerPage);
      $pages_to_show = 1;
      // Pagination links
      echo "<div class='pagination'>";
        if ($total_pages > 1) {
          if ($currentPage > 1) {
          echo "<a href='photos.php?page=" . ($currentPage - 1) . "&per_page=$profilesPerPage' class='page-link'><i class='fa fa-angle-double-left'></i></a>";
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
          echo "<a href='photos.php?page=" . ($currentPage + 1) . "&per_page=$profilesPerPage' class='page-link'><i class='fa fa-angle-double-right'></i></a>";
        }
        }
      echo "</div>";
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