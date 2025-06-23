<h1 style="text-align:center;">Ajouter un projet 📝</h1>
<?php if (!empty($success)): ?>
    <p style="text-align:center;color:green;font-weight:bold;">✅ Projet ajouté avec succès</p>
<?php endif; ?>

<form method="post" enctype="multipart/form-data" style="max-width:600px;margin:auto;background:#f9f9f9;padding:2em;border-radius:10px;">
    <label>Nom du commerce:</label><br>
    <input type="text" name="nom_commerce" required style="width:100%;padding:8px;"><br><br>

    <label>Catégorie:</label><br>
    <input type="text" name="categorie" style="width:100%;padding:8px;"><br><br>

    <label>Description:</label><br>
    <textarea name="description" required style="width:100%;padding:8px;"></textarea><br><br>

    <label>Image (fichier .jpg/.png):</label><br>
    <input type="file" name="image" accept="image/*" required style="width:100%;padding:8px;background:#fff;"><br><br>

    <label>Lien du site:</label><br>
    <input type="url" name="lien_site" placeholder="https://monsite.com" style="width:100%;padding:8px;"><br><br>

    <button type="submit" style="padding:10px 20px;background:#333;color:#fff;border:none;border-radius:5px;">Ajouter</button>
</form>
