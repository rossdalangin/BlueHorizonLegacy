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
    wp_enqueue_style( 'ai-style-theme-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Montserrat:wght@700&display=swap', array(), null );
    wp_enqueue_style( 'ai-style-theme-style', get_stylesheet_uri(), array(), '1.4.0' );
    wp_enqueue_script( 'ai-style-theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), '1.4.0', true );
}
add_action( 'wp_enqueue_scripts', 'ai_style_theme_scripts' );

/**
 * Register widget area.
 */
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
 * Customizer additions.
 */
function ai_style_theme_customize_register( $wp_customize ) {
    $wp_customize->add_panel( 'homepage_settings', array(
        'title' => __( 'Homepage Settings', 'ai-style-theme' ),
        'priority' => 30,
    ) );

    $add_sc = function($id, $label, $section, $default = '', $type = 'text') use ($wp_customize) {
        $wp_customize->add_setting( $id, array(
            'default' => $default,
            'sanitize_callback' => ($type == 'textarea' ? 'wp_kses_post' : ($type == 'url' ? 'esc_url_raw' : 'sanitize_text_field')),
        ) );
        $wp_customize->add_control( $id, array(
            'label' => $label,
            'section' => $section,
            'type' => $type,
        ) );
    };

    // Hero Section
    $wp_customize->add_section( 'hero_section', array('title' => 'Hero Section', 'panel' => 'homepage_settings') );
    $add_sc('top_bar_text', 'Top Bar Text', 'hero_section', 'Operating in 72 Countries  |  102 Global Partners');
    $add_sc('hero_title', 'Hero Title', 'hero_section', 'We Are Your<br>AI Department.', 'textarea');
    $add_sc('hero_subtitle', 'Hero Subtitle', 'hero_section', 'We design, build, and deploy AI Departments that scale your business without scaling your headcount. Done for you. Running in weeks.', 'textarea');
    $add_sc('hero_cta_text', 'CTA Button Text', 'hero_section', 'Book a Strategy Call');

    // Marquee Section
    $wp_customize->add_section( 'marquee_section', array('title' => 'Marquee Text', 'panel' => 'homepage_settings') );
    $add_sc('marquee_text', 'Marquee Content', 'marquee_section', 'AI Departments ✦ AI Employees ✦ Custom AI Projects ✦ AI Workflows ✦ AI SEO — AIO ✦ Tool Activation ✦ AI Training ✦ AI Yourself ✦ 72 Countries ✦ Done For You ✦ Enterprise to Solopreneur', 'textarea');

    // About Section
    $wp_customize->add_section( 'about_section', array('title' => 'About Section', 'panel' => 'homepage_settings') );
    $add_sc('about_title', 'About Title', 'about_section', 'Who Is The AI Agency Group');
    $add_sc('about_content', 'About Content', 'about_section', 'The AI Agency Group is a global AI infrastructure and implementation firm that builds AI departments and AI employees that replace work, reduce costs, and increase output across your business.', 'textarea');

    // Bio Section
    $wp_customize->add_section( 'bio_section', array('title' => 'Bio Section', 'panel' => 'homepage_settings') );
    $add_sc('bio_title', 'Bio Title', 'bio_section', 'Who Is JT Foxx.');
    $add_sc('bio_name', 'Name', 'bio_section', 'JT Foxx');
    $add_sc('bio_tagline', 'Tagline', 'bio_section', '"Business is War. AI is the New Weapon."');
    $add_sc('bio_content', 'Bio Content', 'bio_section', 'JT Foxx is a global entrepreneur, investor, and one of the most sought-after voices in business today...', 'textarea');

    // Modal Settings
    $wp_customize->add_section( 'modal_section', array('title' => 'Modal Settings (Popup)', 'priority' => 31) );
    $add_sc('modal_title', 'Modal Title', 'modal_section', 'Secure Your AI Strategy Session');
    $add_sc('modal_subtitle', 'Modal Subtitle', 'modal_section', '15–30 Minutes  &middot;  No Obligation  &middot;  Leave with a Clear Plan');
    $add_sc('modal_info', 'Modal Info Text', 'modal_section', 'Limited availability — if a slot is visible, it just opened');
    $add_sc('modal_iframe_url', 'Iframe URL', 'modal_section', 'https://forms.aiagencygroup.ai/ai-strategy-session', 'url');
}
add_action( 'customize_register', 'ai_style_theme_customize_register' );

function textarea_sanitize( $input ) {
    return wp_kses_post( $input );
}
