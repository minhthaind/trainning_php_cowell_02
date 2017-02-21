<?php 
	//Được đặt trong file commons
	// define('HOST', 'localhost');
	// define('DB_NAME', 'lession1');
	// define('DB_USERNAME', 'root');
	// define('DB_PASSWORD', '');
	$servername = 'cowelltraining.local';
	$username = 'root';
	$password = '';
	$dbName = 'training_php';
	$conn = mysqli_connect($servername, $username, $password, $dbName);
	//Trong trang kia sử dụng include './commons/dbConnect.php'; và sau đó là câu lệnh $sql;
?>