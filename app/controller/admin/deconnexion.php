<?php
session_start();

// Détruire toutes les données de session
session_unset();
session_destroy();

// Rediriger vers la page de login
header('Location: ' . BASE_URL . 'admin/login');
exit;
