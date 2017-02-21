<?php 
session_start();
include("config.php");
date_default_timezone_set("Asia/Ho_Chi_Minh");

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']))
{
    $id= $_POST['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $passwordis=$_POST['password'];
    $password=md5( $passwordis);
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $update_at=date("Y-m-d h:i:s");
    if((strlen($username))< 4 || (strlen($usename))>17)
    {
     $_SESSION['error_username']="username phải từ 4-16 ký tự";
     header("location:/mysql_php/module/editusers.php?id=".$id);
 }
 else if((strlen($passwordis))< 6 || (strlen($passwordis))> 24)
 {
   $_SESSION['error_password']="Mật khẩu phải từ 6- 24 ký tự";
   header("location:/mysql_php/module/editusers.php?id=".$id);
}
else
{

 $sqlupdate="UPDATE users SET first_name='$firstname',last_name='$lastname',phone='$phone',email ='$email',update_at='$update_at',username='$username',password='$password' WHERE id=".$id;
 if(mysqli_query($conn,$sqlupdate))
 {
    $_SESSION['success_update']="Cập nhật thành công !";
    header("location:/mysql_php/module/list_users.php");
}
else
{
 header("location:/editusers.php");
}
}



}


?>