<?php 
$host="localhost"; // Host name 
 $username="root"; // Mysql username 
 $password=""; // Mysql password 
 $db_name="matrimony"; // Database name 

// Connect to server and select databse.
 $conn=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 

mysqli_select_db($conn,"$db_name")or die("cannot select DB");
mysqli_set_charset($conn, "utf8mb4");
?>  


<!-- < ?php 
 $host="sql211.infinityfree.com"; // Host name 
 $username="if0_34380678"; // Mysql username 
 $password="AJFC2H7KllI"; // Mysql password 
 $db_name="if0_34380678_matrimony"; // Database name 

 // Connect to server and select databse.
 $conn=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 

 mysqli_select_db($conn,"$db_name")or die("cannot select DB");
 mysqli_set_charset($conn, "utf8mb4");  //Bangla font show from database. 
?> -->