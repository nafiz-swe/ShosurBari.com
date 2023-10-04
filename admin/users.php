
<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php
// error_reporting(0);
// require_once("includes/dbconn.php");
// if (!isset($_SESSION['id'])) {
//   // Redirect the user to the login page or display an error message
//   header("location: admin_login.php");
//   exit;
// }
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Profile Manage | ShosurBari</title>
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
    

    <style>
        @media (min-width:1280px){
.user-database{
    width: 1260px;
    margin: auto;
    padding: 20px 60px;
}
.admin-user-table th {
    font-size: 18px;
  }
  
}


@media (max-width: 1280px){
.user-database {
    width: 1024px;
    margin: auto;
    padding: 20px 40px;

}
.admin-user-table th {
    font-size: 18px;
  }
}

@media (max-width: 1024px){
.user-database {
    width: auto;
    margin: auto;
    padding: 20px 30px;
}
.admin-user-table th {
    font-size: 18px;
  }
}

@media (max-width: 930px){
.user-database {
    width: auto;
    margin: auto;
    padding: 20px 15px;
}
.admin-user-table td {
    font-size: 12px;
  }
  .admin-user-table th {
    font-size: 15px;
  }

}

 table {
    border-collapse: collapse;
    width: 100%;
  }

  .admin-user-table td {
    padding: 8px;
    text-align: left;
    border: 2px solid #ccc;
  }

  .admin-user-table th {
    background-color: #00c292;
    color: white;
    text-align: center;
    font-weight: 600;
    padding: 8px;
    border: 2px solid #ccc;
  }

  .admin-user-table tr.active {
    background-color: #fff;
    color: #000;
  }


  .admin-user-table tr.inactive {
    background-color: red;
    color: #fff;
  }

  .user-database h2{
    text-align: center;
  }



  .pagination{
  display: flex;
  margin-top: 30px;
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

</style>


<div class="user-database">
<h2>User Management</h2>
<h3>Users Table</h3>

<form method="POST">
  <label for="num_rows">Show:</label>
  <select name="num_rows" id="num_rows" onchange="this.form.submit()">
  <option value="10" <?php if(isset($_POST['num_rows']) && $_POST['num_rows']=='10') echo 'selected'; ?>>10</option>
    <option value="50" <?php if(isset($_POST['num_rows']) && $_POST['num_rows']=='50') echo 'selected'; ?>>50</option>
    <option value="100" <?php if(isset($_POST['num_rows']) && $_POST['num_rows']=='100') echo 'selected'; ?>>100</option>
    <option value="250" <?php if(isset($_POST['num_rows']) && $_POST['num_rows']=='250') echo 'selected'; ?>>250</option>
    <option value="500" <?php if(isset($_POST['num_rows']) && $_POST['num_rows']=='500') echo 'selected'; ?>>500</option>
    <option value="1000" <?php if(isset($_POST['num_rows']) && $_POST['num_rows']=='1000') echo 'selected'; ?>>1000</option>
    <option value="all" <?php if(isset($_POST['num_rows']) && $_POST['num_rows']=='all') echo 'selected'; ?>>All</option>
  </select>
</form>



<?php
  $conn = mysqli_connect("localhost", "root", "", "matrimony");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $num_rows = isset($_POST['num_rows']) ? $_POST['num_rows'] : 10;
  $limit = ($num_rows == 'all') ? '' : "LIMIT $num_rows";

  // Pagination variables
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $start = ($page - 1) * $num_rows;

  $sql = "SELECT COUNT(*) as count FROM users";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $total_pages = ceil($row['count'] / $num_rows);

  $sql = "SELECT * FROM users $limit OFFSET $start";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo "<table class=\"admin-user-table\">";
    echo "<tr class=\"admin-user-tr\">
            <th>User
            ID</th>
            <th>FullName</th>
            <th>UserName</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Reg.Date</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Deactivate
            /Activate</th>
          </tr>";
    while($row = mysqli_fetch_assoc($result)) {
      $id=$row['id'];
      $class = $row['active'] == 1 ? "active" : "inactive";
      echo "<tr class='".$class."'><td>".$row['id']."</td>
      <td>".$row['fullname']."</td>
      <td>".$row['username']."</td>
      <td>".$row['gender']."</td>
      <td>".$row['email']."</td>
      <td>".$row['number']."</td>
      <td>".$row['register_date']."</td>
      <td><a href='../userhome.php?id=$id'>Edit</a></td>
      <td><a href='#' onclick='confirmDelete($id)'>Delete</a></td><td>";
      
      if($row['active']==1) {
        echo "<a href='#' onclick='confirmDeactivate($id)'>Deactivate</a>";
      } else {
        echo "<a href='#' onclick='confirmActivate($id)'>Activate</a>";
      }
      echo "</td></tr>";
    }
    echo "</table>";

    

    // Pagination links
    echo "<div class='pagination'>";
    if ($total_pages > 1) {
      if ($page > 1) {
        echo "<a href='?page=".($page-1)."&num_rows=$num_rows' class='page-link'>Previous</a>";
      }
      for ($i = 1; $i <= $total_pages; $i++) {
        $active = $i == $page ? "active" : "";
        echo "<a href='?page=$i&num_rows=$num_rows' class='page-link $active'>$i</a>";
      }
      if ($page < $total_pages) {
        echo "<a href='?page=".($page+1)."&num_rows=$num_rows' class='page-link'>Next</a>";
      }
    }
    echo "</div>";
    
  }
  mysqli_close($conn);
?>

</div>


<script>
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



      <!-- Start Footer area-->
      <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2022-23
. All rights reserved | Developed by <a target="_blank||" href="https://facebook.com/nafiz.swe.diu">nafiz.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->

</body>

</html>