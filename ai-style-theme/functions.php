<?php
/**
 * AI Style Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
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
    wp_enqueue_style( 'ai-style-theme-style', get_stylesheet_uri(), array(), '1.1.0' );
    wp_enqueue_script( 'ai-style-theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), '1.1.0', true );
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
 * Customizer additions.
 */
function ai_style_theme_customize_register( $wp_customize ) {
    $wp_customize->add_panel( 'homepage_settings', array(
        'title' => __( 'Homepage Settings', 'ai-style-theme' ),
        'priority' => 30,
    ) );

    // Hero Section
    $wp_customize->add_section( 'hero_section', array(
        'title' => __( 'Hero Section', 'ai-style-theme' ),
        'panel' => 'homepage_settings',
    ) );
    $wp_customize->add_setting( 'hero_title', array('default' => 'We Are Your AI Department.', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'hero_title', array('label' => __( 'Hero Title', 'ai-style-theme' ), 'section' => 'hero_section', 'type' => 'text'));
    $wp_customize->add_setting( 'hero_subtitle', array('default' => 'We design, build, and deploy AI Departments that scale your business without scaling your headcount. Done for you. Running in weeks.', 'sanitize_callback' => 'textarea_sanitize'));
    $wp_customize->add_control( 'hero_subtitle', array('label' => __( 'Hero Subtitle', 'ai-style-theme' ), 'section' => 'hero_section', 'type' => 'textarea'));
    $wp_customize->add_setting( 'hero_cta_text', array('default' => 'Book a Strategy Call', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'hero_cta_text', array('label' => __( 'Hero CTA Text', 'ai-style-theme' ), 'section' => 'hero_section', 'type' => 'text'));

    // About Section
    $wp_customize->add_section( 'about_section', array(
        'title' => __( 'Who We Are', 'ai-style-theme' ),
        'panel' => 'homepage_settings',
    ) );
    $wp_customize->add_setting( 'about_title', array('default' => 'Who Is The AI Agency Group', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'about_title', array('label' => __( 'About Title', 'ai-style-theme' ), 'section' => 'about_section', 'type' => 'text'));
    $wp_customize->add_setting( 'about_content', array('default' => 'The AI Agency Group is a global AI infrastructure and implementation firm that builds AI departments and AI employees that replace work, reduce costs, and increase output across your business.', 'sanitize_callback' => 'textarea_sanitize'));
    $wp_customize->add_control( 'about_content', array('label' => __( 'About Content', 'ai-style-theme' ), 'section' => 'about_section', 'type' => 'textarea'));

    // Services Section
    $wp_customize->add_section( 'services_section', array(
        'title' => __( 'Services Section', 'ai-style-theme' ),
        'panel' => 'homepage_settings',
    ) );
    $wp_customize->add_setting( 'services_title', array('default' => 'How We Can Help You', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'services_title', array('label' => __( 'Services Title', 'ai-style-theme' ), 'section' => 'services_section', 'type' => 'text'));

    // CTA Section
    $wp_customize->add_section( 'cta_section', array(
        'title' => __( 'CTA Section', 'ai-style-theme' ),
        'panel' => 'homepage_settings',
    ) );
    $wp_customize->add_setting( 'cta_title', array('default' => 'Ready to Work With Us?', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'cta_title', array('label' => __( 'CTA Title', 'ai-style-theme' ), 'section' => 'cta_section', 'type' => 'text'));
    $wp_customize->add_setting( 'cta_content', array('default' => 'The businesses winning right now are not smarter. They are better armed. Let us build your AI department.', 'sanitize_callback' => 'textarea_sanitize'));
    $wp_customize->add_control( 'cta_content', array('label' => __( 'CTA Content', 'ai-style-theme' ), 'section' => 'cta_section', 'type' => 'textarea'));

    // Modal Settings
    $wp_customize->add_section( 'modal_section', array(
        'title' => __( 'Modal Settings (Popup)', 'ai-style-theme' ),
        'priority' => 31,
    ) );
    $wp_customize->add_setting( 'modal_title', array('default' => 'Secure Your AI Strategy Session', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'modal_title', array('label' => __( 'Modal Title', 'ai-style-theme' ), 'section' => 'modal_section', 'type' => 'text'));
    $wp_customize->add_setting( 'modal_subtitle', array('default' => '15–30 Minutes  &middot;  No Obligation  &middot;  Leave with a Clear Plan', 'sanitize_callback' => 'textarea_sanitize'));
    $wp_customize->add_control( 'modal_subtitle', array('label' => __( 'Modal Subtitle', 'ai-style-theme' ), 'section' => 'modal_section', 'type' => 'text'));
    $wp_customize->add_setting( 'modal_info', array('default' => 'Limited availability — if a slot is visible, it just opened', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'modal_info', array('label' => __( 'Modal Info Text', 'ai-style-theme' ), 'section' => 'modal_section', 'type' => 'text'));
    $wp_customize->add_setting( 'modal_iframe_url', array('default' => 'https://forms.aiagencygroup.ai/ai-strategy-session', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control( 'modal_iframe_url', array('label' => __( 'Iframe URL', 'ai-style-theme' ), 'section' => 'modal_section', 'type' => 'url'));
}
add_action( 'customize_register', 'ai_style_theme_customize_register' );

function textarea_sanitize( $input ) {
    return wp_kses_post( $input );
}
