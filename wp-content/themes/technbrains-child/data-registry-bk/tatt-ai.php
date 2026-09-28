<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => 'Tatt.AI | TechnBrains',
			'description' => 'Tatt.ai is a next-generation mobile app transforming tattoo artistry. It combines AI-driven design and seamless artist connections to bring tattoo ideas to life.',
			'url'         => 'https://www.technbrains.com/case-studies/tatt-ai',
		),
	),
	'mock_data'  => array(),
	'components' => array(
		array( 'name' => 'TattAi', 'modifier_class' => '' ),
	),
);
