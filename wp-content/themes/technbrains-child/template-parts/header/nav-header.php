<?php
/**
 * Desktop header — mega nav with dropdowns.
 * Hidden on mobile via CSS (max-width: 991px).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$current_path = isset( $_SERVER['REQUEST_URI'] ) ? esc_url( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '/';

// ─── Services menu data ───────────────────────────────────────────────────────
$app_menu = array(
	array( 'href' => '/mobile-app-development/',    'label' => 'Mobile Application Development' ),
	array( 'href' => '/ios-app-development/',        'label' => 'iOS App Development' ),
	array( 'href' => '/android-app-development/',    'label' => 'Android App Development' ),
	array( 'href' => '/custom-software-development/','label' => 'Custom Software Development' ),
	array( 'href' => '/web-app-development/',        'label' => 'Web App Development' ),
	array( 'href' => '/enterprise-app-development/', 'label' => 'Enterprise App Development' ),
	array( 'href' => '/devops-services/',            'label' => 'DevOps Services' ),
);
$platform_menu = array(
	array( 'href' => '/platforms/salesforce-consultants/', 'label' => 'SalesForce' ),
	array( 'href' => '/platforms/servicenow-services/',    'label' => 'ServiceNow' ),
	array( 'href' => '/platforms/sitecore-consulting/',    'label' => 'SiteCore' ),
	array( 'href' => '/platforms/mulesoft-consulting/',    'label' => 'MuleSoft' ),
	array( 'href' => '/platforms/power-bi-consulting/',    'label' => 'PowerBI' ),
	array( 'href' => '/platforms/odoo-development-company/',         'label' => 'Odoo Development' ),
);
$nextgen_menu = array(
	array( 'href' => '/ai-development-services/',  'label' => 'Artificial Intelligence' ),
	array( 'href' => '/iot-services/',                      'label' => 'Internet of Things' ),
	array( 'href' => '/augmented-reality-app-development/', 'label' => 'Augmented Reality' ),
	array( 'href' => '/blockchain-app-development/',        'label' => 'BlockChain Development' ),
	array( 'href' => '/nft-development/',                   'label' => 'NFT Development' ),
	array( 'href' => '/metaverse/',                         'label' => 'Metaverse' ),
	array( 'href' => '/cybersecurity/',                     'label' => 'CyberSecurity' ),
);
$engagement_menu = array(
	array( 'href' => '/hire-dedicated-team/', 'label' => 'Dedicated Team' ),
	array( 'href' => '/software-outsourcing/',   'label' => 'Fixed Price' ),
	array( 'href' => '/staff-augmentation/',  'label' => 'Staff Augmentation' ),
);
$optimization_menu = array(
	array( 'href' => '/quality-assurance/',   'label' => 'Quality Assurance' ),
	array( 'href' => '/support-maintenance/', 'label' => 'Support & Maintenance' ),
);
$digital_menu = array(
	array( 'href' => '/seo-services/',    'label' => 'SEO Optimization' ),
	array( 'href' => '/digital-marketing/','label' => 'Digital Marketing' ),
);

// ─── Technology menu data ─────────────────────────────────────────────────────
$stack_menu = array(
	array( 'href' => '/technologies/react-native-app-development/', 'label' => 'React Native Development' ),
	array( 'href' => '/technologies/flutter-app-development/',      'label' => 'Flutter Development' ),
	array( 'href' => '/technologies/angular-development/',          'label' => 'Angular Development' ),
	array( 'href' => '/technologies/reactjs-development/',          'label' => 'ReactJS Development' ),
	array( 'href' => '/technologies/php-development/',              'label' => 'PHP Development' ),
	array( 'href' => '/technologies/html5-app-development/',        'label' => 'HTML5 Development' ),
	array( 'href' => '/technologies/java-development/',             'label' => 'Java Development' ),
	array( 'href' => '/technologies/net-development/',              'label' => '.Net Development' ),
	array( 'href' => '/technologies/python-development/',           'label' => 'Python Development' ),
	array( 'href' => '/technologies/nodejs-development/',           'label' => 'Node.JS Development' ),
);
$ecommerce_menu = array(
	array( 'href' => '/platforms/woocommerce-development-company/', 'label' => 'Woocommerce' ),
	array( 'href' => '/platforms/shopify-development-services/',    'label' => 'Shopify' ),
	array( 'href' => '/platforms/adobe-commerce-development/',      'label' => 'Adobe Commerce' ),
);
$cms_menu = array(
	array( 'href' => '/wordpress-development/',  'label' => 'Wordpress' ),
	array( 'href' => '/figma-design/',           'label' => 'Figma' ),
	array( 'href' => '/flutterflow-development/','label' => 'Flutter Flow' ),
	array( 'href' => '/web-development/',        'label' => 'Website Design & Development' ),
);

// ─── Industries menu data ─────────────────────────────────────────────────────
$industry_menu = array(
	array( 'href' => '/industries/healthcare-app-development/',          'label' => 'Healthcare' ),
	array( 'href' => '/saas-application-development/',        'label' => 'SaaS' ),
	array( 'href' => '/industries/automotive-app-development/',          'label' => 'Automotive' ),
	array( 'href' => '/industries/fintech-software-development/',        'label' => 'Fintech' ),
	array( 'href' => '/industries/logistics-software-development/',      'label' => 'Logistics' ),
	array( 'href' => '/industries/real-estate-app-development/',         'label' => 'Real Estate' ),
	array( 'href' => '/industries/on-demand-app-development/',           'label' => 'On-Demand' ),
	array( 'href' => '/industries/education-app-development/',           'label' => 'Education' ),
	array( 'href' => '/industries/energy-management-software-development/','label' => 'Energy' ),
	array( 'href' => '/industries/retail-app-development/',              'label' => 'Retail' ),
);

// ─── Company menu data ────────────────────────────────────────────────────────
$location_menu = array(
	array( 'href' => '/locations/mobile-app-development-company-new-york-city/', 'label' => 'New York' ),
	array( 'href' => '/locations/mobile-app-development-company-dallas/',        'label' => 'Dallas' ),
	array( 'href' => '/locations/mobile-app-development-company-austin/',        'label' => 'Austin' ),
	array( 'href' => '/locations/mobile-app-development-company-san-antonio/',   'label' => 'San Antonio' ),
	array( 'href' => '/locations/mobile-app-development-company-houston/',       'label' => 'Houston' ),
);

/**
 * Helper: render a nav link list.
 */
function tnb_render_nav_list( array $items, string $current_path ): void {
	foreach ( $items as $item ) {
		$active = ( rtrim( $current_path, '/' ) === rtrim( $item['href'], '/' ) ) ? ' cus-header-nav-active' : '';
		printf(
			'<li class="inner-info%s"><a href="%s">%s</a></li>',
			esc_attr( $active ),
			esc_url( home_url( $item['href'] ) ),
			esc_html( $item['label'] )
		);
	}
}
?>

<header class="tnb-header tnb-desktop-header">
	<div class="container">
		<div class="main-header">

			<!-- Logo -->
			<div class="header-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="TechnBrains Home">
					<img
						src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/revamp/logo-w.svg' ); ?>"
						width="266"
						height="52"
						alt="TechnBrains"
						loading="eager"
						fetchpriority="high"
					>
				</a>
			</div>

			<!-- Main nav -->
			<nav class="header-menu" aria-label="Primary navigation">
				<ul>

					<!-- Services -->
					<li class="new-li-nav li-nav">
						<a href="#" class="parent-link" aria-haspopup="true" aria-expanded="false">
							Services
							<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 448 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
						</a>
						<div class="core-services-dropdown" role="region">
							<div class="container">
								<div class="main-menu">
									<div class="menu-info">
										<h4>App Development</h4>
										<ul><?php tnb_render_nav_list( $app_menu, $current_path ); ?></ul>
									</div>
									<div class="menu-info">
										<h4>Platforms</h4>
										<ul><?php tnb_render_nav_list( $platform_menu, $current_path ); ?></ul>
									</div>
									<div class="menu-info">
										<h4>Next-Gen Services</h4>
										<ul><?php tnb_render_nav_list( $nextgen_menu, $current_path ); ?></ul>
									</div>
									<div class="menu-info">
										<h4>Engagement Models</h4>
										<ul><?php tnb_render_nav_list( $engagement_menu, $current_path ); ?></ul>
										<h4>Optimization</h4>
										<ul><?php tnb_render_nav_list( $optimization_menu, $current_path ); ?></ul>
									</div>
									<div class="menu-info">
										<h4>Digital Services</h4>
										<ul><?php tnb_render_nav_list( $digital_menu, $current_path ); ?></ul>
									</div>
								</div>
							</div>
						</div>
					</li>

					<!-- Technology -->
					<li class="new-li-nav li-nav">
						<a href="#" class="parent-link" aria-haspopup="true" aria-expanded="false">
							Technology
							<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 448 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
						</a>
						<div class="core-services-dropdown tnb-technology-dropdown" role="region">
							<div class="container">
								<div class="main-menu">
									<div class="menu-info">
										<h4>Stack</h4>
										<ul><?php tnb_render_nav_list( $stack_menu, $current_path ); ?></ul>
									</div>
									<div class="menu-info">
										<h4>Ecommerce</h4>
										<ul><?php tnb_render_nav_list( $ecommerce_menu, $current_path ); ?></ul>
									</div>
									<div class="menu-info">
										<h4>CMS</h4>
										<ul><?php tnb_render_nav_list( $cms_menu, $current_path ); ?></ul>
									</div>
								</div>
							</div>
						</div>
					</li>

					<!-- Industries -->
					<li class="new-li-nav li-nav">
						<a href="#" class="parent-link" aria-haspopup="true" aria-expanded="false">
							Industries
							<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 448 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
						</a>
						<div class="core-services-dropdown tnb-industries-dropdown" role="region">
							<div class="container">
								<div class="main-menu">
									<div class="menu-info">
										<ul><?php tnb_render_nav_list( $industry_menu, $current_path ); ?></ul>
									</div>
									<div class="right-info">
										<h4><span>Mobile App Development</span><br> for Businesses A Complete Guide</h4>
										<p>The mobile application development market is growing at a massive rate. In this ever-evolving digital landscape,</p>
										<a href="<?php echo esc_url( home_url( '/mobile-app-development/' ) ); ?>">Learn More...</a>
									</div>
								</div>
							</div>
						</div>
					</li>

					<!-- Company -->
					<li class="new-li-nav li-nav">
						<a href="#" class="parent-link" aria-haspopup="true" aria-expanded="false">
							Company
							<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 448 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
						</a>
						<div class="core-services-dropdown tnb-company-dropdown" role="region">
							<div class="container">
								<div class="main-menu">
									<div class="about-info">
										<a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"<?php echo ( strpos( $current_path, '/about-us' ) !== false ) ? ' class="nav-parent-inner"' : ''; ?>>About Us</a>
										<p>We don't just develop apps; we engineer experiences, innovate solutions, and redefine possibilities. With a legacy of over a decade, our commitment to excellence, cutting-edge technologies, and a talented team of professionals is what sets us apart.</p>
									</div>
									<div class="menu-info">
										<ul>
											<h4>Locations</h4>
											<?php tnb_render_nav_list( $location_menu, $current_path ); ?>
										</ul>
										<div class="link-info">
											<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
											<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"<?php echo ( strpos( $current_path, '/contact-us' ) !== false ) ? ' class="nav-parent-inner"' : ''; ?>>Contact us</a>
										</div>
									</div>
									<div class="right-info">
										<p>TechnBrains understands your complex needs and develops innovative ideas accordingly.</p>
										<hr>
										<div class="profile-info">
											<img
												src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/comp-testi.png' ); ?>"
												width="55"
												height="55"
												alt="Tom Fuller"
												loading="lazy"
											>
											<div>
												<h6>Tom Fuller</h6>
												<p>Founder Tomfuller.Com</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>

					<!-- Portfolio -->
					<li class="new-li-nav li-nav">
						<a
							href="<?php echo esc_url( home_url( '/case-studies' ) ); ?>"
							class="parent-link<?php echo ( strpos( $current_path, '/portfolio' ) !== false ) ? ' nav-parent' : ''; ?>"
						>Portfolio</a>
					</li>

				</ul>
			</nav>

			<!-- CTA Button -->
			<div class="header-button">
				<button
					type="button"
					class="tnb-btn slideHOv"
					id="tnb-popup-trigger"
					aria-haspopup="dialog"
				>
					<div class="textWrapper">
						<span class="primaryText">Scale My Team</span>
						<span class="secondaryText" aria-hidden="true">Scale My Team</span>
					</div>
				</button>
			</div>

		</div>
	</div>
</header>
