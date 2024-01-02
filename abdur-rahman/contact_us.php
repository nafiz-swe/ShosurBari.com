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
  <title>ContactUs-Admin | ShosurBari</title>
</head>
<body>
  <!-- ====== Admin Panel Navigation Bar ====== -->
  <?php include("admin_navigation.php"); ?>
  <!-- ========================================= -->
  <?php
  echo '<style>
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

  .read-row {
    background-color: #22c55e;
    color: #fff;
  }
  .unread-row {
    background-color: #ff0080;
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
  // count the total number of user profiles
  $sql = "SELECT COUNT(*) AS user_count FROM contact_us";
  $result = mysqli_query($conn, $sql);
  if ($result) {
      $row = mysqli_fetch_assoc($result);
      $userCount = $row["user_count"];
  } else {
      echo "Error: " . mysqli_error($conn);
  }
    echo "<h1>রিপোর্ট এবং সাপোর্ট ম্যাসেজ</h1>";
    echo '<div class="table-wrapper">';
      echo "<h3>সর্বমোট ম্যাসেজ করেছে: " . $userCount . "</h3>";
      echo '<div id="search-form">
      <form method="POST">
        <input type="text" id="search-user-id" name="search-user-id" placeholder="বায়োডাটা নং">
        <button class="search-admin" type="submit" name="search">Search</button>
        <select style="margin-top: 20px; width: 200px;" name="search-criteria" id="search-criteria">
        <option>.....??</option>
          <option value="contact_id">আইডি নং</option>
          <option value="user_email">ই-মেইল</option>
          <option value="name_contactus">নাম</option>
          <option value="number_contactus">ফোন নাম্বার</option>
        </select>
        <input type="text" id="search-keyword" name="search-keyword" placeholder="আইডি নং/ই-মেইল/নাম/ নাম্বার" >
        <button class="search-admin" type="submit" name="search">Search</button>
        <button class="search-clear-admin" type="submit" name="clear" style="margin-left: 10px;">Clear Search</button>
      </form>
      <form method="GET">
        <label for="per-page" style="margin-top: 20px;">প্রতি পেজে কয়টি প্রোফাইল দেখতে চান</label>
        <select name="per_page" id="per-page" onchange="this.form.submit()">
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
      $searchUserId = isset($_POST['search-user-id']) ? $_POST['search-user-id'] : '';
      $searchCriteria = isset($_POST['search-criteria']) ? $_POST['search-criteria'] : '';
      $searchKeyword = isset($_POST['search-keyword']) ? mysqli_real_escape_string($conn, $_POST['search-keyword']) : '';
      if (!empty($searchKeyword)) {
        if ($searchCriteria == 'user_email') {
          $sql = "SELECT * FROM contact_us WHERE email_contactus LIKE '%$searchKeyword%' $limit";
        }  elseif ($searchCriteria == 'contact_id') {
          $sql = "SELECT * FROM contact_us WHERE contact_id LIKE '%$searchKeyword%' $limit";
          } elseif ($searchCriteria == 'name_contactus') {
          $sql = "SELECT * FROM contact_us WHERE name_contactus LIKE '%$searchKeyword%' $limit";
          } elseif ($searchCriteria == 'number_contactus') {
          // Remove non-numeric characters from the search keyword
          $searchKeyword = preg_replace("/[^0-9]/", "", $searchKeyword);
          $sql = "SELECT * FROM contact_us WHERE REPLACE(number_contactus, ' ', '') LIKE '%$searchKeyword%' $limit";
        }  
      } elseif (!empty($searchUserId)) {
        $searchUserId = mysqli_real_escape_string($conn, $searchUserId);
        $sql = "SELECT * FROM contact_us WHERE user_id = $searchUserId $limit";
      } else {
        $sql = "SELECT * FROM contact_us ORDER BY contact_id DESC $limit OFFSET $start";
      }
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo '<div class="table-container">';
        echo "<table>";
        echo '<tr>
          <th>আইডি নং</th>
          <th>রেজিস্টার ইউজার /</br> বায়োডাটা নং</th>
          <th>নাম</th>
          <th>মোবাইল নাম্বার</th>
          <th>ইমেইল</th>
          <th>সাবজেক্ট</th>
          <th>মেসেজ</th>
          <th>তারিখ সময়</th>
          <th>একটিভ স্ট্যাটাস</th>
          <th>আপডেট স্ট্যাটাস</th>
        </tr>';
      while ($row = mysqli_fetch_assoc($result)) {
        $rowClass = ($row['read_message'] == 1) ? 'read-row' : 'unread-row';
        echo '<tr class="' . $rowClass . '">';
        echo '<td>' . $row['contact_id'] . '</td>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['name_contactus'] . '</td>';
        echo '<td>' . $row['number_contactus'] . '</td>';
        echo '<td>' . $row['email_contactus'] . '</td>';
        echo '<td>' . $row['subject'] . '</td>';
        echo '<td>' . $row['message_contactus'] . '</td>';
        echo '<td>' . $row['message_sendingdate'] . '</td>';
        echo '<td>';
        echo ($row['read_message'] == 1) ? 'Read' : 'Unread';
        echo '</td>';
        echo '<td>';
        echo '<form action="contact_message_update.php" method="GET">';
        echo '<input type="hidden" name="id" value="' . $row['contact_id'] . '">';
        echo '<button type="submit" name="submit" class="mark-as-read">Mark ' . ($row['read_message'] ? 'Unread' : 'Read') . '</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
      }
      echo '</table>';
      echo '</div>'; // Close the table-container div
      // Calculate the total number of pages
      $total_pages = ceil($userCount / $profilesPerPage);
      // Define how many pages to show before and after the current page
      $pages_to_show = 1;
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
  </script>
  <!-- ===== Admin Panel Footer Area ===== -->
  <?php include("admin_footer.php"); ?>
  <!-- =================================== -->
</body>
</html>