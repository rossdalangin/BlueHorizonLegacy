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
    $font_heading = get_theme_mod('font_heading', 'Anton');
    $font_body = get_theme_mod('font_body', 'DM Sans');

    // Support Anton, Oswald, DM Sans, Barlow, Inter, Montserrat
    $fonts_url = 'https://fonts.googleapis.com/css2?family=Anton&family=Barlow:wght@200;300;400;500;600;700;800;900&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@300;400;700;900&family=Montserrat:wght@300;400;700;900&family=Oswald:wght@200..700&display=swap';

    wp_enqueue_style( 'ai-style-theme-fonts', $fonts_url, array(), null );
    wp_enqueue_style( 'ai-style-theme-style', get_stylesheet_uri(), array(), '8.0.0' );
    wp_enqueue_script( 'ai-style-theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), '3.0.0', true );

    $primary_bg = get_theme_mod('color_navy', '#04060f');
    $accent_teal = get_theme_mod('color_teal', '#00e5e5');
    $accent_gold = get_theme_mod('color_gold', '#c5a028');

    $custom_css = ":root {
        --primary-bg: {$primary_bg};
        --accent-teal: {$accent_teal};
        --accent-gold: {$accent_gold};
        --font-heading: '{$font_heading}', sans-serif;
        --font-body: '{$font_body}', sans-serif;
    }";
    wp_add_inline_style( 'ai-style-theme-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'ai_style_theme_scripts' );

function ai_style_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ai-style-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ai-style-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s" style="margin-bottom: 3rem;">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title" style="font-size: 1.2rem; margin-bottom: 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 0.5rem;">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ai_style_theme_widgets_init' );

function ai_style_theme_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'theme_styling', array( 'title' => 'Theme Styling', 'priority' => 20 ) );

    $colors = array(
        'color_navy' => array('label' => 'Primary Background', 'default' => '#04060f'),
        'color_teal' => array('label' => 'Teal Accent', 'default' => '#00e5e5'),
        'color_gold' => array('label' => 'Gold Accent', 'default' => '#c5a028'),
    );
    foreach ($colors as $id => $data) {
        $wp_customize->add_setting( $id, array('default' => $data['default'], 'sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, $id, array('label' => $data['label'], 'section' => 'theme_styling')));
    }

    $wp_customize->add_setting( 'font_heading', array( 'default' => 'Anton', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'font_heading', array(
        'label' => 'Heading Font',
        'section' => 'theme_styling',
        'type' => 'select',
        'choices' => array('Anton' => 'Anton', 'Oswald' => 'Oswald', 'Montserrat' => 'Montserrat', 'Inter' => 'Inter')
    ));

    $wp_customize->add_setting( 'font_body', array( 'default' => 'DM Sans', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'font_body', array(
        'label' => 'Body Font',
        'section' => 'theme_styling',
        'type' => 'select',
        'choices' => array('DM Sans' => 'DM Sans', 'Barlow' => 'Barlow', 'Inter' => 'Inter')
    ));

    $wp_customize->add_panel( 'hp_panel', array( 'title' => 'Homepage Content', 'priority' => 30 ) );
    $wp_customize->add_panel( 'modal_panel', array( 'title' => 'Book a Call Modal', 'priority' => 40 ) );

    $add_hsc = function($id, $label, $section, $default = '', $type = 'text') use ($wp_customize) {
        $sanitize = ($type == 'textarea' || $type == 'wp_kses_post') ? 'wp_kses_post' : ($type == 'url' ? 'esc_url_raw' : 'sanitize_text_field');
        $wp_customize->add_setting( $id, array( 'default' => $default, 'sanitize_callback' => $sanitize ) );
        if ($type == 'image') { $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, array( 'label' => $label, 'section' => $section ) ) ); }
        else { $wp_customize->add_control( $id, array( 'label' => $label, 'section' => $section, 'type' => ($type == 'wp_kses_post' ? 'textarea' : $type) ) ); }
    };

    // Hero
    $wp_customize->add_section( 'hp_hero', array('title' => 'Hero', 'panel' => 'hp_panel') );
    $add_hsc('hero_top', 'Top Bar', 'hp_hero', 'OPERATING IN 72 COUNTRIES  |  102 GLOBAL PARTNERS');
    $add_hsc('hero_title', 'Title', 'hp_hero', 'WE ARE YOUR<br>AI DEPARTMENT.', 'wp_kses_post');
    $add_hsc('hero_sub', 'Subtitle', 'hp_hero', 'We design, build, and deploy AI Departments that scale your business without scaling your headcount. Done for you. Running in weeks.', 'textarea');
    $add_hsc('hero_video', 'Hero Video URL', 'hp_hero', 'https://assets.cdn.filesafe.space/TRgTosvlNzRa9OIbzIzw/media/69d528baad0e3e32704ebe43.mp4');

    // Marquee
    $wp_customize->add_section( 'hp_marquee', array('title' => 'Marquee', 'panel' => 'hp_panel') );
    $add_hsc('mq_text', 'Content', 'hp_marquee', 'AI Departments ✦ AI Employees ✦ Custom AI Projects ✦ AI Workflows ✦ AI SEO — AIO ✦ Tool Activation ✦ AI Training ✦ AI Yourself ✦ 72 Countries ✦ Done For You ✦ Enterprise to Solopreneur', 'textarea');

    // Who
    $wp_customize->add_section( 'hp_who', array('title' => 'Who We Are', 'panel' => 'hp_panel') );
    $add_hsc('who_title', 'Title', 'hp_who', 'INCREASE PROFITABILITY');
    $add_hsc('who_text', 'Description', 'hp_who', 'Business owners who want more margin without more people or more complexity', 'textarea');

    // Training
    $wp_customize->add_section( 'hp_div', array('title' => 'Training Division', 'panel' => 'hp_panel') );
    $add_hsc('div_title', 'Title', 'hp_div', 'IMPLEMENTATION + TRAINING DIVISION');
    $add_hsc('div_text', 'Description', 'hp_div', 'Most AI agencies are run by technicians who understand tools but do not understand how businesses actually operate. Every partner inside our firm is an entrepreneur who owns and operates multiple businesses.', 'textarea');
    $add_hsc('div_list', 'List', 'hp_div', "Designing AI employees for specific roles\nImplementing AI workflows across departments\nIntegrating tools, systems, and custom builds\nScaling AI inside your company without breaking operations\nTurning AI into a long-term asset, not a one-time project", 'textarea');

    // Industries
    $wp_customize->add_section( 'hp_ind', array('title' => 'Industries', 'panel' => 'hp_panel') );
    $add_hsc('ind_list', 'Industries (comma separated)', 'hp_ind', 'Government, Solopreneurs, Insurance, Private Equity, M&A, Mining, Real Estate, Finance, Healthcare, Legal, E-Commerce, Technology, Speaking, Coaching, Trades, Small Business, Manufacturing, Corporate');

    // Services
    $wp_customize->add_section( 'hp_serv', array('title' => 'Services', 'panel' => 'hp_panel') );
    $add_hsc('serv_title', 'Title', 'hp_serv', 'HOW WE CAN HELP YOU');
    $add_hsc('serv_sub', 'Subtitle', 'hp_serv', 'We are relentlessly focused on one thing. Replacing inefficiency with intelligence and scaling your business without scaling your headcount.', 'textarea');

    $serv_defaults = array(
        1 => array('t' => 'AI DEPARTMENTS', 'd' => 'We build your entire AI operation. Strategy, systems, employees, and workflows. Designed for your business. Deployed and running in weeks.'),
        2 => array('t' => 'AI EMPLOYEES', 'd' => 'AI employees that handle sales, support, and operations 24/7. Replace or amplify your team with AI that never stops.'),
        3 => array('t' => 'CUSTOM AI PROJECTS', 'd' => 'You dream it. We build it. Have a specific problem or a bold vision? We engineer the AI solution from the ground up.'),
        4 => array('t' => 'AI WORKFLOWS', 'd' => 'We map, automate, and optimize your most time-consuming processes. The result is a leaner, faster, more profitable operation.'),
        5 => array('t' => 'AI SEO — AIO', 'd' => 'Search has changed. AI is how people find businesses now. We optimize your presence so AI engines recommend you first.'),
        6 => array('t' => 'AI TRAINING', 'd' => 'We train your people to design, deploy, and manage AI themselves. We make your team dangerous with the most powerful weapon in business.'),
        7 => array('t' => 'TOOL ACTIVATION', 'd' => 'You have the subscriptions. We turn them into results. We activate, integrate, and implement the AI tools your business already owns so they drive revenue.'),
        8 => array('t' => 'AI YOURSELF', 'd' => 'Your personal AI. Built around you. Your voice, your knowledge, your decisions. Amplify who you are at every scale.'),
        9 => array('t' => 'AI YOUR COMPANY', 'd' => 'We build a company-wide AI knowledge base trained on your entire business. Your processes, your IP, your voice, your decisions — all encoded into a single AI system accessible to every employee.'),
        10 => array('t' => 'CUSTOM SYSTEM', 'd' => 'Want to own your own AI system? We build it for you from the ground up. Your brand. Your logic. Your rules.'),
        11 => array('t' => 'SELL KNOWLEDGE', 'd' => 'We build an AI system trained on your knowledge, frameworks, and experience — then help you sell it.'),
        12 => array('t' => 'AI LEGACY', 'd' => 'What if your knowledge never disappeared? We build your AI Legacy — a permanent AI trained on everything you know.')
    );
    for($i=1;$i<=12;$i++) {
        $add_hsc("serv_t_$i", "Service $i Title", 'hp_serv', $serv_defaults[$i]['t']);
        $add_hsc("serv_d_$i", "Service $i Desc", 'hp_serv', $serv_defaults[$i]['d']);
    }

    // Partners
    $wp_customize->add_section( 'hp_partner', array('title' => 'Partner Program', 'panel' => 'hp_panel') );
    $add_hsc('partner_title', 'Title', 'hp_partner', 'BUILD YOUR OWN AI AGENCY.');
    $add_hsc('partner_sub', 'Subtitle', 'hp_partner', 'The AI Agency Group is not just a service. It is a platform. We give entrepreneurs, consultants, and business owners the infrastructure, training, and brand power to launch and operate their own AI agency.', 'textarea');
    $partner_defaults = array(
        1 => array('t' => 'WHITE LABEL PARTNER', 'd' => 'License our AI systems, training, and infrastructure under your own brand. You sell it. We build it.'),
        2 => array('t' => 'DIRECT SELLER PARTNER', 'd' => 'Sell our AI services directly and earn recurring commissions. No build required.'),
        3 => array('t' => 'AI AGENCY BUILDER', 'd' => 'We train you to build, sell, and operate your own AI agency from the ground up.'),
        4 => array('t' => 'PARTNERSHIP', 'd' => 'Open your own AI Agency office and partner with us. We co-own and operate with you.')
    );
    for($j=1;$j<=4;$j++) {
        $add_hsc("partner_t_$j", "Partner $j Title", 'hp_partner', $partner_defaults[$j]['t']);
        $add_hsc("partner_d_$j", "Partner $j Desc", 'hp_partner', $partner_defaults[$j]['d']);
    }

    // Scale
    $wp_customize->add_section( 'hp_scale', array('title' => 'Scale', 'panel' => 'hp_panel') );
    $add_hsc('scale_title', 'Title', 'hp_scale', "EVERY LEVEL.\nEVERY SCALE.", 'wp_kses_post');
    $scale_defaults = array(
        1 => array('t' => 'MAXIMUM LEVERAGE', 'd' => 'Solopreneur. You do not need a team. You need AI working for you around the clock. We build your personal AI department.'),
        2 => array('t' => 'SCALE WITHOUT OVERHEAD', 'd' => 'Entrepreneur. You are growing. Hiring is expensive and slow. We build the AI layer that scales with your revenue.'),
        3 => array('t' => 'TRANSFORM THE OPERATION', 'd' => 'Enterprise. You have the infrastructure. We bring the intelligence. We deploy AI departments across divisions.'),
        4 => array('t' => 'PUBLIC SECTOR AI', 'd' => 'Government. We build AI infrastructure for public sector organizations. Streamlined operations, reduced costs.')
    );
    for($j=1;$j<=4;$j++) {
        $add_hsc("scale_t_$j", "Scale $j Title", 'hp_scale', $scale_defaults[$j]['t']);
        $add_hsc("scale_d_$j", "Scale $j Desc", 'hp_scale', $scale_defaults[$j]['d']);
    }

    // Bio
    $wp_customize->add_section( 'hp_bio', array('title' => 'Founder Bio', 'panel' => 'hp_panel') );
    $add_hsc('bio_img', 'Founder Image', 'hp_bio', '', 'image');
    $add_hsc('bio_name', 'Name', 'hp_bio', "WHO IS\nJT FOXX.", 'wp_kses_post');
    $add_hsc('bio_quote', 'Quote', 'hp_bio', '"BUSINESS IS WAR. AI IS THE NEW WEAPON."');
    $add_hsc('bio_text', 'Bio Text', 'hp_bio', "JT Foxx is a global entrepreneur, investor, and one of the most sought-after voices in business today. He has built companies across multiple industries, conducted 100+ interviews with Hollywood A-listers, celebrities, and billionaires, and spoken on stage in countries across every continent.\n\nHe is the best-selling author of three books, including Business is War: AI is the New Weapon — the definitive guide to using AI as a competitive weapon in business.", 'textarea');

    // Testimonials
    $wp_customize->add_section( 'hp_test', array('title' => 'Testimonials', 'panel' => 'hp_panel') );
    $add_hsc('test_title', 'Title', 'hp_test', 'REAL BUSINESSES. REAL RESULTS.');
    $test_defaults = array(
        1 => array('n' => 'JEFF', 'q' => "The strategic business AI has become a crucial business asset that consistently saves me time by efficiently managing tasks and information for my business."),
        2 => array('n' => 'GATES', 'q' => "We have used the brain since the beginning. It has not only saved hours among hours of work. The cost savings alone pay for it self in the first 30 days."),
        3 => array('n' => 'CLAIRE', 'q' => "When faced with a customer disputing their account balance, we leveraged the CEO Advanced framework to deliver a confident, data-driven explanation."),
        4 => array('n' => 'STEVE', 'q' => "A genuine combination of Simplicity, Efficiency and Cost-effectiveness! It's precise NDA reviews have minimised my legal requirements and costs.")
    );
    for($k=1;$k<=4;$k++) {
        $add_hsc("test_n_$k", "Client $k Name", 'hp_test', $test_defaults[$k]['n']);
        $add_hsc("test_q_$k", "Client $k Quote", 'hp_test', $test_defaults[$k]['q'], 'textarea');
    }

    // Modal
    $wp_customize->add_section( 'modal_sec', array('title' => 'Modal Content', 'panel' => 'modal_panel') );
    $add_hsc('m_title', 'Title', 'modal_sec', 'SECURE YOUR AI STRATEGY SESSION');
    $add_hsc('m_sub', 'Subtitle', 'modal_sec', '15–30 Minutes · No Obligation · Leave with a Clear Plan', 'textarea');
    $add_hsc('m_video', 'Modal Video URL', 'modal_sec', 'https://assets.cdn.filesafe.space/TRgTosvlNzRa9OIbzIzw/media/69d6557da64a04ba15df08cc.mp4');
    $add_hsc('m_cf7', 'CF7 Shortcode', 'modal_sec', '[contact-form-7 id="123" title="Book a Call"]');

    // FAQ
    for($f=1;$f<=14;$f++) {
        $add_hsc("m_faq_q_$f", "FAQ $f Question", 'modal_sec', "Question $f");
        $add_hsc("m_faq_a_$f", "FAQ $f Answer", 'modal_sec', "Answer $f", 'textarea');
    }

    // Extra Modal
    $wp_customize->add_section( 'modal_content', array('title' => 'Modal Informational Sections', 'panel' => 'modal_panel') );
    $add_hsc('m_for_title', 'Who This Is For Title', 'modal_content', 'Who This Is For');
    $add_hsc('m_for_items', 'Who This Is For Items (Icon|Title|Desc per line)', 'modal_content', "↑|Increase Profitability|Business owners who want more margin without more people or more complexity\n↓|Reduce Operating Costs|Executives looking to cut overhead without cutting performance or output\n⚡|Improve Efficiency|Leaders who want faster execution across every department without adding complexity\n→|Scale Without Bloat|Operators ready to grow without adding unnecessary overhead or headcount", 'textarea');

    $add_hsc('m_comp_title', 'Comparison Title', 'modal_content', 'Most Companies Use AI Wrong');
    $add_hsc('m_comp_items', 'Comparison Items (Typical|This Session per line)', 'modal_content', "Generic AI overview with no direct application to your business, your team, or your numbers|Specific to your business, your team structure, your cost model, and your revenue opportunity\nAI tools that save small amounts of time on low-leverage tasks that barely move the needle|Focused entirely on where AI actually impacts profit, operating costs, and execution at scale\nYou walk away with a generic roadmap that could apply to any company in any industry|You walk away with a clear, tailored execution plan built specifically around your business", 'textarea');

    $add_hsc('m_delay_title', 'Delay Cost Title', 'modal_content', 'Every Month You Delay Has a Cost');
    $add_hsc('m_delay_desc', 'Delay Cost Description', 'modal_content', 'Most companies use AI to save small amounts of time. This session focuses on using AI where it actually impacts profit, cost, and execution. That gap compounds every month it goes unaddressed.', 'textarea');
    $add_hsc('m_delay_list', 'Delay Cost List (One per line)', 'modal_content', "You continue paying for work AI could handle at a fraction of the cost\nYour competitors move faster and operate more efficiently every quarter\nThe margin between leaders and followers widens and accelerates", 'textarea');

    // Branding & Footer
    $wp_customize->add_section( 'theme_branding', array('title' => 'Branding & Footer', 'priority' => 100) );
    $add_hsc('footer_logo', 'Site Logo Text', 'theme_branding', 'AI AGENCY GROUP');
    $add_hsc('footer_copy', 'Copyright Text', 'theme_branding', 'AI Agency Group LLC — All Rights Reserved');
}
add_action( 'customize_register', 'ai_style_theme_customize_register' );
