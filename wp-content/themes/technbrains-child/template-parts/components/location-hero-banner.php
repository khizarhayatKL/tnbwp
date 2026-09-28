<?php
/**
 * Component: Location Hero Banner — mirrors Locations/HeroBanner/HeroBanner.jsx
 *
 * Data key : hero_loc
 * Fields   : bg_img, title (span+br), para, btn_one, btn_two
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data   = get_query_var( 'component_data' );
$d      = $data['hero_loc'] ?? array();
$mod    = get_query_var( 'component_modifier_classes', '' );
$base   = get_stylesheet_directory_uri() . '/assets/images';
$bg_img = ! empty( $d['bg_img'] ) ? esc_url( $base . '/' . ltrim( $d['bg_img'], '/' ) ) : '';
$kses   = array( 'span' => array(), 'br' => array() );
?>
<section
	class="sec-hero<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>"
	<?php if ( $bg_img ) : ?>style="background-image: url('<?php echo $bg_img; ?>');"<?php endif; ?>
>
	<div class="container">
		<div class="main">
			<div class="inner-desc">
				<?php tnb_breadcrumb_html(); ?>
				<h1><?php echo wp_kses( $d['title'] ?? '', $kses ); ?></h1>
				<?php if ( ! empty( $d['para'] ) ) : ?>
				<p><?php echo esc_html( $d['para'] ); ?></p>
				<?php endif; ?>
				<div class="banner-btn">
					<button class="tnb-btn black-red tnb-popup-trigger" type="button">
						<?php echo esc_html( $d['btn_one'] ?? 'Build a Next-Gen App' ); ?>
					</button>
					<a class="tnb-btn slideHOv" href="tel:+18338886032">
						<?php echo esc_html( $d['btn_two'] ?? 'Get Free Consultation' ); ?>
					</a>
				</div>
			</div>
			<div class="scroll">
				<a class="icon-scroll" href="#sec-2" aria-label="Scroll down"></a>
			</div>
		</div>
	</div>
</section>
