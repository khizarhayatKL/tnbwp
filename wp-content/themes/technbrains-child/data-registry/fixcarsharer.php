<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(),
	'mock_data'  => array(
		'case_study_floating_buttons' => array(
			'play_store_link' => 'https://play.google.com/store/apps/details?id=com.carfixsharer&hl=en',
			'app_store_link'  => 'https://apps.apple.com/us/app/fix-car-sharer/id1666244616',
		),
	),
	'components' => array(
		array( 'name' => 'FixCarSharer',            'modifier_class' => '' ),
		array( 'name' => 'CaseStudyFloatingButtons', 'modifier_class' => '' ),
		array( 'name' => 'CaseStudiesSlider',        'modifier_class' => '' ),
		array( 'name' => 'main-cta',                 'modifier_class' => '' ),
	),
);
