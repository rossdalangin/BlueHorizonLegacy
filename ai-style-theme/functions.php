<?php
/**
 * AI Style Theme functions and definitions
 *
 * @package AI_Style_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function ai_style_theme_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );

    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary Menu', 'ai-style-theme' ),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
        )
    );
}
add_action( 'after_setup_theme', 'ai_style_theme_setup' );

function ai_style_theme_scripts() {
    wp_enqueue_style( 'ai-style-theme-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Montserrat:wght@700;800&display=swap', array(), null );
    wp_enqueue_style( 'ai-style-theme-style', get_stylesheet_uri(), array(), '1.9.0' );
    wp_enqueue_script( 'ai-style-theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), '1.9.0', true );

    $primary_navy = get_theme_mod('color_navy', '#001f3f');
    $primary_charcoal = get_theme_mod('color_charcoal', '#080808');
    $accent_teal = get_theme_mod('color_teal', '#00e5e5');
    $accent_gold = get_theme_mod('color_gold', '#c5a028');

    $custom_css = "
        :root {
            --primary-navy: {$primary_navy};
            --primary-charcoal: {$primary_charcoal};
            --accent-teal: {$accent_teal};
            --accent-gold: {$accent_gold};
        }
    ";
    wp_add_inline_style( 'ai-style-theme-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'ai_style_theme_scripts' );

function ai_style_theme_customize_register( $wp_customize ) {

    // Theme Colors
    $wp_customize->add_section( 'theme_colors', array( 'title' => 'Theme Colors', 'priority' => 20 ) );
    $colors = array(
        'color_navy' => array('label' => 'Navy', 'default' => '#001f3f'),
        'color_charcoal' => array('label' => 'Charcoal', 'default' => '#080808'),
        'color_teal' => array('label' => 'Teal', 'default' => '#00e5e5'),
        'color_gold' => array('label' => 'Gold', 'default' => '#c5a028'),
    );
    foreach ($colors as $id => $data) {
        $wp_customize->add_setting( $id, array('default' => $data['default'], 'sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, $id, array('label' => $data['label'], 'section' => 'theme_colors')));
    }

    // Homepage Panel
    $wp_customize->add_panel( 'homepage_panel', array( 'title' => 'Homepage Management', 'priority' => 30 ) );

    $add_sc = function($id, $label, $section, $default = '', $type = 'text') use ($wp_customize) {
        $wp_customize->add_setting( $id, array(
            'default' => $default,
            'sanitize_callback' => ($type == 'textarea' ? 'wp_kses_post' : ($type == 'url' ? 'esc_url_raw' : 'sanitize_text_field')),
        ) );
        if ($type == 'image') {
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, array( 'label' => $label, 'section' => $section ) ) );
        } else {
            $wp_customize->add_control( $id, array( 'label' => $label, 'section' => $section, 'type' => $type ) );
        }
    };

    // Hero
    $wp_customize->add_section( 'hero_sec', array('title' => '01. Hero Section', 'panel' => 'homepage_panel') );
    $add_sc('hero_top', 'Top Bar Text', 'hero_sec', 'Operating in 72 Countries  |  102 Global Partners');
    $add_sc('hero_title', 'Main Title', 'hero_sec', 'We Are Your<br>AI Department.', 'textarea');
    $add_sc('hero_sub', 'Subtitle', 'hero_sec', 'We design, build, and deploy AI Departments that scale your business without scaling your headcount.', 'textarea');
    $add_sc('hero_btn', 'CTA Button Text', 'hero_sec', 'Book a Strategy Call');

    // Marquee
    $wp_customize->add_section( 'marquee_sec', array('title' => '02. Marquee Text', 'panel' => 'homepage_panel') );
    $add_sc('marquee_text', 'Content (repeatable)', 'marquee_sec', 'AI Departments ✦ AI Employees ✦ Custom AI Projects ✦ AI Workflows ✦ AI SEO ✦ Tool Activation ✦ AI Training ✦ AI Yourself ✦ 72 Countries ✦ Done For You ✦ Enterprise to Solopreneur', 'textarea');

    // Who We Are
    $wp_customize->add_section( 'who_sec', array('title' => '03. Who We Are', 'panel' => 'homepage_panel') );
    $add_sc('who_title', 'Title', 'who_sec', 'Who Is The AI Agency Group');
    $add_sc('who_text', 'Content', 'who_sec', 'The AI Agency Group is a global AI infrastructure and implementation firm...', 'textarea');

    // Division
    $wp_customize->add_section( 'div_sec', array('title' => '04. Implementation Division', 'panel' => 'homepage_panel') );
    $add_sc('div_title', 'Title', 'div_sec', 'Implementation + Training Division');
    $add_sc('div_text', 'Content', 'div_sec', 'We do not just build AI systems for you. We also give you the capability to build and control them internally.', 'textarea');

    // Industries
    $wp_customize->add_section( 'ind_sec', array('title' => '05. Industries', 'panel' => 'homepage_panel') );
    $add_sc('ind_title', 'Title', 'ind_sec', 'Trusted Across Industries');
    $add_sc('ind_list', 'List (Comma separated)', 'ind_sec', 'Government, Solopreneurs, Insurance, Private Equity, M&A, Mining, Real Estate, Finance, Healthcare, Legal, E-Commerce, Technology');

    // Services (Simplified Grouping)
    $wp_customize->add_section( 'serv_sec', array('title' => '06. Services', 'panel' => 'homepage_panel') );
    $add_sc('serv_title', 'Title', 'serv_sec', 'How We Can Help You');
    $add_sc('serv_sub', 'Subtitle', 'serv_sec', 'Replacing inefficiency with intelligence.', 'textarea');

    // Who We Build For
    $wp_customize->add_section( 'build_sec', array('title' => '07. Who We Build For', 'panel' => 'homepage_panel') );
    $add_sc('build_title', 'Title', 'build_sec', 'Every Level. Every Scale.');

    // Founder Bio
    $wp_customize->add_section( 'bio_sec', array('title' => '08. Founder Bio', 'panel' => 'homepage_panel') );
    $add_sc('bio_img', 'Image', 'bio_sec', '', 'image');
    $add_sc('bio_label', 'Label', 'bio_sec', 'Founding Managing Partner');
    $add_sc('bio_name', 'Name', 'bio_sec', 'JT FOXX');
    $add_sc('bio_text', 'Bio Text', 'bio_sec', 'JT Foxx is a global entrepreneur...', 'textarea');
    $add_sc('bio_quote', 'Quote', 'bio_sec', '"Business is War. AI is the New Weapon."');

    // Testimonials
    $wp_customize->add_section( 'test_sec', array('title' => '09. Testimonials', 'panel' => 'homepage_panel') );
    $add_sc('test_title', 'Title', 'test_sec', 'Real Businesses. Real Results.');

    // Final CTA
    $wp_customize->add_section( 'cta_sec', array('title' => '10. Final CTA', 'panel' => 'homepage_panel') );
    $add_sc('cta_title', 'Title', 'cta_sec', 'Ready to Work With Us?');
    $add_sc('cta_sub', 'Subtitle', 'cta_sec', 'Let us build your AI department and put the most powerful weapon in business to work for you.');

    // Popup Modal
    $wp_customize->add_section( 'modal_section', array('title' => '11. Popup Modal', 'priority' => 40) );
    $add_sc('modal_title', 'Title', 'modal_section', 'Secure Your AI Strategy Session');
    $add_sc('modal_sub', 'Subtitle', 'modal_section', '15–30 Minutes &middot; No Obligation', 'textarea');
    $add_sc('modal_url', 'Iframe URL', 'modal_section', 'https://forms.aiagencygroup.ai/ai-strategy-session', 'url');
}
add_action( 'customize_register', 'ai_style_theme_customize_register' );
