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
            text-align: center;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <script>
        $(document).ready(function() {
            $('#username').on('input', function() {
                var username = $(this).val().trim();
                // Điều kiện: ít nhất 3 ký tự và phải có ít nhất 1 chữ cái
                var dkname = /[A-Za-z]/.test(username);

                if (username === '') {
                    $(this).css('border-color', '');
                    $('#username-error').text('');
                    return;
                }

                if (username.length < 3 || !dkname) {
                    $(this).css('border-color', 'red');
                    $('#username-error').text('Tên đăng nhập phải có ít nhất 3 ký tự và chứa ít nhất 1 chữ cái.');
                } else {
                    $(this).css('border-color', '');
                    $('#username-error').text('');
                }
            });
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                var username = $('#username').val();
                var password = $('#password').val();
                if (!username || !password) {
                    alert('Vui lòng điền đầy đủ thông tin đăng nhập.');
                    return;
                }
                $.ajax({
                    url: '/DoAn/laptrinhweb/back-end/xlydnhap.php',
                    type: 'POST',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        // Xử lý phản hồi từ máy chủ
                        if (response.success) {
                            if (response.role === 'admin') {
                                window.location.href = '/DoAn/admin/index.php';
                            } else {
                                window.location.href = '/DoAn/laptrinhweb/index.php';
                            }
                        } else {
                            alert('Đăng nhập thất bại: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Máy chủ không phản hồi. Vui lòng thử lại sau.');
                    }
                });
            });
        });
    </script>
    <header style=" background-color: #FFDE59; display: flex; justify-content: center; height:135px; ">
        <a href="/DoAn/laptrinhweb/index.php"><img src="/DoAn/laptrinhweb/front-end/img/logo.png" alt="Logo CUTEPETCUTEPET" style="height:100%;"></a>
    </header>
    <main style="display: flex; justify-content: center; align-items: center; gap: 100px; margin-top:0;">
        <div style="height: 620px; width: 645px"><img src="img/dnhap.png" style="width:100%; height:100% "></div>
        <div>
            <form id="loginForm">
                <h1>Đăng nhập</h1>
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username"><br>
                <small id="username-error" style="color:red;"></small>
                <br>
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password">
                <br>
                <button type="submit">Đăng nhập</button>
            </form>
            <p><a href="#">Quên mật khẩu?</a></p>
            <p>Chưa có tài khoản? <a href="/DoAn/laptrinhweb/front-end/dki.php">Đăng ký</a></p>
        </div>
    </main>
</body>

</html>