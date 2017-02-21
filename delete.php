<?php 
require_once 'dbConnect.php';
$id = $_GET['id'];
$sqlDeleteData = "	Delete
					From users
					Where id = $id";
$resultDeleteData = mysqli_query($conn, $sqlDeleteData);
if($resultDeleteData){
	header('location: info.php');
}
?>