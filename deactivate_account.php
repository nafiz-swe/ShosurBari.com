<?php
session_start();
require_once("includes/dbconn.php");
if (!isset($_SESSION['id'])) {
    header("location: login.php");
    exit;
}
$userId = $_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    if ($action === 'activate') {
        $active = 1;
        $deactivated = 0;
    } elseif ($action === 'deactivate') {
        $active = 0;
        $deactivated = 1;
    }
    $updateSql = "UPDATE users SET active = $active, deactivated = $deactivated WHERE id = $userId";
    if (mysqli_query($conn, $updateSql)) {
        header("location: my-account.php?status=success");
        exit;
    } else {
        header("location: my-account.php?status=error");
        exit;
    }
} else {
    header("location: my-account.php");
    exit;
}
?>