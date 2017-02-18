<?php
	$staff = array();
	$name = $_GET["name"];
	$bthday = $_GET["bthday"];
	$gender= $_GET["gender"];
	$phone = $_GET["phone"];
	$mail = $_GET["mail"];
	
	array_push($staff, $name, $bthday, $gender, $phone, $mail);
	$fp = fopen('list_persion.csv', 'a+');
	fputcsv($fp, $staff);
	fclose($fp);
?>