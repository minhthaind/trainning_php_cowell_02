   <?php 
	$name = test_input($_POST['name']);
	$birthday = test_input($_POST['birthday']);
	$sex = test_input($_POST['sex']);
	$phone_number = test_input($_POST['phone_number']);
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
		$data .= $birthday . ",";
		$data .= $sex . ",";
		$data .= $phone_number . ",";
		$data .= $email;
		$fp = fopen("list_persion.csv", "w");
		fwrite($fp, $data);
		fclose($fp);
		include "demo.php";
	}

  ?>