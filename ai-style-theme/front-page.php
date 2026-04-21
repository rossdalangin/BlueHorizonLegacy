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
<section id="hero" class="section section-hero" style="padding-top: 180px; text-align: center;">
    <div class="container">
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
        <div style="margin-top: 6rem; opacity: 0.4; text-transform: uppercase; letter-spacing: 0.25em; font-size: 0.8rem; font-weight: 700;">Scroll to Explore</div>
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
            <div style="font-size: 1.25rem; line-height: 1.8; opacity: 0.8; font-weight: 300;">
                <?php echo wp_kses_post( get_theme_mod('who_text', 'The AI Agency Group is a global AI infrastructure and implementation firm that builds AI departments and AI employees that replace work, reduce costs, and increase output across your business. With 102 partners spread out all around the world, we serve companies of all sizes all over the globe, from solopreneurs to enterprise organizations and government.') ); ?>
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
                <div style="font-size: 1.25rem; opacity: 0.8; font-weight: 300; margin-bottom: 3.5rem;">
                    <?php echo wp_kses_post( get_theme_mod('div_text', 'We do not just build AI systems for you. We also give you the capability to build and control them internally.') ); ?>
                </div>
                <ul style="list-style: none; padding: 0; font-size: 1.15rem; opacity: 0.75;">
                    <?php
                    $div_list = explode("\n", get_theme_mod('div_list', "Designing AI employees for specific roles\nImplementing AI workflows across departments\nIntegrating tools, systems, and custom builds\nScaling AI inside your company without breaking operations\nTurning AI into a long-term asset, not a one-time project"));
                    foreach ($div_list as $item) {
                        if (trim($item)) echo '<li style="margin-bottom: 1.5rem; display: flex; align-items: center;"><span style="color: var(--accent-teal); margin-right: 1.5rem; font-size: 1.2rem;">✦</span> ' . esc_html(trim($item)) . '</li>';
                    }
                    ?>
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
            $ind_raw = get_theme_mod('ind_list', 'Government, Solopreneurs, Insurance, Private Equity, M&A, Mining, Real Estate, Finance, Healthcare, Legal, E-Commerce, Technology, Speaking, Coaching, Trades, Small Business, Manufacturing, Corporate');
            $ind = explode(',', $ind_raw);
            foreach ($ind as $i) echo '<span>'.esc_html(trim($i)).'</span> ';
            ?>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section id="services" class="section section-alt flat-border">
    <div class="container">
        <h2 class="section-label"><?php echo esc_html( get_theme_mod('serv_title', 'How We Can Help You') ); ?></h2>
        <p style="margin-top: -1.5rem; margin-bottom: 6rem; opacity: 0.6; font-size: 1.3rem; max-width: 800px; font-weight: 300;"><?php echo wp_kses_post( get_theme_mod('serv_sub', 'We are relentlessly focused on one thing. Replacing inefficiency with intelligence and scaling your business without scaling your headcount.') ); ?></p>

        <div class="dashboard-grid">
            <?php
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

<!-- Partner Section -->
<section id="partners" class="section">
    <div class="container">
        <h2 class="section-label"><?php echo esc_html(get_theme_mod('partner_title', 'Build Your Own AI Agency.')); ?></h2>
        <p style="font-size: 1.3rem; opacity: 0.6; max-width: 850px; margin-bottom: 5rem; font-weight: 300;">
            <?php echo wp_kses_post(get_theme_mod('partner_sub', 'The AI Agency Group is not just a service. It is a platform. We give entrepreneurs, consultants, and business owners the infrastructure, training, and brand power to launch and operate their own AI agency.')); ?>
        </p>

        <div class="dashboard-grid">
            <?php
            $partner_defaults = array(
                1 => array('t' => 'White Label Partner', 'd' => 'License our AI systems, training, and infrastructure under your own brand. You sell it. We build it. Full white label from day one.'),
                2 => array('t' => 'Direct Seller Partner', 'd' => 'Sell our AI services directly and earn recurring commissions. No build required. The simplest way to monetize your network with AI.'),
                3 => array('t' => 'AI Agency Builder', 'd' => 'We train you to build, sell, and operate your own AI agency from the ground up. Full curriculum, live support, and a proven system.'),
                4 => array('t' => 'Partnership', 'd' => 'Open your own AI Agency office and partner with us. We co-own and operate with you. We bring the entire infrastructure.')
            );
            for($p=1; $p<=4; $p++): ?>
            <div class="dashboard-card">
                <div class="card-num"><?php echo str_pad($p, 2, '0', STR_PAD_LEFT); ?></div>
                <h3><?php echo esc_html(get_theme_mod("partner_t_$p", $partner_defaults[$p]['t'])); ?></h3>
                <p><?php echo esc_html(get_theme_mod("partner_d_$p", $partner_defaults[$p]['d'])); ?></p>
            </div>
            <?php endfor; ?>
        </div>

        <div class="text-center" style="margin-top: 6rem;">
            <a href="#" class="btn btn-outline open-modal">Apply to Become a Partner</a>
        </div>
    </div>
</section>

<!-- Scale Section -->
<section class="section section-alt flat-border">
    <div class="container text-center">
        <h2 class="section-label" style="display: inline-block;"><?php echo esc_html( get_theme_mod('scale_title', 'Every Level. Every Scale.') ); ?></h2>
        <div class="dashboard-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
            <?php
            $scale_defaults = array(
                1 => array('t' => 'Solopreneur', 'd' => 'Maximum Leverage. You do not need a team. You need AI working for you around the clock.'),
                2 => array('t' => 'Entrepreneur', 'd' => 'Scale Without Overhead. You are growing. Hiring is expensive and slow.'),
                3 => array('t' => 'Enterprise', 'd' => 'Transform the Operation. You have the infrastructure. We bring the intelligence.'),
                4 => array('t' => 'Government', 'd' => 'Public Sector AI. We build AI infrastructure for public sector organizations.')
            );
            for($j=1; $j<=4; $j++): ?>
            <div class="dashboard-card" style="text-align: left; padding: 4rem 3rem;">
                <h4 style="color: var(--accent-teal); margin-bottom: 1.5rem; font-size: 1.25rem;"><?php echo esc_html(get_theme_mod("scale_t_$j", $scale_defaults[$j]['t'])); ?></h4>
                <p style="font-size: 1rem; opacity: 0.7;"><?php echo esc_html(get_theme_mod("scale_d_$j", $scale_defaults[$j]['d'])); ?></p>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section id="testimonials" class="section">
    <div class="container">
        <h2 class="section-label text-center" style="display: block; margin: 0 auto 6rem;"><?php echo esc_html( get_theme_mod('test_title', 'Real Businesses. Real Results.') ); ?></h2>
        <div class="dashboard-grid">
            <?php
            $test_defaults = array(
                1 => array('n' => 'Jeff', 'q' => 'The brain is at your fingertips all the time. The strategic business AI has become a crucial business asset that consistently saves me time.'),
                2 => array('n' => 'Gates', 'q' => 'Pays for itself in the first 30 days! The accuracy is like nothing I’ve ever seen. From contracts, to executed plans to succeed. It’s a must have.'),
                3 => array('n' => 'Claire', 'q' => 'Confidence with data-driven customer disputes. Using its strategic insights, we clarified that our pricing reflects a robust business model.'),
                4 => array('n' => 'Steve', 'q' => 'Simplicity, Efficiency and Cost-effectiveness! It’s precise NDA reviews have minimised my legal requirements and costs.')
            );
            for($k=1; $k<=4; $k++): ?>
            <div class="dashboard-card" style="padding: 4rem 3rem;">
                <p style="font-style: italic; opacity: 0.8; margin-bottom: 2.5rem; font-size: 1.1rem; line-height: 1.6;">"<?php echo wp_kses_post(get_theme_mod("test_q_$k", $test_defaults[$k]['q'])); ?>"</p>
                <h4 style="color: var(--accent-gold); font-size: 1rem; letter-spacing: 0.2em;"><?php echo esc_html(get_theme_mod("test_n_$k", $test_defaults[$k]['n'])); ?></h4>
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
            $bio_style = $bio_img ? "background-image: url('".esc_url($bio_img)."'); background-size: cover; background-position: center;" : "background: #050505;";
            ?>
            <div class="bio-visual flat-border" style="height: 650px; display: flex; align-items: center; justify-content: center; <?php echo $bio_style; ?>">
                <?php if (!$bio_img): ?>
                <div style="color: var(--accent-teal); text-align: center; opacity: 0.2;">
                    <h2 style="font-size: 4rem;"><?php echo esc_html( get_theme_mod('bio_name', 'JT FOXX') ); ?></h2>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <h2 class="section-label">Founder Profile</h2>
                <div style="font-size: 1.2rem; line-height: 1.8; opacity: 0.8; font-weight: 300;">
                    <?php echo wp_kses_post( get_theme_mod('bio_text', 'JT Foxx is a global entrepreneur, investor, and one of the most sought-after voices in business today. He has built companies across multiple industries, conducted 100+ interviews with Hollywood A-listers, celebrities, and billionaires, and spoken on stage in countries across every continent. He is the best-selling author of three books, including Business is War: AI is the New Weapon.') ); ?>
                    <p style="margin-top: 4rem; color: var(--accent-gold); font-size: 1.8rem; font-weight: 800; line-height: 1.2;">
                        <?php echo wp_kses_post( get_theme_mod('bio_quote', '"Business is War. AI is the New Weapon."') ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="section text-center" style="background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)), var(--primary-navy); background-size: cover; background-position: center;">
    <div class="container">
        <h2 style="font-size: clamp(2.5rem, 6vw, 4.5rem); margin-bottom: 3rem; line-height: 1; font-weight: 900;">
            <?php echo esc_html(get_theme_mod('cta_title', 'Ready to Work With Us?')); ?>
        </h2>
        <p style="max-width: 800px; margin: 0 auto 5rem; font-size: 1.4rem; opacity: 0.7; font-weight: 300;">
            <?php echo esc_html(get_theme_mod('cta_sub', 'The businesses winning right now are not smarter. They are better armed. Let us build your AI department and put the most powerful weapon in business to work for you.')); ?>
        </p>
        <a href="#" class="btn btn-teal open-modal"><?php echo esc_html( get_theme_mod( 'hero_btn', 'Book a Strategy Call' ) ); ?></a>
    </div>
</section>

<?php
get_footer();
