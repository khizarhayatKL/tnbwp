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
			'head_text'   => 'Hire NodeJS Developer - NodeJS Experts for Server-Side Excellence',
			'para_text'   => 'Are you looking to automate your cognitive technological processes with AI/ML & deep learning capabilities or develop custom applications with data analysis and data science functionalities? Consider hiring a Node JS Developer from TechnBrains. As one of the leading Node JS Development Companies, we have access to top-tier Node JS software engineers who can ensure the success of your project.',
			'span_text'   => 'Hire skilled Node JS developers in the USA from a reputable IT company trusted by clients worldwide for their Node JS hiring needs.',
			'form_title'  => 'Deploy Node JS Projects',
			'form_para'   => 'With Top Node JS Developers we are here to launch your app with a bang!',
			'banner_list' => array(
				array( 'li_list' => 'Proficient in front-end technologies' ),
				array( 'li_list' => 'Skills include expertise in Django, Flask, Web2Py, and CherryPy.' ),
				array( 'li_list' => 'Proficient in using Node JS Shell for testing.' ),
				array( 'li_list' => 'Experience in TensorFlow, Matplotlib, Peewee, and more.' ),
				array( 'li_list' => 'Integrating AI/ML, Deep Learning, IoT, and other technologies.' ),
			),
		),

		'freelance' => array(
			'img_src'    => '/hire/laravel/freelance-banner.png',
			'img_width'  => 512,
			'img_height' => 612,
			'img_alt'    => 'freelance-banner',
			'head_text'  => 'TechnBrains is the Best Node JS<br><span>Development Company for You.</span>',
			'para_text'  => 'At TechnBrains, we stand as your premier choice for Node JS development, delivering excellence and innovation tailored to your needs.<br><br>Gain access to an exclusive pool of highly skilled Node JS developers who have been thoroughly screened for quality. Our flexible engagement and hiring models cater to your specific needs, giving you the freedom to work according to your time zone. You can rest assured that your confidentiality is guaranteed with a signed NDA and complete code ownership.<br><br>Our agile development approach ensures transparency in project updates and timely delivery. At the same time, our Node JS developers offer rates that are 1/4th of the market price, making them a cost-effective solution for your business. We also provide reliable maintenance and support services after deployment, as well as easy and seamless migration services.',
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
			'sub_head' => 'Flexible Engagement Models for Hiring Exceptional Node.js Developers',
			'para_text'=> 'Create decentralized apps for bitcoins with our seasoned Node.js developers at TechnBrains. Our team of prestigious and highly experienced professionals is dedicated to ensuring the secure and seamless development of Bitcoin software tailored to your unique needs.',
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
			'sub_head'    => 'Why Choose TechnBrains for Node JS Development?',
			'para_text'   => 'When it comes to expanding your team with top-notch Node.js developers, TechnBrains stands out as the optimal choice. Here\'s why you should consider TechnBrains for your Node.js development needs.',
			'choose_list' => array(
				array( 'src' => '/hire/laravel/image1.png', 'width' => 88, 'height' => 88, 'head' => 'Experienced Node.js Developers for Hire',    'para' => 'Our developers undergo rigorous screening processes to ensure they meet the highest standards in Node.js development.' ),
				array( 'src' => '/hire/laravel/image2.png', 'width' => 88, 'height' => 88, 'head' => 'Dedicated Node.js Developer Hiring',           'para' => 'This flexibility allows you to scale your team as needed, ensuring you have the right resources for your project\'s success.' ),
				array( 'src' => '/hire/laravel/image3.png', 'width' => 88, 'height' => 88, 'head' => 'Freelance and Remote Node.js Developers',       'para' => 'Whether you are looking to hire freelance Node.js developers for short-term projects or need a remote team for ongoing collaboration.' ),
			),
		),

		'hire_table' => array(
			'sub_head'   => 'Why Hire Node JS developers from TechnBrains over freelance or in-house developers?',
			'para_text'  => 'Hiring Node JS developers from TechnBrains ensures expertise, reliability, and scalability, surpassing the limitations of freelance or in-house developers. We provide skilled professionals and a proven track record for success.',
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
				array( 'id' => 13, 'hiring' => 'Tools & Environment',                     'in_house' => 'Depend on Team',   'technbrains' => 'High',                                'freelancer' => 'Uncertain' ),
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
			'sub_head' => 'Hire Node JS Developers in Just 3 Easy Steps',
			'para_text'=> 'Hiring Node JS developers is now as simple as 1-2-3 with TechnBrains. Our streamlined process allows you to hire Node JS developers in just three easy steps, ensuring a hassle-free journey from idea to app reality.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Choose your Engagement Model',   'content' => array( 'Select the engagement model that suits your project and budget.' ),                                                                                    'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Select & Pick NodeJS Developers', 'content' => array( 'Handpick NodeJS developers from our talented pool of experts and interview them for their technical expertise.' ),                                     'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Onboard NodeJS Developers',       'content' => array( 'Onboard your chosen NodeJS Developer seamlessly for a productive collaboration.' ),                                                                    'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'Tech-Stack Expertise of Our NodeJS Developers',
			'para_text' => 'Our Node JS developers are skilled in fundamental concepts and industry best practices. They leverage modern development tools to optimize and expand your web app\'s functionality.',
			'hire_list' => array(
				array( 'number' => '01', 'head' => 'Frameworks',    'para' => '● Spring<br>● Hibernate<br>● Struts<br>● Vaadin<br>● Blade<br>● JSF' ),
				array( 'number' => '02', 'head' => 'Cloud Services', 'para' => '● AWS<br>● Heroku<br>● Google Cloud<br>● Microsoft Azure<br>● Aruba Cloud<br>● OVH' ),
				array( 'number' => '03', 'head' => 'Databases',      'para' => '● Oracle<br>● MySQL<br>● MongoDB<br>● PostgreSQL<br>● Microsoft SQL Server<br>● IBM DB2' ),
				array( 'number' => '04', 'head' => 'MicroServices',  'para' => '● Dropwizard<br>● MicroProfile<br>● Micronaut<br>● JHipster<br>● Spark<br>● Vertx' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
			'head_text' => 'We\'re here to help',
			'faq_image' => true,
			'listing'   => array(
				array( 'faqhead' => 'Why should I choose Node.js over Node JS for my development projects?',                   'faqbody' => 'Node.js offers exceptional performance and scalability, making it an ideal choice for various applications. Our Node.js developers can seamlessly replace Node JS, ensuring your projects benefit from enhanced speed and efficiency.' ),
				array( 'faqhead' => 'What sets your Node.js developers apart from the rest?',                                  'faqbody' => 'Our Node.js developers for hire at TechnBrains are seasoned professionals with a proven track record. They bring expertise in developing robust, real-time applications and APIs, ensuring your project is in capable hands.' ),
				array( 'faqhead' => 'Can I hire Node.js developers on a freelance basis?',                                     'faqbody' => 'Yes, TechnBrains provides flexible hiring models, including freelance options. Tailor your team according to your project\'s needs, whether it\'s a short-term assignment or ongoing collaboration.' ),
				array( 'faqhead' => 'Do you offer the option to hire dedicated Node.js developers exclusively for my project?', 'faqbody' => 'Absolutely. We understand the need for dedicated expertise. Hire Node.js developers who will focus solely on your project, ensuring a customized and attentive approach to meet your goals.' ),
				array( 'faqhead' => 'How can I monitor and communicate with my remote Node.js developers?',                    'faqbody' => 'TechnBrains prioritizes transparent communication. You\'ll have various channels for real-time communication, regular updates, and project monitoring, ensuring you\'re always in the loop.' ),
				array( 'faqhead' => 'What industries do your Node.js developers specialize in?',                               'faqbody' => 'Our Node.js developers at TechnBrains have diverse industry experience, covering everything from fintech and e-commerce to healthcare and beyond. We match developers with expertise relevant to your project\'s domain.' ),
				array( 'faqhead' => 'Can I hire a Node.js developer for a one-time project or on an ongoing basis?',           'faqbody' => 'Yes, our hiring models are flexible. Whether you need a Node.js developer for a short-term project or long-term collaboration, TechnBrains caters to your specific needs.' ),
				array( 'faqhead' => 'How does the process of replacing Node JS with Node.js work?',                            'faqbody' => 'Our skilled Node.js developers ensure a smooth transition by understanding your existing Node JS-based system and implementing a strategic migration plan. The goal is to minimize disruptions and optimize performance.' ),
				array( 'faqhead' => 'What measures do you have in place to ensure the security of my project?',               'faqbody' => 'TechnBrains prioritizes the security of your project. Our Node.js developers adhere to best practices, implementing robust security measures to protect your applications and data.' ),
				array( 'faqhead' => 'Can I interview Node.js developers before making a decision?',                            'faqbody' => 'Yes, TechnBrains encourages client involvement. You can interview and assess potential Node.js developers to ensure they align with your project requirements and team dynamics.' ),
			),
		),

	),
);
