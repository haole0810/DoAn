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
            font-family: 'Anton';
            font-size: 65px;
            text-align: center;
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
    <script>
        $(document).ready(function() {
            // Kiểm tra tên đăng ký 
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
                    $('#username-error').text('Tên đăng ký phải có ít nhất 3 ký tự và chứa ít nhất 1 chữ cái.');
                } else {
                    $(this).css('border-color', '');
                    $('#username-error').text('');
                }
            });
            // Kiểm tra mật khẩu khớp
            $('#confirm_password').on('input', function() {
                var password = $('#password').val().trim();
                var confirmPassword = $(this).val().trim();
                if (password !== confirmPassword) {
                    $(this).css('border-color', 'red');
                    $('#confirm-password-error').text('Mật khẩu không khớp.');
                } else {
                    $(this).css('border-color', '#ccc');
                    $('#confirm-password-error').text('');
                }
            });
            // Kiểm tra định dạng email
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
            })
            // Kiểm tra định dạng số điện thoại
            $('#phone').on('blur', function() {
                var phone = $(this).val().trim();
                var phonePattern = /^\d{10}$/; // Giả sử số điện thoại hợp lệ có 10 hoặc 11 chữ số
                if (!phonePattern.test(phone)) {
                    $(this).css('border-color', 'red');
                    $('#phone-error').text('Vui lòng nhập số điện thoại hợp lệ (10 chữ số)');
                } else {
                    $(this).css('border-color', '');
                    $('#phone-error').text('');
                }
            });
            // Xử lý sự kiện gửi form
            $('#dki').on('submit', function(e) {

                e.preventDefault();

                var username = $('#username').val().trim();
                var password = $('#password').val().trim();
                var email = $('#email').val().trim();
                var confirmPassword = $('#confirm_password').val().trim();
                var phone = $('#phone').val().trim();
                // Kiểm tra rỗng
                if (!username || !password || !email || !confirmPassword || !phone) {
                    alert('Vui lòng điền đầy đủ thông tin đăng ký.');
                    return;
                }

                // Nếu hợp lệ → Gửi AJAX
                $.ajax({
                    url: '/DoAn/laptrinhweb/api/dki.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        username: username,
                        password: password,
                        email: email,
                        phone: phone
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Đăng ký thành công!');
                            window.location.href = '/DoAn/laptrinhweb/front-end/thongtincanhan.php';
                        } else {
                            alert('Đăng ký thất bại: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Máy chủ không phản hồi. Vui lòng thử lại sau.');
                    }
                });
            });
        });
    </script>
</head>

<body>
    <header style=" background-color: #FFDE59; display: flex; justify-content: center; height: 135px; ">
        <a href="/DoAn/laptrinhweb/index.php"><img src="/DoAn/laptrinhweb/front-end/img/logo.png" alt="Logo CUTEPETCUTEPET" style="height:100%;"></a>
    </header>
    <main style="display: flex; justify-content: center; align-items: center; gap: 100px; margin-top:0; ">
        <div><img src="img/dki.png" style="width:100%; height:100% "></div>
        <div>
            <form action="" id='dki'>
                <h1>Đăng kí</h1>
                <label for="username">Tên đăng kí:</label>
                <input type="text" id="username" name="username"><br>
                <small id="username-error" style="color:red;"></small>

                <br>

                <label for="email">Nhập mail:</label>
                <input type="email" id="email" name="email"><br>
                <small id="email-error" style="color:red;"></small>

                <br>

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone"><br>
                <small id="phone-error" style="color:red;"></small>
                <br>

                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password">

                <br>

                <label for="confirm_password">Nhập lại mật khẩu:</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <br>
                <small id="confirm-password-error" style="color:red;"></small>

                <br>

                <button type="submit">Đăng kí</button>
            </form>
            <p>Đã có tài khoản? <a href="/DoAn/laptrinhweb/front-end/dnhap.php">Đăng nhập</a></p>
        </div>
    </main>
</body>

</html>