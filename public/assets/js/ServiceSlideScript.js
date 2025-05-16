document.addEventListener('DOMContentLoaded', () => {
  const track = document.querySelector('.svc-track');
  const prev = document.querySelector('.svc-prev');
  const next = document.querySelector('.svc-next');
  const card = document.querySelector('.svc-card');
  const cardWidth = card.offsetWidth + parseInt(getComputedStyle(card).marginRight);
  let pos = 0;

  
  const autoSlide = setInterval(() => {
    pos += cardWidth;
    if (pos >= track.scrollWidth) {
      pos = 0;
    }
    track.scrollTo({ left: pos, behavior: 'smooth' });
  }, 2000);


  prev.addEventListener('click', () => {
    clearInterval(autoSlide);
    pos = Math.max(pos - cardWidth, 0);
    track.scrollTo({ left: pos, behavior: 'smooth' });
  });
  next.addEventListener('click', () => {
    clearInterval(autoSlide);
    pos += cardWidth;
    if (pos >= track.scrollWidth) pos = 0;
    track.scrollTo({ left: pos, behavior: 'smooth' });
  });
});