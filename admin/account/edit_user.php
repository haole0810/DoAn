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

<h2>Sửa tài khoản</h2>
<form method="post">
  Username: <input name="username" value="<?=$row['username']?>"><br>
  Email: <input name="email" value="<?=$row['email']?>"><br>
  SĐT: <input name="sdt" value="<?=$row['sdt']?>"><br>
  Địa chỉ: <textarea name="diachi"><?=$row['diachi']?></textarea><br>
  Quyền:
  <select name="quyen">
    <option value="user" <?=$row['quyen']=='user'?'selected':''?>>user</option>
    <option value="admin" <?=$row['quyen']=='admin'?'selected':''?>>admin</option>
  </select>
  <button type="submit">Cập nhật</button>
</form>