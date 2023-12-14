<?php


function post_biodata($id){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Biodata 1
        $biodatagender=$_POST['biodatagender'];
        $day=$_POST['day'];
        $month=$_POST['month'];
        $year=$_POST['year'];
        $dob=$day ." ". $month . "," .$year ;
        $height=$_POST['height'];
        $weight=$_POST['weight'];
        $physicalstatus=$_POST['physicalstatus'];
        $Skin_tones = $_POST['Skin_tones'];
        $bloodgroup=$_POST['bloodgroup'];


        //Biodata 2
        $smoke=$_POST['smoke'];
        $occupation_sector=$_POST['occupation_sector'];
        $other_occupation_sector=$_POST['other_occupation_sector'];
        $business_occupation_level=$_POST['business_occupation_level'];
        $student_occupation_level=$_POST['student_occupation_level'];
        $health_occupation_level=$_POST['health_occupation_level'];
        $engineer_occupation_level=$_POST['engineer_occupation_level'];
        $teacher_occupation_level=$_POST['teacher_occupation_level'];
        $defense_occupation_level=$_POST['defense_occupation_level'];
        $foreigner_occupation_level=$_POST['foreigner_occupation_level'];
        $garments_occupation_level=$_POST['garments_occupation_level'];
        $driver_occupation_level=$_POST['driver_occupation_level'];
        $service_andcommon_occupation_level=$_POST['service_andcommon_occupation_level'];
            $mistri_occupation_level=$_POST['mistri_occupation_level'];
            $occupation_describe=$_POST['occupation_describe'];
            $dress_code=$_POST['dress_code'];
            $aboutme=$_POST['aboutme'];
            $groom_bride_name=$_POST['groom_bride_name'];
            $groom_bride_email=$_POST['groom_bride_email'];
            $groom_bride_number=$_POST['groom_bride_number'];
            $groom_bride_family_number=$_POST['groom_bride_family_number'];
            $family_member_name_relation=$_POST['family_member_name_relation'];


        //Biodata 31 / 32 / 33 / 34
        $scndry_edu_method=$_POST['scndry_edu_method'];
        $maxedu_qulfctn=$_POST['maxedu_qulfctn'];

        $qawmi_madrasa_hafez=$_POST['qawmi_madrasa_hafez'];
        $qawmimadrasa_dawrapass=$_POST['qawmimadrasa_dawrapass'];
        $kowmi_dawrapas_year=$_POST['kowmi_dawrapas_year'];
        $kowmi_current_edu_level=$_POST['kowmi_current_edu_level'];

        $gnrl_mdrs_secondary_pass=$_POST['gnrl_mdrs_secondary_pass'];
        $gnrl_mdrs_secondary_pass_year=$_POST['gnrl_mdrs_secondary_pass_year'];
        $gnrl_mdrs_secondary_end_year=$_POST['gnrl_mdrs_secondary_end_year'];
        $gnrlmdrs_secondary_running_std=$_POST['gnrlmdrs_secondary_running_std'];

        $higher_secondary_edu_method=$_POST['higher_secondary_edu_method'];
        $gnrlmdrs_hrsecondary_pass=$_POST['gnrlmdrs_hrsecondary_pass'];
        $gnrlmdrs_hrsecondary_pass_year=$_POST['gnrlmdrs_hrsecondary_pass_year'];
        $gnrlmdrs_hrsecondary_exam_year=$_POST['gnrlmdrs_hrsecondary_exam_year'];
        $gnrlmdrs_hrsecondary_group=$_POST['gnrlmdrs_hrsecondary_group'];
        $gnrlmdrs_hrsecondary_rningstd=$_POST['gnrlmdrs_hrsecondary_rningstd'];
        $diploma_hrsecondary_pass=$_POST['diploma_hrsecondary_pass'];
        $diploma_hrsecondary_pass_year=$_POST['diploma_hrsecondary_pass_year'];
        $diploma_hrsecondary_sub=$_POST['diploma_hrsecondary_sub'];
        $diploma_hrsecondary_endingyear=$_POST['diploma_hrsecondary_endingyear'];

        $varsity_edu_method=$_POST['varsity_edu_method'];
        $uvarsity_pass=$_POST['uvarsity_pass'];
        $varsity_passing_year=$_POST['varsity_passing_year'];
        $university_subject=$_POST['university_subject'];
        $varsity_ending_year=$_POST['varsity_ending_year'];
        $uvarsity_name=$_POST['uvarsity_name'];
        $others_edu_qualification=$_POST['others_edu_qualification'];


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
        $childhood=$_POST['childhood'];


        //Biodata 5
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


        //Biodata 61 / 62
        $maritalstatus=$_POST['maritalstatus'];
        // Divorce
        $divorce_reason=$_POST['divorce_reason'];
        // Widow
        $how_widow=$_POST['how_widow'];
        // Widower
        $how_widower=$_POST['how_widower'];
        // Married
        $get_wife_permission=$_POST['get_wife_permission'];
        $get_family_permission=$_POST['get_family_permission'];
        $why_again_married=$_POST['why_again_married'];

        $how_many_son=$_POST['how_many_son'];
        $son_details=$_POST['son_details'];

        $allowstudy_aftermarriage=$_POST['allowstudy_aftermarriage'];
        $allowjob_aftermarriage=$_POST['allowjob_aftermarriage'];
        $livewife_aftermarriage=$_POST['livewife_aftermarriage'];
        $profileby=$_POST['profileby'];


        //Biodata 7
        $anyjob_aftermarriage=$_POST['anyjob_aftermarriage'];
        $studies_aftermarriage=$_POST['studies_aftermarriage'];
        $agree_marriage_student=$_POST['agree_marriage_student'];
        $profileby=$_POST['profileby'];


        //Biodata 8
        $religion=$_POST['religion'];
        $yourreligion_condition=$_POST['yourreligion_condition'];


        //Biodata 9
        $partner_religius=$_POST['partner_religius'];
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


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --      Personal & Physical  / sb-biodata-1      --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
        $sql1 = "INSERT INTO 1bd_personal_physical (user_id, biodatagender, dateofbirth, height, weight, physicalstatus, Skin_tones, bloodgroup, profilecreationdate)
        VALUES ('$id', '$biodatagender', '$dob', '$height', '$weight', '$physicalstatus', '$Skin_tones', '$bloodgroup', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --     Personal & Life Style  / sb-biodata-2     --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
        $sql2 = "INSERT INTO 2bd_personal_lifestyle (user_id, smoke, occupation_sector, other_occupation_sector, business_occupation_level, student_occupation_level, health_occupation_level, engineer_occupation_level, teacher_occupation_level, defense_occupation_level, foreigner_occupation_level, garments_occupation_level, driver_occupation_level, service_andcommon_occupation_level, mistri_occupation_level, occupation_describe, dress_code, aboutme, groom_bride_name, groom_bride_email, groom_bride_number, groom_bride_family_number, family_member_name_relation, profilecreationdate)
        VALUES ('$id', '$smoke', '$occupation_sector', '$other_occupation_sector', '$business_occupation_level', '$student_occupation_level', '$health_occupation_level', '$engineer_occupation_level', '$teacher_occupation_level', '$defense_occupation_level', '$foreigner_occupation_level', '$garments_occupation_level', '$driver_occupation_level', '$service_andcommon_occupation_level', '$mistri_occupation_level', '$occupation_describe', '$dress_code', '$aboutme', '$groom_bride_name', '$groom_bride_email', '$groom_bride_number', '$groom_bride_family_number', '$family_member_name_relation', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --  Educational Qualifications  / sb-biodata-3   --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --*/
        $sql31 = "INSERT INTO 3bd_secondaryedu_method (user_id, scndry_edu_method, maxedu_qulfctn, gnrl_mdrs_secondary_pass, gnrl_mdrs_secondary_pass_year, gnrl_mdrs_secondary_end_year, gnrlmdrs_secondary_running_std, profilecreationdate)
        VALUES ('$id', '$scndry_edu_method', '$maxedu_qulfctn', '$gnrl_mdrs_secondary_pass', '$gnrl_mdrs_secondary_pass_year', '$gnrl_mdrs_secondary_end_year', '$gnrlmdrs_secondary_running_std', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --  Educational Qualifications  / sb-biodata-3   --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --*/
        $sql32 = "INSERT INTO 3bd_kowmi_madrasaedu_method (user_id, qawmi_madrasa_hafez, qawmimadrasa_dawrapass, kowmi_dawrapas_year, kowmi_current_edu_level, profilecreationdate)
        VALUES ('$id', '$qawmi_madrasa_hafez', '$qawmimadrasa_dawrapass', '$kowmi_dawrapas_year', '$kowmi_current_edu_level', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --  Educational Qualifications  / sb-biodata-3   --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --*/
        $sql33 = "INSERT INTO 3bd_higher_secondaryedu_method (user_id, higher_secondary_edu_method, gnrlmdrs_hrsecondary_pass, gnrlmdrs_hrsecondary_pass_year, gnrlmdrs_hrsecondary_exam_year, gnrlmdrs_hrsecondary_group, gnrlmdrs_hrsecondary_rningstd, diploma_hrsecondary_pass, diploma_hrsecondary_pass_year, diploma_hrsecondary_sub, diploma_hrsecondary_endingyear, profilecreationdate)
        VALUES ('$id', '$higher_secondary_edu_method', '$gnrlmdrs_hrsecondary_pass', '$gnrlmdrs_hrsecondary_pass_year', '$gnrlmdrs_hrsecondary_exam_year', '$gnrlmdrs_hrsecondary_group', '$gnrlmdrs_hrsecondary_rningstd', '$diploma_hrsecondary_pass', '$diploma_hrsecondary_pass_year', '$diploma_hrsecondary_sub', '$diploma_hrsecondary_endingyear', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --  Educational Qualifications  / sb-biodata-3   --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --*/
        $sql34 = "INSERT INTO 3bd_universityedu_method (user_id, varsity_edu_method, uvarsity_pass, varsity_passing_year, university_subject, varsity_ending_year, uvarsity_name, others_edu_qualification, profilecreationdate)
        VALUES ('$id', '$varsity_edu_method', '$uvarsity_pass', '$varsity_passing_year', '$university_subject', '$varsity_ending_year', '$uvarsity_name', '$others_edu_qualification', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --       Address Details  /  sb-biodata-4        --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
        $sql4 = "INSERT INTO 4bd_address_details (user_id, permanent_division, home_district_under_barishal, home_district_under_chattogram, home_district_under_dhaka, home_district_under_khulna, home_district_under_mymensingh, home_district_under_rajshahi, home_district_under_rangpur, home_district_under_sylhet, country_present_address, present_address_location, childhood, profilecreationdate)
        VALUES ('$id', '$permanent_division', '$home_district_under_barishal', '$home_district_under_chattogram', '$home_district_under_dhaka', '$home_district_under_khulna', '$home_district_under_mymensingh', '$home_district_under_rajshahi', '$home_district_under_rangpur', '$home_district_under_sylhet', '$country_present_address', '$present_address_location', '$childhood', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --     Family Information  / sb-biodata-5        --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
        $sql5 = "INSERT INTO 5bd_family_information (user_id, father_name, father_alive, fatheroccupation, mother_alive, motheroccupation, brosis_number, brosis_info, uncle_profession, family_class, financial_condition, family_religious_condition, profilecreationdate)
        VALUES ('$id', '$father_name', '$father_alive', '$fatheroccupation', '$mother_alive', '$motheroccupation', '$brosis_number', '$brosis_info', '$uncle_profession', '$family_class', '$financial_condition', '$family_religious_condition', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --  Marriage related Info /Marital Status 6 & 7  --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
        $sql61 = "INSERT INTO 6bd_7bd_marital_status (user_id, maritalstatus, divorce_reason, how_widow, how_widower, get_wife_permission, get_family_permission, why_again_married, how_many_son, son_details, profilecreationdate)
        VALUES ('$id', '$maritalstatus', '$divorce_reason', '$how_widow', '$how_widower', '$get_wife_permission', '$get_family_permission', '$why_again_married', '$how_many_son', '$son_details', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --   Male Marriage related Info / sb-biodata-6   --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
        $sql62 = "INSERT INTO 6bd_marriage_related_qs_male (user_id, allowstudy_aftermarriage, allowjob_aftermarriage, livewife_aftermarriage, profileby, profilecreationdate)
        VALUES ('$id', '$allowstudy_aftermarriage', '$allowjob_aftermarriage', '$livewife_aftermarriage', '$profileby', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --  Female Marriage related Info / sb-biodata-7  --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
        $sql7 = "INSERT INTO 7bd_marriage_related_qs_female (user_id, anyjob_aftermarriage, studies_aftermarriage, agree_marriage_student, profileby, profilecreationdate)
        VALUES ('$id', '$anyjob_aftermarriage', '$studies_aftermarriage', '$agree_marriage_student', '$profileby', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --        Religion Details / sb-biodata-8        --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
        $sql8 = "INSERT INTO 8bd_religion_details (user_id, religion, yourreligion_condition, profilecreationdate)
        VALUES ('$id', '$religion', '$yourreligion_condition', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";


        /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
        --     Expected Life Partner / sb-biodata-9      --
        -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
        // $sql9 = "INSERT INTO 9bd_expected_life_partner (user_id, partner_religius, partner_citizen, partner_district, partner_maritialstatus, partner_age, partner_skintones, partner_height, partner_education, partner_profession, partner_financial, partner_attributes, parents_permission, real_info_commited, authorities_no_responsible, profilecreationdate)
        // VALUES ('$id', '$partner_religius', '$partner_citizen', '$partner_district', '$partner_maritialstatus', '$partner_age', '$partner_skintones', '$partner_height', '$partner_education', '$partner_profession', '$partner_financial', '$partner_attributes', '$parents_permission', '$real_info_commited', '$authorities_no_responsible', '$profileCreationDate')";


        // // Execute the queries
        // if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql31) && mysqli_query($conn, $sql32) && mysqli_query($conn, $sql33) && mysqli_query($conn, $sql34) && mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5) && mysqli_query($conn, $sql61) && mysqli_query($conn, $sql62) && mysqli_query($conn, $sql7) && mysqli_query($conn, $sql8) && mysqli_query($conn, $sql9)) {
        //     echo "Thanks! Successfully Uploaded New Biodata!";
        //     header("Location: view_profile.php?id={$id}");
        // } else {
        //     echo "Error: " . mysqli_error($conn);
        // }

        // // Close the MySQL connection
        // mysqli_close($conn);


        $sql9 = "INSERT INTO 9bd_expected_life_partner (user_id, partner_religius, partner_citizen, partner_district, partner_maritialstatus, partner_age, partner_skintones, partner_height, partner_education, partner_profession, partner_financial, partner_attributes, parents_permission, real_info_commited, authorities_no_responsible, profilecreationdate)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";

        $stmt9 = mysqli_prepare($conn, $sql9);

        // Bind parameters
        mysqli_stmt_bind_param($stmt9, "ssssssssssssssss", $id, $partner_religius, $partner_citizen, $partner_district, $partner_maritialstatus, $partner_age, $partner_skintones, $partner_height, $partner_education, $partner_profession, $partner_financial, $partner_attributes, $parents_permission, $real_info_commited, $authorities_no_responsible);

        // Execute the statement
        if (mysqli_stmt_execute($stmt9)) {
            echo "Thanks! Successfully Uploaded New Biodata!";
            header("Location: view_profile.php?id={$id}");
        } else {
            echo "Error: " . mysqli_stmt_error($stmt9);
        }

        // Close the statement
        mysqli_stmt_close($stmt9);

    }
}




function biodata_sale_customer() {
    require_once("includes/dbconn.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cust_name = $_POST['cust_name'];
        $cust_email = $_POST['cust_email'];
        $cust_number = $_POST['cust_number'];
        $cust_permanent_address = $_POST['cust_permanent_address'];
        $request_biodata_number = $_POST['request_biodata_number'];
        // $biodata_quantities = $_POST['biodata_quantities'];

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

        // Check if the user is logged in using your existing authentication logic
        if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
        } else {
            $user_id = 0; // Default value for non-logged-in users
        }

        // Insert customer data into the database
        $sql = "INSERT INTO customer (user_id, cust_name, cust_email, cust_number, cust_permanent_address, request_biodata_number, biodata_quantities, total_fee, payment_method, bkash_number, bkash_transaction_id, nagad_number, nagad_transaction_id, roket_number, roket_transaction_id, request_date)
                VALUES ('$user_id', '$cust_name', '$cust_email', '$cust_number', '$cust_permanent_address', '$request_biodata_number', '$idCount', '$fee', '$payment_method', '$bkash_number', '$bkash_transaction_id', '$nagad_number', '$nagad_transaction_id', '$roket_number', '$roket_transaction_id', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";

        if (mysqli_query($conn, $sql)) {
            // SMTP email sending code
            $to = $cust_email;
            $subject = "Your Transaction is Successfully Completed!";

            ob_start();
            include('PaymentEmailBody.php'); // Update with the actual file name
            $email_body = ob_get_clean();

            // Plain text version of the email body
            $plain_text_message = "
            Your Order is Processing! Order Details.

            আপনাকে ধন্যবাদ! আপনার পেমেন্ট তথ্য যাচাই বাছাইয়ের পর SMS বা ই-মেইলের মাধ্যমে ২৪ ঘন্টার মধ্যে অভিভাবকের মোবাইল নাম্বার প্রদান করা হবে।
            Order ID: SB$id_customer
            Name: $cust_name
            Email: $cust_email
            Mobile Number: $cust_number
            Address: $cust_permanent_address
            Request Biodata: $request_biodata_number
            Total Fee: $fee
            Payment Method: $payment_method
            Payment Number: $bkash_number || $nagad_number || $roket_number
            Transaction: $bkash_transaction_id || $nagad_transaction_id || $roket_transaction_id
            Date: $request_date


            বি:দ্র: ব্যক্তিগত কোনো কারণে অভিভাবক অনুমতি না দিলে যোগাযোগের তথ্য প্রদান না করে টাকা ফেরত দেয়া হবে।

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
            $mail->AltBody = $plain_text_message; // Plain text version of the email

            if ($mail->send()) {
                echo '';
            } else {
                echo '';
            }

            // header("location: index.php");
        } else {
            echo "Error";
        }
    }
}













function biodata_sale_customermain() {
    require_once("includes/dbconn.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cust_name = $_POST['cust_name'];
        $cust_email = $_POST['cust_email'];
        $cust_number = $_POST['cust_number'];
        $cust_permanent_address = $_POST['cust_permanent_address'];
        $request_biodata_number = $_POST['request_biodata_number'];
        // $biodata_quantities = $_POST['biodata_quantities'];

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

        // Check if the user is logged in using your existing authentication logic
        if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
        } else {
            $user_id = 0; // Default value for non-logged-in users
        }

        // Insert customer data into the database
        $sql = "INSERT INTO customer (user_id, cust_name, cust_email, cust_number, cust_permanent_address, request_biodata_number, biodata_quantities, total_fee, payment_method, bkash_number, bkash_transaction_id, nagad_number, nagad_transaction_id, roket_number, roket_transaction_id, request_date)
                VALUES ('$user_id', '$cust_name', '$cust_email', '$cust_number', '$cust_permanent_address', '$request_biodata_number', '$idCount', '$fee', '$payment_method', '$bkash_number', '$bkash_transaction_id', '$nagad_number', '$nagad_transaction_id', '$roket_number', '$roket_transaction_id', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";

        if (mysqli_query($conn, $sql)) {
            // header("location: index.php");
        } else {
            echo "Error";
        }
    }
}

?>