<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array( '@type' => 'Question', 'name' => 'What platforms do you work with?',                    'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'We specialize in designing and developing websites on platforms such as BigCommerce, Shopify, and WordPress. Additionally, we have expertise in working with other platforms like Magento, Squarespace, and more.' ) ),
				array( '@type' => 'Question', 'name' => 'Can I see what the site looks like first?',           'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Absolutely! We prioritize your satisfaction. We create detailed mockups and actively seek your feedback to ensure the final result aligns perfectly with your vision.' ) ),
				array( '@type' => 'Question', 'name' => 'Will AI be used to generate my website?',             'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'While we may use AI for initial research, our developers hand code within the platform\'s framework. Our managers thoroughly review the work to maintain the human touch, ensuring every line of code meets our stringent quality assurance standards.' ) ),
				array( '@type' => 'Question', 'name' => 'When will my website launch?',                        'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Timelines vary based on project complexity, but many of our projects are launched within a 4-6 month timeframe, ensuring a seamless and efficient development process.' ) ),
				array( '@type' => 'Question', 'name' => 'Do you offer web hosting?',                           'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, at TechnBrains, we provide comprehensive web solutions, including web hosting services. Our hosting packages are designed to ensure a secure and reliable online presence for your website.' ) ),
				array( '@type' => 'Question', 'name' => 'Do you also provide custom web development solutions?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Absolutely! We specialize in custom web development solutions tailored to your specific needs. Our skilled team at TechnBrains crafts unique and dynamic websites that align with your brand and business objectives.' ) ),
				array( '@type' => 'Question', 'name' => 'Do you redesign websites?',                           'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, we offer website redesign services at TechnBrains. Whether you need a visual refresh or a complete overhaul, our team is adept at transforming existing websites to meet current design trends and enhance user experiences.' ) ),
			),
		),
	),

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
			'title'             => 'Website Development Company',
			'para'              => 'At TechnBrains, we prioritize client success by creating impactful web solutions that deliver tangible business results. Our dedicated web developers navigate the dynamic digital landscape to ensure brands thrive and stay ahead. Your success is our focus—let\'s shape your digital journey together.',
			'second_button'     => true,
			'banner_img_src'    => '/cms/web-design/banner.webp',
			'banner_img_width'  => '576',
			'banner_img_height' => '719',
			'banner_img_alt'    => 'web-banner',
			'classes'           => 'web-dev',
		),

		'dedicated_lang_desc' => array(
			'para_html' => 'Where online interactions heavily influence consumer decisions, TechnBrains ensures your website is not just functional but sets the benchmark for appearance, usability, and accessibility in a competitive market.<br><br>In a world where every click matters, Our seasoned Website Development Company specializes in creating visually stunning, user-friendly websites that propel your brand to new heights. Say goodbye to online invisibility – embrace the spotlight with our custom web solutions.',
		),

		'language_services' => array(
			'head_text' => 'Captivate Your Users with our Website Development Services',
			'para_text' => 'TechnBrains is your premier web development company and trusted partner in crafting unparalleled digital experiences. We can help you elevate your online presence with our comprehensive suite of services tailored to meet the diverse needs of the digital landscape. With TechnBrains, you\'re not just getting services; you\'re gaining a digital partner committed to your success. Explore the best in website design and development services with us.',
			'btn_text'  => 'Book AN APPOINTMENT',
			'anchor'    => false,
			'listing'   => array(
				array( 'img_src' => '/cms/web-design/d1.png',  'width' => '80', 'height' => '80', 'alt' => 'Website Development',                          'list_head' => 'Website Development',                          'list_para' => 'As a leading web development agency committed to turning your vision into a powerful online reality, our team of experts ensures seamless execution, delivering websites that transcend expectations.' ),
				array( 'img_src' => '/cms/web-design/d2.png',  'width' => '80', 'height' => '80', 'alt' => 'Website Design & Re-design',                    'list_head' => 'Website Design & Re-design',                    'list_para' => 'At TechnBrains, we redefine digital aesthetics. Our web design services breathe life into your brand, creating visually stunning and user-centric designs. Whether crafting a new identity or revamping an existing one, we bring creativity and functionality together.' ),
				array( 'img_src' => '/cms/web-design/d3.png',  'width' => '80', 'height' => '80', 'alt' => 'Drupal Development',                            'list_head' => 'Drupal Development',                            'list_para' => 'Experience the pinnacle of content management with TechnBrains\' Drupal development solutions. Our journey with Drupal dates back to 2007, and today, we continue to pioneer innovative, customized solutions that empower your digital presence.' ),
				array( 'img_src' => '/cms/web-design/d4.png',  'width' => '80', 'height' => '80', 'alt' => 'Contentful Development',                        'list_head' => 'Contentful Development',                        'list_para' => 'Unlock the potential of dynamic content with TechnBrains\' Contentful development services. From seamless integrations to unparalleled scalability, we redefine how you manage and present your content in the digital realm.' ),
				array( 'img_src' => '/cms/web-design/d5.png',  'width' => '80', 'height' => '80', 'alt' => 'Laravel Development',                           'list_head' => 'Laravel Development',                           'list_para' => 'Stay ahead with TechnBrains\' agile Laravel development solutions. Our experts design and build web-based properties that align with your unique business needs, ensuring a robust and scalable online presence.' ),
				array( 'img_src' => '/cms/web-design/d6.png',  'width' => '80', 'height' => '80', 'alt' => 'HTML5 Website Development',                     'list_head' => 'HTML5 Website Development',                     'list_para' => 'TechnBrains transforms your digital footprint with cutting-edge HTML5 website development. Our solutions are not just websites; they are optimized for high performance, quick loading times, and responsiveness, ensuring a seamless user experience.' ),
				array( 'img_src' => '/cms/web-design/d7.png',  'width' => '80', 'height' => '80', 'alt' => 'Responsive Design',                             'list_head' => 'Responsive Design',                             'list_para' => 'In a mobile-first era, embrace TechnBrains\' commitment to responsive design. We ensure your online presence adapts effortlessly to varying screen sizes, offering an engaging and consistent user experience across all devices.' ),
				array( 'img_src' => '/cms/web-design/d8.png',  'width' => '80', 'height' => '80', 'alt' => 'Intranet Development',                          'list_head' => 'Intranet Development',                          'list_para' => 'Empower your internal communication with TechnBrains\' tailored intranet development solutions. Enhance collaboration, streamline processes, and create a connected workplace for heightened productivity.' ),
				array( 'img_src' => '/cms/web-design/d9.png',  'width' => '80', 'height' => '80', 'alt' => 'eCommerce Development',                         'list_head' => 'eCommerce Development',                         'list_para' => 'Drive online success with TechnBrains\' specialized eCommerce development services. From intuitive user interfaces to secure payment gateways, we craft eCommerce platforms that captivate customers and boost conversions.' ),
				array( 'img_src' => '/cms/web-design/d10.png', 'width' => '80', 'height' => '80', 'alt' => 'Digital Strategy',                              'list_head' => 'Digital Strategy',                              'list_para' => 'Forge a path to digital success with TechnBrains\' comprehensive digital strategy services. Our experts analyze, plan, and execute strategies that align with your business objectives, ensuring a robust online presence and competitive edge.' ),
				array( 'img_src' => '/cms/web-design/d11.png', 'width' => '80', 'height' => '80', 'alt' => 'User Experience & Design',                      'list_head' => 'User Experience & Design',                      'list_para' => 'Elevate user satisfaction with TechnBrains\' focus on user experience & design. Our designs go beyond aesthetics, prioritizing intuitive interfaces that enhance user engagement and leave a lasting positive impression.' ),
				array( 'img_src' => '/cms/web-design/d12.png', 'width' => '80', 'height' => '80', 'alt' => 'Development, Integration & Platform Engineering', 'list_head' => 'Development, Integration & Platform Engineering', 'list_para' => 'TechnBrains is your partner in development, integration & platform engineering. We seamlessly integrate technologies, ensuring your digital platform not only meets but exceeds industry standards.' ),
				array( 'img_src' => '/cms/web-design/d13.png', 'width' => '80', 'height' => '80', 'alt' => '24x7 Support & Maintenance',                    'list_head' => '24x7 Support & Maintenance',                    'list_para' => 'Your digital journey is our priority. TechnBrains offers round-the-clock, 24x7 support & maintenance services, providing peace of mind as we safeguard and optimize your digital assets.' ),
			),
		),

		'dev_process' => array(
			'main_title' => 'Custom Solutions tailored to Perfection',
			'lang_title' => 'Custom Web Design and Development Services',
			'lang_para'  => 'Web development services are aimed at creating various types of web-based software to provide an excellent experience for web users. Although different web solutions may appear similar, we approach each one differently and know which factors are crucial in each case.',
			'listing'    => array(
				array( 'img_src' => '/cms/web-design/dp-1.png', 'title' => 'Web portals', 'para' => 'For decades, TechnBrains has been developing web portals for various audiences, such as customers, business partners, ecommerce users, patients, vendors, and interest-based communities. Our web portals automatically gather data from corporate systems and provide users with up-to-date Information and assistance.' ),
				array( 'img_src' => '/cms/web-design/dp-2.png', 'title' => 'Websites',    'para' => 'Our websites have been used by our premium clientele, including businesses and governmental and non-profit organizations, for corporate presentations and brand building. We also ensure that our websites have an easy-to-use page editor for dynamic content management.' ),
				array( 'img_src' => '/cms/web-design/dp-3.png', 'title' => 'Ecommerce',   'para' => 'We have been specializing in ecommerce development for the past 20 years. Our expertise ranges from simple online shops for startups to custom ecommerce solutions designed for large-scale and high-growth businesses. Using scalable microservices architectures and enabling high levels of automation, we are able to increase business efficiency and streamline all business processes.' ),
				array( 'img_src' => '/cms/web-design/dp-4.png', 'title' => 'Web apps',    'para' => 'In our portfolio of over 300+ web apps, we offer solutions for efficient management of various business activities. We use smart automation to streamline workflows and integrate corporate apps for a coherent operation.' ),
			),
		),

		'proposal' => array(
			'head_html' => '<h2>Get Unmatched Functionality For Lasting Impressions With The Top Talent In USA. Hire Our Creative Developers Now!</h2>',
			'btn_text'  => 'reach out now!',
			'anchor'    => false,
		),

		'dev_process_two' => array(
			'main_title' => 'Transform Today. Thrive Tomorrow—experience TechnBrains',
			'lang_title' => 'Our Proven Process for Web Design and Development',
			'lang_para'  => 'At TechnBrains, we transcend the ordinary, defining excellence as a web development company that innovates captivates, and transforms digital landscapes. Join the league of industry leaders who trust us as their go-to web design and development services provider.',
			'listing'    => array(
				array( 'number' => '01', 'title' => 'Discovery and Consultation',       'para' => 'A collaborative journey where we unravel your vision, goals, and challenges. Through comprehensive discussions, we lay the foundation for a tailored web solution that aligns with your unique needs.' ),
				array( 'number' => '02', 'title' => 'Planning and Strategy',             'para' => 'Our expert strategists meticulously craft a roadmap for success. From wireframes to user journeys, every detail is analyzed and optimized to ensure your website stands out in the competitive digital sphere.' ),
				array( 'number' => '03', 'title' => 'Design and Creativity',             'para' => 'Witness your vision come to life as our creative team transforms ideas into captivating designs. Our website design and development company prides itself on creating visually stunning and user-centric interfaces that leave a lasting impression.' ),
				array( 'number' => '04', 'title' => 'Website Design and Development',   'para' => 'The magic unfolds as our skilled developers bring the design to reality. With precision coding and cutting-edge technology, we build robust, scalable websites that embody the essence of your brand.' ),
				array( 'number' => '05', 'title' => 'Testing and Quality Assurance',    'para' => 'Perfection is our benchmark. Rigorous testing ensures your website not only meets but exceeds industry standards. We leave no stone unturned, guaranteeing a seamless user experience across devices.' ),
				array( 'number' => '06', 'title' => 'Launch and Deployment',             'para' => 'It\'s time to unveil your digital masterpiece to the world. Our streamlined deployment process ensures a smooth transition from development to a live, fully functional website.' ),
				array( 'number' => '07', 'title' => 'Maintenance and Support',           'para' => 'Our commitment doesn\'t end with deployment. As a trusted web development agency, we offer ongoing support, updates, and maintenance to keep your website at the forefront of technology.' ),
			),
		),

		'dev_services' => array(
			'subtitle' => 'Web Brilliance, Delivered Daily',
			'title'    => 'Why TechnBrains Excels In Web Development',
			'para'     => 'Discover why TechnBrains is the preferred choice for brands seeking exceptional web development experiences. Our commitment to excellence is evident through',
			'listing'  => array(
				array(
					'img_src' => '/cms/web-design/d-banner.webp',
					'width'   => '558',
					'height'  => '497',
					'content' => array(
						array( 'title' => 'Agile Methodology',              'para' => 'Embrace agile web design and development, ensuring dynamic, adaptive, and user-centric solutions.' ),
						array( 'title' => 'Award-Winning Solutions',        'para' => 'Be assured of award-winning web solutions and sites that set benchmarks for innovation and quality.' ),
						array( 'title' => 'Competitive Talent Rates',       'para' => 'Access top-tier web design and development talent at competitive rates, ensuring value for your investment.' ),
						array( 'title' => 'Global Cross-Functional Team',   'para' => 'Leverage a cross-functional team of 300+ experts based in the Americas, Europe & Asia, offering diverse perspectives and global insights.' ),
						array( 'title' => 'In-House Front-End Experts',     'para' => 'Engage with in-house front-end experts, including Business Analysts, UX/UI Specialists, and designers, ensuring a seamless and cohesive development process.' ),
						array( 'title' => 'Collaborative Approach',         'para' => 'Experience a friendly, open, communicative, and collaborative work style, fostering strong client partnerships.' ),
						array( 'title' => 'Proven Project Delivery',        'para' => 'Rely on our proven track record of successful web design and development project delivery, meeting and exceeding client expectations.' ),
						array( 'title' => 'Rigorous QA Testing',            'para' => 'Ensure flawless performance with rigorous quality assurance (QA) testing before the website goes live.' ),
						array( 'title' => 'Shorter Development Times',      'para' => 'Benefit from shorter development times, translating to cost efficiency without compromising quality.' ),
						array( 'title' => 'Open Technology Expertise',      'para' => 'Access unparalleled open technology expertise and experience, staying at the forefront of technological advancements.' ),
					),
				),
			),
		),

		'we_offer' => array(
			'subtitle' => 'Discover topnotch wordpress services',
			'title'    => 'Other Services We Offer',
			'para'     => 'At TechnBrains, we go beyond boundaries to deliver innovative solutions that keep your business ahead of the game.',
			'listing'  => array(
				array( 'img_src' => '/cms/web-design/w1.png', 'title' => 'UI/UX Design',            'para' => 'Experience an unparalleled digital experience with our UI/UX design services. We blend creativity and functionality to ensure your audience enjoys seamless navigation and visually stunning interactions.' ),
				array( 'img_src' => '/cms/web-design/w2.png', 'title' => 'Figma Design',             'para' => 'Elevate your digital presence with our expert Figma designers. We specialize in creating captivating and user-centric designs tailored to your unique vision.' ),
				array( 'img_src' => '/cms/web-design/w3.png', 'title' => 'Flutterflow',              'para' => 'Unleash the power of Flutterflow with our dedicated team of Flutterflow developers. From AI-powered solutions to captivating templates, we ensure your app stands out in the competitive landscape.' ),
				array( 'img_src' => '/cms/web-design/w4.png', 'title' => 'WordPress Web Solutions',  'para' => 'Transform your online presence with our WordPress expertise. Our skilled team crafts dynamic and scalable websites, ensuring a seamless user experience for your audience.' ),
				array( 'img_src' => '/cms/web-design/w1.png', 'title' => 'UI/UX Design',            'para' => 'Experience an unparalleled digital experience with our UI/UX design services. We blend creativity and functionality to ensure your audience enjoys seamless navigation and visually stunning interactions.' ),
				array( 'img_src' => '/cms/web-design/w2.png', 'title' => 'Figma Design',             'para' => 'Elevate your digital presence with our expert Figma designers. We specialize in creating captivating and user-centric designs tailored to your unique vision.' ),
				array( 'img_src' => '/cms/web-design/w3.png', 'title' => 'Flutterflow',              'para' => 'Unleash the power of Flutterflow with our dedicated team of Flutterflow developers. From AI-powered solutions to captivating templates, we ensure your app stands out in the competitive landscape.' ),
				array( 'img_src' => '/cms/web-design/w4.png', 'title' => 'WordPress Web Solutions',  'para' => 'Transform your online presence with our WordPress expertise. Our skilled team crafts dynamic and scalable websites, ensuring a seamless user experience for your audience.' ),
			),
		),

		'faqs' => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array( 'faqhead' => 'What platforms do you work with?',                    'faqbody' => 'We specialize in designing and developing websites on platforms such as BigCommerce, Shopify, and WordPress. Additionally, we have expertise in working with other platforms like Magento, Squarespace, and more.' ),
				array( 'faqhead' => 'Can I see what the site looks like first?',           'faqbody' => 'Absolutely! We prioritize your satisfaction. We create detailed mockups and actively seek your feedback to ensure the final result aligns perfectly with your vision.' ),
				array( 'faqhead' => 'Will AI be used to generate my website?',             'faqbody' => 'While we may use AI for initial research, our developers hand code within the platform\'s framework. Our managers thoroughly review the work to maintain the human touch, ensuring every line of code meets our stringent quality assurance standards.' ),
				array( 'faqhead' => 'When will my website launch?',                        'faqbody' => 'Timelines vary based on project complexity, but many of our projects are launched within a 4-6 month timeframe, ensuring a seamless and efficient development process.' ),
				array( 'faqhead' => 'Do you offer web hosting?',                           'faqbody' => 'Yes, at TechnBrains, we provide comprehensive web solutions, including web hosting services. Our hosting packages are designed to ensure a secure and reliable online presence for your website.' ),
				array( 'faqhead' => 'Do you also provide custom web development solutions?', 'faqbody' => 'Absolutely! We specialize in custom web development solutions tailored to your specific needs. Our skilled team at TechnBrains crafts unique and dynamic websites that align with your brand and business objectives.' ),
				array( 'faqhead' => 'Do you redesign websites?',                           'faqbody' => 'Yes, we offer website redesign services at TechnBrains. Whether you need a visual refresh or a complete overhaul, our team is adept at transforming existing websites to meet current design trends and enhance user experiences.' ),
			),
		),

	),
);
