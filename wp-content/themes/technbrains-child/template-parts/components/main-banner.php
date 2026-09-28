<?php
/**
 * Component: Main Banner (two-column: content left, image right)
 * Reads from main_banner or hero_banner data key.
 *
 * @package technbrains-child
 */

defined('ABSPATH') || exit;

$data          = get_query_var('component_data');
$d             = $data['main_banner'] ?? $data['hero_banner'] ?? array();
$img_base      = get_stylesheet_directory_uri() . '/assets/images';
$head_text     = $d['head_text']     ?? '';
$sub_head_text = $d['sub_head_text'] ?? '';
$content       = $d['content']       ?? '';
$img_src       = $d['img_src']       ?? '';
$img_width     = $d['img_width']     ?? 800;
$img_height    = $d['img_height']    ?? 600;
$img_alt       = $d['img_alt']       ?? '';
$para_text     = $d['para_text']     ?? '';
$btn_link      = $d['btn_link']      ?? ( $d['link_btn_url']   ?? '/contact-us/' );
$btn_link_text = $d['btn_link_text'] ?? ( $d['link_btn_text']  ?? 'Learn More' );
$popup_text    = $d['popup_text']    ?? ( $d['popup_btn_text'] ?? 'GET A FREE QUOTE' );

$kses = array(
	'a'      => array( 'href' => true, 'target' => true, 'rel' => true ),
	'br'     => array(),
	'em'     => array(),
	'strong' => array(),
	'span'   => array( 'class' => true ),
);

$awards = array(
	array( 'img_src' => '/awards/a1.png', 'width' => '262', 'height' => '262', 'alt' => 'AppFutura',  'link' => 'https://www.appfutura.com/companies/technbrains' ),
	array( 'img_src' => '/awards/a3.png', 'width' => '262', 'height' => '262', 'alt' => 'GoodFirms', 'link' => 'https://www.goodfirms.co/company/technbrains' ),
	array( 'img_src' => '/awards/a4.png', 'width' => '200', 'height' => '200', 'alt' => 'Clutch',    'link' => 'https://clutch.co/profile/technbrains' ),
	array( 'img_src' => '/awards/a7.png', 'width' => '200', 'height' => '200', 'alt' => 'Expertise', 'link' => 'https://www.expertise.com/ny/brooklyn/mobile-app-development#technbrains' ),
);
?>
<section class="mainBanner <?php echo esc_attr( get_query_var( 'component_modifier_classes', '' ) ); ?>">
	<div class="container">
		<div class="banner-grid">
			<div class="content">
				<?php tnb_breadcrumb_html(); ?>
				<?php if ( $head_text ) : ?>
				<h1><?php echo esc_html( $head_text ); ?></h1>
				<?php endif; ?>
				<?php if ( $sub_head_text ) : ?>
				<h4><?php echo esc_html( $sub_head_text ); ?></h4>
				<?php endif; ?>
				<?php if ( $content ) : ?>
				<p><?php echo wp_kses( $content, $kses ); ?></p>
				<?php elseif ( $para_text ) : ?>
				<div class="para-text-wrap custom-hide-more" data-read-more>
					<?php echo wp_kses_post( $para_text ); ?>
				</div>
				<?php endif; ?>
				<div class="btns">
					<?php if ( $content ) : ?>
					<a class="tnb-btn black-red" href="<?php echo esc_url( home_url( $btn_link ) ); ?>"><?php echo esc_html( $btn_link_text ); ?></a>
					<?php elseif ( $para_text ) : ?>
					<button class="tnb-btn black-red" type="button" data-read-more-btn>Read More</button>
					<?php endif; ?>
					<button class="tnb-btn slideHOv tnb-popup-trigger" type="button"><?php echo esc_html( $popup_text ); ?></button>
				</div>
				<div class="rewards">
					<ul>
						<?php foreach ( $awards as $award ) : ?>
						<li>
							<a href="<?php echo esc_url( $award['link'] ); ?>" target="_blank" rel="noopener noreferrer">
								<img
									src="<?php echo esc_url( $img_base . $award['img_src'] ); ?>"
									width="<?php echo (int) $award['width']; ?>"
									height="<?php echo (int) $award['height']; ?>"
									alt="<?php echo esc_attr( $award['alt'] ); ?>"
									loading="lazy"
									decoding="async">
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<?php if ( $img_src ) : ?>
			<div class="image">
				<img
					src="<?php echo esc_url( $img_base . $img_src ); ?>"
					width="<?php echo (int) $img_width; ?>"
					height="<?php echo (int) $img_height; ?>"
					alt="<?php echo esc_attr( $img_alt ); ?>"
					loading="eager"
					fetchpriority="high"
					decoding="async">
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
