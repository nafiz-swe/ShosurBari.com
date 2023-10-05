<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get image path and user ID from POST data
    $image_path = $_POST["image_path"];
    $user_id = $_POST["user_id"];

    // Define the trash folder path
    $trash_folder = "../profile/{$user_id}/trash/";

    // Check if the trash folder exists, create it if not
    if (!is_dir($trash_folder)) {
        mkdir($trash_folder, 0777, true);
    }

    // Get the image file name
    $image_name = basename($image_path);

    // Define the path for the image in the trash folder
    $trash_image_path = $trash_folder . $image_name;

    // Move the image to the trash folder
    if (rename($image_path, $trash_image_path)) {
        // Prepare JavaScript code for redirection and popup message
        $popup_message = "User image deleted and stored in trash. User ID: $user_id";
        echo "<script>
            alert('$popup_message');
            window.location.href = 'photos.php';
        </script>";
    } else {
        echo "Failed to delete the image.";
    }
}
?>