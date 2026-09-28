<?php
defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['portfolio_banner'] ?? array();
$img       = get_stylesheet_directory_uri() . '/assets/images';
$mod       = get_query_var( 'component_modifier_classes', '' );
$allowed   = array( 'span' => array() );

$reward_list = array(
	array( 'src' => '/awards/a1.png', 'width' => '262', 'height' => '262', 'alt' => 'AppFutura',  'link' => 'https://www.appfutura.com/companies/technbrains' ),
	array( 'src' => '/awards/a3.png', 'width' => '262', 'height' => '262', 'alt' => 'GoodFirms',  'link' => 'https://www.goodfirms.co/company/technbrains' ),
	array( 'src' => '/awards/a4.png', 'width' => '200', 'height' => '200', 'alt' => 'Clutch',     'link' => 'https://clutch.co/profile/technbrains' ),
	array( 'src' => '/awards/a7.png', 'width' => '200', 'height' => '200', 'alt' => 'Expertise',  'link' => 'https://www.expertise.com/ny/brooklyn/mobile-app-development#technbrains' ),
);
?>
<section class="portfolioBanner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="pb-grid">
			<div class="pb-content">
				<?php tnb_breadcrumb_html(); ?>
				<h1><?php echo wp_kses( $d['head_text'] ?? '', $allowed ); ?></h1>
				<?php if ( ! empty( $d['content'] ) ) : ?>
				<p><?php echo esc_html( $d['content'] ); ?></p>
				<?php endif; ?>
				<div class="pb-btns">
					<button class="tnb-btn slideHOv tnb-popup-trigger pb-btn" type="button">Book a free consultation</button>
				</div>
				<div class="pb-rewards">
					<ul>
						<?php foreach ( $reward_list as $r ) : ?>
						<li>
							<a href="<?php echo esc_url( $r['link'] ); ?>" target="_blank" rel="noopener noreferrer">
								<img src="<?php echo esc_url( $img . $r['src'] ); ?>" width="<?php echo esc_attr( $r['width'] ); ?>" height="<?php echo esc_attr( $r['height'] ); ?>" alt="<?php echo esc_attr( $r['alt'] ); ?>" loading="lazy" decoding="async">
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
