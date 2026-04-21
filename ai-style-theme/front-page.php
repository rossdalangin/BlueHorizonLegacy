<?php
/**
 * The front page template file
 *
 * @package AI_Style_Theme
 */

get_header();
?>

<!-- Top Bar -->
<div class="top-bar text-center">
    <?php echo esc_html( get_theme_mod( 'hero_top', 'Operating in 72 Countries  |  102 Global Partners' ) ); ?>
</div>

<!-- Hero Section -->
<section id="hero" class="section section-hero" style="padding-top: 180px; position: relative;">
    <div class="container text-center">
        <h1 class="hero-title">
            <?php echo wp_kses_post( get_theme_mod( 'hero_title', 'We Are Your<br>AI Department.' ) ); ?>
        </h1>
        <p class="hero-subtitle">
            <?php echo wp_kses_post( get_theme_mod( 'hero_sub', 'We design, build, and deploy AI Departments that scale your business without scaling your headcount. Done for you. Running in weeks.' ) ); ?>
        </p>
        <div class="hero-cta">
            <a href="#" class="btn btn-teal open-modal">
                <?php echo esc_html( get_theme_mod( 'hero_btn', 'Book a Strategy Call' ) ); ?>
            </a>
        </div>
        <div style="margin-top: 5rem; opacity: 0.5; text-transform: uppercase; letter-spacing: 0.2em; font-size: 0.8rem;">Scroll to Explore</div>
    </div>
</section>

<!-- Marquee Section -->
<div class="marquee-wrapper">
    <div class="marquee-content">
        <?php
        $mq = get_theme_mod('mq_text', 'AI Departments ✦ AI Employees ✦ Custom AI Projects ✦ AI Workflows ✦ AI SEO — AIO ✦ Tool Activation ✦ AI Training ✦ AI Yourself ✦ 72 Countries ✦ Done For You ✦ Enterprise to Solopreneur');
        echo esc_html($mq) . ' ✦ ' . esc_html($mq);
        ?>
    </div>
</div>

<!-- Who Section -->
<section id="who" class="section">
    <div class="container">
        <div class="grid-two">
            <div>
                <h2 class="section-label"><?php echo esc_html( get_theme_mod('who_title', 'Who Is The AI Agency Group') ); ?></h2>
            </div>
            <div style="font-size: 1.2rem; line-height: 1.8; opacity: 0.8;">
                <?php echo wp_kses_post( get_theme_mod('who_text', 'The AI Agency Group is a global AI infrastructure and implementation firm builds AI departments and AI employees that replace work, reduce costs, and increase output across your business.') ); ?>
            </div>
        </div>
    </div>
</section>

<!-- Division Section -->
<section class="section section-alt flat-border">
    <div class="container">
        <div class="grid-two">
            <div>
                <h2 class="section-label"><?php echo esc_html( get_theme_mod('div_title', 'Implementation + Training Division') ); ?></h2>
            </div>
            <div>
                <div style="font-size: 1.2rem; opacity: 0.8;">
                    <?php echo wp_kses_post( get_theme_mod('div_text', 'We do not just build AI systems for you. We also give you the capability to build and control them internally.') ); ?>
                </div>
                <ul style="margin-top: 2rem; list-style: none; padding: 0; font-size: 1.1rem; opacity: 0.7;">
                    <li style="margin-bottom: 1rem;">✦ Designing AI employees for specific roles</li>
                    <li style="margin-bottom: 1rem;">✦ Implementing AI workflows across departments</li>
                    <li style="margin-bottom: 1rem;">✦ Integrating tools, systems, and custom builds</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="section">
    <div class="container text-center">
        <h2 class="section-label" style="display: inline-block;"><?php echo esc_html( get_theme_mod('ind_title', 'Trusted Across Industries') ); ?></h2>
        <div class="industry-grid">
            <?php
            $ind = explode(',', get_theme_mod('ind_list', 'Government, Solopreneurs, Insurance, Finance, Healthcare, Legal, E-Commerce, Technology'));
            foreach ($ind as $i) echo '<span>'.esc_html(trim($i)).'</span> ';
            ?>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section id="services" class="section section-alt flat-border">
    <div class="container">
        <h2 class="section-label"><?php echo esc_html( get_theme_mod('serv_title', 'How We Can Help You') ); ?></h2>
        <p style="margin-top: -1rem; margin-bottom: 4rem; opacity: 0.7; font-size: 1.2rem;"><?php echo wp_kses_post( get_theme_mod('serv_sub', 'We are relentlessly focused on one thing. Replacing inefficiency with intelligence.') ); ?></p>
        <div class="dashboard-grid">
            <?php
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
            for($i=1; $i<=12; $i++): ?>
            <div class="dashboard-card">
                <div class="card-num"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></div>
                <h3><?php echo esc_html( get_theme_mod("serv_t_$i", $serv_defaults[$i]['t']) ); ?></h3>
                <p><?php echo esc_html( get_theme_mod("serv_d_$i", $serv_defaults[$i]['d']) ); ?></p>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Scale Section -->
<section class="section section-alt flat-border">
    <div class="container text-center">
        <h2 class="section-label" style="display: inline-block;"><?php echo esc_html( get_theme_mod('scale_title', 'Every Level. Every Scale.') ); ?></h2>
        <div class="dashboard-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
            <?php
            $scale_defaults = array(
                1 => array('t' => 'Solopreneur', 'd' => 'Scale your personal output without adding expensive human staff.'),
                2 => array('t' => 'Small Business', 'd' => 'Compete with industry giants using high-efficiency AI infrastructure.'),
                3 => array('t' => 'Mid-Market', 'd' => 'Optimize departmental performance and reduce operational overhead.'),
                4 => array('t' => 'Enterprise', 'd' => 'Global-scale AI deployment with strict security and custom integration.')
            );
            for($j=1; $j<=4; $j++): ?>
            <div class="dashboard-card" style="text-align: left;">
                <h4 style="color: var(--accent-teal);"><?php echo esc_html(get_theme_mod("scale_t_$j", $scale_defaults[$j]['t'])); ?></h4>
                <p><?php echo esc_html(get_theme_mod("scale_d_$j", $scale_defaults[$j]['d'])); ?></p>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section id="testimonials" class="section">
    <div class="container">
        <h2 class="section-label text-center" style="display: block; margin: 0 auto 5rem;"><?php echo esc_html( get_theme_mod('test_title', 'Real Businesses. Real Results.') ); ?></h2>
        <div class="dashboard-grid">
            <?php for($k=1; $k<=4; $k++): ?>
            <div class="dashboard-card">
                <p style="font-style: italic; opacity: 0.8; margin-bottom: 2rem;">"<?php echo wp_kses_post(get_theme_mod("test_q_$k")); ?>"</p>
                <h4 style="color: var(--accent-gold);"><?php echo esc_html(get_theme_mod("test_n_$k")); ?></h4>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Bio Section -->
<section id="bio" class="section section-alt flat-border">
    <div class="container">
        <div class="grid-two">
            <?php
            $bio_img = get_theme_mod('bio_img');
            $bio_style = $bio_img ? "background-image: url('".esc_url($bio_img)."'); background-size: cover;" : "background: #050505;";
            ?>
            <div class="bio-visual flat-border" style="height: 600px; display: flex; align-items: center; justify-content: center; <?php echo $bio_style; ?>">
                <?php if (!$bio_img): ?>
                <div style="color: var(--accent-teal); text-align: center;">
                    <h2 style="font-size: 3rem;"><?php echo esc_html( get_theme_mod('bio_name', 'JT FOXX') ); ?></h2>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <h2 class="section-label">Founder Profile</h2>
                <div style="font-size: 1.15rem; line-height: 1.8; opacity: 0.8;">
                    <?php echo wp_kses_post( get_theme_mod('bio_text', 'JT Foxx is a global entrepreneur, investor, and one of the most sought-after voices in business today.') ); ?>
                    <p style="margin-top: 3rem; color: var(--accent-gold); font-size: 1.5rem; font-weight: 700;">
                        <?php echo wp_kses_post( get_theme_mod('bio_quote', '"Business is War. AI is the New Weapon."') ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="section text-center" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), var(--primary-navy);">
    <div class="container">
        <h2 style="font-size: 4rem; margin-bottom: 2.5rem; line-height: 1;">
            <?php echo esc_html(get_theme_mod('cta_title', 'Ready to Work With Us?')); ?>
        </h2>
        <p style="max-width: 700px; margin: 0 auto 4rem; font-size: 1.3rem; opacity: 0.8;">
            <?php echo esc_html(get_theme_mod('cta_sub', 'The businesses winning right now are not smarter. They are better armed.')); ?>
        </p>
        <a href="#" class="btn btn-teal open-modal"><?php echo esc_html( get_theme_mod( 'hero_btn', 'Book a Strategy Call' ) ); ?></a>
    </div>
</section>

<?php
get_footer();
