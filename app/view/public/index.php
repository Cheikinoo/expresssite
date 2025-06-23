<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>%%HEAD_TITLE%%</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<link rel="stylesheet" href="css/style.css">


<!-- Google Fonts (facultatif mais stylé) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="fade-in">

    <!-- Barre de navigation -->
<header class="navbar">
  <div class="navbar-container">
    <div class="logo"><a href="/">Express<span>Site</span></a></div>
    <div class="burger" id="burger">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <nav class="nav-links" id="navLinks">
      <a href="home">Accueil</a>
      <a href="offres">Offres</a>
      <a href="projets">Projets</a>
      <a href="contact">Contact</a>
    </nav>
  </div>
</header>

    <!-- Contenu principal -->
    <main class="container">
        %%MAIN_CONTENT%%
    </main>

    <!-- Pied de page -->
    <footer style="text-align:center; margin-top:40px; font-size: 0.9em; color: #999;">
        <p>© <?= date('Y') ?> ExpressSite - Tous droits réservés.</p>
    </footer>

    <!-- JS principal -->
<script src="js/style.js" defer></script>
</body>
</html>
