<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package AI_Style_Theme
 */

get_header();
?>

<div class="container section">
    <header class="page-header" style="border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 2rem; margin-bottom: 4rem;">
        <h1 class="page-title text-uppercase tracking-widest" style="font-size: 1.5rem;">
            System Query: <?php echo get_search_query(); ?>
        </h1>
    </header>

    <div id="content" class="site-content">
        <div class="dashboard-grid">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" class="dashboard-card">
                        <header class="entry-header">
                            <div style="font-size: 0.8rem; text-transform: uppercase; color: var(--accent-teal); margin-bottom: 1rem;"><?php echo get_post_type(); ?></div>
                            <?php the_title( '<h2 class="entry-title" style="font-size: 1.5rem;"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                        </header>
                        <div class="entry-summary" style="margin: 1.5rem 0; opacity: 0.8;">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-outline" style="padding: 0.75rem 1.5rem; font-size: 0.8rem;">Read More</a>
                    </article>
                    <?php
                endwhile;
                the_posts_navigation();
            else :
                echo '<p>No results found for your search query. Please verify the systematically searched keywords.</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
