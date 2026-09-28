<?php
defined('ABSPATH') || exit;
return array(
	'schemas' => array(
		array(
			'@context' => 'https://schema.org',
			'@type' => 'WebSite',
			'name' => 'TechnBrains',
			'url' => 'https://www.technbrains.com',
			'potentialAction' => array('@type' => 'SearchAction', 'target' => 'https://www.technbrains.com/?s={search_term_string}', 'query-input' => 'required name=search_term_string'),
		),
		array(
			'@context' => 'https://schema.org',
			'@type' => 'Organization',
			'name' => 'TechnBrains',
			'url' => 'https://www.technbrains.com',
			'logo' => 'https://www.technbrains.com/wp-content/themes/technbrains-child/assets/images/logo-icon-hires.png',
			'contactPoint' => array('@type' => 'ContactPoint', 'telephone' => '+18338886032', 'email' => 'Contact@technbrains.com', 'contactType' => 'customer service'),
			'address' => array('@type' => 'PostalAddress', 'streetAddress' => '15305 Dallas Pkwy 12th Floor Suite 1257', 'addressLocality' => 'Addison', 'addressRegion' => 'TX', 'postalCode' => '75001', 'addressCountry' => 'US'),
			'sameAs' => array('https://www.facebook.com/technbrains/', 'https://twitter.com/technbrains', 'https://www.instagram.com/technbrains/', 'https://www.linkedin.com/company/technbrains', 'https://www.youtube.com/@TechnBrainsofficial'),
		),
		array(
			'@context' => 'https://schema.org',
			'@type' => 'LocalBusiness',
			'name' => 'TechnBrains',
			'url' => 'https://www.technbrains.com',
			'telephone' => '+18338886032',
			'address' => array('@type' => 'PostalAddress', 'streetAddress' => '15305 Dallas Pkwy 12th Floor Suite 1257', 'addressLocality' => 'Addison', 'addressRegion' => 'TX', 'postalCode' => '75001', 'addressCountry' => 'US'),
			'geo' => array('@type' => 'GeoCoordinates', 'latitude' => '32.9588', 'longitude' => '-96.8231'),
			'openingHours' => 'Mo-Fr 09:00-18:00',
		),
	),
	'components' => array(
		array('name' => 'Header',       'modifier_class' => ''),
		array('name' => 'HeroNetwork',  'modifier_class' => ''),
		array('name' => 'Trust',        'modifier_class' => 'metrics-variant-a'),
		array('name' => 'ChoosePath',   'modifier_class' => ''),
		array('name' => 'Services',     'modifier_class' => ''),
		array('name' => 'NextStepCTA',  'modifier_class' => ''),
		array('name' => 'Cases',        'modifier_class' => ''),
		array('name' => 'RevampHire',   'modifier_class' => ''),
		array('name' => 'Tech',         'modifier_class' => ''),
		array('name' => 'Engage',       'modifier_class' => 'outsource-brief'),
		array('name' => 'Decision',     'modifier_class' => ''),
		array('name' => 'WhyUs',        'modifier_class' => ''),
		array('name' => 'Industries',   'modifier_class' => ''),
		array('name' => 'TestimonialsMosaic', 'modifier_class' => ''),
		array('name' => 'Blog',         'modifier_class' => ''),
		array('name' => 'FAQ',          'modifier_class' => ''),
		array('name' => 'Final',        'modifier_class' => ''),
		array('name' => 'Footer',       'modifier_class' => ''),
	),
	'mock_data' => array(

		'trust_metrics' => array(
			array('target' => 12, 'unit' => '+', 'label' => 'Years of delivery experience', 'caption' => 'Shipping production software since 2014', 'decimals' => 0),
			array('target' => 94, 'unit' => '%', 'label' => 'Client retention rate', 'caption' => 'Year-over-year, across 80+ accounts', 'decimals' => 0),
			array('target' => 4.7, 'unit' => '★', 'label' => 'Average rating (Clutch)', 'caption' => 'Verified across 60+ public reviews', 'decimals' => 1),
			array('target' => 72, 'unit' => 'h', 'label' => 'Avg. engineer onboarding', 'caption' => 'Vetted, ramped, and committing in-repo', 'decimals' => 0),
		),

		'services' => array(
			array('icon' => 'MobileIcon', 'title' => 'Mobile App Development', 'desc' => 'Mobile apps built for fast interactions, consistent performance under load, and smooth cross-device behavior across iOS, Android, and hybrid environments.', 'bullets' => array(
            'iOS development' => '/ios-app-development', 
            'Android development' => '/android-app-development', 
            'Cross-platform (Flutter, React Native)' => '#'
        )),
			array('icon' => 'WebIcon', 'title' => 'Web App Development', 'desc' => 'Web applications are designed for high traffic, complex workflows, and a predictable user experience across modern browsers and devices.', 'bullets' => array(
            'Web application development' => '/web-app-development', 
            'WordPress development' => '/wordpress-development', 
            'UI/UX design' => '/ui-ux-design'
        )),
			array('icon' => 'SoftwareIcon', 'title' => 'Custom Software', 'desc' => 'Custom software development aligned with operational workflows, internal processes, and domain-specific logic that replaces fragmented manual systems.', 'bullets' => array(
            'Enterprise applications' => '/enterprise-app-development', 
            'SaaS platforms' => '/saas-application-development'
        )),
			array('icon' => 'AIIcon', 'title' => 'AI Development', 'desc' => 'AI components and autonomous systems integrated into products to automate decisions, generate outputs, and augment user workflows.', 'bullets' => array(
            'AI software development' => '#', 
            'AI agents' => '#', 
            'Generative AI solutions' => '#'
        )),
			array('icon' => 'PlatformIcon', 'title' => 'Enterprise Platforms', 'desc' => 'Large-scale system integrations that connect data, operations, and business tools across enterprise environments.', 'bullets' => array(
            'Salesforce' => '/platforms/salesforce-consultants', 
            'ServiceNow' => '/platforms/servicenow-services', 
            'WooCommerce' => '/ecommerce/woocommerce-development-company',
			'Shopify' => '/ecommerce/shopify-development-services',
			'Power BI' => '/platforms/power-bi-consulting',
				'Odoo' => '/platforms/odoo-development-company',
				'MuleSoft' => '/platforms/mulesoft-consulting',
				'Sitecore' => '/platforms/sitecore-consulting',
        )),
			array('icon' => 'EmergingIcon', 'title' => 'Emerging Engineering', 'desc' => 'Non-standard work focused on experimental, early-stage, or next-generation digital environments.', 'bullets' => array(
            'Internet of Things (IoT)' => '/iot-services', 
            'Blockchain Development' => '/blockchain-app-development', 
            'Metaverse Development' => '/metaverse',
			'Cybersecurity engineering' => 'https://www.technbrains.com/cybersecurity',
			'Digital Marketing & SEO' => '#'
        )),
		),

		'cases' => array(
			array('tag' => 'Ride Sharing', 'title' => 'Fix Car Sharer', 'desc' => 'Fix Car Sharer struggled with user and driver acquisition while maintaining safety, trust, and compliance. TechnBrains built a carpooling platform with preference-based matching, real-time tracking, and integrated payments.', 'link' => '/case-studies/fixcarsharer' ,'metrics' => array(array('value' => '30%', 'label' => 'Increase in user satisfaction'), array('value' => '40%', 'label' => 'Improvement in trust and safety ratings')), 'meta' => array(array('k' => 'Industry', 'v' => 'Ride Sharing'), array('k' => 'Team Size', 'v' => '9 engineers'), array('k' => 'Built With', 'v' => 'React Native'))),
			array('tag' => 'On-Demand', 'title' => 'PlateTalk', 'desc' => 'PlateTalk aimed to bridge the gap in transportation communication by combining real-time vehicle tracking with social media features for incident reporting. TechnBrains developed a seamless app that allows users to track vehicles, manage registrations, and communicate instantly.', 'link' => '/case-studies/plate-talk'  , 'metrics' => array(array('value' => '98%', 'label' => 'Accuracy in real-time tracking'), array('value' => '30%', 'label' => 'Improvement in incident reporting')), 'meta' => array(array('k' => 'Industry', 'v' => 'On-Demand'), array('k' => 'Team Size', 'v' => '6 engineers'), array('k' => 'Built With', 'v' => 'Flutter'))),
			array('tag' => 'Retail', 'title' => 'QPon', 'desc' => 'QPon struggled with raising awareness and offering a centralized discount platform for users. TechnBrains addressed this by creating a user-friendly app with personalized recommendations and targeted marketing.', 'link' => '/case-studies/qpon' , 'metrics' => array(array('value' => '65%', 'label' => 'Boosted user engagement'), array('value' => '82%', 'label' => 'Improved subscription rate')), 'meta' => array(array('k' => 'Industry', 'v' => 'Retail'), array('k' => 'Team Size', 'v' => '5 engineers'), array('k' => 'Built With', 'v' => 'React Native'))),
			array('tag' => 'SaaS', 'title' => 'Whitetail Almanac', 'desc' => 'Whitetail Almanac needed a data-driven solution to help hunters plan more effectively. TechnBrains built a real-time mobile platform combining weather intelligence, feeding patterns, and hunting calendars for more accurate trip planning.', 'metrics' => array(array('value' => '30%', 'label' => 'Improvement in hunting success rate'), array('value' => '98%', 'label' => 'Accuracy in weather forecasts')),'link' => '/case-studies/white-tail' , 'meta' => array(array('k' => 'Industry', 'v' => 'SaaS'), array('k' => 'Team Size', 'v' => '6 engineers'), array('k' => 'Built With', 'v' => 'React Native'))),
			array('tag' => 'Mobility', 'title' => 'The Wedding App', 'desc' => 'The Wedding App faced the challenge of transitioning complex web features into a seamless mobile solution that would centralize wedding planning for couples, guests, and vendors. TechnBrains developed a user-friendly app with RSVP management, vendor collaboration tools, and automated reminders to simplify the entire process.', 'metrics' => array(array('value' => '30%', 'label' => 'Increase in guest engagement'), array('value' => '15%', 'label' => 'Boost in client satisfaction')),'link' => '/case-studies/the-wedding-app' , 'meta' => array(array('k' => 'Industry', 'v' => 'Mobility / Ride Sharing'), array('k' => 'Team Size', 'v' => '8 engineers'), array('k' => 'Built With', 'v' => 'React Native'))),
		),

		'hire_groups' => array(
			array('title' => 'Mobile Developers', 'desc' => 'Specialists in native and cross-platform mobile application development for iOS and Android ecosystems.', 'links' => array(
        'Hire iOS Developer'           => '/hire-ios-developer', 
        'Hire Android Developer'       => '/hire-android-developer', 
        'Hire Flutter Developer'       => '/hire-flutter-developer', 
        'Hire React Native Developer' => '/hire-react-native-developer', 
        'Hire a Swift Developer'       => '/hire-swift-developer'
    )),
			array('title' => 'Frontend Developers', 'desc' => 'Experts building fast, responsive interfaces for modern web applications.', 'links' => array(
        'Hire ReactJS Developers'           => '/hire-reactjs-developer', 
        'Hire AngularJS Developers'       => '/hire-angularjs-developer', 
        'Hire JavaScript Developers'       => '/hire-javascript-developer',
    )),
			array('title' => 'Backend Developers', 'desc' => 'Engineers focused on scalable backend systems, APIs, and AI-powered solutions.', 'links' => array(
        'Hire Node.js Developers'           => '/hire-nodejs-developer', 
        'Hire Python Developers'       => '/hire-python-developer', 
        'Hire PHP Developers'       => '/hire-php-developer',
		'Hire Laravel Developers'       => '/hire-laravel-developer',
		'Hire Java Developers'       => '/hire-java-developer',
    )),
		),

		'tech_row_1' => array(
			array('name' => 'React', 'link' => '/technologies/react'), array('name' => 'Angular', 'link' => '/technologies/react'), array('name' => 'Flutter', 'link' => '/technologies/react'), array('name' => 'Node.js', 'link' => '/technologies/react'),
			array('name' => 'Python', 'link' => '/technologies/react'), array('name' => 'Android', 'link' => '/technologies/react'), array('name' => 'Azure', 'link' => '/technologies/react'), array('name' => 'AWS', 'link' => '/technologies/react'),
			array('name' => 'Dart', 'link' => '/technologies/react'), array('name' => 'Drupal', 'link' => '/technologies/react'), array('name' => 'Express JS', 'link' => '/technologies/react'), array('name' => 'Kafka', 'link' => '/technologies/react'),
		),

		'tech_row_2' => array(
			array('name' => 'Django', 'link' => '/technologies/react'), array('name' => 'Firebase', 'link' => '/technologies/react'), array('name' => 'HubSpot', 'link' => '/technologies/react'), array('name' => 'Docker', 'link' => '/technologies/react'),
			array('name' => 'Kotlin', 'link' => '/technologies/react'), array('name' => 'MySQL', 'link' => '/technologies/react'), array('name' => 'MongoDB', 'link' => '/technologies/react'), array('name' => 'PHP', 'link' => '/technologies/react'),
			array('name' => 'TypeScript', 'link' => '/technologies/react'), array('name' => 'Swift', 'link' => '/technologies/react'), array('name' => 'Rails', 'link' => '/technologies/react'), array('name' => 'Oracle', 'link' => '/technologies/react'),
		),

		'engage_cards' => array(
    array('num' => '01', 'title' => 'Staff Augmentation', 'url' => '/technbrains/staff-augmentation', 'desc' => 'Senior engineers integrate directly into your existing team to increase delivery capacity while you retain full control over priorities, sprint planning, and execution. We provide the talent, you manage the work.', 'bullets' => array('Onboarded in 48–72 hours', 'Scale team size based on sprint needs', 'Work inside your tools and workflows', 'Senior engineering talent aligned to your stack'), 'scene' => 'staff'),
    array('num' => '02', 'title' => 'Dedicated Team',      'url' => '/technbrains/hire-dedicated-team',      'desc' => 'A fully managed, cross-functional engineering pod that functions as an extension of your product organization, with TechnBrains owning end-to-end delivery, coordination, and execution accountability.', 'bullets' => array('Engineers, QA, and PM working as one unit', 'Aligned with your product roadmap', 'Continuous delivery ownership handled by TechnBrains', 'Scales with project complexity and velocity needs'), 'scene' => 'dedicated'),
    array('num' => '03', 'title' => 'Software Outsourcing', 'url' => '/technbrains/fixed-price-model', 'desc' => 'Full-cycle product delivery managed end-to-end, from planning and architecture to deployment and release.', 'bullets' => array('Defined scope and delivery timeline upfront', 'No internal management overhead required', 'Full ownership of execution and delivery', 'Structured handover with complete IP transfer'), 'scene' => 'outsourcing'),
),

		'decision' => array(
			'step1_prompt' => 'Where are you right now?',
			'step1_options' => array(
				array('label' => 'Starting from scratch (no team, no product yet)', 'value' => 'noteam'),
				array('label' => 'Team exists, but delivery is slowing down', 'value' => 'slow'),
				array('label' => 'Product is live, needs ongoing development', 'value' => 'live'),
				array('label' => 'Scope is clear, just need execution', 'value' => 'scope'),
			),
			'step2_prompt' => "What's slowing you down the most?",
			'step2_options' => array(
				array('label' => 'Hiring is taking too long', 'value' => 'hiring'),
				array('label' => 'We need predictable delivery', 'value' => 'predictable'),
				array('label' => "We don't have technical ownership", 'value' => 'ownership'),
				array('label' => 'Our team is overloaded', 'value' => 'overloaded'),
			),
			'results' => array(
				'outsourcing' => array('name' => 'Software Outsourcing', 'summary' => 'You need full execution support to move forward without delays, either from scratch or with a defined scope.', 'bullets' => array('End-to-end delivery', 'Clear timelines', 'No internal overhead'), 'primary' => array('label' => 'Start Your Project', 'href' => '#final'), 'secondary' => array('label' => 'Talk to our team', 'href' => '#final')),
				'staffaug'    => array('name' => 'Staff Augmentation', 'summary' => 'Your team is in place, but delivery is slowed by hiring delays or limited capacity. Adding senior developers is the fastest way to scale output.', 'bullets' => array('Developers matched within 24 hours', 'Works inside your workflow', 'Flexible scaling'), 'primary' => array('label' => 'Hire Developers', 'href' => 'hire-developers'), 'secondary' => array('label' => 'Talk to our team', 'href' => '#final')),
				'dedicated'   => array('name' => 'Dedicated Team', 'summary' => 'Your product is growing and needs a stable team aligned with your roadmap for continuous delivery.', 'bullets' => array('A full team aligned to your product', 'Consistent delivery', 'Scales with your roadmap'), 'primary' => array('label' => 'Hire a Dedicated Team', 'href' => '#hire'), 'secondary' => array('label' => 'Talk to our team', 'href' => '#final')),
			),
		),

		'why_us' => array(
			array('icon' => 'StarIcon',     'title' => '7–14 Day Productivity Ramp',    'desc' => 'Engineers plug directly into your environment and begin contributing within days of access, not weeks of onboarding cycles.'),
			array('icon' => 'RocketIcon',   'title' => '1 Owner per Module / Stream',         'desc' => 'Each workstream is assigned to a clearly identified senior engineer who owns delivery end-to-end, ensuring accountability never gets diluted.'),
			array('icon' => 'RefreshIcon',  'title' => 'Works Inside Your System',   'desc' => 'Delivery happens within your existing tools, workflows, and communication channels, so there’s no disruption to how your team already operates.'),
			array('icon' => 'SettingsIcon', 'title' => 'Stable, Consistent Teams', 'desc' => 'Engineers remain consistent throughout the engagement, ensuring continuity, context retention, and predictable delivery velocity.'),
			array('icon' => 'TargetIcon',   'title' => '100% Access Governance & IP Protection',          'desc' => 'Access, permissions, and delivery boundaries follow strict governance models designed to protect IP, enforce least-privilege access, and ensure secure collaboration.'),
			array('icon' => 'UsersIcon',    'title' => 'Top 3% Talent',             'desc' => 'Every engineer is senior-level with proven experience shipping production systems before joining client engagements.'),
		),

		'industries' => array(
    array('name' => 'Healthcare',  'url' => home_url('/industries/healthcare-app-development/'),  'desc' => 'Patient records, appointment workflows, and hospital operations managed under HIPAA-compliant standards with fully auditable, traceable data flows.',          'img' => '/technbrains/wp-content/uploads/2026/06/healthcare-ind.webp'),
    array('name' => 'Fintech',     'url' => home_url('/industries/fintech-software-development/'),     'desc' => 'Payment flows, account systems, and transaction-heavy platforms where every interaction needs validation and audit clarity.', 'img' => '/technbrains/wp-content/uploads/2026/06/fintech-ind.webp'),
    array('name' => 'Logistics',   'url' => home_url('/industries/logistics-software-development/'),   'desc' => 'Dispatch boards, tracking systems, and fleet coordination tools where timing and visibility drive everything.',   'img' => '/technbrains/wp-content/uploads/2026/06/logistics-ind.webp'),
    array('name' => 'Real Estate', 'url' => home_url('/industries/real-estate-app-development/'), 'desc' => 'Listing platforms, agent dashboards, and property workflows where search, updates, and coordination happen continuously.',            'img' => '/technbrains/wp-content/uploads/2026/06/realestate-ind.webp'),
    array('name' => 'On-Demand',   'url' => home_url('/industries/on-demand-app-development/'),   'desc' => 'Matching systems, booking flows, and live service platforms where demand and availability shift in real time.',              'img' => '/technbrains/wp-content/uploads/2026/06/ondemand-ind.webp'),
    array('name' => 'Automotive',  'url' => home_url('/industries/automotive-app-development/'),  'desc' => 'Service workflows, vehicle data systems, and internal tools used by workshops and dealership networks in day-to-day operations.',              'img' => '/technbrains/wp-content/uploads/2026/06/automotive-ind.webp'),
    array('name' => 'Education',   'url' => home_url('/industries/education-app-development/'),   'desc' => 'Classroom platforms, course delivery systems, and student tracking tools are used across learning cycles and assessments.',         'img' => '/technbrains/wp-content/uploads/2026/06/education-ind.webp'),
    array('name' => 'Energy',      'url' => home_url('/industries/energy-management-software-development/'),      'desc' => 'Monitoring dashboards, operational systems, and infrastructure tools dealing with continuous data and system health.',          'img' => '/technbrains/wp-content/uploads/2026/06/energy-ind.webp'),
    array('name' => 'Retail',      'url' => home_url('/industries/retail-app-development/'),      'desc' => 'Catalog systems, order flows, and inventory operations where scale, timing, and consistency matter across channels.',                 'img' => '/technbrains/wp-content/uploads/2026/06/retail-ind.webp'),
),

		'testimonials' => array(
			array('quote' => 'They delivered exactly what they said they would. Two engineers were in our standups within 48 hours, and we shipped our v2 release on the original timeline — no scope cuts, no late nights from our internal team.', 'name' => 'Maria Chen', 'role' => 'VP Engineering', 'company' => 'FinLane · Fintech', 'badge' => 'clutch'),
			array('quote' => 'Senior, no hand-holding required. Took ownership of the iOS app from day one and kept work moving without our PM constantly checking in. Code reviews were thoughtful and the architecture decisions held up under load.', 'name' => 'David Park', 'role' => 'Founder', 'company' => 'MoveCart · Logistics', 'badge' => null),
			array('quote' => 'Direct communication, predictable releases. Exactly what we needed after working with two other firms that overpromised and under-delivered. The team flagged risks early and stayed accountable to estimates.', 'name' => 'Priya Iyer', 'role' => 'CTO', 'company' => 'ClinicOS · Healthcare', 'badge' => 'trustpilot'),
			array('quote' => "We extended our engagement twice. The engineers became part of the team, not vendors — sitting in product reviews, pushing back on bad ideas, and treating our roadmap like their own.", 'name' => 'Sam Okafor', 'role' => 'Head of Product', 'company' => 'Loomly · SaaS', 'badge' => null),
		),

		'blog' => array(
			'feature' => array('tag' => 'Engineering Insights', 'title' => 'What 1,000 projects taught us about delivery predictability', 'desc' => 'After a decade of shipping products, the patterns separating delivery that lands from delivery that drifts come down to four habits — and none of them are about velocity.', 'meta' => '12 min read · Apr 2026', 'img' => get_stylesheet_directory_uri() . '/assets/images/home/engineering-insights.jpg'),
			'side' => array(
				array('tag' => 'Hiring', 'title' => 'Why we vet engineers in their actual codebase, not in interviews.', 'meta' => '6 min · Apr 2026', 'img' => get_stylesheet_directory_uri() . '/assets/images/home/hiring.jpg'),
				array('tag' => 'AI', 'title' => 'When to build an AI agent vs. add a model call to your existing flow.', 'meta' => '8 min · Mar 2026', 'img' => get_stylesheet_directory_uri() . '/assets/images/home/ai.jpg'),
			),
		),

		'faqs' => array(
			array('q' => 'What services does TechnBrains provide?', 'a' => 'TechnBrains supports both full product development and team extension. This includes mobile and web applications, custom software, AI systems, and enterprise platforms.'),
			array('q' => 'Can I hire developers instead of outsourcing the full project?', 'a' => 'Yes. You can add senior engineers directly to your team or engage a full team to handle end-to-end product delivery, depending on your needs.'),
			array('q' => 'How quickly can developers start working on my project?', 'a' => 'Developers are typically onboarded within 48 to 72 hours. They are matched based on your tech stack, workflows, and sprint structure so they can start contributing immediately.'),
			array('q' => 'What are the engagement models for working with TechnBrains?', 'a' => 'TechnBrains offers three engagement models: staff augmentation (individual engineers), dedicated teams (managed pods), and software outsourcing (full-cycle product delivery).'),
			array('q' => 'How do you handle ownership, security, and confidentiality in projects?', 'a' => 'You retain full ownership of all code and intellectual property. All engagements are protected by NDAs, strict access control, and secure development governance from day one.'),
		),

		'footer_nav' => array(
			array('h' => 'Hire Developers', 'items' => array('Hire iOS Developer', 'Hire Android Developer', 'Hire Web Developer', 'Hire Flutter Developer', 'Hire React Native Developer', 'Hire React Developer', 'Hire MEAN Stack Developer')),
			array('h' => 'Services', 'items' => array('AI Development Services', 'Custom Software Development', 'Web Design & Development', 'Mobile App Development', 'Enterprise App Development'), 'sub' => array('h' => 'Platforms', 'items' => array('Odoo', 'Magento', 'Salesforce'))),
			array('h' => 'Engagement Models', 'items' => array('Staff Augmentation', 'Dedicated Teams', 'Software Outsourcing')),
			array('h' => 'Industries', 'items' => array('Healthcare', 'Retail', 'Automotive', 'Logistics', 'Education', 'Energy')),
			array('h' => 'Locations', 'items' => array('Dallas', 'New York', 'San Antonio')),
			array('h' => 'Resources', 'items' => array('About Us', 'Contact Us', 'Case Studies', 'Blog')),
		),

		'footer_offices' => array(
			array('city' => 'Dallas', 'address' => '15305 Dallas Pkwy, 12th Floor, Suite #1257, Addison, TX 75001 USA'),
			array('city' => 'New York', 'address' => '77 Water St, 8th Floor, Manhattan, New York City, NY 10005, USA'),
		),

		'countries' => array(
			array('code' => '+1',   'name' => 'United States',  'flag' => '🇺🇸'),
			array('code' => '+92',  'name' => 'Pakistan',       'flag' => '🇵🇰'),
			array('code' => '+971', 'name' => 'UAE',            'flag' => '🇦🇪'),
			array('code' => '+44',  'name' => 'United Kingdom', 'flag' => '🇬🇧'),
			array('code' => '+91',  'name' => 'India',          'flag' => '🇮🇳'),
			array('code' => '+61',  'name' => 'Australia',      'flag' => '🇦🇺'),
			array('code' => '+49',  'name' => 'Germany',        'flag' => '🇩🇪'),
			array('code' => '+33',  'name' => 'France',         'flag' => '🇫🇷'),
		),

		'roles' => array('Senior React Engineers', 'AI / ML Specialists', 'Cloud Architects (AWS)', 'iOS & Android Devs', 'DevOps Engineers', 'Data Engineers', 'Product Designers'),
	),
);
