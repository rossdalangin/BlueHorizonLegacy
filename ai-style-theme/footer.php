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

        <div class="modal-form-container">
            <?php
            $cf7_shortcode = get_theme_mod( 'modal_cf7_shortcode' );
            if ( $cf7_shortcode ) {
                echo do_shortcode( $cf7_shortcode );
            } else {
                echo '<p class="text-center">Please configure the Contact Form 7 shortcode in the Customizer.</p>';
            }
            ?>
        </div>

        <p class="text-center" style="margin-top: 3rem; font-size: 0.85rem; opacity: 0.5;">
            <?php echo esc_html( get_theme_mod( 'modal_info', 'Limited availability — if a slot is visible, it just opened' ) ); ?>
        </p>
    </div>
</div>

<style>
    .modal { display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); backdrop-filter: blur(20px); overflow-y: auto; }
    .modal-content { background: #000; margin: 5% auto; padding: 6rem 5rem; width: 90%; max-width: 800px; position: relative; border: 1px solid rgba(255,255,255,0.1); }
    .close-modal { position: absolute; right: 2rem; top: 1.5rem; font-size: 3rem; color: #fff; cursor: pointer; transition: 0.3s; }
    .close-modal:hover { color: var(--accent-teal); }

    /* CF7 Modal Styling */
    .modal-form-container .wpcf7-form-control-wrap { margin-bottom: 1.5rem; display: block; }
    .modal-form-container input[type="text"],
    .modal-form-container input[type="email"],
    .modal-form-container input[type="tel"],
    .modal-form-container textarea {
        width: 100%;
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.1);
        padding: 1.2rem;
        color: #fff;
        font-family: inherit;
        border-radius: 0;
        outline: none;
    }
    .modal-form-container input:focus, .modal-form-container textarea:focus { border-color: var(--accent-teal); }
    .modal-form-container input[type="submit"] {
        width: 100%;
        background: var(--accent-teal);
        color: #000;
        border: none;
        padding: 1.4rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        cursor: pointer;
        transition: 0.3s;
    }
    .modal-form-container input[type="submit"]:hover { background: #fff; }
</style>

<?php wp_footer(); ?>
</body>
</html>
