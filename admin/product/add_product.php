<?php
require('../connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $hinhanh = $_POST['hinhanh'];
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
<h2>Thêm sản phẩm</h2>
<form method="post">
  Tên: <input name="ten"><br>
  Giá: <input name="gia" type="number"><br>
  Ảnh: <input name="hinhanh"><br>
  Loại: <input name="loai"><br>
  Danh mục: <input name="danhmuc"><br>
  Thương hiệu: <input name="thuonghieu"><br>
  Mô tả: <textarea name="mota"></textarea><br>
  Thành phần: <textarea name="thanhphan"></textarea><br>
  Hướng dẫn: <textarea name="huongdan"></textarea><br>
  Số lượng: <input name="soluong" type="number"><br>
  <button type="submit">Lưu</button>
</form>
