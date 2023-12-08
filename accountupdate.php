<?php
include_once("includes/basic_includes.php");
include_once("functions.php");

error_reporting(0);
if (isloggedin()) {
} else {
    header("location:login.php");
}
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Account Update | ShosurBari</title>
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
                    <span class="divider">&nbsp;|&nbsp;</span>
                    <li class="current-page"><h4>Account Update</h4></li>
                </ul>


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
                    <h4 >একাউন্ট অবস্থা:
                        <?php
                            if ($deactivated == 0) {
                                echo '<span style="color: green;">একটিভ</span>';
                            } else {
                                echo '<span style="color: red;">ডিএক্টিভ</span> <br>';
                                echo '<br><span style="color: #0aa4ca; font-size: 14px; margin-top: 10px;">আপনার একাউন্ট User Home পেজ থেকে একটিভ করুন।</span>';
                            }
                        ?>
                    </h4>
                </div>

            </div>
        </div>
    </div>



    <div class="sb-home-search">
        <h1>ব্যবহারকারীর একাউন্ট</h1>
        <div class="sbhome-heart-divider">
        <span class="grey-line"></span>
            <i class="fa fa-heart pink-heart"></i>
            <i class="fa fa-heart grey-heart"></i>
        <span class="grey-line"></span>
        </div>
    </div>



    <!-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
    --                S  T  A  R  T                  --
    --    SHOSURBARI USER ACCOUNT PASSWORD UPDATE    --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->

    <?php
// Check if there is a message in the URL
if (isset($_GET['message'])) {
    $message = ($_GET['message'] == 'success') ? urldecode($_GET['updateMessage']) : 'Error updating account';

    // Display the message with a green background color and a close button
    echo "<div style='
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #22c55e;
    color: #fff;
    box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
    border: 1px solid rgba(0,0,0,.05);
    border-radius: 2px;
    padding: 15px;
    width: 260px;
    text-align: center;
    z-index: 9999;
    '>$message
    <button style='
    position: absolute;
    cursor: pointer;
    right: 3px;
    margin-right: -20px;
    margin-top: -32px;
    margin-bottom: 15px;
    padding-bottom: 5px;
    line-height: 5px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 1px solid #ccc;
    font-size: 20px;
    font-weight: 600;
    color: white;
    background: #06b6d4;
    ' onclick='this.parentNode.style.display = \"none\";'>x</button>
    </div>";
}
?>



    <div class="shosurbari-biodata-form">
    <div class="shosurbari-user-account">

        <div class="soshurbari-animation-icon">
            <div class="sb-icon-laptop">
              <h3> <img src="images/shosurbari-icon.png"> ShosurBari </h3>
            </div>
        </div>

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
                <label>Email Address <span style="color: #ccc; font-size:12px;"> (Fixed)</span> </label>
                <input type="text" name="email" style="background: #ecfeff" class="form-text" value="<?php echo $email; ?>" disabled />
            </div>
            
            <div class="form-group">
                <label>Phone Number <span style="color: #ccc; font-size:12px;"> (Fixed)</span></label><br>
                <input type="text" id="pnumber" name="pnumber" style="background: #ecfeff" value="<?php echo $pnumber; ?>" size="60" minlength="10" maxlength="15" class="form-text" disabled>
            </div>

            <div class="form-group">
            <label>Gender<span style="color: #ccc; font-size:12px;"> (Changeable)</span> </label>
                <select name="gender">
                    <option hidden selected><?php echo $gender; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option> 
                </select>
            </div>

            <div class="form-group">
            <label>Profiled By<span style="color: #ccc; font-size:12px;"> (Data show after Biodata post. {Fixed})</span> </label>
                <select name="profileby" readonly>
                    <option hidden selected><?php echo $profileby; ?></option>
                    <option value="নিজের জন্য">নিজের জন্য</option>
                    <option value="মা">মা</option>
                    <option value="বাবা">বাবা</option>
                    <option value="ভাই">ভাই</option>
                    <option value="বোন/ভাবি">বোন/ভাবি</option>
                    <option value="আঙ্কেল">আঙ্কেল</option> 
                    <option value="আন্টি">আন্টি</option>
                    <option value="দাদা/নানা">দাদা/নানা</option> 
                    <option value="দাদী/নানী">দাদী/নানী</option> 
                    <option value="শিক্ষক">শিক্ষক</option>
                    <option value="বন্ধু/বান্ধবী">বন্ধু/বান্ধবী</option>  
                </select>
            </div>

            <div class="form-group">
                <label>New Password <span style="color: #ccc; font-size:12px;">(Changeable)</span> </label>
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
                    <span>Update Account</span>
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.sb-biodata-amount-list h1{
    font-size: 28px;
}

.sb-biodata-amount-list h2{
    font-size: 16px;
    margin: 15px auto;
}

.sb-biodata-amount-list h3{
    font-size: 16px;
}

.sb-register-login{
    margin-top: 10px;
}

.sb-home-search{
    margin-top: 0px;
}

.sb-biodata-field{
    background: none;
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
    padding-bottom: 30px
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

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

th {
    background: linear-gradient(180deg, #00bbff61 0%,rgba(238,246,253,0) 100%);
}

.sb-biodata-field{
    background: none;
}
  
.sb-register-login h2{
    color: #000;
    font-size: 23px;
    font-weight: bold;
    background: none;
    text-align: left;
    line-height: 35px;
}

.shosurbari-biodata-form {
    align-items: center;
    flex-wrap: wrap;
    width: 1400px;
    margin: auto;
    margin-top: 25px;
    padding-top: 0px;
    padding-bottom: 30px
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

@media (max-width: 1400px){
  .shosurbari-biodata-form{
    width: auto;
  }
}

@media (max-width: 1024px) {
.shosurbari-animation-form {
    flex-basis: 100%;
    justify-content: center;
}

.shosurbari-biodata-form {
    width: auto;
}
}

@media (max-width: 600px) {
th, td {
    font-size: 15px;
    padding: 8px;
}
}


@media (max-width: 384px) {
    th, td {
    font-size: 13px;
    padding: 5px;
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

