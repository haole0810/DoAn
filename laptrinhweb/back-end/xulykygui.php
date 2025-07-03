<?php
session_start();
include '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten = $_POST['ten'];
    $sdt = $_POST['phone'];
    $ten_pet = $_POST['tenpet'];
    $giong_loai = $_POST['giongloai'];
    $ngay_gui = $_POST['ngaygui'];
    $ngay_tra = $_POST['ngaytra'];

    // Kiểm tra hợp lệ ngày
    if ($ngay_gui >= $ngay_tra) {
        $_SESSION['error'] = "Ngày trả phải sau ngày gửi!";
        header("Location: /DoAn/laptrinhweb/index.php?page=kygui");
        exit;
    }

    // Chuẩn bị và thực thi truy vấn
    $stmt = $conn->prepare("INSERT INTO kygui (ten_chu, sdt, ten_thucung, giong_loai, ngay_gui, ngay_tra) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $ten, $sdt, $ten_pet, $giong_loai, $ngay_gui, $ngay_tra);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Đăng ký ký gửi thành công!";
        header("Location: /DoAn/laptrinhweb/index.php?page=home");
        exit;
    } else {
        $_SESSION['error'] = "Lỗi khi đăng ký ký gửi. Vui lòng thử lại.";
        header("Location: /DoAn/laptrinhweb/index.php?page=kygui");
        exit;
    }
} else {
    $_SESSION['error'] = "Truy cập không hợp lệ.";
    header("Location: /DoAn/laptrinhweb/index.php");
    exit;
}
