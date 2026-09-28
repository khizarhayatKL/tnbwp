<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'ContactPage',
			'name'        => 'Contact Us | TechnBrains',
			'description' => 'Do you have something that you want to talk about with us? We are always there for you. See our contact info, give us a call anytime or fill the contact form, and we will get back to you at the earliest.',
			'url'         => 'https://www.technbrains.com/contact-us',
		),
	),
	'mock_data'  => array(),
	'components' => array(
		array( 'name' => 'ContactUs',   'modifier_class' => '' ),
		array( 'name' => 'ContactForm', 'modifier_class' => '' ),
		array( 'name' => 'Cta',         'modifier_class' => '' ),
		array( 'name' => 'testimonials','modifier_class' => '' ),
	),
);
