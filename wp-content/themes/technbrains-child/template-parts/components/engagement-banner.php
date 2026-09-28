<?php
/**
 * Component: Engagement Banner — mirrors EngagementModel/Banner.jsx
 *
 * Data key : engagement_banner
 * Fields   : head_text, para_text, span_text, para_two_text,
 *            banner_list[{ li_list }], form_title, form_para
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data        = get_query_var( 'component_data' );
$d           = $data['engagement_banner'] ?? array();
$img_base    = get_stylesheet_directory_uri() . '/assets/images';
$banner_list = $d['banner_list']   ?? array();
$span_text   = $d['span_text']     ?? '';
$para_two    = $d['para_two_text'] ?? '';
$mod         = get_query_var( 'component_modifier_classes', '' );

$reward_list = array(
	array(
		'img'    => '/awards/a1.png',
		'width'  => '262',
		'height' => '262',
		'alt'    => 'AppFutura',
		'link'   => 'https://www.appfutura.com/companies/technbrains/',
	),
	array(
		'img'    => '/awards/a3.png',
		'width'  => '262',
		'height' => '262',
		'alt'    => 'GoodFirms',
		'link'   => 'https://www.goodfirms.co/company/technbrains/',
	),
	array(
		'img'    => '/awards/a4.png',
		'width'  => '200',
		'height' => '200',
		'alt'    => 'Clutch',
		'link'   => 'https://clutch.co/profile/technbrains/',
	),
	array(
		'img'    => '/awards/a7.png',
		'width'  => '200',
		'height' => '200',
		'alt'    => 'Expertise',
		'link'   => 'https://www.expertise.com/ny/brooklyn/mobile-app-development#technbrains',
	),
);

static $eb_instance = 0;
$eb_instance++;
$phone_id = 'eb-phone-' . $eb_instance;
?>
<section id="form-section" class="engagementBanner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="banner-grid">
			<div class="content">
				<?php tnb_breadcrumb_html(); ?>
				<h1><?php echo esc_html( $d['head_text'] ?? '' ); ?></h1>
				<?php if ( ! empty( $d['para_text'] ) ) : ?>
				<p><?php echo wp_kses( $d['para_text'], array( 'span' => array(), 'br' => array() ) ); ?></p>
				<?php endif; ?>
				<?php if ( $span_text ) : ?>
				<span><?php echo esc_html( $span_text ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $banner_list ) ) : ?>
				<ul>
					<?php foreach ( $banner_list as $item ) : ?>
					<li><?php echo esc_html( $item['li_list'] ?? '' ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
				<?php if ( $para_two ) : ?>
				<p><?php echo esc_html( $para_two ); ?></p>
				<?php endif; ?>
				<div class="btns">
					<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="tnb-btn black-red">Learn More</a>
					<button class="tnb-btn slideHOv tnb-popup-trigger" type="button">GET FREE QUOTE</button>
				</div>
				<div class="rewards">
					<ul>
						<?php foreach ( $reward_list as $reward ) : ?>
						<li>
							<a href="<?php echo esc_url( $reward['link'] ); ?>" target="_blank" rel="noopener noreferrer">
								<img
									src="<?php echo esc_url( $img_base . $reward['img'] ); ?>"
									width="<?php echo esc_attr( $reward['width'] ); ?>"
									height="<?php echo esc_attr( $reward['height'] ); ?>"
									alt="<?php echo esc_attr( $reward['alt'] ); ?>"
									loading="lazy"
									decoding="async"
								>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="hire-form">
				<div class="form-content">
					<h2><?php echo wp_kses( $d['form_title'] ?? '', array( 'br' => array(), 'span' => array() ) ); ?></h2>
					<p><?php echo wp_kses( $d['form_para'] ?? '', array( 'br' => array(), 'span' => array() ) ); ?></p>
				</div>
				<form id="tnb-engagement-banner-form" class="bannerForm" novalidate>
					<?php wp_nonce_field( 'tnb_engagement_banner_form', 'tnb_engagement_banner_nonce' ); ?>
					<?php tnb_honeypot_field(); ?>
					<div class="inputField">
						<input type="text" name="firstName" placeholder="Enter Your Name" autocomplete="name">
					</div>
					<div class="inputField">
						<input type="email" name="cemail" placeholder="Email Address" autocomplete="email">
					</div>
					<div class="inputField eb-phone-field">
						<input
							id="<?php echo esc_attr( $phone_id ); ?>"
							type="tel"
							name="cnumber"
							placeholder="Phone Number (optional)"
							autocomplete="tel"
						>
					</div>
					<div class="inputField">
						<select name="projectTimeline" aria-label="Project timeline">
							<option value="full-time">Full Time</option>
							<option value="part-time">Part Time</option>
							<option value="hourly">Hourly</option>
						</select>
					</div>
					<div class="inputField">
						<textarea name="message" rows="4" placeholder="Message"></textarea>
					</div>
					<div id="tnb-engagement-banner-msg" class="inner-form-msg"></div>
					<div class="tnb-recaptcha-wrap">
						<?php tnb_recaptcha_field(); ?>
					</div>
					<button class="tnb-btn slideHOv" type="submit">Hire Developers Now</button>
				</form>
			</div>
		</div>
	</div>
</section>
