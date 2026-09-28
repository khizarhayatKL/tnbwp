<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array( '@type' => 'Question', 'name' => 'What should be the revenue model for my On Demand app?',                              'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'When it comes to developing mobile apps for on-demand services, the ultimate goal is monetization. Depending on the nature of your app, there are various ways to make money from it. For instance, if you\'re creating a cab booking app like Uber, you can earn revenue by charging passengers and using surge pricing.' ) ),
				array( '@type' => 'Question', 'name' => 'How much would it cost to develop my On Demand app?',                                  'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'To determine the cost of developing an on-demand mobile application, we need to understand your specific business requirements. However, you can get a rough estimate of the cost by visiting our webpage How much does it cost to develop a mobile app.' ) ),
				array( '@type' => 'Question', 'name' => 'How Long Would it Take to Develop an On Demand App?',                                  'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Developing an on-demand app, including all platforms, would take approximately 8 months to a year depending on its complexity.' ) ),
				array( '@type' => 'Question', 'name' => 'Does your On Demand App Development services include marketing and promotion?',         'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'We\'ve got some awesome marketing and promotion services available for our clients. Whether you\'re looking to boost your online presence or get the word out about a new product or service, we\'ve got you covered.' ) ),
				array( '@type' => 'Question', 'name' => 'How customized will the app be according to my business?',                             'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'At TechnBrains, we develop fully customized apps that align with your brand image and tone. Our tech-savvy app developers will bring your app vision to life.' ) ),
				array( '@type' => 'Question', 'name' => 'What is the range of your on demand mobility solutions?',                               'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Our on-demand mobility solutions are built on the foundation of understanding the market, followed by a design and development process that aims to ensure quick and easy access for end-users.' ) ),
				array( '@type' => 'Question', 'name' => 'What client base do you work with?',                                                    'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'We\'re Here To Help Every Business Thrive. No matter what your idea model is, how big your business is and how you wish to enter the on demand domain, we have your back.' ) ),
				array( '@type' => 'Question', 'name' => 'What is the future of On Demand apps?',                                                 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'The future of On Demand apps appears to be promising as it is expanding into various industries. On Demand app development solutions will incorporate advanced technologies such as Blockchain and AI to enhance the user experience.' ) ),
				array( '@type' => 'Question', 'name' => 'What is the process of developing On Demand Apps?',                                     'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'To develop an on-demand clone app, you\'ll need to collaborate with a team of experienced on-demand app developers who possess the necessary expertise to deliver an effective on-demand solution.' ) ),
				array( '@type' => 'Question', 'name' => 'What are the benefits of On Demand mobile app development?',                           'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'On-demand mobile app development revolutionizes service accessibility, offering convenience through instant access. Businesses benefit from efficient resource utilization, real-time communication, and data-driven insights, enhancing operational efficiency and promoting global scalability.' ) ),
			),
		),
	),

	'components' => array(
		array( 'name' => 'industry-banner',    'modifier_class' => '' ),
		array( 'name' => 'counter-sec',        'modifier_class' => '' ),
		array( 'name' => 'language-services',  'modifier_class' => '' ),
		array( 'name' => 'stack-new-box',      'modifier_class' => 'angular-stack' ),
		array( 'name' => 'proposal',           'modifier_class' => '' ),
		array( 'name' => 'industry-features',  'modifier_class' => '' ),
		array( 'name' => 'development-process','modifier_class' => '' ),
		array( 'name' => 'testimonials',       'modifier_class' => '' ),
		array( 'name' => 'main-faqs',          'modifier_class' => '' ),
	),

	'mock_data' => array(

		'industry_banner' => array(
			'title'             => 'On-Demand App Development Company',
			'para'              => 'Procure fully customized on-demand app development services for transparency and real-time operations. We blend your business idea with ease and real-time functionality to develop apps that make your brand a household name.',
			'second_button'     => false,
			'banner_img_src'    => '/industry/on-demand/banner.webp',
			'banner_img_width'  => '542',
			'banner_img_height' => '628',
			'banner_img_alt'    => 'banner',
			'bg_image'          => '/industry/on-demand/bg-main.webp',
			'classes'           => 'banner-img',
		),

		'counter_sec' => array(
			'listing' => array(
				array( 'count' => '75', 'sign' => '+', 'content' => 'On-Demand Apps Developed' ),
				array( 'count' => '94', 'sign' => '%', 'content' => 'On-Demand Client Satisfaction' ),
				array( 'count' => '8',  'sign' => 'x', 'content' => 'Accelerated Time-to-Market for On-Demand Services' ),
				array( 'count' => '5',  'sign' => 'x', 'content' => 'Increased Revenue for On-Demand Solutions' ),
			),
		),

		'language_services' => array(
			'head_text' => 'Our On-Demand App Development Services',
			'para_text' => 'As a leading on demand mobile app development company, we provide a wide range of on demand solutions to cater to various needs. At TechnBrains, we offer popular on-demand mobile app development services mentioned below:',
			'btn_text'  => 'REACH OUT NOW',
			'anchor'    => false,
			'listing'   => array(
				array( 'img_src' => '/industry/on-demand/d1.png',  'width' => '80', 'height' => '80', 'alt' => 'On-Demand Taxi Service',           'list_head' => 'On-Demand Taxi Service',           'list_para' => 'Taxi services have been available for quite some time, but nowadays there is no need to step outside to book one. Utilizing an on-demand taxi mobile application, you can easily reserve a taxi and have it arrive right in front of your home at the exact time you need it.' ),
				array( 'img_src' => '/industry/on-demand/d2.png',  'width' => '80', 'height' => '80', 'alt' => 'On-Demand Food Service',            'list_head' => 'On-Demand Food Service',            'list_para' => 'Recently, on-demand food delivery mobile apps like Zomato have become very popular and generated millions in profit. We can develop a food delivery app like Uber for you.' ),
				array( 'img_src' => '/industry/on-demand/d3.png',  'width' => '80', 'height' => '80', 'alt' => 'Doctor On-Demand Service',          'list_head' => 'Doctor On-Demand Service',          'list_para' => 'Medical services are crucial, and with the Doctor On-Demand app, you can easily provide them to patients in need.' ),
				array( 'img_src' => '/industry/on-demand/d4.png',  'width' => '80', 'height' => '80', 'alt' => 'Household Services On-Demand',      'list_head' => 'Household Services On-Demand',      'list_para' => 'House cleaning On-Demand mobile apps are popular in the USA. TechnBrains delivers the best household service On-Demand apps.' ),
				array( 'img_src' => '/industry/on-demand/d5.png',  'width' => '80', 'height' => '80', 'alt' => 'Laundry On-Demand',                 'list_head' => 'Laundry On-Demand',                 'list_para' => 'Our On Demand developers can provide high-quality laundry On Demand mobile app development solutions. This is one of the most popular niches in the United States when it comes to the On Demand industry.' ),
				array( 'img_src' => '/industry/on-demand/d6.png',  'width' => '80', 'height' => '80', 'alt' => 'Courier On-Demand',                 'list_head' => 'Courier On-Demand',                 'list_para' => 'The on demand logistics service app has become an essential part of our lives since COVID-19. It allows us to send couriers on demand through their mobile app and keep track of them.' ),
				array( 'img_src' => '/industry/on-demand/d7.png',  'width' => '80', 'height' => '80', 'alt' => 'On-Demand Grocery Delivery',        'list_head' => 'On-Demand Grocery Delivery',        'list_para' => 'We spend a significant amount of time on grocery shopping. However, now you can do it all through the On Demand Grocery mobile app. Developed and deployed by an expert team of developers at TechnBrains.' ),
				array( 'img_src' => '/industry/on-demand/d8.png',  'width' => '80', 'height' => '80', 'alt' => 'On-Demand Car Wash',                'list_head' => 'On-Demand Car Wash',                'list_para' => 'On demand car wash services have become increasingly popular in recent years. Users can now request a car wash service through a mobile app.' ),
				array( 'img_src' => '/industry/on-demand/d9.png',  'width' => '80', 'height' => '80', 'alt' => 'On-Demand Tutor App',               'list_head' => 'On-Demand Tutor App',               'list_para' => 'Develop an on demand tutor mobile app with the help of dedicated developers at TechnBrains to receive world-class solutions.' ),
				array( 'img_src' => '/industry/on-demand/d10.png', 'width' => '80', 'height' => '80', 'alt' => 'On-Demand House Cleaning App',      'list_head' => 'On-Demand House Cleaning App',      'list_para' => 'In countries such as the United States and the United Kingdom, mobile apps for on-demand house cleaning services are gaining popularity rapidly. TechnBrains can assist you in developing the precise app you require.' ),
				array( 'img_src' => '/industry/on-demand/d11.png', 'width' => '80', 'height' => '80', 'alt' => 'On-Demand Flower Delivery',         'list_head' => 'On-Demand Flower Delivery',         'list_para' => 'The On-Demand flower delivery mobile app allows you to conveniently order flowers to be delivered to your doorstep or send them to someone else.' ),
				array( 'img_src' => '/industry/on-demand/d12.png', 'width' => '80', 'height' => '80', 'alt' => 'On-Demand Driver App',              'list_head' => 'On-Demand Driver App',              'list_para' => 'The on-demand driver app is a great opportunity for those who need to hire drivers. With this app, users can easily request a driver to take them from one location to another.' ),
				array( 'img_src' => '/industry/on-demand/d13.png', 'width' => '80', 'height' => '80', 'alt' => 'On-Demand Medicine Delivery App',   'list_head' => 'On-Demand Medicine Delivery App',   'list_para' => 'The On-Demand medicine delivery app enables users to have their prescriptions delivered to their doorstep in a short amount of time.' ),
				array( 'img_src' => '/industry/on-demand/d14.png', 'width' => '80', 'height' => '80', 'alt' => 'On-Demand Car Rent',                'list_head' => 'On-Demand Car Rent',                'list_para' => 'Develop a popular On-Demand car rental app in the USA and UK with TechnBrains, a leading On-Demand app development company that can deliver the solutions you need.' ),
				array( 'img_src' => '/industry/on-demand/d15.png', 'width' => '80', 'height' => '80', 'alt' => 'On-Demand Lawyer App',              'list_head' => 'On-Demand Lawyer App',              'list_para' => 'TechnBrains has experience in developing and deploying on-demand lawyer apps like Rocket Lawyer. Our team can develop an on-demand lawyer mobile app for you.' ),
			),
		),

		'stack_new_box' => array(
			'subtitle' => 'REVOLUTIONIZE NOW WITH ON-DEMAND',
			'title'    => 'Next Gen Tech Stack For Your On Demand App',
			'listing'  => array(
				array(
					'tab_title' => 'Frontend Development',
					'data_list' => array(
						array( 'title' => 'React' ),
						array( 'title' => 'HTML' ),
						array( 'title' => 'Angular' ),
					),
				),
				array(
					'tab_title' => 'Backend Development',
					'data_list' => array(
						array( 'title' => 'AWS Amplify' ),
						array( 'title' => 'MongoDB' ),
						array( 'title' => 'Microsoft SQL' ),
						array( 'title' => 'Firebase' ),
						array( 'title' => 'Node' ),
						array( 'title' => 'Laravel' ),
					),
				),
				array(
					'tab_title' => 'UI/UX Development',
					'data_list' => array(
						array( 'title' => 'InVision' ),
						array( 'title' => 'Figma' ),
						array( 'title' => 'Adobe XD' ),
					),
				),
				array(
					'tab_title' => 'Programming Language',
					'data_list' => array(
						array( 'title' => 'Swift' ),
						array( 'title' => 'Kotlin' ),
						array( 'title' => 'Dart' ),
					),
				),
				array(
					'tab_title' => 'Project Management',
					'data_list' => array(
						array( 'title' => 'Trello' ),
						array( 'title' => 'Slack' ),
						array( 'title' => 'Jira' ),
					),
				),
			),
		),

		'proposal' => array(
			'head_html' => '<h2>Ready To Create A Cutting-Edge On-Demand App? Dive Into Our Hire Developers Portal And Let\'s Shape The Future Of Your App Together!</h2>',
			'btn_text'  => 'reach out now!',
			'anchor'    => false,
		),

		'industry_features' => array(
			'subtitle' => 'Innovate Today with TechnBrains',
			'title'    => 'Crafting Exceptional On-Demand App Experiences',
			'para'     => 'As a leading on-demand app development company, we are committed to delivering solutions that not only meet but exceed user expectations, creating a seamless and immersive experience. Below are some of the features of on demand app:',
			'listing'  => array(
				array( 'img_src' => '/industry/on-demand/f1.png', 'title' => 'Seamless Booking System',       'content' => 'Embracing the essence of true user experience, our on-demand app development services prioritize a seamless booking system. With just a few taps, users can effortlessly access the services they need, ensuring a hassle-free and efficient process.' ),
				array( 'img_src' => '/industry/on-demand/f2.png', 'title' => 'Order History Management',      'content' => 'As a profound player in on-demand app development, we understand the significance of intelligent order tracking. Our smart order history management ensures that users can effortlessly track and manage their orders, adding a layer of convenience to their experience.' ),
				array( 'img_src' => '/industry/on-demand/f3.png', 'title' => 'Updates Via Message Or Calls',  'content' => 'Our custom on-demand app development goes beyond the ordinary, providing interactive ways for customers to stay connected with services. Whether it\'s through messages or calls, we ensure that users receive timely updates, enhancing their engagement with the platform.' ),
				array( 'img_src' => '/industry/on-demand/f4.png', 'title' => 'In-app Payment Merchant',       'content' => 'Utilizing the latest, secure APIs and payment gateways, our on-demand app development services guarantee a smooth checkout process. The incorporation of an in-app payment merchant ensures that users can transact securely and conveniently within the application.' ),
				array( 'img_src' => '/industry/on-demand/f5.png', 'title' => 'Easy Onboarding',               'content' => 'From design aesthetics to the seamless integration of backend services, our on-demand app development ensures a clear and captivating interface for new users. The onboarding process is crafted to be user-friendly, making a positive first impression.' ),
				array( 'img_src' => '/industry/on-demand/f6.png', 'title' => 'Multilingual Support',          'content' => 'Breaking down language barriers, our on-demand app development services include robust multilingual support. We believe in providing a platform that speaks the user\'s language, catering to a diverse audience without any restrictions.' ),
				array( 'img_src' => '/industry/on-demand/f7.png', 'title' => 'Real-time Notifications',       'content' => 'Powered by an avant-garde tech stack, our on-demand apps feature real-time notifications. Users can stay informed instantly, enhancing their overall experience with timely updates and relevant information.' ),
				array( 'img_src' => '/industry/on-demand/f8.png', 'title' => 'Online Customer Service',       'content' => 'Building on-demand apps goes beyond the app itself; we ensure users have seamless interactions with our support team. Our automated support features empower users to engage with customer service conveniently, addressing their queries and concerns in real-time.' ),
				array( 'img_src' => '/industry/on-demand/f9.png', 'title' => 'Geolocation',                   'content' => 'A staple in our toolkit when developing on-demand personal service applications is geolocation. This feature adds a layer of personalization, connecting users with relevant services based on their location.' ),
			),
		),

		'dev_process' => array(
			'main_title' => 'Secure Success With Top-Notch On Demand App Development',
			'lang_title' => '5 Steps to Successful On Demand App',
			'lang_para'  => 'As your trusted on demand app development company, we bring your on-demand app vision to life, creating a digital solution that seamlessly connects users with the services they need.',
			'classes'    => 'gray-bg',
			'listing'    => array(
				array( 'number' => '01', 'title' => 'Conceptualization and Ideation',          'para' => 'Collaborate to define the app\'s core features and unique value proposition.' ),
				array( 'number' => '02', 'title' => 'Strategic Planning and Design',            'para' => 'Create a strategic plan, design wireframes, and ensure an intuitive user experience.' ),
				array( 'number' => '03', 'title' => 'On Demand App Development and Coding',     'para' => 'Expert developers write clean, scalable code for efficient on-demand app functionality.' ),
				array( 'number' => '04', 'title' => 'Testing and Quality Assurance',            'para' => 'Rigorous testing identifies and rectifies bugs or glitches, ensuring a flawless user experience.' ),
				array( 'number' => '05', 'title' => 'Deployment and Post-Launch Support',       'para' => 'Smoothly launch the app, providing ongoing support for updates and issue resolution.' ),
			),
		),

		'faqs' => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array( 'faqhead' => 'What should be the revenue model for my On Demand app?',                              'faqbody' => 'When it comes to developing mobile apps for on-demand services, the ultimate goal is monetization. Depending on the nature of your app, there are various ways to make money from it. For instance, if you\'re creating a cab booking app like Uber, you can earn revenue by charging passengers and using surge pricing.' ),
				array( 'faqhead' => 'How much would it cost to develop my On Demand app?',                                  'faqbody' => 'To determine the cost of developing an on-demand mobile application, we need to understand your specific business requirements. However, you can get a rough estimate of the cost by visiting our webpage How much does it cost to develop a mobile app.' ),
				array( 'faqhead' => 'How Long Would it Take to Develop an On Demand App?',                                  'faqbody' => 'Developing an on-demand app, including all platforms, would take approximately 8 months to a year depending on its complexity.' ),
				array( 'faqhead' => 'Does your On Demand App Development services include marketing and promotion?',         'faqbody' => 'We\'ve got some awesome marketing and promotion services available for our clients. Whether you\'re looking to boost your online presence or get the word out about a new product or service, we\'ve got you covered.' ),
				array( 'faqhead' => 'How customized will the app be according to my business?',                             'faqbody' => 'At TechnBrains, we develop fully customized apps that align with your brand image and tone. Our tech-savvy app developers will bring your app vision to life. Book a free consultation.' ),
				array( 'faqhead' => 'What is the range of your on demand mobility solutions?',                               'faqbody' => 'Our on-demand mobility solutions are built on the foundation of understanding the market, followed by a design and development process that aims to ensure quick and easy access for end-users.' ),
				array( 'faqhead' => 'What client base do you work with?',                                                    'faqbody' => 'We\'re Here To Help Every Business Thrive. No matter what your idea model is, how big your business is and how you wish to enter the on demand domain, we have your back.' ),
				array( 'faqhead' => 'What is the future of On Demand apps?',                                                 'faqbody' => 'The future of On Demand apps appears to be promising as it is expanding into various industries. On Demand app development solutions will incorporate advanced technologies such as Blockchain and AI to enhance the user experience.' ),
				array( 'faqhead' => 'What is the process of developing On Demand Apps?',                                     'faqbody' => 'To develop an on-demand clone app, you\'ll need to collaborate with a team of experienced on-demand app developers who possess the necessary expertise to deliver an effective on-demand solution.' ),
				array( 'faqhead' => 'What are the benefits of On Demand mobile app development?',                           'faqbody' => 'On-demand mobile app development revolutionizes service accessibility, offering convenience through instant access. Businesses benefit from efficient resource utilization, real-time communication, and data-driven insights, enhancing operational efficiency and promoting global scalability.' ),
			),
		),

	),
);
