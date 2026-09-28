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
			'head_text'   => 'Hire Swift Developer - Swift Experts for iOS Development',
			'para_text'   => 'Hire Swift Developers from TechnBrains with top-class Swift development services expertise. Our certified Swift programmers build interactive, fully functional, high-performance iOS Swift apps per your business needs.',
			'span_text'   => 'We have a team of skilled Senior or Junior Swift app developers, Consultants, and Architects. The Swift developers are equipped with the latest iOS Swift development SDK, tools, and frameworks, and has extensive experience in building and completing native iOS apps for both start-ups and enterprise businesses.',
			'form_title'  => 'Deploy Swift Projects',
			'form_para'   => 'With Top Swift Developers we are here to launch your app with a bang!',
			'banner_list' => array(
				array( 'li_list' => 'Proficient in XCode, RxSwift, and Objective-C.' ),
				array( 'li_list' => 'Practical knowledge in iOS SDK, WatchKit, MapKit, and ARKit.' ),
				array( 'li_list' => 'Optimizing app performance and memory usage.' ),
				array( 'li_list' => 'Web services and APIs for app integration' ),
			),
		),

		'freelance' => array(
			'img_src'    => '/hire/laravel/freelance-banner.png',
			'img_width'  => 512,
			'img_height' => 612,
			'img_alt'    => 'freelance-banner',
			'head_text'  => 'Hire Dedicated Swift<br><span>Developers</span>',
			'para_text'  => 'If you\'re looking to hire dedicated Swift developers, you\'ve come to the right place. Our team of skilled and experienced Swift developers is ready to take your iOS app development project to the next level. With a deep understanding of Swift programming, they will bring your ideas to life, ensuring top-notch performance and user experience. Partner with the best iOS app development company to get started on your project.<br><br>TechnBrains is the top mobile app development company in United States. For years, we have been providing skilled Swift programmers to clients worldwide. Our team of expert Swift developers assists clients in creating highly scalable and native iOS apps. We aim to boost your online business by incorporating your unique ideas and brainstorming sessions into the development process.',
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
			'sub_head' => 'Engagement Models to Hire Swift Developers',
			'para_text'=> 'When it comes to hiring Swift developers, we offer a range of flexible engagement models tailored to your specific needs. Whether you\'re looking for short-term project-based work or long-term partnerships, our team of skilled Swift developers is ready to collaborate. Explore our engagement models and discover the perfect fit for your development requirements today.',
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
			'sub_head'    => 'Why Choose Our Swift Developers?',
			'para_text'   => 'Looking to enhance the performance of your iOS app or online application? Our skilled Swift Developers can help you create safe, scalable, and high-quality applications that meet your business requirements using the latest Swift technologies and libraries. Choosing our Swift developers means you\'re investing in excellence and innovation for your digital endeavors.',
			'choose_list' => array(
				array( 'src' => '/hire/laravel/image1.png', 'width' => 88, 'height' => 88, 'head' => 'Swift With Firebase',    'para' => 'Our Swift developers can integrate Firebase to add real-time database, authorization, cloud messaging, and more to your app.' ),
				array( 'src' => '/hire/laravel/image2.png', 'width' => 88, 'height' => 88, 'head' => 'Swift With ARKit',        'para' => 'Our team of Swift developers can integrate ARKit to create engaging and immersive AR experiences for your mobile application.' ),
				array( 'src' => '/hire/laravel/image3.png', 'width' => 88, 'height' => 88, 'head' => 'Swift With Cocoa Pods',   'para' => 'Hire Swift developers with experience in managing third-party libraries for streamlined app development.' ),
			),
		),

		'hire_table' => array(
			'sub_head'   => 'Why hire Swift developers from TechnBrains over freelance or in-house developers?',
			'para_text'  => 'Hiring Swift developers from TechnBrains offers a distinct advantage over freelancers or in-house developers. Our team of skilled professionals brings a wealth of experience and expertise, ensuring your project is in capable hands. Choose TechnBrains for your Swift development needs and experience the difference in quality and reliability.',
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
			'sub_head' => 'Hire Swift Developers in Just 3 Easy Steps.',
			'para_text'=> 'Hiring professional Swift Developers for your project is now as easy as 1-2-3! Simply post your job requirements, review the handpicked candidates, and select the perfect fit for your team. Elevate your development journey with our streamlined process today.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Choose your Engagement Model',  'content' => array( 'Select the engagement model that suits your project and budget.' ),                                                                             'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Select & Pick SWIFT Developers','content' => array( 'Handpick Swift developers from our talented pool of experts and interview them for their technical expertise.' ),                              'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Onboard Swift Developers',      'content' => array( 'Onboard your chosen Swift Developer seamlessly for a productive collaboration.' ),                                                             'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'OUR SWIFT DEVELOPER\'S TECH STACK EXPERTISE',
			'para_text' => 'Our team of Swift developers possesses a profound expertise in a diverse range of technologies and tools, ensuring they can craft cutting-edge iOS and macOS applications. With a deep understanding of Swift, SwiftUI, and Objective-C, they harness the power of Xcode, Git, and CocoaPods to deliver seamless and innovative solutions for your digital needs.',
			'hire_list' => array(
				array( 'number' => '01', 'head' => 'Swift Frameworks', 'para' => '● UI Kit<br>● Core Data<br>● Sprite Kit<br>● Swift UI<br>● Alamo fire<br>● Foundation' ),
				array( 'number' => '02', 'head' => 'Databases',        'para' => '● MySQL<br>● PostgreSQL<br>● Firebase<br>● MongoDB<br>● Couchbase<br>● Core Data' ),
				array( 'number' => '03', 'head' => 'UI/UX Tools',      'para' => '● Photoshop<br>● Illustrator<br>● Zeplin<br>● Sketch<br>● Snap Kit<br>● XD' ),
				array( 'number' => '04', 'head' => 'Others Tools',     'para' => '● Cocoa pods<br>● Injection<br>● Build Time<br>● Analyzer<br>● Checker<br>● OpenSim' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
			'head_text' => 'We\'re here to help',
			'faq_image' => true,
			'listing'   => array(
				array( 'faqhead' => 'How much does it cost to hire a Swift developer?',                                          'faqbody' => 'At TechnBrains, we offer flexible pricing options for hiring Swift developers, including hourly and project-based rates, ensuring you get cost-effective solutions tailored to your specific needs.' ),
				array( 'faqhead' => 'What can our Swift developers do for you?',                                                 'faqbody' => 'Our expert Swift developers can create high-quality iOS and macOS applications, leveraging their extensive expertise in Swift, SwiftUI, and Objective-C. They excel in crafting innovative solutions using tools like Xcode, Git, and CocoaPods.' ),
				array( 'faqhead' => 'Can I hire a Swift developer for hourly or project-based tasks?',                          'faqbody' => 'Yes, you can choose to hire our Swift developers on an hourly or project-based basis, providing you with the flexibility to scale resources according to your project\'s demands.' ),
				array( 'faqhead' => 'Will the hired Swift resources from TechnBrains be available in my time zone?',            'faqbody' => 'Absolutely! We offer skilled Swift developers from various time zones, ensuring alignment with your working hours for seamless collaboration and efficient project management.' ),
				array( 'faqhead' => 'Do you take care of the confidentiality of the client\'s intellectual property?',         'faqbody' => 'We prioritize the utmost confidentiality and security of your intellectual property. TechnBrains implements robust measures to safeguard your sensitive information throughout the development process.' ),
				array( 'faqhead' => 'Will I get post-software development support?',                                            'faqbody' => 'Yes, we provide comprehensive post-development support to ensure your application runs smoothly, receives updates, and remains in top-notch condition, guaranteeing your investment\'s long-term success.' ),
				array( 'faqhead' => 'How much does it cost to hire a dedicated Swift developer?',                               'faqbody' => 'Our dedicated Swift developers are available at competitive rates. Contact us to discuss your project\'s specific requirements and receive a customized quote.' ),
				array( 'faqhead' => 'Do You Have A Service-Level Agreement?',                                                   'faqbody' => 'Yes, we offer a Service-Level Agreement (SLA) that outlines the terms, scope, and quality standards of our services, ensuring transparency and accountability throughout our collaboration.' ),
				array( 'faqhead' => 'Can you help me complete my incomplete app development project?',                          'faqbody' => 'Certainly! Our experienced Swift developers can step in to rescue and complete your incomplete app development project, bringing it to fruition with expertise and efficiency.' ),
			),
		),

	),
);
