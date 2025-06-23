<?php
header('Content-Type: application/json');

// Kết nối CSDL
$conn = new mysqli('localhost', 'root', '', 'cutepet');
$conn->set_charset("utf8");

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Kết nối CSDL thất bại']);
    exit;
}

// Nhận dữ liệu từ AJAX
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Truy vấn người dùng
$sql = "SELECT * FROM user WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra kết quả
if ($result->num_rows > 0) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Sai tên đăng nhập hoặc mật khẩu']);
}

$conn->close();
