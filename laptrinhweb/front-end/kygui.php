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
            position: absolute;
            left: 1090px;
            top: 150px;
            font-family: 'Anton';
            font-size: 65px;
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
            font-weight: bold;
        }

        button {
            align-items: center;
            padding: 16px 20px;
            width: 167px;
            height: 53px;
            background: #ffffffff;
            border-radius: 8px;
            margin: 20px 0;
        }

        button:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        button:active {
            transform: translateY(2px);
            /* Tạo hiệu ứng nhấn xuống */
        }
    </style>
</head>

<body>
    <header style=" background-color: #FFDE59; display: flex; justify-content: center; height:135px;">
        <a href="/DoAn/laptrinhweb/index.php"><img src="/DoAn/laptrinhweb/front-end/img/logo.png" alt="Logo CUTEPETCUTEPET" style="height:100%;"></a>
    </header>
    <main style="display: flex; justify-content: center; align-items: center; gap: 100px; margin-top:0; ">
        <div><img src="img/dnhap.png" style="width:100%; height:100% "></div>
        <div>
            <h1>Ký Gửi</h1>
            <form action="">
                <label for="ten">Tên chủ:</label>
                <input type="text" id="ten" name="ten" required>
                <label for="sdt">Số điện thoại:</label>
                <input type="tel" id="sdt" name="sdt" required pattern="[0-9]{10}" title="Vui lòng nhập số điện thoại 10 chữ số">
                <label for="tenpet">Tên thú cưng :</label>
                <input type="text" id="tenpet" name="tenpet" required>
                <label for="giongloai">Giống loài: </label>
                <input type="text" id="giongloai" name="giongloai" required>
                <label for="ngaygui">Ngày gửi</label>
                <input type="date" id="ngaygui" name="ngaygui" required>

                <label for="ngaytra">Ngày trả</label>
                <input type="date" id="ngaytra" name="ngaytra" required>
                <br>
                <button type="submit">Đăng kí</button>
            </form>
        </div>
    </main>
</body>

</html>