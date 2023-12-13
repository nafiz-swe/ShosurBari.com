<?php
// Check if the form was submitted
if (isset($_POST['permanent_delete_image'])) {
    // Get the image path and user ID from the form
    $imagePath = $_POST['image_path'];
    $userID = $_POST['user_id'];

    // Perform the permanent deletion of the image
    if (file_exists($imagePath)) {
        // Delete the image file
        unlink($imagePath);

        // You can add additional logic here if needed, such as updating a database

        // Redirect back to the page where the images are displayed
        header("Location: trash.php"); // Replace "your_page.php" with the actual page URL
        exit();
    } else {
        // Handle the case where the image file does not exist
        echo "The image file does not exist.";
    }
} else {
    // Handle cases where the form was not submitted
    echo "Form was not submitted.";
}
?>
