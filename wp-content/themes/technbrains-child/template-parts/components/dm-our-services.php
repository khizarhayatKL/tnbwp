<?php
defined( 'ABSPATH' ) || exit;

$mod  = get_query_var( 'component_modifier_classes', '' );
$base = get_stylesheet_directory_uri() . '/assets/images';

$services = array(
	array(
		'title' => 'PPC (Pay Per Click)',
		'img'   => array( 'src' => 'ppcImg.webp', 'w' => 487, 'h' => 379, 'alt' => 'PPC' ),
		'paras' => array(
			'TechnBrains is a Leading digital marketing company that offers <span>Pay Per Click (PPC) Management</span> that focuses on your overall success. It\'s a way to pay for visitors to your site instead of drawing them naturally. You may target your advertising to specific people based on their location, keywords, interests, age, gender, language, and even the device they\'re using with the help of <span>Paid social media campaigns</span>. This allows you to market your products and services to the most likely people interested in what you have to offer.',
			'Our tech-enabled <span>PPC management services</span> can bring you closer to your goals, whether you want to improve conversions, traffic for your website, or both. <span>PPC specialist</span> marketing services are one of the most effective ways to reach your most qualified audience. It gives you an advantage over competitors by allowing you to get them where they\'re already searching. With our PPC specialist, technBrains can create a tailored <span>Pay per click marketing</span> to help you increase conversions and income for your business. You need a technBrains <span>Pay Per click advertising</span> business that is experienced, makes data-driven decisions, constantly optimizes your ads, and looks at your complete funnel to help turn visits into sales to obtain a high return. Our <span>bidding strategies</span> can help you get the most Conversions, Clicks, or Impressions for your money.',
		),
	),
	array(
		'title' => 'SEO ( Search Engine Optimization)',
		'img'   => array( 'src' => 'seoImg.png', 'w' => 456, 'h' => 352, 'alt' => 'SEO' ),
		'paras' => array(
			'The term <span>"search engine optimization"</span> is known for the process of optimizing a website for search engines. In simple terms, it refers to the process of upgrading your website to boost its exposure when consumers use Google, Bing, and other search engines to look for products or services linked to your business. The higher your pages rank in search results, the more likely you are going to secure the attention of new and existing clients to your company. <span>Best SEO service provider</span> develops a unique search engine optimization strategy based on an in-depth website assessment, extensive keyword research, and competitive analysis. Our <span>Local SEO services</span> for business ensures that your website ranks for terms that maximize your return on investment.',
			'<span>Link building</span> is one of the other SEO services we do. We implement a sound backlinking strategy that successfully and sustainably increases your search engine ranking by using our connections with high-quality and relevant websites. Our <span>SEO content writing</span> will provide you with high-quality articles. We have the abilities and procedures to deliver everything from blog entries to conversion-focused web pages. <span>On-page SEO and off-page SEO</span> is the first step in increasing your site\'s exposure and traffic. We can improve the way visitors and search engines perceive your site in terms of trustworthiness, authority, popularity, and relevancy by optimizing your site for off-page SEO. <span>Technical SEO &amp; internet marketing services</span> experts at TechnBrains guarantee that your website performs at its best by addressing everything from image optimization to internal content linking, title tags, and meta descriptions. Hire a top SEO expert &amp; SEO agency to get effective results.',
		),
	),
	array(
		'title' => 'Landing pages/ Web Designs',
		'img'   => array( 'src' => 'LPWD.png', 'w' => 481, 'h' => 423, 'alt' => 'Web Design' ),
		'paras' => array(
			'<span>Landing pages</span> are an essential aspect of any internet marketing plan, whether for a bit of business or a large multinational. However, if you\'re new to online marketing, you might be wondering what landing pages are and why they\'re necessary. Continue reading to learn what a landing page is and how to make the most of it. Previously, companies with excellent products and services could get away with a lousy website. Those were the days.',
			'Your online presence is now just as vital as your physical presence. We are a website creation company at TechnBrains, and we help businesses survive in the digital age by building websites that convert visitors into customers. The number one foundation of great web design, in our opinion, should be conversion. We provide the utmost devotion and attention to conversion rate performance on every project we work on. We are motivated by the desire to create an appealing web design that provides a positive user experience. We aim to be at the forefront of lean and performance-based design. Our landing page designers have worked with various businesses throughout the world, and we\'ve accumulated a wealth of information and data on a variety of industries. We know how to create a successful web design for a variety of industries.',
		),
	),
	array(
		'title' => 'Social media marketing',
		'img'   => array( 'src' => 'socialMedia.webp', 'w' => 446, 'h' => 362, 'alt' => 'Social Media' ),
		'paras' => array(
			'We will help you expand beyond your expectations; whether you need a small digital media to support an entirely new strategy, we are here to help. We recognize that we must produce a return on your investment to keep you as a client.',
			'That\'s why we base our research and strategy on your business objectives - we create a solution that makes you money. On all <span>Custom social media brand management</span> platforms, including Facebook, Instagram, Twitter, Pinterest, and others, we assist businesses in reaching out to, connecting with, and engaging with their target audience. We have a team of intuitive minds at TechnBrains who build and manage ROI-driven <span>social media campaigns</span> for businesses. We will help you expand beyond your expectations, whether you need a little digital media support, an entirely new strategy, a review of your current plan, or to speak through choices to change the game.',
		),
	),
	array(
		'title' => 'Content marketing',
		'img'   => array( 'src' => 'contentMarketing.png', 'w' => 477, 'h' => 280, 'alt' => 'Content Marketing' ),
		'paras' => array(
			'Great <span>Content writing</span> has the power to keep your business top-of-mind for potential buyers while also establishing your industry expertise. TechnBrains <span>Content writing services</span> take the worry out of implementing your content strategy by cooperating with you to frequently publish new content throughout the web and via email, resulting in increased traffic to your website.',
			'To maintain a consistent corporate identity, we focus on consistency throughout the design of your company\'s sales brochures, social postings, landing pages, infographics, blog entries, and other media. Our copywriters collaborate with our graphic designers and digital marketers to generate material that delivers your message clearly and leaves a lasting impact on visitors to your website.',
		),
	),
);
?>
<section class="dmOurServices<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<h6>OUR SERVICES</h6>
		<h2>Full Service Digital Marketing Agency</h2>
		<?php foreach ( $services as $svc ) : ?>
		<div class="dos-grid">
			<div class="dos-left">
				<h5><?php echo esc_html( $svc['title'] ); ?></h5>
				<?php foreach ( $svc['paras'] as $para ) : ?>
				<p><?php echo wp_kses_post( $para ); ?></p>
				<?php endforeach; ?>
			</div>
			<div class="dos-right">
				<div class="dos-img">
					<img
						src="<?php echo esc_url( $base . '/digital-marketing/' . $svc['img']['src'] ); ?>"
						width="<?php echo esc_attr( $svc['img']['w'] ); ?>"
						height="<?php echo esc_attr( $svc['img']['h'] ); ?>"
						alt="<?php echo esc_attr( $svc['img']['alt'] ); ?>"
						loading="lazy" decoding="async"
					>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</section>
