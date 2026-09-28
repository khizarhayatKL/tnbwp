<?php
defined( 'ABSPATH' ) || exit;

$mod  = get_query_var( 'component_modifier_classes', '' );
$base = get_stylesheet_directory_uri() . '/assets/images';

$check_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="16" height="16" aria-hidden="true" focusable="false"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>';
?>
<section class="seoMainBanner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="seo-main-content">
			<div class="seo-main-info">
				<?php tnb_breadcrumb_html(); ?>
				<h1><span>Stay Relevant, Stay Visible:</span><br>SEO Services That Deliver</h1>
				<ul>
					<li><?php echo $check_svg; ?> PPC Management</li>
					<li><?php echo $check_svg; ?> SEO</li>
					<li><?php echo $check_svg; ?> Facebook Ads</li>
					<li><?php echo $check_svg; ?> Website Design</li>
					<li><?php echo $check_svg; ?> Email Marketing</li>
					<li><?php echo $check_svg; ?> Social media marketing</li>
				</ul>
				<p>Dominate Search Results with our Modern approach to Search Engine Optimization Services</p>
				<button class="tnb-btn slideHOv tnb-popup-trigger" type="button">Rank Now</button>
			</div>
			<div class="seo-main-img">
				<img
					src="<?php echo esc_url( $base ); ?>/seo-services/first-img.webp"
					width="882" height="882"
					alt="SEO Services - Stay Relevant Stay Visible"
					loading="eager" decoding="async"
				>
			</div>
		</div>
	</div>
</section>
