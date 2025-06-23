<?php
require_once __DIR__ . '/../../model/projet.php';

function projets(): void {
    $projets = getAllProjets();

   
    $data = [
        'head_title' => 'Nos Réalisations - ExpressSite',
        'projets' => $projets
    ];

    render('projets.php', $data);
}
