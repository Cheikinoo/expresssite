
<h1 style="text-align:center;">📊 Tableau de bord</h1>

<!-- Bouton ajout -->
<div style="text-align:center;margin-bottom:20px;">
    <a href="<?= BASE_URL ?>admin/ajouter_projet" style="padding:10px 20px;background:#22c55e;color:white;border-radius:5px;text-decoration:none;">
        ➕ Ajouter un projet
    </a>
</div>

<!-- Tableau des projets -->
<table style="width:90%;margin:auto;border-collapse:collapse;">
    <thead>
        <tr style="background:#333;color:#fff;">
            <th style="padding:10px;">Image</th>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projets as $p): ?>
            <tr style="border-bottom:1px solid #ccc;">
                <td style="text-align:center;">
                    <?php if (!empty($p['image'])): ?>
                        <img src="<?= BASE_URL ?>images/<?= htmlspecialchars($p['image']) ?>" alt="" width="80">
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($p['nom_commerce']) ?></td>
                <td><?= htmlspecialchars($p['categorie']) ?></td>
                <td><?= nl2br(htmlspecialchars($p['description'])) ?></td>
                <td>
                    <a href="<?= BASE_URL ?>admin/modifier_projet?id=<?= $p['id'] ?>">✏️ Modifier</a> |
                    <a href="<?= BASE_URL ?>admin/supprimer_projet?id=<?= $p['id'] ?>" onclick="return confirm('Supprimer ce projet ?');">🗑 Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
