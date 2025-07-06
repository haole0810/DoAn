<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUTEPETCUTEPET</title>
    <link rel="stylesheet" href="/DoAn/laptrinhweb/css/resetcss.css">
    <link rel="stylesheet" href="/DoAn/laptrinhweb/css/style.css">
    <style>
        h1 {
            font-weight: bold;

        }

        input {
            width: 450px;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        button {
            align-items: center;
            padding: 16px 20px;
            width: 100%;
            height: 53px;
            background: #ffffffff;
            border-radius: 8px;
            margin: 20px 0;
            display: block;
        }

        button:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        button:active {
            transform: translateY(2px);
        }
    </style>
</head>
<?php
session_start();
include 'connect.php';

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $sql = "SELECT hoten,sdt from user where username='$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $cart = $_SESSION['cart'];
    $tong_phu = 0;
    $tongtien = 0;
    foreach ($_SESSION['cart'] as $id => $sp):
        $tong = $sp['gia'] * $sp['soluong'];
        $tong_phu += $tong;
    endforeach;
    $tongtien = $tong_phu + 20000;
}
?>

<body>
    <header style=" background-color: #FFDE59; display: flex; justify-content: center; height: 135px; ">
        <a href="/DoAn/laptrinhweb/index.php"><img src="/DoAn/laptrinhweb/front-end/img/logo.png" alt="Logo CUTEPETCUTEPET" style="height:100%;"></a>
    </header>
    <main style="display: flex; justify-content: center; align-items: center; gap: 100px; margin-top:0; ">
        <div style="height: 575px; width: 645px"><img src="/DoAn/laptrinhweb/front-end/img/dki.png" style="width:100%; height:100% "></div>
        <div>
            <form class="payment-form" method="POST" action="/DoAn/laptrinhweb/back-end/xulydonhang.php">
                <h1>THÔNG TIN NGƯỜI NHẬN</h1>
                <label for="fullname">Họ và tên:</label>
                <input type="text" id="fullname" name="fullname" placeholder="Nguyễn Văn A" required value="<?= isset($user['hoten']) ? ($user['hoten']) : '' ?>">

                <label for="sdt">Số điện thoại:</label>
                <input type="tel" id="sdt" name="sdt" placeholder="0901234567" required value="<?= isset($user['sdt']) ? ($user['sdt']) : '' ?>">

                <label for="address">Địa chỉ giao hàng:</label>
                <input type="text" id="address" name="address" placeholder="123 Lê Lợi, Quận 1, TP.HCM" required value="<?= isset($user['diachi']) ? ($user['diachi']) : '' ?>">
                <div style="line-height: 30px; margin: 30px 0px;">
                    <div style="display: flex; justify-content: space-between; ">
                        <p>Tổng Phụ:</p>
                        <span><?= number_format($tong_phu, 0, ',', '.') ?> VNĐ</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; ">
                        <p>Phí vận chuyển:</p>
                        <span>20.000 VNĐ</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <p>Tổng tiền:</p>
                        <span><?= number_format($tongtien, 0, ',', '.') ?> VNĐ</span>
                    </div>
                </div>

                <button type="submit">HOÀN TẤT ĐƠN HÀNG</button>
            </form>
            <?php if (!isset($_SESSION['username'])): ?>
                <p>Đã có tài khoản? <a href="/DoAn/laptrinhweb/front-end/dnhap.php">Đăng nhập</a></p>
            <?php endif; ?>

            <p> <a href="index.php?page=giohang">Quay lại giỏ hàng</a></p>
        </div>
    </main>
</body>

</html>