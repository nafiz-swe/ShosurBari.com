<?php
    function mysqlexec($sql){
          $host="localhost"; // Host name
          $username="root"; // Mysql username
          $password=""; // Mysql password
          $db_name="matrimony"; // Database name

        //  $host="sql211.infinityfree.com"; // Host name 
        //  $username="if0_34380678"; // Mysql username 
        //  $password="AJFC2H7KllI"; // Mysql password 
        //  $db_name="if0_34380678_matrimony"; // Database name 

        error_reporting(0);

        // Connect to server and select databse.
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
    -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
    --                S  T  A  R  T                  --
    --           New User Register Function          --
    --                                               --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    function admin_register(){
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname=$_POST['fullname'];
            $user_admin=$_POST['username'];
            $email = $_POST['email'];
            $hashed_password = hash('sha256', $_POST['password_1']);
            // $pass_1 = $_POST['pass_1'];
            // $pass_2 = $_POST['pass_2'];
            require_once("includes/dbconn.php");

            $sql = "INSERT INTO admin 
            ( fullname, username, email, password, active, active_status) 
            VALUES ('$fullname', '$user_admin', '$email', '$hashed_password', 1, DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";

        


            if (mysqli_query($conn,$sql)) {
                // Get the ID of the newly registered user
                $id = mysqli_insert_id($conn);
                
                // Set a session variable to store the user ID
                $_SESSION['id'] = $id;
                
                // Create a record for the user in the deactivate table
                $deactivate_sql = "INSERT INTO deactivated (user_id, status) VALUES ($id, 0)";
                mysqli_query($conn, $deactivate_sql);

                // Redirect the user to the userhome.php page with the user ID as a parameter in the URL
                header("location: admin/admin_login.php");

            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }
    }




    function isloggedin(){
        if(!isset($_SESSION['id'])){
            return false;
        }
        else{
            return true;
        }
    }

    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
    --                   E   N   D                   --
    --           New User Register Function          --
    --                                               --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
?>
