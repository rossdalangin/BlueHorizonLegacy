<?php
/**
 * Template Name: Wide Page (No Sidebar)
 *
 * @package AI_Style_Theme
 */

get_header();
?>

<div class="container-wide section">
    <div id="content" class="site-content">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <div class="container">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </div>
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
</div>

<style>
    .container-wide {
        width: 100%;
        max-width: 100%;
        padding: 0;
    }
</style>

<?php
get_footer();
