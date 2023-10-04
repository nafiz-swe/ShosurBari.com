
<html>
	<head>
		<title>Delete | ShosurBari</title>
		<script>
			function confirmDelete(id) {
				if (confirm("Are you sure you want to delete this user?")) {
					window.location.href = 'delete_user.php?id=' + id;
				} else {
					return false;
				}
			}
		</script>
	</head>
	<body>
		<?php
			$conn = mysqli_connect("localhost", "root", "", "matrimony");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$id = $_GET['id'];
			$sql = "DELETE FROM users WHERE id = $id";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<h2>User successfully deleted.</h2>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		?>
	</body>
</html>