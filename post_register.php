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

echo $username = getParam($_GET, 'nameuser');
echo '<br>';
echo $email = getParam($_GET, 'email');
echo '<br>';
echo getParam($_GET, 'password');
echo '<br>';
echo getParam($_GET, 'password_confirmation');
echo '<br>';
echo getParam($_GET, '_token');
echo '<br>';

$partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";

if(!preg_match($partten ,$email, $matchs)){
    echo  "Mail bạn vừa nhập không đúng định dạng ";
}s

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