<?php

require_once "../models/Room.php";

class RoomController {

    private $room;

    public function __construct($conn){
        $this->room = new Room($conn);
    }

    // Lấy tất cả phòng
    public function index(){
        return $this->room->getAllRooms();
    }

    // Lấy phòng theo id
    public function show($id){
        return $this->room->getRoomById($id);
    }

    // Thêm phòng
    public function store($room_name,$type,$price,$capacity){

        if(empty($room_name) || empty($type)){
            return "Thiếu dữ liệu";
        }

        return $this->room->createRoom($room_name,$type,$price,$capacity);
    }

    // Cập nhật phòng
    public function update($id,$room_name,$type,$price,$capacity){

        return $this->room->updateRoom($id,$room_name,$type,$price,$capacity);
    }

    // Xóa phòng
    public function delete($id){
        return $this->room->deleteRoom($id);
    }

}

?>