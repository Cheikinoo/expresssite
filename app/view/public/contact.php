<div class="animated-bg"></div>
<h1 class="contact-title">Contacte-nous</h1>

<?php if ($success): ?>
    <p class="contact-success">✅ Message envoyé avec succès</p>
<?php elseif ($error): ?>
    <p class="contact-error"><?= $error ?></p>
<?php endif; ?>

<form method="POST" class="contact-form">
    <label for="nom">Nom *</label>
    <input type="text" name="nom" id="nom" required>

    <label for="email">Email *</label>
    <input type="email" name="email" id="email" required>

    <label for="telephone">Téléphone</label>
    <input type="text" name="telephone" id="telephone">

    <label for="message">Message *</label>
    <textarea name="message" id="message" rows="5" required></textarea>

    <button type="submit">Envoyer ✉️</button>
</form>
