<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div class="site-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #fff; font-size: 1.6rem; font-family: var(--font-heading); font-weight: 900; text-decoration: none; letter-spacing: 0.1em;">AI AGENCY GROUP</a>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s" style="display: flex; list-style: none; margin: 0; padding: 0; gap: 3rem; text-transform: uppercase; font-size: 0.85rem; font-weight: 800; letter-spacing: 0.15em;">%3$s<li class="menu-item-cta"><a href="#" class="open-modal" style="color: var(--accent-teal);">Book a Call</a></li></ul>',
                    )
                );
                ?>
            </nav>
        </div>
    </div>
</header>

<main id="primary" class="site-main">
