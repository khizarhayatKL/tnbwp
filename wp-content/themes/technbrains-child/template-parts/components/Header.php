<?php

/**
 * Header component — matches Next.js RevampComponents/Header.
 * Nav: Hire Developers · Services · Industries · Case Studies · About · Blogs
 *
 * @package technbrains-child
 */
defined('ABSPATH') || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$nav = $img . '/new-navigation';

/* ── Reusable inline SVG icons ─────────────────────────────────────────── */
$chev   = '<svg class="hp-chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>';
$rchev  = '<svg class="hp-rchev" viewBox="0 0 6 10" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="1 1 5 5 1 9"/></svg>';
$rarrow = '<svg class="hp-rarrow" viewBox="0 0 12 10" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="1" y1="5" x2="11" y2="5"/><polyline points="7 1 11 5 7 9"/></svg>';

/* Circle-wrapped chevron (cards, view-all arrow) */
$cc  = '<span class="hp-chev-c">' . $rchev . '</span>';

/* View-All arrow circle */
$vaa = '<span class="hp-va-arrow">' . $rchev . '</span>';

/* Office icon wrappers */
$ico_bld = '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="15" rx="1"/><path d="M8 7V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v3"/></svg>';
$ico_tel = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 15a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.56 4h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8 10.91a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';
$ico_env = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>';
$ico_pls = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>';
?>

<nav id="hp-nav" aria-label="Main navigation">

  <!-- Logo -->
  <div class="hp-logo">
    <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="TechnBrains &#8212; Home">
      <img
        src="<?php echo esc_url($img . '/logo.svg'); ?>"
        alt="TechnBrains"
        width="213"
        height="40"
        loading="eager"
        fetchpriority="high">
    </a>
  </div>

  <ul class="hp-links" role="menubar">

    <!-- ═══ HIRE DEVELOPERS ═══════════════════════════════════════════════ -->
    <li role="none">
      <a href=" /hire-software-developers/" onclick="return false;" role="menuitem" aria-haspopup="true" aria-expanded="false">
        Hire Developers<?php echo $chev; ?>
      </a>
      <div class="hp-drop hp-drop-hire">
        <div class="hp-mm">

          <div class="hp-mi-left">
            <span class="hp-drop-title">Hire Experienced Engineering Talent</span>
            <p class="hp-drop-sub">Access the top 3% of engineers to accelerate delivery, improve execution quality, and extend your product team.</p>
            <ul class="hp-tabs" data-group="hire">
              <li class="hp-tab hp-tab--active" data-target="hire-mobile">Mobile Developers</li>
              <li class="hp-tab" data-target="hire-frontend">Frontend Developers</li>
              <li class="hp-tab" data-target="hire-backend">Backend Developers</li>
            </ul>
          </div>

          <span class="hp-vdivider" aria-hidden="true"></span>

          <div class="hp-mi-right">

            <div class="hp-panel" id="hp-hire-mobile">
              <div class="hp-panel-head">
                <span class="hp-panel-badge"><img src="<?php echo esc_url($nav . '/hire-developers/mob-1.png'); ?>" width="52" height="52" alt="Mobile Developers"></span>
                <span class="hp-panel-label">Mobile Developers</span>
              </div>
              <span class="hp-panel-rule" aria-hidden="true"></span>
              <div class="hp-role-grid">
                <a href="<?php echo esc_url(home_url('/hire-ios-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire iOS Developer</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/hire-react-native-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire React Native Developer</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/hire-android-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire Android Developer</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/hire-swift-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire Swift Developer</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/hire-flutter-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire Flutter Developer</span><?php echo $cc; ?></a>
              </div>
            </div>

            <div class="hp-panel hp-panel--hidden" id="hp-hire-frontend"></div>
            <template id="tpl-hire-frontend">
              <div class="hp-panel-head">
                <span class="hp-panel-badge"><img src="<?php echo esc_url($nav . '/hire-developers/mob-2.png'); ?>" width="52" height="52" alt=""></span>
                <span class="hp-panel-label">Frontend Developers</span>
              </div>
              <span class="hp-panel-rule" aria-hidden="true"></span>
              <div class="hp-role-grid">
                <a href="<?php echo esc_url(home_url('/hire-reactjs-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire ReactJS Developer</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/hire-javascript-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire JavaScript Developer</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/hire-angularjs-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire AngularJS Developer</span><?php echo $cc; ?></a>
              </div>
            </template>

            <div class="hp-panel hp-panel--hidden" id="hp-hire-backend"></div>
            <template id="tpl-hire-backend">
              <div class="hp-panel-head">
                <span class="hp-panel-badge"><img src="<?php echo esc_url($nav . '/hire-developers/mob-3.png'); ?>" width="52" height="52" alt=""></span>
                <span class="hp-panel-label">Backend Developers</span>
              </div>
              <span class="hp-panel-rule" aria-hidden="true"></span>
              <div class="hp-role-grid">
                <a href="<?php echo esc_url(home_url('/hire-nodejs-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire NodeJS Developer</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/hire-laravel-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire Laravel Developer</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/hire-python-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire Python Developer</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/hire-java-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire Java Developer</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/hire-php-developer/')); ?>" class="hp-role-card"><span class="hp-card-label">Hire PHP Developer</span><?php echo $cc; ?></a>
              </div>
            </template>
            <a href="<?php echo esc_url(home_url('/hire-software-developers/')); ?>" class="hp-view-all"><span>Hire Software Developers</span><?php echo $vaa; ?></a>

          </div>
        </div>
      </div>
    </li>

    <!-- ═══ SERVICES ═════════════════════════════════════════════════════ -->
    <li role="none">
      <a href="/services/" onclick="return false;" role="menuitem" aria-haspopup="true" aria-expanded="false">
        Services<?php echo $chev; ?>
      </a>
      <div class="hp-drop hp-drop-svc">
        <div class="hp-mm">

          <div class="hp-mi-left">
            <span class="hp-drop-title">Build Scalable Digital Products</span>
            <p class="hp-drop-sub">With 150+ products delivered globally, end-to-end software development with flexible engagement models built around your needs.</p>
            <ul class="hp-tabs" data-group="svc">
              <li class="hp-tab hp-tab--active" data-target="svc-services">Services</li>
              <li class="hp-tab" data-target="svc-platforms">Platforms</li>
              <li class="hp-tab" data-target="svc-engagement">Engagement Models</li>
              <li class="hp-tab" data-target="svc-emerging">Emerging Technologies &amp; Digital Growth</li>
            </ul>
          </div>

          <span class="hp-vdivider" aria-hidden="true"></span>

          <div class="hp-mi-right">

            <div class="hp-panel" id="hp-svc-services">
              <div class="hp-svc-grid">
                <div class="hp-svc-card">
                  <div class="hp-svc-card-head">
                    <span class="hp-svc-icon"><img src="<?php echo esc_url($nav . '/services/ser-1.png'); ?>" width="42" height="42" alt="Mobile Development"></span>
                    <a href="<?php echo esc_url(home_url('/mobile-app-development/')); ?>" class="hp-svc-head-link" aria-label="Mobile Development"><span class="hp-svc-title">Mobile Development</span><?php echo $cc; ?></a>
                  </div>
                  <div class="hp-svc-links">
                    <a href="<?php echo esc_url(home_url('/android-app-development/')); ?>">Android App Development<span class="hp-sl-arrow"><?php echo $rarrow; ?></span></a>
                    <a href="<?php echo esc_url(home_url('/ios-app-development/')); ?>">iOS App Development<span class="hp-sl-arrow"><?php echo $rarrow; ?></span></a>
                  </div>
                </div>
                <div class="hp-svc-card">
                  <div class="hp-svc-card-head">
                    <span class="hp-svc-icon"><img src="<?php echo esc_url($nav . '/services/ser-2.png'); ?>" width="42" height="42" alt="Custom Software Development"></span>
                    <a href="<?php echo esc_url(home_url('/custom-software-development/')); ?>" class="hp-svc-head-link" aria-label="Custom Software Development"><span class="hp-svc-title">Custom Software Development</span><?php echo $cc; ?></a>
                  </div>
                  <div class="hp-svc-links">
                    <a href="<?php echo esc_url(home_url('/saas-application-development/')); ?>">SaaS<span class="hp-sl-arrow"><?php echo $rarrow; ?></span></a>
                    <a href="<?php echo esc_url(home_url('/enterprise-app-development/')); ?>">Enterprise App Development<span class="hp-sl-arrow"><?php echo $rarrow; ?></span></a>
                  </div>
                </div>
                <div class="hp-svc-card">
                  <div class="hp-svc-card-head">
                    <span class="hp-svc-icon"><img src="<?php echo esc_url($nav . '/services/ser-3.png'); ?>" width="42" height="42" alt="Web Design And Development"></span>
					  <a href="<?php echo esc_url(home_url('/web-development/')); ?>" class="hp-svc-head-link" aria-label="Web Design And Development"><span class="hp-svc-title">Web Design And Development</span><?php echo $cc; ?></a>
                  </div>
                  <div class="hp-svc-links">
                    <a href="<?php echo esc_url(home_url('/web-app-development/')); ?>">Web App Development<span class="hp-sl-arrow"><?php echo $rarrow; ?></span></a>
                    <a href="<?php echo esc_url(home_url('/wordpress-development/')); ?>">WordPress Development<span class="hp-sl-arrow"><?php echo $rarrow; ?></span></a>
                    <a href="<?php echo esc_url(home_url('/ui-ux-design/')); ?>">UI UX Design<span class="hp-sl-arrow"><?php echo $rarrow; ?></span></a>
                  </div>
                </div>
                <div class="hp-svc-card">
                  <div class="hp-svc-card-head">
                    <span class="hp-svc-icon"><img src="<?php echo esc_url($nav . '/services/ser-4.png'); ?>" width="42" height="42" alt="AI Development"></span>
                    <a href="<?php echo esc_url(home_url('/ai-development-services/')); ?>" class="hp-svc-head-link" aria-label="AI Development"><span class="hp-svc-title">AI Development</span><?php echo $cc; ?></a>
                  </div>
                </div>
              </div>
				              <a href="<?php echo esc_url(home_url('/services/')); ?>" class="hp-view-all"><span>View All Services</span><?php echo $vaa; ?></a>
              <!--               <a href="<?php echo esc_url(home_url('/services/')); ?>" class="hp-view-all"><span>View All Services</span><?php echo $vaa; ?></a> -->
            </div>

            <div class="hp-panel hp-panel--hidden" id="hp-svc-platforms"></div>
            <template id="tpl-svc-platforms">
              <div class="hp-flat-grid">
                <div class="hp-flat-col">
                  <a href="<?php echo esc_url(home_url('/platforms/salesforce-consultants/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/plat-1.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Salesforce Consulting</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/platforms/servicenow-services/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/plat-3.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">ServiceNow Services</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/platforms/sitecore-consulting/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/plat-5.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Sitecore Consulting</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/platforms/mulesoft-consulting/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/plat-7.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Mulesoft Integration</span><?php echo $cc; ?></a>
                </div>
                <div class="hp-flat-col">
                  <a href="<?php echo esc_url(home_url('/platforms/power-bi-consulting/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/plat-2.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Power BI Consulting</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/platforms/odoo-development-company/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/plat-4.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Odoo Development</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/platforms/shopify-development-services/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/plat-6.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Shopify</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/platforms/woocommerce-development-company/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/plat-8.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">WooCommerce</span><?php echo $cc; ?></a>
                </div>
              </div>
                            <a href="<?php echo esc_url(home_url('/platforms/')); ?>" class="hp-view-all"><span>View All Platforms</span><?php echo $vaa; ?></a>
            </template>

            <div class="hp-panel hp-panel--hidden" id="hp-svc-engagement"></div>
            <template id="tpl-svc-engagement">
              <div class="hp-flat-grid">
                <div class="hp-flat-col">
                  <a href="<?php echo esc_url(home_url('/staff-augmentation/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/em-1.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Staff Augmentation</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/hire-dedicated-team/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/em-3.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Dedicated Team</span><?php echo $cc; ?></a>
                </div>
                <div class="hp-flat-col">
                  <a href="<?php echo esc_url(home_url('/software-outsourcing/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/em-2.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Software Outsourcing</span><?php echo $cc; ?></a>
                </div>
              </div>
            </template>

            <div class="hp-panel hp-panel--hidden" id="hp-svc-emerging"></div>
            <template id="tpl-svc-emerging">
              <div class="hp-flat-grid">
                <div class="hp-flat-col">
                  <a href="<?php echo esc_url(home_url('/iot-services/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/tech-1.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Internet of Things (IoT)</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/augmented-reality-app-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/tech-2.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Augmented Reality Development</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/blockchain-app-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/tech-3.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Blockchain Development</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/metaverse/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/tech-4.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Metaverse Development</span><?php echo $cc; ?></a>
                </div>
                <div class="hp-flat-col">
                  <a href="<?php echo esc_url(home_url('/cybersecurity/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/tech-5.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Cybersecurity</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/support-maintenance/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/tech-6.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Support &amp; Maintenance</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/seo-services/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/tech-7.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Search Engine Optimization (SEO)</span><?php echo $cc; ?></a>
                  <a href="<?php echo esc_url(home_url('/digital-marketing/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/services/tech-8.png'); ?>" width="42" height="42" alt=""></span><span class="hp-flat-title">Digital Marketing</span><?php echo $cc; ?></a>
                </div>
              </div>
            </template>

          </div>
        </div>
      </div>
    </li>

    <!-- ═══ INDUSTRIES ════════════════════════════════════════════════════ -->
    <li role="none">
      <a href="/industries/" onclick="return false;" role="menuitem" aria-haspopup="true" aria-expanded="false">
        Industries<?php echo $chev; ?>
      </a>
      <div class="hp-drop hp-drop-ind">
        <div class="hp-mm" style="align-items:center;">

          <div class="hp-mi-left">
            <span class="hp-drop-title">Industry-Specific Technology Solutions</span>
            <p class="hp-drop-sub">Engineering leadership and digital systems built for industry-focused challenges and operational efficiency.</p>
          </div>

          <span class="hp-vdivider" aria-hidden="true"></span>

          <div class="hp-mi-right">
            <div class="hp-flat-grid">
              <div class="hp-flat-col">
                <a href="<?php echo esc_url(home_url('/industries/healthcare-app-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/industry/ind-1.png'); ?>" width="42" height="42" alt="Healthcare"></span><span class="hp-flat-title">Healthcare</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/industries/automotive-app-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/industry/ind-3.png'); ?>" width="42" height="42" alt="Automotive"></span><span class="hp-flat-title">Automotive</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/industries/fintech-software-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/industry/ind-5.png'); ?>" width="42" height="42" alt="Fintech"></span><span class="hp-flat-title">Fintech</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/industries/logistics-software-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/industry/ind-7.png'); ?>" width="42" height="42" alt="Logistics"></span><span class="hp-flat-title">Logistics</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/industries/real-estate-app-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/industry/ind-9.png'); ?>" width="42" height="42" alt="Real Estate"></span><span class="hp-flat-title">Real Estate</span><?php echo $cc; ?></a>
              </div>
              <div class="hp-flat-col">
                <a href="<?php echo esc_url(home_url('/industries/on-demand-app-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/industry/ind-2.png'); ?>" width="42" height="42" alt="On-Demand"></span><span class="hp-flat-title">On-Demand</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/industries/education-app-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/industry/ind-4.png'); ?>" width="42" height="42" alt="Education"></span><span class="hp-flat-title">Education</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/industries/energy-management-software-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/industry/ind-6.png'); ?>" width="42" height="42" alt="Energy"></span><span class="hp-flat-title">Energy</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/industries/retail-app-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/industry/ind-8.png'); ?>" width="42" height="42" alt="Retail"></span><span class="hp-flat-title">Retail</span><?php echo $cc; ?></a>
                <a href="<?php echo esc_url(home_url('/construction-software-development/')); ?>" class="hp-flat-card"><span class="hp-flat-icon"><img src="<?php echo esc_url($nav . '/industry/ind-10.png'); ?>" width="42" height="42" alt="Retail"></span><span class="hp-flat-title">Construction</span><?php echo $cc; ?></a>
              </div>
            </div>
                        <a href="<?php echo esc_url(home_url('/industries/')); ?>" class="hp-view-all"><span>View All Industries</span><?php echo $vaa; ?></a>
            <!-- <a href="<?php echo esc_url(home_url('/industries/')); ?>" class="hp-view-all"><span>View All Industries</span><?php echo $vaa; ?></a> -->
          </div>

        </div>
      </div>
    </li>

    <!-- ═══ CASE STUDIES ═════════════════════════════════════════════════ -->
    <li role="none">
      <a href="#" onclick="return false;" role="menuitem" aria-haspopup="true" aria-expanded="false">
        Case Studies<?php echo $chev; ?>
      </a>
      <div class="hp-drop hp-drop-cases">
        <div class="hp-mm" style="align-items:center;">

          <div class="hp-mi-left">
            <span class="hp-drop-title">Impact &amp; Results Delivered</span>
            <p class="hp-drop-sub">Real-world outcomes highlighting improvements in performance, delivery efficiency, and product success.</p>
          </div>

          <span class="hp-vdivider" aria-hidden="true"></span>

          <div class="hp-mi-right" style="display:flow-root;">
           <div class="hp-cs-grid">
              <a href="<?php echo esc_url(home_url('/case-studies/al-rostamani-website-development/')); ?>" class="hp-cs-tile"><span class="hp-cs-box"><img src="<?php echo esc_url($nav . '/case-studies/al-rostamani-website-development-sc.webp'); ?>" alt="Al Rostamani Group" width="120" height="120" loading="lazy"></span><span class="hp-cs-name">Al Rostamani Group</span></a>
              <a href="<?php echo esc_url(home_url('/case-studies/coca-cola-staff-augmentation/')); ?>" class="hp-cs-tile"><span class="hp-cs-box"><img src="<?php echo esc_url($nav . '/case-studies/coca-cola-staff-augmentation-sc.webp'); ?>" alt="Coca-Cola Mobile & Web Development Case Study" width="120" height="120" loading="lazy"></span><span class="hp-cs-name">Coca-Cola</span></a>
              <a href="<?php echo esc_url(home_url('/case-studies/nokia-al-saudia-lms-development/')); ?>" class="hp-cs-tile"><span class="hp-cs-box"><img src="<?php echo esc_url($nav . '/case-studies/nokia-al-saudia-lms-development-sc.webp'); ?>" alt="Nokia Al-Saudia Training Management Platform" width="120" height="120" loading="lazy"></span><span class="hp-cs-name">Nokia Al-Saudia</span></a>
              <a href="<?php echo esc_url(home_url('/case-studies/spruce/')); ?>" class="hp-cs-tile"><span class="hp-cs-box"><img src="<?php echo esc_url($nav . '/case-studies/spruce-sc.webp'); ?>" alt="spruce" width="120" height="120" loading="lazy"></span><span class="hp-cs-name">Spruce</span></a>
              <a href="<?php echo esc_url(home_url('/case-studies/built-by-determination/')); ?>" class="hp-cs-tile"><span class="hp-cs-box"><img src="<?php echo esc_url($nav . '/case-studies/1c.png'); ?>" alt="BuiltByDetermination" width="120" height="120" loading="lazy"></span><span class="hp-cs-name">Built By Determination</span></a>
              <!--<a href="<?php echo esc_url(home_url('/case-studies/preferred-ride/')); ?>" class="hp-cs-tile"><span class="hp-cs-box"><img src="<?php echo esc_url($nav . '/case-studies/preferred-ride-sc.webp'); ?>" alt="Preferred Ride" width="120" height="120" loading="lazy"></span><span class="hp-cs-name">Preferred Ride</span></a>-->
              <a href="<?php echo esc_url(home_url('/case-studies/plate-talk/')); ?>" class="hp-cs-tile"><span class="hp-cs-box"><img src="<?php echo esc_url($nav . '/case-studies/1f.png'); ?>" alt="Plate Talk" width="120" height="120" loading="lazy"></span><span class="hp-cs-name">Plate Talk</span></a>
              <!--<a href="<?php echo esc_url(home_url('/case-studies/pured/')); ?>" class="hp-cs-tile"><span class="hp-cs-box"><img src="<?php echo esc_url($nav . '/case-studies/pured-cs.webp'); ?>" alt="Pure’d" width="120" height="120" loading="lazy"></span><span class="hp-cs-name">Pure’d</span></a>-->
</div>
            <a href="<?php echo esc_url(home_url('/case-studies/')); ?>" class="hp-view-all"><span>View All Case Studies</span><?php echo $vaa; ?></a>
          </div>

        </div>
      </div>
    </li>

    <!-- ═══ ABOUT ══════════════════════════════════════════════════════════ -->
    <li role="none">
      <a href="#" onclick="return false;" role="menuitem" aria-haspopup="true" aria-expanded="false">
        About<?php echo $chev; ?>
      </a>
      <div class="hp-drop hp-drop-about">
        <div class="hp-mm">

          <div class="hp-mi-left">
            <span class="hp-drop-title">Company Overview And Leadership</span>
            <p class="hp-drop-sub">Learn about our mission, expertise, and leadership in building reliable, high-performing digital solutions.</p>
            <ul class="hp-tabs" data-group="about">
              <li class="hp-tab hp-tab--active" data-target="about-us">About Us</li>
              <li class="hp-tab" data-target="about-locations">Locations</li>
              <li class="hp-tab" data-target="about-contact">Contact Us</li>
            </ul>
          </div>

          <span class="hp-vdivider" aria-hidden="true"></span>

          <div class="hp-mi-right">

            <div class="hp-panel" id="hp-about-us">
              <div class="hp-about-wrap">
                <div class="hp-about-card">
                  <span class="hp-about-title">About TechnBrains</span>
                  <p class="hp-about-text">With 12+ years of experience, TechnBrains has been a trusted choice for software development and staff augmentation. Our engineering solutions and expert talent have enabled both Fortune 500 companies and startups to build, scale, and strengthen their digital products.</p>
                  <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="hp-learn-more"><span>Learn more about TechnBrains</span><?php echo $cc; ?></a>
                </div>
              </div>
            </div>

            <div class="hp-panel hp-panel--hidden" id="hp-about-locations"></div>
            <template id="tpl-about-locations">
              <div class="hp-loc-grid">
                <a href="<?php echo esc_url(home_url('/locations/mobile-app-development-company-new-york-city/')); ?>" class="hp-loc-card"><span class="hp-loc-img"><img src="<?php echo esc_url($nav . '/location/loc1.png'); ?>" alt="New York" width="160" height="100" loading="lazy"></span><span class="hp-loc-footer"><span class="hp-loc-name">New York</span><?php echo $cc; ?></span></a>
                <a href="<?php echo esc_url(home_url('/locations/mobile-app-development-company-dallas/')); ?>" class="hp-loc-card"><span class="hp-loc-img"><img src="<?php echo esc_url($nav . '/location/loc2.png'); ?>" alt="Dallas" width="160" height="100" loading="lazy"></span><span class="hp-loc-footer"><span class="hp-loc-name">Dallas</span><?php echo $cc; ?></span></a>
                <a href="<?php echo esc_url(home_url('/locations/mobile-app-development-company-san-antonio/')); ?>" class="hp-loc-card"><span class="hp-loc-img"><img src="<?php echo esc_url($nav . '/location/loc3.png'); ?>" alt="San Antonio" width="160" height="100" loading="lazy"></span><span class="hp-loc-footer"><span class="hp-loc-name">San Antonio</span><?php echo $cc; ?></span></a>
                <a href="<?php echo esc_url(home_url('/locations/mobile-app-development-company-austin/')); ?>" class="hp-loc-card"><span class="hp-loc-img"><img src="<?php echo esc_url($nav . '/location/loc4.png'); ?>" alt="Austin" width="160" height="100" loading="lazy"></span><span class="hp-loc-footer"><span class="hp-loc-name">Austin</span><?php echo $cc; ?></span></a>
                <a href="<?php echo esc_url(home_url('/locations/mobile-app-development-company-houston/')); ?>" class="hp-loc-card"><span class="hp-loc-img"><img src="<?php echo esc_url($nav . '/location/loc5.png'); ?>" alt="Houston" width="160" height="100" loading="lazy"></span><span class="hp-loc-footer"><span class="hp-loc-name">Houston</span><?php echo $cc; ?></span></a>
              </div>
                            <a href="<?php echo esc_url(home_url('/locations/')); ?>" class="hp-view-all"><span>View All Locations</span><?php echo $vaa; ?></a>
            </template>

            <div class="hp-panel hp-panel--hidden" id="hp-about-contact"></div>
            <template id="tpl-about-contact">
              <div class="hp-offices-card">
                <div class="hp-offices-head">
                  <span class="hp-offices-icon"><?php echo $ico_bld; ?></span>
                  <span class="hp-offices-label">Our Offices</span>
                  <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="hp-flat-card" aria-label="Contact our offices"><span class="hp-flat-label screen-reader-text">Contact our offices</span><span class="hp-chev-c"><?php echo $rchev; ?></span></a>
                </div>
                <span class="hp-offices-rule" role="separator"></span>
                <div class="hp-offices-grid">
                  <div class="hp-office">
                    <span class="hp-office-city">Addison, TX (Dallas Metro)</span>
                    <span class="hp-office-note">Headquarters</span>
                    <p class="hp-office-addr">15305 Dallas Pkwy, 12th Floor, Suite 1257, Addison, TX 75001 &#183; USA</p>
                    <a href="tel:+18338886032" class="hp-office-line"><span class="hp-line-icon"><?php echo $ico_tel; ?></span> +1 (833) 888-6032</a>
                    <a href="mailto:contact@technbrains.com" class="hp-office-line"><span class="hp-line-icon"><?php echo $ico_env; ?></span> Contact@technbrains.com</a>
                  </div>
                  <div class="hp-office">
                    <span class="hp-office-city">New York</span>
                   <p class="hp-office-addr mt-4">165 Broadway Suite # 1007, 23rd Floor, New York, NY 10006, USA</p>

                  </div>
                </div>
              </div>
            </template>

          </div>
        </div>
      </div>
    </li>

    <!-- ═══ BLOGS ═════════════════════════════════════════════════════════ -->
    <li role="none">
      <a href="#" onclick="return false;" role="menuitem" aria-haspopup="true" aria-expanded="false">
        Blogs<?php echo $chev; ?>
      </a>
      <div class="hp-drop hp-drop-blogs">
        <div class="hp-mm" style="align-items:center;">

          <div class="hp-mi-left">
            <span class="hp-drop-title">Engineering And Technology Insights</span>
            <p class="hp-drop-sub">Insights on modern engineering, product development, and scaling engineering teams.</p>
          </div>

          <span class="hp-vdivider" aria-hidden="true"></span>

          <div class="hp-mi-right" style="display:flow-root;">
            <div class="hp-blog-grid">
              <?php
              // Sitewide query (this menu renders on every non-lp_hero page) — runs uncached.
              $hp_blogs = new WP_Query(array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'no_found_rows'  => true,
              ));
              $hp_blogs_data = array();
              while ($hp_blogs->have_posts()) : $hp_blogs->the_post();
                $hp_blogs_data[] = array(
                  'permalink' => get_permalink(),
                  'title'     => get_the_title(),
                  'thumb'     => get_the_post_thumbnail_url(get_the_ID(), array(320, 200)),
                );
              endwhile;
              wp_reset_postdata();
              foreach ($hp_blogs_data as $hp_blog) :
              ?>
                <a href="<?php echo esc_url($hp_blog['permalink']); ?>" class="hp-blog-card">
                  <?php if ($hp_blog['thumb']) : ?>
                    <span class="hp-blog-img"><img src="<?php echo esc_url($hp_blog['thumb']); ?>" alt="<?php echo esc_attr($hp_blog['title']); ?>" width="320" height="200" loading="lazy"></span>
                  <?php endif; ?>
                  <span class="hp-blog-title"><?php echo esc_html($hp_blog['title']); ?></span>
                </a>
              <?php endforeach; ?>
            </div>
            <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="hp-view-all"><span>View All Blogs</span><?php echo $vaa; ?></a>
          </div>

        </div>
      </div>
    </li>

  </ul>

  <!-- CTA — unchanged -->
  <div class="hp-cta">
    <button type="button" class="hp-btn tnb-popup-trigger">Start Your Project</button>
  </div>

</nav>