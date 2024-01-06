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
  <title>PhysicalMarital-Admin | ShosurBari</title>
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
    echo "<h1>শারীরিক এবং বৈবাহিক তথ্য</h1>";
    echo '<div class="table-wrapper">';
      echo "<h3>সর্বমোট পোস্ট করেছে: " . $userCount . "</h3>";
      echo '<div id="search-form">
        <form method="POST">
          <input type="text" id="search-user-id" name="search-user-id" placeholder="বায়োডাটা নং" required>
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
      ORDER BY p.user_id DESC $limit OFFSET $start";
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
      ORDER BY p.user_id DESC $limit OFFSET $start";
      }
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo '<div class="table-container">';
      echo '<table>';
        echo '<tr>
        <th>বায়োডাটা নং</th>
        <th>বায়োডাটার ধরণ</th>
        <th>জন্ম তারিখ-মাস-সাল</th>
        <th>গাত্র বর্ণ</th>
        <th>উচ্চতা</th>
        <th>ওজন </th>
        <th>রক্তের গ্রুপ</th>
        <th>শারীরিক-মানসিক সমস্যা/রোগ</th>
        <th style="color: #9817a3;">বৈবাহিক অবস্থা</th>
        <th style="color: #9817a3;">ডিভোর্সের কারণ এবং কতদিন সংসার করেছেন?</th>
        <th style="color: #9817a3;">কয়টি সন্তান আছে</th>
        <th style="color: #9817a3;">সন্তান সম্পর্কিত তথ্য</th>
        <th style="color: #9817a3;;">বায়োডাটা টি যার, তার আপনি কে হন?</th>
        <th style="color: blue;">স্ত্রী যেভাবে মারা গেছেন এবং কতদিন সংসার</th>
        <th style="color: blue;">বর্তমান স্ত্রীর অনুমতি নিয়েছেন?</th>
        <th style="color: blue;">বর্তমান স্ত্রীর পরিবার থেকে অনুমতি নিয়েছেন?</th>
        <th style="color: blue;">আবার বিয়ে করার কারণ</th>        <th style="color: blue;">স্ত্রীকে চাকরি করতে দিতে ইচ্ছুক?</th>
        <th style="color: blue;">প্রাতিষ্ঠানিক পড়ালেখা করতে দিতে ইচ্ছুক?</th>
        <th style="color: blue;">বিয়ের পর স্ত্রীকে নিয়ে কোথায় থাকবেন?</th>
        <th style="color: #057e22;">স্বামী যেভাবে মারা গেছেন এবং কতদিন সংসার</th>
        <th style="color: #057e22;">বিয়ের পর চাকরি করতে চান?</th>
        <th style="color: #057e22;">বিয়ের পর পড়াশোনা চালিয়ে যেতে চান?</th>
        <th style="color: #057e22;">শিক্ষার্থী বিয়ে করতে রাজি আছেন?</th>
        <th>তারিখ সময়</th>
        <th>ডাটা ইডিট</th>
        </tr>';
        $query = "SELECT * FROM users";
        $deactivatedResult = mysqli_query($conn, $query);
        $deactivatedUsers = array();
        while ($deactivatedRow = mysqli_fetch_assoc($deactivatedResult)) {
            if ($deactivatedRow['deactivated'] == 1) {
                $deactivatedUsers[] = $deactivatedRow['id'];
            }
        }
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        if ($profilesPerPage !== 'all' && $count > $profilesPerPage) {
          // Hide profiles beyond the selected per page limit
          continue;
        }
        echo '<tr';
        if (in_array($row['user_id'], $deactivatedUsers)) {
            echo ' style="background: #ff0080; color: #fff;"';
        }
        echo '>';
        echo '<td><a target="_blank" href="../profile.php?/Biodata=' . $row['user_id'] . '">' . $row['user_id'] .  " " . "View" . '</a></td>';
        echo '<td>' . $row['biodatagender'] . '</td>';
        echo '<td>' . $row['dateofbirth'] . '</td>';
        echo '<td>' . $row['height'] . '</td>';
        echo '<td>' . $row['weight'] . '</td>';
        echo '<td>' . $row['physicalstatus'] . '</td>';
        echo '<td>' . $row['Skin_tones'] . '</td>';
        echo '<td>' . $row['bloodgroup'] . '</td>';
        echo '<td style="color: #9817a3;">' . $row['maritalstatus'] . '</td>';
        echo '<td style="color: #9817a3;">' . $row['divorce_reason'] . '</td>';
        echo '<td style="color: #9817a3;">' . $row['how_many_son'] . '</td>';
        echo '<td style="color: #9817a3;">' . $row['son_details'] . '</td>';
        echo '<td style="color: #9817a3;">' . $row['profileby'] . '</td>';
        echo '<td style="color: blue;">' . $row['how_widower'] . '</td>';
        echo '<td style="color: blue;">' . $row['get_wife_permission'] . '</td>';
        echo '<td style="color: blue;">' . $row['get_family_permission'] . '</td>';
        echo '<td style="color: blue;">' . $row['why_again_married'] . '</td>';
        echo '<td style="color: blue;">' . $row['allowjob_aftermarriage'] . '</td>';
        echo '<td style="color: blue;">' . $row['allowstudy_aftermarriage'] . '</td>';
        echo '<td style="color: blue;">' . $row['livewife_aftermarriage'] . '</td>';
        echo '<td style="color: #057e22;">' . $row['how_widow'] . '</td>';
        echo '<td style="color: #057e22;">' . $row['anyjob_aftermarriage'] . '</td>';
        echo '<td style="color: #057e22;">' . $row['studies_aftermarriage'] . '</td>';
        echo '<td style="color: #057e22;">' . $row['agree_marriage_student'] . '</td>';
        echo '<td>' . $row['profilecreationdate'] . '</td>';
        echo '<td><a target="_blank" href="edit_physical_marital.php?id=' . $row['user_id'] . '">Edit</a></td>';
        echo '</tr>';
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
  </script>
  <!-- ===== Admin Panel Footer Area ===== -->
  <?php include("admin_footer.php"); ?>
  <!-- =================================== -->
</body>
</html>