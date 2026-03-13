<?php

class User {

    private $user_id;
    private $name;
    private $email;
    private $password;
    private $phone;
    private $role;
    private $created_at;

    // Constructor
    public function __construct($user_id, $name, $email, $password, $phone, $role, $created_at = null) {

        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->role = $role;
        $this->created_at = $created_at;
    }

    // Getter
    public function getId() {
        return $this->user_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getRole() {
        return $this->role;
    }

    // Setter
    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    // Hiển thị thông tin user
    public function showInfo() {

        echo "User ID: " . $this->user_id . "<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Email: " . $this->email . "<br>";
        echo "Phone: " . $this->phone . "<br>";
        echo "Role: " . $this->role . "<br>";

    }

}

?>