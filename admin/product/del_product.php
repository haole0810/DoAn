<?php
    $id = $_GET['id'];
    $page = $_GET['page'];
    require('../connect.php');
    $stmt = $link->prepare("DELETE FROM sanpham WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    header("Location: ../index.php?section=product&page=$page");
    exit;
?>