<?php
session_start();
require_once("includes/dbconn.php");

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect the user to the login page or display an error message
    header("location: login.php");
    exit;
}

// Get the user ID from the session
$userId = $_SESSION['id'];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action']; // The action can be 'activate' or 'deactivate'

    // Update the account status based on the action
    if ($action === 'activate') {
        $active = 1;
        $deactivated = 0;
    } elseif ($action === 'deactivate') {
        $active = 0;
        $deactivated = 1;
    }

    // Update the user's account status in the database
    $updateSql = "UPDATE users SET active = $active, deactivated = $deactivated WHERE id = $userId";

    // Execute the SQL query
    if (mysqli_query($conn, $updateSql)) {
        // Redirect the user to the profile page with a success message
        header("location: my-account.php?status=success");
        exit;
    } else {
        // Redirect the user to the profile page with an error message
        header("location: my-account.php?status=error");
        exit;
    }
} else {
    // Redirect the user to the profile page
    header("location: my-account.php");
    exit;
}
?>