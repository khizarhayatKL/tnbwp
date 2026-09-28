<?php
defined( 'ABSPATH' ) || exit;

$mod  = get_query_var( 'component_modifier_classes', '' );
$base = get_stylesheet_directory_uri() . '/assets/images';

$angle_right_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" fill="currentColor" width="14" height="14" aria-hidden="true" focusable="false"><path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"/></svg>';

$industries = array(
	array( 'src' => 'realState.webp',      'w' => 46, 'h' => 47, 'alt' => 'Real State',       'label' => 'Real State' ),
	array( 'src' => 'busines.webp',        'w' => 55, 'h' => 55, 'alt' => 'Business',          'label' => 'Business' ),
	array( 'src' => 'crane.webp',          'w' => 44, 'h' => 44, 'alt' => 'Construction',      'label' => 'Construction' ),
	array( 'src' => 'care.webp',           'w' => 53, 'h' => 45, 'alt' => 'Health Care',       'label' => 'Health Care' ),
	array( 'src' => 'technology.webp',     'w' => 43, 'h' => 43, 'alt' => 'Technology',        'label' => 'Technology' ),
	array( 'src' => 'resturent.webp',      'w' => 49, 'h' => 49, 'alt' => 'Restaurant',        'label' => 'Restaurant' ),
	array( 'src' => 'educa.webp',          'w' => 59, 'h' => 55, 'alt' => 'Education',         'label' => 'Education' ),
	array( 'src' => 'manufacture.webp',    'w' => 50, 'h' => 47, 'alt' => 'Manufacturing',     'label' => 'Manufacturing' ),
	array( 'src' => 'ecommerc.webp',       'w' => 51, 'h' => 51, 'alt' => 'Ecommerce',         'label' => 'Ecommerce' ),
	array( 'src' => 'digital.webp',        'w' => 47, 'h' => 47, 'alt' => 'Digital Marketing', 'label' => 'Digital Marketing' ),
	array( 'src' => 'videoServices.webp',  'w' => 41, 'h' => 47, 'alt' => 'Video Services',    'label' => 'Video Services' ),
	array( 'src' => 'tour.webp',           'w' => 59, 'h' => 57, 'alt' => 'Tour and Travels',  'label' => 'Tour and Travels' ),
);
?>
<section class="dmHelpingSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="dhs-grid">
			<div class="dhs-left">
				<h6>Industries we work for</h6>
				<h2>Helping <span>Businesses</span> in All Domains</h2>
				<a class="dhs-cta tnb-popup-trigger" role="button" tabindex="0">
					Let's Work Together <?php echo $angle_right_svg; ?>
				</a>
			</div>
			<div class="dhs-right">
				<div class="dhs-main-grid">
					<?php foreach ( $industries as $item ) : ?>
					<div class="dhs-single-box">
						<img
							src="<?php echo esc_url( $base . '/digital-marketing/' . $item['src'] ); ?>"
							width="<?php echo esc_attr( $item['w'] ); ?>"
							height="<?php echo esc_attr( $item['h'] ); ?>"
							alt="<?php echo esc_attr( $item['alt'] ); ?>"
							loading="lazy" decoding="async"
						>
						<h5><?php echo esc_html( $item['label'] ); ?></h5>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
