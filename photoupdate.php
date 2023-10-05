

<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php
error_reporting(0);
$id=$_GET['id'];
if(isloggedin()){
 //do nothing stay here
} else{
   header("location:login.php");
}
//calling photo uploader function
if ($_SERVER['REQUEST_METHOD'] == 'POST'){ uploadphoto($id); }
?>

<?php
require_once("includes/dbconn.php");

// Get the user ID from the session
$userId = $_SESSION['id'];

// Retrieve the user's account status from the database
$statusSql = "SELECT deactivated FROM users WHERE id = $userId";
$result = mysqli_query($conn, $statusSql);
$row = mysqli_fetch_assoc($result);
$deactivated = $row['deactivated'];


//calling photo uploader function
if ($_SERVER['REQUEST_METHOD'] == 'POST'){ uploadphoto($id); }
?>



<!DOCTYPE HTML>
<html>


<head>
<title>Update Account | ShosurBari</title>
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
</head>


<body>
    <!-- ============================  Navigation Start =========================== -->
    <?php include_once("includes/navigation.php");?>
    <!-- ============================  Navigation End ============================ -->


    <div class="grid_3">
        <div class="container">
            <div class="breadcrumb1">

                <ul>
                    <a href="index.php"><i class="fa fa-home home_1"></i></a>
                    <span class="divider">&nbsp;<|>&nbsp;</span>
                    <li class="current-page"><h4>Update Account</h4></li>
                </ul>

                <?php
                /*	If(isset($_SESSION['username'])) {
                Echo "Welcome : " . $_SESSION ['username'];
                } else {
                Echo "<a href=\”/login.php\”>Login</a>";
                } */
                ?>


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

                <div class="shosurbari-userhome-status">
                    <h3><?php echo "Welcome: $username"; ?></h3>
                    <!-- Display the account status -->
                    <h4 >Account Status:
                        <?php
                            if ($deactivated == 0) {
                                echo '<span style="color: green;">Active</span>';
                            } else {
                                echo '<span style="color: red;">Deactivated</span> <br>';
                                echo '<span style="color: #0aa4ca; font-size: 14px;">Please Active your account, Go back UserHome page !</span>';
                            }
                        ?>
                    </h4>
                </div>

            </div>
        </div>
    </div>


    <?php
        $id=$_GET['id'];
        $profileid=$id;
        //getting profile Picture from db
        $sql = "SELECT * FROM photos  WHERE user_id = $id";
        $result = mysqlexec($sql);
        $row=mysqli_fetch_assoc($result);
        if($row){
        $pic1=$row['pic1'];
        }
    ?>


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
    .shosurbari-biodata-form {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    width: 1130px;
    margin: auto;
    background: linear-gradient(180deg,#F3F9F9 0%,rgba(238,246,253,0) 100%);
    padding-top: 50px;
    padding-bottom: 50px
}

.soshurbari-animation-icon {
    flex-basis: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.soshurbari-animation-icon img{
    justify-content: flex-end;
    margin: auto;
    height: 400px;
    width: 400px;
}

@media (max-width: 1280px){
    .shosurbari-biodata-form{
        width: auto;
    }
}

@media (max-width: 1024px) {
    .soshurbari-animation-icon {
        display: none;
    }

    .shosurbari-biodata-form {
        width: auto;
    }
}
</style>

<div class="shosurbari-biodata-form">

    <div class="soshurbari-animation-icon">
        <div class="sb-icon-laptop">
            <img src="images/shosurbari-profiles.png">
        </div>
    </div>

    <div class="shosurbari-user-account">

        <div class="sb-biodata-field">
            <h2>Upadate Your Photo</h2>
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
                        <img src="images/shosurbari-male-icon.jpg" />
                    </div>

                <?php endif; ?>
            </div>


            <div class="delete-image">
                <form action="" method="POST" enctype="multipart/form-data">

                    <?php if (!empty($pic1)): ?>
                        <button type="submit" name="delete_photo" value="Delete" class="delete_photo-btn delete-button">Delete Photo</button>
                        <p>আপনি যদি আপনার বর্তমান ছবি <br> পরিবর্তন বা  আপডেট করতে চান, <br> প্রথমে আপনার প্রোফাইল থেকে <br> বর্তমান ছবি ডিলিট করুন। তারপর <br>নতুন ছবি আপলোড করুন।</p>
                    <?php endif; ?>

                    <?php
                        if (isset($_POST['delete_photo'])) {
                        // Delete photo from profile folder
                        $dir = 'profile/' . $user_id . '/';
                        unlink($dir . $pic1);

                        // Delete photo from database
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










    <?php include_once("footer.php")?>
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

