<!-- app/views/home.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Club Catur Universitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #000000, #1c1c1c);
            font-family: 'Montserrat', sans-serif;
            color: #f1f1f1;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .chess-bg {
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.08;
            z-index: 0;
            background: url('https://upload.wikimedia.org/wikipedia/commons/3/3b/Chess_Board.svg') center center/cover no-repeat;
        }
        .content {
            position: relative;
            z-index: 2;
            max-width: 640px;
            margin: 6rem auto;
            padding: 3rem 2rem;
            background: rgba(20, 20, 20, 0.95);
            border: 2px solid #bfa044;
            border-radius: 24px;
            box-shadow: 0 0 16px rgba(255, 215, 0, 0.2);
            text-align: center;
        }
        .chess-icon {
            width: 88px;
            height: auto;
            margin-bottom: 1rem;
            filter: drop-shadow(0 0 6px gold);
        }
        h1 {
            font-weight: 700;
            color: #f5c518;
            text-shadow: 1px 1px 4px #000;
        }
        .lead {
            color: #e0e0e0;
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        .btn-chess {
            background: linear-gradient(90deg, #f5c518, #ffd700);
            color: #1c1c1c;
            font-weight: 700;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
        }
        .btn-chess:hover {
            transform: scale(1.05);
            background: linear-gradient(90deg, #ffd700, #f5c518);
        }
        @media (max-width: 600px) {
            .content {
                margin: 3rem 1rem;
                padding: 2rem 1.25rem;
            }
            .chess-icon {
                width: 64px;
            }
        }
    </style>
</head>
<body>
    <div class="chess-bg"></div>

    <?php include './app/views/partials/navbar.php'; ?>

    <div class="content">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f1/Chess_pdt60.png" alt="Pion Emas" class="chess-icon" />
        <h1 class="mb-3">Club Catur Universitas</h1>
        <p class="lead">Tempat berkumpulnya pecatur terbaik kampus.  
        <br><span style="color: #ffc107;">Asah strategi, menangkan permainan!</span></p>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="index.php?controller=pendaftar&action=index" class="btn btn-chess">Lihat Data Pendaftar</a>
        <?php else: ?>
            <a href="index.php?controller=pendaftar&action=create" class="btn btn-chess">Daftar Sekarang</a>
        <?php endif; ?>
    </div>
</body>
</html>
