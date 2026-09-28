<?php
defined( 'ABSPATH' ) || exit;

$mod = get_query_var( 'component_modifier_classes', '' );

$arrow_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="14" height="14" aria-hidden="true" focusable="false"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>';
?>
<section class="seoCtaMain<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<h2>Improve your digital <br>presence through our impeccable SEO Services</h2>
		<p>Let our SEO experts help you gain more traffic and conversions</p>
		<div class="scm-cta-btn">
			<button class="tnb-btn slideHOv tnb-popup-trigger" type="button">Get Started <?php echo $arrow_svg; ?></button>
		</div>
	</div>
</section>
