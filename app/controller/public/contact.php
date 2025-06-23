<?php

function contact() {
    $success = false;
    $error = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $email = $_POST['email'] ?? '';
        $telephone = $_POST['telephone'] ?? '';
        $message = $_POST['message'] ?? '';

        if ($nom && $email && $message) {
            require_once __DIR__ . '/../../../config/database.php';
            $pdo = getPDO();
            $stmt = $pdo->prepare("INSERT INTO contacts (nom, email, telephone, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nom, $email, $telephone, $message]);
            $success = true;
        } else {
            $error = "Merci de remplir tous les champs obligatoires.";
        }
    }

    $data = [
        'head_title' => 'Contact - ExpressSite',
        'success' => $success,
        'error' => $error
    ];
    render('contact.php', $data);
}
