<?php
// Include the database connection file
require_once("includes/dbconn.php");

// Extract the user ID from the URL
$user_id = $_GET['/Biodata'];

// Increment the view count for the specified user ID
$sql = "UPDATE page_views SET view_count = view_count + 1, last_update = DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p') WHERE page_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
if ($stmt->execute()) {
    // Update successful
} else {
    // Handle the error, e.g., log it or display an error message
    echo "Error updating view count: " . $conn->error;
}

// Retrieve the updated view count for the specified user ID
$select_sql = "SELECT view_count FROM page_views WHERE page_name = ?";
$select_stmt = $conn->prepare($select_sql);
$select_stmt->bind_param("s", $user_id);
$select_stmt->execute();
$select_stmt->bind_result($viewCount);
$select_stmt->fetch();

if ($viewCount === null) {
    // Handle the case where the user ID doesn't exist in the database
    // You can insert the user ID into the table with an initial view count here
    // For example, you can do an INSERT statement
    // Ensure the page_name matches the actual user ID
    $insert_sql = "INSERT INTO page_views (page_name, view_count, last_update) VALUES (?, 1, DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("s", $user_id);
    if ($insert_stmt->execute()) {
        $viewCount = 1;
    } else {
        // Handle the insert error
        echo "Error inserting new user ID: " . $conn->error;
    }
}

// Close the database connection
$conn->close();

echo "View Count for User ID " . $user_id . ": " . $viewCount;
?>
