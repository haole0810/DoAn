<?php
include '../connect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$phone = $_POST['phone'];

$sql = "SELECT * FROM user WHERE username = ? AND email = ? AND sdt = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $phone);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Kiểm tra email và phone có đúng với username không
    if ($user['email'] === $email && $user['sdt'] === $phone) {
        // Cập nhật mật khẩu
        $update_sql = "UPDATE user SET password = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("si", $password, $user['id']);

        if ($update_stmt->execute()) {
            echo 'success';
        } else {
            echo 'update_error';
        }
    } else {
        echo 'not_match';
    }
} else {
    echo 'not_found';
}
