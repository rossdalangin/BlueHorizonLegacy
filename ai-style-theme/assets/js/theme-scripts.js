document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('call-modal');
    const openBtns = document.querySelectorAll('.open-modal');
    const closeBtn = document.querySelector('.close-modal');

    if (modal) {
        openBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            });
        });

        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });

        window.addEventListener('click', function(e) {
            if (e.target == modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
    }

    // Header scroll effect
    const header = document.querySelector('.site-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.style.backgroundColor = 'rgba(0,0,0,0.9)';
            header.style.padding = '15px 0';
            header.style.borderBottom = '1px solid rgba(255,255,255,0.05)';
        } else {
            header.style.backgroundColor = 'transparent';
            header.style.padding = '30px 0';
            header.style.borderBottom = 'none';
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

    document.querySelectorAll('.section').forEach(section => {
        section.style.opacity = 0;
        section.style.transform = 'translateY(40px)';
        section.style.transition = 'all 1s cubic-bezier(0.165, 0.84, 0.44, 1)';
        observer.observe(section);
    });
});
