<?php
if (isset($_GET["image_path"])) {
    $imagePath = $_GET["image_path"];

    if (file_exists($imagePath)) {
        // Set appropriate headers for download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($imagePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($imagePath));

        // Read the file and output it to the browser
        readfile($imagePath);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid request.";
}
?>
