    <?php 
    session_start();
    include("config.php");
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']))
    {
       $firstname=$_POST['firstname'];
       $lastname=$_POST['lastname'];
       $username=$_POST['username'];
       $password=md5($_POST['password']);
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       $creat_at=date("Y-m-d h:i:s");

       if((strlen($username))< 4 || (strlen($usename))>17)
       {
         $_SESSION['error_username']="username phải từ 4-16 ký tự";
         header("location:./signup.php");
     }
     else if((strlen($password))< 6 || (strlen($password))> 24)
     {
       $_SESSION['error_password']="Mật khẩu phải từ 6- 24 ký tự";
       header("location:./signup.php");
   }
   else
   {

       $sqlcheckusername="SELECT * FROM users WHERE username='$username'";
       $resultcheck=mysqli_query($conn, $sqlcheckusername);
       $num=mysqli_num_rows($resultcheck);

       if($num>0)
       {
        $_SESSION['error_exits_username']="Tồn tại username:".$username;
        header("location:./signup.php");
    }
    else
    {
       $sqlinsert="INSERT INTO users(first_name,last_name,phone,email,create_at,username,password) VALUES('$firstname','$lastname','$phone',' $email','$creat_at','$username','$password')";

       if(mysqli_query($conn,$sqlinsert))
       {
           $_SESSION['success_username']="Tạo tài khoản thành công !";
           header("location:../index.php");
       }
       else
       {
        header("location:./signup.php");
    }
}
}

}


?><?php 
session_start();
include("config.php");
date_default_timezone_set("Asia/Ho_Chi_Minh");

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']))
{
   $firstname=$_POST['firstname'];
   $lastname=$_POST['lastname'];
   $username=$_POST['username'];
   $password=md5($_POST['password']);
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $creat_at=date("Y-m-d h:i:s");

   if((strlen($username))< 4 || (strlen($usename))>17)
   {
     $_SESSION['error_username']="username phải từ 4-16 ký tự";
     header("location:./signup.php");
 }
 else if((strlen($password))< 6 || (strlen($password))> 24)
 {
   $_SESSION['error_password']="Mật khẩu phải từ 6- 24 ký tự";
   header("location:./signup.php");
}
else
{

   $sqlcheckusername="SELECT * FROM users WHERE username='$username'";
   $resultcheck=mysqli_query($conn, $sqlcheckusername);
   $num=mysqli_num_rows($resultcheck);

   if($num>0)
   {
    $_SESSION['error_exits_username']="Tồn tại username:".$username;
    header("location:./signup.php");
}
else
{
   $sqlinsert="INSERT INTO users(first_name,last_name,phone,email,create_at,username,password) VALUES('$firstname','$lastname','$phone',' $email','$creat_at','$username','$password')";

   if(mysqli_query($conn,$sqlinsert))
   {
       $_SESSION['success_username']="Tạo tài khoản thành công !";
       header("location:../index.php");
   }
   else
   {
    header("location:./signup.php");
}
}
}

}


?>    <?php 
session_start();
include("config.php");
date_default_timezone_set("Asia/Ho_Chi_Minh");

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']))
{
 $firstname=$_POST['firstname'];
 $lastname=$_POST['lastname'];
 $username=$_POST['username'];
 $passwordis=$_POST['password'];
 $password=md5( $passwordis);
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $creat_at=date("Y-m-d h:i:s");

 if((strlen($username))< 4 || (strlen($usename))>17)
 { 
   $_SESSION['error_username']="username phải từ 4-16 ký tự";
   header("location:./signup.php");
 }
else 
{
        if((strlen($passwordis))< 6 || (strlen($passwordis))> 24)
       {
         $_SESSION['error_password']="Mật khẩu phải từ 6- 24 ký tự";
         header("location:./signup.php");
      }
     else
     {

         $sqlcheckusername="SELECT * FROM users WHERE username='$username'";
         $resultcheck=mysqli_query($conn, $sqlcheckusername);
         $num=mysqli_num_rows($resultcheck);

         if($num>0)
         {
            $_SESSION['error_exits_username']="Tồn tại username:".$username;
            header("location:./signup.php");
        }
        else
        {
         $sqlinsert="INSERT INTO users(first_name,last_name,phone,email,create_at,username,password) VALUES('$firstname','$lastname','$phone',' $email','$creat_at','$username','$password')";

         if(mysqli_query($conn,$sqlinsert))
         {
             $_SESSION['success_username']="Tạo tài khoản thành công !";
             header("location:../index.php");
         }
         else
         {
            header("location:./signup.php");
        }
    }
}

}
}






?>