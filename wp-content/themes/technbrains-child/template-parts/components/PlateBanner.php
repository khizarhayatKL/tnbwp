<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="platetalk-app<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		
		<div class="content">
			<div class="left">
				<?php tnb_breadcrumb_html(); ?>
				<h4>PlateTalk</h4>
				<h2>App Bridging Communication and Transportation</h2>
				<p>PlateTalk is an innovative application that redefines how individuals interact with transportation systems. Designed to simplify vehicle management and enhance real-time communication, the app allows users to register their vehicles, track locations, and create a connected social ecosystem for drivers. Built by TechnBrains, PlateTalk introduces a unique fusion of transportation technology and social media, empowering users to take control of their vehicle data while promoting public safety.</p>
				<button type="button" class="plateBtn popup-trigger">Talk to Our Experts</button>
			</div>
			<div class="right">
				<img src="<?php echo esc_url( $img . '/case-studies/plate-talk/banner-side.webp' ); ?>" width="517" height="641" alt="banner-side" loading="eager" decoding="async">
			</div>
		</div>
	</div>
</section>
