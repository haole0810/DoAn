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
            left: 1140px;
            top: 170px;
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
            margin: 10px 0 5px;
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
    <header style=" background-color: #FFDE59; display: flex; justify-content: center; height: 135px; ">
        <a href="/DoAn/laptrinhweb/index.php"><img src="/DoAn/laptrinhweb/front-end/img/logo.png" alt="Logo CUTEPETCUTEPET" style="height:100%;"></a>
    </header>
    <main style="display: flex; justify-content: center; align-items: center; gap: 100px; margin-top:0; ">
        <div><img src="img/dki.png" style="width:100%; height:100% "></div>
        <div>
            <h1>Đăng kí</h1>
            <form action="" method="post">
                <label for="username">Tên đăng kí:</label>
                <input type="text" id="username" name="username" required>

                <br>

                <label for="email">Nhập mail:</label>
                <input type="email" id="email" name="email" required>

                <br>

                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>

                <br>

                <label for="confirm_password">Nhập lại mật khẩu:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <br>

                <button type="submit">Đăng kí</button>
            </form>
            <p>Đã có tài khoản? <a href="/DoAn/laptrinhweb/front-end/dnhap.php">Đăng nhập</a></p>
        </div>
    </main>
</body>

</html>