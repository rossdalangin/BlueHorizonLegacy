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
        $mq = get_theme_mod('marquee_text', 'AI Departments ✦ AI Employees ✦ Custom AI Projects ✦ AI Workflows ✦ AI SEO — AIO ✦ Tool Activation ✦ AI Training ✦ AI Yourself ✦ 72 Countries ✦ Done For You ✦ Enterprise to Solopreneur');
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
                <?php echo wp_kses_post( get_theme_mod('who_text', 'The AI Agency Group is a global AI infrastructure and implementation firm...') ); ?>
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
                <p style="font-size: 1.2rem; opacity: 0.8;"><?php echo wp_kses_post( get_theme_mod('div_text', 'We do not just build AI systems for you. We also give you the capability to build and control them internally.') ); ?></p>
                <ul style="margin-top: 2rem; list-style: none; padding: 0; font-size: 1.1rem; opacity: 0.7;">
                    <li style="margin-bottom: 1rem;">✦ Designing AI employees for specific roles</li>
                    <li style="margin-bottom: 1rem;">✦ Implementing AI workflows across departments</li>
                    <li style="margin-bottom: 1rem;">✦ Integrating tools, systems, and custom builds</li>
                </ul>
                <a href="#" class="btn btn-outline" style="margin-top: 3rem;">See Our Services</a>
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
            <div class="dashboard-card">
                <div class="card-num">01</div>
                <h3>AI Departments</h3>
                <p>We build your entire AI operation. Strategy, systems, employees, and workflows.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-num">02</div>
                <h3>AI Employees</h3>
                <p>AI employees that handle sales, support, and operations 24/7. Replace or amplify your team.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-num">03</div>
                <h3>Custom AI Projects</h3>
                <p>You dream it. We build it. We engineer the AI solution from the ground up.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-num">04</div>
                <h3>AI Workflows</h3>
                <p>We map, automate, and optimize your most time-consuming processes.</p>
            </div>
        </div>
    </div>
</section>

<!-- Scale Section -->
<section class="section">
    <div class="container text-center">
        <h2 class="section-label" style="display: inline-block;"><?php echo esc_html( get_theme_mod('build_title', 'Every Level. Every Scale.') ); ?></h2>
        <div class="dashboard-grid">
            <div class="dashboard-card" style="text-align: left;">
                <h4 style="color: var(--accent-teal);">01 Solopreneur</h4>
                <p>You do not need a team. You need AI working for you around the clock.</p>
            </div>
            <div class="dashboard-card" style="text-align: left;">
                <h4 style="color: var(--accent-teal);">02 Entrepreneur</h4>
                <p>We build the AI layer that scales with your revenue without scaling your payroll.</p>
            </div>
            <div class="dashboard-card" style="text-align: left;">
                <h4 style="color: var(--accent-teal);">03 Enterprise</h4>
                <p>We deploy AI departments across divisions and automate complex workflows.</p>
            </div>
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
                    <p style="font-size: 0.8rem; letter-spacing: 0.3em;"><?php echo esc_html(get_theme_mod('bio_label', 'Founding Managing Partner')); ?></p>
                    <h2 style="font-size: 3rem;"><?php echo esc_html( get_theme_mod('bio_name', 'JT FOXX') ); ?></h2>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <h2 class="section-label">Who Is JT Foxx.</h2>
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
            <?php echo esc_html(get_theme_mod('cta_sub', 'Let us build your AI department and put the most powerful weapon in business to work for you.')); ?>
        </p>
        <a href="#" class="btn btn-teal open-modal"><?php echo esc_html( get_theme_mod( 'hero_btn', 'Book a Strategy Call' ) ); ?></a>
    </div>
</section>

<?php
get_footer();
