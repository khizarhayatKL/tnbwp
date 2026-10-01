<?php
defined( 'ABSPATH' ) || exit;

$data       = get_query_var( 'component_data' );
$d          = $data['qpon_banner'] ?? array();
$img        = get_stylesheet_directory_uri() . '/assets/images';
$mod        = get_query_var( 'component_modifier_classes', '' );
$info_items = $d['info_items'] ?? array();
$allowed    = array( 'br' => array() );
?>
<section class="qpon-banner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php tnb_breadcrumb_html(); ?>
		<div class="main-baner-grid">
			<div class="banner-content">
				<img src="<?php echo esc_url( $img . '/case-studies/qpon/logo.webp' ); ?>" width="183" height="183" alt="logo" loading="lazy" decoding="async">
				<h1 class="screen-reader-text">QPon: Unlock Savings, Discover Deals, and Get More with QPon</h1>
				<p class="qpon-logotype">QPON</p>
				<h2>Unlock Savings, Discover Deals, and Get More with QPon</h2>
				<h3>Your Monthly Pass to Discount Galore!</h3>
				<div class="info-upper">
					<?php foreach ( $info_items as $item ) : ?>
					<div class="info-one">
						<img src="<?php echo esc_url( $img . $item['img'] ); ?>" width="<?php echo esc_attr( $item['w'] ); ?>" height="<?php echo esc_attr( $item['h'] ); ?>" alt="<?php echo esc_attr( strtolower( $item['title'] ) ); ?>" loading="lazy" decoding="async">
						<div class="info-content">
							<h5><?php echo esc_html( $item['title'] ); ?></h5>
							<p><?php echo wp_kses( $item['content'], $allowed ); ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
