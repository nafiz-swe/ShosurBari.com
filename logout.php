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
        setTimeout(function () {
            window.location.href = "index.php";
        }, 0); // 3000 milliseconds (3 seconds)
    </script>
</head>
</html>
