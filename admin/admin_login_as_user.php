<?php
// Include necessary files and initialize the session
include_once("includes/basic_includes.php");
include_once("functions.php");
require_once("includes/dbconn.php");
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['id'])) {
  // Redirect the admin to the login page or display an error message
  header("location: login.php");
  exit;
}

// Check if the user ID is provided in the URL
if (isset($_GET['id'])) {
  $user_id = $_GET['id'];

  // Authenticate as an admin
  $admin_id = $_SESSION['id'];

  // Log out the current admin session (optional)
  session_destroy();
  session_start();

  // Here, you should perform admin authentication, e.g., check admin credentials against a database
  // If authentication is successful, set the admin session variables (e.g., $_SESSION['id'])

  // Assuming admin authentication was successful, you can proceed to log in as the user
  $sql = "SELECT * FROM users WHERE id = $user_id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    // Set the user session variables to log in as the user
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['fullname'] = $row['fullname'];
    // Add any other user-specific session variables here

    // Redirect to the user's home page (modify the URL as needed)
    header("location: userhome.php");
    exit;
  }
}

// If no user ID is provided or user login fails, redirect to an error page or admin panel
header("location: admin_panel.php"); // Modify the URL as needed
exit;
?>
