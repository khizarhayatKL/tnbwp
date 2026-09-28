<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => 'White Tail | TechnBrains',
			'description' => 'Whitetail Almanac is a hybrid hunting app that gives deer patterns, weather forecasts, GPS tools, and a clean, ad-free experience for smarter, safer hunts.',
			'url'         => 'https://www.technbrains.com/case-studies/white-tail',
		),
	),
	'mock_data'  => array(
		'case_study_floating_buttons' => array(
			'play_store_link' => 'https://play.google.com/store/apps/details?id=com.whitetail.almanac',
			'app_store_link'  => 'https://apps.apple.com/us/app/whitetail-almanac/id1603886153',
		),
	),
	'components' => array(
		array( 'name' => 'WhiteTail',               'modifier_class' => '' ),
		array( 'name' => 'CaseStudyFloatingButtons', 'modifier_class' => '' ),
		array( 'name' => 'CaseStudiesSlider',        'modifier_class' => '' ),
		array( 'name' => 'Cta',                      'modifier_class' => '' ),
	),
);
