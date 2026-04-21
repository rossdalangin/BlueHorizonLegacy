</main>

<footer class="site-footer section section-alt" style="border-top: 1px solid rgba(255,255,255,0.05); padding-top: 120px; padding-bottom: 60px;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 6rem; margin-bottom: 100px;">
            <div>
                <div class="logo" style="margin-bottom: 2.5rem;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #fff; font-size: 1.8rem; font-family: var(--font-heading); font-weight: 800; text-decoration: none;">AI AGENCY GROUP</a>
                </div>
                <p style="opacity: 0.6; max-width: 400px; font-size: 1rem;">We design, build, and deploy AI Departments for businesses in 72 countries. Solopreneurs to Enterprise.</p>
            </div>
            <div>
                <h4 style="font-size: 0.95rem; margin-bottom: 2rem; letter-spacing: 0.15em;">SERVICES</h4>
                <ul style="list-style: none; padding: 0; opacity: 0.5; font-size: 0.9rem; line-height: 2.2;">
                    <li>AI Departments</li>
                    <li>AI Employees</li>
                    <li>Custom AI Projects</li>
                    <li>AI Workflows</li>
                </ul>
            </div>
            <div>
                <h4 style="font-size: 0.95rem; margin-bottom: 2rem; letter-spacing: 0.15em;">COMPANY</h4>
                <ul style="list-style: none; padding: 0; opacity: 0.5; font-size: 0.9rem; line-height: 2.2;">
                    <li>Who We Are</li>
                    <li>Insights</li>
                    <li>Careers</li>
                    <li>Contact</li>
                </ul>
            </div>
            <div>
                <h4 style="font-size: 0.95rem; margin-bottom: 2rem; letter-spacing: 0.15em;">CONNECT</h4>
                <ul style="list-style: none; padding: 0; opacity: 0.5; font-size: 0.9rem; line-height: 2.2;">
                    <li>LinkedIn</li>
                    <li>Instagram</li>
                    <li>YouTube</li>
                </ul>
            </div>
        </div>
        <div style="border-top: 1px solid rgba(255,255,255,0.05); padding-top: 50px; display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem; opacity: 0.4;">
            <div>&copy; <?php echo date( 'Y' ); ?> AI Agency Group LLC &mdash; All Rights Reserved</div>
            <div style="display: flex; gap: 2.5rem;">
                <a href="#" style="color: inherit; text-decoration: none;">Privacy Policy</a>
                <a href="#" style="color: inherit; text-decoration: none;">Terms</a>
            </div>
        </div>
    </div>
</footer>

<div id="call-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2 class="text-center" style="font-size: 2.5rem; margin-bottom: 1rem;"><?php echo esc_html( get_theme_mod( 'modal_title', 'Secure Your AI Strategy Session' ) ); ?></h2>
        <p class="text-center" style="opacity: 0.7; margin-bottom: 3rem; font-size: 1.2rem;"><?php echo wp_kses_post( get_theme_mod( 'modal_sub', '15–30 Minutes &middot; No Obligation &middot; Leave with a Clear Plan' ) ); ?></p>
        <div class="iframe-container">
            <iframe src="<?php echo esc_url( get_theme_mod( 'modal_url', 'https://forms.aiagencygroup.ai/ai-strategy-session' ) ); ?>" frameborder="0" style="width: 100%; height: 600px;"></iframe>
        </div>
    </div>
</div>

<style>
    .modal { display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); backdrop-filter: blur(20px); overflow-y: auto; }
    .modal-content { background: #000; margin: 2% auto; padding: 6rem 4rem; width: 95%; max-width: 1000px; position: relative; border: 1px solid rgba(255,255,255,0.1); }
    .close-modal { position: absolute; right: 2rem; top: 1.5rem; font-size: 3rem; color: #fff; cursor: pointer; transition: 0.3s; }
    .close-modal:hover { color: var(--accent-teal); }
    .iframe-container { border: 1px solid rgba(255,255,255,0.05); }
</style>

<?php wp_footer(); ?>
</body>
</html>
