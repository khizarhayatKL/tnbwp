<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => 'Built By Determination | TechnBrains',
			'description' => 'Fit Connect is a fitness app that offers personalized workouts, nutrition tools, progress tracking, and access to trainers, built for users seeking real results and guidance.',
			'url'         => 'https://www.technbrains.com/case-studies/built-by-determination',
		),
	),
	'mock_data'  => array(),
	'components' => array(
		array( 'name' => 'BuiltByDetermination', 'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'CaseStudiesSlider',      'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'main-cta',             'modifier_class' => '', 'args' => array() ),
	),
);
