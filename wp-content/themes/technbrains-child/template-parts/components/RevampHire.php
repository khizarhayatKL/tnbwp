<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$groups=$data['hire_groups']??[];
$img=get_stylesheet_directory_uri().'/assets/images/home/';
$specs=[
  ['role'=>'iOS Engineer','stack'=>'Swift · SwiftUI · UIKit · 7+ yrs','bg'=>'#F2D8C6','img'=>'/wp-content/uploads/2026/06/ios.png'],
  ['role'=>'Frontend Engineer','stack'=>'React · Next.js · Node.js · 6+ yrs','bg'=>'#C7D6EF','img'=>'/wp-content/uploads/2026/06/frontend.png'],
  ['role'=>'AI / ML Engineer','stack'=>'Python · PyTorch · LangChain · 5+ yrs','bg'=>'#E5D5E8','img'=>'/wp-content/uploads/2026/06/ai-ml.png'],
	['role'=>'Angular Developer','stack'=>'Angular, RxJS, TypeScript, 7+ yrs','bg'=>'#E5D5E8','img'=>'/wp-content/uploads/2026/06/angular-dev.png'],
	['role'=>'Cloud Architect','stack'=>'AWS, Azure, Terraform 10+ yrs','bg'=>'#E5D5E8','img'=>'/wp-content/uploads/2026/06/cloud-architect.png'],
	['role'=>'Node.js Engineer','stack'=>'Node.js, Express, PostgreSQL, 7+ yrs','bg'=>'#E5D5E8','img'=>'/wp-content/uploads/2026/06/nodejs-dev.png'],
	['role'=>'React Native Developer','stack'=>'React Native, TypeScript, Redux, 6+ yrs','bg'=>'#E5D5E8','img'=>'/wp-content/uploads/2026/06/native-dev.png'],
];
$all_specs=array_merge($specs,$specs,$specs,$specs);
?>
<section class="section hire" id="hire" data-screen-label="07 Hire">
  <div class="container hire-container">
    <div class="hire-shell hire-shell-stacked">
      <header class="hire-top">
        <h2 class="hire-headline">Developers Ready to Join Your Team</h2>
        <p class="hire-sub">Pre-vetted senior developers available to join your workflows within 72 hours. We map engineers based on your stack, sprint structure, and delivery requirements.</p>
      </header>
      <div class="hire-clusters hire-accordions" data-accordion-group="hire">
        <?php foreach($groups as $i=>$g): ?>
        <div class="hire-pcard hire-accordion" data-accordion-item>
          <button type="button" class="hire-accordion-head" data-accordion-trigger aria-expanded="false">
            <div class="hire-pmeta">
              <div class="hire-ptitle"><?php echo esc_html($g['title']); ?></div>
              <div class="hire-pdesc"><?php echo esc_html($g['desc']); ?></div>
            </div>
            <span class="hire-accordion-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M5 8l5 5 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </button>
          <ul class="hire-plinks">
            <?php foreach($g['links'] as $label => $slug): ?>
            <li>
    <a href="<?php echo esc_url(home_url($slug)); ?>">
      <span><?php echo esc_html($label); ?></span>
      <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M5 12h14M13 5l7 7-7 7"/>
      </svg>
    </a>
  </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="hire-marquee" aria-label="Featured engineers available now">
    <div class="hire-marquee-label">Available now</div>
    <div class="hire-marquee-track">
      <?php foreach($all_specs as $s): ?>
      <div class="hire-marquee-item">
        <div class="hire-marquee-photo" style="background:<?php echo esc_attr($s['bg']); ?>">
          <img src="<?php echo esc_url($s['img']); ?>" alt="<?php echo esc_attr($s['role']); ?>" loading="lazy">
        </div>
        <div class="hire-marquee-meta">
          <div class="hire-marquee-role"><?php echo esc_html($s['role']); ?></div>
          <div class="hire-marquee-stack"><?php echo esc_html($s['stack']); ?></div>
        </div>
        <span class="hire-marquee-dot" aria-hidden="true"></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
