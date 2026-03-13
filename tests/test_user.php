<?php

require_once "../config/database.php";
require_once "../models/User.php";

$user = new User($conn);

$result = $user->getAllUsers();

while($row = mysqli_fetch_assoc($result)){
    echo $row['name'] . "<br>";
}

?>