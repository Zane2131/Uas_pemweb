<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran - Club Catur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: repeating-linear-gradient(
                135deg,
                #232323 0px,
                #232323 40px,
                #2d2d2d 40px,
                #2d2d2d 80px
            );
            color: #f8f9fa;
            position: relative;
        }
        .chessboard-bg {
            position: absolute;
            top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: 0;
            opacity: 0.08;
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/2/2f/Chess_board_opening_staunton.jpg');
            background-size: cover;
            background-position: center;
            filter: grayscale(1) blur(1px);
        }
        .card {
            background: rgba(34, 34, 34, 0.98);
            border: 2px solid #bfa76f;
            border-radius: 18px;
            box-shadow: 0 0 32px 0 rgba(191, 167, 111, 0.15), 0 2px 8px 0 #000;
            z-index: 1;
        }
        .card-header {
            background: linear-gradient(90deg, #bfa76f 0%, #7c6332 100%);
            color: #222;
            border-radius: 16px 16px 0 0;
            border-bottom: 2px solid #bfa76f;
            text-align: center;
            position: relative;
        }
        .card-header .fa-chess-king, .card-header .fa-chess-board {
            color: #fffbe6;
            text-shadow: 0 2px 8px #bfa76f;
        }
        .form-label {
            color: #bfa76f;
            font-weight: 500;
        }
        .form-control {
            background-color: #292929;
            color: #fff;
            border: 1.5px solid #bfa76f;
            border-radius: 8px;
        }
        .form-control:focus {
            border-color: #fffbe6;
            box-shadow: 0 0 0 0.2rem rgba(191, 167, 111, 0.25);
        }
        .btn-chess {
            background: linear-gradient(90deg, #bfa76f 0%, #7c6332 100%);
            color: #222;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            transition: background 0.2s, color 0.2s;
        }
        .btn-chess:hover {
            background: linear-gradient(90deg, #fffbe6 0%, #bfa76f 100%);
            color: #7c6332;
        }
        .chess-divider {
            width: 100%;
            text-align: center;
            margin: 1.5rem 0 1rem 0;
        }
        .chess-divider i {
            color: #bfa76f;
            font-size: 1.5rem;
        }
        .text-chess {
            color: #bfa76f;
        }
        .chess-shadow {
            text-shadow: 0 2px 8px #bfa76f;
        }
        @media (max-width: 500px) {
            .card { border-radius: 10px; }
            .card-header { border-radius: 10px 10px 0 0; }
        }
    </style>
</head>
<body>
    <div class="chessboard-bg"></div>
    <?php include(__DIR__ . '/../partials/navbar.php'); ?>
    <div class="container d-flex justify-content-center align-items-center vh-100 position-relative" style="z-index:1;">
        <div class="card w-100" style="max-width: 520px;">
            <div class="card-header py-4">
                <h2 class="mb-0 chess-shadow">
                    <i class="fas fa-chess-king me-2"></i>
                    <span class="fw-bold">Club Catur</span>
                </h2>
                <div class="chess-divider">
                    <i class="fas fa-chess-board"></i>
                </div>
                <h5 class="mb-0 text-chess">Formulir Pendaftaran Anggota</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($_SESSION['success'])): ?>
                    <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['error'])): ?>
                    <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                <?php endif; ?>

                <form action="index.php?controller=pendaftar&action=store" method="POST" autocomplete="off">
                    <div class="mb-3">
                        <label for="nama" class="form-label"><i class="fas fa-user me-1"></i>Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" required placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label"><i class="fas fa-id-card me-1"></i>NIM</label>
                        <input type="text" name="nim" id="nim" class="form-control" pattern="\d{8,12}" title="NIM harus berupa 8-12 digit angka" required placeholder="Masukkan NIM">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label"><i class="fas fa-university me-1"></i>Fakultas</label>
                        <input type="text" name="fakultas" id="fakultas" class="form-control" required placeholder="Masukkan fakultas">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="fas fa-envelope me-1"></i>Email</label>
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Masukkan email aktif">
                    </div>
                    <div class="mb-3">
                        <label for="alasan" class="form-label"><i class="fas fa-comment-dots me-1"></i>Alasan Bergabung</label>
                        <textarea name="alasan" id="alasan" class="form-control" required placeholder="Ceritakan alasan Anda ingin bergabung"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label"><i class="fas fa-phone me-1"></i>Nomor Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" required placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-chess py-2">
                            <i class="fas fa-chess-knight me-1"></i>Daftar
                        </button>
                        <a href="index.php?controller=pendaftar&action=index" class="btn btn-secondary py-2">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
