<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "shop_mysql";
    $con = mysqli_connect($host, $user, $password, $database);
    if (mysqli_connect_errno()) {
        echo "Connection fail: ".mysqli_connect_errno();
        exit;
    }
?>