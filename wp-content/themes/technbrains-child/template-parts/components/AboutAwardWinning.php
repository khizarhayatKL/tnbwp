<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="award-winning-main<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<h5>Award-winning Mobile App Development Company in USA</h5>
		<h2>What Do We Do?</h2>
		<div class="award-grid">
			<div class="left-info">
				<img src="<?php echo esc_url( $img . '/about-us/award-2.webp' ); ?>" width="632" height="495" alt="award" loading="lazy" decoding="async">
			</div>
			<div class="right-info">
				<p>At TechnBrains, we provide our clients with outstanding IT services and business solutions that drive growth. Our team of competent professionals, located around the world, specializes in cutting-edge digital transformation services that harness the power of AI to deliver results with exceptional agility.</p>
				<p>Our commitment to excellence goes beyond digital transformation, and we design experiences that leave a lasting impression on your audience. We specialize in developing top-notch applications for Android, iOS, Cross-platform, and Web platforms, delivering bespoke solutions that utilize the latest technologies such as AR/VR, AI, Blockchain, and Cloud.<br><br>We take pride in our client-centric approach, our satisfied clients who rave about us on <span>Clutch, AppFutura, and Glassdoor</span>. Our partnerships extend beyond projects; we prioritize understanding your unique needs. With a global team of skilled professionals, we offer not just IT solutions but collaborative journeys, ensuring seamless integration and continued success.</p>
			</div>
		</div>
	</div>
</section>
