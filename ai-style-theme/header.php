<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        .site-header {
            background-color: transparent;
            position: absolute;
            width: 100%;
            z-index: 1000;
            padding: 25px 0;
            transition: all 0.3s ease;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo a {
            color: #fff;
            text-decoration: none;
            font-family: var(--font-heading);
            font-weight: 800;
            font-size: 1.6rem;
            letter-spacing: -0.02em;
        }
        .main-navigation ul {
            list-style: none;
            display: flex;
            gap: 2.5rem;
            margin: 0;
            padding: 0;
        }
        .main-navigation a {
            color: #fff;
            text-decoration: none;
            font-size: 0.85rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.1em;
            opacity: 0.8;
            transition: opacity 0.3s;
        }
        .main-navigation a:hover { opacity: 1; }
        .header-cta .btn {
            padding: 0.9rem 1.8rem;
            font-size: 0.8rem;
        }
        @media (max-width: 992px) {
            .main-navigation { display: none; }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container header-container">
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">AI AGENCY GROUP</a>
        </div>
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
                'fallback_cb'    => false,
            ) );
            ?>
        </nav>
        <div class="header-cta">
            <a href="#" class="btn btn-teal open-modal">Book a Call</a>
        </div>
    </div>
</header>
<main id="primary" class="site-main">
