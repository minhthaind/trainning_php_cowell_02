<?php
// Biến kết nối toàn cục
global $conn;

// Hàm kết nối database
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'users') or die ('Can\'t not connect to database');
        // Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');
    }
}

// Hàm ngắt kết nối
function disconnect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        mysqli_close($conn);
    }
}

// Hàm lấy tất cả nv
function get_all_nv()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả nv
    $sql = "select * from users";

    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);

    // Mảng chứa kết quả
    $result = array();

    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }

    // Trả kết quả về
    return $result;
}

// Hàm lấy nv theo ID
function get_nv($nv_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "select * from users where id = {$nv_id}";

    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);

    // Mảng chứa kết quả
    $result = array();

    // Nếu có kết quả thì đưa vào biến $result
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }

    // Trả kết quả về
    return $result;
}

// Hàm thêm nv
function add_nv($first_name,$last_name,$phone,$email,$created_at,$updated_at, $username, $password)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Chống SQL Injection
    $first_name = addslashes($first_name);
    $last_name = addslashes($last_name);
    $phone = addslashes($phone);
    $email = addslashes($email);
    $created_at = addslashes($created_at);
    $updated_at = addslashes($updated_at);
    $username = addslashes($username);
    $password = addslashes($password);

    // Câu truy vấn thêm
    $sql = "
            INSERT INTO users(first_name,last_name,phone,email,created_at,updated_at, username, password) VALUES
            ('$first_name','$last_name','$phone','$email','$created_at','$updated_at', '$username', '$password')
    ";

    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);

    return $query;
}


// Hàm sửa nv
function edit_nv($nv_id, $first_name,$last_name,$phone,$email,$created_at,$updated_at, $username, $password)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Chống SQL Injection
    $first_name = addslashes($first_name);
    $last_name = addslashes($last_name);
    $phone = addslashes($phone);
    $email = addslashes($email);
    $created_at = addslashes($created_at);
    $updated_at = addslashes($updated_at);
    $username = addslashes($username);
    $password = addslashes($password);

    // Câu truy sửa
    $sql = "
            UPDATE users SET
            first_name = '$first_name',
            last_name = '$last_name',
            phone = '$phone',
            email = '$email',
            created_at = '$created_at',
            updated_at  = '$updated_at',
            username = '$username',
            password  = '$password'
            WHERE id = $nv_id
    ";

    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);

    return $query;
}


// Hàm xóa nv
function delete_nv($nv_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy sửa
    $sql = "
            DELETE FROM users
            WHERE id = $nv_id
    ";

    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);

    return $query;
}