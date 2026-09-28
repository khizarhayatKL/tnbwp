<?php
/**
 * Data Registry: Automotive App Development
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array(
					'@type'          => 'Question',
					'name'           => 'Which software is used in automobile industry?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'TechnBrains delivers top-notch automotive software development services tailored to your business needs. Whether it\'s creating an app for auto or developing innovative automotive applications, we\'ve got you covered.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'How Python is used in automotive industry?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'In our hands, Python becomes the driving force behind automation-based solutions, ensuring excellence in automotive app development and providing digital automotive solutions.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Cost to develop automobile software?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'At TechnBrains, we offer competitive pricing, with project costs ranging between $20,000 and $100,000, depending on your specific requirements for custom automotive solutions.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Will you sign NDA?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'As a leading automotive app development company, we prioritize your privacy. Rest assured, we always sign a Non-Disclosure Agreement (NDA) to safeguard your unique mobile app idea, ensuring the utmost confidentiality.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Where is your company based?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'TechnBrains is a globally renowned Automotive Software Development Company based in the United States. Partner with us for excellence in automotive mobile app development and cutting-edge solutions across the entire spectrum of automotive applications.',
					),
				),
			),
		),
	),
	'mock_data'  => array(
		'industry_banner'   => array(
			'title'             => 'Automobile Application Development Company',
			'para'              => 'Revamp your automotive business with our innovative software solutions. Our cutting-edge technology ensures you not only stay ahead but thrive in the rapidly evolving automotive landscape. Stay ahead in the fast lane of the ever-evolving automotive industry with our state-of-the-art technology.',
			'bg_image'          => '/industry/automotive/bg-main.webp',
			'banner_img_src'    => '/industry/automotive/banner.webp',
			'banner_img_width'  => '702',
			'banner_img_height' => '662',
			'banner_img_alt'    => 'Automotive App Development Company',
			'second_button'     => false,
		),
		'counter_sec'       => array(
			'listing' => array(
				array( 'count' => '50', 'sign' => '+', 'content' => 'Connected Vehicles Deployed' ),
				array( 'count' => '95', 'sign' => '%', 'content' => 'Automotive Client Satisfaction' ),
				array( 'count' => '8',  'sign' => 'x', 'content' => 'Accelerated New Features Time-to-Market' ),
				array( 'count' => '4',  'sign' => 'x', 'content' => 'Increased Revenue through IoT Integration' ),
			),
		),
		'language_services' => array(
			'head_text' => 'Automotive Software Development Services',
			'para_text' => 'TechnBrains is a company that specializes in developing software for the automotive industry. We offer a range of services that can help businesses achieve their goals.',
			'btn_text'  => 'REACH OUT NOW',
			'listing'   => array(
				array(
					'img_src'   => '/industry/automotive/d1.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Dealer Management Solutions',
					'list_head' => 'Dealer Management Solutions',
					'list_para' => 'We offer an affordable dealer management solution to effectively manage dealership operations.',
				),
				array(
					'img_src'   => '/industry/automotive/d2.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Autonomous Car Software Development',
					'list_head' => 'Autonomous Car Software Development',
					'list_para' => 'TechnBrains is a leading automotive software development agency that delivers exceptional solutions for car software development.',
				),
				array(
					'img_src'   => '/industry/automotive/d3.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Custom Automotive Development',
					'list_head' => 'Custom Automotive Development',
					'list_para' => 'Imagine your unique automotive app idea stuck in limbo. Our developers specialize in turning dreams into reality, crafting custom solutions that stand out.',
				),
				array(
					'img_src'   => '/industry/automotive/d4.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Automotive Cross-Platform App Development',
					'list_head' => 'Automotive Cross-Platform App Development',
					'list_para' => 'Struggling to choose between iOS and Android? Our cross-platform app development ensures your automotive apps reach a wider audience seamlessly.',
				),
				array(
					'img_src'   => '/industry/automotive/d5.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Automotive Migration & Upgradation',
					'list_head' => 'Automotive Migration & Upgradation',
					'list_para' => 'Feel the limitations of outdated systems? Our migration and upgradation services breathe new life into your software, unlocking advanced features and security.',
				),
				array(
					'img_src'   => '/industry/automotive/d6.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Fleet Management Solutions',
					'list_head' => 'Fleet Management Solutions',
					'list_para' => 'Feel the stress of managing a fleet? Our Fleet Management Solutions streamline your operations, providing real-time insights and enhancing overall efficiency.',
				),
				array(
					'img_src'   => '/industry/automotive/d7.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Web/ Mobile App Maintenance & Support',
					'list_head' => 'Web/ Mobile App Maintenance & Support',
					'list_para' => 'In addition to development, TechnBrains also offers maintenance and support services for web and mobile apps to ensure consistency.',
				),
				array(
					'img_src'   => '/industry/automotive/d8.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Vehicle Monitoring Software',
					'list_head' => 'Vehicle Monitoring Software',
					'list_para' => 'Our Car Software Development solution provides you with real-time access to essential vehicle information. As a leading automotive software development agency, we spearhead the innovation of autonomous car software.',
				),
			),
		),
		'industry_features' => array(
			'subtitle' => 'Feature-rich Automotive Software',
			'title'    => 'Automotive Software Panel',
			'para'     => 'TechnBrains has enriched the automotive solution with the necessary features and functionalities to ensure effective operations and satisfactory outcomes.',
			'listing'  => array(
				array(
					'tab_title'   => 'User Panel Features',
					'tab_content' => array(
						array( 'img_src' => '/industry/automotive/f1.png',  'title' => 'User Registration and Authentication', 'content' => 'Secure registration process with email verification. User authentication for secure access to the platform.' ),
						array( 'img_src' => '/industry/automotive/f2.png',  'title' => 'Profile Management',                   'content' => 'Editable user profiles with options to add personal information and preferences. Profile picture upload and customization.' ),
						array( 'img_src' => '/industry/automotive/f3.png',  'title' => 'Dashboard',                            'content' => 'Personalized dashboard displaying relevant information and activities. Quick access to frequently used features.' ),
						array( 'img_src' => '/industry/automotive/f4.png',  'title' => 'Search and Navigation',                'content' => 'Intuitive search functionality to find products, services, or information. User-friendly navigation for a seamless browsing experience.' ),
						array( 'img_src' => '/industry/automotive/f5.png',  'title' => 'Order Management',                     'content' => 'View order history, track current orders, and manage order details. Option to cancel or modify orders within specified timelines.' ),
						array( 'img_src' => '/industry/automotive/f6.png',  'title' => 'Notification System',                  'content' => 'Receive real-time notifications for order updates, promotions, and important announcements. Customizable notification preferences.' ),
						array( 'img_src' => '/industry/automotive/f7.png',  'title' => 'Shopping Cart',                        'content' => 'Add, remove, or modify items in the shopping cart. Save shopping cart for future purchases.' ),
						array( 'img_src' => '/industry/automotive/f8.png',  'title' => 'Wishlist',                             'content' => 'Create and manage a wishlist of favorite products or services. Receive alerts on wishlist items when they are on sale or available.' ),
						array( 'img_src' => '/industry/automotive/f9.png',  'title' => 'Payment Integration',                  'content' => 'Secure payment gateways for smooth and safe transactions. Multiple payment options, including credit cards, digital wallets, and more.' ),
						array( 'img_src' => '/industry/automotive/f10.png', 'title' => 'Review and Rating',                    'content' => 'Ability to leave reviews and ratings for products or services. View reviews from other users for informed decision-making.' ),
						array( 'img_src' => '/industry/automotive/f11.png', 'title' => 'Customer Support',                     'content' => 'Access to customer support features, such as live chat, FAQs, and contact forms. Submit support tickets for issue resolution.' ),
						array( 'img_src' => '/industry/automotive/f12.png', 'title' => 'Account Settings',                     'content' => 'Manage account settings, including privacy preferences and communication settings. Option to change passwords and update account information.' ),
						array( 'img_src' => '/industry/automotive/f13.png', 'title' => 'Social Media Integration',             'content' => 'Share products, reviews, or activities on social media platforms. Login or register using social media accounts.' ),
					),
				),
				array(
					'tab_title'   => 'Admin Panel Features',
					'tab_content' => array(
						array( 'img_src' => '/industry/automotive/2f1.png',  'title' => 'Dashboard and Analytics',            'content' => 'Overview of user activity, sales, and system performance. Analytics tools for insights into user behavior and trends.' ),
						array( 'img_src' => '/industry/automotive/2f2.png',  'title' => 'User Management',                    'content' => 'View and manage user accounts, including registration details and activity history. Option to verify or suspend user accounts.' ),
						array( 'img_src' => '/industry/automotive/2f3.png',  'title' => 'Product/Service Management',         'content' => 'Add, edit, or remove products or services. Inventory management with real-time updates.' ),
						array( 'img_src' => '/industry/automotive/2f4.png',  'title' => 'Order and Transaction Management',   'content' => 'Monitor and manage incoming orders and transactions. Process refunds, cancellations, or adjustments as necessary.' ),
						array( 'img_src' => '/industry/automotive/2f5.png',  'title' => 'Content Management',                 'content' => 'Update and manage website or app content, including banners, promotions, and announcements. Support for multimedia content such as images and videos.' ),
						array( 'img_src' => '/industry/automotive/2f6.png',  'title' => 'Customer Support Management',        'content' => 'Access customer support tickets and respond to user inquiries. Monitor and improve customer support processes.' ),
						array( 'img_src' => '/industry/automotive/2f7.png',  'title' => 'Reporting Tools',                    'content' => 'Generate and export reports on sales, user activity, and inventory. Use data to make informed decisions and optimize operations.' ),
						array( 'img_src' => '/industry/automotive/2f8.png',  'title' => 'Security and Access Control',        'content' => 'Implement security measures to protect sensitive data. Role-based access control for different admin roles.' ),
						array( 'img_src' => '/industry/automotive/2f9.png',  'title' => 'Communication Tools',                'content' => 'Send announcements, newsletters, or targeted communications to users. Manage email templates and communication preferences.' ),
						array( 'img_src' => '/industry/automotive/2f10.png', 'title' => 'Promotions and Discounts',           'content' => 'Create and manage promotional campaigns and discounts. Monitor the effectiveness of promotions through analytics.' ),
						array( 'img_src' => '/industry/automotive/2f11.png', 'title' => 'System Settings',                    'content' => 'Configure platform settings, including currency, language, and regional preferences. Manage system updates and integrations.' ),
						array( 'img_src' => '/industry/automotive/2f12.png', 'title' => 'Feedback and Reviews',               'content' => 'Access and moderate user reviews and ratings. Gather feedback to improve products, services, or the platform itself.' ),
					),
				),
			),
		),
		'stack_new_box'     => array(
			'subtitle' => 'APP FOR AUTO TECHSTACK',
			'title'    => 'Tech Stack We Use for Automotive',
			'para'     => 'We provide cutting-edge technology and methodologies to energy and utility service providers worldwide to enhance decision-making and ensure digital stability in an unpredictable industry.',
			'listing'  => array(
				array(
					'tab_title' => 'IDEs and Editors',
					'data_list' => array(
						array( 'title' => 'Eclipse' ),
						array( 'title' => 'Visual Studio' ),
						array( 'title' => 'Code Composer Studio' ),
						array( 'title' => 'Arduino IDE' ),
					),
				),
				array(
					'tab_title' => 'Simulators and Emulators',
					'data_list' => array(
						array( 'title' => 'QEMU' ),
						array( 'title' => 'Simulink' ),
						array( 'title' => 'CANoe' ),
						array( 'title' => 'CarMaker' ),
					),
				),
				array(
					'tab_title' => 'Analyzers and Profilers',
					'data_list' => array(
						array( 'title' => 'Valgrind' ),
						array( 'title' => 'Gprof' ),
						array( 'title' => 'Lauterbach Trace32' ),
						array( 'title' => 'LDRA' ),
					),
				),
				array(
					'tab_title' => 'Debuggers and Diagnostics',
					'data_list' => array(
						array( 'title' => 'GDB' ),
						array( 'title' => 'JTAG' ),
						array( 'title' => 'OBD-II' ),
						array( 'title' => 'Wireshark' ),
					),
				),
				array(
					'tab_title' => 'Frameworks and Libraries',
					'data_list' => array(
						array( 'title' => 'Qt' ),
						array( 'title' => 'AUTOSAR' ),
						array( 'title' => 'OpenCV' ),
						array( 'title' => 'OpenSSL' ),
					),
				),
				array(
					'tab_title' => 'Collaboration and Documentation',
					'data_list' => array(
						array( 'title' => 'Git' ),
						array( 'title' => 'SVN' ),
						array( 'title' => 'Jira' ),
						array( 'title' => 'Doxygen' ),
					),
				),
			),
		),
		'dev_process'       => array(
			'main_title' => 'Well-planned Agile Development Process',
			'lang_title' => 'Automotive Software Development Process at TechnBrains',
			'lang_para'  => 'At TechnBrains, a premier Automotive Software development company, we meticulously follow a well-structured agile development process, ensuring the highest quality for our solutions.',
			'listing'    => array(
				array( 'number' => '01', 'title' => 'Conceptualization',              'para' => 'As a leading Automotive Software development company, our process begins with in-depth analysis and planning. We lay the foundation for your project, aligning it with your goals and requirements.' ),
				array( 'number' => '02', 'title' => 'UI/UX Design',                   'para' => 'Recognizing the significance of excellent UI/UX design in driving user engagement, we devote special attention to this step. Our goal is to create an app for auto that not only meets industry standards but also exceeds user expectations.' ),
				array( 'number' => '03', 'title' => 'Automotive Software development', 'para' => 'Once the analysis and planning are complete, our dedicated team dives into the development process. Transforming your ideas into a robust, tailor-made custom software that perfectly suits your needs is our expertise.' ),
				array( 'number' => '04', 'title' => 'Testing',                        'para' => 'At TechnBrains, a leading online Automotive Software development agency, we prioritize quality. Rigorous testing is an integral part of our process, ensuring that the developed applications meet the highest standards before deployment.' ),
				array( 'number' => '05', 'title' => 'Maintenance & Support',           'para' => 'Beyond development, we excel in providing top-notch maintenance and support services. Our commitment extends beyond the launch, ensuring that your digital automotive solutions continue to operate seamlessly.' ),
			),
		),
		'proposal'          => array(
			'head_html' => '<h2>Ready To Elevate Your Automotive Software Experience? Hire Our Expert Developers Today For Seamless Implementation And Innovation!</h2>',
			'btn_text'  => 'REACH OUT NOW!',
		),
		'faqs'              => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array( 'faqhead' => 'Which software is used in automobile industry?',                        'faqbody' => 'TechnBrains delivers top-notch automotive software development services tailored to your business needs. Whether it\'s creating an app for auto or developing innovative automotive applications, we\'ve got you covered.' ),
				array( 'faqhead' => 'How Python is used in automotive industry?',                           'faqbody' => 'In our hands, Python becomes the driving force behind automation-based solutions, ensuring excellence in automotive app development and providing digital automotive solutions.' ),
				array( 'faqhead' => 'Cost to develop automobile software?',                                 'faqbody' => 'At TechnBrains, we offer competitive pricing, with project costs ranging between $20,000 and $100,000, depending on your specific requirements for custom automotive solutions.' ),
				array( 'faqhead' => 'Will you sign NDA?',                                                   'faqbody' => 'As a leading automotive app development company, we prioritize your privacy. Rest assured, we always sign a Non-Disclosure Agreement (NDA) to safeguard your unique mobile app idea, ensuring the utmost confidentiality.' ),
				array( 'faqhead' => 'Where is your company based?',                                         'faqbody' => 'TechnBrains is a globally renowned Automotive Software Development Company based in the United States. Partner with us for excellence in automotive mobile app development and cutting-edge solutions across the entire spectrum of automotive applications.' ),
			),
		),
	),
	'components' => array(
		array( 'name' => 'industry-banner',    'modifier_class' => '' ),
		array( 'name' => 'counter-sec',        'modifier_class' => '' ),
		array( 'name' => 'language-services',  'modifier_class' => '' ),
		array( 'name' => 'industry-features',  'modifier_class' => '' ),
		array( 'name' => 'stack-new-box',      'modifier_class' => 'gray-bg' ),
		array( 'name' => 'development-process','modifier_class' => '' ),
		array( 'name' => 'proposal',           'modifier_class' => '' ),
		array( 'name' => 'testimonials',       'modifier_class' => '' ),
		array( 'name' => 'main-faqs',          'modifier_class' => '' ),
	),
);
