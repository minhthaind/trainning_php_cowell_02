<?php

 if(!isset($_SESSION['login']))
{
	header("location:./");
}


$id = $_GET['id'];


$name        = isset($_POST['name']) ? $_POST['name'] : "";
$user        = isset($_POST['user_name']) ? $_POST['user_name'] : "";
$email       = isset($_POST['email']) ? $_POST['email'] : "";
$pass        = isset($_POST['password']) ? $_POST['password'] : "";
$confirmPass = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : "";

require "connection.php";
$sqlUpdate = "UPDATE users SET name = '$name',user_name = '$user', mail = '$email', password = '$pass', confirm_password = '$confirmPass' WHERE id = '$id'";
mysqli_query($conn,$sqlUpdate);

header("location:view.php");
