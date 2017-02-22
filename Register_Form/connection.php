<?php 
	
    // ket noi csdl
    $conn = mysqli_connect("localhost","root","","my_database");
    mysqli_set_charset($conn,"utf8");
    if(!$conn){
    	die("no find database");
    }
    
 ?>