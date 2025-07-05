<?php
require('../connect.php');
$id = $_GET['id'];

$result = $link->query("SELECT * FROM user WHERE id=$id");
$row = $result->fetch_assoc();

if (!$row) {
    die("Không tìm thấy tài khoản.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $quyen = $_POST['quyen'];

    $stmt = $link->prepare("UPDATE user SET username=?, email=?, sdt=?, diachi=?, quyen=? WHERE id=?");
    $stmt->bind_param("sssssi", $username,$email,$sdt,$diachi,$quyen,$id);
    $stmt->execute();

    header("Location: ../index.php?section=account");
    exit;
}
?>


<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thêm sản phẩm</title>
  <link rel="stylesheet" href="../style_button.css">
</head>
<body>
<h2>Chỉnh sửa tài khoản</h2>
<div class="form-wrapper">
  <form method="post">
    <div class="form-column">
      <label>Username:</label>
      <input name="username" value="<?= $row['username'] ?>">
      <label>Email:</label>
      <input name="email" value="<?= $row['email'] ?>">
      <label>SDT:</label>
      <input name="sdt" value="<?= $row['sdt'] ?>">
      <label>Địa chỉ:</label>
      <textarea name="diachi"><?= $row['diachi'] ?></textarea>
    </div>
    <div class="form-column">
      <label>Quyền:</label>
      <select name="quyen">
        <option value="user" <?= $row['quyen']=='user'?'selected':'' ?>>user</option>
        <option value="admin" <?= $row['quyen']=='admin'?'selected':'' ?>>admin</option>
      </select>
      <label>Ngày tạo:</label>
      <input type="text" value="<?= $row['ngaytao'] ?>" readonly>
    </div>
    <button type="submit">Lưu</button>
  </form>
</div>
</body>