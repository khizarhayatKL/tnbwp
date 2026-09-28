<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => 'Streamline Live | TechnBrains',
			'description' => 'Streamline Live by TechnBrains is a social media app for the USA market, using React Native, Node.js, and MongoDB for location-based content sharing and real-time engagement.',
			'url'         => 'https://www.technbrains.com/case-studies/streamline-live',
		),
	),
	'mock_data'  => array(),
	'components' => array(
		array( 'name' => 'StreamlineLive',    'modifier_class' => '' ),
		array( 'name' => 'CaseStudiesSlider', 'modifier_class' => '' ),
		array( 'name' => 'Cta',               'modifier_class' => '' ),
	),
);
