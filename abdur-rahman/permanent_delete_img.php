<?php
if (isset($_POST['permanent_delete_image'])) {
    // Get the image path and user ID from the form
    $imagePath = $_POST['image_path'];
    $userID = $_POST['user_id'];
    // Perform the permanent deletion of the image
    if (file_exists($imagePath)) {
        // Delete the image file
        unlink($imagePath);
        header("Location: trash.php"); 
        exit();
    } else {
        echo "The image file does not exist.";
    }
} else {
    echo "Form was not submitted.";
}
?>
