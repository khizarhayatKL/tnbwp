<?php
defined( 'ABSPATH' ) || exit;

$data        = get_query_var( 'component_data' );
$d           = $data['plan_banner'] ?? array();
$img         = get_stylesheet_directory_uri() . '/assets/images';
$mod         = get_query_var( 'component_modifier_classes', '' );
$head_text   = $d['head_text']   ?? '';
$main_src    = $d['main_src']    ?? '';
$main_width  = $d['main_width']  ?? 772;
$main_height = $d['main_height'] ?? 437;
$main_alt    = $d['main_alt']    ?? '';
?>
<section class="planBanner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="pb-banner-grid">
			<div class="pb-content">
				<h1><?php echo esc_html( $head_text ); ?></h1>
			</div>
			<?php if ( $main_src ) : ?>
			<div class="pb-image">
				<img src="<?php echo esc_url( $img . $main_src ); ?>" width="<?php echo esc_attr( $main_width ); ?>" height="<?php echo esc_attr( $main_height ); ?>" alt="<?php echo esc_attr( $main_alt ); ?>" loading="eager" decoding="async">
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
