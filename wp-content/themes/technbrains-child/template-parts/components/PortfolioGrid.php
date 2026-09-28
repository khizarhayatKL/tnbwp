<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>
<div class="main-wrapper-container main-fancybox<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">

	<section class="main-masonry-grid">
		<div class="grid-item big-3">
			<a href="<?php echo esc_url( home_url( '/case-studies/the-wedding-app/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/wedding.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay case-study-icon">
					<img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/wedding-app.png' ); ?>" width="209" height="100" alt="Wedding App logo" loading="lazy" decoding="async">
				</div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/the-wedding-app/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="#">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/y-drive.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay case-study-icon">
					<img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/y-drive.png' ); ?>" width="106" height="112" alt="Y Drive logo" loading="lazy" decoding="async">
				</div>
			</a>
			<div class="view-more--case"><a href="#">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="grid-item big">
			<a href="<?php echo esc_url( home_url( '/case-studies/tatt-ai/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/tatt.webp' ); ?>" alt="Tatt AI" loading="lazy" decoding="async">
				<div class="overlay case-study-icon">
					<img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/tatt.png' ); ?>" width="192" height="47" alt="Tatt AI logo" loading="lazy" decoding="async">
				</div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/tatt-ai/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="#">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/village.webp' ); ?>" alt="Village" loading="lazy" decoding="async">
				<div class="overlay case-study-icon">
					<img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/village.png' ); ?>" width="192" height="47" alt="Village logo" loading="lazy" decoding="async">
				</div>
			</a>
			<div class="view-more--case"><a href="#">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
	</section>

	<section class="first-grid">
		<div class="grid-item web-view">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-1.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-1.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/mw.png' ); ?>" width="175" height="146" alt="Marquita Waters" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://marquitawaters.com/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="grid-item web-view">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-2.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-2.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/draw.png' ); ?>" width="355" height="113" alt="I Heard You Can Draw" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://iheardyoucandraw.com/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="grid-item web-view">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-3.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-3.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/p-logo-2.png' ); ?>" width="355" height="83" alt="Kifaru" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://kifaru.net/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="grid-item web-view">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-4.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-4.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/amt.png' ); ?>" width="341" height="83" alt="AMT" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://americanmadetactical.com/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
	</section>

	<section class="main-masonry-grid">
		<div class="grid-item wide">
			<a href="<?php echo esc_url( home_url( '/case-studies/fixcarsharer/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/fix-car.webp' ); ?>" alt="Fix Car Sharer" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/fixcar.png' ); ?>" width="211" height="168" alt="FixCar logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/fixcarsharer/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-5.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-5.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/jewelry.png' ); ?>" width="255" height="52" alt="Jewelry" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://dontquityourdaydreams.com/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="grid-item big">
			<a href="<?php echo esc_url( home_url( '/case-studies/built-by-determination/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/bbd.webp' ); ?>" alt="Built By Determination" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/bbd.png' ); ?>" width="303" height="204" alt="BBD logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/built-by-determination/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-6.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-6.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/p-logo-7.png' ); ?>" width="215" height="93" alt="Airhart" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="http://www.airharttrading.com/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-7.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-7.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/generationbroadcasting.png' ); ?>" width="221" height="95" alt="Generation Broadcasting" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://generationsbroadcasting.com/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-8.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-8.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/p-logo-28.png' ); ?>" width="228" height="52" alt="Good Filter" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://goodfiltercompany.com/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-9.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-9.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/p-logo-27.png' ); ?>" width="213" height="52" alt="Immunacy" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://immunacy.com/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-10.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-10.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/james.png' ); ?>" width="209" height="89" alt="James" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://www.baslawgroup.com/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="grid-item big">
			<a href="<?php echo esc_url( home_url( '/case-studies/fitforgolf/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/golf.webp' ); ?>" alt="Fit For Golf" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/golf2.png' ); ?>" width="303" height="204" alt="Golf logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/fitforgolf/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-11.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-11.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/khoja-logo.png' ); ?>" width="172" height="107" alt="Khoja" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://www.khojaleadershipforum.org/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-12.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-12.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/altasLogo.png' ); ?>" width="187" height="107" alt="Altas" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://altastoneindustries.com/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-13.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-13.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/happy.png' ); ?>" width="187" height="107" alt="Happy Place" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a target="_blank" href="https://inmyhappyplace.net/">View Website <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-14.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-14.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/mpss.png' ); ?>" width="121" height="114" alt="MPSS" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-15.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-15.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/bbp.png' ); ?>" width="240" height="47" alt="BBP" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="grid-item wide">
			<a href="<?php echo esc_url( home_url( '/case-studies/cofit/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/cofit.webp' ); ?>" alt="CoFit" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/cofit.png' ); ?>" width="211" height="168" alt="CoFit logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/cofit/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-16.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-16.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/ol.png' ); ?>" width="142" height="105" alt="OL" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="grid-item big-3">
			<a href="<?php echo esc_url( home_url( '/case-studies/white-tail/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/whitetail.webp' ); ?>" alt="White Tail" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/white-tail.png' ); ?>" width="400" height="300" alt="White Tail logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/white-tail/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-17.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-17.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/pleasing.png' ); ?>" width="134" height="142" alt="Pleasing" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="grid-item big">
			<a href="<?php echo esc_url( home_url( '/case-studies/the-5-spheres-of-fit/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/five-sphere.webp' ); ?>" alt="Five Sphere" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/5-spheres.png' ); ?>" width="201" height="201" alt="5 Spheres logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/the-5-spheres-of-fit/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-18.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-18.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/phoeniks.png' ); ?>" width="171" height="63" alt="Phoeniks" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-19.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-19.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/safe.png' ); ?>" width="161" height="97" alt="Safe" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="grid-item big-3">
			<a href="<?php echo esc_url( home_url( '/case-studies/qpon/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/qpon.webp' ); ?>" alt="Qpon" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/qpon.png' ); ?>" width="225" height="225" alt="Qpon logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/qpon/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-20.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-20.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/smc.png' ); ?>" width="160" height="64" alt="SMC" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-21.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-21.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/speed.png' ); ?>" width="170" height="61" alt="Speed" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-22.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-22.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/sasmita.png' ); ?>" width="142" height="70" alt="Sasmita" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-23.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-23.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/semarts.png' ); ?>" width="183" height="167" alt="Semarts" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-24.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-24.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/eco.png' ); ?>" width="270" height="26" alt="Eco" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="grid-item big">
			<a href="<?php echo esc_url( home_url( '/case-studies/soccerfy/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/soccrefy.webp' ); ?>" alt="Soccerfy" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/p-logo-14.png' ); ?>" width="274" height="167" alt="Soccerfy logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/soccerfy/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-25.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-25.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/young.png' ); ?>" width="117" height="115" alt="Young" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-26.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-26.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/coco.png' ); ?>" width="166" height="97" alt="Coco" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-27.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-27.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/great.png' ); ?>" width="177" height="80" alt="Great" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-28.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-28.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/robuchon.png' ); ?>" width="164" height="80" alt="Robuchon" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-29.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-29.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/syn.png' ); ?>" width="173" height="42" alt="Syn" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="grid-item wide">
			<a href="<?php echo esc_url( home_url( '/case-studies/support-xdr/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/support.webp' ); ?>" alt="Support XDR" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/support.png' ); ?>" width="290" height="118" alt="Support XDR logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/support-xdr/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-30.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-30.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/titan.png' ); ?>" width="155" height="155" alt="Titan" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="grid-item big-3">
			<a href="<?php echo esc_url( home_url( '/case-studies/cruze4cash/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/c4c.webp' ); ?>" alt="Cruze4Cash" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/p-logo-1.png' ); ?>" width="400" height="150" alt="C4C logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/cruze4cash/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-31.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-31.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/trade.png' ); ?>" width="177" height="78" alt="Trade" loading="lazy" decoding="async"></div>
			</a>
		</div>
		<div class="grid-item big">
			<a href="<?php echo esc_url( home_url( '/case-studies/streamline-live/' ) ); ?>">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/stream.webp' ); ?>" alt="Streamline Live" loading="lazy" decoding="async">
				<div class="overlay case-study-icon"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/stream.png' ); ?>" width="280" height="86" alt="Streamline logo" loading="lazy" decoding="async"></div>
			</a>
			<div class="view-more--case"><a href="<?php echo esc_url( home_url( '/case-studies/streamline-live/' ) ); ?>">Case Study <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg></a></div>
		</div>
		<div class="web-view grid-item">
			<a href="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-screen/web-32.webp' ); ?>" data-fancybox="gallery">
				<img class="thumb-img" width="500" height="500" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/web-thumb/web-32.webp' ); ?>" alt="portfolio image" loading="lazy" decoding="async">
				<div class="overlay"><img class="logo" src="<?php echo esc_url( $img . '/portfolio/portfolio-new/Logo/west.png' ); ?>" width="268" height="73" alt="West" loading="lazy" decoding="async"></div>
			</a>
		</div>
	</section>

</div>
