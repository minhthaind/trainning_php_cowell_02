<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ten = isset($_GET['name'])?$_GET['name']:'null';
$gioitinh = isset($_GET['sex'])?$_GET['sex']:'null';
$sdt = isset($_GET['phone'])?$_GET['phone']:'null';
$email = isset($_GET['email'])?$_GET['email']:'null';
$partten_email = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
$data= array();
array_push($data, $ten,$gioitinh,$sdt,$email);
if(!preg_match($partten_email ,$email, $matchs)){
    echo  "Mail bạn vừa nhập không đúng định dạng ";
}else{
    ghiFile($data);
}

function ghiFile($data) {
    //print_r($data);
    $length=count($data);
    $fp = @fopen('list.csv', "a");
// Kiểm tra file mở thành công không
    if (!$fp) {
        echo 'Mở file không thành công';
    } else {
        //  $data = 'freetuts.net file functions tutorial';
       
        for($i=0;$i<$length;$i++){
             fwrite($fp, $data[$i]." ");
              
        }
        fwrite($fp, "".PHP_EOL);
        echo"Them Thanh Cong!";
    }
}

?>