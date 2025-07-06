<?php
    $id = $_GET['id'];
    require('../connect.php');
    $link->query("DELETE FROM kygui WHERE id=$id");
    header("Location: index.php?section=kygui");
    exit;
?>