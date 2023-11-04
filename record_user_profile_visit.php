<?php
require_once("includes/dbconn.php"); // Include the database connection file

if (isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];

    // Check if a record already exists for the user ID in user_profile_visits
    $selectSql = "SELECT id, visitor_count FROM user_profile_visits WHERE user_id = ?";
    $selectStmt = $conn->prepare($selectSql);
    $selectStmt->bind_param("i", $userId);
    $selectStmt->execute();
    $selectStmt->bind_result($existingId, $visitorCount);

    if ($selectStmt->fetch()) {
        // Increment the visitor count
        $visitorCount++;
        $updateSql = "UPDATE user_profile_visits SET visitor_count = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ii", $visitorCount, $existingId);
        $updateStmt->execute();
    } else {
        // Insert a new record in the user_profile_visits table
        $insertSql = "INSERT INTO user_profile_visits (user_id, visitor_count, visit_time) VALUES (?, 1, DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("i", $userId);
        $insertStmt->execute();
    }

    // Record the unique visitor in the unique_visitors table
    $ipAddress = $_SERVER['REMOTE_ADDR'];

    // Check if the visitor is unique
    $selectUniqueSql = "SELECT id FROM unique_visitors WHERE user_id = ? AND ip_address = ?";
    $selectUniqueStmt = $conn->prepare($selectUniqueSql);
    $selectUniqueStmt->bind_param("is", $userId, $ipAddress);
    $selectUniqueStmt->execute();
    $selectUniqueStmt->store_result();

    if ($selectUniqueStmt->num_rows === 0) {
        $insertUniqueSql = "INSERT INTO unique_visitors (user_id, ip_address, visit_time) VALUES (?, ?, NOW())";
        $insertUniqueStmt = $conn->prepare($insertUniqueSql);
        $insertUniqueStmt->bind_param("is", $userId, $ipAddress);
        $insertUniqueStmt->execute();
    }

    // Visit recorded successfully
    echo "Visit recorded for user ID " . $userId;
}

// Close the database connection
$conn->close();
?>
