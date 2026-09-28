<?php
/**
 * Component: Main CTA Banner — mirrors Cta.jsx
 *
 * Data key : main_cta
 * Fields   : title_html (span+br allowed), para, btn_call_text,
 *            is_second_cta (bool — hides LIVE CHAT when true),
 *            btn_second_text, full_btn_text
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data            = get_query_var( 'component_data' );
$d               = $data['main_cta'] ?? array();
$mod             = get_query_var( 'component_modifier_classes', '' );
$is_second_cta = $d['show_second_btn'] ?? true;
$btn_call_text   = $d['btn_call_text']   ?? 'Call Us';
$btn_second_text = $d['btn_second_text'] ?? 'Live Chat';
$full_btn_text   = $d['full_btn_text']   ?? 'GET INSTANT QUOTE NOW';
$kses            = array( 'span' => array( 'class' => true ), 'br' => array() );

$title_html = $d['title_html'] ?? '<span>HAVE AN INTERESTING IDEA?</span> <br /> DISCUSS WITH US TODAY';
$para       = $d['para']       ?? 'TechnBrains provides top-notch, leading design and development services to its esteemed clients spread around the world.';

$phone_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="18" height="18" focusable="false" aria-hidden="true"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h352a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48zm-16.39 307.37l-15 65A15 15 0 0 1 354 416C194 416 64 286.29 64 126a15.7 15.7 0 0 1 11.63-14.61l65-15A18.23 18.23 0 0 1 144 96a16.27 16.27 0 0 1 13.79 9.09l30 70A17.9 17.9 0 0 1 189 181a17.58 17.58 0 0 1-5.5 12.84l-32.6 28.34a127.43 127.43 0 0 0 67.07 66.92l28.26-32.51A18.43 18.43 0 0 1 258 250a17.57 17.57 0 0 1 5.92 1.21l70 30A16.25 16.25 0 0 1 343 294a18.22 18.22 0 0 1-15.39 45.37z"/></svg>';
?>
<section class="mainCtaBanner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="cta-grid">
			<div class="left-cta-info">
				<h2><?php echo wp_kses( $title_html, $kses ); ?></h2>
				<p><?php echo esc_html( $para ); ?></p>
			</div>
			<div class="right-cta-info">
				<div class="btn-grid">
					<a class="footer-custom-btn" href="tel:+18338886032">
						<?php echo $phone_svg; ?> <?php echo esc_html( $btn_call_text ); ?>
					</a>
					<?php if ( $is_second_cta ) : ?>
					<button class="footer-custom-btn tnb-popup-trigger" type="button">
						<?php echo $phone_svg; ?> <?php echo esc_html( $btn_second_text ); ?>
					</button>
					<?php endif; ?>
				</div>
				<button class="cta-full-btn tnb-popup-trigger" type="button">
					<?php echo esc_html( $full_btn_text ); ?>
				</button>
			</div>
		</div>
	</div>
</section>
