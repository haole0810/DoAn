<?php
$id = $_GET['id'];
require('../connect.php');
// kiểm tra có tồn tại không
$check = $link->query("SELECT id FROM donhang WHERE id = $id");
if ($check->num_rows == 0) {
    die("Đơn hàng không tồn tại.");
}
$link->query("DELETE FROM donhang WHERE id = $id");
header("Location: index.php?section=order");
exit;
?>