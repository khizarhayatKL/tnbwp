<?php
/**
 * Component: Houston CTA
 *
 * Data key : houston_cta
 * Fields   : heading, subheading, content, img_src, img_width, img_height,
 *            img_alt, btn_text, anchor (bool), btn_url
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$key      = $args['data_key'] ?? 'houston_cta';
$d        = $data[$key] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$mod      = get_query_var( 'component_modifier_classes', '' );
$is_anchor = ! empty( $d['anchor'] );
?>
<section class="ctaSection<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="hs-content">
			<div class="hs-right">
				<?php if ( ! empty( $d['subheading'] ) ) : ?>
				<h6><?php echo esc_html( $d['subheading'] ); ?></h6>
				<?php endif; ?>
				<h2><?php echo esc_html( $d['heading'] ?? '' ); ?></h2>
				<?php if ( ! empty( $d['content'] ) ) : ?>
				<p><?php echo esc_html( $d['content'] ); ?></p>
				<?php endif; ?>
				<?php if ( $is_anchor ) : ?>
				<a class="new-btn-lp" href="<?php echo esc_url( home_url( $d['btn_url'] ?? '/contact-us' ) ); ?>"><?php echo esc_html( $d['btn_text'] ?? 'Book a Call' ); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M1 7H13M13 7L7 1M13 7L7 13" stroke="#ED2A32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
				<?php else : ?>
				<button class="new-btn-lp tnb-popup-trigger" type="button"><?php echo esc_html( $d['btn_text'] ?? 'Book a Call' ); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M1 7H13M13 7L7 1M13 7L7 13" stroke="#ED2A32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
				<?php endif; ?>
			</div>
			<div class="hs-left">
				<?php if ( ! empty( $d['img_src'] ) ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $d['img_src'] ); ?>"
					width="<?php echo (int) ( $d['img_width'] ?? 496 ); ?>"
					height="<?php echo (int) ( $d['img_height'] ?? 427 ); ?>"
					alt="<?php echo esc_attr( $d['img_alt'] ?? 'cta image' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
