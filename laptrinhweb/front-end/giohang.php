<style>
    .cart-header>div:not(:first-child),
    .cart-item-gia,
    .cart-item-soluong,
    .cart-item-Tong,
    .cart-item-remove {
        text-align: center;
        width: 144px;
        padding: 0 15px;

    }

    .cart-item-gia,
    .cart-item-soluong,
    .cart-item-Tong,
    .cart-item-remove {
        font-size: 14px;
        font-weight: normal;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .infor,
    .cart-item-infor {
        width: calc(100% - 450px);
    }

    .cart-header {
        border: 1px solid #ccc;
        font-size: 15px;
        font-weight: Bold;
        padding: 12px 0;
        background-color: transparent;
        text-transform: uppercase;
        display: flex;
        width: 100%;
        padding-left: 20px;
        font-family: 'Roboto', sans-serif;

    }

    .btn-cart {
        background: none;
        padding: 10px 20px;
        width: 100%;
        margin-top: 20px;
    }

    .goiy {
        width: 180px;
    }

    .product-item {
        width: auto;
        height: auto;
    }

    button:active {
        transform: translateY(2px);
    }

    .product-item>div {
        width: 150px;
        height: 150px;
    }
</style>


<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#error-alert").fadeOut(500);
        }, 4000);
    });
</script>

<?php if (isset($_SESSION['error'])): ?>
    <div id="error-alert" style="background: #f44336; color: white; padding: 12px 20px; border-radius: 4px; text-align: center; position: fixed; top: 100px; left: 50%; transform: translateX(-50%); z-index: 9999;">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    </div>
<?php endif; ?>
<main style="margin: 130px 50px 20px 50px; min-height: 313px;">
    <?php if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])): ?>
        <div style="text-align:center; padding: 50px;">
            <img src="/DoAn/laptrinhweb/front-end/img/cart-empty.webp" alt="giỏ hàng rỗng" style="width: 190px;">
            <h2>Giỏ hàng của bạn đang trống</h2>
        </div>
    <?php else: ?>
        <div class="wrapper" style="display: flex; gap:70px; margin-top : 20px;">
            <div class="cart-container" style="display: flex; flex-direction: column; align-items: center; flex:3;">
                <div class="cart-header">
                    <div class="infor">Sản phẩm</div>
                    <div class="giasp">Giá</div>
                    <div class="soluong">Số lượng</div>
                    <div class="Tong">Tổng </div>
                    <div class="remove"></div>
                </div>
                <?php
                $tong_tien = 0;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
                    foreach ($_SESSION['cart'] as $id => $sp):
                        $tong = $sp['gia'] * $sp['soluong'];
                        $tong_tien += $tong;
                ?>
                        <div class="cart-item" style="display: flex; width: 100%; border: 1px solid #ccc; padding: 10px 0;">
                            <div class="cart-item-infor" style="display: flex; align-items: center; width: calc(100% - 450px); line-height: 30px;">
                                <div style="flex:3; display: flex; justify-content: center; align-items: center;"> <img src="<?php echo $sp['hinhanh']; ?>" class="cart-item-img" style="width: 100px; height: 100px;"></div>
                                <div style="flex:7;">
                                    <h3 class="cart-item-name"><?php echo htmlspecialchars($sp['ten']); ?></h3>
                                    <p class="cart-item-mota">Số lượng: <?php echo $sp['soluong']; ?></p>
                                </div>
                            </div>
                            <div class="cart-item-gia"><?php echo number_format($sp['gia'], 0, ',', '.'); ?>đ</div>
                            <div class="cart-item-soluong">
                                <form action="/DoAn/laptrinhweb/back-end/capnhatgiohang.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="number" name="soluong" value="<?php echo $sp['soluong']; ?>" min="1" class="quantity-input" data-id="<?php echo $id; ?>" style="width: 50px; text-align: center;">
                                </form>
                                <script>
                                    document.querySelectorAll('.quantity-input').forEach(input => {
                                        input.addEventListener('change', function() {
                                            if (parseInt(this.value) < 1 || isNaN(this.value)) {
                                                this.value = 1;
                                            }
                                            this.form.submit();
                                        });
                                    });
                                </script>
                            </div>
                            <div class="cart-item-Tong"><?php echo number_format($tong, 0, ',', '.'); ?>đ</div>
                            <div class="cart-item-remove"><a href="/DoAn/laptrinhweb/back-end/xoa_giohang.php?id=<?php echo $id; ?>" style="color:red; text-decoration:none;">x</a></div>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div style="flex:1;">
                <div style="width: 100%; height: 250px; border: 1px solid #ccc; padding: 20px; ">
                    <div class="cart-footer">
                        <h2 style="    padding: 12px 0; font-weight:bold; font-family: 'Roboto', sans-serif; font-family: system-ui; font-size: 25PX;">TỔNG SỐ TIỀN
                        </h2>
                        <div style="display: flex; justify-content: space-between; font-size:25px;">
                            <p>Tổng tiền:</p>
                            <span><?php echo number_format($tong_tien, 0, ',', '.'); ?> VNĐ</span>
                        </div>
                        <div>
                            <a href="/DoAn/laptrinhweb/index.php?page=thanhtoan"><button class="btn-cart">Thanh toán</button></a>
                            <a href="/DoAn/laptrinhweb/index.php"> <button class="btn-cart">Quay về trang chủ </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>
<?php
if (isset($_GET['tt']) && $_GET['tt'] === 'success') {
    echo "<script>alert('Đặt hàng thành công!');</script>";
}
?>