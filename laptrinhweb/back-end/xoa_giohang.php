<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
        header("Location: /DoAn/laptrinhweb/index.php?page=giohang&msg=success");
        exit;
    } else {
        header("Location: /DoAn/laptrinhweb/index.php?page=giohang&msg=notfound");
        exit;
    }
}
