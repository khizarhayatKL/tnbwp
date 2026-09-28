<?php
/**
 * Data Registry: servicenow-services
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(

		array(
			'@context'        => 'https://schema.org/',
			'@type'           => 'Product',
			'name'            => 'Premier ServiceNow Services | Technbrains',
			'image'           => 'https://www.technbrains.com/_next/image?url=%2Fimage%2Fplatform%2Fservice%2Fbanner.webp&w=1200&q=75',
			'description'     => 'Streamline your workflows with ServiceNow Services. Explore TechnBrains expert services to optimize your IT service management and drive efficiency.',
			'brand'           => array( '@type' => 'Brand', 'name' => 'TechnBrains' ),
			'aggregateRating' => array(
				'@type'       => 'AggregateRating',
				'ratingValue' => '4.8',
				'bestRating'  => '5',
				'worstRating' => '1',
				'reviewCount' => '14',
			),
			'review'          => array(
				'@type'     => 'Review',
				'author'    => array( '@type' => 'Organization', 'name' => 'TechnBrains' ),
				'publisher' => array( '@type' => 'Organization', 'name' => 'Clutch' ),
				'url'       => 'https://clutch.co/profile/technbrains',
			),
		),

		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array(
					'@type'          => 'Question',
					'name'           => 'What ServiceNow services does TechnBrains offer?',
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'TechnBrains offers end-to-end ServiceNow services including implementation, managed services, application development, security operations, IT service management, HR service management, IT operations management, DevOps, consulting, and custom software development.' ),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'How can ServiceNow reduce operational costs?',
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'With certified ServiceNow consultants and proven methodologies, TechnBrains can help lower operational costs by up to 50% through streamlined workflows, process automation, and efficient IT service management.' ),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Are TechnBrains ServiceNow consultants certified?',
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, TechnBrains has ServiceNow Associates, ITIL-certified professionals, and a team with varied skills including implementation specialists, application developers, and system administration experts.' ),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What industries does TechnBrains serve with ServiceNow?',
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'TechnBrains serves diverse industries including retail & e-commerce, healthcare, real estate, fintech, education, energy and utilities, on-demand, logistics, and SaaS.' ),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What are the benefits of ServiceNow for businesses?',
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'ServiceNow helps businesses elevate customer experiences, enhance employee productivity, automate finance and supply chain processes, build organizational resilience, enable hyperautomation and low-code development, and transform digital operations.' ),
				),
			),
		),

		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Service',
			'serviceType' => 'ServiceNow Services',
			'name'        => 'Premier ServiceNow Services | Technbrains',
			'description' => 'Streamline your workflows with ServiceNow Services. Explore TechnBrains expert services to optimize your IT service management and drive efficiency.',
			'url'         => 'https://www.technbrains.com/platforms/servicenow-services',
			'provider'    => array(
				'@type'           => 'Organization',
				'name'            => 'TechnBrains',
				'url'             => 'https://www.technbrains.com',
				'logo'            => 'https://www.technbrains.com/image/revamp/logo-w.svg',
				'contactPoint'    => array( '@type' => 'ContactPoint', 'contactType' => 'Customer Support', 'availableLanguage' => 'English' ),
				'aggregateRating' => array(
					'@type'       => 'AggregateRating',
					'ratingValue' => '4.8',
					'reviewCount' => '200',
					'bestRating'  => '5',
					'worstRating' => '1',
				),
				'review'          => array(
					array( '@type' => 'Review', 'author' => array( '@type' => 'Person', 'name' => 'Sabrina Nawalrai Scott' ), 'reviewBody' => 'Technbrains delivered the project on time and consistently provided us with updates and feedback. Their transparency throughout the process allowed us to trust and rely on their work.',                               'publisher' => array( '@type' => 'Organization', 'name' => 'Clutch' ) ),
					array( '@type' => 'Review', 'author' => array( '@type' => 'Person', 'name' => 'Adam Zwingler' ),          'reviewBody' => 'The agency has grown by more than 40% in the past six months thanks to Technbrains technical expertise. Their team excels at keeping projects well-organized, which helps development progress efficiently.', 'publisher' => array( '@type' => 'Organization', 'name' => 'Clutch' ) ),
					array( '@type' => 'Review', 'author' => array( '@type' => 'Person', 'name' => 'Mindi Boysen' ),           'reviewBody' => 'Thanks to Technbrains development prowess. The team has gone the extra mile to exceed the needs and requirements of the internal team.',                                                                    'publisher' => array( '@type' => 'Organization', 'name' => 'Clutch' ) ),
					array( '@type' => 'Review', 'author' => array( '@type' => 'Person', 'name' => 'Chris Degenaars' ),        'reviewBody' => 'Conscious of internal bandwidth, Technbrains excels at working independently and offering suggestions proactively. The solution outperformed expectations significantly upon launch.',                 'publisher' => array( '@type' => 'Organization', 'name' => 'Clutch' ) ),
				),
			),
		),

	),

	'mock_data' => array(

		'main_banner' => array(
			'head_text'  => 'Leading ServiceNow Services',
			'content'    => 'TechnBrains offers top-notch ServiceNow assistance to help businesses modernize IT and improve service delivery. With certified SN consultants, our professional services can help lower costs by up to 50%. Contact us today to chart the course for your success.',
			'img_src'    => '/platform/service/banner.webp',
			'img_width'  => '671',
			'img_height' => '718',
			'img_alt'    => 'service-banner',
			'btn_link'   => '/contact-us',
			'btn_link_text' => 'Learn More',
			'popup_text' => 'GET FREE QUOTE',
		),

		'dedicated_lang_desc' => array(
			'para_html' => '<span>ServiceNow</span> is a powerful enterprise platform that streamlines business processes and workflows, enabling efficient and seamless service delivery. TechnBrains\' team of <span>ServiceNow-certified experts</span>, with their industry-specific knowledge and proven methodologies, can help you leverage the full potential of ServiceNow to transform your business and drive productivity, customer loyalty, and business agility.<br><br><span>Custom software development with ServiceNow</span> offers efficiency, productivity, and innovation. Unlike off-the-shelf solutions, our specialized services optimize your operations to eliminate unnecessary features and limitations.',
		),

		'language_services' => array(
			'head_text' => 'TechnBrains ServiceNow Solutions',
			'para_text' => 'As a premier go-to-market partner for ServiceNow, we offer end-to-end services across various categories, such as strategy and consulting, system implementation, and operation services.',
			'btn_text'  => 'Book AN APPOINTMENT',
			'listing'   => array(
				array( 'img_src' => '/platform/service/d1.png',  'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow Implementation Services',    'list_para' => 'Our implementation services for ServiceNow are designed to help your organization make the most of the platform\'s capabilities. Our team of experts will work with you to optimize processes and configure and customize the platform to meet your unique business needs. Our services can help you achieve increased operational efficiency, streamlined workflows, and accelerated digital transformation.' ),
				array( 'img_src' => '/platform/service/d2.png',  'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow Managed Services',           'list_para' => 'Speed up day-to-day IT tasks to our managed services. Our experts provide proactive monitoring, incident resolution, and regular platform updates for optimal performance and reliability.' ),
				array( 'img_src' => '/platform/service/d3.png',  'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow Application Services',        'list_para' => 'We offer personalized and scalable applications that expand the capabilities of the SN platform. Our team of experts uses a robust development framework to create customized applications that improve user experiences. Our SN apps guarantee better operational efficiency, faster innovation, and a tailored approach to meet your business requirements.' ),
				array( 'img_src' => '/platform/service/d4.png',  'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow Security Operations',         'list_para' => 'Our ServiceNow Security Operations Services offer a complete solution for detecting threats, responding to incidents, and managing compliance. We utilize the ServiceNow platform to provide proactive threat hunting, incident management, and security orchestration. With our services, you can benefit from improved visibility into your security posture, faster incident response, and enhanced regulatory compliance.' ),
				array( 'img_src' => '/platform/service/d5.png',  'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow Customer Service Management', 'list_para' => 'Our solutions are designed to help you provide outstanding customer experiences. We offer features like self-service portals, effective case management, and proactive issue resolution to help you boost customer satisfaction, reduce response times, and build customer loyalty. Additionally, our services provide a unified view of all customer interactions, streamline your processes, and offer personalized support across multiple channels.' ),
				array( 'img_src' => '/platform/service/d6.png',  'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow IT Service Management',        'list_para' => 'We enable efficient incident management, change control, and service requests with automated workflows, self-service options, and real-time analytics to enhance service delivery, minimize downtime, and optimize resource utilization.' ),
				array( 'img_src' => '/platform/service/d7.png',  'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow Integration Hub',              'list_para' => 'Our team of ServiceNow-certified experts can help you seamlessly integrate with external systems, applications, and data sources. We have extensive experience in integration architecture, API management, and data synchronization to ensure that your IT ecosystem is connected and efficient. By working with us, you can benefit from real-time data visibility, streamlined workflows, and better decision-making.' ),
				array( 'img_src' => '/platform/service/d8.png',  'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow HR Service Management',        'list_para' => 'Our solutions aim to improve your HR operations by providing streamlined employee services, efficient onboarding, and enhanced workforce experiences. We can help you centralize HR processes, reduce administrative burdens, and improve compliance. Our core services include case and knowledge management, employee service center, employee document management, onboarding and transitions, performance analytics, and more.' ),
				array( 'img_src' => '/platform/service/d9.png',  'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow IT Operations Management',     'list_para' => 'Our IT operations management solutions in ServiceNow provide proactive monitoring, analysis, and optimization of your IT infrastructure. With features like event management, performance analytics, and service mapping, you can gain real-time insights, resolve issues quickly, and ensure critical services\' availability.' ),
				array( 'img_src' => '/platform/service/d10.png', 'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow DevOps',                       'list_para' => 'Our services streamline software delivery by bridging the gap between development and operations. We enable faster time-to-market, better software quality, and team collaboration with automation, collaboration tools, and CI/CD pipelines. You can also expect increased agility, reduced release cycles, and happier customers.' ),
				array( 'img_src' => '/platform/service/d11.png', 'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow IT Asset Management',          'list_para' => 'Our ServiceNow IT asset management solutions provide automated discovery, tracking, and lifecycle management for complete visibility and control over your IT assets. Optimize asset utilization, lower costs, and ensure compliance with licensing and regulatory requirements. Improve decision-making, minimize risks, and optimize IT asset investments.' ),
				array( 'img_src' => '/platform/service/d12.png', 'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow Consulting Services',          'list_para' => 'We offer ServiceNow consulting services to help you get the most out of your investment. Our experienced consultants will work with you to assess your needs, create a roadmap, and implement best practices. With our help, you can improve efficiency, increase ROI, and achieve your business goals faster.' ),
				array( 'img_src' => '/platform/service/d13.png', 'width' => '80', 'height' => '80', 'list_head' => 'Hire ServiceNow Developers',              'list_para' => 'Access top-notch ServiceNow talent for your projects with our skilled and certified SN developers. Our experienced team seamlessly integrates with yours to deliver high-quality solutions. Outsourcing to us guarantees reduced time-to-hire, flexible resourcing, and scalability based on project needs.' ),
				array( 'img_src' => '/platform/service/d14.png', 'width' => '80', 'height' => '80', 'list_head' => 'ServiceNow Custom Software Development',   'list_para' => 'Our custom software development using ServiceNow offers efficiency, productivity, and innovation. Our certified experts ensure 100% precise results that align with your business goals. We deliver cost-effective solutions with seamless integrations and faster time-to-market.' ),
			),
		),

		'dev_services' => array(
			'subtitle' => 'Transform with TechnBrains',
			'title'    => 'Why Choose TechnBrains As Your Servicenow Service Provider?',
			'para'     => 'Experience the TechnBrains Advantage with our commitment to excellence',
			'listing'  => array(
				array(
					'img_src' => '/platform/service/dev-list.webp',
					'width'   => '534',
					'height'  => '745',
					'content' => array(
						array( 'title' => 'ISO-Certified',              'para' => 'Adhering to stringent quality standards, ensuring exceptional global services.' ),
						array( 'title' => 'Certified Experts',          'para' => 'ServiceNow Associates and ITIL-certified professionals for excellence in implementation, development, and support.' ),
						array( 'title' => 'Diverse Expertise',          'para' => 'A qualified team with varied skills, including implementation specialists, application developers, and system administration experts.' ),
						array( 'title' => 'Industry Leaders',           'para' => 'Over a decade of experience in the ServiceNow ecosystem, providing reliable and innovative solutions.' ),
						array( 'title' => 'Cutting-Edge Solutions',     'para' => 'Stay updated with the latest ServiceNow enhancements for advanced technical know-how.' ),
						array( 'title' => 'Efficient Project Delivery', 'para' => 'Streamlined processes, quality assurance, and a 4-step implementation model for successful project outcomes.' ),
						array( 'title' => 'Global Presence',            'para' => 'Proven track record with 200+ customers delivering high-quality solutions globally.' ),
						array( 'title' => 'Cost-Effective',             'para' => 'Flexible pricing models starting at $20/hour, catering to diverse project scopes and budgetary needs. Unlock the power of ServiceNow with TechnBrains.' ),
					),
				),
			),
		),

		'proposal' => array(
			'head_html' => '<h2>Looking To Increase Your Business Productivity By Up To 50%? Contact TechnBrains For Top-Notch Servicenow Services</h2>',
			'btn_text'  => 'reach out now!',
		),

		'key_things' => array(
			'sub_title' => 'Use ServiceNow with Us',
			'title'     => 'Key Things To Know About ServiceNow',
			'listing'   => array(
				array(
					'tab_title'   => 'Benefits of ServiceNow',
					'tab_content' => '<p>ServiceNow empowers organizations not only to meet but also to exceed their goals, driving innovation, efficiency, and superior overall business performance.</p><h4>1. Elevate Customer Experiences</h4><p>Transform customer interactions with ServiceNow, providing seamless and personalized experiences that exceed expectations fostering loyalty and satisfaction.</p><h4>2. Enhance Employee Experiences</h4><p>Empower your workforce with a user-friendly and efficient platform. ServiceNow enhances employee experiences by streamlining processes, enabling collaboration, and fostering a positive workplace culture.</p><h4>3. Automate Finance and Supply Chain</h4><p>Drive operational efficiency by automating finance and supply chain processes. ServiceNow\'s robust automation capabilities optimize workflows, reduce errors, and ensure timely financial and supply chain management.</p><h4>4. Build Resilience</h4><p>ServiceNow helps organizations build resilience by providing real-time visibility into operations, enabling proactive problem-solving, and ensuring business continuity in the face of challenges.</p><h4>5. Hyperautomation and Low Code</h4><p>Leverage hyperautomation and low-code capabilities to accelerate digital transformation. ServiceNow enables rapid application development, process automation, and seamless integration, reducing time-to-market for new solutions.</p><h4>6. Transform Digital Operations</h4><p>Revolutionize digital operations with ServiceNow\'s comprehensive suite of tools. From IT service management to cybersecurity and beyond, the platform enables organizations to modernize and optimize their digital operations.</p>',
				),
				array(
					'tab_title'   => 'Business Agility with ServiceNow',
					'tab_content' => '<p>ServiceNow, with its versatile platform, plays a pivotal role in unlocking business agility for organizations across diverse industries.</p><h4>1. Streamlined Processes and Workflow Automation</h4><p>ServiceNow provides a unified platform that streamlines processes across different departments. By automating routine tasks and workflows, organizations can eliminate bottlenecks, reduce manual efforts, and ensure seamless operations. This agility in internal processes translates to quicker response times and improved efficiency.</p><h4>2. Rapid Adaptation to Market Changes</h4><p>The dynamic nature of markets demands swift responses to changes in trends, customer preferences, and competitive landscapes. ServiceNow equips organizations with real-time insights and analytics, enabling them to make informed decisions promptly. This agility in decision-making ensures that businesses can adapt to market shifts with speed and precision.</p><h4>3. Innovation Acceleration</h4><p>ServiceNow\'s platform is designed to foster innovation. With its low-code capabilities, organizations can quickly develop and deploy custom applications tailored to their evolving needs. This promotes a culture of continuous improvement and innovation, allowing businesses to stay ahead of the curve and explore new opportunities.</p><h4>4. Enhanced Collaboration and Communication</h4><p>Business agility thrives on effective communication and collaboration. ServiceNow provides a centralized communication hub where teams can collaborate in real time, share updates, and coordinate activities seamlessly. This ensures that information flows efficiently, fostering a collaborative environment that responds swiftly to emerging challenges.</p><h4>5. Flexible Scaling and Resource Management</h4><p>ServiceNow\'s platform is scalable, allowing organizations to adjust resources and capabilities based on demand. Whether scaling up during periods of growth or optimizing resources during downturns, businesses can adapt their operations to align with market dynamics, ensuring cost-effectiveness and resource efficiency.</p><h4>6. Customer-Centric Approach</h4><p>Business agility is incomplete without a customer-centric focus. ServiceNow enables organizations to enhance customer experiences by providing efficient support, personalized services, and streamlined interactions. Satisfied customers contribute to business resilience and agility, creating a positive feedback loop.</p>',
				),
				array(
					'tab_title'   => 'ServiceNow\'s Low-Code Application Development',
					'tab_content' => '<p>ServiceNow\'s introduction of low-code development has revolutionized the traditional application development landscape, offering organizations a powerful tool to expedite the creation and deployment of applications. This paradigm shift is a cause for delight, as it brings forth unprecedented efficiency and agility.</p><h4>Empowering Rapid Development</h4><p>ServiceNow\'s low-code capabilities empower organizations to rapidly create applications with minimal hand-coding. This is particularly advantageous for businesses that need to respond swiftly to changing market demands or internal requirements.</p><h4>Streamlining Deployment</h4><p>ServiceNow\'s low-code platform facilitates the seamless deployment of applications. By simplifying the development process, organizations can roll out new functionalities faster, ensuring that they stay ahead in the competitive digital landscape.</p><h4>Reducing Development Time</h4><p>Traditional application development often involves complex coding, elongating the time required to bring a concept from imagination to reality. ServiceNow\'s low-code approach significantly shortens this timeline, allowing businesses to be more responsive and agile in addressing evolving needs.</p><h4>Cost-Efficiency at its Core</h4><p>One of the key advantages of the low-code revolution is its cost-effectiveness. With reduced reliance on extensive coding and programming expertise, organizations can achieve their application development goals with fewer resources, ultimately resulting in significant cost savings.</p><h4>Enhanced Collaboration</h4><p>ServiceNow\'s low-code platform fosters collaboration between technical and non-technical teams. Business users can actively participate in the application development process, contributing their insights and requirements, leading to applications that better align with business objectives.</p><h4>Agility in Action</h4><p>In the dynamic business environment, agility is a prized asset. ServiceNow\'s low-code revolution enables organizations to swiftly adapt to changing conditions, providing them with a competitive edge. It allows for quick iterations and adjustments, ensuring that applications remain aligned with evolving business needs.</p><h4>Future-Proofing Development</h4><p>As technology continues to evolve, ServiceNow\'s low-code approach future-proofs application development. It enables organizations to stay current with the latest technological advancements without overhauling their entire development processes, ensuring sustained relevance and competitiveness.</p>',
				),
				array(
					'tab_title'   => 'Cybersecurity Resilience with ServiceNow',
					'tab_content' => '<p>ServiceNow helps businesses stay safe from cyber dangers. It\'s not just about finding and dealing with threats; it\'s also about taking care of the company\'s overall safety.</p><h4>1. Threat Detection</h4><p>ServiceNow excels in threat detection by leveraging advanced technologies and intelligent analytics. The platform continuously monitors networks, systems, and applications, swiftly identifying anomalies or suspicious activities that may indicate a potential security threat. Through real-time monitoring and automated alerting, organizations gain the upper hand in staying ahead of evolving cyber threats.</p><h4>2. Incident Response</h4><p>Rapid and effective incident response is a cornerstone of cybersecurity resilience. ServiceNow streamlines the incident response process by providing a centralized platform for collaboration and coordination among security teams. When a security incident occurs, the platform automates the workflow, ensuring that the right individuals are notified promptly. This accelerates the investigation and containment process, minimizing the impact of security incidents on the organization.</p><h4>3. Security Posture Management</h4><p>Managing the overall security posture involves a holistic approach to cybersecurity. ServiceNow acts as a comprehensive solution, offering tools and functionalities to assess, measure, and enhance an organization\'s security posture. This includes continuous vulnerability assessments, compliance monitoring, and the implementation of best practices. By providing a clear and real-time view of the security landscape, ServiceNow empowers organizations to address weaknesses and fortify their defenses proactively.</p><h4>4. Integration and Orchestration</h4><p>One of the key strengths of ServiceNow lies in its ability to integrate seamlessly with various security tools and technologies. This integration ensures a unified and centralized view of security data, enabling security teams to correlate information effectively. Moreover, ServiceNow\'s orchestration capabilities allow for the automation of routine security tasks, reducing manual efforts and response times. This not only enhances efficiency but also ensures a consistent and coordinated approach to cybersecurity.</p><h4>5. Continuous Improvement</h4><p>ServiceNow facilitates a culture of continuous improvement in cybersecurity. Through detailed analytics and reporting functionalities, organizations can gain insights into past incidents, identify trends, and refine their security strategies. The platform\'s feedback loop ensures that lessons learned from each incident contribute to ongoing improvements, making the cybersecurity posture more resilient over time.</p>',
				),
			),
		),

		'industries_slider' => array(
			'subtitle' => 'Leading Innovation - TechnBrains',
			'title'    => 'Industries Transformed by TechnBrains',
			'para'     => 'At TechnBrains, we revolutionize diverse industries by offering tailored applications that cater to the unique needs of each client.',
			'listing'  => array(
				array( 'img_src' => '/platform/retail.png',      'tab_title' => 'Retail & E-commerce',  'content' => 'Accelerate business growth with innovative solutions, from loyalty apps to online shopping mobile applications. Streamline operations with easy order tracking and inventory management.' ),
				array( 'img_src' => '/platform/health.png',      'tab_title' => 'Healthcare',           'content' => 'Make healthcare more accessible with specialized apps covering telemedicine, patient, and hospital applications—leverage technology for the betterment of healthcare services.' ),
				array( 'img_src' => '/platform/real-estate.png', 'tab_title' => 'Real Estate',          'content' => 'Conquer the real estate world with retail mobile app solutions. Whether dealing in rentals or property purchases, our refined searches empower customers to find exactly what they need.' ),
				array( 'img_src' => '/platform/fintech.png',     'tab_title' => 'FinTech',              'content' => 'Boost your FinTech business with expert digital solutions. From secure financial data apps to portfolio management websites, we provide innovative and secure solutions to double your investment.' ),
				array( 'img_src' => '/platform/education.png',   'tab_title' => 'Education',            'content' => 'Make education accessible to everyone with our app development. Create unique eLearning apps and websites, bringing innovative concepts to life.' ),
				array( 'img_src' => '/platform/energy.png',      'tab_title' => 'Energy and Utilities', 'content' => 'Support energy and utility businesses with reliable software development, maintenance, and consulting services. Tailored to meet unique needs, our services enhance customer satisfaction and financial success.' ),
				array( 'img_src' => '/platform/on-demand.png',   'tab_title' => 'On-Demand Solutions',  'content' => 'These innovative solutions offer a seamless interface for users, ensuring easy access to services, thereby enhancing efficiency and customer satisfaction.' ),
				array( 'img_src' => '/platform/logistic.png',    'tab_title' => 'Logistics Excellence', 'content' => 'Our logistics solutions redefine operational excellence, incorporating real-time tracking, route optimization, and inventory management. Tailored applications guarantee increased efficiency, cost reduction, and overall improvement in supply chain management for our clients.' ),
				array( 'img_src' => '/platform/saas.png',        'tab_title' => 'SaaS Innovations',     'content' => 'With a commitment to user-friendly interfaces and robust functionality, our SaaS offerings enhance operational efficiency, contributing to sustained business success.' ),
			),
		),

	),

	'components' => array(
		array( 'name' => 'main-banner',          'modifier_class' => '' ),
		array( 'name' => 'dedicated-lang-desc',  'modifier_class' => '' ),
		array( 'name' => 'language-services',    'modifier_class' => '' ),
		array( 'name' => 'development-services', 'modifier_class' => 'white-bg' ),
		array( 'name' => 'proposal',             'modifier_class' => '' ),
		array( 'name' => 'key-things',           'modifier_class' => '' ),
		array( 'name' => 'industries-slider',    'modifier_class' => '' ),
		array( 'name' => 'testimonials',         'modifier_class' => '' ),
	),

);
