<?php

// Kết nối database
$conn = new mysqli("127.0.0.1", "root", "", "wordpress_db", 3307);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ bảng rooms
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hệ thống quản lý phòng</title>

<style>

body{
    font-family: Arial;
    background:#1e1e1e;
    color:white;
    text-align:center;
}

table{
    width:80%;
    margin:auto;
    border-collapse:collapse;
    background:#2b2b2b;
}

th,td{
    padding:10px;
    border:1px solid #444;
}

th{
    background:#333;
}

button{
    padding:8px 15px;
    border:none;
    background:green;
    color:white;
    border-radius:5px;
}

a{
    text-decoration:none;
    padding:5px 10px;
    color:white;
}

.delete{
    background:red;
    padding:5px 10px;
    border-radius:4px;
}

.edit{
    background:orange;
    padding:5px 10px;
    border-radius:4px;
}

</style>

</head>

<body>

<h2>Danh sách phòng</h2>

<br>

<a href="add_room.php">
<button>Thêm phòng</button>
</a>

<br><br>

<table>

<tr>
<th>ID</th>
<th>Tên phòng</th>
<th>Loại phòng</th>
<th>Giá</th>
<th>Sức chứa</th>
<th>Hành động</th>
</tr>

<?php

if ($result && $result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<tr>";

        echo "<td>".$row["room_id"]."</td>";
        echo "<td>".$row["room_name"]."</td>";
        echo "<td>".$row["type_id"]."</td>";
        echo "<td>".$row["base_price"]."</td>";
        echo "<td>".$row["capacity"]."</td>";

        echo "<td>
                <a class='edit' href='edit_room.php?id=".$row["room_id"]."'>Sửa</a>
                <a class='delete' href='delete_room.php?id=".$row["room_id"]."'>Xóa</a>
              </td>";

        echo "</tr>";
    }

}
else{

    echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";

}

?>

</table>

</body>
</html>