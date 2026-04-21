</main><!-- #primary -->

<footer id="colophon" class="site-footer">
    <div class="container footer-container">
        <div class="footer-widgets">
            <div class="footer-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">AI STYLE THEME</a>
                <p>Elite Business Intelligence. Systematic Precision.</p>
            </div>
        </div>
        <div class="site-info">
            &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
        </div>
    </div>
</footer>

<style>
    .site-footer {
        background-color: #111;
        padding: 4rem 0 2rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        color: var(--text-off-white);
    }
    .footer-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .footer-logo a {
        color: var(--text-white);
        font-family: var(--font-heading);
        font-size: 1.25rem;
        font-weight: 700;
        text-decoration: none;
    }
    .footer-logo p {
        margin-top: 0.5rem;
        font-size: 0.85rem;
        opacity: 0.6;
    }
    .site-info {
        margin-top: 3rem;
        font-size: 0.75rem;
        opacity: 0.4;
    }
</style>

<!-- Modal Structure -->
<div id="call-modal" class="modal">
    <div class="modal-content flat-border">
        <span class="close-modal">&times;</span>
        <h2 class="text-center">
            <?php echo esc_html( get_theme_mod( 'modal_title', 'Secure Your AI Strategy Session' ) ); ?>
        </h2>
        <p class="text-center" style="opacity: 0.7; margin-bottom: 2rem;">
            <?php echo wp_kses_post( get_theme_mod( 'modal_subtitle', '15–30 Minutes  &middot;  No Obligation  &middot;  Leave with a Clear Plan' ) ); ?>
        </p>
        <div class="modal-body">
            <p class="text-center">
                <?php echo esc_html( get_theme_mod( 'modal_info', 'Limited availability — if a slot is visible, it just opened' ) ); ?>
            </p>
            <div class="iframe-container">
                <iframe src="<?php echo esc_url( get_theme_mod( 'modal_iframe_url', 'https://forms.aiagencygroup.ai/ai-strategy-session' ) ); ?>" frameborder="0" style="width: 100%; height: 500px; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.9);
        backdrop-filter: blur(5px);
    }
    .modal-content {
        background-color: var(--primary-charcoal);
        margin: 5% auto;
        padding: 3rem;
        width: 80%;
        max-width: 800px;
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .close-modal {
        position: absolute;
        right: 2rem;
        top: 1rem;
        color: var(--text-white);
        font-size: 2rem;
        font-weight: bold;
        cursor: pointer;
    }
    .close-modal:hover {
        color: var(--accent-teal);
    }
    .iframe-container {
        margin-top: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.05);
    }
</style>

<?php wp_footer(); ?>
</body>
</html>
