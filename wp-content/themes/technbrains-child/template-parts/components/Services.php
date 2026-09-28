<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$services=$data['services']??[];
$icons=[
'MobileIcon'=>'<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="2" width="12" height="20" rx="2"/><path d="M11 18h2"/></svg>',
'WebIcon'=>'<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 9h20M6 6.5h.01M9 6.5h.01M12 6.5h.01"/></svg>',
'SoftwareIcon'=>'<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M16 18l6-6-6-6M8 6l-6 6 6 6M14 4l-4 16"/></svg>',
'AIIcon'=>'<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M5 5l2 2M17 17l2 2M5 19l2-2M17 7l2-2"/></svg>',
'PlatformIcon'=>'<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>',
'EmergingIcon'=>'<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/></svg>',
];
?>
<section class="section services" id="services" data-screen-label="04 Services">
  <div class="container">
    <div class="section-head">
      <div class="section-intro">
        <h2>What You Can Build With Us</h2>
        <p>We design and engineer digital products across mobile, web, AI, and enterprise systems built for scalability, reliability, and long-term growth.</p>
      </div>
    </div>
    <div class="services-grid">
      <?php foreach($services as $s): ?>
      <div class="service-card">
        <div class="service-icon-tile"><?php echo $icons[$s['icon']]??''; ?></div>
        <?php if (!empty($s['link'])) : ?>
		  <h3>
			<a href="<?php echo esc_url($s['link']); ?>">
			  <?php echo esc_html($s['title']); ?>
			</a>
		  </h3>
		<?php else : ?>
		  <h3><?php echo esc_html($s['title']); ?></h3>
		<?php endif; ?>
        <p class="service-desc"><?php echo esc_html($s['desc']); ?></p>
        <ul class="service-pills">
		  <?php foreach($s['bullets'] as $label => $link): ?>
			<li>
				<?php if (!empty($link) && $link !== '#') : ?>
					<a href="<?php echo esc_url($link); ?>" class="service-pill">
						<?php echo esc_html($label); ?>
					</a>
				<?php else : ?>
					<span class="service-pill">
						<?php echo esc_html($label); ?>
					</span>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
</ul>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
	<div class="nxt-actions mt-4">
    <a class="btn btn-primary" href="/services/">View All Services</a>
  </div>
</section>
