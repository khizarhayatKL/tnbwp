<?php
defined( 'ABSPATH' ) || exit;

$data        = get_query_var( 'component_data' );
$d           = $data['plate_features'] ?? array();
$img         = get_stylesheet_directory_uri() . '/assets/images';
$mod         = get_query_var( 'component_modifier_classes', '' );
$box_listing = $d['box_listing'] ?? array();
$side_img    = $d['side_img'] ?? '';
$img_w       = $d['img_w'] ?? 724;
$img_h       = $d['img_h'] ?? 469;
?>
<section class="plateFeature<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="gridSec">
			<div class="featureBoxes">
				<?php foreach ( $box_listing as $item ) : ?>
				<div class="singBox">
					<img src="<?php echo esc_url( $img . '/case-studies/plate-talk/' . $item['img'] ); ?>" width="<?php echo esc_attr( $item['w'] ); ?>" height="<?php echo esc_attr( $item['h'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" loading="lazy" decoding="async">
					<h4><?php echo esc_html( $item['title'] ); ?></h4>
					<p><?php echo esc_html( $item['content'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="imageBox">
				<img src="<?php echo esc_url( $img . $side_img ); ?>" width="<?php echo esc_attr( $img_w ); ?>" height="<?php echo esc_attr( $img_h ); ?>" alt="feature-side" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>
