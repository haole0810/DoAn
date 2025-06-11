<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUTEPETCUTEPET</title>
    <link rel="stylesheet" href="/DoAn/laptrinhweb/css/resetcss.css">
    <link rel="stylesheet" href="/DoAn/laptrinhweb/css/style.css">
    <link rel="stylesheet" href="/DoAn/laptrinhweb/css/breadcrumb.css">
    <link rel="stylesheet" href="/DoAn/laptrinhweb/css/product.css">
</head>
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
        font-size: 30px;
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
    }

    .imgsp {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .imgsp img {
        display: block;
        width: 100%;
        height: auto;
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

<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="muasp">
            <div class="imgsp">
                <img src="img/Cát Vệ Sinh Cho Mèo - Cát Đậu Nành ACROPET - TOFU 5L.webp" alt="Sản phẩm">
                <div class="overlay">Hết hàng</div>
            </div>

            <div class="thongtinsp">
                <p class="tensp">Tên sản phẩm</p>
                <p class="tinhtrang">Tình trạng: Còn hàng</p>
                <p class="gia">Giá: 100.000đ</p>
                <div style="display:flex; gap:10px; line-height: 30px; ">
                    <label for="soluong">Số lượng:</label>
                    <input type="number" id="soluong" name="soluong" value="1" min="1" style="width: 50px;">
                </div>
                <div style="margin-top: 10px;">
                    <button type="button">Mua ngay</button>
                    <button type="button">Thêm vào giỏ hàng</button>
                </div>
            </div>
        </div>
        <div class="chitietsp">
            <h2 style="font-family: Roboto;font-size: 25px; font-weight: Bold;">Mô tả sản phẩm
                <hr style="border: 1px solid #ccc;">
            </h2>
            <h1><strong>Thức Ăn Cho Mèo Con Royal Canin Kitten 36</strong> </h1>
            <p><strong>Thương hiệu: Royal Canin</p>
            <p><strong>Phù hợp cho:Mèo con (từ 4 đến 12 tháng tuổi).</p>

            <h3>Mô tả</h3>
            <p>Thức ăn cho mèo Royal Canin Kitten hỗ trợ sức khỏe của mèo con bằng việc cung cấp các chất dinh dưỡng chính xác dựa trên nghiên cứu của các nhà khoa học từ ROYAL CANIN. Trong giai đoạn tăng trưởng, hệ thống tiêu hóa của mèo con chưa phát triển đầy đủ, chính vì vậy ROYAL CANIN Kitten thúc đẩy sự cân bằng hệ vi sinh đường ruột, hỗ trợ sự phát triển khỏe mạnh.</p>

            <h3>Thành phần</h3>
            <p>Protein gia cầm, gạo, protein thực vật*, chất béo động vật, bột bắp, protein động vật, bột lúa mì, gluten bắp,.</p>

            <h3>Hướng dẫn sử dụng</h3>
            <p>Chia làm 2-3 bữa/ngày
                Lượng cho ăn hàng ngày được khuyến nghị (gam mỗi ngày) theo trọng lượng cơ thể (kg) và hình dáng của mèo.
                Khẩu phần ăn hàng ngày có thể thay đổi liên quan đến nhiệt độ môi trường, lối sống của mèo (trong nhà-ngoài trời), tính khí và hoạt động của mèo</p>

        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>