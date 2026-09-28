<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => '05 SPHERES OF FITS | TechnBrains',
			'description' => 'The 5 Spheres of Fit app blends data, research, and real-world insights to improve physical, mental, social, financial, and educational wellness for balanced living.',
			'url'         => 'https://www.technbrains.com/case-studies/the-5-spheres-of-fit',
		),
	),
	'mock_data'  => array(),
	'components' => array(
		array( 'name' => 'FiveSphere',        'modifier_class' => '' ),
		array( 'name' => 'CaseStudiesSlider', 'modifier_class' => '' ),
		array( 'name' => 'Cta',               'modifier_class' => '' ),
	),
);
