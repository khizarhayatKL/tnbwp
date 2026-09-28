<?php
/**
 * Template Name: Mobile App Development
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

// ── JSON-LD Schemas ──────────────────────────────────────────────────────────
// add_action( 'wp_head', function () {
// 	$faqs_listing = [
// 		[ 'faqhead' => 'How much does custom mobile app development cost?', 'faqbody' => 'Most mobile apps fall between $40,000 and $350,000+, depending on feature complexity, platform count (iOS, Android, or both), backend requirements, real-time features, compliance needs, and integration volume. Enterprise products with advanced workflows typically align with higher budgets. We provide transparent pricing during discovery after understanding your specific requirements.' ],
// 		[ 'faqhead' => 'What factors influence total mobile app development cost?', 'faqbody' => 'Cost varies based on the scope of features, native vs. cross-platform approach, API structure, security requirements, and scalability needs. High-load systems, real-time communication, and secure data layers require more engineering effort. We help you prioritize features based on business impact to optimize your investment.' ],
// 		[ 'faqhead' => 'How long does it take to build a mobile app?', 'faqbody' => 'Typical mobile products require 3 to 12 months, depending on complexity, platform count, backend depth, and testing requirements. Simple apps with limited features fall near the lower range, while multi-module, data-driven, or enterprise apps require longer build cycles. We provide realistic timelines based on your scope during project planning.' ],
// 		[ 'faqhead' => 'How do you manage app security and data protection?', 'faqbody' => 'We implement encrypted storage, secure authentication, safe API contracts, permission audits, and industry-aligned controls such as OWASP Mobile standards. Healthcare, fintech, and enterprise apps receive compliance-aligned workflows (HIPAA, PCI, SOC) for protected data handling from the architecture phase.' ],
// 		[ 'faqhead' => 'What does your mobile development process include?', 'faqbody' => 'Our process covers requirements mapping, UX flow design, UI system creation, agile frontend engineering, backend/API setup, multi-layer QA across real devices, and store deployment. Each stage maintains defined outputs and stable handoffs to avoid delays or miscommunication.' ],
// 		[ 'faqhead' => 'What should a business look for when acquiring mobile app development services?', 'faqbody' => 'Evaluate platform expertise, code quality standards, testing depth on real devices, API capability, security controls, delivery structure, and ability to support long-term releases. A strong mobile development partner demonstrates reliability through transparent communication, consistent engineering output, and accountability beyond just launch.' ],
// 		[ 'faqhead' => 'How does outsourcing mobile app development reduce delivery risk?', 'faqbody' => 'When you outsource mobile app development, you gain access to senior engineers, stable delivery workflows, and defined release structures without expanding internal teams or facing 3+ month hiring cycles. A mature outsourcing model reduces risk by replacing ad-hoc development with predictable output, validated code, and transparent progress tracking—giving you the capacity you need without the overhead.' ],
// 		[ 'faqhead' => 'What controls should we expect when outsourcing mobile app development?', 'faqbody' => 'You should expect clear technical ownership, documented decisions, weekly progress updates, code review access, and a delivery process that aligns with your internal product goals. You maintain full control over roadmap direction, feature priorities, and quality standards, we provide the engineering capacity and expertise to execute your vision.' ],
// 		[ 'faqhead' => 'Can we hire mobile app developers for specific parts of the project?', 'faqbody' => 'Yes. You can hire mobile app developers for specific modules such as frontend, backend, API integration, UI development, or recovery of an unstable codebase. This model works well for teams that want senior engineering support for complex features without committing to full outsourcing, giving you flexibility to scale capacity based on current needs.' ],
// 	];

// 	$faq_schema = [
// 		'@context'   => 'https://schema.org',
// 		'@type'      => 'FAQPage',
// 		'mainEntity' => array_map( function ( $item ) {
// 			return [
// 				'@type'          => 'Question',
// 				'name'           => $item['faqhead'],
// 				'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $item['faqbody'] ],
// 			];
// 		}, $faqs_listing ),
// 	];

// 	$service_schema = [
// 		'@context'    => 'https://schema.org',
// 		'@type'       => 'Service',
// 		'serviceType' => 'Mobile App Development Services',
// 		'name'        => 'Custom Mobile App Development Services - TechnBrains',
// 		'description' => 'We provide secure, high-performing custom mobile app development services with structured workflows, real-device QA, and scalable architecture.',
// 		'url'         => 'https://www.technbrains.com/mobile-app-development',
// 		'provider'    => [
// 			'@type'           => 'Organization',
// 			'name'            => 'TechnBrains',
// 			'url'             => 'https://www.technbrains.com',
// 			'logo'            => 'https://www.technbrains.com/image/revamp/logo-w.svg',
// 			'contactPoint'    => [ '@type' => 'ContactPoint', 'contactType' => 'Customer Support', 'availableLanguage' => 'English' ],
// 			'aggregateRating' => [ '@type' => 'AggregateRating', 'ratingValue' => '4.7', 'reviewCount' => '150', 'bestRating' => '5', 'worstRating' => '1' ],
// 			'review'          => [
// 				[ '@type' => 'Review', 'author' => [ '@type' => 'Person', 'name' => 'Nancy Snyder' ], 'reviewBody' => 'The talent they provided was solid, but more importantly, they were quick to align with our way of working.', 'publisher' => [ '@type' => 'Organization', 'name' => 'Clutch' ] ],
// 				[ '@type' => 'Review', 'author' => [ '@type' => 'Person', 'name' => 'Adam Zwingler' ], 'reviewBody' => "I'm impressed with their ability to get the job done right the first time and in a highly-efficient, timely manner.", 'publisher' => [ '@type' => 'Organization', 'name' => 'Clutch' ] ],
// 				[ '@type' => 'Review', 'author' => [ '@type' => 'Person', 'name' => 'Abby Briseno' ], 'reviewBody' => "They've been organized and have delivered items as promised.", 'publisher' => [ '@type' => 'Organization', 'name' => 'Clutch' ] ],
// 				[ '@type' => 'Review', 'author' => [ '@type' => 'Person', 'name' => 'Chris Degenaars' ], 'reviewBody' => 'Their ability to take a concept and run with it stood out.', 'publisher' => [ '@type' => 'Organization', 'name' => 'Clutch' ] ],
// 			],
// 		],
// 	];

// 	echo '<script type="application/ld+json">' . wp_json_encode( $faq_schema ) . '</script>' . "\n";
// 	echo '<script type="application/ld+json">' . wp_json_encode( $service_schema ) . '</script>' . "\n";
// }, 10 );


// ── Mock Data Map ────────────────────────────────────────────────────────────
$mock_data = [

	'banner' => [
		'title_html'  => 'Custom Mobile App <br> Development Services <br> for Scalable Apps',
		'para'        => "We provide end-to-end mobile app development services to help businesses design, build, and scale high-performance applications across iOS, Android, and cross-platform environments.",
		'bg_image'    => '/revamp/banner/mobAppDev-banner.webp',
		'btn_text'    => 'View Our Portfolio',
		'btn_link'    => '/case-studies/',
		'btn_two_text'=> 'Build Your Mobile App',
		'btn_classes' => 'btnTransparent',
	],

	'trusted_by' => [
		'para'    => 'Partnered with teams that prioritize quality, consistency, and execution excellence.',
		'listing' => [
			[ 'img_src' => '/revamp/home/t-7.png', 'width' => 124, 'height' => 40 ],
			[ 'img_src' => '/revamp/home/t-8.png', 'width' => 114, 'height' => 24 ],
			[ 'img_src' => '/revamp/home/t-9.png', 'width' => 107, 'height' => 36 ],
			[ 'img_src' => '/revamp/home/t-4.png', 'width' => 109, 'height' => 43 ],
			[ 'img_src' => '/revamp/home/t-5.png', 'width' => 142, 'height' => 42 ],
			[ 'img_src' => '/revamp/home/t-6.png', 'width' => 101, 'height' => 31 ],
		],
	],

	'choose_results' => [
		'title'    => 'Results Delivered Across Mobile App Projects',
		'para'     => 'As a trusted mobile app development services company, we help startups and enterprises build scalable, high-performing applications across a wide range of industries and business models. Our experience covers diverse use cases, complex architectures, and evolving product requirements.',
		'sub_text' => 'Your success is reflected in the outcomes',
		'awards'   => [
			[ 'img_src' => '/revamp/common/goodfrims.png', 'width' => 104, 'height' => 81 ],
			[ 'img_src' => '/revamp/common/trust-p.png',   'width' => 131, 'height' => 60 ],
			[ 'img_src' => '/revamp/common/clutch-logo.png','width' => 97,  'height' => 27 ],
		],
		'side_items' => [
			[ 'count' => '150+', 'label' => 'Mobile apps delivered across industries' ],
			[ 'count' => '4.7/5', 'label' => 'Client rating for delivery predictability' ],
			[ 'count' => '90%',  'label' => 'Client retention for repeat execution' ],
		],
	],

	'teams_choose' => [
		'title'   => 'How We Ensure Reliable Delivery at Every Stage',
		'para'    => 'Our mobile app development process follows a structured lifecycle that ensures every stage, from planning to deployment, supports performance, usability, and scalability.',
		'img_src' => '/revamp/mobile-app/delivery.webp',
		'listing' => [
			[ 'item' => 'Discovery & Architecture', 'para' => 'Define product vision and system architecture built for high-efficiency, low-rework systems.' ],
			[ 'item' => 'UX Mapping',                'para' => 'Design user journeys based on behavior insights to reduce friction and drop-offs.' ],
			[ 'item' => 'UI Design System',           'para' => 'Create consistent, adaptable interfaces aligned with modern cross-device standards.' ],
			[ 'item' => 'Agile Development',          'para' => 'Develop iteratively with feedback-driven cycles supporting fast release velocity.' ],
			[ 'item' => 'Real-Device Testing',        'para' => 'Validate performance across real devices to ensure stability in real usage conditions.' ],
			[ 'item' => 'Launch & Ongoing Support',   'para' => 'Deploy and optimize continuously with focus on stability and performance improvements.' ],
		],
	],

	'augmentation_services' => [
		'title'     => 'Mobile App Development <br> Services We Offer',
		'para'      => "Whether you’re starting with an MVP build or looking for enterprise app solution, our end-to-end mobile app development solutions cover native, cross-platform, AI-enabled, and post-launch solutions based on your product needs.",
		'btn_text'  => 'Explore Our Talent Pool',
		'classes'   => 'gridThree',
		'listing'   => [
			[ 'icon' => '/revamp/common/frontend.png', 'title' => 'iOS App Development',        'para' => 'Our <a href="/hire-ios-developer/">iOS developers</a> build applications focused on stability under load, secure data handling, fast launch times, efficient battery usage, and consistent performance.',                                                                       'link' => '/ios-app-development/' ],
			[ 'icon' => '/revamp/common/backend.png',  'title' => 'Android App Development',    'para' => 'We build Android applications focused on performance, memory efficiency, UI responsiveness, and stability with the help of experienced <a href="/hire-android-developer/">Android developers</a>.',                                                                   'link' => '/android-app-development/' ],
			[ 'icon' => '/revamp/common/mobile.png',   'title' => 'Cross-Platform Development', 'para' => 'Cross-platform apps built by <a href="/hire-flutter-developer/">Flutter</a> and <a href="/hire-react-native-developer/">React Native engineers</a> deliver shared logic, native integrations, and consistent performance across iOS and Android.',                                                               'link' => '/contact-us/' ],
			[ 'icon' => '/revamp/common/devops.png',   'title' => 'AI App Development',       'para' => 'We integrate AI capabilities such as predictive analytics, recommendation engines, and intelligent automation to enhance user experience and product intelligence.',                                                            'link' => '/ai-development-services/' ],
			[ 'icon' => '/revamp/common/ai.png',       'title' => 'UI/UX Design',    'para' => 'User experiences shaped by behavior patterns, interaction flow, and device constraints to improve usability and engagement across platforms.',                                       'link' => '/ui-ux-design/' ],
			[ 'icon' => '/revamp/common/mobile.png',   'title' => 'Enterprise App Development',        'para' => 'We deliver full-cycle enterprise app development from product design to ongoing <a href="/support-maintenance/">support and maintenance</a> for stable, scalable performance.',                                                        'link' => '/enterprise-app-development/' ],
		],
	],

	'enterprise_level' => [
		'title'    => 'Mobile App Development Challenges We Solve',
		'para'     => 'These are the execution gaps we see when mobile apps move from planning to real users, and where teams typically lose time, confidence, and momentum.',
		'btn_text' => 'Book Your Consultation',
		'bg_image' => '/revamp/staff-aug/enterpriseLevel.webp',
		'listing'  => [
			[ 'item' => '"The app performs well in testing but fails under real user load."',                    'para' => 'Resolved through real-device testing, live data validation, and production-level traffic simulation.' ],
			[ 'item' => '"Delivery timelines keep shifting and releases feel unpredictable."',               'para' => 'Addressed through structured milestones, defined scope, and consistent delivery cycles.' ],
			[ 'item' => '"Uncertainty between native and cross-platform delays key decisions."',       'para' => 'Resolved through platform selection aligned to performance goals, budget, and long-term roadmap.' ],
			[ 'item' => '"Ongoing development slows down due to growing technical debt."',                          'para' => 'Eliminated by clean, modular architecture that supports continuous feature development.' ],
			[ 'item' => '"Data security and compliance risks remain unclear."',                                'para' => 'Addressed through HIPAA, PCI, and SOC-aligned practices from the start.' ],
		],
	],

	'delivery_control' => [
		'title'    => 'What We Take Care of in Every Mobile App',
		'para'     => "We understand where mobile apps fail in real-world usage, so we focus on preventing issues that impact retention, performance, and long-term growth.",
		'btn_text' => 'See How We Build',
		'listing'  => [
			[ 'icon' => '/revamp/mobile-app/d-1.png', 'title' => 'First-Session Retention Friction', 'para' => 'Reducing early drop-offs by improving clarity and time-to-value in initial user interactions.' ],
			[ 'icon' => '/revamp/mobile-app/d-2.png', 'title' => 'Real-World Usage Consistency',  'para' => 'Ensuring the app performs reliably across varied devices, networks, and usage conditions.' ],
			[ 'icon' => '/revamp/mobile-app/d-3.png', 'title' => 'Post-Launch Growth Breakpoints',          'para' => 'Maintaining product behavior as features and user base expand over time.' ],
			[ 'icon' => '/revamp/mobile-app/d-4.png', 'title' => 'Feature Expansion Safety',           'para' => 'Allowing new features to be added without breaking existing user flows.' ],
			[ 'icon' => '/revamp/mobile-app/d-5.png', 'title' => 'Actionable Product Signals',    'para' => 'Focusing on meaningful usage insights that support better product decisions.' ],
			[ 'icon' => '/revamp/mobile-app/d-6.png', 'title' => 'Long-Term Engineering Efficiency',    'para' => 'Reducing future rework by avoiding early structural limitations.' ],
		],
	],

	'case_studies' => [
		'heading' => 'How Our Mobile Apps Perform in Real-World Use',
		'para'    => 'Case studies showing how ideas are executed into working mobile apps used by real users.',
	],

	'teams_work' => [
		'title'    => 'Engagement Models That Fit Your Project Scope',
		'para'     => 'Flexible engagement options aligned with your product stage, internal capacity, and delivery requirements.',
		'btn_text' => "Get Started",
		'img_src'  => '/revamp/mobile-app/team.webp',
		'width'    => 586,
		'height'   => 547,
		'listing'  => [
			[ 'title' => '<a href="/hire-dedicated-team/">Dedicated Development Team</a>', 'para' => 'Long-term team extension for continuous development and product scaling.' ],
			[ 'title' => '<a href="/staff-augmentation/">Staff Augmentation</a>',    'para' => 'Skilled developers integrated into your existing team and workflows.' ],
			[ 'title' => '<a href="/software-outsourcing/">Software Outsourcing</a>',    'para' => 'End-to-end project delivery managed from planning to deployment.' ],
		],
	],

	'built_for_startup' => [
		'title'    => 'Mobile App Development for Startups, Scaleups, and Enterprises',
		'para'     => "We deliver mobile app development services across every growth stage, adapting architecture, speed, and complexity based on where your product stands today and where it needs to go next. Our approach ensures each phase of growth is supported with the right engineering depth, scalability planning, and execution clarity. ",
		'btn_text' => 'Talk to a Mobile Expert',
		'img_src'  => '/revamp/mobile-app/startup.webp',
		'bg_image' => '/revamp/mobile-app/startup-bg.webp',
		'extra_list' => [
			'Launch MVPs with fast, focused builds that validate ideas quickly',
			'Strengthen scaleups with systems ready for higher user and data load',
			'Support enterprises with structured, secure, and governed mobile platforms',
			'Align engineering approach with product maturity and business priorities',
		],
	],

	'industry_grid' => [
    'title'   => 'Industries We Serve',
    'listing' => [
        [ 'title' => 'Logistics',    'paragraph' => 'Automation systems, route optimization, and real-time fleet tracking solutions built for operational efficiency and visibility.',                                          'bg_image' => '/revamp/industrySlider/logistic.webp',    'link' => '/industries/logistics-software-development/' ],
        [ 'title' => 'Healthcare',   'paragraph' => 'HIPAA-ready mobile applications, EMR integrations, and telehealth platforms focused on secure patient care and compliance.',                                             'bg_image' => '/revamp/industrySlider/healthcare.webp',  'link' => '/industries/healthcare-app-development/' ],
        [ 'title' => 'Fintech',      'paragraph' => 'Secure financial platforms including KYC workflows, payment systems, fraud detection, and compliance-first architectures.',                                              'bg_image' => '/revamp/industrySlider/fintech.webp',     'link' => '/industries/fintech-software-development/' ],
        [ 'title' => 'Retail',       'paragraph' => 'Omnichannel commerce platforms with personalization engines, customer engagement tools, and scalable mobile shopping experiences.',                                      'bg_image' => '/revamp/industrySlider/retail.webp',      'link' => '/industries/retail-app-development/' ],
        [ 'title' => 'Real Estate',  'paragraph' => 'Property listing platforms, tenant management systems, and workflow automation for real estate operations.',                                                             'bg_image' => '/revamp/industrySlider/realestate.webp',  'link' => '/industries/real-estate-app-development/' ],
        [ 'title' => 'Education',    'paragraph' => 'Learning management systems, eLearning platforms, and interactive digital education solutions with seamless integrations.',                                              'bg_image' => '/revamp/industrySlider/education.webp',   'link' => '/industries/education-app-development/' ],
        [ 'title' => 'Automotive',   'paragraph' => 'Dealer management systems, inventory tracking platforms, and digital showroom experiences for automotive businesses.',                                                  'bg_image' => '/revamp/industrySlider/automotive.webp',  'link' => '/industries/automotive-app-development/' ],
        [ 'title' => 'Energy',       'paragraph' => 'IoT-enabled monitoring systems, field data applications, and smart grid or microgrid control solutions for energy operations.',                                         'bg_image' => '/revamp/industrySlider/energy.webp',      'link' => '/industries/energy-management-software-development/' ],
    ],
],

	'predictable_process' => [
    'title'    => 'Why Businesses Trust Our Mobile App Development Agency',
    'para'     => 'We focus on building long-term partnerships through transparent communication, ethical development practices, and a clear commitment to doing what is right for the product and the business.',
    'btn_text' => 'Talk to Us',
    'btn_link' => '/contact-us/',
    'img_src'  => '/revamp/mobile-app/p-left.webp',
    'bg_image' => '/revamp/mobile-app/delivery-bg.webp',
    'listing'  => [
        [ 'title' => 'Transparent Communication',     'para' => 'Clear and structured communication with regular updates, ensuring stakeholders always have visibility into progress, decisions, and timelines.' ],
        [ 'title' => 'Ethical Development Practices', 'para' => 'Responsible engineering focused on stability, user privacy, and long-term maintainability, aligned with industry security and compliance standards.' ],
        [ 'title' => 'Collaborative Working Approach','para' => 'We align with your workflows and feedback cycles, integrating smoothly as part of your team across 94%+ repeat client engagements.' ],
        [ 'title' => 'Accountability in Execution',   'para' => 'Clear ownership of commitments with consistent follow-through across all project stages, supported by defined milestones and delivery checkpoints.' ],
        [ 'title' => 'Trust-Driven Engagement',       'para' => 'Long-term relationships built on reliability and consistency, reflected in a 4.7/5 client satisfaction rating across delivery engagements.' ],
		[ 'title' => 'Product-Focused Decision Making',       'para' => 'Every recommendation is guided by product goals, user needs, and business impact, so features are built with purpose instead of unnecessary complexity.' ],
    ],
],

	'clients_say' => [
    'title'   => 'What Our Clients Say',
    'listing' => [
        [ 'content' => 'Their ability to quickly understand an unfamiliar use case and respond creatively to it is impressive.',                           'profile' => '/revamp/home/pro-1.png', 'name' => 'Anonymous',       'description' => 'Executive, Pured Disc Golf',                'link' => 'https://clutch.co/go-to-review/8a35362a-5e04-4633-ad4e-7ced8217e2fc/410602', 'icon' => '/revamp/home/clutch.png', 'width' => 91, 'height' => 25 ],
        [ 'content' => 'Their ability to take a concept and run with it stood out.',                                                                      'profile' => '/revamp/home/pro-4.png', 'name' => 'Chris Degenaars', 'description' => 'Operations & Strategy, Long Drive Agency', 'link' => 'https://clutch.co/go-to-review/8a35362a-5e04-4633-ad4e-7ced8217e2fc/48683',  'icon' => '/revamp/home/clutch.png', 'width' => 91, 'height' => 25 ],
        [ 'content' => 'The talent they provided was solid, but more importantly, they were quick to align with our way of working.',                     'profile' => '/revamp/home/pro-1.png', 'name' => 'Nancy Snyder',    'description' => 'Managing Director, MimeCast',               'link' => 'https://clutch.co/go-to-review/8a35362a-5e04-4633-ad4e-7ced8217e2fc/395020', 'icon' => '/revamp/home/clutch.png', 'width' => 91, 'height' => 25 ],
        [ 'content' => "I'm impressed with their ability to get the job done right the first time and in a highly-efficient, timely manner.",             'profile' => '/revamp/home/pro-2.png', 'name' => 'Adam Zwingler',   'description' => 'Owner & Founder, Inside Out Creative',      'link' => 'https://clutch.co/go-to-review/8a35362a-5e04-4633-ad4e-7ced8217e2fc/60797',  'icon' => '/revamp/home/clutch.png', 'width' => 91, 'height' => 25 ],
    ],
],

	'cta_two' => [
		'title'        => 'Let’s Build Your Mobile App the Right Way',
		'sub_title'    => "Hiring delays shouldn't block delivery.",
		'para'         => 'We help teams design and build mobile applications with clarity, structure, and long-term scalability in mind.',
		'btn_text'     => 'Start Your Mobile Project',
		'btn_two_text' => 'Talk to Our Mobile Experts',
		'bg_image'     => '/revamp/mobile-app/cta.webp',
	],

	'our_blog' => [
		'title'       => 'Ideas That Inspire',
		'category_id' => 3,
	],

	'faqs' => [
    'listing' => [
        [ 'faqhead' => 'How much does custom mobile app development cost?',              'faqbody' => 'Most mobile apps cost $40,000–$350,000+, depending on complexity, platforms, backend, integrations, and compliance needs. Enterprise apps with advanced features typically cost more. Final estimates are shared after requirement analysis.' ],
        [ 'faqhead' => 'What factors influence total mobile app development cost?',      'faqbody' => 'Cost depends on feature scope, platform choice (native or cross-platform), backend complexity, security needs, and scalability requirements. Real-time features and high-load systems increase effort and cost.' ],
        [ 'faqhead' => 'How long does it take to build a mobile app?',                  'faqbody' => 'Development usually takes 3 to 12 months, depending on complexity, platform coverage, and backend requirements. Simple apps are faster, while enterprise apps take longer.' ],
        [ 'faqhead' => 'Should we choose native or cross-platform development?',        'faqbody' => 'Native apps (Swift/Kotlin) are best for performance-heavy needs. Cross-platform (Flutter/React Native) reduces time and cost with a shared codebase. Choice depends on goals, budget, and scalability needs.' ],
        [ 'faqhead' => 'How do you maintain app performance under real user load?',     'faqbody' => 'We use device-level profiling, memory optimization, and API tuning. Real-device testing ensures stable performance under real-world usage conditions.' ],
        [ 'faqhead' => 'How do you manage app security and data protection?',           'faqbody' => 'We implement encrypted storage, secure authentication, protected APIs, and OWASP-aligned practices. Compliance standards like HIPAA, PCI, and SOC are followed for sensitive industries.' ],
        [ 'faqhead' => 'What does your mobile development process include?',            'faqbody' => 'Our process covers requirements mapping, UX flow design, UI system creation, agile frontend engineering, backend/API setup, multi-layer QA across real devices, and store deployment.' ],
    ],
],
];

get_header();

set_query_var( 'component_data', $mock_data );

get_template_part( 'template-parts/components/banner' );
get_template_part( 'template-parts/components/trusted-by' );
get_template_part( 'template-parts/components/choose-results' );
get_template_part( 'template-parts/components/teams-choose' );
get_template_part( 'template-parts/components/augmentation-services' );
get_template_part( 'template-parts/components/enterprise-level' );
get_template_part( 'template-parts/components/delivery-control' );
get_template_part( 'template-parts/components/case-studies-tabs-two' );
get_template_part( 'template-parts/components/teams-work' );
get_template_part( 'template-parts/components/built-for-startup' );
get_template_part( 'template-parts/components/industry-grid' );
get_template_part( 'template-parts/components/predictable-process' );
get_template_part( 'template-parts/components/our-clients-say' );
get_template_part( 'template-parts/components/cta-two' );
get_template_part( 'template-parts/components/our-blog' );
get_template_part( 'template-parts/components/revamp-faqs' );

get_footer();
