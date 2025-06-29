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

            // Envoi à ta boîte pro
            $to = "contact@expresssite.be";
            $sujet = "=?UTF-8?B?" . base64_encode("Nouveau message de contact ExpressSite") . "?=";
            $contenu = "Nom : $nom\nEmail : $email\nTéléphone : $telephone\n\nMessage :\n$message";
            $headers  = "From: \"$nom\" <$email>\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            mail($to, $sujet, $contenu, $headers);

            // Envoi à l'utilisateur
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sujet_user = "Merci pour votre message - ExpressSite";
                $contenu_user = "Bonjour $nom,\n\nMerci pour votre message, nous avons bien reçu votre demande. Nous vous répondrons au plus vite !\n\n---\nVotre message :\n$message\n\nL’équipe ExpressSite";
                $headers_user  = "From: ExpressSite <contact@expresssite.be>\r\n";
                $headers_user .= "Reply-To: contact@expresssite.be\r\n";
                $headers_user .= "Content-Type: text/plain; charset=UTF-8\r\n";

                mail($email, $sujet_user, $contenu_user, $headers_user);
            }

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
