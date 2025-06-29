<?php
function login() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    require_once SITE_ROOT . 'config/database.php';
    $error = null;
    
    // Si déjà connecté, redirige direct vers le dashboard
    if (!empty($_SESSION['admin'])) {
        header('Location: ' . BASE_URL . 'admin/dashboard');
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        
        $pdo = getPDO();
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        
        // TEST TEMPORAIRE - pour diagnostiquer
        echo "<pre style='background:#f0f0f0; padding:10px; margin:10px;'>";
        echo "=== DEBUG INFO ===\n";
        echo "Username saisi: " . $username . "\n";
        echo "Password saisi: " . $password . "\n";
        echo "User trouvé: " . ($user ? 'OUI' : 'NON') . "\n";
        if ($user) {
            echo "Hash en BDD: " . $user['mot_de_passe'] . "\n";
            echo "Password_verify: " . (password_verify($password, $user['mot_de_passe']) ? 'TRUE' : 'FALSE') . "\n";
            
            // Test avec un nouveau hash
            $new_hash = password_hash($password, PASSWORD_DEFAULT);
            echo "Nouveau hash généré: " . $new_hash . "\n";
            echo "Test nouveau hash: " . (password_verify($password, $new_hash) ? 'TRUE' : 'FALSE') . "\n";
        }
        echo "==================\n";
        echo "</pre>";
        
        // LOGIQUE DE CONNEXION (ne pas supprimer)
        if ($user && password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['admin'] = $user['username'];
            header('Location: ' . BASE_URL . 'admin/dashboard');
            exit;
        } else {
            $error = 'Identifiants incorrects';
        }
    }
    
    render('../../view/admin/login.php', [
        'head_title' => 'Connexion Admin',
        'error' => $error
    ]);
}