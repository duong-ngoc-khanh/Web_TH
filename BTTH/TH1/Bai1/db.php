<?php
$host = 'localhost'; // Địa chỉ server MySQL
$user = 'root';      // Tên tài khoản MySQL
$password = '';      // Mật khẩu MySQL
$dbname = 'flower_db'; // Tên cơ sở dữ liệu

// Kết nối
$conn = new mysqli($host, $user, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
