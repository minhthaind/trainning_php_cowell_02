<?php
//chứa các hàm xử lý cơ sở dữ liệu
//
/*define("server_name", "localhost");
define("user_name", "root");
define("password", "");*/
//define("database_name", "databaseformsql");

$conn = mysqli_connect("localhost", "root", "", );
// Check connection
if (!$conn) {
    die("Connection failed: ");
}
//echo "Connected successfully";

function createDatabase()
{

    global $conn;
    $sql  = "CREATE DATABASE myDB";
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: ";
    }
    mysqli_close($conn);
}

//connect();
//createDatabase();
//dis_connect();
// tao table
function createTable()
{
    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "databaseformsql");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // sql to create table

    $sql = " CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
    user_name varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
    email varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
    password varchar(125) COLLATE utf8_unicode_ci NOT NULL,
    confirm_password varchar(256) COLLATE utf8_unicode_ci NOT NULL,
    created_at timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
    updated_at timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
    )";
    //ENGINE = MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE = utf8_unicode_ci ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // echo "Table MyGuests created successfully";
    } else {
        echo "Error creating table: " . mysqli_connect_error();
    }

    mysqli_close($conn);
}

function insert_database($name, $user, $email, $pass, $confirmPass)
{
    //global server_name, user_name, password, database_name;
    // create connection
    global $conn;
    $conn = new mysqli("localhost", "root", "", "databaseformsql");
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO users (name, user_name, email, password,confirm_password)
    VALUES ('$name', '$user', '$email', '$pass','$confirmPass')";

    if ($result = mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_connect_error();
    }

    mysqli_close($conn);
}

//createDatabase();
//dis_connect();
// tao table
//createTable();

//insert_database('thang','thangNT','thang@yahoo.com','123456','123456');
?>