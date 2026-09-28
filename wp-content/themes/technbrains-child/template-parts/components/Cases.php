<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$cases=$data['cases']??[];
$img_base=get_stylesheet_directory_uri().'/assets/images';
// $arts = [
//   '<svg class="case-art" viewBox="0 0 320 360" preserveAspectRatio="xMidYMid slice" aria-hidden="true"><defs><linearGradient id="cFluidA" x1=".2" y1="0" x2=".8" y2="1"><stop offset="0%" stop-color="#FF8A2A"/><stop offset="45%" stop-color="#FFB36A"/><stop offset="100%" stop-color="#FFE0BE"/></linearGradient><radialGradient id="cFluidB" cx="42%" cy="62%" r="58%"><stop offset="0%" stop-color="#7AB6FF" stop-opacity=".95"/><stop offset="55%" stop-color="#3F7CDB" stop-opacity=".55"/><stop offset="100%" stop-color="#1B3F8A" stop-opacity="0"/></radialGradient><filter id="cBlurA"><feGaussianBlur stdDeviation="22"/></filter></defs><rect width="320" height="360" fill="url(#cFluidA)"/><path d="M-20 200 C 80 90, 180 360, 340 200 L 340 380 L -20 380 Z" fill="url(#cFluidB)" filter="url(#cBlurA)"/><path d="M40 60 C 120 200, 220 240, 300 90" stroke="#FFE7C9" stroke-opacity=".6" stroke-width="3" fill="none"/></svg>',
//   '<svg class="case-art" viewBox="0 0 320 360" preserveAspectRatio="xMidYMid slice" aria-hidden="true"><defs><linearGradient id="c2Bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#3A1E0E"/><stop offset="100%" stop-color="#A14A1B"/></linearGradient><linearGradient id="c2Rb" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#9FCBFF"/><stop offset="100%" stop-color="#1F3FA8"/></linearGradient></defs><rect width="320" height="360" fill="url(#c2Bg)"/><path d="M30 250 C 90 110, 230 110, 290 250 C 230 320, 90 320, 30 250 Z" fill="url(#c2Rb)" opacity=".85"/></svg>',
//   '<svg class="case-art" viewBox="0 0 320 360" preserveAspectRatio="xMidYMid slice" aria-hidden="true"><rect width="320" height="360" fill="#F4F2EE"/><path d="M90 90 h140 a36 36 0 0 1 36 36 v108 a36 36 0 0 1 -36 36 h-140 a36 36 0 0 1 -36 -36 v-108 a36 36 0 0 1 36 -36 z M196 130 a26 26 0 1 0 0 52 a26 26 0 1 0 0 -52 z" fill="#0C0C0E" fill-rule="evenodd"/></svg>',
//   '<svg class="case-art" viewBox="0 0 320 360" preserveAspectRatio="xMidYMid slice" aria-hidden="true"><defs><radialGradient id="c4S" cx="50%" cy="78%" r="65%"><stop offset="0%" stop-color="#FFD8B3"/><stop offset="80%" stop-color="#FFF6EC"/><stop offset="100%" stop-color="#FFFFFF"/></radialGradient><radialGradient id="c4C" cx="50%" cy="82%" r="32%"><stop offset="0%" stop-color="#FFA862" stop-opacity=".9"/><stop offset="100%" stop-color="#FFE0BE" stop-opacity="0"/></radialGradient></defs><rect width="320" height="360" fill="url(#c4S)"/><rect width="320" height="360" fill="url(#c4C)"/></svg>',
// ];;
$case_imgs=['case-coca-cola.webp','case-spruce.webp','case-nokia-al-saudia.webp','case-al-rostamani.webp','case-fixcarsharer.png','case-platetalk.png','case-qpon.png','case-whitetail.png','case-wedding.png'];


?>
<section class="section cases" id="cases" data-screen-label="06 Cases" data-deck="cases">
  <div class="container">
    <div class="section-head">
      <div class="section-intro">
        <h2>Engineering outcomes, backed by real work</h2>
        <p class="cases-intro-p">Discover how we've helped startups and enterprises build reliable digital products through senior engineering teams and accountable delivery structures.</p>
      </div>
    </div>
    <div class="case-deck">
      <?php foreach($cases as $i=>$c): ?>
      <?php
        // $art=$arts[$i%count($arts)];
        $img_file=$case_imgs[$i]??'';
        $pos_class=$i===0?'is-front':($i===1?'is-side-r':($i===count($cases)-1?'is-side-l':'is-far'));
        $z=$pos_class==='is-front'?50:(strpos($pos_class,'side')!==false?40:30);
      ?>
      <div class="case-card <?php echo esc_attr($pos_class); ?>" style="z-index:<?php echo (int)$z; ?>" data-cases-index="<?php echo (int)$i; ?>">
        <div class="case-art-frame">
          <?php // echo $art; ?>
          <?php if($img_file): ?>
          <img class="case-art-photo" src="<?php echo esc_url($img_base.'/'.$img_file); ?>" alt="<?php echo esc_attr($c['title']); ?>" loading="lazy" width="380" height="220">
          <?php endif; ?>
        </div>
        <div class="case-body">
          <div class="case-eyebrow"><?php echo esc_html($c['tag']); ?></div>
          <h3><?php echo esc_html($c['title']); ?></h3>
          <div class="case-metrics">
            <?php foreach($c['metrics'] as $m): ?>
            <div class="case-metric">
              <div class="case-metric-v"><?php echo esc_html($m['value']); ?></div>
              <div class="case-metric-l"><?php echo esc_html($m['label']); ?></div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="case-meta">
            <?php foreach($c['meta'] as $m): ?>
            <div class="case-meta-row"><span class="k"><?php echo esc_html($m['k']); ?></span><span class="v"><?php echo esc_html($m['v']); ?></span></div>
            <?php endforeach; ?>
          </div>
          <p class="case-desc"><?php echo esc_html($c['desc']); ?></p>
          <div class="case-foot"><a class="case-link" href="<?php echo esc_url($c['link']); ?>">View Full Case Study <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg></a></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
	<div class="nxt-actions">
      <a class="btn btn-primary" href="/case-studies/"> View All Case Studies</a>
    </div>
    <div class="case-deck-nav" aria-label="Case study navigation">
      <button class="case-btn" aria-label="Previous case study" data-cases-prev>
        <svg class="icon-flip" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
      </button>
      <div class="case-deck-dots" role="tablist">
        <?php foreach($cases as $i=>$c): ?>
        <button type="button" role="tab" class="case-deck-dot <?php echo $i===0?'is-active':''; ?>" aria-label="Show case study <?php echo (int)($i+1); ?>" data-cases-dot="<?php echo (int)$i; ?>"></button>
        <?php endforeach; ?>
      </div>
      <button class="case-btn" aria-label="Next case study" data-cases-next>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
      </button>
    </div>
  </div>
</section>
