<?php

/**
 * Template Name: iOS App Development Custom Template
 *
 * @package technbrains-child
 */

defined('ABSPATH') || exit;

add_action('wp_head', function () {
	// $product_schema = array(
	// 	'@context'        => 'https://schema.org/',
	// 	'@type'           => 'Product',
	// 	'name'            => 'iOS App Development Services | Hire Expert iOS Developers',
	// 	'image'           => 'https://www.technbrains.com/_next/image?url=%2Fimage%2Fapp-dev%2Fios%2Fbanner-4.webp&w=750&q=75',
	// 	'description'     => 'Hire expert iOS developers to build, modernize, or scale your app. TechnBrains delivers Swift expertise, secure architecture & reliable delivery.',
	// 	'brand'           => array('@type' => 'Brand', 'name' => 'TechnBrains'),
	// 	'aggregateRating' => array(
	// 		'@type'       => 'AggregateRating',
	// 		'ratingValue' => '4.7',
	// 		'bestRating'  => '5',
	// 		'worstRating' => '1',
	// 		'reviewCount' => '15',
	// 	),
	// 	'review'          => array(
	// 		'@type'     => 'Review',
	// 		'author'    => array('@type' => 'Organization', 'name' => 'TechnBrains'),
	// 		'publisher' => array('@type' => 'Organization', 'name' => 'Clutch'),
	// 		'url'       => 'https://clutch.co/profile/technbrains',
	// 	),
	// );

	$faqs = array(
		array('q' => 'What do iOS app development services typically include?', 'a' => 'iOS app development services usually cover product discovery, UX/UI design, native iOS development, backend and API integration, testing, App Store deployment, and ongoing maintenance. The exact scope depends on whether you\'re building an MVP, scaling an existing app, or modernizing a legacy product.'),
		array('q' => 'How much do iOS app development services cost?', 'a' => 'iOS app development costs typically range from $20,000 to $60,000 for an MVP, $60,000 to $150,000 for a full-scale product, and $150,000+ for complex or enterprise-grade apps. Final cost depends on feature scope, UX depth, backend complexity, third-party integrations, and ongoing support requirements. Accurate pricing comes from structured discovery, not estimates pulled out of context.'),
		array('q' => 'What factors impact iOS app development cost the most?', 'a' => 'Cost is driven by feature complexity, number of screens, backend and API integrations, security requirements, offline support, real-time data handling, and post-launch maintenance. Timeline pressure and App Store compliance needs can also affect pricing.'),
		array('q' => 'How long do staff augmentation–led iOS app development projects usually take?', 'a' => 'In a staff augmentation model, timelines depend on your existing team structure and scope rather than vendor handoff cycles. Teams often see meaningful progress within the first 1–2 weeks of onboarding, while MVPs or feature milestones typically move faster because engineers integrate directly into ongoing workflows instead of restarting from scratch.'),
		array('q' => 'How do I choose the right iOS app development company?', 'a' => 'Look for an iOS app development company with proven production experience, senior engineers, transparent processes, and a strong understanding of product and architecture, not just design or marketing claims.'),
		array('q' => 'How quickly can iOS developers be onboarded through staff augmentation?', 'a' => 'Expert iOS app developers can usually be onboarded within days, not months. Because staff augmentation avoids traditional hiring and vendor ramp-up, engineers can align with your tools, codebase, and sprint cycles quickly, reducing idle time and delivery delays.'),
		array('q' => 'Do you build apps using Swift or SwiftUI?', 'a' => 'Yes. Modern iOS apps are built primarily with Swift and SwiftUI, with UIKit used where finer control or legacy compatibility is required. Technology choices depend on performance needs, OS support, and long-term maintainability.'),
		array('q' => 'Can you work with an existing iOS app or codebase?', 'a' => 'Yes. We regularly extend, refactor, and stabilize existing iOS apps. This includes feature expansion, performance improvements, modernization, and resolving architectural or scalability issues.'),
		array('q' => 'Is staff augmentation a good alternative to outsourcing iOS app development?', 'a' => 'Yes. For teams that want to scale iOS development without giving up control, staff augmentation is often a better alternative to outsourcing. It gives you direct access to experienced iOS developers who work within your team, follow your processes, and reduce hiring overhead while maintaining full ownership of code, security, and delivery decisions.'),
		array('q' => 'Will I own the source code and IP?', 'a' => 'Yes. You retain full ownership of the source code, intellectual property, and related assets. This is standard practice for professional iOS development engagements.'),
		array('q' => 'Do you handle App Store submission and approvals?', 'a' => 'Yes. We manage App Store preparation, compliance checks, submission, and review coordination, ensuring your app meets Apple\'s technical and policy requirements.'),
		array('q' => 'Can you integrate third-party APIs and backend systems?', 'a' => 'Yes. We integrate iOS apps with REST or GraphQL APIs, payment gateways, analytics platforms, authentication services, and custom backend systems securely and efficiently.'),
		array('q' => 'What industries do you provide iOS app development services for?', 'a' => 'Our iOS app development services support startups, SMBs, and enterprises across industries including SaaS, fintech, healthcare, logistics, eCommerce, education, and on-demand platforms.'),
		array('q' => 'How do you handle security and data protection in iOS apps?', 'a' => 'Security is handled through secure API communication, encrypted local storage, proper authentication flows, Keychain usage, and adherence to Apple\'s security best practices.'),
		array('q' => 'Do you provide ongoing maintenance after launch?', 'a' => 'Yes. We offer maintenance and support services that cover OS updates, bug fixes, performance improvements, dependency upgrades, and feature enhancements after launch.'),
		array('q' => 'How does staff augmentation affect long-term iOS product timelines?', 'a' => 'Staff augmentation supports long-term timelines by keeping knowledge, code ownership, and architectural decisions within your team. This avoids the slowdowns commonly caused by vendor transitions, handoffs, or re-onboarding new teams as the product evolves.'),
		array('q' => 'Can you scale the team as the product grows?', 'a' => 'Yes. We can extend your team with experienced iOS developers, allowing you to scale development capacity without long hiring cycles or internal disruption.'),
		array('q' => 'How do we get started with your iOS app development services?', 'a' => 'The process typically starts with a discovery call to understand your product goals, requirements, and constraints. From there, we define scope, timelines, and the most effective execution plan.'),
		array('q' => 'Is staff augmentation for iOS app development more cost-effective than hiring in-house?', 'a' => 'Yes. Staff augmentation for iOS app development gives you access to senior iOS app developers without long recruitment cycles, fixed payroll costs, or ongoing overhead. You reduce hiring, onboarding, and retention expenses while keeping full control over delivery, architecture, security, and compliance standards.'),
	);

	$faq_entities = array();
	foreach ($faqs as $faq) {
		$faq_entities[] = array(
			'@type'          => 'Question',
			'name'           => $faq['q'],
			'acceptedAnswer' => array('@type' => 'Answer', 'text' => $faq['a']),
		);
	}

	// $faq_schema = array(
	// 	'@context'   => 'https://schema.org',
	// 	'@type'      => 'FAQPage',
	// 	'mainEntity' => $faq_entities,
	// );

	// $service_schema = array(
	// 	'@context'    => 'https://schema.org',
	// 	'@type'       => 'Service',
	// 	'serviceType' => 'iOS App Development Services',
	// 	'name'        => 'iOS App Development Services | Hire Expert iOS Developers',
	// 	'description' => 'Hire expert iOS developers to build, modernize, or scale your app. TechnBrains delivers Swift expertise, secure architecture & reliable delivery.',
	// 	'url'         => 'https://www.technbrains.com/ios-app-development',
	// 	'provider'    => array(
	// 		'@type'           => 'Organization',
	// 		'name'            => 'TechnBrains',
	// 		'url'             => 'https://www.technbrains.com',
	// 		'logo'            => 'https://www.technbrains.com/image/revamp/logo-w.svg',
	// 		'contactPoint'    => array(
	// 			'@type'             => 'ContactPoint',
	// 			'contactType'       => 'Customer Support',
	// 			'availableLanguage' => 'English',
	// 		),
	// 		'aggregateRating' => array(
	// 			'@type'       => 'AggregateRating',
	// 			'ratingValue' => '4.9',
	// 			'reviewCount' => '430',
	// 			'bestRating'  => '5',
	// 			'worstRating' => '1',
	// 		),
	// 		'review'          => array(
	// 			array(
	// 				'@type'      => 'Review',
	// 				'author'     => array('@type' => 'Person', 'name' => 'Nancy Snyder'),
	// 				'reviewBody' => 'The talent they provided was solid, but more importantly, they were quick to align with our way of working.',
	// 				'publisher'  => array('@type' => 'Organization', 'name' => 'Clutch'),
	// 			),
	// 			array(
	// 				'@type'      => 'Review',
	// 				'author'     => array('@type' => 'Person', 'name' => 'Adam Zwingler'),
	// 				'reviewBody' => 'I\'m impressed with their ability to get the job done right the first time and in a highly-efficient, timely manner.',
	// 				'publisher'  => array('@type' => 'Organization', 'name' => 'Clutch'),
	// 			),
	// 			array(
	// 				'@type'      => 'Review',
	// 				'author'     => array('@type' => 'Person', 'name' => 'Abby Briseno'),
	// 				'reviewBody' => 'They\'ve been organized and have delivered items as promised.',
	// 				'publisher'  => array('@type' => 'Organization', 'name' => 'Clutch'),
	// 			),
	// 			array(
	// 				'@type'      => 'Review',
	// 				'author'     => array('@type' => 'Person', 'name' => 'Chris Degenaars'),
	// 				'reviewBody' => 'Their ability to take a concept and run with it stood out.',
	// 				'publisher'  => array('@type' => 'Organization', 'name' => 'Clutch'),
	// 			),
	// 		),
	// 	),
	// );

	// echo '<script type="application/ld+json">' . wp_json_encode($product_schema) . '</script>' . "\n";
	// echo '<script type="application/ld+json">' . wp_json_encode($faq_schema) . '</script>' . "\n";
	// echo '<script type="application/ld+json">' . wp_json_encode($service_schema) . '</script>' . "\n";
});

get_header();

$mock_data = array(
	'banner'                => array(
		'title_html'      => 'iOS App Development Services for Reliable App Performance',
		'para'            => 'TechnBrains delivers iOS app development services for startups and growing businesses to build production-grade iOS applications with clean Swift architecture, smooth UI performance, and Apple-compliant builds that reduce rework, App Store rejection risks, and post-release instability.',
		'bg_image'        => '/revamp/ios-app/banner.webp',
		'btn_text'        => 'Talk To iOS Expert',
      	'btn_link'        => home_url( '/contact-us/' ),
      	'btn_classes' => 'transform-none',
		'btn_two_text'    => 'Get a Custom Quote',
		'btn_two_classes' => 'btnTransparent',
	),

	'trusted_by'            => array(
		'para'    => 'Chosen by teams building and shipping mobile applications across different stages of product growth.',
		'listing' => array(
			array('img_src' => '/revamp/home/t-7.png', 'width' => '124', 'height' => '40'),
			array('img_src' => '/revamp/home/t-8.png', 'width' => '114', 'height' => '24'),
			array('img_src' => '/revamp/home/t-9.png', 'width' => '107', 'height' => '36'),
			array('img_src' => '/revamp/home/t-4.png', 'width' => '109', 'height' => '43'),
			array('img_src' => '/revamp/home/t-5.png', 'width' => '142', 'height' => '42'),
			array('img_src' => '/revamp/home/t-6.png', 'width' => '101', 'height' => '31'),
		),
	),

	'choose_results'        => array(
		'title'      => 'Predictable iOS App Development Built for Production Stability',
		'para'       => 'When timelines, release quality, and product performance matter, businesses choose <a href="/mobile-app-development/">mobile app development services</a> backed by proven engineering execution. TechnBrains has delivered 70+ iOS applications built for smooth releases, stable performance, and real-world production use.',
		'sub_text'   => 'Your success is reflected in the outcomes',
		'awards'     => array(
			array('img_src' => '/revamp/common/goodfrims.png',  'width' => '104', 'height' => '81'),
			array('img_src' => '/revamp/common/trust-p.png',    'width' => '131', 'height' => '60'),
			array('img_src' => '/revamp/common/clutch-logo.png', 'width' => '97', 'height' => '27'),
		),
		'side_items' => array(
			array('count' => '70+',  'label' => 'iOS Apps Delivered'),
			array('count' => '92%',   'label' => 'Ahead-of-schedule Launches'),
			array('count' => '4.9/5', 'label' => 'Client Satisfaction'),
		),
	),

	'teams_choose' => array(
    'title'   => 'iOS App Development Process That Reduces Build Failures and Release Delays',
    'para'    => 'TechnBrains\' disciplined iOS process ensures you see problems early, make informed choices, and turn effort into a stable, scalable product instead of rework.',
    'img_src' => '/revamp/ios-app/process-2.webp',
    'listing' => array(
        array( 'item' => 'Product Discovery',          'para' => 'Requirements, technical constraints, and edge cases are defined early to support smoother development and release planning.' ),
        array( 'item' => 'UX Mapping',                 'para' => 'User journeys and screen flows are mapped upfront to maintain intuitive app behavior across features and devices.' ),
        array( 'item' => 'Reusable UI Design System',  'para' => 'A unified component system keeps interfaces consistent and supports faster feature expansion across iPhone and iPad experiences.' ),
        array( 'item' => 'Frontend Development',       'para' => 'Swift-based builds are developed in iterative cycles by our <a href="/hire-ios-developer/">iOS developers</a>, allowing early detection of issues during implementation.' ),
        array( 'item' => 'Backend & API Integration',  'para' => 'APIs and backend services are integrated alongside feature development to prevent integration conflicts during release cycles.' ),
        array( 'item' => 'QA & Release Validation',    'para' => 'Real-device testing and release validation ensure performance stability and App Store readiness before deployment.' ),
    ),
),

	'augmentation_services' => array(
    'title'    => 'iOS App Development Services Built for the Apple Ecosystem',
    'para'     => 'Our iOS app development services support every stage of the product lifecycle, from new app development to modernization, feature expansion, and App Store launch preparation.',
    'btn_text' => 'Discuss Your App Project',
    'classes'  => 'gridThree',
    'listing'  => array(
        array( 'icon' => '/revamp/common/frontend.png',  'title' => 'End-to-End iOS App Development',          'para' => 'Production-ready iOS apps with clean Swift architecture, <a href="/ai-development-services/">Artificial intelligence</a> features, and scalable feature expansion built into the product.' ),
        array( 'icon' => '/revamp/common/backend.png',   'title' => 'UI/UX Design Services',                   'para' => 'User-focused UI/UX interfaces designed for iOS apps with intuitive flows, consistent design systems, and seamless Apple ecosystem experiences.', ),
        array( 'icon' => '/revamp/common/mobile.png',    'title' => 'iOS App Modernization & Codebase Optimization', 'para' => 'Our senior <a href="/hire-swift-developer/">Swift developers</a> upgrade iOS apps, improve architecture, and deliver cleaner code for better long-term maintainability.' ),
        array( 'icon' => '/revamp/common/devops.png',    'title' => 'Maintenance & Continuous Support',         'para' => 'Ongoing updates, performance fixes, and dependency upgrades managed through our application <a href="/support-maintenance/">maintenance and support services</a>.' ),
        array( 'icon' => '/revamp/common/ai.png',        'title' => 'Cross-Platform Mobile Development',        'para' => 'Consistent mobile experiences across iOS and Android development using native, Flutter, and React Native engineering approaches.' ),
        array( 'icon' => '/revamp/common/app-store.png', 'title' => 'App Store Launch & ASO Optimization',      'para' => 'App Store submission, compliance validation, and ASO optimization to improve visibility, approval speed, and listing performance.' ),
    ),
),

	'enterprise_level' => array(
    'title'    => 'Why TechnBrains Fits Your High-Stakes iOS Projects',
    'para'     => 'TechnBrains brings specialized iOS engineering expertise to every project. Our team handles complex architecture decisions, performance requirements, and critical third-party integrations with full accountability for the outcome.',
    'btn_text' => 'Talk to Our Experts',	
    'btn_link' => home_url( '/contact-us/' ),
    'bg_image' => '/revamp/staff-aug/enterpriseLevel.webp',
    'listing'  => array(
        array( 'item' => 'Engineering-Led Decision Making', 'para' => 'Architecture integrity and long-term stability prioritized over short-term delivery speed.' ),
        array( 'item' => 'Production-First Standards',      'para' => 'iOS apps built with production readiness, performance thresholds, and release stability.' ),
        array( 'item' => 'Apple & App Store Compliance',    'para' => 'Follows Apple HIG, App Store Review Guidelines, and iOS privacy requirements.' ),
        array( 'item' => 'Engineering Governance',          'para' => 'Standardized Swift practices, architecture rules, and code reviews ensure consistent quality.' ),
        array( 'item' => 'Controlled Change Management',    'para' => 'Updates evaluated for compatibility, UI consistency, and App Store compliance impact.' ),
        array( 'item' => 'Risk-Aware Engineering',          'para' => 'Security, integration, and iOS version risks identified early to prevent failures.' ),
    ),
),

	'case_studies'          => array(
		'heading' => 'See How TechnBrains Has Solved Real-World Challenges',
		'para'    => 'Each project reflects how execution choices are held up after release, not just at launch. The focus stays on outcomes, including fewer failures, faster iteration, and products. ',
	),

	'tech_stack_tabs' => array(
    'title'    => 'iOS Tech Stack That Lets Features Run Smoothly, Every Time',
    'para'     => 'We use this result-driven tech stack for iOS app development services to avoid common failure points like brittle dependencies, slow builds, and hard-to-maintain codebases. This way, your iOS application stays stable as it grows.',
    'btn_text' => 'Accelerate Your Launch',
    'listing'  => array(
        array( 'tabTitle' => 'Languages & Frameworks', 'dataList' => array(
            array( 'stack' => 'Swift' ),
            array( 'stack' => 'SwiftUI' ),
            array( 'stack' => 'UIKit' ),
            array( 'stack' => 'Objective-C (legacy support)' ),
        ) ),
        array( 'tabTitle' => 'Backend & APIs', 'dataList' => array(
            array( 'stack' => 'REST API Integration' ),
            array( 'stack' => 'WebSockets' ),
            array( 'stack' => 'Node.js', 'link' => home_url( '/technologies/nodejs/' ) ),
            array( 'stack' => 'PHP',     'link' => home_url( '/technologies/php/' ) ),
            array( 'stack' => '.NET',     'link' => home_url( '/technologies/net/' )  ),
            array( 'stack' => 'Python',  'link' => home_url( '/technologies/python/' ) ),
            array( 'stack' => 'Java',    'link' => home_url( '/technologies/java/' ) ),
        ) ),
        array( 'tabTitle' => 'Architecture & Patterns', 'dataList' => array(
            array( 'stack' => 'MVVM' ),
            array( 'stack' => 'Clean Architecture' ),
            array( 'stack' => 'Modular Architecture' ),
            array( 'stack' => 'Coordinator Pattern' ),
        ) ),
        array( 'tabTitle' => 'Concurrency & State', 'dataList' => array(
            array( 'stack' => 'Async/Await' ),
            array( 'stack' => 'Structured Concurrency' ),
            array( 'stack' => 'Combine' ),
        ) ),
        array( 'tabTitle' => 'Networking', 'dataList' => array(
            array( 'stack' => 'URLSession' ),
            array( 'stack' => 'Alamofire' ),
            array( 'stack' => 'REST API integration' ),
            array( 'stack' => 'WebSockets' ),
        ) ),
        array( 'tabTitle' => 'Local Storage', 'dataList' => array(
            array( 'stack' => 'Core Data' ),
            array( 'stack' => 'SQLite' ),
            array( 'stack' => 'Realm' ),
            array( 'stack' => 'Keychain' ),
        ) ),
        array( 'tabTitle' => 'Testing & Debugging', 'dataList' => array(
            array( 'stack' => 'XCTest' ),
            array( 'stack' => 'XCUITest' ),
            array( 'stack' => 'Snapshot Testing' ),
            array( 'stack' => 'Instruments' ),
        ) ),
        array( 'tabTitle' => 'Build & Tooling', 'dataList' => array(
            array( 'stack' => 'Xcode' ),
            array( 'stack' => 'Fastlane' ),
            array( 'stack' => 'Git' ),
            array( 'stack' => 'TestFlight' ),
        ) ),
        array( 'tabTitle' => 'Security', 'dataList' => array(
            array( 'stack' => 'Keychain Services' ),
            array( 'stack' => 'App Transport Security (ATS)' ),
            array( 'stack' => 'Biometric Authentication (Face ID / Touch ID)' ),
            array( 'stack' => 'Secure Enclave' ),
        ) ),
    ),
),

	'industry_grid' => array(
    'title'   => 'Industries We Serve Where Mistakes Cost the Most',
    'para'    => 'TechnBrains builds iOS solutions for industries where errors aren\'t an option. Our iOS developers and engineers navigate strict regulations, sensitive data, and growing user demands relevant to every vertical.',
    'listing' => array(
        array( 'title' => 'Fintech',      'paragraph' => 'Secure iOS applications designed for encrypted transactions, fraud prevention, and compliance-driven financial workflows.',                                                          'bg_image' => '/revamp/industrySlider/fintech.webp',    'link' => '/industries/fintech-software-development/' ),
        array( 'title' => 'Healthcare',   'paragraph' => 'Privacy-focused applications that manage sensitive patient data while ensuring regulatory compliance and operational accuracy.',                                                     'bg_image' => '/revamp/industrySlider/healthcare.webp', 'link' => '/industries/healthcare-app-development/' ),
        array( 'title' => 'Automotive',   'paragraph' => 'Connected applications for vehicle systems and fleet management with real-time data processing and hardware integration support.',                                                  'bg_image' => '/revamp/industrySlider/automotive.webp', 'link' => '/industries/automotive-app-development/' ),
        array( 'title' => 'EdTech',       'paragraph' => 'Learning platforms, training apps, and corporate systems scale reliably, protect sensitive data, and support structured digital education.',                                        'bg_image' => '/revamp/industrySlider/edu.webp',        'link' => '/industries/education-app-development/' ),
        array( 'title' => 'Retail',       'paragraph' => 'High-performance shopping platforms with real-time inventory updates, secure payment flows, and optimized conversion experiences.',                                                 'bg_image' => '/revamp/industrySlider/ecommerce.webp',  'link' => '/industries/retail-app-development/' ),
        array( 'title' => 'Logistics',    'paragraph' => 'Real-time tracking and coordination systems built for supply chain visibility, operational accuracy, and data-driven decision-making.',                                             'bg_image' => '/revamp/industrySlider/on-demand.webp',  'link' => '/industries/logistics-software-development/' ),
        array( 'title' => 'Real Estate',  'paragraph' => 'iOS applications for property listing, virtual tours, and transaction workflows with seamless user experience and data management.',                                                'bg_image' => '/revamp/industrySlider/realestate.webp', 'link' => '/industries/real-estate-app-development/' ),
        array( 'title' => 'Energy',       'paragraph' => 'Operational iOS solutions for monitoring systems, field workforce coordination, and real-time infrastructure data management.',                                                     'bg_image' => '/revamp/industrySlider/energy.webp',     'link' => '/industries/energy-management-software-development/' ),
    ),
),

	'clients_say' => array(
    'title'   => 'What Our Clients Say',
    'listing' => array(
        array( 'content' => 'Their ability to quickly understand an unfamiliar use case and respond creatively to it is impressive.',                        'profile' => '/revamp/home/pro-1.png', 'name' => 'Anonymous',       'description' => 'Executive, Pured Disc Golf',                'link' => 'https://clutch.co/go-to-review/8a35362a-5e04-4633-ad4e-7ced8217e2fc/410602', 'icon' => '/revamp/home/clutch.png', 'width' => '91', 'height' => '25' ),
        array( 'content' => 'Their ability to take a concept and run with it stood out.',                                                                   'profile' => '/revamp/home/pro-4.png', 'name' => 'Chris Degenaars', 'description' => 'Operations & Strategy, Long Drive Agency', 'link' => 'https://clutch.co/go-to-review/8a35362a-5e04-4633-ad4e-7ced8217e2fc/48683',  'icon' => '/revamp/home/clutch.png', 'width' => '91', 'height' => '25' ),
        array( 'content' => 'The talent they provided was solid, but more importantly, they were quick to align with our way of working.',                  'profile' => '/revamp/home/pro-1.png', 'name' => 'Nancy Snyder',    'description' => 'Managing Director, MimeCast',               'link' => 'https://clutch.co/go-to-review/8a35362a-5e04-4633-ad4e-7ced8217e2fc/395020', 'icon' => '/revamp/home/clutch.png', 'width' => '91', 'height' => '25' ),
        array( 'content' => 'I\'m impressed with their ability to get the job done right the first time and in a highly-efficient, timely manner.',         'profile' => '/revamp/home/pro-2.png', 'name' => 'Adam Zwingler',   'description' => 'Owner & Founder, Inside Out Creative',      'link' => 'https://clutch.co/go-to-review/8a35362a-5e04-4633-ad4e-7ced8217e2fc/60797',  'icon' => '/revamp/home/clutch.png', 'width' => '91', 'height' => '25' ),
    ),
),

	'full_cta'              => array(
		'title'    => 'Build iOS Apps Ready for Launch and Scale',
		'para'     => 'Get your iOS app built through a complete development lifecycle, from product planning and UX design to development, testing, and App Store approval.',
		'btn_text'  => 'Book Your First Call',
		'bg_image' => '/revamp/ios-app/cta-bg.webp',
	),

	'our_blog'              => array(
		'title'      => 'Ideas That Inspire',
		'category_id' => 448,
	),

	'faqs' => array(
    'listing' => array(
        array( 'faqhead' => 'What do iOS app development services typically include?',  'faqbody' => 'iOS app development services include product discovery, UX/UI design, native development, backend integration, testing, App Store deployment, and ongoing maintenance.' ),
        array( 'faqhead' => 'How much does iOS app development cost?',                  'faqbody' => 'Costs typically range from $20,000-$60,000 for MVPs, $60,000-$150,000 for full-feature apps, and $150,000+ for enterprise solutions, depending on scope and complexity.' ),
        array( 'faqhead' => 'How long does iOS app development take?',                  'faqbody' => 'An MVP usually takes 8-16 weeks, while full-featured apps take 4-9 months. Complex enterprise applications may require longer timelines based on requirements.' ),
        array( 'faqhead' => 'What factors impact iOS app development cost the most?',   'faqbody' => 'Key factors include feature complexity, UI/UX design depth, backend architecture, third-party integrations, security requirements, and real-time functionality.' ),
        array( 'faqhead' => 'Can you work with an existing iOS app or codebase?',       'faqbody' => 'Yes. Existing apps can be enhanced through feature expansion, performance optimization, architecture improvements, and full or partial modernization.' ),
        array( 'faqhead' => 'Do you handle App Store submission and approvals?',        'faqbody' => 'Yes. App Store submission, compliance checks, and release coordination are managed to ensure alignment with Apple\'s review guidelines.' ),
        array( 'faqhead' => 'What industries do you provide iOS app development services for?', 'faqbody' => 'Services are provided across fintech, healthcare, automotive, logistics, real estate, on-demand platforms, and energy sectors.' ),
        array( 'faqhead' => 'Will I own the source code and IP?',                       'faqbody' => 'Yes. Clients retain full ownership of source code, intellectual property, and all related assets upon project completion.' ),
    ),
),
);

set_query_var('component_data', $mock_data);

$components = array(
	'banner',
	'trusted-by',
	'choose-results',
	'teams-choose',
	'augmentation-services',
	'enterprise-level',
	'case-studies-tabs-two',
	'tech-stack-tabs',
	'industry-grid',
	'our-clients-say',
	'full-cta',
	'our-blog',
	'revamp-faqs',
);

foreach ($components as $component) {
	get_template_part('template-parts/components/' . $component);
}

get_footer();
