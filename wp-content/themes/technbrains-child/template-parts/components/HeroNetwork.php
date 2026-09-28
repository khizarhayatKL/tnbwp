<?php
defined('ABSPATH')||exit;
$roles = wp_json_encode(['Senior React Engineers','AI / ML Specialists','Cloud Architects (AWS)','iOS & Android Devs','DevOps Engineers','Data Engineers','Product Designers']);
?>
<section class="hero-network" data-screen-label="01 Hero">
  <div class="neural-canvas-wrap">
    <canvas id="neural-canvas" class="neural-canvas" data-roles="<?php echo esc_attr($roles); ?>"></canvas>
  </div>
  <div class="hero-grid">
    <div class="hero-content">
      <h1>
       Build <span class="accent">right.</span> Staff <span class="accent">fast.</span>
        Skip rebuild.
      </h1>
      <p class="hero-sub">You rebuild software that was never designed for real compliance, scale, or users. You lose months to engineers learning your industry from scratch.<br>
TechnBrains solves both. Our software development and staff augmentation teams understand your workflows, compliance requirements, and system architecture from day one, so you launch faster and scale without losing context.</p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Start Your Project</a>
        <a class="btn btn-ghost-light" href="<?php echo esc_url(home_url('/case-studies/')); ?>">View Case Studies</a>
      </div>
    </div>
    <div class="hero-visual" aria-hidden="true"></div>
  </div>
</section>
