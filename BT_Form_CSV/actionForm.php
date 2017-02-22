<?php
//mẫu
$partten     = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
$name        = getParam($_POST, 'name');
$birthDay    = getParam($_POST, 'birthday');
$sex         = getParam($_POST, 'sex');
$phoneNumber = getParam($_POST, 'phonenumber');
$email       = getParam($_POST, 'email');
/*if (!empty($email)) {
if (!preg_match($partten, $email, $matchs)) {

//$emailErr = "Mail bạn vừa nhập không đúng định dạng";
include "index.php";
echo "Mail bạn vừa nhập không đúng định dạng ";
}
}*/
$pass = getParam($_POST, 'pass');

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

if (!file_exists("list_persion.csv")) {
    $fp = fopen("list_persion.csv", "w");
} else {

/*if (empty($name) || empty($email)) {
echo "Chưa nhập tên hoặc email";*/

    $data = $name . ",";
    $data .= $birthDay . ",";
    $data .= $sex . ",";
    $data .= $phoneNumber . ",";
    $data .= $email . "\n";
    // mo file de luu data
    $fp = fopen("list_persion.csv", "w");
    fwrite($fp, $data);
    fclose($fp);
    include "index.php";

}