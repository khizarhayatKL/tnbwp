<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';

$android_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor" width="20" height="20" aria-hidden="true"><path d="M420.55 301.93a24 24 0 1 1 24-24 24 24 0 0 1-24 24m-265.1 0a24 24 0 1 1 24-24 24 24 0 0 1-24 24m273.7-144.48 47.94-83a10 10 0 1 0-17.27-10l-48.54 84.07a301.25 301.25 0 0 0-246.56 0L116.18 64.45a10 10 0 1 0-17.27 10l47.94 83C64.53 202.22 8.24 285.55 0 384h576c-8.24-98.45-64.54-181.78-146.85-226.55"/></svg>';

$arrow_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="16" height="16" aria-hidden="true"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"/></svg>';

?>

<!-- Section 1: Banner -->
<section class="soccerfy-sec1">
	<div class="container">
		<?php tnb_breadcrumb_html(); ?>
		<div class="soc-main">
			<div class="prev-btn">
				<a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>">
					<?php echo $arrow_svg; ?> All Projects
				</a>
			</div>
			<div class="banner-info">
				<img src="<?php echo esc_url( $img . '/case-studies/soccerfy/banner-top.webp' ); ?>" width="202" height="134" alt="Soccerfy logo" loading="eager" decoding="async">
				<p>The right solution for big-time soccer bettors!</p>
				<a href="https://play.google.com/store/apps/details?id=com.soccerfy&amp;hl=en&amp;gl=US" target="_blank" rel="noopener noreferrer">
					<?php echo $android_svg; ?> get apk
				</a>
			</div>
		</div>
	</div>
</section>

<!-- Section 2: This is Soccerfy -->
<section class="soccerfy-sec2">
	<div class="container">
		<div class="soccerfy-grid">
			<div class="left-info">
				<img src="<?php echo esc_url( $img . '/case-studies/soccerfy/section1-phone.webp' ); ?>" width="485" height="1012" alt="Soccerfy app screen" loading="lazy" decoding="async">
			</div>
			<div class="right-info">
				<h5 class="num-circle">01</h5>
				<h2>THIS IS SOCCERFY</h2>
				<p>Soccerfy is a unique betting-app platform that allows soccer bettors to have a thrilling betting experience and yield huge profits.</p>
			</div>
		</div>
	</div>
</section>

<!-- Section 3: Stay Updated -->
<section class="soccerfy-sec3">
	<div class="container">
		<div class="stay-grid">
			<div class="left-info">
				<ul>
					<li class="soc_icon1">
						<span><img src="<?php echo esc_url( $img . '/case-studies/soccerfy/section3-icons-1.webp' ); ?>" width="100" height="100" alt="Calendar" loading="lazy" decoding="async"></span>
						<p>CALANDER</p>
					</li>
					<li class="soc_icon2">
						<span><img src="<?php echo esc_url( $img . '/case-studies/soccerfy/section3-icons-2.webp' ); ?>" width="100" height="100" alt="My Matches" loading="lazy" decoding="async"></span>
						<p>MY MATCHES</p>
					</li>
					<li class="soc_icon3">
						<span><img src="<?php echo esc_url( $img . '/case-studies/soccerfy/section3-icons-3.webp' ); ?>" width="100" height="100" alt="Search" loading="lazy" decoding="async"></span>
						<p>SEARCH</p>
					</li>
					<li class="soc_icon4">
						<span><img src="<?php echo esc_url( $img . '/case-studies/soccerfy/section3-icons-4.webp' ); ?>" width="100" height="100" alt="Live Streaming" loading="lazy" decoding="async"></span>
						<p>LIVE STREAMING</p>
					</li>
					<li class="soc_icon5">
						<span><img src="<?php echo esc_url( $img . '/case-studies/soccerfy/section3-icons-5.webp' ); ?>" width="100" height="100" alt="Competitions" loading="lazy" decoding="async"></span>
						<p>COMPETITIONS</p>
					</li>
				</ul>
			</div>
			<div class="right-info">
				<div class="soccerfy-sec3-wrap">
					<h5 class="num-circle">02</h5>
					<h2>STAY UPDATED 24/7 THROUGH THIS APP</h2>
					<p>It's a great platform to look for real-time scoring updates, alerts and the latest news info. Moreover, it provides very quick updates to keep the punters in the loop so that they don't miss out on any info. If you're a big-time bettor, then this is an incredible app to add to your stock!</p>
					<img src="<?php echo esc_url( $img . '/case-studies/soccerfy/phone-2.webp' ); ?>" width="351" height="751" alt="Soccerfy phone" loading="lazy" decoding="async">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section 4: Interactive Interface -->
<section class="soccerfy-sec4">
	<div class="container">
		<div class="soccerfy-sec4-wrap">
			<div class="app-info">
				<h5 class="num-circle">03</h5>
				<h2>INTERACTIVE INTERFACE</h2>
				<p>The app is not overly complexed and has a simple and user-friendly interface. With just a single swipe, the bettors can easily add their favorite bets and can also engage and compete with other fellow members.</p>
			</div>
		</div>
		<img src="<?php echo esc_url( $img . '/case-studies/soccerfy/phone-3.webp' ); ?>" width="1190" height="952" alt="Soccerfy interface" loading="lazy" decoding="async">
	</div>
</section>

<!-- Section 5: Logo Design -->
<section class="soccerfy-sec5">
	<div class="container">
		<div class="soccerfy-sec5-wrap">
			<div class="design-info">
				<h5 class="num-circle">04</h5>
				<h2>JOURNEY STARTED WITH A LOGO DESIGN</h2>
				<p>We started off with the logo design and have been playing with the design ideas we wanted to implement and finally came up with an innovative design solution that was meeting the ongoing needs of the brand and demonstrating the recognizable representation of their services.</p>
			</div>
		</div>
		<div class="main-img">
			<img src="<?php echo esc_url( $img . '/case-studies/soccerfy/section7-img.webp' ); ?>" width="899" height="834" alt="Soccerfy logo design" loading="lazy" decoding="async">
		</div>
	</div>
</section>

<!-- Section 6: Typeface -->
<section class="soccerfy-sec6">
	<div class="container">
		<div class="space">
			<h5 class="num-circle">05</h5>
			<h2>AND MOVE FORWORD WITH A BEAUTIFUL TYPEFACE</h2>
			<p>We have carefully crafted typography by using elements in a way that they enhance readability and give an aesthetically visual effect. With the right fonts, we have infused positive vibes and delivered a delightful user-experience.</p>
			<div class="soccerfy-sec6-wrap">
				<h2>Poppins Bold - <span>Poppins Regular</span></h2>
				<h3>Poppins Medium - <span>Poppins Light</span></h3>
				<h4>Poppins Extra Light - <span>Poppins Thin</span></h4>
			</div>
		</div>
	</div>
</section>

<!-- Section 7: Result -->
<section class="soccerfy-sec7">
	<div class="container">
		<h5 class="num-circle">06</h5>
		<h2>RESULT?</h2>
		<h6>It was overwhelming!</h6>
		<img src="<?php echo esc_url( $img . '/case-studies/soccerfy/banner-top.webp' ); ?>" width="202" height="134" alt="Soccerfy logo" loading="lazy" decoding="async">
		<p>Download Apk</p>
		<a href="https://play.google.com/store/apps/details?id=com.soccerfy&amp;hl=en&amp;gl=US" target="_blank" rel="noopener noreferrer">
			<?php echo $android_svg; ?> get apk
		</a>
	</div>
</section>
