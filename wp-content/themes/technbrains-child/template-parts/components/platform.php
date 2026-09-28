<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['platform'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$img_list = $d['img_list'] ?? [];
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="mainPlatform<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="platform-grid">
			<div class="left-info">
				<?php if ( $title ) : ?>
				<h4><?php echo esc_html( $title ); ?></h4>
				<?php endif; ?>
			</div>
			<div class="right-info">
				<?php if ( $para ) : ?>
				<p><?php echo esc_html( $para ); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php if ( ! empty( $img_list ) ) : ?>
		<div class="logos-app">
			<?php foreach ( $img_list as $item ) : ?>
			<div class="pic">
				<img
					src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
					width="<?php echo (int) ( $item['img_width'] ?? 0 ); ?>"
					height="<?php echo (int) ( $item['img_height'] ?? 0 ); ?>"
					alt="<?php echo esc_attr( $item['alt_text'] ?? '' ); ?>"
					loading="lazy"
					decoding="async"
				>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
