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
    --           New Admin Register Function         --
    --                                               --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    
// Admin registration
function admin_register(){
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password_1'];  // Assuming you have an input field named 'password_1'
        
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        require_once("includes/dbconn.php");

        $sql = "INSERT INTO admin 
        (fullname, username, email, password, active) 
        VALUES ('$fullname', '$username', '$email', '$hashed_password', 1)";

        if (mysqli_query($conn, $sql)) {
            // Get the ID of the newly registered user
            $id = mysqli_insert_id($conn);
            
            // Set a session variable to store the user ID
            $_SESSION['id'] = $id;
            
            // Redirect the user to the userhome.php page with the user ID as a parameter in the URL
            header("location: ../admin/users.php?id=$id");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Admin login
function admin_login(){
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Retrieve the hashed password from the database
        $sql = "SELECT id, password FROM admin WHERE (username = ? OR email = ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $stored_password);
            $stmt->fetch();

            // Verify the hashed input password with the stored hashed password
            if (password_verify($password, $stored_password)) {
                $_SESSION['id'] = $id;
                
                // Redirect the user to the userhome.php page with the user ID as a parameter in the URL
                header("location: ../admin/users.php?id=$id");
            } else {
                echo "Invalid password";
            }
        } else {
            echo "Invalid username or email";
        }

        $stmt->close();
    }
}


    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
    --                   E   N   D                   --
    --           New Admin Register Function         --
    --                                               --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    



    function isloggedin(){
        if(!isset($_SESSION['id'])){
            return false;
        }
        else{
            return true;
        }
    }
?>
