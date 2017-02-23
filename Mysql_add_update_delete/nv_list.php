<?php
/**
 * Created by PhpStorm.
 * User: DinhPhong
 * Date: 2/21/2017
 * Time: 1:10 PM
 */

require 'database_table.php';
$nv = get_all_nv();
disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Person list</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Person list</h1>
<a href="nv_add.php">ADD</a> <br/> <br/>
<table width="100%" border="1" cellspacing="0" cellpadding="10">
    <tr>
        <td>ID</td>
        <td>First_Name</td>
        <td>Last_Name</td>
        <td>Phone</td>
        <td>Email</td>
        <td>Created_at</td>
        <td>Update_at</td>
        <td>Username</td>
        <td>Password</td>
    </tr>
    <?php foreach ($nv as $item){ ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['first_name']; ?></td>
            <td><?php echo $item['last_name']; ?></td>
            <td><?php echo $item['phone']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td><?php echo $item['created_at']; ?></td>
            <td><?php echo $item['updated_at']; ?></td>
            <td><?php echo $item['username']; ?></td>
            <td><?php echo $item['password']; ?></td>
            <td>
                <form method="post" action="nv_delete.php">
                    <input onclick="window.location = 'nv_edit.php?id=<?php echo $item['id']; ?>'" type="button" value="Edit"/>
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                    <input onclick="return confirm('Have you want to delete?');" type="submit" name="delete" value="Delete"/>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
