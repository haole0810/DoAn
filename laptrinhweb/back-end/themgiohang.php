<?php
session_start();
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_ten = $_POST['product_ten'];
    $product_gia = $_POST['product_gia'];
    $soluong = intval($_POST['soluong']);
    $hinhanh = $_POST['hinhanh'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    // Kiểm tra vượt quá kho
    $sql = "SELECT soluong FROM sanpham WHERE id = $product_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $soluong_con = (int)$row['soluong'];

    $soluong_hienco = isset($_SESSION['cart'][$product_id]) ? $_SESSION['cart'][$product_id]['soluong'] : 0;


    if ($soluong + $soluong_hienco > $soluong_con) {
        header("Location: /DoAn/laptrinhweb/index.php?page=chitietsp&id=$product_id&msg=fail");
        exit;
    }


    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['soluong'] += $soluong;
    } else {
        $_SESSION['cart'][$product_id] = [
            'ten' => $product_ten,
            'gia' => $product_gia,
            'soluong' => $soluong,
            'hinhanh' => $hinhanh
        ];
    }
    header("Location: /DoAn/laptrinhweb/index.php?page=chitietsp&id=$product_id&msg=success");
    exit;
}
