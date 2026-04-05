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
        <h1 class="text-uppercase tracking-widest" style="font-size: 3.5rem; margin-bottom: 2rem;">Elite AI Intelligence Platform</h1>
        <p style="font-size: 1.25rem; max-width: 800px; margin: 0 auto 3rem; color: var(--text-off-white);">SYSTEMATIC PRECISION. HIGH-AUTHORITY INSIGHTS. ELITE BUSINESS INTELLIGENCE TOOLS DESIGNED FOR THE MODERN ENTERPRISE.</p>
        <div style="display: flex; gap: 1.5rem; justify-content: center;">
            <a href="#" class="btn btn-teal">Access Intelligence</a>
            <a href="#" class="btn btn-outline-gold">View Documentation</a>
        </div>
    </div>
</section>

<!-- Dashboard Section -->
<section id="features" class="section">
    <div class="container">
        <h2 class="section-title">Systematic Capabilities</h2>
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24"><path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.18L19.5 8 12 11.82 4.5 8 12 4.18zM4 16.18V9.18l7 3.5v7l-7-3.5zm9 3.5v-7l7-3.5v7l-7 3.5z"/></svg>
                </div>
                <h3>Predictive Analytics</h3>
                <p>High-precision modeling using elite datasets to forecast market shifts before they manifest.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24"><path d="M21 16.5C21 16.88 20.79 17.21 20.47 17.38L12.57 21.82C12.41 21.94 12.21 22 12 22C11.79 22 11.59 21.94 11.43 21.82L3.53 17.38C3.21 17.21 3 16.88 3 16.5V7.5C3 7.12 3.21 6.79 3.53 6.62L11.43 2.18C11.59 2.06 11.79 2 12 2C12.21 2 12.41 2.06 12.57 2.18L20.47 6.62C20.79 6.79 21 7.12 21 7.5V16.5Z"/></svg>
                </div>
                <h3>Neural Integration</h3>
                <p>Seamlessly integrate systematic data streams into your existing corporate infrastructure.</p>
            </div>
            <div class="dashboard-card">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                </div>
                <h3>Elite Security</h3>
                <p>Top-tier encryption and decentralized data protocols ensuring maximum authority and privacy.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section id="cta" class="section section-alt flat-border" style="border-top: 1px solid rgba(255,255,255,0.1); border-bottom: 1px solid rgba(255,255,255,0.1);">
    <div class="container text-center">
        <h2 style="margin-bottom: 1.5rem;">Ready for Elite Intelligence?</h2>
        <p style="margin-bottom: 3rem; opacity: 0.8; max-width: 600px; margin-left: auto; margin-right: auto;">Step into the future of systematic business intelligence. Join the ranks of elite enterprises.</p>
        <a href="#" class="btn btn-teal">Request Early Access</a>
    </div>
</section>

<?php
get_footer();
