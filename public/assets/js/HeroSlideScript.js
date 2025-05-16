document.addEventListener('DOMContentLoaded', function() {
  let slides = document.querySelectorAll('.hero-slider .slide');
  let current = 0;
  const showSlide = idx => {
    slides.forEach((s,i) => {
      s.classList.toggle('active', i === idx);
    });
  };

  // Auto-play every 5 detik
  let timer = setInterval(() => {
    current = (current + 1) % slides.length;
    showSlide(current);
  }, 5000);

  // Prev/Next controls
  document.querySelector('.slider-prev').addEventListener('click', () => {
    clearInterval(timer);
    current = (current - 1 + slides.length) % slides.length;
    showSlide(current);
  });
  document.querySelector('.slider-next').addEventListener('click', () => {
    clearInterval(timer);
    current = (current + 1) % slides.length;
    showSlide(current);
  });
});
