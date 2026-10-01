<?php

/**
 * Mobile header — hamburger + slide-out accordion nav.
 * Nav items match desktop #hp-nav: Hire Developers · Services · Industries
 *                                   · Case Studies · About · Blogs
 * Hidden on desktop via CSS (min-width: 992px).
 *
 * @package technbrains-child
 */
defined('ABSPATH') || exit;

$current_path = isset($_SERVER['REQUEST_URI']) ? esc_url(wp_unslash($_SERVER['REQUEST_URI'])) : '/';

/* ── Hire Developers sub-menus ─────────────────────────────────────────────── */
$hire_mobile = array(
	array('href' => '/hire-ios-developer/',          'label' => 'Hire iOS Developer'),
	array('href' => '/hire-react-native-developer/', 'label' => 'Hire React Native Developer'),
	array('href' => '/hire-android-developer/',      'label' => 'Hire Android Developer'),
	array('href' => '/hire-swift-developer/',        'label' => 'Hire Swift Developer'),
	array('href' => '/hire-flutter-developer/',      'label' => 'Hire Flutter Developer'),
);
$hire_frontend = array(
	array('href' => '/hire-reactjs-developer/',    'label' => 'Hire ReactJS Developer'),
	array('href' => '/hire-javascript-developer/', 'label' => 'Hire JavaScript Developer'),
	array('href' => '/hire-angularjs-developer/',  'label' => 'Hire AngularJS Developer'),
);
$hire_backend = array(
	array('href' => '/hire-nodejs-developer/',  'label' => 'Hire NodeJS Developer'),
	array('href' => '/hire-laravel-developer/', 'label' => 'Hire Laravel Developer'),
	array('href' => '/hire-python-developer/',  'label' => 'Hire Python Developer'),
	array('href' => '/hire-java-developer/',    'label' => 'Hire Java Developer'),
	array('href' => '/hire-php-developer/',     'label' => 'Hire PHP Developer'),
);

/* ── Services sub-menus ────────────────────────────────────────────────────── */
$svc_services = array(
	array('href' => '/mobile-app-development/',         'label' => 'Mobile Development'),
	array('href' => '/android-app-development/',        'label' => 'Android App Development'),
	array('href' => '/ios-app-development/',            'label' => 'iOS App Development'),
	array('href' => '/custom-software-development/',    'label' => 'Custom Software Development'),
	array('href' => '/saas-application-development/', 'label' => 'SaaS'),
	array('href' => '/enterprise-app-development/',     'label' => 'Enterprise App Development'),
	array('href' => '/web-app-development/',            'label' => 'Web App Development'),
	array('href' => '/wordpress-development/',      'label' => 'WordPress Development'),
  	array('href' => '/ui-ux-design/',                    'label' => 'UI/UX Design'),
	array('href' => '/ai-development-services/', 'label' => 'AI Development'),
);
$svc_platforms = array(
	array('href' => '/platforms/salesforce-consultants/',       'label' => 'Salesforce Consulting'),
	array('href' => '/platforms/servicenow-services/',          'label' => 'ServiceNow Services'),
	array('href' => '/platforms/sitecore-consulting/',          'label' => 'Sitecore Consulting'),
	array('href' => '/platforms/mulesoft-consulting/',          'label' => 'Mulesoft Integration'),
	array('href' => '/platforms/power-bi-consulting/',          'label' => 'Power BI Consulting'),
	array('href' => '/platforms/odoo-development-company/',               'label' => 'Odoo Development'),
	array('href' => '/platforms/shopify-development-services/', 'label' => 'Shopify'),
	array('href' => '/platforms/woocommerce-development-company/', 'label' => 'WooCommerce'),
);
$svc_engagement = array(
	array('href' => '/staff-augmentation/',  'label' => 'Staff Augmentation'),
	array('href' => '/hire-dedicated-team/', 'label' => 'Dedicated Team'),
	array('href' => '/software-outsourcing/', 'label' => 'Software Outsourcing'),
);
$svc_emerging = array(
	array('href' => '/iot-services/',                      'label' => 'Internet of Things (IoT)'),
	array('href' => '/augmented-reality-app-development/', 'label' => 'Augmented Reality Development'),
	array('href' => '/blockchain-app-development/',        'label' => 'Blockchain Development'),
	array('href' => '/metaverse/',                         'label' => 'Metaverse Development'),
	array('href' => '/cybersecurity/',                     'label' => 'Cybersecurity'),
	array('href' => '/support-maintenance/',               'label' => 'Support & Maintenance'),
	array('href' => '/seo-services/',               'label' => 'Search Engine Optimization (SEO)'),
	array('href' => '/digital-marketing/',               'label' => 'Digital Marketing'),
);

/* ── Industries ────────────────────────────────────────────────────────────── */
$industry_menu = array(
	array('href' => '/industries/healthcare-app-development/',             'label' => 'Healthcare'),
	array('href' => '/industries/automotive-app-development/',             'label' => 'Automotive'),
	array('href' => '/industries/fintech-software-development/',           'label' => 'Fintech'),
	array('href' => '/industries/logistics-software-development/',         'label' => 'Logistics'),
	array('href' => '/industries/real-estate-app-development/',            'label' => 'Real Estate'),
	array('href' => '/industries/on-demand-app-development/',              'label' => 'On-Demand'),
	array('href' => '/industries/education-app-development/',              'label' => 'Education'),
	array('href' => '/industries/energy-management-software-development/', 'label' => 'Energy'),
	array('href' => '/industries/retail-app-development/',                 'label' => 'Retail'),
);

/* ── About sub-menus ───────────────────────────────────────────────────────── */
$location_menu = array(
	array('href' => '/locations/mobile-app-development-company-new-york-city/', 'label' => 'New York'),
	array('href' => '/locations/mobile-app-development-company-dallas/',        'label' => 'Dallas'),
	array('href' => '/locations/mobile-app-development-company-san-antonio/',   'label' => 'San Antonio'),
	array('href' => '/locations/mobile-app-development-company-austin/',        'label' => 'Austin'),
	array('href' => '/locations/mobile-app-development-company-houston/',       'label' => 'Houston'),
);

/**
 * Render mobile sub-menu <li> items.
 */
function tnb_mobile_nav_list(array $items, string $current_path): void
{
	foreach ($items as $item) {
		$active = (rtrim($current_path, '/') === rtrim($item['href'], '/')) ? ' class="active"' : '';
		printf(
			'<li><a href="%s"%s>%s</a></li>',
			esc_url(home_url($item['href'])),
			$active,
			esc_html($item['label'])
		);
	}
}

/* Reusable down-chevron SVG */
$chev12 = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 448 512" aria-hidden="true"><path fill="currentColor" d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>';
$chev10 = '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 448 512" aria-hidden="true"><path fill="currentColor" d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>';
?>

<header class="tnb-header tnb-mobile-header">
	<div class="contain">
		<div class="main-header">

			<!-- Logo -->
			<div class="header-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" aria-label="TechnBrains Home">
					<img
						src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/logo.png'); ?>"
						width="213"
						height="40"
						alt="TechnBrains"
						loading="eager"
						fetchpriority="high">
				</a>
			</div>

			<!-- Hamburger + slide panel -->
			<div class="mobile-nav">
				<div class="main-header">
					<div class="header-top">
						<button
							class="hamburg"
							id="tnb-hamburger"
							aria-controls="tnb-mobile-menu"
							aria-expanded="false"
							aria-label="Open menu">
							<svg class="icon-bars" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512" aria-hidden="true">
								<path fill="currentColor" d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zm0 160c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zm448 160c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
							</svg>
							<svg class="icon-close" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512" aria-hidden="true">
								<path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3l105.4 105.3c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256l105.3-105.4z" />
							</svg>
						</button>
					</div>

					<nav class="header-menu" id="tnb-mobile-menu" aria-label="Mobile navigation">
						<ul>

							<!-- ── Home ────────────────────────────────────────────────── -->
							<li>
								<a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
							</li>

							<!-- ── Hire Developers ──────────────────────────────────────── -->
							<li class="has-child">
								<div class="menuDropdown">
									<a href="#" data-toggle="hire" aria-expanded="false">
										Hire Developers <?php echo $chev12; ?>
									</a>
								</div>
								<ul class="child" id="mob-hire" hidden>
<li class="mob-view-all"><a href="<?php echo esc_url(home_url('/hire-software-developers/')); ?>">Hire Software Developers</a></li>
									<li class="has-child">
										<a href="#" class="link" data-inner="hire-mobile" aria-expanded="false">
											Mobile Developers <?php echo $chev10; ?>
										</a>
										<ul id="mob-hire-mobile" hidden><?php tnb_mobile_nav_list($hire_mobile, $current_path); ?></ul>
									</li>

									<li class="has-child">
										<a href="#" class="link" data-inner="hire-frontend" aria-expanded="false">
											Frontend Developers <?php echo $chev10; ?>
										</a>
										<ul id="mob-hire-frontend" hidden><?php tnb_mobile_nav_list($hire_frontend, $current_path); ?></ul>
									</li>

									<li class="has-child">
										<a href="#" class="link" data-inner="hire-backend" aria-expanded="false">
											Backend Developers <?php echo $chev10; ?>
										</a>
										<ul id="mob-hire-backend" hidden><?php tnb_mobile_nav_list($hire_backend, $current_path); ?></ul>
									</li>
																		


								</ul>
							</li>

							<!-- ── Services ─────────────────────────────────────────────── -->
							<li class="has-child">
								<div class="menuDropdown">
									<a href="#" data-toggle="services" aria-expanded="false">
										Services <?php echo $chev12; ?>
									</a>
								</div>
								<ul class="child" id="mob-services" hidden>

									<li class="has-child">
										<a href="#" class="link" data-inner="svc-services" aria-expanded="false">
											Services <?php echo $chev10; ?>
										</a>
										<ul id="mob-svc-services" hidden><?php tnb_mobile_nav_list($svc_services, $current_path); ?><li><a href="<?php echo esc_url(home_url('/services/')); ?>">View All Services</a></li></ul>
									</li>

									<li class="has-child">
										<a href="#" class="link" data-inner="svc-platforms" aria-expanded="false">
											Platforms <?php echo $chev10; ?>
										</a>
										<ul id="mob-svc-platforms" hidden><?php tnb_mobile_nav_list($svc_platforms, $current_path); ?><li><a href="<?php echo esc_url(home_url('/platforms/')); ?>">View All Platforms</a></li></ul>
									</li>

									<li class="has-child">
										<a href="#" class="link" data-inner="svc-engagement" aria-expanded="false">
											Engagement Models <?php echo $chev10; ?>
										</a>
										<ul id="mob-svc-engagement" hidden><?php tnb_mobile_nav_list($svc_engagement, $current_path); ?></ul>
									</li>

									<li class="has-child">
										<a href="#" class="link" data-inner="svc-emerging" aria-expanded="false">
											Emerging Technologies <?php echo $chev10; ?>
										</a>
										<ul id="mob-svc-emerging" hidden><?php tnb_mobile_nav_list($svc_emerging, $current_path); ?></ul>
									</li>

								</ul>
							</li>

							<!-- ── Industries ───────────────────────────────────────────── -->
							<li class="has-child">
								<div class="menuDropdown">
									<a href="#" data-toggle="industries" aria-expanded="false">
										Industries <?php echo $chev12; ?>
									</a>
								</div>
								<ul class="child" id="mob-industries" hidden>
									<?php tnb_mobile_nav_list($industry_menu, $current_path); ?>
																		<li><a href="<?php echo esc_url(home_url('/industries/')); ?>">View All Industries</a></li>
									<!-- <li><a href="<?php // echo esc_url(home_url('/industries/')); ?>">View All Industries</a></li> -->
								</ul>
							</li>

							<!-- ── Case Studies ──────────────────────────────────────────── -->
							<li class="has-child">
								<div class="menuDropdown">
									<a href="#" data-toggle="cases" aria-expanded="false">
										Case Studies <?php echo $chev12; ?>
									</a>
								</div>
								<ul class="child" id="mob-cases" hidden>
									<li><a href="<?php echo esc_url(home_url('/case-studies/qpon/')); ?>">Qpon</a></li>
									<li><a href="<?php echo esc_url(home_url('/case-studies/fixcarsharer/')); ?>">FixCarSharer</a></li>
									<li><a href="<?php echo esc_url(home_url('/case-studies/built-by-determination/')); ?>">BuiltByDetermination</a></li>
									<li><a href="<?php echo esc_url(home_url('/case-studies/white-tail/')); ?>">White Tail Almanac</a></li>
									<li><a href="<?php echo esc_url(home_url('/case-studies/the-wedding-app/')); ?>">The Wedding App</a></li>
									<li><a href="<?php echo esc_url(home_url('/case-studies/plate-talk/')); ?>">Plate Talk</a></li>
									<!-- <li><a href="#">Preferred Ride</a></li>
									<li><a href="#">Pure&#8217;d</a></li> -->
									<li><a href="<?php echo esc_url(home_url('/case-studies/')); ?>">View All Case Studies</a></li>
								</ul>
							</li>

							<!-- ── About ────────────────────────────────────────────────── -->
							<li class="has-child">
								<div class="menuDropdown">
									<a href="#" data-toggle="about" aria-expanded="false">
										About <?php echo $chev12; ?>
									</a>
								</div>
								<ul class="child" id="mob-about" hidden>

									<li>
										<a href="<?php echo esc_url(home_url('/about-us/')); ?>" <?php echo (strpos($current_path, '/about-us') !== false) ? ' class="active"' : ''; ?>>About Us</a>
									</li>

									<li class="has-child">
										<a href="#" class="link" data-inner="about-locations" aria-expanded="false">
											Locations <?php echo $chev10; ?>
										</a>
										<ul id="mob-about-locations" hidden><?php tnb_mobile_nav_list($location_menu, $current_path); ?><li><a href="<?php echo esc_url(home_url('/locations/')); ?>">View All Locations</a></li></ul>
									</li>

									<li>
										<a href="<?php echo esc_url(home_url('/contact-us/')); ?>" <?php echo (strpos($current_path, '/contact-us') !== false) ? ' class="active"' : ''; ?>>Contact Us</a>
									</li>

								</ul>
							</li>

							<!-- ── Blogs ────────────────────────────────────────────────── -->
							<li>
								<a href="<?php echo esc_url(home_url('/blog/')); ?>" <?php echo (strpos($current_path, '/blog') !== false) ? ' class="nav-parent"' : ''; ?>>Blogs</a>
							</li>

						</ul>
					</nav>
				</div>
			</div>

		</div>
	</div>
</header>