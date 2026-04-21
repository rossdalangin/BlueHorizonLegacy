</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <div class="footer-logo" style="margin-bottom: 2.5rem;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #fff; font-size: 1.6rem; font-family: var(--font-heading); font-weight: 900; letter-spacing: 0.1em;"><?php echo esc_html(get_theme_mod('footer_logo', 'AI AGENCY GROUP')); ?></a>
                </div>
                <p style="opacity: 0.5; max-width: 400px; font-size: 1rem; color: #fff; text-transform: none; letter-spacing: 0;">We design, build, and deploy AI Departments for businesses in 72 countries. Solopreneurs to Enterprise.</p>
            </div>

            <div class="footer-col">
                <h4>SERVICES</h4>
                <ul class="footer-nav">
                    <li><a href="#">AI Departments</a></li>
                    <li><a href="#">AI Employees</a></li>
                    <li><a href="#">Custom AI Projects</a></li>
                    <li><a href="#">AI Workflows</a></li>
                    <li><a href="#">AI SEO — AIO</a></li>
                    <li><a href="#">Tool Activation</a></li>
                    <li><a href="#">AI Training</a></li>
                    <li><a href="#">AI Yourself</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>COMPANY</h4>
                <ul class="footer-nav">
                    <li><a href="#">Who We Build For</a></li>
                    <li><a href="#">Our Work</a></li>
                    <li><a href="#">Insights</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>CONNECT</h4>
                <ul class="footer-nav">
                    <li><a href="#">LinkedIn</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">YouTube</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">X / Twitter</a></li>
                </ul>
            </div>
        </div>

        <div style="border-top: 1px solid var(--border-subtle); padding-top: 60px; display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem; opacity: 0.4; letter-spacing: 0.05em;">
            <div>&copy; <?php echo date( 'Y' ); ?> <?php echo esc_html(get_theme_mod('footer_copy', 'AI Agency Group LLC — All Rights Reserved')); ?></div>
            <div style="display: flex; gap: 3rem;">
                <a href="#" style="color: inherit;">Privacy Policy</a>
                <a href="#" style="color: inherit;">Terms</a>
            </div>
        </div>
    </div>
</footer>

<!-- ULTIMATE HIGH-FIDELITY MODAL -->
<div id="strategy-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal" id="strategyModalClose">&times;</span>

        <div class="modal-header-clean">
            <?php
            $m_vid = get_theme_mod('m_video', 'https://assets.cdn.filesafe.space/TRgTosvlNzRa9OIbzIzw/media/69d6557da64a04ba15df08cc.mp4');
            if ($m_vid): ?>
            <div style="margin-bottom: 30px;">
                <video autoplay muted loop playsinline style="width: 100%; max-height: 400px; object-fit: cover;">
                    <source src="<?php echo esc_url($m_vid); ?>" type="video/mp4">
                </video>
            </div>
            <?php endif; ?>
            <h2 class="modal-main-title"><?php echo esc_html(get_theme_mod('m_title', 'SECURE YOUR AI STRATEGY SESSION')); ?></h2>
            <p class="modal-subtitle"><?php echo esc_html(get_theme_mod('m_sub', '15–30 Minutes · No Obligation · Leave with a Clear Plan')); ?></p>
        </div>

        <div class="modal-body-scroll">
            <div class="modal-container-narrow">
                <!-- Form Area -->
                <div class="modal-form-area-centered">
                    <div class="wpcf7-wrapper">
                        <?php echo do_shortcode( get_theme_mod( 'm_cf7', '[contact-form-7 id="123" title="Book a Call"]' ) ); ?>
                    </div>
                    <div class="modal-notice">
                        Limited Availability | If you see a time available, a slot just opened
                    </div>
                </div>

                <!-- Info Area -->
                <div class="modal-info-area-stacked">
                    <div class="modal-info-section">
                        <h3 class="modal-section-title">Increase Profit. Reduce Costs. Replace or Amplify Your Team with AI.</h3>
                        <p class="modal-section-desc">In this strategy session, we identify where AI can replace or support your team, reduce overhead, and increase output across your business. This is not a generic consultation. This is a focused working session.</p>
                        <h3 class="modal-section-title"><?php echo esc_html(get_theme_mod('m_ben_title', 'What You’ll Get on This Call')); ?></h3>
                        <ul class="modal-benefit-list">
                            <?php
                            $benefits_raw = get_theme_mod('m_ben_list', "Identify exactly where your business is losing time, money, and efficiency\nPinpoint where AI employees can replace or support your current team\nMap out every opportunity to increase profit and reduce operating costs\nBreak down how AI applies across your sales, marketing, operations, and client service\nWalk away with a clear execution plan tailored specifically to your business\nDiscover which roles and operations are most immediately replaceable or amplifiable");
                            $benefits = explode("\n", $benefits_raw);
                            foreach ($benefits as $b) {
                                if (trim($b)) echo '<li>' . esc_html(trim($b)) . '</li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- Who This Is For -->
                    <div class="modal-info-section">
                        <p class="section-label" style="color:#000 !important; font-size: 2.5rem; font-family: var(--font-heading);"><?php echo esc_html(get_theme_mod('m_for_title', 'Who This Is For')); ?></p>
                        <div class="section-rule" style="background:var(--accent-blue); margin-top:-1.5rem;"></div>
                        <div class="for-grid">
                            <?php
                            $for_raw = get_theme_mod('m_for_items', "↑|Increase Profitability|Business owners who want more margin without more people or more complexity\n↓|Reduce Operating Costs|Executives looking to cut overhead without cutting performance or output\n⚡|Improve Efficiency|Leaders who want faster execution across every department without adding complexity\n→|Scale Without Bloat|Operators ready to grow without adding unnecessary overhead or headcount");
                            $for_lines = explode("\n", $for_raw);
                            foreach ($for_lines as $line) {
                                $parts = explode('|', $line);
                                if (count($parts) >= 3) {
                                    echo '<div class="who-card">';
                                    echo '<span class="who-icon">'.esc_html($parts[0]).'</span>';
                                    echo '<div class="who-title">'.esc_html($parts[1]).'</div>';
                                    echo '<div class="who-desc">'.esc_html($parts[2]).'</div>';
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Reinforcement -->
                    <div class="modal-info-section">
                        <p class="section-label" style="color:#000 !important; font-size: 2.5rem; font-family: var(--font-heading);"><?php echo esc_html(get_theme_mod('m_comp_title', 'Most Companies Use AI Wrong')); ?></p>
                        <div class="section-rule" style="background:var(--accent-gold); margin-top:-1.5rem;"></div>
                        <div class="contrast-grid">
                            <?php
                            $comp_raw = get_theme_mod('m_comp_items', "Generic AI overview with no direct application to your business, your team, or your numbers|Specific to your business, your team structure, your cost model, and your revenue opportunity\nAI tools that save small amounts of time on low-leverage tasks that barely move the needle|Focused entirely on where AI actually impacts profit, operating costs, and execution at scale\nYou walk away with a generic roadmap that could apply to any company in any industry|You walk away with a clear, tailored execution plan built specifically around your business");
                            $comp_lines = explode("\n", $comp_raw);
                            foreach ($comp_lines as $line) {
                                $parts = explode('|', $line);
                                if (count($parts) >= 2) {
                                    echo '<div class="contrast-cell">';
                                    echo '<span class="contrast-label label-typical">Typical Approach</span>';
                                    echo '<p style="color:#555; text-transform:none; letter-spacing:0; font-weight:400; font-size:1rem;">'.esc_html($parts[0]).'</p>';
                                    echo '</div>';
                                    echo '<div class="contrast-cell is-this">';
                                    echo '<span class="contrast-label label-this">This Session</span>';
                                    echo '<p style="color:#000; text-transform:none; letter-spacing:0; font-weight:400; font-size:1rem;">'.esc_html($parts[1]).'</p>';
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Cost of Delay -->
                    <div class="modal-info-section">
                        <p class="section-label" style="color:#000 !important; font-size: 2.5rem; font-family: var(--font-heading);"><?php echo esc_html(get_theme_mod('m_delay_title', 'Every Month You Delay Has a Cost')); ?></p>
                        <div class="section-rule" style="background:#ff3b30; margin-top:-1.5rem;"></div>
                        <p class="modal-section-desc"><?php echo wp_kses_post(get_theme_mod('m_delay_desc', 'Most companies use AI to save small amounts of time. This session focuses on using AI where it actually impacts profit, cost, and execution. That gap compounds every month it goes unaddressed.')); ?></p>
                        <ol class="cost-list">
                            <?php
                            $delay_raw = get_theme_mod('m_delay_list', "You continue paying for work AI could handle at a fraction of the cost\nYour competitors move faster and operate more efficiently every quarter\nThe margin between leaders and followers widens and accelerates");
                            $delay_lines = explode("\n", $delay_raw);
                            foreach ($delay_lines as $line) {
                                if (trim($line)) echo '<li>'.esc_html(trim($line)).'</li>';
                            }
                            ?>
                        </ol>
                    </div>

                    <div class="modal-info-section">
                        <p class="section-label" style="color:#000 !important; text-align:center !important; font-size: 2.5rem; font-family: var(--font-heading);">Common <span class="accent" style="color:var(--accent-gold);">Questions</span></p>
                        <div class="section-rule" style="margin: -1.5rem auto 3.5rem;"></div>
                        <div class="faq-grid">
                            <?php
                            $faq_defaults = array(
                                1 => array('q' => 'WHAT EXACTLY HAPPENS ON THE STRATEGY SESSION?', 'a' => 'This is a focused working session. We look at your business, identify where time, money, and efficiency are being lost, and map out where AI can replace or support your team. You will leave with a clear understanding of where AI fits, what can be automated or improved, and what your first steps should be.'),
                                2 => array('q' => 'IS THIS JUST ANOTHER SALES CALL?', 'a' => 'No. This is a strategy session designed to give you clarity on how AI can be implemented inside your business. If there is a fit to work together, we will discuss next steps.'),
                                3 => array('q' => 'WHAT TYPES OF BUSINESSES DO YOU WORK WITH?', 'a' => 'We work with business owners, entrepreneurs, executives, and companies from small businesses to enterprise and government.'),
                                4 => array('q' => 'WHAT DO YOU MEAN BY AI EMPLOYEES?', 'a' => 'AI employees are systems designed to perform specific roles inside your business. This includes sales follow-up, marketing content and campaigns, customer service responses, operational workflows, and internal support tasks.'),
                                5 => array('q' => 'CAN AI REALLY REPLACE PARTS OF MY TEAM?', 'a' => 'Yes. In many cases, AI can replace or significantly reduce the need for certain roles, especially where work is repetitive or structured. In other cases, it amplifies your existing team.'),
                                6 => array('q' => 'WHY ARE MOST COMPANIES FAILING WITH AI?', 'a' => 'Because they are using it as a tool, not as a system. The companies winning with AI are building it into their sales, operations, and execution.'),
                                7 => array('q' => 'HOW QUICKLY CAN THIS BE IMPLEMENTED?', 'a' => 'It depends on the complexity. Some systems can be implemented quickly. Full AI departments take longer to design and build.'),
                                8 => array('q' => 'DO I NEED TECHNICAL KNOWLEDGE OR A TEAM TO DO THIS?', 'a' => 'No. We handle the strategy, design, and implementation. If you want your team involved, we can train them.'),
                                9 => array('q' => 'WHAT IF I WANT TO BUILD THIS INTERNALLY?', 'a' => 'We support that. We have a dedicated training division that teaches business owners and teams how to build AI employees, implement AI workflows, and scale AI.'),
                                10 => array('q' => 'WHAT KIND OF RESULTS CAN I EXPECT?', 'a' => 'Most companies see a 20% to 60% reduction in operational costs and a 2x to 5x increase in output in key areas.'),
                                11 => array('q' => 'IS THIS EXPENSIVE?', 'a' => 'The real question is: what is the cost of not fixing inefficiency? AI is a way to reduce cost and improve profitability.'),
                                12 => array('q' => 'WHAT IF THIS IS NOT A FIT FOR MY BUSINESS?', 'a' => 'Then you still leave with clarity. We will show you where AI can or cannot be applied. No obligation to move forward.'),
                                13 => array('q' => 'WHAT HAPPENS AFTER THE CALL?', 'a' => 'After the session, you will have a clear direction. If there is a fit, we will outline next steps.'),
                                14 => array('q' => 'WHY SHOULD I DO THIS NOW?', 'a' => 'Because the gap is already happening. Companies implementing AI at a system level are reducing costs and moving faster.')
                            );
                            for($f=1; $f<=14; $f++):
                                $q = get_theme_mod("m_faq_q_$f", $faq_defaults[$f]['q']);
                                $a = get_theme_mod("m_faq_a_$f", $faq_defaults[$f]['a']);
                                if($q): ?>
                                <div class="faq-item">
                                    <div class="faq-q"><?php echo esc_html($q); ?></div>
                                    <div class="faq-a"><?php echo wp_kses_post($a); ?></div>
                                </div>
                            <?php endif; endfor; ?>
                        </div>
                        <div class="text-center" style="margin-top:50px; font-weight:900; text-transform:uppercase; font-family:var(--font-heading);">
                            <p style="color:#000; margin-bottom:10px;">This is not about adding AI.</p>
                            <p style="color:#000;">This is about rebuilding how your business operates.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-backdrop" id="strategyModalBackdrop"></div>

<?php wp_footer(); ?>
</body>
</html>
