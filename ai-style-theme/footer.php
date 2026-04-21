</main>

<footer class="site-footer section section-alt flat-border">
    <div class="container text-center">
        <div class="logo" style="margin-bottom: 2rem;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #fff; font-size: 1.5rem; font-family: var(--font-heading); font-weight: 700; text-decoration: none;">AI AGENCY GROUP</a>
        </div>
        <p style="max-width: 600px; margin: 0 auto 3rem; opacity: 0.6;">We design, build, and deploy AI Departments for businesses in 72 countries. Solopreneurs to Enterprise.</p>
        <div class="footer-links" style="display: flex; justify-content: center; gap: 3rem; margin-bottom: 4rem;">
            <a href="#">Services</a> <a href="#">Who We Are</a> <a href="#">Partner With Us</a>
        </div>
        <div class="site-info" style="font-size: 0.8rem; opacity: 0.4;">
            &copy; <?php echo date( 'Y' ); ?> AI Agency Group LLC &mdash; All Rights Reserved
        </div>
    </div>
</footer>

<div id="call-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2 class="text-center"><?php echo esc_html( get_theme_mod( 'modal_title', 'Secure Your AI Strategy Session' ) ); ?></h2>
        <p class="text-center" style="opacity: 0.7; margin-bottom: 2rem;"><?php echo wp_kses_post( get_theme_mod( 'modal_subtitle', '15–30 Minutes &middot; No Obligation &middot; Leave with a Clear Plan' ) ); ?></p>
        <div class="iframe-container">
            <iframe src="<?php echo esc_url( get_theme_mod( 'modal_iframe_url', 'https://forms.aiagencygroup.ai/ai-strategy-session' ) ); ?>" frameborder="0" style="width: 100%; height: 600px;"></iframe>
        </div>
        <p class="text-center" style="margin-top: 2rem; font-size: 0.8rem; opacity: 0.5;"><?php echo esc_html( get_theme_mod( 'modal_info', 'Limited Availability | If you see a time available, a slot just opened' ) ); ?></p>
    </div>
</div>

<style>
    .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); backdrop-filter: blur(10px); overflow-y: auto; }
    .modal-content { background: #000; margin: 2% auto; padding: 4rem; width: 90%; max-width: 900px; position: relative; border: 1px solid rgba(255,255,255,0.1); }
    .close-modal { position: absolute; right: 2rem; top: 1rem; font-size: 2.5rem; color: #fff; cursor: pointer; }
    .iframe-container { border: 1px solid rgba(255,255,255,0.05); }
</style>

<?php wp_footer(); ?>
</body>
</html>
