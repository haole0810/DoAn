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

<h2>Sửa hồ sơ ký gửi</h2>
<form method="post">
  Tên chủ: <input name="ten_chu" value="<?=$row['ten_chu']?>"><br>
  SĐT: <input name="sdt" value="<?=$row['sdt']?>"><br>
  Tên thú cưng: <input name="ten_thucung" value="<?=$row['ten_thucung']?>"><br>
  Giống loài: <input name="giong_loai" value="<?=$row['giong_loai']?>"><br>
  Ngày gửi: <input name="ngay_gui" type="date" value="<?=$row['ngay_gui']?>"><br>
  Ngày trả: <input name="ngay_tra" type="date" value="<?=$row['ngay_tra']?>"><br>
  <button type="submit">Cập nhật</button>
</form>
