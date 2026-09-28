<?php
defined( 'ABSPATH' ) || exit;

return array(
	'schemas'    => array(
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array(
					'@type'          => 'Question',
					'name'           => 'What is DevOps?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => "DevOps, an amalgamation of 'development' (Dev) and 'operations' (Ops), is a groundbreaking approach designed to revolutionize the software development and delivery process. By seamlessly blending automation, monitoring, and collaborative practices, DevOps bridges the historical divide between development and IT operations. This transformation aims to accelerate the software development life cycle, enabling companies to release applications swiftly, frequently, and with impeccable quality.",
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Why do companies need DevOps?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => "Companies are turning to DevOps to attain a competitive edge in today's ever-evolving digital landscape. DevOps offers the promise of increased operational efficiency, reduced costs, and quicker time-to-market for new software products and features. It transforms the traditional approach to software development and allows organizations to remain agile, adapt rapidly to changes, and provide high-quality software-driven solutions to their customers.",
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'How can I start my DevOps transformation journey?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => "Starting your DevOps transformation journey is a pivotal step in the path to digital success. TechnBrains, a leading DevOps service provider, offers a wide range of services to help initiate and propel this transformation. Their services encompass an in-depth assessment of your existing processes, the introduction of best DevOps practices, and comprehensive training for your teams to ensure a seamless transition.",
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What DevOps services do TechnBrains offer?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'TechnBrains is a distinguished DevOps solution provider offering an extensive suite of services. Their offerings encompass Azure DevOps services, AWS DevOps services, Jenkins automation, Docker containerization, Kubernetes orchestration, Git version control, Prometheus monitoring, and JIRA collaboration.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What are the Benefits of DevOps Implementation?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'With TechnBrains as your partner in DevOps implementation, you can reap these rewards, ensuring your business thrives in the digital era. Benefits include faster time-to-market, enhanced operational efficiency, cost reduction, improved software quality, enhanced collaboration, scalability, adaptability, and customer satisfaction.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'How is TechnBrains different from other DevOps solution providers?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => "TechnBrain's unique combination of tailored solutions, a focus on maximizing digital business impact, extensive expertise, a proven track record, and a commitment to collaboration make them stand out in the field of DevOps solution providers. They understand that every business is unique and customize their approach to align with your business goals.",
					),
				),
			),
		),
	),
	'mock_data'  => array(
		'main_banner'         => array(
			'head_text'  => 'DevOps Services',
			'content'    => 'Say goodbye to long development cycles and hello to faster releases. Our DevOps experts will help you revolutionize your software development, ensuring efficiency, reliability, and scalability. With our DevOps services, we\'ll help you eliminate costly downtime and integrate security practices into every stage of development.',
			'img_src'    => '/app-dev/devops/banner.webp',
			'img_width'  => 812,
			'img_height' => 969,
			'img_alt'    => 'ios-banner',
		),
		'dedicated_lang_desc' => array(
			'para_html' => '<span>DevOps</span> stands as a beacon of progress, merging collaboration, monitoring, tool-chain pipelines, automation, and cloud adoption. At TechnBrains, our DevOps as a service offering ensures your applications experience a rapid onboarding journey, automating the end-to-end delivery pipeline and enabling continuous integration and development across <span>leading cloud platforms.</span><br><br>Elevate your time-to-market, boost efficiency, and slash costs by automating end-to-end delivery pipelines across cloud platforms. <span>TechnBrains\'s DevOps solutions</span> swiftly and reliably align organizations with their goals, delivering high-quality software-based products and services. Realize your business ambitions by developing applications at the pace of the industry with TechnBrain\'s all-encompassing <span>DevOps services.</span>',
		),
		'language_services'   => array(
			'head_text'  => 'DevOps Professional Services',
			'para_text'  => "Achieving top-tier deployment quality and operational efficiency is paramount. That's where our DevOps Professional Services come into play, reshaping your path to excellence. Drawing from our vast experience in successful DevOps implementations, our seasoned experts are uniquely positioned to guide you in automating and standardizing infrastructure deployment processes.",
			'btn_text'   => 'Hire devops developers NOW!',
			'anchor'     => false,
			'listing'    => array(
				array(
					'img_src'   => '/app-dev/devops/d1.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'DevOps Automation Implementation',
					'list_head' => 'DevOps Automation Implementation',
					'list_para' => 'Our DevOps Automation Implementation services provide the roadmap to your success. We pave the way for your DevOps journey with strategic roadmaps, streamlined delivery pipelines, efficient infrastructure management, and tailored architectures designed to meet your business\'s unique needs.',
				),
				array(
					'img_src'   => '/app-dev/devops/d2.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'DevOps CI/CD Services',
					'list_head' => 'DevOps CI/CD Services',
					'list_para' => 'With DevOps CI/CD Services, we act as your bridge to agile excellence. Our streamlined code delivery processes ensure high-quality code, employing industry best practices and fostering collaborative excellence through teamwork and proven techniques and tools.',
				),
				array(
					'img_src'   => '/app-dev/devops/d3.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'DevOps for Mobile Application Services',
					'list_head' => 'DevOps for Mobile Application Services',
					'list_para' => 'When it comes to DevOps for Mobile Application Services, we redefine user satisfaction. From end-to-end DevOps for mobile apps to enhanced customer experiences, reduced risks, and the delivery of high-quality products, our services set a new standard for mobile development.',
				),
				array(
					'img_src'   => '/app-dev/devops/d4.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Microservices Management, Kubernetes, and Containerization',
					'list_head' => 'Microservices Management, Kubernetes, and Containerization',
					'list_para' => "Mastering agility is our goal with Microservices Management, Kubernetes, and Containerization services. We're your partners in scaling and managing microservices, deploying cutting-edge technology, and mastering container orchestration.",
				),
				array(
					'img_src'   => '/app-dev/devops/d5.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Infrastructure Automation, Configurations, and Monitoring',
					'list_head' => 'Infrastructure Automation, Configurations, and Monitoring',
					'list_para' => 'Efficiency is at the core of Infrastructure Automation, Configurations, Monitoring, and Alerting Implementations. We modernize your infrastructure management through Infrastructure-as-Code, enhance efficiency with configurations and externalization, and implement top-notch monitoring and alerting systems using open-source and COTS tools.',
				),
				array(
					'img_src'   => '/app-dev/devops/d6.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Engineering Modernization with DevOps',
					'list_head' => 'Engineering Modernization with DevOps',
					'list_para' => "Our commitment to Engineering Modernization with DevOps ensures your business stays at the forefront of industry advancements. We're here to transform your operations and propel you into the future.",
				),
			),
		),
		'proposal'            => array(
			'head_html' => '<h2>Optimize your operations with our cutting-edge DevOps Services</h2>',
			'btn_text'  => 'Talk to Experts',
			'anchor'    => true,
			'btn_url'   => '/contact-us',
		),
		'dev_process'         => array(
			'main_title' => 'Explore Our DevOps Solutions',
			'lang_title' => 'DevOps Consulting Services',
			'lang_para'  => "Embark on a transformational journey with our elite DevOps Consulting Services. Our team of experts specializes in maximizing your efficiency and productivity. With a focus on innovation and continuous improvement, we bring your DevOps goals to life. Join us today for a brighter tomorrow!",
			'listing'    => array(
				array(
					'img_src' => '/app-dev/devops/dp-1.png',
					'title'   => 'Crafting a Clear Path to Success',
					'para'    => "Embarking on a DevOps journey without a well-defined roadmap is like setting sail without a destination. At our core, we are DevOps experts who excel in charting out the perfect strategy and roadmap tailored to your unique needs. Whether you're just starting your DevOps voyage or are navigating a transformation, our custom DevOps consulting services will guide you to success with clear, measurable outcomes.",
				),
				array(
					'img_src' => '/app-dev/devops/dp-2.png',
					'title'   => 'Nurturing Your DevOps Evolution',
					'para'    => "DevOps isn't just a goal; it's a continuous evolution toward a future of streamlined automation and impeccable release pipelines. Our DevOps maturity audits are your compass on this journey. Our experts meticulously assess your current DevOps maturity, pinpointing gaps and recommending improvements that will set your organization on a path to greater efficiency and reliability.",
				),
				array(
					'img_src' => '/app-dev/devops/dp-3.png',
					'title'   => 'Tailoring Tools',
					'para'    => 'In the ever-evolving landscape of technology, choosing the right tools and platforms can be daunting. Our experts, armed with deep experience and expertise, provide tailored guidance. They recommend the most suitable tools and tech stack, perfectly aligned with your unique business use cases and constraints.',
				),
				array(
					'img_src' => '/app-dev/devops/dp-1.png',
					'title'   => 'Crafting a Clear Path to Success',
					'para'    => "Embarking on a DevOps journey without a well-defined roadmap is like setting sail without a destination. At our core, we are DevOps experts who excel in charting out the perfect strategy and roadmap tailored to your unique needs. Whether you're just starting your DevOps voyage or are navigating a transformation, our custom DevOps consulting services will guide you to success with clear, measurable outcomes.",
				),
				array(
					'img_src' => '/app-dev/devops/dp-2.png',
					'title'   => 'Nurturing Your DevOps Evolution',
					'para'    => "DevOps isn't just a goal; it's a continuous evolution toward a future of streamlined automation and impeccable release pipelines. Our DevOps maturity audits are your compass on this journey. Our experts meticulously assess your current DevOps maturity, pinpointing gaps and recommending improvements that will set your organization on a path to greater efficiency and reliability.",
				),
				array(
					'img_src' => '/app-dev/devops/dp-3.png',
					'title'   => 'Tailoring Tools',
					'para'    => 'In the ever-evolving landscape of technology, choosing the right tools and platforms can be daunting. Our experts, armed with deep experience and expertise, provide tailored guidance. They recommend the most suitable tools and tech stack, perfectly aligned with your unique business use cases and constraints.',
				),
			),
		),
		'our_process'         => array(
			'subtitle' => 'boost efficiency with DevOps for your business success.',
			'title'    => 'Our Methodology for DevOps',
			'para'     => 'At the heart of our DevOps approach lies a commitment to excellence, leveraging the best CI/CD processes, tools, and practices to fast-track your software delivery. Our DevOps consulting company excels in transforming your IT landscape with the following key elements:',
			'listing'  => array(
				array(
					'bg_image'  => '/app-dev/devops/p1.webp',
					'title'     => 'Assessment and',
					'red_title' => 'Planning',
					'para'      => 'We meticulously evaluate your current processes and IT infrastructure, crafting a comprehensive roadmap for seamless infrastructure automation.',
				),
				array(
					'bg_image'  => '/app-dev/devops/p2.webp',
					'title'     => 'Infrastructure',
					'red_title' => 'Automation',
					'para'      => 'We expertly configure build servers, testing, staging, and production environments, leaving no stone unturned in our quest for complete infrastructure automation.',
				),
				array(
					'bg_image'  => '/app-dev/devops/p3.webp',
					'title'     => 'Continuous',
					'red_title' => 'Integration',
					'para'      => 'Our dedicated team ensures that code changes seamlessly integrate into a single repository, triggering automated builds and tests whenever a team member makes updates to version control.',
				),
				array(
					'bg_image'  => '/app-dev/devops/p4.webp',
					'title'     => 'Continuous',
					'red_title' => 'Deployment',
					'para'      => 'As your trusted DevOps service providers, we flawlessly deploy complex applications, navigating the intricate waters of the CI/CD pipeline to prevent bugs and delays.',
				),
				array(
					'bg_image'  => '/app-dev/devops/p5.webp',
					'title'     => 'Stringent Security',
					'red_title' => 'Protocols',
					'para'      => "Security is our stronghold, and as the leading DevOps consulting company, we embed robust security practices from the project's inception. Our automated security testing and compliance processes, executed through industry-leading tools, guarantee uncompromising protection.",
				),
			),
		),
		'dev_process_steps'   => array(
			'main_title' => 'Discover topnotch DevSecOps services',
			'lang_title' => 'DevSecOps Services',
			'lang_para'  => 'Safeguarding your development process is paramount. At TechnBrains, we bring you cutting-edge DevSecOps solutions that seamlessly integrate security into your workflow, mitigating risks and vulnerabilities proactively.',
			'classes'    => 'box-left-align',
			'listing'    => array(
				array(
					'img_src' => '/app-dev/devops/fortify.png',
					'title'   => 'Fortify Your Cloud with Security Audits',
					'para'    => 'As one of the leading DevOps Consulting Companies, we prioritize your security and privacy on AWS, Azure, and GCP. Our Cloud Infrastructure Security Audit Services meticulously assess your cloud infrastructure, web, and mobile applications using state-of-the-art tools. We deliver comprehensive reports with actionable recommendations to fortify your defenses.',
				),
				array(
					'img_src' => '/app-dev/devops/trust.png',
					'title'   => 'Automated Security Scans for Cloud Applications',
					'para'    => 'At TechnBrains, as a rapid-rising cloud service company, we conduct automated and tool-driven security scans for your web and mobile applications. Our insightful reports, recommendations, and industry best practices empower you to thwart potential attacks before they occur.',
				),
				array(
					'img_src' => '/app-dev/devops/cloud.png',
					'title'   => 'Your Trusted Cloud Security Partner',
					'para'    => 'Securing the cloud demands a seasoned partner, and TechnBrains stands as the industry\'s benchmark. We excel in crafting secure cloud solutions, implementing security tools and services across infrastructure layers, and establishing robust pipelines. Trust us to deliver foolproof solutions that adhere to the highest industry standards.',
				),
				array(
					'img_src' => '/app-dev/devops/fortify.png',
					'title'   => 'Fortify Your Cloud with Security Audits',
					'para'    => 'As one of the leading DevOps Consulting Companies, we prioritize your security and privacy on AWS, Azure, and GCP. Our Cloud Infrastructure Security Audit Services meticulously assess your cloud infrastructure, web, and mobile applications using state-of-the-art tools. We deliver comprehensive reports with actionable recommendations to fortify your defenses.',
				),
				array(
					'img_src' => '/app-dev/devops/trust.png',
					'title'   => 'Automated Security Scans for Cloud Applications',
					'para'    => 'At TechnBrains, as a rapid-rising cloud service company, we conduct automated and tool-driven security scans for your web and mobile applications. Our insightful reports, recommendations, and industry best practices empower you to thwart potential attacks before they occur.',
				),
				array(
					'img_src' => '/app-dev/devops/cloud.png',
					'title'   => 'Your Trusted Cloud Security Partner',
					'para'    => 'Securing the cloud demands a seasoned partner, and TechnBrains stands as the industry\'s benchmark. We excel in crafting secure cloud solutions, implementing security tools and services across infrastructure layers, and establishing robust pipelines. Trust us to deliver foolproof solutions that adhere to the highest industry standards.',
				),
			),
		),
		'app_dev_form'        => array(
			'title' => 'Tailored DevOps Solutions To Propel Your Business To New Heights',
			'para'  => "Ready to transform your business dynamics? Click now to open our tailored contact form. Let's shape your DevOps success story together. Your journey to excellence starts here!",
		),
		'dev_services'        => array(
			'subtitle' => 'Tap into DevOps Excellence',
			'title'    => 'Why Choose TechnBrains As Your DevOps Services Partner?',
			'para'     => 'When it comes to elevating your business with DevOps, TechnBrains is the name to trust. Our clients opt for us to unlock business agility, drive efficiency, and trim costs through',
			'listing'  => array(
				array(
					'img_src' => '/app-dev/devops/d-banner.webp',
					'width'   => '558',
					'height'  => '497',
					'content' => array(
						array(
							'title' => 'Extensive Delivery Expertise',
							'para'  => 'With over eight years of experience, we excel in optimizing the release cycles of various applications. Our proficient team automates real-time code corrections across the development process, safeguarding your business against security breaches.',
						),
						array(
							'title' => 'Highly-Skilled DevOps Engineers',
							'para'  => 'Our DevOps engineers are masters of cutting-edge technologies, ensuring excellence at every step of your DevOps transformation journey. We prioritize delivery excellence, foster an agile culture, and uphold process orientation in all our endeavors.',
						),
						array(
							'title' => 'Top-Notch Security Integration',
							'para'  => 'TechnBrains prioritizes security and compliance from project inception, eliminating potential defects and leading to reduced costs and quicker product releases. Our DevSecOps services seamlessly integrate security into the core of your product while providing proven methods to monitor results.',
						),
						array(
							'title' => 'Dedicated DevOps Team',
							'para'  => 'Every TechnBrains client receives a dedicated team of DevOps specialists committed to solving issues with a personalized approach. As a DevOps consulting firm, we thoroughly understand your project requirements and implement the best DevOps practices to achieve the results your business aspires for.',
						),
					),
				),
			),
		),
		'stack_new_box'       => array(
			'subtitle' => "Redefine your app's visual appeal with TechnBrains",
			'title'    => 'DevOps Tools and Platforms We Use',
			'para'     => "For a DevOps transformation that truly measures and maximizes your system's impact, choose Technbrains. We believe in the power of precision, and our arsenal of DevOps tools and platforms reflects our commitment to your digital success.",
			'listing'  => array(
				array(
					'tab_title' => 'Cloud Platform',
					'data_list' => array(
						array( 'title' => 'AWS' ),
						array( 'title' => 'Google' ),
						array( 'title' => 'Azure' ),
					),
				),
				array(
					'tab_title' => 'Configuration Management',
					'data_list' => array(
						array( 'title' => 'Puppet' ),
						array( 'title' => 'CF Engine' ),
						array( 'title' => 'Chef' ),
						array( 'title' => 'Terraform' ),
						array( 'title' => 'Ansible' ),
					),
				),
				array(
					'tab_title' => 'Log Management',
					'data_list' => array(
						array( 'title' => 'New Relic' ),
						array( 'title' => 'Prometheus' ),
						array( 'title' => 'Fluentd' ),
						array( 'title' => 'Grafana' ),
						array( 'title' => 'Datadog' ),
						array( 'title' => 'Splunk' ),
					),
				),
				array(
					'tab_title' => 'Performance & Security',
					'data_list' => array(
						array( 'title' => 'Owasp' ),
						array( 'title' => 'Jmeter' ),
						array( 'title' => 'Checkmarx' ),
						array( 'title' => 'Locust' ),
						array( 'title' => 'Sonarqube' ),
						array( 'title' => 'Blazemeter' ),
					),
				),
				array(
					'tab_title' => 'Database',
					'data_list' => array(
						array( 'title' => 'Mysql' ),
						array( 'title' => 'SQL server' ),
						array( 'title' => 'PostgreSQL' ),
						array( 'title' => 'Mongodb' ),
						array( 'title' => 'Cassandra' ),
						array( 'title' => 'Dynamo DB' ),
					),
				),
				array(
					'tab_title' => 'Scripting',
					'data_list' => array(
						array( 'title' => 'Bash' ),
						array( 'title' => 'PowerShell' ),
						array( 'title' => 'Python' ),
						array( 'title' => 'Groovy' ),
						array( 'title' => 'Lua' ),
					),
				),
			),
		),
		'faqs'                => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array(
					'faqhead' => 'What is DevOps?',
					'faqbody' => "DevOps, an amalgamation of 'development' (Dev) and 'operations' (Ops), is a groundbreaking approach designed to revolutionize the software development and delivery process. By seamlessly blending automation, monitoring, and collaborative practices, DevOps bridges the historical divide between development and IT operations. This transformation aims to accelerate the software development life cycle, enabling companies to release applications swiftly, frequently, and with impeccable quality.",
				),
				array(
					'faqhead' => 'Why do companies need DevOps?',
					'faqbody' => "Companies are turning to DevOps to attain a competitive edge in today's ever-evolving digital landscape. DevOps offers the promise of increased operational efficiency, reduced costs, and quicker time-to-market for new software products and features. It transforms the traditional approach to software development and allows organizations to remain agile, adapt rapidly to changes, and provide high-quality software-driven solutions to their customers.",
				),
				array(
					'faqhead' => 'How can I start my DevOps transformation journey?',
					'faqbody' => "Starting your DevOps transformation journey is a pivotal step in the path to digital success. TechnBrains, a leading DevOps service provider, offers a wide range of services to help initiate and propel this transformation.<br><br>Collaboration: DevOps is all about breaking down the silos between development and operations teams. Effective collaboration between these two entities is the foundation of success.<br><br>Automation: It involves automating manual processes, such as testing, deployment, and provisioning, reducing the margin for human error and expediting the delivery pipeline.<br><br>Continuous Integration and Delivery (CI/CD): CI/CD practices play a pivotal role in DevOps success. These practices involve the frequent integration of code changes, automated testing, and continuous delivery to production.<br><br>Monitoring and Feedback: Real-time monitoring is essential for identifying bottlenecks, issues, and performance improvements.<br><br>Cultural Shift: Perhaps the most transformative factor is the cultural shift towards agility and innovation. TechnBrains helps organizations instill this cultural change for lasting success.",
				),
				array(
					'faqhead' => 'What DevOps services do TechnBrains offer?',
					'faqbody' => 'TechnBrains is a distinguished DevOps solution provider offering an extensive suite of services. Their offerings encompass Azure DevOps services, AWS DevOps services, Jenkins automation, Docker containerization, Kubernetes orchestration, Git version control, Prometheus monitoring, and JIRA collaboration. Their versatile service portfolio covers a wide array of DevOps tools and platforms to cater to the unique needs of every client.',
				),
				array(
					'faqhead' => 'What are the Benefits of DevOps Implementation?',
					'faqbody' => "With TechnBrains as your partner in DevOps implementation, you can reap these rewards, ensuring your business thrives in the digital era.<br><br>Faster Time-to-Market: DevOps empowers companies to release software updates and new features more rapidly.<br><br>Enhanced Operational Efficiency: By automating repetitive and time-consuming tasks, DevOps optimizes operational processes.<br><br>Cost Reduction: DevOps streamlines the development and deployment processes, ultimately reducing operational costs.<br><br>Improved Software Quality: DevOps encourages continuous testing and integration, resulting in higher software quality.<br><br>Enhanced Collaboration: Collaboration between development and operations teams results in better communication and improved workflow.<br><br>Scalability: DevOps principles are inherently scalable. As your business grows, DevOps practices can quickly adapt to accommodate the increased workload.",
				),
				array(
					'faqhead' => 'How is TechnBrains different from other DevOps solution providers?',
					'faqbody' => "TechnBrain's unique combination of tailored solutions, a focus on maximizing digital business impact, extensive expertise, a proven track record, and a commitment to collaboration make them stand out. They understand that every business is unique and has distinct requirements. This approach ensures that the DevOps strategies they implement are precisely aligned with your specific needs.<br><br>They focus on ensuring that the implementation maximizes your digital business impact. Their commitment to driving your success sets them apart from other solution providers.",
				),
			),
		),
	),
	'components' => array(
		array( 'name' => 'main-banner',          'modifier_class' => '' ),
		array( 'name' => 'dedicated-lang-desc',  'modifier_class' => '' ),
		array( 'name' => 'language-services',    'modifier_class' => '' ),
		array( 'name' => 'proposal',             'modifier_class' => '' ),
		array( 'name' => 'development-process',  'modifier_class' => '' ),
		array( 'name' => 'our-process',          'modifier_class' => 'main-head-center gray-bg' ),
		array( 'name' => 'development-process',  'modifier_class' => '', 'args' => array( 'data_key' => 'dev_process_steps' ) ),
		array( 'name' => 'app-dev-form',         'modifier_class' => '' ),
		array( 'name' => 'development-services', 'modifier_class' => '' ),
		array( 'name' => 'stack-new-box',        'modifier_class' => '' ),
		array( 'name' => 'testimonials',         'modifier_class' => '' ),
		array( 'name' => 'main-faqs',            'modifier_class' => 'gray-bg' ),
	),
);
