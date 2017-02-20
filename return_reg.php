   <?php 
   /*if(isset($_POST['name'])&& isset($_POST['birthday']) &&isset($_POST['email']) && isset($_POST['phone_number']) &&isset($_POST['key_persion'])&&isset($_POST['sex']))
   {
   	$name=$_POST['name'];
   	$birthday=$_POST['birthday'];
   	$sex=$_POST['email'];
   	$phone_number=$_POST['phone_number'];
   	$email=$_POST['email'];
   }
   	if(checkemail($email)&& checkbirthday($birthday)&& checkname($name) && checkphone($phone) && $sex!="")
   	//{function test_input($data){
   		$arr1 = array($name ,$birthday,$email,$phone_number,$key_persion,$sex );
   		$arr=array();
   		$row=1;
   		if (($handle = fopen("list_persion.csv", "r")) !== FALSE) {
   			while (($data= fgetcsv($handle, 1000,",")) !== FALSE){ 
   				array_push($arr, $data);
   				$row      ;
   			}
   			array_push($arr, $arr1);
   			$fp = fopen('list_persion', 'w');
   			foreach ($arr as $fields) {
   				fputcsv($fp, $fields);
   			}
   
   			fclose($fp);
   	//}
      } */ 
    //$pattern = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
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