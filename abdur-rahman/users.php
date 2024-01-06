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
  <title>Users-Admin | ShosurBari</title>
</head>
<body>
  <!-- ====== Admin Panel Navigation Bar ====== -->
  <?php include("admin_navigation.php"); ?>
  <!-- ========================================= -->
  <style>
  @media (max-width:990px){
    h1{
      margin-top: -100px;
    }
    }
  h1{
    padding: 170px 0 10px 0;
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
  th, td {
    border: 2px solid #f0f0f0;
    padding: 8px;
    text-align: center;
  }
  th {
    background-color: #00c292;
    color: white;
    border: 2px solid #ccc;
  }
  tr.inactive {
    background: #ff0080;
    color: #fff;
  }
  tr:hover {
    background-color: #ddd;
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
  <?php
  require_once("includes/dbconn.php");
  // Number of profiles to display per page
  $profilesPerPage = isset($_GET['per_page']) ? intval($_GET['per_page']) : 25;
  $limit = ($profilesPerPage == 'all') ? '' : "LIMIT $profilesPerPage";
  // Pagination variables
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $start = ($page - 1) * $profilesPerPage;
  // Execute the SQL query to count the total number of user profiles
  $sql = "SELECT COUNT(DISTINCT id) AS user_count FROM users";
  $result = $conn->query($sql);
  // Check if the query was successful
  if ($result) {
    $row = $result->fetch_assoc();
    $userCount = $row["user_count"];
  } else {
    echo "Error: " . $conn->error;
  }
  if (isset($_POST['search'])) {
    $searchUserId = mysqli_real_escape_string($conn, $_POST['search-user-id']);
    $sql = "SELECT * FROM users WHERE id = $searchUserId $limit";
    $result = mysqli_query($conn, $sql);
  } else {
    $sql = "SELECT * FROM users ORDER BY id DESC $limit OFFSET $start";
    $result = mysqli_query($conn, $sql);
  }
  if (mysqli_num_rows($result) > 0) {
      echo "<h1>রেজিস্টার-বায়োডাটার একাউন্ট</h1>";
      echo '<div class="table-wrapper">';
        echo "<h3>সর্বমোট রেজিস্টার একাউন্ট: " . $userCount . "</h3>";
        echo '<div id="search-form">
          <form method="POST">
            <input type="text" id="search-user-id" name="search-user-id" placeholder="User ID" required>
            <button class="search-admin" type="submit" name="search">Search</button>
            <button class="search-clear-admin" type="submit" name="clear">Clear Search</button></br>
          </form>
          <form method="GET">
            <label for="per-page" style="margin-top: 20px;">প্রতি পেজে কয়টি প্রোফাইল দেখতে চান</label>
            <select id="per-page" name="per_page" onchange="updateProfilesPerPage()">
              <option value="">.....??</option>
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
        echo "<div class='table-container'>";
        echo '<table>';
          echo '<tr>
          <th>User ID</th>
          <th>FullName</th>
          <th>UserName</th>
          <th>Gender</th>
          <th>Email</th>
          <th>Country</th>
          <th>Phone Code</th>
          <th>Number</th>
          <th>Reg.Date</th>
          <th>Delete</th>
          <th>Deactivate/Activate</th>
          </tr>';
          $count = 0;
          while ($row = mysqli_fetch_assoc($result)) {
          $count++;
          if ($profilesPerPage !== 'all' && $count > $profilesPerPage) {
            // Hide profiles beyond the selected per page limit
            continue;
          }
          $id = $row['id'];
          $class = $row['active'] == 1 ? "active" : "inactive";
          echo '<tr class="' . $class . '">';
          echo '<td><a target="_blank" href="../profile.php?/Biodata=' . $row['id'] . '">' . $row['id'] .  " " . "View" . '</a></td>';
          echo '<td>' . $row['fullname'] . '</td>';
          echo '<td>' . $row['username'] . '</td>';
          echo '<td>' . $row['gender'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['country_name'] . '</td>';
          echo '<td>' . $row['country_code'] . '</td>';
          echo '<td>' . $row['number'] . '</td>';
          echo '<td>' . $row['register_date'] . '</td>';
          echo '<td><a href="#" onclick="confirmDelete(' . $id . ')">Delete</a></td><td>';
          if ($row['active'] == 1) {
            echo '<a href="#"  onclick="confirmDeactivate(' . $id . ')">Deactivate</a>';
          } else {
            echo '<a href="#" onclick="confirmActivate(' . $id . ')">Activate</a>';
          }
          echo '</td></tr>';
          }
        echo '</table>';
        echo '</div>'; // Close the table-container div
        // Calculate the total number of pages
        $total_pages = ceil($userCount / $profilesPerPage);
        // Define how many pages to show before and after the current page
        $pages_to_show = 1; // You can adjust this number as needed
        // Pagination links
        echo "<div class='pagination'>";
          if ($total_pages > 1) {
          if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . "&per_page=$profilesPerPage' class='page-link'><i class='fa fa-angle-double-left'></i></a>";
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
            echo "<a href='?page=" . ($page + 1) . "&per_page=$profilesPerPage' class='page-link'><i class='fa fa-angle-double-right'></i></a>";
          }
          }
        echo "</div>";
        } else {
        echo 'No users found.';
        }
    mysqli_close($conn);
  ?>
  <script>
  function updateProfilesPerPage() {
    const perPageSelect = document.getElementById('per-page');
    const selectedValue = perPageSelect.value;
    window.location.href = `?per_page=${selectedValue}`;
  }
  function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this user?")) {
    window.location.href = "delete_user.php?id=" + id;
    }
  }
  function confirmDeactivate(id) {
    if (confirm("Are you sure you want to deactivate this user?")) {
    window.location.href = "deactivate_user.php?id=" + id;
    }
  }
  function confirmActivate(id) {
    if (confirm("Are you sure you want to activate this user?")) {
    window.location.href = "activate_user.php?id=" + id;
    }
  }  
  </script>
  <!-- ===== Admin Panel Footer Area ===== -->
  <?php include("admin_footer.php"); ?>
  <!-- =================================== -->
</body>
</html>