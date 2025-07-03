<?php
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        header("Location: /DoAn/laptrinhweb/front-end/dnhap.php");
        exit;
    }   
?>
<?php require("connect.php") ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="top-bar">Giờ làm việc: 8h00 đến 5h30 (Cả thứ 7 và Chủ Nhật)</div>
        <div class="logo" style="text-align: center; position: relative;}">
            <img src="/DoAn/laptrinhweb/front-end/img/logo.png" alt="Logo CUTEPETCUTEPET" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);width: 150px;object-fit: contain;">
        </div>
        <div class="header-right">
            <div class="info">
                <?php
                $result = $link->query("SELECT * FROM user");
                if ($row = $result->fetch_assoc()) {
                    echo "<p>{$row['username']}</p>";
                    echo "<span>{$row['quyen']}</span>";
                }
                ?>
            </div>
            <a href="../laptrinhweb/back-end/dxuat.php" class="log_out" style="text-decoration: none;">Đăng xuất</a>
        </div>

        <div class="menu">
            <a href="index.php?section=product" class="<?php if (!isset($_GET['section']) || $_GET['section'] == 'product') echo 'active'; ?>">Sản phẩm</a>
            <a href="index.php?section=order" class="<?php if (isset($_GET['section']) && $_GET['section'] == 'order') echo 'active'; ?>">Đơn hàng</a>
            <a href="index.php?section=consignment" class="<?php if (isset($_GET['section']) && $_GET['section'] == 'consignment') echo 'active'; ?>">Đơn ký gửi</a>
            <a href="index.php?section=account" class="<?php if (isset($_GET['section']) && $_GET['section'] == 'account') echo 'active'; ?>">Tài khoản</a>
        </div>

        <div class="content" id="main-content">
            <?php
            $section = $_GET['section'] ?? 'product';

            if ($section === 'product') {
                echo '<div class="content-head">
                <h2>Quản lý sản phẩm</h2>
                <button class="add" onclick="window.location.href=\'product/add_product.php\'">Thêm sản phẩm</button>
                </div>';
                echo '<table>
                        <tr>
                            <th>ID</th> <th>Tên sản phẩm</th> <th>Giá</th> <th>Số lượng</th> <th>Chỉnh sửa</th>
                        </tr>';
                $result = $link->query("SELECT * FROM sanpham");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['ten']}</td>
                    <td>".number_format($row['gia'],0,'.','.')."₫</td>
                    <td>{$row['soluong']}</td>
                    <td>
                        <a href='product/del_product.php?id={$row['id']}' onclick='return confirm(\"Bạn có chắc muốn xóa?\")'>Xóa</a> 
                        | 
                        <a href='product/edit_product.php?id={$row['id']}'>Sửa</a>
                    </td>
                    </tr>";
                }
                echo "</table>";
            } elseif ($section === 'order') {
                echo '<div class="content-head">
                        <h2>Quản lý đơn hàng</h2>
                        </div>';
                echo '<table>
                        <tr>
                            <th>ID</th> <th>ID_User</th> <th>Tổng tiền</th> <th>Ngày đặt</th> <th>Trạng thái</th> <th>Chỉnh sửa</th>
                        </tr>';
                $result = $link->query("SELECT * FROM donhang");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['id_khachvanglai']}</td>
                            <td>" . number_format($row['tong_tien'], 0, '.', '.') . "₫</td>
                            <td>{$row['ngaydat']}</td>
                            <td>{$row['trangthai']}</td>
                            <td>
                                <a href='order/del_order.php?id={$row['id']}' onclick='return confirm(\"Bạn có chắc muốn xóa?\")'>Xóa</a> 
                                | 
                                <a href='order/edit_order.php?id={$row['id']}'>Sửa</a>
                            </td>
                        </tr>";
                }
                echo "</table>";
            } elseif ($section === 'consignment') {
                echo '<div class="content-head"><h2>Quản lý ký gửi</h2></div>';
                echo '<table>
                        <tr>
                            <th>ID</th> <th>Username</th> <th>SĐT</th> <th>Tên thú cưng</th> <th>Giống loài</th> <th>Ngày gửi</th> <th>Ngày trả</th> <th>Ngày tạo</th> <th>Chỉnh sửa</th>
                        </tr>';
                $result = $link->query("SELECT * FROM kygui");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['ten_chu']}</td>
                            <td>{$row['sdt']}</td>
                            <td>{$row['ten_thucung']}</td>
                            <td>{$row['giong_loai']}</td>
                            <td>{$row['ngay_gui']}</td>
                            <td>{$row['ngay_tra']}</td>
                            <td>{$row['ngay_dangky']}</td>
                            <td>
                                <a href='consignment/del_consign.php?id={$row['id']}' onclick='return confirm(\"Bạn có chắc muốn xóa?\")'>Xóa</a> 
                                | 
                                <a href='consignment/edit_consign.php?id={$row['id']}'>Sửa</a>
                            </td>
                        </tr>";
                }
                echo "</table>";
            } elseif ($section === 'account') {
                echo '<div class="content-head"><h2>Quản lý tài khoản</h2></div>';
                echo '<table>
                        <tr>
                            <th>ID</th> <th>Tên người dùng</th> <th>SĐT</th> <th>Email</th> <th>Địa chỉ</th> <th>Quyền hạn</th> <th>Chỉnh sửa</th>
                        </tr>';
                $result = $link->query("SELECT * FROM user");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['sdt']}</td>
                            <td>{$row['diachi']}</td>
                            <td>{$row['quyen']}</td>
                            <td>
                                <a href='account/del_user.php?id={$row['id']}' onclick='return confirm(\"Bạn có chắc muốn xóa?\")'>Xóa</a> 
                                | 
                                <a href='account/edit_user.php?id={$row['id']}'>Sửa</a>
                            </td>
                        </tr>";
                }
                echo "</table>";
            }
            ?>
        </div>
    </div>
</body>
</html>