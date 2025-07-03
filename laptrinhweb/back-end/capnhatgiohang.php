<?php
session_start();
include '../connect.php';
if (isset($_POST['id'], $_POST['soluong'])) {
    $id = $_POST['id'];
    $soluong = max(1, intval($_POST['soluong']));
    $sql = "SELECT soluong FROM sanpham WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $soluong_con = (int)$row['soluong'];

    if ($soluong > $soluong_con) {
        $_SESSION['error'] = "Số lượng yêu cầu vượt quá số lượng còn lại trong kho.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }



    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['soluong'] = $soluong;
    }
}
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
