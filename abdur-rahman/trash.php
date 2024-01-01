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
  <title>Trash-Admin | ShosurBari</title>
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
  td form{
    margin: 5px 5px -20px 5px;
    text-align: center;
    justify-content: center;
    align-items: center;
    width: 50%;
    display: inline;
  }
  td form input[type="submit"] {
    border: none;
    cursor: pointer;
    text-align: center;
    cursor: pointer;
    width: 75px;
    height: 35px;
    line-height: 35px;
    background: #22c55e;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 1px 1px 4px #888;
    font-size: 13px;
    color: #fff;
    font-weight: 400;
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
    <h1>পাত্রপাত্রীদের ডিলিট হওয়া ছবি</h1>
    <?php
    function sanitize($input) {
      return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
    // Get search query, per_page, and page number from URL parameters
    $search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
    $per_page = isset($_GET['per_page']) ? intval($_GET['per_page']) : 25; // Default to 50 profiles per page
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Get the current page number
    // Check if the trash folder exists
    if (!is_dir("../profile")) {
      echo "<p>Trash folder does not exist.</p>";
    } else {
    // Open the profile folder
    $profile_folders = scandir("../profile");
    $displayedUserIDs = array();
    $totalUserIDsInTrash = 0;
    // Loop through each user's folder
    foreach ($profile_folders as $user_folder) {
    if ($user_folder !== "." && $user_folder !== "..") {
    $trash_folder = "../profile/{$user_folder}/trash/";
    // Check if the user's trash folder exists
    if (is_dir($trash_folder)) {
    $deleted_images = scandir($trash_folder);
    // Check if there are deleted images in the trash folder
    if (count($deleted_images) > 2) { // 2 because . and .. are also counted
    // Filter profiles based on the search query
    if (empty($search) || strpos($user_folder, $search) !== false) {
      $totalUserIDsInTrash++;
    }
    }}}}
    // Calculate the total number of pages
    $total_pages = ceil($totalUserIDsInTrash / $per_page);
    // Ensure the current page is within valid bounds
    if ($page < 1) {
      $page = 1;
    } elseif ($page > $total_pages) {
      $page = $total_pages;
    }
    $offset = ($page - 1) * $per_page;
    echo '<div class="table-wrapper">';
    echo '<h3>Total number of user profiles in this page: ' . $totalUserIDsInTrash . '</h3>';
      echo '<div id="search-form">
        <form method="GET" action="">
          <input type="text" name="search" id="search" value="' . (isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : '') . '" placeholder="বায়োডাটা নং"  />
          <button class="search-admin" type="submit">Search</button>
          <button class="search-clear-admin"  type="button" onclick="clearSearch()">Clear Search</button><br>
          <label for="per-page" style="margin-top: 20px;">প্রতি পেজে কয়টি প্রোফাইল দেখতে চান</label>
          <select name="per_page" id="per_page">
            <option>.....??</option>
            <option value="50" ' . ($per_page == 50 ? 'selected' : '') . '>50</option>
            <option value="100" ' . ($per_page == 100 ? 'selected' : '') . '>100</option>
            <option value="500" ' . ($per_page == 500 ? 'selected' : '') . '>500</option>
            <option value="1000" ' . ($per_page == 1000 ? 'selected' : '') . '>1000</option>
            <option value="10000" ' . ($per_page == 10000 ? 'selected' : '') . '>10000</option>
            <option value="20000" ' . ($per_page == 20000 ? 'selected' : '') . '>20000</option>
          </select>
        </form>
      </div>';
      echo '</div>'; // Close the table-wrapper div

      echo '<div class="table-container">';
      echo '<table>';
      echo "<tr>";
      echo "<th>বায়োডাটা নং</th>"; // Left heading
      for ($i = 1; $i <= 20; $i++) {
        echo "<th>Image-$i</th>";
      }
      echo "</tr>";
      // Counter to keep track of displayed profiles
      $displayedCount = 0;
      // Loop through each user's folder and display the images
      foreach ($profile_folders as $user_folder) {
      if ($user_folder !== "." && $user_folder !== "..") {
      $trash_folder = "../profile/{$user_folder}/trash/";
      // Check if the user's trash folder exists
      if (is_dir($trash_folder)) {
      $deleted_images = scandir($trash_folder);
      // Check if there are deleted images in the trash folder
      if (count($deleted_images) > 2) { // 2 because . and .. are also counted
        // Filter profiles based on the search query
        if (empty($search) || strpos($user_folder, $search) !== false) {
        // Display the user ID in the left column only if it hasn't been displayed before
        if (!in_array($user_folder, $displayedUserIDs)) {
        echo '<tr>';
        echo '<td>' . sanitize($user_folder) . '</td>'; // Display User ID
        $displayedUserIDs[] = $user_folder; // Add the user ID to the displayed list
        } else {
        // If the user ID has been displayed, show an empty cell in the left column
        echo '<tr><td></td>';
        }
        // Display User ID in a new column for each deleted image
        foreach ($deleted_images as $deleted_image) {
        if ($deleted_image !== "." && $deleted_image !== "..") {
          // Display each profile picture as a column
          echo "<td><img src='" . htmlspecialchars($trash_folder . $deleted_image, ENT_QUOTES, 'UTF-8') . "' alt='Profile Image'>";
          //permanent delete button
          echo "<form method='POST' action='permanent_delete_img.php'>";
          echo "<input type='hidden' name='image_path' value='" . sanitize($trash_folder . $deleted_image) . "' />";
          echo "<input type='hidden' name='user_id' value='" . sanitize($user_folder) . "' />";
          echo "<input style=\"background: red;\" type='submit' name='permanent_delete_image' value='Delete' />";
          echo "</form>";
          //restore button below each image
          echo "<form method='POST' action='restore_img.php'>";
          echo "<input type='hidden' name='image_path' value='" . sanitize($trash_folder . $deleted_image) . "' />";
          echo "<input type='hidden' name='user_id' value='" . sanitize($user_folder) . "' />";
          echo "<input type='submit' name='restore_image' value='Restore' />";
          echo "</form>";
          echo "</td>";
        }}
        echo '</tr>';
        // Increment the displayed count
        $displayedCount++;
        // Check if the displayed count reaches the per_page limit
        if ($displayedCount >= $per_page) {
          break;
        }
        }
      }}}}
    echo '</table>';
    echo '</div>'; // Close the table-container div
    // Calculate the total number of pages
    $pages_to_show = 1;
    // Pagination links
    echo "<div class='pagination'>";
      if ($total_pages > 1) {
      if ($page > 1) {
        echo "<a href='trash.php?page=" . ($page - 1) . "&per_page=$per_page&search=$search' class='page-link'><i class='fa fa-angle-double-left'></i></a>";
      }
      for ($i = 1; $i <= $total_pages; $i++) {
      if ($i == 1 || $i == $total_pages || ($i >= $page - 2 && $i <= $page + 2)) {
        $active = $i == $page ? "active" : "";
        echo "<a href='trash.php?page=$i&per_page=$per_page&search=$search' class='page-link $active'>$i</a>";
      } elseif ($i == $page - 3 || $i == $page + 3) {
        // Add "dot dot" nodes
        echo "<span class='page-link'>...</span>";
      }
      }
      if ($page < $total_pages) {
        echo "<a href='trash.php?page=" . ($page + 1) . "&per_page=$per_page&search=$search' class='page-link'><i class='fa fa-angle-double-right'></i></a>";
      }
      }
    echo "</div>";
    }
    ?>
  <script>
  // JavaScript function to clear the search query
  function clearSearch() {
    document.getElementById("search").value = "";
    // Reload the page without the search query
    window.location.href = window.location.pathname;
  }
  // JavaScript to auto-reload the page when the "Profiles Per Page" option is changed
  document.getElementById("per_page").addEventListener("change", function () {
    var selectedValue = this.value;
    // Reload the page with the selected per_page value as a URL parameter
    window.location.href = updateQueryStringParameter(window.location.href, "per_page", selectedValue);
  });
  // Function to update or add a URL parameter
  function updateQueryStringParameter(uri, key, value) {
  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  var separator = uri.indexOf("?") !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, "$1" + key + "=" + value + "$2");
  } else {
    return uri + separator + key + "=" + value;
  }
  }
  </script>
  <!-- ===== Admin Panel Footer Area ===== -->
  <?php include("admin_footer.php"); ?>
  <!-- =================================== -->
</body>
</html>