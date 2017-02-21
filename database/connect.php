<?php
//ket noi csdl
$conn = mysqli_connect("127.0.0.1", "root", "") or die("can't connect database");
//chon csdl
mysqli_select_db($conn,"training_php");
session_start();
if (!isset($_SESSION["id"])) {
        echo "
        <div style='position: fixed; top: 15px; right: 15px'>
		    <a href='login.php'> Đăng nhập </a><br />
		    </p>
		</div>";
    } else {
        echo "
        <div style='position: fixed; top: 15px; right: 15px'>
		    Chào:<span style='color:red'> ". $_SESSION["username"]." </span>
		    <a href='logout.php'> Đăng xuất </a><br />
		    </p>
		</div>";
    }
?> 