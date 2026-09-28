<?php
/**
 * Footer bottom — link columns + copyright.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$current_path = isset( $_SERVER['REQUEST_URI'] ) ? esc_url( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '/';

$footer_menus = array(
	array(
		'title' => 'App Development',
		'items' => array(
			array( 'link' => '/ios-app-development/',        'title' => 'iOS App Development' ),
			array( 'link' => '/android-app-development/',    'title' => 'Android App Development' ),
			array( 'link' => '/custom-software-development/','title' => 'Custom Software Development' ),
			array( 'link' => '/web-app-development/',        'title' => 'Web App Development' ),
			array( 'link' => '/enterprise-app-development/', 'title' => 'Enterprise App Development' ),
		),
	),
	array(
		'title' => 'Locations',
		'items' => array(
			array( 'link' => '/locations/mobile-app-development-company-new-york-city/', 'title' => 'New York' ),
			array( 'link' => '/locations/mobile-app-development-company-dallas/',        'title' => 'Dallas' ),
			array( 'link' => '/locations/mobile-app-development-company-houston/',       'title' => 'Houston' ),
			array( 'link' => '/locations/mobile-app-development-company-austin/',        'title' => 'Austin' ),
			array( 'link' => '/locations/mobile-app-development-company-san-antonio/',   'title' => 'San Antonio' ),
		),
	),
	array(
		'title' => 'Next Gen Tech',
		'items' => array(
			array( 'link' => '/ai-development-services/',  'title' => 'Artificial Intelligence' ),
			array( 'link' => '/metaverse/',                         'title' => 'Metaverse' ),
			array( 'link' => '/augmented-reality-app-development/', 'title' => 'Augmented Reality' ),
			array( 'link' => '/blockchain-app-development/',        'title' => 'BlockChain Development' ),
			array( 'link' => '/nft-development/',                   'title' => 'NFT Development' ),
		),
	),
	array(
		'title' => 'Industries',
		'items' => array(
			array( 'link' => '/industries/healthcare-app-development/',     'title' => 'Healthcare' ),
			array( 'link' => '/industries/retail-app-development/',         'title' => 'Retail' ),
			array( 'link' => '/industries/logistics-software-development/', 'title' => 'Logistics' ),
			array( 'link' => '/industries/on-demand-app-development/',      'title' => 'On-Demand' ),
			array( 'link' => '/industries/fintech-software-development/',   'title' => 'Fintech' ),
		),
	),
	array(
		'title' => 'Engagement Models',
		'items' => array(
			array( 'link' => '/hire-dedicated-team/', 'title' => 'Dedicated Team' ),
			array( 'link' => '/fixed-price-model/',   'title' => 'Fixed Price' ),
			array( 'link' => '/staff-augmentation/',  'title' => 'Staff Augmentation' ),
		),
	),
);
?>

<div class="bottomWrapper">
	<div class="container">
		<nav class="main-footer-menu" aria-label="Footer navigation">
			<?php foreach ( $footer_menus as $section ) : ?>
				<div class="menu-grid">
					<h4><?php echo esc_html( $section['title'] ); ?></h4>
					<ul>
						<?php foreach ( $section['items'] as $item ) :
							$is_active = ( rtrim( $current_path, '/' ) === rtrim( $item['link'], '/' ) );
						?>
							<li<?php echo $is_active ? ' class="active"' : ''; ?>>
								<a href="<?php echo esc_url( home_url( $item['link'] ) ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</nav>

		<div class="copyright">
			<hr>
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> TechnBrains. All rights reserved.</p>
		</div>
	</div>
</div>
