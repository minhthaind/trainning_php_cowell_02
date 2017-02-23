<?php
/**
 * Created by PhpStorm.
 * User: DinhPhong
 * Date: 2/21/2017
 * Time: 1:10 PM
 */

require 'database_table.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_nv($id);
}

// Nếu không có dữ liệu tức không tìm thấy nv cần sửa
if (!$data){
    header("location: nv_list.php");
}

// Nếu người dùng submit form
if (!empty($_POST['edit_nv']))
{
    // Lay data
    $data['first_name']     = isset($_POST['nvfirst_name']) ? $_POST['nvfirst_name'] : '';
    $data['last_name']      = isset($_POST['nvlast_name']) ? $_POST['nvlast_name'] : '';
    $data['phone']          = isset($_POST['nvphone']) ? $_POST['nvphone'] : '';
    $data['email']         = isset($_POST['nvemail']) ? $_POST['nvemail'] : '';
    $data['created_at']         = isset($_POST['nvcreated_at']) ? $_POST['nvcreated_at'] : '';
    $data['updated_at']         = isset($_POST['nvupdated_at']) ? $_POST['nvupdated_at'] : '';
    $data['username']         = isset($_POST['nvusername']) ? $_POST['nvusername'] : '';
    $data['password']         = isset($_POST['nvpassword']) ? $_POST['nvpassword'] : '';
    $data['id']          = isset($_POST['nvid']) ? $_POST['nvid'] : '';

    // Validate thong tin
    $errors = array();
    if (empty($data['first_name'])){
        $errors['first_name'] = 'Chưa nhập tên nv';
    }

    if (empty($data['last_name'])){
        $errors['last_name'] = 'Chưa nhập tên nv';
    }

    if (empty($data['phone'])){
        $errors['phone'] = 'Chưa nhập sđt';
    }

    if (empty($data['email'])){
        $errors['email'] = 'Chưa nhập mail';
    }

    if (empty($data['created_at'])){
        $errors['created_at'] = 'Chưa nhập ngay';
    }

    if (empty($data['updated_at'])){
        $errors['updated_at'] = 'Chưa nhập ngày';
    }

    if (empty($data['username'])){
        $errors['username'] = 'Chưa nhập ten dăng nhập';
    }

    if (empty($data['password'])){
        $errors['password'] = 'Chưa nhập pass';
    }

    // Neu ko co loi thi insert
    if (!$errors){
        edit_nv($data['id'],$data['first_name'], $data['last_name'], $data['phone'], $data['email'],
            $data['created_at'], $data['updated_at'], $data['username'], $data['password']);
        // Trở về trang danh sách
        header("location: nv_list.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Edit </h1>
<a href="nv_list.php">Back</a> <br/> <br/>
<form method="post" action="nv_edit.php?id=<?php echo $data['id']; ?>">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>First_Name</td>
            <td>
                <input type="text" name="nvfirst_name" value="<?php echo $data['first_name']; ?>"/>
                <?php if (!empty($errors['first_name'])) echo $errors['first_name']; ?>
            </td>
        </tr>
        <tr>
            <td>Last_Name</td>
            <td>
                <input type="text" name="nvlast_name" value="<?php echo $data['last_name']; ?>"/>
                <?php if (!empty($errors['last_name'])) echo $errors['last_name']; ?>
            </td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>
                <input type="text" name="nvphone" value="<?php echo $data['phone']; ?>"/>
                <?php if (!empty($errors['phone'])) echo $errors['phone']; ?>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="text" name="nvemail" value="<?php echo $data['email']; ?>"/>
                <?php if (!empty($errors['email'])) echo $errors['email']; ?>
            </td>
        </tr>
        <tr>
            <td>Created_at</td>
            <td>
                <input type="text" name="nvcreated_at" value="<?php echo $data['created_at']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Update_at</td>
            <td>
                <input type="text" name="nvupdated_at" value="<?php echo $data['updated_at']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="nvusername" value="<?php echo $data['username']; ?>"/>
                <?php if (!empty($errors['username'])) echo $errors['username']; ?>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="text" name="nvpassword" value="<?php echo $data['password']; ?>"/>
                <?php if (!empty($errors['password'])) echo $errors['password']; ?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="hidden" name="nvid" value="<?php echo $data['id']; ?>"/>
                <input type="submit" name="edit_nv" value="Lưu"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
