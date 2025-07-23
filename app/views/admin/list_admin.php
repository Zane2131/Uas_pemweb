<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Daftar Admin</h2>

    <a href="index.php?controller=admin&action=create" class="btn btn-success mb-3">+ Tambah Admin</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($admins)): ?>
                <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td><?= htmlspecialchars($admin['id']) ?></td>
                        <td><?= htmlspecialchars($admin['username']) ?></td>
                        <td>
                            <a href="index.php?controller=admin&action=edit&id=<?= $admin['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?controller=admin&action=delete&id=<?= $admin['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus admin ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">Belum ada admin terdaftar.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
