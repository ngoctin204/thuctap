<?php

require_once "../models/User.php";

class UserController {

    private $user;

    public function __construct($conn){
        $this->user = new User($conn);
    }

    // Lấy tất cả user
    public function index(){
        return $this->user->getAllUsers();
    }

    // Lấy user theo id
    public function show($id){
        return $this->user->getUserById($id);
    }

    // Thêm user
    public function store($name,$email){

        if(empty($name) || empty($email)){
            return "Thiếu dữ liệu";
        }

        return $this->user->createUser($name,$email);
    }

    // Cập nhật user
    public function update($id,$name,$email){

        if(empty($name) || empty($email)){
            return "Thiếu dữ liệu";
        }

        return $this->user->updateUser($id,$name,$email);
    }

    // Xóa user
    public function delete($id){
        return $this->user->deleteUser($id);
    }

}

?>