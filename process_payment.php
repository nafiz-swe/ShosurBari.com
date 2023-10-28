<?php
require_once("includes/dbconn.php");

if (isset($_GET['ids'])) {
    $ids = $_GET['ids'];

    // Explode the IDs by comma and space to count them
    $idArray = explode(', ', $ids);
    $idCount = count($idArray);

    // Calculate the fee based on the number of IDs
    $fee = 0;

    if ($idCount === 1) {
        $fee = 145;
    } elseif ($idCount === 2) {
        $fee = 270;
    } elseif ($idCount === 3) {
        $fee = 375;
    } elseif ($idCount === 4) {
        $fee = 460;
    } elseif ($idCount >= 5) {
        $fee = 525;
    }

    // Store the information in the customer table
    $sql = "INSERT INTO customer (biodata_quantities, total_fee) VALUES ($idCount, $fee)";
  
    if ($conn->query($sql) === true) {
        echo "<div>For $idCount ID(s), the fee is $fee tk.</div>";
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $ids = ''; // Set a default value if the parameter is not provided
    $idCount = 0;
    $fee = 0;
}

// Close the database connection
$conn->close();
?>