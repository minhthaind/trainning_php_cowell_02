<?php 
session_start();
require_once("dbConnect.php");
$user = $_GET['username'];
$pass = $_GET['pass'];
$sqlConfigData = "	Select *
					From users
					Where username = '$user' AND password = '$pass'";
$resultConfigData = mysqli_query($conn, $sqlConfigData);
if(mysqli_num_rows($resultConfigData) > 0){
	header('location: info.php');
} else {
	header('location: login.php');
}

?>