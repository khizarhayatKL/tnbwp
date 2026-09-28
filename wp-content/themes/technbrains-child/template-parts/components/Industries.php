<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$industries=$data['industries']??[];
?>
<section class="section industries" id="industries" data-screen-label="12 Industries">
  <div class="container">
    <h2>Domain experience that reduces ramp-up time</h2>
    <p class="industries-intro-p">We've worked inside systems where edge cases, scale pressure, and real users shape every decision.</p>
    <div class="ind-grid">
      <div class="ind-row ind-row-top">
        <?php foreach(array_slice($industries,0,5) as $i=>$ind): ?>
        <a class="ind-card" href="<?php echo esc_url($ind['url']); ?>" aria-label="<?php echo esc_attr($ind['name']); ?> industry">
          <div class="ind-card-inner">
            <div class="ind-card-face ind-card-front">
              <img class="ind-card-img" src="<?php echo esc_url($ind['img']); ?>" alt="" loading="lazy" width="200" height="240">
              <div class="ind-card-front-overlay"></div>
              <h3 class="ind-card-name"><?php echo esc_html($ind['name']); ?></h3>
            </div>
            <div class="ind-card-face ind-card-back">
              <p class="ind-card-desc-back"><?php echo esc_html($ind['desc']); ?></p>
              <span class="ind-card-cta">Learn more <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
            </div>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
      <div class="ind-row ind-row-bot">
        <?php foreach(array_slice($industries,5) as $i=>$ind): ?>
        <a class="ind-card" href="<?php echo esc_url($ind['url']); ?>" aria-label="<?php echo esc_attr($ind['name']); ?> industry">
          <div class="ind-card-inner">
            <div class="ind-card-face ind-card-front">
              <img class="ind-card-img" src="<?php echo esc_url($ind['img']); ?>" alt="" loading="lazy" width="200" height="240">
              <div class="ind-card-front-overlay"></div>
              <h3 class="ind-card-name"><?php echo esc_html($ind['name']); ?></h3>
            </div>
            <div class="ind-card-face ind-card-back">
              <p class="ind-card-desc-back"><?php echo esc_html($ind['desc']); ?></p>
              <span class="ind-card-cta">Learn more <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
            </div>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
<!--     <div class="ind-viewall-wrap"><a class="ind-viewall" href="<?php echo esc_url(home_url('/industries/')); ?>">View all</a></div> -->
  <div class="nxt-actions mt-4">
      <a class="btn btn-primary" href="/industries/"> View All Industries</a>
    </div>
	</div>
</section>
