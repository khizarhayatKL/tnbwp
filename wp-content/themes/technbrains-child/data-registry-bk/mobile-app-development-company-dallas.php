<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array( '@type' => 'Question', 'name' => 'How long does it take to develop a mobile app in Dallas?',            'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Timelines vary by app complexity. A basic MVP may take 8–10 weeks, while advanced apps with integrations can take 3–6 months from discovery to deployment.' ) ),
				array( '@type' => 'Question', 'name' => 'What is the average mobile app development cost in Dallas?',           'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Mobile app development cost in Dallas typically ranges from $15,000 to $150,000 depending on features, platforms, design complexity, and backend infrastructure requirements.' ) ),
				array( '@type' => 'Question', 'name' => 'Do you sign NDAs for mobile app projects?',                            'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, we sign non-disclosure agreements to protect your app idea, business data, and technical details before starting any conversation or development work.' ) ),
				array( '@type' => 'Question', 'name' => 'What platforms do you develop mobile apps for?',                       'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'We develop mobile apps for iOS, Android, and cross-platform frameworks like Flutter and React Native based on your project goals and user base.' ) ),
				array( '@type' => 'Question', 'name' => 'Can I hire mobile app developers in Dallas on a flexible model?',      'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, we offer flexible engagement models including full-project builds, dedicated developers, and team augmentation depending on your timeline, budget, and scope.' ) ),
				array( '@type' => 'Question', 'name' => 'What industries do you serve with mobile app development in Dallas?',  'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'We build apps for healthcare, real estate, education, logistics, retail, fintech, and other industries with unique compliance and performance needs.' ) ),
				array( '@type' => 'Question', 'name' => 'Will I have ownership of the mobile app source code?',                 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, once the project is complete and payments are settled, all rights and source code are handed over to you.' ) ),
				array( '@type' => 'Question', 'name' => 'How do you handle post-launch support and updates?',                   'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'We provide ongoing support plans that include bug fixes, performance monitoring, feature updates, and version upgrades based on your chosen support tier.' ) ),
			),
		),
		array(
			'@context'        => 'https://schema.org/',
			'@type'           => 'Product',
			'name'            => 'Top Mobile App Development Company in Dallas, TX | TechnBrains',
			'description'     => 'TechnBrains is a top mobile app development company in Dallas, TX - Offering top-notch custom iOS and Android apps. Hire The Best App developers in Dallas.',
			'brand'           => array( '@type' => 'Brand', 'name' => 'TechnBrains' ),
			'aggregateRating' => array( '@type' => 'AggregateRating', 'ratingValue' => '4.7', 'bestRating' => '5', 'worstRating' => '1', 'reviewCount' => '12' ),
		),
		array(
			'@context'  => 'https://schema.org',
			'@type'     => 'LocalBusiness',
			'@id'       => 'https://www.technbrains.com/locations/mobile-app-development-company-dallas/#localbusiness',
			'name'      => 'TechnBrains App Development Dallas',
			'url'       => 'https://www.technbrains.com/locations/mobile-app-development-company-dallas/',
			'telephone' => '+1 (833) 888-6032',
			'priceRange'=> '$25000 - $10,000,00',
			'address'   => array( '@type' => 'PostalAddress', 'streetAddress' => '15305 Dallas Pkwy 12th Floor, suite # 1257, Addison', 'addressLocality' => 'Dallas', 'addressRegion' => 'TX', 'postalCode' => '75001', 'addressCountry' => 'US' ),
			'geo'       => array( '@type' => 'GeoCoordinates', 'latitude' => '32.9588726', 'longitude' => '-96.823167' ),
			'image'     => array( 'https://www.technbrains.com/image/brain.svg' ),
			'sameAs'    => array( 'https://www.facebook.com/technbrains/', 'https://twitter.com/technbrains', 'https://www.instagram.com/technbrains/', 'https://www.youtube.com/@TechnBrainsofficial', 'https://www.linkedin.com/company/technbrains', 'https://www.pinterest.com/technbrains/' ),
			'openingHoursSpecification' => array( array( '@type' => 'OpeningHoursSpecification', 'opens' => '08:00', 'closes' => '20:00', 'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ) ) ),
		),
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebPage',
			'@id'         => 'https://www.technbrains.com/locations/mobile-app-development-company-dallas',
			'url'         => 'https://www.technbrains.com/locations/mobile-app-development-company-dallas',
			'name'        => 'Mobile App Development Company in Dallas | TechnBrains',
			'description' => 'TechnBrains provides mobile app development services in Dallas including iOS, Android, Flutter, and enterprise app solutions.',
			'publisher'   => array( '@type' => 'Organization', 'name' => 'TechnBrains', 'logo' => array( '@type' => 'ImageObject', 'url' => 'https://www.technbrains.com/logo.png' ) ),
		),
	),

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
    'heading'         => '<span>Mobile App Development</span> Company in Dallas',
    'paragraph'       => 'TechnBrains is a leading mobile app development company in Dallas that helps startups, SMBs, and enterprises with UX-driven applications to validate founder ideas and spark investor interest. Our expert-vetted mobile app developers in Dallas utilize the latest technologies and agile development practices to reduce turnaround time and deliver scalable apps for long-term business value.',
    'btn_title'       => 'Talk to App Experts',
    'btn_anchor_text' => 'See Portfolio',
    'btn_anchor_url'  => '/case-studies',
),

		'stack_services' => array(
    'heading' => '<span>Full-Scale Mobile App Development Services in Dallas</span> for Startups, Scale-Ups, &amp; Enterprises',
    'listing' => array(
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-1.webp',
            'tab_title' => 'Android App Development',
            'tab_alt'   => 'mobile app development dallas',
            'content'   => 'We build robust Android applications using Kotlin, Android Studio, and modern Jetpack components. With adaptive UI design and clean code architecture, our Android app developers in Dallas are tailored for scalability, speed, and device compatibility across the Android ecosystem.',
        ),
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-2.webp',
            'tab_title' => 'IOS App Development',
            'tab_alt'   => 'mobile app development company in dallas',
            'content'   => 'Our iOS app developers in Dallas build stable, high-performance applications using Swift, Xcode, and Apple\'s latest SDKs. Support for Core Data, push notifications, and seamless iCloud integration is what makes us a dependable iOS app development company for Dallas-based startups and established brands.',
        ),
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-3.webp',
            'tab_title' => 'React Native App Development',
            'tab_alt'   => 'app development dallas',
            'content'   => 'TechnBrains offers React Native app development services that combine reusable TypeScript codebases with native module support. We maintain visual and functional parity across platforms, delivering fast-loading, app-store-ready products that meet the expectations of mobile-first users in Dallas through our dedicated React Native Developers.',
        ),
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-4.webp',
            'tab_title' => 'Flutter App Development',
            'tab_alt'   => 'mobile app development company dallas',
            'content'   => 'Our Flutter app development services leverage Dart, widget-driven architecture, and reactive programming to build high-performance apps. From MVPs to production-ready products, we help businesses in Dallas launch on both iOS and Android with pixel-perfect UI and native-speed execution from a single codebase, supported by expert Flutter App Developers.',
        ),
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-5.webp',
            'tab_title' => 'Web App Development',
            'tab_alt'   => 'dallas mobile app development',
            'content'   => 'As a top-grade web app development company, we create fast, secure, and scalable web applications using React, Angular, and Node.js. We support modular code, RESTful APIs, and CI/CD pipelines to deliver browser-based solutions that handle real-time data, complex workflows, and enterprise-grade performance needs.',
        ),
        array(
            'img_src'   => '/mob-app-dallas-new/mockup/mock-6.webp',
            'tab_title' => 'Enterprise App Development',
            'tab_alt'   => 'app development company in dallas',
            'content'   => 'We build enterprise apps with scalable architecture, secure APIs, and CI/CD workflows. Our platforms support SSO, audit logs, ERP and CRM integration, and connect with internal systems across departments and high-volume user environments.',
        ),
    ),
),

		'industry_specific' => array(
			'heading' => 'Serving Diverse Markets as an Industry-Focused Mobile App Development Company in Dallas',
			'content' => 'We approach every project with a clear understanding of industry demands—building products that align with regulations, user behavior, and the operational realities of each market. Here are the solutions we offer:',
			'listing' => array(
				array( 'img_src' => '/software-dev-houston/tech-1.png', 'width' => '400', 'height' => '279', 'title' => 'Healthcare',       'link' => '/industries/healthcare-app-development',              'content' => 'Building HIPAA-compliant healthcare apps that streamline workflows, enhance patient engagement, and support remote care delivery.' ),
				array( 'img_src' => '/software-dev-houston/tech-2.png', 'width' => '400', 'height' => '279', 'title' => 'Fintech',           'link' => '/industries/fintech-software-development',             'content' => 'Engineering fintech solutions for secure transactions, digital wallets, lending platforms, and real-time financial data insights.' ),
				array( 'img_src' => '/software-dev-houston/tech-3.png', 'width' => '400', 'height' => '279', 'title' => 'SaaS',              'link' => '/industries/saas-application-development',             'content' => 'Develop excellent SaaS applications based on cloud that can maximize productivity, automate workflows, and offer multi-platform access for business, no matter what the size.' ),
				array( 'img_src' => '/software-dev-houston/tech-4.png', 'width' => '400', 'height' => '279', 'title' => 'Travel',            'link' => '#footerFrom',                                          'content' => 'Creating travel apps for itinerary planning, real-time updates, booking management, and personalized travel recommendations.' ),
				array( 'img_src' => '/software-dev-houston/tech-5.png', 'width' => '400', 'height' => '279', 'title' => 'Logistics',         'link' => '/industries/logistics-software-development',           'content' => 'Designing logistics apps for route optimization, shipment tracking, fleet management, and warehouse-to-doorstep transparency.' ),
				array( 'img_src' => '/software-dev-houston/tech-6.png', 'width' => '400', 'height' => '279', 'title' => 'Real Estate',       'link' => '/industries/real-estate-app-development',              'content' => 'Creating real estate apps that simplify property search, agent coordination, lead tracking, and virtual tour integration.' ),
				array( 'img_src' => '/software-dev-houston/tech-7.png', 'width' => '400', 'height' => '279', 'title' => 'On-Demand',         'link' => '/industries/on-demand-app-development',                'content' => 'Building scalable on-demand apps for services like ride-hailing, food delivery, home services, and last-mile operations.' ),
				array( 'img_src' => '/software-dev-houston/tech-8.png', 'width' => '400', 'height' => '279', 'title' => 'EdTech',            'link' => '/industries/education-app-development',                'content' => 'Developing EdTech apps with interactive content, live classes, and performance tracking for remote and hybrid learning models.' ),
				array( 'img_src' => '/software-dev-houston/tech-9.png', 'width' => '400', 'height' => '279', 'title' => 'Energy',            'link' => '/industries/energy-management-software-development',   'content' => 'Enhance energy management with IoT-enabled sustainability tracking, smart grid solutions, and predictive analytics for improved resource utilization.' ),
				array( 'img_src' => '/mob-app-dallas-new/retail.webp',  'width' => '400', 'height' => '279', 'title' => 'Retail & Ecommerce', 'link' => '/industries/retail-app-development',                  'content' => 'Delivering ecommerce apps with smooth checkout, real-time inventory sync, loyalty systems, and customer engagement features.' ),
			),
		),

		'houston_cta' => array(
			'subheading' => 'Ready To Innovate & Dominate?',
			'heading'    => 'Empowering Entrepreneurs & SMEs with Premium-Grade Mobile App Development Services in Dallas.',
			'img_src'    => '/software-dev-houston/houstoncta-side.webp',
			'img_width'  => '496',
			'img_height' => '427',
			'img_alt'    => 'app developers in dallas',
			'btn_text'   => 'Book Your Legacy Call!',
			'anchor'     => false,
		),

		'app_portfolio' => array(
    'heading_html' => '<span>The Mobile App Development Company in Dallas Behind Startup</span> &amp; Enterprise-Scale Success Stories',
    'content'      => 'We work with startups chasing first traction and Fortune 500s refining digital strategy. Explore our project portfolio as a leading mobile app development company in Dallas, where we bring clarity, speed, and execution to every stage of the product lifecycle.',
),

		'how_we_deliver' => array(
			'title'   => 'Compliance-Focused Mobile App Development Company in Dallas for Audit-Ready Applications',
			'para'    => 'As a leading mobile app development company in Dallas, we put compliance at the center of every build. With HIPAA, GDPR, and enterprise-grade policies baked into the process, your product stays secure, audit-ready, and regulation-aligned.',
			'listing' => array(
				array( 'img_src' => '/mob-app-dallas-new/t1.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'Background-Checked Teams Only',         'heading_html' => '<span>Background-Checked</span> Teams Only',           'content' => 'All developers and QA engineers on your project are background-checked and onboarded under strict access, compliance, and IP protection protocols.',           'img_one' => '/mob-app-dallas-new/tab/tab1-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab1-img2.webp' ),
				array( 'img_src' => '/mob-app-dallas-new/t2.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'IP and IT Security Aligned',              'heading_html' => '<span>IP and IT</span> Security Aligned',              'content' => 'We follow secure development workflows, version control restrictions, and access isolation to protect your intellectual property at every project stage.',          'img_one' => '/mob-app-dallas-new/tab/tab2-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab2-img2.webp' ),
				array( 'img_src' => '/mob-app-dallas-new/t3.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'HIPAA and GDPR Compliance',               'heading_html' => '<span>HIPAA and GDPR</span> Compliance',               'content' => 'Our process supports healthcare and global data privacy laws through encryption, role-based access, data retention policies, and consent flows.',               'img_one' => '/mob-app-dallas-new/tab/tab3-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab3-img2.webp' ),
				array( 'img_src' => '/mob-app-dallas-new/t4.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'Audit-Friendly Codebase',                 'heading_html' => '<span>Audit-Friendly</span> Codebase',                 'content' => 'We write clean, traceable code with logs, documentation, and audit trails built in to simplify future compliance reviews or legal checks.',                       'img_one' => '/mob-app-dallas-new/tab/tab4-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab4-img2.webp' ),
				array( 'img_src' => '/mob-app-dallas-new/t5.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'Infrastructure and Hosting Compliance',   'heading_html' => '<span>Infrastructure and Hosting</span> Compliance',   'content' => 'We deploy apps on compliant cloud environments with data localization, encryption at rest, and routine security patching based on your needs.',                  'img_one' => '/mob-app-dallas-new/tab/tab5-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab5-img2.webp' ),
				array( 'img_src' => '/mob-app-dallas-new/t6.png', 'img_width' => '28', 'img_height' => '28', 'title' => 'Custom Agreements and Controls',          'heading_html' => '<span>Custom Agreements</span> and Controls',          'content' => 'From NDAs to DPAs, we offer custom legal agreements and enforce granular user-level access controls across staging and production environments.',               'img_one' => '/mob-app-dallas-new/tab/tab6-img1.webp', 'img_two' => '/mob-app-dallas-new/tab/tab6-img2.webp' ),
			),
		),

		'stack_new_box' => array(
    'title'   => '<span>Tech Stack for High-Performance</span> Mobile App Development in Dallas',
    'para'    => 'We use proven, modern technologies to build secure, scalable mobile apps optimized for performance and longevity.',
    'listing' => array(
        array(
            'tab_title' => 'Frontend Development',
            'data_list' => array(
                array( 'img_src' => '/software-dev-houston/r1.png', 'width' => '117', 'height' => '117', 'title' => 'React Native' ),
                array( 'img_src' => '/software-dev-houston/r2.png', 'width' => '117', 'height' => '117', 'title' => 'Flutter' ),
                array( 'img_src' => '/software-dev-houston/s1.png', 'width' => '100', 'height' => '123', 'title' => 'SwiftUI' ),
                array( 'img_src' => '/software-dev-houston/s1.png', 'width' => '100', 'height' => '123', 'title' => 'Angular' ),
                array( 'img_src' => '/software-dev-houston/s1.png', 'width' => '100', 'height' => '123', 'title' => 'ReactJS' ),
                array( 'img_src' => '/software-dev-houston/s1.png', 'width' => '100', 'height' => '123', 'title' => 'HTML5' ),
            ),
        ),
        array(
            'tab_title' => 'Backend Development',
            'data_list' => array(
                array( 'img_src' => '/software-dev-houston/s6.png',  'width' => '117', 'height' => '117', 'title' => 'Node.js' ),
                array( 'img_src' => '/software-dev-houston/s8.png',  'width' => '150', 'height' => '80',  'title' => 'PHP' ),
                array( 'img_src' => '/software-dev-houston/s7.png',  'width' => '104', 'height' => '104', 'title' => 'Java' ),
                array( 'img_src' => '/software-dev-houston/r2.png',  'width' => '117', 'height' => '117', 'title' => '.Net' ),
                array( 'img_src' => '/software-dev-houston/s7.png',  'width' => '104', 'height' => '104', 'title' => 'Python' ),
                array( 'img_src' => '/software-dev-houston/r8.png',  'width' => '117', 'height' => '117', 'title' => 'Django' ),
                array( 'img_src' => '/software-dev-houston/r14.png', 'width' => '100', 'height' => '100', 'title' => 'Spring Boot' ),
            ),
        ),
        array(
            'tab_title' => 'Backend',
            'data_list' => array(
                array( 'img_src' => '/software-dev-houston/s6.png', 'width' => '148', 'height' => '86',  'title' => 'Node.js' ),
                array( 'img_src' => '/software-dev-houston/s7.png', 'width' => '104', 'height' => '104', 'title' => 'Python' ),
                array( 'img_src' => '/software-dev-houston/s8.png', 'width' => '150', 'height' => '80',  'title' => 'PHP' ),
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
			'heading' => '<span>Next-Gen Tech Integrations</span> to Future-Proof Your Mobile App',
			'listing' => array(
				array( 'img_src' => '/mob-app-dallas-new/fr-1.png', 'width' => '92', 'height' => '92', 'title' => 'Big Data' ),
				array( 'img_src' => '/mob-app-dallas-new/fr-2.png', 'width' => '92', 'height' => '92', 'title' => 'Internet Of Things' ),
				array( 'img_src' => '/mob-app-dallas-new/fr-3.png', 'width' => '92', 'height' => '92', 'title' => 'Image Recognition' ),
				array( 'img_src' => '/mob-app-dallas-new/fr-4.png', 'width' => '92', 'height' => '92', 'title' => 'Augmented Reality' ),
				array( 'img_src' => '/mob-app-dallas-new/fr-5.png', 'width' => '92', 'height' => '92', 'title' => 'Virtual Reality' ),
				array( 'img_src' => '/mob-app-dallas-new/fr-6.png', 'width' => '92', 'height' => '92', 'title' => 'Artificial Intelligence' ),
				array( 'img_src' => '/mob-app-dallas-new/fr-7.png', 'width' => '92', 'height' => '92', 'title' => 'Data Science' ),
				array( 'img_src' => '/mob-app-dallas-new/fr-8.png', 'width' => '92', 'height' => '92', 'title' => 'Blockchain' ),
			),
		),

		'streamlined_tabs' => array(
    'heading' => '<span>Our Fail-Proof Mobile App</span> Development Process',
    'para'    => 'As one of the most leading mobile app development companies in Dallas, we follow a structured engineering workflow designed to reduce failure points, streamline delivery, and maintain performance, security, and scalability throughout the product lifecycle.',
    'listing' => array(
        array(
            'question' => 'Requirement Mapping & Feasibility Study',
            'answer'   => 'We validate features against platform constraints and business logic. Tools like Jira, Whimsical, and Swagger help define workflows, while technical feasibility is assessed through API mocks and early environment setup.',
        ),
        array(
            'question' => 'Architecture Blueprint & Tech Stack Finalization',
            'answer'   => 'Our engineers define service boundaries, database models, and deployment logic. Choices include Node.js, PostgreSQL, and Kubernetes. Diagrams are created in Draw.io and shared for alignment before coding begins.',
        ),
        array(
            'question' => 'Interface Design & Interaction Flow',
            'answer'   => 'Design teams build screen flows using Figma Design Services with atomic components and accessibility layers. Usability tests run on Maze or Playbook, while design specs are handed off using Zeplin or Figma Dev Mode.',
        ),
        array(
            'question' => 'Code Implementation & Environment Management',
            'answer'   => 'We write modular, testable code using Git workflows and containerized environments. Docker and Docker Compose manage consistency across dev and staging, while API contracts are validated using Postman collections.',
        ),
        array(
            'question' => 'Testing Automation & Security Checks',
            'answer'   => 'Unit and integration tests are written in Jest, Mocha, or XCTest. Static code analysis is done with SonarQube. OWASP guidelines are followed, with automated SAST scans and encryption validation.',
        ),
        array(
            'question' => 'Deployment Pipeline & Observability Setup',
            'answer'   => 'CI/CD is managed through GitHub Actions or GitLab CI. Monitoring tools like Sentry, Firebase, and Datadog are integrated. Rollbacks and canary deployments ensure stability during phased production releases.',
        ),
    ),
),

		'app_services' => array(
			'head_text'  => 'Why TechnBrains As Your Mobile App Development Company in Dallas?',
			'para_text'  => 'We combine deep technical expertise with product thinking to help businesses build mobile apps that are stable, secure, and scalable. As a mobile app development company in Dallas, we focus on clean code, fast delivery, and long-term maintainability—backed by proven frameworks, agile workflows, and compliance-first practices.',
			'image_left' => true,
			'listing'    => array(
				array( 'title' => 'Built for Stability and Scale',          'content' => 'Our apps are engineered with clean architecture, modular code, and scalable infrastructure that support long-term growth, seamless updates, and stable performance across devices and platforms.' ),
				array( 'title' => 'Helping Founders Launch with Confidence', 'content' => 'We work closely with startups to turn validated ideas into functional products with market-fit features, predictable timelines, and smooth rollout strategies.' ),
				array( 'title' => 'Fast Turnaround Without Technical Trade-Offs', 'content' => 'Our agile workflows and reusable components help reduce delivery timelines while maintaining clean, testable code that holds up in real-world environments.' ),
				array( 'title' => 'Compliance-Ready From Day One',           'content' => 'We design apps to meet HIPAA, GDPR, and CCPA requirements from the start, making sure your product is secure, audit-friendly, and regulation-aligned.' ),
				array( 'title' => 'Flexible Collaboration Models',           'content' => 'Whether you need full-cycle development or extra hands on an existing project, our team adapts to your budget, stack, and product stage.' ),
				array( 'title' => 'Ready to Scale With You',                 'content' => 'From early traction to high user loads, we build mobile apps that scale smoothly with backend support, performance monitoring, and cloud-native infrastructure.' ),
			),
		),

		'dev_cost' => array(
			'title'   => 'How Much Does It Cost to Build a Mobile App in Dallas?',
			'para'    => 'Mobile app development cost depends on app complexity, features, tech stack, and timelines. We break down typical budgets to help you plan your build with clarity and precision.',
			'listing' => array(
				array(
					'title'    => 'Basic Apps',
					'img_src'  => '/mob-app-dallas-new/basic.webp',
					'img_width'=> '176',
					'img_height'=> '246',
					'img_alt'  => 'App Development Services in Dallas',
					'content'  => array(
						array( 'list' => 'Limited features with core functionality only' ),
						array( 'list' => 'Static UI with basic navigation' ),
						array( 'list' => 'Approximate mobile app development cost: <span>$15,000 – $30,000</span>' ),
					),
				),
				array(
					'title'    => 'Mid-Level Apps',
					'img_src'  => '/mob-app-dallas-new/intermediate.webp',
					'img_width'=> '249',
					'img_height'=> '243',
					'img_alt'  => 'dallas mobile app development company',
					'content'  => array(
						array( 'list' => 'Custom UI, integrations, and user accounts' ),
						array( 'list' => 'Real-time data sync and backend dashboards' ),
						array( 'list' => 'Approximate mobile app development cost: <span>$30,000 – $70,000</span>' ),
					),
				),
				array(
					'title'    => 'Complex Apps',
					'img_src'  => '/mob-app-dallas-new/complex.webp',
					'img_width'=> '192',
					'img_height'=> '235',
					'img_alt'  => 'mobile app development in dallas',
					'content'  => array(
						array( 'list' => 'Advanced features like chat, payments, or geolocation' ),
						array( 'list' => 'Scalable backend, APIs, and multi-role access' ),
						array( 'list' => 'Approximate mobile app development cost: <span>$70,000 – $150,000+</span>' ),
					),
				),
			),
		),

		'awards_recognition' => array(
    'heading' => 'The <span>Awards &amp; Recognitions</span> We\'ve Earned as a Leading Mobile App Development Company in Dallas',
    'para'    => 'We\'ve been recognized by Clutch, GoodFirms, and TopDevelopers for consistently delivering high-quality mobile apps with speed, stability, and scalability. As a leading mobile app development company in Dallas, our work speaks through results—earning trust from startups, scale-ups, and enterprise teams that expect more than just functional code.',
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
    'heading'    => '<span>Everything You</span><br>Need to Know',
    'head_text'  => 'Things you might want to know',
    'is_houston' => true,
    'listing'    => array(
        array( 'faqhead' => 'How long does it take to develop a mobile app in Dallas?',           'faqbody' => 'Timelines vary by app complexity. A basic MVP may take 8–10 weeks, while advanced apps with integrations can take 3–6 months from discovery to deployment.' ),
        array( 'faqhead' => 'What is the average mobile app development cost in Dallas?',          'faqbody' => 'Mobile app development cost in Dallas typically ranges from $15,000 to $150,000 depending on features, platforms, design complexity, and backend infrastructure requirements.' ),
        array( 'faqhead' => 'Do you sign NDAs for mobile app projects?',                           'faqbody' => 'Yes, we sign non-disclosure agreements to protect your app idea, business data, and technical details before starting any conversation or development work.' ),
        array( 'faqhead' => 'What platforms do you develop mobile apps for?',                      'faqbody' => 'We develop mobile apps for iOS, Android, and cross-platform frameworks like Flutter and React Native based on your project goals and user base.' ),
        array( 'faqhead' => 'Can I hire mobile app developers in Dallas on a flexible model?',     'faqbody' => 'Yes, we offer flexible engagement models including full-project builds, dedicated developers, and team augmentation depending on your timeline, budget, and scope.' ),
        array( 'faqhead' => 'What industries do you serve with mobile app development in Dallas?', 'faqbody' => 'We build apps for healthcare, real estate, education, logistics, retail, fintech, and other industries with unique compliance and performance needs.' ),
        array( 'faqhead' => 'Will I have ownership of the mobile app source code?',                'faqbody' => 'Yes, once the project is complete and payments are settled, all rights and source code are handed over to you.' ),
        array( 'faqhead' => 'How do you handle post-launch support and updates?',                  'faqbody' => 'Yes. Most mobile app development companies in Dallas provide ongoing support after launch, including bug fixes, performance tracking, updates, and user analytics to keep your app running smoothly and growing over time.' ),
    ),
),

		'location_cta' => array(
			'heading'      => '<span>Book Your Growth Call</span> with the Best Mobile App Developers in Dallas!',
			'para'         => 'Get expert guidance on development scope, timelines, and tech choices. Our team will help you plan smarter, avoid delays, and build mobile apps that align with your goals and technical requirements.',
			'btn_text'     => 'Book Your Free Consultation!',
			'location_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.038388539652!2d-96.8255975238575!3d32.958848474670525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c2183b4dd558d%3A0xfaece53626b212f0!2sTechnBrains%20Dallas%20-%20Mobile%20App%20Development%20Company!5e1!3m2!1sen!2s!4v1745321450169!5m2!1sen!2s',
		),

	),
);
