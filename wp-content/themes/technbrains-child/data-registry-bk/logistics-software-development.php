<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array( '@type' => 'Question', 'name' => 'How much does it cost to develop custom logistics software?',                        'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Based on various factors, developing logistics software and mobile apps can cost between $70,000 and $500,000.' ) ),
				array( '@type' => 'Question', 'name' => 'How much time does it take to develop logistics software for a transport company?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'The time required for developing a logistics software system depends on several factors, such as the technology stack chosen, the front and back-end development process, the type of application and platform, the size of the development team, and more.' ) ),
				array( '@type' => 'Question', 'name' => 'What are the benefits of digitizing your logistics and transportation operations?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Digitization in transportation and logistics can provide a competitive edge by using advanced technologies to improve the supply chain, workforce productivity, partner communication, data insights, speed, connectivity, and client satisfaction.' ) ),
				array( '@type' => 'Question', 'name' => 'Which type of logistics and transportation software solutions do you build?',       'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'TechnBrains provides a range of software products such as fleet management, telematics, asset tracking, transportation management, freight and logistics, and shipping management. These software solutions are customizable to meet the specific needs and objectives of any business.' ) ),
				array( '@type' => 'Question', 'name' => 'Can you upgrade my existing logistics software solution?',                          'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'We build and upgrade custom logistics software solutions, integrating third-party services to enhance adaptability. Our services include API integration, infrastructure upgrades, and custom logistics management app development.' ) ),
			),
		),
	),

	'components' => array(
		array( 'name' => 'industry-banner',   'modifier_class' => '' ),
		array( 'name' => 'counter-sec',       'modifier_class' => '' ),
		array( 'name' => 'language-services', 'modifier_class' => '' ),
		array( 'name' => 'stack-new-box',     'modifier_class' => 'angular-stack' ),
		array( 'name' => 'industry-features', 'modifier_class' => '' ),
		array( 'name' => 'development-process','modifier_class' => '' ),
		array( 'name' => 'proposal',          'modifier_class' => 'logistics' ),
		array( 'name' => 'testimonials',      'modifier_class' => '' ),
		array( 'name' => 'main-faqs',         'modifier_class' => '' ),
	),

	'mock_data' => array(

		'industry_banner' => array(
    'title'             => 'Logistics Software Development Services',
    'para'              => 'Eliminate operational bottlenecks and unlock supply chain efficiency with TechnBrains\' logistics software development services. Our expert developers deliver high-performance solutions tailored for delivery, warehousing, and transportation businesses, ready for seamless digital transformation.',
    'second_button'     => false,
    'banner_img_src'    => '/industry/logistics/banner.webp',
    'banner_img_width'  => '668',
    'banner_img_height' => '667',
    'banner_img_alt'    => 'banner',
    'bg_image'          => '/industry/logistics/bg-main.webp',
),

		'counter_sec' => array(
			'listing' => array(
				array( 'count' => '45', 'sign' => '+', 'content' => 'Logistics Solutions Deployed' ),
				array( 'count' => '97', 'sign' => '%', 'content' => 'Logistics Client Satisfaction' ),
				array( 'count' => '7',  'sign' => 'x', 'content' => 'Improved Efficiency in the Supply Chain' ),
				array( 'count' => '6',  'sign' => 'x', 'content' => 'Revenue Growth by Enhancing Logistics Visibility' ),
			),
		),

		'language_services' => array(
    'head_text' => 'Explore Our Innovative Transport and Logistics Software Development Services',
    'para_text' => 'Your fast-paced business demands more than generic tools; it needs custom software development built around your operational realities. TechnBrains provides advanced logistics software development services that streamline processes, reduce overhead costs, and drive continuous innovation across your supply chain.',
    'btn_text'  => 'Book Your Consultation',
    'anchor'    => false,
    'listing'   => array(
        array( 'img_src' => '/industry/logistics/d1.png', 'width' => '80', 'height' => '80', 'alt' => 'Shipping Logistics Management Software Development', 'list_head' => 'Shipping Logistics Management Software Development', 'list_para' => 'Optimize warehouse and shipping operations with our advanced shipment management software. View export shipment reports, automate billing on dispatch, and manage multiple warehouse records from a single platform. Our mobile app development ensures warehouse supervisors and dispatch teams stay connected on the floor, while web app development gives operations managers a centralized dashboard accessible from any browser.' ),
        array( 'img_src' => '/industry/logistics/d2.png', 'width' => '80', 'height' => '80', 'alt' => 'Fleet Management Software Development',              'list_head' => 'Fleet Management Software Development',              'list_para' => 'Gain full visibility into your fleet with our software development for fleet management. Monitor vehicle locations, fuel consumption, and maintenance schedules in real time. Our fleet management applications put live vehicle tracking and route updates directly in drivers\' and dispatchers\' hands, while our enterprise app development supports multi-fleet operations across departments and regions from a single unified system.' ),
        array( 'img_src' => '/industry/logistics/d3.png', 'width' => '80', 'height' => '80', 'alt' => 'Telematics Software Development',                    'list_head' => 'Telematics Software Development',                    'list_para' => 'Our telematics software solutions enhance vehicle efficiency and traffic management across your transport network. For logistics managers overseeing multiple routes and vehicle categories, our web app development delivers browser-accessible telematics dashboards that consolidate live traffic data, route analysis, and fleet performance reporting without requiring local software installation.' ),
        array( 'img_src' => '/industry/logistics/d4.png', 'width' => '80', 'height' => '80', 'alt' => 'Asset Tracking Software Development',                 'list_head' => 'Asset Tracking Software Development',                 'list_para' => 'As a dedicated logistics software development company, we build precision asset tracking solutions to manage heavy equipment, tools, and vehicles across your operations. Our software covers asset performance management, computerized maintenance scheduling, warehouse management, integrated workplace management, and smart inventory management, giving you complete visibility and control over every asset in your ecosystem.' ),
        array( 'img_src' => '/industry/logistics/d5.png', 'width' => '80', 'height' => '80', 'alt' => 'Transportation Management Software Development',      'list_head' => 'Transportation Management Software Development',      'list_para' => 'Our software development solutions for transportation management span both web and mobile platforms. From real-time data interaction and custom reporting to business intelligence automation, our transportation logistics solutions improve user engagement and operational decision-making at every stage of the delivery lifecycle.' ),
        array( 'img_src' => '/industry/logistics/d6.png', 'width' => '80', 'height' => '80', 'alt' => 'Logistics and Freight Management Development',        'list_head' => 'Logistics and Freight Management Development',        'list_para' => 'Take control of your entire supply chain with our end-to-end freight and logistics management software. We deliver freight analysis, freight pay and audit, web-based logistics management development, reporting, and demand forecasting, giving logistics and freight businesses a unified platform for smarter operations.' ),
        array( 'img_src' => '/industry/logistics/d8.png', 'width' => '80', 'height' => '80', 'alt' => 'Order Management',                                    'list_head' => 'Order Management',                                    'list_para' => 'Our scalable order management software automates your order-handling process, streamlines product setup, supports dynamic pricing models, and enables global order fulfillment. We help logistics businesses achieve faster order execution, higher customer satisfaction, and stronger profit margins through intelligent software development.' ),
        array( 'img_src' => '/industry/logistics/d7.png', 'width' => '80', 'height' => '80', 'alt' => 'Warehouse Management',                                'list_head' => 'Warehouse Management',                                'list_para' => 'We provide AI development for logistics and warehouse management software that helps logistics companies efficiently manage inventory at scale. With intelligent planning and real-time operational support, our custom warehouse management solutions give you complete control over stock levels, storage optimization, and fulfillment accuracy.' ),
    ),
),

		'stack_new_box' => array(
    'subtitle' => 'Tools & Technologies We Use for Logistics Software Development',
    'title'    => 'Tech Stack We Use For Logistics Software Development',
    'listing'  => array(
        array(
            'tab_title' => 'Frontend & Experience Layer',
            'data_list' => array(
                array( 'title' => 'Angular' ),
                array( 'title' => 'ReactJS' ),
                array( 'title' => 'HTML5' ),
                array( 'title' => 'Next.js' ),
                array( 'title' => 'Vue.js' ),
                array( 'title' => 'TypeScript' ),
                array( 'title' => 'CSS3' ),
                array( 'title' => 'Progressive Web Apps (PWA)' ),
            ),
        ),
        array(
            'tab_title' => 'Backend & APIs',
            'data_list' => array(
                array( 'title' => 'Node.js' ),
                array( 'title' => 'PHP' ),
                array( 'title' => '.NET' ),
                array( 'title' => 'Python' ),
                array( 'title' => 'Java' ),
                array( 'title' => 'Go (Golang)' ),
                array( 'title' => 'REST APIs' ),
                array( 'title' => 'GraphQL' ),
                array( 'title' => 'Microservices Architecture' ),
            ),
        ),
        array(
            'tab_title' => 'Database & Data Management',
            'data_list' => array(
                array( 'title' => 'MySQL' ),
                array( 'title' => 'PostgreSQL' ),
                array( 'title' => 'MongoDB' ),
                array( 'title' => 'Redis' ),
                array( 'title' => 'Firebase' ),
                array( 'title' => 'Elasticsearch' ),
                array( 'title' => 'Apache Kafka (real-time data streaming)' ),
            ),
        ),
        array(
            'tab_title' => 'Cloud & DevOps Infrastructure',
            'data_list' => array(
                array( 'title' => 'AWS' ),
                array( 'title' => 'Microsoft Azure' ),
                array( 'title' => 'Google Cloud Platform (GCP)' ),
                array( 'title' => 'Docker' ),
                array( 'title' => 'Kubernetes' ),
                array( 'title' => 'CI/CD Pipelines' ),
                array( 'title' => 'Terraform' ),
                array( 'title' => 'Jenkins' ),
            ),
        ),
        array(
            'tab_title' => 'Logistics & Tracking Integrations',
            'data_list' => array(
                array( 'title' => 'GPS & Geolocation APIs' ),
                array( 'title' => 'Google Maps API' ),
                array( 'title' => 'Fleet Tracking Systems' ),
                array( 'title' => 'IoT Device Integration' ),
                array( 'title' => 'Real-time Shipment Tracking APIs' ),
                array( 'title' => 'Barcode & QR Code Systems' ),
            ),
        ),
        array(
            'tab_title' => 'Security & Compliance',
            'data_list' => array(
                array( 'title' => 'Data encryption (at rest & in transit)' ),
                array( 'title' => 'Secure authentication (OAuth 2.0, JWT)' ),
                array( 'title' => 'Role-based access control (RBAC)' ),
                array( 'title' => 'API security protocols' ),
                array( 'title' => 'Audit logs & compliance monitoring' ),
            ),
        ),
    ),
),

		'industry_features' => array(
    'classes'  => 'gray-bg',
    'subtitle' => 'Logistics Transformed with Feature-rich Apps',
    'title'    => 'Logistics Software Development with Feature-Rich Tracking and Operational Control',
    'para'     => 'TechnBrains delivers logistics software development services that help logistics and supply chain businesses improve shipment visibility, streamline operations, and manage end-to-end delivery workflows through custom-built systems designed for real operational environments.',
    'listing'  => array(
        array(
            'tab_title'   => 'Common Features',
            'tab_content' => array(
                array( 'img_src' => '/industry/logistics/f1.png', 'title' => 'Order Management',           'content' => 'Logistics and shipment tracking systems rely on structured order and billing workflows. Our software supports centralized and decentralized order management across warehouses, multi-location networks, and distribution systems, improving coordination between order processing, dispatch, and delivery.' ),
                array( 'img_src' => '/industry/logistics/f2.png', 'title' => 'Inventory Management',        'content' => 'Our logistics software helps monitor stock levels across warehouses, reduce discrepancies, and improve storage efficiency. It supports better planning of incoming and outgoing goods movement across locations.' ),
                array( 'img_src' => '/industry/logistics/f3.png', 'title' => 'Demand Forecasting',          'content' => 'Forecasting features analyze historical data and operational patterns to support inventory planning. This helps align supply with demand, reduce overstocking, and minimize fulfillment delays.' ),
                array( 'img_src' => '/industry/logistics/f4.png', 'title' => 'E-Commerce Integration',      'content' => 'We integrate logistics systems with e-commerce platforms to sync orders, shipment status, and delivery updates, reducing manual coordination and improving workflow efficiency.' ),
                array( 'img_src' => '/industry/logistics/f5.png', 'title' => 'Real-Time Shipment Visibility','content' => 'The system provides live tracking of shipments, vehicles, and stored goods, ensuring continuous visibility across the supply chain for both teams and customers.' ),
                array( 'img_src' => '/industry/logistics/f6.png', 'title' => 'Logistics Data Analytics',    'content' => 'Analytics features convert operational data into structured insights for monitoring fleet performance, delivery timelines, warehouse efficiency, and operational bottlenecks.' ),
                array( 'img_src' => '/industry/logistics/f7.png', 'title' => 'Role-Based Access Control',   'content' => 'The system supports role-based access for drivers, warehouse staff, managers, and administrators, ensuring secure and structured access to relevant data.' ),
                array( 'img_src' => '/industry/logistics/f8.png', 'title' => 'Operational Alerts',          'content' => 'Automated alerts notify stakeholders about delays, route changes, shipment updates, and disruptions, helping teams respond quickly and maintain delivery performance.' ),
            ),
        ),
        array(
            'tab_title'   => 'Advanced Features',
            'tab_content' => array(
                array( 'img_src' => '/industry/logistics/f9.png',  'title' => 'Real-Time Location Tracking', 'content' => 'GPS-based tracking provides live visibility of shipments and fleet vehicles, supporting route monitoring and delivery progress tracking.' ),
                array( 'img_src' => '/industry/logistics/f10.png', 'title' => 'Customizable Alerts',         'content' => 'Users can configure alerts for driver activity, delivery milestones, vehicle status, or route events based on operational needs.' ),
                array( 'img_src' => '/industry/logistics/f11.png', 'title' => 'IoT Sensor Integration',      'content' => 'IoT integration enables monitoring of temperature, humidity, vibration, and movement during transit to ensure cargo safety and compliance.' ),
                array( 'img_src' => '/industry/logistics/f12.png', 'title' => 'Vehicle Utilization Reporting','content' => 'The system tracks fleet usage, load efficiency, and route performance, replacing manual reporting with automated dashboards.' ),
            ),
        ),
        array(
            'tab_title'   => 'Technologies for Logistics',
            'tab_content' => array(
                array( 'img_src' => '/industry/logistics/f13.png', 'title' => 'Blockchain Technology', 'content' => 'Blockchain ensures secure and tamper-resistant records for shipments, transactions, and delivery confirmations, improving supply chain transparency.' ),
                array( 'img_src' => '/industry/logistics/f14.png', 'title' => 'RFID Technology',        'content' => 'RFID enables automated tracking of goods across warehouses and transit points, improving inventory accuracy and reducing manual errors.' ),
                array( 'img_src' => '/industry/logistics/f15.png', 'title' => 'BLE (Bluetooth Low Energy) Integration', 'content' => 'BLE supports proximity-based tracking and environmental monitoring for sensitive or high-value shipments.' ),
                array( 'img_src' => '/industry/logistics/f16.png', 'title' => 'GPS Tracking Systems',   'content' => 'GPS provides real-time location tracking of vehicles and shipments, enabling route monitoring and delivery visibility across operations.' ),
            ),
        ),
    ),
),

		'dev_process' => array(
    'main_title' => 'Agile Process For Your Logistics App',
    'lang_title' => 'Agile-Driven Logistics Software and App Development Process',
    'lang_para'  => 'As a distinguished logistics software development company, TechnBrains delivers solutions that elevate your operations and keep you ahead in a dynamic, rapidly evolving industry.',
    'listing'    => array(
        array( 'number' => '01', 'title' => 'Strategic Planning',                         'para' => 'We begin by deeply analyzing your requirements for shipping logistics software, transportation management, and logistics app development. This discovery phase defines the scope, technology stack, and architecture needed to build a solution that truly fits your business.' ),
        array( 'number' => '02', 'title' => 'Agile Development Methodology',              'para' => 'Our team applies Agile methodology to develop logistics software with the flexibility your industry demands. Iterative development cycles and real-time updates ensure your logistics management app evolves alongside your operational needs.' ),
        array( 'number' => '03', 'title' => 'Efficient Logistics Mobile App Development', 'para' => 'Our Android and iOS app developers ensure your operations are always at your fingertips. From real-time tracking and inventory management to driver communication tools, our apps are built to maximize efficiency on every device.' ),
        array( 'number' => '04', 'title' => 'Custom Logistics Software Development',      'para' => 'No two logistics businesses are the same. Our custom software development process is built around your specific workflows, integrations, and business objectives, delivering a solution that fits precisely, not approximately.' ),
        array( 'number' => '05', 'title' => 'Continuous Testing and Quality Assurance',   'para' => 'We prioritize quality at every stage of logistics software development. Continuous testing and rigorous QA cycles guarantee a reliable, high-performance solution with accurate data flows and a responsive, intuitive interface.' ),
        array( 'number' => '06', 'title' => 'Deployment and Ongoing Support',             'para' => 'Deployment is just the beginning. TechnBrains provides ongoing support and maintenance post-launch, monitoring performance, resolving issues proactively, and rolling out enhancements to keep your logistics software operating at peak efficiency long-term.' ),
    ),
),

		'proposal' => array(
    'head_html' => '<h2>Improve Visibility, Control, and Efficiency in Your Logistics Operations</h2>',
    'btn_text'  => 'Get a Free Consultation',
    'anchor'    => true,
    'btn_url'   => '/hire-dedicated-team',
),

		'faqs' => array(
    'head_text' => 'Things you might want to know',
    'listing'   => array(
        array( 'faqhead' => 'How much does it cost to develop custom logistics software?',               'faqbody' => 'The cost of logistics software development typically ranges from $25,000 to $300,000+, depending on features, integrations, fleet size, real-time tracking needs, and system complexity. Enterprise-grade solutions with IoT, AI, and multi-warehouse support fall on the higher end.' ),
        array( 'faqhead' => 'How long does it take to build logistics and transportation software?',     'faqbody' => 'Development timelines usually range from 3 to 9 months based on scope, modules, integrations, and customization level. Larger enterprise systems with advanced tracking and analytics may require longer development cycles.' ),
        array( 'faqhead' => 'What features are included in logistics software development?',             'faqbody' => 'Core features include shipment tracking, order management, inventory control, route optimization, real-time alerts, analytics dashboards, and role-based access control, along with optional IoT and GPS integration.' ),
        array( 'faqhead' => 'What are the benefits of digitizing logistics operations?',                 'faqbody' => 'Digitizing logistics operations improves shipment visibility, reduces manual errors, enhances delivery efficiency, optimizes fleet usage, and provides real-time data for better decision-making.' ),
        array( 'faqhead' => 'What types of logistics software solutions do you build?',                  'faqbody' => 'We develop transportation management systems (TMS), warehouse management systems (WMS), fleet management platforms, shipment tracking systems, and end-to-end supply chain management software.' ),
        array( 'faqhead' => 'Can you modernize or upgrade existing logistics software?',                 'faqbody' => 'Yes, we upgrade legacy logistics systems by improving architecture, adding real-time tracking, integrating APIs, enhancing UI/UX, and migrating systems to scalable cloud-based infrastructure.' ),
        array( 'faqhead' => 'What technologies are used in logistics software development?',             'faqbody' => 'We use technologies such as React, Node.js, Python, Java, Flutter, AWS, Docker, GPS APIs, RFID, and IoT integrations to build scalable logistics platforms.' ),
        array( 'faqhead' => 'How does real-time tracking work in logistics software?',                   'faqbody' => 'Real-time tracking uses GPS and IoT sensors to continuously monitor shipment location, vehicle movement, and delivery status, providing live updates across the supply chain.' ),
        array( 'faqhead' => 'How do you ensure security in logistics software systems?',                 'faqbody' => 'We implement encryption, secure APIs, role-based access, cloud security practices, and continuous monitoring to protect operational and customer data.' ),
    ),
),

	),
);
