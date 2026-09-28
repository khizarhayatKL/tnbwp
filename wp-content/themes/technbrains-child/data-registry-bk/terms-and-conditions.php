<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas'    => array(),

	'mock_data'  => array(
		'plan_banner' => array(
			'head_text'   => 'Terms & Conditions',
			'main_src'    => '/term-bg.webp',
			'main_width'  => '562',
			'main_height' => '602',
			'main_alt'    => 'cyber-banner',
		),
	),

	'components' => array(
		array( 'name' => 'PlanBanner',    'modifier_class' => '' ),
		array( 'name' => 'TermsContent',  'modifier_class' => '' ),
	),

);
