<?php
	$pattern = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
	$name = test_input($_POST['name']);
	$dob = test_input($_POST['dob']);
	$gender = test_input($_POST['gender']);
	$phone = test_input($_POST['phone']);
	$email = test_input($_POST['email']);

	function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
	}

	if (!file_exists("list_persion.csv")) {
		$fp = fopen("list_persion.csv", "w");
	}
	else {
		$data = $name . ",";
		$data .= $dob . ",";
		$data .= $gender . ",";
		$data .= $phone . ",";
		$data .= $email;
		$fp = fopen("list_persion.csv", "w");
		fwrite($fp, $data);
		fclose($fp);
		include "show.php";
	}
?>
