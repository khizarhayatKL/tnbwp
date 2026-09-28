<?php

/**
 * Data Registry: fixed-price-model
 *
 * @package technbrains-child
 */

defined('ABSPATH') || exit;

return array(

	'schemas' => array(

		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array(
					'@type'          => 'Question',
					'name'           => 'What is a fixed price project?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'A fixed-price project is a software development endeavor in which the client and the development company agree upon the cost and scope of work beforehand. In this arrangement, the client pays a predetermined amount for the entire project, and the development company takes on the responsibility of delivering the project within the specified budget and timeline.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Can the scope of a fixed price project change during development?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'While the scope of a fixed-price project is typically defined upfront, changes may arise during the development process. However, any alterations to the scope can impact the project\'s timeline and budget. In such cases, clients and the development company must discuss and agree upon the scope changes before implementation.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'How does TechnBrains ensure quality in fixed-price projects?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'TechnBrains ensures quality in fixed-price projects through a combination of rigorous planning, adherence to best practices, continuous testing, and client collaboration.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'How does TechnBrains handle project delays in fixed price projects?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'In the event of project delays, TechnBrains takes proactive measures to address them and minimize their impact on project delivery. This includes identifying the root cause of the delay, adjusting the project plan as needed, and communicating transparently with the client.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'How does TechnBrains handle project scope changes in fixed price projects?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'When project scope changes occur, TechnBrains follows a structured process: evaluating the impact on timeline, budget, and deliverables; documenting the change request; seeking client approval before implementation; then executing the changes while keeping the client informed.',
					),
				),
			),
		),

	),

	'mock_data' => array(

		'engagement_banner' => array(
    'head_text'   => 'Software Outsourcing Services That Keep Projects Moving',
    'para_text'   => 'Outsource a full project or extend your engineering team without losing control over quality, communication, or product direction.',
    'banner_list' => array(
        array( 'li_list' => 'Outsource software development without hiring delays.' ),
        array( 'li_list' => 'Get developers, QA engineers, and project managers aligned fast.' ),
        array( 'li_list' => 'Reduce delivery gaps, missed deadlines, and development overhead.' ),
        array( 'li_list' => 'Choose fixed-scope, dedicated team, or staff augmentation models.' ),
    ),
    'form_title'  => 'Need a Software Team That Can Start Fast?',
    'form_para'   => 'Outsource development, QA, and project delivery without waiting months to hire or stretching your internal team.',
),

		'dedicated_lang_desc' => array(
    'para_html' => 'TechnBrains provides software outsourcing services for businesses that need to build, improve, or scale software without waiting months to hire an in-house team. When your internal team is overloaded, deadlines are slipping, or the project needs skills you do not have internally, our outsourced software development team steps in to handle planning, design, development, QA, and delivery with clear ownership.<br><br>Software outsourcing helps you reduce hiring delays, control development costs, and access the right technical expertise when your project needs it. Whether you need full project outsourcing, a fixed-price software project, a dedicated development team, or staff augmentation support, TechnBrains helps you move faster while keeping quality, communication, and product direction in your control.',
),

		'two_boxes' => array(
    'subtitle' => 'Outsource With Control',
    'title'    => 'TechnBrains Software Outsourcing Benefits for Clients',
    'listing'  => array(
        array(
            'img_src'    => '/engagement-model/fixed-price/sd6.png',
            'img_width'  => '60',
            'img_height' => '60',
            'title'      => 'Requirements Keep Changing',
            'para'       => 'When project requirements are unclear or evolving, delivery can slow down fast. TechnBrains helps define scope, prioritize features, and align your software roadmap before development moves forward.',
        ),
        array(
            'img_src'    => '/engagement-model/fixed-price/sd2.png',
            'img_width'  => '60',
            'img_height' => '60',
            'title'      => 'Timelines Are Slipping',
            'para'       => 'Missed deadlines usually happen when teams are overloaded or resources are missing. Our software outsourcing team helps keep design, development, QA, and launch activities moving through structured milestones.',
        ),
        array(
            'img_src'    => '/engagement-model/fixed-price/sd3.png',
            'img_width'  => '60',
            'img_height' => '60',
            'title'      => 'Resources Are Missing',
            'para'       => 'You may have a product idea but not the right developers, QA engineers, designers, or DevOps support in-house. TechnBrains gives you access to the right technical roles without long hiring cycles.',
        ),
        array(
            'img_src'    => '/engagement-model/fixed-price/sd4.png',
            'img_width'  => '60',
            'img_height' => '60',
            'title'      => 'Supervision Takes Too Much Time',
            'para'       => 'Outsourcing should not create more management work for your team. We handle execution, progress tracking, quality checks, and delivery coordination while keeping you involved in key decisions.',
        ),
        array(
            'img_src'    => '/engagement-model/fixed-price/sd5.png',
            'img_width'  => '60',
            'img_height' => '60',
            'title'      => 'Budget Feels Uncontrolled',
            'para'       => 'Software costs rise when scope, timelines, and responsibilities are unclear. TechnBrains helps you choose the right outsourcing model for your project, whether it is full project outsourcing, fixed-scope delivery, or team extension.',
        ),
    ),
),

		'proposal' => array(
    'head_html' => '<h2>Need to Build Software Without Stretching Your Team?</h2>',
    'btn_text'  => 'Discuss Your Project',
),

		'engagement_table' => array(
    'sub_head'   => 'Outsourcing Engagement Models',
    'head_text'  => 'Why Choose TechnBrains as Your Software Outsourcing Partner?',
    'para_text'  => 'When your team is overloaded and hiring is slow, delivery can easily slip. TechnBrains provides a structured software outsourcing model with clear ownership, reliable communication, and engineering support from planning to launch.',
    'table_list' => array(
        array( 'hiring' => 'Cost Control',          'in_house' => 'High payroll, hiring, and management costs',        'technbrains' => 'Clear scope, flexible engagement models, and controlled development spend',         'para' => 'Lower cost, but scope and quality may vary' ),
        array( 'hiring' => 'Speed to Start',         'in_house' => 'Slow recruitment and onboarding',                   'technbrains' => 'Faster access to developers, QA, and project support aligned to your roadmap',        'para' => 'Faster start, but team fit is uncertain' ),
        array( 'hiring' => 'Delivery Ownership',     'in_house' => 'Managed fully by your internal team',               'technbrains' => 'End-to-end delivery support from planning, development, QA, and launch',              'para' => 'Often task-based with limited accountability' ),
        array( 'hiring' => 'Quality',                'in_house' => 'Depends on internal capacity',                      'technbrains' => 'Code reviews, QA testing, documentation, and release checks are built into delivery', 'para' => 'Quality may vary across vendors' ),
        array( 'hiring' => 'Flexibility',             'in_house' => 'Limited by current team size',                      'technbrains' => 'Full project outsourcing, fixed-scope projects, and team extension options',           'para' => 'Scope changes can become difficult' ),
        array( 'hiring' => 'Technical Expertise',    'in_house' => 'Limited to available in-house skills',              'technbrains' => 'Access to software engineers, UI/UX, QA, DevOps, cloud, and app specialists',        'para' => 'May require multiple vendors' ),
        array( 'hiring' => 'Communication',          'in_house' => 'Direct, but adds internal management load',         'technbrains' => 'Regular updates, milestone reviews, shared tools, and time-zone aligned collaboration', 'para' => 'Risk of communication gaps' ),
    ),
),

		'our_process' => array(
    'subtitle' => 'Structured Software Outsourcing',
    'title'    => 'Our Expertise in Managing Software Outsourcing Projects',
    'listing'  => array(
        array(
            'bg_image'  => '/engagement-model/fixed-price/p1.webp',
            'title'     => 'Why Structured',
            'red_title' => 'Outsourcing Matters',
            'para'      => 'Software outsourcing works best when scope, communication, and delivery ownership are clear. For defined projects, a fixed price model helps control cost and timeline. For evolving products, flexible outsourcing support helps teams scale without slowing the roadmap.',
        ),
        array(
            'bg_image'  => '/engagement-model/fixed-price/p2.webp',
            'title'     => 'How TechnBrains Keeps',
            'red_title' => 'Outsourced Projects on Track',
            'para'      => 'We align your project goals, technical requirements, development team, QA process, and launch plan before execution starts. This helps reduce missed deadlines, unclear ownership, scope gaps, and post-launch issues.',
        ),
        array(
            'bg_image'  => '/engagement-model/fixed-price/p3.webp',
            'title'     => 'Gain Better Delivery',
            'red_title' => 'Control With TechnBrains',
            'para'      => 'Outsourcing should help you move faster, not create more management work. TechnBrains gives you access to the software development support you need while keeping your team involved in product direction, feedback, and key decisions.',
        ),
    ),
),

		'steps_hire' => array(
    'head_text' => 'Software Outsourcing Services',
    'sub_head'  => 'How Can TechnBrains Support Your Software Project?',
    'box_list'  => array(
        array(
            'title'     => 'Flexible Software Outsourcing Models',
            'content'   => array(
                'Outsource your full project, control scope and cost with a fixed pricing model, or add extra engineering capacity through a Dedicated Team or Staff Augmentation model when delivery pressure is high.',
            ),
            'image_src' => '/engagement-model/dedicated-team/Step_01-Fix-Price-Process.gif',
            'width'     => 368,
            'height'    => 261,
        ),
    ),
),

		'case_slider' => array(
			'title_html' => 'Our<br> <span>Global Clientele</span>',
			'para'       => 'TechnBrains converts business ideas into tangible products that deliver measurable results.',
			'listing'    => array(
				array(
					'link'        => '/case-studies/fixcarsharer',
					'img_src'     => '/app-dev/case-study/fix.webp',
					'logo'        => '/app-dev/case-study/logo/fix.png',
					'logo_width'  => '200',
					'logo_height' => '30',
					'content'     => 'Fix Car Sharer revolutionizes commuting with a user-centric carpooling app. Powered by TechnBrains the app offers preference-based matchmaking, real-time tracking, payment integration, and QR code start.',
					'title'       => 'Platform',
					'stack'       => 'React Native',
					'tag'         => 'Mobile Application',
				),
				array(
					'link'        => '/case-studies/built-by-determination',
					'img_src'     => '/app-dev/case-study/built.webp',
					'logo'        => '/app-dev/case-study/logo/built.png',
					'logo_width'  => '170',
					'logo_height' => '42',
					'content'     => 'Built By Determination revolutionizes fitness with personalized workouts, nutrition tracking, and certified trainers. Powered by TechnBrains the app prioritizes client needs and innovation.',
					'title'       => 'Platform',
					'stack'       => 'React Native',
					'tag'         => 'Mobile Application',
				),
				array(
					'link'        => '/case-studies/white-tail',
					'img_src'     => '/app-dev/case-study/white.webp',
					'logo'        => '/app-dev/case-study/logo/white.png',
					'logo_width'  => '200',
					'logo_height' => '35',
					'content'     => 'Whitetail Almanac is a hunting platform that prioritizes precision, safety, and adventure. Built with LEMP Stack, React Native, and Laravel, it caters to the Florida, USA region, integrating Aries Weather, Google Maps, and Google Firebase.',
					'title'       => 'Platform',
					'stack'       => 'React Native',
					'tag'         => 'Mobile Application',
				),
				array(
					'link'        => '/case-studies/cruze4cash',
					'img_src'     => '/app-dev/case-study/cruze4cash.webp',
					'logo'        => '/app-dev/case-study/logo/cruze-logo.png',
					'logo_width'  => '150',
					'logo_height' => '30',
					'content'     => 'Cruze4cash revolutionizes property search with instant access, user-friendly design, secure login, and efficient navigation, simplifying the process and facilitating seamless connections between users, buyers, landlords, and sellers.',
					'title'       => 'Platform',
					'stack'       => 'React Native',
					'tag'         => 'Mobile Application',
				),
				array(
					'link'        => '/case-studies/cofit',
					'img_src'     => '/app-dev/case-study/cofit 365.webp',
					'logo'        => '/app-dev/case-study/logo/Case-logo.webp',
					'logo_width'  => '60',
					'logo_height' => '50',
					'content'     => 'CoFit365, a health and fitness social network, addresses isolation and inactivity challenges. TechnBrains developed the hybrid app, ensuring robust performance and user-centric design.',
					'title'       => 'Platform',
					'stack'       => 'React Native',
					'tag'         => 'Mobile Application',
				),
				array(
					'link'        => '/case-studies/five-sphere',
					'img_src'     => '/app-dev/case-study/5spheres.webp',
					'logo'        => '/app-dev/case-study/logo/brand-logo.webp',
					'logo_width'  => '50',
					'logo_height' => '50',
					'content'     => '5 Spheres of Fit, a wellness app, integrates cutting-edge technology MERN Stack and React Native for holistic well-being. Challenges addressed include data security, user engagement, content curation, expertise blending, and monetization.',
					'title'       => 'Platform',
					'stack'       => 'React Native',
					'tag'         => 'Mobile Application',
				),
			),
		),

		'development_price' => array(
    'subtitle' => 'From Project Gaps To Delivery Control',
    'title'    => 'Our Software Outsourcing Process',
    'para'     => 'TechnBrains helps businesses outsource software development with clear planning, defined roles, and milestone-based delivery. From requirements and development to QA, deployment, and support, our process keeps your project moving without unnecessary delays.',
),

		'dev_process' => array(
    'main_title' => 'Get cost-effective solutions with technbrains',
    'lang_title' => 'Our Software Outsourcing Process',
    'classes'    => 'gray-bg',
    'listing'    => array(
        array( 'number' => '01', 'title' => 'Project Discovery',        'para' => 'We start by understanding your software goals, team gaps, timeline pressure, and delivery risks. This helps us identify what needs to be built, what is slowing you down, and what outcome the project must support.' ),
        array( 'number' => '02', 'title' => 'Requirement Analysis',     'para' => 'Unclear requirements cause scope creep, delays, and rework. Our team reviews features, workflows, user roles, integrations, and technical needs so the project starts with a clearer delivery path.' ),
        array( 'number' => '03', 'title' => 'Outsourcing Model Selection', 'para' => 'We recommend the right software outsourcing model based on your scope, budget, and internal capacity. This may include full project outsourcing, fixed pricing, staff augmentation, or a dedicated team model.' ),
        array( 'number' => '04', 'title' => 'Technical Roadmap',        'para' => 'Before development begins, we define the architecture, milestones, sprint plan, dependencies, and delivery checkpoints. This gives you visibility into what will be built and how progress will be tracked.' ),
        array( 'number' => '05', 'title' => 'Team Allocation',          'para' => 'We assign the right software engineers, UI/UX designers, QA specialists, project managers, or DevOps support based on your project needs. You get the skills required without overbuilding your internal team.' ),
        array( 'number' => '06', 'title' => 'Design and Development',   'para' => 'Our team moves into UI/UX, frontend, backend, API integration, and core software development. Work is delivered in planned stages so you can review progress before the final build.' ),
        array( 'number' => '07', 'title' => 'QA and Testing',           'para' => 'We test functionality, usability, performance, compatibility, and release readiness before launch. This helps reduce bugs, delays, and post-launch issues that can damage user trust.' ),
        array( 'number' => '08', 'title' => 'Client Review and Launch', 'para' => 'You review working builds at key checkpoints, share feedback, and approve final delivery. We support deployment, app store submission, cloud setup, and release coordination where needed.' ),
        array( 'number' => '09', 'title' => 'Post-Launch Support',      'para' => 'After launch, we support bug fixes, performance improvements, feature updates, maintenance, and scaling. This keeps your software stable while your team focuses on users, growth, and roadmap priorities.' ),
    ),
),

		'faqs' => array(
    'head_text' => 'Things you might want to know',
    'listing'   => array(
        array(
            'faqhead' => 'What are software outsourcing services?',
            'faqbody' => 'Software outsourcing services help businesses hire an external software development partner to plan, design, build, test, and maintain software. Instead of hiring every role in-house, you can outsource software development to a team that handles delivery across mobile apps, web apps, custom software, enterprise platforms, and AI solutions.',
        ),
        array(
            'faqhead' => 'When should a business outsource software development?',
            'faqbody' => 'A business should outsource software development when hiring is slow, the internal team is overloaded, technical skills are missing, or product deadlines are at risk. Software outsourcing helps you access developers, QA engineers, designers, and project managers without long recruitment cycles.',
        ),
        array(
            'faqhead' => 'What software development services can be outsourced?',
            'faqbody' => 'You can outsource mobile app development, web app development, custom software development, enterprise app development, AI development, QA testing, UI/UX design, DevOps, software maintenance, and post-launch support. TechnBrains can manage a complete software project or support specific parts of your development roadmap.',
        ),
        array(
            'faqhead' => 'What is the difference between software outsourcing and staff augmentation?',
            'faqbody' => 'Software outsourcing means an external partner takes broader responsibility for software delivery, including planning, development, QA, and launch support. Staff augmentation means you add external developers or technical specialists to your existing team while your internal managers control daily execution.',
        ),
        array(
            'faqhead' => 'Is fixed pricing available for outsourced software projects?',
            'faqbody' => 'Yes, fixed pricing is available when the project scope, features, timeline, and deliverables are clearly defined before development starts. For evolving products, TechnBrains may recommend a flexible software outsourcing model so the team can adjust priorities as requirements change.',
        ),
        array(
            'faqhead' => 'How does TechnBrains keep outsourced software projects on track?',
            'faqbody' => 'TechnBrains keeps outsourced software projects on track through requirement analysis, technical planning, milestone-based delivery, QA testing, progress updates, and client review points. This helps reduce unclear scope, missed deadlines, communication gaps, and post-launch issues.',
        ),
        array(
            'faqhead' => 'Will I still have control if I outsource my software project?',
            'faqbody' => 'Yes, you keep control over product direction, key decisions, feedback, and approvals. TechnBrains manages the software development process, team coordination, technical execution, and delivery updates so you stay involved without managing every task yourself.',
        ),
        array(
            'faqhead' => 'How much does software outsourcing cost?',
            'faqbody' => 'Software outsourcing cost depends on project scope, features, technology stack, team size, timeline, and engagement model. A fixed-scope project may have a defined cost, while ongoing product development, staff augmentation, or a dedicated team model is usually priced based on the resources and duration required.',
        ),
        array(
            'faqhead' => 'Can TechnBrains take over an existing software project?',
            'faqbody' => 'Yes, TechnBrains can take over an existing software project that needs bug fixes, new features, performance improvements, technical cleanup, integrations, or better delivery control. The process usually starts with a code review, requirement audit, and roadmap assessment.',
        ),
        array(
            'faqhead' => 'Why choose TechnBrains as a software outsourcing company?',
            'faqbody' => 'TechnBrains is a software outsourcing company that supports product planning, UI/UX, development, QA, deployment, and post-launch maintenance under one delivery process. This helps businesses reduce hiring delays, fill technical gaps, and move software projects forward with clearer ownership.',
        ),
    ),
),

	),

	'components' => array(
		array('name' => 'engagement-banner',  'modifier_class' => 'staff'),
		array('name' => 'dedicated-lang-desc', 'modifier_class' => ''),
		array('name' => 'two-boxes',          'modifier_class' => 'redHover'),
		array('name' => 'proposal',           'modifier_class' => 'hireHead'),
		array('name' => 'engagement-table',   'modifier_class' => ''),
		array('name' => 'our-process',        'modifier_class' => 'main-head-center gray-bg'),
		array('name' => 'engagement-steps-hire', 'modifier_class' => ''),
		array('name' => 'case-slider',        'modifier_class' => 'gray-bg'),
		array('name' => 'development-price',  'modifier_class' => ''),
		array('name' => 'development-process', 'modifier_class' => ''),
		array('name' => 'testimonials',       'modifier_class' => ''),
		array('name' => 'main-faqs',          'modifier_class' => 'gray-bg'),
	),

);
