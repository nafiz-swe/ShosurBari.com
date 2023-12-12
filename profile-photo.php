

<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php
error_reporting(0);
$id=$_GET['id'];

//calling photo uploader function
if ($_SERVER['REQUEST_METHOD'] == 'POST'){ uploadphoto($id); }
?>


<?php
include_once("includes/basic_includes.php");
include_once("functions.php");

error_reporting(0);

function englishToBanglaNumber($number) {
  $englishDigits = range(0, 9);
  $banglaDigits = ["০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"];
  return str_replace($englishDigits, $banglaDigits, $number);
}

if (isloggedin()) {
  // Get the user ID from the session
  $userId = $_SESSION['id'];
    
  // Retrieve the user's account status from the database
  require_once("includes/dbconn.php");
  $statusSql = "SELECT deactivated FROM users WHERE id = $userId";
  $result = mysqli_query($conn, $statusSql);
  $row = mysqli_fetch_assoc($result);
  $deactivated = $row['deactivated'];

  // Query to get the total view_count for the logged-in user
  $totalViewCountSql = "SELECT view_count FROM `1bd_personal_physical` WHERE user_id = $userId";
  $result = mysqli_query($conn, $totalViewCountSql);
  $row = mysqli_fetch_assoc($result);
  $totalViewCount = $row['view_count'];


  // Convert the counts to Bangla numerals
  $totalViewCountInBangla = englishToBanglaNumber($totalViewCount);

  } else {
    header("location:login.php");
  }

  // Close the database connection
$conn->close();
?>

<?php
    $id = $_GET['id'];
    $profileid = $id;

    // Check if পাত্রের বায়োডাটা exists in the database
    $sql = "SELECT biodatagender FROM 1bd_personal_physical WHERE user_id = $id";
    $result = mysqlexec($sql);
    $row = mysqli_fetch_assoc($result);

    // Define the default image
    $defaultImage = "shosurbari-default-icon.png";

    if ($row) {
        // Check the value of biodatagender to determine the image
        if ($row['biodatagender'] == 'পাত্রের বায়োডাটা') {
            $defaultImage = "shosurbari-male-icon.jpg";
        } elseif ($row['biodatagender'] == 'পাত্রীর বায়োডাটা') {
            $defaultImage = "shosurbari-female-icon.png";
        }
    }

    // Getting profile Picture from the database
    $sql = "SELECT pic1 FROM photos WHERE user_id = $id";
    $result = mysqlexec($sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $pic1 = $row['pic1'];
    }
    ?>

<!DOCTYPE HTML>
<html>


<head>
<title>Profile Photo | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" /><!-- eye icon password show -->
<script src="js/optionsearch.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!--font-Awesome-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--font-Awesome-->

<!-- Country Code with Flag for Number input field -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />

<!-- Side Bar Icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Side Bar Icon -->
</head>


<body>
  <!-- ============================  Navigation Start =========================== -->
  <?php include_once("includes/navigation.php");?>
  <!-- ============================  Navigation End ============================ -->

    <div class="grid_3">
        <div class="container">
            <div class="breadcrumb1">
                <ul>
                <a href="my-account.php"><i class="fa fa-home home_1"></i></a>
                <span class="divider">&nbsp;|&nbsp;</span>
                <li class="current-page"><h4>My Account</h4></li>
                </ul>

                <?php
                include("includes/dbconn.php");
                //getting profile details from db
                $sql="SELECT * FROM users WHERE id = $id";
                $result = mysqlexec($sql);

                if($result){
                $row=mysqli_fetch_assoc($result);
                if($row){
                $username=$row['username'];
                }
                }
                ?>

            </div>
        </div>
    </div>


    <div class="shosurbari-sidebar">
        <div class="leftarea-sidebar">

            <div class="shosurbari-userhome-status">
                <h3><?php echo "Welcome: $username"; ?></h3>

                <!-- Display the account status -->
                <h4 >Account Status:
                    <?php if ($deactivated == 0) {
                    echo '<span style="color: green;">Active</span>';
                    } else {
                    echo '<span style="color: red;">Deactivate</span>';
                    }
                    ?>
                </h4>

                <form action="deactivate_account.php" method="post">
                    <?php if ($deactivated == 1) { ?>
                    <button type="submit" name="action" value="activate">Activation</button>
                    <?php } else { ?>
                    <button type="submit" name="action" value="deactivate">Deactivation</button>
                    <?php } ?>
                </form> 
                
            </div>


            <div class="shosurbari-account-sidebar" id="bs-megadropdown-tabs">
                <ul class="shosurbari-my-account">
                    <li><a href="my-account.php"><i class="fa fa-dashboard"></i> ড্যাশবোর্ড</a></li>
                    <li><a href="profile.php?/Biodata=<?php echo $id;?>"><i class='fa fa-address-card-o'></i> সম্পূর্ণ বায়োডাটা</a></li>
                    <li><a href="profile-photo.php?id=<?php echo $id;?>"><i class="fa fa-image"></i> বায়োডাটার ছবি</a></li>
                    <li><a href="biodata-post.php"><i class='fa fa-file-text-o'></i> বায়োডাটা পোস্ট</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i> বায়োডাটা আপডেট<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="update-physical-marital.php">শারীরিক/বৈবাহিক তথ্য</a></li>
                            <li><a href="update-personalInfo.php">ব্যক্তিগত তথ্য</a></li>
                            <li><a href="update-education.php">শিক্ষাগত তথ্য</a></li>
                            <li><a href="update-address.php">ঠিকানা</a></li>
                            <li><a href="update-family.php">পারিবারিক/সামাজিক</a></li>
                            <li><a href="update-religion.php">ধর্মীয় বিষয়</a></li>
                            <li><a href="update-partnerInfo.php">জীবনসঙ্গীর-বিবরণ</a></li>
                        </ul>
                    </li>
                    <li><a href="search.php"><i class="fa fa-search"></i> বায়োডাটা খুঁজুন</a></li>
                    <li><a href="account-update.php"><i class="fa fa-gear fa-spin"></i> একাউন্ট আপডেট</a></li>
                </ul>
            </div>


            <div class="shosurbari-biodata-view">
                <form action="" method="post" name="SbLogForm" onsubmit="return SbLogineForm()">
                    <div class="sb-biodata-total-view">
                        <h3>আপনার বায়োডাটাটি দেখা হয়েছে-</h3>
                        <h1><?php
                                // Display the view count for the logged-in user's profile
                                if (isset($totalViewCountInBangla)) {
                                    echo "" . $totalViewCountInBangla;
                                }
                            ?> বার
                        </h1>
                    </div>
                </form>
            </div> 
        </div>



        <div class="shosurbari-user-account">

            <div class="soshurbari-animation-icon">
                <div class="sb-icon-laptop">
                <h3> <img src="images/shosurbari-icon.png"> শ্বশুরবাড়ি </h3>
                </div>
            </div>

            <div class="sb-biodata-field">
                <h2>পাত্র-পাত্রীর প্রোফাইল ছবি</h2>
                <br><p style="margin-bottom: 5px;">Image Size H:168px & W:168px </p>
                <p>প্রোফাইলে ছবি আপলোড করা বাধ্যতা মূলক নয়। তবে পাত্র-পাত্রীর ছবি ছাড়া অন্য যেকোনো কিছুর ছবি আপলোড করলে বিনা নোটিশে সম্পূর্ণ বায়োডাটা যেকোনো সময় ডিলিট করে দেয়া হবে।</p>
            </div>

            <div class="shosurbari-user-img">
                <?php
                    // Retrieve the user's uploaded photo from the database
                    $sql = "SELECT pic1 FROM photos WHERE user_id = '$user_id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $uploadedPhoto = $row['pic1'];

                    if (!empty($uploadedPhoto)) {
                        echo "<img src='profile/$profileid/$uploadedPhoto' />";
                    }
                ?>
            </div>

            <div class="uploaded-photo">
                <?php if (!empty($uploadedPhoto)): ?>
                    <img src="profile/<?php echo $profileid; ?>/<?php echo $uploadedPhoto; ?>" />
                <?php endif; ?>
            </div>

            <div class="update-image-button">
                <div class="update-image">
                    <?php if (!empty($pic1)): ?>
                        <div class="image-wrapper">
                            <img src="profile/<?php echo $profileid; ?>/<?php echo $pic1; ?>" />
                        </div>
                    <?php else: ?>
                        <div class="camera-wrapper" onclick="showFileInput()">
                            <i class="fa fa-camera"></i>
                            <img src="images/<?php echo $defaultImage; ?>" />
                        </div>
                    <?php endif; ?>
                </div>


                <div class="delete-image">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <?php if (!empty($pic1)): ?>
                            <button type="submit" name="delete_photo" value="Delete" class="delete_photo-btn delete-button">Delete Photo</button>
                            <!-- <p>আপনি যদি আপনার বর্তমান ছবি <br> পরিবর্তন করতে চান, প্রথমে আপনার <br> বর্তমান ছবি ডিলিট করুন। তারপর <br>নতুন ছবি আপলোড করুন।</p> -->
                        <?php endif; ?>

                        <?php
                            if (isset($_POST['delete_photo'])) {
                                // Delete photo from profile folder
                                $dir = 'profile/' . $user_id . '/';
                                unlink($dir . $pic1);

                                // Update the pic1 column to NULL in the database
                                $sql = "UPDATE photos SET pic1 = NULL WHERE user_id = '$user_id'";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // Show green message
                                    echo "<div style='color:green;'>Photo deleted successfully! Please refresh the page.</div>";
                                }
                            }
                        ?>

                    </form>
                </div>



                <div class="update-image-input" id="file-input-wrapper">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="file-upload" class="file-upload-btn upload-button">Choose Photo</label>
                        <input type="file" id="file-upload" name="pic1" class="form-file" accept=".jpg, .png" required/>
                        <input type="submit" id="edit-submit" name="update_photo" value="Upload" class="update_photo-btn submit-button" />
                    </form>
                </div>
            </div>

        </div>

        <div class="popup-message" style="display: none;">
            <h3></h3>
            <p></p>
        </div>
    

    </div>





    <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
    --                S  T  A  R  T                  --
    -- SHOSURBARI USER ACCOUNT PHOTO DELETE & UPLOAD --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
    <script>
        function showFileInput() {
            var cameraIcon = document.querySelector('.camera-wrapper i');
            var fileInputWrapper = document.querySelector('#file-input-wrapper');
            var deleteImageSection = document.querySelector('.delete-image');

            cameraIcon.style.display = 'none';
            fileInputWrapper.style.display = 'block';
            deleteImageSection.style.display = 'none';
        }

        // Check if image exists on page load
        window.addEventListener('DOMContentLoaded', function () {
            var imageWrapper = document.querySelector('.image-wrapper');
            var cameraIcon = document.querySelector('.camera-wrapper i');
            var deleteImageSection = document.querySelector('.delete-image');

            if (imageWrapper) {
                deleteImageSection.style.display = 'block';
                cameraIcon.style.display = 'none';
            } else {
                deleteImageSection.style.display = 'none';
                cameraIcon.style.display = 'block';
            }
        });
    </script>


<style>
    .dropdown-menu li a {
    padding: 5px 15px;
    font-weight: 410;
    font-size:14px;
    height: 40px;
    line-height: 32px;
}


  .sb-biodata-field{
    background: none;
    text-align: justify;
  }
  
  .sb-biodata-field h2{
    color: #000;
    font-size: 23px;
    font-weight: bold;
    background: none;
    text-align: left;
}

.shosurbari-biodata-form {
  align-items: center;
  flex-wrap: wrap;
  width: 1400px;
  margin: auto;
  padding-top: 30px;
  padding-bottom: 20px
}

.soshurbari-animation-icon,
.shosurbari-animation-form {
  flex-basis: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.soshurbari-animation-icon h3 {
  font-size: 23px;
  font-weight: bold;
  margin-bottom: 15px;
  margin-top: 15px;
}

.soshurbari-animation-icon img {
  justify-content: flex-end;
  margin: auto;

  width: 37px;
  height: 35px;
}

@media (max-width: 1280px){
    .shosurbari-biodata-form{
        width: auto;
    }
}

@media (max-width: 1024px) {
    .shosurbari-biodata-form {
        width: auto;
    }
}


@media (max-width: 768px){
.shosurbari-userhome-status h3,
.shosurbari-userhome-status h4 {
    text-align: left;
}
}
</style>




    <script>
        <?php
        if (isset($_POST['update_photo'])) {
            // Your existing code for updating the photo

            // JavaScript code to show the success popup message
            echo 'showSuccessMessage();';
        }
        ?>

        function showSuccessMessage() {
            // Show the popup message
            var popup = document.querySelector('.popup-message');
            popup.style.display = 'block';

            // Set the message text
            popup.querySelector('h3').innerHTML = 'Success!';
            popup.querySelector('p').innerHTML = 'Your photo has been uploaded successfully.';

            // Add a close button to the popup message
            var closeButton = document.createElement('button');
            closeButton.innerHTML = 'Close';
            closeButton.classList.add('close-button');
            popup.appendChild(closeButton);

            // Hide the popup when the close button is clicked
            closeButton.addEventListener('click', function() {
                popup.style.display = 'none';
            });
        }
    </script>

    <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
    --                   E   N   D                  --
    -- SHOSURBARI USER ACCOUNT PHOTO DELETE & UPLOAD --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->








    <!--=======================================
    How Many Visitors View This Page.
    This Script Connected to get_view_count.php
    and page_views Database Table
    ========================================-->
    <script>
		$(document).ready(function() {
		// Define an array of page names (without the .php extension)
		var pages = ["profile-photo"];

		// Fetch and display view counts for each page
		for (var i = 0; i < pages.length; i++) {
			var page = pages[i];
			$.ajax({
			url: 'get_view_count.php?page=' + page, // Adjust the URL to your PHP script
			type: 'GET',
			success: function(data) {
			$('#viewCount' + page.replace("_", "")).html(data);
			}
			});
		}
		});
  	</script>


	<!--=======  Footer Start ========-->
	<?php include_once("footer.php");?>
	<!--=======  Footer End  =========-->



    <!-- FlexSlider -->
    <script defer src="js/jquery.flexslider.js"></script>
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
        <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
        });
    </script>  

</body>
</html>	

