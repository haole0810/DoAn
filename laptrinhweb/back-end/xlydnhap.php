<?php
session_start();
header('Content-Type: application/json');

include '../connect.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$sql = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra kết quả
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (md5($password) === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        setcookie('user_id', $user['id'], time() + (7 * 24 * 60 * 60), '/');
        setcookie('username', $user['username'], time() + (7 * 24 * 60 * 60), '/');
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Sai mật khẩu']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Sai tên đăng nhập hoặc mật khẩu']);
}

$conn->close();
