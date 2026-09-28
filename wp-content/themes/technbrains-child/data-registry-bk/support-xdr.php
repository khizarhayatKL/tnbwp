<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'name'        => 'Support Xdr | TechnBrains',
			'description' => 'Support XDR is a web extension that filters content by keywords, helping users quickly access knowledge base, chat, and support resources online.',
			'url'         => 'https://www.technbrains.com/case-studies/support-xdr',
		),
	),
	'mock_data'  => array(),
	'components' => array(
		array( 'name' => 'SupportXdr',        'modifier_class' => '' ),
		array( 'name' => 'CaseStudiesSlider', 'modifier_class' => '' ),
		array( 'name' => 'Cta',               'modifier_class' => '' ),
	),
);
