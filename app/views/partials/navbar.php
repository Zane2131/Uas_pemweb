<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Club Catur</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
        <?php if (isset($_SESSION['username'])): ?>
          <li class="nav-item"><a class="nav-link" href="#">Hai, <?= $_SESSION['username'] ?></a></li>
          <li class="nav-item"><a class="nav-link" href="index.php?controller=auth&action=logout">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="index.php?controller=auth&action=login">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
