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
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6rem;">
            <div class="modal-left">
                <h2 style="font-size: 2.5rem; margin-bottom: 1rem;"><?php echo esc_html( get_theme_mod( 'm_title', 'Secure Your AI Strategy Session' ) ); ?></h2>
                <p style="opacity: 0.7; margin-bottom: 3rem; font-size: 1.2rem;"><?php echo wp_kses_post( get_theme_mod( 'm_sub', '15–30 Minutes &middot; No Obligation &middot; Leave with a Clear Plan' ) ); ?></p>

                <h4 style="margin-bottom: 2rem; color: var(--accent-teal);"><?php echo esc_html(get_theme_mod('m_ben_title', 'What You’ll Get on This Call')); ?></h4>
                <ul style="list-style: none; padding: 0; font-size: 1.1rem; line-height: 2;">
                    <?php
                    $bens = explode("\n", get_theme_mod('m_ben_list', "Identify losing time/money\nPinpoint replaceable roles\nMap profit opportunities"));
                    foreach ($bens as $b) if(trim($b)) echo '<li style="margin-bottom: 1rem; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 0.5rem;">✦ '.esc_html(trim($b)).'</li>';
                    ?>
                </ul>
            </div>
            <div class="modal-right">
                <div class="modal-form-container" style="background: rgba(255,255,255,0.02); padding: 3rem; border: 1px solid rgba(255,255,255,0.05);">
                    <?php
                    $cf7 = get_theme_mod( 'm_cf7' );
                    echo $cf7 ? do_shortcode($cf7) : '<p>Please configure the CF7 shortcode.</p>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modal { display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.98); backdrop-filter: blur(25px); overflow-y: auto; }
    .modal-content { background: #000; margin: 2% auto; padding: 8rem 6rem; width: 95%; max-width: 1200px; position: relative; border: 1px solid rgba(255,255,255,0.1); }
    .close-modal { position: absolute; right: 3rem; top: 2rem; font-size: 3.5rem; color: #fff; cursor: pointer; transition: 0.3s; }
    .close-modal:hover { color: var(--accent-teal); }
</style>

<?php wp_footer(); ?>
</body>
</html>
