<?php
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../model/projet.php';
require_once __DIR__ . '/../../view/render.php';

if (!isset($_GET['id'])) {
    header('Location: ' . BASE_URL . 'admin/dashboard');
    exit;
}

$id = (int) $_GET['id'];
$projet = getProjetById($id);

if (!$projet) {
    echo "Projet introuvable.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom_commerce'] ?? '';
    $categorie = $_POST['categorie'] ?? '';
    $description = $_POST['description'] ?? '';
    $lien = $_POST['lien_site'] ?? '';
    $image = $projet['image']; // conserver l'image existante par défaut

    // Nouveau fichier image ? On l'upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['image']['tmp_name'];
        $originalName = basename($_FILES['image']['name']);
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($extension, $allowed)) {
            $slug = preg_replace('/[^a-z0-9]+/i', '-', pathinfo($originalName, PATHINFO_FILENAME));
            $imageName = $slug . '-' . time() . '.' . $extension;
            $cheminFinal = SITE_ROOT . 'public/images/' . $imageName;

            if (move_uploaded_file($tmpName, $cheminFinal)) {
                $image = $imageName;
            }
        }
    }

    modifierProjet($id, $nom, $categorie, $description, $image, $lien);
    header('Location: ' . BASE_URL . 'admin/dashboard');
    exit;
}

render('../admin/modifier_projet.php', [
    'head_title' => 'Modifier un projet',
    'projet' => $projet
]);
