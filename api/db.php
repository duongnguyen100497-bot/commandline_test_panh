<?php
// Cấu hình thông tin kết nối MySQL
$servername = "localhost:3307";   // hoặc 127.0.0.1
$username   = "root";        // tài khoản MySQL
$password   = "";            // mật khẩu (nếu có thì nhập vào)
$database   = "qlthuoc";  // tên CSDL bạn đã tạo

// Kết nối MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra lỗi kết nối
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Kết nối thất bại: " . $conn->connect_error
    ]));
}

// Thiết lập tiếng Việt
$conn->set_charset("utf8");
?>
