<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AI_Style_Theme
 */

get_header();
?>

<section class="section section-alt geometric-bg standalone-page text-center">
    <div class="container">
        <h1 class="text-uppercase" style="font-size: 5rem; margin-bottom: 1rem; color: var(--accent-teal);">404</h1>
        <h2 style="margin-bottom: 2rem;">System Error: Page Not Found</h2>
        <p style="margin-bottom: 3rem; opacity: 0.8; max-width: 600px; margin-left: auto; margin-right: auto;">The requested resource is missing or has been relocated within the systematic architecture.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-teal">Return to Hub</a>
    </div>
</section>

<?php
get_footer();
