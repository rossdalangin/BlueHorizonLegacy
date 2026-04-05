<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        .site-header {
            background-color: var(--primary-navy);
            padding: 1.5rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .site-logo a {
            color: var(--text-white);
            text-decoration: none;
            font-family: var(--font-heading);
            font-size: 1.5rem;
            font-weight: 700;
        }
        .main-navigation ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .main-navigation li {
            margin-left: 2rem;
        }
        .main-navigation a {
            color: var(--text-off-white);
            text-decoration: none;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transition: color 0.3s ease;
        }
        .main-navigation a:hover {
            color: var(--accent-teal);
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="masthead" class="site-header">
    <div class="container header-container">
        <div class="site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">AI STYLE THEME</a>
        </div>
        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'fallback_cb'    => false,
                )
            );
            ?>
        </nav>
    </div>
</header>
<main id="primary" class="site-main">
