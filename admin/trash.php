<!DOCTYPE html>
<html>
<head>
    <title>Deleted Images</title>
</head>
<body>
    <h1>Deleted Images</h1>

    <?php
    // Function to sanitize user input
    function sanitize($input) {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }

    // Check if the trash folder exists
    if (!is_dir("../profile")) {
        echo "<p>Trash folder does not exist.</p>";
    } else {
        // Open the profile folder
        $profile_folders = scandir("../profile");

        // Loop through each user's folder
        foreach ($profile_folders as $user_folder) {
            if ($user_folder !== "." && $user_folder !== "..") {
                $trash_folder = "../profile/{$user_folder}/trash/";

                // Check if the user's trash folder exists
                if (is_dir($trash_folder)) {
                    $deleted_images = scandir($trash_folder);

                    // Check if there are deleted images in the trash folder
                    if (count($deleted_images) > 2) { // 2 because . and .. are also counted
                        echo "<h2>User ID: " . sanitize($user_folder) . "</h2>";

                        echo "<table border='1'>";
                        echo "<tr><th>Image</th><th>Restore</th></tr>";

                        foreach ($deleted_images as $deleted_image) {
                            if ($deleted_image !== "." && $deleted_image !== "..") {
                                echo "<tr>";
                                echo "<td><img src='" . htmlspecialchars($trash_folder . $deleted_image, ENT_QUOTES, 'UTF-8') . "'></td>";
                                echo "<td>";
                                echo "<form method='POST' action='restore_img.php'>";
                                echo "<input type='hidden' name='image_path' value='" . sanitize($trash_folder . $deleted_image) . "' />";
                                echo "<input type='hidden' name='user_id' value='" . sanitize($user_folder) . "' />";
                                echo "<input type='submit' name='restore_image' value='Restore' />";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }

                        echo "</table>";
                    }
                }
            }
        }
    }
    ?>
</body>
</html>
