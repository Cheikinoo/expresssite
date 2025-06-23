<?php
require_once __DIR__ . '/../../config/database.php';

function getAllProjets(): array {
    $pdo = getPDO();
    $stmt = $pdo->query("SELECT * FROM projets ORDER BY date_ajout DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProjetById(int $id): ?array {
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM projets WHERE id = ?");
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
}

function ajouterProjet(string $nom, string $categorie, string $description, ?string $image, string $lien): void {
    $pdo = getPDO();
    $stmt = $pdo->prepare("INSERT INTO projets (nom_commerce, categorie, description, image, lien_site) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $categorie, $description, $image, $lien]);
}

function modifierProjet(int $id, string $nom, string $categorie, string $description, ?string $image, string $lien): void {
    $pdo = getPDO();
    $stmt = $pdo->prepare("UPDATE projets SET nom_commerce = ?, categorie = ?, description = ?, image = ?, lien_site = ? WHERE id = ?");
    $stmt->execute([$nom, $categorie, $description, $image, $lien, $id]);
}

function supprimerProjet(int $id): void {
    $pdo = getPDO();
    $stmt = $pdo->prepare("DELETE FROM projets WHERE id = ?");
    $stmt->execute([$id]);
}
