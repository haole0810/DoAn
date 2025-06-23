<?php
include 'connect.php'; // ✅ Đường dẫn đúng đến file connect.php
include 'product_template.php'; // ✅ File chứa hàm renderProductPage()

// Lấy dữ liệu sản phẩm có loại là 'dog'
$sql = "SELECT * FROM sanpham WHERE loai = 'dog'";
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

// Tạo breadcrumb (dấu đường dẫn)
$breadcrumb = [
    ["name" => "Trang chủ", "link" => "/DoAn/laptrinhweb/index.php"],
    ["name" => "Thức ăn cho chó"]
];
?>

<?php renderProductPage($breadcrumb, $products); ?>


