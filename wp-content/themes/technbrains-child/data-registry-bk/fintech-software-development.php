<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array( '@type' => 'Question', 'name' => 'Why Should I Choose TechnBrains as my Fintech App/Software Development Partner?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'TechnBrains stands out as a premier fintech software development company known for its expertise and commitment to delivering innovative solutions. Choose us for cutting-edge fintech app development services tailored to elevate your financial technology initiatives.' ) ),
				array( '@type' => 'Question', 'name' => 'How much time does it take to develop a Fintech App?',                           'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'The development time for a fintech app varies based on complexity and features. Our efficient processes ensure timely delivery, and our team can provide a detailed timeline upon understanding your project requirements.' ) ),
				array( '@type' => 'Question', 'name' => 'How much does it cost to develop a Fintech App?',                                'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'The cost of fintech app development is influenced by factors such as features and complexity. To get an accurate cost estimation for your project, contact TechnBrains for a personalized quote.' ) ),
				array( '@type' => 'Question', 'name' => 'What types of Fintech Apps does your company develop?',                          'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'TechnBrains excels in diverse fintech application development services, crafting solutions ranging from payment apps and investment platforms to banking software and financial management tools.' ) ),
				array( '@type' => 'Question', 'name' => 'What are the advantages of a Fintech App/Software Solution for my business?',   'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'A fintech app/software solution provides advantages like enhanced customer engagement, streamlined financial processes, improved security, and the ability to stay competitive in the rapidly evolving financial technology landscape.' ) ),
				array( '@type' => 'Question', 'name' => 'What security compliances will you use for my Fintech Software?',               'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'TechnBrains prioritizes security in fintech software development. We adhere to industry-standard security compliances, including but not limited to PCI DSS, GDPR, and HIPAA, ensuring the utmost protection for your financial data.' ) ),
				array( '@type' => 'Question', 'name' => 'What technologies do you use to develop Fintech App and Software?',             'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Our fintech developers leverage cutting-edge technologies such as blockchain, artificial intelligence, and cloud computing to create robust and scalable fintech applications that meet the evolving demands of the industry.' ) ),
				array( '@type' => 'Question', 'name' => 'Will you sign an NDA to protect my Fintech App idea?',                          'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, at TechnBrains, we understand the importance of confidentiality. We are willing to sign a Non-Disclosure Agreement (NDA) to protect your fintech app idea and ensure your intellectual property is safeguarded.' ) ),
				array( '@type' => 'Question', 'name' => 'How can I track the progress of my Fintech Software project?',                  'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'We prioritize transparency in our fintech development services. You can track the progress of your project through regular updates, meetings, and collaborative tools, ensuring you are involved at every stage of development.' ) ),
			),
		),
	),

	'components' => array(
		array( 'name' => 'industry-banner',    'modifier_class' => '' ),
		array( 'name' => 'counter-sec',        'modifier_class' => '' ),
		array( 'name' => 'language-services',  'modifier_class' => '' ),
		array( 'name' => 'industry-features',  'modifier_class' => '' ),
		array( 'name' => 'stack-new-box',      'modifier_class' => 'angular-stack gray-bg' ),
		array( 'name' => 'types-of-apps',      'modifier_class' => 'flip-details' ),
		array( 'name' => 'development-process','modifier_class' => '' ),
		array( 'name' => 'proposal',           'modifier_class' => '' ),
		array( 'name' => 'testimonials',       'modifier_class' => '' ),
		array( 'name' => 'main-faqs',          'modifier_class' => '' ),
	),

	'mock_data' => array(

		'industry_banner' => array(
			'title'             => 'Fintech Software Development Company',
			'para'              => 'TechnBrains disrupts the fintech market with advanced app and software solutions. Our custom FinTech software development services accelerate digital innovation, overcoming industry challenges, and enhancing customer loyalty.',
			'second_button'     => false,
			'banner_img_src'    => '/industry/fintech/banner.webp',
			'banner_img_width'  => '759',
			'banner_img_height' => '658',
			'banner_img_alt'    => 'banner',
			'bg_image'          => '/industry/fintech/bg-main.webp',
		),

		'counter_sec' => array(
			'listing' => array(
				array( 'count' => '80', 'sign' => '+', 'content' => 'Fintech Solutions Implemented' ),
				array( 'count' => '98', 'sign' => '%', 'content' => 'Fintech Client Satisfaction' ),
				array( 'count' => '7',  'sign' => 'x', 'content' => 'Reduced Time-to-Market for Financial Innovations' ),
				array( 'count' => '5',  'sign' => 'x', 'content' => 'Revenue Growth through Secure Payment Systems' ),
			),
		),

		'language_services' => array(
			'head_text' => 'Fintech App and Software Development Services',
			'para_text' => 'To help businesses establish a strong presence in the ever-changing fintech industry, we offer unparalleled fintech app and software development services. Here are some of our top fintech solutions.',
			'btn_text'  => 'REACH OUT NOW',
			'anchor'    => false,
			'listing'   => array(
				array( 'img_src' => '/industry/fintech/d1.png',  'width' => '80', 'height' => '80', 'alt' => 'Fintech Software Development',              'list_head' => 'Fintech Software Development',              'list_para' => 'Are you interested in developing fintech software? Our team of fintech developers can build tailored solutions based on your business requirements and preferences.' ),
				array( 'img_src' => '/industry/fintech/d2.png',  'width' => '80', 'height' => '80', 'alt' => 'Mobile Banking App Development',             'list_head' => 'Mobile Banking App Development',             'list_para' => 'Take advantage of the untapped market for mobile banking apps with our innovative app development services.' ),
				array( 'img_src' => '/industry/fintech/d3.png',  'width' => '80', 'height' => '80', 'alt' => 'Insurance App Development',                  'list_head' => 'Insurance App Development',                  'list_para' => 'Conquer the insurance market with an insurtech app from TechnBrains\'s leading fintech developers.' ),
				array( 'img_src' => '/industry/fintech/d4.png',  'width' => '80', 'height' => '80', 'alt' => 'Digital Wallet App Development',              'list_head' => 'Digital Wallet App Development',              'list_para' => 'Create an eWallet app like PayPal with our affordable development services.' ),
				array( 'img_src' => '/industry/fintech/d5.png',  'width' => '80', 'height' => '80', 'alt' => 'Crowdfunding Portal Development',             'list_head' => 'Crowdfunding Portal Development',             'list_para' => 'Looking to create a crowdfunding platform like GoFundMe or Kickstarter? At TechnBrains, we offer crowdfunding portal development services to help you achieve this.' ),
				array( 'img_src' => '/industry/fintech/d6.png',  'width' => '80', 'height' => '80', 'alt' => 'P2P Lending Platform Development',            'list_head' => 'P2P Lending Platform Development',            'list_para' => 'In today\'s world of easy loans, a P2P lending platform can help you earn millions in profit. Our team of Fintech developers is here to assist you.' ),
				array( 'img_src' => '/industry/fintech/d7.png',  'width' => '80', 'height' => '80', 'alt' => 'Wealth Management Software Development',      'list_head' => 'Wealth Management Software Development',      'list_para' => 'Wealth management software development services are ideal for companies seeking customized software to meet their specific needs.' ),
				array( 'img_src' => '/industry/fintech/d8.png',  'width' => '80', 'height' => '80', 'alt' => 'Accounting Management Software Development',  'list_head' => 'Accounting Management Software Development',  'list_para' => 'Our team develops custom software for account management that is tailored to fit your specific requirements.' ),
				array( 'img_src' => '/industry/fintech/d9.png',  'width' => '80', 'height' => '80', 'alt' => 'Mobile Payment App Development',              'list_head' => 'Mobile Payment App Development',              'list_para' => 'Our team of financial app developers can create a mobile payment app to simplify P2P and international transactions for your end-users.' ),
				array( 'img_src' => '/industry/fintech/d10.png', 'width' => '80', 'height' => '80', 'alt' => 'Trading Platform Development',                'list_head' => 'Trading Platform Development',                'list_para' => 'Trading stocks has become a popular trend, and you can take advantage of its popularity with your unique offerings.' ),
				array( 'img_src' => '/industry/fintech/d11.png', 'width' => '80', 'height' => '80', 'alt' => 'Loan Lending App Development',                'list_head' => 'Loan Lending App Development',                'list_para' => 'As cash advances and soft loans become more popular, financial companies are investing in loan lending app development.' ),
				array( 'img_src' => '/industry/fintech/d12.png', 'width' => '80', 'height' => '80', 'alt' => 'Robo-Advisor',                                'list_head' => 'Robo-Advisor',                                'list_para' => 'Collaborate with skilled financial software developers to design an AI-powered Robo-Advisor that facilitates responsible financial decision-making.' ),
				array( 'img_src' => '/industry/fintech/d13.png', 'width' => '80', 'height' => '80', 'alt' => 'Develop A Fintech App With Expert Developers', 'list_head' => 'Develop A Fintech App With Expert Developers', 'list_para' => 'If you\'re interested in entering the financial technology industry and making millions, our fintech app development services are ideal for you.' ),
			),
		),

		'industry_features' => array(
			'subtitle' => 'Drive Digital Financial Evolution',
			'title'    => 'Fintech App Features',
			'para'     => 'Our dedication to shaping innovative solutions is evident in our approach towards fintech software development. At our esteemed fintech software development company, we provide a diverse array of features, blending innovation and functionality seamlessly in the world of fintech application development services.',
			'listing'  => array(
				array(
					'tab_title'   => 'Foundational Features',
					'tab_content' => array(
						array( 'img_src' => '/industry/fintech/f1.png',  'title' => 'Sign-Up',                    'content' => 'Core registration functionality allows users to register via email, phone number, Google ID, or social login.' ),
						array( 'img_src' => '/industry/fintech/f2.png',  'title' => 'Instant Money Transfer',     'content' => 'Facilitates swift bank-to-bank or peer-to-peer money transfers directly through the app.' ),
						array( 'img_src' => '/industry/fintech/f3.png',  'title' => 'Push Notification',          'content' => 'Keeps users informed on critical transactions and important alerts through timely push notifications.' ),
						array( 'img_src' => '/industry/fintech/f4.png',  'title' => 'Voice Recognition',          'content' => 'Trending feature enabling users to find services or trigger actions via voice commands.' ),
						array( 'img_src' => '/industry/fintech/f5.png',  'title' => 'Bank Account Linking',       'content' => 'Simplifies money transfer and account handling through seamless bank account linking.' ),
						array( 'img_src' => '/industry/fintech/f6.png',  'title' => 'Budgeting Tools',            'content' => 'Empowers users with a suite of tools for effective financial management and planning.' ),
						array( 'img_src' => '/industry/fintech/f7.png',  'title' => 'Investment Advice',          'content' => 'Guiding users in the realms of investment and trading, aligning with emerging trends.' ),
						array( 'img_src' => '/industry/fintech/f8.png',  'title' => 'Live Chat Support',          'content' => 'Chatbot-driven live support for resolving technical issues promptly with expert assistance.' ),
						array( 'img_src' => '/industry/fintech/f9.png',  'title' => 'International Transfer',     'content' => 'Meets the growing demand for cross-border or international money transfers.' ),
						array( 'img_src' => '/industry/fintech/f10.png', 'title' => 'Regional Language Choice',   'content' => 'Enhances user experience with multiple language support for fintech software localization.' ),
						array( 'img_src' => '/industry/fintech/f11.png', 'title' => 'Progress Tracking',          'content' => 'Allows users to monitor their financial progress monthly or weekly goals directly within the app.' ),
						array( 'img_src' => '/industry/fintech/f12.png', 'title' => 'Interactive Learning Modules','content' => 'Educational content through interactive modules to enrich users on vital financial topics.' ),
					),
				),
				array(
					'tab_title'   => 'Advanced Features',
					'tab_content' => array(
						array( 'img_src' => '/industry/fintech/f13.png', 'title' => 'AI Integration',             'content' => 'Elevates fintech functionality through various applications of Artificial Intelligence.' ),
						array( 'img_src' => '/industry/fintech/f14.png', 'title' => 'Cross-Platform Functionality','content' => 'Enables users to access fintech data seamlessly across devices with account-based integration.' ),
						array( 'img_src' => '/industry/fintech/f15.png', 'title' => 'Data Analytics',             'content' => 'Provides users with data-driven insights, facilitating informed decision-making.' ),
						array( 'img_src' => '/industry/fintech/f16.png', 'title' => 'Mobile Banking Integration', 'content' => 'Unlocks a range of features and functionalities through seamless mobile banking integration.' ),
						array( 'img_src' => '/industry/fintech/f17.png', 'title' => 'Robo-Advisor',               'content' => 'AI-driven bot with profound knowledge to assist users in resolving issues promptly.' ),
						array( 'img_src' => '/industry/fintech/f18.png', 'title' => 'Biometric Authentication',   'content' => 'Enhances account security through fingerprint, facial recognition, or retina scan authentication.' ),
						array( 'img_src' => '/industry/fintech/f19.png', 'title' => 'Multi-User Collaboration',   'content' => 'Advanced feature allowing multiple users to collaborate for enhanced fintech functionality.' ),
						array( 'img_src' => '/industry/fintech/f20.png', 'title' => 'ATM Locator',                'content' => 'Built-in geolocation-driven ATM locator for user convenience.' ),
						array( 'img_src' => '/industry/fintech/f21.png', 'title' => 'Data Encryption',            'content' => 'Reinforces security with end-to-end data encryption for secure data transmission.' ),
						array( 'img_src' => '/industry/fintech/f22.png', 'title' => 'IoT Integration',            'content' => 'Leverages the Internet of Things for transaction alerts and access through smart devices.' ),
						array( 'img_src' => '/industry/fintech/f23.png', 'title' => 'Tokenization',               'content' => 'Blockchain-based tokenization secures crucial data in an immutable digital ledger.' ),
						array( 'img_src' => '/industry/fintech/f24.png', 'title' => 'Cash Advances',              'content' => 'Addresses the high demand for soft loans, offering revenue generation potential.' ),
					),
				),
			),
		),

		'stack_new_box' => array(
			'subtitle' => 'Power Your Fintech Future',
			'title'    => 'Fintech App Development Tech Stack',
			'para'     => 'Fintech App Developers at TechnBrains only use top-tier technology stacks approved by industry leaders to create innovative, secure, and robust solutions.',
			'listing'  => array(
				array(
					'tab_title' => 'Frontend',
					'data_list' => array(
						array( 'title' => 'Html' ),
						array( 'title' => 'CSS' ),
						array( 'title' => 'Angular JS' ),
						array( 'title' => 'React JS' ),
						array( 'title' => 'Vue JS' ),
						array( 'title' => 'NEXT JS' ),
						array( 'title' => 'Meteor' ),
					),
				),
				array(
					'tab_title' => 'Backend',
					'data_list' => array(
						array( 'title' => '.NET' ),
						array( 'title' => 'Java' ),
						array( 'title' => 'Python' ),
						array( 'title' => 'PHP' ),
						array( 'title' => 'Node JS' ),
						array( 'title' => 'Go' ),
					),
				),
				array(
					'tab_title' => 'Mobile',
					'data_list' => array(
						array( 'title' => 'IOS' ),
						array( 'title' => 'Android' ),
						array( 'title' => 'Ionic' ),
						array( 'title' => 'Flutter' ),
						array( 'title' => 'Xamarin' ),
						array( 'title' => 'React Native' ),
						array( 'title' => 'Cordova' ),
					),
				),
				array(
					'tab_title' => 'DevOps',
					'data_list' => array(
						array( 'title' => 'Docker' ),
						array( 'title' => 'Kubernetes' ),
						array( 'title' => 'Puppet' ),
						array( 'title' => 'Saltstack' ),
						array( 'title' => 'SQL Server' ),
						array( 'title' => 'Terraform' ),
						array( 'title' => 'Ansible' ),
					),
				),
				array(
					'tab_title' => 'Payment',
					'data_list' => array(
						array( 'title' => 'Alipay' ),
						array( 'title' => 'Paypal' ),
						array( 'title' => 'Square' ),
						array( 'title' => 'Stripe' ),
						array( 'title' => 'Adyen' ),
					),
				),
				array(
					'tab_title' => 'Cloud',
					'data_list' => array(
						array( 'title' => 'Google Cloud' ),
						array( 'title' => 'AWS' ),
						array( 'title' => 'Azure' ),
						array( 'title' => 'Digital Ocean' ),
					),
				),
			),
		),

		'types_of_apps' => array(
			'subtitle' => 'Elevate Financial Experiences',
			'title'    => 'Our All-inclusive FinTech Software Development Services',
			'para'     => 'As a leading company in financial software development, we offer resilient, scalable, and high-performing FinTech solutions. Our FinTech development services include',
			'bg_image' => '/industry/fintech/type-bg.webp',
			'listing'  => array(
				array(
					'img_src'     => '/industry/fintech/foresyte.webp',
					'img_width'   => '583',
					'img_height'  => '1000',
					'alt_text'    => 'Fintech',
					'tab_content' => '<h4>&#9679; Financial Software Development</h4><p>Our team of finance software development experts has a strong track record of providing unique and innovative FinTech solutions to help your business grow digitally. With almost a decade of experience in developing high-end FinTech applications, we assist you at every stage of your digital transformation journey.</p><h4>&#9679; Mobile Banking Software Development</h4><p>We are a unique company that specializes in developing custom software solutions and mobile applications for banks. Our services cater to retail, commercial, and investment banks worldwide. Our microservice architecture is performance-driven, and our products are developed using agile methodologies.</p><h4>&#9679; Wealth Management Software Development</h4><p>We are a FinTech app development company that understands the importance of efficient and secure wealth management. Our developers create a smart platform for customers to track, manage, and grow their wealth.</p><h4>&#9679; Accounting Management Software Development</h4><p>Our bespoke accounting software solutions go beyond managing financial transactions. They securely manage financial information, including fixed assets, liabilities, cash assets, and other features tailored to your business needs.</p><h4>&#9679; Crowdfunding Platform Development</h4><p>Our FinTech app development services include building scalable crowdfunding platforms for fundraising, debt, and donation. Our platforms have high-end features such as investment tracking, social networking tools, and digital document management.</p><h4>&#9679; Digital Wallet Development</h4><p>Banks can cater to modern customers who demand high security and customized promotions with a well-designed wallet application. Our FinTech software developers create digital wallet apps that enable banks and financial institutions to handle transactions quicker and more efficiently.</p><h4>&#9679; Mobile Payment App Development</h4><p>Our finance software developers create secure and encrypted end-to-end mobile payment apps that allow for seamless money transfers, payments, and rewards.</p><h4>&#9679; Investment Management Software Development</h4><p>We specialize in creating customized investment management software that utilizes advanced quantitative and predictive analytics techniques to help you efficiently manage your investment portfolio and execute trades.</p><h4>&#9679; P2P Lending Platform Development</h4><p>We have extensive experience in developing complex P2P lending solutions for top global markets. Our domain-centered solutions include mortgage calculators, initial offering mechanisms, automated advisory platforms, and legal maintenance tools.</p><h4>&#9679; Payment Gateway Development</h4><p>We specialize in developing dynamic payment systems that provide a seamless and hassle-free payment experience. Our experts are also proficient in integrating third-party payment gateways using APIs.</p><h4>&#9679; Open Banking Platform Development</h4><p>We are a software development company specializing in open banking. We utilize analytical intelligence and deep learning techniques to provide clients with superior data categorization for complex insights.</p><h4>&#9679; Point-of-Sale Systems</h4><p>Our team of financial application developers excels in creating omnichannel and omnipresent point-of-sale (PoS) solutions for high-end retail store chains and small businesses, enabling them to accept payments from walk-in customers.</p>',
				),
			),
		),

		'dev_process' => array(
			'main_title' => 'Revolutionize Finance with Us',
			'lang_title' => 'Fintech App Development Process',
			'lang_para'  => 'Our Fintech Development Company follows a clearly defined app development process, ensuring transparency and quality delivery.',
			'listing'    => array(
				array( 'number' => '01', 'title' => 'Analyze Requirements',    'para' => 'Our fintech journey begins with precise requirement analysis. Understanding your needs is the bedrock of our tailored solutions.' ),
				array( 'number' => '02', 'title' => 'Wireframing & Designing', 'para' => 'Concepts materialize through meticulous design. Our dedicated team transforms ideas into polished UI/UX designs for seamless user experiences in fintech software development.' ),
				array( 'number' => '03', 'title' => 'Fintech Development',     'para' => 'Innovation thrives in our code. We harmonize APIs, Front-end, Back-end, and more, laying the foundation for comprehensive fintech development services.' ),
				array( 'number' => '04', 'title' => 'Testing for Perfection',  'para' => 'Before launch, rigorous testing ensures flawless performance in the realm of fintech application development.' ),
				array( 'number' => '05', 'title' => 'Swift Deployment',        'para' => 'Within two weeks, your fintech solution will be approved and ready for impact, marking us as a leading fintech software development company.' ),
				array( 'number' => '06', 'title' => 'Ongoing Excellence',      'para' => 'Beyond deployment, our commitment continues with meticulous maintenance and unwavering support for supremacy in fintech app development.' ),
			),
		),

		'proposal' => array(
			'head_html' => '<h2>Let\'s Transform Ideas Into Intelligent Solutions! Connect With Our Expert Fintech App Developers Now</h2>',
			'btn_text'  => 'reach out now!',
			'anchor'    => false,
		),

		'faqs' => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array( 'faqhead' => 'Why Should I Choose TechnBrains as my Fintech App/Software Development Partner?', 'faqbody' => 'TechnBrains stands out as a premier fintech software development company known for its expertise and commitment to delivering innovative solutions. Choose us for cutting-edge fintech app development services tailored to elevate your financial technology initiatives.' ),
				array( 'faqhead' => 'How much time does it take to develop a Fintech App?',                           'faqbody' => 'The development time for a fintech app varies based on complexity and features. Our efficient processes ensure timely delivery, and our team can provide a detailed timeline upon understanding your project requirements.' ),
				array( 'faqhead' => 'How much does it cost to develop a Fintech App?',                                'faqbody' => 'The cost of fintech app development is influenced by factors such as features and complexity. To get an accurate cost estimation for your project, contact TechnBrains for a personalized quote.' ),
				array( 'faqhead' => 'What types of Fintech Apps does your company develop?',                          'faqbody' => 'TechnBrains excels in diverse fintech application development services, crafting solutions ranging from payment apps and investment platforms to banking software and financial management tools.' ),
				array( 'faqhead' => 'What are the advantages of a Fintech App/Software Solution for my business?',   'faqbody' => 'A fintech app/software solution provides advantages like enhanced customer engagement, streamlined financial processes, improved security, and the ability to stay competitive in the rapidly evolving financial technology landscape.' ),
				array( 'faqhead' => 'What security compliances will you use for my Fintech Software?',               'faqbody' => 'TechnBrains prioritizes security in fintech software development. We adhere to industry-standard security compliances, including but not limited to PCI DSS, GDPR, and HIPAA, ensuring the utmost protection for your financial data.' ),
				array( 'faqhead' => 'What technologies do you use to develop Fintech App and Software?',             'faqbody' => 'Our fintech developers leverage cutting-edge technologies such as blockchain, artificial intelligence, and cloud computing to create robust and scalable fintech applications that meet the evolving demands of the industry.' ),
				array( 'faqhead' => 'Will you sign an NDA to protect my Fintech App idea?',                          'faqbody' => 'Yes, at TechnBrains, we understand the importance of confidentiality. We are willing to sign a Non-Disclosure Agreement (NDA) to protect your fintech app idea and ensure your intellectual property is safeguarded.' ),
				array( 'faqhead' => 'How can I track the progress of my Fintech Software project?',                  'faqbody' => 'We prioritize transparency in our fintech development services. You can track the progress of your project through regular updates, meetings, and collaborative tools, ensuring you are involved at every stage of development.' ),
			),
		),

	),
);
