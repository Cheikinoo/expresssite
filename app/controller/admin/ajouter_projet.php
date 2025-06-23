<?php
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../model/projet.php';
require_once __DIR__ . '/../../view/render.php';

function ajouter_projet(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom_commerce'] ?? '';
        $categorie = $_POST['categorie'] ?? '';
        $description = $_POST['description'] ?? '';
        $lien = $_POST['lien_site'] ?? '';
        $image = null;

        // Gestion de l'upload d'image
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['image']['tmp_name'];
            $originalName = basename($_FILES['image']['name']);
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

            // Vérification extension autorisée
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($extension, $allowedExtensions)) {
                // Générer un nom propre
                $slug = preg_replace('/[^a-z0-9]+/i', '-', pathinfo($originalName, PATHINFO_FILENAME));
                $nomFichier = $slug . '-' . time() . '.' . $extension;

                $cheminFinal = SITE_ROOT . 'public/images/' . $nomFichier;

                if (move_uploaded_file($tmpName, $cheminFinal)) {
                    $image = $nomFichier;
                }
            }
        }

        // Enregistrer le projet
        ajouterProjet($nom, $categorie, $description, $image, $lien);

        // Redirection avec message de succès
        header('Location: ' . BASE_URL . 'admin/ajouter_projet?success=1');
        exit;
    }

    // Affichage du formulaire
    render('../admin/ajouter_projet.php', [
        'head_title' => 'Ajouter un projet - ExpressSite',
        'success' => isset($_GET['success']) ? true : false
    ]);
}
