<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(),
	'mock_data'  => array(
		'fitforgolf' => array(
			'app_slides'   => array(
				array( 'img_src' => '/case-studies/fitforgolf/01.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/02.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/03.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/04.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/05.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/01.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/02.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/03.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/04.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/05.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/01.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/02.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/03.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/04.webp' ),
				array( 'img_src' => '/case-studies/fitforgolf/05.webp' ),
			),
			'tech_items'   => array(
				array( 'icon' => 'technology.png',   'w' => 49, 'h' => 49, 'label' => 'Technology',         'text' => 'LEMP Stack, Laravel, AWS backed Hosting',                                               'link' => '' ),
				array( 'icon' => 'usa.png',          'w' => 46, 'h' => 46, 'label' => 'Region',             'text' => 'United States',                                                                          'link' => '' ),
				array( 'icon' => 'puzzle.png',       'w' => 46, 'h' => 46, 'label' => 'Industry',           'text' => 'Golf Fitness and Wellness Reinvented',                                                   'link' => '' ),
				array( 'icon' => 'techno.png',       'w' => 46, 'h' => 46, 'label' => 'Integrations',       'text' => 'Google Firebase',                                                                        'link' => '' ),
				array( 'icon' => 'globe.png',        'w' => 37, 'h' => 36, 'label' => 'Visit',              'text' => 'https://apps.apple.com/tt/app/fit-for-golf-50/id1597291027',                            'link' => 'https://apps.apple.com/tt/app/fit-for-golf-50/id1597291027' ),
				array( 'icon' => 'cloud-service.png','w' => 39, 'h' => 39, 'label' => 'Cloud Infrastructure','text' => 'AWS-backed Hosting.',                                                                   'link' => '' ),
				array( 'icon' => 'cross-platform.png','w'=> 39, 'h' => 39, 'label' => 'Platforms',          'text' => 'Native iOS, Android',                                                                    'link' => '' ),
			),
			'result_items' => array(
				array( 'icon' => 'golf.png',         'w' => 53, 'h' => 53, 'title' => 'Improved Golf Performance',   'text' => 'Users experience enhanced golf skills, leading to lower scores and more skillful gameplay.' ),
				array( 'icon' => 'weights.png',      'w' => 53, 'h' => 53, 'title' => 'Increased Physical Fitness',  'text' => 'The app doubles as a personal fitness trainer, contributing to improved physical fitness and overall well-being.' ),
				array( 'icon' => 'mental-health.png','w' => 53, 'h' => 53, 'title' => 'Mental Resilience',           'text' => 'Users develop mental focus, confidence, and grit, which positively impact both their golf game and daily life.' ),
				array( 'icon' => 'chakras.png',      'w' => 53, 'h' => 53, 'title' => 'Spiritual Well-Being',        'text' => 'The app nurtures a sense of balance and spiritual well-being, enriching the overall golfing experience.' ),
				array( 'icon' => 'community.png',    'w' => 53, 'h' => 53, 'title' => 'Engaged Community',           'text' => 'Users become part of a vibrant community where success stories are shared, friendships are formed, and support is readily available.' ),
				array( 'icon' => 'money.png',        'w' => 53, 'h' => 53, 'title' => 'Revenue Generation',          'text' => "In-app purchases and premium features ensure the app's sustainability and ongoing development." ),
			),
		),
	),
	'components' => array(
		array( 'name' => 'FitForGolf',        'modifier_class' => '' ),
		array( 'name' => 'CaseStudiesSlider', 'modifier_class' => '' ),
		array( 'name' => 'main-cta',          'modifier_class' => '' ),
	),
);
