<div class="animated-bg"></div>
<h1 class="projets-title">Nos Réalisations 📸</h1>

<section class="projets-section">
    <?php foreach($projets as $p): ?>
        <div class="projet-card">
            <?php if (!empty($p['image'])): ?>
<img src="<?= BASE_URL ?>images/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['nom_commerce']) ?>">
            <?php endif; ?>
            <h3><?= htmlspecialchars($p['nom_commerce']) ?></h3>
            <?php if (!empty($p['categorie'])): ?>
                <p class="categorie">Catégorie : <?= htmlspecialchars($p['categorie']) ?></p>
            <?php endif; ?>
            <p><?= nl2br(htmlspecialchars($p['description'])) ?></p>
            <?php if (!empty($p['lien_site'])): ?>
                <a class="projet-lien" href="<?= htmlspecialchars($p['lien_site']) ?>" target="_blank">🔗 Voir le site</a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</section>
