<?php
/**
 * Exit-intent popup — exact match to ExitPopup.jsx
 * Layout: right-info (dark bg panel) | left-info (form panel)
 *
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;

$assets   = get_stylesheet_directory_uri() . '/assets/images';
$site_key = get_option( 'tnb_recaptcha_site_key', '' );
?>

<div id="tnb-exit-popup-overlay" class="tnb-exit-popup-overlay" role="dialog" aria-modal="true" aria-label="Get your free quote" hidden>
  <div class="tnb-exit-popup-inner new-main-popup form-service">

    <button class="tnb-exit-popup-close" data-exit-popup-close aria-label="Close modal" type="button">
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" aria-label="Close modal" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M289.94 256l95-95A24 24 0 00351 127l-95 95-95-95a24 24 0 00-34 34l95 95-95 95a24 24 0 1034 34l95-95 95 95a24 24 0 0034-34z"></path></svg>
    </button>

    <div class="popup-grid exit-popup-grid">

      <!-- RIGHT-INFO: dark background panel (matches .right-info in JSX) -->
      <div class="right-info exit-right-panel" style="background-image:url('<?php echo esc_url( $assets . '/popup-bg-black.webp' ); ?>')">
        <div class="headBox">
          <h3>Still deciding on your next step?</h3>
          <p>Tell us what you're planning, and we'll help you understand scope, cost, and timeline.</p>
        </div>
        <div class="imgBox">
          <img
            src="<?php echo esc_url( $assets . '/ex-popup.webp' ); ?>"
            width="356"
            height="338"
            alt="Exit popup illustration"
            loading="lazy"
          >
        </div>
      </div>

      <!-- LEFT-INFO: form panel (matches .left-info in JSX) -->
      <div class="left-info exit-left-panel">
        <h3>Get Your Free Quote</h3>
        <p>Our experts can help you turn early ideas into a practical execution plan.</p>

        <form id="tnb-exit-popup-form" class="new-form popup-main-form" novalidate aria-label="Get your free quote">
          <?php wp_nonce_field( 'tnb_exit_popup_form', 'tnb_exit_popup_nonce' ); ?>
          <?php tnb_honeypot_field(); ?>

          <!-- Name + Phone row -->
          <div class="formRow">
            <div class="inputField">
              <label for="exit-name">Full name</label>
              <input type="text" id="exit-name" name="firstName" placeholder="Jane Smith" autocomplete="name" required>
            </div>
            <div class="inputField">
              <label for="exit-phone">Phone Number <small>(optional)</small></label>
              <input type="tel" id="exit-phone" name="cnumber" placeholder="+1 234 567 8900" autocomplete="tel">
            </div>
          </div>

          <!-- Email -->
          <div class="inputField">
            <label for="exit-email">Email</label>
            <input type="email" id="exit-email" name="cemail" placeholder="jane@company.com" autocomplete="email" required>
          </div>

          <!-- Project details -->
          <div class="inputField">
            <label for="exit-message">Project details <small>(optional)</small></label>
            <div class="textareaWrapper">
              <textarea id="exit-message" name="message" placeholder="Describe your project, requirements or any specific challenges..." rows="4"></textarea>
            </div>
          </div>

          <input type="hidden" name="serviceType" value="">

          <div id="tnb-exit-popup-form-msg" aria-live="polite"></div>

          <?php tnb_recaptcha_field(); ?>

          <div class="btnRow">
            <button type="submit" class="submitBtn" id="tnb-exit-popup-submit">Start Your Project</button>
          </div>

        </form>
      </div>

    </div><!-- .popup-grid -->
  </div><!-- .tnb-exit-popup-inner -->
</div><!-- #tnb-exit-popup-overlay -->
