<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(),

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
			'head_text'  => 'Flutter App Development Company',
			'content'    => 'TechnBrains is a top Flutter app development company with expert Flutter app developers well-versed in creating apps that provide a captivating user experience. With Flutter, we redefine app development by creating and launching fully functional applications using a single codebase.',
			'img_src'    => '/stack/flutter/flutter-banner.webp',
			'img_width'  => '691',
			'img_height' => '794',
			'img_alt'    => 'flutter-banner',
		),

		'dedicated_lang_desc' => array(
			'para_html' => 'Our team of expert <span>Flutter developers at TechnBrains</span> can help you create high-quality native interfaces for your cross-platform mobile apps in record time. Flutter, which is based on the Dart programming language, offers a wide range of out-of-the-box widgets that we can leverage to deliver beautiful and feature-rich mobile applications that meet and exceed your expectations. We have <span>extensive experience</span> in developing functional and visually appealing apps that are tailored to your specific needs and requirements.',
		),

		'language_services' => array(
			'head_text' => 'Flutter Development Services',
			'para_text' => 'Our custom Flutter development services are designed to deliver the top-notch solutions that are highly secure, sustainable, and scalable.',
			'btn_text'  => 'Hire Flutter GEEKS NOW!',
			'anchor'    => true,
			'btn_url'   => '/hire-flutter-developer/',
			'listing'   => array(
				array( 'img_src' => '/stack/flutter/app-dev.png',    'width' => '80', 'height' => '80', 'alt' => 'app-dev',    'list_head' => 'Flutter Mobile App Development Consulting', 'list_para' => 'Our team understands your business needs and creates powerful mobile app or MVP out of them using Flutter. We make sure the solution we deliver satisfies the end-users and current market needs.' ),
				array( 'img_src' => '/stack/flutter/application.png','width' => '80', 'height' => '80', 'alt' => 'application','list_head' => 'Flutter Application Development',           'list_para' => 'TechnBrains is a leading Flutter development company that creates custom mobile apps with helpful features and seamless performance. Our services combine business requirements with leading industry tools and technologies to exceed expectations.' ),
				array( 'img_src' => '/stack/flutter/web-dev.png',    'width' => '80', 'height' => '80', 'alt' => 'web-dev',    'list_head' => 'Flutter Web Development',                  'list_para' => 'Flutter is for more than just building great apps on Android and iOS. With Flutter\'s cross-platform features and the power of Dart, our developers can create outstanding web applications for Windows, macOS, and Linux.' ),
				array( 'img_src' => '/stack/flutter/app-des.png',    'width' => '80', 'height' => '80', 'alt' => 'app-des',    'list_head' => 'Intuitive App Design',                     'list_para' => 'Craft an engaging user experience with our dedicated UI/UX designers. We prioritize industry standards to deliver a remarkable interface tailored to your specific requirements.' ),
				array( 'img_src' => '/stack/flutter/back.png',       'width' => '80', 'height' => '80', 'alt' => 'back',       'list_head' => 'Robust Backend Solutions',                 'list_para' => 'Effortlessly build a secure and scalable backend with our expert team. We adeptly integrate third-party APIs, adapting to your evolving business needs for a hassle-free experience.' ),
				array( 'img_src' => '/stack/flutter/mantain.png',    'width' => '80', 'height' => '80', 'alt' => 'mantain',    'list_head' => 'Comprehensive Testing & Maintenance',      'list_para' => 'At TechnBrains, our Flutter developers provide end-to-end support throughout the app development process. We offer maintenance services to ensure smooth functionality after deployment and Flutter QA services for top-notch performance.' ),
				array( 'img_src' => '/stack/flutter/team.png',       'width' => '80', 'height' => '80', 'alt' => 'team',       'list_head' => 'Strategic Team Augmentation',              'list_para' => 'Empower your capabilities with our React Native developers. Seamlessly manage and closely monitor your resources to meet the dynamic demands of a rapidly changing business landscape.' ),
				array( 'img_src' => '/stack/flutter/integrate.png',  'width' => '80', 'height' => '80', 'alt' => 'integrate',  'list_head' => 'Flutter App Migration & Integration',      'list_para' => 'TechnBrains helps migrate tech stacks and hybrid mobile apps to Flutter SDK, and update existing apps to the latest versions.' ),
			),
		),

		'proposal' => array(
			'head_html' => '<h2>Need a Flutter App Development Company that builds innovative cross-platform Apps?</h2>',
			'btn_text'  => 'Reach out now!',
			'anchor'    => false,
		),

		'dev_process' => array(
			'main_title' => 'Our expertise ensures a delightful user experience',
			'lang_title' => 'Flutter Application Development Process',
			'lang_para'  => '',
			'listing'    => array(
				array( 'number' => '01', 'title' => 'Collecting Project Requirements',                    'para' => 'Embark on the journey with TechnBrains as we conduct an in-depth consultation to gather vital project requirements. Our Flutter development team delves into understanding your business, goals, products, and competition. This phase lays the foundation for a tailored development roadmap.' ),
				array( 'number' => '02', 'title' => 'Planning for Flutter App Development',               'para' => 'Following meticulous requirements gathering, our developers dive into conceptualizing your Flutter application aligned with your vision. Crafting a detailed blueprint, we define functionality, design, and the optimal technology stack. Continuous communication ensures a seamless process.' ),
				array( 'number' => '03', 'title' => 'Agile Process of Developing Flutter Apps',           'para' => 'Securing client approval for proposed features, our development phase kicks off dynamically. Focused on building the app\'s architecture and fundamental features, our flutter development company seeks regular client feedback, incorporating suggestions to ensure a collaborative and successful development journey.' ),
				array( 'number' => '04', 'title' => 'Rigorous Testing in the Flutter App Development Cycle', 'para' => 'Integral to our approach is thorough testing at every stage of development. Our developers rigorously test the application to guarantee seamless functionality. Collaborating closely with quality assurance engineers, we ensure the app meets the highest standards in Flutter app development services.' ),
				array( 'number' => '05', 'title' => 'Launch and Support for Flutter Mobile App',          'para' => 'As the Flutter app meets all criteria, it\'s ready for deployment. The client launches the application, and our flutter development company stands ready, providing active post-launch support and maintenance services. We commit to a smooth post-deployment experience, ensuring your app\'s continued success.' ),
			),
		),

		'key_things' => array(
			'sub_title' => 'Learn how Flutter accelerate app development',
			'title'     => 'Key Things To Know About Flutter',
			'listing'   => array(
				array(
					'tab_title'   => 'What is Flutter?',
					'tab_content' => '<p>Flutter is a versatile and robust framework for Flutter app development that facilitates the creation of high-quality, cross-platform mobile applications. As a leading Flutter app development company, we leverage Flutter\'s capabilities to deliver top-notch Flutter app development services.</p><ul><li>2015: Flutter was first introduced by Google as an open-source project.</li><li>2017: The first stable version, Flutter 1.0, was released, marking its official launch to the public.</li><li>2018: Flutter gained momentum as it became more widely adopted, with an increasing number of developers and companies showing interest in its cross-platform capabilities.</li><li>2019: Google announced Flutter\'s compatibility with web development, expanding its reach beyond mobile platforms.</li><li>2020: Flutter 1.20 was released, featuring significant improvements in performance, tooling, and new widgets.</li><li>2021: Flutter 2.0 was a major milestone, enabling developers to create applications for multiple platforms from a single codebase.</li><li>2023: Flutter continued to evolve with regular updates, enhancements, and an active developer community.</li></ul><p>Whether you are exploring options for a flutter development company or seeking dedicated flutter development services, TechnBrains stands out as a powerful choice for crafting engaging and feature-rich mobile applications.</p>',
				),
				array(
					'tab_title'   => 'What is Flutter used for?',
					'tab_content' => '<h4>Cross-Platform App Development:</h4><p>Flutter is primarily used for cross-platform app development, enabling developers to create applications that run seamlessly on both Android and iOS platforms.</p><h4>Single Codebase Efficiency:</h4><p>With Flutter, developers can write a single codebase for their applications, reducing development time and effort.</p><h4>Rich User Interfaces (UI):</h4><p>Flutter is renowned for its ability to create visually appealing and interactive user interfaces with extensive customizable widgets.</p><h4>Hot Reload Feature:</h4><p>Flutter\'s hot reload feature allows developers to instantly see the impact of code changes, facilitating quick experimentation and debugging.</p><h4>Expressive UI Elements:</h4><p>The framework offers a wide array of expressive UI elements, empowering developers to create complex and dynamic interfaces.</p><h4>Open-Source Community Support:</h4><p>Flutter is supported by a robust open-source community, contributing to the framework\'s growth and providing access to a wealth of libraries, plugins, and tools.</p><h4>Integration of Third-Party Services:</h4><p>Flutter seamlessly integrates with various third-party services, allowing developers to effortlessly incorporate additional functionalities into their applications.</p><h4>Customizable Themes and Branding:</h4><p>Developers can easily customize themes and branding elements in Flutter, ensuring alignment with the client\'s brand identity.</p><h4>High Performance and Speed:</h4><p>Flutter\'s compiled codebase and use of the Dart language contribute to high-performance applications with smooth animations and fast execution.</p>',
				),
				array(
					'tab_title'   => 'Benefits of Flutter',
					'tab_content' => '<p>As a leading Flutter app development company, we bring forth comprehensive Flutter app development services that leverage the unique strengths of Flutter.</p><h4>Efficient Development:</h4><p>Streamline your development process with Flutter\'s hot reload feature, enabling rapid iterations and quick debugging.</p><h4>Cross-Platform Excellence:</h4><p>Flutter excels in cross-platform development, allowing for the creation of high-performance applications for both Android and iOS with a single codebase.</p><h4>Beautifully Crafted UIs:</h4><p>Elevate user experiences with Flutter\'s expressive and customizable widgets, enabling the creation of visually stunning and consistent UIs.</p><h4>Enhanced Time-to-Market:</h4><p>Benefit from faster development cycles and reduced time-to-market with Flutter as a reputable flutter app development company.</p><h4>Single Codebase, Dual Impact:</h4><p>Flutter\'s single codebase approach ensures code consistency across platforms, reducing development efforts and costs. Embrace the benefits of Flutter with our dedicated team, where innovation meets efficiency to drive unparalleled success in Flutter mobile app development.</p>',
				),
				array(
					'tab_title'   => 'Testing Types',
					'tab_content' => '<p>In flutter app development, various testing types play a crucial role in ensuring the robustness and performance of mobile applications.</p><h4>Unit Testing:</h4><p>Focuses on testing individual units or components of the Flutter application in isolation.</p><h4>Widget Testing:</h4><p>Specifically targets UI components or widgets to ensure their functionality and interaction meet the specified requirements.</p><h4>Integration Testing:</h4><p>Verifies the collaboration and interaction between different components, ensuring seamless integration within the Flutter app.</p><h4>Functional Testing:</h4><p>Validates the overall functionality of the Flutter app, covering user interactions and expected outcomes.</p><h4>Performance Testing:</h4><p>Assesses the responsiveness, speed, and overall performance of the Flutter app under varying conditions.</p><h4>UI/UX Testing:</h4><p>Focuses on the user interface and user experience aspects to ensure a visually appealing and user-friendly application.</p><h4>Regression Testing:</h4><p>Ensures that recent changes or additions to the Flutter app do not negatively impact existing functionalities.</p>',
				),
			),
		),

		'stack_new_box' => array(
			'subtitle' => 'Redefine your app\'s visual appeal with TechnBrains',
			'title'    => 'Technology Stack for Flutter Development',
			'listing'  => array(
				array( 'tab_title' => 'Backend',                   'data_list' => array( array( 'title' => '.NET' ), array( 'title' => 'Java' ), array( 'title' => 'PHP' ), array( 'title' => 'Node' ), array( 'title' => 'Ruby on Rails' ) ) ),
				array( 'tab_title' => 'Project Management Tools',  'data_list' => array( array( 'title' => 'Jira' ), array( 'title' => 'Trello' ), array( 'title' => 'Microsoft Team' ), array( 'title' => 'Slack' ) ) ),
				array( 'tab_title' => 'Front End',                 'data_list' => array( array( 'title' => 'Dart' ) ) ),
				array( 'tab_title' => 'DevOps',                    'data_list' => array( array( 'title' => 'CI/CD' ), array( 'title' => 'GitHub Actions' ) ) ),
				array( 'tab_title' => 'Database',                  'data_list' => array( array( 'title' => 'CoreData' ), array( 'title' => 'SQLite' ), array( 'title' => 'Realm' ), array( 'title' => 'Firebase' ) ) ),
				array( 'tab_title' => 'Testing',                   'data_list' => array( array( 'title' => 'Appium' ), array( 'title' => 'BrowserStack' ), array( 'title' => 'Katalon Test' ), array( 'title' => 'Studio' ) ) ),
			),
		),

		'hiring' => array(
			'lang_title' => 'Flutter App Development Company',
			'hire_title' => 'Hiring Models for Business Success',
			'para_text'  => 'Take your business to new heights with our top-notch developers and flexible hiring models. Choose between monthly or fixed-priced arrangements to suit your needs. Don\'t let staffing challenges hold you back - partner with us for success.',
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
		array(
			'faqhead' => "What is Flutter app development?",
			'faqbody' => "Flutter app development refers to the process of creating mobile applications using the Flutter framework. It involves utilizing the Flutter SDK to build cross-platform applications with a single codebase that can run on both Android and iOS devices. This innovative framework, backed by Google, has gained prominence for its ability to deliver a consistent and visually appealing user experience across different platforms.<br /><br />Choosing TechnBrains, a reputable Flutter app development company, is crucial for businesses seeking to leverage the benefits of Flutter. We specialize in providing comprehensive flutter app development services, encompassing everything from project conceptualization to deployment and ongoing support.<br /><br />For flutter mobile app development, businesses can collaborate with dedicated flutter development companies like TechnBrains to create feature-rich applications. We offer specialized expertise and resources, ensuring the seamless development of cross-platform mobile apps that meet the evolving needs of today's digital landscape."
		),
		array(
			'faqhead' => "How much does Flutter app development cost?",
			'faqbody' => "Are you curious about the cost of Flutter app development? Look no further than TechnBrains, your dedicated Flutter app development company. Our transparent and competitive pricing reflects our commitment to delivering top-notch flutter app development services. Developing a middle-complexity Flutter app with voice call capability costs $37,000 to $55,000. Complex apps like Instagram can cost $50,500 to $65,000 to produce. As one of the leading Flutter app development companies, TechnBrains ensures cost-effectiveness and excellence in every aspect of Flutter mobile app development. Explore the possibilities with our seasoned team and discover the value we bring to your Flutter app development journey."
		),
		array(
			'faqhead' => "How does outsourcing to a Flutter development company work?",
			'faqbody' => "At TechnBrains, our streamlined process for flutter app development ensures a seamless experience when outsourcing to our reputable flutter development company. Here's a breakdown of how it works:<br /><br />1. Consultation and Requirements Analysis: Initiate the process by engaging in a comprehensive consultation with our expert team. We delve into understanding your specific needs, business goals, and vision for the project. This phase lays the foundation for tailoring our Flutter app development services to match your requirements precisely.<br /><br />2. Proposal and Agreement: Following the consultation, we provide a detailed proposal outlining the scope, timeline, and cost of your Flutter app development project. Once the terms are agreed upon, we proceed to formalize the agreement, ensuring transparency and alignment of expectations.<br /><br />3. Development Kick-off: Upon agreement, our skilled developers kick off the development process. Leveraging their expertise in Flutter mobile app development, they begin building the app's architecture and core features. Regular updates and collaboration ensure that your vision is realized throughout the development journey.<br /><br />4. Progress Monitoring and Feedback: We maintain open communication channels to keep you informed about the progress of your Flutter app. Your feedback is crucial, and we encourage regular reviews to ensure the project aligns with your expectations. Our iterative approach allows for flexibility and adjustments as needed.<br /><br />5. Rigorous Testing: Quality is paramount. Our dedicated quality assurance team conducts rigorous testing at various stages of development to guarantee the functionality, performance, and security of your Flutter app. This ensures that the final product meets the highest standards of our flutter development services.<br /><br />6. Deployment and Post-Launch Support: Upon your approval, we will deploy the Flutter app. Our commitment doesn't end there – we provide active post-launch support and maintenance services. This ongoing partnership ensures the continued success and optimal performance of your Flutter application.<br /><br />Outsourcing to TechnBrains for flutter app development means entrusting your project to a dedicated team committed to delivering excellence and ensuring your app stands out in the competitive digital landscape."
		),
		array(
			'faqhead' => "Can I hire a Flutter developer on a full-time basis?",
			'faqbody' => "Are you wondering about the feasibility of hiring a Flutter developer on a full-time basis? At TechnBrains, we offer dedicated and skilled Flutter developers available for full-time engagement. Unlock the full potential of flutter app development with our expert developers, who are committed to bringing your vision to life."
		),
		array(
			'faqhead' => "What kind of applications can you build using Flutter?",
			'faqbody' => "At TechnBrains, our expertise in flutter app development empowers us to create a diverse range of applications tailored to meet your specific needs. With our dedicated team and commitment to excellence, we specialize in delivering cutting-edge solutions. Here are some examples of applications we can build using our flutter development services:<br /><br />Cross-Platform Mobile Apps: Leverage the power of Flutter for seamless cross-platform mobile app development. We ensure your application runs flawlessly on both Android and iOS devices, providing a consistent user experience.<br /><br />Custom Business Applications: Enhance your business operations with bespoke Flutter applications. From project management tools to CRM systems, we design and develop custom solutions that align with your business objectives.<br /><br />E-commerce Apps: Elevate your online presence with Flutter-powered e-commerce applications. Our solutions enable smooth and intuitive shopping experiences, helping you connect with your customers effectively.<br /><br />Healthcare Solutions: Build innovative healthcare applications with our expertise in flutter mobile app development. From appointment scheduling to telemedicine solutions, we tailor applications to meet the unique demands of the healthcare industry.<br /><br />Educational Apps: Transform the learning experience with interactive educational apps. Our Flutter development services cater to creating engaging platforms for e-learning, course management, and student collaboration.<br /><br />Entertainment and Media Apps: Immerse your audience with captivating entertainment and media applications. Whether it's streaming services, gaming platforms, or interactive content apps, we bring your creative vision to life.<br /><br />Social Networking Apps: Foster community engagement with feature-rich social networking applications. Our Flutter development team creates platforms that facilitate seamless communication and interaction.<br /><br />Travel and Tourism Apps: Simplify travel experiences with Flutter applications tailored for the travel and tourism industry. From booking platforms to travel guides, we enhance the journey for both businesses and users.<br /><br />Partner with TechnBrains, your trusted flutter app development company, to bring your unique app ideas to fruition. Our comprehensive flutter development services ensure top-notch solutions that align with your business goals."
		),
		array(
			'faqhead' => "Does Flutter use native components?",
			'faqbody' => "Flutter utilizes native components. In flutter app development, TechnBrains seamlessly incorporates native features, ensuring a superior and native-like user experience. As a leading flutter app development company, we specialize in delivering exceptional flutter app development services. Trust TechnBrains for cutting-edge solutions in flutter mobile app development. Elevate your project with our dedicated flutter development services and experience innovation at its best."
		),
		array(
			'faqhead' => "Will TechnBrains do custom development work?",
			'faqbody' => "Absolutely, TechnBrains specializes in custom development work, offering tailored solutions to meet your unique needs. Our expertise spans a wide range of services, including top-notch Flutter app development. As a trusted Flutter development company, we provide comprehensive services encompassing everything from conceptualization to deployment. If you're seeking excellence in Flutter mobile app development, TechnBrains is your dedicated partner. Explore the possibilities of cutting-edge solutions with our experienced team."
		),
	),
),

	),
);
