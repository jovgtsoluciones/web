let currentSlide = 0;

document.addEventListener('DOMContentLoaded', () => {
    window.addEventListener('load', () => {
        document.querySelector('.page-loader').classList.add('hidden');
    });

    window.addEventListener('scroll', () => {
        const scrollTop = document.documentElement.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / scrollHeight) * 100;
        document.getElementById('progressBar').style.width = scrollPercent + '%';

        const header = document.getElementById('mainHeader');
        const backToTop = document.getElementById('backToTop');
        if (scrollTop > 100) header.classList.add('scrolled'); else header.classList.remove('scrolled');
        if (scrollTop > 300) backToTop.classList.add('visible'); else backToTop.classList.remove('visible');
    });

    document.getElementById('backToTop').addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Menú móvil
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('navMenu');
    btn.addEventListener('click', () => {
        menu.classList.toggle('active');
        btn.querySelector('i').classList.toggle('fa-bars');
        btn.querySelector('i').classList.toggle('fa-times');
    });

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' });
                menu.classList.remove('active');
                btn.querySelector('i').classList.add('fa-bars');
                btn.querySelector('i').classList.remove('fa-times');
            }
        });
    });

    // Animación fade-in
    const fadeElements = document.querySelectorAll('.fade-in');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, { threshold: 0.1 });
    fadeElements.forEach(el => observer.observe(el));
});

function moveSlide(direction) {
    const slider = document.getElementById('repairSlider');
    const slides = slider.children.length;
    currentSlide += direction;
    if (currentSlide < 0) currentSlide = slides - 1;
    if (currentSlide >= slides) currentSlide = 0;
    slider.style.transform = `translateX(-${currentSlide * 100}%)`;
}

setInterval(() => moveSlide(1), 8000);