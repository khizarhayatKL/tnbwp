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
    'head_text'   => 'Hire Flutter Developers for Cross-Platform App Development',
    'para_text'   => 'Hire Flutter developers from TechnBrains to build fast, scalable, and visually consistent mobile apps for iOS and Android from a single codebase. Our Flutter developers work with Dart, Flutter SDK, Firebase, REST APIs, GraphQL, third-party packages, payment gateways, animations, and app deployment workflows. Whether you need to launch an MVP, migrate an existing app to Flutter, or scale a cross-platform product, we help you hire Flutter developers or assemble a dedicated team around your goals.',
    'span_text'   => 'Hire our expert developers and bring your app ideas to life. Get started now!',
    'form_title'  => 'Deploy Flutter Projects',
    'form_para'   => 'With Top Flutter Developers we are here to launch your app with a bang!',
    'banner_list' => array(
        array( 'li_list' => 'Migrating projects from Flutter 2 to Flutter 3' ),
        array( 'li_list' => 'Migrate your existing app to the Flutter platform' ),
        array( 'li_list' => 'Native iOS & Android technologies' ),
        array( 'li_list' => 'Adept with third-party Flutter packages and APIs,' ),
        array( 'li_list' => 'Expertise in Panache, Codemagic, Appetize, and Virtual Studio Code.' ),
    ),
),

		'freelance' => array(
			'img_src'    => '/hire/laravel/freelance-banner.png',
			'img_width'  => 512,
			'img_height' => 612,
			'img_alt'    => 'freelance-banner',
			'head_text'  => 'Hire Skilled Flutter<br><span>Developers</span>',
			'para_text'  => 'TechnBrains is a topnotch Mobile App Development with expert flutter developers. We offer a diverse range of Flutter Developers to choose from, each with varying levels of experience, skills, and talents that can match your specific needs for a custom Flutter developer. You can hire a dedicated Flutter Developer or a whole team of developers using our flexible hiring models.',
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
    'sub_head'  => 'Engagement Models to Hire Flutter Developers',
    'para_text' => 'Choose the engagement model that aligns with your product stage, internal team, and delivery expectations.',
    'tab_list'  => array(
        array(
            'key'       => 'tab-1',
            'label'     => 'Staff Augmentation',
            'title'     => 'Staff Augmentation',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Businesses with an existing product or development team that needs Flutter expertise' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Small to large' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Partially or fully defined' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'Very high' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'High, scale based on sprint needs' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose staff augmentation when you need Flutter developers to join your team, work within your process, and support cross-platform mobile development without hiring full-time employees.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Hourly, part-time, or full-time' ),
            ),
            'src' => '/hire/tab-1.png', 'width' => 227, 'height' => 180, 'alt' => 'Staff Augmentation',
        ),
        array(
            'key'       => 'tab-2',
            'label'     => 'Software Outsourcing',
            'title'     => 'Software Outsourcing',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Startups, SMBs, and enterprises that want a managed Flutter app development process' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Small to medium' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Clearly defined or ready for discovery' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'Medium, with milestone-based reviews' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'Moderate' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose software outsourcing when you want TechnBrains to manage Flutter app development from planning and UI implementation to backend integration, testing, launch, and support.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Fixed-scope or time and material' ),
            ),
            'src' => '/hire/tab-3.png', 'width' => 227, 'height' => 180, 'alt' => 'Software Outsourcing',
        ),
        array(
            'key'       => 'tab-3',
            'label'     => 'Dedicated Teams',
            'title'     => 'Dedicated Teams',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Businesses building long-term Flutter products or multi-platform applications' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Medium to large' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Evolving roadmap' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'High' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'High' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose dedicated teams when you need Flutter developers, QA engineers, designers, and delivery support working continuously on your product roadmap.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Monthly team-based billing' ),
            ),
            'src' => '/hire/tab-2.png', 'width' => 227, 'height' => 180, 'alt' => 'Dedicated Teams',
        ),
    ),
),

		'hire_choose' => array(
    'sub_head'    => 'What You Can Build With Our Flutter Developers',
    'para_text'   => 'Flutter is a strong option when you want a consistent app experience across iOS and Android without managing two fully separate native codebases. TechnBrains helps you hire Flutter developers who can build reusable components, integrate backend systems, improve app performance, and support long-term product iteration.',
    'choose_list' => array(
        array( 'src' => '/hire/laravel/image1.png', 'width' => 88, 'height' => 88, 'head' => 'Cross-Platform Mobile Apps', 'para' => 'Build iOS and Android apps from one codebase while maintaining native-like performance and consistent user experience.' ),
        array( 'src' => '/hire/laravel/image2.png', 'width' => 88, 'height' => 88, 'head' => 'Flutter MVP Development',    'para' => 'Launch a mobile MVP faster with reusable components, rapid UI development, backend integrations, and scalable architecture.' ),
        array( 'src' => '/hire/laravel/image3.png', 'width' => 88, 'height' => 88, 'head' => 'Flutter App Migration',      'para' => 'Move an existing app to Flutter when you want to reduce maintenance overhead, unify product experience, or improve development speed.' ),
    ),
),

		'hire_table' => array(
			'sub_head'   => 'Why hire Flutter developers from TechnBrains over freelance or in-house developers?',
			'para_text'  => 'When considering the decision of hiring Flutter developers for your project, choosing TechnBrains over freelance or in-house developers offers distinct advantages. Our team of Flutter experts is pre-vetted and skilled in delivering top-notch, cohesive mobile applications, ensuring a seamless flutter development process and timely project completion.',
			'table_list' => array(
				array( 'id' => 1,  'hiring' => 'Time to Get Right Developers',         'in_house' => '4 - 12 weeks',    'technbrains' => '1 day - 2 weeks',                    'freelancer' => '1 - 12 weeks' ),
				array( 'id' => 2,  'hiring' => 'Time to Start a Project',               'in_house' => '2 - 10 weeks',    'technbrains' => '1 day - 2 weeks',                    'freelancer' => '1 - 10 weeks' ),
				array( 'id' => 3,  'hiring' => 'Recurring Cost of Training & Benefits', 'in_house' => '$10,000 - $30,000','technbrains' => '0',                                  'freelancer' => '0' ),
				array( 'id' => 4,  'hiring' => 'Time to Scale Size of the Team',        'in_house' => '4 - 16 weeks',    'technbrains' => '48 hours - 1 week',                  'freelancer' => '1 - 12 weeks' ),
				array( 'id' => 5,  'hiring' => 'Pricing (weekly average)',               'in_house' => '2.5 X',           'technbrains' => '1.5 X',                              'freelancer' => '1 X' ),
				array( 'id' => 6,  'hiring' => 'Project Failure Risk',                  'in_house' => 'Low',             'technbrains' => 'Extremely low, we have a 98% success ratio', 'freelancer' => 'Very High' ),
				array( 'id' => 7,  'hiring' => 'Developers Backed by a Delivery Team',  'in_house' => 'Some',            'technbrains' => 'Yes',                                'freelancer' => 'No' ),
				array( 'id' => 8,  'hiring' => 'Dedicated Resources',                   'in_house' => 'Yes',             'technbrains' => 'Yes',                                'freelancer' => 'No' ),
				array( 'id' => 9,  'hiring' => 'Shadow Resource',                        'in_house' => 'Costly',          'technbrains' => 'Yes',                                'freelancer' => 'No' ),
				array( 'id' => 10, 'hiring' => 'Project Manager',                        'in_house' => 'Extra Cost',      'technbrains' => 'Minimal cost',                       'freelancer' => 'No' ),
				array( 'id' => 11, 'hiring' => 'Quality Assurance Check',                'in_house' => 'Extra Cost',      'technbrains' => 'Assured',                            'freelancer' => 'No' ),
				array( 'id' => 12, 'hiring' => 'Query Support',                          'in_house' => 'High',            'technbrains' => '24 Hours Assurance',                 'freelancer' => 'No' ),
				array( 'id' => 13, 'hiring' => 'Tools & Environment Depend on Team',    'in_house' => 'High',            'technbrains' => 'Uncertain',                          'freelancer' => 'Uncertain' ),
				array( 'id' => 14, 'hiring' => 'Agile Development Methodology',         'in_house' => 'May Be',          'technbrains' => 'Yes',                                'freelancer' => 'No' ),
				array( 'id' => 15, 'hiring' => 'Impact Due to Turnover',                'in_house' => 'High',            'technbrains' => 'None',                               'freelancer' => 'High' ),
				array( 'id' => 16, 'hiring' => 'Structured Training Programs',          'in_house' => 'Some',            'technbrains' => 'Yes',                                'freelancer' => 'No' ),
				array( 'id' => 17, 'hiring' => 'Communications',                         'in_house' => 'Seamless',        'technbrains' => 'Seamless',                           'freelancer' => 'Uncertain' ),
				array( 'id' => 18, 'hiring' => 'Termination Costs',                     'in_house' => 'High',            'technbrains' => 'None',                               'freelancer' => 'None' ),
				array( 'id' => 19, 'hiring' => 'Assured Work Rigor',                    'in_house' => '40 hrs/week',     'technbrains' => '40 hrs/week',                        'freelancer' => 'Not Sure' ),
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
			'sub_head' => 'Hire Flutter Developers in Just 3 Easy Steps.',
			'para_text'=> 'Hiring top-notch Flutter developers for your project is now as easy as 1-2-3! Simply post your job requirements, review the handpicked candidates, and select the perfect fit for your team. Elevate your development journey with our streamlined process today.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Choose your Engagement Model',     'content' => array( 'Select the engagement model that suits your project and budget.' ),                                                                               'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Select & Pick Flutter Developers', 'content' => array( 'Handpick Flutter developers from our talented pool of experts and interview them for their technical expertise.' ),                                'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Onboard Flutter App Developers',   'content' => array( 'Onboard your chosen Flutter app developers seamlessly for a productive collaboration.' ),                                                          'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'OUR FLUTTER DEVELOPER\'S TECH STACK EXPERTISE',
			'para_text' => 'Efficient Flutter development requires two key elements: skilled Flutter developers and knowledge of the best Flutter developer tools. Our team of certified and experienced Flutter developers are experts at using tools that can reduce boilerplate code and speed up app time-to-market.',
			'hire_list' => array(
				array( 'number' => '01', 'head' => 'Flutter Frameworks', 'para' => '● Mobx<br>● Redux.dart<br>● Inject<br>● GraphQL<br>● Flux<br>● Flame' ),
				array( 'number' => '02', 'head' => 'Flutter UI Tools',   'para' => '● Panache<br>● Screenshot<br>● Supernova<br>● Adobe Plugins<br>● Rive' ),
				array( 'number' => '03', 'head' => 'Testing',            'para' => '● Codemagic<br>● TestMagic<br>● Flutter Inspector<br>● Dart DevTools' ),
				array( 'number' => '04', 'head' => 'Editor',             'para' => '● DartPad<br>● Codepen<br>● Pub.dev<br>● Visual Studio Code' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
    'head_text' => 'We\'re here to help',
    'faq_image' => true,
    'listing'   => array(
        array( 'faqhead' => 'How much does it cost to hire Flutter developers?',                          'faqbody' => 'The cost to hire Flutter developers depends on app complexity, developer experience, engagement model, required features, UI complexity, backend integrations, and release timeline. A simple cross-platform MVP may cost less than a SaaS, fintech, healthcare, ecommerce, or enterprise app that needs custom APIs, security, payment systems, QA, and app store deployment. At TechnBrains, you can hire Flutter developers through staff augmentation, software outsourcing, or dedicated teams based on your project scope and budget.' ),
        array( 'faqhead' => 'What skills should I look for when hiring a Flutter developer?',             'faqbody' => 'When hiring a Flutter developer, look for strong experience in Dart, Flutter SDK, state management, REST APIs, Firebase, third-party integrations, Git, testing, responsive UI development, and app deployment. For complex products, the developer should also understand scalable app architecture, secure authentication, performance optimization, native platform integrations, and long-term maintenance for both iOS and Android.' ),
        array( 'faqhead' => 'Can I hire Flutter developers for an existing app?',                         'faqbody' => 'Yes. You can hire Flutter developers to improve, maintain, or scale an existing Flutter app. This may include fixing bugs, improving performance, updating packages, redesigning screens, integrating APIs, adding new features, improving app stability, or preparing the app for newer iOS and Android requirements. This is a good fit for staff augmentation when you already have a team and need extra Flutter expertise.' ),
        array( 'faqhead' => 'Should I hire a Flutter developer or outsource the full Flutter app project?', 'faqbody' => 'Hire a Flutter developer through staff augmentation when you already have an internal product or engineering team and need Flutter expertise to support development. Choose software outsourcing when you want TechnBrains to manage the complete Flutter app development process, including planning, UI/UX, development, backend integration, QA, and launch. Choose a dedicated team when your product needs ongoing cross-platform development, regular updates, and long-term support.' ),
        array( 'faqhead' => 'Do your Flutter developers build apps for both iOS and Android?',             'faqbody' => 'Yes. TechnBrains provides Flutter developers who can build cross-platform apps for iOS and Android using a shared codebase. Flutter is designed to support mobile, web, desktop, and embedded experiences from one codebase, making it useful for businesses that want faster development and consistent user experience across platforms.' ),
        array( 'faqhead' => 'Can TechnBrains help migrate an existing app to Flutter?',                   'faqbody' => 'Yes. TechnBrains can help migrate an existing native or cross-platform app to Flutter when your business wants better code reuse, faster release cycles, or a more consistent experience across iOS and Android. The migration process may include reviewing the existing codebase, rebuilding key screens, integrating APIs, preserving core features, testing performance, and preparing the new Flutter app for launch.' ),
        array( 'faqhead' => 'Do you provide post-launch support after hiring Flutter developers?',         'faqbody' => 'Yes. TechnBrains provides post-launch Flutter support for bug fixes, performance monitoring, package updates, feature improvements, compatibility updates, regression testing, App Store and Play Store release management, and ongoing maintenance. Post-launch support is important because mobile operating systems, device requirements, third-party packages, and user expectations continue to change after the app goes live.' ),
    ),
),

	),
);
