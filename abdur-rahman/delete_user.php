<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Users| ShosurBari</title>
  <script>
	function confirmDelete(id) {
	if (confirm("Are you sure you want to delete this user?")) {
		window.location.href = 'delete_user.php?id=' + id;
	} else {
		return false;
	}
	}
	</script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="error-page-area">
    <div class="error-page-wrap">
      <i class="notika-icon notika-close"></i>
      <h2>Delete Success!</h2>
	  	<?php
		$conn = mysqli_connect("localhost", "root", "", "matrimony");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$id = $_GET['id'];
		$sql = "DELETE FROM users WHERE id = $id";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<p>Users ID Successfully Deleted.</p>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	?>
      <a href="users.php" class="btn">Go to Back User Page</a>
      <a href="index.html" class="btn error-btn-mg">Go to Back Dashboard</a>
    </div>
  </div>
  <style>
	.error-page-area{
		min-height:100vh;
		text-align:center;
		background:#00c292;
	}
  	.error-page-area:before{
    content:'';
		height:100vh;
		width:1px;
	}
	.error-page-area:before{
		vertical-align: middle;
		display: inline-block;
	}
	.error-page-wrap{
		max-width:580px;
		padding:20px 0;
		width:60%;
		position:relative;
		margin: 0 auto;
		background:#fff;
		box-shadow:0 1px 1px rgba(0,0,0,.1);
		border-radius:2px;
		vertical-align: middle;
		display: inline-block;
	}
	.error-page-wrap h2{
		font-size: 27px;
		color: #333;
		margin-top: -15px;
		margin-bottom: 0px;
	}
	.error-page-wrap p{
		font-size:17px;
		color:#333;
		line-height:24px;
		padding: 10px;
	}
	.error-page-wrap .btn{
		background:#ff0080;
		color:#fff;
		border-radius:2px;
		box-shadow: 0 2px 5px rgba(0,0,0,.16), 0 2px 10px rgba(0,0,0,.12);
		outline:none;
		margin:0px 5px;
		font-size:14px;
		padding: 7px;
		text-decoration: none;
	}
	.error-page-wrap .btn:hover{
		background:#00bbff;
		color:#fff;
		padding: 7px;
	}
	.error-page-wrap .counter{
		color:#00c292;
	}
	.error-page-wrap i{
		font-size: 40px;
		color: #00c292;
		padding-bottom: 15px !important;
		display: block;
	}
  </style>
</body>
</html>
