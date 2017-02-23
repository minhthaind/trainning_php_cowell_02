
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: DinhPhong-->
<!-- * Date: 2/21/2017-->
<!-- * Time: 1:10 PM-->
<!-- */-->

<html>
<head>
    <title>Trang đăng nhập</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Public/css/bootstrap.min.css" type="text/css">
    <script src="Public/js/bootstrap.min.js"></script>
</head>
<body>

<?php
//Gọi file connection.php ở bài trước
//require_once("/connect.php");
// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
if (isset($_POST["btn_submit"])) {
    // lấy thông tin người dùng
    $username = $_POST["username"];
    $password = $_POST["password"];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" || $password =="") {
        //echo "username hoặc password bạn không được để trống!";
        echo "<script type='text/javascript'>alert('username hoặc password bạn không được để trống!');</script>";
    }else{
        $sql = "select * from admin where username = '$username' and password = '$password' ";
        $query = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
            echo "<script type='text/javascript'>alert('Sai roi');</script>";
        }else{
            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
            $_SESSION['username'] = $username;
            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            header('Location: main.php');
        }
    }
}
?>
<div class="container">
    <form method="POST" action="nv_list.php" class="form-horizontal">
        <fieldset>
            <legend align="center">Đăng nhập</legend>
            <div class="form-group" align="center">
                <table>
                    <tr>
                        <td class="control-label">Username</td>
                        <td><input type="text" class="form-control" name="username" size="30"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" class="form-control" name="password" size="30"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"> <input name="btn_submit" class=" btn btn-default" type="submit" value="Đăng nhập"></td>
                    </tr>
                </table>

            </div>
        </fieldset>
    </form>

</div>
</body>
</html>