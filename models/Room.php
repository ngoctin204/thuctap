<?php

class Room {

    private $conn;
    private $table = "rooms";

    public function __construct($conn){
        $this->conn = $conn;
    }

    // Lấy tất cả phòng
    public function getAllRooms(){

        $sql = "SELECT * FROM " . $this->table;
        $result = mysqli_query($this->conn, $sql);

        return $result;
    }

    // Lấy phòng theo id
    public function getRoomById($id){

        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    // Thêm phòng
    public function createRoom($room_name, $type, $price, $capacity){

        $sql = "INSERT INTO " . $this->table . "
                (room_name,type,base_price,capacity)
                VALUES
                ('$room_name','$type','$price','$capacity')";

        return mysqli_query($this->conn, $sql);
    }

    // Cập nhật phòng
    public function updateRoom($id, $room_name, $type, $price, $capacity){

        $sql = "UPDATE " . $this->table . "
                SET
                room_name='$room_name',
                type='$type',
                base_price='$price',
                capacity='$capacity'
                WHERE id=$id";

        return mysqli_query($this->conn, $sql);
    }

    // Xóa phòng
    public function deleteRoom($id){

        $sql = "DELETE FROM " . $this->table . " WHERE id=$id";

        return mysqli_query($this->conn, $sql);
    }

}

?>