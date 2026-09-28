<?php
defined( 'ABSPATH' ) || exit;

return array(

	'schemas' => array(
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array( '@type' => 'Question', 'name' => 'How to make an educational app?',                            'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'To start on educational app development, we begin by defining your app\'s purpose and target audience. Then, we conduct market research to understand user needs. Choose a reliable education app development company like TechnBrains to handle the technical aspects. Collaborate on designing a user-friendly interface and determine the necessary features.' ) ),
				array( '@type' => 'Question', 'name' => 'How much does it cost to make an educational app?',          'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'The cost of developing an educational app varies based on factors such as the type of app, features, tech stack, and the chosen education app development company. Creating an app similar to Coursera may range from $76,500 to $103,000, while an app like DuoLingo might cost between $40,000 and $150,000.' ) ),
				array( '@type' => 'Question', 'name' => 'How do I hire an app developer to make an educational app?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'To hire an app developer for educational app development, start by outlining your project requirements. Look for an experienced e-learning app development company like TechnBrains. Evaluate their portfolio, expertise, and client reviews.' ) ),
				array( '@type' => 'Question', 'name' => 'What is the role of education apps in business?',            'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Education apps play a pivotal role in business by providing opportunities for employee training, skill development, and knowledge enhancement. They facilitate continuous learning, improving workforce productivity and adaptability.' ) ),
				array( '@type' => 'Question', 'name' => 'What are some of the best eLearning development tools?',     'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Several e-learning development tools contribute to the creation of effective educational content. Some noteworthy tools include Articulate Storyline, Adobe Captivate, Moodle, Blackboard, and Canvas.' ) ),
			),
		),
	),

	'components' => array(
		array( 'name' => 'industry-banner',    'modifier_class' => '' ),
		array( 'name' => 'counter-sec',        'modifier_class' => '' ),
		array( 'name' => 'language-services',  'modifier_class' => '' ),
		array( 'name' => 'stack-new-box',      'modifier_class' => 'angular-stack' ),
		array( 'name' => 'industry-features',  'modifier_class' => '' ),
		array( 'name' => 'development-process','modifier_class' => '' ),
		array( 'name' => 'proposal',           'modifier_class' => 'education' ),
		array( 'name' => 'testimonials',       'modifier_class' => '' ),
		array( 'name' => 'main-faqs',          'modifier_class' => '' ),
	),

	'mock_data' => array(

		'industry_banner' => array(
    'title'             => 'Education App Development Company',
    'para'              => 'TechnBrains is a top education app development company that is revolutionizing EdTech with educational mobile apps, empowering over 10 million students and trainers. Gain access to the finest Education App Development Services in the USA with us.',
    'second_button'     => false,
    'banner_img_src'    => '/industry/education/banner.webp',
    'banner_img_width'  => '612',
    'banner_img_height' => '515',
    'banner_img_alt'    => 'banner',
    'bg_image'          => '/industry/education/bg-main.webp',
),

		'counter_sec' => array(
			'listing' => array(
				array( 'count' => '40', 'sign' => '+', 'content' => 'EdTech Solutions Developed' ),
				array( 'count' => '92', 'sign' => '%', 'content' => 'Education Client Satisfaction' ),
				array( 'count' => '9',  'sign' => 'x', 'content' => 'Faster Rollout of E-Learning Platforms' ),
				array( 'count' => '6',  'sign' => 'x', 'content' => 'Revenue Increase by Facilitating Virtual Learning' ),
			),
		),

		'language_services' => array(
    'head_text' => 'Scalable Educational App Development Solutions',
    'para_text' => 'Get ahead of the game and break free from traditional classroom settings with innovative educational app development services. TechnBrains, a top Edtech app development company, offers a diverse range of Edtech solutions that allow you to tap into the billion-dollar education industry, generate millions in profit, and deliver quality education to the masses.',
    'btn_text'  => 'Get a Free Consultation',
    'anchor'    => false,
    'listing'   => array(
        array( 'img_src' => '/industry/education/d1.png',  'width' => '80', 'height' => '80', 'alt' => 'Educational App Development Services', 'list_head' => 'Educational App Development Services', 'list_para' => 'Build beyond traditional classrooms with scalable educational app development services tailored for modern learners. TechnBrains helps businesses, startups, and institutions create engaging EdTech platforms that support digital learning, user engagement, and long-term growth. As an education app development company, we develop feature-rich solutions that make learning more accessible, interactive, and convenient across devices.' ),
        array( 'img_src' => '/industry/education/d2.png',  'width' => '80', 'height' => '80', 'alt' => 'Learning Management Systems',          'list_head' => 'Learning Management Systems',          'list_para' => 'Our education application development company develops custom LMS platforms that simplify training management, course delivery, progress tracking, and student engagement. These systems are built to help educational institutions and enterprises manage learning activities efficiently while giving users easy access to study material, assignments, and performance reports. We also create scalable web app development solutions for online learning environments that support large user bases and real-time access.' ),
        array( 'img_src' => '/industry/education/d3.png',  'width' => '80', 'height' => '80', 'alt' => 'Self-Learning Apps',                   'list_head' => 'Self-Learning Apps',                   'list_para' => 'Self-learning applications are gaining popularity. Educational apps like Duolingo, Babbel, Rosetta Stone, and many others assist students in learning independently. Developing a self-learning app is a challenging task and requires extensive research to ensure that it delivers value to the users. To achieve this, self-learning apps often employ Edtech Trends such as competing with friends and gamification.' ),
        array( 'img_src' => '/industry/education/d4.png',  'width' => '80', 'height' => '80', 'alt' => 'School Information System',             'list_head' => 'School Information System',             'list_para' => 'We are a company that specializes in developing educational technology applications, particularly school information systems. Our systems include an administrative panel and separate apps for teachers, students, and parents/mentors. Our top priority when creating these systems is to keep the cost of education mobile app development low while ensuring that data security, infrastructure availability, and robustness are all fully integrated.' ),
        array( 'img_src' => '/industry/education/d5.png',  'width' => '80', 'height' => '80', 'alt' => 'Corporate Training Apps',               'list_head' => 'Corporate Training Apps',               'list_para' => 'EdTech is wider than schools and universities now. It has expanded its reach to 9-5 workers and corporations as well. Many companies now use corporate training apps to help their employees develop valuable skills. With our Edtech app development services, you can also get an enterprise app for corporate training and help your workforce become more experienced, skilled, and motivated. Our educational app development services are designed to develop easy-to-follow corporate learning apps. By integrating our designs with your company\'s content, we can develop a training module that helps your team sharpen their existing skills.' ),
        array( 'img_src' => '/industry/education/d6.png',  'width' => '80', 'height' => '80', 'alt' => 'On-Demand EdTech Apps',                 'list_head' => 'On-Demand EdTech Apps',                 'list_para' => 'These EdTech apps operate in the on-demand app development domain, providing educational content and services to students based on their specific needs. With the help of TechnBrains, you can create your own on-demand app for Edtech, similar to popular platforms like edx, Duolingo, and Khan Academy, and potentially generate millions in revenue.' ),
        array( 'img_src' => '/industry/education/d7.png',  'width' => '80', 'height' => '80', 'alt' => 'Virtual Classroom & Conferencing Apps', 'list_head' => 'Virtual Classroom & Conferencing Apps', 'list_para' => 'Edtech apps enable virtual classrooms and conferencing, allowing teachers to schedule classes, share study material, and conduct online tests. We develop video conferencing apps and virtual classrooms with features like presentation, participation control, and homework management for more engagement.' ),
        array( 'img_src' => '/industry/education/d8.png',  'width' => '80', 'height' => '80', 'alt' => 'Tuitions Education Apps',               'list_head' => 'Tuitions Education Apps',               'list_para' => 'Our company is a top-notch developer of education applications. We have a team of skilled and experienced developers who specialize in creating Edtech apps. Our market-leading solutions enable tutors and students to interact with each other seamlessly, leading to a better virtual education experience.' ),
        array( 'img_src' => '/industry/education/d9.png',  'width' => '80', 'height' => '80', 'alt' => 'EdTech Apps For Disabled',              'list_head' => 'EdTech Apps For Disabled',              'list_para' => 'TechnBrains is an Edtech app development company that specializes in creating innovative learning apps on both Android and iOS platforms for disabled and challenged individuals. Our team of developers is committed to delivering industry-leading learning apps that provide more opportunities for people with disabilities.' ),
        array( 'img_src' => '/industry/education/d10.png', 'width' => '80', 'height' => '80', 'alt' => 'EdTech Apps For Learners',              'list_head' => 'EdTech Apps For Learners',              'list_para' => 'Educational technology (EdTech) apps are designed to make the process of learning enjoyable for students. To achieve this, we incorporate specific features into each type of EdTech app during the development process. These features include language learning apps, exam preparation apps, online courses, adult learning apps, and apps for kids.' ),
        array( 'img_src' => '/industry/education/d11.png', 'width' => '80', 'height' => '80', 'alt' => 'EdTech Apps For Educators',             'list_head' => 'EdTech Apps For Educators',             'list_para' => 'Education app development has made teaching more convenient and practical. Educators can now use EdTech apps to monitor students\' progress and share grades with parents or mentors. We also create educational apps to assist educators in scheduling classes, sharing study materials with students, and conducting online tests.' ),
        array( 'img_src' => '/industry/education/d12.png', 'width' => '80', 'height' => '80', 'alt' => 'Induction and Orientation Apps',        'list_head' => 'Induction and Orientation Apps',        'list_para' => 'Our team specializes in developing custom educational apps that are specific to your brand. These apps make it easy for HR to onboard new employees while also ensuring that candidates feel comfortable and at home from their very first swipe, zoom, and click.' ),
        array( 'img_src' => '/industry/education/d13.png', 'width' => '80', 'height' => '80', 'alt' => 'Employee Engagement Apps',              'list_head' => 'Employee Engagement Apps',              'list_para' => 'Our company specializes in developing educational mobile apps that focus on employee engagement. Fortune 500 corporations have used these apps to connect all employees.' ),
        array( 'img_src' => '/industry/education/d14.png', 'width' => '80', 'height' => '80', 'alt' => 'Skill Boosting Apps',                   'list_head' => 'Skill Boosting Apps',                   'list_para' => 'Our eLearning app development services offer skill-enhancing apps that focus on gamification, are backed by AR/VR and IoT technologies, and are available on all platforms.' ),
        array( 'img_src' => '/industry/education/d15.png', 'width' => '80', 'height' => '80', 'alt' => 'Tuition Apps',                          'list_head' => 'Tuition Apps',                          'list_para' => 'You can get custom software and education apps with features like homework sections and to-do lists, making learning accessible and efficient.' ),
        array( 'img_src' => '/industry/education/d16.png', 'width' => '80', 'height' => '80', 'alt' => 'E2c eLearning App Development',         'list_head' => 'E2c eLearning App Development',         'list_para' => 'We offer education app development services that cater to the needs of large-scale education ventures as well. Our team of expert educational app developers is well-versed in the intricacies involved in developing a comprehensive eLearning app. You can rely on us to handle the deployment of your educational app on a broad scale without any hassle.' ),
        array( 'img_src' => '/industry/education/d17.png', 'width' => '80', 'height' => '80', 'alt' => 'eLearning Apps for Disabled',           'list_head' => 'eLearning Apps for Disabled',           'list_para' => 'Our education app development company prioritizes developing educational apps for differently-abled individuals. Our advanced adaptive learning services, based on 3D and Haptic technologies, aim to make knowledge accessible to everyone.' ),
        array( 'img_src' => '/industry/education/d18.png', 'width' => '80', 'height' => '80', 'alt' => 'On-demand eLearning Apps',              'list_head' => 'On-demand eLearning Apps',              'list_para' => 'Our app development services provide on-demand education solutions, including audio and video learning, lecture scheduling, appointment management.' ),
    ),
),

		'stack_new_box' => array(
    'subtitle' => 'APP FOR EDUCATIONAL TECHSTACK',
    'title'    => 'Technical Stack We Use for Educational Applications',
    'listing'  => array(
        array(
            'tab_title' => 'Front-end frameworks',
            'data_list' => array(
                array( 'title' => 'React.js' ),
                array( 'title' => 'Angular.js' ),
                array( 'title' => 'JavaScript (ES6+)' ),
                array( 'title' => 'Context API (React)' ),
                array( 'title' => 'RxJS (Angular)' ),
                array( 'title' => 'HTML5' ),
            ),
        ),
        array(
            'tab_title' => 'Backend Development',
            'data_list' => array(
                array( 'title' => 'Java' ),
                array( 'title' => 'MySQL' ),
                array( 'title' => 'Django' ),
                array( 'title' => 'Flask (Python)' ),
                array( 'title' => 'MongoDB' ),
                array( 'title' => 'PostgreSQL' ),
                array( 'title' => '.NET Development' ),
                array( 'title' => 'Node.js with Express.js' ),
            ),
        ),
        array(
            'tab_title' => 'Mobile App Development',
            'data_list' => array(
                array( 'title' => 'Swift (iOS using Xcode)' ),
                array( 'title' => 'React Native' ),
                array( 'title' => 'Flutter' ),
                array( 'title' => 'Xamarin' ),
                array( 'title' => 'Kotlin/Java (Android using Android Studio)' ),
            ),
        ),
        array(
            'tab_title' => 'APIs and Integration',
            'data_list' => array(
                array( 'title' => 'RESTful APIs' ),
                array( 'title' => 'GraphQL' ),
            ),
        ),
        array(
            'tab_title' => 'Authentication',
            'data_list' => array(
                array( 'title' => 'JWT (JSON Web Tokens)' ),
            ),
        ),
        array(
            'tab_title' => 'Real-time Features',
            'data_list' => array(
                array( 'title' => 'WebSockets' ),
            ),
        ),
        array(
            'tab_title' => 'Cloud Services',
            'data_list' => array(
                array( 'title' => 'Amazon S3' ),
                array( 'title' => 'Azure Storage' ),
                array( 'title' => 'MongoDB Atlas' ),
                array( 'title' => 'Amazon RDS' ),
                array( 'title' => 'Microsoft Azure' ),
                array( 'title' => 'AWS' ),
                array( 'title' => 'Google Cloud Storage' ),
                array( 'title' => 'Google Cloud Platform' ),
            ),
        ),
        array(
            'tab_title' => 'DevOps',
            'data_list' => array(
                array( 'title' => 'GitHub' ),
                array( 'title' => 'Docker' ),
                array( 'title' => 'Kubernetes' ),
            ),
        ),
    ),
),

		'industry_features' => array(
			'classes'  => 'gray-bg',
			'subtitle' => 'Redefine learning with us - Your expert Education Software Development Company',
			'title'    => 'Education App Development Features',
			'para'     => 'As a top education app development company, we understand the significance of educational app features. That\'s why we equip our Edtech solutions with the best and most useful features. Our education app development solutions consist of three parts: the student panel, the teacher panel, and the admin panel.',
			'listing'  => array(
				array(
					'tab_title'   => 'Student Panel',
					'tab_content' => array(
						array( 'img_src' => '/industry/education/f1.png', 'title' => 'Assignment & Assessment',     'content' => 'Ability to receive and submit assignments. Access to assessment tools for quizzes and tests.' ),
						array( 'img_src' => '/industry/education/f2.png', 'title' => 'Communication',              'content' => 'Instant messaging for collaboration. Audio and video conferencing for virtual interactions. Forums for discussions and peer interaction.' ),
						array( 'img_src' => '/industry/education/f3.png', 'title' => 'Subscription Plans',         'content' => 'Access to various subscription models. Freemium model for exclusive content.' ),
						array( 'img_src' => '/industry/education/f4.png', 'title' => 'Personal Notes',             'content' => 'Capability to save screenshots. Note-taking features, including handwriting.' ),
						array( 'img_src' => '/industry/education/f5.png', 'title' => 'Gamification',               'content' => 'Achievement badges for completed modules. Social media sharing of achievements.' ),
						array( 'img_src' => '/industry/education/f6.png', 'title' => 'Mock Test',                  'content' => 'Access to personalized practice tests. Analytics for self-assessment and improvement.' ),
						array( 'img_src' => '/industry/education/f7.png', 'title' => 'Parent App Access Integration', 'content' => 'Separate login for parents to monitor student performance.' ),
						array( 'img_src' => '/industry/education/f8.png', 'title' => 'Compete with Friends',       'content' => 'Collaboration features for healthy competition. Alerts for peers\' achievements.' ),
					),
				),
				array(
					'tab_title'   => 'Teacher Panel',
					'tab_content' => array(
						array( 'img_src' => '/industry/education/f9.png',  'title' => 'Teacher Profile Management',       'content' => 'Ability to create, edit, and manage profiles. Update information and availability status.' ),
						array( 'img_src' => '/industry/education/f10.png', 'title' => 'Attendance Management',            'content' => 'Marking and managing student attendance. Editing and correcting attendance records.' ),
						array( 'img_src' => '/industry/education/f11.png', 'title' => 'Assignment Submission & Grading',  'content' => 'Sending assignments to students. Grading and providing feedback within the app.' ),
						array( 'img_src' => '/industry/education/f12.png', 'title' => 'In-App Communication',             'content' => 'Video calls, voice calls, and messaging for student-teacher interaction. Efficient communication tools for collaboration.' ),
						array( 'img_src' => '/industry/education/f13.png', 'title' => 'Schedule Management',              'content' => 'Timetable management for class scheduling. Editing, adding, or removing classes as needed.' ),
						array( 'img_src' => '/industry/education/f1.png',  'title' => 'Leave Management',                 'content' => 'Ability to manage and approve leave requests from students.' ),
					),
				),
				array(
					'tab_title'   => 'Admin Panel',
					'tab_content' => array(
						array( 'img_src' => '/industry/education/f14.png', 'title' => 'Student and Teacher Profile Management', 'content' => 'Managing user profiles, including creation and deletion. Ensuring up-to-date and accurate information.' ),
						array( 'img_src' => '/industry/education/f15.png', 'title' => 'Interactive Dashboard',                 'content' => 'Access to an interactive dashboard displaying key metrics. Simplified information presentation for quick insights.' ),
						array( 'img_src' => '/industry/education/f16.png', 'title' => 'Fee Collection',                        'content' => 'Features for collecting and managing student fees. Monitoring payment status and financial records.' ),
						array( 'img_src' => '/industry/education/f17.png', 'title' => 'Admission Process',                     'content' => 'Capability to admit new students. Guiding through the entire admission process.' ),
						array( 'img_src' => '/industry/education/f18.png', 'title' => 'Teacher/Student Onboarding',            'content' => 'Onboarding features to assist users in accessing the platform. Ensuring a smooth and user-friendly introduction.' ),
						array( 'img_src' => '/industry/education/f19.png', 'title' => 'User Helpline',                         'content' => 'Providing a user helpline for addressing issues and support. Offering assistance to both teachers and students as needed.' ),
					),
				),
			),
		),

		'dev_process' => array(
    'main_title' => 'Choose excellence. We are your dedicated E-Learning App Development Partner',
    'lang_title' => 'TechnBrains Streamlined EdTech Mobile App Development Process',
    'lang_para'  => 'TechnBrains, a leading education mobile app development company, follows an agile development process to deliver the best solutions within the deadline. Our process is outlined below',
    'listing'    => array(
        array( 'number' => '01', 'title' => 'Client Consultation',                   'para' => 'We Begin with a detailed consultation to understand the client\'s vision and requirements for their education app development project.' ),
        array( 'number' => '02', 'title' => 'Strategic Planning',                    'para' => 'We develop a comprehensive strategy that aligns with the goals of the education app development company and the client. This involves defining the target audience, features, and desired outcomes.' ),
        array( 'number' => '03', 'title' => 'Design and Prototyping',                'para' => 'Our UI UX Designers create intuitive and engaging designs for the educational app through wireframes and prototypes. This step ensures that the educational app development aligns with user expectations and needs.' ),
        array( 'number' => '04', 'title' => 'Education Development and Testing',     'para' => 'Here, we execute the actual education app development process, leveraging the latest technologies and methodologies. Rigorous testing is conducted to ensure the final product meets quality standards.' ),
        array( 'number' => '05', 'title' => 'Deployment and Integration',            'para' => 'Our app experts deploy the developed educational app and integrate it seamlessly with necessary platforms and systems. This step is crucial for delivering a cohesive user experience and ensuring the success of our education software development services.' ),
        array( 'number' => '06', 'title' => 'Ongoing Support and Maintenance',       'para' => 'TechnBrains Provides continuous support and maintenance services to address any issues and keep the educational app up-to-date. This ensures long-term success for the education software development company and client alike.' ),
    ),
),
'proposal' => array(
    'head_html' => '<h2>Improve Education with Custom Edtech App Solutions. Hire Developers Now!</h2>',
    'btn_text'  => 'Build Your EdTech App',
    'anchor'    => false,
),

		'faqs' => array(
    'head_text' => 'Things you might want to know',
    'listing'   => array(
        array( 'faqhead' => 'How to make an educational app?',                            'faqbody' => 'To start on educational app development, we begin by defining your app\'s purpose and target audience. Then, we conduct market research to understand user needs. Choose a reliable education app development company like TechnBrains to handle the technical aspects. Collaborate on designing a user-friendly interface and determine the necessary features. Select an appropriate tech stack and development approach, considering factors like scalability and cross-platform compatibility. Rigorous testing and continuous improvement are crucial for a successful educational app.' ),
        array( 'faqhead' => 'How much does it cost to make an educational app?',          'faqbody' => 'The cost of developing an educational app varies based on factors such as the type of app, features, tech stack, and the chosen education app development company. For instance, creating an app similar to Coursera may range from $76,500 to $103,000, while an app like DuoLingo might cost between $40,000 and $150,000. Detailed project requirements, location, and expertise play significant roles in determining the overall cost.' ),
        array( 'faqhead' => 'How do I hire an app developer to make an educational app?', 'faqbody' => 'To hire an app developer for educational app development, start by outlining your project requirements. Look for an experienced e-learning app development company or an educational app development company like TechnBrains. Evaluate their portfolio, expertise, and client reviews. Conduct interviews to assess their communication and problem-solving skills. Ensure the selected developer or team has experience with the required education software development services and aligns with your project goals.' ),
        array( 'faqhead' => 'What is the role of education apps in business?',            'faqbody' => 'Education apps play a pivotal role in business by providing opportunities for employee training, skill development, and knowledge enhancement. They facilitate continuous learning, improving workforce productivity and adaptability. Educational apps can also serve as tools for client education, demonstrating expertise and building trust. In the business context, these apps contribute to employee engagement, professional development, and overall organizational success.' ),
        array( 'faqhead' => 'What are some of the best eLearning development tools?',     'faqbody' => 'Several e-learning development tools contribute to the creation of effective educational content. Some noteworthy tools include Articulate Storyline, Adobe Captivate, Moodle, Blackboard, and Canvas. These tools offer features for content creation, interactive learning, assessments, and collaboration. The choice of tools depends on specific requirements, content type, and the desired learning experience. Partnering with an experienced education software development company like TechnBrains can help you select the most suitable tools for your project.' ),
    ),
),

	),
);
