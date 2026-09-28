<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$dq=$data['decision']??[];
$results_json=wp_json_encode($dq['results']??[]);
$step1_json=wp_json_encode($dq['step1_options']??[]);
$step2_json=wp_json_encode($dq['step2_options']??[]);
?>
<section class="section dq" data-screen-label="10 Decision"
  data-quiz="decision"
  data-dq-step1="<?php echo esc_attr($step1_json); ?>"
  data-dq-step2="<?php echo esc_attr($step2_json); ?>"
  data-dq-results="<?php echo esc_attr($results_json); ?>">
  <div class="dq-inner">
    <div class="dq-head">
      <h2 class="dq-h2 dq-h2-single">Find The Right<br>Setup For Your Project</h2>
      <p class="dq-sub dq-sub-single">Answer two quick questions and we'll point you to the engagement model that fits your situation best.</p>
    </div>
    <div class="dq-card">
      <div class="dq-progress" aria-hidden="true"><div class="dq-progress-bar"></div></div>
      <div class="dq-right-inner" data-dq-inner></div>
    </div>
  </div>
  <?php /*
   * CSS sentinel — WP Rocket RUCSS crawls the page with a headless browser and
   * runs JS, but never interacts with the quiz. Only step-1 classes appear in the
   * live DOM during the crawl; step-2, calc, and result-step classes are never
   * rendered, so RUCSS marks them unused and strips them from the optimised CSS
   * delivered to logged-out users.
   *
   * Placing every JS-injected class in this hidden element ensures RUCSS sees
   * them as present and retains the corresponding CSS rules. The element is fully
   * inert: display:none (never rendered), aria-hidden (skipped by screen-readers),
   * data-dq-sentinel (queryable for debugging).
   */ ?>
  <div aria-hidden="true" style="display:none!important" data-dq-sentinel>
    <button class="dq-back"></button>
    <div class="dq-stage is-exit dq-forward"></div>
    <div class="dq-stage is-exit dq-back"></div>
    <div class="dq-calc"><span class="dq-calc-text"></span></div>
    <div class="dq-result">
      <h3 class="dq-result-name"></h3>
      <p class="dq-result-summary"></p>
      <div class="dq-result-blocktitle"></div>
      <ul class="dq-result-bullets"><li><span class="dq-tick"></span></li></ul>
      <div class="dq-result-ctas">
        <span class="dq-cta dq-cta-black"></span>
        <span class="dq-cta dq-cta-outline"></span>
      </div>
      <button class="dq-restart"></button>
    </div>
    <button class="dq-option is-active"><span class="dq-option-label"></span><span class="dq-option-arrow"></span></button>
  </div>
</section>
