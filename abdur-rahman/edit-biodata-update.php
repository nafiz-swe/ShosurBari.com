<?php

    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                 S  T  A  R  T                 --
    --             1bd_personal_physical             --
    --   Male Marriage related Info / sb-biodata-6   --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function physical_marital_update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Biodata 1 
        $biodatagender=$_POST['biodatagender'];
        $day=$_POST['day'];
        $month=$_POST['month'];
        $year=$_POST['year'];
        $dob=$day ."-" . $month . "-" .$year ;
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
        $agree_marriage_other_religion=$_POST['agree_marriage_other_religion'];
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
        $id = $_GET['id'];
        // 1bd_personal_physical
        $sql="SELECT user_id FROM 1bd_personal_physical WHERE user_id=$id";
        $result=mysqlexec($sql);
        if(mysqli_num_rows($result)>=1){
        $sql = "UPDATE 1bd_personal_physical SET 
            biodatagender = '$biodatagender',
            dateofbirth = '$dob',
            height = '$height',
            weight = '$weight',
            physicalstatus = '$physicalstatus',
            Skin_tones = '$Skin_tones',
            bloodgroup = '$bloodgroup',
            profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result)
        {    echo "";}
        }
        $sql="SELECT user_id FROM 6bd_7bd_marital_status WHERE user_id=$id";
        $result=mysqlexec($sql);
        if(mysqli_num_rows($result)>=1){
        $sql = "UPDATE 6bd_7bd_marital_status SET 
            maritalstatus = '$maritalstatus',
            divorce_reason = '$divorce_reason',
            how_widow = '$how_widow',
            how_widower = '$how_widower',
            get_wife_permission = '$get_wife_permission',
            get_family_permission = '$get_family_permission',
            why_again_married = '$why_again_married',
            agree_marriage_other_religion = '$agree_marriage_other_religion',
            how_many_son = '$how_many_son',
            son_details = '$son_details',
            profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result)
        {    echo "";}
        }
        $sql="SELECT user_id FROM 6bd_marriage_related_qs_male WHERE user_id=$id";
        $result=mysqlexec($sql);
        if(mysqli_num_rows($result)>=1){
        $sql = "UPDATE 6bd_marriage_related_qs_male SET 
            allowstudy_aftermarriage = '$allowstudy_aftermarriage',
            allowjob_aftermarriage = '$allowjob_aftermarriage',
            livewife_aftermarriage = '$livewife_aftermarriage',
            profileby = '$profileby',
            profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result)
        {    echo "";}
        }
        $sql="SELECT user_id FROM 7bd_marriage_related_qs_female WHERE user_id=$id";
        $result=mysqlexec($sql);
        if(mysqli_num_rows($result)>=1){
        $sql = "UPDATE 7bd_marriage_related_qs_female SET 
            studies_aftermarriage = '$studies_aftermarriage',
            anyjob_aftermarriage = '$anyjob_aftermarriage',
            agree_marriage_student = '$agree_marriage_student',
            profileby = '$profileby',
            profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result) {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা সফলভাবে আপডেট হয়েছে!';
            $_SESSION['messageType'] = 'success';
            header("Location: edit_physical_marital.php?id=" . $id);
            exit();
        } else {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>উফফ! সমস্যা দেখা দিয়েছে।';
            $_SESSION['messageType'] = 'error';
            header("Location: edit_physical_marital.php?id=" . $id);
            exit();
        }
        }
        }
    }
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                   E   N   D                   --
    --             1bd_personal_physical             --
    --   Male Marriage related Info / sb-biodata-6   --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    //End & Start
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                  S  T  A  R  T                --
    --             2bd_personal_lifestyle            --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function personal_info_update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        require_once("includes/dbconn.php");
        $id = $_GET['id'];
        $sql="SELECT user_id FROM 2bd_personal_lifestyle WHERE user_id=$id";
        $result=mysqlexec($sql);
        if(mysqli_num_rows($result)>=1){
        $sql = "UPDATE 2bd_personal_lifestyle SET 
            smoke = '$smoke',
            occupation_sector = '$occupation_sector',
            other_occupation_sector = '$other_occupation_sector',
            business_occupation_level = '$business_occupation_level',
            student_occupation_level = '$student_occupation_level',
            health_occupation_level = '$health_occupation_level',
            engineer_occupation_level = '$engineer_occupation_level',
            teacher_occupation_level = '$teacher_occupation_level',
            defense_occupation_level = '$defense_occupation_level',
            foreigner_occupation_level = '$foreigner_occupation_level',
            garments_occupation_level = '$garments_occupation_level',
            driver_occupation_level = '$driver_occupation_level',
            service_andcommon_occupation_level = '$service_andcommon_occupation_level',
            mistri_occupation_level = '$mistri_occupation_level',
            occupation_describe = '$occupation_describe',
            dress_code = '$dress_code',
            aboutme = '$aboutme',
            groom_bride_name = '$groom_bride_name',
            groom_bride_email = '$groom_bride_email',
            groom_bride_number = '$groom_bride_number',
            groom_bride_family_number = '$groom_bride_family_number',
            family_member_name_relation = '$family_member_name_relation',
            profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result) {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা সফলভাবে আপডেট হয়েছে!';
            $_SESSION['messageType'] = 'success';
            header("Location: edit_personal.php?id=" . $id);
            exit();
        } else {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>উফফ! সমস্যা দেখা দিয়েছে।';
            $_SESSION['messageType'] = 'error';
            header("Location: edit_personal.php?id=" . $id);
            exit();
        }
        }
        }
    }
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                   E   N   D                   --
    --             2bd_personal_lifestyle            --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    //End & Start
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                  S  T  A  R  T                --
    --  Educational Qualifications  / sb-biodata-3   --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function education_update(){
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
        $maxedu_qulfctn=$_POST['maxedu_qulfctn'];
        require_once("includes/dbconn.php");
        $id = $_GET['id'];
        // Secondary Education
        $sql = "SELECT user_id FROM 3bd_secondaryedu_method WHERE user_id = $id";
        $result = mysqlexec($sql);
        if (mysqli_num_rows($result) >= 1) {
            // User exists, perform update
            $sql = "UPDATE 3bd_secondaryedu_method SET 
                scndry_edu_method = '$scndry_edu_method',
                maxedu_qulfctn = '$maxedu_qulfctn',
                gnrl_mdrs_secondary_pass = '$gnrl_mdrs_secondary_pass',
                gnrl_mdrs_secondary_pass_year = '$gnrl_mdrs_secondary_pass_year',
                gnrl_mdrs_secondary_end_year = '$gnrl_mdrs_secondary_end_year',
                gnrlmdrs_secondary_running_std = '$gnrlmdrs_secondary_running_std',
                profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
                WHERE user_id = '$id'";
        } else {
            // User doesn't exist, perform insert
            $sql = "INSERT INTO 3bd_secondaryedu_method (user_id, scndry_edu_method, maxedu_qulfctn, gnrl_mdrs_secondary_pass, gnrl_mdrs_secondary_pass_year, gnrl_mdrs_secondary_end_year, gnrlmdrs_secondary_running_std, profilecreationdate)
                VALUES ('$id', '$scndry_edu_method', '$maxedu_qulfctn', '$gnrl_mdrs_secondary_pass', '$gnrl_mdrs_secondary_pass_year', '$gnrl_mdrs_secondary_end_year', '$gnrlmdrs_secondary_running_std', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";
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
                profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
                WHERE user_id = '$id'";
        } else {
            // User doesn't exist, perform insert
            $sql = "INSERT INTO 3bd_kowmi_madrasaedu_method (user_id, qawmi_madrasa_hafez, qawmimadrasa_dawrapass, kowmi_dawrapas_year, kowmi_current_edu_level, profilecreationdate)
                VALUES ('$id', '$qawmi_madrasa_hafez', '$qawmimadrasa_dawrapass', '$kowmi_dawrapas_year', '$kowmi_current_edu_level', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";
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
                gnrlmdrs_hrsecondary_pass = '$gnrlmdrs_hrsecondary_pass',
                gnrlmdrs_hrsecondary_pass_year = '$gnrlmdrs_hrsecondary_pass_year',
                gnrlmdrs_hrsecondary_exam_year = '$gnrlmdrs_hrsecondary_exam_year',
                gnrlmdrs_hrsecondary_group = '$gnrlmdrs_hrsecondary_group',
                gnrlmdrs_hrsecondary_rningstd = '$gnrlmdrs_hrsecondary_rningstd',
                diploma_hrsecondary_pass = '$diploma_hrsecondary_pass',
                diploma_hrsecondary_pass_year = '$diploma_hrsecondary_pass_year',
                diploma_hrsecondary_sub = '$diploma_hrsecondary_sub',
                diploma_hrsecondary_endingyear = '$diploma_hrsecondary_endingyear',
                profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
                WHERE user_id = '$id'";
        } else {
            // User doesn't exist, perform insert
            $sql = "INSERT INTO 3bd_higher_secondaryedu_method (user_id, higher_secondary_edu_method, gnrlmdrs_hrsecondary_pass, gnrlmdrs_hrsecondary_pass_year, gnrlmdrs_hrsecondary_exam_year, gnrlmdrs_hrsecondary_group, gnrlmdrs_hrsecondary_rningstd, diploma_hrsecondary_pass, diploma_hrsecondary_pass_year, diploma_hrsecondary_sub, diploma_hrsecondary_endingyear, profilecreationdate)
                VALUES ('$id', '$higher_secondary_edu_method', '$gnrlmdrs_hrsecondary_pass', '$gnrlmdrs_hrsecondary_pass_year', '$gnrlmdrs_hrsecondary_exam_year', '$gnrlmdrs_hrsecondary_group', '$gnrlmdrs_hrsecondary_rningstd', '$diploma_hrsecondary_pass', '$diploma_hrsecondary_pass_year', '$diploma_hrsecondary_sub', '$diploma_hrsecondary_endingyear', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";
        }
        $result = mysqlexec($sql);
        if ($result) {
            echo "";
        }        
        $sql = "SELECT user_id FROM 3bd_universityedu_method WHERE user_id=$id";
        $result = mysqlexec($sql);
        if (mysqli_num_rows($result) >= 1) {
            // User exists, perform update
            $sql = "UPDATE 3bd_universityedu_method SET 
                varsity_edu_method = '$varsity_edu_method',
                uvarsity_pass = '$uvarsity_pass',
                varsity_passing_year = '$varsity_passing_year',
                university_subject = '$university_subject',
                varsity_ending_year = '$varsity_ending_year',
                uvarsity_name = '$uvarsity_name',
                others_edu_qualification = '$others_edu_qualification',
                profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
                WHERE user_id = '$id'";
        } else {
            // User doesn't exist, perform insert
            $sql = "INSERT INTO 3bd_universityedu_method (user_id, varsity_edu_method, uvarsity_pass, varsity_passing_year, university_subject, varsity_ending_year, uvarsity_name, others_edu_qualification, profilecreationdate)
            VALUES ('$id', '$varsity_edu_method', '$uvarsity_pass', '$varsity_passing_year', '$university_subject', '$varsity_ending_year', '$uvarsity_name', '$others_edu_qualification', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";
        }
        $result = mysqlexec($sql);
        session_start();
        if ($result) {
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা সফলভাবে আপডেট হয়েছে!';
            $_SESSION['messageType'] = 'success';
        } else {
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>উফফ! সমস্যা দেখা দিয়েছে।';
            $_SESSION['messageType'] = 'error';
        }
        header("Location: edit_education.php?id=" . $id);
        exit();        
        }
    }
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                   E   N   D                   --
    --  Educational Qualifications  / sb-biodata-3   --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    //End & Start
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                  S  T  A  R  T                --
    --               4bd_address_details             --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function address_update(){
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
        $id = $_GET['id'];
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
            profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result) {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা সফলভাবে আপডেট হয়েছে!';
            $_SESSION['messageType'] = 'success';
            header("Location: edit_address.php?id=" . $id);
            exit();
        } else {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>উফফ! সমস্যা দেখা দিয়েছে।';
            $_SESSION['messageType'] = 'error';
            header("Location: edit_address.php?id=" . $id);
            exit();
        }
        }
        }
    }
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                   E   N   D                   --
    --              4bd_address_details              --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    //End & Start
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                  S  T  A  R  T                --
    --             5bd_family_information            --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function family_update(){
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
        $id = $_GET['id'];
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
            profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result) {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা সফলভাবে আপডেট হয়েছে!';
            $_SESSION['messageType'] = 'success';
            header("Location: edit_family.php?id=" . $id);
            exit();
        } else {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>উফফ! সমস্যা দেখা দিয়েছে।';
            $_SESSION['messageType'] = 'error';
            header("Location: edit_family.php?id=" . $id);
            exit();
        }
        }
        }
    }
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                   E   N   D                   --
    --             5bd_family_information            --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    //End & Start
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                  S  T  A  R  T                --
    --              8bd_religion_details            --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function religion_update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Biodata 8
            $religion = $_POST['religion'];
            $yourreligion_condition = $_POST['yourreligion_condition'];
            require_once("includes/dbconn.php");
            $id = $_GET['id'];
            $sql = "SELECT user_id FROM 8bd_religion_details WHERE user_id = $id";
            $result = mysqlexec($sql);
            if (mysqli_num_rows($result) >= 1) {
                $sql = "UPDATE 8bd_religion_details SET 
                    religion = '$religion',
                    yourreligion_condition = '$yourreligion_condition',
                    profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
                WHERE user_id = '$id'";
                $result = mysqlexec($sql);
                if ($result) {
                    session_start();
                    $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা সফলভাবে আপডেট হয়েছে!';
                    $_SESSION['messageType'] = 'success';
                    header("Location: edit_religion.php?id=" . $id);
                    exit();
                } else {
                    session_start();
                    $_SESSION['updateMessage'] = '<i class="fa fa-times-circle" style="font-size: 30px; margin-bottom: 10px;"></i> </br>উফফ! সমস্যা দেখা দিয়েছে।';
                    $_SESSION['messageType'] = 'error';
                    header("Location: edit_religion.php?id=" . $id);
                    exit();
                }
            }
        }
    }
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                   E   N   D                   --
    --              8bd_religion_details             --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    //End & Start
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                  S  T  A  R  T                --
    --           9bd_expected_life_partner           --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function partner_update(){
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
        $id = $_GET['id'];
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
            profilecreationdate = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p')
        WHERE user_id = '$id'";
        $result=mysqlexec($sql);
        if ($result) {
            session_start();
            $_SESSION['updateMessage'] = '<i class="fa fa-check-circle" style="font-size: 30px; margin-bottom: 10px;"></i></br> ডেটা সফলভাবে আপডেট হয়েছে!';
            $_SESSION['messageType'] = 'success';
            header("Location: edit_partner.php?id=" . $id);
            exit();
        } else {
            echo "Error updating data.";
        }
        }
        }
    }
    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    --                   E   N   D                   --
    --           9bd_expected_life_partner           --
    --       User Bio Data Update to Database        --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/






    ?>