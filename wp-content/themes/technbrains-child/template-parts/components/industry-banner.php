<?php
/**
 * Component: Industry Banner — mirrors Industry/Banner/Banner.jsx
 *
 * Data key : industry_banner
 * Fields   : title, para (HTML — span/a/br), banner_img_src, banner_img_width,
 *            banner_img_height, banner_img_alt, second_button (bool),
 *            bg_image (optional), classes (right-info modifier)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data          = get_query_var( 'component_data' );
$d             = $data['industry_banner'] ?? array();
$img_base      = get_stylesheet_directory_uri() . '/assets/images';
$mod           = get_query_var( 'component_modifier_classes', '' );
$second_button = ! empty( $d['second_button'] );
$right_class   = $d['classes'] ?? '';
$bg_image      = $d['bg_image'] ?? '';

$award_list = array(
	array( 'img_src' => '/awards/a1.png', 'img_width' => '249', 'img_height' => '270', 'alt' => 'AppFutura',  'link' => 'https://www.appfutura.com/companies/technbrains' ),
	array( 'img_src' => '/awards/a3.png', 'img_width' => '348', 'img_height' => '111', 'alt' => 'GoodFirms', 'link' => 'https://www.goodfirms.co/company/technbrains' ),
	array( 'img_src' => '/awards/a4.png', 'img_width' => '210', 'img_height' => '189', 'alt' => 'Clutch',    'link' => 'https://clutch.co/profile/technbrains' ),
	array( 'img_src' => '/awards/a7.png', 'img_width' => '200', 'img_height' => '200', 'alt' => 'Expertise', 'link' => 'https://www.expertise.com/ny/brooklyn/mobile-app-development#technbrains' ),
);

$kses = array(
	'span'   => array(),
	'strong' => array(),
	'a'      => array( 'href' => true ),
	'br'     => array(),
);
?>
<section class="industryBanner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>"<?php if ( $bg_image ) : ?> style="background-image:url('<?php echo esc_url( $img_base . $bg_image ); ?>')"<?php endif; ?>>
	<div class="contain">
		<div class="main-grid">
			<div class="left-info">
				<?php tnb_breadcrumb_html(); ?>
				<?php if ( ! empty( $d['title'] ) ) : ?>
				<h1><?php echo esc_html( $d['title'] ); ?></h1>
				<?php endif; ?>
				<?php if ( ! empty( $d['para'] ) ) : ?>
				<p><?php echo wp_kses( $d['para'], $kses ); ?></p>
				<?php endif; ?>
				<div class="btn-info">
					<?php if ( $second_button ) : ?>
					<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="tnb-btn black-red">Learn More</a>
					<button class="tnb-btn slideHOv tnb-popup-trigger" type="button">GET FREE QUOTE</button>
					<?php else : ?>
					<button class="tnb-btn slideHOv tnb-popup-trigger" type="button">GET A QUOTE</button>
					<?php endif; ?>
				</div>
				<div class="award-list">
					<ul>
						<?php foreach ( $award_list as $award ) : ?>
						<li>
							<a href="<?php echo esc_url( $award['link'] ); ?>" target="_blank" rel="noopener noreferrer">
								<img
									src="<?php echo esc_url( $img_base . $award['img_src'] ); ?>"
									width="<?php echo esc_attr( $award['img_width'] ); ?>"
									height="<?php echo esc_attr( $award['img_height'] ); ?>"
									alt="<?php echo esc_attr( $award['alt'] ); ?>"
									loading="lazy"
									decoding="async"
								>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<?php if ( ! empty( $d['banner_img_src'] ) ) : ?>
			<div class="right-info<?php echo $right_class ? ' ' . esc_attr( $right_class ) : ''; ?>">
				<img
					src="<?php echo esc_url( $img_base . $d['banner_img_src'] ); ?>"
					width="<?php echo esc_attr( $d['banner_img_width'] ?? '780' ); ?>"
					height="<?php echo esc_attr( $d['banner_img_height'] ?? '520' ); ?>"
					alt="<?php echo esc_attr( $d['banner_img_alt'] ?? '' ); ?>"
					loading="eager"
					fetchpriority="high"
					decoding="async"
				>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
