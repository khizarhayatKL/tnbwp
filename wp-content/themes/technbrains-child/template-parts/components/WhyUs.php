<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$whys=$data['why_us']??[];


$icon_images=[
    'StarIcon'    => 'https://www.technbrains.com/wp-content/uploads/2026/06/why-1.png',
    'RocketIcon'  => 'https://www.technbrains.com/wp-content/uploads/2026/06/why-2.png',
    'RefreshIcon' => 'https://www.technbrains.com/wp-content/uploads/2026/06/why-3.png',
    'SettingsIcon'=> 'https://www.technbrains.com/wp-content/uploads/2026/06/why-4.png',
    'TargetIcon'  => 'https://www.technbrains.com/wp-content/uploads/2026/06/why-5.png',
    'UsersIcon'   => 'https://www.technbrains.com/wp-content/uploads/2026/06/why-6.png',
];

$img_base=get_stylesheet_directory_uri().'/assets/images';
$total=count($whys);
$radius=250;
?>
<section class="section why" data-screen-label="11 Why">
  <div class="container why-layout">
    <div class="why-head">
      <h2>We don't stand out through claims</h2>
      <p>We stand out in how engineering work is actually handled day to day.</p>
    </div>

    <div class="why-hub" data-why-hub>
      <svg class="why-spokes" viewBox="-400 -340 800 680" aria-hidden="true">
        <?php foreach($whys as $i=>$w):
          $angle=($i/$total)*M_PI*2-M_PI/2;
          $x=round(cos($angle)*($radius-28),2);
          $y=round(sin($angle)*($radius-28),2);
          echo '<line class="why-spoke" x1="0" y1="0" x2="'.$x.'" y2="'.$y.'" data-spoke-index="'.$i.'"/>';
        endforeach; ?>
      </svg>

      <div class="why-hub-core">
        <div class="why-node-wrap">
          <span class="why-node-halo" aria-hidden="true"></span>
          <span class="why-node-halo why-node-halo-2" aria-hidden="true"></span>
          <img src="<?php echo esc_url('/wp-content/uploads/2026/06/new-logo-1.png'); ?>" alt="" aria-hidden="true" class="why-node-img" loading="lazy">
        </div>
      </div>

      <?php foreach($whys as $i=>$w):
        $angle=($i/$total)*M_PI*2-M_PI/2;
        $x=round(cos($angle)*$radius,1);
        $y=round(sin($angle)*$radius,1);
        $side=cos($angle)>=0?'right':'left';
        
        // Image URL fetch ho rahi hai yahan
        $icon_url=$icon_images[$w['icon']]?? '';
      ?>
      <div class="why-point why-point--<?php echo esc_attr($side); ?>"
        style="transform:translate(-50%,-50%) translate(<?php echo $x; ?>px,<?php echo $y; ?>px)"
        data-why-point="<?php echo (int)$i; ?>">
        <div class="why-point-card">
          <div class="why-point-icon">
            <?php if($icon_url): ?>
              <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($w['title']); ?>">
            <?php endif; ?>
          </div>
          <div class="why-point-title"><?php echo esc_html($w['title']); ?></div>
          <div class="why-point-desc"><?php echo esc_html($w['desc']); ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="why-list">
      <?php foreach($whys as $w):
        $icon_url=$icon_images[$w['icon']]?? '';
      ?>
      <div class="why-list-item">
        <?php if($icon_url): ?>
          <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($w['title']); ?>" width="20" height="20">
        <?php endif; ?>
        <h3><?php echo esc_html($w['title']); ?></h3>
        <p><?php echo esc_html($w['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>