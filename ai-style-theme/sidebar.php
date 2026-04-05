<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AI_Style_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area flat-border">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

<style>
    #secondary {
        padding: 2rem;
        background-color: var(--primary-navy);
        color: var(--text-off-white);
    }
    .widget {
        margin-bottom: 2rem;
    }
    .widget-title {
        font-size: 1.1rem;
        border-bottom: 1px solid var(--accent-teal);
        padding-bottom: 0.5rem;
        margin-bottom: 1rem;
    }
</style>
