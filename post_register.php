<?php
/**
 * Created by PhpStorm.
 * User: minhthaind
 * Date: 2/17/2017
 * Time: 3:58 PM
 */

//var_dump($_GET); //die();
//
//echo $_GET['username'];
//echo '<br>';
//echo isset($_GET['name']) ? $_GET['name'] : 'default name';
//echo '<br>';
//echo $_GET['email'];
//echo '<br>';
//echo $_GET['password'];
//echo '<br>';
//echo $_GET['password_confirmation'];
//echo '<br>';
//echo $_GET['_token'];
//
//echo $_GET['username'];
//echo '<br>';
//echo getParam($_GET, 'nameuser');
//echo '<br>';
//echo $_GET['email'];
//echo '<br>';
//echo $_GET['password'];
//echo '<br>';
//echo $_GET['password_confirmation'];
//echo '<br>';
//echo $_GET['_token'];

session_start();
$_SESSION['flaguser'] = 1;
$_SESSION['flagphone'] = 1;
$_SESSION['flagemail'] = 1;
$username = getParam($_GET, 'username');
$_SESSION['username'] = $username;
$email = getParam($_GET, 'email');
$_SESSION['email'] = $email;
$sex = getParam($_GET, 'sex');
$_SESSION['sex'] = $sex;
$phone = getParam($_GET, 'phone');
$_SESSION['phone'] = $phone;
// echo $configpass = getParam($_GET, 'password_confirmation');
// $_SESSION['pass'] = $configpass;
// echo getParam($_GET, '_token');
// echo '<br>';

// $checkuser = "/[A-Za-z0-9 ]{6,20}+/";
$checkuser = "/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]{6,20}+$/";
$checkphone = "/^[0-9]{9,12}+$/";

$partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";

if(!preg_match($checkuser, $username, $matchs)){
	$_SESSION['username'] = null;
	$_SESSION['flaguser'] = null;
  	header('location: register.php');
}

if(!preg_match($checkphone ,$phone, $matchs)){
    $_SESSION['phone'] = null;
    $_SESSION['flagphone'] = null;
  	header('location: register.php');
}

if(!preg_match($partten ,$email, $matchs)){
    $_SESSION['email'] = null;
    $_SESSION['flagemail'] = null;
  	header('location: register.php');
}


/**
 * get param of request
 * @param array $arrParam
 * @param string $nameInput
 * @param string $default
 * @return string value of request by name
 */
function getParam($arrParam, $nameInput, $default = null)
{
    return isset($arrParam[$nameInput]) ? $arrParam[$nameInput] : $default;
}
// $flagFile = isset($flagFile) ? $flagFile : 0;
// if($flagFile == 0){
 	if($sex == 0) $newSex = "Nam"; else $newSex = "Nữ";
// 	$Content = "Name, Sex, Phone, Email\n";
// 	$Content .="$username, $newSex, $phone, $email\n";
// 	$flagFile = 1;

// 	$FileName = "ListPeople.csv";
// 	header('Content-Type: application/csv');
// 	header('Content-Disposition: attachment; filename="' . $FileName . '"');
// 	echo $Content;
// 	exit();
// } else{
	$Content = $username. "," . $newSex . "," . $phone . "," . $email . "\n";
	file_put_contents("ListPeople.csv", $Content, FILE_APPEND);
	$_SESSION["flagFile"] = 1;
// }

header('location: register.php');