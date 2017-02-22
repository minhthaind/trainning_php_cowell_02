<?php
$id = $_POST['id'];
include "connection.php";
$sql = "DELETE  FROM users WHERE id = '$id'";
mysqli_query($conn, $sql);
header("location:view.php");

?>

