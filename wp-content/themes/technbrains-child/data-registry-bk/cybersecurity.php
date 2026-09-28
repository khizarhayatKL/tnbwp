<?php
defined('ABSPATH') || exit;
return array(
	'schemas'   => array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Service',
			'name'        => 'Top Cybersecurity Services',
			'description' => 'TechnBrains is a US-based cybersecurity company that provides services and manages cyber risks for distribution and technology partners.',
			'provider'    => array(
				'@type' => 'Organization',
				'name'  => 'TechnBrains',
				'url'   => 'https://technbrains.com',
			),
			'areaServed'  => 'Worldwide',
		),
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array(
					'@type'          => 'Question',
					'name'           => 'What is Cybersecurity?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Cybersecurity is the practice of safeguarding information systems and networks, defending against threats posed by malicious actors or nation-states. It\'s both a science and an art, with practitioners offering consulting, engineering, and IT security services to mitigate risk for businesses and government entities.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What are Cybersecurity services for companies?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Cybersecurity services for companies are comprehensive solutions designed to safeguard businesses digital infrastructure, networks, and sensitive data from a wide range of cyber threats. These services are essential in today\'s interconnected and digitally-driven world, where businesses face constant risks from cyber attacks and data breaches.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What is a Cybersecurity services company?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'A Cybersecurity services company is an organization that specializes in providing various Cybersecurity solutions and services to clients. These companies typically offer expertise in areas such as network security, data protection, cloud security, and compliance management. They help businesses mitigate cyber risks and ensure the confidentiality, integrity, and availability of their digital assets.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What are information security services?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Information security services encompass a range of measures and practices designed to protect sensitive information from unauthorized access, disclosure, alteration, or destruction. These services include data encryption, access control, identity management, security assessments, and security awareness training to ensure the confidentiality, integrity, and availability of information assets.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What are online security services?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Online security services are solutions and measures aimed at protecting individuals, organizations, and systems from cyber threats and attacks conducted over the internet. These services include antivirus software, firewalls, secure web browsing, email security, and secure online transactions to safeguard against malware, phishing, and other online threats.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'What are digital security services?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'Digital security services encompass a range of measures and practices aimed at protecting digital assets, devices, and networks from cyber threats and attacks. These services include endpoint security, network security, cloud security, mobile device management, and encryption to safeguard against data breaches, ransomware, and other digital threats.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'Where can I get the best Cybersecurity services in the USA?',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'To find the best Cybersecurity services in the USA, conduct thorough research on reputable Cybersecurity companies. Review customer testimonials and feedback to gauge their reputation. Evaluate their expertise, experience, and track record in delivering comprehensive cybersecurity solutions. Choose a company that offers a wide range of services tailored to your needs, and ensure they hold industry certifications and comply with regulations like GDPR and HIPAA.',
					),
				),
			),
		),
	),
	'mock_data' => array(
		'main_banner'         => array(
			'head_text'       => 'Top Cybersecurity Services',
			'content'         => 'TechnBrains is a US-based cybersecurity company that provides services and manages cyber risks for distribution and technology partners. Our computer security services can protect your digital assets and transform your business.',
			'img_src'         => '/next-gen/cyber-security/banner-side.webp',
			'img_width'       => '691',
			'img_height'      => '794',
			'img_alt'         => 'cybersecurity-banner',
		),
		'dedicated_lang_desc' => array(
			'para_html' => 'At TechnBrains, we prioritize safeguarding not only users, customers, and patients but also your entire business ecosystem from<span> cyber threats</span>. Our cyber security services deliver exceptional value, both monetarily and operationally, within your organization. By bolstering your security posture, we ensure that confidential, classified, and proprietary business materials remain inaccessible to competitors, fostering a secure environment for innovation and growth.<br><br>Our tailored <span>cyber security policies</span> and protocols not only mitigate risks but also enhance productivity and efficiency. By minimizing computer system downtime and optimizing website uptime, we empower your workforce to focus on core tasks, driving business success. Additionally, our proactive approach extends equipment longevity, reducing replacement costs while bolstering consumer confidence to attract and retain <span>new business opportunities.</span>',
		),
		'language_services'   => array(
			'head_text' => 'Information Security Services',
			'para_text' => 'Our information security services are meticulously crafted to cater to both short-term and long-term needs of computer security services. Whether you require an annual penetration test. Our team of cyber security consultants stands ready to provide expert assistance.',
			'btn_text'  => 'Hire Developers NOW!',
			'listing'   => array(
				array(
					'img_src'   => '/next-gen/cyber-security/d1.webp',
					'width'     => '80',
					'height'    => '80',
					'list_head' => 'Managed Detection and Response',
					'list_para' => 'Elevating breach prevention to new heights, our Managed Detection and Response (MDR) service integrates Crowd Strike, the industry\'s leading software, with 100% U.S.-based threat hunting and response capabilities, ensuring round-the-clock protection. Tailored to meet Department of Defense (DoD) and compliance standards, our MDR service is your proactive shield against evolving cyber threats.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/d2.webp',
					'width'     => '80',
					'height'    => '80',
					'list_head' => 'Penetration Testing',
					'list_para' => 'Stay one step ahead of cyber attackers with our comprehensive penetration testing services. Our expert team identifies vulnerabilities before they can be exploited, providing invaluable insights to fortify your network and applications against potential breaches.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/d3.webp',
					'width'     => '80',
					'height'    => '80',
					'list_head' => 'Cyber Security Consulting',
					'list_para' => 'Leverage our extensive experience working with global enterprises to bolster your cyber security posture. Our computer security services offer on-demand access to seasoned professionals who can provide tailored guidance and support for your projects.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/d4.webp',
					'width'     => '80',
					'height'    => '80',
					'list_head' => 'Cyber Threat Management Services',
					'list_para' => 'Safeguard your business against modern threats with our proactive cyber threat management services. By predicting, preventing, and responding to cyber attacks, we enhance your organization\'s resilience and minimize the risk of disruption.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/d5.webp',
					'width'     => '80',
					'height'    => '80',
					'list_head' => 'Threat Detection and Response Services:',
					'list_para' => 'Partner with us for 24/7 threat prevention and rapid, AI-powered detection and response. Our end-to-end threat solution delivers unparalleled visibility and integration, allowing you to optimize your security program and stay ahead of emerging threats.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/d6.webp',
					'width'     => '80',
					'height'    => '80',
					'list_head' => 'Cloud and Platform Security Services',
					'list_para' => 'Transition to hybrid cloud environments confidently with our cloud and platform security services. Retain control, visibility, and security as you embrace the benefits of cloud computing, ensuring that your critical assets remain protected.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/d7.webp',
					'width'     => '80',
					'height'    => '80',
					'list_head' => 'Identity and Access Management Services',
					'list_para' => 'Empower your workforce and consumers with robust identity and access management solutions. Our services lay the foundation for a secure and streamlined authentication process, enhancing overall security posture.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/d8.webp',
					'width'     => '80',
					'height'    => '80',
					'list_head' => 'Data Application Security Services',
					'list_para' => 'Protect your enterprise\'s most critical data with our comprehensive data application security services. From encryption to access controls, we implement robust measures to safeguard sensitive information against unauthorized access and breaches.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/d9.webp',
					'width'     => '80',
					'height'    => '80',
					'list_head' => 'Cyber Strategy and Risk Services',
					'list_para' => 'Gain a deeper understanding of your cybersecurity risk with our Cyber Strategy and Risk services. Implement improved investment strategies and enhance your security posture to mitigate threats effectively.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/d10.webp',
					'width'     => '80',
					'height'    => '80',
					'list_head' => 'Security Enterprise, Ecosystem, and People Risk Services',
					'list_para' => 'Secure your SAP infrastructure with our comprehensive threat and vulnerability management services. By identifying and mitigating risks proactively, we ensure the integrity and availability of your SAP solutions.',
				),
			),
		),
		'two_boxes'           => array(
			'subtitle' => 'certified Cybersecurity service provider',
			'title'    => 'Risk Assessment and Compliance Services',
			'para'     => 'At TechnBrains, we specialize in comprehensive risk assessment and compliance services tailored to meet the unique needs of your organization. From identifying potential vulnerabilities to ensuring adherence to industry regulations, our expert team provides the guidance and support you need to mitigate risks effectively.',
			'listing'  => array(
				array(
					'img_src'    => '/next-gen/cyber-security/a1.webp',
					'img_width'  => '60',
					'img_height' => '60',
					'title'      => 'HIPAA Compliance Services',
					'para'       => 'In the ever-evolving landscape of healthcare, protecting sensitive patient information is paramount. TechnBrains serves as a trusted advisor for HIPAA compliance, offering expertise in conducting thorough risk assessments and implementing the necessary safeguards to safeguard healthcare information systems and patient records.',
				),
				array(
					'img_src'    => '/next-gen/cyber-security/a2.webp',
					'img_width'  => '60',
					'img_height' => '60',
					'title'      => 'Cybersecurity Maturity Model Certification (CMMC) Compliance Services',
					'para'       => 'Prepare your organization for the rigorous requirements of CMMC certification with TechnBrains. Our expert advisory services and readiness assessments guide federal contractors and subcontractors through the complex certification process, ensuring compliance with all 171 practices and 43 capabilities mandated at various levels.',
				),
				array(
					'img_src'    => '/next-gen/cyber-security/a3.webp',
					'img_width'  => '60',
					'img_height' => '60',
					'title'      => 'SOC 2 Compliance Services',
					'para'       => 'Ensure the trust and confidence of your customers and investors with TechnBrains\' SOC 2 compliance services. Our consultants conduct comprehensive gap assessments, provide guidance on control implementations, and optimize your cyber security controls to achieve and maintain SOC 2 compliance—a critical requirement for many organizations in today\'s digital landscape.',
				),
				array(
					'img_src'    => '/next-gen/cyber-security/a4.webp',
					'img_width'  => '60',
					'img_height' => '60',
					'title'      => 'PCI Compliance Services',
					'para'       => 'Safeguard your organization\'s payment card data with TechnBrains\' PCI compliance services. From gap assessments to annual assistance with AOC and SAQ submissions, our team of PCI consultants offers hands-on expertise in developing and implementing security programs designed to meet PCI controls, ensuring ongoing compliance and peace of mind.',
				),
			),
		),
		'dev_process'         => array(
			'classes'    => 'gray-bg',
			'main_title' => 'Industry recognized development process',
			'lang_title' => 'Steps to Secure Cybersecurity Services',
			'lang_para'  => '',
			'listing'    => array(
				array(
					'number'     => '01',
					'width_img'  => '',
					'height_img' => '',
					'title'      => 'Assessment and Analysis',
					'para'       => 'Begin with a comprehensive evaluation of your current cybersecurity posture and identify potential vulnerabilities and compliance gaps.',
				),
				array(
					'number'     => '02',
					'width_img'  => '',
					'height_img' => '',
					'title'      => 'Customized Solutions',
					'para'       => 'Tailor cybersecurity solutions to address specific needs, leveraging industry best practices and cutting-edge technologies for maximum effectiveness.',
				),
				array(
					'number'     => '03',
					'width_img'  => '',
					'height_img' => '',
					'title'      => 'Implementation and Integration',
					'para'       => 'Seamlessly integrate security measures across your organization\'s infrastructure, ensuring proper configuration and compatibility with existing systems.',
				),
				array(
					'number'     => '04',
					'width_img'  => '',
					'height_img' => '',
					'title'      => 'Continuous Monitoring',
					'para'       => 'Implement 24/7 monitoring services to detect and respond to threats in real-time, proactively defending against cyber attacks.',
				),
				array(
					'number'     => '05',
					'width_img'  => '',
					'height_img' => '',
					'title'      => 'Regular Updates and Maintenance',
					'para'       => 'Keep security measures up-to-date with regular updates and maintenance to stay compliant and resilient against evolving threats.',
				),
				array(
					'number'     => '06',
					'width_img'  => '',
					'height_img' => '',
					'title'      => 'Training and Awareness',
					'para'       => 'Educate employees on cybersecurity best practices to recognize and mitigate threats effectively, fostering a culture of security awareness.',
				),
				array(
					'number'     => '07',
					'width_img'  => '',
					'height_img' => '',
					'title'      => 'Incident Response and Recovery',
					'para'       => 'Develop and implement incident response plans to contain and mitigate security incidents swiftly, minimizing damage and downtime.',
				),
				array(
					'number'     => '08',
					'width_img'  => '',
					'height_img' => '',
					'title'      => 'Regular Assessments and Reviews',
					'para'       => 'Conduct periodic assessments and reviews of security infrastructure to identify areas for improvement and ensure ongoing protection.',
				),
			),
		),
		'industries_slider'   => array(
			'subtitle' => 'Transform Your Business Today',
			'title'    => 'Industries Benefiting from Our Cybersecurity Services',
			'classes'  => 'cyberSlider',
			'para'     => '',
			'listing'  => array(
				array(
					'img_src'   => '/next-gen/cyber-security/w2.webp',
					'tab_title' => 'Healthcare',
					'content'   => 'Safeguard patient data and ensure compliance with stringent regulations in the healthcare industry with our tailored cybersecurity solutions.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/w1.webp',
					'tab_title' => 'Education',
					'content'   => 'Protect sensitive student information and academic resources from cyber threats with our comprehensive cybersecurity services for educational institutions.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/w3.webp',
					'tab_title' => 'Banking',
					'content'   => 'Ensure the security and integrity of financial transactions and customer data in the banking sector with our robust cybersecurity solutions and regulatory compliance expertise.',
				),
				array(
					'img_src'   => '/next-gen/cyber-security/w4.webp',
					'tab_title' => 'Custom Software Development',
					'content'   => 'Revolutionizing the art world, our services have provided artists and collectors with innovative solutions for tokenizing and trading digital artworks and collectibles. With our expertise, we\'re fostering a vibrant ecosystem where creativity thrives, and digital art finds its place in the spotlight.',
				),
			),
		),
		'dev_services'        => array(
			'subtitle' => 'Best Computer Security Services',
			'title'    => 'TechnBrains - Your Trusted Partner For Comprehensive Cyber Security Solutions',
			'para'     => '',
			'listing'  => array(
				array(
					'img_src' => '/next-gen/cyber-security/why-cyber.webp',
					'width'   => '534',
					'height'  => '600',
					'content' => array(
						array(
							'title' => '',
							'para'  => 'At TechnBrains, we specialize in providing top-tier computer security services to businesses of all sizes. With cyber threats becoming increasingly sophisticated, it\'s crucial to partner with a company that understands the ever-changing landscape of cybersecurity. As a leading Cybersecurity services company, we offer a wide range of solutions to address your organization\'s unique needs.',
						),
						array(
							'title' => '',
							'para'  => 'Our company is a Managed Security Services Provider (MSSP) that specializes in threat mitigation, compliance, and risk management. We aim to be a reliable partner in safeguarding your digital assets by offering services such as 24x7 monitoring and expert consulting. Our team of professionals is well-versed in the latest security trends and technologies, providing proactive information security and robust IT security services to keep your business protected from cyber attacks.',
						),
						array(
							'title' => '',
							'para'  => 'Whether you\'re looking for Cybersecurity services in the USA or beyond, TechnBrains is here to help. With our comprehensive Cybersecurity service offerings, you can rest assured that your business is in good hands. Contact us today to learn more about how we can safeguard your organization against cyber threats.',
						),
					),
				),
			),
		),
		'proposal'            => array(
			'head_html' => '<h2>Safeguard your digital assets with our Top cybersecurity Services</h2>',
			'btn_text'  => 'Talk to Experts',
			'anchor'    => true,
			'btn_url'   => '/contact-us',
		),
		'faqs'                => array(
			'head_text' => 'Things you might want to know',
			'listing'   => array(
				array(
					'faqhead' => 'What is Cybersecurity?',
					'faqbody' => 'Cybersecurity is the practice of safeguarding information systems and networks, defending against threats posed by malicious actors or nation-states. It\'s both a science and an art, with practitioners offering consulting, engineering, and IT security services to mitigate risk for businesses and government entities.',
				),
				array(
					'faqhead' => 'What are Cybersecurity services for companies?',
					'faqbody' => 'Cybersecurity services for companies are comprehensive solutions designed to safeguard businesses digital infrastructure, networks, and sensitive data from a wide range of cyber threats. These services are essential in today\'s interconnected and digitally-driven world, where businesses face constant risks from cyber attacks and data breaches. Here\'s a detailed breakdown of the key Cybersecurity services for companies:<h4>1. Threat Detection and Response:</h4><p>Cybersecurity services include advanced threat detection and response capabilities. This involves deploying sophisticated tools and technologies to monitor networks and systems for any signs of suspicious or malicious activity.</p><h4>2. Vulnerability Assessments:</h4><p>Vulnerability assessments are conducted to identify weaknesses and vulnerabilities in an organization\'s digital infrastructure, applications, and systems.</p><h4>3. Penetration Testing:</h4><p>Penetration testing, also known as ethical hacking, involves simulating real-world cyber attacks to evaluate the effectiveness of an organization\'s security measures.</p><h4>4. Security Consulting:</h4><p>Security consulting services provide expert guidance and advisory support to help organizations develop and implement robust cybersecurity strategies.</p><h4>5. Incident Response Planning:</h4><p>Incident response planning involves developing detailed protocols and procedures to guide an organization\'s response in the event of a Cybersecurity incident or data breach.</p><h4>6. Compliance Management:</h4><p>Compliance management services help organizations navigate regulatory requirements and industry standards related to Cybersecurity.</p>',
				),
				array(
					'faqhead' => 'What is a Cybersecurity services company?',
					'faqbody' => 'A Cybersecurity services company is an organization that specializes in providing various Cybersecurity solutions and services to clients. These companies typically offer expertise in areas such as network security, data protection, cloud security, and compliance management. They help businesses mitigate cyber risks and ensure the confidentiality, integrity, and availability of their digital assets.<br><br>A Cybersecurity services company, such as TechnBrains, is a specialized organization dedicated to offering a wide array of Cybersecurity solutions and services tailored to the unique needs of its clients.<br><br>At TechnBrains, we understand the complex and evolving nature of cyber threats faced by businesses today. As a leading Cybersecurity services company, we leverage our deep industry knowledge and technical proficiency to help organizations mitigate cyber risks effectively.<br><br>One of the key strengths of TechnBrains lies in our ability to provide comprehensive solutions that address the entire spectrum of cybersecurity challenges.<br><br>Furthermore, TechnBrains goes beyond just offering technical solutions; we also prioritize educating our clients and empowering them to build a resilient cybersecurity posture.',
				),
				array(
					'faqhead' => 'What are information security services?',
					'faqbody' => 'Information security services encompass a range of measures and practices designed to protect sensitive information from unauthorized access, disclosure, alteration, or destruction. These services include data encryption, access control, identity management, security assessments, and security awareness training to ensure the confidentiality, integrity, and availability of information assets.',
				),
				array(
					'faqhead' => 'What are online security services?',
					'faqbody' => 'Online security services are solutions and measures aimed at protecting individuals, organizations, and systems from cyber threats and attacks conducted over the internet. These services include antivirus software, firewalls, secure web browsing, email security, and secure online transactions to safeguard against malware, phishing, and other online threats.',
				),
				array(
					'faqhead' => 'What are digital security services?',
					'faqbody' => 'Digital security services encompass a range of measures and practices aimed at protecting digital assets, devices, and networks from cyber threats and attacks. These services include endpoint security, network security, cloud security, mobile device management, and encryption to safeguard against data breaches, ransomware, and other digital threats.',
				),
				array(
					'faqhead' => 'Where can I get the best Cybersecurity services in the USA?',
					'faqbody' => 'To find the best Cybersecurity services in the USA, conduct thorough research on reputable Cybersecurity companies. Review customer testimonials and feedback to gauge their reputation. Evaluate their expertise, experience, and track record in delivering comprehensive cybersecurity solutions. Choose a company that offers a wide range of services tailored to your needs, and ensure they hold industry certifications and comply with regulations like GDPR and HIPAA.<br><br>Consider factors such as the company\'s approach to Cybersecurity, the effectiveness of its solutions, and its commitment to ongoing support and education. Ultimately, select a Cybersecurity services provider like TechnBrains that demonstrates a proven track record of excellence and a dedication to protecting your digital assets.',
				),
			),
		),
	),
	'components' => array(
		array('name' => 'main-banner',          'modifier_class' => ''),
		array('name' => 'dedicated-lang-desc',  'modifier_class' => ''),
		array('name' => 'language-services',    'modifier_class' => ''),
		array('name' => 'two-boxes',            'modifier_class' => ''),
		array('name' => 'development-process',  'modifier_class' => ''),
		array('name' => 'industries-slider',    'modifier_class' => 'cyberSlider'),
		array('name' => 'development-services', 'modifier_class' => 'gray-bg'),
		array('name' => 'proposal',             'modifier_class' => ''),
		array('name' => 'testimonials',         'modifier_class' => ''),
		array('name' => 'main-faqs',            'modifier_class' => ''),
	),
);
