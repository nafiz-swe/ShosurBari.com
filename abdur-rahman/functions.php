<?php
    function mysqlexec($sql){
    $host="localhost"; // Host name
    $username="root"; // Mysql username
    $password=""; // Mysql password
    $db_name="matrimony"; // Database name
    error_reporting(0);
    $conn=mysqli_connect("$host", "$username", "$password")or die("cannot connect");
    mysqli_select_db($conn,"$db_name")or die("cannot select DB");
    mysqli_set_charset($conn, "utf8mb4"); //Bangla font show from database.
    if($result = mysqli_query($conn, $sql)){
    return $result;
    }
    else{
        echo mysqli_error($conn);
    }
    }
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                S  T  A  R  T                  --
    --           New Admin Register Function         --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function admin_register() {
        global $conn;
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];
    
            // Check if passwords match
            if ($password_1 !== $password_2) {
                echo "Passwords do not match. Please enter matching passwords.";
                return; // Exit the function if passwords don't match
            }
    
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);
    
            require_once("includes/dbconn.php");
    
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("SELECT COUNT(*) FROM admin WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($username_exists);
            $stmt->fetch();
            $stmt->close();
    
            // Check if the username is already taken
            if ($username_exists > 0) {
                echo "Username already exists. Choose a different username.";
            } else {
                // Use prepared statements to prevent SQL injection
                $stmt = $conn->prepare("SELECT COUNT(*) FROM admin WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->bind_result($email_exists);
                $stmt->fetch();
                $stmt->close();
    
                // Check if the email is already taken
                if ($email_exists > 0) {
                    echo "Email already exists. Choose a different email.";
                } else {
                    // Insert the new admin record using prepared statements
                    $stmt = $conn->prepare("INSERT INTO admin 
                        (fullname, username, email, password, active, deactivated, register_date, last_login) 
                        VALUES (?, ?, ?, ?, 1, 0, DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'), DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))");
                    $stmt->bind_param("ssss", $fullname, $username, $email, $hashed_password);
    
                    if ($stmt->execute()) {
                        $admin_id = $stmt->insert_id;
                        $_SESSION['admin_id'] = $admin_id;
                        header("location: ../abdur-rahman/index.php?id=$admin_id");
                    } else {
                        echo "Error: " . $stmt->error;
                    }
    
                    $stmt->close();
                }
            }
        }
    }
    
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                S  T  A  R  T                  --
    --            Admin Login Function               --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function admin_login() {
        global $conn;
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            // Retrieve the hashed password, admin_id, and active status from the database
            $sql = "SELECT admin_id, password, active FROM admin WHERE (username = ? OR email = ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $username);
            $stmt->execute();
            $stmt->store_result();
    
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($admin_id, $stored_password, $active);
                $stmt->fetch();
    
                // Check if the admin account is active
                if ($active == 1) {
                    // Verify the hashed input password with the stored hashed password
                    if (password_verify($password, $stored_password)) {
                        // Update last_login column with the current timestamp
                        $update_last_login_sql = "UPDATE admin SET last_login = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p') WHERE admin_id = ?";
                        $update_stmt = $conn->prepare($update_last_login_sql);
                        $update_stmt->bind_param("i", $admin_id);
                        $update_stmt->execute();
                        $update_stmt->close();
    
                        $_SESSION['admin_id'] = $admin_id;
    
                        // Redirect the user to the home.php page with the user ID as a parameter in the URL
                        header("location: ../abdur-rahman/index.php?id=$admin_id");
                    } else {
                        echo "Invalid password";
                    }
                } else {
                    echo "Your account is currently deactivated. Please contact the administrator.";
                }
            } else {
                echo "Invalid username or email";
            }
    
            $stmt->close();
        }
    }
    
    
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                S  T  A  R  T                  --
    --           Admin Logout Function               --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function isloggedin(){
        if(!isset($_SESSION['admin_id'])){
            return false;
        }
        else{
            return true;
        }
    }
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                S  T  A  R  T                  --
    --  Request Biodata Info Sent To Customers Email --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function customer_sent_info_complete() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "matrimony";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $payment_order_id = $_POST['payment_order_id'];
            $user_id = $_POST['user_id'];
            $payment_cust_name = $_POST['payment_cust_name'];
            $payment_cust_email = $_POST['payment_cust_email'];
            $payment_cust_number = $_POST['payment_cust_number'];
            $payment_biodata_quantity = $_POST['payment_biodata_quantity'];
            // Biodata Info 1
            $biodata_number_1 = $_POST['biodata_number_1'];
            $biodata_guardian_1 = $_POST['biodata_guardian_1'];
            $biodata_patropatri_1 = $_POST['biodata_patropatri_1'];
            // Biodata Info 2
            $biodata_number_2 = $_POST['biodata_number_2'];
            $biodata_guardian_2 = $_POST['biodata_guardian_2'];
            $biodata_patropatri_2 = $_POST['biodata_patropatri_2'];
            // Biodata Info 3
            $biodata_number_3 = $_POST['biodata_number_3'];
            $biodata_guardian_3 = $_POST['biodata_guardian_3'];
            $biodata_patropatri_3 = $_POST['biodata_patropatri_3'];
            // Biodata Info 4
            $biodata_number_4 = $_POST['biodata_number_4'];
            $biodata_guardian_4 = $_POST['biodata_guardian_4'];
            $biodata_patropatri_4 = $_POST['biodata_patropatri_4'];
            // Biodata Info 5
            $biodata_number_5 = $_POST['biodata_number_5'];
            $biodata_guardian_5 = $_POST['biodata_guardian_5'];
            $biodata_patropatri_5 = $_POST['biodata_patropatri_5'];
            // Biodata Info 6
            $biodata_number_6 = $_POST['biodata_number_6'];
            $biodata_guardian_6 = $_POST['biodata_guardian_6'];
            $biodata_patropatri_6 = $_POST['biodata_patropatri_6'];
            // Biodata Info 7
            $biodata_number_7 = $_POST['biodata_number_7'];
            $biodata_guardian_7 = $_POST['biodata_guardian_7'];
            $biodata_patropatri_7 = $_POST['biodata_patropatri_7'];
            // Biodata Info 8
            $biodata_number_8 = $_POST['biodata_number_8'];
            $biodata_guardian_8 = $_POST['biodata_guardian_8'];
            $biodata_patropatri_8 = $_POST['biodata_patropatri_8'];
            // Biodata Info 9
            $biodata_number_9 = $_POST['biodata_number_9'];
            $biodata_guardian_9 = $_POST['biodata_guardian_9'];
            $biodata_patropatri_9 = $_POST['biodata_patropatri_9'];
            // Biodata Info 10
            $biodata_number_10 = $_POST['biodata_number_10'];
            $biodata_guardian_10 = $_POST['biodata_guardian_10'];
            $biodata_patropatri_10 = $_POST['biodata_patropatri_10'];
            $cust_payment_date = $_POST['cust_payment_date'];    
            // Insert the contact form data into the contact_us table
            $sql = "INSERT INTO customer_sent_info_complete (
            payment_order_id,
            user_id,
            payment_cust_name,
            payment_cust_email, 
            payment_cust_number, 
            payment_biodata_quantity,
            biodata_number_1,
            biodata_guardian_1,
            biodata_patropatri_1,
            biodata_number_2,
            biodata_guardian_2,
            biodata_patropatri_2,
            biodata_number_3,
            biodata_guardian_3,
            biodata_patropatri_3,
            biodata_number_4,
            biodata_guardian_4,
            biodata_patropatri_4,
            biodata_number_5,
            biodata_guardian_5,
            biodata_patropatri_5,
            biodata_number_6,
            biodata_guardian_6,
            biodata_patropatri_6,
            biodata_number_7,
            biodata_guardian_7,
            biodata_patropatri_7,
            biodata_number_8,
            biodata_guardian_8,
            biodata_patropatri_8,
            biodata_number_9,
            biodata_guardian_9,
            biodata_patropatri_9,
            biodata_number_10,
            biodata_guardian_10,
            biodata_patropatri_10,
            cust_payment_date,    
            info_sent_time) 
            VALUES ('$payment_order_id',
            '$user_id', 
            '$payment_cust_name', 
            '$payment_cust_email', 
            '$payment_cust_number', 
            '$payment_biodata_quantity',
            '$biodata_number_1',
            '$biodata_guardian_1',
            '$biodata_patropatri_1',
            '$biodata_number_2',
            '$biodata_guardian_2',
            '$biodata_patropatri_2',
            '$biodata_number_3',
            '$biodata_guardian_3',
            '$biodata_patropatri_3',
            '$biodata_number_4',
            '$biodata_guardian_4',
            '$biodata_patropatri_4',
            '$biodata_number_5',
            '$biodata_guardian_5',
            '$biodata_patropatri_5',
            '$biodata_number_6',
            '$biodata_guardian_6',
            '$biodata_patropatri_6',
            '$biodata_number_7',
            '$biodata_guardian_7',
            '$biodata_patropatri_7',
            '$biodata_number_8',
            '$biodata_guardian_8',
            '$biodata_patropatri_8',
            '$biodata_number_9',
            '$biodata_guardian_9',
            '$biodata_patropatri_9',
            '$biodata_number_10',
            '$biodata_guardian_10',
            '$biodata_patropatri_10',
            '$cust_payment_date', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";
            if (mysqli_query($conn, $sql)) {
            $sbo_id = mysqli_insert_id($conn);
            $_SESSION['id'] = $sbo_id;
            // SMTP email sending code
            $to = $payment_cust_email;
            $subject = "Contact Details";
            ob_start();
            include('../abdur-rahman/BiodataInfoEmailBody-sent.php'); // Update with the actual file name
            $email_body = ob_get_clean();
            // Plain text version of the email body
            $plain_text_message = "
            যোগাযোগের তথ্য
            আমাদের সাথে থাকার জন্য আপনাকে ধন্যবাদ! শ্বশুরবাড়ি ডট কম শুধুমাত্র দুইটি পরিবারের মধ্যে যোগাযোগের মাধ্যম হিসাবে পরিচালিত। নিচে বায়োডাটা নং এ ক্লিক করে দেখে নিতেন পারেন সম্পূর্ণ প্রফাইলটি।
            পেমেন্ট অর্ডার আইডি: $payment_order_id
            পেমেন্ট তারিখ: $payment_biodata_quantity
            মোট বায়োডাটা: $payment_biodata_quantity
            // Biodata Info 1
            https://shosurbari.com/profile.php?/Biodata=$biodata_number_1
            বায়োডাটা নং: $biodata_number_1
            বায়োডাটার অভিভাবক: $biodata_guardian_1
            পাত্র/পাত্রী: $biodata_patropatri_1
            // Biodata Info 2
            https://shosurbari.com/profile.php?/Biodata=$biodata_number_2
            বায়োডাটা নং: $biodata_number_2
            বায়োডাটার অভিভাবক: $biodata_guardian_2
            পাত্র/পাত্রী: $biodata_patropatri_2
            // Biodata Info 3
            https://shosurbari.com/profile.php?/Biodata=$biodata_number_3
            বায়োডাটা নং: $biodata_number_3
            বায়োডাটার অভিভাবক: $biodata_guardian_3
            পাত্র/পাত্রী: $biodata_patropatri_3
            // Biodata Info 4
            https://shosurbari.com/profile.php?/Biodata=$biodata_number_4
            বায়োডাটা নং: $biodata_number_4
            বায়োডাটার অভিভাবক: $biodata_guardian_4
            পাত্র/পাত্রী: $biodata_patropatri_4
            // Biodata Info 5
            https://shosurbari.com/profile.php?/Biodata=$biodata_number_5
            বায়োডাটা নং: $biodata_number_5
            বায়োডাটার অভিভাবক: $biodata_guardian_5
            পাত্র/পাত্রী: $biodata_patropatri_5
            // Biodata Info 6
            https://shosurbari.com/profile.php?/Biodata=$biodata_number_6
            বায়োডাটা নং: $biodata_number_6
            বায়োডাটার অভিভাবক: $biodata_guardian_6
            পাত্র/পাত্রী: $biodata_patropatri_6
            // Biodata Info 7
            https://shosurbari.com/profile.php?/Biodata=$biodata_number_7
            বায়োডাটা নং: $biodata_number_7
            বায়োডাটার অভিভাবক: $biodata_guardian_7
            পাত্র/পাত্রী: $biodata_patropatri_7
            // Biodata Info 8
            https://shosurbari.com/profile.php?/Biodata=$biodata_number_8
            বায়োডাটা নং: $biodata_number_8
            বায়োডাটার অভিভাবক: $biodata_guardian_8
            পাত্র/পাত্রী: $biodata_patropatri_8
            // Biodata Info 9
            https://shosurbari.com/profile.php?/Biodata=$biodata_number_9
            বায়োডাটা নং: $biodata_number_9
            বায়োডাটার অভিভাবক: $biodata_guardian_9
            পাত্র/পাত্রী: $biodata_patropatri_9
            // Biodata Info 10
            https://shosurbari.com/profile.php?/Biodata=$biodata_number_10
            বায়োডাটা নং: $biodata_number_10
            বায়োডাটার অভিভাবক: $biodata_guardian_10
            পাত্র/পাত্রী: $biodata_patropatri_10
            বি:দ্র: পরিবার ও পাত্র-পাত্রীর সম্পর্কে নিজ দায়িত্বে ভালভাবে খোঁজ নিয়ে তবেই বিয়ের কথা পাকা করুন। বিয়ের পূর্বেই পাত্র-পাত্রীর পরিবারের সাথে টাকা লেনদেন করে প্রতারিত হবেন না।
            Connect with us:
            - Website: https://www.shoshurbari.com
            - Facebook: https://www.facebook.com/ShoshurBari.bd
            - Email: support@shoshurbari.com
            - YouTube: https://www.youtube.com/c/ShoshurBari
            (c) 2022-23 ShosurBari.com | All Rights Reserved
            ";
            $headers = "From: nafizulislam.swe@gmail.com\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $smtp_host = "smtp.gmail.com";
            $smtp_port = 587;
            $smtp_username = "nafizulislam.swe@gmail.com";
            $smtp_password = "dnngvzwetnirboae";
            $smtp_secure = "tls";
            require '../PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = $smtp_host;
            $mail->Port = $smtp_port;
            $mail->SMTPSecure = $smtp_secure;
            $mail->SMTPAuth = true;
            $mail->Username = $smtp_username;
            $mail->Password = $smtp_password;
            $mail->setFrom($smtp_username, 'ShosurBari');
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->Body = $email_body;
            $mail->AltBody = $plain_text_message; // Plain text version of the email
            if ($mail->send()) {
                echo '<script>';
                echo 'document.addEventListener("DOMContentLoaded", function() {';
                echo 'showMessage("success", "Successfully Sent Email!");';
                echo '});';
                echo '</script>';
            } else {
                echo '<script>';
                echo 'document.addEventListener("DOMContentLoaded", function() {';
                echo 'showMessage("error", "Oops! Email Sent Failed");';
                echo '});';
                echo '</script>';
            }
        } else {
        echo "Error Found! Email Sent Failed.";
        }
        }
    }
?>