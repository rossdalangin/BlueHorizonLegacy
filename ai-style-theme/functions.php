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
    $add_hsc('div_list', 'List (One per line)', 'hp_div', "Designing AI employees for specific roles\nImplementing AI workflows across departments\nIntegrating tools, systems, and custom builds\nScaling AI inside your company without breaking operations\nTurning AI into a long-term asset, not a one-time project", 'textarea');

    $wp_customize->add_section( 'hp_ind', array('title' => '05. Industries', 'panel' => 'hp_panel') );
    $add_hsc('ind_title', 'Title', 'hp_ind', 'Trusted Across Industries');
    $add_hsc('ind_list', 'List (comma separated)', 'hp_ind', 'Government, Solopreneurs, Insurance, Private Equity, M&A, Mining, Real Estate, Finance, Healthcare, Legal, E-Commerce, Technology, Speaking, Coaching, Trades, Small Business, Manufacturing, Corporate');

    $wp_customize->add_section( 'hp_serv', array('title' => '06. Services', 'panel' => 'hp_panel') );
    $add_hsc('serv_title', 'Title', 'hp_serv', 'How We Can Help You');
    $add_hsc('serv_sub', 'Subtitle', 'hp_serv', 'We are relentlessly focused on one thing. Replacing inefficiency with intelligence and scaling your business without scaling your headcount.', 'textarea');

    $serv_defaults = array(
        1 => array('t' => 'AI Departments', 'd' => 'We build your entire AI operation. Strategy, systems, employees, and workflows. Designed for your business. Deployed and running in weeks.'),
        2 => array('t' => 'AI Employees', 'd' => 'AI employees that handle sales, support, and operations 24/7. Replace or amplify your team with AI that never stops.'),
        3 => array('t' => 'Custom AI Projects', 'd' => 'You dream it. We build it. Have a specific problem or a bold vision? We engineer the AI solution from the ground up.'),
        4 => array('t' => 'AI Workflows', 'd' => 'We map, automate, and optimize your most time-consuming processes. The result is a leaner, faster, more profitable operation.'),
        5 => array('t' => 'AI SEO — AIO', 'd' => 'Search has changed. AI is how people find businesses now. We optimize your presence so AI engines recommend you first.'),
        6 => array('t' => 'AI Training', 'd' => 'We train your people to design, deploy, and manage AI themselves. We make your team dangerous with the most powerful weapon in business.'),
        7 => array('t' => 'Tool Activation', 'd' => 'You have the subscriptions. We turn them into results. We activate, integrate, and implement the AI tools your business already owns so they drive revenue.'),
        8 => array('t' => 'AI Yourself', 'd' => 'Your personal AI. Built around you. Your voice, your knowledge, your decisions. Amplify who you are at every scale.'),
        9 => array('t' => 'AI Your Company', 'd' => 'We build a company-wide AI knowledge base trained on your entire business. Your processes, your IP, your voice, your decisions.'),
        10 => array('t' => 'Custom System', 'd' => 'Want to own your own AI system? We build it for you from the ground up. Your brand. Your logic. Your rules.'),
        11 => array('t' => 'Sell Knowledge', 'd' => 'We build an AI system trained on your knowledge, frameworks, and experience — then help you sell it.'),
        12 => array('t' => 'AI Legacy', 'd' => 'What if your knowledge never disappeared? We build your AI Legacy — a permanent AI trained on everything you know.')
    );
    for($i=1;$i<=12;$i++) {
        $add_hsc("serv_t_$i", "Service $i Title", 'hp_serv', $serv_defaults[$i]['t']);
        $add_hsc("serv_d_$i", "Service $i Desc", 'hp_serv', $serv_defaults[$i]['d']);
    }

    $wp_customize->add_section( 'hp_partner', array('title' => '07. Partner Program', 'panel' => 'hp_panel') );
    $add_hsc('partner_title', 'Title', 'hp_partner', 'Build Your Own AI Agency.');
    $add_hsc('partner_sub', 'Subtitle', 'hp_partner', 'The AI Agency Group is not just a service. It is a platform. We give entrepreneurs, consultants, and business owners the infrastructure, training, and brand power to launch and operate their own AI agency.', 'textarea');
    $partner_defaults = array(
        1 => array('t' => 'White Label Partner', 'd' => 'License our AI systems, training, and infrastructure under your own brand. You sell it. We build it. Full white label from day one.'),
        2 => array('t' => 'Direct Seller Partner', 'd' => 'Sell our AI services directly and earn recurring commissions. No build required. The simplest way to monetize your network with AI.'),
        3 => array('t' => 'AI Agency Builder', 'd' => 'We train you to build, sell, and operate your own AI agency from the ground up. Full curriculum, live support, and a proven system.'),
        4 => array('t' => 'Partnership', 'd' => 'Open your own AI Agency office and partner with us. We co-own and operate with you. We bring the entire infrastructure.')
    );
    for($j=1;$j<=4;$j++) {
        $add_hsc("partner_t_$j", "Partner $j Title", 'hp_partner', $partner_defaults[$j]['t']);
        $add_hsc("partner_d_$j", "Partner $j Desc", 'hp_partner', $partner_defaults[$j]['d']);
    }

    $wp_customize->add_section( 'hp_scale', array('title' => '08. Scale', 'panel' => 'hp_panel') );
    $add_hsc('scale_title', 'Title', 'hp_scale', 'Every Level. Every Scale.');
    $scale_defaults = array(
        1 => array('t' => 'Solopreneur', 'd' => 'Maximum Leverage. You do not need a team. You need AI working for you around the clock. We build your personal AI department.'),
        2 => array('t' => 'Entrepreneur', 'd' => 'Scale Without Overhead. You are growing. Hiring is expensive and slow. We build the AI layer that scales with your revenue.'),
        3 => array('t' => 'Enterprise', 'd' => 'Transform the Operation. You have the infrastructure. We bring the intelligence. We deploy AI departments across divisions.'),
        4 => array('t' => 'Government', 'd' => 'Public Sector AI. We build AI infrastructure for public sector organizations. Streamlined operations, reduced costs, and faster service.')
    );
    for($j=1;$j<=4;$j++) {
        $add_hsc("scale_t_$j", "Scale $j Title", 'hp_scale', $scale_defaults[$j]['t']);
        $add_hsc("scale_d_$j", "Scale $j Desc", 'hp_scale', $scale_defaults[$j]['d']);
    }

    $wp_customize->add_section( 'hp_bio', array('title' => '09. Founder Bio', 'panel' => 'hp_panel') );
    $add_hsc('bio_img', 'Bio Image', 'hp_bio', '', 'image');
    $add_hsc('bio_name', 'Name', 'hp_bio', 'JT FOXX');
    $add_hsc('bio_quote', 'Quote', 'hp_bio', '"Business is War. AI is the New Weapon."');
    $add_hsc('bio_text', 'Bio Text', 'hp_bio', 'JT Foxx is a global entrepreneur...', 'textarea');

    $wp_customize->add_section( 'hp_test', array('title' => '10. Testimonials', 'panel' => 'hp_panel') );
    $add_hsc('test_title', 'Title', 'hp_test', 'Real Businesses. Real Results.');

    $test_defaults = array(
        1 => array('n' => 'Jeff', 'q' => 'The brain is at your fingertips all the time. The strategic business AI has become a crucial business asset that consistently saves me time.'),
        2 => array('n' => 'Gates', 'q' => 'Pays for itself in the first 30 days! The accuracy is like nothing I’ve ever seen. From contracts, to executed plans to succeed. It’s a must have.'),
        3 => array('n' => 'Claire', 'q' => 'Confidence with data-driven customer disputes. Using its strategic insights, we clarified that our pricing reflects a robust business model.'),
        4 => array('n' => 'Steve', 'q' => 'Simplicity, Efficiency and Cost-effectiveness! It’s precise NDA reviews have minimised my legal requirements and costs.')
    );
    for($k=1;$k<=4;$k++) {
        $add_hsc("test_n_$k", "Client $k Name", 'hp_test', $test_defaults[$k]['n']);
        $add_hsc("test_q_$k", "Client $k Quote", 'hp_test', $test_defaults[$k]['q'], 'textarea');
    }

    $wp_customize->add_section( 'hp_cta', array('title' => '11. Final CTA', 'panel' => 'hp_panel') );
    $add_hsc('cta_title', 'Title', 'hp_cta', 'Ready to Work With Us?');
    $add_hsc('cta_sub', 'Subtitle', 'hp_cta', 'The businesses winning right now are not smarter. They are better armed.');

    // Modal
    $wp_customize->add_section( 'modal_sec', array('title' => 'Settings', 'panel' => 'modal_panel') );
    $add_hsc('m_title', 'Title', 'modal_sec', 'Secure Your AI Strategy Session');
    $add_hsc('m_sub', 'Subtitle', 'modal_sec', '15–30 Minutes &middot; No Obligation &middot; Leave with a Clear Plan', 'textarea');

    $wp_customize->add_setting( 'm_type', array( 'default' => 'iframe', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'm_type', array(
        'label' => 'Form Type',
        'section' => 'modal_sec',
        'type' => 'radio',
        'choices' => array( 'iframe' => 'Iframe', 'cf7' => 'Contact Form 7' )
    ));

    $add_hsc('m_iframe', 'Iframe URL', 'modal_sec', 'https://forms.aiagencygroup.ai/ai-strategy-session');
    $add_hsc('m_cf7', 'CF7 Shortcode', 'modal_sec', '[contact-form-7 id="123" title="Book a Call"]');
    $add_hsc('m_ben_title', 'Benefits Title', 'modal_sec', 'What You’ll Get on This Call');
    $add_hsc('m_ben_list', 'Benefits List (One per line)', 'modal_sec', "Identify exactly where your business is losing time, money, and efficiency\nPinpoint where AI employees can replace or support your current team\nMap out every opportunity to increase profit and reduce operating costs\nBreak down how AI applies across your sales, marketing, operations, and client service\nWalk away with a clear execution plan tailored specifically to your business\nDiscover which roles and operations are most immediately replaceable or amplifiable", 'textarea');

    // FAQ
    for($f=1;$f<=5;$f++) {
        $add_hsc("m_faq_q_$f", "FAQ $f Question", 'modal_sec', "Common Question $f");
        $add_hsc("m_faq_a_$f", "FAQ $f Answer", 'modal_sec', "Strategic answer for common question $f", 'textarea');
    }
}
add_action( 'customize_register', 'ai_style_theme_customize_register' );
