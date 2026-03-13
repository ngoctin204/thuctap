<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "wordpress_db";
$port = 3307;

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

echo "Kết nối database thành công";

?>