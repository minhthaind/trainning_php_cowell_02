<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: DinhPhong-->
<!-- * Date: 2/21/2017-->
<!-- * Time: 10:55 AM-->
<!-- */-->
<!DOCTYPE html>
<html>
    <head>
        <title>Xử lý form với POST</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Đăng nhập</h1>
        <form method="post" action="student-list.php">
    Username: <input type="text" name="username" value=""/> <br/> <br/>
            Password: <input type="post" name="password" value=""/> <br/> <br/>
            <input type="submit" name="btn" value="Đang Nhập"/>
        </form>
        <?php
        if ($_POST['btn'])
        {
            // B1: Lấy thông tin
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            // B2: Kiểm tra dữ liệu
            if (!$password || !$username){
                echo 'Bạn chưa nhập đủ thông tin';
            }
            else if ($password != 'phong' || $username != 'phong'){
                echo 'Thông tin đăng nhập bị sai';
            }
            else{
                echo 'Đăng nhập thành công!';
            }
        }
        ?>
</body>
</html>