<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas'    => array(),

	'mock_data'  => array(
		'plan_banner' => array(
			'head_text'   => 'Privacy Policy',
			'main_src'    => '/privacypolicy.webp',
			'main_width'  => '506',
			'main_height' => '668',
			'main_alt'    => 'privacy policy',
		),
	),

	'components' => array(
		array( 'name' => 'PlanBanner',     'modifier_class' => '' ),
		array( 'name' => 'PrivacyContent', 'modifier_class' => '' ),
	),

);
