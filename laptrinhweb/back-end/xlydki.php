<?php
header('Content-Type: application/json');

// Kết nối CSDL
$conn = new mysqli('localhost', 'root', '', 'cutepet2');
$conn->set_charset("utf8");

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Kết nối CSDL thất bại']);
    exit;
}

// Nhận dữ liệu từ AJAX
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);

// Kiểm tra tài khoản đã tồn tại chưa
$sql_check = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Tên đăng ký đã tồn tại']);
    exit;
}


// Thêm vào bảng user
$sql_insert = "INSERT INTO user (username, password, email, sdt) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bind_param("ssss", $username, $password, $email, $phone);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Lỗi khi thêm vào CSDL']);
}

$conn->close();
