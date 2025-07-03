<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../front-end/dnhap.php");
    exit;
}

require('../connect.php');
$id = $_GET['id'];

// lấy thông tin đơn hàng
$stmt = $link->prepare("SELECT * FROM donhang WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Không tìm thấy đơn hàng.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trangthai = $_POST['trangthai'];

    $stmt = $link->prepare("UPDATE donhang SET trangthai=? WHERE id=?");
    $stmt->bind_param("si", $trangthai, $id);
    $stmt->execute();

    header("Location: ../index.php?section=order");
    exit;
}
?>

<h2>Sửa đơn hàng</h2>
<form method="post">
  Trạng thái:
  <select name="trangthai">
    <option value="choxacnhan" <?=$row['trangthai']=='choxacnhan'?'selected':''?>>Chờ xác nhận</option>
    <option value="danggiao" <?=$row['trangthai']=='danggiao'?'selected':''?>>Đang giao</option>
    <option value="hoanthanh" <?=$row['trangthai']=='hoanthanh'?'selected':''?>>Hoàn thành</option>
    <option value="huy" <?=$row['trangthai']=='huy'?'selected':''?>>Hủy</option>
  </select>
  <button type="submit">Cập nhật</button>
</form>