<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUTEPETCUTEPET</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/resetcss.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/breadcrumb.css">
    <link rel="stylesheet" href="css/product.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body style="font-family: 'Inter'; margin: auto;">

    <?php
    // Lấy tên trang từ URL
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    // Danh sách trang hợp lệ
    $pages = [
        'home' => 'front-end/home.php',
        'gioithieu' => 'front-end/gioithieu.php',
        'dangky' => 'front-end/dki.php',
        'dangnhap' => 'front-end/dnhap.php',
        'foodcat' => 'front-end/foodcat.php',
        'fooddog' => 'front-end/fooddog.php',
        'phukien' => 'front-end/phukien.php',
        'thanhtoan' => 'front-end/thanhtoan.php',
        'kygui' => 'front-end/kygui.php',
        'giohang' => 'front-end/giohang.php',
        'chitietsp' => 'front-end/chitietsp.php',
        'thongtincanhan' => 'front-end/thongtincanhan.php',
        'quenmk' => 'front-end/quenmk.php',
    ];

    // Các trang không cần header và footer
    $noLayoutPages = ['dangnhap', 'dangky', 'kygui', 'thongtincanhan', 'thanhtoan', 'quenmk'];

    if (array_key_exists($page, $pages)) {
        if (!in_array($page, $noLayoutPages)) {
            include 'front-end/header.php';
        } else {
            echo "<!-- Header file not found! -->";
        }

        include $pages[$page];

        if (!in_array($page, $noLayoutPages)) {
            include 'front-end/footer.php';
        } else {
            echo "<!-- Header file not found! -->";
        }
    } else {
        echo "<p style='text-align:center; color:red;'>Không tìm thấy trang yêu cầu.</p>";
    }
    ?>

</body>

</html>