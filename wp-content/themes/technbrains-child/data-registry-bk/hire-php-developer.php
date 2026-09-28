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
			'head_text'   => 'Hire PHP Developer - PHP Experts for Dynamic Web Solutions',
			'para_text'   => 'Are you in need of skilled PHP Developers to create a web app solution that is both fast and secure, with interactive and dynamic features? Look no further, as we offer the best PHP Developers for hire with proven experience and expertise in various PHP frameworks, including Laravel, CodeIgniter, Cake PHP, and more. Our developers have the skills to develop responsive PHP-based websites, mobile apps, ecommerce solutions, and CMS at cost-effective rates.',
			'span_text'   => 'To enhance your project and improve conversions, consider hiring a PHP development team or programmer from TechnBrains.',
			'form_title'  => 'Deploy PHP Projects',
			'form_para'   => 'With Top PHP Developers we are here to launch your app with a bang!',
			'banner_list' => array(
				array( 'li_list' => 'Ensure project privacy with strict NDA-signed documents.' ),
				array( 'li_list' => 'Expertise in building scalable server-side web applications.' ),
				array( 'li_list' => 'Experienced in testing and debugging backend.js projects.' ),
				array( 'li_list' => 'Knowledge of MVC PHP frameworks such as Symfony and Laravel.' ),
				array( 'li_list' => 'Flexible & Hire Web Developers packages.' ),
			),
		),

		'freelance' => array(
			'img_src'    => '/hire/laravel/freelance-banner.png',
			'img_width'  => 512,
			'img_height' => 612,
			'img_alt'    => 'freelance-banner',
			'head_text'  => 'Hire Professional PHP<br><span>Developers</span>',
			'para_text'  => 'Every project has unique talent requirements. If you already have a team of committed PHP developers but require extra coders to work on your project, or if you need an experienced senior PHP specialist to lead your project, TechnBrains is the right choice for you. We are a professional IT staff augmentation company that offers PHP programmers for hire. Our developers are capable of seamlessly integrating PHP with some of the top front-end frameworks and popular databases to provide you with full-stack app development services. All our PHP developers possess the necessary skills, knowledge, and experience to combine PHP with Angular, React, MongoDB, and other critical technologies.',
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
			'sub_head' => 'Engagement Models to Hire PHP Developers',
			'para_text'=> 'Looking to hire PHP developers? Explore our flexible engagement models to hire PHP developers, tailored to your project\'s unique needs and budget, ensuring seamless development and top-notch results.',
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
			'sub_head'    => 'Why Choose Our PHP Developers?',
			'para_text'   => 'Elevate your web projects with our skilled PHP developers, offering expertise and innovation in every line of code. Trust in our PHP developers\' proven track record of crafting dynamic and secure web solutions, ensuring your success online.',
			'choose_list' => array(
				array( 'src' => '/hire/laravel/image1.png', 'width' => 88, 'height' => 88, 'head' => 'PHP with Angular',  'para' => 'Combine PHP and Angular for scalable enterprise-level web app development. Hire our PHP web developers.' ),
				array( 'src' => '/hire/laravel/image2.png', 'width' => 88, 'height' => 88, 'head' => 'PHP with React',    'para' => 'Use React to power the front end of your PHP-based web app solution and hire professional PHP coders from TechnBrains to ensure seamless mobile browser compatibility.' ),
				array( 'src' => '/hire/laravel/image3.png', 'width' => 88, 'height' => 88, 'head' => 'PHP with MongoDB',  'para' => 'Hire a PHP specialist from TechnBrains to build your ecommerce or social media website with big data storage and complex data handling using PHP and MongoDB.' ),
			),
		),

		'hire_table' => array(
			'sub_head'   => 'Why Hire PHP developers from TechnBrains over freelance or in-house developers?',
			'para_text'  => 'Choose TechnBrains for PHP development expertise you can trust, offering a dedicated team, transparent pricing, and ongoing support, surpassing the limitations of freelance or in-house developers.',
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
			'sub_head' => 'Hire PHP Developers in Just 3 Easy Steps.',
			'para_text'=> 'Hiring professional PHP developers for your project is now as easy as 1-2-3! Simply post your job requirements, review the handpicked candidates, and select the perfect fit for your team. Elevate your development journey with our streamlined process today.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Choose your Engagement Model', 'content' => array( 'Select the engagement model that suits your project and budget.' ),                                                                                    'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Select & Pick PHP Developers', 'content' => array( 'Handpick Swift developers from our talented pool of experts and interview them for their technical expertise.' ),                                       'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Onboard PHP Developers',       'content' => array( 'Onboard your chosen Swift Developer seamlessly for a productive collaboration.' ),                                                                      'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'OUR PHP DEVELOPER\'S TECH STACK EXPERTISE',
			'para_text' => 'Our PHP developers excel in a diverse tech stack, ensuring robust, customized solutions for your projects. Explore our PHP developers\' expertise in cutting-edge technologies to power your web development needs.',
			'hire_list' => array(
				array( 'number' => '01', 'head' => 'PHP Frameworks', 'para' => '● Laravel<br>● CodeIgniter<br>● CakePHP<br>● Symfony<br>● PHP<br>● Yii<br>● Zend' ),
				array( 'number' => '02', 'head' => 'PHP CMS',        'para' => '● WordPress<br>● Magento<br>● Drupal<br>● OpenCart<br>● Squarespace' ),
				array( 'number' => '03', 'head' => 'Cloud Services', 'para' => '● Google Cloud<br>● Azure<br>● Apache<br>● MySQL<br>● Nginx<br>● XAMP<br>● PHPMyAdmin<br>● Azure SQL' ),
				array( 'number' => '04', 'head' => 'Front-End',      'para' => '● HTML<br>● CSS<br>● JavaScript<br>● XML<br>● AJAX<br>● JSON' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
			'head_text' => 'We\'re here to help',
			'faq_image' => true,
			'listing'   => array(
				array( 'faqhead' => 'How much does it cost to Hire a PHP Developer?',                                    'faqbody' => 'The cost to hire a PHP developer can vary depending on factors such as their experience, location, and the complexity of your project. Typically, hourly rates for PHP developers range from $20 to $100 per hour. For a more accurate estimate, you can request a quote from us for hiring PHP developers.' ),
				array( 'faqhead' => 'How much time will it take to develop PHP Project?',                                'faqbody' => 'The time it takes to develop a PHP project depends on its complexity and scope. Simple websites or applications may take a few weeks, while larger and more intricate projects can take several months. Our experienced PHP developers will provide you with a project timeline after assessing your specific requirements.' ),
				array( 'faqhead' => 'What development process do you follow?',                                           'faqbody' => 'We follow a structured development process for PHP projects. It typically includes the following stages: requirement analysis, design and planning, development, testing, deployment, and ongoing maintenance and support.' ),
				array( 'faqhead' => 'What if I want to change the developers in the mid of the project?',                'faqbody' => 'If you wish to change developers during the project, we can facilitate the transition smoothly. We\'ll ensure that the new developer is familiarized with the project\'s code and requirements to minimize disruptions.' ),
				array( 'faqhead' => 'Is there any hidden cost I should consider for PHP Development Services?',          'faqbody' => 'We believe in transparent pricing, and there are no hidden costs associated with our PHP development services. The cost you agree upon initially is what you\'ll pay, unless there are changes in project scope or requirements, which will be discussed and documented.' ),
				array( 'faqhead' => 'Do you provide NDA Signed Document for my project?',                               'faqbody' => 'Yes, we provide NDA (Non-Disclosure Agreement) signed documents to protect the confidentiality of your project. Your ideas and information will be kept secure throughout the development process.' ),
				array( 'faqhead' => 'Did I own the code authority of the project?',                                     'faqbody' => 'You will own the code authority of your project. Once the project is completed and all payments are settled, the source code will be transferred to you, giving you full control and ownership.' ),
				array( 'faqhead' => 'Do you provide free after-sales support and maintenance?',                         'faqbody' => 'We offer free after-sales support and maintenance for a specified period after project completion. This ensures that any issues or updates required post-launch are addressed promptly.' ),
				array( 'faqhead' => 'Why should I choose TechnBrains to hire PHP Developer developers?',                 'faqbody' => 'When you choose TechnBrains to hire PHP developers, you benefit from our team\'s expertise, dedication, and commitment to delivering high-quality PHP solutions. Our developers are experienced in a wide range of PHP frameworks and technologies, ensuring your project is in capable hands.' ),
			),
		),

	),
);
