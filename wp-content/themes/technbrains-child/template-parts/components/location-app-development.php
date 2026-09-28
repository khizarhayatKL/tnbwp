<?php
/**
 * Component: Location App Development Section — mirrors Locations/AppDevelopmentSection/AppDevelopmentSection.jsx
 *
 * Data key : app_development
 * Listing  : title, para (html), title_two, para_two, img_one, img_two,
 *            alt_one, img_width, img_height, alt_img, btn_title, btn_link
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['app_development'] ?? array();
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$kses_p   = array( 'a' => array( 'href' => true, 'class' => true ), 'strong' => array(), 'em' => array() );

static $ad_instance = 0;
$ad_instance++;
?>
<section class="sec-rePort<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php foreach ( $listing as $i => $item ) :
			$has_two   = ! empty( $item['title_two'] );
			$item_id   = 'adItem-' . $ad_instance . '-' . $i;
		?>
		<div class="main-app-sec">
			<div class="img-box">
				<div class="pic">
					<img
						class="first-img"
						src="<?php echo esc_url( $img_base . '/' . ltrim( $item['img_one'] ?? '', '/' ) ); ?>"
						width="<?php echo esc_attr( $item['img_width'] ?? '600' ); ?>"
						height="<?php echo esc_attr( $item['img_height'] ?? '700' ); ?>"
						alt="<?php echo esc_attr( $item['alt_one'] ?? '' ); ?>"
						loading="lazy"
						decoding="async"
					>
					<img
						src="<?php echo esc_url( $img_base . '/' . ltrim( $item['img_two'] ?? '', '/' ) ); ?>"
						width="623"
						height="756"
						alt="<?php echo esc_attr( $item['alt_img'] ?? '' ); ?>"
						loading="lazy"
						decoding="async"
					>
				</div>
			</div>
			<div class="caption-box">
				<div class="desc">
					<?php if ( $has_two ) : ?>
					<div class="custom-hide-more" id="<?php echo esc_attr( $item_id ); ?>">
						<h2><span><?php echo wp_kses( $item['title'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></span></h2>
						<p><?php echo wp_kses( $item['para'] ?? '', $kses_p ); ?></p>
						<h2><span><?php echo esc_html( $item['title_two'] ); ?></span></h2>
						<p><?php echo wp_kses( $item['para_two'] ?? '', $kses_p ); ?></p>
					</div>
					<?php else : ?>
					<h2><span><?php echo wp_kses( $item['title'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></span></h2>
					<p><?php echo wp_kses( $item['para'] ?? '', $kses_p ); ?></p>
					<?php endif; ?>

					<div class="custom-btn-box">
						<?php if ( ! empty( $item['btn_link'] ) ) : ?>
						<a class="tnb-btn btn" href="<?php echo esc_url( $item['btn_link'] ); ?>">
							<?php echo esc_html( $item['btn_title'] ?? '' ); ?>
						</a>
						<?php else : ?>
						<button class="tnb-btn btn tnb-popup-trigger" type="button">
							<?php echo esc_html( $item['btn_title'] ?? '' ); ?>
						</button>
						<?php endif; ?>

						<?php if ( $has_two ) : ?>
						<button
							class="tnb-btn btn"
							type="button"
							data-ad-toggle="<?php echo esc_attr( $item_id ); ?>"
						>Read More</button>
						<?php else : ?>
						<a href="tel:+18338886032" class="custom-btn">
							<span class="text">call now</span>
							<span class="line -right"></span>
							<span class="line -top"></span>
							<span class="line -left"></span>
							<span class="line -bottom"></span>
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</section>
