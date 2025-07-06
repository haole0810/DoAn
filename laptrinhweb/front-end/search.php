<?php
require_once 'connect.php';
require_once 'product_template.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$products = [];

if (!empty($search)) {
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE ten LIKE ?");
    $searchTerm = '%' . $search . '%';
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = [
            "id" => $row["id"],
            "name" => $row["ten"],
            "price" => number_format($row["gia"], 0, ',', '.'),
            "image" => $row["hinhanh"]
        ];
    }
}

$breadcrumb = [
    ['name' => 'Trang chủ', 'link' => '/DoAn/laptrinhweb/index.php'],
    ['name' => 'Kết quả tìm kiếm: &nbsp;' . htmlspecialchars($search)]
];
if (!empty($products)) {
    renderProductPage($breadcrumb, $products);
} else {
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
    echo '<div style="text-align:center; margin-top: 50px; min-height: 267px;">';
    echo '<img src="/DoAn/laptrinhweb/front-end/img/cart-empty.webp" alt="không tìm thấy kết quả" style="width: 190px;">';
    echo '<h2>Không tìm thấy kết quả phù hợp.</h2>';
    echo '<p>Vui lòng thử lại với từ khóa khác.</p>';
    echo '</div>';
    echo '</main>';
}
