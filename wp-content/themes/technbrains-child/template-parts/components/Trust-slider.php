<?php

/**
 * Component: Trust Slider
 * Layout   : trust_slider (ACF Flexible Content)
 *
 * Pure CSS marquee — items are output twice in PHP so the
 * `translateX(-50%)` keyframe creates a seamless infinite loop.
 * No JavaScript or Swiper dependency.
 *
 * Fields:
 *   ts_label       — eyebrow label above the marquee (optional)
 *   ts_bg          — background variant: 'white' | 'light' | 'dark'
 *   ts_slides      — repeater:
 *       ts_slide_image   — image (logo upload)
 *       ts_slide_name    — text  (platform / partner name)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$label  = get_sub_field( 'ts_label' ) ?: '';
$desc   = get_sub_field( 'ts_desc' )  ?: ''; 
$bg     = get_sub_field( 'ts_bg' )    ?: 'white';
$slides = get_sub_field( 'ts_slides' ) ?: [];

if ( empty( $slides ) ) {
	return;
}

$allowed_bg = [ 'white', 'light', 'dark' ];
$bg_class   = in_array( $bg, $allowed_bg, true ) ? ' ts-section--' . $bg : '';

/**
 * Render a single marquee item. Used in both the first and duplicate pass.
 *
 * @param array  $slide      Slide data from ACF repeater.
 * @param bool   $aria_hidden Whether to add aria-hidden="true" (duplicate pass).
 */
$render_item = function( array $slide, bool $aria_hidden = false ) {
	$img  = $slide['ts_slide_image'] ?? null;
	$name = $slide['ts_slide_name']  ?? '';

	if ( empty( $img ) ) {
		return;
	}

	$img_url = is_array( $img ) ? ( $img['url']    ?? '' ) : '';
	$img_w   = is_array( $img ) ? ( $img['width']  ?? 0 )  : 0;
	$img_h   = is_array( $img ) ? ( $img['height'] ?? 0 )  : 0;
	$img_alt = is_array( $img ) ? ( $img['alt']    ?? $name ) : $name;

	if ( ! $img_url ) {
		return;
	}

	$hidden_attr = $aria_hidden ? ' aria-hidden="true"' : '';
	?>
	<div class="ts-item"<?php echo $hidden_attr; ?>>
		<span class="ts-item-icon">
			<img
				src="<?php echo esc_url( $img_url ); ?>"
				alt="<?php echo esc_attr( $img_alt ); ?>"
				<?php if ( $img_w ) : ?>width="<?php echo esc_attr( $img_w ); ?>"<?php endif; ?>
				<?php if ( $img_h ) : ?>height="<?php echo esc_attr( $img_h ); ?>"<?php endif; ?>
				loading="lazy"
				decoding="async"
			>
		</span>
		<?php if ( $name ) : ?>
		<span class="ts-item-name"><?php echo esc_html( $name ); ?></span>
		<?php endif; ?>
	</div>
	<?php
};
?>
<section class="ts-section<?php echo esc_attr( $bg_class ); ?>">
	<div class="ts-inner">

		<?php if ( $label ) : ?>
		<p class="ts-label"><?php echo esc_html( $label ); ?></p>
		<?php endif; ?>
		
		<?php if ( $desc ) : ?>
		<p class="ts-desc"><?php echo esc_html( $desc ); ?></p>
		<?php endif; ?>

		<div
			class="ts-marquee"
			role="region"
			aria-label="<?php echo esc_attr( $label ?: 'Trusted partners' ); ?>"
		>
			<div class="ts-track">

				<?php foreach ( $slides as $slide ) : $render_item( $slide ); endforeach; ?>
				<?php foreach ( $slides as $slide ) : $render_item( $slide, true ); endforeach; ?>

			</div><!-- .ts-track -->
		</div><!-- .ts-marquee -->

	</div><!-- .ts-inner -->
</section>
