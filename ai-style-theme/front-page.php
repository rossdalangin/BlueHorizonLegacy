<?php
/**
 * The front page template file
 *
 * @package AI_Style_Theme
 */

get_header();
?>

<!-- Hero Section -->
<section id="hero" class="section section-alt geometric-bg flat-border">
    <div class="container text-center">
        <h1 class="text-uppercase tracking-widest" style="font-size: 3.5rem; margin-bottom: 2rem;">
            <?php echo esc_html( get_theme_mod( 'hero_title', 'We Are Your AI Department.' ) ); ?>
        </h1>
        <p style="font-size: 1.25rem; max-width: 800px; margin: 0 auto 3rem; color: var(--text-off-white);">
            <?php echo wp_kses_post( get_theme_mod( 'hero_subtitle', 'We design, build, and deploy AI Departments that scale your business without scaling your headcount. Done for you. Running in weeks.' ) ); ?>
        </p>
        <div style="display: flex; gap: 1.5rem; justify-content: center;">
            <a href="#" class="btn btn-teal open-modal">
                <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book a Strategy Call' ) ); ?>
            </a>
            <a href="#features" class="btn btn-outline-gold">See Our Services</a>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 4rem; align-items: start;">
            <div>
                <h2 class="section-title">
                    <?php echo esc_html( get_theme_mod( 'about_title', 'Who Is The AI Agency Group' ) ); ?>
                </h2>
            </div>
            <div>
                <p style="font-size: 1.1rem; line-height: 1.8;">
                    <?php echo wp_kses_post( get_theme_mod( 'about_content', 'The AI Agency Group is a global AI infrastructure and implementation firm that builds AI departments and AI employees that replace work, reduce costs, and increase output across your business.' ) ); ?>
                </p>
                <p style="margin-top: 2rem;">
                    With 102 partners spread out all around the world, we serve companies of all sizes all over the globe, from solopreneurs to enterprise organizations and government.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section id="features" class="section section-alt flat-border">
    <div class="container">
        <h2 class="section-title">How We Can Help You</h2>
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <div class="card-icon">01</div>
                <h3>AI Departments</h3>
                <p>We build your entire AI operation. Strategy, systems, employees, and workflows. Designed for your business.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-icon">02</div>
                <h3>AI Employees</h3>
                <p>AI employees that handle sales, support, and operations 24/7. Replace or amplify your team with AI that never stops.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-icon">03</div>
                <h3>Custom AI Projects</h3>
                <p>You dream it. We build it. Have a specific problem or a bold vision? We engineer the AI solution from the ground up.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-icon">04</div>
                <h3>AI Workflows</h3>
                <p>We map, automate, and optimize your most time-consuming processes. The result is a leaner, faster operation.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-icon">05</div>
                <h3>AI SEO — AIO</h3>
                <p>Search has changed. AI is how people find businesses now. We optimize your presence so AI engines recommend you first.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-icon">06</div>
                <h3>AI Training</h3>
                <p>We train your people to design, deploy, and manage AI themselves. We make your team dangerous with the most powerful weapon.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section id="cta" class="section flat-border">
    <div class="container text-center">
        <h2 style="margin-bottom: 1.5rem;">Ready to Work With Us?</h2>
        <p style="margin-bottom: 3rem; opacity: 0.8; max-width: 600px; margin-left: auto; margin-right: auto;">The businesses winning right now are not smarter. They are better armed. Let us build your AI department.</p>
        <a href="#" class="btn btn-teal open-modal">Book a Strategy Call</a>
    </div>
</section>

<?php
get_footer();
