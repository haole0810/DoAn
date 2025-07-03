<?php
session_start();
session_unset();
session_destroy();

setcookie('username', '', time() - 1, '/');
setcookie('user_id', '', time() - 1, '/');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng xuất</title>
    <script>
        setTimeout(() => {
            window.location.href = "/DoAn/laptrinhweb/index.php";
        }, 500);
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff7cc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h2 {
            color: #d97706;
        }
    </style>
</head>

<body>
    <h2>Đang đăng xuất...</h2>
    <p>Bạn sẽ được chuyển về trang chủ sau vài giây.</p>
</body>

</html>