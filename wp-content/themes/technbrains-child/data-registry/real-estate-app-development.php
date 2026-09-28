<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(),

	'components' => array(
		array( 'name' => 'industry-banner',    'modifier_class' => '' ),
		array( 'name' => 'counter-sec',        'modifier_class' => '' ),
		array( 'name' => 'language-services',  'modifier_class' => '' ),
		array( 'name' => 'industry-features',  'modifier_class' => '' ),
		array( 'name' => 'types-of-apps',      'modifier_class' => '' ),
		array( 'name' => 'stack-new-box',      'modifier_class' => 'angular-stack' ),
		array( 'name' => 'proposal',           'modifier_class' => '' ),
		array( 'name' => 'development-process','modifier_class' => '' ),
		array( 'name' => 'key-things',         'modifier_class' => '' ),
		array( 'name' => 'testimonials',       'modifier_class' => '' ),
		array( 'name' => 'main-faqs',          'modifier_class' => '' ),
	),

	'mock_data' => array(

		'industry_banner' => array(
    'title'             => 'Real Estate App Development Company',
    'para'              => 'As one of the top real estate app development company, TechnBrains builds custom app solutions that are intuitive, innovative, and feature-rich. Our real estate mobile app development solutions help boost your real-estate business with a user-friendly experience, backed by our mobile app development expertise and access to hire developers when you need to scale. Connect with our expert real estate app developers and grow with a modern approach.',
    'second_button'     => false,
    'banner_img_src'    => '/industry/real-estate/banner.webp',
    'banner_img_width'  => '666',
    'banner_img_height' => '676',
    'banner_img_alt'    => 'banner',
    'bg_image'          => '/industry/real-estate/bg-main.webp',
),

		'counter_sec' => array(
			'listing' => array(
				array( 'count' => '100', 'sign' => '+', 'content' => 'Apps Delivered' ),
				array( 'count' => '100', 'sign' => '%', 'content' => 'Client Satisfaction' ),
				array( 'count' => '10',  'sign' => 'x', 'content' => 'Faster Time-to-Market' ),
				array( 'count' => '5',   'sign' => 'x', 'content' => 'Revenue Growth' ),
			),
		),

		'language_services' => array(
    'head_text' => 'Real Estate App Development Services We Offer',
    'para_text' => 'TechnBrains provides exceptional real estate app developers that seamlessly connect sellers, buyers, and agents via mobile devices.',
    'btn_text'  => 'Get a Free Consultation',
    'anchor'    => false,
    'listing'   => array(
        array( 'img_src' => '/industry/real-estate/d1.png',  'width' => '80', 'height' => '80', 'alt' => 'Real Estate Mobile App',                'list_head' => 'Real Estate <a href="/mobile-app-development/">Mobile App</a>',                'list_para' => 'TechnBrains provides exceptional real estate mobile app development services that seamlessly connect sellers, buyers, and agents via mobile devices.' ),
        array( 'img_src' => '/industry/real-estate/d2.png',  'width' => '80', 'height' => '80', 'alt' => 'Real Estate <a href="/web-app-development/">Web App</a>',                    'list_head' => 'Real Estate Web App',                    'list_para' => 'As a leading real estate web app development company, we provide effective solutions that enhance the digital presence of real estate businesses. Our web apps have dynamic product displays with <a href="/blog/ai-in-real-estate/" target="_blank">AI-powered product suggestions</a> and other features.' ),
        array( 'img_src' => '/industry/real-estate/d3.png',  'width' => '80', 'height' => '80', 'alt' => 'Online Property Booking',                'list_head' => 'Online Property Booking',                'list_para' => 'Our team of real estate app developers creates solutions to book properties, including resorts, hotels, and rental apartments, with media content integration and multiple payment options.' ),
        array( 'img_src' => '/industry/real-estate/d4.png',  'width' => '80', 'height' => '80', 'alt' => 'Business Solution',                      'list_head' => 'Business Solution',                      'list_para' => 'Our company develops large-scale real estate applications to streamline business processes and analyze marketing impact on customers and dealers through our <a href="/enterprise-app-development/">enterprise app development services</a>.' ),
        array( 'img_src' => '/industry/real-estate/d5.png',  'width' => '80', 'height' => '80', 'alt' => 'Property Managing Applications',          'list_head' => 'Property Managing Applications',          'list_para' => 'Our company specializes in creating mobile applications for real estate management. Our apps are designed to make the entire property management process smoother and more efficient, reducing errors and simplifying tasks for both individual homeowners and property management firms. With our app, managing multiple tasks simultaneously becomes much easier.' ),
        array( 'img_src' => '/industry/real-estate/d6.png',  'width' => '80', 'height' => '80', 'alt' => 'Lead Handling Solutions',                'list_head' => 'Lead Handling Solutions',                'list_para' => 'We provide solutions for realtors to manage property queries from referrals, websites, and social media by collecting, assigning, and tracking leads in an organized database.' ),
        array( 'img_src' => '/industry/real-estate/d7.png',  'width' => '80', 'height' => '80', 'alt' => 'Real Estate Corporate App',              'list_head' => 'Real Estate Corporate App',              'list_para' => 'Our mobile app development for real estate startups provides a platform for direct collaboration between buyers and sellers, eliminating the need for agents or brokers.' ),
        array( 'img_src' => '/industry/real-estate/d8.png',  'width' => '80', 'height' => '80', 'alt' => 'Property/Real Estate Management System', 'list_head' => 'Property/Real Estate Management System', 'list_para' => 'Our state-of-the-art real estate management system enables you to manage all aspects of your property. It functions as a dedicated B2C web portal with search filters, including location, purpose, market rate, size, and type.' ),
        array( 'img_src' => '/industry/real-estate/d9.png',  'width' => '80', 'height' => '80', 'alt' => 'Solutions for Smart Homes',              'list_head' => 'Solutions for Smart Homes',              'list_para' => 'With the help of the <a href="/iot-services/">Internet of Things (IoT)</a>, you can control various functions of your home through your smartphone. By integrating augmented reality (AR) and virtual reality (VR) into real estate mobile applications, users can take a 3D virtual tour of the property.' ),
        array( 'img_src' => '/industry/real-estate/d10.png', 'width' => '80', 'height' => '80', 'alt' => 'ERP/CRM Software',                       'list_head' => 'ERP/CRM Software',                       'list_para' => 'We develop ERP solutions for property managers and real estate business owners to plan and manage their data and resources efficiently.' ),
    ),
),

		'industry_features' => array(
    'subtitle' => 'Navigate Realty Innovations',
    'title'    => 'Advanced Search Functionality & Features',
    'listing'  => array(
        array( 'img_src' => '/industry/real-estate/f1.webp', 'title' => 'Features of Real Estate App', 'content' => 'Enhance property search with our cutting-edge functionality. Refine options based on city, property type, prices, and more, delivered by experts in real estate app development.' ),
        array( 'img_src' => '/industry/real-estate/f2.webp', 'title' => 'Multiple Payment Options',    'content' => 'Efficiently run your real estate business with secure payment gateways. Your data privacy matters, and our numerous payment options ensure a seamless experience for buyers and sellers.' ),
        array( 'img_src' => '/industry/real-estate/f3.webp', 'title' => 'AR/VR Modeling',             'content' => 'Immerse clients in property exploration with our AR/VR modeling feature. Elevate your real estate app with 360-degree property views for a truly immersive experience.' ),
        array( 'img_src' => '/industry/real-estate/f4.webp', 'title' => 'Live Maps',                  'content' => 'Ensure clients find locations effortlessly with our live maps. Your real estate app will guide them precisely to their desired destinations.' ),
        array( 'img_src' => '/industry/real-estate/f5.webp', 'title' => 'Notifications Integration',  'content' => 'Keep users informed with instant notifications for new listings. Our notification system ensures that users take advantage of exciting opportunities in your real estate mobile app development.' ),
        array( 'img_src' => '/industry/real-estate/f6.webp', 'title' => 'Master Admin Panel',         'content' => 'Take control of your real estate business with our comprehensive admin panel. From performance reports to payment details, our master admin panel provides complete visibility and control.' ),
        array( 'img_src' => '/industry/real-estate/f7.webp', 'title' => 'Customer Analytics',         'content' => 'Boost your business with real-time data on user behavior. Track property views and preferences for insightful analytics, an essential feature in modern real estate application development.' ),
        array( 'img_src' => '/industry/real-estate/f8.webp', 'title' => 'Image/Video Recognition',    'content' => 'Transform your real estate app with image and video recognition. Users can scan and explore properties in real time, making your app more effective and user-friendly.' ),
    ),
),

		'types_of_apps' => array(
    'subtitle' => 'Explore Property Possibilities',
    'title'    => 'Types of Real Estate Apps',
    'bg_image' => '/industry/real-estate/app-bg.webp',
    'listing'  => array(
        array(
            'img_src'     => '/industry/real-estate/app-type.webp',
            'img_width'   => '366',
            'img_height'  => '518',
            'alt_text'    => 'Real Estate Listing App',
            'tab_title'   => 'Real Estate Listing App',
            'tab_content' => '<p>Empower your real estate venture with cutting-edge solutions from TechnBrains, a leading real estate app development company.</p><h3>&#9679; Interactive Property Catalog</h3><p>Engage users with an intuitive and visually appealing property catalog, providing seamless navigation and detailed property insights.</p><h3>&#9679; Advanced Search Filters</h3><p>Facilitate precise property searches based on location, amenities, and preferences, enhancing the user experience.</p><h3>&#9679; Instant Notifications</h3><p>Keep users informed about new listings, price changes, or relevant updates through real-time push notifications.</p><h3>&#9679; Virtual Tours</h3><p>Elevate property exploration with virtual tours, allowing users to experience homes remotely.</p>',
        ),
        array(
            'img_src'     => '/industry/real-estate/app-type.webp',
            'img_width'   => '366',
            'img_height'  => '518',
            'alt_text'    => 'Real Estate AR/VR Modeling App',
            'tab_title'   => 'Real Estate AR/VR Modeling App',
            'tab_content' => '<p>Our expertise in real estate mobile app development ensures tailored applications that redefine the industry.</p><h3>&#9679; Investment Portfolio Management:</h3><p>Provide users with a comprehensive dashboard to track and manage their real estate investments effortlessly.</p><h3>&#9679; Market Analytics:</h3><p>Integrate powerful analytics tools to offer insights into market trends, enabling informed investment decisions.</p><h3>&#9679; ROI Calculator:</h3><p>Implement a robust ROI calculator, allowing users to assess potential returns on their real estate investments.</p><h3>&#9679; Secure Transactions:</h3><p>Ensure secure financial transactions and documentation processes within the app for a seamless investment experience.</p>',
        ),
        array(
            'img_src'     => '/industry/real-estate/app-type.webp',
            'img_width'   => '366',
            'img_height'  => '518',
            'alt_text'    => 'Real Estate Investment App',
            'tab_title'   => 'Real Estate Investment App',
            'tab_content' => '<p>Explore the future of real estate with TechnBrains\'s exceptional real estate application development services.</p><h3>&#9679; Augmented Property Viewing</h3><p>Transform property viewing with AR, allowing users to visualize and interact with virtual elements within the real-world environment.</p><h3>&#9679; Virtual Furniture Placement</h3><p>Enable users to virtually stage properties by placing and arranging furniture, enhancing the visualization experience.</p><h3>&#9679; AR Property Information Overlay</h3><p>Provide real-time property details through AR overlays, creating an immersive and informative experience.</p><h3>&#9679; VR Property Walkthroughs</h3><p>Elevate property exploration with VR modeling, offering virtual walkthroughs for a realistic and immersive experience.</p>',
        ),
    ),
),

		'stack_new_box' => array(
    'subtitle' => 'UPGRADE YOUR REAL ESTATE GAME',
    'title'    => 'Technical Stack for Real Estate App Development',
    'listing'  => array(
        array(
            'tab_title' => 'Languages',
            'data_list' => array(
                array( 'title' => 'Java or Kotlin' ),
                array( 'title' => 'Swift or Objective C' ),
                array( 'title' => 'JavaScript' ),
                array( 'title' => 'Typescript' ),
                array( 'title' => '<a href="/technologies/php/">PHP</a>' ),
                array( 'title' => '<a href="/technologies/python/">Python</a>' ),
            ),
        ),
        array(
            'tab_title' => 'Database',
            'data_list' => array(
                array( 'title' => 'CoreData & Realm frameworks' ),
                array( 'title' => 'Amazon S3' ),
                array( 'title' => 'Elasticsearch' ),
            ),
        ),
        array(
            'tab_title' => 'IDE',
            'data_list' => array(
                array( 'title' => 'Xcode' ),
                array( 'title' => 'Android Studio' ),
            ),
        ),
        array(
            'tab_title' => 'Frameworks',
            'data_list' => array(
                array( 'title' => 'React JS' ),
                array( 'title' => 'React Native' ),
                array( 'title' => 'NodeJS' ),
                array( 'title' => '<a href="/technologies/flutter/">Flutter</a>' ),
                array( 'title' => '<a href="/technologies/angular/">Angular</a>' ),
                array( 'title' => 'WebRTC' ),
            ),
        ),
        array(
            'tab_title' => 'APIS',
            'data_list' => array(
                array( 'title' => 'Google Map API' ),
                array( 'title' => 'Zillow API' ),
                array( 'title' => 'Mortgage Payments API' ),
                array( 'title' => 'Points of Interest API, Yelp Fusion, Community API, School Digger API, Rets.ly, SimplyRETS' ),
            ),
        ),
    ),
),

		'proposal' => array(
    'head_html' => '<h2>Upgrade Your Property Game with a Real Estate App Built for Growth</h2>',
    'btn_text'  => 'Reach Out Now',
    'anchor'    => false,
),

		'dev_process' => array(
    'main_title' => 'Create Feature-Rich Real Estate App',
    'lang_title' => 'Real Estate App Development Process',
    'lang_para'  => '',
    'listing'    => array(
        array( 'number' => '01', 'title' => 'Requirement Analysis',          'para' => 'We begin by conducting a <a href="/blog/startup-app-development-guide/" target="_blank">detailed requirement analysis</a> to understand the specific needs of your real estate application development project. Our team evaluates business goals, target users, and property workflows to plan a tailored solution that aligns with your objectives as a real estate app development company.' ),
        
        // FIX APPLIED HERE: </a > tag fixed in Android link
        array( 'number' => '02', 'title' => 'Design & Prototyping',           'para' => 'In this phase, we design intuitive user interfaces focused on buyers, sellers, and agents. Our team creates interactive prototypes with expert <a href="/hire-ios-developer/">iOS</a> and <a href="/hire-android-developer/">Android app developers</a>, ensuring the platform delivers a seamless experience aligned with modern real estate mobile app development services.' ),
        
        array( 'number' => '03', 'title' => 'Real Estate App Development',    'para' => 'Once the design is approved, our developers begin building your solution using scalable technologies. As experienced real estate app developers, we create secure and high-performing platforms that support listings, transactions, and real-time interactions.' ),
        array( 'number' => '04', 'title' => 'Testing & Quality Assurance',    'para' => 'We perform rigorous testing to ensure the app functions smoothly across devices and use cases. Our <a href="/quality-assurance/">quality assurance services</a> identify and resolve issues, ensuring your real estate solution meets industry standards and delivers reliable performance.' ),
        array( 'number' => '05', 'title' => 'Advanced Feature Integration',   'para' => 'We enhance your application by integrating advanced features such as AI-driven property recommendations, CRM systems, analytics dashboards, and third-party tools. This ensures a future-ready real estate application development solution tailored to evolving market demands.' ),
        array( 'number' => '06', 'title' => 'Deployment & Ongoing Support',   'para' => 'After final approval, we deploy your application to relevant platforms and provide <a href="/support-maintenance/">continuous support</a>. Our team ensures regular updates, performance optimization, and feature enhancements to keep your real estate app development services aligned with business growth and user expectations.' ),
    ),
),

		'key_things' => array(
    'sub_title' => 'Learn more about Real Estate App',
    'title'     => 'Key Features and Functionalities in a Real Estate App',
    'listing'   => array(
        array(
            'tab_title'   => 'Key Features and Functionalities in a Real Estate App',
            'tab_content' => '<p>Kickstart your real estate app needs with our all-inclusive real estate app development solutions tailored for success. As a leading real estate mobile app development company, we prioritize features that redefine user experience and drive engagement.</p><p>1. Intuitive Property Search: Our real estate mobile app development services prioritize a user-friendly interface for seamless property exploration. Advanced search filters and intuitive navigation enhance the house-hunting experience.</p><p>2. Virtual Tours and 3D Views: Elevate property visualization with immersive virtual tours and 3D views. Potential buyers can experience properties remotely, enhancing their understanding and connection with listings.</p><p>3. Map Integration: Seamlessly integrate map features to provide users with a geographical perspective of property locations. Our real estate app developers optimize map functionalities for a more informed decision-making process.</p><p>4. Property Listings and Details: Showcase properties with captivating visuals and detailed descriptions. Our real estate application development ensures that each listing presents essential information to captivate potential buyers.</p><p>5. User Accounts and Personalization: Implement user accounts for personalized experiences. Save favorite listings, receive tailored recommendations, and streamline communication between buyers, sellers, and agents.</p><p>6. In-App Messaging and Notifications: Facilitate real-time communication with in-app messaging and push notifications. Keep users updated on new listings, price changes, or messages from interested parties.</p><p>7. Mortgage Calculators: Empower users to make informed decisions with integrated mortgage calculators. Provide instant insights into potential financing options, contributing to a smoother purchasing process.</p><p>8. Document Management: Simplify transactions with document management features. Our real estate app development services ensure secure document uploads, e-signatures, and organized record-keeping.</p><p>9. Property Analytics: Equip sellers and agents with insightful analytics. Track property views, user interactions, and market trends to refine marketing strategies and optimize listings.</p><p>10. Augmented Reality (AR) Features: Stay ahead with cutting-edge technology. Integrate AR features for virtual staging, allowing users to visualize furniture and design possibilities within properties.</p>',
        ),
        array(
            'tab_title'   => 'App integrations that we can provide',
            'tab_content' => '<p>Building a robust real estate app requires a powerful backend and strategic integration of key tools. Our comprehensive real estate application development solutions encompass the following essential integrations:</p><p>1. CoreData or Realm Frameworks: Efficiently manage a list of saved properties, ensuring a seamless user experience.</p><p>2. Google Places API: Empower users with detailed information about local areas and neighborhoods, enhancing the app\'s location-based features.</p><p>3. Firebase SDK or Apple Push Notifications Service: Implement push notifications for timely updates and user engagement.</p><p>4. SimpleRets, iHomeFinder, Spark APIs: Normalize MLS data flows for accurate and standardized property information.</p><p>5. Facebook SDK: Integrate a convenient Facebook sign-in option, enhancing user onboarding.</p><p>6. Zillow API: Gain access to Zillow\'s extensive neighborhood information and listings, enriching your app\'s property database.</p><p>7. Mapbox or Google Maps API: Build custom maps for an immersive and personalized mapping experience within the app.</p><p>8. The Onboard Informatics Community, Spatial Neighborhood APIs: Provide in-depth demographics and district-specific information, offering users a comprehensive understanding of potential areas.</p><p>9. Java or Kotlin: Utilize Java or Kotlin as the developmental language for Android, ensuring a seamless and optimized app experience.</p><p>10. Swift or Objective C: Opt for Swift or Objective C as the developmental language for iOS, catering to the unique requirements of Apple devices.</p><p>11. Amazon S3: Leverage Amazon S3 for efficient cloud storage, ensuring quick access to and retrieval of property listings.</p>',
        ),
        array(
            'tab_title'   => 'Ensuring the Security and Privacy of User Data',
            'tab_content' => '<p>Ensuring Security and Privacy of User Data with TechnBrains</p><p>At TechnBrains, we prioritize the safeguarding of sensitive information in every facet of real estate app development. Trust us to navigate the intricate landscape of data protection, ensuring the following best practices:</p><p>1. Compliance and Legal Preparedness: Stay ahead of potential legal issues with our commitment to compliance, understanding, and implementing regulations like GDPR.</p><p>2. Data Security Policy Creation: Craft a robust data security policy with TechnBrains to fortify your defenses against potential breaches. Our policy encompasses password protocols, data transfer restrictions, secure cloud integration, and strict adherence to regulations like GDPR.</p><p>3. Automated Security Measures: Utilize automation for enhanced security. Our real estate app development includes features such as automatic password reminders, firewall protection, and access notifications.</p><p>4. File Encryption and Multi-Factor Authentication: Safeguard sensitive paperwork and customer information with encryption, ensuring only authorized parties can access it. Integrate multi-factor authentication for heightened protection.</p><p>5. Access Control and Permissions: Exercise control over data access with role-based permissions. Grant specific responsibilities based on roles, ensuring only authorized individuals have access to pertinent information.</p><p>6. Regular Software Updates and Audits: Maintain the integrity of your real estate app with regular software updates and security audits. Our team conducts thorough audits and identifies vulnerabilities.</p><p>7. Data Backups and Backend Security: Safeguard against data loss with regular backups facilitated by our cloud-based solutions. Our expertise extends to securing both front-end and back-end components.</p>',
        ),
        array(
            'tab_title'   => 'Technologies and Frameworks for Real Estate App Development',
            'tab_content' => '<p>Here are the technologies and frameworks commonly used in real estate app development:</p><p>Front End:<ul><li>Frameworks: React Native, Flutter</li><li>Languages: JavaScript, Dart</li><li>IDEs: Visual Studio Code, IntelliJ IDEA</li></ul></p><p>Back End:<ul><li>Frameworks: Node.js, Django</li><li>Languages: JavaScript (Node.js), Python (Django)</li><li>Server: Express.js (Node.js), Django REST framework (Django)</li></ul></p><p>Database:<ul><li>Relational Databases: PostgreSQL, MySQL</li><li>NoSQL Databases: MongoDB</li><li>ORMs: Sequelize (Node.js), Django ORM (Django)</li></ul></p><p>This tech stack aligns with our commitment at TechnBrains to provide cutting-edge real estate app development solutions, ensuring high-quality, secure, and innovative solutions for your real estate app needs.</p>',
        ),
        array(
            'tab_title'   => 'Incorporating AR and VR experience in Real Estate App Development',
            'tab_content' => '<p>Real Estate App Development with AR and VR Experiences</p><p>Explore the future of real estate with TechnBrains, your premier partner in real estate app development. We specialize in integrating cutting-edge Augmented Reality (AR) and Virtual Reality (VR) experiences into mobile applications, transforming the way users interact with property listings.</p><p>1. Immersive Property Exploration: Elevate your real estate app with immersive AR and VR experiences. Allow users to virtually tour properties, giving them a realistic feel of the space.</p><p>2. Virtual Interior Design: Enrich your app with VR to enable users to design and furnish interiors virtually. This feature adds an interactive layer, helping potential buyers visualize the potential of a property.</p><p>3. Interactive Property Showcases: Stand out in the market by providing interactive property showcases through AR. Enhance property listings with 3D models, floor plans, and virtual neighborhood explorations.</p><p>4. Customized Solutions: Our team of skilled real estate app developers tailors solutions to meet your specific needs, creating unique AR-based property searches or integrating VR for virtual property staging.</p><p>5. Seamless User Experience: Prioritize user engagement and satisfaction with our streamlined real estate app development solutions. Intuitive interfaces and immersive experiences ensure a seamless and enjoyable interaction.</p>',
        ),
        array(
            'tab_title'   => 'Ensuring App Compatibility with Different Platforms and Devices',
            'tab_content' => '<p>For real estate app development, guaranteeing seamless compatibility across various platforms and devices is paramount to ensuring a widespread user reach. At TechnBrains, a leading real estate app development company, we prioritize this by employing a meticulous approach.</p><p>Understanding Target Users: We delve deep into understanding your target audience and their preferences. By recognizing the diverse platforms and devices they use, we tailor our development strategy to ensure your real estate app resonates with users across the spectrum.</p><p>Incorporating Responsive Design Principles: Responsive design is at the core of our approach to real estate mobile app development. We craft interfaces that dynamically adapt to different screen sizes, ensuring an optimal viewing and interaction experience.</p><p>Thorough Testing on Different Devices and Browsers: Rigorous testing is the key to reliability. Our team of skilled real estate app developers conducts extensive testing across a variety of devices and browsers, guaranteeing that your real estate mobile application functions seamlessly.</p>',
        ),
    ),
),

		'faqs' => array(
    'head_text' => 'Things you might want to know',
    'listing'   => array(
        array( 'faqhead' => 'How much does it cost to create a real estate app?',           'faqbody' => 'On average, a <a href="/blog/real-estate-app-development-cost/" target="_blank">real estate app costs</a> between $20,000 and $300,000+ in 2026, depending on features, complexity, design, and integrations.' ),
        array( 'faqhead' => 'How long does it take to develop a real estate app?',          'faqbody' => 'The development time for a real estate app is typically 3 to 9 months, depending on features, platform choice, and technical complexity.' ),
        array( 'faqhead' => 'Why go for TechnBrains for real estate app development?',      'faqbody' => 'TechnBrains is a trusted real estate app development company known for innovation, quality, and user-focused solutions. We build scalable apps that help businesses stand out in the competitive real estate market.' ),
        array( 'faqhead' => 'Can you develop a real estate app on both iOS and Android?',  'faqbody' => 'Absolutely! TechnBrains specializes in creating robust and seamless real estate mobile apps for both <a href="/ios-app-development/">iOS</a> and <a href="/android-app-development/">Android</a> platforms, ensuring a broad reach for your business.' ),
        array( 'faqhead' => 'What are the benefits of building a real estate app?',         'faqbody' => 'Building a real estate app with TechnBrains brings numerous advantages, including heightened market visibility, increased customer engagement, efficient property management, and an elevated user experience through tailored real estate app development solutions.' ),
    ),
),

	),
);
