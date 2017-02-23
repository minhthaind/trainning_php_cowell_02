<?php
/**
 * Created by PhpStorm.
 * User: DinhPhong
 * Date: 2/21/2017
 * Time: 1:11 PM
 */

require 'database_table.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id){
    delete_nv($id);
}

// Trở về trang danh sách
header("location: nv_list.php");