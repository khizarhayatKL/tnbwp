<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(),

	'components' => array(
		array( 'name' => 'industry-banner',    'modifier_class' => '' ),
		array( 'name' => 'counter-sec',        'modifier_class' => '' ),
		array( 'name' => 'language-services',  'modifier_class' => '' ),
		array( 'name' => 'development-process','modifier_class' => '' ),
		array( 'name' => 'proposal',           'modifier_class' => '' ),
		array( 'name' => 'stack-new-box',      'modifier_class' => 'angular-stack' ),
		array( 'name' => 'industry-features',  'modifier_class' => '' ),
		array( 'name' => 'testimonials',       'modifier_class' => '' ),
		array( 'name' => 'main-faqs',          'modifier_class' => '' ),
	),

	'mock_data' => array(

		'industry_banner' => array(
			'title'             => 'Expert SaaS Development Company',
			'para'              => 'TechnBrains, a leading SaaS development company, provides advanced, high-tech, and successful SaaS-based products worldwide. Our modern software development practices ensure product security, quality, and innovative solutions for scaling businesses.',
			'second_button'     => false,
			'banner_img_src'    => '/industry/saas/banner.webp',
			'banner_img_width'  => '759',
			'banner_img_height' => '658',
			'banner_img_alt'    => 'banner',
			'bg_image'          => '/industry/saas/bg-main.webp',
		),

		'counter_sec' => array(
			'listing' => array(
				array( 'count' => '60', 'sign' => '+', 'content' => 'SAAS Products Launched' ),
				array( 'count' => '96', 'sign' => '%', 'content' => 'SAAS Client Satisfaction' ),
				array( 'count' => '10', 'sign' => 'x', 'content' => 'Speedier Deployment of Cloud Solutions' ),
				array( 'count' => '4',  'sign' => 'x', 'content' => 'Revenue Growth in SAAS Market Share' ),
			),
		),

		'language_services' => array(
			'head_text' => 'Pioneering SaaS Application Development Services We Provide',
			'para_text' => 'The SaaS product development services at TechnBrains transform fresh concepts into innovative software solutions.',
			'btn_text'  => 'REACH OUT NOW',
			'anchor'    => false,
			'listing'   => array(
				array( 'img_src' => '/industry/saas/d1.png', 'width' => '80', 'height' => '80', 'alt' => 'SaaS App Development Consulting',       'list_head' => 'SaaS App Development Consulting',       'list_para' => 'We are a team of highly skilled consultants, offering expert SaaS application development solutions that guarantee a prominent way to achieve your goals, and tackle complex business challenges.' ),
				array( 'img_src' => '/industry/saas/d2.png', 'width' => '80', 'height' => '80', 'alt' => 'Third-party Integration Services',        'list_head' => 'Third-party Integration Services',        'list_para' => 'TechnBrains can help you integrate your SaaS application with third-party solutions by linking external data sources to add payment gateways.' ),
				array( 'img_src' => '/industry/saas/d3.png', 'width' => '80', 'height' => '80', 'alt' => 'SaaS App Design and Development',         'list_head' => 'SaaS App Design and Development',         'list_para' => 'As a company that specializes in SaaS software development, we offer a range of comprehensive services to help you scale your business with ease. Our team of experts has the skills to build reliable cloud infrastructure.' ),
				array( 'img_src' => '/industry/saas/d4.png', 'width' => '80', 'height' => '80', 'alt' => 'SaaS App Optimization',                   'list_head' => 'SaaS App Optimization',                   'list_para' => 'Our SaaS software developers team works with you to maximize your business returns and optimize your existing SaaS products as per market requirements, enabling additional revenue streams.' ),
				array( 'img_src' => '/industry/saas/d5.png', 'width' => '80', 'height' => '80', 'alt' => 'Multi-Tenant Architecture Upgrade',        'list_head' => 'Multi-Tenant Architecture Upgrade',        'list_para' => 'We are a professional SaaS app development company, and we specialize in upgrading and enhancing your existing SaaS application to make it multi-tenant. This process helps you to maximize your earnings while reducing your long-term maintenance costs.' ),
				array( 'img_src' => '/industry/saas/d6.png', 'width' => '80', 'height' => '80', 'alt' => 'Technology Migration and Reengineering',   'list_head' => 'Technology Migration and Reengineering',   'list_para' => 'We guide you every step of the way as you move your SaaS application from your current tech stack to the latest version. Our team of experts is highly experienced in providing SaaS application development services that incorporate cutting-edge technologies.' ),
				array( 'img_src' => '/industry/saas/d7.png', 'width' => '80', 'height' => '80', 'alt' => 'Support and Maintenance',                  'list_head' => 'Support and Maintenance',                  'list_para' => 'We are a leading SaaS development services provider, offering a range of post-launch support services for your product, including L1, L2, and L3. Our team also provides adaptive and perfective maintenance.' ),
			),
		),

		'dev_process' => array(
			'main_title' => 'Build Excellence with TechnBrains',
			'lang_title' => 'Streamlined Process to Craft A Tailored SaaS Solution',
			'lang_para'  => 'At TechnBrains, our dedicated team specializes in delivering cutting-edge SaaS application development services that align seamlessly with your unique business requirements.',
			'listing'    => array(
				array( 'number' => '01', 'title' => 'Consultation and Needs Assessment',       'para' => 'Begin the journey to your ideal SaaS solution by engaging with our expert team. We conduct a comprehensive consultation and needs assessment to understand your requirements, objectives, and business processes.' ),
				array( 'number' => '02', 'title' => 'Customized SaaS Application Planning',    'para' => 'Tailoring our approach to your unique needs, our seasoned professionals strategize and plan the development process. This phase involves defining features, architecture, and a roadmap for your bespoke SaaS application.' ),
				array( 'number' => '03', 'title' => 'Development and Iterative Prototyping',   'para' => 'Leveraging cutting-edge technologies, our skilled team initiates the development process of your SaaS application. We follow an iterative prototyping approach, allowing you to review and provide feedback at key milestones.' ),
				array( 'number' => '04', 'title' => 'Quality Assurance and Testing',           'para' => 'Our commitment to delivering flawless SaaS solutions is realized through rigorous quality assurance and testing. We conduct comprehensive testing to guarantee the reliability, security, and optimal performance of your SaaS application.' ),
				array( 'number' => '05', 'title' => 'Deployment and Ongoing Support',          'para' => 'As your trusted SaaS app development company, we oversee the seamless deployment of your SaaS application. Post-launch, we provide ongoing support, ensuring continuous improvement and addressing any evolving needs.' ),
			),
		),

		'proposal' => array(
			'head_html' => '<h2>Get expert SaaS Application Development Services from the industry leaders</h2>',
			'btn_text'  => 'Let\'s Build',
			'anchor'    => false,
		),

		'stack_new_box' => array(
			'subtitle' => 'NEXTGEN TECHSTACK FOR INNOVATIVE SAAS SERVICES',
			'title'    => 'Experience the NextGen Tech Stack with Our Expert SaaS Development Services',
			'para'     => 'As a leading SaaS Development Company, we curate our tech stack to ensure the delivery of unparalleled SaaS Application Development Services. The languages and frameworks we employ are not just chosen; they are crafted into a powerful combination, fortifying your SaaS offering for optimal robustness and scalability.',
			'listing'  => array(
				array(
					'tab_title' => 'Frontend Development',
					'data_list' => array(
						array( 'title' => 'Angular' ),
						array( 'title' => 'Yii Frameworks' ),
						array( 'title' => 'Html 5' ),
						array( 'title' => 'CSS' ),
						array( 'title' => 'Bootstrap' ),
						array( 'title' => 'Phalcon' ),
						array( 'title' => 'Meteor' ),
					),
				),
				array(
					'tab_title' => 'Backend Development',
					'data_list' => array(
						array( 'title' => 'Polymer' ),
						array( 'title' => 'React' ),
						array( 'title' => 'Node' ),
						array( 'title' => 'Express JS' ),
						array( 'title' => 'Hibernate' ),
						array( 'title' => 'Grails' ),
					),
				),
				array(
					'tab_title' => 'Database',
					'data_list' => array(
						array( 'title' => 'MongoDB' ),
						array( 'title' => 'MySQL' ),
					),
				),
				array(
					'tab_title' => 'Content Management',
					'data_list' => array(
						array( 'title' => 'Drupal' ),
						array( 'title' => 'Adobe Experience' ),
						array( 'title' => 'Manager Wordpress' ),
					),
				),
				array(
					'tab_title' => 'Cloud Consulting',
					'data_list' => array(
						array( 'title' => 'AWS' ),
						array( 'title' => 'Azure' ),
						array( 'title' => 'Docker' ),
						array( 'title' => 'Jenkins' ),
						array( 'title' => 'Chef' ),
						array( 'title' => 'Puppet' ),
					),
				),
				array(
					'tab_title' => 'Big Data',
					'data_list' => array(
						array( 'title' => 'Hadoop' ),
						array( 'title' => 'Apache Cassandra' ),
						array( 'title' => 'Apache Spark' ),
					),
				),
			),
		),

		'industry_features' => array(
			'classes'  => 'gray-bg',
			'subtitle' => 'SaaS App Development',
			'title'    => 'Features Of Saas App Development',
			'para'     => 'Integrating these features into Saas app development ensures a robust, secure, and user-friendly experience, meeting the needs of both businesses and end-users.',
			'listing'  => array(
				array( 'img_src' => '/industry/saas/f1.png',  'title' => 'Multi-Tenancy',                    'content' => 'Capability to serve multiple customers (tenants) from a single application instance, ensuring efficient resource utilization and scalability.' ),
				array( 'img_src' => '/industry/saas/f2.png',  'title' => 'Scalability',                      'content' => 'The ability to scale the application seamlessly to accommodate growing user bases and increasing workloads without compromising performance.' ),
				array( 'img_src' => '/industry/saas/f3.png',  'title' => 'Security',                         'content' => 'Robust security measures, including data encryption, access controls, and secure authentication mechanisms to protect sensitive user data.' ),
				array( 'img_src' => '/industry/saas/f4.png',  'title' => 'User Authentication and Authorization', 'content' => 'Secure user authentication processes with options for multi-factor authentication. Granular authorization controls to manage user roles and permissions.' ),
				array( 'img_src' => '/industry/saas/f5.png',  'title' => 'Subscription Management',          'content' => 'Features for managing subscription plans, billing cycles, and invoicing. This includes the ability to handle trial periods, upgrades, downgrades, and cancellations.' ),
				array( 'img_src' => '/industry/saas/f6.png',  'title' => 'Billing and Payment Integration',  'content' => 'Integration with payment gateways for seamless billing processes. Support for various payment methods, including credit cards, PayPal, and other online payment options.' ),
				array( 'img_src' => '/industry/saas/f7.png',  'title' => 'Customization and Branding',       'content' => 'Options for users to customize the application according to their preferences, including branding elements such as logos, colors, and themes.' ),
				array( 'img_src' => '/industry/saas/f8.png',  'title' => 'Data Backup and Recovery',         'content' => 'Regular automated data backup procedures to prevent data loss. Ability to recover data in case of accidental deletions or system failures.' ),
				array( 'img_src' => '/industry/saas/f9.png',  'title' => 'Reporting and Analytics',          'content' => 'Robust reporting tools to provide users with insights into their data. Customizable dashboards and analytics features for data-driven decision-making.' ),
				array( 'img_src' => '/industry/saas/f10.png', 'title' => 'API Integration',                  'content' => 'Support for APIs to facilitate integration with third-party services, enabling users to extend the functionality of the Saas app.' ),
				array( 'img_src' => '/industry/saas/f11.png', 'title' => 'Mobile Accessibility',             'content' => 'Responsive design or dedicated mobile apps to ensure users can access the Saas application from various devices, including smartphones and tablets.' ),
				array( 'img_src' => '/industry/saas/f12.png', 'title' => 'Collaboration Features',           'content' => 'Tools for collaboration, including real-time messaging, file sharing, and collaborative document editing, fostering teamwork and communication.' ),
				array( 'img_src' => '/industry/saas/f13.png', 'title' => 'Compliance and Regulations',       'content' => 'Adherence to industry-specific compliance standards and regulations to ensure data privacy and legal compliance.' ),
				array( 'img_src' => '/industry/saas/f14.png', 'title' => 'User Support and Documentation',   'content' => 'Accessible user support channels and comprehensive documentation to assist users in understanding the application\'s features and functionalities.' ),
				array( 'img_src' => '/industry/saas/f15.png', 'title' => 'Continuous Updates and Maintenance', 'content' => 'Regular updates and maintenance to address bugs, security vulnerabilities, and to introduce new features, ensuring the Saas app remains current and efficient.' ),
				array( 'img_src' => '/industry/saas/f16.png', 'title' => 'Workflow Automation',              'content' => 'Automation of repetitive tasks and workflows to enhance efficiency and streamline business processes for users.' ),
				array( 'img_src' => '/industry/saas/f17.png', 'title' => 'User Onboarding',                  'content' => 'Smooth onboarding processes with tutorials, guides, and intuitive user interfaces to help users quickly understand and start using the Saas application.' ),
			),
		),

		'faqs' => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array( 'faqhead' => 'What is SaaS development?',                                                    'faqbody' => 'SaaS development refers to the creation of Software as a Service applications, where software is provided over the internet on a subscription basis. This model allows users to access the software through a web browser without the need for local installations.' ),
				array( 'faqhead' => 'How does a SaaS model work?',                                                  'faqbody' => 'A SaaS model involves delivering software applications over the internet. Users subscribe to the service, and the software is hosted centrally, eliminating the need for individual installations. This model provides scalability, accessibility, and regular updates.' ),
				array( 'faqhead' => 'Which SaaS business metrics are most important and why?',                      'faqbody' => 'Key SaaS business metrics include Monthly Recurring Revenue (MRR), Customer Acquisition Cost (CAC), and Churn Rate. These metrics help assess financial health, customer acquisition efficiency, and customer retention, respectively.' ),
				array( 'faqhead' => 'To create a SaaS application, what coding abilities do I need?',              'faqbody' => 'Creating a SaaS application requires expertise in languages like Python, Ruby, Java, or JavaScript, along with knowledge of frameworks like Django or Ruby on Rails. Familiarity with cloud services like AWS or Azure is also beneficial.' ),
				array( 'faqhead' => 'Will I get a full-time PM?',                                                   'faqbody' => 'Yes, at TechnBrains, you will have a dedicated full-time Project Manager (PM) overseeing your SaaS development project.' ),
				array( 'faqhead' => 'Do I require an in-person meeting to start the project?',                     'faqbody' => 'No, TechnBrains facilitates remote collaboration. In-person meetings are not mandatory; we can efficiently kickstart and manage the project remotely.' ),
				array( 'faqhead' => 'How secure is SaaS?',                                                          'faqbody' => 'SaaS solutions are generally secure, with robust measures for data encryption, access control, and regular security updates. At TechnBrains, we prioritize the security of your SaaS application development.' ),
				array( 'faqhead' => 'What is the cost of developing a SaaS solution?',                             'faqbody' => 'The cost of developing a SaaS solution varies based on factors like features and complexity. At TechnBrains, we offer high-quality SaaS software development services starting at 30K-40K$ for an MVP.' ),
				array( 'faqhead' => 'Do I have full ownership of the project, and do you provide documentation?',  'faqbody' => 'Yes, you have full ownership. TechnBrains ensures complete transparency and provides thorough documentation throughout the SaaS application development process.' ),
			),
		),

	),
);
