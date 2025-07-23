<?php
require_once '../config/database.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/PendaftarController.php';
require_once '../app/controllers/CoachController.php';

$controller = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? 'login';

switch ($controller) {
    case 'auth':
        $auth = new AuthController();
        if ($action === 'login') $auth->login();
        elseif ($action === 'register') $auth->register();
        elseif ($action === 'logout') $auth->logout();
        break;

    case 'pendaftar':
        $pendaftar = new PendaftarController();
        if ($action === 'list') $pendaftar->index();
        elseif ($action === 'edit') $pendaftar->edit();
        elseif ($action === 'delete') $pendaftar->delete();
        break;

    case 'coach':
        $coach = new CoachController();
        if ($action === 'dashboard') $coach->dashboard();
        elseif ($action === 'assign') $coach->assign();
        break;

    default:
        echo "404 - Controller not found";
}
