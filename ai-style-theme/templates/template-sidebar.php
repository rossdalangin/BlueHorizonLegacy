<?php
/**
 * Template Name: Page with Sidebar
 *
 * @package AI_Style_Theme
 */

get_header();
?>

<div class="container section">
    <div id="content" class="site-content has-sidebar">
        <div class="main-content-area">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content();
                        ?>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</div>

<style>
    .has-sidebar {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 3rem;
    }
    @media (max-width: 768px) {
        .has-sidebar {
            grid-template-columns: 1fr;
        }
    }
</style>

<?php
get_footer();
