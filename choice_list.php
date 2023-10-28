<?php
session_start(); // Start a PHP session

$choiceList = [];

// Check if the session variable for the choice list exists
if (isset($_SESSION['choice_list'])) {
    $choiceList = $_SESSION['choice_list'];
}

if (isset($_POST['add_to_choice_list'])) {
    $profileid = $_POST['add_to_choice_list'];
    
    // Check if the profile ID already exists in the choice list
    $found = false;
    foreach ($choiceList as $key => $item) {
        if (strpos($item, $profileid) === 0) {
            $found = true;
            // Update the existing entry with the current date and time
            $dateTime = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
            $formattedDateTime = $dateTime->format('l h:i A, d F Y');
            $choiceList[$key] = "$profileid, $formattedDateTime";
            break;
        }
    }
    
    if (!$found) {
        // Create a new entry with the profile ID and the current date and time
        $dateTime = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
        $formattedDateTime = $dateTime->format('l h:i A, d F Y');
        $choiceList[] = "$profileid, $formattedDateTime";
    }
    
    // Update the session variable with the updated choice list
    $_SESSION['choice_list'] = $choiceList;
}

if (isset($_POST['remove_from_choice_list'])) {
    $profileidToRemove = $_POST['remove_from_choice_list'];
    // Remove the item with date and time from the choice list
    $choiceList = array_diff($choiceList, [$profileidToRemove]);
    $_SESSION['choice_list'] = $choiceList;
}

$count = count($choiceList);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choice List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h3 {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ddd;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 5px 0;
            background-color: #f9f9f9;
        }

        p {
            font-weight: bold;
        }

        .remove-button {
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h3>Choice List</h3>
    <ul>
        <?php
        foreach ($choiceList as $item) {
            echo "<li>$item <form method='POST' action='choice_list.php'><input type='hidden' name='remove_from_choice_list' value='$item'><button class='remove-button' type='submit'>Remove</button></form></li>";
        }
        ?>
    </ul>

    <p>Total unique users in the choice list: <?php echo $count; ?></p>

    <button onclick="goBack()">Go to Previous Page</button>


    <script>
        // Function to set a cookie
        function setCookie(cookieName, cookieValue, daysToExpire) {
            var date = new Date();
            date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
            var expires = "expires=" + date.toUTCString();
            document.cookie = cookieName + "=" + cookieValue + "; " + expires;
        }

        // Get the number of IDs and set a browser cookie
        var numIds = <?php echo $count; ?>;
        setCookie("choice_list_ids", numIds, 30); // Change 30 to the number of days you want the cookie to persist
    </script>



<?php
if (isset($_POST['make_payment'])) {
    // Get the IDs from the choice list
    $ids = $_SESSION['choice_list'];
    
    // Extract the profile IDs and join them with a comma and space
    $idList = implode(', ', array_map(function($item) {
        return explode(', ', $item)[0];
    }, $ids));
    
    // Redirect to contactbiodata.php and pass the IDs as a query parameter
    header("Location: contactbiodata.php?ids=" . urlencode($idList));
    exit; // Ensure that no further PHP code is executed after the redirection
}
?>

    
<form method="POST" action="choice_list.php">
    <input type="hidden" name="make_payment" value="1">
    <button type="submit">Make Payment</button>
</form>


<script>
    function goBack() {
        window.history.back();
    }
</script>




</body>
</html>
