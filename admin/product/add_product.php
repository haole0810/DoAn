<?php
require('../connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $hinhanh = null;
    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
        $target_dir = "../uploads/";
        $filename = basename($_FILES["hinhanh"]["name"]);
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
          $hinhanh = "uploads/" . $filename;
        } else {
          echo "Upload thất bại.";
          exit;
        }
    }    
    $loai = $_POST['loai'];
    $danhmuc = $_POST['danhmuc'];
    $thuonghieu = $_POST['thuonghieu'];
    $mota = $_POST['mota'];
    $thanhphan = $_POST['thanhphan'];
    $huongdan = $_POST['huongdan'];
    $soluong = $_POST['soluong'];

    $stmt = $link->prepare("INSERT INTO sanpham (ten,gia,hinhanh,loai,danhmuc,thuonghieu,mota,thanhphan,huongdan,soluong) 
                                  VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sisssssssi", $ten,$gia,$hinhanh,$loai,$danhmuc,$thuonghieu,$mota,$thanhphan,$huongdan,$soluong);
    $stmt->execute();

    header("Location: ../index.php?section=product");
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
  <h2>Thêm sản phẩm</h2>
  <div class="form-wrapper">
  <form method="post" enctype="multipart/form-data">
    <div class="form-column">
      <label>Tên</label>
      <input name="ten">
      <label>Giá</label>
      <input name="gia" type="number">
      <label>Ảnh</label>
      <input name="hinhanh" type="file">
      <label>Loại</label>
      <input name="loai">
      <label>Danh mục</label>
      <input name="danhmuc">
      <label>Thương hiệu</label>
      <input name="thuonghieu">
    </div>
    <div class="form-column">
      <label>Mô tả</label>
      <textarea name="mota"></textarea>
      <label>Thành phần</label>
      <textarea name="thanhphan"></textarea>
      <label>Hướng dẫn</label>
      <textarea name="huongdan"></textarea>
      <label>Số lượng</label>
      <input name="soluong" type="number">
    </div>
    <button type="submit">Lưu</button>
  </form>
  </div>
</body>