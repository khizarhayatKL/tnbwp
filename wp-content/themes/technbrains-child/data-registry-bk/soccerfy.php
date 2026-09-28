<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => 'Soccerfy | TechnBrains',
			'description' => 'TechnBrains\' developed Soccerfy is a soccer betting app delivering real-time scores, alerts, news, and updates. It offers bettors a thrilling experience.',
			'url'         => 'https://www.technbrains.com/case-studies/soccerfy',
		),
	),
	'mock_data'  => array(),
	'components' => array(
		array( 'name' => 'Soccerfy',          'modifier_class' => '' ),
		array( 'name' => 'CaseStudiesSlider', 'modifier_class' => '' ),
		array( 'name' => 'Cta',               'modifier_class' => '' ),
	),
);
