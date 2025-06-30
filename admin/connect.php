<?php
    $port = "3306";
    $host = "localhost";
    $user = "root";
    $pass = "12345";
    $dbname = "cutepet2";

    $link = new mysqli($host, $user, $pass, $dbname, $port);
    $link->set_charset("utf8");

    if ($link->connect_error) {
        die("Kết nối thất bại: " . $link->connect_error);
    }
?>
