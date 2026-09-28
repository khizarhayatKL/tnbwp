<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="qpon-about<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="about-content">
			<h2>What is Qpon App?</h2>
			<p>Qpon is Your ultimate savings companion. Our app offers a treasure trove of deals and discounts, helping you save big on everything you desire<br><br>With a monthly subscription, you gain access to a wide array of coupons from various brands, including resturants, beauty, fitness, and more.<br>Plus, if you use a promo code, you'll enjoy a 14-day free trial. Say goodbye to paying full price and hello to QPon's incredible discounts.</p>
		</div>
	</div>
	<img src="<?php echo esc_url( $img . '/case-studies/qpon/about-screen.webp' ); ?>" width="1550" height="1330" alt="devices" loading="lazy" decoding="async">
</section>
