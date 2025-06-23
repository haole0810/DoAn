<style>
    main {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 110px 130px 10px 130px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

    }

    .muasp {
        display: flex;
        justify-content: space-between;
        line-height: 40px;
        font-size: 20px;
    }

    .muasp img {
        max-width: 300px;
        border-radius: 8px;
    }

    .muasp>div {
        flex-grow: 1;
        margin-left: 20px;
    }

    .tensp {
        font-weight: bold;
        word-wrap: break-word;
        white-space: normal;
        max-width: 100%;
    }


    .tinhtrang,
    .gia,
    label {
        margin-top: 10px;
    }

    .thongtinsp button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }

    .thongtinsp button:active {
        transform: translateY(2px);
    }

    .chitietsp {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        line-height: 30px;
    }

    .imgsp {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .thongtinsp {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        max-width: 500px;
    }

    .imgsp {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .imgsp img {
        display: block;
        width: 300px;
        height: 300px;
    }

    .imgsp .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5em;
        font-weight: bold;
    }

    h1 {
        text-align: center;
        font-size: 20px;
        margin-top: 10px;
        font-weight: bold;
    }

    h3 {
        font-weight: bold;
    }
</style>

<?php
include 'connect.php';

if (!isset($_GET['id'])) {
    echo "Không tìm thấy sản phẩm.";
    exit;
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM sanpham WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Sản phẩm không tồn tại.";
    exit;
}

$product = $result->fetch_assoc();
?>
<main>
    <div class="muasp">
        <div class="imgsp">
            <img src="<?php echo $product['hinhanh']; ?>" alt="Sản phẩm">
            <?php if ($product['soluong'] == 0): ?>
                <div class="overlay">Hết hàng</div>
            <?php endif; ?>
        </div>

        <div class="thongtinsp">
            <p class="tensp"><?php echo $product['ten']; ?></p>
            <p class="tinhtrang">Tình trạng: <?php echo ($product['soluong'] > 0) ? 'Còn hàng' : 'Hết hàng'; ?></p>
            <p class="gia">Giá: <?php echo number_format($product['gia'], 0, ',', '.'); ?>đ</p>
            <div style="display:flex; gap:10px; line-height: 30px;">
                <label for="soluong">Số lượng:</label>
                <input type="number" id="soluong" name="soluong" value="1" min="1" max="<?php echo $product['soluong']; ?>" style="width: 50px;">
            </div>
            <div style="margin-top: 10px;">
                <button type="button">Mua ngay</button>
                <button type="button">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>

    <div class="chitietsp">
        <h2 style="font-family: Roboto; font-size: 25px; font-weight: bold;">Mô tả sản phẩm
            <hr style="border: 1px solid #ccc;">
        </h2>
        <h1><strong><?php echo $product['ten']; ?></strong></h1>
        <p><strong>Thương hiệu:</strong> <?php echo $product['thuonghieu']; ?></p>
        <p><strong>Phù hợp cho:</strong> <?php echo $product['danhmuc']; ?></p>

        <h3>Mô tả</h3>
        <p><?php echo $product['mota']; ?></p>

        <h3>Thành phần</h3>
        <p><?php echo $product['thanhphan']; ?></p>

        <h3>Hướng dẫn sử dụng</h3>
        <p><?php echo $product['huongdan']; ?></p>
    </div>
</main>