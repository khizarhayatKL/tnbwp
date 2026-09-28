<?php
/**
 * Data Registry: Figma Design (CMS)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

return array(

	/* ── Schemas ──────────────────────────────────────────────── */
	'schemas' => array(
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array(
					'@type'          => 'Question',
					'name'           => 'Is Figma a UX tool?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Yes, Figma is a robust UX (User Experience) design tool that empowers designers to create interactive and user-friendly digital interfaces.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Can I create a website in Figma?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'While Figma is primarily a design and prototyping tool, it\'s not a website development platform. However, it plays a crucial role in the initial design phase before the development process begins.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Which is better: Photoshop or Figma?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'The choice between Photoshop and Figma depends on your needs. Figma is preferred for collaborative design, real-time editing, and seamless prototyping, while Photoshop is often used for detailed image editing.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Is Figma design free?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Figma offers a free version with essential features, making it accessible to individuals and small teams. However, for advanced functionalities and collaboration, a paid subscription is available.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What is Figma best for?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Figma excels in collaborative design, prototyping, and creating interactive interfaces. It is widely used for web and app design, offering real-time collaboration, easy sharing, and a cloud-based design environment.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Do you sign an NDA?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Yes, at TechnBrains, we prioritize confidentiality and security. We are more than willing to sign a Non-Disclosure Agreement (NDA) to safeguard your ideas, ensuring a trustworthy partnership throughout the collaboration.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Why choose TechnBrains as your Figma UX/UI Designer?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'At TechnBrains, our team of expert Figma designers is dedicated to delivering unparalleled design solutions. We leverage the full potential of Figma to create captivating and functional figma website designs.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Do you offer any other services apart from designing?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Absolutely! In addition to our expertise in Figma web design and Figma UX/UI design, TechnBrains provides a range of services, including mobile app development, web development, AI and machine learning solutions, and e-commerce development.',
					),
				),
			),
		),
	),

	/* ── Components ───────────────────────────────────────────── */
	'components' => array(
		array( 'name' => 'industry-banner',      'modifier_class' => '' ),
		array( 'name' => 'dedicated-lang-desc',  'modifier_class' => '' ),
		array( 'name' => 'language-services',    'modifier_class' => '' ),
		array( 'name' => 'development-process',  'modifier_class' => '', 'args' => array() ),
		array( 'name' => 'proposal',             'modifier_class' => '' ),
		array( 'name' => 'development-process',  'modifier_class' => '', 'args' => array( 'data_key' => 'dev_process_two' ) ),
		array( 'name' => 'development-services',  'modifier_class' => '' ),
		array( 'name' => 'we-offer',             'modifier_class' => '' ),
		array( 'name' => 'main-faqs',            'modifier_class' => 'gray-bg' ),
		array( 'name' => 'testimonials',         'modifier_class' => '' ),
	),

	/* ── Mock Data ─────────────────────────────────────────────── */
	'mock_data' => array(

		/* Industry Banner */
		'industry_banner' => array(
			'title'            => 'Captivating Figma Web Designs',
			'para'             => 'TechnBrains is a leading UX/UI design agency that specializes in creating unique designs that offer the best user experience possible. We use Figma web design to transform your digital space and bring your vision to life. Let\'s create something extraordinary together!',
			'second_button'    => true,
			'banner_img_src'   => '/cms/figma/banner.webp',
			'banner_img_width' => '830',
			'banner_img_height'=> '650',
			'banner_img_alt'   => 'figma-banner',
		),

		/* Dedicated Language Description */
		'dedicated_lang_desc' => array(
			'para_html' => 'At TechnBrains, we\'re your go-to UI/UX design experts, specializing in Figma web design and Figma website designs. Our team utilizes Figma\'s advanced features for crafting intuitive solutions, ensuring seamless collaboration and swift design approaches<br><br>With expertise in UI/UX designs, we transform visions into digital reality, utilizing Figma\'s modern tools for brilliant prototypes and layouts across diverse platforms. Elevate your digital presence with TechnBrains\'s web design development.',
		),

		/* Language Services */
		'language_services' => array(
			'head_text' => 'Figma Design Services By TechnBrains',
			'para_text' => 'The certified professionals at TechnBrains have many years of expertise in designing excellent and feature-rich designs for app preferences, prototypes, websites, and more. You can easily hire UI UX designers to create solutions that meet industry-specific standards. Our team of designers has hands-on experience with different tools and wireframing, from creating immersive visual designs to high-end designs. We have the creative and cognitive competence to accomplish various Figma designer services.',
			'btn_text'  => 'Book AN APPOINTMENT',
			'anchor'    => false,
			'listing'   => array(
				array(
					'img_src'   => '/cms/figma/d1.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Creation of Wireframes & Prototypes',
					'list_head' => 'Creation of Wireframes & Prototypes',
					'list_para' => 'Our designers are familiar with wireframing and prototyping, which helps to create a professional website that meets the specific needs of your business.',
				),
				array(
					'img_src'   => '/cms/figma/d2.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Unique & Interactive Design',
					'list_head' => 'Unique & Interactive Design',
					'list_para' => 'TechnBrains UI and UX design experts possess extensive knowledge of different design principles required to create complete user interfaces.',
				),
				array(
					'img_src'   => '/cms/figma/d3.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Typography & Branding',
					'list_head' => 'Typography & Branding',
					'list_para' => 'The primary goal of an effective Figma mobile design process is to leverage typography, branding, and color theory to create user-friendly designs.',
				),
				array(
					'img_src'   => '/cms/figma/d4.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Style Guidelines',
					'list_head' => 'Style Guidelines',
					'list_para' => 'Our experienced Figma designers are proficient in creating style guides for websites that ensure consistency across different platforms.',
				),
				array(
					'img_src'   => '/cms/figma/d5.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'User Research',
					'list_head' => 'User Research',
					'list_para' => 'Aiming to create effective designs for diverse audiences, our Figma developers conduct user research and develop potential personas.',
				),
				array(
					'img_src'   => '/cms/figma/d6.png',
					'width'     => '80',
					'height'    => '80',
					'alt'       => 'Standard Industry Tools & Practices',
					'list_head' => 'Standard Industry Tools & Practices',
					'list_para' => 'Professional UI/UX designers make use of advanced tools and techniques to ensure the efficient and effective creation and design of interfaces.',
				),
			),
		),

		/* Development Process #1 (images) */
		'dev_process' => array(
			'main_title' => 'Crafting Dreams, Together!',
			'lang_title' => 'Custom Figma Web Design Services by TechnBrains',
			'lang_para'  => 'Choose TechnBrains for unparalleled expertise and a personalized approach to Figma web design. We\'re committed to transforming your ideas into a visually stunning and highly functional digital reality.',
			'listing'    => array(
				array(
					'img_src' => '/cms/figma/dp-1.png',
					'title'   => 'Tailored Figma Web Design Solutions',
					'para'    => 'Craft a unique online presence with TechnBrains\' custom Figma web design services. Our team tailors every aspect of the design to align seamlessly with your brand identity and business goals, ensuring a standout digital experience.',
				),
				array(
					'img_src' => '/cms/figma/dp-2.png',
					'title'   => 'Responsive and User-Centric Designs',
					'para'    => 'TechnBrains prioritizes responsive and user-centric designs, guaranteeing that your website not only looks visually appealing but also functions flawlessly across various devices. Our design approach focuses on enhancing user engagement and satisfaction.',
				),
				array(
					'img_src' => '/cms/figma/dp-3.png',
					'title'   => 'Interactive Prototyping with Figma',
					'para'    => 'Experience the power of interactive prototyping with TechnBrains. Our Figma experts use cutting-edge techniques to create dynamic prototypes, providing you with a tangible preview of your website\'s functionality before the development phase.',
				),
				array(
					'img_src' => '/cms/figma/dp-4.png',
					'title'   => 'Efficient Figma Design Optimization',
					'para'    => 'TechnBrains specializes in optimizing Figma designs for efficiency. Our experts meticulously analyze and refine your existing designs, ensuring optimal performance, faster loading times, and an enhanced user experience.',
				),
			),
		),

		/* Proposal */
		'proposal' => array(
			'head_html' => '<h2>Turn your ideas into pixel-perfect reality with our Figma Web Designs</h2>',
			'btn_text'  => 'Design the Future',
			'anchor'    => true,
			'btn_url'   => '/hire-dedicated-team',
		),

		/* Development Process #2 (numbers) */
		'dev_process_two' => array(
			'main_title' => 'Elevate, Transform, Impress!',
			'lang_title' => 'Our Process for Figma Web Design Services',
			'lang_para'  => 'At TechnBrains, our process for Figma web design services is a strategic blend of creativity, collaboration, and technological expertise. We aim to transform your vision into a digital reality that stands out in the online landscape.',
			'listing'    => array(
				array(
					'number' => '01',
					'title'  => 'Understanding Your Vision',
					'para'   => 'We kick off the process by thoroughly understanding your vision for the project. This initial step sets the foundation for our Figma web design journey.',
				),
				array(
					'number' => '02',
					'title'  => 'Collaborative Ideation with Figma Designers',
					'para'   => 'Engage in collaborative ideation sessions with our expert Figma designers. Your inputs combined with our creativity lay the groundwork for unique and innovative solutions.',
				),
				array(
					'number' => '03',
					'title'  => 'Mapping the User Experience with Figma UX',
					'para'   => 'Leverage the power of Figma UX to map out an exceptional user experience. This step ensures that every interaction is intuitive and aligns with your users\' needs.',
				),
				array(
					'number' => '04',
					'title'  => 'Crafting a Solid Figma Tech Stack',
					'para'   => 'Develop a robust Figma tech stack tailored to the specific requirements of your project. This ensures seamless integration and optimal performance throughout the design process.',
				),
				array(
					'number' => '05',
					'title'  => 'Structuring with Figma Site Map',
					'para'   => 'Utilize Figma site map to strategically structure the design elements. This step ensures a user-friendly navigation experience, enhancing the overall usability of the final product.',
				),
				array(
					'number' => '06',
					'title'  => 'Design Iterations for Figma Web Design',
					'para'   => 'Our iterative approach involves continuous refinement of the design, incorporating your feedback at every stage. This ensures that the Figma website designs evolve to meet your expectations.',
				),
				array(
					'number' => '07',
					'title'  => 'Hire Figma Designer for Final Polish',
					'para'   => 'In the final phase, you have the option to hire a Figma designer for the finishing touches. This step guarantees a polished and professional look for your web design, ready to make a lasting impact.',
				),
			),
		),

		/* Development Services */
		'dev_services' => array(
			'subtitle' => 'Revamp with TechnBrains',
			'title'    => 'Why Choose Figma UX/UI Developers From TechnBrains?',
			'para'     => 'At TechnBrains, we stand out as a premier UI/UX design agency, leveraging advanced tools, cutting-edge figma tech stack, and world-class infrastructure to craft tailored, business-specific products. Our team of professional designers brings industry experience, handling diverse projects such as application development, software development, figma website designs, UI/UX design practices, figma web design trends, and more.',
			'listing'  => array(
				array(
					'img_src' => '/cms/figma/d-banner.webp',
					'width'   => '534',
					'height'  => '600',
					'alt'     => 'Figma Development Services',
					'content' => array(
						array(
							'title' => 'Flexible Engagement Models',
							'para'  => 'Different hiring models cater to your business needs, providing flexibility in hiring our expert figma designers. Our designers undergo a proven process of screening and selection.',
						),
						array(
							'title' => 'On-Time Project Delivery',
							'para'  => 'Our dedicated figma UX designers prioritize on-time project delivery, enabling clients to seamlessly proceed with their business plans. Our punctual deliverables have earned us a reputation as a reliable design agency.',
						),
						array(
							'title' => 'Seamless Communication & Competency',
							'para'  => 'Clients can directly communicate with our experts via Skype, email, and phone for any queries, ensuring a smooth collaboration process.',
						),
						array(
							'title' => 'Premium Solutions at Affordable Rates',
							'para'  => 'Experience top-tier quality solutions within a cost-effective range at TechnBrains. We firmly believe that quality work should always be accessible.',
						),
						array(
							'title' => 'Strong Quality Assurance & Testing',
							'para'  => 'Ensuring quality consistency with every project, our team delivers solutions with enthusiasm and adheres to figma technology stack and industry-best quality standards.',
						),
						array(
							'title' => 'Complete Transparency',
							'para'  => 'We maintain complete transparency regarding project details throughout every stage until completion, keeping clients informed about progress.',
						),
					),
				),
			),
		),

		/* We Offer */
		'we_offer' => array(
			'subtitle' => 'Discover topnotch figma services',
			'title'    => 'Other Services We Offer',
			'para'     => 'At TechnBrains, we go beyond boundaries to deliver cutting-edge solutions, ensuring your business stays at the forefront of innovation and success',
			'listing'  => array(
				array(
					'img_src' => '/cms/figma/w1.png',
					'alt'     => 'Mobile App Development',
					'title'   => 'Mobile App Development',
					'para'    => 'We specialize in creating mobile apps tailored to your business needs, with a focus on engaging and delighting your users.',
				),
				array(
					'img_src' => '/cms/figma/w2.png',
					'alt'     => 'Website Design and Development',
					'title'   => 'Website Design and Development',
					'para'    => 'We Design stunning and effective websites that align with your brand\'s aesthetics and goals.',
				),
				array(
					'img_src' => '/cms/figma/w3.png',
					'alt'     => 'Flutter Flow',
					'title'   => 'Flutter Flow',
					'para'    => 'Develop mobile apps for all devices with our Flutter Flow services. Our apps ensure a smooth user experience.',
				),
				array(
					'img_src' => '/cms/figma/w4.png',
					'alt'     => 'WordPress Development',
					'title'   => 'WordPress Development',
					'para'    => 'Create engaging and adaptable websites with our WordPress development that will attract and hold the interest of your audience.',
				),
				array(
					'img_src' => '/cms/figma/w1.png',
					'alt'     => 'Mobile App Development',
					'title'   => 'Mobile App Development',
					'para'    => 'We specialize in creating mobile apps tailored to your business needs, with a focus on engaging and delighting your users.',
				),
				array(
					'img_src' => '/cms/figma/w2.png',
					'alt'     => 'Website Design and Development',
					'title'   => 'Website Design and Development',
					'para'    => 'We Design stunning and effective websites that align with your brand\'s aesthetics and goals.',
				),
				array(
					'img_src' => '/cms/figma/w3.png',
					'alt'     => 'Flutter Flow',
					'title'   => 'Flutter Flow',
					'para'    => 'Develop mobile apps for all devices with our Flutter Flow services. Our apps ensure a smooth user experience.',
				),
				array(
					'img_src' => '/cms/figma/w4.png',
					'alt'     => 'WordPress Development',
					'title'   => 'WordPress Development',
					'para'    => 'Create engaging and adaptable websites with our WordPress development that will attract and hold the interest of your audience.',
				),
			),
		),

		/* FAQs */
		'faqs' => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array(
					'faqhead' => 'Is Figma a UX tool?',
					'faqbody' => 'Yes, Figma is a robust UX (User Experience) design tool that empowers designers to create interactive and user-friendly digital interfaces.',
				),
				array(
					'faqhead' => 'Can I create a website in Figma?',
					'faqbody' => 'While Figma is primarily a design and prototyping tool, it\'s not a website development platform. However, it plays a crucial role in the initial design phase before the development process begins.',
				),
				array(
					'faqhead' => 'Which is better: Photoshop or Figma?',
					'faqbody' => 'The choice between Photoshop and Figma depends on your needs. Figma is preferred for collaborative design, real-time editing, and seamless prototyping, while Photoshop is often used for detailed image editing.',
				),
				array(
					'faqhead' => 'Is Figma design free?',
					'faqbody' => 'Figma offers a free version with essential features, making it accessible to individuals and small teams. However, for advanced functionalities and collaboration, a paid subscription is available.',
				),
				array(
					'faqhead' => 'What is Figma best for?',
					'faqbody' => 'Figma excels in collaborative design, prototyping, and creating interactive interfaces. It is widely used for web and app design, offering real-time collaboration, easy sharing, and a cloud-based design environment.',
				),
				array(
					'faqhead' => 'Do you sign an NDA?',
					'faqbody' => 'Yes, at TechnBrains, we prioritize confidentiality and security. We are more than willing to sign a Non-Disclosure Agreement (NDA) to safeguard your ideas, ensuring a trustworthy partnership throughout the collaboration. Your intellectual property is our priority, and we take every measure to protect it.',
				),
				array(
					'faqhead' => 'Why choose TechnBrains as your Figma UX/UI Designer?',
					'faqbody' => 'At TechnBrains, our team of expert Figma designers is dedicated to delivering unparalleled design solutions. We leverage the full potential of Figma to create captivating and functional figma website designs. With a focus on innovation and precision, choosing TechnBrains guarantees a design partner committed to transforming your vision into a digital reality.',
				),
				array(
					'faqhead' => 'Do you offer any other services apart from designing?',
					'faqbody' => 'Absolutely! In addition to our expertise in Figma web design and Figma UX/UI design, TechnBrains provides a range of services, including mobile app development, web development, AI and machine learning solutions, and e-commerce development. Our holistic approach ensures comprehensive solutions for all your digital needs.',
				),
			),
		),

	), // end mock_data
);
