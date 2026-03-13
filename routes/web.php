<?php

require_once "../controllers/UserController.php";
require_once "../controllers/RoomController.php";
require_once "../config/database.php";

$userController = new UserController($conn);
$roomController = new RoomController($conn);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

/*
=====================
USER ROUTES
=====================
*/

if($uri == "/users" && $method == "GET"){

    $result = $userController->index();

    while($row = mysqli_fetch_assoc($result)){
        echo $row['name'] . " - " . $row['email'] . "<br>";
    }

}

elseif($uri == "/users/create" && $method == "POST"){

    $name = $_POST['name'];
    $email = $_POST['email'];

    $userController->store($name,$email);

    echo "Create user success";

}

/*
=====================
ROOM ROUTES
=====================
*/

elseif($uri == "/rooms" && $method == "GET"){

    $result = $roomController->index();

    while($row = mysqli_fetch_assoc($result)){
        echo $row['room_name'] . " - " . $row['type'] . "<br>";
    }

}

elseif($uri == "/rooms/create" && $method == "POST"){

    $room_name = $_POST['room_name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];

    $roomController->store($room_name,$type,$price,$capacity);

    echo "Create room success";

}

else{

    echo "404 Not Found";

}