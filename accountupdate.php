

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
<title>Account | ShosurBari</title>
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
                        $fullname=$row['fullname'];
                        }
                    if($row){
                    $username=$row['username'];
                    }
                    if($row){
                    $password=$row['password'];
                    }
                    if($row){
                    $email=$row['email'];
                    }
                    if($row){
                        $pnumber=$row['number'];
                    }
                    if($row){
                        $gender=$row['gender'];
                        }
                    if($row){
                        $id=$row['id'];
                    }
                    }

                    //6bd_7bd_marital_status;
                    //getting profile details from db
                    $sql="SELECT * FROM 7bd_marriage_related_qs_female WHERE user_id = $id";
                    $result = mysqlexec($sql);
                    if($result){
                    $row=mysqli_fetch_assoc($result);
                    if($row){
                        $profileby=$row['profileby'];
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


    <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
    --                S  T  A  R  T                  --
    --    SHOSURBARI USER ACCOUNT PASSWORD UPDATE    --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->

    <div class="shosurbari-biodata-form">

    <div class="shosurbari-user-account">

        <div class="sb-biodata-field">
            <h2>Your Account</h2>
        </div>

        <form action="" method="POST" name="myForm" onsubmit="return validateForm()">

            <div class="form-group">
                <label>Full Name <span style="color: #ccc; font-size:12px;">(Changeable)</span></label>
                <input type="text" name="fullname" class="form-text" value="<?php echo $fullname; ?>" />
            </div>

            <div class="form-group">
                <label>Username <span style="color: #ccc; font-size:12px;">(Fixed)</span> </label>
                <input type="text" name="uname" style="background: #ecfeff" class="form-text" value="<?php echo $username; ?>" disabled />
            </div>

            <div class="form-group">
                <label>Email Address <span style="color: #ccc; font-size:12px;">(Fixed)</span> </label>
                <input type="text" name="email" style="background: #ecfeff" class="form-text" value="<?php echo $email; ?>" disabled />
            </div>
            
            <div class="form-group">
                <label>Phone Number <span style="color: #ccc; font-size:12px;">(Fixed)</span></label><br>
                <input type="text" id="pnumber" name="pnumber" style="background: #ecfeff" value="<?php echo $pnumber; ?>" size="60" minlength="10" maxlength="15" class="form-text" disabled>
            </div>

            <div class="form-group">
            <label>Gender<span style="color: #ccc; font-size:12px;">(Changeable)</span> </label>
                <select name="gender">
                    <option hidden selected><?php echo $gender; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option> 
                </select>
            </div>

            <div class="form-group">
            <label>Profiled By<span style="color: #ccc; font-size:12px;">(Changeable)</span> </label>
                <select name="profileby" required>
                    <option hidden selected><?php echo $profileby; ?></option>
                    <option value="নিজের জন্য">নিজের জন্য</option>
                    <option value="বাবা হই">বাবা হই</option>
                    <option value="মা হই">মা হই</option>
                    <option value="ভাই হই">ভাই হই</option>
                    <option value="বোন হই">বোন হই</option>
                    <option value="চাচা/মামা হই">চাচা/মামা হই</option> 
                    <option value="চাচী/মামী হই">চাচী/মামী হই</option>
                    <option value="নানা/দাদা হই">নানা/দাদা হই</option> 
                    <option value="নানী/দাদী হই">নানী/দাদী হই</option> 
                    <option value="অন্যান্য">অন্যান্য</option> 
                </select>
            </div>

            <div class="form-group">
                <label for="edit-name">Current Password <span style="color: #ccc; font-size:12px;">(Fixed)</span> </label>
                <input type="text" id="edit-pass" name="current_password" style="background: #ecfeff" value="<?php echo $password; ?>" class="form-text" disabled/>
                <span class="show-password" style="display: none; color: #0aa4ca; font-size: 15px; top: 26px;"><i style="color: black; font-size: 15px;" class="fa fa-eye-slash"></i></span> 
            </div>

            <div class="form-group">
                <label>Change Password <span style="color: #ccc; font-size:12px;">(Changeable)</span> </label>
                <input type="password" id="pass_1" name="pass_1" class="form-text" />
                <span class="show-password" style="color:#0aa4ca;  font-size:15px; top:26px;"><i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
                <span  id="pass_1_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
            </div>

            <div class="form-group">
                <label>Confirm Password <span style="color: #ccc; font-size:12px;">(Changeable)</span> </label>
                <input type="password" id="pass_2" name="pass_2" class="form-text" />
                <span class="show-password" style="color:#0aa4ca;  font-size:15px; top:26px;"><i style="color:black;  font-size:15px;" class="fa fa-eye" aria-hidden="true"></i></span> 
                <span  id="pass_2_error" style="font-size:16px; margin-top: 0px; background: #ffddee; border-radius: 1px 2px 4px 4px; text-align: center; display: none;"></span>
            </div>


            <script>
                let showPass = document.querySelectorAll('.show-password');
                showPass.forEach(function(el) {
                el.addEventListener('click', function(){
                    let input = this.previousElementSibling;
                    if (input.type === "password") {
                    input.type = "text";
                    this.innerHTML = "<i class='fa fa-eye-slash'></i>";
                    } else {
                    input.type = "password";
                    this.innerHTML = "<i class='fa fa-eye'></i>";
                }
                });
                });
            </script>
	



            <div class="form-actions">
                <?php if (isset($_SESSION['id'])) { ?>
                    <input type="hidden" id="edit-remember" name="remember" value="1">
                <?php } else { ?>

                <div class="form-group">
                    <label><input type="checkbox" id="edit-remember" name="remember" value="1" <?php if(isset($_COOKIE['remember']) && $_COOKIE['remember'] == 1) { echo 'checked'; } ?>> Remember me</label>
                </div>

                <?php } ?>

                <button type="submit" name="update_account" value="Update Account" class="btn_1 submit">
                    <span>Update Password</span>
                </button>
            </div>

        </form>
    </div>

    <div class="soshurbari-animation-icon">
        <div class="sb-icon-laptop">
            <img src="images/shosurbari-user-account.png">
        </div>
    </div>

</div>

<style>
.shosurbari-biodata-form {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    width: 1130px;
    margin: auto;
    background: linear-gradient(180deg,#F3F9F9 0%,rgba(238,246,253,0) 100%);
    padding-top: 50px;
    padding-bottom: 50px;
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



    <script>
        function validateForm(){

        var pass_1 = document.forms["myForm"]["pass_1"].value;
        var pass_2 = document.forms["myForm"]["pass_2"].value;


        
        //New Password validation
        if (pass_1 == "") {
            document.getElementById('pass_1').style.borderColor = "red";
            document.getElementById('pass_1').scrollIntoView({
            behavior: 'smooth',
            block: 'center',
            });

            var errorDiv = document.getElementById('pass_1_error');
            errorDiv.innerHTML = "Please Enter Your New Password !";
            errorDiv.style.display = 'block';
            errorDiv.classList.add('fade-in');

            // Change color multiple times
            var colors = ['green', 'blue', 'red'];
            var colorIndex = 0;
            setInterval(function() {
            errorDiv.style.color = colors[colorIndex];
            colorIndex = (colorIndex + 1) % colors.length;
            }, 500);

            return false;
        }else{
            document.getElementById('pass_1').style.borderColor = "green";
            document.getElementById('pass_1').style.backgroundColor = "#ecfeff";
            document.getElementById('pass_1_error').innerHTML = "";
        }

        


        //Confirm Password validation
        if (pass_2 == "") {
            document.getElementById('pass_2').style.borderColor = "red";
            document.getElementById('pass_2').scrollIntoView({
            behavior: 'smooth',
            block: 'center',
            });

            var errorDiv = document.getElementById('pass_2_error');
            errorDiv.innerHTML = "Please Enter Your Confirm Password !";
            errorDiv.style.display = 'block';
            errorDiv.classList.add('fade-in');

            // Change color multiple times
            var colors = ['green', 'blue', 'red'];
            var colorIndex = 0;
            setInterval(function() {
            errorDiv.style.color = colors[colorIndex];
            colorIndex = (colorIndex + 1) % colors.length;
            }, 500);

            return false;
        }else if(pass_2 != pass_1){
            document.getElementById('pass_2').style.borderColor = "red";
            document.getElementById('pass_2').scrollIntoView({
            behavior: 'smooth',
            block: 'center',
            });

            var errorDiv = document.getElementById('pass_2_error');
            errorDiv.innerHTML = "Your Password Do Not Match !";
            errorDiv.style.display = 'block';
            errorDiv.classList.add('fade-in');

            // Change color multiple times
            var colors = ['green', 'blue', 'red'];
            var colorIndex = 0;
            setInterval(function() {
            errorDiv.style.color = colors[colorIndex];
            colorIndex = (colorIndex + 1) % colors.length;
            }, 500);

            return false;
        }else{
            document.getElementById('pass_2').style.borderColor = "green";
            document.getElementById('pass_2').style.backgroundColor = "#ecfeff";
            document.getElementById('pass_2_error').innerHTML = "";
        }
        }
    </script>




    <!--=======================================
    How Many Visitors View This Page.
    This Script Connected to get_view_count.php
    and page_views Database Table
    ========================================-->
    <script>
        $(document).ready(function() {
        // Define an array of page names (without the .php extension)
        var pages = ["accountupdate"];

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

