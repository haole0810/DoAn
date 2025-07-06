<?php
    $id = $_GET['id'];
    require('../connect.php');
    $link->query("DELETE FROM user WHERE id=$id");
    header("Location: index.php?section=account");
    exit;
?>