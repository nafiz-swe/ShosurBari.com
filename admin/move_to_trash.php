<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image_path = $_POST["image_path"];
    $trash_path = $_POST["trash_path"];
    $user_id = $_POST["user_id"];

    if (file_exists($image_path) && rename($image_path, $trash_path)) {
        // Image moved to trash successfully
        header("Location: ../photos.php"); // Redirect back to your original page
        exit();
    } else {
        // Handle the error (e.g., display an error message)
        echo "Error: Unable to move the image to the trash.";
    }
}
?>
