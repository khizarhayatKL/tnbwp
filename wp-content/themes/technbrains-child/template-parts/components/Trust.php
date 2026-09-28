<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$metrics=$data['trust_metrics']??[];
$variant=$data['trust_variant']??'a';

$icons=[
  '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
  '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
  '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
  '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
];

$logos=[
  ['name'=>'Clutch',        'logo'=>'/wp-content/uploads/2026/06/clutch.png',        'link'=>'https://clutch.co/profile/technbrains'],
  ['name'=>'DesignRush',    'logo'=>'/wp-content/uploads/2026/06/design-rush.png',    'link'=>'https://www.designrush.com/agency/profile/technbrains#services'],
  ['name'=>'GoodFirms',     'logo'=>'/wp-content/uploads/2026/06/good-firms.png',     'link'=>'https://www.goodfirms.co/company/technbrains'],
  ['name'=>'Inc.',          'logo'=>'/wp-content/uploads/2026/06/inc.png',           'link'=>'https://www.inc.com/profile/technbrains'],
  ['name'=>'Crunchbase',    'logo'=>'/wp-content/uploads/2026/06/crunchbase.png',    'link'=>'https://www.crunchbase.com/organization/technbrains'],
  ['name'=>'Trustpilot',    'logo'=>'/wp-content/uploads/2026/06/trust.png',    'link'=>'https://www.trustpilot.com/review/technbrains.com'],
  ['name'=>'TopDevelopers', 'logo'=>'/wp-content/uploads/2026/06/top-dev.png', 'link'=>'https://www.topdevelopers.co/profile/Technbrains'],
];
$all_logos=array_merge($logos,$logos);
?>
<section class="trust" data-screen-label="02 Trust">
  <div class="trust-inner">
    <div class="trust-cards-row trust-variant-<?php echo esc_attr($variant); ?>">
      <?php foreach($metrics as $i=>$m):
        $icon=$icons[$i]??'';
        if($variant==='c'):
          $pct=($m['unit']==='%')?$m['target']:(($m['unit']==='★')?($m['target']/5)*100:(($m['unit']==='h')?(1-$m['target']/168)*100:min($m['target']*8,100)));
        endif;
      ?>
      <div class="trust-metric-card">
        <?php if($variant==='b'): ?>
          <div class="tmb-top-bar" aria-hidden="true"></div>
          <div class="tmb-icon"><?php echo $icon; ?></div>
        <?php elseif($variant==='c'): ?>
          <div class="tmc-glow" aria-hidden="true"></div>
          <div class="tmc-header">
            <div class="tmc-icon"><?php echo $icon; ?></div>
            <div class="tmc-bar-wrap"><div class="tmc-bar-fill" style="width:<?php echo round($pct,1); ?>%"></div></div>
          </div>
        <?php endif; ?>
        <div class="trust-metric-num">
          <?php $dec=intval($m['decimals']??0); $init_num=$dec>0?number_format((float)$m['target'],$dec):(string)intval($m['target']); ?>
          <span data-counter="<?php echo esc_attr($m['target']); ?>" data-counter-decimals="<?php echo esc_attr($dec); ?>"><?php echo esc_html($init_num); ?></span>
          <span class="unit"><?php echo esc_html($m['unit']); ?></span>
        </div>
        <div class="trust-metric-label"><?php echo esc_html($m['label']); ?></div>
        <?php if($variant==='b'): ?>
          <div class="tmb-caption"><?php echo esc_html($m['caption']??''); ?></div>
        <?php elseif($variant==='c'): ?>
          <div class="tmc-caption"><?php echo esc_html($m['caption']??''); ?></div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="recog-strip">
      <span class="recog-label">Recognised By</span>
      <div class="recog-marquee">
        <div class="recog-track">
          <?php foreach($all_logos as $idx=>$l): ?>
          <div class="recog-item"<?php if ($idx >= count($logos)) echo ' aria-hidden="true" inert'; ?>>
            <a href="<?php echo esc_url($l['link']); ?>" target="_blank" rel="noopener">
              <img src="<?php echo esc_url($l['logo']); ?>" alt="<?php echo esc_attr($l['name']); ?>" width="100" height="30" loading="lazy">
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>