<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ExpressSite - Création de sites pour commerces</title>
  <meta name="description" content="ExpressSite crée des sites vitrines modernes pour les commerçants locaux à Bruxelles : click & collect, carte, QR code, Google Maps, etc.">
  <meta name="keywords" content="site vitrine, click & collect, commerce local, Bruxelles, ExpressSite">
  <meta name="robots" content="index, follow">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/expresssite/css/style.css" />
  <link rel="icon" href="/images/favicon.ico" type="image/x-icon" />
</head>
<body>
  <div class="animated-bg"></div>

  <!-- SECTION HERO -->
  <section class="hero">
    <h1>Exprime ton commerce en ligne avec <span class="express">ExpressSite</span> 💻</h1>
    <p>Sites vitrines, Click & Collect, Google Maps, QR code et plus encore.</p>
    <div class="buttons">
      <a href="offres" class="btn btn-primary">Voir les offres</a>
      <a href="projets" class="btn btn-secondary">Découvrir nos services</a>
    </div>
  </section>

  <!-- SECTION SERVICES -->
  <div class="carousel-wrapper">
  <button class="carousel-btn left" onclick="scrollCarousel(-1)">←</button>

  <div class="carousel" id="carousel-sites">
    <!-- Exemple -->
    <div class="carousel-item">
      <img src="/images/coiffeur.jpg" alt="Site vitrine">
        <p>Site vitrine moderne</p>
      </div>
      <div class="carousel-item">
        <img src="/images/coiffeur.jpg" alt="Google Maps">
        <p>Google Maps intégrée</p>
      </div>
      <div class="carousel-item">
        <img src="/images/coiffeur.jpg" alt="Contact">
        <p>Formulaire de contact</p>
      </div>
      <div class="carousel-item">
        <img src="/images/coiffeur.jpg" alt="Click & Collect">
        <p>Click & Collect</p>
      </div>
      <div class="carousel-item">
        <img src="/images/coiffeur.jpg" alt="Responsive">
        <p>Design mobile</p>
      </div>
    </div>
      <button class="carousel-btn right" onclick="scrollCarousel(1)">→</button>
</div>
  </section>

  <!-- SECTION POURQUOI NOUS -->
  <section class="services" id="pourquoi">
    <h2>Pourquoi choisir ExpressSite ?</h2>
    <div class="carousel">
      <div class="carousel-item">🔒 Sécurisé</div>
      <div class="carousel-item">⚡ Rapide</div>
      <div class="carousel-item">🎯 Sur-mesure</div>
      <div class="carousel-item">💸 Abordable</div>
    </div>
  </section>

  <!-- SECTION EXEMPLES RÉALISÉS -->
  <section class="services">
    <h2>Exemples de sites réalisés</h2>
    <div class="carousel-auto" id="carousel">
      <div class="carousel-track">
        <div class="carousel-item">
          <img src="<?= BASE_URL ?>images/salon-coifure.jpg" alt="Coiffeur ExpressCut">
          <p>Coiffeur ExpressCut</p>
        </div>
        <div class="carousel-item">
          <img src="<?= BASE_URL ?>images/kebab.jpg" alt="Snack Le Dwich">
          <p>Snack Le Dwich</p>
        </div>
        <div class="carousel-item">
          <img src="<?= BASE_URL ?>images/afro.jpg" alt="Boutique Afrodream">
          <p>Boutique Afrodream</p>
        </div>
      </div>
    </div>
  </section>

  <!-- BOUTON STICKY -->
  <a href="contact" class="sticky-cta">🚀 Créer mon site</a>

  <!-- FOOTER -->
  <footer>
    <div class="footer-col">
      <h4>ExpressSite</h4>
      <p>Nous aidons les petits commerces locaux à créer une présence digitale forte et efficace.</p>
    </div>
    <div class="footer-col">
      <h4>Services</h4>
      <ul>
        <li>Site vitrine</li>
        <li>Click & Collect</li>
        <li>QR Code</li>
        <li>Support</li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Contact</h4>
      <p>📧 hello@expresssite.fr<br>📞 0491 12 38 41<br>📍 Bruxelles, Belgique</p>
    </div>
  </footer>
</body>
</html>
