<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(),
	'mock_data'  => array(
		'qpon_banner' => array(
			'info_items' => array(
				array( 'img' => '/case-studies/qpon/tag.webp',         'w' => 46, 'h' => 46, 'title' => 'Industry',     'content' => 'Business' ),
				array( 'img' => '/case-studies/qpon/map.webp',         'w' => 46, 'h' => 46, 'title' => 'Country',      'content' => 'United States' ),
				array( 'img' => '/case-studies/qpon/cpu.webp',         'w' => 46, 'h' => 46, 'title' => 'Technology',   'content' => 'React Native,<br>React JS, Node JS' ),
				array( 'img' => '/case-studies/qpon/integration.webp', 'w' => 46, 'h' => 46, 'title' => 'Integrations', 'content' => 'Payment Gateway, Social Media Integration, Promo Code Management' ),
			),
		),
		'qpon_solution' => array(
			'solutions' => array(
				array(
					'title' => 'User-Friendly Interface',
					'para'  => 'Develop an intuitive and user-friendly app interface that makes it effortless for users to browse, discover, and redeem discounts.',
				),
				array(
					'title' => 'Personalized Recommendations',
					'para'  => 'Implement an intelligent recommendation system that tailors coupon offerings based on user preferences and past activity, increasing engagement.',
				),
				array(
					'title' => 'Promo Code Integration',
					'para'  => 'Simplify the promo code redemption process, ensuring users can easily access the 14-day free trial and other promotional offers.',
				),
				array(
					'title' => 'Marketing & Awareness Campaigns',
					'para'  => 'Launch targeted marketing campaigns across various platforms to increase brand visibility and attract a wider user base.',
				),
				array(
					'title' => 'Push Notifications',
					'para'  => 'Use push notifications to remind users of expiring deals, new additions, and personalized offers, encouraging them to stay engaged.',
				),
				array(
					'title' => 'Feedback Mechanism',
					'para'  => 'Incorporate a feedback system to gather user suggestions and concerns, allowing for continuous improvement and refining of the app\'s features and functionality.',
				),
			),
		),
		'qpon_application' => array(
			'slides' => array(
				array( 'img' => '/case-studies/qpon/qpon-screen.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-food.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-places.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-acc.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-rest.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-screen.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-food.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-places.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-acc.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-rest.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-screen.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-food.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-places.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-acc.webp' ),
				array( 'img' => '/case-studies/qpon/qpon-rest.webp' ),
			),
		),
		'case_study_floating_buttons' => array(
			'app_store_link'  => 'https://apps.apple.com/us/app/qpon-app/id1658749756',
			'play_store_link' => '',
		),
	),
	'components' => array(
		array( 'name' => 'QponBanner',               'modifier_class' => '' ),
		array( 'name' => 'QponAbout',                'modifier_class' => '' ),
		array( 'name' => 'QponProblem',              'modifier_class' => '' ),
		array( 'name' => 'QponSolution',             'modifier_class' => '' ),
		array( 'name' => 'QponApplication',          'modifier_class' => '' ),
		array( 'name' => 'QponConclusion',           'modifier_class' => '' ),
		array( 'name' => 'CaseStudyFloatingButtons', 'modifier_class' => '' ),
		array( 'name' => 'CaseStudiesSlider',        'modifier_class' => '' ),
		array( 'name' => 'Cta',                      'modifier_class' => '' ),
	),
);
