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
        array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
    );
}
add_action( 'after_setup_theme', 'ai_style_theme_setup' );

function ai_style_theme_scripts() {
    $font_heading = get_theme_mod('font_heading', 'Montserrat');
    $font_body = get_theme_mod('font_body', 'Inter');

    // Prepare fonts for Google Fonts URL
    $fonts = array();
    $fonts[] = $font_heading . ':wght@700;800';
    $fonts[] = $font_body . ':wght@300;400;600;700';

    $fonts_url = 'https://fonts.googleapis.com/css2?family=' . implode('&family=', array_map(function($f) { return str_replace(' ', '+', $f); }, $fonts)) . '&display=swap';

    wp_enqueue_style( 'ai-style-theme-fonts', $fonts_url, array(), null );
    wp_enqueue_style( 'ai-style-theme-style', get_stylesheet_uri(), array(), '2.5.0' );
    wp_enqueue_script( 'ai-style-theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), '2.4.0', true );

    $primary_navy = get_theme_mod('color_navy', '#001f3f');
    $primary_charcoal = get_theme_mod('color_charcoal', '#080808');
    $accent_teal = get_theme_mod('color_teal', '#00e5e5');
    $accent_gold = get_theme_mod('color_gold', '#c5a028');

    $custom_css = ":root {
        --primary-navy: {$primary_navy};
        --primary-charcoal: {$primary_charcoal};
        --accent-teal: {$accent_teal};
        --accent-gold: {$accent_gold};
        --font-heading: '{$font_heading}', sans-serif;
        --font-body: '{$font_body}', sans-serif;
    }";
    wp_add_inline_style( 'ai-style-theme-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'ai_style_theme_scripts' );

function ai_style_theme_widgets_init() {
	register_sidebar( array( 'name' => 'Sidebar', 'id' => 'sidebar-1', 'before_widget' => '<section id="%1$s" class="widget %2$s">', 'after_widget' => '</section>', 'before_title' => '<h2 class="widget-title">', 'after_title' => '</h2>' ) );
}
add_action( 'widgets_init', 'ai_style_theme_widgets_init' );

/**
 * Customizer
 */
function ai_style_theme_customize_register( $wp_customize ) {

    // Theme Styling
    $wp_customize->add_section( 'theme_styling', array( 'title' => 'Theme Styling', 'priority' => 20 ) );

    // Colors
    $colors = array(
        'color_navy' => array('label' => 'Navy (Primary)', 'default' => '#001f3f'),
        'color_charcoal' => array('label' => 'Charcoal (Secondary)', 'default' => '#080808'),
        'color_teal' => array('label' => 'Teal (Accent 1)', 'default' => '#00e5e5'),
        'color_gold' => array('label' => 'Gold (Accent 2)', 'default' => '#c5a028'),
    );
    foreach ($colors as $id => $data) {
        $wp_customize->add_setting( $id, array('default' => $data['default'], 'sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, $id, array('label' => $data['label'], 'section' => 'theme_styling')));
    }

    // Fonts
    $wp_customize->add_setting( 'font_heading', array( 'default' => 'Montserrat', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'font_heading', array(
        'label' => 'Heading Font',
        'section' => 'theme_styling',
        'type' => 'select',
        'choices' => array(
            'Montserrat' => 'Montserrat',
            'Inter' => 'Inter',
            'Oswald' => 'Oswald',
            'Roboto' => 'Roboto',
            'Space Grotesk' => 'Space Grotesk',
        )
    ));

    $wp_customize->add_setting( 'font_body', array( 'default' => 'Inter', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'font_body', array(
        'label' => 'Body Font',
        'section' => 'theme_styling',
        'type' => 'select',
        'choices' => array(
            'Inter' => 'Inter',
            'Montserrat' => 'Montserrat',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Lightweight Sans' => 'Lightweight Sans',
        )
    ));

    // Panels
    $wp_customize->add_panel( 'hp_panel', array( 'title' => 'Homepage Content', 'priority' => 30 ) );
    $wp_customize->add_panel( 'modal_panel', array( 'title' => 'Book a Call Modal', 'priority' => 40 ) );

    $add_hsc = function($id, $label, $section, $default = '', $type = 'text') use ($wp_customize) {
        $wp_customize->add_setting( $id, array( 'default' => $default, 'sanitize_callback' => ($type == 'textarea' ? 'wp_kses_post' : ($type == 'url' ? 'esc_url_raw' : 'sanitize_text_field')) ) );
        if ($type == 'image') { $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, array( 'label' => $label, 'section' => $section ) ) ); }
        else { $wp_customize->add_control( $id, array( 'label' => $label, 'section' => $section, 'type' => $type ) ); }
    };

    // Homepage Sections
    $wp_customize->add_section( 'hp_hero', array('title' => '01. Hero', 'panel' => 'hp_panel') );
    $add_hsc('hero_top', 'Top Bar', 'hp_hero', 'Operating in 72 Countries  |  102 Global Partners');
    $add_hsc('hero_title', 'Title', 'hp_hero', 'We Are Your<br>AI Department.');
    $add_hsc('hero_sub', 'Subtitle', 'hp_hero', 'We design, build, and deploy AI Departments that scale your business without scaling your headcount.', 'textarea');
    $add_hsc('hero_btn', 'Btn Text', 'hp_hero', 'Book a Strategy Call');

    $wp_customize->add_section( 'hp_marquee', array('title' => '02. Marquee', 'panel' => 'hp_panel') );
    $add_hsc('mq_text', 'Content', 'hp_marquee', 'AI Departments ✦ AI Employees ✦ Custom AI Projects ✦ AI Workflows ✦ AI SEO — AIO ✦ Tool Activation ✦ AI Training ✦ AI Yourself ✦ 72 Countries ✦ Done For You ✦ Enterprise to Solopreneur', 'textarea');

    $wp_customize->add_section( 'hp_who', array('title' => '03. Who We Are', 'panel' => 'hp_panel') );
    $add_hsc('who_title', 'Title', 'hp_who', 'Who Is The AI Agency Group');
    $add_hsc('who_text', 'Text', 'hp_who', 'The AI Agency Group is a global AI infrastructure and implementation firm builds AI departments and AI employees that replace work, reduce costs, and increase output across your business.', 'textarea');

    $wp_customize->add_section( 'hp_div', array('title' => '04. Training Division', 'panel' => 'hp_panel') );
    $add_hsc('div_title', 'Title', 'hp_div', 'Implementation + Training Division');
    $add_hsc('div_text', 'Text', 'hp_div', 'We do not just build AI systems for you. We also give you the capability to build and control them internally.', 'textarea');

    $wp_customize->add_section( 'hp_ind', array('title' => '05. Industries', 'panel' => 'hp_panel') );
    $add_hsc('ind_title', 'Title', 'hp_ind', 'Trusted Across Industries');
    $add_hsc('ind_list', 'List (comma separated)', 'hp_ind', 'Government, Solopreneurs, Insurance, Finance, Healthcare, Legal, E-Commerce, Technology');

    $wp_customize->add_section( 'hp_serv', array('title' => '06. Services', 'panel' => 'hp_panel') );
    $add_hsc('serv_title', 'Title', 'hp_serv', 'How We Can Help You');
    $add_hsc('serv_sub', 'Subtitle', 'hp_serv', 'Replacing inefficiency with intelligence.', 'textarea');

    $serv_defaults = array(
        1 => array('t' => 'AI Departments', 'd' => 'We build specialized AI departments that operate as independent, high-output units within your business.'),
        2 => array('t' => 'AI Employees', 'd' => 'Digital workers designed for specific roles, trained on your data, and integrated into your daily workflows.'),
        3 => array('t' => 'Custom AI Projects', 'd' => 'Tailored AI solutions for unique business challenges, from predictive modeling to computer vision.'),
        4 => array('t' => 'AI Workflows', 'd' => 'Automate complex, multi-step processes using LLMs and traditional automation tools.'),
        5 => array('t' => 'AI SEO — AIO', 'd' => 'Optimize your presence for the age of AI search and generative engines.'),
        6 => array('t' => 'Tool Activation', 'd' => 'Expert setup and integration of best-in-class AI tools into your existing tech stack.'),
        7 => array('t' => 'AI Training', 'd' => 'Comprehensive programs to upskill your leadership and staff on leveraging AI effectively.'),
        8 => array('t' => 'AI Yourself', 'd' => 'Capture your expertise, voice, and decision-making into a personal AI model.'),
        9 => array('t' => 'Infrastructure Build', 'd' => 'Secure, scalable cloud and local AI infrastructure designed for enterprise-grade performance.'),
        10 => array('t' => 'Data Intelligence', 'd' => 'Transform your raw business data into actionable insights and automated decision trees.'),
        11 => array('t' => 'Compliance & Ethics', 'd' => 'Ensure your AI implementations meet global regulatory standards and ethical guidelines.'),
        12 => array('t' => 'Managed AI Services', 'd' => 'Ongoing monitoring, optimization, and scaling of your AI systems by our expert team.')
    );
    for($i=1;$i<=12;$i++) {
        $add_hsc("serv_t_$i", "Service $i Title", 'hp_serv', $serv_defaults[$i]['t']);
        $add_hsc("serv_d_$i", "Service $i Desc", 'hp_serv', $serv_defaults[$i]['d']);
    }

    $wp_customize->add_section( 'hp_scale', array('title' => '07. Scale', 'panel' => 'hp_panel') );
    $add_hsc('scale_title', 'Title', 'hp_scale', 'Every Level. Every Scale.');
    $scale_defaults = array(
        1 => array('t' => 'Solopreneur', 'd' => 'Scale your personal output without adding expensive human staff.'),
        2 => array('t' => 'Small Business', 'd' => 'Compete with industry giants using high-efficiency AI infrastructure.'),
        3 => array('t' => 'Mid-Market', 'd' => 'Optimize departmental performance and reduce operational overhead.'),
        4 => array('t' => 'Enterprise', 'd' => 'Global-scale AI deployment with strict security and custom integration.')
    );
    for($j=1;$j<=4;$j++) {
        $add_hsc("scale_t_$j", "Scale $j Title", 'hp_scale', $scale_defaults[$j]['t']);
        $add_hsc("scale_d_$j", "Scale $j Desc", 'hp_scale', $scale_defaults[$j]['d']);
    }

    $wp_customize->add_section( 'hp_bio', array('title' => '08. Founder Bio', 'panel' => 'hp_panel') );
    $add_hsc('bio_img', 'Bio Image', 'hp_bio', '', 'image');
    $add_hsc('bio_name', 'Name', 'hp_bio', 'JT FOXX');
    $add_hsc('bio_quote', 'Quote', 'hp_bio', '"Business is War. AI is the New Weapon."');
    $add_hsc('bio_text', 'Bio Text', 'hp_bio', 'JT Foxx is a global entrepreneur...', 'textarea');

    $wp_customize->add_section( 'hp_test', array('title' => '09. Testimonials', 'panel' => 'hp_panel') );
    $add_hsc('test_title', 'Title', 'hp_test', 'Real Businesses. Real Results.');
    for($k=1;$k<=4;$k++) { $add_hsc("test_n_$k", "Client $k Name", 'hp_test', "Client $k"); $add_hsc("test_q_$k", "Client $k Quote", 'hp_test', "Testimonial content for client $k", 'textarea'); }

    $wp_customize->add_section( 'hp_cta', array('title' => '10. Final CTA', 'panel' => 'hp_panel') );
    $add_hsc('cta_title', 'Title', 'hp_cta', 'Ready to Work With Us?');
    $add_hsc('cta_sub', 'Subtitle', 'hp_cta', 'The businesses winning right now are not smarter. They are better armed.');

    // Modal
    $wp_customize->add_section( 'modal_sec', array('title' => 'Settings', 'panel' => 'modal_panel') );
    $add_hsc('m_title', 'Title', 'modal_sec', 'Secure Your AI Strategy Session');
    $add_hsc('m_sub', 'Subtitle', 'modal_sec', '15–30 Minutes &middot; No Obligation', 'textarea');
    $add_hsc('m_ben_title', 'Benefits Title', 'modal_sec', 'What You’ll Get on This Call');
    $add_hsc('m_ben_list', 'Benefits List (One per line)', 'modal_sec', "Identify losing time/money\nPinpoint replaceable roles\nMap profit opportunities", 'textarea');
    $add_hsc('m_cf7', 'CF7 Shortcode', 'modal_sec', '[contact-form-7 id="123" title="Book a Call"]');
}
add_action( 'customize_register', 'ai_style_theme_customize_register' );
