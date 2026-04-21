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
<section id="hero" class="section section-hero" style="padding-top: 180px; position: relative;">
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
        <div style="margin-top: 5rem; opacity: 0.5; text-transform: uppercase; letter-spacing: 0.2em; font-size: 0.8rem;">Scroll to Explore</div>
    </div>
</section>

<!-- Marquee Section -->
<div class="marquee-wrapper">
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
                <h2 class="section-label">Who Is The AI Agency Group</h2>
            </div>
            <div style="font-size: 1.2rem; line-height: 1.8; opacity: 0.8;">
                <p>The AI Agency Group is a global AI infrastructure and implementation firm that builds AI departments and AI employees that replace work, reduce costs, and increase output across your business.</p>
                <p style="margin-top: 2rem;">With 102 partners spread out all around the world, we serve companies of all sizes all over the globe, from solopreneurs to enterprise organizations and government.</p>
                <p style="margin-top: 2rem;">We are not a traditional AI agency. Most AI agencies are run by technicians who understand tools but do not understand how businesses actually operate. Every partner inside our firm is an entrepreneur who owns and operates multiple businesses.</p>
                <p style="margin-top: 2rem;">We understand revenue, cost, margin, EBITDA, and what it actually takes to scale. That is why we do not recommend AI. We build it.</p>
            </div>
        </div>
    </div>
</section>

<!-- Division Section -->
<section class="section section-alt flat-border">
    <div class="container">
        <div class="grid-two">
            <div>
                <h2 class="section-label">Implementation + Training Division</h2>
            </div>
            <div>
                <p style="font-size: 1.2rem; opacity: 0.8;">We do not just build AI systems for you. We also give you the capability to build and control them internally.</p>
                <ul style="margin-top: 2rem; list-style: none; padding: 0; font-size: 1.1rem; opacity: 0.7;">
                    <li style="margin-bottom: 1rem;">✦ Designing AI employees for specific roles</li>
                    <li style="margin-bottom: 1rem;">✦ Implementing AI workflows across departments</li>
                    <li style="margin-bottom: 1rem;">✦ Integrating tools, systems, and custom builds</li>
                    <li style="margin-bottom: 1rem;">✦ Scaling AI inside your company</li>
                </ul>
                <a href="#" class="btn btn-outline" style="margin-top: 3rem;">See Our Services</a>
            </div>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="section">
    <div class="container text-center">
        <h2 class="section-label" style="display: inline-block;">Trusted Across Industries</h2>
        <div class="industry-grid">
            <span>Government</span> <span>Solopreneurs</span> <span>Insurance</span> <span>Finance</span> <span>Healthcare</span> <span>Legal</span> <span>E-Commerce</span> <span>Technology</span> <span>Manufacturing</span> <span>Corporate</span> <span>Mining</span> <span>Real Estate</span>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section id="services" class="section section-alt flat-border">
    <div class="container">
        <h2 class="section-label">How We Can Help You</h2>
        <p style="margin-top: -1rem; margin-bottom: 4rem; opacity: 0.7; font-size: 1.2rem;">We are relentlessly focused on one thing. Replacing inefficiency with intelligence and scaling your business.</p>
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <div class="card-num">01</div>
                <h3>AI Departments</h3>
                <p>We build your entire AI operation. Strategy, systems, employees, and workflows. Designed for your business. Deployed and running in weeks.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-num">02</div>
                <h3>AI Employees</h3>
                <p>AI employees that handle sales, support, and operations 24/7. Replace or amplify your team with AI that never stops.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-num">03</div>
                <h3>Custom AI Projects</h3>
                <p>You dream it. We build it. Have a specific problem or a bold vision? We engineer the AI solution from the ground up.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-num">04</div>
                <h3>AI Workflows</h3>
                <p>We map, automate, and optimize your most time-consuming processes. The result is a leaner, faster, more profitable operation.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-num">05</div>
                <h3>AI SEO — AIO</h3>
                <p>Search has changed. AI is how people find businesses now. We optimize your presence so AI engines recommend you first.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-num">06</div>
                <h3>AI Training</h3>
                <p>We train your people to design, deploy, and manage AI themselves. We make your team dangerous with the most powerful weapon in business.</p>
            </div>
        </div>
    </div>
</section>

<!-- Partner Program -->
<section id="partners" class="section">
    <div class="container">
        <div class="grid-two">
            <div>
                <h2 class="section-label">Build Your Own AI Agency.</h2>
                <p style="margin-top: 2rem; opacity: 0.8; font-size: 1.1rem;">The AI Agency Group is not just a service. It is a platform. We give entrepreneurs the infrastructure to launch and operate their own AI agency.</p>
            </div>
            <div>
                <div style="margin-bottom: 3rem; border-left: 2px solid var(--accent-teal); padding-left: 2rem;">
                    <h4 style="color: var(--accent-teal);">01 White Label Partner</h4>
                    <p>License our AI systems under your own brand. You sell it. We build it.</p>
                </div>
                <div style="margin-bottom: 3rem; border-left: 2px solid var(--accent-teal); padding-left: 2rem;">
                    <h4 style="color: var(--accent-teal);">02 AI Agency Builder</h4>
                    <p>We train you to build, sell, and operate your own AI agency from the ground up.</p>
                </div>
                <a href="#" class="btn btn-teal open-modal">Apply to Become a Partner</a>
            </div>
        </div>
    </div>
</section>

<!-- Bio Section -->
<section id="bio" class="section section-alt flat-border">
    <div class="container">
        <div class="grid-two">
            <div class="bio-visual flat-border" style="height: 600px; display: flex; align-items: center; justify-content: center; background: #050505;">
                <div style="color: var(--accent-teal); text-align: center;">
                    <p style="font-size: 0.8rem; letter-spacing: 0.3em;">[ FOUNDING MANAGING PARTNER ]</p>
                    <h2 style="font-size: 3rem;">JT FOXX</h2>
                </div>
            </div>
            <div>
                <h2 class="section-label">Who Is JT Foxx.</h2>
                <div style="font-size: 1.15rem; line-height: 1.8; opacity: 0.8;">
                    <p>JT Foxx is a global entrepreneur, investor, and one of the most sought-after voices in business today. He has built companies across multiple industries and spoken on stage in countries across every continent.</p>
                    <p style="margin-top: 2rem;">He is the best-selling author of "Business is War: AI is the New Weapon" — the definitive guide to using AI as a competitive weapon.</p>
                    <p style="margin-top: 2rem;">As Founding Managing Partner, JT brings the operating experience that separates this firm from every other AI agency. He understands what businesses need to win: Revenue. Margin. Speed. Execution.</p>
                    <p style="margin-top: 3rem; color: var(--accent-gold); font-size: 1.5rem; font-weight: 700; line-height: 1.2;">"Business is War. AI is the New Weapon."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="section text-center" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), var(--primary-navy);">
    <div class="container">
        <h2 style="font-size: 4rem; margin-bottom: 2.5rem; line-height: 1;">Ready to Work With Us?</h2>
        <p style="max-width: 700px; margin: 0 auto 4rem; font-size: 1.3rem; opacity: 0.8;">Let us build your AI department and put the most powerful weapon in business to work for you.</p>
        <a href="#" class="btn btn-teal open-modal"><?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book a Strategy Call' ) ); ?></a>
    </div>
</section>

<?php
get_footer();
