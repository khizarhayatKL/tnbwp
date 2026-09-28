<?php
defined( 'ABSPATH' ) || exit;

$data         = get_query_var( 'component_data' );
$d            = $data['cruze4cash'] ?? array();
$img          = get_stylesheet_directory_uri() . '/assets/images';
$mod          = get_query_var( 'component_modifier_classes', '' );
$play_link    = $d['play_store_link'] ?? 'https://play.google.com/store/apps/details?id=com.cruze4cash';
?>

<!-- Section 1: Banner -->
<section class="cruze-sec-1<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="prev-btn">
		<a href="/case-studies/">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"/></svg>
			All Projects
		</a>
	</div>
	<div class="container">
		<div class="banner-grid">
			<div class="left-info">
				<?php tnb_breadcrumb_html(); ?>
				<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/cruze-logo.png' ); ?>" width="317" height="98" alt="Cruze4Cash logo" loading="eager" decoding="async">
				<h3>Explore new ways to look for properties</h3>
				<a href="<?php echo esc_url( $play_link ); ?>" target="_blank" rel="noopener noreferrer">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor" aria-hidden="true"><path d="M420.55,301.93a24,24,0,1,1,24-24,24,24,0,0,1-24,24m-265.1,0a24,24,0,1,1,24-24,24,24,0,0,1-24,24m273.7-144.48,47.94-83a10,10,0,1,0-17.27-10h0l-48.54,84.07a301.25,301.25,0,0,0-246.56,0L116.18,64.45a10,10,0,1,0-17.27,10h0l47.94,83C64.53,202.22,8.24,285.55,0,384H576c-8.24-98.45-64.54-181.78-146.85-226.55"/></svg>
					Get APK
				</a>
			</div>
			<div class="right-info">
				<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/cruze-img-1.png' ); ?>" width="343" height="738" alt="Cruze4Cash app screen" loading="eager" decoding="async">
			</div>
		</div>
	</div>
</section>

<!-- Section 2: The Challenges -->
<section class="cruze-sec-2">
	<div class="container">
		<div class="challenge-grid">
			<div class="left-info">
				<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/cruze-img-2.png' ); ?>" width="590" height="572" alt="The Challenges" loading="lazy" decoding="async">
			</div>
			<div class="right-info">
				<h3>The Challenges</h3>
				<p>Since, there is fierce competition in the property finder app industry. Therefore, we wanted to build an app that stands out from the rest. We were under constant pressure to create an innovative app that people actually want and pull something out of it. By delving deeper, we figured out how we can make users engaged for longer and finally came up with a one-stop solution.</p>
			</div>
		</div>
	</div>
</section>

<!-- Section 3: User Experience -->
<section class="cruze-sec-3">
	<div class="container">
		<h3>User Experience</h3>
		<p>Cruze4cash is a feature-rich property finder app, where it offers users a platform to pull properties and owner information instantly and enables motivated sellers to reach out to them in no time and in a hassle-free way ensuring a pleasant user-experience.</p>
	</div>
</section>

<!-- Section 4: Branding -->
<section class="cruze-sec-4">
	<div class="container">
		<h3>Branding</h3>
		<p>With minimal design elements and colors, the app brings simplicity and looks visually appealing to the eyes. It's additional functionalities not only enhance the user-experience but also create a connection between a brand and the visitor and establishes a favorable brand image.</p>
		<div class="img-grid">
			<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/cruze-net-1.png' ); ?>" width="363" height="122" alt="Branding element 1" loading="lazy" decoding="async">
			<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/cruze-net-2.png' ); ?>" width="363" height="122" alt="Branding element 2" loading="lazy" decoding="async">
			<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/cruze-net-3.png' ); ?>" width="363" height="122" alt="Branding element 3" loading="lazy" decoding="async">
		</div>
		<div class="mid-img">
			<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/cruze-net-4.png' ); ?>" width="363" height="122" alt="Branding element 4" loading="lazy" decoding="async">
		</div>
		<div class="last-img">
			<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/cruze-net-5.png' ); ?>" width="809" height="271" alt="Branding element 5" loading="lazy" decoding="async">
		</div>
	</div>
</section>

<!-- Section 5: Base (Colors, Typography, Hierarchy) -->
<section class="cruze-sec-5">
	<div class="container">
		<h3>Base</h3>
		<p>Color palette, typography, Font size Etc....</p>
		<div class="base-grid">
			<div class="base-box">
				<div class="circle">
					<h4><span>Visuals</span># 1eaf62</h4>
				</div>
			</div>
			<div class="base-box">
				<div class="circle black">
					<h4><span>Fonts</span># 000000</h4>
				</div>
			</div>
			<div class="base-box">
				<div class="circle grey">
					<h4><span>Fonts</span># 0bd769</h4>
				</div>
			</div>
		</div>
		<div class="head">
			<h3>Typography</h3>
		</div>
		<div class="typo-main">
			<div class="typo one">
				<h4>Poppins Bold</h4>
				<h4>ABCDEFGHIJKLMNOPQRSTUVWXYZ</h4>
				<h4>1234567890</h4>
			</div>
			<div class="typo two">
				<h4>Poppins Semibold</h4>
				<h4>ABCDEFGHIJKLMNOPQRSTUVWXYZ</h4>
				<h4>1234567890</h4>
			</div>
			<div class="typo three">
				<h4>Poppins Regular</h4>
				<h4>ABCDEFGHIJKLMNOPQRSTUVWXYZ</h4>
				<h4>1234567890</h4>
			</div>
			<div class="typo four">
				<h4>Poppins Light</h4>
				<h4>ABCDEFGHIJKLMNOPQRSTUVWXYZ</h4>
				<h4>1234567890</h4>
			</div>
		</div>
		<div class="head">
			<h3>Font Size Hierarchy</h3>
		</div>
		<div class="hierarchy">
			<div class="Hier one">
				<h4>H1 - Poppins Bold (36 px)</h4>
			</div>
			<div class="Hier two">
				<h4>H2 - Poppins Semi Bold (28 px)</h4>
			</div>
			<div class="Hier three">
				<h4>H3 - Poppins Medium (24 px)</h4>
			</div>
			<div class="Hier four">
				<h4>H4 - Poppins Regular (20 px)</h4>
			</div>
		</div>
	</div>
</section>

<!-- Section 6: App Screens -->
<section class="cruze-sec-6">
	<div class="container">
		<div class="secure-info">
			<h3>Secure Login</h3>
			<p>Most users are security concerned and their mobiles are already jam-packed with fingerprint recognition and patterns etc. With a simplistic login design, Cruze4cash lets user login through their user id and helps them find exactly what they need keeping their privacy in mind.</p>
		</div>
		<div class="secure-info">
			<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/screen-1.png' ); ?>" width="1029" height="612" alt="Secure Login screen" loading="lazy" decoding="async">
		</div>
		<div class="secure-info">
			<h3>Navigate To Property</h3>
			<p>It's highly efficient navigation system guides users directly to the app functions and allows them to quickly look for the information they are searching for. Moreover, the app is designed in a way that it gives a smooth browsing experience.</p>
		</div>
		<div class="secure-info">
			<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/screen-2.png' ); ?>" width="994" height="590" alt="Navigate To Property screen" loading="lazy" decoding="async">
		</div>
		<div class="secure-info">
			<h3>Find Detailed Property</h3>
			<p>Cruze4cash not only allows users to find whether the property is vacant or occupied but also provides the access to detailed information about the property the user might need on the go. The user can easily track down the details within a short span of time.</p>
		</div>
		<div class="secure-info">
			<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/screen-3.png' ); ?>" width="1024" height="607" alt="Find Detailed Property screen" loading="lazy" decoding="async">
		</div>
	</div>
</section>

<!-- Section 7: Solution -->
<section class="cruze-sec-7">
	<div class="container">
		<h3>Solution</h3>
		<p>Hunting for properties can be a tiring job! Cruze4cash is an app that helps you find the perfect property and quickens up your reach to the largest and most active buyers, landlords and sellers without a hitch.</p>
	</div>
	<img src="<?php echo esc_url( $img . '/case-studies/cruze4cash/cruze-bg-5.jpg' ); ?>" width="1900" height="1117" alt="Cruze4Cash solution" loading="lazy" decoding="async">
</section>
