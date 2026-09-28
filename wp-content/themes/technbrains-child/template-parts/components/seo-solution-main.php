<?php
defined( 'ABSPATH' ) || exit;

static $ssl_inst = 0;
$ssl_inst++;
$mod  = get_query_var( 'component_modifier_classes', '' );
$base = get_stylesheet_directory_uri() . '/assets/images';
$uid  = 'seoSolutionSlider-' . $ssl_inst;

$solutions = array(
	array( 'src' => 'seo-services/online-shop.png', 'w' => 54, 'h' => 54, 'alt' => 'Ecommerce SEO', 'title' => 'Ecommerce SEO', 'para' => "With our top-notch Ecommerce SEO solutions, we'll help you attract a flood of targeted traffic, increase conversions, and maximize your revenue. From optimizing product descriptions to implementing effective SEO strategies for your online store, we have the expertise to elevate your Ecommerce business." ),
	array( 'src' => 'seo-services/seo-icon.png',    'w' => 54, 'h' => 54, 'alt' => 'Technical SEO',  'title' => 'Technical SEO',  'para' => "Ensure your website runs like a well-oiled machine with our Technical SEO services. Our team of skilled professionals will meticulously analyze your website's structure, loading speed, and code optimization to ensure it meets all the technical requirements for search engines. Say goodbye to crawling issues and hello to higher rankings!" ),
	array( 'src' => 'seo-services/seo-scop.png',    'w' => 54, 'h' => 54, 'alt' => 'Local SEO',      'title' => 'Local SEO',      'para' => "If you're a local business, our Local SEO services are tailor-made for you. We'll optimize your website, Google My Business profile, and online directories to ensure your business appears prominently in local search results. Dominate your local market and attract customers right at their doorstep!" ),
	array( 'src' => 'seo-services/planning.png',    'w' => 54, 'h' => 54, 'alt' => 'SEO Analytics',  'title' => 'SEO Analytics',  'para' => "Use the power of SEO analytics to make informed decisions and achieve better results. Our team will provide you with comprehensive reports, in-depth keyword analysis, and valuable insights into your website's performance. Watch as your organic traffic grows and conversions soar." ),
	array( 'src' => 'seo-services/online-shop.png', 'w' => 54, 'h' => 54, 'alt' => 'Ecommerce SEO', 'title' => 'Ecommerce SEO', 'para' => "With our top-notch Ecommerce SEO solutions, we'll help you attract a flood of targeted traffic, increase conversions, and maximize your revenue. From optimizing product descriptions to implementing effective SEO strategies for your online store, we have the expertise to elevate your Ecommerce business." ),
	array( 'src' => 'seo-services/seo-icon.png',    'w' => 54, 'h' => 54, 'alt' => 'Technical SEO',  'title' => 'Technical SEO',  'para' => "Ensure your website runs like a well-oiled machine with our Technical SEO services. Our team of skilled professionals will meticulously analyze your website's structure, loading speed, and code optimization to ensure it meets all the technical requirements for search engines. Say goodbye to crawling issues and hello to higher rankings!" ),
	array( 'src' => 'seo-services/seo-scop.png',    'w' => 54, 'h' => 54, 'alt' => 'Local SEO',      'title' => 'Local SEO',      'para' => "If you're a local business, our Local SEO services are tailor-made for you. We'll optimize your website, Google My Business profile, and online directories to ensure your business appears prominently in local search results. Dominate your local market and attract customers right at their doorstep!" ),
	array( 'src' => 'seo-services/planning.png',    'w' => 54, 'h' => 54, 'alt' => 'SEO Analytics',  'title' => 'SEO Analytics',  'para' => "Use the power of SEO analytics to make informed decisions and achieve better results. Our team will provide you with comprehensive reports, in-depth keyword analysis, and valuable insights into your website's performance. Watch as your organic traffic grows and conversions soar." ),
);

$swiper_config = wp_json_encode( array(
	'slidesPerView' => 1,
	'spaceBetween'  => 0,
	'pagination'    => array( 'el' => '#' . $uid . ' .ssl-pag', 'clickable' => true ),
	'breakpoints'   => array(
		'768'  => array( 'slidesPerView' => 2 ),
		'1024' => array( 'slidesPerView' => 3 ),
	),
) );
?>
<section id="<?php echo esc_attr( $uid ); ?>" class="seoSolutionMain<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="ssl-info">
			<h2>Choose Your SEO Success Story <br>Perfect SEO services for Your Website</h2>
			<p>Are you ready to skyrocket your online presence and dominate search engine rankings? Look no further! At TechnBrains, we offer a range of top-notch SEO services designed to meet your unique needs and propel your business to new heights.</p>
		</div>
		<div class="ssl-slider-wrap">
			<div class="swiper" data-swiper="<?php echo esc_attr( $swiper_config ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $solutions as $item ) : ?>
					<div class="swiper-slide">
						<div class="ssl-main-box">
							<img
								src="<?php echo esc_url( $base . '/' . $item['src'] ); ?>"
								width="<?php echo esc_attr( $item['w'] ); ?>"
								height="<?php echo esc_attr( $item['h'] ); ?>"
								alt="<?php echo esc_attr( $item['alt'] ); ?>"
								loading="lazy" decoding="async"
							>
							<h4><?php echo esc_html( $item['title'] ); ?></h4>
							<p><?php echo esc_html( $item['para'] ); ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-pagination ssl-pag"></div>
			</div>
		</div>
	</div>
</section>
