// script.js — reveal, smooth scroll, parallax, bg swap
document.addEventListener('DOMContentLoaded', () => {

  // Reveal on scroll
  const reveals = document.querySelectorAll('.reveal');
  const io = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  reveals.forEach(r => io.observe(r));

  // Smooth scroll for anchors
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // Parallax effect on hero collage
  const collage = document.querySelector('.hero-collage');
  if (collage) {
    collage.addEventListener('mousemove', (e) => {
      const rect = collage.getBoundingClientRect();
      const cx = rect.left + rect.width/2;
      const cy = rect.top + rect.height/2;
      const dx = (e.clientX - cx) / rect.width;
      const dy = (e.clientY - cy) / rect.height;
      const imgs = collage.querySelectorAll('img');
      imgs.forEach((img,i) => {
        const depth = (i+1) * 10;
        const rot = (i % 2 === 0) ? -4 : 6;
        img.style.transform = `translate(${dx * depth}px, ${dy * depth}px) rotate(${rot}deg)`;
      });
    });
    collage.addEventListener('mouseleave', () => {
      collage.querySelectorAll('img').forEach(img => img.style.transform = '');
    });
  }

  // Hero background swap if data-bg set (allows local image)
  const hero = document.querySelector('.hero');
  if (hero && hero.dataset.bg) {
    hero.style.setProperty('--hero-bg', `url(${hero.dataset.bg})`);
    // also set pseudo-element via inline style fallback:
    hero.style.backgroundImage = `url(${hero.dataset.bg})`;
    // and update ::before via inline style is not possible,
    // but we set inline background for browsers as fallback.
  }

});
