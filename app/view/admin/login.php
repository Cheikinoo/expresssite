<link rel="stylesheet" href="<?= BASE_URL ?>css/admin.css">

<div class="login-wrapper">
    <h2>Connexion à l’espace admin</h2>

    <?php if (!empty($error)): ?>
        <p class="error-msg" style="color: #e74c3c; margin-bottom: 1em;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="post" class="login-form" autocomplete="off">
        <label for="username">Nom d'utilisateur</label>
        <input
            type="text"
            name="username"
            id="username"
            required
            autofocus
            placeholder="Nom d'utilisateur"
            autocomplete="off"
        >

        <label for="password">Mot de passe</label>
        <input
            type="password"
            name="password"
            id="password"
            required
            placeholder="Mot de passe"
            autocomplete="off"
        >

        <button type="submit">Se connecter 🔐</button>
    </form>
</div>
