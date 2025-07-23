<?php
class PendaftarController {
    public function __construct() {
    }

    private function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    public function index() {
        if (!$this->isAdmin()) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        require __DIR__ . '/../../config/database.php';
        $query = $koneksi->query("SELECT p.*, c.nama AS coach 
                                  FROM pendaftaran p 
                                  LEFT JOIN coach c ON p.coach_id = c.id");
        $pendaftar = $query->fetch_all(MYSQLI_ASSOC);

        require './app/views/pendaftar/list.php';
    }

    public function create() {
        // Formulir ini terbuka untuk semua user login
        require './app/views/pendaftar/create.php';
    }

    public function store() {
        require __DIR__ . '/../../config/database.php';

        $nama = $_POST['nama'] ?? '';
        $nim = $_POST['nim'] ?? '';
        $fakultas = $_POST['fakultas'] ?? '';
        $email = $_POST['email'] ?? '';
        $alasan = $_POST['alasan'] ?? '';

        if (empty($nama) || empty($nim) || empty($fakultas) || empty($email) || empty($alasan)) {
            header("Location: index.php?controller=pendaftar&action=create");
            exit;
        }

        $stmt = $koneksi->prepare("INSERT INTO pendaftaran (nama, nim, fakultas, email, alasan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nama, $nim, $fakultas, $email, $alasan);
        $stmt->execute();

        header("Location: index.php?controller=pendaftar&action=index");
        exit;
    }

    public function edit() {
        if (!$this->isAdmin()) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        require __DIR__ . '/../../config/database.php';
        $id = intval($_GET['id']);
        $stmt = $koneksi->prepare("SELECT * FROM pendaftaran WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $pendaftar = $result->fetch_assoc();

        require './app/views/pendaftar/edit.php';
    }

    public function update() {
        if (!$this->isAdmin()) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        require __DIR__ . '/../../config/database.php';
        $id = intval($_POST['id']);
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $fakultas = $_POST['fakultas'];
        $email = $_POST['email'];
        $alasan = $_POST['alasan'];

        $stmt = $koneksi->prepare("UPDATE pendaftaran SET nama=?, nim=?, fakultas=?, email=?, alasan=? WHERE id=?");
        $stmt->bind_param("sssssi", $nama, $nim, $fakultas, $email, $alasan, $id);
        $stmt->execute();

        header("Location: index.php?controller=pendaftar&action=index");
        exit;
    }

    public function delete() {
        if (!$this->isAdmin()) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        require __DIR__ . '/../../config/database.php';
        $id = intval($_GET['id']);
        $stmt = $koneksi->prepare("DELETE FROM pendaftaran WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        header("Location: index.php?controller=pendaftar&action=index");
        exit;
    }
}
