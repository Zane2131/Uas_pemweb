<?php
class AuthController {
    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        require __DIR__ . '/../../config/database.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // 1. Cek sebagai admin
            $stmt = $koneksi->prepare("SELECT * FROM admin WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $admin = $result->fetch_assoc();

            if ($admin && password_verify($password, $admin['password'])) {
                $_SESSION['username'] = $admin['username'];
                $_SESSION['role'] = 'admin';
                header("Location: index.php?controller=admin&action=dashboard");
                exit;
            }

            // 2. Cek sebagai user biasa dari tabel users
            $stmt = $koneksi->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = 'user';
                header("Location: index.php?controller=home&action=index");
                exit;
            }

            // 3. Gagal login
            $_SESSION['error'] = "Login gagal. Periksa kembali username dan password Anda.";
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        require './app/views/auth/login.php';
    }

    public function register() {
        require './app/views/auth/register.php';
    }

    public function doRegister() {
        require __DIR__ . '/../../config/database.php';
        session_start();

        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $koneksi->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            header("Location: index.php?controller=auth&action=login");
        } else {
            $_SESSION['error'] = "Gagal registrasi.";
            header("Location: index.php?controller=auth&action=register");
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
    }
}
