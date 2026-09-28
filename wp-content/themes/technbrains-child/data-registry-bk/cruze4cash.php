<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => 'Cruze4Cash | TechnBrains',
			'description' => 'Cruze4cash is a property app that connects buyers, sellers, and landlords instantly, streamlining property searches and maximizing market reach.',
			'url'         => 'https://www.technbrains.com/case-studies/cruze4cash',
		),
	),
	'mock_data'  => array(
		'cruze4cash' => array(
			'play_store_link' => 'https://play.google.com/store/apps/details?id=com.cruze4cash',
		),
	),
	'components' => array(
		array( 'name' => 'CruzeCash',        'modifier_class' => '' ),
		array( 'name' => 'CaseStudiesSlider', 'modifier_class' => '' ),
		array( 'name' => 'main-cta',          'modifier_class' => '' ),
	),
);
