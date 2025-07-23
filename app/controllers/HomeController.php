<?php
class HomeController {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        require './app/views/home.php';
    }
}
