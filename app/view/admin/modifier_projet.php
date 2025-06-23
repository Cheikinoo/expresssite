<h1>Modifier un projet</h1>

<?php if (!empty($projet)): ?>
<form method="post" enctype="multipart/form-data">
    <label>Nom :</label>
    <input type="text" name="nom_commerce" value="<?= htmlspecialchars($projet['nom_commerce']) ?>">

    <label>Catégorie :</label>
    <input type="text" name="categorie" value="<?= htmlspecialchars($projet['categorie']) ?>">

    <label>Description :</label>
    <textarea name="description"><?= htmlspecialchars($projet['description']) ?></textarea>

    <label>Image actuelle :</label><br>
    <?php if (!empty($projet['image'])): ?>
        <img src="<?= BASE_URL ?>images/<?= htmlspecialchars($projet['image']) ?>" width="100"><br>
    <?php endif; ?>
    <input type="file" name="image" accept="image/*">

    <label>Lien du site :</label>
    <input type="url" name="lien_site" value="<?= htmlspecialchars($projet['lien_site']) ?>">

    <button type="submit">💾 Enregistrer</button>
</form>
<?php else: ?>
    <p>Projet introuvable.</p>
<?php endif; ?>
