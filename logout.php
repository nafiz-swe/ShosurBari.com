<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout | ShosurBari</title>
    <link rel="icon" href="images/shosurbari-icon.png" type="image/png">
    <script>
        // Redirect to index.php after a delay
        setTimeout(function () {
            window.location.href = "index.php";
        }, 3000); // 3000 milliseconds (3 seconds)
    </script>
</head>
<body>
    <p>Successfully logged out. Redirecting to home page...</p>
    <a href="index.php">Back to home</a>
</body>
</html>
