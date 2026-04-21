<?php
/**
 * The front page template file
 *
 * @package AI_Style_Theme
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero section">
    <div class="container text-center">
        <p class="hero-eyebrow"><?php echo esc_html( get_theme_mod( 'hero_top', 'Operating in 72 Countries  |  102 Global Partners' ) ); ?></p>
        <h1 class="hero-headline">
            <?php echo wp_kses_post( get_theme_mod( 'hero_title', 'WE ARE YOUR<br>AI DEPARTMENT.' ) ); ?>
        </h1>
        <div class="hero-sub">
            <?php echo wp_kses_post( get_theme_mod( 'hero_sub', 'We design, build, and deploy AI Departments that scale your business without scaling your headcount. Done for you. Running in weeks.' ) ); ?>
        </div>
        <div class="hero-cta">
            <a href="#" class="btn btn-teal open-modal-btn">
                <?php echo esc_html( get_theme_mod( 'hero_btn', 'Book a Strategy Call' ) ); ?>
            </a>
        </div>
        <div class="hero-scroll-hint">Scroll to Explore</div>
    </div>
</section>

<!-- Marquee Section -->
<section class="marquee-section">
    <div class="marquee-track">
        <div class="marquee-content">
            <?php
            $mq = get_theme_mod('mq_text', 'AI Departments ✦ AI Employees ✦ Custom AI Projects ✦ AI Workflows ✦ AI SEO — AIO ✦ Tool Activation ✦ AI Training ✦ AI Yourself ✦ 72 Countries ✦ Done For You ✦ Enterprise to Solopreneur');
            echo esc_html($mq) . ' ✦ ' . esc_html($mq);
            ?>
        </div>
    </div>
</section>

<!-- Who Section -->
<section id="who" class="who-section">
    <div class="container">
        <div class="grid-two">
            <div>
                <h2 class="section-label"><?php echo esc_html( get_theme_mod('who_title', 'WHO IS THE AI AGENCY GROUP') ); ?></h2>
                <div class="section-rule"></div>
            </div>
            <div class="who-text">
                <?php echo wp_kses_post( get_theme_mod('who_text', 'The AI Agency Group is a global AI infrastructure and implementation firm that builds AI departments and AI employees that replace work, reduce costs, and increase output across your business. With 102 partners spread out all around the world, we serve companies of all sizes all over the globe, from solopreneurs to enterprise organizations and government.') ); ?>
            </div>
        </div>
    </div>
</section>

<!-- Division Section -->
<section class="who-section section-alt" style="background-color: #000; color: #fff;">
    <div class="container">
        <div class="grid-two">
            <div>
                <h2 class="section-label" style="color: #fff;"><?php echo esc_html( get_theme_mod('div_title', 'Implementation + Training Division') ); ?></h2>
                <div class="section-rule" style="background: #fff;"></div>
            </div>
            <div>
                <div class="who-text" style="color: #fff; margin-bottom: 40px;">
                    <?php echo wp_kses_post( get_theme_mod( 'div_text', 'We do not just build AI systems for you. We also give you the capability to build and control them internally.' ) ); ?>
                </div>
                <ul class="modal-benefit-list" style="color: #fff;">
                    <?php
                    $div_list_raw = get_theme_mod('div_list', "Designing AI employees for specific roles\nImplementing AI workflows across departments\nIntegrating tools, systems, and custom builds\nScaling AI inside your company without breaking operations\nTurning AI into a long-term asset, not a one-time project");
                    $div_list = explode("\n", $div_list_raw);
                    foreach ($div_list as $item) {
                        if (trim($item)) echo '<li style="color: #fff; border-color: rgba(255,255,255,0.1);">' . esc_html(trim($item)) . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="text-center" style="margin-top: 60px;">
            <a href="#services" class="btn btn-outline" style="border-color: #fff; color: #fff;">See Our Services</a>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="audience-section">
    <div class="container text-center">
        <h2 class="section-label" style="display: inline-block; color: #000;"><?php echo esc_html( get_theme_mod('ind_title', 'Trusted Across Industries') ); ?></h2>
        <div class="section-rule" style="margin: -2.5rem auto 3.5rem;"></div>
        <div class="industry-grid">
            <?php
            $ind_raw = get_theme_mod('ind_list', 'Government, Solopreneurs, Insurance, Private Equity, M&A, Mining, Real Estate, Finance, Healthcare, Legal, E-Commerce, Technology, Speaking, Coaching, Trades, Small Business, Manufacturing, Corporate');
            $ind = explode(',', $ind_raw);
            foreach ($ind as $i) echo '<span>'.esc_html(trim($i)).'</span> ';
            ?>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section">
    <div class="container">
        <h2 class="section-label"><?php echo esc_html( get_theme_mod('serv_title', 'How We Can Help You') ); ?></h2>
        <div class="section-rule"></div>
        <div class="who-text" style="margin-top: -1.5rem; margin-bottom: 60px; color: #fff; opacity: 0.6; font-weight: 300;">
            <?php echo wp_kses_post( get_theme_mod('serv_sub', 'We are relentlessly focused on one thing. Replacing inefficiency with intelligence and scaling your business without scaling your headcount.') ); ?>
        </div>

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
<section id="partners" class="partner-section">
    <div class="container">
        <h2 class="section-label"><?php echo esc_html(get_theme_mod('partner_title', 'BUILD YOUR OWN AI AGENCY.')); ?></h2>
        <div class="section-rule" style="background: #000;"></div>
        <div class="who-text" style="margin-top: -1.5rem; margin-bottom: 60px;">
            <?php echo wp_kses_post(get_theme_mod('partner_sub', 'The AI Agency Group is not just a service. It is a platform. We give entrepreneurs, consultants, and business owners the infrastructure, training, and brand power to launch and operate their own AI agency.')); ?>
        </div>

        <div class="dashboard-grid">
            <?php
            $partner_defaults = array(
                1 => array('t' => 'White Label Partner', 'd' => 'License our AI systems, training, and infrastructure under your own brand. You sell it. We build it. Full white label from day one.'),
                2 => array('t' => 'Direct Seller Partner', 'd' => 'Sell our AI services directly and earn recurring commissions. No build required. The simplest way to monetize your network with AI.'),
                3 => array('t' => 'AI Agency Builder', 'd' => 'We train you to build, sell, and operate your own AI agency from the ground up. Full curriculum, live support, and a proven system.'),
                4 => array('t' => 'Partnership', 'd' => 'Open your own AI Agency office and partner with us. We co-own and operate with you. We bring the entire infrastructure. You bring the market. Together we build something that lasts.')
            );
            for($p=1; $p<=4; $p++): ?>
            <div class="dashboard-card">
                <div class="card-num"><?php echo str_pad($p, 2, '0', STR_PAD_LEFT); ?></div>
                <h3><?php echo esc_html(get_theme_mod("partner_t_$p", $partner_defaults[$p]['t'])); ?></h3>
                <p><?php echo esc_html(get_theme_mod("partner_d_$p", $partner_defaults[$p]['d'])); ?></p>
            </div>
            <?php endfor; ?>
        </div>

        <div class="text-center" style="margin-top: 60px;">
            <a href="#" class="btn btn-outline open-modal-btn" style="border-color: #000; color: #000;">Apply to Become a Partner</a>
        </div>
    </div>
</section>

<!-- Scale Section -->
<section class="partner-section" style="background-color: #fff;">
    <div class="container text-center">
        <h2 class="section-label" style="display: inline-block; color: #000;"><?php echo esc_html( get_theme_mod('scale_title', "EVERY LEVEL.\nEVERY SCALE.") ); ?></h2>
        <div class="section-rule" style="margin: -2.5rem auto 3.5rem; background: #000;"></div>
        <div class="dashboard-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); border-color: rgba(0,0,0,0.1);">
            <?php
            $scale_defaults = array(
                1 => array('t' => 'Maximum Leverage', 'd' => 'Solopreneur. You do not need a team. You need AI working for you around the clock. We build your personal AI department so you operate like a company ten times your size.'),
                2 => array('t' => 'Scale Without Overhead', 'd' => 'Entrepreneur. You are growing. Hiring is expensive and slow. We build the AI layer that scales with your revenue without scaling your payroll. Grow smarter, not bigger.'),
                3 => array('t' => 'Transform the Operation', 'd' => 'Enterprise. You have the infrastructure. We bring the intelligence. We deploy AI departments across divisions, automate complex workflows, and build the systems that keep you ahead.'),
                4 => array('t' => 'Public Sector AI', 'd' => 'Government. We build AI infrastructure for public sector organizations. Streamlined operations, reduced costs, and faster service delivery. AI built for accountability, security, and scale.')
            );
            for($j=1; $j<=4; $j++): ?>
            <div class="dashboard-card" style="text-align: left; padding: 40px; border-color: rgba(0,0,0,0.1);">
                <h4 style="color: var(--accent-blue); margin-bottom: 20px; font-size: 1.25rem; font-family: var(--font-oswald);"><?php echo esc_html(get_theme_mod("scale_t_$j", $scale_defaults[$j]['t'])); ?></h4>
                <p style="text-transform: none; letter-spacing: 0; color: #333; font-weight: 400; opacity: 0.8; font-size: 1rem;"><?php echo esc_html(get_theme_mod("scale_d_$j", $scale_defaults[$j]['d'])); ?></p>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Bio Section -->
<section id="bio" class="foxx-section">
    <div class="container">
        <div class="grid-two">
            <?php
            $bio_img = get_theme_mod('bio_img');
            $bio_style = $bio_img ? "background-image: url('".esc_url($bio_img)."'); background-size: cover; background-position: center;" : "background: #050505;";
            ?>
            <div class="bio-visual" style="height: 650px; display: flex; align-items: center; justify-content: center; <?php echo $bio_style; ?>">
                <?php if (!$bio_img): ?>
                <div style="color: var(--accent-teal); text-align: center; opacity: 0.2;">
                    <h2 style="font-size: 4rem;"><?php echo esc_html( get_theme_mod('bio_name', "WHO IS\nJT FOXX.") ); ?></h2>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <h2 class="section-label"><?php echo esc_html( get_theme_mod('bio_name', "WHO IS\nJT FOXX.") ); ?></h2>
                <div class="section-rule"></div>
                <div class="who-text" style="color: #fff;">
                    <?php echo wp_kses_post( get_theme_mod('bio_text', "JT Foxx is a global entrepreneur, investor, and one of the most sought-after voices in business today. He has built companies across multiple industries, conducted 100+ interviews with Hollywood A-listers, celebrities, and billionaires, and spoken on stage in countries across every continent.\n\nHe is the best-selling author of three books, including Business is War: AI is the New Weapon — the definitive guide to using AI as a competitive weapon in business.\n\nAs Founding Managing Partner of AI Agency Group, JT brings the operating experience, global network, and investor mindset that separates this firm from every other AI agency on the planet.\n\nHe does not just understand AI. He understands what businesses need to win. Revenue. Margin. Speed. Execution. That is what every system we build is designed around.") ); ?>
                    <div class="foxx-quote">
                        <?php echo wp_kses_post( get_theme_mod('bio_quote', '"BUSINESS IS WAR. AI IS THE NEW WEAPON."') ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Proof Section -->
<section class="proof-section">
    <div class="container">
        <h2 class="section-label text-center" style="display: block; margin: 0 auto 3.5rem;"><?php echo esc_html( get_theme_mod('test_title', 'REAL BUSINESSES. REAL RESULTS.') ); ?></h2>
        <div class="section-rule" style="margin: -2.5rem auto 3.5rem;"></div>
        <div class="dashboard-grid">
            <?php
            $test_defaults = array(
                1 => array('n' => 'JEFF', 'q' => "The strategic business AI has become a crucial business asset that consistently saves me time by efficiently managing tasks and information for my business. Its powerful capabilities allow me to streamline processes without the constant need to engage others, enabling faster decision-making and execution. A go to place to manage great solutions and conversations we usually get from a 3rd party at great expense. The brain is at your fingertips all the time."),
                2 => array('n' => 'GATES', 'q' => "We have used the brain since the beginning. It has not only saved hours among hours of work. When commanded it gives the most professional responses from analyzing deals to marketing and business plans and any other task a top CEO would need to complete. The accuracy is like nothing I've ever seen. From contracts, to executed plans to succeed. It's a must have. The cost savings alone pay for it self in the first 30 days, and ensures you achieve success."),
                3 => array('n' => 'CLAIRE', 'q' => "When faced with a customer disputing their account balance and questioning the value of our apprentice pricing, we leveraged the CEO Advanced framework to deliver a confident, data-driven explanation. Using its strategic insights, we clarified that our pricing reflects a robust business model designed to sustain high-quality service delivery. Specifically, we highlighted how our costs responsibly cover critical overheads such as talent acquisition, training, compliance, and operational excellence."),
                4 => array('n' => 'STEVE', 'q' => "A genuine combination of Simplicity, Efficiency and Cost-effectiveness! It's precise NDA reviews have minimised my legal requirements and costs, in addition to reducing review time from days to hours. By flagging any risks within NDAs, such as hidden marketing clauses, I am able to engage legal counsel strategically, attending to deals faster and with confidence. It's the difference between missing an opportunity and sealing a great deal. This is THE essential business tool.")
            );
            for($k=1; $k<=4; $k++): ?>
            <div class="dashboard-card" style="padding: 40px;">
                <p style="font-style: italic; color: #fff; opacity: 0.8; margin-bottom: 20px; font-size: 1.1rem; line-height: 1.6; text-transform: none; letter-spacing: 0; font-weight: 400;">"<?php echo wp_kses_post(get_theme_mod("test_q_$k", $test_defaults[$k]['q'])); ?>"</p>
                <div class="proof-tagline"><?php echo esc_html(get_theme_mod("test_n_$k", $test_defaults[$k]['n'])); ?></div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="section text-center" style="background-color: var(--primary-bg);">
    <div class="container">
        <h2 style="font-size: clamp(2.5rem, 6vw, 4.5rem); margin-bottom: 30px; line-height: 1; font-weight: 900; font-family: var(--font-heading);">
            <?php echo esc_html(get_theme_mod('cta_title', 'READY TO WORK WITH US?')); ?>
        </h2>
        <div class="who-text" style="max-width: 800px; margin: 0 auto 50px; color: #fff; font-weight: 400;">
            <?php echo esc_html(get_theme_mod('cta_sub', 'The businesses winning right now are not smarter. They are better armed. Let us build your AI department and put the most powerful weapon in business to work for you.')); ?>
        </div>
        <a href="#" class="btn btn-teal open-modal-btn"><?php echo esc_html( get_theme_mod( 'hero_btn', 'Book a Strategy Call' ) ); ?></a>
    </div>
</section>

<?php
get_footer();
