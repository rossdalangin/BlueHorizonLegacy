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
    wp_enqueue_style( 'ai-style-theme-style', get_stylesheet_uri(), array(), '1.6.2' );
    wp_enqueue_script( 'ai-style-theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), '1.6.2', true );

    // Inject custom colors
    $primary_navy = get_theme_mod('color_primary_navy', '#001f3f');
    $primary_charcoal = get_theme_mod('color_primary_charcoal', '#080808');
    $accent_teal = get_theme_mod('color_accent_teal', '#00e5e5');
    $accent_gold = get_theme_mod('color_accent_gold', '#c5a028');

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

function ai_style_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ai-style-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ai-style-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ai_style_theme_widgets_init' );

/**
 * Customizer settings
 */
function ai_style_theme_customize_register( $wp_customize ) {

    // Panel: Theme Colors
    $wp_customize->add_section( 'theme_colors', array(
        'title' => __( 'Theme Colors', 'ai-style-theme' ),
        'priority' => 20,
    ) );

    $colors = array(
        'color_primary_navy' => array('label' => 'Primary Navy', 'default' => '#001f3f'),
        'color_primary_charcoal' => array('label' => 'Primary Charcoal', 'default' => '#080808'),
        'color_accent_teal' => array('label' => 'Accent Teal', 'default' => '#00e5e5'),
        'color_accent_gold' => array('label' => 'Accent Gold', 'default' => '#c5a028'),
    );

    foreach ($colors as $id => $data) {
        $wp_customize->add_setting( $id, array('default' => $data['default'], 'sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
            'label' => $data['label'],
            'section' => 'theme_colors',
        ) ) );
    }

    // Panel: Homepage Content
    $wp_customize->add_panel( 'homepage_settings', array(
        'title' => __( 'Homepage Content', 'ai-style-theme' ),
        'priority' => 30,
    ) );

    $add_setting = function($id, $label, $section, $default = '', $type = 'text') use ($wp_customize) {
        $wp_customize->add_setting( $id, array(
            'default' => $default,
            'sanitize_callback' => ($type == 'textarea' ? 'wp_kses_post' : ($type == 'url' ? 'esc_url_raw' : 'sanitize_text_field')),
        ) );
        if ($type == 'image') {
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, array(
                'label' => $label,
                'section' => $section,
            ) ) );
        } else {
            $wp_customize->add_control( $id, array(
                'label' => $label,
                'section' => $section,
                'type' => $type,
            ) );
        }
    };

    // Hero
    $wp_customize->add_section( 'hero_section', array('title' => 'Hero', 'panel' => 'homepage_settings') );
    $add_setting('hero_bg', 'Background Image', 'hero_section', '', 'image');
    $add_setting('hero_top', 'Top Bar', 'hero_section', 'Operating in 72 Countries  |  102 Global Partners');
    $add_setting('hero_title', 'Title', 'hero_section', 'We Are Your<br>AI Department.', 'textarea');
    $add_setting('hero_sub', 'Subtitle', 'hero_section', 'We design, build, and deploy AI Departments that scale your business without scaling your headcount. Done for you. Running in weeks.', 'textarea');
    $add_setting('hero_btn', 'Button Text', 'hero_section', 'Book a Strategy Call');

    // Marquee
    $wp_customize->add_section( 'marquee_section', array('title' => 'Marquee', 'panel' => 'homepage_settings') );
    $add_setting('marquee_text', 'Content', 'marquee_section', 'AI Departments ✦ AI Employees ✦ Custom AI Projects ✦ AI Workflows ✦ AI SEO — AIO ✦ Tool Activation ✦ AI Training ✦ AI Yourself ✦ 72 Countries ✦ Done For You ✦ Enterprise to Solopreneur', 'textarea');

    // Who We Are
    $wp_customize->add_section( 'who_section', array('title' => 'Who We Are', 'panel' => 'homepage_settings') );
    $add_setting('who_title', 'Title', 'who_section', 'Who Is The AI Agency Group');
    $add_setting('who_text', 'Content', 'who_section', 'The AI Agency Group is a global AI infrastructure and implementation firm that builds AI departments and AI employees that replace work, reduce costs, and increase output across your business...', 'textarea');

    // Implementation Division
    $wp_customize->add_section( 'div_section', array('title' => 'Implementation Division', 'panel' => 'homepage_settings') );
    $add_setting('div_title', 'Title', 'div_section', 'Implementation + Training Division');
    $add_setting('div_text', 'Content', 'div_section', 'We do not just build AI systems for you. We also give you the capability to build and control them internally.', 'textarea');

    // Industries
    $wp_customize->add_section( 'ind_section', array('title' => 'Industries', 'panel' => 'homepage_settings') );
    $add_setting('ind_title', 'Title', 'ind_section', 'Trusted Across Industries');
    $add_setting('ind_list', 'List (Comma separated)', 'ind_section', 'Government, Solopreneurs, Insurance, Private Equity, M&A, Mining, Real Estate, Finance, Healthcare, Legal, E-Commerce, Technology, Speaking, Coaching, Trades, Small Business, Manufacturing, Corporate');

    // Services
    $wp_customize->add_section( 'serv_section', array('title' => 'Services', 'panel' => 'homepage_settings') );
    $add_setting('serv_title', 'Title', 'serv_section', 'How We Can Help You');
    $add_setting('serv_sub', 'Subtitle', 'serv_section', 'We are relentlessly focused on one thing. Replacing inefficiency with intelligence and scaling your business without scaling your headcount.', 'textarea');

    // Bio
    $wp_customize->add_section( 'bio_section', array('title' => 'Founder Bio', 'panel' => 'homepage_settings') );
    $add_setting('bio_img', 'Image', 'bio_section', '', 'image');
    $add_setting('bio_label', 'Label', 'bio_section', 'Founding Managing Partner  |  One of 102 Global Partners');
    $add_setting('bio_name', 'Name', 'bio_section', 'JT FOXX');
    $add_setting('bio_title', 'Title', 'bio_section', 'Who Is JT Foxx.');
    $add_setting('bio_text', 'Content', 'bio_section', 'JT Foxx is a global entrepreneur, investor, and one of the most sought-after voices in business today. He has built companies across multiple industries...', 'textarea');
    $add_setting('bio_quote', 'Quote', 'bio_section', '"Business is War. AI is the New Weapon."');

    // Partner
    $wp_customize->add_section( 'part_section', array('title' => 'Partner Program', 'panel' => 'homepage_settings') );
    $add_setting('part_title', 'Title', 'part_section', 'Build Your Own AI Agency.');
    $add_setting('part_sub', 'Subtitle', 'part_section', 'The AI Agency Group is not just a service. It is a platform.', 'textarea');

    // Modal
    $wp_customize->add_section( 'modal_section', array('title' => 'Popup Modal', 'priority' => 40) );
    $add_setting('modal_title', 'Title', 'modal_section', 'Secure Your AI Strategy Session');
    $add_setting('modal_sub', 'Subtitle', 'modal_section', '15–30 Minutes &middot; No Obligation &middot; Leave with a Clear Plan', 'textarea');
    $add_setting('modal_info', 'Info Text', 'modal_section', 'Limited availability — if a slot is visible, it just opened');
    $add_setting('modal_url', 'Iframe URL', 'modal_section', 'https://forms.aiagencygroup.ai/ai-strategy-session', 'url');
}
add_action( 'customize_register', 'ai_style_theme_customize_register' );
