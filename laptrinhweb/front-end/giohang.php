<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUTEPETCUTEPET</title>
    <link rel="stylesheet" href="/DoAn/laptrinhweb/css/resetcss.css">
    <link rel="stylesheet" href="/DoAn/laptrinhweb/css/product.css">
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
    </style>
</head>

<body class="giohang">
    <?php include 'header.php'; ?>
    <main style="margin: 130px 10% 20px 10%;">
        <div class="wrapper" style="display: flex; gap:70px; margin-top : 20px;">
            <div class="cart-container" style="display: flex; flex-direction: column; align-items: center; flex:3;">
                <div class="cart-header">
                    <div class="infor">Sản phẩm</div>
                    <div class="giasp">Giá</div>
                    <div class="soluong">Số lượng</div>
                    <div class="Tong">Tổng </div>
                    <div class="remove"></div>
                </div>
                <div class="cart-item" style="display: flex; width: 100%;border: 1px solid #ccc; padding: 10px 0;">

                    <div class="cart-item-infor" style="display: flex; align-items: center; width: calc(100% - 450px); line-height: 30px;">
                        <img src="img/Cát Vệ Sinh Cho Mèo - Cát Đậu Nành ACROPET - TOFU 5L.webp" class="cart-item-img" style="width: 100px; height: 100px;">
                        <div>
                            <h3 class="cart-item-name">Tên sản phẩm</h3>
                            <p class="cart-item-mota">Mô tả sản phẩm</p>
                        </div>
                    </div>
                    <div class="cart-item-gia">Giá</div>
                    <div class="cart-item-soluong">Số lượng</div>
                    <div class="cart-item-Tong">Tổng</div>
                    <div class="cart-item-remove">x</div>
                </div>
            </div>
            <div style="flex:1;">
                <div style="width: 100%; height: 250px; border: 1px solid #ccc; padding: 20px; ">
                    <div class="cart-footer">
                        <h2 style="    padding: 12px 0; font-weight:bold; font-family: 'Roboto', sans-serif; font-family: system-ui; font-size: 25PX;">TỔNG SỐ TIỀN
                        </h2>
                        <div style="display: flex; justify-content: space-between; font-size:25px;">
                            <p>Tổng tiền:</p>
                            <span>100000 VNĐ</span>
                        </div>
                        <div>
                            <button class="btn-cart">Thanh toán</button>
                            <a href="#"> <button class="btn-cart">Quay về trang chủ </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="Product">
            <h2 style="border-bottom: 2px solid black; padding-bottom: 10px;"> CÓ THỂ BẠN QUAN TÂM
            </h2>
            <div class="product-flex">
                <button class="prev-btn">‹</button>
                <div class="product-list" style="grid-template-columns: repeat(5, 1fr);">
                    <a href="#" class="goiy">
                        <div class="product-item">
                            <div><img src="img/Cát Vệ Sinh Cho Mèo - Cát Đậu Nành ACROPET - TOFU 5L.webp" alt="Sản phẩm 1">
                            </div>
                            <h3 class="nameproduct">Sản phẩm 1</h3>
                            <p class="gia">Giá: 500.000 VNĐ</p>
                        </div>
                    </a>

                    <a href="#" class="goiy">
                        <div class="product-item">
                            <div><img src="img/Cát Vệ Sinh Cho Mèo - Cát Đậu Nành ACROPET - TOFU 5L.webp" alt="Sản phẩm 2">
                            </div>
                            <h3 class="nameproduct">Sản phẩm 2</h3>
                            <p class="gia">Giá: 300.000 VNĐ</p>
                        </div>
                    </a>

                    <a href="#" class="goiy">
                        <div class="product-item">
                            <div><img src="img/Cát Vệ Sinh Cho Mèo - Cát Đậu Nành ACROPET - TOFU 5L.webp" alt="Sản phẩm 3">
                            </div>
                            <h3 class="nameproduct">Sản phẩm 3</h3>
                            <p class="gia">Giá: 600.000 VNĐ</p>
                        </div>
                    </a>

                    <a href="#" class="goiy">
                        <div class="product-item">
                            <div><img src="img/Cát Vệ Sinh Cho Mèo - Cát Đậu Nành ACROPET - TOFU 5L.webp" alt="Sản phẩm 4">
                            </div>
                            <h3 class="nameproduct">Sản phẩm 4</h3>
                            <p class="gia">Giá: 400.000 VNĐ</p>
                        </div>
                    </a>
                    <a href="#" class="goiy">
                        <div class="product-item">
                            <div><img src="img/Cát Vệ Sinh Cho Mèo - Cát Đậu Nành ACROPET - TOFU 5L.webp" alt="Sản phẩm 4">
                            </div>
                            <h3 class="nameproduct">Sản phẩm 4</h3>
                            <p class="gia">Giá: 400.000 VNĐ</p>
                        </div>
                    </a>
                </div>
                <button class="next-btn">›</button>
            </div>
        </section>

    </main>
    <?php include 'footer.php'; ?>

</html>