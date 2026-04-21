<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="top-bar" class="top-bar">
    <div class="container">
        <?php echo esc_html( get_theme_mod( 'hero_top', 'OPERATING IN 72 COUNTRIES  |  102 GLOBAL PARTNERS' ) ); ?>
    </div>
</div>

<header id="masthead" class="site-header">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div class="site-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #fff; font-size: 1.4rem; font-family: var(--font-heading); font-weight: 900; text-decoration: none; letter-spacing: 0.1em;"><?php echo esc_html(get_theme_mod('footer_logo', 'AI AGENCY GROUP')); ?></a>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" id="mobileMenuBtn" aria-controls="primary-menu" aria-expanded="false">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'container'      => 'div',
                        'container_class' => 'menu-container',
                        'container_id'    => 'mobileOverlay',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s nav-menu">%3$s<li class="menu-item-cta"><a href="#" class="open-modal-btn">Book a Call</a></li></ul>',
                    )
                );
                ?>
            </nav>
        </div>
    </div>
</header>

<main id="primary" class="site-main">
