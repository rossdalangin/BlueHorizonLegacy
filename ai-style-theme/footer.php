</main>

<footer class="site-footer section section-alt" style="border-top: 1px solid rgba(255,255,255,0.05); padding-top: 120px; padding-bottom: 60px;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 6rem; margin-bottom: 100px;">
            <div>
                <div class="logo" style="margin-bottom: 2.5rem;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #fff; font-size: 1.8rem; font-family: var(--font-heading); font-weight: 800; text-decoration: none;">AI AGENCY GROUP</a>
                </div>
                <p style="opacity: 0.6; max-width: 400px; font-size: 1rem;">We design, build, and deploy AI Departments for businesses in 72 countries. Solopreneurs to Enterprise.</p>
            </div>
            <div>
                <h4 style="font-size: 0.95rem; margin-bottom: 2rem; letter-spacing: 0.15em;">SERVICES</h4>
                <ul style="list-style: none; padding: 0; opacity: 0.5; font-size: 0.9rem; line-height: 2.2;">
                    <li>AI Departments</li>
                    <li>AI Employees</li>
                    <li>Custom AI Projects</li>
                    <li>AI Workflows</li>
                </ul>
            </div>
            <div>
                <h4 style="font-size: 0.95rem; margin-bottom: 2rem; letter-spacing: 0.15em;">COMPANY</h4>
                <ul style="list-style: none; padding: 0; opacity: 0.5; font-size: 0.9rem; line-height: 2.2;">
                    <li>Who We Are</li>
                    <li>Insights</li>
                    <li>Careers</li>
                    <li>Contact</li>
                </ul>
            </div>
            <div>
                <h4 style="font-size: 0.95rem; margin-bottom: 2rem; letter-spacing: 0.15em;">CONNECT</h4>
                <ul style="list-style: none; padding: 0; opacity: 0.5; font-size: 0.9rem; line-height: 2.2;">
                    <li>LinkedIn</li>
                    <li>Instagram</li>
                    <li>YouTube</li>
                </ul>
            </div>
        </div>
        <div style="border-top: 1px solid rgba(255,255,255,0.05); padding-top: 50px; display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem; opacity: 0.4;">
            <div>&copy; <?php echo date( 'Y' ); ?> AI Agency Group LLC &mdash; All Rights Reserved</div>
            <div style="display: flex; gap: 2.5rem;">
                <a href="#" style="color: inherit; text-decoration: none;">Privacy Policy</a>
                <a href="#" style="color: inherit; text-decoration: none;">Terms</a>
            </div>
        </div>
    </div>
</footer>

<div id="call-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>

        <div class="modal-header-clean">
            <h2 class="modal-main-title"><?php echo esc_html(get_theme_mod('m_title', 'Secure Your AI Strategy Session')); ?></h2>
            <p class="modal-subtitle"><?php echo esc_html(get_theme_mod('m_sub', '15–30 Minutes &middot; No Obligation &middot; Leave with a Clear Plan')); ?></p>
        </div>

        <div class="modal-body-scroll">
            <div class="modal-split">
                <!-- Left: Form -->
                <div class="modal-form-area">
                    <?php if ( get_theme_mod( 'm_type', 'iframe' ) === 'cf7' ) : ?>
                        <div class="modal-form-container" style="background: rgba(255,255,255,0.02); padding: 3rem; border: 1px solid rgba(255,255,255,0.05);">
                            <?php echo do_shortcode( get_theme_mod( 'm_cf7', '[contact-form-7 id="123" title="Book a Call"]' ) ); ?>
                        </div>
                    <?php else : ?>
                        <div class="iframe-container">
                            <iframe src="<?php echo esc_url(get_theme_mod('m_iframe', 'https://forms.aiagencygroup.ai/ai-strategy-session')); ?>" frameborder="0" style="width:100%; min-height:800px; border:none;"></iframe>
                        </div>
                    <?php endif; ?>
                    <div class="modal-notice">
                        Limited Availability | If you see a time available, a slot just opened
                    </div>
                </div>

                <!-- Right: Info -->
                <div class="modal-info-area">
                    <div class="modal-info-section">
                        <h3 class="modal-section-title">Increase Profit. Reduce Costs. Replace or Amplify Your Team with AI.</h3>
                        <p class="modal-section-desc">In this strategy session, we identify where AI can replace or support your team, reduce overhead, and increase output across your business.</p>
                    </div>

                    <div class="modal-info-section">
                        <h3 class="modal-section-title"><?php echo esc_html(get_theme_mod('m_ben_title', 'What You’ll Get on This Call')); ?></h3>
                        <ul class="modal-benefit-list">
                            <?php
                            $benefits = explode("\n", get_theme_mod('m_ben_list', "Identify exactly where your business is losing time, money, and efficiency\nPinpoint where AI employees can replace or support your current team\nMap out every opportunity to increase profit and reduce operating costs\nBreak down how AI applies across your sales, marketing, operations, and client service\nWalk away with a clear execution plan tailored specifically to your business\nDiscover which roles and operations are most immediately replaceable or amplifiable"));
                            foreach ($benefits as $b) {
                                if (trim($b)) echo '<li>' . esc_html(trim($b)) . '</li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="modal-info-section">
                        <h3 class="modal-section-title">Common Questions</h3>
                        <div class="modal-faq">
                            <?php for($f=1; $f<=5; $f++):
                                $q = get_theme_mod("m_faq_q_$f");
                                $a = get_theme_mod("m_faq_a_$f");
                                if($q): ?>
                                <div class="faq-item">
                                    <div class="faq-question"><?php echo esc_html($q); ?></div>
                                    <div class="faq-answer"><?php echo wp_kses_post($a); ?></div>
                                </div>
                            <?php endif; endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
