<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );

$screen_list = array(
	'/case-studies/tatt-ai/slide1.png',
	'/case-studies/tatt-ai/slide2.png',
	'/case-studies/tatt-ai/slide3.png',
	'/case-studies/tatt-ai/slide4.png',
	'/case-studies/tatt-ai/slide5.png',
	'/case-studies/tatt-ai/slide1.png',
	'/case-studies/tatt-ai/slide2.png',
	'/case-studies/tatt-ai/slide3.png',
	'/case-studies/tatt-ai/slide4.png',
	'/case-studies/tatt-ai/slide5.png',
	'/case-studies/tatt-ai/slide1.png',
	'/case-studies/tatt-ai/slide2.png',
	'/case-studies/tatt-ai/slide3.png',
	'/case-studies/tatt-ai/slide4.png',
	'/case-studies/tatt-ai/slide5.png',
);

$intro_slider = array(
	array( 'src' => '/case-studies/tatt-ai/slide-int-1.png',    'ext' => 'png' ),
	array( 'src' => '/case-studies/tatt-ai/slide-int-2.webp',   'ext' => 'webp' ),
	array( 'src' => '/case-studies/tatt-ai/slide-int-3.webp',   'ext' => 'webp' ),
	array( 'src' => '/case-studies/tatt-ai/slide-int-4.webp',   'ext' => 'webp' ),
	array( 'src' => '/case-studies/tatt-ai/slide-int-5-t.webp', 'ext' => 'webp' ),
);

$tatt_list = array(
	array( 'src' => '/case-studies/tatt-ai/list-1.png', 'title' => 'Build For',    'desc' => 'Android/iOS',                                                            'number' => '01' ),
	array( 'src' => '/case-studies/tatt-ai/list-2.png', 'title' => 'Industry',     'desc' => 'Tattoo and Art',                                                         'number' => '02' ),
	array( 'src' => '/case-studies/tatt-ai/list-3.png', 'title' => 'Country',      'desc' => 'United States',                                                          'number' => '03' ),
	array( 'src' => '/case-studies/tatt-ai/list-4.png', 'title' => 'Technology',   'desc' => 'ReactNative, .Net',                                                      'number' => '04' ),
	array( 'src' => '/case-studies/tatt-ai/list-5.png', 'title' => 'Integrations', 'desc' => 'MidJourney, Google Cloud, LLM, Text-to-Image Generation',               'number' => '05' ),
);

$feature_list = array(
	array( 'src' => '/case-studies/tatt-ai/feat-c-1.png', 'title' => "Tattoo <br> Generation",      'para' => 'AI-driven designs based on user prompts.' ),
	array( 'src' => '/case-studies/tatt-ai/feat-c-2.png', 'title' => "Tattoo <br> Wizard",          'para' => 'An intuitive tool powered by AI prompt engineering.' ),
	array( 'src' => '/case-studies/tatt-ai/feat-c-3.png', 'title' => "On-Hand <br> Placement",      'para' => 'Visualizing tattoos on virtual hands or other body parts.' ),
	array( 'src' => '/case-studies/tatt-ai/feat-c-5.png', 'title' => "Design <br> Customization",   'para' => 'Tailoring designs to customer preferences.' ),
	array( 'src' => '/case-studies/tatt-ai/feat-c-6.png', 'title' => "Artist <br> Interface",       'para' => 'Profiles for artists to showcase services and interact with clients.' ),
	array( 'src' => '/case-studies/tatt-ai/feat-c-1.png', 'title' => "Tattoo <br> Generation",      'para' => 'AI-driven designs based on user prompts.' ),
	array( 'src' => '/case-studies/tatt-ai/feat-c-2.png', 'title' => "Tattoo <br> Wizard",          'para' => 'An intuitive tool powered by AI prompt engineering.' ),
	array( 'src' => '/case-studies/tatt-ai/feat-c-3.png', 'title' => "On-Hand <br> Placement",      'para' => 'Visualizing tattoos on virtual hands or other body parts.' ),
	array( 'src' => '/case-studies/tatt-ai/feat-c-5.png', 'title' => "Design <br> Customization",   'para' => 'Tailoring designs to customer preferences.' ),
	array( 'src' => '/case-studies/tatt-ai/feat-c-6.png', 'title' => "Artist <br> Interface:",      'para' => 'Profiles for artists to showcase services and interact with clients.' ),
);

$list_swiper   = wp_json_encode( array( 'slidesPerView' => 5, 'spaceBetween' => 20, 'autoplay' => array( 'delay' => 2500, 'disableOnInteraction' => false ), 'loop' => true, 'breakpoints' => array( '320' => array( 'slidesPerView' => 1 ), '768' => array( 'slidesPerView' => 2 ), '1024' => array( 'slidesPerView' => 3 ), '1200' => array( 'slidesPerView' => 4 ), '1440' => array( 'slidesPerView' => 5 ) ) ) );
$intro_swiper  = wp_json_encode( array( 'slidesPerView' => 3, 'spaceBetween' => 20, 'autoplay' => array( 'delay' => 2500, 'disableOnInteraction' => false ), 'loop' => true, 'breakpoints' => array( '1' => array( 'slidesPerView' => 2 ), '320' => array( 'slidesPerView' => 1 ), '500' => array( 'slidesPerView' => 1 ), '768' => array( 'slidesPerView' => 3 ), '1024' => array( 'slidesPerView' => 3 ) ) ) );
$feat_swiper   = wp_json_encode( array( 'slidesPerView' => 3, 'spaceBetween' => 20, 'autoplay' => array( 'delay' => 2500, 'disableOnInteraction' => false ), 'loop' => true, 'breakpoints' => array( '1' => array( 'slidesPerView' => 1 ), '768' => array( 'slidesPerView' => 2 ), '1200' => array( 'slidesPerView' => 3 ) ) ) );
$screen_swiper = wp_json_encode( array( 'slidesPerView' => 6, 'centeredSlides' => true, 'spaceBetween' => 20, 'autoplay' => array( 'delay' => 2500, 'disableOnInteraction' => false ), 'loop' => true, 'breakpoints' => array( '1' => array( 'slidesPerView' => 1 ), '320' => array( 'slidesPerView' => 1 ), '500' => array( 'slidesPerView' => 1 ), '768' => array( 'slidesPerView' => 5 ), '1024' => array( 'slidesPerView' => 6 ) ) ) );
$flow_img_full = esc_url( $img . '/case-studies/tatt-ai/flow-tatt-ai.png' );
$flow_img_thumb = esc_url( $img . '/case-studies/tatt-ai/user-flow-2.webp' );
?>

<section class="tatt-banner <?php echo esc_attr( $mod ); ?>">
	<div class="container">
		<div class="main">
			<div class="text">
				<img src="<?php echo esc_url( $img . '/case-studies/tatt-ai/logo-2x.png' ); ?>" width="192" height="47" alt="Tatt.AI logo" loading="eager" decoding="async">
				<h2>Transforming <br> <span>Tattoo Artistry</span> with AI-Powered Innovation</h2>
				<p>Tatt.ai is a cutting-edge mobile application revolutionizing the tattoo industry by seamlessly integrating AI and creativity. Designed for tattoo artists and enthusiasts, the app leverages AI-driven text-to-image generation and intuitive customization tools to bring imaginative tattoo ideas to life. From designing tattoos to on-hand placements and direct artist connections, Tatt.ai enhances the entire tattoo creation process.</p>
				<button class="tnb-popup-trigger slideHOv">Talk to Our Experts</button>
			</div>
			<div class="image">
				<img src="<?php echo esc_url( $img . '/case-studies/tatt-ai/banner-side-tiny.webp' ); ?>" width="632" height="643" alt="Tatt.AI banner" loading="eager" decoding="async">
			</div>
		</div>
	</div>
</section>

<section class="tatt-list">
	<div class="container">
		<div class="main">
			<div class="swiper tatt-main-slider" data-swiper="<?php echo esc_attr( $list_swiper ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $tatt_list as $item ) : ?>
					<div class="swiper-slide">
						<div class="slides-here">
							<div class="icon">
								<img src="<?php echo esc_url( $img . $item['src'] ); ?>" width="37" height="37" alt="<?php echo esc_attr( $item['title'] ); ?> icon" loading="lazy" decoding="async">
							</div>
							<h4><?php echo esc_html( $item['title'] ); ?></h4>
							<p><?php echo esc_html( $item['desc'] ); ?></p>
							<h5><?php echo esc_html( $item['number'] ); ?></h5>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="tatt-intro">
	<div class="container">
		<div class="main">
			<h3>Tatt. <span>AI</span></h3>
			<p>At TechnBrains, we understand that every client has a unique vision, and Tatt.ai was no different. The client—a passionate tattoo artist with a thriving studio—sought an innovative solution to revolutionize their creative process. By integrating advanced technologies like ReactNative, .Net, and Google Cloud, our team crafted a user-friendly, AI-powered app tailored to meet the needs of artists and their customers.</p>
			<p>The app features a Tattoo Wizard that uses prompt engineering to transform user descriptions into detailed tattoo designs with MidJourney and LLM integrations. Artists and customers can visualize tattoos on a virtual "on-hand placement" tool before committing to designs, ensuring complete satisfaction.</p>
			<p>Our empathy-driven approach was key to understanding the tattoo industry's niche challenges. With in-depth research, innovative solutions, and seamless execution, TechnBrains delivered an application that exceeded client expectations, solidifying our reputation as leaders in mobile app development.</p>
		</div>
	</div>
	<div class="slider">
		<div class="swiper" data-swiper="<?php echo esc_attr( $intro_swiper ); ?>">
			<div class="swiper-wrapper">
				<?php foreach ( $intro_slider as $slide ) : ?>
				<div class="swiper-slide">
					<div class="slides-here">
						<img src="<?php echo esc_url( $img . $slide['src'] ); ?>" width="587" height="392" alt="Tatt.AI intro" loading="lazy" decoding="async">
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<section class="tatt-features">
	<div class="container">
		<div class="main">
			<h3>Key Features</h3>
			<div class="swiper tatt-features-slider" data-swiper="<?php echo esc_attr( $feat_swiper ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $feature_list as $item ) : ?>
					<div class="swiper-slide">
						<div class="slides-here">
							<div class="grid-sec">
								<div class="text">
									<h4><?php echo wp_kses( $item['title'], array( 'br' => array() ) ); ?></h4>
									<p><?php echo esc_html( $item['para'] ); ?></p>
								</div>
								<div class="image">
									<img src="<?php echo esc_url( $img . $item['src'] ); ?>" width="79" height="79" alt="feature icon" loading="lazy" decoding="async">
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="mob-img">
				<img src="<?php echo esc_url( $img . '/case-studies/tatt-ai/feat-main-tiny.webp' ); ?>" width="1244" height="614" alt="Key features" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>

<section class="tatt-results">
	<div class="container">
		<div class="main">
			<div class="text">
				<h3>Key <span>Challenges</span></h3>
				<ul>
					<li>
						<h4>Teaching AI to Create Tattoo-Ready Designs:</h4>
						<p>Developing prompt engineering models capable of understanding intricate tattoo design descriptions and generating lifelike designs required precision.</p>
					</li>
					<li>
						<h4>Seamless AI Integrations:</h4>
						<p>Ensuring smooth integration with MidJourney, LLM, and text-to-image generation tools for real-time tattoo creation was a technical hurdle.</p>
					</li>
					<li>
						<h4>Empowering Artists with Intuitive Tools:</h4>
						<p>Designing an artist interface that allowed artists to showcase their services, build profiles, and interact with clients while maintaining simplicity was critical.</p>
					</li>
					<li>
						<h4>Realistic Tattoo Placement Visualization:</h4>
						<p>Implementing a feature that accurately placed tattoos on virtual hands, arms, or bodies to give customers a realistic preview required advanced imaging solutions.</p>
					</li>
				</ul>
			</div>
			<div class="image-two">
				<img src="<?php echo esc_url( $img . '/case-studies/tatt-ai/challenge-1-tiny.webp' ); ?>" width="551" height="737" alt="Key challenges" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>

<section class="tatt-slider">
	<div class="swiper screen-slider-tatt-ai" data-swiper="<?php echo esc_attr( $screen_swiper ); ?>">
		<div class="swiper-wrapper">
			<?php foreach ( $screen_list as $slide ) : ?>
			<div class="swiper-slide">
				<div class="slides-here">
					<img src="<?php echo esc_url( $img . $slide ); ?>" width="376" height="813" alt="app screen" loading="lazy" decoding="async">
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="tatt-results results-section">
	<div class="container">
		<div class="main">
			<div class="image">
				<img src="<?php echo esc_url( $img . '/case-studies/tatt-ai/result-1-tiny.webp' ); ?>" width="551" height="737" alt="Key results" loading="lazy" decoding="async">
			</div>
			<div class="text">
				<h3>Key <span>Results</span></h3>
				<ul>
					<li>
						<h4>Exceptional Prompt Engineering:</h4>
						<p>The client was impressed with our prompt engineering solutions that transformed abstract descriptions into high-quality tattoo designs, empowering them to explore limitless creativity.</p>
					</li>
					<li>
						<h4>Enhanced Artist Efficiency:</h4>
						<p>Artists gained an intuitive platform to showcase their services, manage designs, and connect seamlessly with clients, boosting engagement by over 40% in the initial months.</p>
					</li>
					<li>
						<h4>Client Satisfaction:</h4>
						<p>The client lauded the app's seamless functionality, UI/UX design, and AI-driven capabilities, noting that the app exceeded their expectations and simplified their workflow.</p>
					</li>
					<li>
						<h4>Industry Disruption:</h4>
						<p>Tatt.ai established itself as a trailblazer in the tattoo industry by combining artistic creativity with cutting-edge AI technology.</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="tatt-main-features">
	<div class="container">
		<div class="content">
			<img src="<?php echo esc_url( $img . '/case-studies/tatt-ai/tatt-branding.webp' ); ?>" width="1242" height="750" alt="Tatt.AI branding" loading="lazy" decoding="async">
		</div>
	</div>
</section>

<section class="tatt-user-flow">
	<div class="container">
		<div class="head">
			<h3>Tatt.<span>AI User Flow</span></h3>
			<div class="content">
				<div class="flow main-fancybox">
					<a href="<?php echo $flow_img_full; ?>" data-fancybox="tatt-userflow">
						<img src="<?php echo $flow_img_thumb; ?>" width="1242" height="559" alt="Tatt.AI user flow thumbnail" loading="lazy" decoding="async">
					</a>
				</div>
				<div class="user-flow-btn">
					<button class="button">
						<p class="button__text">
							<span style="--index:0">V</span><span style="--index:1">I</span><span style="--index:2">E</span><span style="--index:3">W</span><span style="--index:4">&nbsp;</span><span style="--index:5">F</span><span style="--index:6">U</span><span style="--index:7">L</span><span style="--index:8">L</span><span style="--index:9">&nbsp;</span><span style="--index:10">U</span><span style="--index:11">S</span><span style="--index:12">E</span><span style="--index:13">R</span><span style="--index:14">F</span><span style="--index:15">L</span><span style="--index:16">O</span><span style="--index:17">W</span>
						</p>
						<div class="main-fancybox">
							<a href="<?php echo $flow_img_full; ?>" data-fancybox="tatt-userflow-btn">
								<div class="button__circle">
									<svg viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="button__icon" width="14"><path d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z" fill="currentColor"></path></svg>
									<svg viewBox="0 0 14 15" fill="none" width="14" xmlns="http://www.w3.org/2000/svg" class="button__icon button__icon--copy"><path d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z" fill="currentColor"></path></svg>
								</div>
							</a>
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="tatt-problems">
	<div class="container">
		<div class="main">
			<h3>Business <span>Problems</span></h3>
			<p>Tattoo artists often struggle to convey abstract ideas visually to clients. The client wanted to eliminate this gap by using AI to generate designs and improve customer satisfaction while creating a platform for artists to promote their services.</p>
		</div>
		<div class="grid-sec">
			<div class="image">
				<img src="<?php echo esc_url( $img . '/case-studies/tatt-ai/prob-1-tiny.webp' ); ?>" width="551" height="439" alt="Business problems" loading="lazy" decoding="async">
			</div>
			<div class="text-challenges">
				<h3>Challenges:</h3>
				<ul>
					<li>Building a robust AI-powered tattoo generation model.</li>
					<li>Streamlining the user and artist interface for effortless usability.</li>
					<li>Ensuring seamless integrations with MidJourney, Google Cloud, and other advanced technologies.</li>
				</ul>
			</div>
		</div>
		<div class="grid-sec">
			<div class="text-challenges">
				<h3>Key Results:</h3>
				<ul>
					<li>Successfully delivered a state-of-the-art AI-powered app with user-friendly features.</li>
					<li>Received praise from the client for our prompt engineering expertise and design approach.</li>
					<li>Positioned the client as an innovator in the tattoo industry.</li>
				</ul>
			</div>
			<div class="image-key">
				<img src="<?php echo esc_url( $img . '/case-studies/tatt-ai/key-1-tiny.webp' ); ?>" width="551" height="439" alt="Key results" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>

<section class="tatt-revolution">
	<div class="container">
		<div class="main">
			<div class="text">
				<h3>Want to revolutionize your industry with innovative mobile solutions? Let TechnBrains bring your ideas to life!</h3>
				<a href="/contact-us/" class="white-black slideHOv">Contact Us Today</a>
			</div>
		</div>
	</div>
</section>
