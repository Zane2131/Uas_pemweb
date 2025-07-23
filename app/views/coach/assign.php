<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Assign Coach</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="mb-4">Assign Coach ke Pendaftar</h3>
    <form method="POST" action="index.php?controller=coach&action=assignSave">
        <div class="mb-3">
            <label for="pendaftar_id" class="form-label">Pendaftar</label>
            <select name="pendaftar_id" id="pendaftar_id" class="form-control" required>
                <?php foreach ($pendaftar as $p): ?>
                    <option value="<?= $p['id'] ?>"><?= $p['nama'] ?> (<?= $p['nim'] ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="coach_id" class="form-label">Coach</label>
            <select name="coach_id" id="coach_id" class="form-control" required>
                <?php foreach ($coaches as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['nama'] ?> (<?= $c['keahlian'] ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-dark">Simpan</button>
        <a href="index.php?controller=pendaftar&action=index" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
