<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>%%HEAD_TITLE%%</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/admin.css">
</head>
<body>
    <header>
        <h1>Espace Admin</h1>
        <nav style="margin-top:10px;">
            <a href="<?= BASE_URL ?>admin/dashboard">Dashboard</a> |
            <a href="<?= BASE_URL ?>admin/deconnexion">Déconnexion</a>
        </nav>
    </header>

    <main>
        %%MAIN_CONTENT%%
    </main>

    <footer>
        <p style="text-align:center; font-size: 0.9em; margin-top: 40px;">&copy; <?= date('Y') ?> ExpressSite - Tous droits réservés.</p>
    </footer>
</body>
</html>
