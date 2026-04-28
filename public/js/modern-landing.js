// NAVBAR SCROLL
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 20);
});

// MOBILE BURGER
const burger = document.getElementById('burger');
const mobMenu = document.getElementById('mobMenu');
burger?.addEventListener('click', () => mobMenu.classList.toggle('open'));

// PROFILE DROPDOWN
const ptoggle = document.getElementById('ptoggle');
const dmenu   = document.getElementById('dmenu');
ptoggle?.addEventListener('click', (e) => { e.stopPropagation(); dmenu.classList.toggle('open'); });
document.addEventListener('click', () => dmenu?.classList.remove('open'));

// SMOOTH SCROLL & ACTIVE NAV
document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
        const target = document.querySelector(a.getAttribute('href'));
        if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); mobMenu.classList.remove('open'); }
    });
});

const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-links a');
window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => { if (window.scrollY >= s.offsetTop - 100) current = s.id; });
    navLinks.forEach(a => { a.classList.toggle('active', a.getAttribute('href') === '#' + current); });
});

// COUNT UP ANIMATION
function countUp(el, target, isK) {
    let start = 0;
    const step = Math.ceil(target / 60);
    const timer = setInterval(() => {
        start += step;
        if (start >= target) { start = target; clearInterval(timer); }
        el.textContent = isK ? (start >= 1000 ? (start/1000).toFixed(start >= 1000 ? 0 : 1) + 'K+' : start + '+') : start + '+';
    }, 20);
}

const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            const el = e.target;
            const count = parseInt(el.getAttribute('data-count'));
            if (count) countUp(el, count, count >= 1000);
            obs.unobserve(el);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('[data-count]').forEach(el => obs.observe(el));

// FEATURE CARD STAGGER
const fcObs = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
        if (e.isIntersecting) {
            setTimeout(() => {
                e.target.style.opacity = '1';
                e.target.style.transform = 'translateY(0)';
            }, i * 80);
            fcObs.unobserve(e.target);
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.fc, .tc, .hstep').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'all 0.5s ease';
    fcObs.observe(el);
});
