<?php
session_start();
if (!isset($_SESSION['username'])) {
    if (isset($_COOKIE['username'])) {
        $_SESSION['username'] = $_COOKIE['username'];
    } else {
        $_SESSION['username'] = 'guest_' . session_id();
    }
}

$username = $_SESSION['username'];
?>

<header>
    <style>
        header {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .top-bar {
            background-color: #D9D9D9;
            text-align: right;
            line-height: 25px;
        }

        .top-bar a {
            text-decoration: none;
            color: #000000;
            transition: transform 0.2s ease;
        }

        .top-bar a:hover {
            color: #FF0000;
        }

        .top-bar>div {
            display: inline-block;
            width: auto;
            padding-right: 1%;
            min-width: 50px;
        }

        .top-bar>span {
            float: left;
            padding-left: 1%;
            width: auto;
            min-width: 200px;
        }

        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .header-content {
            background-color: #FFDE59;
            position: relative;
        }

        /* <!-- menumenu --> */

        #menu {
            width: 800px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            /* căn giữa các mục menu */
            gap: 100px;
            /* khoảng cách giữa các mục */
        }

        #menu li a {
            text-decoration: none;
            color: #000000;
            font-weight: bold;
            font-family: 'Roboto', sans-serif;
            display: inline-block;
            line-height: 30px;
            transition: transform 0.2s ease;
        }

        #menu li a:hover {
            transform: scale(1.2);
        }

        #menu>li {
            position: relative;
        }

        .submenu {
            display: none;
            position: absolute;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            background-color: #FFFFFFFF;
            border-radius: 5px;
            top: 100%;
            /* nằm ngay dưới li cha */
            left: 50%;
            /* đặt điểm gốc bên trái ở giữa li cha */
            transform: translateX(-50%);
            /* dịch sang trái 50% chiều rộng submenu để căn giữa */
            z-index: 99;
        }

        .submenu li a {
            display: block;
            padding: 5px 10px;
            text-decoration: none;
            color: #000;
            white-space: nowrap;
            font-size: 10px;
            font-weight: 10px;
            font-family: none;
        }

        #menu li:hover .submenu {
            display: block;
        }

        /* logo */
        .logo {
            position: absolute;
            height: 80px;
            overflow: hidden;
            /* cắt phần dư */
            left: 10%
        }

        .logo>img {
            height: 100%;
            width: 100%;
            object-fit: contain;
            margin-left: 0;
        }

        /* thanh tim kiem  */
        .search-bar {
            display: flex;
            gap: 20px;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            padding-top: 10px;
            position: relative;

        }

        .search-bar input[type="text"] {
            width: 500px;
            height: 30px;
            border-radius: 20px;
            border: 1px solid #ccc;
            padding: 5px 40px 5px 10px;
            box-sizing: border-box;
        }

        #btnsearch {
            position: absolute;
            top: 15px;
            right: 610px;
            border: none;
            background: none;
            cursor: pointer;
            transition: transform 0.2s ease;
            z-index: 2;
        }

        #btnsearch img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }

        #btnsearch:hover,
        .cart-button:hover {
            transform: scale(1.2);
        }

        .cart-button {
            position: absolute;
            top: 15px;
            right: 550px;
            background: none;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .cart-button img {
            width: 24px;
            height: 24px;
            object-fit: contain;
            /* Đảm bảo hình không bị méo */
        }
    </style>
    <!-- Top bar với giờ làm việc và đăng nhập/đăng ký -->
    <div class="top-bar">
        <span>Giờ làm việc: 8h00 đến 5h30 (Cả thứ 7 và Chủ Nhật)</span>
        <div class="login-links">
            <?php if (strpos($username, 'guest_') === 0): ?>
                <a href="/DoAn/laptrinhweb/front-end/dnhap.php">Đăng nhập</a> |
                <a href="/DoAn/laptrinhweb/front-end/dki.php">Đăng ký</a>
            <?php else: ?>
                <a href="/DoAn/laptrinhweb/front-end/thongtincanhan.php"><span>Xin chào, <?= htmlspecialchars($username) ?></span></a> |
                <a href="/DoAn/laptrinhweb/back-end/dxuat.php">Đăng xuất</a>
            <?php endif; ?>
        </div>
    </div>
    <!--Nội dung header -->
    <div class="header-content">
        <div class="logo">
            <img src="/DoAn/laptrinhweb/front-end/img/logo.png" alt="Logo CUTEPETCUTEPET">
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Bạn cần tìm gì?">
            <button type="submit" id="btnsearch"><img src="/DoAn/laptrinhweb/front-end/img/search.png" alt="tìm"></button>
            <button class="cart-button" aria-label="Mở giỏ hàng">
                <img src="/DoAn/laptrinhweb/front-end/img/cart.png" alt="Giỏ hàng">
            </button>
        </div>
        <nav>
            <ul id="menu">
                <li><a href="/DoAn/laptrinhweb/index.php">TRANG CHỦ</a></li>
                <li><a href="/DoAn/laptrinhweb/index.php?page=gioithieu">GIỚI THIỆU</a></li>
                <li><a href="#">SẢN PHẨM</a>
                    <ul class="submenu">
                        <li><a href="/DoAn/laptrinhweb/index.php?page=fooddog">Thức ăn cho chó</a></li>
                        <li><a href="/DoAn/laptrinhweb/index.php?page=foodcat">Thức ăn cho mèo</a></li>
                        <li><a href="/DoAn/laptrinhweb/index.php?page=phukien">Phụ kiện</a></li>
                    </ul>
                </li>
                <li><a href="/DoAn/laptrinhweb/index.php?page=kygui">KÝ GỬI</a></li>

            </ul>
        </nav>
    </div>
</header>