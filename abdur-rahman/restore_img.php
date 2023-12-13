<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get image path and user ID from POST data
    $image_path = $_POST["image_path"];
    $user_id = $_POST["user_id"];

    // Define the user's profile folder path
    $user_folder = "../profile/{$user_id}/";

    // Get the image file name
    $image_name = basename($image_path);

    // Define the path for the image in the user's profile folder
    $user_image_path = $user_folder . $image_name;

    // Check if the user's profile folder exists
    if (!is_dir($user_folder)) {
        mkdir($user_folder, 0777, true);
    }

    // Move the image from the trash folder to the user's profile folder
    if (rename($image_path, $user_image_path)) {
        echo "Image restored to the user's profile successfully.";
        header("location:trash.php");
    } else {
        echo "Failed to restore the image.";
    }
}
?>
