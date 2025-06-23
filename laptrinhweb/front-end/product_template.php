<?php
function renderProductPage($breadcrumb, $products)
{
    echo '<main>';
    echo '<div class="breadcrumb"><ul>';
    foreach ($breadcrumb as $item) {
        if (isset($item['link'])) {
            echo '<li><a href="' . $item['link'] . '">' . $item['name'] . '&nbsp;<img src="/DoAn/laptrinhweb/front-end/img/left (Stroke).png"></a></li>';
        } else {
            echo '<li>&nbsp;' . $item['name'] . '</li>';
        }
    }
    echo '</ul></div>';

    echo '<section class="Product"><div class="product-flex">';
    echo '<button class="prev-btn">‹</button>';
    echo '<div class="product-list" id="product-list">';

    foreach ($products as $index => $product) {
        echo '<a href="index.php?page=chitietsp&id=' . $product["id"] . '" class="product-link">';
        echo '    <div class="product-item">';
        echo '        <div><img src="' . $product["image"] . '" alt="' . $product["name"] . '"></div>';
        echo '        <h3 class="nameproduct">' . $product["name"] . '</h3>';
        echo '        <p class="gia">Giá: ' . $product["price"] . ' VNĐ</p>';
        echo '    </div>';
        echo '</a>';
    }

    echo '</div>'; // product-list
    echo '<button class="next-btn">›</button>';
    echo '</div><div class="pagination" id="pagination">';
    echo '</div></section></main>';

    // JavaScript và CSS phân trang
    echo <<<EOT
<script>
    const itemsPerPage = 12;
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
</script>

<style>
    .product-link {
        display: none;
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
</style>
EOT;
}
