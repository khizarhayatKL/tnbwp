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
			'head_text'   => 'Hire Java Developer - Java Experts for Robust Software Development',
			'para_text'   => '',
			'span_text'   => 'Hire proficient Java Developers from TechnBrains for bespoke and secure web/software solutions. Our Trusted Java Experts are certified practitioners who can streamline your development process.',
			'form_title'  => 'Deploy Java Projects',
			'form_para'   => 'With Top Java Developers we are here to launch your app with a bang!',
			'banner_list' => array(
				array( 'li_list' => 'Proficiency in leading ORM Frameworks like Spring, Struts, and Hibernate.' ),
				array( 'li_list' => 'Solid grasp of Core Java, Advanced Java, J2EE, and J2ME.' ),
				array( 'li_list' => 'Experienced in server applications like JBoss, Tomcat, and GlassFish.' ),
				array( 'li_list' => 'Adept in developing Web, Mobile, and Desktop software applications.' ),
				array( 'li_list' => 'Knowledgeable in testing tools like JMeter and Junit.' ),
			),
		),

		'freelance' => array(
			'img_src'    => '/hire/laravel/freelance-banner.png',
			'img_width'  => 512,
			'img_height' => 612,
			'img_alt'    => 'freelance-banner',
			'head_text'  => 'TechnBrains has the Best Java<br><span>Developers for You.</span>',
			'para_text'  => 'TechnBrains boasts top-tier Java developers, ensuring your project\'s success. Our experts deliver exceptional results, making us the ideal choice for your Java development needs.<br><br>Our pre-screened and experienced Java Developers are available to start working with you immediately. We understand the importance of aligning with your time zone, which is why we are adaptable and flexible to meet your needs. Our versatile Engagement and Recruitment Models are tailored to fit your unique requirements, ensuring that you receive the best service possible. Rest assured that your privacy is our priority, as we ensure full confidentiality through NDA and code ownership.<br><br>With our Agile Development approach, you\'ll receive clear project updates every step of the way, along with assured punctual delivery. Plus, our Java Developers are priced at a competitive 25% of the market rate, making them an affordable and valuable addition to your team. We also offer dependable post-deployment maintenance and support, as well as effortless Migration Services.',
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
			'sub_head' => 'Java Developers as per Development Needs',
			'para_text'=> 'Do you need a Java programmer to work on your existing project, or are you searching for a team of Java developers to start a new project from scratch? No matter what your Java requirements are, TechnBrains offers flexible engagement models to find the perfect Java programmers to match them.',
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
						array( 'text' => 'When to Choose',    'texttwo' => 'The full scope of the project is unknown and requirements are likely to change.' ),
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
						array( 'text' => 'When to Choose',    'texttwo' => 'When seeking in-demand tech talent, replacements or gaps within the project team' ),
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
			'sub_head'    => 'Why Choose TechnBrains for Your Java Development Needs',
			'para_text'   => 'Are you seeking unparalleled expertise in Java development to elevate your projects to new heights? Look no further than TechnBrains. Here\'s why TechnBrains stands out when you need to replace Python with Java or hire exceptional Java developers.',
			'choose_list' => array(
				array( 'src' => '/hire/laravel/image1.png', 'width' => 88, 'height' => 88, 'head' => 'Expertise in Java Development', 'para' => 'Our skilled Java developers bring years of experience and a deep understanding of Java technologies, ensuring the seamless transition from Python to Java.' ),
				array( 'src' => '/hire/laravel/image2.png', 'width' => 88, 'height' => 88, 'head' => 'Flexible Hiring Options',       'para' => 'Whether you\'re looking to hire Java developers on a freelance, remote, or dedicated basis, TechnBrains offers flexible hiring models to suit your specific project requirements.' ),
				array( 'src' => '/hire/laravel/image3.png', 'width' => 88, 'height' => 88, 'head' => 'Proven Track Record',           'para' => 'TechnBrains has a proven track record of delivering successful Java projects. Our portfolio showcases a myriad of satisfied clients who have benefited from our Java development expertise.' ),
			),
		),

		'hire_table' => array(
			'sub_head'   => 'Why Hire Java developers from TechnBrains over freelance or in-house developers?',
			'para_text'  => 'Hiring Java developers from TechnBrains ensures expertise, reliability, and scalability, surpassing the limitations of freelance or in-house developers. We provide skilled professionals and a proven track record for success.',
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
			'sub_head' => 'Hire Java Developers in Just 3 Easy Steps',
			'para_text'=> 'Hiring Java developers is now as simple as 1-2-3 with TechnBrains. Our streamlined process allows you to hire Java developers in just three easy steps, ensuring a hassle-free journey from Idea to app reality.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Choose your Engagement Model', 'content' => array( 'Select the engagement model that suits your project and budget.' ),                                                                        'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Select & Pick Java Developers', 'content' => array( 'Handpick Java developers from our talented pool of experts and interview them for their technical expertise.' ),                           'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Onboard Java Developers',       'content' => array( 'Onboard your chosen Java Developer seamlessly for a productive collaboration.' ),                                                          'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'Tech-Stack Expertise Our Java Developers for Hire Hold',
			'para_text' => 'All our Java Developers follow best practices and have a strong understanding of core Java principles. They are proficient in various development tools, ensuring a smooth development process.',
			'hire_list' => array(
				array( 'number' => '01', 'head' => 'Frameworks',     'para' => '● Spring<br>● Hibernate<br>● Struts<br>● Vaadin<br>● Blade<br>● JSF' ),
				array( 'number' => '02', 'head' => 'Cloud Services',  'para' => '● AWS<br>● Heroku<br>● Google Cloud<br>● Microsoft Azure<br>● Aruba Cloud<br>● OVH' ),
				array( 'number' => '03', 'head' => 'Databases',       'para' => '● Oracle<br>● MySQL<br>● MongoDB<br>● PostgreSQL<br>● Microsoft SQL Server<br>● IBM DB2' ),
				array( 'number' => '04', 'head' => 'MicroServices',   'para' => '● Dropwizard<br>● MicroProfile<br>● Micronaut<br>● JHipster<br>● Spark<br>● Vertx' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
			'head_text' => 'We\'re here to help',
			'faq_image' => true,
			'listing'   => array(
				array( 'faqhead' => 'How much does it cost to hire a JAVA Developer?',                              'faqbody' => 'The cost to hire a JAVA Developer can vary widely based on factors such as experience, location, and project complexity. At TechnBrains, we offer flexible hiring models to accommodate various budgets. Please contact us for a customized quote tailored to your specific hire Java developer needs.' ),
				array( 'faqhead' => 'Do you sign NDA? Is my Idea secure with you?',                                'faqbody' => 'Yes, we take data security seriously. We are open to signing a Non-Disclosure Agreement (NDA) to ensure the confidentiality and security of your java developer for hire project idea.' ),
				array( 'faqhead' => 'What is the payment procedure? Do I need to pay advance?',                    'faqbody' => 'Our payment procedure is adaptable. Depending on the scope of your project, you may be required to make an initial advance payment. We can discuss and customize payment terms for java developers for hire to align with your project\'s specifics.' ),
				array( 'faqhead' => 'Whom do I speak in case I need some inputs, ideas or consultation?',          'faqbody' => 'You can communicate with our dedicated project manager for any inquiries, ideas, or consultations related to hire a java developer. They will facilitate effective communication and collaboration throughout the development process.' ),
				array( 'faqhead' => 'How much experience do your JAVA developers carry?',                          'faqbody' => 'Our JAVA developers typically possess a minimum of "X years of experience" in the field, ensuring the expertise and competence needed for "hire dedicated java developers."' ),
				array( 'faqhead' => 'Do I need to be bound by any contract for the hiring period?',                'faqbody' => 'Yes, we usually have a standard contract in place for the hiring period. This contract outlines the terms and conditions of the engagement for hire a java developer, providing clarity and transparency to both parties.' ),
				array( 'faqhead' => 'What project management tools do you use?',                                   'faqbody' => 'We utilize industry-standard project management tools such as Jira, Trello, or Asana to effectively manage and monitor the progress of your project when you "hire freelance java developer."' ),
				array( 'faqhead' => 'Do you work according to the client\'s time zone?',                           'faqbody' => 'Absolutely, we can adjust our working hours to align with your preferred time zone, ensuring seamless communication and collaboration for "hire dedicated java developer."' ),
				array( 'faqhead' => 'Why should I choose TechnBrains to hire JAVA developers?',                    'faqbody' => 'There are several compelling reasons to choose TechnBrains for java developer for hire: We offer a team of highly skilled and experienced JAVA developers. Our flexible hiring models cater to various budgets. You will have a dedicated project manager for personalized support. We prioritize the security of your project through NDA agreements. Our commitment to quality ensures top-notch development services.' ),
			),
		),

	),
);
