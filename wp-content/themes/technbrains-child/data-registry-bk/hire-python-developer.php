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
    'head_text'   => 'Hire Python Developers for Web, AI, Automation, and Backend Systems',
    'para_text'   => 'Hire Python developers from TechnBrains to build secure web applications, backend systems, APIs, automation workflows, AI features, and data-driven software. Our Python developers work with Django, Flask, FastAPI, REST APIs, PostgreSQL, MySQL, MongoDB, Redis, Celery, cloud platforms, AI/ML libraries, and modern backend architecture. Whether you need one Python developer to support your existing team or a dedicated backend team to manage full product delivery, we help you hire the right technical support for your roadmap.',
    'span_text'   => 'Hire skilled Python developers in the USA from a reputable IT company trusted by clients worldwide for their Python hiring needs.',
    'form_title'  => 'Deploy Python Projects',
    'form_para'   => 'With Top Python Developers we are here to launch your app with a bang!',
    'banner_list' => array(
        array( 'li_list' => 'Proficient in front-end technologies' ),
        array( 'li_list' => 'Skills include expertise in Django, Flask, Web2Py, and CherryPy.' ),
        array( 'li_list' => 'Proficient in using Python Shell for testing.' ),
        array( 'li_list' => 'Experience in TensorFlow, Matplotlib, Peewee, and more.' ),
        array( 'li_list' => 'Integrating AI/ML, Deep Learning, IoT, and other technologies.' ),
    ),
),

		'freelance' => array(
			'img_src'    => '/hire/laravel/freelance-banner.png',
			'img_width'  => 512,
			'img_height' => 612,
			'img_alt'    => 'freelance-banner',
			'head_text'  => 'TechnBrains is the Best <span>Python Development Company</span> for You.',
			'para_text'  => 'At TechnBrains, we stand as your premier choice for Python development, delivering excellence and innovation tailored to your needs.<br><br>Are you in need of highly skilled and thoroughly screened Python developers? Look no further! Our platform offers you immediate access to a pool of talented developers who work according to your time zone. We understand that every project has unique requirements and that\'s why we offer various flexible engagement and hiring models to cater to your specific needs. Our team ensures confidentiality with a signed NDA and complete code ownership.<br><br>Plus, our agile development approach ensures transparency in project updates and timely delivery. On top of that, our Python developers are cost-effective, with rates 1/4th of the market price. We also provide reliable maintenance and support services after deployment, along with easy and seamless migration services.',
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
    'sub_head'  => 'Engagement Models to Hire Python Developers',
    'para_text' => 'Choose the hiring model based on your internal capacity, scope clarity, and delivery needs.',
    'tab_list'  => array(
        array(
            'key'       => 'tab-1',
            'label'     => 'Staff Augmentation',
            'title'     => 'Staff Augmentation',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Businesses with an existing engineering team that needs Python backend, automation, or AI support' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Small to large' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Partially or fully defined' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'Very high' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'High, scale developers up or down as needed' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose staff augmentation when you need Python developers to join your workflow, support sprint delivery, and work with your internal product, frontend, DevOps, or data teams.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Hourly, part-time, or full-time' ),
            ),
            'src' => '/hire/tab-1.png', 'width' => 227, 'height' => 180, 'alt' => 'Staff Augmentation',
        ),
        array(
            'key'       => 'tab-2',
            'label'     => 'Software Outsourcing',
            'title'     => 'Software Outsourcing',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Startups, SMBs, and enterprises that want TechnBrains to manage Python development' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Small to medium, or clearly scoped enterprise modules' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Clearly defined or ready for discovery' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'Medium, with milestone-based delivery visibility' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'Moderate' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose software outsourcing when you want to hand off backend development, API development, automation, integrations, QA, deployment support, and maintenance.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Fixed-scope or time and material' ),
            ),
            'src' => '/hire/tab-3.png', 'width' => 227, 'height' => 180, 'alt' => 'Software Outsourcing',
        ),
        array(
            'key'       => 'tab-3',
            'label'     => 'Dedicated Teams',
            'title'     => 'Dedicated Teams',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Businesses building long-term products, SaaS platforms, AI systems, or backend-heavy applications' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Medium to large' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Evolving roadmap' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'High' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'High' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose dedicated teams when you need Python developers, QA engineers, frontend developers, DevOps support, and project coordination working consistently on your product roadmap.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Monthly team-based billing' ),
            ),
            'src' => '/hire/tab-2.png', 'width' => 227, 'height' => 180, 'alt' => 'Dedicated Teams',
        ),
    ),
),

		'hire_choose' => array(
    'sub_head'    => 'What You Can Build With Our Python Developers',
    'para_text'   => 'Python is used across web platforms, automation systems, internal tools, AI workflows, SaaS applications, and data-heavy products. TechnBrains helps businesses hire Python developers who can write clean backend code, design scalable APIs, integrate third-party systems, automate manual processes, and support product growth.',
    'choose_list' => array(
        array( 'src' => '/hire/laravel/image1.png', 'width' => 88, 'height' => 88, 'head' => 'Python Web Applications',     'para' => 'Build scalable web apps, portals, dashboards, admin systems, SaaS platforms, and business applications using Django, Flask, or FastAPI.' ),
        array( 'src' => '/hire/laravel/image2.png', 'width' => 88, 'height' => 88, 'head' => 'API and Backend Development', 'para' => 'Develop secure APIs, backend logic, microservices, integrations, and database-driven systems for web and mobile products.' ),
        array( 'src' => '/hire/laravel/image3.png', 'width' => 88, 'height' => 88, 'head' => 'AI, ML, and Data Solutions',  'para' => 'Build AI-powered features, data processing workflows, predictive models, reporting systems, and automation tools using Python libraries.' ),
    ),
),

		'hire_table' => array(
			'sub_head'   => 'Why Hire Python developers from TechnBrains over freelance or in-house developers?',
			'para_text'  => 'Hiring Python developers from TechnBrains ensures top expertise, team synergy, and cost-efficiency, surpassing the advantages of freelance or in-house options.',
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
			'sub_head' => 'Hire Python Developers in Just 3 Easy Steps',
			'para_text'=> 'Hiring Python developers is now as simple as 1-2-3 with TechnBrains. Our streamlined process allows you to hire Python developers in just three easy steps, ensuring a hassle-free journey from Idea to app reality.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Choose your Engagement Model',   'content' => array( 'Select the engagement model that suits your project and budget.' ),                                                                                    'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Select & Pick Python Developers', 'content' => array( 'Handpick Python developers from our talented pool of experts and interview them for their technical expertise.' ),                                     'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Onboard Python Developers',       'content' => array( 'Onboard your chosen Python Developer seamlessly for a productive collaboration.' ),                                                                    'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'Tech-Stack Expertise our Python Developers for Hire Hold',
			'para_text' => 'All of our certified Python developers keep up with the latest developments in Python and have a strong grasp of the fundamental concepts of Python. They are also skilled in using the right developer tools to enhance your project.',
			'hire_list' => array(
				array( 'number' => '01', 'head' => 'Python Frameworks', 'para' => '● Django<br>● Flask<br>● Web2Py<br>● Bottle<br>● Falcon' ),
				array( 'number' => '02', 'head' => 'AI/ ML',            'para' => '● TensorFlow<br>● PyTorch<br>● Spark Mlib<br>● NLTK' ),
				array( 'number' => '03', 'head' => 'Libraries',         'para' => '● TensorFlow<br>● NumPy<br>● Apache<br>● PyTorch<br>● Keras<br>● Matplotlib' ),
				array( 'number' => '04', 'head' => 'Databases & ORM',   'para' => '● MongoDB<br>● MySQL<br>● PostgreSQL<br>● Redis<br>● SQLite<br>● Cassandra' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
    'head_text' => 'We\'re here to help',
    'faq_image' => true,
    'listing'   => array(
        array( 'faqhead' => 'How much does it cost to hire Python developers?',                              'faqbody' => 'The cost to hire Python developers depends on developer experience, project complexity, required frameworks, engagement model, and backend or AI integration needs. A simple Python script or API may cost less than a SaaS platform, AI application, automation system, data dashboard, or enterprise web app. At TechnBrains, you can hire Python developers through staff augmentation, software outsourcing, or dedicated teams based on your project scope and budget.' ),
        array( 'faqhead' => 'What skills should I look for when hiring a Python developer?',                 'faqbody' => 'When hiring a Python developer, look for experience in Django, Flask, FastAPI, REST APIs, databases, cloud deployment, Git, testing, and secure backend development. For advanced projects, the developer should also understand AI/ML libraries, data processing, automation, performance optimization, API architecture, and scalable application development.' ),
        array( 'faqhead' => 'Can I hire Python developers for an existing project?',                         'faqbody' => 'Yes. You can hire Python developers to improve, maintain, or scale an existing Python application. This may include fixing bugs, improving backend performance, upgrading old code, adding APIs, improving database queries, integrating third-party systems, building automation workflows, or extending AI and data features. This is a strong fit for staff augmentation when you already have a team and need additional Python expertise.' ),
        array( 'faqhead' => 'Should I hire a Python developer or outsource the full Python project?',        'faqbody' => 'Hire a Python developer through staff augmentation when you already have an internal team and need Python expertise to support development. Choose software outsourcing when you want TechnBrains to manage the full Python development process, including planning, backend development, frontend integration, QA, deployment, and support. Choose a dedicated team when your product needs ongoing development, regular releases, and long-term technical ownership.' ),
        array( 'faqhead' => 'Do your Python developers work with Django, Flask, and FastAPI?',               'faqbody' => 'Yes. TechnBrains provides Python developers experienced in Django, Flask, FastAPI, REST API development, database integration, backend architecture, and cloud-ready application development. Django is often used for larger web platforms, Flask works well for lightweight applications and APIs, while FastAPI is commonly used for high-performance API development.' ),
        array( 'faqhead' => 'Can TechnBrains help with Python AI, machine learning, and data projects?',    'faqbody' => 'Yes. TechnBrains can support Python projects involving AI, machine learning, data analysis, automation, dashboards, predictive models, and intelligent software features. Our Python developers can work with libraries and tools such as TensorFlow, PyTorch, NumPy, Pandas, Matplotlib, and other AI or data-focused technologies depending on the project requirements.' ),
        array( 'faqhead' => 'Do you provide post-launch support after hiring Python developers?',            'faqbody' => 'Yes. TechnBrains provides post-launch support for Python applications, including bug fixes, performance monitoring, security updates, API maintenance, database optimization, feature improvements, cloud deployment support, and ongoing technical maintenance. Post-launch support is important for Python products because business workflows, user needs, integrations, and security requirements continue to change after deployment.' ),
    ),
),

	),
);
