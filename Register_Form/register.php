<?php

$name        = isset($_POST['name'])?$_POST['name']:""; 
$user        = isset($_POST['user_name'])?$_POST['user_name']:"";
$email       = isset($_POST['email'])?$_POST['email']:"";
$pass        = isset($_POST['password'])?$_POST['password']:"";
$confirmPass = isset($_POST['confirm_password'])?$_POST['confirm_password']:"";
/*$pass        = getParam($_POST, 'password');
$confirmPass = getParam($_POST, 'confirm_password');
 */
$pass        = sha1($pass);
$confirmPass = sha1($confirmPass);

/*function getParam($arrParam, $nameInput, $default = null)
{
return isset($param[$nameInput]) ? $param[$nameInput] : $default;
}
 */
// kết nối
include "connection.php";
$sql = "INSERT INTO users (name, user_name, mail, password,confirm_password)
    VALUES ('$name', '$user', '$email', '$pass','$confirmPass')";
//var_dump(mysqli_query($conn, $sql));
if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_connect_error();
}

require "view.php";
