<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #121212;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }
        .dashboard-card {
            border-radius: 12px;
            padding: 24px;
            background: linear-gradient(145deg, #1f1f1f, #2c2c2c);
            color: gold;
            box-shadow: 0 4px 12px rgba(0,0,0,0.5);
            transition: transform 0.2s;
        }
        .dashboard-card:hover {
            transform: scale(1.02);
        }
        .btn-chess {
            background: gold;
            color: #000;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include './app/views/partials/navbar.php'; ?>
    <div class="container py-5">
        <h2 class="mb-4">Dashboard Admin</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="dashboard-card text-center">
                    <h4>Total Pendaftar</h4>
                    <p class="display-5"><?= $jumlahPendaftar ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card text-center">
                    <h4>Total Coach</h4>
                    <p class="display-5"><?= $jumlahCoach ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card text-center">
                    <h4>Total Admin</h4>
                    <p class="display-5"><?= $jumlahAdmin ?></p>
                </div>
            </div>
        </div>

        <div class="mt-5 text-center">
            <a href="index.php?controller=pendaftar&action=index" class="btn btn-chess me-2">Kelola Pendaftar</a>
            <a href="index.php?controller=coach&action=index" class="btn btn-chess me-2">Kelola Coach</a>
            <a href="index.php?controller=admin&action=index" class="btn btn-chess">Kelola Admin</a>
        </div>
    </div>
</body>
</html>
