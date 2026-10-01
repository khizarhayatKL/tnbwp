<?php

/**
 * Footer component — pixel-perfect match to Figma node 79:233.
 * Nav columns managed via Appearance → Menus in WP Dashboard.
 *
 * @package technbrains-child
 */
defined('ABSPATH') || exit;

$img_base = get_stylesheet_directory_uri() . '/assets/images';
$year     = date('Y');
?>
<footer class="footer" aria-label="Site footer">

  <!--
    .footer-inner is the single CSS Grid container.
    Grid areas:  "card nav"
                 ".    bar"
    The bar (privacy / copyright / social) sits ONLY under the nav columns,
    matching the Figma layout exactly.
  -->
  <div class="container-fluid footer-inner">

    <!-- ══════════════════════════════════════════════════
         LEFT CARD
    ══════════════════════════════════════════════════ -->
    <div class="footer-card">

      <!-- Brand -->
      <div class="footer-brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="TechnBrains — Home">
          <img
            src="<?php echo esc_url($img_base . '/logo.svg'); ?>"
            alt="TechnBrains"
            width="236"
            height="44"
            loading="lazy">
        </a>
        <p>A software development company that helps businesses build digital products and scale teams with pre-vetted senior developers.</p>
      </div>

      <!-- Offices -->
      <div class="footer-offices">
        <span class="footer-offices-h">Our Offices</span>

        <div class="footer-offices-cols">
          <!-- Dallas (HQ) — two separate <p> matching Figma node structure -->
          <address class="footer-office">
            <div class="footer-office-city-wrap">
              <p class="footer-office-city">Dallas</p>
              <p class="footer-office-hq">Headquarters</p>
            </div>
            <p class="footer-office-addr">15305 Dallas Pkwy, 12th Floor, Suite 1257, Addison, TX 75001 · USA</p>
          </address>

          <!-- New York -->
          <address class="footer-office">
            <div class="footer-office-city-wrap">
              <p class="footer-office-city">New York</p>
            </div>
            <p class="footer-office-addr">165 Broadway Suite # 1007, 23rd Floor, New York, NY 10006, USA</p>
          </address>
        </div>

        <!-- Contact info with red icon badges (icons from Figma) -->
        <div class="footer-contacts">
          <a href="tel:+18338886032" class="footer-contact">
            <span class="footer-contact-badge" aria-hidden="true">
              <img src="<?php echo esc_url($img_base . '/revamp/icons/footer-icon-phone.svg'); ?>" width="10" height="10" alt="">
            </span>
            <span>+1 (833) 888-6032</span>
          </a>
          <a href="mailto:contact@technbrains.com" class="footer-contact">
            <span class="footer-contact-badge" aria-hidden="true">
              <img src="<?php echo esc_url($img_base . '/revamp/icons/footer-icon-email.svg'); ?>" width="10" height="10" alt="">
            </span>
            <span>contact@technbrains.com</span>
          </a>
        </div>
      </div><!-- /.footer-offices -->

      <!-- Get In Touch CTA -->
      <div class="footer-cta">
        <span class="footer-cta-h">Get In Touch.</span>
        <div class="footer-cta-row">
          <a href="/contact-us/" class="footer-btn footer-btn--outline" data-popup="contact">Contact Us</a>
          <button type="button" class="footer-btn footer-btn--fill" onclick="var t=document.getElementById('tnb-calendar-trigger');if(t)t.click();">Schedule a Call</button>
        </div>
      </div>

    </div><!-- /.footer-card -->


    <!-- ══════════════════════════════════════════════════
         RIGHT COLUMN — nav + bar, same height as card
    ══════════════════════════════════════════════════ -->
    <div class="footer-right">

      <nav class="footer-nav" aria-label="Footer navigation">

        <div class="footer-nav-col">
          <span class="footer-nav-h">Hire Developers</span>
          <?php wp_nav_menu(['theme_location' => 'footer-hire',       'container' => false, 'menu_class' => 'footer-nav-list', 'depth' => 1, 'fallback_cb' => false]); ?>
        </div>

        <!-- Services + Platforms share one column (two stacked groups) -->
        <div class="footer-nav-col">
          <span class="footer-nav-h">Services</span>
          <?php wp_nav_menu(['theme_location' => 'footer-services',   'container' => false, 'menu_class' => 'footer-nav-list', 'depth' => 1, 'fallback_cb' => false]); ?>
          <span class="footer-nav-h footer-nav-h--sub">Platforms</span>
          <?php wp_nav_menu(['theme_location' => 'footer-platforms',  'container' => false, 'menu_class' => 'footer-nav-list', 'depth' => 1, 'fallback_cb' => false]); ?>
        </div>

        <div class="footer-nav-col">
          <span class="footer-nav-h">Engagement Models</span>
          <?php wp_nav_menu(['theme_location' => 'footer-engagement', 'container' => false, 'menu_class' => 'footer-nav-list', 'depth' => 1, 'fallback_cb' => false]); ?>
        </div>

        <div class="footer-nav-col">
          <span class="footer-nav-h">Industries</span>
          <?php wp_nav_menu(['theme_location' => 'footer-industries', 'container' => false, 'menu_class' => 'footer-nav-list', 'depth' => 1, 'fallback_cb' => false]); ?>
        </div>

        <div class="footer-nav-col">
          <span class="footer-nav-h">Locations</span>
          <?php wp_nav_menu(['theme_location' => 'footer-locations',  'container' => false, 'menu_class' => 'footer-nav-list', 'depth' => 1, 'fallback_cb' => false]); ?>
        </div>

        <div class="footer-nav-col">
          <span class="footer-nav-h">Resources</span>
          <?php wp_nav_menu(['theme_location' => 'footer-resources',  'container' => false, 'menu_class' => 'footer-nav-list', 'depth' => 1, 'fallback_cb' => false]); ?>
        </div>

      </nav><!-- /.footer-nav -->


      <!-- ══════════════════════════════════════════════════
         BOTTOM BAR — grid-area: bar
         Sits ONLY under the nav columns, not under the card.
    ══════════════════════════════════════════════════ -->
      <div class="footer-bar" role="contentinfo">
        <div class="copyright-sec">
          <a href="<?php echo esc_url(home_url('/terms-and-conditions/')); ?>" class="footer-bar__privacy">
            Terms & Conditions
          </a>
			<a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="footer-bar__privacy">
            Privacy Policy
          </a>|

          <p class="footer-bar__copy">
            &copy; <?php echo esc_html($year); ?> TechnBrains. All rights reserved.
          </p>
        </div>

        <ul class="footer-bar__social" aria-label="Follow us on social media">
          <li>
            <a href="https://www.facebook.com/technbrains/" class="footer-bar__social-icon" aria-label="Follow us on Facebook" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url($img_base . '/revamp/icons/social-facebook.svg'); ?>" width="8" height="15" alt="" aria-hidden="true">
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/technbrains/" class="footer-bar__social-icon" aria-label="Follow us on Instagram" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url($img_base . '/revamp/icons/social-instagram.svg'); ?>" width="15" height="15" alt="" aria-hidden="true">
            </a>
          </li>
          <li>
            <a href="https://www.linkedin.com/company/technbrains" class="footer-bar__social-icon" aria-label="Connect on LinkedIn" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url($img_base . '/revamp/icons/social-linkedin.svg'); ?>" width="13" height="13" alt="" aria-hidden="true">
            </a>
          </li>
          <li>
            <a href="https://x.com/technbrains" class="footer-bar__social-icon" aria-label="Follow us on X (Twitter)" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url($img_base . '/revamp/icons/social-x.svg'); ?>" width="14" height="16" alt="" aria-hidden="true">
            </a>
          </li>
          <li>
            <a href="https://www.pinterest.com/technbrains/" class="footer-bar__social-icon" aria-label="Follow us on Pinterest" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url($img_base . '/revamp/icons/pin.svg'); ?>" width="16" height="16" alt="" aria-hidden="true">
            </a>
          </li>
          <li>
            <a href="https://www.youtube.com/@TechnBrainsofficial" class="footer-bar__social-icon" aria-label="Subscribe on YouTube" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url($img_base . '/revamp/icons/yt.svg'); ?>" width="14" height="10" alt="" aria-hidden="true">
            </a>
          </li>
        </ul>

      </div><!-- /.footer-bar -->

    </div><!-- /.footer-right -->

  </div><!-- /.footer-inner -->

</footer>