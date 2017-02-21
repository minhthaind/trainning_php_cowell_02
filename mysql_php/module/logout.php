
<?php 
session_start();

unset($_SESSION['login']);
header("location:/mysql_php/index.php");

 ?>