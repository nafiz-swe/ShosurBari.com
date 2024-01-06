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
  <title>Customers-Admin | ShosurBari</title>
</head>
<body>
  <!-- ====== Admin Panel Navigation Bar ====== -->
  <?php include("admin_navigation.php"); ?>
  <!-- ========================================= -->
  <?php
  echo '<style>
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
    min-width: 4000px;
    padding: 20px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
  }  
  th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
  }
  th {
    background-color: #00c292;
    color: white;
    border: 1px solid #ccc;
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
  tr:hover {
    background-color: #ddd;
  }
  tr:nth-child(even) {
    background-color: #f2f2f2;
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
  tr.processing {
    background-color: orange;
    color: #fff;
  }
  tr.sent {
    background-color: #22c55e;
    color: #fff;
  }
  tr.cancel {
    background-color: gray;
    color: #fff;
  }
  tr.invalid{
    background-color: #ff0080;
    color: #fff;
  }
  tr.unknown {
    background-color: lightgray;
  }
  input[type=submit] {
    width: 82px;
    margin-top: 5px;
    border-radius: 4px;
    float: left;
    color: #fff;
    background: linear-gradient(#06b6d4, #0aa4ca);
    font-size: 14px;
    height: 30px;
    box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
    border: 1px solid rgba(0,0,0,.05);
    line-height: 29px;
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
  $sql = "SELECT COUNT(*) AS user_count FROM customer_sent_info_complete";
  $result = mysqli_query($conn, $sql);
  if ($result) {
      $row = mysqli_fetch_assoc($result);
      $userCount = $row["user_count"];
  } else {
      echo "Error: " . mysqli_error($conn);
  }
    echo "<h1>কাস্টমার ও পেমেন্ট</h1>";
    echo '<div class="table-wrapper">';
      echo "<h3>সর্বমোট কাস্টমার: " . $userCount . "</h3>";
      echo '<div id="search-form">
      <form method="POST">
        <input type="text" id="search-user-id" name="search-user-id" placeholder="বায়োডাটা নং">
        <button class="search-admin" type="submit" name="search">Search</button>
        <select style="margin-top: 20px; width: 200px;" name="search-criteria" id="search-criteria">
        <option>.....??</option>
            <option value="id">রিসিভ আইডি (SBCR)</option>
            <option value="payment_order_id">রিকোয়েস্ট আইডি (SBBR)</option>
          <option value="payment_cust_email">ই-মেইল</option>
          <option value="payment_cust_name">নাম</option>
          <option value="payment_cust_number">ফোন নাম্বার</option>
        </select>
        <input type="text" id="search-keyword" name="search-keyword" placeholder="রিকো. আইডি/ই-মেইল/নাম/ নাম্বার">
        <button class="search-admin" type="submit" name="search">Search</button>
        <button class="search-clear-admin" type="submit" name="clear">Clear Search</button></br>
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
      if ($searchCriteria == 'payment_cust_email') {
        $sql = "SELECT * FROM customer_sent_info_complete WHERE payment_cust_email LIKE '%$searchKeyword%' $limit";
        } elseif ($searchCriteria == 'id') {
          $sql = "SELECT * FROM customer_sent_info_complete WHERE id LIKE '%$searchKeyword%' $limit";
          }  elseif ($searchCriteria == 'payment_order_id') {
            $sql = "SELECT * FROM customer_sent_info_complete WHERE payment_order_id LIKE '%$searchKeyword%' $limit";
            } elseif ($searchCriteria == 'payment_cust_name') {
          $sql = "SELECT * FROM customer_sent_info_complete WHERE payment_cust_name LIKE '%$searchKeyword%' $limit";
          } elseif ($searchCriteria == 'payment_cust_number') {
          // Remove non-numeric characters from the search keyword
          $searchKeyword = preg_replace("/[^0-9]/", "", $searchKeyword);
          $sql = "SELECT * FROM customer_sent_info_complete WHERE REPLACE(payment_cust_number, ' ', '') LIKE '%$searchKeyword%' $limit";
        }
      } elseif (!empty($searchUserId)) {
        $searchUserId = mysqli_real_escape_string($conn, $searchUserId);
        $sql = "SELECT * FROM customer_sent_info_complete WHERE user_id = $searchUserId $limit";
      } else {
        $sql = "SELECT * FROM customer_sent_info_complete ORDER BY id DESC $limit OFFSET $start";
      }
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo '<div class="table-container">';
        echo "<table>";
        echo '<tr>
          <th>রিসিভ আইডি (SBCR)</th>
          <th>রিকোয়েস্ট আইডি (SBBR)</th>
          <th>রেজিস্টার ইউজার /</br> বায়োডাটা নং</th>
          <th>কাস্টমার নাম</th>
          <th>কাস্টমার মোবাইল নাম্বার</th>
          <th>কাস্টমার ইমেইল</th>
          <th>কাস্টমার স্থায়ী ঠিকানা</th>
          <th>মোট বায়োডাটা</th>
          <th>মোট টাকা</th>
          <th>পেমেন্ট মেথড</th>
          <th>তথ্য ১ রিকোয়েস্ট বায়োডাটা</th>
          <th>তথ্য ১ অভিভাবক</th>
          <th>তথ্য ১ পাত্র-পাত্রীর</th>
          <th>তথ্য ২ রিকোয়েস্ট বায়োডাটা</th>
          <th>তথ্য ২ অভিভাবক</th>
          <th>তথ্য ২ পাত্র-পাত্রীর</th>
          <th>তথ্য ৩ রিকোয়েস্ট বায়োডাটা</th>
          <th>তথ্য ৩ অভিভাবক</th>
          <th>তথ্য ৩ পাত্র-পাত্রীর</th>
          <th>তথ্য ৪ রিকোয়েস্ট বায়োডাটা</th>
          <th>তথ্য ৪ অভিভাবক</th>
          <th>তথ্য ৪ পাত্র-পাত্রীর</th>
          <th>তথ্য ৫ রিকোয়েস্ট বায়োডাটা</th>
          <th>তথ্য ৫ অভিভাবক</th>
          <th>তথ্য ৫ পাত্র-পাত্রীর</th>
          <th>তথ্য ৬ রিকোয়েস্ট বায়োডাটা</th>
          <th>তথ্য ৬ অভিভাবক</th>
          <th>তথ্য ৬ পাত্র-পাত্রীর</th>
          <th>তথ্য ৭ রিকোয়েস্ট বায়োডাটা</th>
          <th>তথ্য ৭ অভিভাবক</th>
          <th>তথ্য ৭ পাত্র-পাত্রীর</th>
          <th>তথ্য ৮ রিকোয়েস্ট বায়োডাটা</th>
          <th>তথ্য ৮ অভিভাবক</th>
          <th>তথ্য ৮ পাত্র-পাত্রীর</th>
          <th>তথ্য ৯ রিকোয়েস্ট বায়োডাটা</th>
          <th>তথ্য ৯ অভিভাবক</th>
          <th>তথ্য ৯ পাত্র-পাত্রীর</th>
          <th>তথ্য ১০ রিকোয়েস্ট বায়োডাটা</th>
          <th>তথ্য ১০ অভিভাবক</th>
          <th>তথ্য ১০ পাত্র-পাত্রীর</th>
          <th>পেমেন্ট তারিখ</th>
          <th>তথ্য প্রদানের তারিখ</th>
        </tr>';
        // ..
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . $row['id'] . '</td>';
          echo '<td>' . $row['payment_order_id'] . '</td>';
          echo '<td>' . $row['user_id'] . '</td>';
          echo '<td>' . $row['payment_cust_name'] . '</td>';
          echo '<td>' . $row['payment_cust_number'] . '</td>';
          echo '<td>' . $row['payment_cust_email'] . '</td>';
          echo '<td>' . $row['cust_permanent_address'] . '</td>';
          echo '<td>' . $row['payment_biodata_quantity'] . '</td>';
          echo '<td>' . $row['payment_amount'] . '</td>';
          echo '<td>' . $row['real_payment_method'] . '</td>';

          echo '<td>' . $row['biodata_number_1'] . '</td>';
          echo '<td>' . $row['biodata_guardian_1'] . '</td>';
          echo '<td>' . $row['biodata_patropatri_1'] . '</td>';

          echo '<td>' . $row['biodata_number_2'] . '</td>';
          echo '<td>' . $row['biodata_guardian_2'] . '</td>';
          echo '<td>' . $row['biodata_patropatri_2'] . '</td>';
          
          echo '<td>' . $row['biodata_number_3'] . '</td>';
          echo '<td>' . $row['biodata_guardian_3'] . '</td>';
          echo '<td>' . $row['biodata_patropatri_3'] . '</td>';

          echo '<td>' . $row['biodata_number_4'] . '</td>';
          echo '<td>' . $row['biodata_guardian_4'] . '</td>';
          echo '<td>' . $row['biodata_patropatri_4'] . '</td>';

          echo '<td>' . $row['biodata_number_5'] . '</td>';
          echo '<td>' . $row['biodata_guardian_5'] . '</td>';
          echo '<td>' . $row['biodata_patropatri_5'] . '</td>';

          echo '<td>' . $row['biodata_number_6'] . '</td>';
          echo '<td>' . $row['biodata_guardian_6'] . '</td>';
          echo '<td>' . $row['biodata_patropatri_6'] . '</td>';

          echo '<td>' . $row['biodata_number_7'] . '</td>';
          echo '<td>' . $row['biodata_guardian_7'] . '</td>';
          echo '<td>' . $row['biodata_patropatri_7'] . '</td>';

          echo '<td>' . $row['biodata_number_8'] . '</td>';
          echo '<td>' . $row['biodata_guardian_8'] . '</td>';
          echo '<td>' . $row['biodata_patropatri_8'] . '</td>';

          echo '<td>' . $row['biodata_number_9'] . '</td>';
          echo '<td>' . $row['biodata_guardian_9'] . '</td>';
          echo '<td>' . $row['biodata_patropatri_9'] . '</td>';

          echo '<td>' . $row['biodata_number_10'] . '</td>';
          echo '<td>' . $row['biodata_guardian_10'] . '</td>';
          echo '<td>' . $row['biodata_patropatri_10'] . '</td>';

          echo '<td>' . $row['cust_payment_date'] . '</td>';
          echo '<td>' . $row['info_sent_time'] . '</td>';
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