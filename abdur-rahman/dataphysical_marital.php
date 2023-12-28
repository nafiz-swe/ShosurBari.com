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
  <title>PhysicalMarital-Admin | ShosurBari</title>
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
  $sql = "SELECT COUNT(DISTINCT user_id) AS user_count FROM 1bd_personal_physical";
  $result = $conn->query($sql);
  // Check if the query was successful
  if ($result) {
    $row = $result->fetch_assoc();
    $userCount = $row["user_count"];
  } else {
    echo "Error: " . $conn->error;
  }
  $sql = "SELECT
    p.user_id,
    p.biodatagender,
    p.dateofbirth,
    p.height,
    p.weight,
    p.physicalstatus,
    p.Skin_tones,
    p.bloodgroup,
    p.profilecreationdate,
    mf.maritalstatus,
    mf.divorce_reason,
    mf.how_widow,
    mf.how_widower,
    mf.how_many_son,
    mf.son_details,
    mf.get_wife_permission,
    mf.get_family_permission,
    mf.why_again_married,
    m.allowstudy_aftermarriage,
    m.allowjob_aftermarriage,
    m.livewife_aftermarriage,
    m.profileby,
    f.anyjob_aftermarriage,
    f.studies_aftermarriage,
    f.agree_marriage_student,
    f.profileby
  FROM 1bd_personal_physical AS p
  LEFT JOIN 6bd_7bd_marital_status AS mf ON p.user_id = mf.user_id
  LEFT JOIN 6bd_marriage_related_qs_male AS m ON p.user_id = m.user_id
  LEFT JOIN 7bd_marriage_related_qs_female AS f ON p.user_id = f.user_id
  $limit OFFSET $start";
  $result = $conn->query($sql);
  echo '<div class="table-container">';
    echo "<h1>শারীরিক এবং বৈবাহিক তথ্য</h1>";
    echo '<div class="table-wrapper">';
      echo "<h3>Total number of user profiles: " . $userCount . "</h3>";
      echo '<div id="search-form">
        <form method="POST">
          <input type="text" id="search-user-id" name="search-user-id" placeholder="বায়োডাটা নং" required>
          <button class="search-admin" type="submit" name="search">Search</button>
          <button class="search-clear-admin" type="submit" name="clear">Clear Search</button></br>
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
        $sql = "SELECT
        p.user_id,
        p.biodatagender,
        p.dateofbirth,
        p.height,
        p.weight,
        p.physicalstatus,
        p.Skin_tones,
        p.bloodgroup,
        p.profilecreationdate,
        mf.maritalstatus,
        mf.divorce_reason,
        mf.how_widow,
        mf.how_widower,
        mf.how_many_son,
        mf.son_details,
        mf.get_wife_permission,
        mf.get_family_permission,
        mf.why_again_married,
        m.allowstudy_aftermarriage,
        m.allowjob_aftermarriage,
        m.livewife_aftermarriage,
        m.profileby,
        f.anyjob_aftermarriage,
        f.studies_aftermarriage,
        f.agree_marriage_student,
        f.profileby
        FROM 1bd_personal_physical AS p
        LEFT JOIN 6bd_7bd_marital_status AS mf ON p.user_id = mf.user_id
        LEFT JOIN 6bd_marriage_related_qs_male AS m ON p.user_id = m.user_id
        LEFT JOIN 7bd_marriage_related_qs_female AS f ON p.user_id = f.user_id
      WHERE p.user_id = $searchUserId
      $limit OFFSET $start";
      } else {
      $sql = "SELECT
        p.user_id,
        p.biodatagender,
        p.dateofbirth,
        p.height,
        p.weight,
        p.physicalstatus,
        p.Skin_tones,
        p.bloodgroup,
        p.profilecreationdate,
        mf.maritalstatus,
        mf.divorce_reason,
        mf.how_widow,
        mf.how_widower,
        mf.how_many_son,
        mf.son_details,
        mf.get_wife_permission,
        mf.get_family_permission,
        mf.why_again_married,
        m.allowstudy_aftermarriage,
        m.allowjob_aftermarriage,
        m.livewife_aftermarriage,
        m.profileby,
        f.anyjob_aftermarriage,
        f.studies_aftermarriage,
        f.agree_marriage_student,
        f.profileby
      FROM 1bd_personal_physical AS p
      LEFT JOIN 6bd_7bd_marital_status AS mf ON p.user_id = mf.user_id
      LEFT JOIN 6bd_marriage_related_qs_male AS m ON p.user_id = m.user_id
      LEFT JOIN 7bd_marriage_related_qs_female AS f ON p.user_id = f.user_id
      $limit OFFSET $start";
      }
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
      echo '<table>';
        echo '<tr>
        <th>বায়োডাটা নং</th>
        <th>বায়োডাটার ধরণ</th>
        <th>জন্ম তারিখ মাস সন</th>
        <th>উচ্চতা</th>
        <th>ওজন </th>
        <th>শারীরিক সমস্যা আছে কি?</th>
        <th>শারীরিক বর্ণ</th>
        <th>রক্তের গ্রুপ</th>
        <th style="color: #ad0000;">বৈবাহিক অবস্থা</th>
        <th style="color: #ad0000;">ডিভোর্সের কারণ এবং কতদিন সংসার করেছেন?</th>
        <th style="color: #ad0000;">স্বামী যেভাবে মারা গেছেন এবং কতদিন সংসার</th>
        <th style="color: #ad0000;">স্ত্রী যেভাবে মারা গেছেন এবং কতদিন সংসার</th>
        <th style="color: #ad0000;">বর্তমান স্ত্রীর অনুমতি নিয়েছেন?</th>
        <th style="color: #ad0000;">স্ত্রীর ও পরিবার থেকে অনুমতি নিয়েছেন?</th>
        <th style="color: #ad0000;">আবার বিয়ে করার কারণ</th>
        <th style="color: #ad0000;">কয়টি সন্তান আছে</th>
        <th style="color: #ad0000;">সন্তান সম্পর্কিত তথ্য</th>
        <th style="color: blue;">স্ত্রীকে চাকরি করতে দিতে ইচ্ছুক?</th>
        <th style="color: blue;">প্রাতিষ্ঠানিক পড়ালেখা করতে দিতে ইচ্ছুক?</th>
        <th style="color: blue;">বিয়ের পর স্ত্রীকে নিয়ে কোথায় থাকবেন?</th>
        <th style="color: blue;">বায়োডাটা টি যার, তার আপনি কে হন?</th>
        <th style="color: #b206a9;">বিয়ের পর চাকরি করতে চান?</th>
        <th style="color: #b206a9;">বিয়ের পর পড়াশোনা চালিয়ে যেতে চান?</th>
        <th style="color: #b206a9;">শিক্ষার্থী বিয়ে করতে রাজি আছেন?</th>
        <th style="color: #b206a9;">বায়োডাটা টি যার, তার আপনি কে হন?</th>
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
        echo '<td>' . $row['biodatagender'] . '</td>';
        echo '<td>' . $row['dateofbirth'] . '</td>';
        echo '<td>' . $row['height'] . '</td>';
        echo '<td>' . $row['weight'] . '</td>';
        echo '<td>' . $row['physicalstatus'] . '</td>';
        echo '<td>' . $row['Skin_tones'] . '</td>';
        echo '<td>' . $row['bloodgroup'] . '</td>';
        echo '<td style="color: #ad0000;">' . $row['maritalstatus'] . '</td>';
        echo '<td style="color: #ad0000;">' . $row['divorce_reason'] . '</td>';
        echo '<td style="color: #ad0000;">' . $row['how_widow'] . '</td>';
        echo '<td style="color: #ad0000;">' . $row['how_widower'] . '</td>';
        echo '<td style="color: #ad0000;">' . $row['get_wife_permission'] . '</td>';
        echo '<td style="color: #ad0000;">' . $row['get_family_permission'] . '</td>';
        echo '<td style="color: #ad0000;">' . $row['why_again_married'] . '</td>';
        echo '<td style="color: #ad0000;">' . $row['how_many_son'] . '</td>';
        echo '<td style="color: #ad0000;">' . $row['son_details'] . '</td>';
        echo '<td style="color: blue;">' . $row['allowjob_aftermarriage'] . '</td>';
        echo '<td style="color: blue;">' . $row['allowstudy_aftermarriage'] . '</td>';
        echo '<td style="color: blue;">' . $row['livewife_aftermarriage'] . '</td>';
        echo '<td style="color: blue;">' . $row['profileby'] . '</td>';
        echo '<td style="color: #b206a9;">' . $row['anyjob_aftermarriage'] . '</td>';
        echo '<td style="color: #b206a9;">' . $row['studies_aftermarriage'] . '</td>';
        echo '<td style="color: #b206a9;">' . $row['agree_marriage_student'] . '</td>';
        echo '<td style="color: #b206a9;">' . $row['profileby'] . '</td>';
        echo '<td>' . $row['profilecreationdate'] . '</td>';
        echo '<td><a target="_blank" href="edit_physical_marital.php?id=' . $row['user_id'] . '">Edit</a></td>';
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