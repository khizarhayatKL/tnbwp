<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
?>

<section class="main-banner <?php echo esc_attr( get_query_var( 'component_modifier_classes' ) ); ?>">
	<div class="container">
		<?php tnb_breadcrumb_html(); ?>
		<div class="banner-grid">
			<div class="left-info">
				<img src="<?php echo esc_url( $img . '/case-studies/streamlive/stream-logo.png' ); ?>" width="140" height="140" alt="Streamline Live logo" class="logo-img" loading="eager" decoding="async">
				<h1>Streamline Live</h1>
				<h4>By TechnBrains</h4>
				<p>A groundbreaking location-based social media platform for content sharing. Amplify your content, engage in real-time, and grow your network. Tailored for success in the USA market.</p>
				<img src="<?php echo esc_url( $img . '/case-studies/streamlive/appstore.png' ); ?>" width="185" height="50" class="app-logo" alt="App store logo" loading="lazy" decoding="async">
				<div class="info-grid">
					<div class="banner-info">
						<img src="<?php echo esc_url( $img . '/case-studies/streamlive/project-management.png' ); ?>" width="59" height="60" alt="Technology" loading="lazy" decoding="async">
						<h4>Technology</h4>
						<hr>
						<p>React Native, NodeJS, MongoDB</p>
					</div>
					<div class="banner-info">
						<img src="<?php echo esc_url( $img . '/case-studies/streamlive/countries.png' ); ?>" width="59" height="60" alt="Region" loading="lazy" decoding="async">
						<h4>Region</h4>
						<hr>
						<p>United States</p>
					</div>
					<div class="banner-info">
						<img src="<?php echo esc_url( $img . '/case-studies/streamlive/integration.png' ); ?>" width="59" height="60" alt="Integrations" loading="lazy" decoding="async">
						<h4>Integrations</h4>
						<hr>
						<p>Firebase, SendGrid</p>
					</div>
				</div>
			</div>
			<div class="right-info">
				<img src="<?php echo esc_url( $img . '/case-studies/streamlive/right-banner.webp' ); ?>" width="776" height="936" alt="Streamline Live app" loading="eager" decoding="async">
			</div>
		</div>
	</div>
</section>

<section class="intro-about">
	<div class="container">
		<h4>Introduction</h4>
		<h2>About This Project</h2>
		<p>Streamline Live is a social media innovation by TechnBrains, using React Native, Node.js, and MongoDB, tailored for the USA market.</p>
		<div class="about-grid">
			<div class="about-left">
				<h4>Get Started</h4>
				<h2>Overview</h2>
				<p>Streamline Live redefines content sharing in the USA. Leveraging React Native, Node.js, and MongoDB, it offers location-based features, real-time interaction, and seamless Firebase/SendGrid integration, empowering users to effortlessly expand their reach and engage with a broader audience.</p>
			</div>
			<div class="about-right">
				<img src="<?php echo esc_url( $img . '/case-studies/streamlive/about-right.png' ); ?>" width="600" height="657" alt="Overview circle" loading="lazy" decoding="async">
			</div>
		</div>
		<div class="about-grid">
			<div class="about-right">
				<img src="<?php echo esc_url( $img . '/case-studies/streamlive/social.png' ); ?>" width="568" height="440" alt="Social media" loading="lazy" decoding="async">
			</div>
			<div class="about-left">
				<h2>The Story</h2>
				<p>The story of Streamline Live is one of innovation and transformation by TechnBrains. Born from a vision to revolutionize USA social media,<br><br>It's now a dynamic platform connecting users and enhancing content sharing experiences nationwide.</p>
			</div>
		</div>
	</div>
</section>

<section class="prob-sol-main">
	<div class="container">
		<div class="prob-sol-grid">
			<div class="prob-sol-left">
				<h2>PROBLEM</h2>
				<p>TechnBrains recognized challenges and tackled them head-on, showcasing their commitment to innovation and user satisfaction.</p>
				<div class="prob-box-grid">
					<h4>User Engagement</h4>
					<p>Low user engagement hampers app growth and content interaction.</p>
				</div>
				<div class="prob-box-grid">
					<h4>Monetization Strategy</h4>
					<p>Inadequate revenue generation from premium subscriptions and ads.</p>
				</div>
				<div class="prob-box-grid">
					<h4>Content Moderation</h4>
					<p>Challenges in effectively moderating user-generated content.</p>
				</div>
				<div class="prob-box-grid">
					<h4>Data Security</h4>
					<p>Ensuring robust data security and privacy for user information.</p>
				</div>
				<div class="prob-box-grid">
					<h4>Competition</h4>
					<p>Facing stiff competition in the crowded social media market.</p>
				</div>
				<div class="prob-box-grid">
					<h4>Scalability</h4>
					<p>Struggling to handle increased user traffic and data efficiently.</p>
				</div>
			</div>
			<div class="prob-sol-center">
				<img src="<?php echo esc_url( $img . '/case-studies/streamlive/vs.png' ); ?>" width="300" height="1100" alt="VS" loading="lazy" decoding="async">
			</div>
			<div class="prob-sol-right">
				<h2>SOLUTION</h2>
				<p>With dedication and expertise, TechnBrains devised creative solutions, solidifying their reputation as industry leaders in app development.</p>
				<div class="prob-box-grid">
					<h4>Enhanced User Engagement</h4>
					<p>Implement gamification, personalized notifications, and user incentives for increased engagement.</p>
				</div>
				<div class="prob-box-grid">
					<h4>Diversified Monetization</h4>
					<p>Explore additional revenue streams, such as sponsored content, premium features, and e-commerce integrations.</p>
				</div>
				<div class="prob-box-grid">
					<h4>AI-driven Moderation</h4>
					<p>Employ AI and machine learning for proactive content moderation and user reporting tools.</p>
				</div>
				<div class="prob-box-grid">
					<h4>Unique Features</h4>
					<p>Introduce innovative features and niche communities to differentiate from competitors.</p>
				</div>
				<div class="prob-box-grid">
					<h4>Scalable Infrastructure</h4>
					<p>Invest in scalable cloud infrastructure and optimize database performance for handling growth.</p>
				</div>
				<div class="prob-box-grid">
					<h4>Data Encryption</h4>
					<p>Strengthen data encryption, conduct regular security audits, and comply with industry standards to protect user data.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="timeline-main">
	<div class="container">
		<div class="timeline-info">
			<h2>Project Timeline</h2>
			<ul>
				<li class="active" data-slive-tab-btn data-slive-tab-idx="0">Week 01</li>
				<li data-slive-tab-btn data-slive-tab-idx="1">Week 02</li>
				<li data-slive-tab-btn data-slive-tab-idx="2">Week 03</li>
			</ul>
			<div class="slive-tab-panel active" data-slive-tab-idx="0">
				<h3>Planning and Conceptualization</h3>
				<img src="<?php echo esc_url( $img . '/case-studies/streamlive/cal-1.webp' ); ?>" width="1464" height="868" alt="Week 01 timeline" loading="lazy" decoding="async">
			</div>
			<div class="slive-tab-panel" data-slive-tab-idx="1">
				<h3>Design and Development Initiation</h3>
				<img src="<?php echo esc_url( $img . '/case-studies/streamlive/cal-2.webp' ); ?>" width="1464" height="868" alt="Week 02 timeline" loading="lazy" decoding="async">
			</div>
			<div class="slive-tab-panel" data-slive-tab-idx="2">
				<h3>Testing and Deployment</h3>
				<img src="<?php echo esc_url( $img . '/case-studies/streamlive/cal-3.webp' ); ?>" width="1464" height="868" alt="Week 03 timeline" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>

<section class="main-key-features">
	<div class="container">
		<h2>Key Features</h2>
		<p>Discover Streamline Live's key features, transforming content sharing with location-based interaction and personalized engagement.</p>
		<div class="key-features-grid">
			<div class="key-features-left"></div>
			<div class="key-features-right">
				<ul>
					<li>
						<h4>Location-Based Posting</h4>
						<p>Curate personalized content feeds based on user preferences and interactions, enhancing user experience.</p>
					</li>
					<li>
						<h4>Personalized Feeds</h4>
						<p>Share content specific to your location, connecting with local users and events.</p>
					</li>
					<li>
						<h4>Content Amplification</h4>
						<p>Boost content visibility through targeted algorithms and user engagement strategies.</p>
					</li>
					<li>
						<h4>Privacy Controls</h4>
						<p>Empower users with customizable privacy settings, ensuring control over shared content and interactions.</p>
					</li>
					<li>
						<h4>Real-Time Interaction</h4>
						<p>Engage with others instantly, fostering real-time conversations and connections.</p>
					</li>
					<li>
						<h4>AI-Driven Moderation</h4>
						<p>Utilize AI algorithms to monitor and moderate user-generated content, maintaining a safe and positive community.</p>
					</li>
					<li>
						<h4>Event Integration</h4>
						<p>Seamlessly integrate with local events, providing users with event-specific updates and interactions.</p>
					</li>
					<li>
						<h4>Analytics and Insights</h4>
						<p>Provide users with detailed analytics on their content performance, aiding in strategic content creation and engagement efforts.</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="explore-main">
	<div class="container">
		<h2>Explore Streamline Live</h2>
		<p>App screens include feed, profile, notifications, events,<br> messaging, settings, and more.</p>
	</div>
	<div class="swiper explore-slider ep-slider" data-swiper='{"slidesPerView":5,"spaceBetween":20,"centeredSlides":true,"loop":true,"pagination":{"clickable":true},"breakpoints":{"1":{"slidesPerView":1,"spaceBetween":10},"400":{"slidesPerView":2,"spaceBetween":10},"500":{"slidesPerView":3,"spaceBetween":10},"768":{"slidesPerView":4,"spaceBetween":10},"1024":{"slidesPerView":5}}}'>
		<div class="swiper-wrapper">
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device1.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device2.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device3.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device4.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device5.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device1.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device2.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device3.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device4.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device5.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device1.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device2.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
			<div class="swiper-slide"><div class="slider-info"><img src="<?php echo esc_url( $img . '/case-studies/streamlive/device3.webp' ); ?>" width="394" height="831" alt="Streamline Live screen" loading="lazy" decoding="async"></div></div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</section>

<section class="solution-main">
	<div class="solution-grid">
		<div class="solution-left">
			<h2>TechnBrains<br> Path To <br>The Solution</h2>
		</div>
		<div class="solution-right">
			<div class="solution-box">
				<h4>Innovative Solutions</h4>
				<p>TechnBrains crafted cutting-edge solutions, setting new industry standards for social media platforms.</p>
			</div>
			<div class="solution-box">
				<h4>User-Centric Design</h4>
				<p>The app's user-friendly interface reflects TechnBrain's commitment to an exceptional user experience.</p>
			</div>
			<div class="solution-box">
				<h4>Efficient Integration</h4>
				<p>Seamless integration of Firebase and SendGrid showcases TechnBrain's technical prowess.</p>
			</div>
			<div class="solution-box">
				<h4>Reliable Performance</h4>
				<p>The app's stability and responsiveness attest to TechnBrain's dedication to quality development.</p>
			</div>
			<div class="solution-box">
				<h4>Security Excellence</h4>
				<p>TechnBrain's robust data encryption ensures user data is kept safe and secure.</p>
			</div>
			<div class="solution-box">
				<h4>Timely Delivery</h4>
				<p>The project was delivered promptly, highlighting TechnBrain's commitment to client satisfaction and project deadlines.</p>
			</div>
		</div>
	</div>
</section>
