<?php
defined( 'ABSPATH' ) || exit;

$data       = get_query_var( 'component_data' );
$key        = $args['data_key'] ?? 'app_services';
$d          = $data[$key] ?? array();
$listing    = $d['listing'] ?? array();
$mod        = get_query_var( 'component_modifier_classes', '' );
$image_left = ! empty( $d['image_left'] );
$grid_class = $image_left ? 'image-right' : 'image-left';
$img_base   = get_stylesheet_directory_uri() . '/assets/images';
$kses_h     = array( 'span' => array(), 'br' => array() );
?>
<section class="appServicesSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="services-grid <?php echo esc_attr( $grid_class ); ?>">
			<?php if ( $image_left ) : ?>
			<div class="content">
				<?php if ( ! empty( $d['head_text'] ) ) : ?>
				<h2><?php echo wp_kses( $d['head_text'], $kses_h ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $d['para_text'] ) ) : ?>
				<p><?php echo wp_kses_post( $d['para_text'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $d['img_src'] ) ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $d['img_src'] ); ?>"
					width="<?php echo (int) ( $d['img_width'] ?? 400 ); ?>"
					height="<?php echo (int) ( $d['img_height'] ?? 400 ); ?>"
					alt="<?php echo esc_attr( $d['img_alt'] ?? 'service image' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<?php endif; ?>
			</div>
			<div class="list">
				<?php foreach ( $listing as $item ) : ?>
				<div class="list-info">
					<div>
						<h3><?php echo wp_kses( $item['title'] ?? '', $kses_h ); ?></h3>
						<p><?php echo wp_kses_post( $item['content'] ?? '' ); ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php else : ?>
			<div class="list">
				<?php foreach ( $listing as $item ) : ?>
				<div class="list-info">
					<div>
						<h3><?php echo wp_kses( $item['title'] ?? '', $kses_h ); ?></h3>
						<p><?php echo wp_kses_post( $item['content'] ?? '' ); ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="content">
				<?php if ( ! empty( $d['head_text'] ) ) : ?>
				<h2><?php echo wp_kses( $d['head_text'], $kses_h ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $d['para_text'] ) ) : ?>
				<p><?php echo wp_kses_post( $d['para_text'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $d['img_src'] ) ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $d['img_src'] ); ?>"
					width="<?php echo (int) ( $d['img_width'] ?? 400 ); ?>"
					height="<?php echo (int) ( $d['img_height'] ?? 400 ); ?>"
					alt="<?php echo esc_attr( $d['img_alt'] ?? 'service image' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
