<?php
/**
 * Component: Case Studies Tabs Two
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['case_studies'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$heading  = $d['heading'] ?? '';
$para     = $d['para']    ?? '';

$case_studies = [
	[
		'title'    => 'Fix Car Sharer',
		'para'     => 'Fix Car Sharer struggled to attract users and drivers while ensuring safety, trust, and regulatory compliance in a competitive market. TechnBrains created a carpooling app with preference-based matchmaking, real-time tracking, and seamless payment integration to overcome these challenges.',
		'icon'     => '/revamp/home/c-1.png',
		'link'     => '/case-studies/fixcarsharer/',
		'img_src'  => '/revamp/caseStudySlider/carSharer.webp',
		'industry' => 'Mobility / Ride Sharing',
		'team_size'=> '8 engineers',
		'stack'    => 'React Native',
		'impact'   => [ [ 'count' => '30%', 'content' => 'Increase in user adoption' ], [ 'count' => '25%', 'content' => 'Reduction in service delays.' ], [ 'count' => '40%', 'content' => 'Improvement in trust and safety ratings' ] ],
	],
	[
		'title'    => 'PlateTalk',
		'para'     => 'PlateTalk aimed to bridge the gap in transportation communication by combining real-time vehicle tracking with social media features for incident reporting. TechnBrains developed a seamless app that allows users to track vehicles, manage registrations, and communicate instantly.',
		'icon'     => '/revamp/home/c-2.png',
		'link'     => '/case-studies/plate-talk/',
		'img_src'  => '/revamp/caseStudySlider/plateTalk.webp',
		'industry' => 'On-Demand',
		'team_size'=> '6 engineers',
		'stack'    => 'Flutter',
		'impact'   => [ [ 'count' => '98%', 'content' => 'Accuracy in real-time tracking' ], [ 'count' => '30%', 'content' => 'Improvement in incident reporting' ], [ 'count' => '20%', 'content' => 'Faster issue resolution' ] ],
	],
	[
		'title'    => 'QPon',
		'para'     => 'QPon struggled with raising awareness and offering a centralized discount platform for users. TechnBrains addressed this by creating a user-friendly app with personalized recommendations and targeted marketing.',
		'icon'     => '/revamp/home/c-3.png',
		'link'     => '/case-studies/qpon/',
		'img_src'  => '/revamp/caseStudySlider/qponApp.webp',
		'industry' => 'Retail',
		'team_size'=> '5 engineers',
		'stack'    => 'React Native',
		'impact'   => [ [ 'count' => '65%', 'content' => 'Boosted user engagement' ], [ 'count' => '82%', 'content' => 'Improved subscription rate' ], [ 'count' => '75%', 'content' => 'Increased app downloads' ] ],
	],
	[
		'title'    => 'Whitetail Almanac',
		'para'     => 'Whitetail Almanac sought to create a comprehensive tool for deer hunters to optimize their chances by providing accurate weather forecasts, feeding patterns, and hunting calendars. TechnBrains developed a seamless app with real-time data, ensuring hunters could plan their trips with precision and efficiency.',
		'icon'     => '/revamp/home/c-4.png',
		'link'     => '/case-studies/white-tail/',
		'img_src'  => '/revamp/caseStudySlider/whitetailAlmanac.webp',
		'industry' => 'SaaS',
		'team_size'=> '6 engineers',
		'stack'    => 'React Native',
		'impact'   => [ [ 'count' => '30%', 'content' => 'Improvement in hunting success rate' ], [ 'count' => '98%', 'content' => 'Accuracy in weather forecasts' ], [ 'count' => '40%', 'content' => 'Increase in user retention' ] ],
	],
	[
		'title'    => 'The Wedding App',
		'para'     => 'The Wedding App faced the challenge of transitioning complex web features into a seamless mobile solution that would centralize wedding planning for couples, guests, and vendors. TechnBrains developed a user-friendly app with RSVP management, vendor collaboration tools, and automated reminders to simplify the entire process.',
		'icon'     => '/revamp/home/c-5.png',
		'link'     => '/case-studies/the-wedding-app/',
		'img_src'  => '/revamp/caseStudySlider/weddingApp.webp',
		'industry' => 'Wedding Planning',
		'team_size'=> '8 engineers',
		'stack'    => 'React Native',
		'impact'   => [ [ 'count' => '30%', 'content' => 'Increase in guest engagement' ], [ 'count' => '15%', 'content' => 'Boost in client satisfaction' ], [ 'count' => '35%', 'content' => 'Reduction in vendor management time' ] ],
	],
];
?>
<section class="CaseStudiesTabsTwo">
	<div class="container">
		<div class="content">
			<div class="headContent">
				<?php if ( $heading ) : ?>
				<h2><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $para ) : ?>
				<p><?php echo esc_html( $para ); ?></p>
				<?php endif; ?>
			</div>

			<div class="caseStudyContent">
				<div class="tabs">
					<ul id="tnb-case-tabs">
						<?php foreach ( $case_studies as $i => $item ) : ?>
						<li class="<?php echo ( 0 === $i ) ? 'active' : ''; ?>" data-tab="<?php echo (int) $i; ?>">
							<img
								src="<?php echo esc_url( $img_base . $item['icon'] ); ?>"
								width="84"
								height="84"
								alt="<?php echo esc_attr( $item['title'] ); ?>"
								loading="lazy"
								decoding="async"
							>
							<span><?php echo esc_html( $item['title'] ); ?></span>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="tabContent" id="tnb-case-content">
					<?php foreach ( $case_studies as $i => $item ) : ?>
					<div class="grid <?php echo ( 0 === $i ) ? 'active' : ''; ?>" data-panel="<?php echo (int) $i; ?>">
						<div class="leftSide">
							<img
								src="<?php echo esc_url( $img_base . $item['img_src'] ); ?>"
								width="807"
								height="801"
								alt="<?php echo esc_attr( $item['title'] ); ?>"
								loading="lazy"
								decoding="async"
							>
						</div>
						<div class="rightSide">
							<div class="titleWrap">
								<h3><?php echo esc_html( $item['title'] ); ?></h3>
								<a href="<?php echo esc_url( $item['link'] ); ?>" aria-label="View <?php echo esc_attr( $item['title'] ); ?> case study">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
								</a>
							</div>
							<div class="flexInfo">
								<?php if ( ! empty( $item['industry'] ) ) : ?>
								<div class="item">
									<small>Industry</small>
									<p><?php echo esc_html( $item['industry'] ); ?></p>
								</div>
								<?php endif; ?>
								<?php if ( ! empty( $item['team_size'] ) ) : ?>
								<div class="item">
									<small>Team Size</small>
									<p><?php echo esc_html( $item['team_size'] ); ?></p>
								</div>
								<?php endif; ?>
								<?php if ( ! empty( $item['stack'] ) ) : ?>
								<div class="item">
									<small>Built With</small>
									<p><?php echo esc_html( $item['stack'] ); ?></p>
								</div>
								<?php endif; ?>
							</div>
							<p><?php echo esc_html( $item['para'] ); ?></p>
							<div class="infoWrapper">
								<?php foreach ( $item['impact'] as $impact ) : ?>
								<div class="single">
									<span><?php echo esc_html( $impact['count'] ); ?></span>
									<p><?php echo esc_html( $impact['content'] ); ?></p>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>

					<div class="btnWrapper">
						<a class="tnb-btn" href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>">
							<div class="textWrapper">
								<span class="primaryText">Browse All Case Studies</span>
								<span class="secondaryText" aria-hidden="true">Browse All Case Studies</span>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
