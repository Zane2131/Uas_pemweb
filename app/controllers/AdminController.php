<?php
class AdminController {
    public function index() {
        require __DIR__ . '/../../config/database.php';
        $query = $koneksi->query("SELECT * FROM admin");
        $admins = $query->fetch_all(MYSQLI_ASSOC);

        require './app/views/admin/list_admin.php';
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
    
        require __DIR__ . '/../../config/database.php';
    
        $jumlahPendaftar = $koneksi->query("SELECT COUNT(*) as total FROM pendaftaran")->fetch_assoc()['total'];
        $jumlahCoach = $koneksi->query("SELECT COUNT(*) as total FROM coach")->fetch_assoc()['total'];
        $jumlahAdmin = $koneksi->query("SELECT COUNT(*) as total FROM admin")->fetch_assoc()['total'];
    
        require './app/views/admin/dashboard.php';
    }
    

    public function create() {
        require './app/views/admin/create_admin.php';
    }

    public function store() {
        require __DIR__ . '/../../config/database.php';

        $username = $_POST['username'] ?? '';
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $koneksi->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        header("Location: index.php?controller=admin&action=index");
        exit;
    }

    public function edit() {
        require __DIR__ . '/../../config/database.php';
        $id = $_GET['id'];
        $stmt = $koneksi->prepare("SELECT * FROM admin WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        require './app/views/admin/edit_admin.php';
    }

    public function update() {
        require __DIR__ . '/../../config/database.php';
    
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if (!empty($password)) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $koneksi->prepare("UPDATE admin SET username = ?, password = ? WHERE id = ?");
            $stmt->bind_param("ssi", $username, $hashed, $id);
        } else {
            $stmt = $koneksi->prepare("UPDATE admin SET username = ? WHERE id = ?");
            $stmt->bind_param("si", $username, $id);
        }
    
        $stmt->execute();
        header("Location: index.php?controller=admin&action=index");
        exit;
    }
    
    public function delete() {
        require __DIR__ . '/../../config/database.php';

        $id = $_GET['id'];
        $stmt = $koneksi->prepare("DELETE FROM admin WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        header("Location: index.php?controller=admin&action=index");
        exit;
    }
}
