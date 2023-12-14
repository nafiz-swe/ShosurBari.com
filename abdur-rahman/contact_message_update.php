<?php
$conn = mysqli_connect("localhost", "root", "", "matrimony");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['id'])) {
    $contactId = mysqli_real_escape_string($conn, $_GET['id']);
    $getStatusSql = "SELECT read_message FROM contact_us WHERE contact_id = $contactId";
    $getStatusResult = mysqli_query($conn, $getStatusSql);
    $currentStatus = mysqli_fetch_assoc($getStatusResult)['read_message'];
    $updateSql = "UPDATE contact_us SET read_message = NOT read_message, unread_message = NOT unread_message WHERE contact_id = $contactId";
    $updateResult = mysqli_query($conn, $updateSql);
    if ($updateResult) {
        header("Location: contact_us.php");
        exit();
    } else {
        echo "Error updating message status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
mysqli_close($conn);
?>
