<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['plate_problems'] ?? array();
$img      = get_stylesheet_directory_uri() . '/assets/images';
$mod      = get_query_var( 'component_modifier_classes', '' );
$side_img = $d['side_img'] ?? '';
$img_w    = $d['img_w'] ?? 503;
$img_h    = $d['img_h'] ?? 449;
$heading  = $d['heading'] ?? '';
$para     = $d['para'] ?? '';
?>
<section class="plateProblem<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="gridSec">
			<div class="imgBox">
				<img src="<?php echo esc_url( $img . $side_img ); ?>" width="<?php echo esc_attr( $img_w ); ?>" height="<?php echo esc_attr( $img_h ); ?>" alt="sideImg" loading="lazy" decoding="async">
			</div>
			<div class="textBox">
				<h2><?php echo esc_html( $heading ); ?></h2>
				<p><?php echo esc_html( $para ); ?></p>
			</div>
		</div>
	</div>
</section>
