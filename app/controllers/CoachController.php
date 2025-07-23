<?php
class CoachController {
    public function assign() {
        require './config/database.php';

        // Ambil data coach & pendaftar
        $coaches = $koneksi->query("SELECT * FROM coach")->fetch_all(MYSQLI_ASSOC);
        $pendaftar = $koneksi->query("SELECT * FROM pendaftaran")->fetch_all(MYSQLI_ASSOC);

        require './app/views/coach/assign.php';
    }

    public function assignSave() {
        require './config/database.php';

        $pendaftar_id = $_POST['pendaftar_id'] ?? null;
        $coach_id = $_POST['coach_id'] ?? null;

        if ($pendaftar_id && $coach_id) {
            $stmt = $koneksi->prepare("UPDATE pendaftaran SET coach_id = ? WHERE id = ?");
            $stmt->bind_param("ii", $coach_id, $pendaftar_id);
            $stmt->execute();
        }

        header("Location: index.php?controller=pendaftar&action=index");
        exit;
    }
}
