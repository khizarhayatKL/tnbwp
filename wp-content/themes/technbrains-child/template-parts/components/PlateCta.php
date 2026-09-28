<?php
defined( 'ABSPATH' ) || exit;

$data        = get_query_var( 'component_data' );
$d           = $data['plate_cta'] ?? array();
$img         = get_stylesheet_directory_uri() . '/assets/images';
$mod         = get_query_var( 'component_modifier_classes', '' );
$heading     = $d['heading'] ?? '';
$sub_heading = $d['sub_heading'] ?? '';
$btn_text    = $d['btn_text'] ?? '';
$side_img    = $d['side_img'] ?? '';
$img_w       = $d['img_w'] ?? 469;
$img_h       = $d['img_h'] ?? 597;
?>
<section class="plateCta<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="gridSec">
			<div class="textSection">
				<h2><?php echo esc_html( $heading ); ?></h2>
				<h4><?php echo esc_html( $sub_heading ); ?></h4>
				<button type="button" class="plateBtn popup-trigger"><?php echo esc_html( $btn_text ); ?></button>
			</div>
			<div class="imgSection">
				<img src="<?php echo esc_url( $img . $side_img ); ?>" width="<?php echo esc_attr( $img_w ); ?>" height="<?php echo esc_attr( $img_h ); ?>" alt="sideImg" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>
