document.addEventListener('DOMContentLoaded', () => {
    document.body.classList.add('js-ready');

    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', () => {
            const isOpen = navMenu.classList.toggle('is-open');
            navToggle.classList.toggle('is-open', isOpen);
            navToggle.setAttribute('aria-expanded', String(isOpen));
        });
    }

    const modal = document.getElementById('showreel-modal');
    const modalFrame = document.getElementById('showreel-frame');
    const playTriggers = document.querySelectorAll('.play-trigger');

    playTriggers.forEach((trigger) => {
        trigger.addEventListener('click', () => {
            const videoUrl = trigger.getAttribute('data-video-url');
            if (!modal || !modalFrame || !videoUrl) return;
            modalFrame.src = videoUrl;
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
        });
    });

    const closeButtons = document.querySelectorAll('[data-close-modal]');
    closeButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (!modal) return;
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            if (modalFrame) modalFrame.src = '';
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && modal) {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            if (modalFrame) modalFrame.src = '';
        }
    });

    const revealItems = document.querySelectorAll('.reveal');

    if (!('IntersectionObserver' in window)) {
        revealItems.forEach((item) => item.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.14 });

    revealItems.forEach((item) => observer.observe(item));
});
