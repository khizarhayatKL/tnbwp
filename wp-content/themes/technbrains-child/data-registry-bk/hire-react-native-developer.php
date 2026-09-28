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
    'head_text'   => 'Hire React Native Developers for iOS and Android Apps',
    'para_text'   => 'Hire React Native developers from TechnBrains to build cross-platform mobile apps with strong performance, reusable components, and a consistent user experience across iOS and Android. Our React Native developers work with JavaScript, TypeScript, React Native CLI, Expo, Firebase, REST APIs, GraphQL, native modules, third-party libraries, and mobile deployment workflows. Whether you need to expand an existing app, launch a new product, or support a mobile roadmap, TechnBrains helps you hire React Native developers with the right experience and engagement model.',
    'span_text'   => 'Ready to supercharge your app development? Hire our expert React Native developers!',
    'form_title'  => 'Deploy React Native Projects',
    'form_para'   => 'With Top React Native Developers we are here to launch your app with a bang!',
    'banner_list' => array(
        array( 'li_list' => 'Integrating native APIs for iOS and Android, using XCode and Android Studio.' ),
        array( 'li_list' => 'Automated testing using tools like Jest and Mocha.' ),
        array( 'li_list' => 'UI guidelines for both platforms and third-party tools like Expo React Native Elements' ),
        array( 'li_list' => 'Proficient in JavaScript and knowledgeable in ES6+ syntax.' ),
    ),
),

		'freelance' => array(
			'img_src'    => '/hire/laravel/freelance-banner.png',
			'img_width'  => 512,
			'img_height' => 612,
			'img_alt'    => 'freelance-banner',
			'head_text'  => 'Hire Skilled React Native<br><span>Developers</span>',
			'para_text'  => 'Do you want to hire React Native Developers for your full-stack React Native project? Do you need to hire a junior React Native developer or a Project Manager to effectively manage your React Native app development team? Look no further than TechnBrains. We offer a range of dedicated React Native developer profiles to match your specific needs. Our professional React Native developers for hire are highly skilled and can join your project within just 48-72 hours of hiring.',
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
    'sub_head'  => 'Engagement Models to Hire React Native Developers',
    'para_text' => 'Choose the model that fits your product goals, timeline, and internal development capacity.',
    'tab_list'  => array(
        array(
            'key'       => 'tab-1',
            'label'     => 'Staff Augmentation',
            'title'     => 'Staff Augmentation',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Businesses and startups with an existing team needing React Native expertise' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Small to large' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Partially or fully defined' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'Very high' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'High, scale based on sprint requirements' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose staff augmentation when you need React Native developers to plug into your workflow, collaborate with your in-house team, and support mobile development without permanent hiring overhead.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Hourly, part-time, or full-time' ),
            ),
            'src' => '/hire/tab-1.png', 'width' => 227, 'height' => 180, 'alt' => 'Staff Augmentation',
        ),
        array(
            'key'       => 'tab-2',
            'label'     => 'Software Outsourcing',
            'title'     => 'Software Outsourcing',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Startups, SMBs, and enterprises that want a managed React Native app development process' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Small to medium' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Clearly defined or ready for discovery' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'Medium, with milestone-based oversight' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'Moderate' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose software outsourcing when you want TechnBrains to handle end-to-end React Native development, including UI development, backend integration, testing, deployment, and support.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Fixed-scope or time and material' ),
            ),
            'src' => '/hire/tab-3.png', 'width' => 227, 'height' => 180, 'alt' => 'Software Outsourcing',
        ),
        array(
            'key'       => 'tab-3',
            'label'     => 'Dedicated Teams',
            'title'     => 'Dedicated Teams',
            'tab_heads' => array(
                array( 'text' => 'For Whom',          'texttwo' => 'Businesses building long-term mobile products or multiple app modules' ),
                array( 'text' => 'Size of Project',   'texttwo' => 'Medium to large' ),
                array( 'text' => 'Requirements',      'texttwo' => 'Evolving roadmap' ),
                array( 'text' => 'Client\'s Control', 'texttwo' => 'High' ),
                array( 'text' => 'Flexibility',       'texttwo' => 'High' ),
                array( 'text' => 'When to Choose',    'texttwo' => 'Choose dedicated teams when you need React Native developers, QA engineers, designers, and delivery support working continuously on your mobile product.' ),
                array( 'text' => 'Rates',             'texttwo' => 'Monthly team-based billing' ),
            ),
            'src' => '/hire/tab-2.png', 'width' => 227, 'height' => 180, 'alt' => 'Dedicated Teams',
        ),
    ),
),

		'hire_choose' => array(
    'sub_head'    => 'What You Can Build With Our React Native Developers',
    'para_text'   => 'React Native helps product teams move faster when they need iOS and Android apps without maintaining two completely separate native development tracks. TechnBrains provides React Native developers who can support MVP development, feature expansion, app modernization, native API integration, and post-launch improvements.',
    'choose_list' => array(
        array( 'src' => '/hire/laravel/image1.png', 'width' => 88, 'height' => 88, 'head' => 'Cross-Platform Mobile Apps',      'para' => 'Build iOS and Android apps using shared components while maintaining platform-specific behavior where needed.' ),
        array( 'src' => '/hire/laravel/image2.png', 'width' => 88, 'height' => 88, 'head' => 'React Native App Modernization',   'para' => 'Improve existing React Native apps with code refactoring, package updates, performance tuning, UI improvements, and API upgrades.' ),
        array( 'src' => '/hire/laravel/image3.png', 'width' => 88, 'height' => 88, 'head' => 'React Native With Firebase',       'para' => 'Add authentication, analytics, crash reporting, notifications, real-time data, and backend functionality through Firebase.' ),
    ),
),

		'hire_table' => array(
			'sub_head'   => 'Why Hire React Native developers from TechnBrains over freelance or in-house developers?',
			'para_text'  => 'When you choose React Native developers from TechnBrains, you\'re selecting a team of dedicated professionals who bring a wealth of expertise and experience to your project. Unlike freelance or in-house developers, our skilled experts work collaboratively to deliver high-quality, cost-effective solutions that meet your unique business needs and ensure your project\'s success.',
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
				array( 'id' => 13, 'hiring' => 'Tools & Environment Depend on Team',     'in_house' => 'High',             'technbrains' => 'Uncertain',                           'freelancer' => 'Uncertain' ),
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
			'sub_head' => 'Hire React Native Developers in Just 3 Easy Steps.',
			'para_text'=> 'Hiring professional React Native developers for your project is now as easy as 1-2-3! Simply post your job requirements, review the handpicked candidates, and select the perfect fit for your team. Elevate your development journey with our streamlined process today.',
			'box_list' => array(
				array( 'number' => '01', 'title' => 'Choose your Engagement Model',          'content' => array( 'Select the engagement model that suits your project and budget.' ),                                                                                           'image_src' => '/hire/boxone-img.webp',   'width' => 225, 'height' => 267 ),
				array( 'number' => '02', 'title' => 'Select & Pick React Native Developers', 'content' => array( 'Handpick React Native developers from our talented pool of experts and interview them for their technical expertise.' ),                                      'image_src' => '/hire/boxtwo-img.webp',   'width' => 327, 'height' => 267 ),
				array( 'number' => '03', 'title' => 'Onboard React Native Developers',       'content' => array( 'Onboard your chosen React Native app developers seamlessly for a productive collaboration.' ),                                                                'image_src' => '/hire/boxthree-img.webp', 'width' => 334, 'height' => 267 ),
			),
		),

		'hire_tech_stack' => array(
			'sub_head'  => 'OUR REACT NATIVE DEVELOPER\'S TECH STACK EXPERTISE',
			'para_text' => 'Our React Native developers possess a wealth of expertise in a diverse range of technology stacks. They are well-versed in harnessing the power of cutting-edge tools and React Native libraries to craft high-performance, cross-platform mobile apps that meet your unique business needs.',
			'hire_list' => array(
				array( 'number' => '01', 'head' => 'React Native Frameworks', 'para' => '● React-Native-CLI<br>● Expo<br>● Native UI' ),
				array( 'number' => '02', 'head' => 'Technologies',            'para' => '● Objective-C<br>● TypeScript<br>● JavaScript<br>● SQLite<br>● DOCKER' ),
				array( 'number' => '03', 'head' => 'Components & APIs',       'para' => '● Toast Android<br>● Back Handler<br>● Action Sheet iOS<br>● Permission Android<br>● Style Guide Generator<br>● React Cosmos' ),
				array( 'number' => '04', 'head' => 'Database',                'para' => '● Async<br>● Storage<br>● SQLite<br>● Realm<br>● Firebase' ),
			),
		),

		'main_cta' => array(),

		'faqs' => array(
    'head_text' => 'We\'re here to help',
    'faq_image' => true,
    'listing'   => array(
        array( 'faqhead' => 'How much does it cost to hire React Native developers?',                          'faqbody' => 'The cost to hire React Native developers depends on app complexity, developer experience, required features, backend integrations, UI requirements, and engagement model. A simple cross-platform MVP may cost less than a SaaS, fintech, healthcare, ecommerce, or enterprise app that needs secure authentication, APIs, payment systems, QA, and app store deployment. At TechnBrains, you can hire React Native developers through staff augmentation, software outsourcing, or dedicated teams based on your project scope and budget.' ),
        array( 'faqhead' => 'What skills should I look for when hiring a React Native developer?',             'faqbody' => 'When hiring a React Native developer, look for experience in JavaScript, TypeScript, React Native, Redux or other state management tools, REST APIs, Firebase, Git, testing, native modules, and mobile app deployment. For complex products, the developer should also understand iOS and Android platform behavior, performance optimization, secure authentication, third-party integrations, and scalable app architecture.' ),
        array( 'faqhead' => 'Can I hire React Native developers for an existing app?',                         'faqbody' => 'Yes. You can hire React Native developers to improve, maintain, or scale an existing React Native app. This may include fixing bugs, improving performance, updating dependencies, redesigning screens, adding new features, integrating APIs, resolving platform-specific issues, or preparing the app for newer iOS and Android requirements. This is a strong fit for staff augmentation when you already have an internal team and need additional React Native expertise.' ),
        array( 'faqhead' => 'Should I hire a React Native developer or outsource the full React Native app project?', 'faqbody' => 'Hire a React Native developer through staff augmentation when you already have a product or engineering team and need React Native expertise to support delivery. Choose software outsourcing when you want TechnBrains to manage the full React Native app development process, including planning, UI/UX, development, backend integration, QA, and launch. Choose a dedicated team when your product needs ongoing cross-platform development, regular releases, and long-term technical support.' ),
        array( 'faqhead' => 'Do your React Native developers build apps for both iOS and Android?',             'faqbody' => 'Yes. TechnBrains provides React Native developers who can build cross-platform mobile apps for both iOS and Android. React Native is useful when businesses want faster development, shared code, and a consistent user experience across mobile platforms while still supporting native features where needed.' ),
        array( 'faqhead' => 'Can TechnBrains help migrate an existing app to React Native?',                   'faqbody' => 'Yes. TechnBrains can help migrate an existing native or cross-platform app to React Native when your business wants better code reuse, faster release cycles, or easier long-term maintenance across iOS and Android. The migration process may include reviewing the existing codebase, rebuilding key screens, integrating APIs, preserving core features, testing performance, and preparing the app for launch.' ),
        array( 'faqhead' => 'Do you provide post-launch support after hiring React Native developers?',         'faqbody' => 'Yes. TechnBrains provides post-launch React Native support for bug fixes, performance monitoring, dependency updates, feature improvements, compatibility updates, regression testing, App Store and Play Store release management, and ongoing maintenance. Post-launch support is important because mobile operating systems, third-party libraries, user expectations, and business requirements continue to change after the app goes live.' ),
    ),
),

	),
);
