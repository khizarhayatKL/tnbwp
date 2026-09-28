<?php
defined( 'ABSPATH' ) || exit;

$mod  = get_query_var( 'component_modifier_classes', '' );
$base = get_stylesheet_directory_uri() . '/assets/images';

$circumference = 289.02652413026095;
$bars = array(
	array( 'target' => 60, 'label' => 'of online experiences begin with a search engine' ),
	array( 'target' => 75, 'label' => 'of people never scroll past the first page of results' ),
	array( 'target' => 60, 'label' => 'of users research a product before making a purchase' ),
);
?>
<section class="seoRightPlatform<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="rp-info">
			<h4>Transform Your Website</h4>
			<h2>With Our Best SEO Practices!</h2>
			<p>Take your website to new heights with TechnBrains SEO Services and leave your competition in the dust.</p>
			<div class="rp-content-grid">
				<div class="rp-content-info">
					<h5>Dominate Search Results</h5>
					<p>Our experts will identify the most relevant and high-performing keywords for your industry and social media marketing ensuring that your website ranks at the top of search engine results pages (SERPs).</p>
				</div>
				<div class="rp-content-info">
					<h5>Engage, Inform, Convert</h5>
					<p>Content is king, and we know how to make it reign supreme. Our SEO Services will create compelling, informative, and shareable content that captivates your audience.</p>
				</div>
				<div class="rp-content-info">
					<h5>Optimize for Peak Performance</h5>
					<p>Leave the technical complexities to us. Our experts will fine-tune your website's technical aspects, optimizing loading speed, mobile responsiveness, and site structure.</p>
				</div>
				<div class="rp-content-info">
					<h5>Boost Authority and Trust</h5>
					<p>Forge strong alliances with authoritative websites in your industry and watch as your rankings soar and your online presence expands.</p>
				</div>
				<div class="rp-content-info">
					<h5>Analyze, Adapt, Excel</h5>
					<p>No guesswork here, with our data-driven approach, your website will continuously evolve to stay ahead of the competition with our SEO Services.</p>
				</div>
			</div>
			<div class="rp-before-arrow"></div>
		</div>
		<div class="rp-searches-main">
			<div class="rp-searches-info">
				<h2>60,000+ Searches</h2>
				<h4>Happen Each Second</h4>
				<p>In 2023, SEO is not about ranking for popular terms; it's about being found when it matters most. Our skilled search engine optimization experts carefully research the right keywords for your business, ensuring you are gaining qualified traffic that converts to your bottom line.</p>
			</div>
			<div class="rp-progress-main" data-progress-section>
				<?php foreach ( $bars as $bar ) : ?>
				<div class="rp-progressbar">
					<svg
						class="CircularProgressbar rp-progress-svg"
						viewBox="0 0 100 100"
						data-progress-circle
						data-target="<?php echo esc_attr( $bar['target'] ); ?>"
						aria-label="<?php echo esc_attr( $bar['target'] ); ?>% — <?php echo esc_attr( $bar['label'] ); ?>"
					>
						<path
							class="CircularProgressbar-trail"
							d="M 50,50 m 0,-46 a 46,46 0 1 1 0,92 a 46,46 0 1 1 0,-92"
							stroke-width="8"
							fill-opacity="0"
							style="stroke: transparent; stroke-dasharray: 289.027px, 289.027px; stroke-dashoffset: 0px;"
						/>
						<path
							class="CircularProgressbar-path"
							d="M 50,50 m 0,-46 a 46,46 0 1 1 0,92 a 46,46 0 1 1 0,-92"
							stroke-width="8"
							fill-opacity="0"
							style="stroke: #ff0000; stroke-dasharray: <?php echo esc_attr( $circumference ); ?>px, <?php echo esc_attr( $circumference ); ?>px; stroke-dashoffset: <?php echo esc_attr( $circumference ); ?>px;"
						/>
						<text
							class="CircularProgressbar-text"
							x="50" y="50"
							dominant-baseline="central"
							text-anchor="middle"
							style="fill: #fff;"
						>0%</text>
					</svg>
					<p><?php echo esc_html( $bar['label'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
