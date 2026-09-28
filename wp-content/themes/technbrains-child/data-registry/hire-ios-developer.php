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
    'head_text'   => 'Hire iOS Developers for Secure, High-Performance Apple Apps',
    'para_text'   => 'Hire iOS developers from TechnBrains to build, improve, or scale your iPhone, iPad, Apple Watch, and Apple ecosystem applications. Our iOS developers work with Swift, SwiftUI, Objective-C, Xcode, iOS SDK, Core Data, REST APIs, third-party integrations, and App Store deployment workflows. Whether you need one developer to support your in-house team or a dedicated iOS app development team to manage the full build, we match your product goals with the right engineering support.',
    'span_text'   => 'Hire our iOS developers today and embark on a journey of innovation as we turn your vision into stunning iOS apps.',
    'form_title'  => 'Deploy iOS Projects',
    'form_para'   => 'With Top iOS Developers we are here to launch your app with a bang!',
    'banner_list' => array(
        array( 'li_list' => 'A leading iOS app development company by Clutch.' ),
        array( 'li_list' => 'Full-stack iOS solutions for the development of iPhone, iPad, and wearable app development.' ),
        array( 'li_list' => 'Team of certified iOS developers who are well versed in the iOS SDK/framework and Objective C.' ),
        array( 'li_list' => 'Expertise in XCode, Swift, CocoaPods, Parse, AlamoFire, CodeRunner' ),
    ),
),

		'freelance' => array(
			'img_src'    => '/hire/laravel/freelance-banner.png',
			'img_width'  => 512,
			'img_height' => 612,
			'img_alt'    => 'freelance-banner',
			'head_text'  => 'Hire Skilled iOS App Developers for Your Product Roadmap',
			'para_text'  => 'Your iOS app needs more than clean screens. It needs stable architecture, smooth performance, secure data handling, and a user experience that works across Apple devices. TechnBrains helps startups, SMBs, and growing product teams hire <a href="/ios-app-development/">iOS app developers</a> who can support MVP development, feature expansion, app modernization, API integration, and long-term product maintenance. Our developers can join your existing workflow or work as a managed team, depending on how much control, speed, and delivery ownership you need. ',
			'head1'      => '$20+',
			'para1'      => 'Basic iOS Developer',
			'head2'      => '$25+',
			'para2'      => 'Intermediate-Advanced iOS Developer',
			'head3'      => '$35+',
			'para3'      => 'iOS Developer and UI/UX Designer in one.',
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
    'sub_head'  => 'Engagement Models to Hire iOS Developers',
    'para_text' => 'Choose the engagement model that fits your product stage, internal capacity, and delivery expectations. TechnBrains offers three focused hiring options for iOS development.',
    'tab_list'  => array(
        array(
            'key'       => 'tab-1',
            'label'     => 'Staff Augmentation',
            'title'     => '<a href="/staff-augmentation/">Staff Augmentation</a>',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Businesses with an existing product, engineering, or mobile team that needs iOS expertise' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Small to large' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Partially or fully defined' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'Very high' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'High, scale developers up or down as needed' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose staff augmentation when you need iOS developers to plug into your workflow, follow your sprint process, and work with your internal product, design, and backend teams.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Hourly, part-time, or full-time' ),
            ),
            'src' => '/hire/staff.png', 'width' => 227, 'height' => 180, 'alt' => 'Staff Augmentation',
        ),
        array(
            'key'       => 'tab-2',
            'label'     => 'Software Outsourcing',
            'title'     => '<a href="/software-outsourcing/">Software Outsourcing</a>',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Startups, SMBs, and enterprises that want TechnBrains to manage iOS app development from planning to deployment' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Small to medium, or well-scoped enterprise modules' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Clearly defined or ready for discovery' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'Medium, with milestone-based reviews' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'Moderate' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose software outsourcing when you want to hand off the iOS app build, including UI development, backend integration, QA, release preparation, and post-launch support.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Fixed-scope or time and material' ),
            ),
            'src' => '/hire/team.png', 'width' => 227, 'height' => 180, 'alt' => 'Software Outsourcing',
        ),
        array(
            'key'       => 'tab-3',
            'label'     => 'Dedicated Teams',
            'title'     => '<a href="/hire-dedicated-team/">Dedicated Teams</a>',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Businesses building a long-term iOS product or multiple mobile initiatives' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Medium to large' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Evolving product roadmap' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'High' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'High' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose dedicated teams when you need a consistent iOS team with developers, QA engineers, designers, and project support working as an extension of your business.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Monthly team-based billing' ),
            ),
            'src' => '/hire/outsourcing.png', 'width' => 227, 'height' => 180, 'alt' => 'Dedicated Teams',
        ),
    ),
),

		'hire_choose' => array(
    'sub_head'    => 'What You Can Build With Our iOS Developers',
    'para_text'   => 'Your iOS app needs more than clean screens. It needs stable architecture, smooth performance, secure data handling, and a user experience that works across Apple devices. TechnBrains helps startups, SMBs, and growing product teams hire iOS app developers who can support MVP development, feature expansion, app modernization, API integration, and long-term product maintenance.',
    'choose_list' => array(
        array( 'src' => '/hire/iphone.png', 'width' => 88, 'height' => 88, 'head' => 'iPhone App Development',                    'para' => 'Build fast, secure, and user-friendly iPhone apps with native iOS performance, polished interfaces, and reliable backend connectivity.' ),
        array( 'src' => '/hire/ipad.png', 'width' => 88, 'height' => 88, 'head' => 'iPad App Development',                      'para' => 'Create iPad apps for productivity, healthcare, education, field operations, internal teams, and customer facing digital experiences.' ),
        array( 'src' => '/hire/iwatch.png', 'width' => 88, 'height' => 88, 'head' => 'Apple Watch and Wearable App Development',   'para' => 'Develop wearable apps with notifications, health data workflows, companion app experiences, and Apple ecosystem integration.' ),
    ),
),

		'hire_table' => array(
    'sub_head'   => 'Why hire iOS developers from TechnBrains over freelance or in-house developers?',
    'para_text'  => 'With TechnBrains, the decision to hire iOS developers means accessing top talent without the hassles of managing an in-house team or navigating the uncertainties of freelance work. When you hire iOS developers from us, you tap into a dedicated team of experts who specialize in iOS app development, ensuring precision in every project.',
    'table_list' => array(
        array( 'id' => 1,  'hiring' => 'Time to Get Right Developers',          'in_house' => '4 - 12 weeks',     'technbrains' => '1 day - 2 weeks',                          'freelancer' => '1 - 12 weeks' ),
        array( 'id' => 2,  'hiring' => 'Time to Start a Project',                'in_house' => '2 - 10 weeks',     'technbrains' => '1 day - 2 weeks',                          'freelancer' => '1 - 10 weeks' ),
        array( 'id' => 3,  'hiring' => 'Recurring Cost of Training & Benefits',  'in_house' => '$10,000 - $30,000', 'technbrains' => '0',                                        'freelancer' => '0' ),
        array( 'id' => 4,  'hiring' => 'Time to Scale Size of the Team',         'in_house' => '4 - 16 weeks',     'technbrains' => '48 hours - 1 week',                        'freelancer' => '1 - 12 weeks' ),
        array( 'id' => 5,  'hiring' => 'Pricing (weekly average)',                'in_house' => '2.5 X',            'technbrains' => '1.5 X',                                    'freelancer' => '1 X' ),
        array( 'id' => 6,  'hiring' => 'Project Failure Risk',                   'in_house' => 'Low',              'technbrains' => 'Extremely low, we have a 98% success ratio', 'freelancer' => 'Very High' ),
        array( 'id' => 7,  'hiring' => 'Developers Backed by a Delivery Team',   'in_house' => 'Some',             'technbrains' => 'Yes',                                      'freelancer' => 'No' ),
        array( 'id' => 8,  'hiring' => 'Dedicated Resources',                    'in_house' => 'Yes',              'technbrains' => 'Yes',                                      'freelancer' => 'No' ),
        array( 'id' => 9,  'hiring' => 'Shadow Resource',                         'in_house' => 'Costly',           'technbrains' => 'Yes',                                      'freelancer' => 'No' ),
        array( 'id' => 10, 'hiring' => 'Project Manager',                         'in_house' => 'Extra Cost',       'technbrains' => 'Minimal cost',                             'freelancer' => 'No' ),
        array( 'id' => 11, 'hiring' => 'Quality Assurance Check',                 'in_house' => 'Extra Cost',       'technbrains' => 'Assured',                                  'freelancer' => 'No' ),
        array( 'id' => 12, 'hiring' => 'Query Support',                           'in_house' => 'High',             'technbrains' => '24 Hours Assurance',                       'freelancer' => 'No' ),
        array( 'id' => 13, 'hiring' => 'Tools & Environment Depend on Team',     'in_house' => 'High',             'technbrains' => 'Uncertain',                                'freelancer' => 'Uncertain' ),
        array( 'id' => 14, 'hiring' => 'Agile Development Methodology',          'in_house' => 'May Be',           'technbrains' => 'Yes',                                      'freelancer' => 'No' ),
        array( 'id' => 15, 'hiring' => 'Impact Due to Turnover',                 'in_house' => 'High',             'technbrains' => 'None',                                     'freelancer' => 'High' ),
        array( 'id' => 16, 'hiring' => 'Structured Training Programs',           'in_house' => 'Some',             'technbrains' => 'Yes',                                      'freelancer' => 'No' ),
        array( 'id' => 17, 'hiring' => 'Communications',                          'in_house' => 'Seamless',         'technbrains' => 'Seamless',                                 'freelancer' => 'Uncertain' ),
        array( 'id' => 18, 'hiring' => 'Termination Costs',                      'in_house' => 'High',             'technbrains' => 'None',                                     'freelancer' => 'None' ),
        array( 'id' => 19, 'hiring' => 'Assured Work Rigor',                     'in_house' => '40 hrs/week',      'technbrains' => '40 hrs/week',                              'freelancer' => 'Not Sure' ),
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
			'sub_head' => 'Hire iOS Developers in Just 3 Easy Steps.',
			'para_text'=> 'Hiring iOS developers is now as simple as 1-2-3 with TechnBrains. Our streamlined process allows you to hire iOS developers in just three easy steps, ensuring a hassle-free journey from idea to app reality.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Choose your Engagement Model', 'content' => array( 'Select the engagement model that suits your project and budget.' ),                                                                       'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Select & Pick iOS Developers', 'content' => array( 'Handpick iOS developers from our talented pool of experts and interview them for their technical expertise.' ),                            'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Onboard iOS App Developers',   'content' => array( 'Onboard your chosen iOS app developers seamlessly for a productive collaboration.' ),                                                      'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'OUR IOS DEVELOPER\'S TECH STACK EXPERTISE',
			'para_text' => 'Our iOS developers have expertise in a diverse tech stack. When you hire iOS developers from us, you gain access to professionals who excel in a wide range of technologies like Swift and Objective C, ensuring that your app development project is executed with precision and efficiency.',
			'hire_list' => array(
				array( 'number' => '01', 'head' => 'Databases',          'para' => '● Core Data<br>● Realm<br>● SQLite' ),
				array( 'number' => '02', 'head' => 'IOS DEVELOPER KIT',  'para' => '● XCode<br>● iOS SDK<br>● IOS Native Dev Kit<br>● Swift Toolbox<br>● AppCode' ),
				array( 'number' => '03', 'head' => 'iOS Frameworks',     'para' => '● Alamofire<br>● Swift Standard Library<br>● Foundation Framework' ),
				array( 'number' => '04', 'head' => 'Plugins',            'para' => '● PFlux Mini<br>● DLYM<br>● Rough Rider 3<br>● Wider<br>● LRCS' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
    'head_text' => 'We\'re here to help',
    'faq_image' => true,
    'listing'   => array(
        array( 'faqhead' => 'How much does it cost to hire iOS developers?',                                     'faqbody' => 'The cost to hire iOS developers depends on developer experience, project complexity, engagement model, location, and required skills. A simple iOS app may need fewer development hours, while a SaaS, fintech, healthcare, or enterprise app requires senior Swift developers, backend integration, QA, security review, and App Store deployment support. At TechnBrains, you can hire iOS developers through staff augmentation, dedicated teams, or software outsourcing based on your budget and delivery needs.' ),
        array( 'faqhead' => 'What skills should I look for when hiring an iOS developer?',                       'faqbody' => 'When hiring an iOS developer, look for strong experience in Swift, SwiftUI, UIKit, Xcode, REST APIs, Core Data, Firebase, Git, unit testing, performance optimization, and App Store deployment. For business-critical apps, the developer should also understand secure authentication, scalable architecture, Apple design standards, and post-launch maintenance.' ),
        array( 'faqhead' => 'Can I hire iOS developers for an existing app?',                                    'faqbody' => 'Yes. You can hire iOS developers to improve, maintain, or scale an existing iPhone or iPad app. This may include fixing bugs, upgrading old Objective-C code to Swift, improving app performance, redesigning screens, adding new features, integrating APIs, resolving App Store issues, or preparing the app for a new iOS version.' ),
        array( 'faqhead' => 'Should I hire an iOS developer or outsource the full iOS app project?',             'faqbody' => 'Hire an iOS developer through staff augmentation when you already have an internal team and need extra Swift or SwiftUI expertise. Choose software outsourcing when you want TechnBrains to manage the full iOS app development process, including planning, UI/UX, development, QA, backend integration, and launch. Choose a dedicated team when your product needs ongoing iOS development, regular releases, and long-term technical ownership.' ),
        array( 'faqhead' => 'Do your iOS developers build apps with Swift and SwiftUI?',                         'faqbody' => 'Yes. TechnBrains provides iOS developers experienced in Swift, SwiftUI, UIKit, Xcode, API integrations, backend connectivity, and App Store deployment. Swift is commonly used for modern iOS app development, while SwiftUI helps developers create clean, responsive interfaces for Apple devices.' ),
        array( 'faqhead' => 'Can TechnBrains help with App Store submission?',                                   'faqbody' => 'Yes. TechnBrains can help prepare your iOS app for App Store submission, including build preparation, testing, metadata support, compliance checks, and release coordination through App Store Connect. Preparing the app correctly before submission helps reduce approval risks and improves the chances of a smoother launch.' ),
        array( 'faqhead' => 'Do you provide post-launch support after hiring iOS developers?',                   'faqbody' => 'Yes. TechnBrains can provide post-launch iOS support for bug fixes, performance monitoring, app updates, feature improvements, OS compatibility updates, regression testing, and App Store release management. For apps with active users, post-launch support is important because iOS versions, device requirements, user feedback, and business priorities change over time.' ),
    ),
),

	),
);
