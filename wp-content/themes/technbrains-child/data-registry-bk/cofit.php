<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => 'Cofit | TechnBrains',
			'description' => 'CoFit365 is a hybrid app that builds social connection, boosts wellness, and supports communities by addressing isolation and inactivity with smart technology.',
			'url'         => 'https://www.technbrains.com/case-studies/cofit',
		),
	),
	'mock_data'  => array(

		'cofit' => array(
			'slider_list' => array(
				array( 'img_src' => '/case-studies/cofit/megaphone.png',     'para_text' => 'No Ads' ),
				array( 'img_src' => '/case-studies/cofit/meeting.png',        'para_text' => 'Meetups Management' ),
				array( 'img_src' => '/case-studies/cofit/online-class.png',   'para_text' => 'Live Meetups' ),
				array( 'img_src' => '/case-studies/cofit/file.png',           'para_text' => 'Block and Reject' ),
				array( 'img_src' => '/case-studies/cofit/appointment.png',    'para_text' => 'Meetup bookings' ),
				array( 'img_src' => '/case-studies/cofit/location.png',       'para_text' => 'Location based restrictions' ),
				array( 'img_src' => '/case-studies/cofit/puzzle.png',         'para_text' => 'Direct Matches' ),
				array( 'img_src' => '/case-studies/cofit/to-do-list.png',     'para_text' => 'List Matches' ),
				array( 'img_src' => '/case-studies/cofit/run.png',            'para_text' => 'Socket' ),
				array( 'img_src' => '/case-studies/cofit/bell.png',           'para_text' => 'Push Notifications' ),
				array( 'img_src' => '/case-studies/cofit/live-chat.png',      'para_text' => 'Live Chat' ),
				array( 'img_src' => '/case-studies/cofit/verified.png',       'para_text' => 'Availability Schedule Management' ),
				array( 'img_src' => '/case-studies/cofit/gift.png',           'para_text' => 'Surprise Me' ),
				array( 'img_src' => '/case-studies/cofit/gender.png',         'para_text' => 'Age/ Gender / City / Activity based Matches' ),
				array( 'img_src' => '/case-studies/cofit/link.png',           'para_text' => 'Individual / Group Activity Matches' ),
				array( 'img_src' => '/case-studies/cofit/feedback.png',       'para_text' => 'Rating/ Feedback' ),
				array( 'img_src' => '/case-studies/cofit/chat.png',           'para_text' => 'One to One Chat' ),
				array( 'img_src' => '/case-studies/cofit/heart.png',          'para_text' => 'Mark User Favorite / UnFavorite' ),
				array( 'img_src' => '/case-studies/cofit/location-track.png', 'para_text' => 'Location Tracking/ Safety Link sharing' ),
				array( 'img_src' => '/case-studies/cofit/setting.png',        'para_text' => 'Administration' ),
			),
			'screen_list' => array(
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-1.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-2.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-3.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-4.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-5.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-1.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-2.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-3.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-4.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-5.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-1.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-2.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-3.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-4.webp' ),
				array( 'img_src' => '/case-studies/cofit/Cofit-Slide-5.webp' ),
			),
		),

		'case_study_floating_buttons' => array(
			'play_store_link' => 'https://play.google.com/store/apps/details?id=com.newcofit365&hl=en',
			'app_store_link'  => 'https://apps.apple.com/us/app/cofit-365/id6443740496',
		),

	),
	'components' => array(
		array( 'name' => 'Cofit',                    'modifier_class' => '' ),
		array( 'name' => 'CaseStudyFloatingButtons', 'modifier_class' => '' ),
		array( 'name' => 'CaseStudiesSlider',        'modifier_class' => '' ),
		array( 'name' => 'main-cta',                 'modifier_class' => '' ),
	),
);
