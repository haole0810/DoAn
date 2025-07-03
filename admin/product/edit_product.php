<?php
require('../connect.php');

$id = $_GET['id'];
$result = $link->query("SELECT * FROM sanpham WHERE id=$id");
$row = $result->fetch_assoc();

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

    $stmt = $link->prepare("UPDATE sanpham SET ten=?,gia=?,hinhanh=?,loai=?,danhmuc=?,thuonghieu=?,mota=?,thanhphan=?,huongdan=?,soluong=? WHERE id=?");
    $stmt->bind_param("sissssssssi", $ten,$gia,$hinhanh,$loai,$danhmuc,$thuonghieu,$mota,$thanhphan,$huongdan,$soluong,$id);
    $stmt->execute();

    header("Location: ../index.php?section=product");
    exit;
}
?>
<h2>Sửa sản phẩm</h2>
<form method="post">
  Tên: <input name="ten" value="<?=$row['ten']?>"><br>
  Giá: <input name="gia" type="number" value="<?=$row['gia']?>"><br>
  Ảnh: <input name="hinhanh" value="<?=$row['hinhanh']?>"><br>
  Loại: <input name="loai" value="<?=$row['loai']?>"><br>
  Danh mục: <input name="danhmuc" value="<?=$row['danhmuc']?>"><br>
  Thương hiệu: <input name="thuonghieu" value="<?=$row['thuonghieu']?>"><br>
  Mô tả: <textarea name="mota"><?=$row['mota']?></textarea><br>
  Thành phần: <textarea name="thanhphan"><?=$row['thanhphan']?></textarea><br>
  Hướng dẫn: <textarea name="huongdan"><?=$row['huongdan']?></textarea><br>
  Số lượng: <input name="soluong" type="number" value="<?=$row['soluong']?>"><br>
  <button type="submit">Lưu</button>
</form>