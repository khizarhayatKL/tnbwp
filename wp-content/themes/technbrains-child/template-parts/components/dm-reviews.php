<?php
defined( 'ABSPATH' ) || exit;

$mod  = get_query_var( 'component_modifier_classes', '' );
$base = get_stylesheet_directory_uri() . '/assets/images';
?>
<section id="sec-2" class="dmReviews<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="dmr-grid">
			<div class="dmr-left">
				<h5>Our Customers Bring Us Value</h5>
				<h3>See What They Have To Say For Us.</h3>
			</div>
			<div class="dmr-right">
				<img
					src="<?php echo esc_url( $base . '/digital-marketing/rev-img.webp' ); ?>"
					width="616" height="39"
					alt="Company Logos"
					loading="lazy" decoding="async"
				>
			</div>
		</div>
	</div>
</section>
