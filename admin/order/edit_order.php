<?php
    require('../connect.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id']);
        $trangthai = $_POST['trangthai'];

        $stmt = $link->prepare("UPDATE donhang SET trangthai=? WHERE id=?");
        $stmt->bind_param("si", $trangthai, $id);
        $stmt->execute();
        
        header("Location: ../index.php?section=order");
        exit;
    }
?>