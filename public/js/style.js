document.addEventListener("DOMContentLoaded", () => {
  // ======= MENU BURGER =======
  const burger = document.getElementById('burger');
  const navLinks = document.getElementById('navLinks');
  if (burger && navLinks) {
    burger.addEventListener('click', () => {
      navLinks.classList.toggle('show');
    });
    // Fermer menu au clic sur un lien
    navLinks.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => navLinks.classList.remove('show'));
    });
  }

  // ======= ANIMATION REVEAL (cartes/offres/projets) =======
  const animatedCards = document.querySelectorAll('.reveal, .offre-card, .projet-card');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });
  animatedCards.forEach(el => observer.observe(el));

  // ======= CARROUSEL AUTO LOOP "Exemples de sites" =======
  document.querySelectorAll('.carousel-auto').forEach(carousel => {
    const track = carousel.querySelector('.carousel-track');
    if (track) {
      // Clone les items pour un loop parfait (double la piste)
      track.innerHTML += track.innerHTML;

      // Animation auto
      track.style.animation = 'slide 20s linear infinite';

      // Pause au survol
      track.addEventListener('mouseover', () => {
        track.style.animationPlayState = 'paused';
      });
      track.addEventListener('mouseout', () => {
        track.style.animationPlayState = 'running';
      });
    }
  });

  // ======= ZOOM IMAGE PLEIN ÉCRAN AU CLIC =======
  document.querySelectorAll(".carousel-item img").forEach(img => {
    img.addEventListener("click", () => {
      const lightbox = document.createElement("div");
      lightbox.className = "lightbox";
      lightbox.innerHTML = `<img src="${img.src}" alt=""><span class="close">&times;</span>`;
      document.body.appendChild(lightbox);

      lightbox.querySelector('.close').addEventListener('click', () => {
        lightbox.remove();
      });
      lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) lightbox.remove();
      });
    });
  });
});

// ======= DÉFILEMENT MANUEL CARROUSEL (flèches si tu veux) =======
function scrollCarousel(id, direction) {
  const el = document.getElementById(id);
  if (el) {
    el.scrollBy({
      left: direction * 250,
      behavior: 'smooth'
    });
  }
}
