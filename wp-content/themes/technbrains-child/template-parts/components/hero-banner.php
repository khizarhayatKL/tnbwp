<?php
defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$d       = $data['hero_banner'] ?? array();
$mod     = get_query_var( 'component_modifier_classes', '' );
$base    = get_stylesheet_directory_uri() . '/assets/images';
$bg_img  = ! empty( $d['bg_img'] ) ? esc_url( $base . '/' . $d['bg_img'] ) : '';
$title   = $d['title']   ?? '';
$span    = $d['span']    ?? '';
$btn_one = $d['btn_one'] ?? 'GET A FREE PROPOSAL';
$btn_two = $d['btn_two'] ?? 'Call Us Now';
?>
<section
	class="heroBanner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>"
	<?php if ( $bg_img ) : ?>style="background-image: url('<?php echo $bg_img; ?>');"<?php endif; ?>
>
	<div class="container">
		<div class="hb-main">
			<div class="hb-inner-desc">
				<?php tnb_breadcrumb_html(); ?>
				<h1>
					<?php echo esc_html( $title ); ?>
					<?php if ( $span ) : ?>
					<span><?php echo esc_html( $span ); ?></span>
					<?php endif; ?>
				</h1>
				<div class="hb-banner-btn">
					<button class="tnb-btn black-red tnb-popup-trigger" type="button"><?php echo esc_html( $btn_one ); ?></button>
					<a class="tnb-btn slideHOv" href="tel:+18338886032"><?php echo esc_html( $btn_two ); ?></a>
				</div>
			</div>
			<div class="hb-scroll">
				<a class="hb-icon-scroll" href="#sec-2" aria-label="Scroll down"></a>
			</div>
		</div>
	</div>
</section>
