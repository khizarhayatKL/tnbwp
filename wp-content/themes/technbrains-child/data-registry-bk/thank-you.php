<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas'    => array(),

	'mock_data'  => array(
		'steps' => array(
			array(
				'id'    => 1,
				'title' => 'We review your request',
				'desc'  => 'We go through your details and understand what you\'re looking to build.',
			),
			array(
				'id'    => 2,
				'title' => 'We get back to you',
				'desc'  => 'You\'ll hear from us with next steps or a quick call request if needed.',
			),
			array(
				'id'    => 3,
				'title' => 'We move forward',
				'desc'  => 'If it\'s a fit, we\'ll align on the best way to build it.',
			),
		),
	),

	'components' => array(
		array( 'name' => 'ThankYouContent', 'modifier_class' => '' ),
	),

);
