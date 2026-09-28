<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$cards=$data['engage_cards']??[];

/* ── helpers ──────────────────────────────────────────── */
function staff_av(string $fill, float $r=14):string{
  $hr=round($r*0.32,2); $hy=round(-$r*0.22,2);
  $sw=round(max(1.3,$r*0.13),2);
  $bx=round($r*0.55,2); $by=round($r*0.55,2); $bry=round($r*0.42,2);
  return '<g><circle r="'.$r.'" fill="'.$fill.'"/>
    <g stroke="#fff" stroke-width="'.$sw.'" stroke-linecap="round" stroke-linejoin="round" fill="none">
      <circle cy="'.$hy.'" r="'.$hr.'"/>
      <path d="M -'.$bx.' '.$by.' a '.$bx.' '.$bry.' 0 0 1 '.($bx*2).' 0"/>
    </g></g>';
}

function hex_path(float $cx,float $cy,float $r):string{
  $pts=[];
  for($i=0;$i<6;$i++){
    $a=M_PI/3*$i-M_PI/2;
    $pts[]=round($cx+cos($a)*$r,1).','.round($cy+sin($a)*$r,1);
  }
  return 'M '.implode(' L ',$pts).' Z';
}

function hex_icon(string $kind):string{
  $s='#fff'; $w='1.4';
  switch($kind){
    case 'code': return '<g stroke="'.$s.'" stroke-width="'.$w.'" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M -4 -2 L -6 0 L -4 2"/><path d="M 4 -2 L 6 0 L 4 2"/><path d="M 1.5 -3.5 L -1.5 3.5"/></g>';
    case 'palette': return '<g stroke="'.$s.'" stroke-width="'.$w.'" fill="none"><circle cx="0" cy="0" r="3.6"/><circle cx="-1.4" cy="-0.8" r="0.6" fill="'.$s.'"/><circle cx="0" cy="-2" r="0.6" fill="'.$s.'"/><circle cx="1.4" cy="-0.8" r="0.6" fill="'.$s.'"/></g>';
    case 'search': return '<g stroke="'.$s.'" stroke-width="'.$w.'" fill="none" stroke-linecap="round"><circle cx="-1" cy="-1" r="3"/><path d="M 1.4 1.4 L 3.6 3.6"/></g>';
    case 'briefcase': return '<g stroke="'.$s.'" stroke-width="'.$w.'" fill="none"><rect x="-4" y="-1.8" width="8" height="5.5" rx="1"/><path d="M -1.8 -1.8 V -3 H 1.8 V -1.8"/></g>';
  }
  return '';
}

/* ── Visual 01 — Staff Capacity ───────────────────────── */
$adds=[
  ['x'=>226,'delay'=>0.00,'fx'=>540,'fy'=>240],
  ['x'=>280,'delay'=>0.15,'fx'=>560,'fy'=>250],
  ['x'=>334,'delay'=>0.30,'fx'=>580,'fy'=>230],
];
$existing=[['x'=>78,'fill'=>'#DC2626'],['x'=>124,'fill'=>'#0D9488'],['x'=>170,'fill'=>'#0D9488']];
ob_start(); ?>
<svg class="ev-svg ev-staff-cap" viewBox="0 0 480 280" aria-hidden="true">
  <rect x="32" y="42" width="376" height="200" rx="14" fill="#FFFFFF" stroke="rgba(15,23,42,0.10)"/>
  <text x="48" y="76" font-size="10" font-weight="600" fill="#0F172A" letter-spacing="0.05em">SPRINT CAPACITY</text>
  <text x="48" y="92" font-size="8" fill="rgba(15,23,42,0.55)">3 engineers · ~60% utilisation</text>
  <text class="ev-cap-pct ev-cap-pct--from" x="392" y="76" text-anchor="end" font-size="22" font-weight="700" fill="#0D9488">60%</text>
  <text class="ev-cap-pct ev-cap-pct--to"   x="392" y="76" text-anchor="end" font-size="22" font-weight="700" fill="#0D9488">100%</text>
  <rect x="48" y="118" width="344" height="22" rx="11" fill="#F1F5F9"/>
  <rect class="ev-cap-fill" x="48" y="118" height="22" rx="11" fill="#0D9488"/>
  <line x1="392" y1="110" x2="392" y2="148" stroke="rgba(220,38,38,0.5)" stroke-dasharray="2 3" stroke-width="1"/>
  <text x="392" y="160" text-anchor="end" font-size="7" fill="#DC2626" font-weight="600" letter-spacing="0.05em">100% TARGET</text>
  <text x="48" y="194" font-size="9" font-weight="600" fill="#0F172A" letter-spacing="0.05em">TEAM</text>
  <line x1="48" y1="240" x2="392" y2="240" stroke="rgba(15,23,42,0.10)" stroke-dasharray="3 4"/>
  <?php foreach($existing as $s): ?>
  <g transform="translate(<?php echo $s['x']; ?> 222)"><?php echo staff_av($s['fill'],13); ?></g>
  <?php endforeach; ?>
  <g class="ev-staff-flyers">
    <?php foreach($adds as $n): ?>
    <g class="ev-flyer" style="--from-x:<?php echo $n['fx']; ?>px;--from-y:<?php echo $n['fy']; ?>px;--to-x:<?php echo $n['x']; ?>px;--to-y:222px;transition-delay:<?php echo $n['delay']; ?>s">
      <?php echo staff_av('#2563EB',13); ?>
      <g class="ev-plus-badge" transform="translate(10 -10)">
        <circle r="5" fill="#2563EB" stroke="#fff" stroke-width="1.2"/>
        <path d="M -2.4 0 L 2.4 0 M 0 -2.4 L 0 2.4" stroke="#fff" stroke-width="1.4" stroke-linecap="round"/>
      </g>
    </g>
    <?php endforeach; ?>
  </g>
</svg>
<?php $visual_staff=ob_get_clean();

/* ── Visual 02 — Dedicated Hex ────────────────────────── */
$HR=32; $cx=240; $cy=140;
$dx=round(sqrt(3)*$HR,1);
$ring=[
  ['x'=>$cx,    'y'=>$cy-2*$HR,'color'=>'#111827','label'=>'PM', 'icon'=>'briefcase'],
  ['x'=>$cx+$dx,'y'=>$cy-$HR,  'color'=>'#0D9488','label'=>'Eng','icon'=>'code'],
  ['x'=>$cx+$dx,'y'=>$cy+$HR,  'color'=>'#2563EB','label'=>'Dev','icon'=>'palette'],
  ['x'=>$cx,    'y'=>$cy+2*$HR,'color'=>'#4F46E5','label'=>'QA', 'icon'=>'search'],
  ['x'=>$cx-$dx,'y'=>$cy+$HR,  'color'=>'#0D9488','label'=>'Eng','icon'=>'code'],
  ['x'=>$cx-$dx,'y'=>$cy-$HR,  'color'=>'#2563EB','label'=>'UX', 'icon'=>'palette'],
];
ob_start(); ?>
<svg class="ev-svg ev-dedicated ev-ded-hex" viewBox="60 30 360 220" preserveAspectRatio="xMidYMid meet" aria-hidden="true">
  <rect x="60" y="30" width="360" height="220" rx="20" fill="#F8FAFC"/>
  <g class="ev-hex-links">
    <?php foreach($ring as $hi=>$h): ?>
    <line class="ev-hex-link" style="--hi:<?php echo $hi; ?>"
      x1="<?php echo $cx; ?>" y1="<?php echo $cy; ?>"
      x2="<?php echo round($h['x'],1); ?>" y2="<?php echo round($h['y'],1); ?>"
      stroke="<?php echo esc_attr($h['color']); ?>" stroke-width="1.4" stroke-linecap="round" stroke-opacity="0.6"/>
    <?php endforeach; ?>
  </g>
  <g class="ev-hex-ring">
    <?php foreach($ring as $hi=>$h):
      $fx=round(($h['x']-$cx)*3.6,1);
      $fy=round(($h['y']-$cy)*3.6,1);
    ?>
    <g class="ev-hex-cell" style="--hi:<?php echo $hi; ?>;--fx:<?php echo $fx; ?>px;--fy:<?php echo $fy; ?>px">
      <path d="<?php echo hex_path($h['x'],$h['y'],$HR-2); ?>" fill="<?php echo esc_attr($h['color']); ?>"/>
      <g transform="translate(<?php echo round($h['x'],1); ?>,<?php echo round($h['y'],1)-2; ?>)"><?php echo hex_icon($h['icon']); ?></g>
      <text x="<?php echo round($h['x'],1); ?>" y="<?php echo round($h['y'],1)+12; ?>" text-anchor="middle" font-family="Outfit,sans-serif" font-size="8" font-weight="600" fill="#fff"><?php echo esc_html($h['label']); ?></text>
    </g>
    <?php endforeach; ?>
  </g>
  <g class="ev-hex-center">
    <path d="<?php echo hex_path($cx,$cy,$HR-2); ?>" fill="#DC2626"/>
    <circle cx="<?php echo $cx; ?>" cy="<?php echo $cy-5; ?>" r="5" fill="#fff"/>
    <path d="M <?php echo $cx-10; ?> <?php echo $cy+10; ?> a 10 7 0 0 1 20 0" fill="#fff"/>
  </g>
</svg>
<?php $visual_dedicated=ob_get_clean();

/* ── Visual 03 — Outsourcing Brief ────────────────────── */
$lx=110; $rx=370; $my=160;
ob_start(); ?>
<svg class="ev-svg ev-outsource ev-out-brief" viewBox="0 0 480 280" aria-hidden="true">
  <rect x="20" y="22" width="440" height="236" rx="20" fill="#F8FAFC"/>
  <!-- TechnBrains (right) -->
  <circle cx="<?php echo $rx; ?>" cy="<?php echo $my-22; ?>" r="14" fill="#111827"/>
  <path d="M <?php echo $rx-22; ?> <?php echo $my+18; ?> a 22 22 0 0 1 44 0 v 6 h -44 z" fill="#111827"/>
  <!-- Client (left) -->
  <circle cx="<?php echo $lx; ?>" cy="<?php echo $my-22; ?>" r="14" fill="#DC2626"/>
  <path d="M <?php echo $lx-22; ?> <?php echo $my+18; ?> a 22 22 0 0 1 44 0 v 6 h -44 z" fill="#DC2626"/>
  <text x="<?php echo $lx; ?>" y="<?php echo $my+36; ?>" text-anchor="middle" font-family="Outfit,sans-serif" font-size="9" font-weight="600" fill="#DC2626" letter-spacing="0.1em">CLIENT</text>
  <text x="<?php echo $rx; ?>" y="<?php echo $my+36; ?>" text-anchor="middle" font-family="Outfit,sans-serif" font-size="9" font-weight="600" fill="#111827" letter-spacing="0.1em">TECHNBRAINS</text>
  <!-- Brief doc -->
  <g class="ev-brief-doc" style="--from-x:<?php echo $lx+28; ?>px;--to-x:<?php echo $rx-28; ?>px;--y:<?php echo $my-4; ?>px">
    <rect x="-10" y="-13" width="20" height="26" rx="2" fill="#fff" stroke="#111827" stroke-width="1.2"/>
    <line x1="-6" y1="-7" x2="6" y2="-7" stroke="#94A3B8" stroke-width="1"/>
    <line x1="-6" y1="-3" x2="6" y2="-3" stroke="#94A3B8" stroke-width="1"/>
    <line x1="-6" y1="1"  x2="3" y2="1"  stroke="#94A3B8" stroke-width="1"/>
    <circle cx="6" cy="-11" r="3" fill="#DC2626"/>
    <text x="0" y="22" text-anchor="middle" font-family="Outfit,sans-serif" font-size="8" font-weight="600" fill="#111827" letter-spacing="0.08em">SCOPE BRIEF</text>
  </g>
  <!-- Build phase -->
  <g class="ev-brief-build" transform="translate(<?php echo $rx; ?> <?php echo $my-60; ?>)">
    <g class="ev-brief-gear" transform="translate(-18 0)">
      <circle r="10" fill="none" stroke="#0D9488" stroke-width="1.6"/>
      <circle r="3" fill="#0D9488"/>
      <?php for($gi=0;$gi<6;$gi++):
        $ga=M_PI/3*$gi;
        $gx1=round(cos($ga)*10,2); $gy1=round(sin($ga)*10,2);
        $gx2=round(cos($ga)*14,2); $gy2=round(sin($ga)*14,2);
      ?><line x1="<?php echo $gx1; ?>" y1="<?php echo $gy1; ?>" x2="<?php echo $gx2; ?>" y2="<?php echo $gy2; ?>" stroke="#0D9488" stroke-width="2.4" stroke-linecap="round"/>
      <?php endfor; ?>
    </g>
    <g class="ev-brief-code" transform="translate(14 0)">
      <rect x="-12" y="-9" width="24" height="18" rx="2" fill="#111827"/>
      <path d="M -6 -3 L -8 0 L -6 3" stroke="#0D9488" stroke-width="1.4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M 6 -3 L 8 0 L 6 3"  stroke="#0D9488" stroke-width="1.4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M 2 -5 L -2 5" stroke="#fff" stroke-width="1.2" stroke-linecap="round"/>
    </g>
    <text x="0" y="24" text-anchor="middle" font-family="Outfit,sans-serif" font-size="8" font-weight="600" fill="#0D9488" letter-spacing="0.08em">BUILDING</text>
  </g>
  <!-- Finished window -->
  <g class="ev-brief-window" style="--from-x:<?php echo $rx-28; ?>px;--to-x:<?php echo $lx+28; ?>px;--y:<?php echo $my-4; ?>px">
    <rect x="-22" y="-15" width="44" height="30" rx="3" fill="#fff" stroke="#111827" stroke-width="1.3"/>
    <rect x="-22" y="-15" width="44" height="6" rx="3" fill="#111827"/>
    <circle cx="0" cy="2" r="7" fill="none" stroke="#0D9488" stroke-width="1.6"/>
    <path d="M -3 2 L -0.5 4.5 L 4 0" stroke="#0D9488" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
    <text x="0" y="26" text-anchor="middle" font-family="Outfit,sans-serif" font-size="8" font-weight="600" fill="#0D9488" letter-spacing="0.08em">DELIVERED</text>
  </g>
  <!-- Phase bar -->
  <g transform="translate(0 <?php echo $my+70; ?>)">
    <text x="<?php echo $lx+28; ?>" y="-6" font-family="Outfit,sans-serif" font-size="8" font-weight="600" fill="#64748B" letter-spacing="0.08em">SCOPE</text>
    <text x="<?php echo ($lx+$rx)/2; ?>" y="-6" text-anchor="middle" font-family="Outfit,sans-serif" font-size="8" font-weight="600" fill="#64748B" letter-spacing="0.08em">BUILD</text>
    <text x="<?php echo $rx-28; ?>" y="-6" text-anchor="end" font-family="Outfit,sans-serif" font-size="8" font-weight="600" fill="#64748B" letter-spacing="0.08em">HANDOVER</text>
    <line x1="<?php echo $lx+28; ?>" y1="0" x2="<?php echo $rx-28; ?>" y2="0" stroke="#E5E7EB" stroke-width="2" stroke-linecap="round"/>
    <line class="ev-brief-progress"
      x1="<?php echo $lx+28; ?>" y1="0" x2="<?php echo $lx+28; ?>" y2="0"
      stroke="#2563EB" stroke-width="2" stroke-linecap="round"
      style="--brief-from-x:<?php echo $lx+28; ?>;--brief-to-x:<?php echo $rx-28; ?>"/>
  </g>
</svg>
<?php $visual_outsourcing=ob_get_clean();

$visuals=['staff'=>$visual_staff,'dedicated'=>$visual_dedicated,'outsourcing'=>$visual_outsourcing];
?>
<section class="section engage engage-v3" id="engage" data-screen-label="09 Engagement">
  <div class="container">
    <div class="section-head">
      <div class="section-intro">
        <h2>How we work with your team</h2>
        <p class="engage-intro-p">Each model defines how delivery is handled, who owns execution, and how teams are structured across your project.</p>
      </div>
    </div>
    <div class="ev-layout">
             <!-- <div class="ev-accordion" role="tablist" data-engage-accordion> -->
      <div class="ev-accordion" data-engage-accordion>
        <?php foreach($cards as $i=>$c): ?>
        <div class="ev-row <?php echo $i===0?'is-open':''; ?>" data-ev-row="<?php echo (int)$i; ?>">
          <button type="button" class="ev-row-head" aria-expanded="<?php echo $i===0?'true':'false'; ?>">
            <span class="ev-row-num"><?php echo esc_html($c['num']); ?></span>
            <span class="ev-row-title"><?php echo esc_html($c['title']); ?></span>
            <span class="ev-row-chev" aria-hidden="true"><svg viewBox="0 0 16 16" width="16" height="16"><path d="M4 6 L8 10 L12 6" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </button>
          <div class="ev-row-body">
            <div class="ev-row-body-inner">
              <p class="ev-row-desc"><?php echo esc_html($c['desc']); ?></p>
              <ul class="ev-row-bullets">
                <?php foreach($c['bullets'] as $b): ?>
                <li><span class="ev-bullet-dot" aria-hidden="true"></span><?php echo esc_html($b); ?></li>
                <?php endforeach; ?>
              </ul>
              <a class="ev-row-cta" href="<?php echo esc_url($c['url']); ?>">Learn more <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="ev-stage" aria-hidden="true">
        <div class="ev-stage-frame">
          <?php foreach($cards as $i=>$c): ?>
          <div class="ev-visual-panel <?php echo $i===0?'is-active':''; ?>" data-ev-panel="<?php echo (int)$i; ?>">
            <?php echo $visuals[$c['scene']]??''; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
