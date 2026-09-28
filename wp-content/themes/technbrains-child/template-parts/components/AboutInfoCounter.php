<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$info_list = $data['about_info_list'] ?? array();
$img      = get_stylesheet_directory_uri() . '/assets/images';
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="about-info-main<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="about-info-grid">
			<?php foreach ( $info_list as $item ) : ?>
			<div class="info-box">
				<img src="<?php echo esc_url( $img . $item['img_src'] ); ?>" width="80" height="80" alt="<?php echo esc_attr( $item['title'] ); ?>" loading="lazy" decoding="async">
				<h4 data-counter-end="<?php echo esc_attr( $item['count'] ); ?>" data-counter-suffix="<?php echo esc_attr( $item['suffix'] ); ?>">0<span><?php echo esc_html( $item['suffix'] ); ?></span></h4>
				<p><?php echo esc_html( $item['title'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
