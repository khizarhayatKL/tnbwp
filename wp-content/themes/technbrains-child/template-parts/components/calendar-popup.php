<?php
/**
 * Calendar / Schedule popup — matches layout.js calender-popup-main section.
 * Floating calendar icon (bottom-left) → opens HubSpot meetings iframe in modal.
 *
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;
?>

<section class="calender-popup-main" aria-label="Schedule a meeting">

  <!-- Floating calendar trigger button -->
  <button
    type="button"
    class="iframe-btn"
    id="tnb-calendar-trigger"
    aria-label="Schedule a meeting"
    aria-haspopup="dialog"
    aria-expanded="false"
  >
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
      <path d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm-128-128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm-128 0c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/>
    </svg>
  </button>

  <!-- Calendar iframe modal overlay -->
  <div
    id="tnb-calendar-overlay"
    class="tnb-calendar-overlay calender-popup"
    role="dialog"
    aria-modal="true"
    aria-label="Schedule a meeting"
    hidden
  >
    <div class="tnb-calendar-modal-align">
      <div class="tnb-calendar-modal-content">
        <button
          type="button"
          class="tnb-calendar-close"
          id="tnb-calendar-close"
          aria-label="Close"
        >
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M289.94 256l95-95A24 24 0 00351 127l-95 95-95-95a24 24 0 00-34 34l95 95-95 95a24 24 0 1034 34l95-95 95 95a24 24 0 0034-34z"></path></svg>
        </button>
        <iframe
          id="tnb-calendar-iframe"
          src=""
          data-src="https://calendly.com/tech-n-brains/30-minute-zoom-call"
          name="myiFrame"
          frameborder="1"
          marginheight="0"
          marginwidth="0"
          width="900"
          height="800"
          allowfullscreen
          title="Schedule a meeting"
        ></iframe>
      </div>
    </div>
  </div>

</section>

<!-- Calendly badge widget end -->