<?php
    function mysqlexec($sql){
          $host="localhost"; 
          $username="shosurbari_abdurrahman";
          $password="SoftwareEngineer@480";
          $db_name="shosur_bari";
        $conn=mysqli_connect("$host", "$username", "$password")or die("cannot connect");
        mysqli_select_db($conn,"$db_name")or die("cannot select DB");
        mysqli_set_charset($conn, "utf8mb4");
        if($result = mysqli_query($conn, $sql)){
            return $result;
        }
        else{
            echo mysqli_error($conn);
        }
    }
    // For Unique Visitors Count From Home Page Headin Sections Store - START
	function saveUniqueVisitor($conn, $ip_address) {
		$save_visitor_sql = "INSERT INTO unique_visitors (ip_address, visit_time) 
							 VALUES (?, NOW()) 
							 ON DUPLICATE KEY UPDATE visit_time = NOW()";
		$save_visitor_stmt = $conn->prepare($save_visitor_sql);
		if (!$save_visitor_stmt) {
			die("Error preparing statement: " . $conn->error);
		}
		$save_visitor_stmt->bind_param("s", $ip_address);
		if (!$save_visitor_stmt->execute()) {
			die("Error executing statement: " . $save_visitor_stmt->error);
		}
		$save_visitor_stmt->close();
	}
    // END \ For Unique Visitors Count-From Home Page Headin
    /*  START \  User / Biodata Profile Search Function */
    function search(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $biodatagender = isset($_POST['biodatagender']) ? $_POST['biodatagender'] : '';
            $Skin_tones = isset($_POST['Skin_tones']) ? $_POST['Skin_tones'] : [];
            $religions = isset($_POST['religion']) ? $_POST['religion'] : [];
            $maritalStatus = isset($_POST['maritalstatus']) ? $_POST['maritalstatus'] : [];
            $family_class = isset($_POST['family_class']) ? $_POST['family_class'] : [];
            $country_present_address = isset($_POST['country_present_address']) ? $_POST['country_present_address'] : [];
            $scndry_edu_method = isset($_POST['scndry_edu_method']) ? $_POST['scndry_edu_method'] : [];
            $occupations = isset($_POST['occupation_sector']) ? $_POST['occupation_sector'] : [];
            $student_occupation_level = isset($_POST['student_occupation_level']) ? $_POST['student_occupation_level'] : [];
            $allDistrict = isset($_POST['permanent_division']) ? $_POST['permanent_division'] : [];
            $home_district_under_barishal = isset($_POST['home_district_under_barishal']) ? $_POST['home_district_under_barishal'] : [];
            $home_district_under_chattogram = isset($_POST['home_district_under_chattogram']) ? $_POST['home_district_under_chattogram'] : [];
            $home_district_under_dhaka = isset($_POST['home_district_under_dhaka']) ? $_POST['home_district_under_dhaka'] : [];
            $home_district_under_khulna = isset($_POST['home_district_under_khulna']) ? $_POST['home_district_under_khulna'] : [];
            $home_district_under_mymensingh = isset($_POST['home_district_under_mymensingh']) ? $_POST['home_district_under_mymensingh'] : [];
            $home_district_under_rajshahi = isset($_POST['home_district_under_rajshahi']) ? $_POST['home_district_under_rajshahi'] : [];
            $home_district_under_rangpur = isset($_POST['home_district_under_rangpur']) ? $_POST['home_district_under_rangpur'] : [];
            $home_district_under_sylhet = isset($_POST['home_district_under_sylhet']) ? $_POST['home_district_under_sylhet'] : [];
            // Remove the "Any Skin Tones" value from the array if present
            $Skin_tones = array_diff($Skin_tones, ["Any Skin Tones"]);
            $religions = array_diff($religions, ["Any Religion"]);
            $maritalStatus = array_diff($maritalStatus, ["Any Marital Status"]);
            $family_class = array_diff($family_class, ["Any Family Class"]);
            $country_present_address = array_diff($country_present_address, ["Any Country"]);
            $scndry_edu_method = array_diff($scndry_edu_method, ["Any Education Method"]);
            $occupations = array_diff($occupations, ["Any Occupation"]);
            // Remove the "Any District" value from the array if present
            if (($key = array_search("Any District", $allDistrict)) !== false) {
                unset($allDistrict[$key]);
            }
            // Check if any option is not selected
            if (empty($biodatagender) && empty($Skin_tones) && empty($religions) && empty($maritalStatus) && empty($family_class) && empty($country_present_address) && empty($scndry_edu_method) 
            && empty($occupations)
            && empty($student_occupation_level)  
            && empty($allDistrict) 
            && empty($home_district_under_barishal) && empty($home_district_under_chattogram) && empty($home_district_under_dhaka)
            && empty($home_district_under_khulna) && empty($home_district_under_mymensingh) && empty($home_district_under_rajshahi)
            && empty($home_district_under_rangpur) && empty($home_district_under_sylhet)) {
            //If no option is selected, return the page
                return;
            }
            // $sql = "SELECT * FROM 1bd_personal_physical WHERE 1=1";
            $sql = "SELECT * FROM 1bd_personal_physical AS pp
            LEFT JOIN 2bd_personal_lifestyle AS pl ON pp.user_id = pl.user_id
            LEFT JOIN 3bd_secondaryedu_method AS sm ON pp.user_id = sm.user_id
            LEFT JOIN 4bd_address_details AS ad ON pp.user_id = ad.user_id
            LEFT JOIN 5bd_family_information AS fi ON pp.user_id = fi.user_id
            LEFT JOIN 6bd_7bd_marital_status AS ms ON pp.user_id = ms.user_id
            LEFT JOIN 8bd_religion_details AS rd ON pp.user_id = rd.user_id
            WHERE 1=1";
            if (!empty($biodatagender)) {
                if (!is_array($biodatagender)) {
                    $sql .= " AND biodatagender = '$biodatagender'";
                } else {
                    $sql .= " AND (";
                    $conditions = [];
                    foreach ($biodatagender as $gender) {
                        $conditions[] = "biodatagender = '$gender'";
                    }
                    $sql .= implode(" OR ", $conditions);
                    $sql .= ")";
                }
            }
            if (!empty($Skin_tones)) {
                $skinTonesCondition = implode("','", $Skin_tones);
                $sql .= " AND Skin_tones IN ('$skinTonesCondition')";
            }
            if (!empty($religions)) {
                $religionsCondition = implode("','", $religions);
                $sql .= " AND religion IN ('$religionsCondition')";
            }
            if (!empty($maritalStatus)) {
                $maritalStatusCondition = implode("','", $maritalStatus);
                $sql .= " AND maritalstatus IN ('$maritalStatusCondition')";
            }
            if (!empty($family_class)) {
                $familyClassCondition = implode("','", $family_class);
                $sql .= " AND family_class IN ('$familyClassCondition')";
            }
            if (!empty($country_present_address)) {
                $countryAddressCondition = implode("','", $country_present_address);
                $sql .= " AND country_present_address IN ('$countryAddressCondition')";
            }
            if (!empty($scndry_edu_method)) {
                $edumethodCondition = implode("','", $scndry_edu_method);
                $sql .= " AND scndry_edu_method IN ('$edumethodCondition')";
            }
            //conditions for occupation_sector and student_occupation_level
            if (!empty($occupations) && !empty($student_occupation_level)) {
                $occupationsCondition = implode("','", $occupations);
                $studentsOccupationsCondition = implode("','", $student_occupation_level);
                $sql .= " AND (occupation_sector IN ('$occupationsCondition') OR student_occupation_level IN ('$studentsOccupationsCondition'))";
            } elseif (!empty($occupations)) {
                $occupationsCondition = implode("','", $occupations);
                $sql .= " AND occupation_sector IN ('$occupationsCondition')";
            } elseif (!empty($student_occupation_level)) {
                $studentsOccupationsCondition = implode("','", $student_occupation_level);
                $sql .= " AND student_occupation_level IN ('$studentsOccupationsCondition')";
            }
            // Conditions for home_district_under_* columns
            $districtConditions = array();
            // Check if "Any District" is selected
            if ($allDistrict) {
                // If "Any District" is selected, return all columns for occupation
                $districtConditions[] = "(home_district_under_barishal IS NOT NULL OR home_district_under_chattogram IS NOT NULL OR home_district_under_dhaka IS NOT NULL OR home_district_under_khulna IS NOT NULL OR home_district_under_mymensingh IS NOT NULL OR home_district_under_rajshahi IS NOT NULL OR home_district_under_rangpur IS NOT NULL OR home_district_under_sylhet IS NOT NULL)";
            } else {
                // If specific district options are selected, include them in the query
                if (!empty($home_district_under_barishal)) {
                    $barishalDivisionCondition = implode("','", $home_district_under_barishal);
                    $districtConditions[] = "home_district_under_barishal IN ('$barishalDivisionCondition')";
                }
                if (!empty($home_district_under_chattogram)) {
                    $chattogramDivisionCondition = implode("','", $home_district_under_chattogram);
                    $districtConditions[] = "home_district_under_chattogram IN ('$chattogramDivisionCondition')";
                }
                if (!empty($home_district_under_dhaka)) {
                    $dhakaDivisionCondition = implode("','", $home_district_under_dhaka);
                    $districtConditions[] = "home_district_under_dhaka IN ('$dhakaDivisionCondition')";
                }
                if (!empty($home_district_under_khulna)) {
                    $khulnaDivisionCondition = implode("','", $home_district_under_khulna);
                    $districtConditions[] = "home_district_under_khulna IN ('$khulnaDivisionCondition')";
                }
                if (!empty($home_district_under_mymensingh)) {
                    $mymensinghDivisionCondition = implode("','", $home_district_under_mymensingh);
                    $districtConditions[] = "home_district_under_mymensingh IN ('$mymensinghDivisionCondition')";
                }
                if (!empty($home_district_under_rajshahi)) {
                    $rajshahiDivisionCondition = implode("','", $home_district_under_rajshahi);
                    $districtConditions[] = "home_district_under_rajshahi IN ('$rajshahiDivisionCondition')";
                }
                if (!empty($home_district_under_rangpur)) {
                    $rangpurDivisionCondition = implode("','", $home_district_under_rangpur);
                    $districtConditions[] = "home_district_under_rangpur IN ('$rangpurDivisionCondition')";
                }
                if (!empty($home_district_under_sylhet)) {
                    $sylhetDivisionCondition = implode("','", $home_district_under_sylhet);
                    $districtConditions[] = "home_district_under_sylhet IN ('$sylhetDivisionCondition')";
                }
            }
            // Append the district conditions to the SQL query
            if (!empty($districtConditions)) {
                $sql .= " AND (" . implode(" OR ", $districtConditions) . ")";
            }
            $sql .= " ORDER BY pp.user_id DESC"; // show top list biodata which biodata last post
            $result = mysqlexec($sql);
            // Check if no matching data found for biodatagender, Skin_tones, religion, and marital status
            if (empty($result) && !is_array($biodatagender) && empty($Skin_tones) && empty($religions) && empty($maritalStatus) && empty($family_class) && empty($country_present_address) && empty($scndry_edu_method) && empty($occupations) && empty($student_occupation_level) && empty($allDistrict) 
            && empty($home_district_under_barishal) && empty($home_district_under_chattogram) && empty($home_district_under_dhaka)
            && empty($home_district_under_khulna) && empty($home_district_under_mymensingh) && empty($home_district_under_rajshahi)
            && empty($home_district_under_rangpur) && empty($home_district_under_sylhet)) {
            // If no matching data found for biodatagender, Skin_tones, religion, and marital status, return the page
            return;
            } elseif (empty($result) && is_array($biodatagender) && empty($Skin_tones) && empty($religions) && empty($maritalStatus) && empty($family_class) && empty($country_present_address) && empty($scndry_edu_method) && empty($occupations) && empty($student_occupation_level) && empty($allDistrict) 
            && empty($home_district_under_barishal) && empty($home_district_under_chattogram) && empty($home_district_under_dhaka)
            && empty($home_district_under_khulna) && empty($home_district_under_mymensingh) && empty($home_district_under_rajshahi)
            && empty($home_district_under_rangpur) && empty($home_district_under_sylhet)) {
            // If no matching data found for any of the biodatagender options, Skin_tones, religion, and marital status, return the page
                return;
            }
            return $result;
        }
    }
    /* END   \ User / Biodata Profile Search Function */
    /* START New User Register Function */
    function register() {
        global $conn;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fname = $_POST['fname'];
            $uname = $_POST['uname'];
            $gender = $_POST['gender'];
            $pnumber = $_POST['pnumber'];
            $email = $_POST['email'];
            $pass_1 = $_POST['pass_1'];
            // Hash the password before storing it in the database
            $hashed_password = password_hash($pass_1, PASSWORD_DEFAULT);
            require_once("includes/dbconn.php");
            $email_check_sql = "SELECT COUNT(*) FROM users WHERE email = '$email'";
            $username_check_sql = "SELECT COUNT(*) FROM users WHERE username = '$uname'";
            $email_result = mysqli_query($conn, $email_check_sql);
            $username_result = mysqli_query($conn, $username_check_sql);
            $email_exists = mysqli_fetch_array($email_result)[0];
            $username_exists = mysqli_fetch_array($username_result)[0];
            if ($username_exists > 0) {
                $_SESSION['reg_error_message'] = "দুঃখিত! '$uname' এই Username দিয়ে ইতিমধ্যে একটি একাউন্ট রয়েছে। অনুগ্রহ করে Username পরিবর্ত করে আবার চেষ্টা করুন।";
                exit();
            } elseif ($email_exists > 0) {
                $_SESSION['reg_error_message'] = "দুঃখিত! '$email' এই Email দিয়ে ইতিমধ্যে একটি একাউন্ট রয়েছে। অনুগ্রহ করে আপনার একাউন্ট লগইন করুন।";
                exit();
            } else {
                $selectedCountryCode = $_POST['selectedCountryCode'];
                $selectedCountryName = $_POST['selectedCountryName'];
                $sql = "INSERT INTO users 
                (fullname, username, gender, number, country_code, country_name, email, password, active, deactivated, register_date) 
                VALUES ('$fname', '$uname', '$gender', '$pnumber', '$selectedCountryCode', '$selectedCountryName', '$email', '$hashed_password', 1, 0, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
                if (mysqli_query($conn, $sql)) {
                    $id = mysqli_insert_id($conn);
                    $_SESSION['id'] = $id;
                    $to = $email;
                $subject = "Congratulations! Your Account Is Live";
                ob_start();
                include('RegisterEmailBody.php');
                $email_body = ob_get_clean();
                $plain_text_message = "
                Welcome to ShosurBari
                Thank you for choosing ShosurBari.com! Your registration was successful. We look forward to serving you.
                Biodata Number: $id
                Full Name: $fname
                Username: $uname
                Email: $email
                Phone Number: $pnumber
                Gender: $gender
                Passwors: ********* (For security reasons, do not display the password)
                Post your biodata: https://www.shoshurbari.com/biodata-post.php
                Note: Please remember to keep your passwords secure. Do not share them with anyone.
                Connect with us:
                - Website: https://www.shoshurbari.com
                - Facebook: https://www.facebook.com/ShoshurBari.Matrimony
                - Email: info@shoshurbari.com
                - YouTube: https://www.youtube.com/c/ShoshurBari
                (c) 2022-23 ShosurBari.com | All Rights Reserved
                ";
                $headers = "From: shosurbari@gmail.com\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $smtp_host = "smtp.gmail.com";
                $smtp_port = 587;
                $smtp_username = "shosurbari@gmail.com";
                $smtp_password = "rbrmjhtvemwxymrm";
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
                $mail->AltBody = $plain_text_message;
                if ($mail->send()) {
                    echo '';
                } else {
                    echo '';
                }
                    header("location: my-account.php");
                } else {
                    $_SESSION['reg_error_message'] = "Error in registration: " . $conn->error;
                    header("location: register.php");
                    exit();
                }
            }
        }
    }
    // Login Conditions
    function isloggedin(){
        if(!isset($_SESSION['id'])){
            return false;
        }
        else{
            return true;
        }
    }
    /* END  - New User Register Function */
    /* START -  User Account Update */
    // Password updated From User Account
    function updateAccount($userId, $newPassword, $newFullName, $newGender) {
        require_once("includes/dbconn.php");
        $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

        $update_query = "UPDATE users SET password = '$hashed_password', fullname = '$newFullName', gender = '$newGender' WHERE id = $userId";
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            return true; //successfully
        } else {
            return false; // Error
        }
    }
    // Check if the update account form is submitted
    if (isset($_POST['update_account'])) {
        $userId = $_SESSION['id'];
        $newPassword = $_POST['pass_1'];
        $confirmPassword = $_POST['pass_2'];
        $newFullName = $_POST['fullname'];
        $newGender = $_POST['gender'];
        // Check if new passwords match
        if ($newPassword != $confirmPassword) {
            echo 'New passwords do not match';
        } else {
            // Update the account
            $accountUpdated = updateAccount($userId, $newPassword, $newFullName, $newGender);
            if ($accountUpdated) {
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br>একাউন্ট আপডেট সফল হয়েছে!';
            $_SESSION['messageType'] = 'success';
            } else {
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>সমস্যা দেখা দিয়েছে!';
            $_SESSION['messageType'] = 'error';
            }
            header("Location: account-update.php");
            exit();
        }
    }
    /*END - User Account Update */
    /*START - Biodata Contact / Request */
    function biodata_sale_customer() {
        require_once("includes/dbconn.php");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cust_name = $_POST['cust_name'];
            $cust_email = $_POST['cust_email'];
            $cust_number = $_POST['cust_number'];
            $cust_permanent_address = $_POST['cust_permanent_address'];
            $request_biodata_number = $_POST['request_biodata_number'];
            // $biodata_quantities & $total_fee no need here
            $payment_method = $_POST['payment_method'];
            $bkash_number = $_POST['bkash_number'];
            $bkash_transaction_id = $_POST['bkash_transaction_id'];
            $nagad_number = $_POST['nagad_number'];
            $nagad_transaction_id = $_POST['nagad_transaction_id'];
            $roket_number = $_POST['roket_number'];
            $roket_transaction_id = $_POST['roket_transaction_id'];
            // Check if idCountOne and feeOne are set, if not, fall back to idCount and fee
            if (isset($_POST['idCountOne']) && isset($_POST['feeOne'])) {
                $idCount = $_POST['idCountOne'];
                $fee = $_POST['feeOne'];
            } else {
                $idCount = $_POST['idCount'];
                $fee = $_POST['fee'];
            }
            if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
            } else {
                $user_id = 0;
            }
            // Insert customer data into the database
            $selectedCountryCode = $_POST['selectedCountryCode'];
            $selectedCountryName = $_POST['selectedCountryName']; 
            $sql = "INSERT INTO customer (user_id, cust_name, cust_email, cust_number, country_code, country_name, cust_permanent_address, request_biodata_number, biodata_quantities, total_fee, payment_method, bkash_number, bkash_transaction_id, nagad_number, nagad_transaction_id, roket_number, roket_transaction_id, processing, sent, cancel, invalid, request_date) 
                VALUES ('$user_id', '$cust_name', '$cust_email', '$cust_number', '$selectedCountryCode', '$selectedCountryName', '$cust_permanent_address', '$request_biodata_number', '$idCount', '$fee', '$payment_method', '$bkash_number', '$bkash_transaction_id', '$nagad_number', '$nagad_transaction_id', '$roket_number', '$roket_transaction_id', 1, 0, 0, 0, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            if (mysqli_query($conn, $sql)) {
            $id_customer = mysqli_insert_id($conn);
            $_SESSION['id_customer'] = $id_customer;
            $request_date = $row['request_date'];
            $formatted_date = date('j F Y, g:i:s A', strtotime($request_date));
            // SMTP email sending code
            $to = $cust_email;
            $subject = "Your Transaction is Successfully Completed!";
            ob_start();
            include('PaymentEmailBody.php');
            $email_body = ob_get_clean();
            $plain_text_message = "
            Your Order is Processing! Order Details.
            ধন্যবাদ! আপনার পেমেন্ট তথ্য সফল ভাবে জমা হয়েছে। আপনার পেমেন্ট তথ্য যাচাই বাছাইয়ের পর ২৪ ঘন্টার মধ্যে আপনাকে SMS বা ই-মেইলের মাধ্যমে যোগাযোগের কাঙ্ক্ষিত তথ্য প্রদান করা হবে।
            Name: $cust_name
            Email: $cust_email
            Mobile Number: $cust_number
            Address: $cust_permanent_address
            Request Biodata: $request_biodata_number
            Total Fee: $fee
            Payment Method: $payment_method
            Payment Number: $bkash_number || $nagad_number || $roket_number
            Transaction: $bkash_transaction_id || $nagad_transaction_id || $roket_transaction_id
            Date: $formatted_date = date('j F Y, g:i:s A', strtotime($request_date));                
            বি:দ্র: বায়োডাটার (পাত্র-পাত্রীর) যদি বিয়ে ঠিক হয়ে যায় সেক্ষেত্রে আপনাকে যোগাযোগের তথ্য প্রদান না করে সার্ভিস চার্জ ফেরত দেয়া হবে।
            Connect with us:
            - Website: https://www.shoshurbari.com
            - Facebook: https://www.facebook.com/ShoshurBari.Matrimony
            - Email: info@shoshurbari.com
            - YouTube: https://www.youtube.com/c/ShoshurBari
            (c) 2022-23 ShosurBari.com | All Rights Reserved
            ";
				$headers = "From: shosurbari@gmail.com\r\n";
				$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
				$smtp_host = "smtp.gmail.com";
				$smtp_port = 587;
				$smtp_username = "shosurbari@gmail.com";
				$smtp_password = "rbrmjhtvemwxymrm";
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
            $mail->AltBody = $plain_text_message;
            if ($mail->send()) {
                echo 'success';
                // Flush the output buffer to send the response to the client immediately
                flush();
            } else {
                echo 'no';
            }
            exit;
        } else {
            echo "Error";
        }
        }
    }
    /*END - Biodata Contact / Request */
    /*START - User Contact Us Function */
    function contact_us() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_contactus = $_POST['name_contactus'];
            $number_contactus = $_POST['number_contactus'];
            $email_contactus = $_POST['email_contactus'];
            $message_subject = $_POST['subject'];
            $message_contactus = $_POST['message_contactus'];
            require_once("includes/dbconn.php");
            if (isset($_SESSION['id'])) {
                $user_id = $_SESSION['id'];
            } else {
                $user_id = 0; // Default value for non-logged-in users
            }
            $selectedCountryCode = $_POST['selectedCountryCode'];
            $selectedCountryName = $_POST['selectedCountryName'];
            // Validate email address
            if (!preg_match('/^[a-zA-Z0-9._%+-]+@(gmail|outlook|hotmail|yahoo)\.com$/', $email_contactus)) {
                // Block email address if not from Gmail, Outlook, Hotmail, or Yahoo
                return;
            }
            // Validate message_contactus to block links containing "www.", ".com", "https:", "http:", "https://", and "bit.ly"
            if (preg_match('/www\.|\.com|http|https|http:|https:|https:\/\/|bit\.ly/', $message_contactus)) {
                // Block message if it contains any of the specified patterns
                return;
            }
            $sql = "INSERT INTO contact_us (user_id, name_contactus, number_contactus, country_code, country_name, email_contactus, subject, message_contactus, unread_message, read_message, message_sendingdate) 
                VALUES ('$user_id', '$name_contactus', '$number_contactus', '$selectedCountryCode', '$selectedCountryName', '$email_contactus', '$message_subject', '$message_contactus', 1, 0, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            if (mysqli_query($conn, $sql)) {
                $contact_id = mysqli_insert_id($conn);
                $_SESSION['contact_id'] = $contact_id;
                $request_date = $row['message_sendingdate'];
                $formatted_date = date('j F Y, g:i:s A', strtotime($request_date));
                // SMTP email sending code
                $to = $email_contactus;
                $subject = "Your message have been received!";
                ob_start();
                include('ContactUsEmailBody.php');
                $email_body = ob_get_clean();
                $plain_text_message = "
                যোগাযোগ বার্তা
                শ্বশুরবাড়ি ডট কমে আপনাকে স্বাগতম। আপনার তথ্য সফল ভাবেই জমা হয়েছে। শীঘ্রই আপনার সাথে যোগাযোগ করা হবে ইনশাআল্লাহ। আপনাকে সেবা দিতে আমারা আগ্রহী।
                মেসেজ আইডি: $contact_id
                নাম: $name_contactus
                নাম্বার: $number_contactus
                ই-মেইল: $email_contactus
                বিষয়: $subject
                মেসেজ: $message_contactus
                বি:দ্র: আপনি যদি আমাদের কাছ থেকে ৭২ ঘন্টার মধ্যে কোনো প্রতিক্রিয়া না পান তবে আমাদের ফেসবুক পেজে একটি মেসেজ দিন।
                Connect with us:
                - Website: https://www.shoshurbari.com
                - Facebook: https://www.facebook.com/ShoshurBari.Matrimony
                - Email: info@shoshurbari.com
                - YouTube: https://www.youtube.com/c/ShoshurBari
                (c) 2022-23 ShosurBari.com | All Rights Reserved
                ";
                $headers = "From: shosurbari@gmail.com\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $smtp_host = "smtp.gmail.com";
                $smtp_port = 587;
                $smtp_username = "shosurbari@gmail.com";
                $smtp_password = "rbrmjhtvemwxymrm";
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
                $mail->AltBody = $plain_text_message;
                if ($mail->send()) {
                    echo '';
                } else {
                    echo '';
                }
                header("location: contact-us.php");
            } else {
                header("location: contact-us.php");
                exit();
            }
        }
     }
    /*END -  User Contact Us Function */
    /*START - User Bio Data Save to Database */
    function post_biodata($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Biodata 1 
            $biodatagender=$_POST['biodatagender'];
            $day=$_POST['day'];
            $month=$_POST['month'];
            $year=$_POST['year'];
            $dob=$day ." ". $month . ", " .$year ;
            $height=$_POST['height'];
            $weight=$_POST['weight'];	
            $physicalstatus=$_POST['physicalstatus'];
            $Skin_tones = $_POST['Skin_tones'];
            $bloodgroup=$_POST['bloodgroup'];
            //Biodata 2
            $smoke=$_POST['smoke'];
            $occupation_sector=$_POST['occupation_sector'];
            $no_occupation=$_POST['no_occupation'];
            $other_occupation_sector=$_POST['other_occupation_sector'];
            $business_occupation_level=$_POST['business_occupation_level'];
            $student_occupation_level=$_POST['student_occupation_level'];
            $health_occupation_level=$_POST['health_occupation_level'];
            $engineer_occupation_level=$_POST['engineer_occupation_level'];
            $teacher_occupation_level=$_POST['teacher_occupation_level'];
            $defense_occupation_level=$_POST['defense_occupation_level'];
			$shop_occupation_level=$_POST['shop_occupation_level'];
            $foreigner_occupation_level=$_POST['foreigner_occupation_level'];
            $garments_occupation_level=$_POST['garments_occupation_level'];
            $driver_occupation_level=$_POST['driver_occupation_level'];
            $service_andcommon_occupation_level=$_POST['service_andcommon_occupation_level'];
            $mistri_occupation_level=$_POST['mistri_occupation_level'];
            $occupation_describe=$_POST['occupation_describe'];
            $dress_code=$_POST['dress_code'];
            $aboutme=$_POST['aboutme'];
            $groom_bride_name=$_POST['groom_bride_name'];		
            $groom_bride_number=$_POST['groom_bride_number'];		
            $groom_bride_family_number=$_POST['groom_bride_family_number'];		
            $family_member_name_relation=$_POST['family_member_name_relation'];		
            //Biodata 31 / 32 / 33
            $qawmi_madrasa_hafez=$_POST['qawmi_madrasa_hafez'];
            $qawmimadrasa_dawrapass=$_POST['qawmimadrasa_dawrapass'];
            $kowmi_dawrapas_year=$_POST['kowmi_dawrapas_year'];
            $kowmi_current_edu_level=$_POST['kowmi_current_edu_level'];
            $scndry_edu_method=$_POST['scndry_edu_method'];
            $gnrl_mdrs_secondary_pass=$_POST['gnrl_mdrs_secondary_pass'];
            $gnrl_mdrs_secondary_pass_year=$_POST['gnrl_mdrs_secondary_pass_year'];
            $gnrl_mdrs_secondary_end_year=$_POST['gnrl_mdrs_secondary_end_year'];
            $gnrlmdrs_secondary_running_std=$_POST['gnrlmdrs_secondary_running_std'];
            $others_edu_qualification=$_POST['others_edu_qualification'];
            $higher_secondary_edu_method=$_POST['higher_secondary_edu_method'];
            $current_max_edu_subject=$_POST['current_max_edu_subject'];
            $current_max_institute=$_POST['current_max_institute'];
            $current_max_pass_year=$_POST['current_max_pass_year'];
            //Biodata 4
            $permanent_division=$_POST['permanent_division'];
            $home_district_under_barishal=$_POST['home_district_under_barishal'];
            $home_district_under_chattogram=$_POST['home_district_under_chattogram'];
            $home_district_under_dhaka=$_POST['home_district_under_dhaka'];
            $home_district_under_khulna=$_POST['home_district_under_khulna'];
            $home_district_under_mymensingh=$_POST['home_district_under_mymensingh'];
            $home_district_under_rajshahi=$_POST['home_district_under_rajshahi'];
            $home_district_under_rangpur=$_POST['home_district_under_rangpur'];
            $home_district_under_sylhet=$_POST['home_district_under_sylhet'];
            $country_present_address=$_POST['country_present_address'];
            $present_address_location=$_POST['present_address_location'];
            $present_address_living_purpose=$_POST['present_address_living_purpose'];
            $childhood=$_POST['childhood'];
            //Biodata 5
            $family_major_guardian=$_POST['family_major_guardian'];
            $father_name=$_POST['father_name'];
            $father_alive=$_POST['father_alive'];
            $fatheroccupation=$_POST['fatheroccupation'];
            $mother_alive=$_POST['mother_alive'];
            $motheroccupation=$_POST['motheroccupation'];
            $brosis_number=$_POST['brosis_number'];
            $brosis_info=$_POST['brosis_info'];
            $uncle_profession=$_POST['uncle_profession'];
            $family_class=$_POST['family_class'];
            $financial_condition=$_POST['financial_condition'];
            $family_religious_condition=$_POST['family_religious_condition'];
            //Biodata 6bd_7bd
            $maritalstatus=$_POST['maritalstatus'];
            $divorce_reason=$_POST['divorce_reason'];
            $how_widow=$_POST['how_widow'];
            $how_widower=$_POST['how_widower'];
            $how_many_son=$_POST['how_many_son'];
            $son_details=$_POST['son_details'];
            $get_wife_permission=$_POST['get_wife_permission'];
            $get_family_permission=$_POST['get_family_permission'];
            $why_again_married=$_POST['why_again_married'];
            //6bd Male Questions
            $allowstudy_aftermarriage=$_POST['allowstudy_aftermarriage'];
            $allowjob_aftermarriage=$_POST['allowjob_aftermarriage'];
            $livewife_aftermarriage=$_POST['livewife_aftermarriage'];
            //7bd Female Questions
            $anyjob_aftermarriage=$_POST['anyjob_aftermarriage'];
            $studies_aftermarriage=$_POST['studies_aftermarriage'];
            $agree_marriage_student=$_POST['agree_marriage_student'];
            $profileby=$_POST['profileby'];
            //Biodata 8
            $religion=$_POST['religion'];
            $yourreligion_condition=$_POST['yourreligion_condition'];
            //Biodata 9
            $partner_citizen=$_POST['partner_citizen'];
            $partner_district=$_POST['partner_district'];
            $partner_maritialstatus=$_POST['partner_maritialstatus'];
            $partner_age=$_POST['partner_age'];
            $partner_skintones=$_POST['partner_skintones'];
            $partner_height=$_POST['partner_height'];
            $partner_education=$_POST['partner_education'];
            $partner_profession=$_POST['partner_profession'];
            $partner_financial=$_POST['partner_financial'];
            $partner_attributes=$_POST['partner_attributes'];
            $parents_permission=$_POST['parents_permission'];
            $real_info_commited=$_POST['real_info_commited'];
            $authorities_no_responsible=$_POST['authorities_no_responsible'];
            require_once("includes/dbconn.php");
            $tables = [
                "1bd_personal_physical",
                "2bd_personal_lifestyle",
                "3bd_secondaryedu_method",
                "3bd_kowmi_madrasaedu_method",
                "3bd_higher_secondaryedu_method",
                "4bd_address_details",
                "5bd_family_information",
                "6bd_7bd_marital_status",
                "6bd_marriage_related_qs_male",
                "7bd_marriage_related_qs_female",
                "8bd_religion_details",
                "9bd_expected_life_partner",
            ];
            $exists = false; // Flag to track if the user ID exists in any table
            $errors = [];   // Array to store error messages
            foreach ($tables as $table) {
                $checkSql = "SELECT user_id FROM $table WHERE user_id = ?";
                $checkStmt = mysqli_prepare($conn, $checkSql);
                mysqli_stmt_bind_param($checkStmt, "s", $id);
                mysqli_stmt_execute($checkStmt);
                mysqli_stmt_store_result($checkStmt);
                if (mysqli_stmt_num_rows($checkStmt) > 0) {
                    // User ID already exists in at least one table
                    $exists = true;
                    $_SESSION['error_message'] = "সমস্যা দেখা দিয়েছে, অনুগ্রহ করে এডমিনের সাথে যোগাযোগ করুন।";
                    // Break the loop here, as there's no need to check for other tables
                    break;
                }
                mysqli_stmt_close($checkStmt);
            }
            if (!$exists) {
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --      Personal & Physical  / sb-biodata-1      --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
            $sql1 = "INSERT INTO 1bd_personal_physical (user_id, biodatagender, dateofbirth, height, weight, physicalstatus, Skin_tones, bloodgroup, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt1 = mysqli_prepare($conn, $sql1);
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --     Personal & Life Style  / sb-biodata-2     --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
            $sql2 = "INSERT INTO 2bd_personal_lifestyle (user_id, smoke, occupation_sector, no_occupation, other_occupation_sector, business_occupation_level, student_occupation_level, health_occupation_level, engineer_occupation_level, teacher_occupation_level, defense_occupation_level, shop_occupation_level, foreigner_occupation_level, garments_occupation_level, driver_occupation_level, service_andcommon_occupation_level, mistri_occupation_level, occupation_describe, dress_code, aboutme, groom_bride_name, groom_bride_number, groom_bride_family_number, family_member_name_relation, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt2 = mysqli_prepare($conn, $sql2);
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --  Educational Qualifications  / sb-biodata-3   --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --*/
            $sql31 = "INSERT INTO 3bd_secondaryedu_method (user_id, scndry_edu_method, gnrl_mdrs_secondary_pass, gnrl_mdrs_secondary_pass_year, gnrl_mdrs_secondary_end_year, gnrlmdrs_secondary_running_std, others_edu_qualification, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt31 = mysqli_prepare($conn, $sql31);
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --  Educational Qualifications  / sb-biodata-3   --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --*/
            $sql32 = "INSERT INTO 3bd_kowmi_madrasaedu_method (user_id, qawmi_madrasa_hafez, qawmimadrasa_dawrapass, kowmi_dawrapas_year, kowmi_current_edu_level, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt32 = mysqli_prepare($conn, $sql32);    
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --  Educational Qualifications  / sb-biodata-3   --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --*/
            $sql33 = "INSERT INTO 3bd_higher_secondaryedu_method (user_id, higher_secondary_edu_method, current_max_edu_subject, current_max_institute, current_max_pass_year, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt33 = mysqli_prepare($conn, $sql33);
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --       Address Details  /  sb-biodata-4        --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
            $sql4 = "INSERT INTO 4bd_address_details (user_id, permanent_division, home_district_under_barishal, home_district_under_chattogram, home_district_under_dhaka, home_district_under_khulna, home_district_under_mymensingh, home_district_under_rajshahi, home_district_under_rangpur, home_district_under_sylhet, country_present_address, present_address_location, present_address_living_purpose, childhood, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt4 = mysqli_prepare($conn, $sql4);
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --     Family Information  / sb-biodata-5        --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
            $sql5 = "INSERT INTO 5bd_family_information (user_id, family_major_guardian, father_name, father_alive, fatheroccupation, mother_alive, motheroccupation, brosis_number, brosis_info, uncle_profession, family_class, financial_condition, family_religious_condition, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt5 = mysqli_prepare($conn, $sql5);
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --  Marriage related Info /Marital Status 6 & 7  --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
            $sql61 = "INSERT INTO 6bd_7bd_marital_status (user_id, maritalstatus, divorce_reason, how_widow, how_widower, get_wife_permission, get_family_permission, why_again_married, how_many_son, son_details, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt61 = mysqli_prepare($conn, $sql61);
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --   Male Marriage related Info / sb-biodata-6   --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
            $sql62 = "INSERT INTO 6bd_marriage_related_qs_male (user_id, allowstudy_aftermarriage, allowjob_aftermarriage, livewife_aftermarriage, profileby, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt62 = mysqli_prepare($conn, $sql62);
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --  Female Marriage related Info / sb-biodata-7  --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
            $sql7 = "INSERT INTO 7bd_marriage_related_qs_female (user_id, anyjob_aftermarriage, studies_aftermarriage, agree_marriage_student, profileby, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt7 = mysqli_prepare($conn, $sql7);
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --        Religion Details / sb-biodata-8        --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
            $sql8 = "INSERT INTO 8bd_religion_details (user_id, religion, yourreligion_condition, profilecreationdate) 
            VALUES (?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt8 = mysqli_prepare($conn, $sql8);
            /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
            --     Expected Life Partner / sb-biodata-9      --
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
            $sql9 = "INSERT INTO 9bd_expected_life_partner (user_id, partner_citizen, partner_district, partner_maritialstatus, partner_age, partner_skintones, partner_height, partner_education, partner_profession, partner_financial, partner_attributes, parents_permission, real_info_commited, authorities_no_responsible, profilecreationdate) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            $stmt9 = mysqli_prepare($conn, $sql9);
            // Personal & Physical
            mysqli_stmt_bind_param($stmt1, "ssssssss", $id, $biodatagender, $dob, $height, $weight, $physicalstatus, $Skin_tones, $bloodgroup);
            // Personal & Life Style
            mysqli_stmt_bind_param($stmt2, "ssssssssssssssssssssssss", $id, $smoke, $occupation_sector, $no_occupation, $other_occupation_sector, $business_occupation_level, $student_occupation_level, $health_occupation_level, $engineer_occupation_level, $teacher_occupation_level, $defense_occupation_level, $shop_occupation_level, $foreigner_occupation_level, $garments_occupation_level, $driver_occupation_level, $service_andcommon_occupation_level, $mistri_occupation_level, $occupation_describe, $dress_code, $aboutme, $groom_bride_name, $groom_bride_number, $groom_bride_family_number, $family_member_name_relation);
            // Educational Qualifications (sb-biodata-3)
            mysqli_stmt_bind_param($stmt31, "sssssss", $id, $scndry_edu_method, $gnrl_mdrs_secondary_pass, $gnrl_mdrs_secondary_pass_year, $gnrl_mdrs_secondary_end_year, $gnrlmdrs_secondary_running_std, $others_edu_qualification);
            // Educational Qualifications (sb-biodata-3)
            mysqli_stmt_bind_param($stmt32, "sssss", $id, $qawmi_madrasa_hafez, $qawmimadrasa_dawrapass, $kowmi_dawrapas_year, $kowmi_current_edu_level);
            // Educational Qualifications (sb-biodata-3)
            mysqli_stmt_bind_param($stmt33, "sssss", $id, $higher_secondary_edu_method, $current_max_edu_subject, $current_max_institute, $current_max_pass_year);
            // Address Details (sb-biodata-4)
            mysqli_stmt_bind_param($stmt4, "ssssssssssssss", $id, $permanent_division, $home_district_under_barishal, $home_district_under_chattogram, $home_district_under_dhaka, $home_district_under_khulna, $home_district_under_mymensingh, $home_district_under_rajshahi, $home_district_under_rangpur, $home_district_under_sylhet, $country_present_address, $present_address_location, $present_address_living_purpose, $childhood);
            // Family Information (sb-biodata-5)
            mysqli_stmt_bind_param($stmt5, "sssssssssssss", $id, $family_major_guardian, $father_name, $father_alive, $fatheroccupation, $mother_alive, $motheroccupation, $brosis_number, $brosis_info, $uncle_profession, $family_class, $financial_condition, $family_religious_condition);
            // Marriage related Info/Marital Status 6 & 7
            mysqli_stmt_bind_param($stmt61, "ssssssssss", $id, $maritalstatus, $divorce_reason, $how_widow, $how_widower, $get_wife_permission, $get_family_permission, $why_again_married, $how_many_son, $son_details);
            // Male Marriage related Info (sb-biodata-6)
            mysqli_stmt_bind_param($stmt62, "sssss", $id, $allowstudy_aftermarriage, $allowjob_aftermarriage, $livewife_aftermarriage, $profileby);
            // Female Marriage related Info (sb-biodata-7)
            mysqli_stmt_bind_param($stmt7, "sssss", $id, $anyjob_aftermarriage, $studies_aftermarriage, $agree_marriage_student, $profileby);
            // Religion Details (sb-biodata-8)
            mysqli_stmt_bind_param($stmt8, "sss", $id, $religion, $yourreligion_condition);
            // Expected Life Partner (sb-biodata-9)
            mysqli_stmt_bind_param($stmt9, "ssssssssssssss", $id, $partner_citizen, $partner_district, $partner_maritialstatus, $partner_age, $partner_skintones, $partner_height, $partner_education, $partner_profession, $partner_financial, $partner_attributes, $parents_permission, $real_info_commited, $authorities_no_responsible);
            // Execute the statement
            if (
                mysqli_stmt_execute($stmt1) &&
                mysqli_stmt_execute($stmt2) &&
                mysqli_stmt_execute($stmt31) &&
                mysqli_stmt_execute($stmt32) &&
                mysqli_stmt_execute($stmt33) &&
                mysqli_stmt_execute($stmt4) &&
                mysqli_stmt_execute($stmt5) &&
                mysqli_stmt_execute($stmt61) &&
                mysqli_stmt_execute($stmt62) &&
                mysqli_stmt_execute($stmt7) &&
                mysqli_stmt_execute($stmt8) &&
                mysqli_stmt_execute($stmt9)
            ) {
                header("Location: profile.php?/Biodata={$id}");
            } else {
                $errors[] = "Something went wrong. Please contact the admin for assistance.";
            }
            }  
            // Display consolidated error message
            if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            }
        }
    }
    /*END - User Bio Data Save to Database*/
    /*START - 1bd_personal_physical 
    Male Marriage related Info / sb-biodata-6 
    User Bio Data Update to Database  */
    function physical_marital_update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Biodata 1
            $biodatagender=$_POST['biodatagender'];
            $day=$_POST['day'];
            $month=$_POST['month'];
            $year=$_POST['year'];
            $dob=$day ." ". $month . ", " .$year ;
            $height=$_POST['height'];
            $weight=$_POST['weight'];	
            $physicalstatus=$_POST['physicalstatus'];
            $Skin_tones = $_POST['Skin_tones'];
            $bloodgroup=$_POST['bloodgroup'];
            //Biodata 6bd_7bd
            $maritalstatus=$_POST['maritalstatus'];
            $divorce_reason=$_POST['divorce_reason'];
            $how_widow=$_POST['how_widow'];
            $how_widower=$_POST['how_widower'];
            $how_many_son=$_POST['how_many_son'];
            $son_details=$_POST['son_details'];
            $get_wife_permission=$_POST['get_wife_permission'];
            $get_family_permission=$_POST['get_family_permission'];
            $why_again_married=$_POST['why_again_married'];
            //6bd Male Questions
            $allowstudy_aftermarriage=$_POST['allowstudy_aftermarriage'];
            $allowjob_aftermarriage=$_POST['allowjob_aftermarriage'];
            $livewife_aftermarriage=$_POST['livewife_aftermarriage'];
            $profileby=$_POST['profileby'];
            //7bd Female Questions
            $anyjob_aftermarriage=$_POST['anyjob_aftermarriage'];
            $studies_aftermarriage=$_POST['studies_aftermarriage'];
            $agree_marriage_student=$_POST['agree_marriage_student'];
            require_once("includes/dbconn.php");
            // 1bd_personal_physical
            $sql = "SELECT user_id FROM 1bd_personal_physical WHERE user_id = $id";
            $result = mysqlexec($sql);
            if (mysqli_num_rows($result) >= 1) {
                // User exists, perform update
                $sql = "UPDATE 1bd_personal_physical SET 
                    biodatagender = '$biodatagender',
                    dateofbirth = '$dob',
                    height = '$height',
                    weight = '$weight',
                    physicalstatus = '$physicalstatus',
                    Skin_tones = '$Skin_tones',
                    bloodgroup = '$bloodgroup',
                    profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
                    WHERE user_id = '$id'";
            } else {
                // User doesn't exist, perform insert
                $sql = "INSERT INTO 1bd_personal_physical (user_id, biodatagender, dateofbirth, height, weight, physicalstatus, Skin_tones, bloodgroup, profilecreationdate)
                    VALUES ('$id', '$biodatagender', '$dob', '$height', '$weight', '$physicalstatus', '$Skin_tones', '$bloodgroup', DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            }
            $result = mysqlexec($sql);
            if ($result) {
                echo "";
            }
            $sql = "SELECT user_id FROM 6bd_7bd_marital_status WHERE user_id = $id";
            $result = mysqlexec($sql);
            if (mysqli_num_rows($result) >= 1) {
                // User exists, perform update
                $sql = "UPDATE 6bd_7bd_marital_status SET 
                maritalstatus = '$maritalstatus',
                divorce_reason = '$divorce_reason',
                how_widow = '$how_widow',
                how_widower = '$how_widower',
                get_wife_permission = '$get_wife_permission',
                get_family_permission = '$get_family_permission',
                why_again_married = '$why_again_married',
                how_many_son = '$how_many_son',
                son_details = '$son_details',
                profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
                WHERE user_id = '$id'";
            } else {
                // User doesn't exist, perform insert
                $sql = "INSERT INTO 6bd_7bd_marital_status (user_id, maritalstatus, divorce_reason, how_widow, how_widower, get_wife_permission, get_family_permission, why_again_married, how_many_son, son_details, profilecreationdate)
                    VALUES ('$id', '$maritalstatus', '$divorce_reason', '$how_widow', '$how_widower', '$get_wife_permission', '$get_family_permission', '$why_again_married', '$how_many_son', '$son_details', DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            }
            $result = mysqlexec($sql);
            if ($result) {
                echo "";
            }
            $sql = "SELECT user_id FROM 6bd_marriage_related_qs_male WHERE user_id = $id";
            $result = mysqlexec($sql);
            if (mysqli_num_rows($result) >= 1) {
                // User exists, perform update
                $sql = "UPDATE 6bd_marriage_related_qs_male SET 
                allowstudy_aftermarriage = '$allowstudy_aftermarriage',
                allowjob_aftermarriage = '$allowjob_aftermarriage',
                livewife_aftermarriage = '$livewife_aftermarriage',
                profileby = '$profileby',
                profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
                WHERE user_id = '$id'";
            } else {
                // User doesn't exist, perform insert
                $sql = "INSERT INTO 6bd_marriage_related_qs_male (user_id, allowstudy_aftermarriage, allowjob_aftermarriage, livewife_aftermarriage, profileby, profilecreationdate)
                VALUES ('$id', '$allowstudy_aftermarriage', '$allowjob_aftermarriage', '$livewife_aftermarriage', '$profileby', DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            }
            $result = mysqlexec($sql);
            if ($result) {
                echo "";
            }
            $sql = "SELECT user_id FROM 7bd_marriage_related_qs_female WHERE user_id = $id";
            $result = mysqlexec($sql);
            if (mysqli_num_rows($result) >= 1) {
                $sql = "UPDATE 7bd_marriage_related_qs_female SET 
                studies_aftermarriage = '$studies_aftermarriage',
                anyjob_aftermarriage = '$anyjob_aftermarriage',
                agree_marriage_student = '$agree_marriage_student',
                profileby = '$profileby',
                profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
                WHERE user_id = '$id'";
            } else {
                $sql = "INSERT INTO 7bd_marriage_related_qs_female (user_id, studies_aftermarriage, anyjob_aftermarriage, agree_marriage_student, profileby, profilecreationdate)
                VALUES ('$id', '$studies_aftermarriage', '$anyjob_aftermarriage', '$agree_marriage_student', '$profileby', DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
            }
            $result = mysqlexec($sql);
            session_start();
            if ($result) {
                $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা আপডেট সফল হয়েছে!';
                $_SESSION['messageType'] = 'success';
            } else {
                $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br> সমস্যা দেখা দিয়েছে!';
                $_SESSION['messageType'] = 'error';
            }
            header("Location: update-physical-marital.php");
            exit();
        }
    }
    /*END - 1bd_personal_physical 
    Male Marriage related Info / sb-biodata-6 
    User Bio Data Update to Database  */
    /*START - 2bd_personal_lifestyle 
    User Bio Data Update to Database  */
    function personal_info_update($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $smoke=$_POST['smoke'];
        $occupation_sector=$_POST['occupation_sector'];
        $no_occupation=$_POST['no_occupation'];
        $other_occupation_sector=$_POST['other_occupation_sector'];
        $business_occupation_level=$_POST['business_occupation_level'];
        $student_occupation_level=$_POST['student_occupation_level'];
        $health_occupation_level=$_POST['health_occupation_level'];
        $engineer_occupation_level=$_POST['engineer_occupation_level'];
        $teacher_occupation_level=$_POST['teacher_occupation_level'];
        $defense_occupation_level=$_POST['defense_occupation_level'];
		$shop_occupation_level=$_POST['shop_occupation_level'];
        $foreigner_occupation_level=$_POST['foreigner_occupation_level'];
        $garments_occupation_level=$_POST['garments_occupation_level'];
        $driver_occupation_level=$_POST['driver_occupation_level'];
        $service_andcommon_occupation_level=$_POST['service_andcommon_occupation_level'];
        $mistri_occupation_level=$_POST['mistri_occupation_level'];
        $occupation_describe=$_POST['occupation_describe'];
        $dress_code=$_POST['dress_code'];
        $aboutme=$_POST['aboutme'];
        $groom_bride_name=$_POST['groom_bride_name'];		
        $groom_bride_number=$_POST['groom_bride_number'];		
        $groom_bride_family_number=$_POST['groom_bride_family_number'];		
        $family_member_name_relation=$_POST['family_member_name_relation'];		
        require_once("includes/dbconn.php");
        $sql="SELECT user_id FROM 2bd_personal_lifestyle WHERE user_id=$id";
        $result=mysqlexec($sql);
        if(mysqli_num_rows($result)>=1){
        $sql = "UPDATE 2bd_personal_lifestyle SET 
            smoke = '$smoke',
            occupation_sector = '$occupation_sector',
            no_occupation = '$no_occupation',
            other_occupation_sector = '$other_occupation_sector',
            business_occupation_level = '$business_occupation_level',
            student_occupation_level = '$student_occupation_level',
            health_occupation_level = '$health_occupation_level',
            engineer_occupation_level = '$engineer_occupation_level',
            teacher_occupation_level = '$teacher_occupation_level',
            defense_occupation_level = '$defense_occupation_level',
			shop_occupation_level = '$shop_occupation_level',
            foreigner_occupation_level = '$foreigner_occupation_level',
            garments_occupation_level = '$garments_occupation_level',
            driver_occupation_level = '$driver_occupation_level',
            service_andcommon_occupation_level = '$service_andcommon_occupation_level',
            mistri_occupation_level = '$mistri_occupation_level',
            occupation_describe = '$occupation_describe',
            dress_code = '$dress_code',
            aboutme = '$aboutme',
            groom_bride_name = '$groom_bride_name',
            groom_bride_number = '$groom_bride_number',
            groom_bride_family_number = '$groom_bride_family_number',
            family_member_name_relation = '$family_member_name_relation',
            profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result) {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা আপডেট সফল হয়েছে!';
            $_SESSION['messageType'] = 'success';
            header("Location: update-personalInfo.php");
            exit();
        } else {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br> সমস্যা দেখা দিয়েছে!';
            $_SESSION['messageType'] = 'error';
            header("Location: update-personalInfo.php");
            exit();
        }
        }
        }
    }
    /*END - 2bd_personal_lifestyle 
    User Bio Data Update to Database  */
    /*START - Educational Qualifications  / sb-biodata-3
    User Bio Data Update to Database */
    function education_update($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       	//Biodata 3
        $qawmi_madrasa_hafez=$_POST['qawmi_madrasa_hafez'];
        $qawmimadrasa_dawrapass=$_POST['qawmimadrasa_dawrapass'];
        $kowmi_dawrapas_year=$_POST['kowmi_dawrapas_year'];
        $kowmi_current_edu_level=$_POST['kowmi_current_edu_level'];
        $scndry_edu_method=$_POST['scndry_edu_method'];
        $gnrl_mdrs_secondary_pass=$_POST['gnrl_mdrs_secondary_pass'];
        $gnrl_mdrs_secondary_pass_year=$_POST['gnrl_mdrs_secondary_pass_year'];
        $gnrl_mdrs_secondary_end_year=$_POST['gnrl_mdrs_secondary_end_year'];
        $gnrlmdrs_secondary_running_std=$_POST['gnrlmdrs_secondary_running_std'];
        $others_edu_qualification=$_POST['others_edu_qualification'];
        $higher_secondary_edu_method=$_POST['higher_secondary_edu_method'];
        $current_max_edu_subject=$_POST['current_max_edu_subject'];
        $current_max_institute=$_POST['current_max_institute'];
        $current_max_pass_year=$_POST['current_max_pass_year'];
        require_once("includes/dbconn.php");
        // Secondary Education
        $sql = "SELECT user_id FROM 3bd_secondaryedu_method WHERE user_id = $id";
        $result = mysqlexec($sql);
        if (mysqli_num_rows($result) >= 1) {
            // User exists, perform update
            $sql = "UPDATE 3bd_secondaryedu_method SET 
                scndry_edu_method = '$scndry_edu_method',
                gnrl_mdrs_secondary_pass = '$gnrl_mdrs_secondary_pass',
                gnrl_mdrs_secondary_pass_year = '$gnrl_mdrs_secondary_pass_year',
                gnrl_mdrs_secondary_end_year = '$gnrl_mdrs_secondary_end_year',
                gnrlmdrs_secondary_running_std = '$gnrlmdrs_secondary_running_std',
                others_edu_qualification = '$others_edu_qualification',
                profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
                WHERE user_id = '$id'";
        } else {
            // User doesn't exist, perform insert
            $sql = "INSERT INTO 3bd_secondaryedu_method (user_id, scndry_edu_method, gnrl_mdrs_secondary_pass, gnrl_mdrs_secondary_pass_year, gnrl_mdrs_secondary_end_year, gnrlmdrs_secondary_running_std, others_edu_qualification, profilecreationdate)
                VALUES ('$id', '$scndry_edu_method', '$gnrl_mdrs_secondary_pass', '$gnrl_mdrs_secondary_pass_year', '$gnrl_mdrs_secondary_end_year', '$gnrlmdrs_secondary_running_std', '$others_edu_qualification', DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
        }
        $result = mysqlexec($sql);
        if ($result) {
            echo "";
        }
        // Kowmi Madrasa Education
        $sql = "SELECT user_id FROM 3bd_kowmi_madrasaedu_method WHERE user_id = $id";
        $result = mysqlexec($sql);
        if (mysqli_num_rows($result) >= 1) {
            // User exists, perform update
            $sql = "UPDATE 3bd_kowmi_madrasaedu_method SET 
                qawmi_madrasa_hafez = '$qawmi_madrasa_hafez',
                qawmimadrasa_dawrapass = '$qawmimadrasa_dawrapass',
                kowmi_dawrapas_year = '$kowmi_dawrapas_year',
                kowmi_current_edu_level = '$kowmi_current_edu_level',
                profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
                WHERE user_id = '$id'";
        } else {
            // User doesn't exist, perform insert
            $sql = "INSERT INTO 3bd_kowmi_madrasaedu_method (user_id, qawmi_madrasa_hafez, qawmimadrasa_dawrapass, kowmi_dawrapas_year, kowmi_current_edu_level, profilecreationdate)
                VALUES ('$id', '$qawmi_madrasa_hafez', '$qawmimadrasa_dawrapass', '$kowmi_dawrapas_year', '$kowmi_current_edu_level', DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
        }
        $result = mysqlexec($sql);
        if ($result) {
            echo "";
        }
        // Higher Secondary Education
        $sql = "SELECT user_id FROM 3bd_higher_secondaryedu_method WHERE user_id = $id";
        $result = mysqlexec($sql);
        if (mysqli_num_rows($result) >= 1) {
            // User exists, perform update
            $sql = "UPDATE 3bd_higher_secondaryedu_method SET 
                higher_secondary_edu_method = '$higher_secondary_edu_method',
                current_max_edu_subject = '$current_max_edu_subject',
                current_max_institute = '$current_max_institute',
                current_max_pass_year = '$current_max_pass_year',
                profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
                WHERE user_id = '$id'";
        } else {
            // User doesn't exist, perform insert
            $sql = "INSERT INTO 3bd_higher_secondaryedu_method (user_id, higher_secondary_edu_method, current_max_edu_subject, current_max_institute, current_max_pass_year, profilecreationdate)
                VALUES ('$id', '$higher_secondary_edu_method', '$current_max_edu_subject', '$current_max_institute', '$current_max_pass_year', DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
        }
        $result = mysqlexec($sql);
        session_start();
        if ($result) {
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা আপডেট সফল হয়েছে!';
            $_SESSION['messageType'] = 'success';
        } else {
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>সমস্যা দেখা দিয়েছে!';
            $_SESSION['messageType'] = 'error';
        }
        header("Location: update-education.php");
        exit();        
        }
    }
    /*END - Educational Qualifications  / sb-biodata-3
    User Bio Data Update to Database */
    /*START - 4bd_address_details 
    User Bio Data Update to Database */
    function address_update($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	//Biodata 4
        $permanent_division=$_POST['permanent_division'];
        $home_district_under_barishal=$_POST['home_district_under_barishal'];
        $home_district_under_chattogram=$_POST['home_district_under_chattogram'];
        $home_district_under_dhaka=$_POST['home_district_under_dhaka'];
        $home_district_under_khulna=$_POST['home_district_under_khulna'];
        $home_district_under_mymensingh=$_POST['home_district_under_mymensingh'];
        $home_district_under_rajshahi=$_POST['home_district_under_rajshahi'];
        $home_district_under_rangpur=$_POST['home_district_under_rangpur'];
        $home_district_under_sylhet=$_POST['home_district_under_sylhet'];
        $country_present_address=$_POST['country_present_address'];
        $present_address_location=$_POST['present_address_location'];
        $present_address_living_purpose=$_POST['present_address_living_purpose'];
        $childhood=$_POST['childhood'];
        require_once("includes/dbconn.php");
        $sql="SELECT user_id FROM 4bd_address_details WHERE user_id=$id";
        $result=mysqlexec($sql);
        if(mysqli_num_rows($result)>=1){
        $sql = "UPDATE 4bd_address_details SET 
            permanent_division = '$permanent_division',
            home_district_under_barishal = '$home_district_under_barishal',
            home_district_under_chattogram = '$home_district_under_chattogram',
            home_district_under_dhaka = '$home_district_under_dhaka',
            home_district_under_khulna = '$home_district_under_khulna',
            home_district_under_mymensingh = '$home_district_under_mymensingh',
            home_district_under_rajshahi = '$home_district_under_rajshahi',
            home_district_under_rangpur = '$home_district_under_rangpur',
            home_district_under_sylhet = '$home_district_under_sylhet',
            country_present_address = '$country_present_address',
            present_address_location = '$present_address_location',
            present_address_living_purpose = '$present_address_living_purpose',
            childhood = '$childhood',
            profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result) {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা আপডেট সফল হয়েছে!';
            $_SESSION['messageType'] = 'success';
            header("Location: update-address.php");
            exit();
        } else {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br> সমস্যা দেখা দিয়েছে!';
            $_SESSION['messageType'] = 'error';
            header("Location: update-address.php");
            exit();
        }
        }
        }
    }
    /*END - 4bd_address_details 
    User Bio Data Update to Database */
    /*START - 5bd_family_information 
    User Bio Data Update to Database */
    function family_update($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Biodata 5
        $family_major_guardian=$_POST['family_major_guardian'];
        $father_name=$_POST['father_name'];
        $father_alive=$_POST['father_alive'];
        $fatheroccupation=$_POST['fatheroccupation'];
        $mother_alive=$_POST['mother_alive'];
        $motheroccupation=$_POST['motheroccupation'];
        $brosis_number=$_POST['brosis_number'];
        $brosis_info=$_POST['brosis_info'];
        $uncle_profession=$_POST['uncle_profession'];
        $family_class=$_POST['family_class'];
        $financial_condition=$_POST['financial_condition'];
        $family_religious_condition=$_POST['family_religious_condition'];
        require_once("includes/dbconn.php");
        $sql="SELECT user_id FROM 5bd_family_information WHERE user_id=$id";
        $result=mysqlexec($sql);
        if(mysqli_num_rows($result)>=1){
        $sql = "UPDATE 5bd_family_information SET 
            family_major_guardian = '$family_major_guardian',
            father_name = '$father_name',
            father_alive = '$father_alive',
            fatheroccupation = '$fatheroccupation',
            mother_alive = '$mother_alive',
            motheroccupation = '$motheroccupation',
            brosis_number = '$brosis_number',
            brosis_info = '$brosis_info',
            uncle_profession = '$uncle_profession',
            family_class = '$family_class',
            financial_condition = '$financial_condition',
            family_religious_condition = '$family_religious_condition',
            profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result) {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা আপডেট সফল হয়েছে!';
            $_SESSION['messageType'] = 'success';
            header("Location: update-family.php");
            exit();
        } else {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>সমস্যা দেখা দিয়েছে!';
            $_SESSION['messageType'] = 'error';
            header("Location: update-family.php");
            exit();
        }
        }
        }
    }
    /*END - 5bd_family_information 
    User Bio Data Update to Database */
    /*START - 8bd_religion_details
    User Bio Data Update to Database */
    function religion_update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Biodata 8
            $religion = $_POST['religion'];
            $yourreligion_condition = $_POST['yourreligion_condition'];
            require_once("includes/dbconn.php");
            $sql = "SELECT user_id FROM 8bd_religion_details WHERE user_id = $id";
            $result = mysqlexec($sql);
            if (mysqli_num_rows($result) >= 1) {
                $sql = "UPDATE 8bd_religion_details SET 
                    religion = '$religion',
                    yourreligion_condition = '$yourreligion_condition',
                    profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
                WHERE user_id = '$id'";
                $result = mysqlexec($sql);
                if ($result) {
                    session_start();
                    $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা আপডেট সফল হয়েছে!';
                    $_SESSION['messageType'] = 'success';
                    header("Location: update-religion.php");
                    exit();
                } else {
                    session_start();
                    $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>সমস্যা দেখা দিয়েছে!';
                    $_SESSION['messageType'] = 'error';
                    header("Location: update-religion.php");
                    exit();
                }
            }
        }
    }
    /*END - 8bd_religion_details
    User Bio Data Update to Database */
    /*START - 9bd_expected_life_partner
    User Bio Data Update to Database */
    function partner_update($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      	//Biodata 9
        $partner_citizen=$_POST['partner_citizen'];
        $partner_district=$_POST['partner_district'];
        $partner_maritialstatus=$_POST['partner_maritialstatus'];
        $partner_age=$_POST['partner_age'];
        $partner_skintones=$_POST['partner_skintones'];
        $partner_height=$_POST['partner_height'];
        $partner_education=$_POST['partner_education'];
        $partner_profession=$_POST['partner_profession'];
        $partner_financial=$_POST['partner_financial'];
        $partner_attributes=$_POST['partner_attributes'];
        $parents_permission=$_POST['parents_permission'];
        $real_info_commited=$_POST['real_info_commited'];
        $authorities_no_responsible=$_POST['authorities_no_responsible'];
        require_once("includes/dbconn.php");
        $sql="SELECT user_id FROM 9bd_expected_life_partner WHERE user_id=$id";
        $result=mysqlexec($sql);
        if(mysqli_num_rows($result)>=1){
        $sql = "UPDATE 9bd_expected_life_partner SET 
            partner_citizen = '$partner_citizen',
            partner_district = '$partner_district',
            partner_maritialstatus = '$partner_maritialstatus',
            partner_age = '$partner_age',
            partner_skintones = '$partner_skintones',
            partner_height = '$partner_height',
            partner_education = '$partner_education',
            partner_profession = '$partner_profession',
            partner_financial = '$partner_financial',
            partner_attributes = '$partner_attributes',
            parents_permission = '$parents_permission',
            real_info_commited = '$real_info_commited',
            authorities_no_responsible = '$authorities_no_responsible',
            profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result) {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা আপডেট সফল হয়েছে!';
            $_SESSION['messageType'] = 'success';
            header("Location: update-partnerInfo.php");
            exit();
        } else {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>সমস্যা দেখা দিয়েছে!';
            $_SESSION['messageType'] = 'error';
            header("Location: update-partnerInfo.php");
            exit();
        }
        }
        }
    }
    /*END - 9bd_expected_life_partner
    User Bio Data Update to Database */
    /*START - Function For Upload Photo */
    function uploadphoto($id) {
    $target = "profile/" . $id . "/";
    if (!file_exists($target)) {
        mkdir($target, 0777, true);
    }
    // Specifying target for each file
    $target1 = $target . basename($_FILES['pic1']['name']);
    // This gets all the other information from the form
    $pic1 = ($_FILES['pic1']['name']);
    $sql = "SELECT id FROM photos WHERE user_id = '$id'";
    $result = mysqlexec($sql);
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO photos (user_id, pic1, profilecreationdate) VALUES ('$id', '$pic1', DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p'))";
        mysqlexec($sql);
    } else {
        $sql = "UPDATE photos SET pic1 = '$pic1', profilecreationdate = DATE_FORMAT(NOW(), '%a %d %M %Y, %h:%i %p')  WHERE user_id = '$id'";
        mysqlexec($sql);
    }
    // Writes the photo to the server
    if (move_uploaded_file($_FILES['pic1']['tmp_name'], $target1)) {
        // Thanks!
        echo "";
    } else {
        // Sorry,
        echo "";
    }
    }
    /*END - Function For Upload Photo */
?>
