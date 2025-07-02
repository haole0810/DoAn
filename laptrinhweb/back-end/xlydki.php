<?php
header('Content-Type: application/json');

include '../connect.php';
$username = trim($_POST['username']);
$password = md5(trim($_POST['password']));
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$hoten = trim($_POST['hoten']);

// Kiểm tra tài khoản đã tồn tại chưa
$sql_check = "SELECT username FROM user WHERE username = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Tên đăng ký đã tồn tại']);
    exit;
}


// Thêm vào bảng user
$sql_insert = "INSERT INTO user (username, password, email, sdt,hoten) VALUES (?, ?, ?, ?,?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bind_param("sssss", $username, $password, $email, $phone, $hoten);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Lỗi khi thêm vào CSDL']);
}

$conn->close();
