<?php
include 'connect.php';
include 'product_template.php'; // File chứa hàm renderProductPage()

$sql = "SELECT * FROM sanpham WHERE loai = 'cat'";
$result = $conn->query($sql);

// Tạo mảng sản phẩm để truyền vào template
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = [
        "id" => $row["id"],
        "name" => $row["ten"],
        "price" => number_format($row["gia"], 0, ',', '.'),
        "image" => $row["hinhanh"]
    ];
}

// Tạo breadcrumb 
$breadcrumb = [
    ["name" => "Trang chủ", "link" => "/DoAn/laptrinhweb/index.php"],
    ["name" => "Thức ăn cho mèo"]
];
?>

<?php renderProductPage($breadcrumb, $products); ?>


</html>