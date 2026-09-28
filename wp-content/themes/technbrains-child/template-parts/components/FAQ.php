<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$faqs=$data['faqs']??[];
?>
<section class="section faq" data-screen-label="16 FAQ" data-faq-group="homepage">
  <div class="container">
    <div class="faq-grid">
      <div class="faq-intro">
        <h2 class="faq-title">Frequently Asked Questions</h2>
        <p class="faq-sub">Common questions about cost, timelines, hiring vs. outsourcing, onboarding, and security.</p>
      </div>
      <div class="faq-list">
        <?php foreach($faqs as $i=>$f): ?>
        <div class="faq-item <?php echo $i===0?'open':''; ?>">
          <button class="faq-q" aria-expanded="<?php echo $i===0?'true':'false'; ?>">
            <span><?php echo esc_html($f['q']); ?></span>
            <span class="faq-toggle" aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14"><path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </button>
          <div class="faq-a"><p><?php echo esc_html($f['a']); ?></p></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
