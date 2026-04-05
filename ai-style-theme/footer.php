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

<?php wp_footer(); ?>
</body>
</html>
