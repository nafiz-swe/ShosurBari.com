<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    session_start();
    error_reporting(0);
    require_once("../includes/dbconn.php");
    $userlevel = $_GET['user'];

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($conn->connect_error) {
        $error = "Connection failed: " . $conn->connect_error;
        echo $error;
    }

    // Hash the input password using SHA-256
    $hashed_password = hash('sha256', $password);

    $sql = "SELECT id, password FROM users WHERE (username = '$username' OR email = '$username')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Compare the hashed input password with the stored hashed password
        if ($hashed_password === $stored_password) {
            $id = $row['id'];
            $_SESSION['id'] = $id;

            function encryptCookie($data) {
				$key = 'MIICXwIBAAKBgQDdp74ybdBBxJWRiRFjd2fNzk5FdWiw721Rk6U1W34DOLVi5rfN
				/CAOtb0GLN3ftNYZeiOH9g4kd72i68Gnmhj6PHFq6D7P9jGeOrYAuJgvmRRCopsZ
				AAQlXEXeb9s8BC4diGGrijzv36GXOSh3G2HLnYMgbJmydiK3NVcgJZJubQIDAQAB
				AoGBAM1mk1bx8inv/NY3mXh9/yB1TI0LJu/Hf5s34cGXPifIFjZHLQ7h0+ctvLOL
				QjP6xOgpCeIFPsfGemIObI9eukL25fhGyH4dxM64by6BlamCo4Ials6bOer7+Mm8
				MzkvOT4wEHcEyqZ86NHud8V8jG98qctGy11/e+os/KNjk6QVAkEA/p69uB522zS9
				SV8YpT+16W/EA/XTg8d1vUnkDbWuxexm2Hgu8+Tg6daP4XdZ2Cjvi528BGGAE4K1
				Q05O6yUHywJBAN7bRD6i7Rht73nh2P6CNN2dWcpGQNgXNgW+/xRMa2Nd0c+2vPqx
				7pAoDHEdmpuSNQvXeThGreyKMMpk+rBp66cCQQCW6QjzJoM1mwWRhh56Ws97wvV/
				j2TE1yROg4v6IDOtNVcjd+AESCSSE8yFSpLijiikLGHyisM5TSAX+0LFFdaPAkEA
				wIAiiQBvUSTVMTD3IZETXULoJqNcq8wQ7BG5gK0qLeECtSuiPeKosXkGlkb+H9fB
				XoM3wHa9EY+k6Y8kRHKaDQJBAJz2FHl42kAEXYkyi9qG189/LdN82Pl2L1o4CIA9
				UEy5Hmw+7W2f3CjtvzlKzkp95a8vmuHqX6FZZ0Aem1tAhqQ='; // Replace with a strong, unique key
                $cipher = 'AES-256-CBC';
                $options = 0;
                $iv = openssl_random_pseudo_bytes(16);
                $encrypted = openssl_encrypt($data, $cipher, $key, $options, $iv);
                if ($encrypted === false) {
                    die('Encryption failed: ' . openssl_error_string());
                }
                return base64_encode($iv . $encrypted);
            }

            function decryptCookie($encrypted) {
                $key = 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDdp74ybdBBxJWRiRFjd2fNzk5F
				dWiw721Rk6U1W34DOLVi5rfN/CAOtb0GLN3ftNYZeiOH9g4kd72i68Gnmhj6PHFq
				6D7P9jGeOrYAuJgvmRRCopsZAAQlXEXeb9s8BC4diGGrijzv36GXOSh3G2HLnYMg
				bJmydiK3NVcgJZJubQIDAQAB'; // Replace with the same key used for encryption
                $cipher = 'AES-256-CBC';
                $options = 0;
                $data = base64_decode($encrypted);
                $iv = substr($data, 0, 16);
                $encrypted = substr($data, 16);
                $decrypted = openssl_decrypt($encrypted, $cipher, $key, $options, $iv);
                if ($decrypted === false) {
                    die('Decryption failed: ' . openssl_error_string());
                }
                return $decrypted;
            }

            // Encrypt and set user data in cookies
            $sb_error = [
                'id' => $id,
                'groom_bride_email' => $groom_bride_email,
				'groom_bride_number' => $groom_bride_number,
				'groom_bride_family_number' => $groom_bride_family_number,
                // Add more user data as needed
            ];

			$acc_error = [
                'id' => $id,
                'username' => $username,
				'email' => $email,
				'password' => $password,
				'number' => $number,
                // Add more user data as needed
            ];

			$encrypted_biodata = encryptCookie(json_encode($sb_error));
            $encrypted_data = encryptCookie(json_encode($acc_error));

            setcookie('sb_error', $encrypted_biodata, time() + 3600, '/', '', false, true);
            setcookie('acc_error', $encrypted_data, time() + 3600, '/', '', false, true);

            header("location:../userhome.php?id={$row['id']}");
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }
    $conn->close();
}
?>


<?php
// if (isset($_POST['username']) && isset($_POST['password'])) {
// 	session_start();
// 	error_reporting(0);
// 	require_once("../includes/dbconn.php");
// 	$userlevel = $_GET['user'];

// 	$username = $_POST['username'];
// 	$password = $_POST['password'];

// 	if ($conn->connect_error) {
// 		$error = "Connection failed: " . $conn->connect_error;
// 		echo $error;
// 	}

// 	// Hash the input password using SHA-256
// 	$hashed_password = hash('sha256', $password);

// 	$sql = "SELECT id, password FROM users WHERE (username = '$username' OR email = '$username')";
// 	$result = $conn->query($sql);

// 	if ($result->num_rows > 0) {
// 		$row = $result->fetch_assoc();
// 		$stored_password = $row['password'];

// 		// Compare the hashed input password with the stored hashed password
// 		if ($hashed_password === $stored_password) {
// 			$id = $row['id'];
// 			$_SESSION['id'] = $id;

// 			function encryptCookie($data) {
// 				$key = 'MIICXwIBAAKBgQDdp74ybdBBxJWRiRFjd2fNzk5FdWiw721Rk6U1W34DOLVi5rfN
// 				/CAOtb0GLN3ftNYZeiOH9g4kd72i68Gnmhj6PHFq6D7P9jGeOrYAuJgvmRRCopsZ
// 				AAQlXEXeb9s8BC4diGGrijzv36GXOSh3G2HLnYMgbJmydiK3NVcgJZJubQIDAQAB
// 				AoGBAM1mk1bx8inv/NY3mXh9/yB1TI0LJu/Hf5s34cGXPifIFjZHLQ7h0+ctvLOL
// 				QjP6xOgpCeIFPsfGemIObI9eukL25fhGyH4dxM64by6BlamCo4Ials6bOer7+Mm8
// 				MzkvOT4wEHcEyqZ86NHud8V8jG98qctGy11/e+os/KNjk6QVAkEA/p69uB522zS9
// 				SV8YpT+16W/EA/XTg8d1vUnkDbWuxexm2Hgu8+Tg6daP4XdZ2Cjvi528BGGAE4K1
// 				Q05O6yUHywJBAN7bRD6i7Rht73nh2P6CNN2dWcpGQNgXNgW+/xRMa2Nd0c+2vPqx
// 				7pAoDHEdmpuSNQvXeThGreyKMMpk+rBp66cCQQCW6QjzJoM1mwWRhh56Ws97wvV/
// 				j2TE1yROg4v6IDOtNVcjd+AESCSSE8yFSpLijiikLGHyisM5TSAX+0LFFdaPAkEA
// 				wIAiiQBvUSTVMTD3IZETXULoJqNcq8wQ7BG5gK0qLeECtSuiPeKosXkGlkb+H9fB
// 				XoM3wHa9EY+k6Y8kRHKaDQJBAJz2FHl42kAEXYkyi9qG189/LdN82Pl2L1o4CIA9
// 				UEy5Hmw+7W2f3CjtvzlKzkp95a8vmuHqX6FZZ0Aem1tAhqQ='; // Replace with a strong, unique key
// 				$cipher = 'AES-256-CBC';
// 				$options = 0;
// 				$iv = openssl_random_pseudo_bytes(16);
// 				$encrypted = openssl_encrypt($data, $cipher, $key, $options, $iv);
// 				if ($encrypted === false) {
// 					die('Encryption failed: ' . openssl_error_string());
// 				}
// 				return base64_encode($iv . $encrypted);
// 			}
			
// 			function decryptCookie($encrypted) {
// 				$key = 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDdp74ybdBBxJWRiRFjd2fNzk5F
// 				dWiw721Rk6U1W34DOLVi5rfN/CAOtb0GLN3ftNYZeiOH9g4kd72i68Gnmhj6PHFq
// 				6D7P9jGeOrYAuJgvmRRCopsZAAQlXEXeb9s8BC4diGGrijzv36GXOSh3G2HLnYMg
// 				bJmydiK3NVcgJZJubQIDAQAB'; // Replace with the same key used for encryption
// 				$cipher = 'AES-256-CBC';
// 				$options = 0;
// 				$data = base64_decode($encrypted);
// 				$iv = substr($data, 0, 16);
// 				$encrypted = substr($data, 16);
// 				$decrypted = openssl_decrypt($encrypted, $cipher, $key, $options, $iv);
// 				if ($decrypted === false) {
// 					die('Decryption failed: ' . openssl_error_string());
// 				}
// 				return $decrypted;
// 			}			
			

// 			header("location:../userhome.php?id={$row['id']}");
// 		} else {
// 			echo "Invalid username or password";
// 		}
// 	} else {
// 		echo "Invalid username or password";
// 	}
// 	$conn->close();
// }
?>







<?php
// if (isset($_POST['username']) && isset($_POST['password'])) {
// 	session_start();
// 	error_reporting(0);
// 	require_once("../includes/dbconn.php");
// 	$userlevel = $_GET['user'];

// 	$username = $_POST['username'];
// 	$password = $_POST['password'];

// 	if ($conn->connect_error) {
// 		$error = "Connection failed: " . $conn->connect_error;
// 		echo $error;
// 	}

// 	// Hash the input password using SHA-256
// 	$hashed_password = hash('sha256', $password);

// 	$sql = "SELECT id, password FROM users WHERE (username = '$username' OR email = '$username')";
// 	$result = $conn->query($sql);

// 	if ($result->num_rows > 0) {
// 		$row = $result->fetch_assoc();
// 		$stored_password = $row['password'];

// 		// Compare the hashed input password with the stored hashed password
// 		if ($hashed_password === $stored_password) {
// 			$id = $row['id'];
// 			$_SESSION['id'] = $id;

// 			// if remember me checkbox is checked
// 			if (isset($_POST['remember'])) {
// 				// set cookies with user's login credentials
// 				setcookie('username', $username, time() + (86400 * 30), '/');
// 				setcookie('password', $password, time() + (86400 * 30), '/');
// 			}

// 			header("location:../userhome.php?id={$row['id']}");
// 		} else {
// 			echo "Invalid username or password";
// 		}
// 	} else {
// 		echo "Invalid username or password";
// 	}
// 	$conn->close();
// }
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
// 		$id = $row['id'];
// 		session_start();
// 		$_SESSION['id'] = $id;

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