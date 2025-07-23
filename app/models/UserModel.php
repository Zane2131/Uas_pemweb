<?php
class UserModel {
    private $conn;

    public function __construct() {
        require __DIR__ . '/../../config/database.php';
        $this->conn = $koneksi;
    }

    public function getByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
