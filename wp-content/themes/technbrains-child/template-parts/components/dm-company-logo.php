<?php
defined( 'ABSPATH' ) || exit;

$mod  = get_query_var( 'component_modifier_classes', '' );
$base = get_stylesheet_directory_uri() . '/assets/images';

$logos = array(
	array( 'src' => 'fbAds.webp',      'w' => 170, 'h' => 53, 'alt' => 'FaceBook Ads' ),
	array( 'src' => 'googleAds.webp',  'w' => 138, 'h' => 79, 'alt' => 'Google Ads' ),
	array( 'src' => 'moz.webp',        'w' => 151, 'h' => 44, 'alt' => 'MOZ' ),
	array( 'src' => 'semrush.png',     'w' => 206, 'h' => 87, 'alt' => 'SEMRUSH' ),
	array( 'src' => 'yoast_logo.webp', 'w' => 149, 'h' => 67, 'alt' => 'Yoast' ),
);
?>
<section class="dmCompanyLogo<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="dcl-images">
			<?php foreach ( $logos as $logo ) : ?>
			<img
				src="<?php echo esc_url( $base . '/digital-marketing/' . $logo['src'] ); ?>"
				width="<?php echo esc_attr( $logo['w'] ); ?>"
				height="<?php echo esc_attr( $logo['h'] ); ?>"
				alt="<?php echo esc_attr( $logo['alt'] ); ?>"
				loading="lazy" decoding="async"
			>
			<?php endforeach; ?>
		</div>
	</div>
</section>
