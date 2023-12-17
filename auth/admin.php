<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
	session_start();
	error_reporting(0);
	require_once("../includes/dbconn.php");
	$userlevel = $_GET['admin'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	if ($conn->connect_error) {
		$error = "Connection failed: " . $conn->connect_error;
		echo $error;
	}
	$hashed_password = hash('sha256', $password);
	$sql = "SELECT id, password FROM admin WHERE (username = '$username' OR email = '$username')";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$stored_password = $row['password'];
		// Compare the hashed input password with the stored hashed password
		if ($hashed_password === $stored_password) {
			$admin_id = $row['admin_id'];
			$_SESSION['admin_id'] = $admin_id;
			header("location:../users.php?id={$row['admin_id']}");
		} else {
			echo "Invalid username";
		}
	} else {
		echo "Invalid password";
	}
	$conn->close();
}
?>