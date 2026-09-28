<?php
/**
 * Component: Development Services
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['dev_services'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$secclass = $d['secclass'] ?? '';
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="developmentServices<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="ds-main-info">
			<span class="subheading"><?php echo esc_html( $d['subtitle'] ?? '' ); ?></span>
			<h2><?php echo wp_kses_post( $d['title'] ?? '' ); ?></h2>
			<p><?php echo esc_html( $d['para'] ?? '' ); ?></p>
		</div>
		<div class="ds-grid">
			<?php foreach ( $listing as $item ) : ?>
			<div class="ds-left">
				<?php if ( ! empty( $item['img_src'] ) ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $item['img_src'] ); ?>"
					width="<?php echo esc_attr( $item['width'] ?? '558' ); ?>"
					height="<?php echo esc_attr( $item['height'] ?? '497' ); ?>"
					alt="<?php echo esc_attr( $d['title'] ?? 'development services' ); ?>"
					loading="lazy"
				>
				<?php endif; ?>
			</div>
			<div class="ds-right<?php echo $secclass ? ' ' . esc_attr( $secclass ) : ''; ?>">
				<?php foreach ( $item['content'] ?? array() as $list ) : ?>
				<div class="ds-details">
					<h3><?php echo wp_kses_post( $list['title'] ?? '' ); ?></h3>
					<p><?php echo wp_kses_post( $list['para'] ?? '' ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
