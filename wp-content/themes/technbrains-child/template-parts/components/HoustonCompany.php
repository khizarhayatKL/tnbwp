<?php
defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['houston_company'] ?? array();
$mod       = get_query_var( 'component_modifier_classes', '' );
$img_base  = get_stylesheet_directory_uri() . '/assets/images';
$icon_list = $d['icon_list'] ?? array();
?>
<section class="houstonCompany<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="imageBox">
				<?php if ( ! empty( $d['img_src'] ) ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $d['img_src'] ); ?>"
					width="<?php echo (int) ( $d['img_width'] ?? 585 ); ?>"
					height="<?php echo (int) ( $d['img_height'] ?? 606 ); ?>"
					alt="<?php echo esc_attr( $d['alt'] ?? 'company image' ); ?>"
					loading="eager"
					decoding="async"
				>
				<?php endif; ?>
			</div>
			<div class="textBox">
				<h2><?php echo esc_html( $d['heading'] ?? '' ); ?></h2>
				<p><?php echo esc_html( $d['para'] ?? '' ); ?></p>
				<?php if ( ! empty( $icon_list ) ) : ?>
				<div class="imageFlex">
					<?php foreach ( $icon_list as $icon ) : ?>
					<div class="images">
						<a href="<?php echo esc_url( $icon['link'] ?? '#' ); ?>" target="_blank" rel="noopener noreferrer">
							<img
								src="<?php echo esc_url( $img_base . $icon['img_src'] ); ?>"
								width="<?php echo (int) ( $icon['width'] ?? 65 ); ?>"
								height="<?php echo (int) ( $icon['height'] ?? 59 ); ?>"
								alt="awards"
								loading="lazy"
								decoding="async"
							>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
