<?php
include 'connect.php';
include 'product_template.php';



$sql = "SELECT * FROM sanpham WHERE loai = 'dog'";
$result = $conn->query($sql);


$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = [
        "id" => $row["id"],
        "name" => $row["ten"],
        "price" => number_format($row["gia"], 0, ',', '.'),
        "image" => $row["hinhanh"]
    ];
}


$breadcrumb = [
    ["name" => "Trang chủ", "link" => "/DoAn/laptrinhweb/index.php"],
    ["name" => "Thức ăn cho chó"]
];
?>

<?php renderProductPage($breadcrumb, $products); ?>


