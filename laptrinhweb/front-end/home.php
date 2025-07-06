<?php
include 'connect.php';
$sql = "SELECT id,ten,gia,hinhanh FROM sanpham WHERE loai = 'dog'";
$result = $conn->query($sql);

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = [
        "id" => $row["id"],
        "ten" => $row["ten"],
        "gia" => number_format($row["gia"], 0, ',', '.'),
        "hinhanh" => $row["hinhanh"]
    ];
}
?>
<?php
if (isset($_GET['kg'])) {
    $msg = match ($_GET['kg']) {
        'success' => 'Đăng ký ký gửi thành công!',
        'error1' => 'Có lỗi khi thêm vào cơ sở dữ liệu.',
        'error2' => 'Truy cập không hợp lệ.',
        default => ''
    };
    if ($msg) {
        echo "<script>
            alert('$msg');
        </script>";
    }
}
?>
<style>
    .banner {
        position: relative;
        width: 800px;
        height: 450px;
        margin: 20px auto;
        overflow: hidden;
    }

    .banner img {
        position: absolute;
        opacity: 0;
        width: 800px;
        object-fit: cover;
        transition: opacity 1s ease-in-out;
    }

    .banner img.active {
        opacity: 1;
        z-index: 1;
    }

    .Product>h2 {
        margin: 0px 15%;
        font-family: Roboto;
        font-size: 25px;
        font-weight: bold;
    }

    hr {
        border: 1px solid #ccc;
    }

    .product-flex {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 10%;
    }

    .product-list {
        display: flex;
        flex-wrap: wrap;
        gap: 50px;
        justify-content: center;
    }

    .product-item {
        width: 180px;
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
        background: #f9f9f9;
    }

    .product-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .pagination {
        text-align: center;
        margin-top: 20px;
    }

    .pagination button {
        margin: 0 5px;
        padding: 6px 12px;
        border: none;
        background: #eee;
        cursor: pointer;
    }

    .pagination button.active {
        background: #666;
        color: white;
        font-weight: bold;
    }

    .product-link {
        display: none;
    }

    .prev-btn,
    .next-btn {
        font-size: 24px;
        background: none;
        border: none;
        cursor: pointer;
    }
</style>



<main>
    <!-- Banner -->
    <div class="banner">
        <img src="front-end/img/Banner.png" alt="Banner CUTEPET">
        <img src="front-end/img/Banner2.jpg" alt="Banner CUTEPET">
        <img src="front-end/img/Banner3.png" alt="Banner CUTEPET">
    </div>
    <script>
        const images = document.querySelectorAll('.banner img');
        let a = 0;

        function showNextSlide() {
            images[a].classList.remove('active');
            a = (a + 1) % images.length;
            images[a].classList.add('active');
        }


        images[0].classList.add('active');
        setInterval(showNextSlide, 1000);
    </script>

    <!-- Product -->
    <section class="Product">
        <h2>SẢN PHẨM ĐANG BÁN
            <hr>
        </h2>

        <div class="product-flex">
            <button class="prev-btn">‹</button>
            <div class="product-list" id="product-list">
                <?php foreach ($products as $p): ?>
                    <a href="index.php?page=chitietsp&id=<?= $p["id"] ?>" class="product-link">
                        <div class="product-item">
                            <div><img src="<?= $p["hinhanh"] ?>" alt="<?= $p["ten"] ?>"></div>
                            <h3 class="nameproduct"><?= $p["ten"] ?></h3>
                            <p class="gia">Giá: <?= $p["gia"] ?> VNĐ</p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <button class="next-btn">›</button>
        </div>

        <div class="pagination" id="pagination"></div>
    </section>
</main>

<!-- JS Phân trang -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const itemsPerPage = 10;
        const products = document.querySelectorAll('.product-link');
        const pagination = document.getElementById('pagination');
        const totalPages = Math.ceil(products.length / itemsPerPage);
        let currentPage = 1;

        function showPage(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            products.forEach((item, index) => {
                item.style.display = (index >= start && index < end) ? 'inline-block' : 'none';
            });
            renderPagination();
        }

        function renderPagination() {
            pagination.innerHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.textContent = i;
                btn.className = (i === currentPage) ? 'active' : '';
                btn.onclick = () => {
                    currentPage = i;
                    showPage(currentPage);
                };
                pagination.appendChild(btn);
            }
        }

        document.querySelector('.prev-btn').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        document.querySelector('.next-btn').addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        showPage(currentPage);
    });
</script>