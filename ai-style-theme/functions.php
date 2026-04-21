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

    // Prepare fonts for Google Fonts URL - Dynamic support for chosen fonts
    $fonts = array('Anton', 'DM Sans', 'Oswald', 'Montserrat', 'Inter');
    $fonts_url = 'https://fonts.googleapis.com/css2?family=' . implode('&family=', array_map(function($f) { return str_replace(' ', '+', $f) . ':wght@300;400;500;600;700;800;900'; }, $fonts)) . '&display=swap';

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
    $wp_customize->add_setting( 'font_heading', array( 'default' => 'Anton', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'font_heading', array(
        'label' => 'Heading Font',
        'section' => 'theme_styling',
        'type' => 'select',
        'choices' => array(
            'Anton' => 'Anton',
            'Oswald' => 'Oswald',
            'Montserrat' => 'Montserrat',
            'Inter' => 'Inter',
        )
    ));

    $wp_customize->add_setting( 'font_body', array( 'default' => 'DM Sans', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'font_body', array(
        'label' => 'Body Font',
        'section' => 'theme_styling',
        'type' => 'select',
        'choices' => array(
            'DM Sans' => 'DM Sans',
            'Inter' => 'Inter',
            'Open Sans' => 'Open Sans',
        )
    ));

    // Panels
    $wp_customize->add_panel( 'hp_panel', array( 'title' => 'Homepage Content', 'priority' => 30 ) );
    $wp_customize->add_panel( 'modal_panel', array( 'title' => 'Book a Call Modal', 'priority' => 40 ) );

    $add_hsc = function($id, $label, $section, $default = '', $type = 'text') use ($wp_customize) {
        $sanitize = ($type == 'textarea' || $type == 'wp_kses_post') ? 'wp_kses_post' : ($type == 'url' ? 'esc_url_raw' : 'sanitize_text_field');
        $wp_customize->add_setting( $id, array( 'default' => $default, 'sanitize_callback' => $sanitize ) );
        if ($type == 'image') { $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, array( 'label' => $label, 'section' => $section ) ) ); }
        else { $wp_customize->add_control( $id, array( 'label' => $label, 'section' => $section, 'type' => ($type == 'wp_kses_post' ? 'textarea' : $type) ) ); }
    };

    // Homepage Sections
    $wp_customize->add_section( 'hp_hero', array('title' => '01. Hero', 'panel' => 'hp_panel') );
    $add_hsc('hero_top', 'Top Bar', 'hp_hero', 'OPERATING IN 72 COUNTRIES  |  102 GLOBAL PARTNERS');
    $add_hsc('hero_title', 'Title', 'hp_hero', 'WE ARE YOUR<br>AI DEPARTMENT.', 'wp_kses_post');
    $add_hsc('hero_sub', 'Subtitle', 'hp_hero', 'We design, build, and deploy AI Departments that scale your business without scaling your headcount. Done for you. Running in weeks.', 'textarea');
    $add_hsc('hero_btn', 'Btn Text', 'hp_hero', 'Book a Strategy Call');

    $wp_customize->add_section( 'hp_marquee', array('title' => '02. Marquee', 'panel' => 'hp_panel') );
    $add_hsc('mq_text', 'Content', 'hp_marquee', 'AI Departments ✦ AI Employees ✦ Custom AI Projects ✦ AI Workflows ✦ AI SEO — AIO ✦ Tool Activation ✦ AI Training ✦ AI Yourself ✦ 72 Countries ✦ Done For You ✦ Enterprise to Solopreneur', 'textarea');

    $wp_customize->add_section( 'hp_who', array('title' => '03. Who We Are', 'panel' => 'hp_panel') );
    $add_hsc('who_title', 'Title', 'hp_who', 'INCREASE PROFITABILITY');
    $add_hsc('who_text', 'Text', 'hp_who', 'Business owners who want more margin without more people or more complexity', 'textarea');

    $wp_customize->add_section( 'hp_div', array('title' => '04. Training Division', 'panel' => 'hp_panel') );
    $add_hsc('div_title', 'Title', 'hp_div', 'IMPLEMENTATION + TRAINING DIVISION');
    $add_hsc('div_text', 'Text', 'hp_div', 'Most AI agencies are run by technicians who understand tools but do not understand how businesses actually operate. Every partner inside our firm is an entrepreneur who owns and operates multiple businesses.', 'textarea');
    $add_hsc('div_list', 'List (One per line)', 'hp_div', "Designing AI employees for specific roles\nImplementing AI workflows across departments\nIntegrating tools, systems, and custom builds\nScaling AI inside your company without breaking operations\nTurning AI into a long-term asset, not a one-time project", 'textarea');

    $wp_customize->add_section( 'hp_ind', array('title' => '05. Industries', 'panel' => 'hp_panel') );
    $add_hsc('ind_title', 'Title', 'hp_ind', 'Trusted Across Industries');
    $add_hsc('ind_list', 'List (comma separated)', 'hp_ind', 'Government, Solopreneurs, Insurance, Private Equity, M&A, Mining, Real Estate, Finance, Healthcare, Legal, E-Commerce, Technology, Speaking, Coaching, Trades, Small Business, Manufacturing, Corporate');

    $wp_customize->add_section( 'hp_serv', array('title' => '06. Services', 'panel' => 'hp_panel') );
    $add_hsc('serv_title', 'Title', 'hp_serv', 'How We Can Help You');
    $add_hsc('serv_sub', 'Subtitle', 'hp_serv', 'We are relentlessly focused on one thing. Replacing inefficiency with intelligence and scaling your business without scaling your headcount.', 'textarea');

    $serv_defaults = array(
        1 => array('t' => 'AI DEPARTMENTS', 'd' => 'We build your entire AI operation. Strategy, systems, employees, and workflows. Designed for your business. Deployed and running in weeks. Most businesses have tools. The ones pulling ahead have departments.'),
        2 => array('t' => 'AI EMPLOYEES', 'd' => 'AI employees that handle sales, support, and operations 24/7. Replace or amplify your team with AI that never stops.'),
        3 => array('t' => 'CUSTOM AI PROJECTS', 'd' => 'You dream it. We build it. Have a specific problem or a bold vision? We engineer the AI solution from the ground up.'),
        4 => array('t' => 'AI WORKFLOWS', 'd' => 'We map, automate, and optimize your most time-consuming processes. The result is a leaner, faster, more profitable operation.'),
        5 => array('t' => 'AI SEO — AIO', 'd' => 'Search has changed. AI is how people find businesses now. We optimize your presence so AI engines recommend you first.'),
        6 => array('t' => 'AI TRAINING', 'd' => 'We train your people to design, deploy, and manage AI themselves. We make your team dangerous with the most powerful weapon in business.'),
        7 => array('t' => 'TOOL ACTIVATION', 'd' => 'You have the subscriptions. We turn them into results. We activate, integrate, and implement the AI tools your business already owns so they drive revenue.'),
        8 => array('t' => 'AI YOURSELF', 'd' => 'Your personal AI. Built around you. Your voice, your knowledge, your decisions. Amplify who you are at every scale.'),
        9 => array('t' => 'AI YOUR COMPANY', 'd' => 'We build a company-wide AI knowledge base trained on your entire business. Your processes, your IP, your voice, your decisions — all encoded into a single AI system accessible to every employee. Every department runs faster.'),
        10 => array('t' => 'CUSTOM SYSTEM', 'd' => 'Want to own your own AI system? We build it for you from the ground up. Your brand. Your logic. Your rules.'),
        11 => array('t' => 'SELL KNOWLEDGE', 'd' => 'We build an AI system trained on your knowledge, frameworks, and experience — then help you sell it.'),
        12 => array('t' => 'AI LEGACY', 'd' => 'What if your knowledge never disappeared? We build your AI Legacy — a permanent AI trained on everything you know.')
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
    $add_hsc('scale_title', 'Title', 'hp_scale', "EVERY LEVEL.\nEVERY SCALE.", 'wp_kses_post');
    $scale_defaults = array(
        1 => array('t' => 'Maximum Leverage', 'd' => 'Solopreneur. You do not need a team. You need AI working for you around the clock. We build your personal AI department so you operate like a company ten times your size.'),
        2 => array('t' => 'Scale Without Overhead', 'd' => 'Entrepreneur. You are growing. Hiring is expensive and slow. We build the AI layer that scales with your revenue without scaling your payroll. Grow smarter, not bigger.'),
        3 => array('t' => 'Transform the Operation', 'd' => 'Enterprise. You have the infrastructure. We bring the intelligence. We deploy AI departments across divisions, automate complex workflows, and build the systems that keep you ahead.'),
        4 => array('t' => 'Public Sector AI', 'd' => 'Government. We build AI infrastructure for public sector organizations. Streamlined operations, reduced costs, and faster service delivery. AI built for accountability, security, and scale.')
    );
    for($j=1;$j<=4;$j++) {
        $add_hsc("scale_t_$j", "Scale $j Title", 'hp_scale', $scale_defaults[$j]['t']);
        $add_hsc("scale_d_$j", "Scale $j Desc", 'hp_scale', $scale_defaults[$j]['d']);
    }

    $wp_customize->add_section( 'hp_bio', array('title' => '09. Founder Bio', 'panel' => 'hp_panel') );
    $add_hsc('bio_img', 'Bio Image', 'hp_bio', '', 'image');
    $add_hsc('bio_name', 'Name', 'hp_bio', "WHO IS\nJT FOXX.", 'wp_kses_post');
    $add_hsc('bio_quote', 'Quote', 'hp_bio', '"BUSINESS IS WAR. AI IS THE NEW WEAPON."');
    $add_hsc('bio_text', 'Bio Text', 'hp_bio', "JT Foxx is a global entrepreneur, investor, and one of the most sought-after voices in business today. He has built companies across multiple industries, conducted 100+ interviews with Hollywood A-listers, celebrities, and billionaires, and spoken on stage in countries across every continent.\n\nHe is the best-selling author of three books, including Business is War: AI is the New Weapon — the definitive guide to using AI as a competitive weapon in business.\n\nAs Founding Managing Partner of AI Agency Group, JT brings the operating experience, global network, and investor mindset that separates this firm from every other AI agency on the planet.\n\nHe does not just understand AI. He understands what businesses need to win. Revenue. Margin. Speed. Execution. That is what every system we build is designed around.", 'textarea');

    $wp_customize->add_section( 'hp_test', array('title' => '10. Testimonials', 'panel' => 'hp_panel') );
    $add_hsc('test_title', 'Title', 'hp_test', 'Real Businesses. Real Results.');

    $test_defaults = array(
        1 => array('n' => 'JEFF', 'q' => "The strategic business AI has become a crucial business asset that consistently saves me time by efficiently managing tasks and information for my business. Its powerful capabilities allow me to streamline processes without the constant need to engage others, enabling faster decision-making and execution. A go to place to manage great solutions and conversations we usually get from a 3rd party at great expense. The brain is at your fingertips all the time."),
        2 => array('n' => 'GATES', 'q' => "We have used the brain since the beginning. It has not only saved hours among hours of work. When commanded it gives the most professional responses from analyzing deals to marketing and business plans and any other task a top CEO would need to complete. The accuracy is like nothing I've ever seen. From contracts, to executed plans to succeed. It's a must have. The cost savings alone pay for it self in the first 30 days, and ensures you achieve success."),
        3 => array('n' => 'CLAIRE', 'q' => "When faced with a customer disputing their account balance and questioning the value of our apprentice pricing, we leveraged the CEO Advanced framework to deliver a confident, data-driven explanation. Using its strategic insights, we clarified that our pricing reflects a robust business model designed to sustain high-quality service delivery. Specifically, we highlighted how our costs responsibly cover critical overheads such as talent acquisition, training, compliance, and operational excellence."),
        4 => array('n' => 'STEVE', 'q' => "A genuine combination of Simplicity, Efficiency and Cost-effectiveness! It's precise NDA reviews have minimised my legal requirements and costs, in addition to reducing review time from days to hours. By flagging any risks within NDAs, such as hidden marketing clauses, I am able to engage legal counsel strategically, attending to deals faster and with confidence. It's the difference between missing an opportunity and sealing a great deal. This is THE essential business tool.")
    );
    for($k=1;$k<=4;$k++) {
        $add_hsc("test_n_$k", "Client $k Name", 'hp_test', $test_defaults[$k]['n']);
        $add_hsc("test_q_$k", "Client $k Quote", 'hp_test', $test_defaults[$k]['q'], 'textarea');
    }

    $wp_customize->add_section( 'hp_cta', array('title' => '11. Final CTA', 'panel' => 'hp_panel') );
    $add_hsc('cta_title', 'Title', 'hp_cta', 'Ready to Work With Us?');
    $add_hsc('cta_sub', 'Subtitle', 'hp_cta', 'The businesses winning right now are not smarter. They are better armed.');

    // Footer
    $wp_customize->add_section( 'theme_footer', array('title' => 'Footer Settings', 'priority' => 100) );
    $add_hsc('footer_logo', 'Footer Logo Text', 'theme_footer', 'AI AGENCY GROUP');
    $add_hsc('footer_copy', 'Copyright Text', 'theme_footer', 'AI Agency Group LLC — All Rights Reserved');

    // Modal
    $wp_customize->add_section( 'modal_sec', array('title' => 'Settings', 'panel' => 'modal_panel') );
    $add_hsc('m_title', 'Title', 'modal_sec', 'Secure Your AI Strategy Session');
    $add_hsc('m_sub', 'Subtitle', 'modal_sec', '15–30 Minutes &middot; No Obligation &middot; Leave with a Clear Plan', 'textarea');
    $add_hsc('m_cf7', 'CF7 Shortcode', 'modal_sec', '[contact-form-7 id="123" title="Book a Call"]');
    $add_hsc('m_ben_title', 'Benefits Title', 'modal_sec', 'What You’ll Get on This Call');
    $add_hsc('m_ben_list', 'Benefits List (One per line)', 'modal_sec', "Identify exactly where your business is losing time, money, and efficiency\nPinpoint where AI employees can replace or support your current team\nMap out every opportunity to increase profit and reduce operating costs\nBreak down how AI applies across your sales, marketing, operations, and client service\nWalk away with a clear execution plan tailored specifically to your business\nDiscover which roles and operations are most immediately replaceable or amplifiable", 'textarea');

    // FAQ
    $faq_defaults = array(
        1 => array('q' => 'WHAT EXACTLY HAPPENS ON THE STRATEGY SESSION?', 'a' => 'This is a focused working session. We look at your business, identify where time, money, and efficiency are being lost, and map out where AI can replace or support your team. You will leave with a clear understanding of where AI fits, what can be automated or improved, and what your first steps should be. This is applied directly to your business, not theory.'),
        2 => array('q' => 'IS THIS JUST ANOTHER SALES CALL?', 'a' => 'No. This is a strategy session designed to give you clarity on how AI can be implemented inside your business. If there is a fit to work together, we will discuss next steps. If not, you still leave with a plan you can execute.'),
        3 => array('q' => 'WHAT TYPES OF BUSINESSES DO YOU WORK WITH?', 'a' => 'We work with business owners, entrepreneurs, executives, and companies from small businesses to enterprise and government. If your business has processes, people, or operations, AI can be applied.'),
        4 => array('q' => 'WHAT DO YOU MEAN BY AI EMPLOYEES?', 'a' => 'AI employees are systems designed to perform specific roles inside your business. This includes sales follow-up, marketing content and campaigns, customer service responses, operational workflows, and internal support tasks. They replace repetitive, time-consuming, and process-driven work, while allowing your team to focus on higher-value activities.'),
        5 => array('q' => 'CAN AI REALLY REPLACE PARTS OF MY TEAM?', 'a' => 'Yes. In many cases, AI can replace or significantly reduce the need for certain roles, especially where work is repetitive or structured. In other cases, it amplifies your existing team by increasing speed, output, and consistency. The goal is better performance at a lower cost.'),
        6 => array('q' => 'WHY ARE MOST COMPANIES FAILING WITH AI?', 'a' => 'Because they are using it as a tool, not as a system. They use it for small tasks instead of integrating it into how their business operates. The companies winning with AI are building it into their sales, operations, and execution. That is the difference.'),
        7 => array('q' => 'HOW QUICKLY CAN THIS BE IMPLEMENTED?', 'a' => 'It depends on the complexity of your business. Some AI systems can be implemented quickly. More advanced systems and full AI departments take longer to design, build, and integrate. During the strategy session, we will outline what is realistic for your situation.'),
        8 => array('q' => 'DO I NEED TECHNICAL KNOWLEDGE OR A TEAM TO DO THIS?', 'a' => 'No. We handle the strategy, design, and implementation. If you want your team involved, we can train them. If not, we can build and deploy everything for you.'),
        9 => array('q' => 'WHAT IF I WANT TO BUILD THIS INTERNALLY?', 'a' => 'We support that. We have a dedicated training division that teaches business owners and teams how to build AI employees, implement AI workflows, integrate tools and systems, and scale AI inside their company. You can choose to have us build it, train your team, or both.'),
        10 => array('q' => 'WHAT KIND OF RESULTS CAN I EXPECT?', 'a' => 'Results vary based on your business and implementation. Most companies see a 20% to 60% reduction in operational costs and a 2x to 5x increase in output in key areas, along with faster execution across sales, marketing, and operations. The goal is measurable improvement in speed, cost, and performance.'),
        11 => array('q' => 'IS THIS EXPENSIVE?', 'a' => 'The real question is: what is the cost of not fixing inefficiency in your business? Most companies are overpaying for work that can be automated or improved. AI is a way to reduce cost, increase output, and improve profitability.'),
        12 => array('q' => 'WHAT IF THIS IS NOT A FIT FOR MY BUSINESS?', 'a' => 'Then you still leave the session with clarity. We will show you where AI can or cannot be applied and what your next best move is. There is no obligation to move forward.'),
        13 => array('q' => 'WHAT HAPPENS AFTER THE CALL?', 'a' => 'After the session, you will have a clear direction. If there is a fit, we will outline how we can build or implement AI inside your business. If not, you still leave with a plan you can use.'),
        14 => array('q' => 'WHY SHOULD I DO THIS NOW?', 'a' => 'Because the gap is already happening. Companies implementing AI at a system level are reducing costs, increasing output, and moving faster. Companies that wait are not standing still. They are falling behind.')
    );
    for($f=1;$f<=14;$f++) {
        $add_hsc("m_faq_q_$f", "FAQ $f Question", 'modal_sec', $faq_defaults[$f]['q']);
        $add_hsc("m_faq_a_$f", "FAQ $f Answer", 'modal_sec', $faq_defaults[$f]['a'], 'textarea');
    }

    // Modal Content Sections
    $wp_customize->add_section( 'modal_content', array('title' => 'Extra Modal Sections', 'panel' => 'modal_panel') );
    $add_hsc('m_for_title', 'Who This Is For Title', 'modal_content', 'Who This Is For');
    $add_hsc('m_comp_title', 'Comparison Title', 'modal_content', 'Most Companies Use AI Wrong');
    $add_hsc('m_delay_title', 'Delay Cost Title', 'modal_content', 'Every Month You Delay Has a Cost');
}
add_action( 'customize_register', 'ai_style_theme_customize_register' );
