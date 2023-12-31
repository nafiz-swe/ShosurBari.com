<?php
// update_status.php

// Include your database connection file
require_once("includes/dbconn.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $admin_id = $_GET['admin_id'];
    $new_status = $_GET['new_status'];

    // Update the status in the database
    $update_query = "UPDATE admin SET active = '$new_status' WHERE admin_id = '$admin_id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        // Status updated successfully
        echo "Status updated successfully";
    } else {
        // Error updating status
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    // Invalid request method
    echo "Invalid request method";
}
?>
