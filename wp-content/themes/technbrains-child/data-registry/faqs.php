<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(),
	'mock_data'  => array(
		'plan_banner' => array(
			'head_text'   => 'Frequently Asked Questions',
			'main_src'    => '/faq.webp',
			'main_width'  => 772,
			'main_height' => 437,
			'main_alt'    => 'FAQ',
		),
		'faqs'        => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array(
					'faqhead' => 'Why should we use TechnBrains over any other agency?',
					'faqbody' => 'Our clients choose us because of our vast expertise in delivering complex app and online portal development projects. We\'ve solved a wide range of difficulties, including collaborating with existing development teams, integrating historical systems to assist new app development, developing technically complex features, and bringing systems, processes, and apps together seamlessly. Technbrains can help you if you have large ideas, complex problems, or simply want the finest from an agency.',
				),
				array(
					'faqhead' => 'Can you build apps for both iOS and Android?',
					'faqbody' => 'Yes, the majority of the apps we create are compatible with both iOS and Android devices. Because it\'s typical for customers to want their apps to function on both web and mobile devices, we employ development frameworks like React and React Native to support both platforms quickly.',
				),
				array(
					'faqhead' => 'How do you make sure that you develop the app according to my requirements?',
					'faqbody' => 'We don\'t just start constructing your app without understanding the idea of you grasping the commercial aspects that drive your project\'s demand. We want to get to a point where we can question you on the assumptions you\'ve made about the functionality you need as early as possible. We put in a lot of effort at the outset of a project to engage with you and scope out your requirements in depth after understanding your business.',
				),
				array(
					'faqhead' => 'Are you able to work with our existing technical/design/marketing team?',
					'faqbody' => 'Yes, we specialize in highly customized projects, and we frequently collaborate with existing systems and teams. We strive to develop strong collaborative relationships with other suppliers who are essential to your business, emphasizing cooperation and support for all parties involved.',
				),
				array(
					'faqhead' => 'Can you give me a fixed-price quote?',
					'faqbody' => 'We collaborate with you to establish a precise project specification before providing you with a fixed-price estimate to complete the work. This fixed price and specification safeguards you: you can rely on us to produce exactly what has been written down at the exact cost. There are no hidden fees or charges; everything is straightforward and concise.',
				),
				array(
					'faqhead' => 'Do you develop web applications?',
					'faqbody' => 'Yes, practically every mobile app we create requires a web-based application to operate behind the scenes. If you are familiar with the web app, the web server runs in the background, serving data to the app to determine if you have the authorization to log in or not.',
				),
				array(
					'faqhead' => 'Can I make changes to my app or website after its launch?',
					'faqbody' => 'Yes, we strongly advise that you start by launching the simplest possible form of your vision and then gradually improve it. Launching a "minimum viable product" is the term for this phased strategy.',
				),
			),
		),
	),
	'components' => array(
		array( 'name' => 'PlanBanner', 'modifier_class' => '' ),
		array( 'name' => 'main-faqs',  'modifier_class' => '' ),
	),
);
