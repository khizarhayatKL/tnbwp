<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(),

	'components' => array(
		array( 'name' => 'industry-banner',     'modifier_class' => '' ),
		array( 'name' => 'dedicated-lang-desc', 'modifier_class' => '' ),
		array( 'name' => 'language-services',   'modifier_class' => '' ),
		array( 'name' => 'development-process', 'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'proposal',            'modifier_class' => '' ),
		array( 'name' => 'development-process', 'modifier_class' => '', 'args' => array( 'data_key' => 'dev_process_two' ) ),
		array( 'name' => 'development-services','modifier_class' => '' ),
		array( 'name' => 'we-offer',            'modifier_class' => '' ),
		array( 'name' => 'main-faqs',           'modifier_class' => 'gray-bg' ),
		array( 'name' => 'testimonials',        'modifier_class' => '' ),
	),

	'mock_data' => array(

		'industry_banner' => array(
			'title'             => 'Leading Flutterflow App Development Company',
			'para'              => 'TechnBrains is the best Flutterflow App Service provider in the USA. Our app developers harness the power of Flutterflow to create stunning and efficient Flutter applications in a fraction of the time. Experience 10x faster development and elevate your app-building game today.',
			'second_button'     => true,
			'banner_img_src'    => '/cms/flutter-flow/banner-img.webp',
			'banner_img_width'  => '909',
			'banner_img_height' => '921',
			'banner_img_alt'    => 'flutter-banner',
		),

		'dedicated_lang_desc' => array(
			'para_html' => 'For Flutterflow, we are confident in our ability to connect any backend seamlessly. Our team of professional developers is well-versed in various No-Code and Low-Code tools and has partnered with reputable companies such as Rowy.io.<br><br>We have completed projects with different backends and services, such as Firebase, Supabase, Rowy, Builship, Xano, OpenAI, Flutter, and MailChimp. So, whether it\'s a complex project or a simple one, you can trust us to handle it with the utmost confidence and expertise.',
		),

		'language_services' => array(
			'head_text' => 'List of Flutter Flow Services that We Provide',
			'para_text' => 'Are you curious about what we offer? Check out our list of amazing Flutter flow services that we provide - we\'re proud to offer a wide range of options to suit your needs and exceed your expectations!',
			'btn_text'  => 'Book AN APPOINTMENT',
			'anchor'    => false,
			'listing'   => array(
				array( 'img_src' => '/cms/flutter-flow/d1.png', 'width' => '80', 'height' => '80', 'alt' => 'Flutterflow Web Development',        'list_head' => 'Flutterflow Web Development',        'list_para' => 'With our expertise, we can create responsive and elegant website designs that are not only visually stunning but also highly functional. Our rapid development process means you can have your dream website up and running in no time!' ),
				array( 'img_src' => '/cms/flutter-flow/d2.png', 'width' => '80', 'height' => '80', 'alt' => 'Flutterflow App Development',          'list_head' => 'Flutterflow App Development',          'list_para' => 'Our Flutter Flow App Development Services are of the highest quality. You can rely on us to provide you with daily project reports and complete control over the development process, ensuring that everything meets your expectations.' ),
				array( 'img_src' => '/cms/flutter-flow/d3.png', 'width' => '80', 'height' => '80', 'alt' => 'Hire Flutterflow Developer',           'list_head' => 'Hire Flutterflow Developer',           'list_para' => 'We offer unparalleled expertise in Flutter Flow with our Flutterflow Developers for hire. Our team consists of the top 1% of Flutter Flow experts from around the world, ready to take your project to the next level.' ),
				array( 'img_src' => '/cms/flutter-flow/d4.png', 'width' => '80', 'height' => '80', 'alt' => 'Hire Enterprise Flutterflow Developer', 'list_head' => 'Hire Enterprise Flutterflow Developer', 'list_para' => 'We can build top-notch enterprise apps for your business. Our team of expert developers is here to help! We specialize in creating distributed and scalable solutions that are tailored to meet the unique needs of your business.' ),
				array( 'img_src' => '/cms/flutter-flow/d5.png', 'width' => '80', 'height' => '80', 'alt' => 'MVP Development in Flutterflow',       'list_head' => 'MVP Development in Flutterflow',       'list_para' => 'Get your dream project up and running in no time with TechnBrain\'s MVP Development in Flutterflow. With our pre-defined templates and one code base for multiple platforms, you can get your project 10X faster than traditional methods.' ),
				array( 'img_src' => '/cms/flutter-flow/d6.png', 'width' => '80', 'height' => '80', 'alt' => 'Enterprise Flutterflow Training',      'list_head' => 'Enterprise Flutterflow Training',      'list_para' => 'Join our team of experts for hands-on Flutter Flow training, including articles, real-time video lectures, and a supportive community.' ),
			),
		),

		'dev_process' => array(
			'main_title' => 'Topnotch Flutterflow App Service Providers',
			'lang_title' => 'TechnBrain\'s Flutterflow Development Can Help You With',
			'lang_para'  => '',
			'classes'    => 'flutter-main',
			'listing'    => array(
				array( 'img_src' => '/cms/flutter-flow/dp-1.png', 'title' => 'Flutterflow App Creation',         'para' => 'Utilize the expertise of our skilled Flutterflow developers to build high-quality, feature-rich applications.' ),
				array( 'img_src' => '/cms/flutter-flow/dp-2.png', 'title' => 'Flutterflow Web App Integration',   'para' => 'Seamlessly integrate Flutterflow into your web projects, ensuring a cohesive and responsive user experience.' ),
				array( 'img_src' => '/cms/flutter-flow/dp-3.png', 'title' => 'AI-Powered Flutterflow Solutions',  'para' => 'Unlock the potential of smart applications with our specialized Flutterflow AI capabilities.' ),
				array( 'img_src' => '/cms/flutter-flow/dp-4.png', 'title' => 'Custom Flutterflow Templates',      'para' => 'Tailor your app effortlessly with our bespoke Flutterflow templates crafted to suit your unique needs.' ),
				array( 'img_src' => '/cms/flutter-flow/dp-5.png', 'title' => 'Flutterflow App Enhancement',       'para' => 'Elevate your existing app with the latest features and functionalities using our Flutterflow experts.' ),
				array( 'img_src' => '/cms/flutter-flow/dp-6.png', 'title' => 'Flutter Agency Partnership',        'para' => 'Collaborate with a dedicated Flutter agency for comprehensive solutions and industry-leading expertise.' ),
				array( 'img_src' => '/cms/flutter-flow/dp-7.png', 'title' => 'Flutter Flow Builder Assistance',   'para' => 'Navigate the intricacies of Flutterflow with ease, guided by our seasoned Flutter Flow Builder professionals.' ),
			),
		),

		'proposal' => array(
			'head_html' => '<h2>Turn Your App Development dreams into reality with our Flutter Flow App Development Services</h2>',
			'btn_text'  => 'Let\'s Build',
			'anchor'    => false,
		),

		'dev_process_two' => array(
			'main_title' => 'Flutterflow app in Easy 7 steps',
			'lang_title' => 'Our Comprehensive Flutterflow Development Process',
			'lang_para'  => 'At TechnBrains, our 7-step Flutterflow development process guarantees a seamless journey from ideation to a feature-rich, polished application.',
			'listing'    => array(
				array( 'number' => '01', 'title' => 'Initial Consultation & Scoping',         'para' => 'Engage in a detailed discussion to understand your business needs and challenges. Our expert Flutterflow consultants meticulously scope the project, gathering requirements and user stories to align with industry standards.' ),
				array( 'number' => '02', 'title' => 'Strategic Design & Development',          'para' => 'As a leading Flutter agency for crafting visually appealing and functionally robust applications, our skilled Flutterflow developers utilize the latest tools for design, ensuring a best-in-class, user-friendly experience.' ),
				array( 'number' => '03', 'title' => 'Incorporating Flutterflow AI Solutions',  'para' => 'We incorporate your app with smart functionalities using our specialized Flutterflow AI solutions. Integrate artificial intelligence seamlessly to enhance user experiences and streamline operations.' ),
				array( 'number' => '04', 'title' => 'Customized Flutterflow Templates',        'para' => 'Tailor your application to perfection with our range of Flutterflow templates. We offer customization options that align with your brand and project requirements, ensuring a unique and captivating app design.' ),
				array( 'number' => '05', 'title' => 'Focused Testing & Quality Assurance',     'para' => 'Rigorous testing is conducted to identify and rectify any potential issues. Our team of Flutter experts meticulously assesses the application\'s functionality, performance, and security, ensuring a flawless end product.' ),
				array( 'number' => '06', 'title' => 'Deployment & Launch',                     'para' => 'The tested and refined solution is deployed for your audience. Our precise deployment process ensures a smooth transition, and we work towards achieving a successful launch for your Flutterflow app or web app.' ),
				array( 'number' => '07', 'title' => 'Post-Launch Support & Maintenance',       'para' => 'Our commitment doesn\'t end at launch. Benefit from our ongoing support and maintenance services. Our dedicated team remains at your service to address any post-launch requirements, updates, or enhancements.' ),
			),
		),

		'dev_services' => array(
			'subtitle' => 'TechnBrains FlutterFlow Expertise',
			'title'    => 'Why Opt For TechnBrains In Flutterflow App Development?',
			'para'     => 'At TechnBrains, we\'re not just a Flutterflow Application Development Company; we\'re an extension of your technical team. Here\'s why choosing TechnBrains for your Flutterflow app development is the smart move:',
			'listing'  => array(
				array(
					'img_src' => '/cms/flutter-flow/dev-listing-bg.webp',
					'width'   => '534',
					'height'  => '600',
					'content' => array(
						array( 'title' => 'Expertise as a Leading Flutter Agency',     'para' => 'As a premier Flutter agency, we stand out in crafting cutting-edge solutions. Our team of Flutterflow developers is well-versed in creating scalable, secure, and performance-centric SAAS-based apps and websites.' ),
						array( 'title' => 'Efficient Cross-Platform App Development',  'para' => 'We specialize in majorly developing cross-platform apps for Android and iOS, ensuring less time and cost without compromising quality. Our certified experts in Flutter Flow and Flutter app development make it happen.' ),
						array( 'title' => 'Innovative Flutterflow AI Integration',     'para' => 'Elevate your apps with our innovative Flutterflow AI integration. Our proficiency extends beyond basic app development, incorporating smart functionalities to enhance user experiences.' ),
						array( 'title' => 'Tailored Flutterflow Templates',            'para' => 'Benefit from our collection of Flutterflow templates, customized to meet your specific project and branding needs. We offer flexibility and uniqueness in design to make your app stand out.' ),
						array( 'title' => 'Scalability Mastery',                       'para' => 'Our superb knowledge and extensive experience empower us to scale products seamlessly. From a few customers to a few million, TechnBrains ensures that your Flutterflow app is robust and ready for any level of growth.' ),
						array( 'title' => 'Dedication to Security and Performance',    'para' => 'Security is paramount, and we build with a focus on creating secure applications. Our commitment to performance ensures that your Flutterflow app delivers a seamless and efficient experience for users.' ),
					),
				),
			),
		),

		'we_offer' => array(
			'subtitle' => 'Discover topnotch Flutterflow services',
			'title'    => 'Other Services We Offer',
			'para'     => 'At TechnBrains, we go beyond boundaries to deliver cutting-edge solutions, ensuring your business stays at the forefront of innovation and success.',
			'listing'  => array(
				array( 'img_src' => '/cms/flutter-flow/w1.png', 'title' => 'Mobile App Development',        'para' => 'Our team specializes in crafting seamless and high-performance apps that resonate with your audience. Let us help you elevate your business and stay ahead of the competition.' ),
				array( 'img_src' => '/cms/flutter-flow/w2.png', 'title' => 'Figma Design Solutions',        'para' => 'Our Figma design solutions enhance your digital presence with creative and innovative designs that combine aesthetics and functionality. We keep up with industry trends to bring you captivating designs.' ),
				array( 'img_src' => '/cms/flutter-flow/w3.png', 'title' => 'Website Design and Development', 'para' => 'Craft a standout online presence with our expert website design and development services. We create visually appealing, responsive websites tailored to your business needs.' ),
				array( 'img_src' => '/cms/flutter-flow/w4.png', 'title' => 'WordPress Expertise',            'para' => 'Maximize your online platform with our WordPress expertise. Our team builds and enhances WordPress websites with technical proficiency and creativity.' ),
				array( 'img_src' => '/cms/flutter-flow/w1.png', 'title' => 'Mobile App Development',        'para' => 'Our team specializes in crafting seamless and high-performance apps that resonate with your audience. Let us help you elevate your business and stay ahead of the competition.' ),
				array( 'img_src' => '/cms/flutter-flow/w2.png', 'title' => 'Figma Design Solutions',        'para' => 'Our Figma design solutions enhance your digital presence with creative and innovative designs that combine aesthetics and functionality. We keep up with industry trends to bring you captivating designs.' ),
				array( 'img_src' => '/cms/flutter-flow/w3.png', 'title' => 'Website Design and Development', 'para' => 'Craft a standout online presence with our expert website design and development services. We create visually appealing, responsive websites tailored to your business needs.' ),
				array( 'img_src' => '/cms/flutter-flow/w4.png', 'title' => 'WordPress Expertise',            'para' => 'Maximize your online platform with our WordPress expertise. Our team builds and enhances WordPress websites with technical proficiency and creativity.' ),
			),
		),

		'faqs' => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array( 'faqhead' => 'How Much Does It Cost On Average To Build a FlutterFlow App?',    'faqbody' => 'The cost of FlutterFlow app development varies, typically ranging from $40,000 to $200,000+. Precise estimates depend on project complexity, features, and customization requirements.' ),
				array( 'faqhead' => 'What Platforms Does FlutterFlow Support?',                         'faqbody' => 'FlutterFlow is versatile and supports multiple platforms, ensuring cross-platform development. It caters to iOS, Android, and web applications seamlessly.' ),
				array( 'faqhead' => 'Is FlutterFlow Good for Mobile App Development?',                 'faqbody' => 'Absolutely, FlutterFlow is an excellent choice for mobile app development. Its efficiency, ease of use, and ability to create beautiful, responsive interfaces make it a preferred platform for creating engaging mobile applications.' ),
				array( 'faqhead' => 'Is FlutterFlow Better than Glide?',                               'faqbody' => 'Both FlutterFlow and Glide are powerful tools, each with its unique strengths. Choosing between them depends on specific project requirements. Consult our Flutter experts to determine the best fit for your needs.' ),
				array( 'faqhead' => 'What Are the Benefits of FlutterFlow App Development?',           'faqbody' => 'FlutterFlow app development offers benefits such as rapid development, a visually intuitive Flutter Flow Builder, a wide range of templates, AI integration possibilities, and cross-platform compatibility.' ),
				array( 'faqhead' => 'How Much Does It Cost to Develop a FlutterFlow App?',             'faqbody' => 'At TechnBrains, we ensure transparency and collaboration throughout the development process. Clients have access to project management tools, regular updates, and direct communication with our team.' ),
				array( 'faqhead' => 'Which company is the best FlutterFlow App Development Company?',  'faqbody' => 'TechnBrains stands out as a leading FlutterFlow App Development Company, offering expertise, innovation, and a commitment to excellence in crafting exceptional applications.' ),
				array( 'faqhead' => 'Why choose TechnBrains as a FlutterFlow App Service Provider?',   'faqbody' => 'TechnBrains is your ideal partner for FlutterFlow App Development, offering a dedicated team of experts, innovative solutions, and a track record of delivering high-performance applications.' ),
			),
		),

	),
);
