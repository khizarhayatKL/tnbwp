<?php defined('ABSPATH')||exit; ?>
<section class="section collab" id="final" data-screen-label="14 Collaborate">
  <div class="container">
    <div class="collab-grid">
      <div class="collab-intro">
        <div class="collab-intro-inner">
          <h2 class="collab-title">Let's build what's<br>next, together</h2>
          <p class="collab-sub">Tell us about your product, your team, or the problem you're trying to solve. We'll respond within 24 hours with a clear next step, no sales runaround, just a direct conversation with the engineers who'd run your work.</p>
<!--           <div class="collab-trust"><span class="collab-trust-dot"></span><span>Response within 24 hours · Free 30-min discovery call · NDA-ready</span></div> -->
          <ul class="collab-contacts">
            <li>
              <span class="collab-contact-icon"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
              <div><div class="collab-contact-label">Headquarters</div><span class="collab-contact-val">15305 Dallas Pkwy, 12th Floor, Suite 1257<br>Addison, TX 75001 · USA</span></div>
            </li>
            <li>
              <span class="collab-contact-icon"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
              <div><div class="collab-contact-label">Call us</div><a href="tel:+18338886032" class="collab-contact-val collab-contact-val-link">+1 (833) 888-6032</a></div>
            </li>
            <li>
              <span class="collab-contact-icon"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
              <div><div class="collab-contact-label">Email us</div><a href="mailto:contact@technbrains.com" class="collab-contact-val collab-contact-val-link">contact@technbrains.com</a></div>
            </li>
          </ul>
        </div>
      </div>

      <form id="tnb-collab-form" class="collab-form" novalidate aria-label="Contact form">
        <?php wp_nonce_field( 'tnb_collab_form', 'tnb_collab_nonce' ); ?>
        <?php tnb_honeypot_field(); ?>

        <div class="collab-row">
          <div class="collab-field">
            <label for="collab-name">Full name</label>
            <input type="text" id="collab-name" name="firstName" placeholder="Jane Smith" autocomplete="given-name">
          </div>
          <div class="collab-field">
            <label for="collab-phone">Phone Number <span class="collab-optional">(optional)</span></label>
            <input type="tel" id="collab-phone" name="cnumber" placeholder="300 1234567" autocomplete="tel">
          </div>
        </div>

        <div class="collab-field">
          <label for="collab-email">Email</label>
          <input type="email" id="collab-email" name="cemail" placeholder="name@company.com" autocomplete="email">
        </div>

        <div class="collab-field">
          <label>What are you looking to do?</label>
          <div class="collab-intent" role="radiogroup" data-intent-group>
            <?php
            $intents = array(
              array( 'value' => 'Build a Product',  'title' => 'Build a Product',  'desc' => 'End-to-end development from idea to launch' ),
              array( 'value' => 'Hire Developers',  'title' => 'Hire Developers',  'desc' => 'Add vetted developers to your existing team' ),
              array( 'value' => 'Need Guidance',    'title' => 'Need Guidance',    'desc' => "We'll help you choose the right setup" ),
            );
            foreach ( $intents as $io ) :
            ?>
            <label class="collab-intent-opt <?php echo $io['value'] === 'Build a Product' ? 'is-selected' : ''; ?>" data-intent-opt>
              <input type="radio" name="serviceType" value="<?php echo esc_attr( $io['value'] ); ?>" <?php echo $io['value'] === 'Build a Product' ? 'checked' : ''; ?>>
              <span class="collab-intent-radio" aria-hidden="true"><span class="collab-intent-radio-dot"></span></span>
              <span class="collab-intent-text">
                <span class="collab-intent-title"><?php echo esc_html( $io['title'] ); ?></span>
                <span class="collab-intent-desc"><?php echo esc_html( $io['desc'] ); ?></span>
              </span>
			  <span class="collab-intent-tooltip"><?php echo esc_html( $io['desc'] ); ?></span>	
            </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="collab-field">
          <label for="collab-details">Project details <span class="collab-optional">(optional)</span></label>
          <textarea id="collab-details" name="message" rows="4" placeholder="Describe your project, requirements or any specific challenges..."></textarea>
        </div>

        <div id="tnb-collab-form-msg" aria-live="polite"></div>

        <?php tnb_recaptcha_field(); ?>

        <button type="submit" class="collab-submit">Inquire Now</button>
      </form>
    </div>
  </div>
</section>
