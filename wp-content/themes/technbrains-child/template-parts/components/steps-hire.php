<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['steps_hire'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$box_list = $d['box_list'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="hireSteps<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<?php if ( ! empty( $d['sub_head'] ) ) : ?>
			<h2><?php echo esc_html( $d['sub_head'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para_text'] ) ) : ?>
			<p><?php echo esc_html( $d['para_text'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="box-list">
			<?php foreach ( $box_list as $box ) : ?>
			<div class="box">
				<div class="box-content">
					<?php if ( ! empty( $box['number'] ) ) : ?>
					<p><?php echo esc_html( $box['number'] ); ?></p>
					<?php endif; ?>
					<h3><?php echo esc_html( $box['title'] ?? '' ); ?></h3>
					<?php if ( ! empty( $box['content'] ) ) : ?>
					<ul>
						<?php foreach ( $box['content'] as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $box['image_src'] ) ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $box['image_src'] ); ?>"
					width="<?php echo (int) ( $box['width'] ?? 225 ); ?>"
					height="<?php echo (int) ( $box['height'] ?? 267 ); ?>"
					alt="<?php echo esc_attr( $box['title'] ?? '' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
