<?php

class User {

    private $conn;
    private $table = "users";

    public function __construct($conn){
        $this->conn = $conn;
    }

    // Lấy tất cả user
     public function getAllUsers() {
        $query = "SELECT * FROM " . $this->table;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // Lấy user theo id
    public function getUserById($id){

        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    // Thêm user
    public function createUser($name, $email){

        $sql = "INSERT INTO " . $this->table . " (name,email)
                VALUES ('$name','$email')";

        return mysqli_query($this->conn, $sql);
    }

    // Cập nhật user
    public function updateUser($id, $name, $email){

        $sql = "UPDATE " . $this->table . "
                SET name='$name', email='$email'
                WHERE id=$id";

        return mysqli_query($this->conn, $sql);
    }

    // Xóa user
    public function deleteUser($id){

        $sql = "DELETE FROM " . $this->table . " WHERE id=$id";

        return mysqli_query($this->conn, $sql);
    }

}

?>