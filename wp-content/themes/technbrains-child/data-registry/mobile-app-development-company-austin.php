<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(),

	'components' => array(
		array( 'name' => 'sdd-banner',              'modifier_class' => 'dallas' ),
		array( 'name' => 'trusted-by-best',         'modifier_class' => '' ),
		array( 'name' => 'stack-services',          'modifier_class' => '' ),
		array( 'name' => 'industry-specific',       'modifier_class' => 'dallas' ),
		array( 'name' => 'houston-cta',             'modifier_class' => 'houstonIndex' ),
		array( 'name' => 'app-portfolio',           'modifier_class' => 'dallas' ),
		array( 'name' => 'how-we-deliver',          'modifier_class' => 'dallas' ),
		array( 'name' => 'stack-new-box-dallas',    'modifier_class' => '' ),
		array( 'name' => 'trending-technologies',   'modifier_class' => '' ),
		array( 'name' => 'streamlined-tabs',        'modifier_class' => '' ),
		array( 'name' => 'app-services',            'modifier_class' => 'hosutonBottom' ),
		array( 'name' => 'development-cost',        'modifier_class' => '' ),
		array( 'name' => 'awards-recognition',      'modifier_class' => '' ),
		array( 'name' => 'faq-revamp',              'modifier_class' => '' ),
		array( 'name' => 'location-cta',            'modifier_class' => '' ),
	),

	'mock_data' => array(

		'sdd_banner' => array(
    'heading'         => 'The Trusted <span>Mobile App Development Company</span> in Austin',
    'paragraph'       => 'TechnBrains is a leading <a href="/mobile-app-development/">mobile app development company</a> in Austin that helps startups, SMBs, and enterprises with UX-driven applications to validate founder ideas and spark investor interest. Our expert-vetted <a href="/blog/a-complete-guide-for-hiring-mobile-app-developers/" target="_blank">mobile app developers</a> in Austin utilize the latest technologies and agile development practices to reduce turnaround time and deliver scalable apps for long-term business value.',
    'btn_title'       => 'Talk to App Experts',
    'btn_anchor_text' => 'See Portfolio',
    'btn_anchor_url'  => '/case-studies/',
),

		'stack_services' => array(
    'heading' => '<span>Full-Scale Mobile App Development Services in Austin</span> for Startups, SMBs, &amp; Enterprises',
    'listing' => array(
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-1.webp',
            'tab_title' => 'Android App Development',
            'tab_alt'   => 'mobile app development company austin',
            'content'   => 'We build robust Android applications using Kotlin, Android Studio, and modern Jetpack components. With adaptive UI design and clean code architecture, our <a href="/hire-android-developer/">Android app developers</a> in Austin are tailored for scalability, speed, and device compatibility across the Android ecosystem.',
        ),
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-2.webp',
            'tab_title' => 'IOS App Development',
            'tab_alt'   => 'ios app development austin',
            'content'   => 'Our <a href="/hire-ios-developer/">iOS app developers</a> in Austin build stable, high-performance applications using Swift, Xcode, and Apple\'s latest SDKs. Support for Core Data, push notifications, and seamless iCloud integration is what makes us a dependable iOS app development company for Austin-based startups and established brands.',
        ),
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-3.webp',
            'tab_title' => 'React Native App Development',
            'tab_alt'   => 'app development austin',
            'content'   => 'TechnBrains offers React Native app development services that combine reusable TypeScript codebases with native module support. We maintain visual and functional parity across platforms, delivering fast-loading, app-store-ready products that meet the expectations of mobile-first users in Austin through our dedicated <a href="/hire-react-native-developer/">React Native Developers</a>.',
        ),
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-4.webp',
            'tab_title' => 'Flutter App Development',
            'tab_alt'   => 'austin app developers',
            'content'   => 'Our Flutter app development services leverage Dart, widget-driven architecture, and reactive programming to build high-performance apps. From MVPs to production-ready products, we help businesses in Austin launch on both iOS and Android with pixel-perfect UI and native-speed execution from a single codebase, supported by expert <a href="/hire-flutter-developer/">Flutter App Developers</a>.',
        ),
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-5.webp',
            'tab_title' => 'Web App Development',
            'tab_alt'   => 'app developers in austin',
            'content'   => 'As a top-grade <a href="/web-app-development/">web app development company</a>, we create fast, secure, and scalable web applications using React, Angular, and Node.js. We support modular code, RESTful APIs, and CI/CD pipelines to deliver browser-based solutions that handle real-time data, complex workflows, and enterprise-grade performance needs.',
        ),
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-6.webp',
            'tab_title' => 'Enterprise App Development',
            'tab_alt'   => 'mobile app developers austin',
            'content'   => 'We build enterprise apps with scalable architecture, secure APIs, and CI/CD workflows. Our platforms support SSO, audit logs, ERP and CRM integration, and connect with internal systems across departments and high-volume user environments.',
        ),
    ),
),

		'industry_specific' => array(
			'heading' => 'An Industry-Focused Mobile App Development Company in Austin Delivering Real-World Solutions',
			'content' => 'We build mobile apps that match how industries operate—from compliance to daily workflows. As a leading Austin mobile app development company, we combine technical strategy with domain insight so your app launches ready for users, not just stores.',
			'listing' => array(
				array( 'img_src' => '/software-dev-houston/tech-1.png', 'width' => '400', 'height' => '279', 'title' => 'Healthcare',    'link' => '/industries/healthcare-app-development/',              'content' => 'We create HIPAA-compliant healthcare apps with secure logins, telehealth modules, and mobile-first interfaces for patients and providers.' ),
				array( 'img_src' => '/software-dev-houston/tech-2.png', 'width' => '400', 'height' => '279', 'title' => 'Fintech',        'link' => '/industries/fintech-software-development/',             'content' => 'Our FinTech apps support digital wallets, secure payments, and real-time transfers, all aligned with banking and financial regulations.' ),
				array( 'img_src' => '/software-dev-houston/tech-3.png', 'width' => '400', 'height' => '279', 'title' => 'SaaS',           'link' => '/saas-application-development/',             'content' => 'As a custom software development company in Austin, we build scalable SaaS apps with multi-tenant architecture and analytics dashboards.' ),
				array( 'img_src' => '/software-dev-houston/tech-4.png', 'width' => '400', 'height' => '279', 'title' => 'Travel',         'link' => '#footerFrom',                                          'content' => 'We develop travel apps with real-time booking, itinerary management, and geo-features to improve planning, navigation, and experiences.' ),
				array( 'img_src' => '/software-dev-houston/tech-5.png', 'width' => '400', 'height' => '279', 'title' => 'Logistics',      'link' => '/industries/logistics-software-development/',           'content' => 'Our logistics apps offer real-time tracking, route planning, and fleet control features for delivery networks and transportation services.' ),
				array( 'img_src' => '/software-dev-houston/tech-6.png', 'width' => '400', 'height' => '279', 'title' => 'Real Estate',    'link' => '/industries/real-estate-app-development/',              'content' => 'We build real estate apps with property listings, agent dashboards, CRM support, and interactive virtual tours for buyers.' ),
				array( 'img_src' => '/software-dev-houston/tech-7.png', 'width' => '400', 'height' => '279', 'title' => 'On-Demand',      'link' => '/industries/on-demand-app-development/',                'content' => 'We develop on-demand apps with live tracking, real-time matching, and in-app payments for fast, user-friendly service experiences.' ),
				array( 'img_src' => '/software-dev-houston/tech-8.png', 'width' => '400', 'height' => '279', 'title' => 'EdTech',         'link' => '/industries/education-app-development/',                'content' => 'Our EdTech apps enable assessments, content sharing, and student-teacher interaction across mobile devices and remote learning environments.' ),
				array( 'img_src' => '/software-dev-houston/tech-9.png', 'width' => '400', 'height' => '279', 'title' => 'Energy',         'link' => '/industries/energy-management-software-development/',   'content' => 'We build apps for energy companies offering usage monitoring, outage alerts, and mobile dashboards for real-time operational insights.' ),
				array( 'img_src' => '/mob-app-dallas-new/retail.webp',  'width' => '400', 'height' => '279', 'title' => 'E-commerce',     'link' => '/industries/retail-app-development/',                   'content' => 'We build ecommerce apps focused on conversion—featuring fast product search, secure checkout, and real-time inventory sync.' ),
			),
		),

		'houston_cta' => array(
			'subheading' => '',
			'heading'    => 'Empowering Entrepreneurs & SMBs with High-Performance Mobile App Development Services in Austin.',
			'img_src'    => '/software-dev-houston/houstoncta-side.webp',
			'img_width'  => '496',
			'img_height' => '427',
			'img_alt'    => 'app development company austin',
			'btn_text'   => 'Book Your Breakthrough Call!',
			'anchor'     => false,
		),

		'app_portfolio' => array(
    'heading_html' => '<span>The Leading Mobile App Development Company in Austin</span> Behind Startup &amp; Enterprise Growth Stories!',
    'content'      => 'We build apps that move the needle for real businesses. Our mobile app development services in Austin help startups gain traction and enterprises launch with confidence, speed, and long-term product value.',
),

		'how_we_deliver' => array(
			'title'   => 'Compliance-Driven Mobile App Development Company in Austin for Audit-Ready Applications',
			'para'    => 'As a custom app development company in Austin, we build mobile apps with compliance in mind—protecting your users, your data, and your business. From HIPAA to enterprise-grade protocols, we follow practices that support long-term security and audit readiness.',
			'listing' => array(
				array( 'img_src' => '/mob-app-dallas-new/t1.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'Regulatory-First Architecture',  'heading_html' => '<span>Regulatory-First</span> Architecture',  'content' => 'We build mobile apps around HIPAA, GDPR, and CCPA standards to help reduce compliance risks from the very beginning.',                                                              'img_one' => '/mob-app-dallas-new/tab/tab1-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab1-img2.webp' ),
				array( 'img_src' => '/mob-app-dallas-new/t2.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'Access Control Systems',          'heading_html' => '<span>Access Control</span> Systems',          'content' => 'User roles, session limits, and tiered permissions are configured to keep private data protected within defined access boundaries.',                                                 'img_one' => '/mob-app-dallas-new/tab/tab2-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab2-img2.webp' ),
				array( 'img_src' => '/mob-app-dallas-new/t3.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'Authentication Protocols',        'heading_html' => '<span>Authentication</span> Protocols',        'content' => 'Our apps include secure login flows such as two-factor authentication, biometrics, and SSO for identity verification and access control.',                                          'img_one' => '/mob-app-dallas-new/tab/tab3-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab3-img2.webp' ),
				array( 'img_src' => '/mob-app-dallas-new/t4.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'Encrypted Communication',         'heading_html' => '<span>Encrypted</span> Communication',         'content' => 'We apply TLS and AES encryption to safeguard all data at rest and in transit across the entire application infrastructure.',                                                        'img_one' => '/mob-app-dallas-new/tab/tab4-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab4-img2.webp' ),
				array( 'img_src' => '/mob-app-dallas-new/t5.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'Traceable Activity Logs',         'heading_html' => '<span>Traceable Activity</span> Logs',         'content' => 'User actions are recorded in tamper-proof audit logs to support internal reviews, legal compliance, and data accountability.',                                                      'img_one' => '/mob-app-dallas-new/tab/tab5-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab5-img2.webp' ),
				array( 'img_src' => '/mob-app-dallas-new/t6.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'Ongoing Security Testing',        'heading_html' => '<span>Ongoing Security</span> Testing',        'content' => 'We run regular security scans, penetration tests, and compliance audits to maintain app security after deployment.',                                                               'img_one' => '/mob-app-dallas-new/tab/tab6-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab6-img2.webp' ),
			),
		),

		'stack_new_box' => array(
    'title'   => '<span>Battle-Tested Tech Stack for High-Performance</span> Mobile App Development in Austin',
    'para'    => 'We rely on proven technologies that support rapid development and long-term stability. Our mobile app development services in Austin are powered by a modern stack optimized for flexibility, performance, and scalability at every layer.',
    'listing' => array(
        array(
            'tab_title' => 'Frontend Development',
            'data_list' => array(
                array( 'img_src' => '/software-dev-houston/r1.png', 'width' => '117', 'height' => '117', 'title' => '<a href="/technologies/react-native/">React Native</a>' ),
                array( 'img_src' => '/software-dev-houston/r2.png', 'width' => '117', 'height' => '117', 'title' => '<a href="/technologies/flutter/">Flutter</a>' ),
                array( 'img_src' => '/software-dev-houston/s1.png', 'width' => '100', 'height' => '123', 'title' => 'SwiftUI' ),
                array( 'img_src' => '/software-dev-houston/st-7.png', 'width' => '100', 'height' => '123', 'title' => '<a href="/technologies/angular/">Angular</a>' ),
                array( 'img_src' => '/software-dev-houston/r1.png', 'width' => '100', 'height' => '123', 'title' => '<a href="/technologies/reactjs/">ReactJS</a>' ),
                array( 'img_src' => '/software-dev-houston/html.png', 'width' => '100', 'height' => '123', 'title' => '<a href="/technologies/html5/">HTML5</a>' ),
            ),
        ),
       array(
    'tab_title' => 'Backend Development',
    'data_list' => array(
        array( 'img_src' => '/software-dev-houston/s6.png',  'width' => '148', 'height' => '86',  'title' => '<a href="/technologies/nodejs/">Node.js</a>' ),
        array( 'img_src' => '/software-dev-houston/s8.png',  'width' => '148', 'height' => '86',  'title' => '<a href="/technologies/php/">PHP</a>' ),
        array( 'img_src' => '/software-dev-houston/s3.png',  'width' => '148', 'height' => '86',  'title' => '<a href="/technologies/java/">Java</a>' ),
        array( 'img_src' => '/stack/technical-stack/net.png',  'width' => '148', 'height' => '86',  'title' => '<a href="/technologies/net/">.Net</a>' ),
        array( 'img_src' => '/software-dev-houston/s7.png',  'width' => '148', 'height' => '86',  'title' => '<a href="/technologies/python/">Python</a>' ),
        array( 'img_src' => '/software-dev-houston/s15.png', 'width' => '150', 'height' => '79',  'title' => 'Django' ),
        array( 'img_src' => '/software-dev-houston/r14.png', 'width' => '128', 'height' => '75',  'title' => 'Spring Boot' ),
    ),
),
        array(
            'tab_title' => 'Databases',
            'data_list' => array(
                array( 'img_src' => '/software-dev-houston/s9.png',  'width' => '170', 'height' => '86',  'title' => 'MySQL' ),
                array( 'img_src' => '/software-dev-houston/s10.png', 'width' => '104', 'height' => '104', 'title' => 'MongoDB' ),
                array( 'img_src' => '/software-dev-houston/s11.png', 'width' => '91',  'height' => '109', 'title' => 'Firebase' ),
            ),
        ),
        array(
            'tab_title' => 'Cloud Services',
            'data_list' => array(
                array( 'img_src' => '/software-dev-houston/s12.png', 'width' => '144', 'height' => '89',  'title' => 'AWS' ),
                array( 'img_src' => '/software-dev-houston/s13.png', 'width' => '109', 'height' => '86',  'title' => 'Google Cloud' ),
                array( 'img_src' => '/software-dev-houston/s14.png', 'width' => '107', 'height' => '109', 'title' => 'Microsoft Azure' ),
                array( 'img_src' => '/software-dev-houston/s11.png', 'width' => '91',  'height' => '109', 'title' => 'Firebase Cloud Services' ),
            ),
        ),
    ),
),

		'trending_technologies' => array(
			'heading' => '<span>High-Tier Mobile App Development Services in Austin</span> with Next-Gen Tech Integrations',
          'listing' => array(
				array('img_src' => '/mob-app-dallas-new/fr-1.png', 'width' => '92', 'height' => '92', 'title' => 'Big Data'),
				array('img_src' => '/mob-app-dallas-new/fr-2.png', 'width' => '92', 'height' => '92', 'title' => '<a href="/iot-services/">Internet Of Things</a>'),
				array('img_src' => '/mob-app-dallas-new/fr-3.png', 'width' => '92', 'height' => '92', 'title' => 'Image Recognition'),
				array('img_src' => '/mob-app-dallas-new/fr-4.png', 'width' => '92', 'height' => '92', 'title' => '<a href="/augmented-reality-app-development/">Augmented Reality</a>'),
				array('img_src' => '/mob-app-dallas-new/fr-5.png', 'width' => '92', 'height' => '92', 'title' => 'Virtual Reality'),
				array('img_src' => '/mob-app-dallas-new/fr-6.png', 'width' => '92', 'height' => '92', 'title' => '<a href="/ai-development-services/">Artificial Intelligence</a>'),
				array('img_src' => '/mob-app-dallas-new/fr-7.png', 'width' => '92', 'height' => '92', 'title' => 'Data Science'),
				array('img_src' => '/mob-app-dallas-new/fr-8.png', 'width' => '92', 'height' => '92', 'title' => '<a href="/blockchain-app-development/">Block Chain</a>'),
			),
		),

		'streamlined_tabs' => array(
    'heading' => '<span>Our No-Fluff Process for Reliable</span> Mobile App Development in Austin',
    'para'    => 'We apply a focused, engineering-led process to ship scalable apps. With expert-vetted mobile app developers in Austin, each phase is designed to deliver clean architecture, consistent performance, and long-term product stability.',
    'listing' => array(
        array(
            'question' => 'Discovery & Technical Planning',
            'answer'   => 'We define scope, system logic, and integration needs using tools like Miro, Swagger, and Jira to build a strong technical foundation aligned with business priorities.',
        ),
        array(
            'question' => 'UX & UI Design Systems',
            'answer'   => '<a href="/ui-ux-design/">UI/UX designs</a> are created in Figma using reusable components, scalable grids, and platform-specific guidelines to ensure intuitive, consistent interfaces across all supported devices.',
        ),
        array(
            'question' => 'Frontend Development',
            'answer'   => 'We develop interfaces in Flutter or React Native using Redux or Riverpod for managing state, handling user interactions, and optimizing speed across platforms.',
        ),
        array(
            'question' => 'Backend & API Architecture',
            'answer'   => 'Backends are built using Node.js or Django with modular APIs, token-based auth, Redis caching, and GraphQL or REST support for high availability and smooth data flow.',
        ),
        array(
            'question' => 'Quality Assurance & Testing',
            'answer'   => '<a href="/quality-assurance/">Testing</a> covers edge cases, responsiveness, and platform compatibility using Appium, Cypress, and BrowserStack combined with CI pipelines for automated, environment-specific test execution.',
        ),
        array(
            'question' => 'Launch and Monitoring',
            'answer'   => 'We use Fastlane and store consoles for rollout, followed by real-time monitoring with Sentry, Firebase Crashlytics, and custom tracking tools to manage stability and performance <a href="/support-maintenance/">post-launch</a>.',
        ),
    ),
),

		'app_services' => array(
			'head_text'  => 'Why TechnBrains as Your Mobile App Development Company in Austin?',
			'para_text'  => 'We combine engineering precision with product clarity to build apps that perform and evolve. As a leading mobile app development company in Austin, we bring modern architecture, agile methods, and a builder\'s mindset to every engagement.',
			'image_left' => true,
			'listing'    => array(
				array( 'title' => 'Designed to Scale with Confidence', 'content' => 'Our apps are built with modular code, scalable infrastructure, and cloud-first systems that handle growth, demand shifts, and future feature rollouts without disruption.' ),
				array( 'title' => 'Founder-Focused from Day One',       'content' => 'We work with early-stage teams to shape MVPs, prioritize features, and ship fast—helping founders get to market with clarity and traction.' ),
				array( 'title' => 'Speed Without the Shortcuts',        'content' => 'We use CI/CD pipelines, test-driven workflows, and reusable components to speed up delivery without compromising on code quality or performance.' ),
				array( 'title' => 'Built with Compliance in Mind',      'content' => 'Our process supports HIPAA, CCPA, and GDPR from the start, covering everything from data handling to user access and audit readiness.' ),
				array( 'title' => 'Team Models That Fit You',           'content' => 'Whether you need full-cycle delivery or a few Austin app developers to extend your team, we adapt to your workflow and goals.' ),
				array( 'title' => 'Structured for Long-Term Growth',    'content' => 'We go beyond launch, building apps with load-tested backends, monitoring tools, and architecture that grows with your product and users.' ),
			),
		),

		'dev_cost' => array(
			'title'   => 'How Much Does It Cost to Build a Mobile App in Austin?',
			'para'    => '<a href="/blog/app-development-cost/" target="_blank">Mobile app development costs</a> vary based on features, complexity, and stack. Our breakdown helps you estimate and plan smarter with transparent mobile app development services tailored to your needs.',
			'listing' => array(
				array(
					'title'     => 'Basic Apps',
					'img_src'   => '/mob-app-dallas-new/basic.webp',
					'img_width' => '176', 'img_height' => '246',
					'img_alt'   => 'mobile app development company in austin',
					'content'   => array(
						array( 'list' => 'Simple functionality with limited interaction' ),
						array( 'list' => 'Clean UI and basic navigation' ),
						array( 'list' => 'Estimated cost: <span>$15,000 – $30,000</span>' ),
					),
				),
				array(
					'title'     => 'Mid-Level Apps',
					'img_src'   => '/mob-app-dallas-new/intermediate.webp',
					'img_width' => '249', 'img_height' => '243',
					'img_alt'   => 'mobile app development austin',
					'content'   => array(
						array( 'list' => 'Custom design, user accounts, backend integration' ),
						array( 'list' => 'Real-time sync, dashboards, and notifications' ),
						array( 'list' => 'Estimated cost: <span>$30,000 – $70,000</span>' ),
					),
				),
				array(
					'title'     => 'Complex Apps',
					'img_src'   => '/mob-app-dallas-new/complex.webp',
					'img_width' => '192', 'img_height' => '235',
					'img_alt'   => 'app development austin',
					'content'   => array(
						array( 'list' => 'Advanced features like payments, chat, or geolocation' ),
						array( 'list' => 'Robust APIs, admin panels, and cloud architecture' ),
						array( 'list' => 'Estimated cost: <span>$70,000 – $150,000+</span>' ),
					),
				),
			),
		),

		'awards_recognition' => array(
    'heading' => 'The <span>Awards &amp; Recognitions</span> We\'ve Earned as a Leading Mobile App Development Company in Austin',
    'para'    => 'We\'ve been recognized by Clutch, GoodFirms, and TopDevelopers for consistently delivering high-impact apps. Backed by experienced mobile app developers in Austin, our work reflects strong engineering, clear product direction, and measurable business outcomes.',
    'listing' => array(
        array( 'img_src' => '/home-page/award/good.png',       'width' => '134', 'height' => '134', 'title' => 'Top Web Development Company',       'para' => 'TechnBrains is listed as Top Web Development Company By Goodfirms' ),
        array( 'img_src' => '/home-page/award/top-mobile.png', 'width' => '132', 'height' => '113', 'title' => 'Top Mobile App Development Company', 'para' => 'TechnBrains is listed as Top Android App Development Company By Rightfirms' ),
        array( 'img_src' => '/home-page/award/expertise.png',  'width' => '129', 'height' => '100', 'title' => 'Best Software Development Company',  'para' => 'Technbrains is listed as Best Software Development Company By Expertise' ),
        array( 'img_src' => '/home-page/award/trust.png',      'width' => '159', 'height' => '73',  'title' => 'Top Mobile App Development Company', 'para' => 'TechnBrains is listed as Top Mobile App Development Company By Trustpilot' ),
        array( 'img_src' => '/home-page/award/clutch.png',     'width' => '122', 'height' => '34',  'title' => 'Top Mobile App Development Company', 'para' => 'TechnBrains is listed as Top Mobile App Development Company By Clutch' ),
        array( 'img_src' => '/home-page/award/good.png',       'width' => '134', 'height' => '134', 'title' => 'Top Web Development Company',       'para' => 'TechnBrains is listed as Top Web Development Company By Goodfirms' ),
        array( 'img_src' => '/home-page/award/top-mobile.png', 'width' => '132', 'height' => '113', 'title' => 'Top Mobile App Development Company', 'para' => 'TechnBrains is listed as Top Android App Development Company By Rightfirms' ),
        array( 'img_src' => '/home-page/award/expertise.png',  'width' => '129', 'height' => '100', 'title' => 'Best Software Development Company',  'para' => 'Technbrains is listed as Best Software Development Company By Expertise' ),
        array( 'img_src' => '/home-page/award/trust.png',      'width' => '159', 'height' => '73',  'title' => 'Top Mobile App Development Company', 'para' => 'TechnBrains is listed as Top Mobile App Development Company By Trustpilot' ),
        array( 'img_src' => '/home-page/award/clutch.png',     'width' => '122', 'height' => '34',  'title' => 'Top Mobile App Development Company', 'para' => 'TechnBrains is listed as Top Mobile App Development Company By Clutch' ),
        array( 'img_src' => '/home-page/award/good.png',       'width' => '134', 'height' => '134', 'title' => 'Top Web Development Company',       'para' => 'TechnBrains is listed as Top Web Development Company By Goodfirms' ),
        array( 'img_src' => '/home-page/award/top-mobile.png', 'width' => '132', 'height' => '113', 'title' => 'Top Mobile App Development Company', 'para' => 'TechnBrains is listed as Top Android App Development Company By Rightfirms' ),
        array( 'img_src' => '/home-page/award/expertise.png',  'width' => '129', 'height' => '100', 'title' => 'Best Software Development Company',  'para' => 'Technbrains is listed as Best Software Development Company By Expertise' ),
        array( 'img_src' => '/home-page/award/trust.png',      'width' => '159', 'height' => '73',  'title' => 'Top Mobile App Development Company', 'para' => 'TechnBrains is listed as Top Mobile App Development Company By Trustpilot' ),
        array( 'img_src' => '/home-page/award/clutch.png',     'width' => '122', 'height' => '34',  'title' => 'Top Mobile App Development Company', 'para' => 'TechnBrains is listed as Top Mobile App Development Company By Clutch' ),
    ),
),

		'faqs' => array(
    'heading'    => '<span>Frequently Asked</span> Questions',
    'head_text'  => '',
    'is_houston' => true,
    'listing'    => array(
        array( 'faqhead' => 'How do I choose the right mobile app development company in Austin for my startup?', 'faqbody' => 'Look for a team that understands both tech and product strategy. A reliable mobile app development company in Austin should offer scalable solutions, clean architecture, and support beyond launch.' ),
        array( 'faqhead' => 'What is the typical timeline for mobile app development in Austin?',                  'faqbody' => 'Timelines vary by scope. A basic MVP might take 8–10 weeks, while more complex builds with backend systems can take 4–6 months.' ),
        array( 'faqhead' => 'Do mobile app developers in Austin work with early-stage companies?',                 'faqbody' => 'Yes. Many mobile app developers in Austin specialize in helping startups validate ideas, build MVPs, and get to market fast with the right tech stack.' ),
        array( 'faqhead' => 'How much does it cost to develop a mobile app in Austin?',                           'faqbody' => '<a href="/blog/how-much-does-mobile-app-development-cost-in-austin/" target="_blank">Costs</a> depend on features, complexity, and platform needs. Basic apps start around $15,000, while advanced, full-scale platforms can exceed $100,000.' ),
        array( 'faqhead' => 'Can I hire a team just for frontend or backend development?',                         'faqbody' => 'Absolutely. Many companies offer modular support. Whether you need a frontend interface or backend infrastructure, the team can plug into your workflow as needed.' ),
        array( 'faqhead' => 'What industries do Austin app developers typically serve?',                           'faqbody' => 'Austin app developers often work across sectors like healthcare, fintech, education, logistics, and ecommerce, each with specific compliance, architecture, and integration requirements.' ),
        array( 'faqhead' => 'Do you offer custom app development or use templates?',                               'faqbody' => 'We provide custom development tailored to each project. Templates may be used for rapid prototyping, but final builds are designed to match business goals and user expectations.' ),
        array( 'faqhead' => 'What platforms do you support—iOS, Android, or both?',                               'faqbody' => 'We support both. Depending on your goals, we can build native iOS or Android apps, or cross-platform apps using React Native or Flutter.' ),
        array( 'faqhead' => 'Will I own the code and intellectual property after launch?',                         'faqbody' => 'Yes. You\'ll receive full ownership of the codebase and IP once development is complete and all contractual milestones have been fulfilled.' ),
        array( 'faqhead' => 'Can you integrate the mobile app with our existing web platform?',                    'faqbody' => 'Yes. If you\'re already working with a web development company in Austin or have an internal system, we can build APIs or integrations that connect your mobile app seamlessly.' ),
    ),
),

		'location_cta' => array(
			'heading'      => 'Book Your Growth Call with the <span>Best Mobile App Developers</span> in Austin!',
			'para'         => 'Get expert advice on architecture, timelines, and tech stack. Our team helps you scope, prioritize, and build mobile apps that support growth without wasting time or resources.',
			'btn_text'     => 'Book Your Free Consultation',
			'location_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3443.4965664850724!2d-97.80686902453101!3d30.336834504658352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x865b35f64e63eced%3A0xa0989a7ce20196aa!2sTechnBrains%20Austin%20-%20Mobile%20App%20Development%20Company!5e0!3m2!1sen!2s!4v1751444042407!5m2!1sen!2s%22',
		),

	),
);
