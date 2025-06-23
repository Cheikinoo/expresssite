document.addEventListener("DOMContentLoaded", () => {
  // MENU BURGER
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

  // ANIMATION REVEAL
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

  // CARROUSEL AUTO défilement horizontal (exemples de sites)
  const track = document.querySelector('.carousel-track');
  if (track) {
    track.style.display = 'flex';
    track.style.gap = '20px';
    track.style.animation = 'slide 20s linear infinite';
    track.style.width = 'max-content';

    // PAUSE AU SURVOL
    track.addEventListener('mouseover', () => {
      track.style.animationPlayState = 'paused';
    });
    track.addEventListener('mouseout', () => {
      track.style.animationPlayState = 'running';
    });
  }

  // ZOOM IMAGE PLEIN ÉCRAN AU CLIC
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

// Défilement manuel du carrousel (flèches)
// Utilise scrollCarousel('carousel-sites', 1) ou scrollCarousel('carousel-sites', -1)
function scrollCarousel(id, direction) {
  const el = document.getElementById(id);
  if (el) {
    el.scrollBy({
      left: direction * 250,
      behavior: 'smooth'
    });
  }
}
