<?php

require_once "../models/User.php";

$user = new User(
    1,
    "Tin",
    "tin@gmail.com",
    "123456",
    "0900000000",
    "customer"
);

$user->showInfo();

?>