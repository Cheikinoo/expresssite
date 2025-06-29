<?php
if (session_status() === PHP_SESSION_NONE) session_start();
unset($_SESSION['login_attempts']);
unset($_SESSION['last_activity']);
echo "🔓 Blocage admin réinitialisé.<br>
<a href='login'>Retour à la connexion</a>";
