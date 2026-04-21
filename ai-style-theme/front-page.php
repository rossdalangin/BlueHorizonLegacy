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
    <?php echo esc_html( get_theme_mod( 'top_bar_text', 'Operating in 72 Countries  |  102 Global Partners' ) ); ?>
</div>

<!-- Hero Section -->
<section id="hero" class="section section-hero geometric-bg">
    <div class="container text-center">
        <h1 class="hero-title">
            <?php echo wp_kses_post( get_theme_mod( 'hero_title', 'We Are Your<br>AI Department.' ) ); ?>
        </h1>
        <p class="hero-subtitle">
            <?php echo wp_kses_post( get_theme_mod( 'hero_subtitle', 'We design, build, and deploy AI Departments that scale your business without scaling your headcount. Done for you. Running in weeks.' ) ); ?>
        </p>
        <div class="hero-cta">
            <a href="#" class="btn btn-teal open-modal">
                <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book a Strategy Call' ) ); ?>
            </a>
        </div>
        <div class="scroll-explore">Scroll to Explore</div>
    </div>
</section>

<!-- Marquee Section -->
<div class="marquee-wrapper flat-border">
    <div class="marquee-content">
        <?php
        $marquee_text = get_theme_mod( 'marquee_text', 'AI Departments ✦ AI Employees ✦ Custom AI Projects ✦ AI Workflows ✦ AI SEO — AIO ✦ Tool Activation ✦ AI Training ✦ AI Yourself ✦ 72 Countries ✦ Done For You ✦ Enterprise to Solopreneur' );
        echo str_repeat( esc_html( $marquee_text ) . ' ✦ ', 4 );
        ?>
    </div>
</div>

<!-- Who Section -->
<section id="who" class="section">
    <div class="container">
        <div class="grid-two">
            <div>
                <h2 class="section-label">
                    <?php echo esc_html( get_theme_mod( 'about_title', 'Who Is The AI Agency Group' ) ); ?>
                </h2>
            </div>
            <div class="content-box">
                <?php echo wp_kses_post( get_theme_mod( 'about_content', 'The AI Agency Group is a global AI infrastructure and implementation firm that builds AI departments and AI employees that replace work, reduce costs, and increase output across your business.' ) ); ?>
            </div>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="section section-alt flat-border">
    <div class="container text-center">
        <h2 class="section-label">Trusted Across Industries</h2>
        <div class="industry-grid">
            <span>Government</span> <span>Solopreneurs</span> <span>Insurance</span> <span>Finance</span> <span>Healthcare</span> <span>Legal</span> <span>E-Commerce</span> <span>Technology</span>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section id="services" class="section">
    <div class="container">
        <h2 class="section-title">How We Can Help You</h2>
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

<!-- Bio Section -->
<section id="bio" class="section section-alt">
    <div class="container">
        <div class="grid-two">
            <div class="bio-visual flat-border">
                <div style="height: 400px; display: flex; align-items: center; justify-content: center; color: var(--accent-teal);">[ BIO IMAGE ]</div>
            </div>
            <div>
                <h2 class="section-label"><?php echo esc_html( get_theme_mod('bio_title', 'Who Is JT Foxx.') ); ?></h2>
                <div class="content-box">
                    <p><?php echo wp_kses_post( get_theme_mod('bio_content', 'JT Foxx is a global entrepreneur, investor, and one of the most sought-after voices in business today.') ); ?></p>
                    <h3 style="margin-top: 2rem;"><?php echo esc_html( get_theme_mod('bio_name', 'JT Foxx') ); ?></h3>
                    <p style="color: var(--accent-gold);"><?php echo esc_html( get_theme_mod('bio_tagline', '"Business is War. AI is the New Weapon."') ); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="section text-center flat-border" style="background-color: var(--primary-navy);">
    <div class="container">
        <h2 style="font-size: 3rem; margin-bottom: 2rem;">Ready to Work With Us?</h2>
        <a href="#" class="btn btn-teal open-modal"><?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book a Strategy Call' ) ); ?></a>
    </div>
</section>

<?php
get_footer();
