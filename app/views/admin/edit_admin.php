<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Edit Admin</h2>

    <form method="POST" action="index.php?controller=admin&action=update">
        <input type="hidden" name="id" value="<?= $admin['id'] ?>">

        <div class="mb-3">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($admin['username']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Password Baru (opsional):</label>
            <input type="password" name="password" class="form-control" placeholder="Biarkan kosong jika tidak ingin mengubah">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php?controller=admin&action=index" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
