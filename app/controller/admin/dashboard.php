<?php
require_once SITE_ROOT . 'app/model/projet.php';
require_once SITE_ROOT . 'app/view/render.php';

// Toujours démarrer la session AVANT toute vérification
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérification admin
if (!isset($_SESSION['admin'])) {
    header('Location: ' . BASE_URL . 'admin/login');
    exit;
}

// Timeout session (30 min d’inactivité)
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 1800) {
    session_unset();
    session_destroy();
    header('Location: ' . BASE_URL . 'admin/login?timeout=1');
    exit;
}
$_SESSION['last_activity'] = time();

function dashboard() {
    $projets = getAllProjets();

    render('dashboard.php', [
        'head_title' => 'Tableau de bord - ExpressSite',
        'projets' => $projets
    ], 'admin');
}
