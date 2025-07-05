<html>
    <head>
        <link rel="stylesheet" href="pagination/style_pagi.css">
    </head>
</html>
<?php
function getPaginationData($link, $table, $pageParam, $limit = 6) {
    // Xác định trang hiện tại
    $page = isset($_GET[$pageParam]) ? (int)$_GET[$pageParam] : 1;
    if ($page < 1) $page = 1;

    // Tổng bản ghi
    $result = $link->query("SELECT COUNT(*) as total FROM $table");
    $row = $result->fetch_assoc();
    $total_records = $row['total'];

    // Tính offset
    $start = ($page - 1) * $limit;

    // Lấy dữ liệu
    $data = $link->query("SELECT * FROM $table ORDER BY id ASC LIMIT $start, $limit");

    // Tổng số trang
    $total_page = ceil($total_records / $limit);

    return [
        'data' => $data,
        'current_page' => $page,
        'total_page' => $total_page
    ];
}

function renderPaginationLinks($pageParam, $current_page, $total_page) {
    echo "<div class='pagination-container'><div class='pagination'";

    // <<
    if ($current_page >= 1) {
        echo "<a href='?section=product&$pageParam=1'>&laquo;</a>";
    }

    // <
    if ($current_page > 1) {
        $prev = $current_page - 1;
        echo "<a href='?section=product&$pageParam=$prev'>&lsaquo;</a>";
    } else {
        echo "<a class='disabled'>&lsaquo;</a>";
    }

    // hiển thị 3 trang trước và 3 trang sau
    $start = max(1, $current_page - 3);
    $end   = min($total_page, $current_page + 3);

    for ($i = $start; $i <= $end; $i++) {
        if ($i == $current_page) {
            echo "<a class='selected'>$i</a>";
        } else {
            echo "<a href='?section=product&$pageParam=$i'>$i</a>";
        }
    }

    // >
    if ($current_page < $total_page) {
        $next = $current_page + 1;
        echo "<a href='?section=product&$pageParam=$next'>&rsaquo;</a>";
    } else {
        echo "<a class='disabled'>&rsaquo;</a>";
    }

    // >>
    if ($current_page < $total_page) {
        echo "<a href='?section=product&$pageParam=$total_page'>&raquo;</a>";
    } else {
        echo "<a class='disabled'>&raquo;</a>";
    }
    echo "</div></div>";
}
?>