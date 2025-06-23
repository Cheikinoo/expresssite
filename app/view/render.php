<?php

function render(string $partial, array $data = [], string $zone = 'public'): void
{
    $skeletonPath = SITE_ROOT . "app/view/$zone/index.php";
    $partialPath = SITE_ROOT . "app/view/$zone/$partial";

    if (!file_exists($skeletonPath) || !file_exists($partialPath)) {
        http_response_code(500);
        echo "Template manquant.";
        return;
    }

    extract($data);

    // Générer le contenu de la vue partielle
    ob_start();
    include $partialPath;
    $partialContent = ob_get_clean();

    // Générer le layout principal avec exécution PHP
    ob_start();
    include $skeletonPath;
    $skeleton = ob_get_clean();

    // Remplacement des marqueurs
    if (isset($data['head_title'])) {
        $skeleton = str_replace('%%HEAD_TITLE%%', $data['head_title'], $skeleton);
    }

    $skeleton = str_replace('%%MAIN_CONTENT%%', $partialContent, $skeleton);

    // Affichage final
    echo $skeleton;
}
