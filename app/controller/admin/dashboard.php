<?php
require_once SITE_ROOT . 'app/model/projet.php';
require_once SITE_ROOT . 'app/view/render.php';

function dashboard() {
    
    if (!isset($_SESSION['admin'])) {
        header('Location: ' . BASE_URL . 'admin/login');
        exit;
    }

    $projets = getAllProjets();

    render('dashboard.php', [
        'head_title' => 'Tableau de bord - ExpressSite',
        'projets' => $projets
    ], 'admin'); // ← zone admin bien spécifiée
}
