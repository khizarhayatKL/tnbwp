<?php
/**
 * Component: Delivery Control
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['delivery_control'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$listing  = $d['listing']  ?? [];
$btn_text = $d['btn_text'] ?? '';
?>
<section class="deliveryControl">
	<div class="container">
		<div class="main">
			<?php if ( $title ) : ?>
			<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
		</div>

		<div class="listing">
			<?php foreach ( $listing as $item ) : ?>
			<div class="single">
				<img
					src="<?php echo esc_url( $img_base . $item['icon'] ); ?>"
					width="51"
					height="51"
					alt="<?php echo esc_attr( $item['title'] ); ?>"
					loading="lazy"
					decoding="async"
				>
				<div class="info">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['para'] ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<?php if ( $btn_text ) : ?>
		<div class="btnWrapper">
			<button class="tnb-btn tnb-popup-trigger" type="button">
				<div class="textWrapper">
					<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
					<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
				</div>
			</button>
		</div>
		<?php endif; ?>
	</div>
</section>
