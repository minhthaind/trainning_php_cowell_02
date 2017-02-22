<?php
session_start();
// lay email anddress va pass tu form nhap ve
if (isset($_POST['email_input'])) {
    $emailInput = $_POST['email_input'];
}
if (isset($_POST['pass_input'])) {
    $passInput = $_POST['pass_input'];
}
$passInput = sha1($passInput);

// lay email va pass da luu tren csdl
include "connection.php";
$sql    = "SELECT * FROM users WHERE mail = '$emailInput' AND password = '$passInput'";
$query = mysqli_query($conn,$sql);

if ($query) {
	$_SESSION['login']=$_POST['email_input'];
    $_SESSION['success']="Đăng nhập thành công";
    require "view.php";
} else {
    echo "Xin mời nhập lại";
    include "index.php";
}

