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
        header("Location: /DoAn/laptrinhweb/index.php?kg=success");
        exit;
    } else {
        header("Location: /DoAn/laptrinhweb/index.php?kg=error1");
        exit;
    }
} else {
    header("Location: /DoAn/laptrinhweb/index.php?kg=error2");
    exit;
}
