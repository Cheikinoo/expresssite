<?php
// public/index.php
session_start();

// Debug mode
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Définition de la racine du site
define('SITE_ROOT', realpath(__DIR__ . '/../') . '/');

require_once SITE_ROOT . 'config/constants.php';
require_once SITE_ROOT . 'app/view/render.php';
//var_dump('BASE_URL: ' . BASE_URL);                    

// Récupération de l'URL nettoyée
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (BASE_URL !== '/' && str_starts_with($uri, BASE_URL)) {
    $uri = substr($uri, strlen(BASE_URL));
}
$uri_parts = array_values(array_filter(explode('/', trim($uri, '/'))));
//var_dump($uri_parts);
// Zone
// Zone
$zone = 'public';
if (!empty($uri_parts[0]) && $uri_parts[0] === 'admin') {
    $zone = 'admin';
    array_shift($uri_parts);
}

// Contrôleur et action
$controller = $uri_parts[0] ?? 'home';
$action     = $uri_parts[1] ?? $controller;
$id         = $uri_parts[2] ?? null;


// var_dump("ZONE: $zone");
// var_dump("CONTROLLER: $controller");
// var_dump("ACTION: $action");
// var_dump("ID: $id");
// Redirection si admin non connecté (sauf sur login)
if ($zone === 'admin' && $controller !== 'login' && empty($_SESSION['admin'])) {
    header('Location: ' . BASE_URL . 'admin/login');
    exit;
}

$controller_path = SITE_ROOT . "app/controller/{$zone}/{$controller}.php";
//var_dump("PATH: $controller_path");
if (file_exists($controller_path)) {
    require_once $controller_path;
    
    //var_dump($controller_path );
    if (function_exists($action)) {
        call_user_func($action, $id);
    } else {
        http_response_code(404);
        echo "<h2>Fonction introuvable : $action()</h2>";
    }
} else {
    http_response_code(404);
    echo "<h2>Contrôleur introuvable : {$controller}.php</h2>";
} 