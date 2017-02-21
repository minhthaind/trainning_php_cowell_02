<?php 

require_once 'dbConnect.php';
session_start();
$first = $_GET['fname'];
$last = $_GET['lname'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$user = $_GET['username'];
$pass = $_GET['pwd'];
$updated_at = date("Y-m-d H:i:s");
$id = $_SESSION['userid'];

$sqlUpdateData = "	Update users
										SET first_name = '$first', last_name = '$last', phone = '$phone', email = '$email', username = '$user', password = '$pass', updated_at = '$updated_at'
										Where id = $id";
$resultUpdateData = mysqli_query($conn, $sqlUpdateData);

if($resultUpdateData){
	session_unset('userid');
	header('location: info.php');
}

?>