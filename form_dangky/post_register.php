<?php
/**
 * Created by PhpStorm.
 * User: DinhPhong
 * Date: 2/20/2017
 * Time: 11:58 AM
 */

header("Content-Transfer-Encoding: UTF-8");
if(isset($_POST['name'])&& isset($_POST['birthday']) &&isset($_POST['sex']) && isset($_POST['phone']) &&isset($_POST['email']))
{
    $name=$_POST['name'];
    $birthday=$_POST['birthday'];
    $sex=$_POST['sex'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    if(checkemail($email)&& checkbirthday($birthday)&& checkname($name) && checkphone($phone) && $sex!="")
    {
        $arr1 = array($name ,$birthday,$sex,$phone,$email );
        $arr=array();
        $row=1;
        if (($handle = fopen("list.csv", "r")) !== FALSE) {
            while (($data= fgetcsv($handle, 1000,",")) !== FALSE){
                array_push($arr, $data);
                $row++;
            }
            array_push($arr, $arr1);
            $fp = fopen('test.csv', 'w');
            foreach ($arr as $fields) {
                fputcsv($fp, $fields);
            }

            fclose($fp);
        }

        header("location:./register.php?success=đăng ký thành công");
    }
}
else
{
    header("location:./register.php?error=lỗi đăng ký");

}

// kiem tra email
function checkemail($email)
{
    $partten = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i";
    if(!preg_match($partten ,$email, $matchs)){
        return false;
    }
    else
    {
        return true;
    }
}
// kiem tra ngay thang nam sinh
function checkbirthday($day)
{
    $partten = "/(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/";
    if(!preg_match($partten ,$day, $matchs)){
        return false;
    }
    else
    {
        return true;
    }
}
// kiem tra ten
function checkname($name)
{
    if(strlen($name)<4)
    {
        return false;
    }
    else
    {
        return true;
    }
}

// kiem tra sđt
function checkphone($phone)
{
    $partten = "/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/";
    if(!preg_match($partten ,$phone, $matchs)){
        return false;
    }
    else
    {
        return true;
    }
}
?>