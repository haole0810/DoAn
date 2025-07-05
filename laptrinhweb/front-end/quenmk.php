<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quên Mật Khẩu</title>
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
            padding: 16px 20px;
            width: 167px;
            height: 53px;
            background: #fff;
            border-radius: 8px;
            margin: 20px 0;
            border: 1px solid #ccc;
            font-weight: bold;
        }

        button:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        button:active {
            transform: translateY(2px);
        }

        small {
            color: red;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header style=" background-color: #FFDE59; display: flex; justify-content: center; height:135px; ">
        <a href="/DoAn/laptrinhweb/index.php"><img src="/DoAn/laptrinhweb/front-end/img/logo.png" alt="Logo" style="height:100%;"></a>
    </header>

    <main style="display: flex; justify-content: center; align-items: center; gap: 100px; margin-top: 0px;">
        <div style="height: 620px; width: 645px"><img src="/DoAn/laptrinhweb/front-end/img/dnhap.png" style="width:100%; height:100% "></div>
        <div>
            <form id="quenmkform" style="display: flex; flex-direction: column;">
                <h1>Quên Mật Khẩu</h1>
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username">
                <small id="username-error"></small>

                <label for="email">Nhập email:</label>
                <input type="email" id="email" name="email">
                <small id="email-error"></small>

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone">
                <small id="phone-error"></small>

                <label for="password">Mật khẩu mới:</label>
                <input type="password" id="password" name="password">

                <label for="confirm_password">Nhập lại mật khẩu:</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <small id="confirm-password-error"></small>

                <button type="submit">Xác nhận</button>
            </form>

            <p><a href="/DoAn/laptrinhweb/front-end/dnhap.php">Quay về đăng nhập</a></p>
            <p>Chưa có tài khoản? <a href="/DoAn/laptrinhweb/front-end/dki.php">Đăng ký</a></p>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            // Kiểm tra username
            $('#username').on('input', function() {
                var username = $(this).val().trim();
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

            // Kiểm tra email
            $('#email').on('blur', function() {
                var email = $(this).val().trim();
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email)) {
                    $(this).css('border-color', 'red');
                    $('#email-error').text('Vui lòng nhập địa chỉ email hợp lệ.');
                } else {
                    $(this).css('border-color', '');
                    $('#email-error').text('');
                }
            });

            // Kiểm tra phone
            $('#phone').on('blur', function() {
                var phone = $(this).val().trim();
                var phonePattern = /^\d{10,11}$/;
                if (!phonePattern.test(phone)) {
                    $(this).css('border-color', 'red');
                    $('#phone-error').text('Số điện thoại phải có 10 hoặc 11 chữ số.');
                } else {
                    $(this).css('border-color', '');
                    $('#phone-error').text('');
                }
            });

            // Kiểm tra xác nhận mật khẩu
            $('#confirm_password').on('input', function() {
                var password = $('#password').val().trim();
                var confirmPassword = $(this).val().trim();
                if (password !== confirmPassword) {
                    $(this).css('border-color', 'red');
                    $('#confirm-password-error').text('Mật khẩu không khớp.');
                } else {
                    $(this).css('border-color', '');
                    $('#confirm-password-error').text('');
                }
            });

            // Gửi AJAX để xử lý quên mật khẩu
            $('#quenmkform').on('submit', function(e) {
                e.preventDefault();
                const data = {
                    username: $('#username').val(),
                    email: $('#email').val().trim(),
                    phone: $('#phone').val().trim(),
                    password: $('#password').val()
                };
                $.ajax({
                    url: '/DoAn/laptrinhweb/back-end/xlyquenmk.php',
                    type: 'POST',
                    data: data,
                    success: function(res) {
                        res = res.trim(); // loại bỏ khoảng trắng hoặc dòng thừa

                        if (res === 'success') {
                            alert('Cập nhật mật khẩu thành công!');
                            window.location.href = '/DoAn/laptrinhweb/front-end/dnhap.php';
                        } else if (res === 'not_match') {
                            alert('Email hoặc số điện thoại không đúng với tên đăng nhập.');
                        } else if (res === 'not_found') {
                            alert('Không tìm thấy người dùng với thông tin đã nhập.');
                        } else if (res === 'update_error') {
                            alert('Lỗi khi cập nhật mật khẩu. Vui lòng thử lại sau.');
                        } else {
                            alert('Lỗi không xác định: ' + res);
                        }
                    },
                    error: function() {
                        alert('Không thể kết nối đến máy chủ.');
                    }
                });
            });
        });
    </script>

</body>

</html>