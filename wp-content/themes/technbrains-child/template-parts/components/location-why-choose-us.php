<?php
/**
 * Component: Location Why Choose Us — mirrors Locations/WhyChooseUs/WhyChooseUs.jsx
 *
 * Data key : why_choose_us
 * Fields   : para (HTML — multiple <p> tags), listing[{title, para}]
 * Note     : h4 "Why Choose" and h2 "TechnBrains" are hardcoded in JSX.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$d       = $data['why_choose_us'] ?? array();
$listing = $d['listing'] ?? array();
$mod     = get_query_var( 'component_modifier_classes', '' );
?>
<section class="why-choose-us<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="global-bio">
			<div class="left-info">
				<h4>Why Choose</h4>
				<h2>TechnBrains</h2>
				<?php if ( ! empty( $d['para'] ) ) : ?>
				<?php echo wp_kses_post( $d['para'] ); ?>
				<?php endif; ?>
				<button class="tnb-btn btn tnb-popup-trigger" type="button">Get Quote Now</button>
			</div>
			<div class="right-info">
				<?php foreach ( $listing as $item ) : ?>
				<div class="why-choos-info">
					<h4><?php echo esc_html( $item['title'] ?? '' ); ?></h4>
					<p><?php echo esc_html( $item['para'] ?? '' ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
