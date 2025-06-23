<?php
require_once SITE_ROOT . 'app/view/render.php';

function login() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // démarre uniquement si pas déjà active
    }

    $error = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Identifiants fixes
        if ($username === 'admin' && $password === 'secret') {
            $_SESSION['admin'] = true;
            header('Location: ' . BASE_URL . 'admin/dashboard');
            exit;
        } else {
            $error = 'Identifiants incorrects';
        }
    }

    render('../../view/admin/login.php', [
        'head_title' => 'Connexion Admin',
        'error' => $error
    ]);
}
