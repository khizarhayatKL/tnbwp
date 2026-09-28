<?php
/**
 * Component: Two Boxes (EngagementModel variant) — mirrors EngagementModel/TwoBoxes/TwoBoxes.jsx
 *
 * Data key : two_boxes
 * Fields   : subtitle, title, para,
 *            listing[{ img_src, img_width, img_height, title, para }]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['two_boxes'] ?? array();
$img_base  = get_stylesheet_directory_uri() . '/assets/images';
$listing   = $d['listing'] ?? array();
$mod_class = get_query_var( 'component_modifier_classes', '' );
$mod_class = $mod_class ? ' ' . sanitize_html_class( $mod_class ) : '';
?>
<section class="twoBoxesEm<?php echo esc_attr( $mod_class ); ?>">
	<div class="container">
		<div class="main-info">
			<?php if ( ! empty( $d['subtitle'] ) ) : ?>
			<h4><?php echo esc_html( $d['subtitle'] ); ?></h4>
			<?php endif; ?>
			<?php if ( ! empty( $d['title'] ) ) : ?>
			<h2><?php echo esc_html( $d['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="tnb-logo">
			<img
				src="<?php echo esc_url( $img_base . '/engagement-model/dedicated-team/tnblogo.png' ); ?>"
				width="196"
				height="109"
				alt="TechnBrains Logo"
				loading="lazy"
				decoding="async"
			>
		</div>
		<?php if ( ! empty( $listing ) ) : ?>
		<div class="main-tab">
			<?php foreach ( $listing as $item ) : ?>
			<div class="mainDiv">
				<div class="mainBox">
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="<?php echo esc_attr( $item['img_width'] ?? '60' ); ?>"
						height="<?php echo esc_attr( $item['img_height'] ?? '60' ); ?>"
						alt="<?php echo esc_attr( $item['title'] ?? '' ); ?>"
						loading="lazy"
						decoding="async"
					>
					<h4><?php echo esc_html( $item['title'] ?? '' ); ?></h4>
				</div>
				<p><?php echo esc_html( $item['para'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<div class="client-logo">
			<img
				src="<?php echo esc_url( $img_base . '/engagement-model/dedicated-team/cliet.png' ); ?>"
				width="109"
				height="109"
				alt="Client Logo"
				loading="lazy"
				decoding="async"
			>
		</div>
	</div>
</section>
