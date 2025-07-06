<?php
  require('../connect.php');
  $id = $_GET['id'];

  $result = $link->query("SELECT * FROM kygui WHERE id=$id");
  $row = $result->fetch_assoc();

  if (!$row) {
      die("Không tìm thấy hồ sơ ký gửi.");
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $ten_chu = $_POST['ten_chu'];
      $sdt = $_POST['sdt'];
      $ten_thucung = $_POST['ten_thucung'];
      $giong_loai = $_POST['giong_loai'];
      $ngay_gui = $_POST['ngay_gui'];
      $ngay_tra = $_POST['ngay_tra'];

      $stmt = $link->prepare("UPDATE kygui SET ten_chu=?, sdt=?, ten_thucung=?, giong_loai=?, ngay_gui=?, ngay_tra=? WHERE id=?");
      $stmt->bind_param("ssssssi", $ten_chu, $sdt, $ten_thucung, $giong_loai, $ngay_gui, $ngay_tra, $id);
      $stmt->execute();

      header("Location: ../index.php?section=kygui");
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
<h2>Chỉnh sửa ký gửi</h2>
<div class="form-wrapper">
  <form method="post">
    <div class="form-column">
      <label>Tên chủ:</label>
      <input name="ten_chu" value="<?= $row['ten_chu'] ?>">

      <label>SĐT:</label>
      <input name="sdt" value="<?= $row['sdt'] ?>">

      <label>Tên thú cưng:</label>
      <input name="ten_thucung" value="<?= $row['ten_thucung'] ?>">

      <label>Giống loài:</label>
      <input name="giong_loai" value="<?= $row['giong_loai'] ?>">
    </div>
    <div class="form-column">
      <label>Ngày gửi:</label>
      <input type="date" name="ngay_gui" value="<?= $row['ngay_gui'] ?>">

      <label>Ngày trả:</label>
      <input type="date" name="ngay_tra" value="<?= $row['ngay_tra'] ?>">
    </div>
    <button type="submit">Lưu</button>
  </form>
</div>
</body>