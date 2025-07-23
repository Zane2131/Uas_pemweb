<!-- app/views/pendaftar/edit.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pendaftar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h2 class="mb-4">Edit Data Pendaftar</h2>
          <form action="index.php?controller=pendaftar&action=update" method="POST">
              <input type="hidden" name="id" value="<?= $pendaftar['id'] ?>">

              <div class="mb-3">
                  <label for="nama" class="form-label">Nama:</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($pendaftar['nama']) ?>" required>
              </div>

              <div class="mb-3">
                  <label for="nim" class="form-label">NIM:</label>
                  <input type="text" name="nim" id="nim" class="form-control" value="<?= htmlspecialchars($pendaftar['nim']) ?>" required>
              </div>

              <div class="mb-3">
                  <label for="fakultas" class="form-label">Fakultas:</label>
                  <input type="text" name="fakultas" id="fakultas" class="form-control" value="<?= htmlspecialchars($pendaftar['fakultas']) ?>" required>
              </div>

              <div class="mb-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($pendaftar['email']) ?>" required>
              </div>

              <div class="mb-3">
                  <label for="alasan" class="form-label">Alasan:</label>
                  <textarea name="alasan" id="alasan" class="form-control" required><?= htmlspecialchars($pendaftar['alasan']) ?></textarea>
              </div>

              <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
              <a href="index.php?controller=pendaftar&action=index" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
</div>
</body>
</html>
