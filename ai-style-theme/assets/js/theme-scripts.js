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
        };

        const closeModal = () => {
            strategyModal.style.display = 'none';
            modalBackdrop.style.display = 'none';
            document.body.style.overflow = '';
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

    document.querySelectorAll('.section, .who-section, .services-section, .partner-section, .foxx-section, .proof-section').forEach(section => {
        section.style.opacity = 0;
        section.style.transform = 'translateY(40px)';
        section.style.transition = 'all 1s cubic-bezier(0.165, 0.84, 0.44, 1)';
        observer.observe(section);
    });
});
