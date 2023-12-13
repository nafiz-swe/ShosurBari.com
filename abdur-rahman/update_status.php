<?php
include("includes/dbconn.php"); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted data
    $customer_id = $_POST['customer_id'];
    $new_status = $_POST['new_status'];

    // Validate and sanitize the input (to prevent SQL injection)
    $customer_id = mysqli_real_escape_string($conn, $customer_id);
    $new_status = mysqli_real_escape_string($conn, $new_status);

    // Update the status in the database
    $updateSql = "UPDATE customer SET processing = 0, sent = 0, cancel = 0 WHERE id_customer = $customer_id"; // Reset all statuses to 0
    mysqli_query($conn, $updateSql);

    // Set the new status to 1
    $updateSql = "UPDATE customer SET $new_status = 1 WHERE id_customer = $customer_id";
    mysqli_query($conn, $updateSql);

    // Redirect back to the page where the form was submitted
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
} else {
    // If someone tries to access this script directly without a POST request, redirect them to the homepage
    header("Location: index.php"); // Replace with the actual homepage URL
    exit();
}
?>
