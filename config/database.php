<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "hotel";
$port = 3306;

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

echo "Kết nối database thành công";

?>