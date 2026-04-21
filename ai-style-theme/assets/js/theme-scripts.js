document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu
    const menuToggle = document.querySelector('.menu-toggle');
    const menuContainer = document.querySelector('.menu-container');
    const navLinks = document.querySelectorAll('.nav-menu a');

    if (menuToggle && menuContainer) {
        menuToggle.addEventListener('click', function() {
            this.classList.toggle('is-active');
            menuContainer.classList.toggle('is-open');
            document.body.classList.toggle('menu-open');
        });

        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                menuToggle.classList.remove('is-active');
                menuContainer.classList.remove('is-open');
                document.body.classList.remove('menu-open');
            });
        });
    }

    // Video Control Logic
    const heroVideo = document.getElementById('heroVideo');
    const modalVideo = document.getElementById('modalVideo');

    const toggleHeroVideo = document.getElementById('toggleHeroVideo');
    const toggleHeroMute = document.getElementById('toggleHeroMute');
    const toggleModalVideo = document.getElementById('toggleModalVideo');
    const toggleModalMute = document.getElementById('toggleModalMute');

    if (heroVideo) {
        if (toggleHeroVideo) {
            toggleHeroVideo.addEventListener('click', () => {
                if (heroVideo.paused) heroVideo.play();
                else heroVideo.pause();
            });
        }
        if (toggleHeroMute) {
            toggleHeroMute.addEventListener('click', () => {
                heroVideo.muted = !heroVideo.muted;
            });
        }
    }

    if (modalVideo) {
        if (toggleModalVideo) {
            toggleModalVideo.addEventListener('click', () => {
                if (modalVideo.paused) modalVideo.play();
                else modalVideo.pause();
            });
        }
        if (toggleModalMute) {
            toggleModalMute.addEventListener('click', () => {
                modalVideo.muted = !modalVideo.muted;
            });
        }
    }

    // Full-Screen Strategy Modal Logic
    const strategyModal = document.getElementById('strategy-modal');
    const modalCloseBtn = document.getElementById('strategyModalClose');
    const modalBackdrop = document.getElementById('strategyModalBackdrop');
    const openModalBtns = document.querySelectorAll('.open-modal-btn');

    if (strategyModal) {
        const openModal = (e) => {
            if(e) e.preventDefault();

            // If opened from mobile menu, hide the mobile menu first
            if(menuToggle && menuToggle.classList.contains('is-active')) {
                menuToggle.classList.remove('is-active');
                menuContainer.classList.remove('is-open');
                document.body.classList.remove('menu-open');
            }

            strategyModal.style.display = 'block';
            modalBackdrop.style.display = 'block';
            document.body.style.overflow = 'hidden';

            // Custom Requirement: Stop Hero Video, Start Modal Audio/Video
            if (heroVideo) heroVideo.pause();
            if (modalVideo) {
                modalVideo.muted = false; // Activate Audio
                modalVideo.play();
            }
        };

        const closeModal = () => {
            strategyModal.style.display = 'none';
            modalBackdrop.style.display = 'none';
            document.body.style.overflow = '';

            if (modalVideo) modalVideo.pause();
            if (heroVideo) heroVideo.play();
        };

        openModalBtns.forEach(btn => {
            btn.addEventListener('click', openModal);
        });

        if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeModal);
        if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);
    }

    // Header scroll effect
    const header = document.querySelector('.site-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            header.classList.add('is-sticky');
        } else {
            header.classList.remove('is-sticky');
        }
    });

    // Scroll reveal for sections
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.05 });

    document.querySelectorAll('.section, .who-section, .services-section, .partner-section, .foxx-section, .proof-section, .audience-section').forEach(section => {
        section.style.opacity = 0;
        section.style.transform = 'translateY(40px)';
        section.style.transition = 'all 1s cubic-bezier(0.165, 0.84, 0.44, 1)';
        observer.observe(section);
    });
});
