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

	// Hash the input password using SHA-256
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










<!-- <?php
// if (isset($_POST['username']) && isset($_POST['password'])) {
// 	session_start();
// 	error_reporting(0);
// 	require_once("../includes/dbconn.php");
// 	$userlevel=$_GET['user'];

// 	$username = $_POST['username'];
// 	$password = $_POST['password'];
	
// 	if ($conn->connect_error) {
// 		$error = "Connection failed: " . $conn->connect_error;
// 		echo $error;
// 	}
	
// 	$sql = "SELECT id FROM users WHERE (username = '$username' OR email = '$username') AND password = '$password'";
// 	$result = $conn->query($sql);
	
// 	if ($result->num_rows > 0) {
// 		$row = $result->fetch_assoc();
// 		$admin_id = $row['id'];
// 		session_start();
// 		$_SESSION['id'] = $admin_id;

// 		// if remember me checkbox is checked
// 		if (isset($_POST['remember'])) {
// 			// set cookies with user's login credentials
// 			setcookie('username', $username, time() + (86400 * 30), '/');
// 			setcookie('password', $password, time() + (86400 * 30), '/');
// 		}

// 		header("location:../userhome.php?id={$row['id']}");
// 	} 
// 	else {
// 		echo "Invalid username or password";
// 	}
// 	$conn->close();
// }
?> -->