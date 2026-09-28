<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array( '@type' => 'Question', 'name' => 'Is React Native Front-end or Back-end?',                                                     'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'React Native is a front-end technology primarily used for app development. It allows developers to create cross-platform mobile applications using a single codebase for both iOS and Android platforms.' ) ),
				array( '@type' => 'Question', 'name' => 'What is the cost of developing a React Native App?',                                         'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'The cost of developing a React Native app varies based on several factors, including project complexity, features, and customization requirements. The cost can range from $25,000 to $250,000.' ) ),
				array( '@type' => 'Question', 'name' => 'What is the estimated time duration to build a React Native App?',                           'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'The estimated time duration to build a React Native app varies based on project complexity, features, and scope. Contact our dedicated team at TechnBrains for a more accurate timeline for your project.' ) ),
				array( '@type' => 'Question', 'name' => 'Can I hire React Native developers on a full-time basis?',                                   'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Absolutely! At TechnBrains, we offer dedicated React Native developers for full-time engagements, providing you with a seamless and committed development experience.' ) ),
				array( '@type' => 'Question', 'name' => 'What kind of applications can you build using React Native?',                               'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'We build Enterprise Mobile Apps, E-commerce Apps, Social Media Apps, Healthcare Apps, Education Apps, On-Demand Services Apps, and Custom App Development solutions using React Native.' ) ),
				array( '@type' => 'Question', 'name' => 'Which tools and platforms do you utilize for React Native App Development Services?',        'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'We use React Native Framework, JavaScript, Redux, Expo, React Navigation, and Firebase as core tools and platforms for React Native app development.' ) ),
				array( '@type' => 'Question', 'name' => 'Why Choose TechnBrains for Your React Native App Development Project?',                     'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'TechnBrains offers expertise, custom solutions, a proven track record, innovation, client-centric approach, and rigorous quality assurance for React Native app development.' ) ),
			),
		),
	),

	'components' => array(
		array( 'name' => 'main-banner',         'modifier_class' => '' ),
		array( 'name' => 'dedicated-lang-desc', 'modifier_class' => '' ),
		array( 'name' => 'language-services',   'modifier_class' => '' ),
		array( 'name' => 'proposal',            'modifier_class' => '' ),
		array( 'name' => 'development-process', 'modifier_class' => '' ),
		array( 'name' => 'key-things',          'modifier_class' => '' ),
		array( 'name' => 'stack-new-box',       'modifier_class' => 'angular-stack' ),
		array( 'name' => 'hiring',              'modifier_class' => '' ),
		array( 'name' => 'testimonials',        'modifier_class' => '' ),
		array( 'name' => 'main-faqs',           'modifier_class' => '' ),
	),

	'mock_data' => array(

		'main_banner' => array(
			'head_text'  => 'React Native App Development Company',
			'content'    => 'TechnBrains specializes in delivering end-to-end, cross-platform React Native app development services for both iOS and Android platforms. Our high-performance, business-empowering applications feature powerful UX for our customers.',
			'img_src'    => '/stack/react-native/native-banner.png',
			'img_width'  => '691',
			'img_height' => '674',
			'img_alt'    => 'native-banner',
		),

		'dedicated_lang_desc' => array(
			'para_html' => '<span>React Native</span> is a powerful JavaScript framework that was released by Meta (formerly Facebook) in 2015. It allows developers to create native apps for iOS and Android platforms. Despite its relatively short history, React Native has become a very popular tool, with big names like Instagram, Skype, and Meta/Facebook itself using the framework.<br><br>TechnBrain\'s team of experienced React Native app developers can create anything you want using a combination of React Native and Native code to build cross-platform and innovative mobile apps. Our expertise and use of the best features of the technology make us a <span>trusted React Native development company.</span>',
		),

		'language_services' => array(
			'head_text' => 'React Native Development Services',
			'para_text' => 'We offer top-notch, secure, and scalable React Native development services that are customized to meet your specific needs. Our solutions are designed to be sustainable and scalable, ensuring that your application will continue to perform at its best over time.',
			'btn_text'  => 'Hire REACT NATIVE GEEKS NOW!',
			'anchor'    => false,
			'listing'   => array(
				array( 'img_src' => '/stack/react-native/app-dev.png',     'width' => '80', 'height' => '80', 'alt' => 'app-dev',     'list_head' => 'React Native App Development',                  'list_para' => 'Choose React Native for powerful native app development. Our skilled developers efficiently reuse code for iOS and Android platforms, creating high-quality apps. With only JavaScript required, the development process is smoother.' ),
				array( 'img_src' => '/stack/react-native/application.png', 'width' => '80', 'height' => '80', 'alt' => 'application', 'list_head' => 'React Native mobile App development consulting.', 'list_para' => 'Our React Native developers offer comprehensive services, including development, design, testing, and maintenance for various React Native applications.' ),
				array( 'img_src' => '/stack/react-native/ui.png',          'width' => '80', 'height' => '80', 'alt' => 'ui',          'list_head' => 'UI/UX design',                                  'list_para' => 'With a focus on a user-centric and seamless app layout approach, we design a smooth experience for end-users while paying great attention to every step and design element.' ),
				array( 'img_src' => '/stack/react-native/back.png',        'width' => '80', 'height' => '80', 'alt' => 'back',        'list_head' => 'Back-end engineering',                          'list_para' => 'Our team has extensive experience in developing secure and scalable backend solutions for React Native projects. We also specialize in integrating third-party APIs and adapting to evolving business needs.' ),
				array( 'img_src' => '/stack/react-native/mantain.png',     'width' => '80', 'height' => '80', 'alt' => 'mantain',     'list_head' => 'Testing & Maintenance',                         'list_para' => 'We provide post-release support for your product, including bug fixing, performance tuning, system monitoring, and on-demand updates.' ),
				array( 'img_src' => '/stack/react-native/team.png',        'width' => '80', 'height' => '80', 'alt' => 'team',        'list_head' => 'React Native Developers',                       'list_para' => 'We offer your organization a selection from our pool of resources and allow you to manage your team and requirements easily through direct communication with them.' ),
				array( 'img_src' => '/stack/react-native/test.png',        'width' => '80', 'height' => '80', 'alt' => 'test',        'list_head' => 'Automation & Testing',                          'list_para' => 'At TechnBrains, our services go beyond just development. We conduct comprehensive testing of your application to identify defects and evaluate performance, functionality, and usability.' ),
				array( 'img_src' => '/stack/react-native/MVP.png',         'width' => '80', 'height' => '80', 'alt' => 'MVP',         'list_head' => 'MVP Development',                               'list_para' => 'To launch your application, you need, at minimum, a viable product (MVP). React Native is ideal for MVP development as it allows you to use a single codebase for multiple platforms.' ),
				array( 'img_src' => '/stack/react-native/tablet.png',      'width' => '80', 'height' => '80', 'alt' => 'tablet',      'list_head' => 'Tablet App Development',                        'list_para' => 'With React Native, you can create powerful cross-platform tablet applications for a wide range of devices. Take advantage of the versatility and efficiency of React Native to reach a larger audience.' ),
			),
		),

		'proposal' => array(
			'head_html' => '<h2>Looking for the best React Native app development company to create your dream app?</h2>',
			'btn_text'  => 'Start Project',
			'anchor'    => false,
		),

		'dev_process' => array(
			'main_title' => 'Our seamless development process',
			'lang_title' => 'React Native Development Process',
			'lang_para'  => 'Our React Native app development company follows an all-inclusive development process to ensure the success of your project. Here\'s an overview:',
			'listing'    => array(
				array( 'number' => '01', 'title' => 'Strategic React Native App Development',             'para' => 'Initiating every project with a meticulous requirements gathering phase, we delve into your needs, devising optimal solutions. This includes determining the most suitable tools to fulfill your specific requirements.' ),
				array( 'number' => '02', 'title' => 'Skilled Team Assembly for React Native Projects',   'para' => 'React Native demands unique skill sets, and our development company is proud to employ top-tier developers possessing these requisite skills. The construction of your team is not only based on expertise and experience but also their alignment with your company culture and dedication to your mission and goals.' ),
				array( 'number' => '03', 'title' => 'Dynamic React Native Application Development Process','para' => 'The core of our efforts is dedicated to the development phase, where we actively construct your application using React Native, JavaScript, and other essential tools and technologies as required.' ),
				array( 'number' => '04', 'title' => 'Quality Assurance in React Native Development',      'para' => 'Our quality assurance specialists rigorously assess your application during the testing phase. This encompasses a thorough evaluation of various features to ensure the highest quality. Bug identification is a part of this process, and our developers conduct unit testing throughout the entire development lifecycle.' ),
				array( 'number' => '05', 'title' => 'Seamless Deployment',                                'para' => 'We only deploy your product when you are entirely satisfied with it. Collaboratively, we determine the finalization of the project and its readiness for the market. Our commitment is to deliver a product that meets your expectations and surpasses industry standards.' ),
			),
		),

		'key_things' => array(
			'sub_title' => 'Dive into the essentials of React Native',
			'title'     => 'Key Things To Know About React Native',
			'listing'   => array(
				array(
					'tab_title'   => 'What is React Native?',
					'tab_content' => '<p>React Native is a revolutionary framework for mobile application development, widely recognized for its efficiency and cross-platform capabilities. As a leading React Native development company, we leverage the power of React Native to deliver cutting-edge solutions.<br><br>React Native, developed by Facebook, is an open-source framework for building mobile applications using JavaScript and React.</p><span>1. Initial Release (2015):</span><p>React Native was launched by Facebook in March 2015 to streamline cross-platform mobile app development using JavaScript and React.</p><span>2. Open Source Adoption (2015):</span><p>Within a month of its release, Facebook open-sourced React Native, inviting external contributions and fostering a growing developer community.</p><span>3. Cross-Platform Support (2015-2016):</span><p>React Native, initially focused on iOS, expanded to support Android in September 2015, becoming a comprehensive cross-platform solution.</p><span>4. Popularity Surge (2015-2016):</span><p>Rapid adoption by developers and major companies, drawn to React Native\'s efficiency and native-like experience, contributed to its widespread popularity.</p><span>5. Community Growth and Contribution:</span><p>A thriving community led to the development of third-party libraries and tools, enhancing React Native\'s capabilities and addressing issues.</p><span>6. Ongoing Evolution (2022):</span><p>React Native continues to evolve with Facebook\'s active development, consistent updates, and contributions from the community, ensuring its relevance in cross-platform mobile app development.</p>',
				),
				array(
					'tab_title'   => 'Benefits of React Native',
					'tab_content' => '<p>When looking for mobile app development, React Native technology brings forth a multitude of benefits for businesses and developers alike.</p><h4>● Cross-Platform Consistency:</h4><p>With React Native, achieve unparalleled consistency across multiple platforms. Develop once and deploy seamlessly on both iOS and Android, saving time and resources.</p><h4>● Cost-Effectiveness:</h4><p>As a cost-effective solution, React Native allows for efficient development without compromising the quality of the end product.</p><h4>● Efficient Development Process:</h4><p>The streamlined development process facilitated by React Native enables faster time-to-market, ensuring your app reaches your audience swiftly.</p><h4>● Reusability of Code:</h4><p>Reap the benefits of code reusability, a cornerstone of React Native. Develop modular components that can be reused across different parts of your application.</p><h4>● Optimized Performance:</h4><p>React Native\'s architecture ensures optimized performance, providing a smooth and responsive user experience.</p><h4>● Wide Range of Development Services:</h4><p>As a dedicated React Native app development company, we offer a comprehensive suite of services from initial ideation to deployment.</p><h4>● Scalability and Flexibility:</h4><p>React Native\'s scalability and flexibility make it an ideal choice for businesses of all sizes.</p><h4>● Industry-Leading Mobile App Expertise:</h4><p>Partnering with a reputable React Native development agency ensures access to industry-leading expertise and skills of seasoned professionals.</p>',
				),
				array(
					'tab_title'   => 'Most Popular React Native Libraries',
					'tab_content' => '<p>Here are some of the most popular React Native libraries that can enhance your development projects:</p><h4>1. NativeBase:</h4><p>An open-source library offering a diverse range of pre-built components for React Native, grounded in Google\'s Material Design.</p><h4>2. React Native Elements:</h4><p>A well-received library furnishing pre-built components aligned with Google\'s Material Design including buttons, inputs, forms, and navigation.</p><h4>3. UI Kitten:</h4><p>A user-friendly React Native UI library following Material Design guidelines that simplifies development with straightforward components.</p><h4>4. React Native Paper:</h4><p>A React Native UI library crafted around Google\'s Material Design, providing a set of components for buttons, inputs, forms, navigation, and more.</p><h4>5. Shoutem UI:</h4><p>A React Native UI library inspired by Google\'s Material Design with comprehensive components including buttons, inputs, forms, and navigation.</p><h4>6. React Native Maps:</h4><p>Specifically designed for maps, delivering components for displaying markers, polylines, and polygons seamlessly.</p><h4>7. React Native Gifted Chat:</h4><p>Tailored for chat interfaces, supplying components for displaying text messages, image messages, and video messages.</p><h4>8. Teaset</h4><p>A comprehensive UI library offering over 20 pure components with a minimalist approach, including Input, CheckBox, Stepper, Badge, TabView, and DrawerView.</p><h4>9. Lottie</h4><p>A remarkable open-source animated graphics library created by Airbnb that excels in producing visually stunning animations integrable into React Native apps.</p>',
				),
				array(
					'tab_title'   => 'What are the Elements in React Native?',
					'tab_content' => '<p>In React Native development, elements are fundamental building blocks used to construct user interfaces. These elements represent the visual components of a mobile application, allowing developers to create a rich and interactive user experience.<br><br>The versatility of React Native elements lies in their ability to encapsulate reusable pieces of UI. This promotes a modular and efficient development process, enabling our skilled developers to create cohesive and visually appealing interfaces.<br><br>Focusing on client objectives, our React Native development services ensure that each element is strategically implemented to enhance the functionality and aesthetics of your mobile app.</p>',
				),
				array(
					'tab_title'   => 'React Native Components',
					'tab_content' => '<p>In React Native development, you have access to a variety of built-in Core Components designed to streamline app creation.<br><br>While React Native includes essential components and APIs, the community of thousands of developers offers additional libraries for specific functionalities.</p><h4>Key Components and APIs:</h4><h4>Basic Components:</h4><p>● View: Fundamental for UI construction.</p><p>● Text: Displays text.</p><p>● Image: Displays images.</p><p>● TextInput: Allows text input via a keyboard.</p><p>● ScrollView: Provides a scrollable container for multiple components.</p><h4>User Interface:</h4><p>● Button: A basic touch-handling component rendering uniformly on any platform.</p><p>● Switch: Renders a boolean input</p><h4>List Views:</h4><p>● FlatList: Efficiently renders scrollable lists.</p><p>● SectionList: Like FlatList, but for sectioned lists.</p><h4>Android Components and APIs:</h4><p>● BackHandler: Detects hardware button presses for back navigation.</p><p>● DrawerLayoutAndroid: Renders a DrawerLayout on Android.</p><p>● PermissionsAndroid: Provides access to Android M\'s permissions model.</p><p>● ToastAndroid: Creates an Android Toast alert.</p><h4>iOS Components and APIs:</h4><p>● ActionSheetIOS: API for displaying iOS action sheets or share sheets.</p><h4>Others:</h4><p>● ActivityIndicator: Displays a circular loading indicator.</p><p>● Alert: Launches an alert dialog with a specified title and message.</p><p>● Animated: A library for creating fluid, powerful animations.</p><p>● Dimensions: Provides an interface for getting device dimensions.</p>',
				),
			),
		),

		'stack_new_box' => array(
			'subtitle' => 'Redefine your app\'s visual appeal with TechnBrains',
			'title'    => 'Technology Stack for React Native Development',
			'listing'  => array(
				array(
					'tab_title' => 'Backend',
					'data_list' => array(
						array( 'title' => '.NET' ),
						array( 'title' => 'Java' ),
						array( 'title' => 'PHP' ),
						array( 'title' => 'Node' ),
						array( 'title' => 'Ruby on Rails' ),
					),
				),
				array(
					'tab_title' => 'Project Management Tools',
					'data_list' => array(
						array( 'title' => 'Jira' ),
						array( 'title' => 'Trello' ),
						array( 'title' => 'Microsoft Team' ),
						array( 'title' => 'Slack' ),
					),
				),
				array(
					'tab_title' => 'Front End',
					'data_list' => array(
						array( 'title' => 'React Native' ),
					),
				),
				array(
					'tab_title' => 'DevOps',
					'data_list' => array(
						array( 'title' => 'CI/CD' ),
						array( 'title' => 'GitHub Actions' ),
					),
				),
				array(
					'tab_title' => 'Database',
					'data_list' => array(
						array( 'title' => 'CoreData' ),
						array( 'title' => 'SQLite' ),
						array( 'title' => 'Realm' ),
						array( 'title' => 'Firebase' ),
					),
				),
				array(
					'tab_title' => 'Testing',
					'data_list' => array(
						array( 'title' => 'Appium' ),
						array( 'title' => 'BrowserStack' ),
						array( 'title' => 'Katalon Test' ),
						array( 'title' => 'Studio' ),
					),
				),
			),
		),

		'hiring' => array(
			'lang_title' => 'React Native App Development Company',
			'hire_title' => 'Hiring Models for Business Success',
			'para_text'  => 'Take your business to new heights with our business-friendly hiring models, offering the flexibility of monthly or fixed-priced arrangements for our expert developers.',
			'listing'    => array(
				array( 'key' => 'tab-1', 'title' => 'Hire Team',                      'tab_points' => array( array( 'text' => 'Initiate the process with your requirements, followed by our team proposition.' ), array( 'text' => 'Ensure the team aligns perfectly with your project needs before finalizing the dedicated team.' ) ) ),
				array( 'key' => 'tab-1', 'title' => 'Project Development Lifecycle',  'tab_points' => array( array( 'text' => 'Agile and Lean Software Development' ), array( 'text' => 'Project Milestones & Bi-Weekly Sprint Designs' ), array( 'text' => 'Iterative Development and Feedback' ) ) ),
				array( 'key' => 'tab-1', 'title' => 'Project Delivery Excellence',    'tab_points' => array( array( 'text' => 'Cloud and DevOps Integration' ), array( 'text' => 'Manual/Automated Testing' ), array( 'text' => 'Reliable and Flexible Delivery' ) ) ),
				array( 'key' => 'tab-2', 'title' => 'Project Requirements',           'tab_points' => array( array( 'text' => 'Requirement gathering and gap analysis' ), array( 'text' => 'Time and cost estimation' ), array( 'text' => 'Project agreement signing' ) ) ),
				array( 'key' => 'tab-2', 'title' => 'Project Development',            'tab_points' => array( array( 'text' => 'Agile and Lean Software Development' ), array( 'text' => 'Project Milestones & Bi-Weekly Sprint Designs' ), array( 'text' => 'Iterative Development and Feedback' ) ) ),
				array( 'key' => 'tab-2', 'title' => 'Project Delivery',               'tab_points' => array( array( 'text' => 'Manual/Automated Testing' ), array( 'text' => 'Reliable and Flexible Delivery' ) ) ),
			),
		),

		'faqs' => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array( 'faqhead' => 'Is React Native Front-end or Back-end?',                                                    'faqbody' => 'React Native is a front-end technology primarily used for app development. It allows developers to create cross-platform mobile applications using a single codebase for both iOS and Android platforms.' ),
				array( 'faqhead' => 'What is the cost of developing a React Native App?',                                        'faqbody' => 'The cost of developing a React Native app varies based on several factors, including project complexity, features, and customization requirements. The cost can range from $25,000 to $250,000.' ),
				array( 'faqhead' => 'What is the estimated time duration to build a React Native App?',                          'faqbody' => 'The estimated time duration to build a React Native app varies based on project complexity, features, and scope. Contact our dedicated team at TechnBrains for a more accurate timeline for your project.' ),
				array( 'faqhead' => 'Can I hire React Native developers on a full-time basis?',                                  'faqbody' => 'Absolutely! At TechnBrains, we offer dedicated React Native developers for full-time engagements, providing you with a seamless and committed development experience.' ),
				array( 'faqhead' => 'What kind of applications can you build using React Native?',                              'faqbody' => 'We build Enterprise Mobile Apps, E-commerce Apps, Social Media Apps, Healthcare Apps, Education Apps, On-Demand Services Apps, and Custom App Development solutions using React Native.' ),
				array( 'faqhead' => 'Which tools and platforms do you utilize for React Native App Development Services?',      'faqbody' => 'We use React Native Framework, JavaScript, Redux, Expo, React Navigation, and Firebase as core tools and platforms for our React Native app development services.' ),
				array( 'faqhead' => 'Why Choose TechnBrains for Your React Native App Development Project?',                   'faqbody' => 'TechnBrains offers expertise, custom solutions, a proven track record, innovation, a client-centric approach, and rigorous quality assurance. Choose TechnBrains as your React Native development agency and embark on a journey of excellence, innovation, and success.' ),
			),
		),

	),
);
