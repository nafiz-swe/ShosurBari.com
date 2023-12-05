<?php

function register1() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Your existing code...

        if (mysqli_query($conn, $sql)) {
            // Your existing code...

            // Set up SMTP configuration for Gmail
            $to = $email;
            $subject = "Welcome to ShosurBari!";

            // HTML version of the email body
            ob_start();
            include('RegisterEmailBody.php');
            $email_body = ob_get_clean();

            // Plain text version of the email body
            $plain_text_message = "
            Welcome to ShosurBari!
            
            Thank you for registering at ShosurBari. Here are your registration details:
            
            Biodata Number: $id
            Full Name: $fname
            Username: $uname
            Email: $email
            Phone Number: $pnumber
            Gender: $gender
            Passwors: ********* (For security reasons, do not display the password)

            
            Login to your account: https://www.shoshurbari.rf.gd/login.php
            
            Note: Please remember to keep your passwords secure. Do not share them with anyone.
            
            Connect with us:
            - Website: https://www.shoshurbari.com
            - Facebook: https://www.facebook.com/ShoshurBari.bd
            - Email: support@shoshurbari.com
            - YouTube: https://www.youtube.com/c/ShoshurBari
            
            (c) 2022-23 ShosurBari.com | All Rights Reserved
            ";

            // Headers
            $headers = "From: nafizulislam.swe@gmail.com\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            // Gmail SMTP configuration
            $smtp_host = "smtp.gmail.com";
            $smtp_port = 587;
            $smtp_username = "nafizulislam.swe@gmail.com"; // Your Gmail email
            $smtp_password = "dnngvzwetnirboae"; // Your Gmail password
            $smtp_secure = "tls"; // Use 'ssl' for SSL encryption

            // Configure PHPMailer
            require 'PHPMailer/PHPMailerAutoload.php';

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
                // Email sent successfully
                echo '<script>alert("Registration successful. Check your email for confirmation.");</script>';
            } else {
                // Error sending email
                echo '<script>alert("Error sending registration confirmation email. Please try again later.");</script>';
            }
        } else {
            // Your existing code...
        }
    }
}







function registers() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname = $_POST['fname'];
        $uname = $_POST['uname'];
        $gender = $_POST['gender'];
        $pnumber = $_POST['pnumber'];
        $email = $_POST['email'];
        $hashed_password = hash('sha256', $_POST['pass_1']);
        // $pass_1 = $_POST['pass_1'];
        // $pass_2 = $_POST['pass_2'];
        require_once("includes/dbconn.php");

        // Check if email or username already exist
        $email_check_sql = "SELECT COUNT(*) FROM users WHERE email = '$email'";
        $username_check_sql = "SELECT COUNT(*) FROM users WHERE username = '$uname'";

        $email_result = mysqli_query($conn, $email_check_sql);
        $username_result = mysqli_query($conn, $username_check_sql);

        $email_exists = mysqli_fetch_array($email_result)[0];
        $username_exists = mysqli_fetch_array($username_result)[0];

        if ($email_exists > 0) {
            // Set an error message in a session variable
            $_SESSION['error_message'] = "উফফ! এই Email দিয়ে ইতিমধ্যে একটি একাউন্ট রয়েছে। অনুগ্রহ করে Email পরিবর্তন করে আবার চেষ্টা করুন।";
            header("location: register.php"); // Redirect back to the registration page
        exit();
        } elseif ($username_exists > 0) {
            // Set an error message in a session variable
            $_SESSION['error_message'] = "উফফ! এই Username দিয়ে ইতিমধ্যে একটি একাউন্ট রয়েছে। অনুগ্রহ করে Username পরিবর্তন করে আবার চেষ্টা করুন।";
            header("location: register.php"); // Redirect back to the registration page
        exit();
        } else {
            // Proceed with registration
            $sql = "INSERT INTO users 
            (fullname, username, gender, number, email, password, active, register_date) 
            VALUES ('$fname', '$uname', '$gender', '$pnumber', '$email', '$hashed_password', 1, DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";

            if (mysqli_query($conn, $sql)) {
                // Get the ID of the newly registered user
                $id = mysqli_insert_id($conn);

                // Set a session variable to store the user ID
                $_SESSION['id'] = $id;

                // Create a record for the user in the deactivate table
                $deactivate_sql = "INSERT INTO deactivate (user_id, status) VALUES ($id, 0)";
                mysqli_query($conn, $deactivate_sql);

                // Save login information in cookie
                setcookie('username', $uname, time() + (86400 * 365), "/");
                setcookie('email', $email, time() + (86400 * 365), "/");
                setcookie('password', $pass_1, time() + (86400 * 365), "/");

                // Redirect the user to the userhome.php page with the user ID as a parameter in the URL
                header("location: userhome.php?id=$id");
            } else {
                // Set an error message in a session variable
                $_SESSION['error_message'] = "Error in registration: " . $conn->error;
                header("location: register.php"); // Redirect back to the registration page
                exit();                
            }
        }
    }
}







function register() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname = $_POST['fname'];
        $uname = $_POST['uname'];
        $gender = $_POST['gender'];
        $pnumber = $_POST['pnumber'];
        $email = $_POST['email'];
        $hashed_password = hash('sha256', $_POST['pass_1']);
        
        require_once("includes/dbconn.php");

        $email_check_sql = "SELECT COUNT(*) FROM users WHERE email = '$email'";
        $username_check_sql = "SELECT COUNT(*) FROM users WHERE username = '$uname'";

        $email_result = mysqli_query($conn, $email_check_sql);
        $username_result = mysqli_query($conn, $username_check_sql);

        $email_exists = mysqli_fetch_array($email_result)[0];
        $username_exists = mysqli_fetch_array($username_result)[0];

        if ($email_exists > 0) {
            $_SESSION['error_message'] = "উফফ! এই Email দিয়ে ইতিমধ্যে একটি একাউন্ট রয়েছে। অনুগ্রহ করে Email পরিবর্তন করে আবার চেষ্টা করুন।";
            header("location: register.php");
            exit();
        } elseif ($username_exists > 0) {
            $_SESSION['error_message'] = "উফফ! এই Username দিয়ে ইতিমধ্যে একটি একাউন্ট রয়েছে। অনুগ্রহ করে Username পরিবর্তন করে আবার চেষ্টা করুন।";
            header("location: register.php");
            exit();
        } else {
            $sql = "INSERT INTO users 
                (fullname, username, gender, number, email, password, active, register_date) 
                VALUES ('$fname', '$uname', '$gender', '$pnumber', '$email', '$hashed_password', 1, DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";

            if (mysqli_query($conn, $sql)) {
                $id = mysqli_insert_id($conn);
                $_SESSION['id'] = $id;

                $deactivate_sql = "INSERT INTO deactivate (user_id, status) VALUES ($id, 0)";
                mysqli_query($conn, $deactivate_sql);

                $to = $email;
                $subject = "Welcome to ShosurBari!";

                ob_start();
                include('RegisterEmailBody.php');
                $email_body = ob_get_clean();

            // Plain text version of the email body
            $plain_text_message = "
            Welcome to ShosurBari!
            
            Thank you for registering at ShosurBari. Here are your registration details:
            
            Biodata Number: $id
            Full Name: $fname
            Username: $uname
            Email: $email
            Phone Number: $pnumber
            Gender: $gender
            Passwors: ********* (For security reasons, do not display the password)

            
            Login to your account: https://www.shoshurbari.rf.gd/login.php
            
            Note: Please remember to keep your passwords secure. Do not share them with anyone.
            
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

                require 'PHPMailer/PHPMailerAutoload.php';

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

                if ($mail->send()) {
                    echo '<script>alert("Registration successful. Check your email for confirmation.");</script>';
                } else {
                    echo '<script>alert("Error sending registration confirmation email. Please try again later.");</script>';
                }

                header("location: userhome.php?id=$id");
            } else {
                $_SESSION['error_message'] = "Error in registration: " . $conn->error;
                header("location: register.php");
                exit();
            }
        }
    }
}
