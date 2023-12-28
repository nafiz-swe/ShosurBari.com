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
  <title>Partner-Admin | ShosurBari</title>
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
  require_once("includes/dbconn.php");
  // Number of profiles to display per page
  $profilesPerPage = isset($_GET['per_page']) ? intval($_GET['per_page']) : 25;
  $limit = ($profilesPerPage == 'all') ? '' : "LIMIT $profilesPerPage";
  // Pagination variables
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $start = ($page - 1) * $profilesPerPage;
  // Execute the SQL query to count the total number of user profiles
  $sql = "SELECT COUNT(DISTINCT user_id) AS user_count FROM 9bd_expected_life_partner";
  $result = $conn->query($sql);
  // Check if the query was successful
  if ($result) {
    $row = $result->fetch_assoc();
    $userCount = $row["user_count"];
  } else {
    echo "Error: " . $conn->error;
  }
  // Fetch user data from the database with pagination
  $sql = "SELECT * FROM 9bd_expected_life_partner $limit OFFSET $start";
  $result = mysqli_query($conn, $sql);
  echo '<div class="table-container">';
    echo "<h1>প্রত্যাশিত জীবনসঙ্গীর বিবরণ</h1>";
    echo '<div class="table-wrapper">';
      echo "<h3>Total number of user profiles: " . $userCount . "</h3>";
      echo '<div id="search-form">
        <form method="POST">
          <input type="text" id="search-user-id" name="search-user-id" placeholder="বায়োডাটা নং" required>
          <button class="search-admin" type="submit" name="search">Search</button>
          <button class="search-clear-admin" type="submit" name="clear" >Clear Search</button></br>
        </form>
        <form method="GET">
          <label for="per-page">Profiles Show</label>
          <select id="per-page" name="per_page" onchange="updateProfilesPerPage()">
            <option value=""> </option>
            <option value="50" ' . ($profilesPerPage == 50 ? 'selected' : '') . '>50</option>
            <option value="100" ' . ($profilesPerPage == 100 ? 'selected' : '') . '>100</option>
            <option value="500" ' . ($profilesPerPage == 500 ? 'selected' : '') . '>500</option>
            <option value="1000" ' . ($profilesPerPage == 1000 ? 'selected' : '') . '>1000</option>
            <option value="10000" ' . ($profilesPerPage == 10000 ? 'selected' : '') . '>10000</option>
            <option value="20000" ' . ($profilesPerPage == 20000 ? 'selected' : '') . '>20000</option>
          </select>
        </form>
      </div>';
      if (isset($_POST['search'])) {
        $searchUserId = mysqli_real_escape_string($conn, $_POST['search-user-id']);
        $sql = "SELECT * FROM 9bd_expected_life_partner WHERE user_id = $searchUserId $limit";
        $result = mysqli_query($conn, $sql);
      }
      if (mysqli_num_rows($result) > 0) {
      echo '<table>';
        echo '<tr>
        <th>বায়োডাটা নং</th>
        <th>জীবনসঙ্গীর ধর্মীয় বিষয়াবলী</th>
        <th>জীবনসঙ্গীর নাগরিকত্ব/সিটিজেনশিপ</th>
        <th>জীবনসঙ্গী যেই জেলার</th>
        <th>জীবনসঙ্গীর বৈবাহিক অবস্থা</th>
        <th>জীবনসঙ্গীর বয়স যেমনটা</th>
        <th>জীবনসঙ্গীর শারীরিক বর্ণ</th>
        <th>জীবনসঙ্গীর উচ্চতা</th>
        <th>জীবনসঙ্গীর শিক্ষাগত যোগ্যতা</th>
        <th>জীবনসঙ্গীর পেশা</th>
        <th>জীবনসঙ্গীর অর্থনৈতিক অবস্থা</th>
        <th>জীবনসঙ্গীর বৈশিষ্ঠ ও গুণাবলী</th>
        <th>পরিবারের অনুমতি নিয়ে বায়োডাটা জমা দিচ্ছেন?</th>
        <th>সৃষ্টিকর্তার শপথ করে সাক্ষ্য দিন, তথ্যগুলো সব সত্য?</th>
        <th>মিথ্যা তথ্য প্রদান করলে দায়ভার কর্তৃপক্ষ নিবে না। আপনি কি সম্মত?</th>
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
        echo '<td>' . $row['partner_religius'] . '</td>';
        echo '<td>' . $row['partner_citizen'] . '</td>';
        echo '<td>' . $row['partner_district'] . '</td>';
        echo '<td>' . $row['partner_maritialstatus'] . '</td>';
        echo '<td>' . $row['partner_age'] . '</td>';
        echo '<td>' . $row['partner_skintones'] . '</td>';
        echo '<td>' . $row['partner_height'] . '</td>';
        echo '<td>' . $row['partner_education'] . '</td>';
        echo '<td>' . $row['partner_profession'] . '</td>';
        echo '<td>' . $row['partner_financial'] . '</td>';
        echo '<td>' . $row['partner_attributes'] . '</td>';
        echo '<td>' . $row['parents_permission'] . '</td>';
        echo '<td>' . $row['real_info_commited'] . '</td>';
        echo '<td>' . $row['authorities_no_responsible'] . '</td>';
        echo '<td>' . $row['profilecreationdate'] . '</td>';
        echo '<td><a target="_blank" href="edit_partner.php?id=' . $row['user_id'] . '">Edit</a></td>';
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
      $pages_to_show = 1;
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