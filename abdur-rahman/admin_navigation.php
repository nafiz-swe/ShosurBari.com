<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/shosurbari-icon.png" type="image/png">
  <!-- favicon
  =========================== -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Google Fonts
  =========================== -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
  =========================== -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- font awesome CSS
  =========================== -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- owl.carousel CSS
  =========================== -->
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="css/owl.transitions.css">
  <!-- meanmenu CSS
  =========================== -->
  <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
  <!-- animate CSS
  =========================== -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- normalize CSS
  =========================== -->
  <link rel="stylesheet" href="css/normalize.css">
  <!-- mCustomScrollbar CSS
  =========================== -->
  <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- jvectormap CSS
  =========================== -->
  <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
  <!-- Notika icon CSS
  =========================== -->
  <link rel="stylesheet" href="css/notika-custom-icon.css">
  <!-- wave CSS
  =========================== -->
  <link rel="stylesheet" href="css/wave/waves.min.css">
  <!-- main CSS
  =========================== -->
  <link rel="stylesheet" href="css/main.css">
  <!-- style CSS
  =========================== -->
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="style.css">
  <!-- responsive CSS
  =========================== -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- modernizr JS
  =========================== -->
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <!-- fa fa icon / logout icon
  =========================== -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- jQuery Icon
  =========================== -->
  <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <!-- Page Views Count
  =========================== -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>
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
                                    <li><a href="index.php">ড্যাশবোর্ড</a></li>
                                    <li><a href="analytics.php">এনালাইটিক্স</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="customer.php">কাস্টমার</a></li>
                                    <li><a href="biodataInfo-sent.php">তথ্য প্রদান</a></li>
                                    <li><a href="contact_us.php">হেল্প</a></li>
                                    <li><a href="photos.php">ছবি</a></li>
                                    <li><a href="trash.php">ডিলিট ছবি</a></li>
                                    <li><a href="users.php">ইউজার একাউন্ট</a></li>
                                    <li><a href="dataphysical_marital.php">শারীরিক/বিবাহ</a></li>
                                    <li><a href="datapersonal.php">ব্যক্তিগত</a></li>
                                    <li><a href="dataeducation.php">শিক্ষাগত</a></li>
                                    <li><a href="dataaddress.php">ঠিকানা</a></li>
                                    <li><a href="datareligion.php">ধর্মীয়</a></li>
                                    <li><a href="datafamily.php">পারিবার</a></li>
                                    <li><a href="datapartner.php">জীবনসঙ্গীর</a></li>
                                    <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) { ?>
                                    <!-- User is logged in, show logout option -->
                                    <li><a href="admin_logout.php" style="padding: 8px 15px;"><i class="fa fa-sign-out"></i></a></li>
                                    <?php } else { ?>
                                    <!-- User is not logged in, show login option -->
                                    <li><a href="admin_login.php">লগইন</a></li>
                                    <?php } ?>
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
<!-- Width Screen Navigation Area Start-->
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
                            <li><a href="index.php">ড্যাশবোর্ড</a></li>
                            <li><a href="analytics.php">এনালাইটিক্স</a></li>
                        </ul>
                    </div>
                    <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="customer.php">কাস্টমার</a></li>
                            <li><a href="biodataInfo-sent.php">তথ্য প্রদান</a></li>
                            <li><a href="contact_us.php">হেল্প</a></li>
                            <li><a href="photos.php">ছবি</a></li>
                            <li><a href="trash.php">ডিলিট ছবি</a></li>
                            <li><a href="users.php">ইউজার একাউন্ট</a></li>
                            <li><a href="dataphysical_marital.php">শারীরিক/বিবাহ</a></li>
                            <li><a href="datapersonal.php">ব্যক্তিগত</a></li>
                            <li><a href="dataeducation.php">শিক্ষাগত</a></li>
                            <li><a href="dataaddress.php">ঠিকানা</a></li>
                            <li><a href="datareligion.php">ধর্মীয়</a></li>
                            <li><a href="datafamily.php">পারিবার</a></li>
                            <li><a href="datapartner.php">জীবনসঙ্গীর</a></li>
                            <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) { ?>
                            <!-- User is logged in, show logout option -->
                            <li><a href="admin_logout.php" style="padding: 8px 15px;"><i class="fa fa-sign-out"></i></a></li>
                            <?php } else { ?>
                            <!-- User is not logged in, show login option -->
                            <li><a href="admin_login.php">লগইন</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Width Screen Navigation Area End-->