<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => 'Plate Talk | TechnBrains',
			'description' => 'PlateTalk app, developed by TechnBrains, simplifies vehicle management, connects drivers, enhances safety, and combines transport tech with social features.',
			'url'         => 'https://www.technbrains.com/case-studies/plate-talk',
		),
	),
	'mock_data'  => array(
		'plate_features' => array(
			'box_listing' => array(
				array( 'img' => 'f1.png', 'w' => 46, 'h' => 46, 'title' => 'Build For',   'content' => 'Android/iOS' ),
				array( 'img' => 'f2.png', 'w' => 38, 'h' => 39, 'title' => 'Country',     'content' => 'United States' ),
				array( 'img' => 'f3.png', 'w' => 40, 'h' => 40, 'title' => 'Industry',    'content' => 'Tattoo and Art' ),
				array( 'img' => 'f4.png', 'w' => 40, 'h' => 40, 'title' => 'Technology',  'content' => 'Flutter & Node.js' ),
				array( 'img' => 'f5.png', 'w' => 38, 'h' => 38, 'title' => 'Integration', 'content' => 'Real-time sharing, Location services, Vehicle management systems' ),
			),
			'side_img' => '/case-studies/plate-talk/sideFeature.webp',
			'img_w'    => 724,
			'img_h'    => 469,
		),
		'plate_problems' => array(
			'side_img' => '/case-studies/plate-talk/car-side.webp',
			'img_w'    => 503,
			'img_h'    => 449,
			'heading'  => 'Business Problem',
			'para'     => 'The client envisioned PlateTalk as a solution to a significant gap she personally encountered—an inability to report or share details about an accident she witnessed. This led to the creation of an app where people could connect, communicate, and manage vehicles in real time. The app aimed to fill the void in transportation communication by combining social media dynamics with vehicle tracking and management.',
		),
		'plate_key' => array(
			'box_listing' => array(
				array( 'class' => 'boxOne',   'img' => 'k2.png', 'w' => 39, 'h' => 39, 'title' => 'Location<br>Tracking',            'content' => 'A robust real-time tracking system helps users monitor their vehicles\' locations, ensuring safety and efficiency.' ),
				array( 'class' => 'boxTwo',   'img' => 'k3.png', 'w' => 39, 'h' => 28, 'title' => 'Vehicle<br>Registration',          'content' => 'Users can register their vehicles within the app, ensuring all relevant details are organized in one place.' ),
				array( 'class' => 'boxThree', 'img' => 'k4.png', 'w' => 39, 'h' => 39, 'title' => 'Real-Time<br>Messaging',           'content' => 'A social feature for instant communication between users, fostering collaboration in urgent scenarios like reporting incidents.' ),
				array( 'class' => 'boxFour',  'img' => 'k5.png', 'w' => 26, 'h' => 36, 'title' => 'Child Account<br>Associations',    'content' => 'The app allows multiple sub-users to link with a primary account, enabling family members or colleagues to stay informed about shared vehicles' ),
			),
		),
		'plate_challenge' => array(
			'box_listing' => array(
				array( 'heading' => 'User-Friendly Integration',    'para' => 'Designing a seamless interface that combined social media and vehicle management features without overwhelming users.' ),
				array( 'heading' => 'Real-Time Accuracy',           'para' => 'Ensuring the location tracking system provided precise, real-time updates with minimal delays.' ),
				array( 'heading' => 'Scalable Architecture',        'para' => 'Building a platform capable of handling multiple users and vehicles without performance issues.' ),
				array( 'heading' => 'Cross-Platform Compatibility', 'para' => 'Developing an app that functioned smoothly across devices and operating systems.' ),
			),
			'side_img' => '/case-studies/plate-talk/challenge-plate.webp',
			'img_w'    => 588,
			'img_h'    => 819,
			'heading'  => 'Key <span>Challenges</span>',
		),
		'user_flow' => array(
			'heading'   => 'PlateTalk <span>User Flow</span>',
			'thumb_img' => '/case-studies/plate-talk/plate-talk-serflow-thumb.webp',
			'full_img'  => '/case-studies/plate-talk/plate-talk-full.webp',
		),
		'plate_mockup' => array(
			'side_img'    => '/case-studies/plate-talk/all-screen.webp',
			'img_w'       => 1252,
			'img_h'       => 1360,
			'mob_listing' => array(
				array( 'img' => '/case-studies/plate-talk/pmock1.webp' ),
				array( 'img' => '/case-studies/plate-talk/pmock2.webp' ),
				array( 'img' => '/case-studies/plate-talk/pmock3.webp' ),
				array( 'img' => '/case-studies/plate-talk/pmock4.webp' ),
				array( 'img' => '/case-studies/plate-talk/pmock5.webp' ),
				array( 'img' => '/case-studies/plate-talk/pmock6.webp' ),
				array( 'img' => '/case-studies/plate-talk/pmock7.webp' ),
				array( 'img' => '/case-studies/plate-talk/pmock8.webp' ),
			),
		),
		'plate_result' => array(
			'heading'    => 'Key <span>Results</span>',
			'box_listing' => array(
				array( 'heading' => 'Successful Launch',      'para' => 'PlateTalk was successfully launched on major app stores with positive user feedback.' ),
				array( 'heading' => 'High User Engagement',   'para' => 'Achieved high adoption rates with users actively using features like real-time messaging and vehicle tracking.' ),
				array( 'heading' => 'Reliable Tracking System', 'para' => 'Delivered a robust location tracking feature with 98% accuracy in real-time updates.' ),
				array( 'heading' => 'Enhanced Communication', 'para' => 'Empowered users to instantly report incidents and connect, fostering a safer and more connected transportation ecosystem.' ),
			),
			'side_img' => '/case-studies/plate-talk/result-sde.webp',
			'img_w'    => 588,
			'img_h'    => 819,
		),
		'branding' => array(
			'img_path' => '/case-studies/plate-talk/branding.webp',
			'img_w'    => 1242,
			'img_h'    => 750,
		),
		'plate_cta' => array(
			'heading'     => 'Ready to Drive your connections further?',
			'sub_heading' => 'From concept to launch. Build your dream social media app with TechnBrains.',
			'btn_text'    => 'Contact Us Today',
			'side_img'    => '/case-studies/plate-talk/ctaside.webp',
			'img_w'       => 469,
			'img_h'       => 597,
		),
		'case_study_floating_buttons' => array(
			'play_store_link' => 'https://play.google.com/store/apps/details?id=com.platetalk&hl=en',
			'app_store_link'  => 'https://apps.apple.com/us/app/platetalk/id6702023236',
		),
	),
	'components' => array(
		array( 'name' => 'PlateBanner',             'modifier_class' => '' ),
		array( 'name' => 'PlateFeatures',           'modifier_class' => '' ),
		array( 'name' => 'PlateProblems',           'modifier_class' => '' ),
		array( 'name' => 'PlateKey',                'modifier_class' => '' ),
		array( 'name' => 'PlateChallenge',          'modifier_class' => '' ),
		array( 'name' => 'UserFlow',                'modifier_class' => 'plate-app-flow' ),
		array( 'name' => 'PlateMockup',             'modifier_class' => '' ),
		array( 'name' => 'PlateResult',             'modifier_class' => 'plateResult' ),
		array( 'name' => 'Branding',                'modifier_class' => 'plateTalk' ),
		array( 'name' => 'PlateCta',                'modifier_class' => '' ),
		array( 'name' => 'CaseStudyFloatingButtons', 'modifier_class' => '' ),
	),
);
