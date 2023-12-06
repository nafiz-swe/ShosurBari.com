    /*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
    --                S  T  A  R  T                  --
    --             User Account Update               --
    --                                               --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/
    
    // Password updated START
function updatePassword($userId, $newPassword) {
    require_once("includes/dbconn.php");

    // Check if the database connection is established
    if (!$conn) {
        return false; // Unable to connect to the database
    }

    // Hash the new password securely
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    echo "Hashed Password: " . $hashedPassword; // Debug statement

    // Update the password in the database using prepared statement to prevent SQL injection
    $update_query = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $update_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $userId);
        $update_result = mysqli_stmt_execute($stmt);

        if (!$update_result) {
            // Display or log the MySQL error for debugging
            echo "Error: " . mysqli_error($conn);
            return false; // Return false on error
        } else {
            echo "Password updated successfully";
        }

        mysqli_stmt_close($stmt);

        if ($update_result) {
            return true; // Password updated successfully
        }
    }

    return false; // Error updating password
}
// Password updated END

// Full Name & Gender updated START
function updateUserInfo($userId, $newFullname, $newGender) {
    require_once("includes/dbconn.php");

    // Update the user information in the database using prepared statement
    $update_query = "UPDATE users SET fullname = ?, gender = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $update_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $newFullname, $newGender, $userId);
        $update_result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($update_result) {
            return true; // User information updated successfully
        }
    }

    return false; // Error updating user information
}
// Full Name & Gender updated END

// Full Account Update START
if (isset($_POST['update_account'])) {
    $userId = $_SESSION['id'];
    $newFullname = $_POST['fullname'];
    $newGender = $_POST['gender'];
    $newPassword = $_POST['pass_1'];
    $confirmPassword = $_POST['pass_2'];

    // Check if new passwords match
    if ($newPassword != $confirmPassword) {
        echo 'New passwords do not match';
    } else {
        // Update user information
        $userInfoUpdated = updateUserInfo($userId, $newFullname, $newGender);

        // Update the password
        $passwordUpdated = updatePassword($userId, $newPassword);

        // Redirect back to accountupdate.php with a message
        if ($userInfoUpdated && $passwordUpdated) {
            header("Location: accountupdate.php?message=success");
            exit();
        } else {
            header("Location: accountupdate.php?message=error");
            exit();
        }
    }
}
// Full Account Update END

/*-- -- -- -- -- -- -- -- -- -- -- -- -- ---- -- --
    -- -- -- -- -- -- -- -- --- -- -- -- -- -- -- -- --
    --                  E   N   D                    --
    --         Register User Account Update          --
    --                                               --
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- ---
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -*/









<form action="" method="POST" name="myForm" onsubmit="return validateForm()">
<div class="form-group">
    <label>Full Name <span style="color: #ccc; font-size:12px;">(Changeable)</span></label>
    <input type="text" name="fullname" class="form-text" value="<?php echo $fullname; ?>" />
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



<div class="form-actions">
    <button type="submit" name="update_account" value="Update Account" class="btn_1 submit">
        <span>Update Account</span>
    </button>
</div>
</form>