<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['software_solutions'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="softwareSolutions<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="sw-main-grid">
			<div class="sw-left-info">
				<?php if ( ! empty( $d['title'] ) ) : ?>
				<h2><?php echo wp_kses_post( $d['title'] ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $d['para'] ) ) : ?>
				<p><?php echo esc_html( $d['para'] ); ?></p>
				<?php endif; ?>
			</div>
			<?php if ( ! empty( $listing ) ) : ?>
			<div class="sw-right-info">
				<?php foreach ( $listing as $item ) : ?>
				<div class="sw-list">
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="<?php echo (int) ( $item['img_width'] ?? 80 ); ?>"
						height="<?php echo (int) ( $item['img_height'] ?? 80 ); ?>"
						alt="<?php echo esc_attr( $item['title'] ?? '' ); ?>"
						loading="lazy"
						decoding="async"
					>
					<div class="sw-info">
						<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
						<?php if ( ! empty( $item['para'] ) ) : ?>
						<p><?php echo esc_html( $item['para'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
