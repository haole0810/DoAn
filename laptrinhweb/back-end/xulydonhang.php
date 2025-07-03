<?php
session_start();
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['cart'])) {
    // Kiểm tra dữ liệu đầu vào
    if (!isset($_POST['fullname'], $_POST['sdt'], $_POST['address'])) {
        echo "Thiếu thông tin người nhận.";
        exit;
    }

    $fullname = $_POST['fullname'];
    $sdt = $_POST['sdt'];
    $address = $_POST['address'];

    $tong_tien = 0;
    foreach ($_SESSION['cart'] as $sp) {
        $tong_tien += $sp['gia'] * $sp['soluong'];
    }
    $tong_tien += 30000; // Phí vận chuyển cố định

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Nếu người dùng đã đăng nhập
    if ($user_id) {
        $stmt = $conn->prepare("INSERT INTO donhang (id_nguoidung, tong_tien) VALUES (?, ?)");
        $stmt->bind_param("id", $user_id, $tong_tien);
    } else {
        // Người dùng chưa đăng nhập → tạo khách vãng lai
        $stmt_guest = $conn->prepare("INSERT INTO khach_vang_lai (ten, sdt, diachi) VALUES (?, ?, ?)");
        $stmt_guest->bind_param("sss", $fullname, $sdt, $address);
        $stmt_guest->execute();
        $id_khachvanglai = $stmt_guest->insert_id;

        $stmt = $conn->prepare("INSERT INTO donhang (id_khachvanglai, tong_tien) VALUES (?, ?)");
        $stmt->bind_param("id", $id_khachvanglai, $tong_tien);
    }

    // Thêm đơn hàng
    $stmt->execute();
    $id_donhang = $stmt->insert_id;

    // Ghi chi tiết đơn hàng
    $stmt_ct = $conn->prepare("INSERT INTO chitiet_donhang (id_donhang, id_sanpham, soluong, gia_luc_mua) VALUES (?, ?, ?, ?)");
    foreach ($_SESSION['cart'] as $sp) {
        $stmt_ct->bind_param("iiid", $id_donhang, $sp['id'], $sp['soluong'], $sp['gia']);
        $stmt_ct->execute();
    }

    // Xóa giỏ hàng sau khi đặt
    unset($_SESSION['cart']);

    header("Location: /DoAn/laptrinhweb/index.php?page=giohang&tt=success");
    exit;
} else {
    echo "Dữ liệu không hợp lệ.";
}
