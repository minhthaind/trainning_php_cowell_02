<?php 

require_once 'dbConnect.php';
$first = $_GET['fname'];
$last = $_GET['lname'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$user = $_GET['username'];
$pass = $_GET['pwd'];
$created_at = date("Y-m-d H:i:s");

$sqlAddData = " Insert into users(first_name, last_name, phone, email, created_at, username, password)
                Values('$first', '$last', '$phone', '$email', '$created_at', '$user', '$pass')";
$resultAddData = mysqli_query($conn, $sqlAddData);
if($resultAddData){
	header('location: info.php');
}

?>