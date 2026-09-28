<?php
defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['location_cta'] ?? array();
$mod       = get_query_var( 'component_modifier_classes', '' );
$kses_h    = array( 'span' => array() );
$is_anchor = ! empty( $d['redirect_link'] );
?>
<section class="LocationCta<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="left">
				<?php if ( ! empty( $d['heading'] ) ) : ?>
				<h2><?php echo wp_kses( $d['heading'], $kses_h ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $d['para'] ) ) : ?>
				<p><?php echo esc_html( $d['para'] ); ?></p>
				<?php endif; ?>
				<?php if ( $is_anchor ) : ?>
				<a
					class="tnb-btn whiteBackground"
					href="<?php echo esc_url( $d['redirect_link'] ); ?>"
				><?php echo esc_html( $d['btn_text'] ?? 'Contact Us' ); ?></a>
				<?php else : ?>
				<button class="tnb-btn whiteBackground tnb-popup-trigger" type="button">
					<?php echo esc_html( $d['btn_text'] ?? 'Contact Us' ); ?>
				</button>
				<?php endif; ?>
			</div>
			<div class="right">
				<?php if ( ! empty( $d['location_url'] ) ) : ?>
				<iframe
					src="<?php echo esc_url( $d['location_url'] ); ?>"
					width="100%"
					height="500"
					allowfullscreen=""
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"
					title="TechnBrains location map"
				></iframe>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
