<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas'    => array(),

	'components' => array(
		array( 'name' => 'hire-banner',  'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'steps-hire',   'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'expert',       'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'hire-cta',     'modifier_class' => '', 'args' => array( 'data_key' => 'hire_cta_1' ) ),
		array( 'name' => 'hire-choose',  'modifier_class' => 'white-bg', 'args' => array() ),
		array( 'name' => 'skills',       'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'hire-table',   'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'hire-cta',     'modifier_class' => '', 'args' => array( 'data_key' => 'hire_cta_2' ) ),
		array( 'name' => 'hire',         'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'main-cta',     'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'main-faqs',    'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'testimonials', 'modifier_class' => '', 'args' => array() ),
	),

	'mock_data' => array(

		'banner' => array(
			'head_text'   => 'Hire AngularJS Developer - AngularJS Specialists for Frontend Brilliance',
			'para_text'   => 'Hire AngularJS developers from TechnBrains to create robust enterprise applications. Equip your organization to handle complex business requirements and generate high-value revenue streams.',
			'span_text'   => 'Ready to elevate your web development with AngularJS? Hire our skilled AngularJS developer today and unlock the potential of dynamic and responsive web applications!',
			'form_title'  => 'Deploy Angular Projects',
			'form_para'   => 'With Top Angular Developers we are here to launch your app with a bang!',
			'banner_list' => array(
				array( 'li_list' => 'Proficiency in contemporary JavaScript MV-VM/MVC frameworks' ),
				array( 'li_list' => 'Specialized in Typescript, particularly in crafting RESTful services' ),
				array( 'li_list' => 'Adept in employing JavaScript techniques for DOM manipulation' ),
				array( 'li_list' => 'Skilled in using Code Versioning Tools like Git, GitHub, GitLab, SVN' ),
				array( 'li_list' => 'Code versioning tools like Git, GitHub, GitLab, and SVN.' ),
				array( 'li_list' => 'Familiarity with testing utilities such as Jasmine and Karma' ),
				array( 'li_list' => 'Maintain project confidentiality through rigorous NDA agreements.' ),
			),
		),

		'steps_hire' => array(
			'sub_head' => 'Hire AngularJS Developers in Just 3 Easy Steps',
			'para_text'=> 'Streamline your hiring process: Find expert AngularJS developers effortlessly in three simple steps. Get started now to build exceptional web applications.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Choose your Engagement Model',       'content' => array( 'Select the engagement model that suits your project and budget.' ),                                                                                           'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Select & Pick AngularJS Developers', 'content' => array( 'Handpick AngularJS developers from our talented pool of experts and interview them for their technical expertise.' ),                                          'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Onboard AngularJS Developers',       'content' => array( 'Onboard your chosen AngularJS Developer seamlessly for a productive collaboration.' ),                                                                         'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'expert' => array(
			'sub_head'   => 'Hire AngluarJS Developers Starting with',
			'para_text'  => 'Hire AngularJS developers starting today! Find top talent to boost your web projects, ensuring seamless AngularJS development from day one. Choose from Hourly, Part-time and Full-time hiring to get started.',
			'expert_box' => array(
				array(
					'src'         => '/hire/angular/clock.png',
					'width'       => 85,
					'height'      => 85,
					'head'        => 'Hourly Hiring',
					'expert_list' => array(
						array( 'item' => 'Dedicated 8 Hrs/day for consistent progress.' ),
						array( 'item' => 'Enjoy adaptability with a minimum 30-day engagement.' ),
						array( 'item' => 'Simplify payments with convenient monthly billing cycles.' ),
					),
				),
				array(
					'src'         => '/hire/angular/full.png',
					'width'       => 85,
					'height'      => 85,
					'head'        => 'Full Time Hiring',
					'expert_list' => array(
						array( 'item' => 'Dedicated 8 Hrs/day for consistent progress.' ),
						array( 'item' => 'Enjoy adaptability with a minimum 30-day engagement.' ),
						array( 'item' => 'Simplify payments with convenient monthly billing cycles.' ),
					),
				),
				array(
					'src'         => '/hire/angular/part.png',
					'width'       => 85,
					'height'      => 85,
					'head'        => 'Part Time Hiring',
					'expert_list' => array(
						array( 'item' => 'Dedicated 8 Hrs/day for consistent progress.' ),
						array( 'item' => 'Enjoy adaptability with a minimum 30-day engagement.' ),
						array( 'item' => 'Simplify payments with convenient monthly billing cycles.' ),
					),
				),
			),
		),

		'hire_cta_1' => array(
			'title'             => 'READY TO START YOUR DREAM PROJECT?',
			'para'              => 'WE HAVE A TEAM TO GET YOU THERE.',
			'primary_button'    => true,
			'secondary_button'  => false,
			'primary_btn_title' => 'GET IN TOUCH',
			'primary_btn_popup' => true,
		),

		'hire_choose' => array(
			'sub_head'    => 'Why Choose our AngularJS developers?',
			'para_text'   => 'Choose our AngularJS developers for a seamless web development experience. Our experts bring extensive experience in crafting dynamic and responsive applications. We ensure top-notch quality, on-time delivery, and cost-effectiveness, making us your ideal partner for AngularJS projects.',
			'choose_list' => array(
				array( 'src' => '/hire/laravel/image1.png', 'width' => 88, 'height' => 88, 'head' => 'Senior AngularJS Developer',     'para' => '3+ Years of AngularJS Experience<br>6-11 Project Managed<br>7000+ Development Hours Completed<br>Suitable for General Level Projects' ),
				array( 'src' => '/hire/laravel/image2.png', 'width' => 88, 'height' => 88, 'head' => 'Full-Stack AngularJS Developer', 'para' => '5-10 Years of AngularJS Experience<br>10-25 Project Managed<br>15000+ Development Hours Completed<br>Suitable for Advance Level Projects' ),
				array( 'src' => '/hire/laravel/image3.png', 'width' => 88, 'height' => 88, 'head' => 'AngularJS Project Manager',     'para' => '10+ Years of AngularJS Experience<br>20-50 Project Managed<br>25000+ Development Hours Completed<br>Suitable when you Hire AngularJS Team' ),
			),
		),

		'skills' => array(
			'sub_head'  => 'Skilled AngluarJS Developers at TechnBrains',
			'para_text' => 'At TechnBrains, we offer a team of highly skilled AngularJS developers. With extensive expertise in crafting dynamic web applications, our developers bring innovative solutions and unmatched proficiency to your projects. Elevate your web development with the talent you can trust.',
			'skill_box' => array(
				array(
					'head'       => 'Technical',
					'sub_head'   => 'Angular Developer\'s Technical Proficiencies',
					'skill_list' => array(
						array( 'item' => 'Diverse experience and adaptability in various scenarios' ),
						array( 'item' => 'Proficiency in integrating RESTful APIs' ),
						array( 'item' => 'Strong coding skills in CSS, JS, HTML' ),
						array( 'item' => 'Familiarity with Angular coding and industry standards' ),
						array( 'item' => 'Competence in project management methodologies (SCRUM, AGILE, WATERFALL)' ),
						array( 'item' => 'Database query management' ),
						array( 'item' => 'Proficiency in collaboration tools like Slack, Trello, Skype, etc.' ),
					),
				),
				array(
					'head'       => 'Non-Technical',
					'sub_head'   => 'Non-Technical Skills',
					'skill_list' => array(
						array( 'item' => 'Effective verbal and non-verbal communication' ),
						array( 'item' => 'Teamwork and friendly demeanor' ),
						array( 'item' => 'Client-centric approach' ),
						array( 'item' => 'Embracing leadership qualities (self-awareness, empathy, learning, respect, integrity)' ),
						array( 'item' => 'Open to constructive criticism' ),
						array( 'item' => 'Up-to-date with Angular updates and tools' ),
						array( 'item' => 'Efficient time management in Angular projects' ),
						array( 'item' => 'Strong soft skills and English proficiency' ),
						array( 'item' => 'Adherence to Angular\'s best coding practices' ),
					),
				),
			),
		),

		'hire_table' => array(
			'sub_head'   => 'Why Hire AngluarJS developers from TechnBrains over freelance or in-house developers?',
			'para_text'  => 'Hiring AngularJS developers from TechnBrains offers the advantages of expertise, reliability, and scalability. Our seasoned professionals bring industry-specific knowledge and ensure project continuity. Unlike freelancers, we guarantee consistent quality, and unlike in-house teams, you save on infrastructure and management costs. Partner with us for streamlined success.',
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
				array( 'id' => 13, 'hiring' => 'Tools & Environment',                     'in_house' => 'Depend on Team',   'technbrains' => 'Uncertain',                           'freelancer' => 'Uncertain' ),
				array( 'id' => 14, 'hiring' => 'Agile Development Methodology',           'in_house' => 'May Be',           'technbrains' => 'Yes',                                 'freelancer' => 'No' ),
				array( 'id' => 15, 'hiring' => 'Impact Due to Turnover',                  'in_house' => 'High',             'technbrains' => 'None',                                'freelancer' => 'High' ),
				array( 'id' => 16, 'hiring' => 'Structured Training Programs',            'in_house' => 'Some',             'technbrains' => 'Yes',                                 'freelancer' => 'No' ),
				array( 'id' => 17, 'hiring' => 'Communications',                          'in_house' => 'Seamless',         'technbrains' => 'Seamless',                            'freelancer' => 'Uncertain' ),
				array( 'id' => 18, 'hiring' => 'Termination Costs',                       'in_house' => 'High',             'technbrains' => 'None',                                'freelancer' => 'None' ),
				array( 'id' => 19, 'hiring' => 'Assured Work Rigor',                      'in_house' => '40 hrs/week',      'technbrains' => '40 hrs/week',                         'freelancer' => 'Not Sure' ),
			),
		),

		'hire_cta_2' => array(
			'title'               => 'LOOKING TO PARTNER WITH US?',
			'para'                => 'Prepare For a Genuine Business Partnership',
			'primary_button'      => true,
			'secondary_button'    => true,
			'primary_btn_title'   => 'Check Out PArtnership Model',
			'primary_btn_popup'   => true,
			'secondary_btn_title' => 'LET\'s Talk',
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'Tailor Your Angular Development with Skilled Developers',
			'para_text' => 'No matter your web app stage, our proficient Angular programmers adapt to your needs. Get cost-effective rates and personalized engagement models. Our Angular Developers assist with:',
			'hire_list' => array(
				array( 'img' => '/hire/angular/4.png', 'width' => 75, 'height' => 75, 'head' => 'Launching New Angular Projects',                 'para' => 'Initiate a project with our dedicated Angular Developers, tailored roadmaps, and NDA-signed support, beginning development within 48 hours.' ),
				array( 'img' => '/hire/angular/3.png', 'width' => 75, 'height' => 75, 'head' => 'Migrating from Angular.js to Angular 2/Angular 15', 'para' => 'Effortlessly transition Angular JS projects to Angular 2, embracing modern development practices.' ),
				array( 'img' => '/hire/angular/2.png', 'width' => 75, 'height' => 75, 'head' => 'Shifting to the Angular Ecosystem',               'para' => 'Switch from React, Vue, or other frameworks to Angular with our affordable Angular Developers.' ),
				array( 'img' => '/hire/angular/1.png', 'width' => 75, 'height' => 75, 'head' => 'Angular Team Augmentation',                       'para' => 'Overcome resource shortages in your Angular project by augmenting your team with our skilled Developers, ensuring swift onboarding for project continuity.' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
			'head_text' => 'We\'re here to help',
			'faq_image' => true,
			'listing'   => array(
				array( 'faqhead' => 'How much does it cost to Hire an Angular Developer?',                                     'faqbody' => 'The cost to hire dedicated AngularJS developers varies based on your project\'s complexity and duration. We offer competitive rates tailored to your specific needs.' ),
				array( 'faqhead' => 'How much time will it take to develop an Angular Project?',                               'faqbody' => 'The time required to develop an Angular project depends on project scope and features. We follow efficient development practices to deliver your project within agreed timelines.' ),
				array( 'faqhead' => 'What development process do you follow?',                                                 'faqbody' => 'We employ a rigorous development process with remote AngularJS developers to ensure quality and efficiency, following best practices in AngularJS development.' ),
				array( 'faqhead' => 'What if I want to change the developers in the mid of the project?',                     'faqbody' => 'We understand that needs may evolve. If you wish to change AngularJS developers mid-project, we facilitate a smooth transition to ensure minimal disruption.' ),
				array( 'faqhead' => 'Is there any hidden cost I should consider for Angular Development Services?',            'faqbody' => 'We maintain transparency and ensure there are no hidden costs in our Angular development services. You pay only for the agreed-upon services.' ),
				array( 'faqhead' => 'Do you provide NDA Signed Document for my project?',                                     'faqbody' => 'Yes, we prioritize your project\'s privacy and provide NDA-signed documents to safeguard your intellectual property and sensitive information.' ),
				array( 'faqhead' => 'Did I own the code authority of the project?',                                           'faqbody' => 'Yes, you retain full code authority of your project. We develop it according to your specifications, and you have complete ownership.' ),
				array( 'faqhead' => 'Do you provide free after-sales support and maintenance?',                               'faqbody' => 'Yes, we offer free after-sales support and maintenance to ensure your project runs smoothly after completion, providing peace of mind.' ),
				array( 'faqhead' => 'Why should I choose TechnBrains to hire Angular developers?',                            'faqbody' => 'Choose TechnBrains to hire Angular developers for our skilled team, competitive rates, transparency, NDA protection, post-development support, and a commitment to delivering exceptional AngularJS projects tailored to your needs.' ),
			),
		),

	),
);
