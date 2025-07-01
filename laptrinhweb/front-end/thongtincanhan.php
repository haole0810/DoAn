<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUTEPETCUTEPET</title>
    <link rel="stylesheet" href="/DoAn/laptrinhweb/css/resetcss.css">
</head>


<body>
    <header>
        <style>
            * {
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
            }

            /* logo */
            #logo {
                float: left;
                width: 30%;
                height: 200px;
                overflow: hidden;
                background-color: #FFDE59;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            #dxuat {
                background: none;
                padding: 20px;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                font-weight: bold;

            }

            main {
                margin-top: 0px;
            }

            #menu {
                float: left;
                width: 30%;
                height: 300px;
                overflow: hidden;
                background-color: #F4A261;
                display: flex;
                flex-direction: column;
                gap: 20px;
                justify-content: center;
                align-items: center;
                font-size: 20px;
            }

            a {
                all: unset;
            }

            #menu div {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 8px;
            }

            #menu a {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 8px;
            }

            #thongtin-canhan {
                background-color: #fff9e6;
                border: 1px solid #ffd966;
                border-radius: 10px;
                padding: 20px 25px;
                width: 100%;
                max-width: 500px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin-top: 20px;
                margin-bottom: 50px;
            }

            #thongtin-canhan h3 {
                color: #d97706;
                font-size: 22px;
                margin-bottom: 15px;
                border-bottom: 2px solid #ffd966;
                padding-bottom: 5px;
            }

            #thongtin-canhan p {
                margin: 8px 0;
                font-size: 16px;
                color: #333;
            }

            #thongtin-canhan p strong {
                width: 130px;
                display: inline-block;
                color: #555;
            }
        </style>
    </header>
    <?php include 'connect.php';
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: /DoAn/laptrinhweb/front-end/dnhap.php');
        exit();
    }
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    ?>

    <main>
        <div style="overflow: hidden;">
            <div id="logo">
                <img src="/DoAn/laptrinhweb/front-end/img/logo.png" alt="Logo CUTEPETCUTEPET">
            </div>
            <div style="float: left;height: 200px;width: 70%;background-color: #FFF0B5; display: flex;align-items: center; justify-content: space-between;padding: 0 100px;">
                <div>Khách Hàng: Trần Văn C</div>
                <button id="dxuat">Đăng xuất</button>
            </div>
            <div id="menu">
                <div>
                    <div><a href="/DoAn/laptrinhweb/index.php"><img src="/DoAn/laptrinhweb/front-end/img/home.png"> Trang chủ</a></div>
                </div>
                <div>
                    <div><img src="/DoAn/laptrinhweb/front-end/img/user1.png"> Thông tin </div>
                </div>
            </div>
            <div style="float: left;
                height: 300px;
                width: 70%;
                background-color: #FFFAE4;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 0 100px;">
                <div id="thongtin-canhan">
                    <h3>Thông tin cá nhân</h3>
                    <p><strong>Họ tên:</strong> Trần Văn C</p>
                    <p><strong>Số điện thoại:</strong> 0901234567</p>
                    <p><strong>Email:</strong> tranvanc@example.com</p>
                    <p><strong>Giới tính:</strong> Nam</p>
                    <p><strong>Ngày sinh:</strong> 01/01/2000</p>
                    <p><strong>Địa chỉ:</strong> 123 Đường ABC, Quận 1, TP.HCM</p>
                </div>
            </div>
        </div>
    </main>
    <div>
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>