<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas'    => array(),

	'components' => array(
		array( 'name' => 'hire-banner',  'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'freelance',    'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'hire-cta',     'modifier_class' => '', 'args' => array( 'data_key' => 'hire_cta_1' ) ),
		array( 'name' => 'hire-tab',     'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'hire-choose',  'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'hire-table',   'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'hire-cta',     'modifier_class' => '', 'args' => array( 'data_key' => 'hire_cta_2' ) ),
		array( 'name' => 'steps-hire',   'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'hire',         'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'main-cta',     'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'main-faqs',    'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'testimonials', 'modifier_class' => '', 'args' => array() ),
	),

	'mock_data' => array(

		'banner' => array(
			'head_text'   => 'Hire Laravel Developer - Laravel Experts for Web Development',
			'para_text'   => 'Looking to hire Laravel developer? Look no further. Our experienced team specializes in developing custom web applications using Laravel\'s powerful features. Whether you need an e-commerce platform or a content management system, we have got you covered. Find the perfect Laravel developer for your project\'s success.',
			'span_text'   => 'Contact us now to hire expert Laravel developer and turn your ideas into reality. Let us build something exceptional together!',
			'form_title'  => 'Deploy Laravel Projects',
			'form_para'   => 'With Top Laravel Developers we are here to launch your app with a bang!',
			'banner_list' => array(
				array( 'li_list' => 'Proficient in object-oriented PHP and Laravel 10 PHP Framework.' ),
				array( 'li_list' => 'Instant access to pre-vetted and experienced Laravel Developers' ),
				array( 'li_list' => 'Knowledgeable in Laravel AirLock, Routing Speed, Blade Components.' ),
				array( 'li_list' => 'Interacting with API, MicroServices, and Serverless Deployments.' ),
				array( 'li_list' => 'Code versioning tools like Git, GitHub, GitLab, and SVN.' ),
				array( 'li_list' => 'Laravel extensions such as Vapor, Forge, Horizon, Echo, Lumen, Spark, Valet, Sanctum, and Sail.' ),
				array( 'li_list' => 'Skilled in Angular, Vue, React, and other JS Technologies.' ),
			),
		),

		'freelance' => array(
			'img_src'    => '/hire/laravel/freelance-banner.png',
			'img_width'  => 512,
			'img_height' => 612,
			'img_alt'    => 'freelance-banner',
			'head_text'  => 'Don\'t Dream It, Build It<br><span>Partner with Our Freelance Developers!</span>',
			'para_text'  => 'Take your project to the next level, hire top freelance developers now! hire laravel developers to bring expertise and innovation to your projects, delivering outstanding results.<br><br>With our top-notch Laravel development services, you can accelerate development, enhance user experiences, and ultimately boost revenue.<br><br>Whether you are looking for web development, hire expert laravel developer, or any other digital solution, our freelance developers are here to make it happen. Let us collaborate and bring your vision to life!',
			'head1'      => '10+',
			'para1'      => 'Years of Experience',
			'head2'      => '350+',
			'para2'      => 'Happy Clients',
			'head3'      => '250+',
			'para3'      => 'Experienced Developers',
		),

		'hire_cta_1' => array(
			'title'               => 'LOOKING TO PARTNER WITH US?',
			'para'                => 'Prepare For a Genuine Business Partnership',
			'primary_button'      => true,
			'secondary_button'    => true,
			'primary_btn_title'   => 'Book a Consultation',
			'primary_btn_popup'   => true,
			'secondary_btn_title' => 'LET\'s Talk',
		),

		'hire_tab' => array(
			'sub_head' => 'Explore Our Flexible Engagement Models to Hire Software Developers',
			'para_text'=> 'Discover our adaptable engagement models for hiring skilled software developers. Tailor your team to your project\'s needs with ease.',
			'tab_list' => array(
				array(
					'key'       => 'tab-1',
					'label'     => 'Fixed-Price',
					'title'     => 'Fixed-Price',
					'tab_heads' => array(
						array( 'text' => 'For Whom',          'texttwo' => 'Early Startups to SMB' ),
						array( 'text' => 'Size of Project',   'texttwo' => 'Small' ),
						array( 'text' => 'Requirements',      'texttwo' => 'Define' ),
						array( 'text' => 'Client\'s Control', 'texttwo' => 'Very Little' ),
						array( 'text' => 'Flexibility',       'texttwo' => 'No' ),
						array( 'text' => 'When to Choose',    'texttwo' => 'Project specifications are clearly defined and unlikely to change' ),
						array( 'text' => 'Rates',             'texttwo' => 'One Time' ),
					),
					'src' => '/hire/tab-1.png', 'width' => 227, 'height' => 180, 'alt' => 'Fixed-Price',
				),
				array(
					'key'       => 'tab-2',
					'label'     => 'Time and Material',
					'title'     => 'Time and Material',
					'tab_heads' => array(
						array( 'text' => 'For Whom',          'texttwo' => 'SMB to Mid-Size' ),
						array( 'text' => 'Size of Project',   'texttwo' => 'Small to Medium' ),
						array( 'text' => 'Requirements',      'texttwo' => 'Evolving' ),
						array( 'text' => 'Client\'s Control', 'texttwo' => 'Significant' ),
						array( 'text' => 'Flexibility',       'texttwo' => 'Yes' ),
						array( 'text' => 'When to Choose',    'texttwo' => 'The full scope of the project is unknown, and requirements are likely to change.' ),
						array( 'text' => 'Rates',             'texttwo' => 'One Time' ),
					),
					'src' => '/hire/tab-3.png', 'width' => 227, 'height' => 180, 'alt' => 'Time and Material',
				),
				array(
					'key'       => 'tab-3',
					'label'     => 'Dedicated Resources / Teams',
					'title'     => 'Dedicated Resources / Teams',
					'tab_heads' => array(
						array( 'text' => 'For Whom',          'texttwo' => 'SMB to Enterprises' ),
						array( 'text' => 'Size of Project',   'texttwo' => 'Medium to Large' ),
						array( 'text' => 'Requirements',      'texttwo' => 'Evolving' ),
						array( 'text' => 'Client\'s Control', 'texttwo' => 'Full Control' ),
						array( 'text' => 'Flexibility',       'texttwo' => 'Yes' ),
						array( 'text' => 'When to Choose',    'texttwo' => 'When seeking in-demand tech talent, replacements, or gaps within the project team' ),
						array( 'text' => 'Rates',             'texttwo' => 'Monthly' ),
					),
					'src' => '/hire/tab-2.png', 'width' => 227, 'height' => 180, 'alt' => 'Dedicated Resources / Teams',
				),
				array(
					'key'       => 'tab-4',
					'label'     => 'Build, Operate, Transfer',
					'title'     => 'Build, Operate, Transfer',
					'tab_heads' => array(
						array( 'text' => 'For Whom',          'texttwo' => 'Funded Startups to Large Enterprises' ),
						array( 'text' => 'Size of Project',   'texttwo' => 'Medium to Large' ),
						array( 'text' => 'Requirements',      'texttwo' => 'Evolving' ),
						array( 'text' => 'Client\'s Control', 'texttwo' => 'Full Control' ),
						array( 'text' => 'Flexibility',       'texttwo' => 'Yes' ),
						array( 'text' => 'When to Choose',    'texttwo' => 'Clients who want to build & manage affordable offshore remote dev teams with scalability' ),
						array( 'text' => 'Rates',             'texttwo' => 'Monthly/Quarterly' ),
					),
					'src' => '/hire/tab-4.png', 'width' => 227, 'height' => 180, 'alt' => 'Build, Operate, Transfer',
				),
			),
		),

		'hire_choose' => array(
			'sub_head'    => 'Why Hire Laravel Developer From TechnBrains?',
			'para_text'   => 'Hire a Laravel developer from TechnBrains for expert, scalable, and customized solutions. Our professional developers ensure secure, cost-effective development with a track record of successful projects. Position your digital endeavors for long-term success.',
			'choose_list' => array(
				array( 'src' => '/hire/laravel/image1.png', 'width' => 88, 'height' => 88, 'head' => 'Silicon Valley-Caliber vetting', 'para' => 'Only 2.3% of freelance developers pass our technical & behavioral assessments.' ),
				array( 'src' => '/hire/laravel/image2.png', 'width' => 88, 'height' => 88, 'head' => 'Trusted global talent pool',     'para' => 'Access the hidden gem software developers outside your local area.' ),
				array( 'src' => '/hire/laravel/image3.png', 'width' => 88, 'height' => 88, 'head' => 'Hire 4x faster',                 'para' => 'Make a hire in as little as 72 hours (freelance) or 14 days (permanent full-time).' ),
			),
		),

		'hire_table' => array(
			'sub_head'   => 'Why hire Laravel developers from TechnBrains?',
			'para_text'  => 'Unlock the secret to web excellence with TechnBrains\' Laravel developers. From code to sculpting seamless user experiences, our software developers turn digital dreams into reality. Choose TechnBrains for innovation, efficiency, and unmatched expertise in Laravel development.',
			'table_list' => array(
				array( 'id' => 1,  'hiring' => 'Time to Get Right Developers',          'in_house' => '4 - 12 weeks',     'technbrains' => '1 day - 2 weeks',                     'freelancer' => '1 - 12 weeks' ),
				array( 'id' => 2,  'hiring' => 'Time to Start a Project',                'in_house' => '2 - 10 weeks',     'technbrains' => '1 day - 2 weeks',                     'freelancer' => '1 - 10 weeks' ),
				array( 'id' => 3,  'hiring' => 'Recurring Cost of Training & Benefits',  'in_house' => '$10,000 - $30,000', 'technbrains' => '0',                                   'freelancer' => '0' ),
				array( 'id' => 4,  'hiring' => 'Time to Scale Size of the Team',         'in_house' => '4 - 16 weeks',     'technbrains' => '48 hours - 1 week',                   'freelancer' => '1 - 12 weeks' ),
				array( 'id' => 5,  'hiring' => 'Pricing (weekly average)',                'in_house' => '2.5 X',            'technbrains' => '1.5 X',                               'freelancer' => '1 X' ),
				array( 'id' => 6,  'hiring' => 'Project Failure Risk',                   'in_house' => 'Low',              'technbrains' => 'Extremely low, we have a 98% success ratio', 'freelancer' => 'Very High' ),
				array( 'id' => 7,  'hiring' => 'Developers Backed by a Delivery Team',   'in_house' => 'Some',             'technbrains' => 'Yes',                                 'freelancer' => 'No' ),
				array( 'id' => 8,  'hiring' => 'Dedicated Resources',                    'in_house' => 'Yes',              'technbrains' => 'Yes',                                 'freelancer' => 'No' ),
				array( 'id' => 9,  'hiring' => 'Shadow Resource',                         'in_house' => 'Costly',           'technbrains' => 'Yes',                                 'freelancer' => 'No' ),
				array( 'id' => 10, 'hiring' => 'Project Manager',                         'in_house' => 'Extra Cost',       'technbrains' => 'Minimal cost',                        'freelancer' => 'No' ),
				array( 'id' => 11, 'hiring' => 'Quality Assurance Check',                 'in_house' => 'Extra Cost',       'technbrains' => 'Assured',                             'freelancer' => 'No' ),
				array( 'id' => 12, 'hiring' => 'Query Support',                           'in_house' => 'High',             'technbrains' => '24 Hours Assurance',                  'freelancer' => 'No' ),
				array( 'id' => 13, 'hiring' => 'Tools & Environment Depend on Team',     'in_house' => 'High',             'technbrains' => 'Uncertain',                           'freelancer' => 'Uncertain' ),
				array( 'id' => 14, 'hiring' => 'Agile Development Methodology',           'in_house' => 'May Be',           'technbrains' => 'Yes',                                 'freelancer' => 'No' ),
				array( 'id' => 15, 'hiring' => 'Impact Due to Turnover',                  'in_house' => 'High',             'technbrains' => 'None',                                'freelancer' => 'High' ),
				array( 'id' => 16, 'hiring' => 'Structured Training Programs',            'in_house' => 'Some',             'technbrains' => 'Yes',                                 'freelancer' => 'No' ),
				array( 'id' => 17, 'hiring' => 'Communications',                          'in_house' => 'Seamless',         'technbrains' => 'Seamless',                            'freelancer' => 'Uncertain' ),
				array( 'id' => 18, 'hiring' => 'Termination Costs',                       'in_house' => 'High',             'technbrains' => 'None',                                'freelancer' => 'None' ),
				array( 'id' => 19, 'hiring' => 'Assured Work Rigor',                      'in_house' => '40 hrs/week',      'technbrains' => '40 hrs/week',                         'freelancer' => 'Not Sure' ),
			),
		),

		'hire_cta_2' => array(
			'title'             => 'READY TO START YOUR DREAM PROJECT?',
			'para'              => 'WE HAVE A TEAM TO GET YOU THERE.',
			'primary_button'    => true,
			'secondary_button'  => false,
			'primary_btn_title' => 'GET IN TOUCH',
			'primary_btn_popup' => true,
		),

		'steps_hire' => array(
			'sub_head' => 'How to hire Laravel developers to employ Laravel framework in web app development',
			'para_text'=> 'Embrace the power of Laravel framework in your web app development journey to hire Laravel developers. In Just three easy steps, we bring years of experience to the table, ensuring your projects thrive on this cutting-edge Laravel framework.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Request',   'content' => array( 'Assess project requirements, objectives and scope', 'Define a realistic budget to hire a Laravel developers' ),                              'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Interview', 'content' => array( 'Find your desired Laravel features, MVC architecture, and database management', 'Evaluate Laravel expertise and problem-solving abilities' ), 'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Hire',      'content' => array( 'Hire Laravel developer to build innovation', 'Smoothly integrate the developer into your team' ),                                            'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'Step-by-Step process to Hire Laravel developers',
			'para_text' => 'Follow our step-by-step guide to hire Laravel developers seamlessly. From defining project needs and assessing candidates to negotiating contracts, we\'ll ensure you find the right talent to bring your web development projects to life.',
			'hire_list' => array(
				array( 'number' => '01', 'head' => 'Choose your Engagement Model',       'para' => 'Full time, part time, or hourly Pick the engagement model that suits your project needs.' ),
				array( 'number' => '02', 'head' => 'Screen & Select Laravel Developers', 'para' => 'Select the most suitable candidates from the profiles of our top Laravel developers to proceed.' ),
				array( 'number' => '03', 'head' => 'Conduct One-on-One Interview',       'para' => 'Evaluate the expertise of developer by asking questions on Laravel framework and practical questions.' ),
				array( 'number' => '04', 'head' => 'Onboard Laravel Developers',         'para' => 'The chosen candidate will join your team within 24-48 hours of receiving final confirmation.' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
			'head_text' => 'We\'re here to help',
			'faq_image' => true,
			'listing'   => array(
				array( 'faqhead' => 'How long does it take to build a Laravel application?',                              'faqbody' => 'The timeline to build a Laravel application varies depending on its complexity and features. Generally, a basic Laravel project can take a few weeks, while more complex, custom solutions may require several months. For accurate estimates, consider consulting our hire dedicated Laravel developers who can assess your project\'s specific requirements.' ),
				array( 'faqhead' => 'How much does it cost to hire a Laravel Developer?',                                 'faqbody' => 'The cost of hiring a Laravel developer depends on factors like experience, project complexity, and location. Our hire Laravel developers service offers flexible engagement models to suit your budget. You can choose from a range of options, including hire dedicated Laravel developers, to find the right fit for your financial needs.' ),
				array( 'faqhead' => 'What methods do you follow for Laravel development?',                                'faqbody' => 'Our Laravel developers for hire adhere to industry best practices. We implement the Model-View-Controller (MVC) architectural pattern for clean code separation and maintainability. Agile methodologies are employed for efficient project management, ensuring timely delivery and client collaboration.' ),
				array( 'faqhead' => 'Is it Possible to migrate an existing PHP app into a Laravel PHP Application?',      'faqbody' => 'Yes, it\'s entirely possible to migrate an existing PHP application to a Laravel PHP application. Our Laravel developers for hire have expertise in migration processes. They can refactor your codebase, integrate Laravel\'s features, and ensure a smooth transition while preserving your app\'s functionality.' ),
				array( 'faqhead' => 'Why choose TechnBrains to hire Laravel developers?',                                 'faqbody' => 'TechnBrains is your ideal partner to hire dedicated Laravel developers for several reasons. Our expert team offers extensive experience in Laravel development, ensuring high-quality, secure, and scalable solutions. With flexible engagement models and competitive pricing, we cater to a wide range of budgets. Choose TechnBrains for a seamless development journey and unlock the potential of your web projects.' ),
			),
		),

	),
);
