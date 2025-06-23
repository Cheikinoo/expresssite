<?php
function getPDO(): PDO {
    $host = 'localhost';
    $dbname = 'expresssite';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Erreur connexion DB : ' . $e->getMessage());
    }
}
