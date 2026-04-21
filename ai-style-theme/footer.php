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
                    <li>AI SEO — AIO</li>
                    <li>Tool Activation</li>
                    <li>AI Training</li>
                    <li>AI Yourself</li>
                </ul>
            </div>
            <div>
                <h4 style="font-size: 0.95rem; margin-bottom: 2rem; letter-spacing: 0.15em;">COMPANY</h4>
                <ul style="list-style: none; padding: 0; opacity: 0.5; font-size: 0.9rem; line-height: 2.2;">
                    <li>Who We Build For</li>
                    <li>Our Work</li>
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
                    <li>Facebook</li>
                    <li>X / Twitter</li>
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
                        <h3 class="modal-section-title"><?php echo esc_html(get_theme_mod('m_for_title', 'Who This Is For')); ?></h3>
                            <div class="for-grid">
                                <div class="for-item"><span>↑</span><strong>Increase Profitability</strong> Business owners who want more margin without more people</div>
                                <div class="for-item"><span>↓</span><strong>Reduce Operating Costs</strong> Executives looking to cut overhead without cutting performance</div>
                                <div class="for-item"><span>⚡</span><strong>Improve Efficiency</strong> Leaders who want faster execution across every department</div>
                                <div class="for-item"><span>→</span><strong>Scale Without Bloat</strong> Operators ready to grow without adding unnecessary overhead</div>
                            </div>
                        </div>

                        <div class="modal-info-section">
                            <h3 class="modal-section-title"><?php echo esc_html(get_theme_mod('m_comp_title', 'Most Companies Use AI Wrong')); ?></h3>
                            <div class="comp-table">
                                <div class="comp-row head"><div>Typical Approach</div><div>This Session</div></div>
                                <div class="comp-row"><div>Generic AI overview with no direct application</div><div>Specific to your business, team structure, and cost model</div></div>
                                <div class="comp-row"><div>AI tools that save small amounts of time on low-leverage tasks</div><div>Focused entirely on where AI actually impacts profit and execution</div></div>
                                <div class="comp-row"><div>Generic roadmap that could apply to any company</div><div>Clear, tailored execution plan built specifically around your business</div></div>
                            </div>
                        </div>

                        <div class="modal-info-section">
                            <h3 class="modal-section-title"><?php echo esc_html(get_theme_mod('m_delay_title', 'Every Month You Delay Has a Cost')); ?></h3>
                            <p class="modal-section-desc">The gap is already happening. Companies implementing AI at a system level are moving faster. Waiting means falling behind.</p>
                            <ol class="delay-list">
                                <li>You continue paying for work AI could handle at a fraction of the cost</li>
                                <li>Your competitors move faster and operate more efficiently every quarter</li>
                                <li>The margin between leaders and followers widens and accelerates</li>
                            </ol>
                        </div>

                        <div class="modal-info-section">
                            <h3 class="modal-section-title">Common Questions</h3>
                            <div class="modal-faq">
                            <?php
                            $faq_defaults = array(
                                1 => array('q' => 'What exactly happens on the strategy session?', 'a' => 'This is a focused working session. We look at your business, identify where time, money, and efficiency are being lost, and map out where AI can replace or support your team.'),
                                2 => array('q' => 'Is this just another sales call?', 'a' => 'No. This is a strategy session designed to give you clarity on how AI can be implemented inside your business. If there is a fit, we discuss next steps.'),
                                3 => array('q' => 'What types of businesses do you work with?', 'a' => 'We work with business owners, entrepreneurs, executives, and companies from small businesses to enterprise and government.'),
                                4 => array('q' => 'What do you mean by AI employees?', 'a' => 'AI employees are systems designed to perform specific roles inside your business. This includes sales follow-up, marketing content, customer service, and operational workflows.'),
                                5 => array('q' => 'Can AI really replace parts of my team?', 'a' => 'Yes. In many cases, AI can replace or significantly reduce the need for certain roles, especially where work is repetitive or structured.'),
                                6 => array('q' => 'Why are most companies failing with AI?', 'a' => 'Because they are using it as a tool, not as a system. The companies winning with AI are building it into their sales, operations, and execution.'),
                                7 => array('q' => 'How quickly can this be implemented?', 'a' => 'It depends on the complexity. Some systems can be implemented quickly. Full AI departments take longer to design and build.'),
                                8 => array('q' => 'Do I need technical knowledge or a team to do this?', 'a' => 'No. We handle the strategy, design, and implementation. If you want your team involved, we can train them.'),
                                9 => array('q' => 'What if I want to build this internally?', 'a' => 'We support that. We have a dedicated training division that teaches business owners and teams how to build and scale AI.'),
                                10 => array('q' => 'What kind of results can I expect?', 'a' => 'Most companies see a 20% to 60% reduction in operational costs and a 2x to 5x increase in output in key areas.'),
                                11 => array('q' => 'Is this expensive?', 'a' => 'The real question is: what is the cost of not fixing inefficiency? AI is a way to reduce cost and improve profitability.'),
                                12 => array('q' => 'What if this is not a fit for my business?', 'a' => 'Then you still leave with clarity. We will show you where AI can or cannot be applied. No obligation to move forward.'),
                                13 => array('q' => 'What happens after the call?', 'a' => 'You will have a clear direction. If there is a fit, we outline how we can build or implement AI inside your business.'),
                                14 => array('q' => 'Why should I do this now?', 'a' => 'Because the gap is already happening. Companies implementing AI at a system level are moving faster. Waiting means falling behind.')
                            );
                            for($f=1; $f<=14; $f++):
                                $q = get_theme_mod("m_faq_q_$f", $faq_defaults[$f]['q']);
                                $a = get_theme_mod("m_faq_a_$f", $faq_defaults[$f]['a']);
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
</div>

<?php wp_footer(); ?>
</body>
</html>
