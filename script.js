const nav = document.querySelector('nav');
const navToggle = document.querySelector('.nav-toggle');
const navLinks = document.querySelector('.nav-links');

if (navToggle && navLinks) {
    navToggle.addEventListener('click', () => {
        const isOpen = navToggle.getAttribute('aria-expanded') === 'true';
        navToggle.setAttribute('aria-expanded', String(!isOpen));
        navLinks.classList.toggle('is-open', !isOpen);
    });
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (event) {
        event.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));

        if (target) {
            if (navToggle && navLinks) {
                navToggle.setAttribute('aria-expanded', 'false');
                navLinks.classList.remove('is-open');
            }

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, observerOptions);

document.querySelectorAll('.fade-in').forEach(el => {
    observer.observe(el);
});

window.addEventListener('scroll', () => {
    if (!nav) {
        return;
    }

    if (window.scrollY > 50) {
        nav.style.background = 'rgba(10, 14, 39, 0.95)';
    } else {
        nav.style.background = 'rgba(10, 14, 39, 0.8)';
    }
});

document.addEventListener('click', (event) => {
    if (!nav || !navToggle || !navLinks) {
        return;
    }

    if (!nav.contains(event.target)) {
        navToggle.setAttribute('aria-expanded', 'false');
        navLinks.classList.remove('is-open');
    }
});