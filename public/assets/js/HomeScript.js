document.addEventListener('DOMContentLoaded', function() {
    // Slider sederhana (jika banyak slide)
    let slides = document.querySelectorAll('.hero-slider .slide');
    let current = 0;
    function showSlide(idx) {
        slides.forEach(s => s.classList.remove('active'));
        slides[idx].classList.add('active');
    }
    setInterval(function() {
        current = (current + 1) % slides.length;
        showSlide(current);
    }, 5000);

    // Tabs
    document.querySelectorAll('.info-tabs .tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.info-tabs .tab').forEach(t=>t.classList.remove('active'));
            document.querySelectorAll('.info-tabs .tab-content').forEach(c=>c.classList.remove('active'));
            this.classList.add('active');
            document.getElementById(this.getAttribute('data-tab')).classList.add('active');
        });
    });
});