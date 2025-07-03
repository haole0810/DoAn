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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        // Kiểm tra Tên chủ
        $('#ten').on('input', function() {
            var ten = $(this).val().trim();
            if (ten.length < 2 || !/[A-Za-zÀ-ỹ]/.test(ten)) {
                $(this).css('border-color', 'red');
            } else {
                $(this).css('border-color', '');
            }
        });

        // Kiểm tra SĐT
        $('#phone').on('input', function() {
            var sdt = $(this).val().trim();
            var phonePattern = /^\d{10}$/;
            if (!phonePattern.test(sdt)) {
                $(this).css('border-color', 'red');
                $('#phone-error').text('Số điện thoại phải là 10 chữ số.');
            } else {
                $(this).css('border-color', '');
                $('#phone-error').text('');
            }
        });

        // Kiểm tra Tên thú cưng
        $('#tenpet').on('input', function() {
            var tenpet = $(this).val().trim();
            if (tenpet.length < 2 || !/[A-Za-zÀ-ỹ]/.test(tenpet)) {
                $(this).css('border-color', 'red');
            } else {
                $(this).css('border-color', '');
            }
        });

        // Kiểm tra giống loài
        $('#giongloai').on('input', function() {
            var giong = $(this).val().trim();
            if (giong === '') {
                $(this).css('border-color', 'red');
            } else {
                $(this).css('border-color', '');
            }
        });

        // Kiểm tra ngày gửi và ngày trả
        $('#ngaytra, #ngaygui').on('change', function() {
            var ngaygui = $('#ngaygui').val();
            var ngaytra = $('#ngaytra').val();
            if (ngaygui && ngaytra && ngaygui >= ngaytra) {
                $('#ngaytra').css('border-color', 'red');
            } else {
                $('#ngaytra').css('border-color', '');
            }
        });

    });
</script>



<header style=" background-color: #FFDE59; display: flex; justify-content: center; height:135px;">
    <a href="/DoAn/laptrinhweb/index.php"><img src="/DoAn/laptrinhweb/front-end/img/logo.png" alt="Logo CUTEPETCUTEPET" style="height:100%;"></a>
</header>
<main style="display: flex; justify-content: center; align-items: center; gap: 100px; margin-top:0; ">
    <div style="height: 620px; width: 645px"><img src="/DoAn/laptrinhweb/front-end/img/dnhap.png" style="width:100%; height:100% "></div>
    <div>
        <h1>Ký Gửi</h1>
        <form action="/DoAn/laptrinhweb/back-end/xulykygui.php" method="POST">
            <label for="ten">Tên chủ:</label>
            <input type="text" id="ten" name="ten" required>
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone"><br>
            <small id="phone-error" style="color:red;"></small>
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

</html>