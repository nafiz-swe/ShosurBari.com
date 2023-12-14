<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_image"])) {
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
        // Include the database connection file
        require_once("includes/dbconn.php");
        // Database update: Set the 'pic1' column to NULL for the user
        $sql_update = "UPDATE photos SET pic1 = NULL WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $sql_update)) {
            // Show green message
            echo "<div style='color:green;'>User image deleted and stored in trash. User ID: $user_id</div>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        // Close the database connection
        mysqli_close($conn);
        // Refresh the page after a short delay (optional)
        echo "<script>
            setTimeout(function () {
            window.location.href = 'photos.php';
            }, 2000); // Delay in milliseconds (2 seconds in this example)
        </script>";
    } else {
        echo "Failed to delete the image.";
    }
}
?>
