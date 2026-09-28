<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['branding'] ?? array();
$img      = get_stylesheet_directory_uri() . '/assets/images';
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_path = $d['img_path'] ?? '/case-studies/wedding-app/wedding-branding.webp';
$img_w    = $d['img_w'] ?? 1242;
$img_h    = $d['img_h'] ?? 750;
?>
<section class="branding<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="image">
			<img src="<?php echo esc_url( $img . $img_path ); ?>" width="<?php echo esc_attr( $img_w ); ?>" height="<?php echo esc_attr( $img_h ); ?>" alt="branding" loading="lazy" decoding="async">
		</div>
	</div>
</section>
