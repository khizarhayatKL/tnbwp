<?php
/**
 * Data Registry: sitecore-consulting
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(

		array(
			'@context'        => 'https://schema.org/',
			'@type'           => 'Product',
			'name'            => 'Top Sitecore Consulting Services | Technbrains',
			'image'           => 'https://www.technbrains.com/_next/image?url=%2Fimage%2Fplatform%2Fsitecore%2Fbanner.webp&w=1200&q=75',
			'description'     => 'Unlock the full potential of SiteCore for personalized digital experiences. Let our Sitecore consulting services help you create engaging websites.',
			'brand'           => array( '@type' => 'Brand', 'name' => 'TechnBrains' ),
			'aggregateRating' => array(
				'@type'       => 'AggregateRating',
				'ratingValue' => '4.8',
				'bestRating'  => '5',
				'worstRating' => '1',
				'reviewCount' => '12',
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
					'name'           => 'What Sitecore services does TechnBrains offer?',
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'TechnBrains offers comprehensive Sitecore services including consulting, custom development, eCommerce, marketing automation, migration, integration, and ongoing support and maintenance.' ),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'How long has TechnBrains been a Sitecore implementation partner?',
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'TechnBrains has over 15 years of experience as a Sitecore implementation partner, with a team of developers, architects, project managers, and MVPs.' ),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Why should businesses choose Sitecore as their CMS?',
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Sitecore offers versatility, advanced personalization, scalability, integrated marketing tools, multichannel experience management, and a developer-friendly environment built on the .NET framework.' ),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Can TechnBrains migrate an existing platform to Sitecore?',
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, TechnBrains can smoothly migrate your existing platform onto Sitecore, preserving all features and functionalities while securing the integrity of your data.' ),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Does TechnBrains provide ongoing Sitecore support?',
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, TechnBrains provides 24/7 Sitecore support and maintenance to ensure your operations run smoothly and error-free.' ),
				),
			),
		),

		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Service',
			'serviceType' => 'Sitecore Consulting Services',
			'name'        => 'Top Sitecore Consulting Services | Technbrains',
			'description' => 'Unlock the full potential of SiteCore for personalized digital experiences. Let our Sitecore consulting services help you create engaging websites.',
			'url'         => 'https://www.technbrains.com/platforms/sitecore-consulting',
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
			'head_text'    => 'Top Sitecore Integration Specialists',
			'content'      => 'TechnBrains is the top Sitecore consulting company in the USA. Our consultants will connect your business and technical teams, delivering quicker results. With our Sitecore development services, we help you create, deliver, and manage tailored experiences for your audiences.',
			'img_src'      => '/platform/sitecore/banner.webp',
			'img_width'    => '1068',
			'img_height'   => '759',
			'img_alt'      => 'sitecore-banner',
			'btn_link'     => '/contact-us',
			'btn_link_text'=> 'Learn More',
			'popup_text'   => 'GET FREE QUOTE',
		),

		'dedicated_lang_desc' => array(
			'para_html' => 'Sitecore is an exceptional digital engagement platform that offers robust workflow capabilities. You can leverage personalized content, real-time recommendations, multi-language support, and reusable layouts to engage with your audience across multiple devices and channels. Sitecore\'s commerce capabilities enable you to connect the experiences throughout your customers\' shopping journey and maximize their lifetime value.<br><br>We are TechnBrains, a Sitecore implementation partner with over <span>15 years of experience.</span> Our team of developers, architects, project managers, and MVPs can help you successfully implement, integrate, and customize Sitecore XM CMS and Sitecore DXP to achieve your business goals. From discovery to delivery, we provide technical expertise and business acumen to support you at every stage of your Sitecore solution project.',
		),

		'language_services' => array(
			'head_text' => 'Increase Your ROI with Our Sitecore Services',
			'para_text' => 'With TechnBrains\' expert Sitecore consulting, we ensure that your company excels with our Sitecore services. On the right are our Sitecore development services to help you achieve more.',
			'btn_text'  => 'Book AN APPOINTMENT',
			'listing'   => array(
				array( 'img_src' => '/platform/sitecore/d1.png', 'width' => '80', 'height' => '80', 'list_head' => 'Sitecore Consulting',            'list_para' => 'We analyze a business\'s specific needs, budget, and other requirements to create effective strategies and architecture that support their goals while reducing challenges and resource usage.' ),
				array( 'img_src' => '/platform/sitecore/d2.png', 'width' => '80', 'height' => '80', 'list_head' => 'Custom Sitecore Development',    'list_para' => 'Our CMSs are secure, scalable, and feature-rich with custom complex functionalities that meet your unique business needs and evolving market demands.' ),
				array( 'img_src' => '/platform/sitecore/d3.png', 'width' => '80', 'height' => '80', 'list_head' => 'Sitecore ECommerce',             'list_para' => 'Our team specializes in designing, building, and deploying personalized Sitecore commerce solutions that create engaging omnichannel experiences for customers throughout their lifecycle.' ),
				array( 'img_src' => '/platform/sitecore/d4.png', 'width' => '80', 'height' => '80', 'list_head' => 'Sitecore Marketing Automation',  'list_para' => 'Our services include developing and managing marketing automation campaigns, as well as implementing machine learning rules to increase ROI and gather valuable customer experience data.' ),
				array( 'img_src' => '/platform/sitecore/d5.png', 'width' => '80', 'height' => '80', 'list_head' => 'Sitecore Migration',             'list_para' => 'We can smoothly migrate your existing platform onto Sitecore, preserving all features and functionalities, and securing the integrity of your data.' ),
				array( 'img_src' => '/platform/sitecore/d6.png', 'width' => '80', 'height' => '80', 'list_head' => 'Sitecore Integration',           'list_para' => 'Our services enable integration of third-party tools like CRM, ERP, and ORM with Sitecore. This integration streamlines workflows, optimizes campaigns, and enhances business capabilities.' ),
				array( 'img_src' => '/platform/sitecore/d7.png', 'width' => '80', 'height' => '80', 'list_head' => 'Support & Maintenance',          'list_para' => 'Rest assured that we are always here to support you with any Sitecore maintenance issues, 24/7. Our goal is to ensure that your operations run smoothly and error-free, so you can focus on other important aspects of your business.' ),
			),
		),

		'dev_services' => array(
			'subtitle' => 'Leading sitecore development service provider',
			'title'    => 'Why Opt For TechnBrains For Your Sitecore Services',
			'para'     => '',
			'listing'  => array(
				array(
					'img_src' => '/platform/sitecore/dev-list.webp',
					'width'   => '534',
					'height'  => '745',
					'content' => array(
						array( 'title' => '', 'para' => 'At TechnBrains, we take pride in being a leading authority in Sitecore Consulting and Development Services. As a distinguished Sitecore Development Company and esteemed Sitecore Implementation Partner, we bring a wealth of experience and expertise to the table. Our team of seasoned Sitecore Consultants is dedicated to delivering tailored solutions that align with your unique needs.' ),
						array( 'title' => '', 'para' => 'With a commitment to excellence, we offer a comprehensive range of Sitecore Services that go beyond mere development. As your trusted Sitecore Development Partner, we ensure that your digital initiatives not only meet but exceed expectations. Our holistic approach includes top-tier Sitecore Consulting Services that guide you through the intricacies of the platform, ensuring optimal results.' ),
						array( 'title' => '', 'para' => 'What sets us apart is our in-depth understanding of the dynamic digital landscape. As a leading Sitecore Development Company, we stay ahead of the curve, providing innovative solutions that leverage the full potential of the Sitecore platform. Whether you are looking for robust development, strategic consulting, or seamless implementation, TechnBrains is your go-to partner for all things Sitecore.' ),
						array( 'title' => '', 'para' => 'Partnering with TechnBrains means more than just acquiring services; it\'s forging a collaboration with a dedicated team that is invested in your success. As your reliable Sitecore Development Partner, we prioritize not only the initial stages of development but the entire lifecycle of your digital products. From meticulous planning and efficient deployment to ongoing support, maintenance, and updates, we ensure the longevity and prosperity of your digital initiatives.' ),
					),
				),
			),
		),

		'proposal' => array(
			'head_html' => '<h2>Get Expert Content Creation And Customer Relationship Management By Using TechnBrain\'s Sitecore Services. Reach Out Now!</h2>',
			'btn_text'  => 'reach out now!',
		),

		'key_things' => array(
			'sub_title' => 'Transform with TechnBrains',
			'title'     => 'Key Things To Know About Sitecore',
			'listing'   => array(
				array(
					'tab_title'   => 'Why Choose Sitecore?',
					'tab_content' => '<p>Sitecore stands out as a top-tier content management system (CMS) and digital experience platform (DXP), offering a myriad of benefits for businesses seeking robust online solutions. Here\'s why you should opt for Sitecore:</p><h4>1. Versatility and Flexibility</h4><p>Sitecore provides a highly versatile platform that adapts to your unique business requirements. Its flexibility makes it suitable for various industries, from e-commerce to healthcare.</p><h4>2. Personalization Capabilities</h4><p>Sitecore\'s advanced personalization features allow you to deliver targeted and personalized content to different audience segments. This enhances user engagement and boosts conversion rates.</p><h4>3. Scalability</h4><p>As your business grows, Sitecore scales with you. It can seamlessly handle increased traffic, content volume, and evolving business needs, ensuring a future-proof solution.</p><h4>4. Integrated Marketing Tools</h4><p>Sitecore combines content management with robust marketing tools. This integration enables comprehensive digital marketing strategies, including automation, analytics, and customer engagement.</p><h4>5. Multichannel Experience Management</h4><p>Sitecore enables businesses to manage content and user experiences across various channels, ensuring a consistent brand message and user experience.</p><h4>6. Sitecore Experience Commerce</h4><p>For e-commerce businesses, Sitecore\'s integrated e-commerce solution facilitates smooth online transactions, offering a unified platform for content and commerce.</p><h4>7. Analytics and Insights</h4><p>Gain valuable insights into user behavior and website performance with Sitecore\'s analytics tools. Data-driven decision-making becomes more accessible, leading to continuous improvement.</p><h4>8. Developer-Friendly Environment</h4><p>Sitecore\'s architecture and development tools are designed to streamline the development process. It provides a developer-friendly environment, reducing the time and effort required for customization.</p>',
				),
				array(
					'tab_title'   => 'Why .NET Developers Love Sitecore?',
					'tab_content' => '<p>.NET developers find Sitecore particularly appealing due to several factors that align with their preferences and development practices:</p><h4>1. Familiarity with .NET Technology</h4><p>Sitecore is built on the .NET framework, making it a natural choice for developers familiar with .NET technologies. This familiarity accelerates the learning curve and speeds up development.</p><h4>2. Extensibility and Customization</h4><p>Sitecore\'s architecture allows for extensive customization and extensibility. Developers can leverage their .NET skills to tailor solutions precisely to the client\'s requirements.</p><h4>3. Integrated Development Environment (IDE)</h4><p>.NET developers often use Visual Studio, and Sitecore seamlessly integrates with this popular IDE. This integration enhances the development experience and productivity.</p><h4>4. Rich API Support</h4><p>Sitecore provides a robust set of APIs, facilitating integrations with third-party systems and tools. .NET developers appreciate the ease with which they can connect Sitecore with other applications.</p><h4>5. Support for Modern Development Practices</h4><p>Sitecore aligns with modern development practices such as modular development, continuous integration, and DevOps. .NET developers find it easy to implement these practices within the Sitecore environment.</p><h4>6. Community and Resources</h4><p>Sitecore boasts a vibrant community and extensive documentation. .NET developers can access a wealth of resources, forums, and knowledge-sharing platforms, fostering a collaborative and supportive environment.</p><h4>7. Career Opportunities</h4><p>Proficiency in Sitecore enhances the career prospects of .NET developers. Many enterprises seek professionals with Sitecore skills, opening up new and exciting career opportunities.</p>',
				),
				array(
					'tab_title'   => 'Sitecore CMS Features',
					'tab_content' => '<h4>1. Robust Content Management</h4><p>Sitecore offers a sophisticated content management system (CMS) that allows businesses to create, edit, and manage digital content seamlessly.</p><h4>2. Personalization Capabilities</h4><p>Leverage Sitecore\'s advanced personalization features to tailor content based on user behavior, preferences, and demographics, enhancing user engagement.</p><h4>3. Multi-Site Management</h4><p>Manage multiple websites effortlessly within a single platform, streamlining operations and ensuring consistency across diverse online properties.</p><h4>4. Integrated Digital Marketing</h4><p>Sitecore integrates powerful digital marketing tools, enabling businesses to create and execute targeted campaigns, analyze results, and optimize strategies for better outcomes.</p><h4>5. eCommerce Integration</h4><p>Seamlessly integrate Sitecore with eCommerce platforms, providing a unified solution for managing both content and commerce on a single platform.</p><h4>6. User Experience Optimization</h4><p>Sitecore focuses on optimizing the user experience by providing tools for A/B testing, analytics, and insights, helping businesses refine their online presence.</p><h4>7. Scalability and Flexibility</h4><p>As a leading CMS, Sitecore offers scalability to accommodate the growing needs of businesses, ensuring flexibility and adaptability to evolving digital landscapes.</p><h4>8. Advanced Analytics and Reporting</h4><p>Gain valuable insights into user behavior, content performance, and campaign effectiveness with Sitecore\'s robust analytics and reporting features.</p><h4>9. Mobile Optimization</h4><p>Ensure a seamless user experience across devices with Sitecore\'s mobile optimization features, catering to the increasingly growing mobile user base.</p><h4>10. Security Measures</h4><p>Sitecore prioritizes security, offering features such as role-based access control, encryption, and regular updates to safeguard your digital assets.</p><h4>11. Third-Party Integrations</h4><p>Integrate Sitecore with third-party tools and services, enhancing its capabilities and providing a comprehensive solution tailored to your business needs.</p><h4>12. Support and Maintenance</h4><p>Sitecore\'s comprehensive support and maintenance services ensure that businesses receive ongoing assistance, updates, and optimizations for their Sitecore implementations.</p>',
				),
			),
		),

		'industries_slider' => array(
			'subtitle' => 'Transform with TechnBrains',
			'title'    => 'Industries Transformed by TechnBrains',
			'para'     => 'Partner with TechnBrains for transformative Sitecore Consulting, Development, and Implementation services, and let your business reach new heights of success.',
			'listing'  => array(
				array( 'img_src' => '/platform/retail.png',      'tab_title' => 'Retail & E-commerce',  'content' => 'Start your retail and eCommerce ventures with TechnBrains. Our comprehensive solutions encompass loyalty apps, online shopping mobile applications, and advanced customer tracking systems.' ),
				array( 'img_src' => '/platform/on-demand.png',   'tab_title' => 'On-Demand',            'content' => 'TechnBrains empowers businesses to thrive. From ride-hailing to food delivery, our custom-built apps provide users with a seamless interface, ensuring efficiency and unparalleled customer satisfaction.' ),
				array( 'img_src' => '/platform/logistic.png',    'tab_title' => 'Logistics',            'content' => 'Our solutions include real-time tracking, route optimization, and inventory management, enhancing operational excellence. Clients experience increased efficiency, reduced costs, and improved supply chain management.' ),
				array( 'img_src' => '/platform/saas.png',        'tab_title' => 'SaaS',                 'content' => 'Our cloud-based platforms facilitate seamless collaboration, data management, and business process automation. User-friendly interfaces and robust functionality contribute to operational efficiency and long-term success.' ),
				array( 'img_src' => '/platform/health.png',      'tab_title' => 'Healthcare',           'content' => 'In the healthcare sector, TechnBrains excels in developing innovative apps, from telemedicine platforms to patient and hospital management applications. Join hands with us to make a positive impact on the healthcare industry.' ),
				array( 'img_src' => '/platform/real-estate.png', 'tab_title' => 'Real Estate',          'content' => 'Conquer the real estate world with TechnBrains\' innovative mobile app solutions. Whether you offer rental services or property purchases, our solutions enable customers to easily refine searches and find what they\'re looking for on your website or mobile app.' ),
				array( 'img_src' => '/platform/fintech.png',     'tab_title' => 'FinTech',              'content' => 'Uplift your FinTech business with TechnBrains\' expert digital solutions. From secure financial data apps to portfolio management websites, our innovative and secure FinTech solutions double your investment.' ),
				array( 'img_src' => '/platform/education.png',   'tab_title' => 'Education',            'content' => 'TechnBrains makes education accessible to everyone with digital solutions. Our team crafts eLearning apps and websites with unique designs and features. Have a new concept? Let us bring it to life.' ),
				array( 'img_src' => '/platform/energy.png',      'tab_title' => 'Energy and Utilities', 'content' => 'For energy and utility businesses, TechnBrains provides reliable software development, maintenance, and consulting services. Tailored to unique needs, our solutions aim to enhance customer satisfaction and drive financial success.' ),
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
