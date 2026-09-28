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
    'head_text'   => 'Hire ReactJS Developers for Scalable Frontend Web Apps',
    'para_text'   => 'Hire ReactJS developers from TechnBrains to build fast, responsive, and scalable web applications, dashboards, SaaS platforms, portals, and customer-facing interfaces. Our ReactJS developers work with React, JavaScript, TypeScript, Redux, Next.js, REST APIs, GraphQL, component libraries, design systems, and modern frontend architecture. Whether you need a ReactJS developer to support your in-house team or a dedicated frontend team to build your product interface, we help you choose the right hiring model.',
    'span_text'   => 'Ready to elevate your frontend development? Hire ReactJS Developers now and unlock the potential of dynamic user interfaces!',
    'form_title'  => 'Deploy React Projects',
    'form_para'   => 'With Top React Developers we are here to launch your app with a bang!',
    'banner_list' => array(
        array( 'li_list' => 'Ensure project confidentiality and data security by signing NDA agreements.' ),
        array( 'li_list' => 'Save up to 70% on development costs when you hire React JS developers.' ),
        array( 'li_list' => 'Expertise in JavaScript, including ES5/ES6/ES7+ and Babel.' ),
        array( 'li_list' => 'Proficiency in Redux, Redux-Saga, Flow, and React DND.' ),
        array( 'li_list' => 'Ability to efficiently utilize cloud services such as AWS, GCP, and Azure for React Redux development.' ),
    ),
),

		'steps_hire' => array(
			'sub_head' => 'Hire ReactJS Developers in Just 3 Easy Steps',
			'para_text'=> 'Streamline your development process with ease – Hire ReactJS developers in just three simple steps and unlock the potential of dynamic frontend solutions.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Choose your Engagement Model',     'content' => array( 'Select the engagement model that suits your project and budget.' ),                                                                                           'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Select & Pick ReactJS Developers', 'content' => array( 'Handpick ReactJS developers from our talented pool of experts and interview them for their technical expertise.' ),                                          'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Onboard ReactJS Developers',       'content' => array( 'Onboard your chosen ReactJS Developer seamlessly for a productive collaboration.' ),                                                                         'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'expert' => array(
			'sub_head'   => 'Hire ReactJS Developers Starting with',
			'para_text'  => 'Embark on a journey of innovation with our skilled ReactJS developers. We offer cost-effective solutions, expertise in JavaScript, Redux, and cloud services. Choose from Hourly, Part-time and Full-time hiring to get started. Secure your project\'s success with us today!',
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
    'sub_head'    => 'Engagement Models to Hire ReactJS Developers',
    'para_text'   => 'Choose the model based on your internal capacity, UI/UX complexity, and delivery roadmap.',
    'choose_list' => array(
        array( 'src' => '/hire/laravel/image1.png', 'width' => 88, 'height' => 88, 'head' => 'Staff Augmentation',   'para' => 'Ideal For: Teams needing specialized ReactJS, Redux, or frontend support to boost existing development velocity. Key Advantage: Integrate pre-vetted engineers into your workflow while maintaining full control over architecture. When to Choose: Best for supporting internal sprints, building new UI components, or scaling your frontend capacity.' ),
        array( 'src' => '/hire/laravel/image2.png', 'width' => 88, 'height' => 88, 'head' => 'Software Outsourcing', 'para' => 'Ideal For: Startups and SMBs looking for a managed approach to deliver clearly defined React modules or web apps. Key Advantage: Hand off the end-to-end management of frontend development, API integration, and QA to TechnBrains. When to Choose: Best for milestone-based delivery where you need a turnkey solution for a specific project scope.' ),
        array( 'src' => '/hire/laravel/image3.png', 'width' => 88, 'height' => 88, 'head' => 'Dedicated Teams',      'para' => 'Ideal For: Businesses building long-term SaaS platforms, enterprise web portals, or complex React ecosystems. Key Advantage: A fully integrated team of developers, designers, and DevOps working exclusively on your product vision. When to Choose: Best for evolving roadmaps that require consistent focus, deep product knowledge, and scalable growth.' ),
    ),
),

		'skills' => array(
			'sub_head'  => 'Skilled ReactJS Developers at TechnBrains',
			'para_text' => 'TechnBrains offers a team of highly skilled ReactJS developers. Our experts are well-versed in creating dynamic and efficient frontend solutions, ensuring top-notch quality and innovation in every project we undertake.',
			'skill_box' => array(
				array(
					'head'       => 'Technical',
					'sub_head'   => 'ReactJS Developers Technical Proficiencies',
					'skill_list' => array(
						array( 'item' => 'Proficiency in JavaScript (ES5/ES6/ES7+).' ),
						array( 'item' => 'Extensive knowledge of React, Redux, and related libraries.' ),
						array( 'item' => 'Experience with component-based architecture.' ),
						array( 'item' => 'Familiarity with RESTful APIs and GraphQL.' ),
						array( 'item' => 'Expertise in state management and asynchronous programming.' ),
						array( 'item' => 'Understanding of responsive web design and CSS frameworks.' ),
						array( 'item' => 'Version control using Git and collaborative tools like GitHub.' ),
					),
				),
				array(
					'head'       => 'Non-Technical',
					'sub_head'   => 'ReactJS Developers Non-Technical Skills',
					'skill_list' => array(
						array( 'item' => 'Effective problem-solving and debugging abilities.' ),
						array( 'item' => 'Strong communication skills for team collaboration.' ),
						array( 'item' => 'Adaptable and open to learning new technologies.' ),
						array( 'item' => 'Time management and project organization.' ),
						array( 'item' => 'Attention to detail for UI/UX design and implementation.' ),
						array( 'item' => 'Creativity in finding innovative solutions.' ),
						array( 'item' => 'Client-focused approach for understanding and meeting project requirements.' ),
					),
				),
			),
		),

		'hire_table' => array(
			'sub_head'   => 'Why Hire ReactJS developers from TechnBrains over freelance or in-house developers?',
			'para_text'  => 'Hiring ReactJS developers from TechnBrains offers a distinct advantage over freelance or in-house developers. Our team brings a depth of expertise, collaborative synergy, and reliability that ensures streamlined development, consistent quality, and access to a diverse skill set, making us the ideal choice for your project\'s success.',
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
			'title'               => 'LOOKING TO PARTNER WITH US?',
			'para'                => 'Prepare For a Genuine Business Partnership',
			'primary_button'      => true,
			'secondary_button'    => true,
			'primary_btn_title'   => 'Check Out PArtnership Model',
			'primary_btn_popup'   => true,
			'secondary_btn_title' => 'LET\'s Talk',
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'Tailor Your ReactJS Development with Skilled Developers',
			'para_text' => 'Hire ReactJS Developers for Your App Development Needs. When you hire ReactJS developers remotely, you gain access to a versatile team with expertise in ReactJS for web and mobile app development. Our top-tier React developers are among the top 1% in the field, ensuring you receive cutting-edge solutions. Here\'s what we offer:',
			'hire_list' => array(
				array( 'img' => '/hire/angular/4.png', 'width' => 75, 'height' => 75, 'head' => 'Web Development',        'para' => 'Craft a robust architecture and optimize workflows to drive your business objectives.' ),
				array( 'img' => '/hire/angular/3.png', 'width' => 75, 'height' => 75, 'head' => 'Migration Services',     'para' => 'Benefit from component reusability and seamlessly migrate your application to the latest React version.' ),
				array( 'img' => '/hire/angular/2.png', 'width' => 75, 'height' => 75, 'head' => 'Dashboard Development', 'para' => 'Create dynamic dashboards using the rich ReactJS ecosystem to enhance data visualization and performance.' ),
				array( 'img' => '/hire/angular/1.png', 'width' => 75, 'height' => 75, 'head' => 'eCommerce Development', 'para' => 'Elevate your eCommerce business ROI with a leading React front-end developer.' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
    'head_text' => 'We\'re here to help',
    'faq_image' => true,
    'listing'   => array(
        array( 'faqhead' => 'How much does it cost to hire ReactJS developers?',                          'faqbody' => 'The cost to hire ReactJS developers depends on developer experience, project complexity, engagement model, UI requirements, backend integrations, and timeline. A simple frontend update may cost less than a SaaS dashboard, ecommerce platform, enterprise portal, or custom web app that needs complex state management, API integrations, performance optimization, and QA. At TechnBrains, you can hire ReactJS developers through staff augmentation, software outsourcing, or dedicated teams based on your project scope and budget.' ),
        array( 'faqhead' => 'What skills should I look for when hiring a ReactJS developer?',             'faqbody' => 'When hiring a ReactJS developer, look for experience in JavaScript, TypeScript, React, Redux, REST APIs, GraphQL, HTML, CSS, responsive design, Git, testing, and frontend performance optimization. For complex products, the developer should also understand component-based architecture, reusable UI systems, secure API handling, cloud deployment workflows, and scalable frontend development.' ),
        array( 'faqhead' => 'Can I hire ReactJS developers for an existing web app?',                     'faqbody' => 'Yes. You can hire ReactJS developers to improve, maintain, or scale an existing web application. This may include fixing frontend bugs, improving page speed, updating old React code, migrating class components to functional components, improving state management, redesigning UI screens, integrating APIs, or building new product features. This is a strong fit for staff augmentation when you already have an internal team and need additional ReactJS expertise.' ),
        array( 'faqhead' => 'Should I hire a ReactJS developer or outsource the full ReactJS project?',  'faqbody' => 'Hire a ReactJS developer through staff augmentation when you already have an internal product or engineering team and need frontend expertise to support development. Choose software outsourcing when you want TechnBrains to manage the full ReactJS development process, including planning, UI/UX, frontend development, backend integration, QA, deployment, and support. Choose a dedicated team when your product needs continuous frontend development, regular releases, and long-term technical support.' ),
        array( 'faqhead' => 'Do your ReactJS developers work with Redux, REST APIs, and GraphQL?',        'faqbody' => 'Yes. TechnBrains provides ReactJS developers experienced in React, Redux, RESTful APIs, GraphQL, JavaScript, Git, responsive web design, and component-based frontend development. These skills are useful for SaaS platforms, ecommerce websites, dashboards, admin panels, portals, and web apps that need clean user interfaces connected to reliable backend systems.' ),
        array( 'faqhead' => 'Can TechnBrains help migrate an existing frontend to ReactJS?',              'faqbody' => 'Yes. TechnBrains can help migrate an existing frontend to ReactJS when your business wants better performance, reusable components, easier maintenance, or a more scalable user interface. The migration process may include reviewing the current frontend, rebuilding key screens, improving component structure, connecting APIs, testing functionality, and preparing the application for stable deployment.' ),
        array( 'faqhead' => 'Do you provide post-launch support after hiring ReactJS developers?',        'faqbody' => 'Yes. TechnBrains provides post-launch ReactJS support for bug fixes, performance improvements, UI refinements, dependency updates, browser compatibility fixes, API integration support, feature improvements, QA, and ongoing maintenance. Post-launch support is important because user needs, browser behavior, frontend libraries, security requirements, and product priorities continue to change after deployment.' ),
    ),
),

	),
);
