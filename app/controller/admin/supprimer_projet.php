<?php
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../model/projet.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // 1. Récupérer le projet
    $projet = getProjetById($id);

    // 2. Supprimer l’image physique si elle existe
    if ($projet && !empty($projet['image'])) {
        $cheminImage = SITE_ROOT . 'public/images/' . $projet['image'];
        if (file_exists($cheminImage)) {
            unlink($cheminImage); // Supprimer le fichier image
        }
    }

    // 3. Supprimer le projet en BDD
    supprimerProjet($id);
}

// Redirection propre vers le tableau de bord
header('Location: ' . BASE_URL . 'admin/dashboard');
exit;
