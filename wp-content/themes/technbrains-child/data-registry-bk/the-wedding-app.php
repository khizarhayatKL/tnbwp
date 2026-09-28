<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => 'The Wedding App | TechnBrains',
			'description' => 'The Wedding App simplifies planning for couples, guests, and vendors, offering schedules, RSVPs, reminders, and seamless coordination for the big day.',
			'url'         => 'https://www.technbrains.com/case-studies/the-wedding-app',
		),
	),
	'mock_data'  => array(
		'feature_list'       => array(
			array( 'icon' => '/case-studies/wedding-app/ic-1.png', 'title' => 'Build For',   'content' => 'Android/iOS' ),
			array( 'icon' => '/case-studies/wedding-app/ic-2.png', 'title' => 'Industry',    'content' => 'Wedding Planning' ),
			array( 'icon' => '/case-studies/wedding-app/ic-3.png', 'title' => 'Region',      'content' => 'United States' ),
			array( 'icon' => '/case-studies/wedding-app/ic-4.png', 'title' => 'Technology',  'content' => 'React Native, Node.js, MySQL, Firebase' ),
			array( 'icon' => '/case-studies/wedding-app/ic-5.png', 'title' => 'Integration', 'content' => 'Twilio, SendGrid, Google Places, In-App Purchases' ),
		),
		'key_challenge_list' => array(
			array( 'title' => 'Bringing Web-Based Features to Mobile:', 'content' => 'The client\'s existing tools were web-based. Building a mobile app with similar, seamless functionality while adding unique features posed a challenge.' ),
			array( 'title' => 'Complex Guest Management System:', 'content' => 'Automating SMS reminders, managing RSVPs, and enabling in-app purchases for gifts required integration with robust third-party APIs like Twilio and SendGrid.' ),
			array( 'title' => 'Vendor and Community Collaboration:', 'content' => 'Creating a streamlined system where couples could interact with vendors and manage social media handles demanded thoughtful interface design.' ),
			array( 'title' => 'Ensuring Scalability and User-Friendliness:', 'content' => 'As weddings involve multiple stakeholders, the app had to cater to diverse users—couples, guests, and vendors—while maintaining simplicity and scalability.' ),
		),
		'result_list'        => array(
			array( 'title' => 'Seamless Mobile Transition:', 'content' => 'The Wedding App\'s mobile-first design offered a polished and intuitive experience that made wedding planning on-the-go effortless for all users.' ),
			array( 'title' => 'Comprehensive Guest Features:', 'content' => 'Guests could easily RSVP, view schedules, access flight details, and receive automated reminders, enhancing engagement and reducing logistical challenges.' ),
			array( 'title' => 'Vendor Empowerment:', 'content' => 'Vendors gained a powerful platform to showcase their services, manage inquiries, and provide real-time updates to couples.' ),
			array( 'title' => 'Enhanced Couple Experience:', 'content' => 'Couples could manage every aspect of their wedding, from their love story and social media to seating arrangements and announcements, all in one place.' ),
			array( 'title' => 'High Client Satisfaction:', 'content' => 'The client praised TechnBrains for delivering a tailored app that perfectly encapsulated their vision, empowering them to set a new standard in wedding planning.' ),
		),
		'challenge_list'     => array(
			array( 'content' => 'Transitioning complex web features to an intuitive mobile app.' ),
			array( 'content' => 'Transitioning complex web features to an intuitive mobile app.' ),
			array( 'content' => 'Ensuring seamless API integrations for reminders, guest management, and in-app purchases.' ),
		),
		'key_list'           => array(
			array( 'content' => 'Delivered a robust app praised for its user-friendly design and comprehensive features.' ),
			array( 'content' => 'Enabled seamless collaboration among couples, guests, and vendors.' ),
			array( 'content' => 'Empowered users with an intuitive and scalable wedding planning tool.' ),
		),
		'user_flow'          => array(
			'heading'   => 'The Wedding App <span>User Flow</span>',
			'thumb_img' => '/case-studies/wedding-app/thumbnail-flow.png',
			'full_img'  => '/case-studies/wedding-app/wedding-flow.webp',
		),
		'case_study_floating_buttons' => array(
			'play_store_link' => 'https://play.google.com/store/apps/details?id=com.carolinacreations.theweddingapp',
			'app_store_link'  => 'https://apps.apple.com/us/app/the-wedding-app-us/id6459477343',
		),
	),
	'components' => array(
		array(
			'name'           => 'WeddingBanner',
			'modifier_class' => '',
			'args'           => array(
				'bg_image'      => '/case-studies/wedding-app/banner-bg.webp',
				'logo'          => '/case-studies/wedding-app/wedding-logo.png',
				'logo_width'    => 195,
				'logo_height'   => 94,
				'heading'       => 'Revolutionizing Wedding <br> Planning, <span>One Click at a Time</span>',
				'para'          => 'The Wedding App is a comprehensive, user-friendly platform designed to simplify wedding planning for couples, guests, and vendors. Featuring tools for creating schedules, managing RSVPs, sending reminders, and coordinating with vendors, the app ensures a seamless experience for everyone involved in the big day. From seating charts to personalized couple stories, this app turns wedding planning into a stress-free journey.',
				'btn_title'     => 'Talk to Our Experts',
				'banner_image'  => '/case-studies/wedding-app/banner-sub.webp',
				'banner_width'  => 670,
				'banner_height' => 404,
			),
		),
		array( 'name' => 'WeddingAppFeatures', 'modifier_class' => '' ),
		array( 'name' => 'LeftRightText',      'modifier_class' => '' ),
		array( 'name' => 'KeyChallenges',      'modifier_class' => 'wedding-app-results' ),
		array( 'name' => 'KeyResults',         'modifier_class' => 'wedding-app-results' ),
		array( 'name' => 'MobileSlider',       'modifier_class' => '' ),
		array( 'name' => 'Branding',           'modifier_class' => '' ),
		array( 'name' => 'UserFlow',           'modifier_class' => 'wedding-app-flow' ),
		array( 'name' => 'ProjectBackground',  'modifier_class' => '' ),
		array( 'name' => 'BusinessProblems',   'modifier_class' => '' ),
		array(
			'name'           => 'WeddingBanner',
			'modifier_class' => 'wedding-app-footer',
			'args'           => array(
				'bg_image'      => '/case-studies/wedding-app/last-bg.webp',
				'heading'       => 'Planning a digital transformation for your business? Let TechnBrains craft a tailored solution that exceeds your expectations.',
				'btn_title'     => 'Get Started Today!',
				'banner_image'  => '/case-studies/wedding-app/banner-sub.webp',
				'banner_width'  => 670,
				'banner_height' => 404,
			),
		),
		array( 'name' => 'CaseStudyFloatingButtons', 'modifier_class' => '' ),
	),
);
