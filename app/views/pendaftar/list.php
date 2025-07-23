<!-- app/views/pendaftar/list.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include '../partials/navbar.php'; ?>
    <?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success mt-3"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>
<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger mt-3"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>📋 Data Pendaftar Club Catur</h3>
        <a href="index.php?controller=auth&action=logout" class="btn btn-danger">Logout</a>
    </div>

    <a href="index.php?controller=pendaftar&action=create" class="btn btn-primary mb-3">+ Tambah Pendaftar</a>

    <div class="container">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Fakultas</th>
                    <th>Email</th>
                    <th>Alasan</th>
                    <th>Coach</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($pendaftar)): ?>
                <?php $no = 1; foreach ($pendaftar as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['nim']) ?></td>
                        <td><?= htmlspecialchars($row['fakultas']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['alasan']) ?></td>
                        <td><?= $row['coach'] ?? '-' ?></td>
                        <td>
                            <a href="index.php?controller=pendaftar&action=edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
                            <a href="index.php?controller=pendaftar&action=delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">🗑️ Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8" class="text-center">Belum ada data pendaftar.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
      </div>
    </div>
</div>
</body>
</html>
