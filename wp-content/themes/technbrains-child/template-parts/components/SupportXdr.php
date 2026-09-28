<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
?>

<section class="xdr-main-banner-sec <?php echo esc_attr( get_query_var( 'component_modifier_classes' ) ); ?>">
	<div class="container">
		<div class="banner-grid">
			<div class="left-info">
				<?php tnb_breadcrumb_html(); ?>
				<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/Logo.png' ); ?>" width="240" height="65" alt="Support XDR logo" loading="eager" decoding="async">
				<h2>Empower your web browsing experience</h2>
				<p>Support XDR – the ultimate solution for intelligent bookmark management and automated keyword crawling</p>
				<div class="tech-grid">
					<div class="tech-info">
						<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/online-shopping.png' ); ?>" width="46" height="46" alt="Built On" loading="lazy" decoding="async">
						<div class="tech-details">
							<h4>Built On</h4>
							<p>Node JS, MySQL, React JS</p>
						</div>
					</div>
					<div class="tech-info">
						<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/map.png' ); ?>" width="46" height="46" alt="Industry" loading="lazy" decoding="async">
						<div class="tech-details">
							<h4>Industry</h4>
							<p>Web Application</p>
						</div>
					</div>
					<div class="tech-info">
						<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/cpu.png' ); ?>" width="46" height="46" alt="Region" loading="lazy" decoding="async">
						<div class="tech-details">
							<h4>Region</h4>
							<p>USA</p>
						</div>
					</div>
					<div class="tech-info">
						<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/integration.png' ); ?>" width="46" height="46" alt="Integrations" loading="lazy" decoding="async">
						<div class="tech-details">
							<h4>Integrations</h4>
							<p>SendGrid</p>
						</div>
					</div>
				</div>
			</div>
			<div class="right-img">
				<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/banner-right.webp' ); ?>" width="960" height="760" alt="Support XDR app" loading="eager" decoding="async">
			</div>
		</div>
	</div>
</section>

<section class="intro-main-ser">
	<div class="container">
		<h4>Introduction</h4>
		<h2>Intelligent Bookmark Management</h2>
		<p>Revolutionizing Bookmark Management with AI-Driven Web Extensions</p>
		<div class="intro-grid">
			<div class="intro-left">
				<h4>What is</h4>
				<h2>Support XDR</h2>
				<p>Support XDR is a web extension that improves the web browsing experience by enabling users to crawl and filter web content based on specific keywords. The extension focuses on three primary keywords: 'knowledgebase,' 'Chat,' and 'support.' These keywords indicate webpages that contain valuable information related to customer service, user support, and knowledge sharing.</p>
				<div class="btn-grid">
					<button type="button">Download for Chrome</button>
					<button type="button">Download for Edge</button>
					<button type="button">Download for Firefox</button>
					<button type="button">Download for Brave</button>
				</div>
			</div>
			<div class="intro-right">
				<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/about-right.webp' ); ?>" width="1126" height="955" alt="Support XDR introduction" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>

<section class="how-it-works-banner">
	<div class="container">
		<div class="how-it-grid">
			<div class="project-info">
				<h4>Problem Statement</h4>
				<p>Managing web bookmarks efficiently is a challenge. Users often struggle to organize and access valuable online resources, leading to productivity bottlenecks and information overload.</p>
			</div>
			<div class="project-info">
				<h4>Project Goals</h4>
				<ul>
					<li><b>Simplify Bookmark Management:</b> Our primary goal is to provide users with a straightforward and powerful tool to manage their web bookmarks effortlessly.</li>
					<li><b>Enhance Browsing Experience:</b> We aim to enhance the overall browsing experience by introducing intelligent keyword crawling and user-driven actions.</li>
					<li><b>Boost Productivity:</b> Support XDR intends to help users increase productivity by efficiently categorizing and retrieving their saved web content.</li>
				</ul>
			</div>
			<div class="project-info">
				<h4>Project Objectives</h4>
				<ul>
					<li>Develop a user-friendly browser extension for Chrome, MS Edge, Opera, and Firefox.</li>
					<li>Implement a smart keyword crawling algorithm to identify relevant content.</li>
					<li>Create a seamless user interface for saving, categorizing, and accessing bookmarks.</li>
					<li>Offer prompt actions to users when relevant keywords are detected.</li>
					<li>Develop an admin panel for managing extension users and configurations.</li>
				</ul>
			</div>
			<div class="project-info">
				<h4>Target Audience</h4>
				<ul>
					<li><b>Knowledge Workers:</b> Professionals who rely heavily on web resources for research, content curation, and staying up-to-date.</li>
					<li><b>Students:</b> Those seeking an effective way to organize study materials and research findings.</li>
					<li><b>Content Curators:</b> Individuals managing online content for blogs, websites, or social media.</li>
					<li><b>Tech Enthusiasts:</b> Users who frequently explore the web for technology-related updates and information.</li>
					<li><b>Business Professionals:</b> Entrepreneurs, marketers, and business owners in need of efficient bookmark management for competitive insights.</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="how-it-work-two">
		<h2>How It Works?</h2>
		<div class="it-work-content">
			<div class="container">
				<div class="content-grid">
					<div class="work-content">
						<h4>Install the Extension</h4>
						<p>Begin by installing the Support XDR browser extension, compatible with Chrome, MS Edge, Opera, and Firefox. It's a seamless process that takes only a few seconds.</p>
					</div>
					<div class="work-content">
						<h4>Smart Keyword Crawling</h4>
						<p>As you browse the web, Support XDR's intelligent algorithm continuously scans all URLs for specific keywords like 'knowledgebase,' 'Chat,' and 'support.' It's like having a personal web crawler that identifies relevant content.</p>
					</div>
					<div class="work-content">
						<h4>Prompted Actions</h4>
						<p>When Support XDR detects a keyword match, it prompts you with actions. You can choose to save the URL for future reference or ignore it if it doesn't pertain to your interests.</p>
					</div>
					<div class="work-content">
						<h4>Powerful Bookmark Management</h4>
						<p>Your saved URLs are neatly organized and easily accessible within the extension. Be your own bookmark AI, effortlessly managing your valuable web resources for quick retrieval and reference.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="xdr-explore-main">
	<h2>EXPLORE OUR TOOL</h2>
	<div class="powerful-book-banner before-shadow">
		<div class="container">
			<div class="explore-grid">
				<div class="ex-left">
					<h2>Powerful Bookmark <br> Management</h2>
					<p>Support XDR offers robust bookmark management, enabling you to save, categorize, and access your favorite web content effortlessly. Organize your digital resources with ease and enhance productivity.</p>
				</div>
				<div class="ex-right">
					<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/pbm.webp' ); ?>" width="1920" height="1080" alt="Powerful Bookmark Management" loading="lazy" decoding="async">
				</div>
			</div>
		</div>
	</div>
	<div class="smart-key-banner before-shadow">
		<div class="container">
			<div class="explore-grid flex-rev">
				<div class="ex-left">
					<h2>Smart Keyword <br> Crawling</h2>
					<p>Our intelligent keyword crawling feature scans web content for specific keywords, like 'knowledgebase,' 'Chat,' and 'support.' It ensures you stay updated with relevant information while browsing.</p>
				</div>
				<div class="ex-right">
					<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/skc.webp' ); ?>" width="1000" height="945" alt="Smart Keyword Crawling" loading="lazy" decoding="async">
				</div>
			</div>
		</div>
	</div>
	<div class="seamless-banner before-shadow">
		<div class="container">
			<div class="explore-grid">
				<div class="ex-left">
					<h2>Seamless Browser <br> Integration</h2>
					<p>Experience uninterrupted browsing with Support XDR's seamless integration into popular web browsers like Chrome, MS Edge, Opera, and Firefox. Enjoy a cohesive web extension experience across platforms.</p>
				</div>
				<div class="ex-right">
					<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/sbi.webp' ); ?>" width="845" height="660" alt="Seamless Browser Integration" loading="lazy" decoding="async">
				</div>
			</div>
		</div>
	</div>
	<div class="be-your-banner">
		<div class="container">
			<div class="explore-grid flex-rev">
				<div class="ex-left">
					<h2>Be Your <br> Own Bookmark AI</h2>
					<p>With Support XDR, you become the curator of your web content. Save, manage, and retrieve bookmarks efficiently, tailored to your interests, making you your own personalized AI for web resources.</p>
				</div>
				<div class="ex-right">
					<img src="<?php echo esc_url( $img . '/case-studies/support-xdr/byobai.webp' ); ?>" width="490" height="380" alt="Be Your Own Bookmark AI" loading="lazy" decoding="async">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="browser-ext-main">
	<div class="container">
		<h2>GET SUPPORTXDR BROWSER<br>EXTENSION TODAY!</h2>
		<p>Why wait? Enhance your browsing experience with this Intelligent bookmarking tool and scan keywords that matter the most!</p>
		<div class="browser-button-grid">
			<button type="button">Download for Chrome</button>
			<button type="button">Download for Edge</button>
			<button type="button">Download for Firefox</button>
			<button type="button">Download for Brave</button>
		</div>
	</div>
</section>
