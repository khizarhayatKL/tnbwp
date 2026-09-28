<?php

/**
 * TechnBrains Child Theme — functions.php
 *
 * @package technbrains-child
 */

/**
 * Output Page-Specific Schema in Head (Pages and Posts Only).
 *
 * Priority 3 — fires AFTER Yoast meta block (priority 1). Required <head> order:
 *   priority 1   META    (Yoast meta, charset, viewport, og:, twitter:)
 *   priority 2-3 SCHEMA  (Yoast JSON-LD + this ACF head_schema field)
 *   priority 10+ CONTENT (stylesheets, scripts, plugins)
 *
 * Was priority 1 — collided with Yoast and split <head> into
 * meta → schema → meta pattern. Priority 3 groups this with other schemas.
 */
add_action('wp_head', 'output_page_post_schema', 2);
function output_page_post_schema()
{
	// Only execute on a single Page or single Post
		if (is_singular(array('page', 'post', 'case_study'))) {

		// Fetch the field for the current ID
		$schema = get_field('head_schema');

		if ($schema) {
			echo "\n";

			if (strpos($schema, '<script') === false) {
				echo '<script type="application/ld+json">' . "\n";
				echo $schema . "\n";
				echo '</script>' . "\n";
			} else {
				echo $schema . "\n";
			}
		}
	}
}

defined('ABSPATH') || exit;

// ─── Layout toggle ───────────────────────────────────────────────────────────
// true  = new header/footer on ALL pages (only header-footer.css/js loaded — no other changes)
// false = original theme header/footer
define('TNB_USE_NEW_LAYOUT', true);

// ─── Disable Gutenberg — use classic editor ───────────────────────────────────
add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');

// ─── ACF: show field groups on preview regardless of Post Status == publish ───
// Field groups with location rule "Post Status == publish" are hidden on
// draft/preview pages → meta boxes don't inject → CTA fields never render.
add_filter('acf/location/rule_match/post_status', function ($match, $rule, $options) {
	if (is_preview() && '==' === $rule['operator'] && 'publish' === $rule['value']) {
		return true;
	}
	return $match;
}, 10, 3);

// ─── Load includes ────────────────────────────────────────────────────────────
require_once get_stylesheet_directory() . '/inc/setup/menus.php';
require_once get_stylesheet_directory() . '/inc/setup/recaptcha.php';
require_once get_stylesheet_directory() . '/inc/setup/admin-settings.php';
require_once get_stylesheet_directory() . '/inc/ajax/footer-form.php';
require_once get_stylesheet_directory() . '/inc/ajax/popup-form.php';
require_once get_stylesheet_directory() . '/inc/ajax/app-dev-form.php';
require_once get_stylesheet_directory() . '/inc/ajax/collab-form.php';
require_once get_stylesheet_directory() . '/inc/ajax/inner-forms.php';
require_once get_stylesheet_directory() . '/inc/ajax/contact-form.php';
require_once get_stylesheet_directory() . '/inc/ajax/hire-dev-form.php';
require_once get_stylesheet_directory() . '/inc/ajax/lp-hero-form.php';
require_once get_stylesheet_directory() . '/inc/leads.php';
require_once get_stylesheet_directory() . '/inc/acf-fields.php';
require_once get_stylesheet_directory() . '/inc/acf-modal.php';
require_once get_stylesheet_directory() . '/inc/breadcrumbs.php';
require_once get_stylesheet_directory() . '/inc/acf-breadcrumb.php';
require_once get_stylesheet_directory() . '/inc/acf-article-sidebar.php';
require_once get_stylesheet_directory() . '/inc/tnb-content-blocks/tnb-content-blocks.php';
require_once get_stylesheet_directory() . '/inc/blog-schema.php';
require_once get_stylesheet_directory() . '/inc/tnb-app-estimator.php';
require_once get_stylesheet_directory() . '/inc/seo-pagination.php';

//case studies 
require_once get_stylesheet_directory() . '/inc/ajax/case-study-form.php';
require_once get_stylesheet_directory() . '/inc/case-study-cpt.php';
require_once get_stylesheet_directory() . '/inc/case-study-helpers.php';
require_once get_stylesheet_directory() . '/inc/acf-case-study.php';
require_once get_stylesheet_directory() . '/inc/case-studies.php';
//helpers
require_once get_stylesheet_directory() . '/inc/mobile-app-helpers.php';
require_once get_stylesheet_directory() . '/inc/lg-helpers.php';
// security hardening
require_once get_stylesheet_directory() . '/inc/rest-hardening.php';
require_once get_stylesheet_directory() . '/inc/comments-off.php';

// ─── Breadcrumb JSON-LD Schema ────────────────────────────────────────────────
add_action( 'wp_head', 'tnb_breadcrumb_schema', 12 );
function tnb_breadcrumb_schema() {
	if ( is_front_page() ) {
		return;
	}
	// single posts get a richer 4-level breadcrumb (Home > Blog > Category >
	// Post) from inc/blog-schema.php — don't emit a second BreadcrumbList
	if ( is_singular( 'post' ) ) {
		return;
	}
	// pages whose ACF head_schema (output_page_post_schema, priority 2) already
	// ships its own BreadcrumbList — don't emit a duplicate
	if ( is_singular( array( 'page', 'case_study' ) ) && function_exists( 'get_field' ) ) {
		$page_schema = (string) get_field( 'head_schema' );
		if ( '' !== $page_schema && false !== strpos( $page_schema, 'BreadcrumbList' ) ) {
			return;
		}
	}
	$items = tnb_get_breadcrumbs();
	if ( count( $items ) < 2 ) {
		return;
	}
	$list = array();
	foreach ( $items as $i => $item ) {
		$el = array(
			'@type'    => 'ListItem',
			'position' => $i + 1,
			'name'     => $item['label'],
		);
		if ( ! empty( $item['url'] ) ) {
			$el['item'] = $item['url'];
		}
		$list[] = $el;
	}
	echo '<script type="application/ld+json">' .
		wp_json_encode(
			array(
				'@context'        => 'https://schema.org',
				'@type'           => 'BreadcrumbList',
				'itemListElement' => $list,
			),
			JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
		) .
		"</script>\n";
}

if (is_admin()) {
    require_once get_stylesheet_directory() . '/inc/admin/url-migration.php';
}


// ─── Enqueue parent + child styles ───────────────────────────────────────────
add_action('wp_enqueue_scripts', 'tnb_enqueue_assets');
function tnb_enqueue_assets()
{

	// Montserrat — self-hosted. This is the global body font (see header.css `body`),
	// used by ~45 selectors across components/responsive/footer, so it cannot be
	// scoped to a subset of pages without changing typography sitewide. What it can
	// stop doing is costing two extra origins: the Google stylesheet and the
	// fonts.gstatic.com fetch it chains to. assets/css/fonts-montserrat.css is a
	// verbatim copy of Google's response with local URLs — same weights, same
	// unicode-range, same font-display:swap. Kept in the async list below, so its
	// loading behaviour is unchanged too.
	wp_enqueue_style(
		'tnb-google-fonts',
		get_stylesheet_directory_uri() . '/assets/css/fonts-montserrat.css',
		array(),
		filemtime(get_stylesheet_directory() . '/assets/css/fonts-montserrat.css')
	);

	// Bootstrap 5 CSS (CDN — matches react-bootstrap from Next.js source)
	wp_enqueue_style(
		'tnb-bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
		array(),
		'5.3.3'
	);

	// Swiper 11 CSS (CDN — matches swiper/react from Next.js source)
	wp_enqueue_style(
		'tnb-swiper',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
		array(),
		'11'
	);

	// Parent theme stylesheet
	wp_enqueue_style(
		'technbrainstheme-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme('technbrainstheme')->get('Version')
	);

	// Child theme base
	wp_enqueue_style(
		'tnb-child-style',
		get_stylesheet_uri(),
		array('technbrainstheme-style'),
		wp_get_theme()->get('Version')
	);

	// Inline critical above-fold CSS: Bootstrap container/grid + .tnb-btn variants + .banner section
	// Enables deferring tnb-bootstrap (100 KB) and tnb-components (721 KB) without FOUC
	wp_add_inline_style('tnb-child-style', '.container,.container-fluid,.container-xxl,.container-xl,.container-lg,.container-md,.container-sm{width:100%;padding-right:12px;padding-left:12px;margin-right:auto;margin-left:auto}@media(min-width:576px){.container-sm,.container{max-width:540px}}@media(min-width:768px){.container-md,.container-sm,.container{max-width:720px}}@media(min-width:992px){.container-lg,.container-md,.container-sm,.container{max-width:960px}}@media(min-width:1200px){.container-xl,.container-lg,.container-md,.container-sm,.container{max-width:1140px}}@media(min-width:1400px){.container-xxl,.container-xl,.container-lg,.container-md,.container-sm,.container{max-width:1320px}}.tnb-btn{color:#fff;font-size:18px;font-weight:600;background:#ec1c24;text-transform:uppercase;display:inline-flex;justify-content:center;align-items:center;border:none;padding:10px 30px;transition:ease all .25s;position:relative;overflow:hidden;z-index:1;text-align:center;text-decoration:none;cursor:pointer;border-radius:0}.tnb-btn::before{position:absolute;content:"";width:110%;height:220px;background:#fff;top:-100px;left:-220%;transform:rotate(15deg);display:block;transition:ease all .75s;z-index:-1}.tnb-btn:hover:not(:disabled){color:#ec1c24}.tnb-btn:hover:not(:disabled)::before{left:0}.tnb-btn:disabled{cursor:not-allowed;opacity:.4}.tnb-btn:disabled::before{content:unset}.tnb-btn .textWrapper{position:relative;overflow:hidden;height:1.5rem;line-height:1.5rem}.tnb-btn .primaryText{display:block;transition:transform 1.125s cubic-bezier(.19,1,.22,1)}.tnb-btn .secondaryText{position:absolute;top:100%;left:0;width:100%;transition:all 1.125s cubic-bezier(.19,1,.22,1)}.tnb-btn:hover:not(:disabled) .primaryText{transform:translateY(-100%)}.tnb-btn:hover:not(:disabled) .secondaryText{top:0}.tnb-btn.black-red{background:#000;color:#fff}.tnb-btn.black-red::before{background:#ec1c24}.tnb-btn.black-red:hover:not(:disabled){color:#fff}.tnb-btn.slideHOv{background:#ec1c24;color:#fff}.tnb-btn.slideHOv::before{background:#000}.tnb-btn.slideHOv:hover:not(:disabled){color:#fff}.tnb-btn.btnTransparent{background:transparent;border:1px solid #fff;color:#fff}.tnb-btn.btnTransparent::before{content:unset}.tnb-btn.btnWhite{background:#fff;color:#000}.tnb-btn.btnWhite::before{content:unset}@media(max-width:767px){.tnb-btn{font-size:14px}}@media(max-width:400px){.tnb-btn.black-red,.tnb-btn.slideHOv{width:100%}}.banner{padding:100px 0;background-size:cover;background-repeat:no-repeat;position:relative;height:calc(100vh - 75px)}.banner .backgroundImageWrapper{position:absolute;top:0;left:0;right:0;bottom:0;z-index:-1;will-change:transform;transform:translateZ(0);opacity:1}.banner .mainWrapper{height:100%;display:flex}.banner .mainWrapper>.container{height:100%;display:flex;align-items:center}.banner .main{width:50%;display:flex;flex-direction:column;justify-content:center}.banner .main h1{font-size:54px;line-height:60px;color:#fff;font-weight:600;margin-bottom:20px}.banner .main>p{font-size:16px;color:#fff;line-height:27px;margin-bottom:20px;width:80%}.banner .btnWrapper{display:flex;gap:20px;margin-top:20px}.banner .btnWrapper .tnb-btn{font-size:16px;font-weight:600}@media(max-width:1600px){.banner{height:800px}.banner .main h1{font-size:48px}}@media(max-width:1440px){.banner{height:700px}.banner .main h1{font-size:40px;line-height:1.2}}@media(max-width:1200px){.banner{height:650px}.banner .main h1{font-size:34px}.banner .btnWrapper{margin-top:10px}.banner .btnWrapper .tnb-btn{font-size:15px}}@media(max-width:991px){.banner{background-color:#000}.banner .backgroundImageWrapper{display:none}.banner .main{width:100%;text-align:center}.banner .main h1{font-size:30px}.banner .main>p{width:100%}.banner .btnWrapper{margin-top:10px;justify-content:center}.banner .btnWrapper .tnb-btn{font-size:14px}}@media(max-width:767px){.banner .main h1{font-size:28px}.banner .main>p{font-size:14px;line-height:1.6}.banner .btnWrapper{flex-wrap:wrap;justify-content:center}}@media(max-width:420px){.banner{height:100vh}}');

	// Homepage CSS (only on homepage template — unchanged)
	if (is_page_template('page-templates/page-homepage.php') || (is_front_page() && is_page())) {
		// Self-hosted — faces are registered in tnb_register_outfit_font().
		wp_enqueue_style('tnb-outfit-font');
		wp_enqueue_style(
			'tnb-homepage-nav',
			get_stylesheet_directory_uri() . '/assets/css/homepage-nav.css',
			array('tnb-outfit-font'),
			filemtime(get_stylesheet_directory() . '/assets/css/homepage-nav.css')
		);
		wp_enqueue_style(
			'tnb-homepage',
			get_stylesheet_directory_uri() . '/assets/css/homepage.css',
			array('tnb-homepage-nav', 'tnb-components', 'tnb-responsive'),
			filemtime(get_stylesheet_directory() . '/assets/css/homepage.css')
		);
	}

	// New header/footer assets — loads on ALL pages when TNB_USE_NEW_LAYOUT=true
	if (defined('TNB_USE_NEW_LAYOUT') && TNB_USE_NEW_LAYOUT) {
		// Outfit font — self-hosted; faces registered in tnb_register_outfit_font().
		wp_enqueue_style('tnb-outfit-font');
		wp_enqueue_style(
			'tnb-header-footer',
			get_stylesheet_directory_uri() . '/assets/css/header-footer.css',
			array('tnb-outfit-font'),
			filemtime(get_stylesheet_directory() . '/assets/css/header-footer.css')
		);
		wp_enqueue_script(
			'tnb-header-footer-js',
			get_stylesheet_directory_uri() . '/assets/js/header-footer.js',
			array(),
			filemtime(get_stylesheet_directory() . '/assets/js/header-footer.js'),
			true
		);
	}

	// Header styles
	wp_enqueue_style(
		'tnb-header',
		get_stylesheet_directory_uri() . '/assets/css/header.css',
		array('tnb-child-style'),
		wp_get_theme()->get('Version')
	);

	// Mobile nav styles
	wp_enqueue_style(
		'tnb-header-mobile',
		get_stylesheet_directory_uri() . '/assets/css/header-mobile.css',
		array('tnb-header'),
		wp_get_theme()->get('Version')
	);

	// Component styles (all page components — replaces per-component inline <style> blocks)
	wp_enqueue_style(
		'tnb-components',
		get_stylesheet_directory_uri() . '/assets/css/components.css',
		array('tnb-child-style'),
		filemtime(get_stylesheet_directory() . '/assets/css/components.css')
	);

	// Dynamic rule: teams-choose checkmark icon (URL depends on stylesheet directory)
	wp_add_inline_style(
		'tnb-components',
		'.teamChoose .BottomCont .rightSide ul li::before{background-image:url("' . esc_url(get_stylesheet_directory_uri() . '/assets/images/revamp/checkmark.png') . '")}'
	);

	// Inner form message styles + field error styles + recaptcha wrap alignment
	wp_add_inline_style(
		'tnb-components',
		'.inner-form-msg:empty{display:none}.inner-form-msg{font-size:13px;margin:6px 0}.inner-form-msg.error{color:#c00}.tnb-field-error:empty{display:none}.tnb-field-error{font-size:12px;color:#c00;display:block;margin:4px 0 8px}.bannerForm .tnb-field-error{margin-top:-18px}.bannerForm .tnb-recaptcha-wrap{width:88%;margin:0 auto 20px}'
	);

	// Responsive overrides — global breakpoints
	wp_enqueue_style(
		'tnb-responsive',
		get_stylesheet_directory_uri() . '/assets/css/responsive.css',
		array('tnb-components'),
		filemtime(get_stylesheet_directory() . '/assets/css/responsive.css')
	);

	// Footer styles
	wp_enqueue_style(
		'tnb-footer',
		get_stylesheet_directory_uri() . '/assets/css/footer.css',
		array('tnb-child-style'),
		wp_get_theme()->get('Version')
	);

	// Popup modal styles
	wp_enqueue_style(
		'tnb-popup',
		get_stylesheet_directory_uri() . '/assets/css/popup.css',
		array('tnb-child-style'),
		wp_get_theme()->get('Version')
	);

	// Homepage interactions — canvas, counters, decks, dropdowns, decision quiz
	wp_enqueue_script(
		'tnb-homepage-interactions',
		get_stylesheet_directory_uri() . '/assets/js/custom-theme-interactions.js',
		array(),
		filemtime(get_stylesheet_directory() . '/assets/js/custom-theme-interactions.js'),
		true  // footer
	);
	
		// Neural canvas hero + role cycle — homepage only. #neural-canvas /
	// [data-role-cycle] exist in template-parts/components/HeroNetwork.php,
	// registered only from data-registry/homepage.php, so every other page
	// type was previously downloading, parsing and running this for nothing.
	// Same gate already used for the homepage-only CSS above.
	if ( is_page_template( 'page-templates/page-homepage.php' ) || ( is_front_page() && is_page() ) ) {
		$hero_neural_path = get_stylesheet_directory() . '/assets/js/hero-neural.js';
		if ( file_exists( $hero_neural_path ) ) {
			wp_enqueue_script(
				'tnb-hero-neural',
				get_stylesheet_directory_uri() . '/assets/js/hero-neural.js',
				array(),
				filemtime( $hero_neural_path ),
				true  // footer
			);
		}
	} 

	// Header JS — dropdown + overlay logic
	wp_enqueue_script(
		'tnb-header-js',
		get_stylesheet_directory_uri() . '/assets/js/header.js',
		array(),
		wp_get_theme()->get('Version'),
		true  // footer
	);

	// Mobile menu JS — accordion toggle
	wp_enqueue_script(
		'tnb-mobile-menu-js',
		get_stylesheet_directory_uri() . '/assets/js/mobile-menu.js',
		array(),
		wp_get_theme()->get('Version'),
		true
	);

	// Popup JS — "Scale My Team" modal + Exit Popup
	wp_enqueue_script(
		'tnb-popup-js',
		get_stylesheet_directory_uri() . '/assets/js/popup.js',
		array(),
		filemtime(get_stylesheet_directory() . '/assets/js/popup.js'),
		true
	);

	// Google reCAPTCHA v2 — only when site key is configured
	$recaptcha_site_key = get_option('tnb_recaptcha_site_key', '');
	if (! empty($recaptcha_site_key)) {
		wp_enqueue_script(
			'google-recaptcha',
			'https://www.google.com/recaptcha/api.js',
			array(),
			null,
			true
		);
	}

	// Swift Sales SDK — injected via wp_footer to match Next.js ExternalScripts.js exactly.
	// See tnb_inject_swift_sales() below.

	// Bootstrap 5 JS bundle (CDN — includes Popper)
	wp_enqueue_script(
		'tnb-bootstrap-js',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
		array(),
		'5.3.3',
		true
	);

	// Swiper 11 JS bundle (CDN)
	wp_enqueue_script(
		'tnb-swiper-js',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
		array(),
		'11',
		true
	);

	// Fancybox 5 CSS (CDN — matches @fancyapps/ui from Next.js source)
	wp_enqueue_style(
		'tnb-fancybox',
		'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.36/dist/fancybox/fancybox.css',
		array(),
		'5.0.36'
	);

	// Fancybox 5 JS UMD (CDN)
	wp_enqueue_script(
		'tnb-fancybox-js',
		'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.36/dist/fancybox/fancybox.umd.js',
		array(),
		'5.0.36',
		true
	);

	// intl-tel-input 17 CSS (phone flag dropdown) — self-hosted and inlined.
	//
	// Two steps got it off the critical path. First it was moved off cdn.jsdelivr.net,
	// which was costing ~750 ms of DNS + TLS + RTT for 3.8 KB. Self-hosting cut that to
	// ~445 ms, but the file was still the single render-blocking resource on the page
	// (~124 ms after the document, per PSI's network dependency tree). Inlining removes
	// the request entirely and reduces the critical chain to the document alone.
	// ~25 KB raw, ~2.75 KB over the wire once compressed.
	//
	// The vendor directory still keeps the upstream build/{css,img} layout, so the file
	// remains byte-identical to
	// cdn.jsdelivr.net/npm/intl-tel-input@17.0.21/build/css/intlTelInput.css and the
	// linked fallback below works without modification.
	//
	// Inlining is the *safer* fix here, not a riskier one: the documented blank-flag
	// regression was caused by the CSS arriving after the popup opened. Inline CSS is
	// parsed before any script runs, so that race cannot occur at all — which is why
	// this is preferable to the async/preload approach that previously broke flags.
	//
	// The sprite URLs must be absolutised. Relative url() in an inline <style> resolves
	// against the *document* URL, not the stylesheet's location, so the upstream
	// "../img/flags.png" would 404 on every page except one nested exactly two levels
	// deep. Everything else is byte-identical to the vendor file.
	$iti_css_path = get_stylesheet_directory() . '/assets/vendor/intl-tel-input/17.0.21/css/intlTelInput.css';
	$iti_img_uri  = get_stylesheet_directory_uri() . '/assets/vendor/intl-tel-input/17.0.21/img';

	if ( is_readable( $iti_css_path ) ) {
		$iti_css = file_get_contents( $iti_css_path );
		$iti_css = str_replace(
			array( 'url("../img/flags.png")', 'url("../img/flags@2x.png")' ),
			array( 'url("' . esc_url( $iti_img_uri . '/flags.png' ) . '")',
			       'url("' . esc_url( $iti_img_uri . '/flags@2x.png' ) . '")' ),
			$iti_css
		);

		wp_register_style( 'tnb-iti', false, array(), null );
		wp_enqueue_style( 'tnb-iti' );
		wp_add_inline_style( 'tnb-iti', $iti_css );
	} else {
		// Fall back to the linked file rather than shipping a page with no flag styles.
		wp_enqueue_style(
			'tnb-iti',
			get_stylesheet_directory_uri() . '/assets/vendor/intl-tel-input/17.0.21/css/intlTelInput.css',
			array(),
			'17.0.21'
		);
	}

	// intl-tel-input 17 JS — self-hosted alongside its stylesheet (see 'tnb-iti').
	wp_enqueue_script(
		'tnb-iti-js',
		get_stylesheet_directory_uri() . '/assets/vendor/intl-tel-input/17.0.21/js/intlTelInput.min.js',
		array(),
		'17.0.21',
		true
	);

	// Lazy loader for intl-tel-input's utils.js (~61 KB over the wire). It was
	// previously fetched at init on every page via the `utilsScript` option, whether
	// or not a phone field was ever used; it is now requested on first contact with
	// a tel input. See assets/js/iti-utils-lazy.js for the timing guarantees.
	wp_enqueue_script(
		'tnb-iti-utils-lazy',
		get_stylesheet_directory_uri() . '/assets/js/iti-utils-lazy.js',
		array('tnb-iti-js'),
		filemtime(get_stylesheet_directory() . '/assets/js/iti-utils-lazy.js'),
		true
	);
	wp_localize_script(
		'tnb-iti-utils-lazy',
		'tnbItiUtils',
		array('url' => get_stylesheet_directory_uri() . '/assets/vendor/intl-tel-input/17.0.21/js/utils.js')
	);

	// App Dev Form JS
	wp_enqueue_script(
		'tnb-app-dev-form-js',
		get_stylesheet_directory_uri() . '/assets/js/app-dev-form.js',
		array('tnb-iti-js'),
		wp_get_theme()->get('Version'),
		true
	);

	// Inner page forms JS — hire-banner, engagement-banner, sdd-banner
	wp_enqueue_script(
		'tnb-inner-forms-js',
		get_stylesheet_directory_uri() . '/assets/js/inner-forms.js',
		array('tnb-iti-js'),
		filemtime(get_stylesheet_directory() . '/assets/js/inner-forms.js'),
		true
	);
  
  // Contact Us form JS
	wp_enqueue_script(
		'tnb-contact-form-js',
		get_stylesheet_directory_uri() . '/assets/js/contact-form.js',
		array('tnb-iti-js'),
		filemtime(get_stylesheet_directory() . '/assets/js/contact-form.js'),
		true
	);

	// Component JS — all page-component interactions (Swiper, tabs, FAQs, phone, modals)
	wp_enqueue_script(
		'tnb-components-js',
		get_stylesheet_directory_uri() . '/assets/js/components.js',
		array('tnb-swiper-js', 'tnb-iti-js', 'tnb-fancybox-js'),
		filemtime(get_stylesheet_directory() . '/assets/js/components.js'),
		true
	);
	
	
	// Blog detail restyle — single blog posts only, loads after tnb-responsive
	if (is_singular('post')) {
		wp_enqueue_style(
			'tnb-blog-detail',
			get_stylesheet_directory_uri() . '/assets/css/blog-detail.css',
			array('tnb-responsive', 'tnb-outfit-font'),
			filemtime(get_stylesheet_directory() . '/assets/css/blog-detail.css')
		);
		// TOC scroll-spy — highlights the active section link while scrolling
		wp_enqueue_script(
			'tnb-blog-detail-js',
			get_stylesheet_directory_uri() . '/assets/js/blog-detail.js',
			array(),
			filemtime(get_stylesheet_directory() . '/assets/js/blog-detail.js'),
			true
		);
	}
	
		// Hire Developer Form JS
	// Depends on the lazy loader too: this form calls window.tnbLoadItiUtils()
	// eagerly for its autoPlaceholder.
	wp_enqueue_script(
		'tnb-hire-dev-form-js',
		get_stylesheet_directory_uri() . '/assets/js/hire-dev-form.js',
		array('tnb-iti-js', 'tnb-iti-utils-lazy'),
		filemtime(get_stylesheet_directory() . '/assets/js/hire-dev-form.js'),
		true
	);

	// Landing Page — Hero form JS
	wp_enqueue_script(
		'tnb-lp-hero-form-js',
		get_stylesheet_directory_uri() . '/assets/js/lp-hero-form.js',
		array(),
		filemtime(get_stylesheet_directory() . '/assets/js/lp-hero-form.js'),
		true
	);

	// Landing Page — Header V2 nav (transparent-over-hero → solid on scroll)
	wp_enqueue_script(
		'tnb-lp-nav-js',
		get_stylesheet_directory_uri() . '/assets/js/lp-nav.js',
		array(),
		filemtime(get_stylesheet_directory() . '/assets/js/lp-nav.js'),
		true
	);

	// Pass AJAX URL + nonces to JS
	wp_localize_script(
		'tnb-header-js',
		'tnbAjax',
		array(
			'url'              => admin_url('admin-ajax.php'),
			'nonce'            => wp_create_nonce('tnb_footer_form'),
			'appDevNonce'      => wp_create_nonce('tnb_app_dev_form'),
			'collabNonce'      => wp_create_nonce('tnb_collab_form'),
          	'contactNonce'     => wp_create_nonce('tnb_contact_form'),
          	 'hireDevFormNonce' => wp_create_nonce('tnb_hire_dev_form'),
			'lpHeroFormNonce'  => wp_create_nonce('tnb_lp_hero_form'),
			'recaptchaSiteKey' => get_option('tnb_recaptcha_site_key', ''),
			'ipdataKey'        => get_option('tnb_ipdata_api_key', '9f7971df30fbd476f189d359ad4b22c4b1caf52409f0bc9653b7e262'),
		)
	);
}

// ─── Async-load non-critical CSS via preload/onload pattern ──────────────────
// Only handles CSS that WP Rocket RUCSS cannot process: CDN-hosted files and
// Google Fonts (external URLs RUCSS cannot fetch). Local theme CSS is left
// blocking so the page renders styled on first visit. WP Rocket RUCSS handles
// local CSS optimization (inlines per-page used rules + async-loads the rest)
// once it processes each page.
add_filter('style_loader_tag', 'tnb_async_css', 10, 2);
function tnb_async_css(string $html, string $handle): string
{
	if (is_admin()) {
		return $html;
	}

	static $async_handles = array(
		// CDN — RUCSS cannot fetch external URLs; we async-load these manually
		'tnb-bootstrap',
		'tnb-swiper',
		'tnb-fancybox',
		//'tnb-iti',
		// Google Fonts — font-display:swap makes async load safe.
		// 'tnb-outfit-font' is no longer listed: it is self-hosted and registered with a
		// false src, so it emits no <link> for this filter to rewrite.
		'tnb-google-fonts',
	);

	if (! in_array($handle, $async_handles, true)) {
		return $html;
	}

	// Skip if already converted — prevents double-processing
	if (strpos($html, "rel='stylesheet'") === false && strpos($html, 'rel="stylesheet"') === false) {
		return $html;
	}

	$async    = preg_replace(
		"/rel=(['\"])stylesheet\\1/",
		"rel=\"preload\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet'\"",
		$html
	);
	$noscript = '<noscript>' . str_replace(['preload', 'as="style"'], ['stylesheet', ''], $html) . '</noscript>';
	return $async . "\n" . $noscript . "\n";
}

// ─── Defer non-critical scripts ───────────────────────────────────────────────
add_filter('script_loader_tag', 'tnb_script_loader_attributes', 10, 3);
function tnb_script_loader_attributes(string $tag, string $handle, string $src): string
{
	if (is_admin()) {
		return $tag;
	}

	if ('google-recaptcha' === $handle) {
		return str_replace(' src=', ' async defer src=', $tag);
	}

	static $defer = array(
		'jquery',
		'jquery-core',
		'jquery-migrate',
		'tnb-bootstrap-js',
		'tnb-swiper-js',
		'tnb-fancybox-js',
		'tnb-iti-js',
		'tnb-iti-utils-lazy',
		'tnb-header-footer-js',
		'tnb-header-js',
		'tnb-mobile-menu-js',
		'tnb-popup-js',
		'tnb-homepage-interactions',
		'tnb-components-js',
		'tnb-app-dev-form-js',
		'tnb-inner-forms-js',
      	'tnb-contact-form-js',
      	'tnb-author-js',
	);

	if (in_array($handle, $defer, true) && strpos($tag, 'defer') === false) {
		return str_replace(' src=', ' defer src=', $tag);
	}
	return $tag;
}


//Move jQuery to footer via wp_default_scripts (runs before enqueue) â”€â”€â”€â”€â”€â”€
// --- WP Rocket: exclude theme + UI-critical CDN scripts from Delay JS --------
// WP Rocket's "Delay JavaScript Execution" replaces <script defer> with
// type="rocketlazyloadscript" -- browser skips it entirely until a user event.
// Google's web renderer never fires those events, so canvas, Swiper, accordions,
// counters and forms never initialise. These scripts must run on page load.
add_filter('rocket_delay_js_exclusions', function (array $exclusions): array {
	// All child-theme JS -- canvas, carousels, accordions, popup, forms, header
	$exclusions[] = 'wp-content/themes/technbrains-child';
	// CDN libraries our UI depends on at first render
	$exclusions[] = 'swiper-bundle.min.js';
	$exclusions[] = 'bootstrap.bundle.min.js';
	$exclusions[] = 'fancybox.umd.js';
	$exclusions[] = 'intlTelInput.min.js';
	$exclusions[] = 'live-chat-script';
	$exclusions[] = 'swift-sales-loader';
	return $exclusions;
});

// Exclude ITI CSS from ALL WP Rocket optimizations (RUCSS + async defer).
// Flag sprite rules get stripped as "unused" (popup hidden on first paint).
// On mobile with slow connection, async-deferred CSS arrives after popup opens → blank flags.
// noptimize comment wrapper guarantees synchronous load, no RUCSS processing.
add_filter('rocket_rucss_excluded_stylesheets', function (array $excluded): array {
	$excluded[] = 'intl-tel-input';
	return $excluded;
});
add_filter('style_loader_tag', function (string $html, string $handle): string {
	if ($handle === 'tnb-iti') {
		return '<!-- noptimize -->' . $html . '<!-- /noptimize -->';
	}
	return $html;
}, 10, 2);
// Disable WP Rocket YouTube lazy-load — prevents video player configuration errors
// in Swiper sliders where YT.Player API init fires before WP Rocket thumbnail swap resolves.
add_filter('rocket_lazyload_youtube', '__return_false');


add_action('wp_default_scripts', function (WP_Scripts $scripts): void {
	if (is_admin()) {
		return;
	}
	foreach (array('jquery', 'jquery-core', 'jquery-migrate') as $h) {
		if (! empty($scripts->registered[$h])) {
			$scripts->registered[$h]->extra['group'] = 1;
		}
	}
});

// ─── Resource hints: preconnect for CDN and third-party origins ───────────────
// fonts.googleapis.com + fonts.gstatic.com already output by Yoast SEO — no duplicates.
add_action('wp_head', 'tnb_output_resource_hints', 1);
function tnb_output_resource_hints(): void
{
	echo "<link rel='preconnect' href='https://cdn.jsdelivr.net' crossorigin>\n";

	// www.gstatic.com is only requested by reCAPTCHA. That script is async+defer and
	// WP Rocket's Delay JS holds it until a user interaction, so it never runs during
	// page load — Lighthouse correctly reports the preconnect as unused, and the idle
	// connection is closed long before reCAPTCHA needs it. dns-prefetch keeps the DNS
	// resolution warm at no connection cost. Guard matches the 'google-recaptcha'
	// enqueue in tnb_enqueue_assets().
	if ( ! empty( get_option( 'tnb_recaptcha_site_key', '' ) ) ) {
		echo "<link rel='dns-prefetch' href='//www.gstatic.com'>\n";
	}

	echo "<link rel='dns-prefetch' href='//cdnjs.cloudflare.com'>\n";
}

// ─── Drop Google Fonts resource hints added by other plugins ─────────────────
// Yoast emits its own preconnect to fonts.gstatic.com. Both font families are now
// self-hosted, so nothing requests that origin during load and the hint just opens
// an unused connection. The dns-prefetch in header.php covers reCAPTCHA's late
// Roboto fetch. Filtering here rather than editing the plugin keeps it update-safe.
add_filter('wp_resource_hints', 'tnb_filter_font_resource_hints', 10, 2);
function tnb_filter_font_resource_hints(array $urls, string $relation): array
{
	if ('preconnect' !== $relation) {
		return $urls;
	}
	return array_values(array_filter($urls, function ($u) {
		$href = is_array($u) ? ($u['href'] ?? '') : $u;
		return false === strpos($href, 'fonts.gstatic.com')
			&& false === strpos($href, 'fonts.googleapis.com');
	}));
}

// ─── Remove block-editor CSS — unused on this custom theme ───────────────────
function tnb_dequeue_block_styles(): void
{
	if (is_admin()) {
		return;
	}
//	foreach (array('wp-block-library', 'wp-block-library-theme', 'wc-block-style', 'global-styles', 'classic-theme-styles', 'heateor_sss_frontend_css') as $h) {
	foreach (array('wp-block-library', 'wp-block-library-theme', 'wc-block-style', 'global-styles', 'classic-theme-styles', 'heateor_sss_frontend_css', 'wp-img-auto-sizes-contain') as $h) {
	
      wp_dequeue_style($h);
		wp_deregister_style($h);
	}
}
add_action('wp_enqueue_scripts', 'tnb_dequeue_block_styles', 100);
add_action('wp_print_styles',    'tnb_dequeue_block_styles', 100);

add_action('init', function (): void {
	if (is_admin()) {
		return;
	}
	remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
	remove_action('wp_footer',          'wp_enqueue_global_styles_custom_css', 1);
	remove_action('wp_body_open',       'wp_global_styles_render_svg_filters');
}, 100);

// Frontend-only: block editor calls these functions to initialize the editor UI;
// returning empty/false in admin prevents the title field and editor from rendering.
add_filter('wp_get_global_stylesheet', function (string $stylesheet): string {
	return is_admin() ? $stylesheet : '';
}, 999);
add_filter('wp_get_global_styles_svg_filters', function ($v) {
	return is_admin() ? $v : '';
}, 999);
add_filter('wp_get_global_styles_custom_css', function ($v) {
	return is_admin() ? $v : '';
}, 999);
add_filter('should_load_separate_core_block_assets', function ($v) {
	return is_admin() ? $v : false;
});

add_action('wp_print_styles', function (): void {
	if (is_admin()) {
		return;
	}
	global $wp_styles;
	if (! ($wp_styles instanceof WP_Styles)) {
		return;
	}
	// foreach (array('global-styles', 'classic-theme-styles', 'wp-block-library', 'wp-block-library-theme') as $h) {
      	foreach (array('global-styles', 'classic-theme-styles', 'wp-block-library', 'wp-block-library-theme', 'wp-img-auto-sizes-contain') as $h) {
		unset($wp_styles->registered[$h]);
		$key = array_search($h, (array) $wp_styles->queue, true);
		if ($key !== false) {
			unset($wp_styles->queue[$key]);
		}
	}
}, 999);

// ─── Add decoding="async" to all images — unblocks paint-adjacent decoding ───
add_filter('wp_get_attachment_image_attributes', function (array $attr, WP_Post $attachment): array {
	if (empty($attr['decoding'])) {
		$attr['decoding'] = 'async';
	}
	return $attr;
}, 10, 2);

add_filter('the_content', function (string $html): string {
	if (is_admin() || empty($html)) {
		return $html;
	}
	return preg_replace('/<img(?![^>]*\bdecoding=)([^>]*)>/i', '<img decoding="async"$1>', $html);
}, 99);

// ─── Render exit popup HTML in footer ────────────────────────────────────────
add_action('wp_footer', 'tnb_render_exit_popup');
function tnb_render_exit_popup(): void
{
	if ( function_exists( 'tnb_page_has_layout' ) && tnb_page_has_layout( 'lp_hero' ) ) {
		return;
	}
	get_template_part('template-parts/components/exit-popup');
}

// ─── SwiftSales SDK — async queue loader (matches Next.js ExternalScripts.js) ─
// Must run BEFORE the external script loads so swiftSales.queries exists.
// wp_enqueue_script loads synchronously, bypassing queue setup → crash.
// Instead: output the same IIFE Next.js uses, which creates the queue function
// first, then injects the script as async. Delayed 5 s like Next.js.
add_action('wp_footer', 'tnb_inject_swift_sales', 25);
function tnb_inject_swift_sales(): void
{
	$swift_url = get_option('tnb_swift_sales_script_url', 'https://script.swiftsales.io/swiftsales.js?v=c5e4a51a45544');
	$swift_id  = get_option('tnb_swift_sales_script_id', '482');
	if (empty($swift_url)) {
		$swift_url = 'https://script.swiftsales.io/swiftsales.js?v=c5e4a51a45544';
	}
	if (empty($swift_id)) {
		$swift_id  = '482';
	}
?>
	<script id="swift-sales-loader">
		(function() {
			function loadSwiftSales() {
				(function(scope, doc, tagName, src, objectName, newEl, firstEl) {
					Array.isArray(scope['SwiftSalesObject']) ? scope['SwiftSalesObject'].push(objectName) : (scope['SwiftSalesObject'] = [objectName]);
					scope[objectName] = scope[objectName] || function() {
						scope[objectName].queries = scope[objectName].queries || [];
						scope[objectName].queries.push(arguments);
					};
					scope[objectName].scriptInjectedAt = 1 * new Date();
					newEl = doc.createElement(tagName);
					newEl.setAttribute('id', 'swift-sales-widget-script');
					firstEl = doc.getElementsByTagName(tagName)[0];
					newEl.async = 1;
					newEl.src = src;
					firstEl ? firstEl.parentNode.insertBefore(newEl, firstEl) : doc.getElementsByTagName('head')[0].appendChild(newEl);
				})(window, document, 'script', <?php echo wp_json_encode(esc_url_raw($swift_url)); ?>, 'swiftSales');
				swiftSales('Init', <?php echo wp_json_encode((string) $swift_id); ?>);
			}
			setTimeout(loadSwiftSales, 5000);
		})();
	</script>
<?php
}

// ─── Body classes ─────────────────────────────────────────────────────────────
add_filter('body_class', function ($classes) {
	if (is_page_template('page-templates/page-homepage.php') || (is_front_page() && is_page())) {
		$classes[] = 'page-homepage';
	}
	// Add homepage-revamp on non-homepage pages when new layout is active
	// Used ONLY to scope nav/footer font-family in header-footer.css
	if (
		defined('TNB_USE_NEW_LAYOUT') && TNB_USE_NEW_LAYOUT
		&& ! is_page_template('page-templates/page-homepage.php')
		&& ! (is_front_page() && is_page())
	) {
		$classes[] = 'homepage-revamp';
	}
	return $classes;
});

// ─── Revamp page body class ───────────────────────────────────────────────────
// Adds 'tnb-revamp-page' to body on pages that use revamp-style buttons
// (rounded, no ::before sweep). Enterprise page keeps old sweep style.
add_filter('body_class', function ($classes) {
	$revamp_templates = array(
		'page-templates/page-ios-app-development.php',
		'page-templates/page-mobile-app-development.php',
		'page-templates/page-android-app-development.php',
		'page-templates/page-staff-augmentation.php',
	);
	if (is_page_template($revamp_templates)) {
		$classes[] = 'tnb-revamp-page';
	}
	return $classes;
});

// ─── Post permalink structure: /blog/{postname}/ ────────────────────────────
// Sets post URLs to /blog/slug. Runs on theme activation and init (check only).
// Direct /{postname}/ access returns 404 — WordPress won't generate rules for it.
add_action('after_switch_theme', 'tnb_set_blog_permalink');
add_action('init', 'tnb_set_blog_permalink', 999);
function tnb_set_blog_permalink()
{
	if (get_option('permalink_structure') !== '/blog/%postname%/') {
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure('/blog/%postname%/');
		flush_rewrite_rules(false);
	}
}

// ─── Remove emoji scripts (performance) ──────────────────────────────────────
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

// ─── Remove unnecessary head bloat ───────────────────────────────────────────
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

// ─── Footer navigation menus ─────────────────────────────────────────────────
// Manage links via Appearance → Menus in WP Dashboard.
// Each location maps to one nav column in Footer.php.
add_action('after_setup_theme', 'tnb_register_footer_menus');
function tnb_register_footer_menus()
{
	register_nav_menus([
		'footer-hire'       => __('Footer — Hire Developers',  'technbrains-child'),
		'footer-services'   => __('Footer — Services',         'technbrains-child'),
		'footer-platforms'  => __('Footer — Platforms',        'technbrains-child'),
		'footer-engagement' => __('Footer — Engagement Models', 'technbrains-child'),
		'footer-industries' => __('Footer — Industries',       'technbrains-child'),
		'footer-locations'  => __('Footer — Locations',        'technbrains-child'),
		'footer-resources'  => __('Footer — Resources',        'technbrains-child'),
	]);
}


// ─── Parent nav pages — enforce 404 ──────────────────────────────────────────
// These pages exist only as URL hierarchy parents and must never be served.
// Add/remove slugs here; both hooks read from the same list.
function tnb_parent_nav_slugs(): array
{
   return array(
		//'services',
		//'platforms',
		//'industries',
		//'locations',
		'engagement-models',
		//'case-studies',
		'cms',
		'ecommerce',
		'stack',
	    //'technologies',
		// add more page slugs here as needed
	);
}

// Return genuine 404 on the frontend
add_action('template_redirect', function (): void {
    if (! is_page()) {
        return;
    }
    $post = get_queried_object();
    if (! ($post instanceof WP_Post) || ! in_array($post->post_name, tnb_parent_nav_slugs(), true)) {
        return;
    }
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    nocache_headers();
    include get_query_template('404');
    exit;
});

// Exclude from Yoast XML sitemap
add_filter('wpseo_sitemap_entry', function ($url, $type, $object) {
    if ($object instanceof WP_Post && in_array($object->post_name, tnb_parent_nav_slugs(), true)) {
        return false;
    }
    return $url;
}, 10, 3);

// Add ACF flexible-content images to the Yoast XML sitemap.
// Pages use the Flexible Content template (page-flexible.php) — all imagery
// lives in ACF fields, not post_content, so Yoast's built-in parser (which
// only reads post_content <img> tags + the featured image) finds none of it.
add_filter('wpseo_sitemap_urlimages', function (array $images, int $post_id): array {
    if (! function_exists('get_fields')) {
        return $images;
    }

    $fields = get_fields($post_id);
    if (! is_array($fields)) {
        return $images;
    }

    $seen = array();
    foreach ($images as $image) {
        if (! empty($image['src'])) {
            $seen[$image['src']] = true;
        }
    }

    $walk = function ($value) use (&$walk, &$images, &$seen): void {
        if (! is_array($value)) {
            return;
        }

        // ACF image/file field in "Array" return format.
        if (isset($value['url'], $value['type']) && is_string($value['type']) && strpos($value['type'], 'image') === 0) {
            $src = $value['url'];
            if (is_string($src) && $src !== '' && ! isset($seen[$src])) {
                $seen[$src] = true;
                $images[]   = array('src' => $src);
            }
            return;
        }

        foreach ($value as $item) {
            $walk($item);
        }
    };

    $walk($fields);

    return $images;
}, 10, 2);

// ─── Disable XML-RPC ─────────────────────────────────────────────────────────
add_filter('xmlrpc_enabled', '__return_false');


// ─── Custom Role: Post Editor ──────────────────────────────────────────────────
add_action('init', function (): void {
	$caps = [
		'read'                   => true,
		'edit_posts'             => true,
		'edit_others_posts'      => true,
		'edit_published_posts'   => true,
		'publish_posts'          => true,
		'delete_posts'           => true,
		'delete_others_posts'    => true,
		'delete_published_posts' => true,
		'upload_files'           => true,
		'moderate_comments'      => true,

		// user management caps (mirrors what admin uses to manage users)
		'edit_users'             => true,
		'list_users'             => true,
		'create_users'           => true,
		'delete_users'           => true,
		'promote_users'          => true, // required for the "Role" dropdown / bulk role change to work at all
	];

	$role = get_role('post_editor');
	if (! $role) {
		add_role('post_editor', 'Post Editor', $caps);
	} else {
		foreach ($caps as $cap => $grant) {
			$role->add_cap($cap, $grant);
		}
	}
});

// ─── 1. Hide "Administrator" from the role dropdown for non-admins ────────────
// This affects Add New User, Edit User, and the bulk "Change role to…" select.
// WordPress core itself validates submitted role values against this same
// list (get_editable_roles()) before saving, so this isn't just cosmetic —
// it also blocks a crafted POST request from assigning the admin role.
add_filter('editable_roles', function (array $roles): array {
	$current_user = wp_get_current_user();

	if (! in_array('administrator', (array) $current_user->roles, true)) {
		unset($roles['administrator']);
	}

	return $roles;
});

// ─── 2. Prevent editing / deleting / promoting existing Administrators ───────
// Even with #1 in place, a post_editor could still try to edit, demote, or
// delete an existing admin account's profile. This blocks that at the
// capability-check level, which every core screen and AJAX action respects.
add_filter('map_meta_cap', function (array $caps, string $cap, int $user_id, array $args) {
	if (in_array($cap, ['edit_user', 'delete_user', 'promote_user'], true)) {
		$target_id = $args[0] ?? 0;

		if ($target_id && user_can($target_id, 'administrator')) {
			$acting_user = get_userdata($user_id);

			if (! $acting_user || ! in_array('administrator', (array) $acting_user->roles, true)) {
				$caps[] = 'do_not_allow';
			}
		}
	}

	return $caps;
}, 10, 4);

// ─── Remove WP version from scripts/styles ───────────────────────────────────
add_filter('style_loader_src', 'tnb_remove_ver_query', 9999);
add_filter('script_loader_src', 'tnb_remove_ver_query', 9999);
function tnb_remove_ver_query($src)
{
	if (strpos($src, get_stylesheet_directory_uri()) !== false) {
		return $src; // local theme assets keep their filemtime-based cache-buster
	}
	if (strpos($src, 'ver=')) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}

// ─── Preload critical font (Outfit — the LCP text font) ───────────────────────
// The LCP element on the homepage is the hero <h1>, which renders in Outfit. With
// font-display:swap the heading paints in the fallback face and repaints when Outfit
// arrives, and Chrome re-fires an LCP candidate on that repaint — so Outfit's arrival
// time *is* the LCP time. Preloading at wp_head priority 1 starts the fetch in the
// first bytes of <head> instead of after the stylesheet that references it.
//
// Only the latin subset is preloaded. latin-ext covers accented characters that do
// not appear above the fold; it still loads normally when the browser needs it.
add_action('wp_head', 'tnb_preload_fonts', 1);
function tnb_preload_fonts()
{
	printf(
		'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
		esc_url( get_stylesheet_directory_uri() . '/assets/fonts/outfit/outfit-v15-latin-var.woff2' )
	);
}

// ─── Self-hosted Outfit @font-face ────────────────────────────────────────────
// Replaces the fonts.googleapis.com stylesheet. That stylesheet cost a second origin
// (DNS + TLS + RTT) and made the font a two-hop discovery: HTML → googleapis CSS →
// gstatic woff2. Serving the same faces from our own origin collapses that to one hop
// on an already-open connection, and the preload above starts it immediately.
//
// The declarations below are a faithful copy of what Google Fonts returns for
// `family=Outfit:wght@300;400;500;600;700;800&display=swap`, with local URLs. Google
// maps all six weights onto the same two files (one per unicode subset); those exact
// per-weight/per-subset declarations are reproduced rather than collapsed into a
// variable-font weight range, so rendering matches the previous behaviour regardless
// of how the browser resolves the face. unicode-range values are copied verbatim so
// subset selection is unchanged. font-display:swap is preserved — no new FOIT, and
// the fallback metrics are the same as before, so this introduces no CLS.
//
// IMPORTANT: 'tnb-outfit-font' is registered with a `false` src rather than removed.
// Five stylesheets declare it as a dependency (tnb-homepage-nav, tnb-header-footer,
// tnb-blog-detail, tnb-author-profile, tnb-about-v2); deregistering the handle would
// make WordPress silently drop every one of them. A src-less registered handle keeps
// the dependency graph intact, emits no <link>, and still carries inline CSS.
//
// Outfit is licensed under the SIL Open Font License 1.1 — self-hosting is permitted.
// License text: assets/fonts/outfit/OFL.txt
add_action('wp_enqueue_scripts', 'tnb_register_outfit_font', 1);
function tnb_register_outfit_font(): void
{
	if (is_admin()) {
		return;
	}

	wp_register_style('tnb-outfit-font', false, array(), null);

	$dir      = get_stylesheet_directory_uri() . '/assets/fonts/outfit';
	$latin    = $dir . '/outfit-v15-latin-var.woff2';
	$latinext = $dir . '/outfit-v15-latin-ext-var.woff2';

	$ext_range  = 'U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF';
	$latin_range = 'U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD';

	$css = '';
	foreach (array(300, 400, 500, 600, 700, 800) as $weight) {
		$css .= sprintf(
			'@font-face{font-family:"Outfit";font-style:normal;font-weight:%1$d;font-display:swap;src:url(%2$s) format("woff2");unicode-range:%3$s}',
			$weight,
			esc_url($latinext),
			$ext_range
		);
		$css .= sprintf(
			'@font-face{font-family:"Outfit";font-style:normal;font-weight:%1$d;font-display:swap;src:url(%2$s) format("woff2");unicode-range:%3$s}',
			$weight,
			esc_url($latin),
			$latin_range
		);
	}

	wp_add_inline_style('tnb-outfit-font', $css);
}


// ─── Runtime URL normalizer — environment-agnostic ───────────────────────────
// ROOT CAUSE: WordPress stores absolute URLs in post_content and attachment meta.
// AIOWPM updates siteurl/home options on import but cannot rewrite every embedded
// URL in post HTML. This normalizer fixes that at output time — no domain list,
// no configuration, works for any source environment.
//
// DETECTION STRATEGY: /wp-content/ in a URL's path is WordPress's definitive
// internal-resource marker. Any absolute URL that (a) contains /wp-content/ and
// (b) has a host that differs from the current home_url() host is a stale
// migration artifact and gets its host+subpath prefix rewritten to home_url().
//
// Legitimate external URLs never contain /wp-content/ so they are never touched.
// Zero DB changes. Zero configuration. Survives every future migration.

function tnb_rewrite_wp_url(string $url): string
{
	if (empty($url)) {
		return $url;
	}

	// Only rewrite absolute http(s) URLs
	if (stripos($url, 'http') !== 0) {
		return $url;
	}

	static $current_host = null;
	static $home_base    = null;
	if ($current_host === null) {
		$home_base    = untrailingslashit(home_url());
		$current_host = strtolower((string) parse_url($home_base, PHP_URL_HOST));
	}

	$url_host = strtolower((string) parse_url($url, PHP_URL_HOST));

	// Already on current host — nothing to do
	if ($url_host === $current_host) {
		return $url;
	}

	$path = (string) parse_url($url, PHP_URL_PATH);

	// /wp-content/ is the definitive WP internal-resource path marker.
	// Any other path (page slugs, REST routes, etc.) is left untouched here —
	// those are handled by the one-time tnb_fix_links migration tool.
	$wpc = strpos($path, '/wp-content/');
	if ($wpc === false) {
		return $url;
	}

	// Strip any old subpath prefix (e.g. /technbrains/) — take from /wp-content/ onwards
	$resource_path = substr($path, $wpc);

	$query    = parse_url($url, PHP_URL_QUERY);
	$fragment = parse_url($url, PHP_URL_FRAGMENT);

	$new = $home_base . $resource_path;
	if ($query)    { $new .= '?' . $query; }
	if ($fragment) { $new .= '#' . $fragment; }

	return $new;
}

function tnb_rewrite_content_urls(string $html): string
{
	// Quick bail — avoid regex overhead when no stale /wp-content/ URLs are present
	if (empty($html) || strpos($html, '/wp-content/') === false) {
		return $html;
	}

	static $current_host = null;
	if ($current_host === null) {
		$current_host = strtolower((string) parse_url(home_url(), PHP_URL_HOST));
	}

	// If every /wp-content/ occurrence already uses the current host, bail
	// (avoids running preg_replace_callback on already-clean content)
	if (! preg_match('#https?://(?!' . preg_quote($current_host, '#') . ')[^/\s"\']+/[^\s"\']*wp-content/#i', $html)) {
		return $html;
	}

	// Match any absolute URL that contains /wp-content/ in its path.
	// Stops at characters that cannot appear unencoded inside a URL attribute or srcset entry.
	return preg_replace_callback(
		'#https?://[^/\s"\']+(?:/[^\s"\'>,\)]*)?/wp-content/[^\s"\'>,\)]*#i',
		static function (array $m): string {
			return tnb_rewrite_wp_url($m[0]);
		},
		$html
	);
}

// ── Filters ──────────────────────────────────────────────────────────────────
// Priority 5 — fires before WP Rocket (lazy-load, RUCSS) which run at 10+,
// ensuring they receive already-correct URLs.

// HTML output: post content, excerpts, featured image markup
add_filter('the_content',         'tnb_rewrite_content_urls', 5);
add_filter('the_excerpt',         'tnb_rewrite_content_urls', 5);
add_filter('post_thumbnail_html', 'tnb_rewrite_content_urls', 5);

// Single attachment URL (get_the_post_thumbnail_url, wp_get_attachment_url, …)
add_filter('wp_get_attachment_url', 'tnb_rewrite_wp_url', 5);

// Srcset array — fires before WP Rocket converts srcset → data-lazy-srcset
add_filter('wp_calculate_image_srcset', static function (array $sources): array {
	foreach ($sources as &$s) {
		if (isset($s['url'])) {
			$s['url'] = tnb_rewrite_wp_url($s['url']);
		}
	}
	return $sources;
}, 5);

// [url, width, height, is_resized] from wp_get_attachment_image_src()
add_filter('wp_get_attachment_image_src', static function ($image) {
	if (is_array($image) && ! empty($image[0])) {
		$image[0] = tnb_rewrite_wp_url($image[0]);
	}
	return $image;
}, 5);

// ─── Blog: nofollow all external links in post content ───────────────────────
add_filter('the_content', function (string $content): string {
	if (get_post_type() !== 'post') {
		return $content;
	}

	$home_host = strtolower(parse_url(home_url(), PHP_URL_HOST));
	// Strip www. so technbrains.com and www.technbrains.com both treated as internal
	$bare_home = preg_replace('/^www\./i', '', $home_host);

	return preg_replace_callback(
		'/<a\s([^>]*)>/i',
		function (array $m) use ($bare_home): string {
			$attrs = $m[1];

			// Extract href value
			if (! preg_match('/\bhref=["\']([^"\']*)["\']/', $attrs, $href_match)) {
				return $m[0]; // no href — leave alone
			}

			$href = $href_match[1];

			// Skip empty, relative paths, and fragment-only links
			if ($href === '' || $href[0] === '/' || $href[0] === '#' || $href[0] === '?') {
				return $m[0];
			}

			// Skip mailto: / tel: / javascript:
			if (preg_match('/^(mailto|tel|javascript):/i', $href)) {
				return $m[0];
			}

			// Skip internal links
			$link_host = strtolower((string) parse_url($href, PHP_URL_HOST));
			$bare_link  = preg_replace('/^www\./i', '', $link_host);
			if ($bare_link === '' || $bare_link === $bare_home) {
				return $m[0];
			}

			// External link — build/merge rel attribute
			if (preg_match('/\brel=["\']([^"\']*)["\']/', $attrs, $rel_match)) {
				$parts = preg_split('/\s+/', trim($rel_match[1]));
				foreach (array('nofollow', 'noopener', 'noreferrer') as $token) {
					if (! in_array($token, $parts, true)) {
						$parts[] = $token;
					}
				}
				$new_rel = implode(' ', array_filter($parts));
				$attrs   = preg_replace('/\brel=["\'][^"\']*["\']/', 'rel="' . $new_rel . '"', $attrs);
			} else {
				$attrs .= ' rel="nofollow noopener noreferrer"';
			}

			return '<a ' . $attrs . '>';
		},
		$content
	);
});

/**
 * Customize Yoast SEO Open Graph (og:type) based on the URL structure.
 * This ensures that only URLs containing '/blog/' are treated as articles,
 * while all other pages default to 'website'.
 */
// add_filter( 'wpseo_opengraph_type', 'custom_yoast_og_type_fix' );

// function custom_yoast_og_type_fix( $type ) {
//     // Get the current page URL path
//     $current_url = $_SERVER['REQUEST_URI'];

//     // If the URL contains '/blog/', set the Open Graph type to 'article'
//     if ( strpos( $current_url, '/blog/' ) !== false ) {
//         return 'article';
//     } 
//     // For all other pages, force the Open Graph type to 'website'
//     else {
//         return 'website';
//     }
// }

/**
 * Customize Yoast SEO Open Graph (og:type): only a single post is an article.
 *
 * This used to test whether the request URI contained '/blog/'. The permalink structure is
 * /blog/%postname%/, so that was true for the blog listing and every /blog/page/N/ as well,
 * and the listing announced itself as an article. The post type is the actual question being
 * asked, so it is what the check now reads.
 */
add_filter( 'wpseo_opengraph_type', 'custom_yoast_og_type_fix' );

function custom_yoast_og_type_fix( $type ) {
    return is_singular( 'post' ) ? 'article' : 'website';
}



/**
 * SCHEMA TRAILING SLASH FIX (Targeting "url" and "@id" Keys Only)
 */
function perfect_schema_slash_fix( $html ) {
    if ( empty( $html ) ) {
        return $html;
    }

    return preg_replace_callback(
        '/<script\b[^>]*type=["\']application\/ld\+json["\'][^>]*>(.*?)<\/script>/is',
        function ( $script_matches ) {
            $full_tag = $script_matches[0];
            $schema_json = $script_matches[1];

            $fixed_json = preg_replace_callback(
                '/("(?:url|@id)"\s*:\s*")([^"\']+)"/i',
                function ( $key_matches ) {
                    $key_part = $key_matches[1];
                    $url      = trim($key_matches[2]);

                    if ( strpos( $url, 'schema.org' ) !== false ) {
                        return $key_part . $url . '"';
                    }

                    if ( substr( $url, -2 ) === '//' ) {
                        return $key_part . rtrim($url, '/') . '/"';
                    }

                    if ( 
                        substr( $url, -1 ) === '/' || 
                        strpos( $url, '?' ) !== false || 
                        strpos( $url, '#' ) !== false
                    ) {
                        return $key_part . $url . '"';
                    }

                    if ( preg_match( '/^https?:\/\/[^\/]+$/i', $url ) ) {
                        return $key_part . $url . '/"';
                    }

                    if ( preg_match( '/\.(png|jpg|jpeg|gif|webp|svg|xml|json|css|js|woff2?|ttf)$/i', $url ) ) {
                        return $key_part . $url . '"';
                    }

                    return $key_part . $url . '/"';
                },
                $schema_json
            );

            return str_replace( $schema_json, $fixed_json, $full_tag );
        },
        $html
    );
}
add_action( 'template_redirect', function() {
    ob_start( 'perfect_schema_slash_fix' );
});

 
/**
 * Yoast X (Twitter) cards: a page's explicit X fields (Yoast panel → Social →
 * X tab) win; every other case gets the brand defaults below. Yoast's own
 * og/meta fallbacks are intentionally bypassed per client requirement.
 */
function tnb_yoast_twitter_field( $key ) {
	if ( ! is_singular() ) {
		return '';
	}
	$value = get_post_meta( get_queried_object_id(), '_yoast_wpseo_twitter-' . $key, true );
	if ( ! is_string( $value ) || trim( $value ) === '' ) {
		return '';
	}
	if ( function_exists( 'wpseo_replace_vars' ) ) {
		$value = wpseo_replace_vars( $value, get_queried_object() );
	}
	return trim( $value );
}

add_filter( 'wpseo_twitter_title', function ( $title ) {
	$custom = tnb_yoast_twitter_field( 'title' );
	if ( $custom !== '' ) {
		return $custom;
	}
	return 'TechnBrains – Software Development & Staff Augmentation';
} );

add_filter( 'wpseo_twitter_description', function ( $description ) {
	$custom = tnb_yoast_twitter_field( 'description' );
	if ( $custom !== '' ) {
		return $custom;
	}
	return 'Build software products and scale engineering teams with TechnBrains. Hire senior developers or outsource mobile, web, AI, and enterprise development projects.';
} );

add_filter( 'wpseo_twitter_image', function ( $image_url ) {
	$custom = tnb_yoast_twitter_field( 'image' );
	if ( $custom !== '' ) {
		return $custom;
	}
	return get_site_url() . '/wp-content/uploads/2026/06/tnb-og-image.png';
} );

// ─── Author archive: base = /blog/author/, assets, body class, AJAX ──────────
// Author profile template lives at author.php (dynamic, per-author). See that
// file + template-parts/author-contrib-card.php + assets/css|js/author-profile.*.

// Author archive URLs are /blog/author/{nicename}/ automatically: the permalink
// front (/blog/) is prepended to WordPress's default author_base ('author'), so
// NO author_base override is needed (overriding to 'blog/author' would double the
// front → /blog/blog/author/). We only flush once so the author rules regenerate
// under the /blog/ front. Guard bumped to re-flush environments where an earlier
// base override left stale rules.
add_action('init', 'tnb_author_flush_rewrite', 1000);
function tnb_author_flush_rewrite()
{
	if (get_option('tnb_author_rw_version') !== '2') {
		flush_rewrite_rules(false);
		update_option('tnb_author_rw_version', '2');
	}
}


// Author archive shows 9 posts per page (matches the QA contributions grid). Single
// source of truth, reused by the main query (below) and the Load More AJAX handler.
function tnb_author_posts_per_page()
{
	return 9;
}
add_action('pre_get_posts', 'tnb_author_set_ppp');
function tnb_author_set_ppp($query)
{
	if (!is_admin() && $query->is_main_query() && $query->is_author()) {
		$query->set('posts_per_page', tnb_author_posts_per_page());
	}
}

// Scope the author-profile CSS by tagging <body> with .ap-body on author archives.
add_filter('body_class', 'tnb_author_body_class');
function tnb_author_body_class($classes)
{
	if (is_author()) {
		$classes[] = 'ap-body';
	}
	return $classes;
}


// Enqueue author-profile assets only on author archives (own callback — does not
// touch tnb_enqueue_assets). Outfit font matches the design.
add_action('wp_enqueue_scripts', 'tnb_author_enqueue_assets');
function tnb_author_enqueue_assets()
{
	if (!is_author()) {
		return;
	}

	// Self-hosted — faces are registered in tnb_register_outfit_font().
	wp_enqueue_style('tnb-outfit-font');

	$css_path = get_stylesheet_directory() . '/assets/css/author-profile.css';
	wp_enqueue_style(
		'tnb-author-profile',
		get_stylesheet_directory_uri() . '/assets/css/author-profile.css',
		array('tnb-outfit-font'),
		file_exists($css_path) ? filemtime($css_path) : null
	);

	$js_path = get_stylesheet_directory() . '/assets/js/author-profile.js';
	wp_enqueue_script(
		'tnb-author-js',
		get_stylesheet_directory_uri() . '/assets/js/author-profile.js',
		array(),
		file_exists($js_path) ? filemtime($js_path) : null,
		true
	);
	wp_localize_script('tnb-author-js', 'tnbAP', array(
		'ajaxUrl' => admin_url('admin-ajax.php'),
		'nonce'   => wp_create_nonce('tnb_author_more'),
	));
}

// AJAX: load the next page of the author's posts (Load More). Renders the SAME
// card partial as author.php so markup is identical.
add_action('wp_ajax_tnb_author_load_more', 'tnb_author_load_more');
add_action('wp_ajax_nopriv_tnb_author_load_more', 'tnb_author_load_more');
function tnb_author_load_more()
{
	check_ajax_referer('tnb_author_more', 'nonce');

	$author = isset($_POST['author']) ? absint($_POST['author']) : 0;
	$page   = isset($_POST['page']) ? max(1, absint($_POST['page'])) : 1;
	if (!$author) {
		wp_send_json_error();
	}

	$q = new WP_Query(array(
		'author'              => $author,
		'post_status'         => 'publish',
		'paged'               => $page,
		'posts_per_page'      => tnb_author_posts_per_page(),
		'ignore_sticky_posts' => true,
	));

	ob_start();
	if ($q->have_posts()) {
		while ($q->have_posts()) {
			$q->the_post();
			get_template_part('template-parts/author-contrib-card');
		}
	}
	wp_reset_postdata();
	$html = ob_get_clean();

	wp_send_json_success(array(
		'html'    => $html,
		'hasMore' => ($page < (int) $q->max_num_pages),
	));
}


/* ============================================================
 * SVG uploads — administrators & authors only, with sanitisation.
 * WordPress blocks SVG by default because they can embed active
 * content (scripts, event handlers). We (a) allow the mime type only
 * for the two roles, (b) correct WP's content-based filetype check for
 * .svg, and (c) strip scripts / event handlers / javascript: URLs /
 * foreign objects / DOCTYPE-ENTITY declarations from the markup before
 * it is stored. .svgz (gzipped) is intentionally NOT allowed — it can't
 * be sanitised without decompression.
 * ============================================================ */

/** Who may upload SVGs: administrators and authors only. */
function tnb_can_upload_svg() {
	if ( ! is_user_logged_in() ) {
		return false;
	}
	$user    = wp_get_current_user();
	$allowed = array( 'administrator', 'author' );
	return (bool) array_intersect( $allowed, (array) $user->roles );
}

/** Allow the SVG mime type for the permitted roles. */
add_filter( 'upload_mimes', 'tnb_svg_upload_mimes' );
function tnb_svg_upload_mimes( $mimes ) {
	if ( tnb_can_upload_svg() ) {
		$mimes['svg'] = 'image/svg+xml';
	}
	return $mimes;
}

/** Correct WP's content-based filetype check so .svg is accepted. */
add_filter( 'wp_check_filetype_and_ext', 'tnb_svg_check_filetype', 10, 4 );
function tnb_svg_check_filetype( $data, $file, $filename, $mimes ) {
	if ( tnb_can_upload_svg() && preg_match( '/\.svg$/i', $filename ) ) {
		$data['ext']  = 'svg';
		$data['type'] = 'image/svg+xml';
	}
	return $data;
}

/** Sanitise SVG markup on upload; block the upload if it can't be made safe. */
add_filter( 'wp_handle_upload_prefilter', 'tnb_svg_sanitize_on_upload' );
function tnb_svg_sanitize_on_upload( $file ) {
	if ( empty( $file['type'] ) || 'image/svg+xml' !== $file['type'] ) {
		return $file;
	}
	if ( ! tnb_can_upload_svg() ) {
		$file['error'] = __( 'You are not allowed to upload SVG files.', 'technbrains-child' );
		return $file;
	}

	$svg = file_get_contents( $file['tmp_name'] );
	if ( false === $svg || '' === trim( $svg ) ) {
		$file['error'] = __( 'The SVG file could not be read.', 'technbrains-child' );
		return $file;
	}

	$clean = tnb_sanitize_svg_markup( $svg );
	if ( null === $clean ) {
		$file['error'] = __( 'The SVG file is invalid or could not be sanitised.', 'technbrains-child' );
		return $file;
	}

	file_put_contents( $file['tmp_name'], $clean );
	return $file;
}

/**
 * Strip active/dangerous content from SVG markup.
 *
 * @param string $svg Raw SVG markup.
 * @return string|null Cleaned markup, or null if it cannot be parsed as an <svg>.
 */
function tnb_sanitize_svg_markup( $svg ) {
	// Remove DOCTYPE / ENTITY declarations (XXE / billion-laughs) before parsing.
	$svg = preg_replace( '/<!DOCTYPE[^>]*(\[[^\]]*\])?>/is', '', $svg );
	$svg = preg_replace( '/<!ENTITY[^>]*>/is', '', $svg );

	$dom  = new DOMDocument();
	$prev = libxml_use_internal_errors( true );
	// LIBXML_NONET blocks network access; do NOT pass NOENT (that would expand entities).
	$loaded = $dom->loadXML( $svg, LIBXML_NONET );
	libxml_clear_errors();
	libxml_use_internal_errors( $prev );

	if ( ! $loaded || ! $dom->documentElement ) {
		return null;
	}
	if ( 'svg' !== strtolower( $dom->documentElement->nodeName ) ) {
		return null;
	}

	// Drop disallowed elements.
	$disallowed = array( 'script', 'foreignObject', 'iframe', 'embed', 'object', 'audio', 'video', 'handler', 'listener', 'set' );
	foreach ( $disallowed as $tag ) {
		$nodes = $dom->getElementsByTagName( $tag );
		for ( $i = $nodes->length - 1; $i >= 0; $i-- ) {
			$node = $nodes->item( $i );
			if ( $node && $node->parentNode ) {
				$node->parentNode->removeChild( $node );
			}
		}
	}

	// Strip event handlers and javascript:/vbscript: URLs from every element.
	$xpath = new DOMXPath( $dom );
	foreach ( $xpath->query( '//*' ) as $el ) {
		if ( ! $el->hasAttributes() ) {
			continue;
		}
		for ( $i = $el->attributes->length - 1; $i >= 0; $i-- ) {
			$attr = $el->attributes->item( $i );
			$name = strtolower( $attr->nodeName );
			$val  = trim( (string) $attr->nodeValue );

			if ( 0 === strpos( $name, 'on' ) ) { // onload, onclick, …
				$el->removeAttributeNode( $attr );
				continue;
			}
			if ( in_array( $name, array( 'href', 'xlink:href', 'src' ), true ) ) {
				if ( preg_match( '/^\s*(javascript|vbscript|data):/i', $val ) && ! preg_match( '#^\s*data:image/#i', $val ) ) {
					$el->removeAttributeNode( $attr );
					continue;
				}
			}
			if ( 'style' === $name && preg_match( '/(expression|javascript:)/i', $val ) ) {
				$el->removeAttributeNode( $attr );
			}
		}
	}

	$out = $dom->saveXML( $dom->documentElement );
	return ( false === $out ) ? null : $out;
}

/** Show SVG thumbnails in the Media Library for permitted roles. */
add_action( 'admin_head', 'tnb_svg_thumb_css' );
function tnb_svg_thumb_css() {
	if ( ! tnb_can_upload_svg() ) {
		return;
	}
	echo '<style>.attachment .thumbnail img[src$=".svg"],.media-icon img[src$=".svg"]{width:100%;height:auto}</style>';
}

/******* MEDIA MAX SIZE *******/ 
// add_filter( 'wp_handle_upload_prefilter', 'limit_image_upload_size' );

// function limit_image_upload_size( $file ) {
//     // 1024 bytes * 100 = 102,400 bytes (100KB)
//     $limit = 100 * 1024; 
//     $size = $file['size'];

//     // Check if the file is an image
//     $is_image = strpos($file['type'], 'image') !== false;

//     if ( $is_image && $size > $limit ) {
//         $file['error'] = 'Image is too large. Please keep it under 100KB.';
//     }

//     return $file;
// }

/******* MEDIA MAX SIZE END *******/


// ─── Blog Settings options page — site-wide defaults for blog sidebar CTA ────
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title'  => 'Blog Settings',
		'menu_title'  => 'Blog Settings',
		'menu_slug'   => 'tnb-blog-settings',
		'capability'  => 'manage_options',
		'redirect'    => false,
		'parent_slug' => 'themes.php',
	) );
}
 
 
 
 // ─── Admin posts list: author filter via ?author_id= ────────────────────────
// The server's nginx anti-enumeration rule 403s every request whose query
// string contains author=<digits>, including /wp-admin/edit.php?author=N, so
// the core author filter never reaches WordPress. These two hooks provide the
// same filtering through an "author_id" parameter, which the rule ignores.

// Authors dropdown above the posts list table (native "Filter" button applies it).
add_action('restrict_manage_posts', 'tnb_admin_author_filter_dropdown');
function tnb_admin_author_filter_dropdown($post_type)
{
	if ('post' !== $post_type || ! current_user_can('edit_others_posts')) {
		return;
	}
	wp_dropdown_users(array(
		'name'                    => 'author_id',
		'selected'                => isset($_GET['author_id']) ? absint($_GET['author_id']) : 0,
		'show_option_all'         => __('All authors', 'technbrains-child'),
		'has_published_posts'     => array('post'),
		'hide_if_only_one_author' => true,
	));
}

// Map author_id onto the list-table query exactly like the core author param.
add_action('pre_get_posts', 'tnb_admin_author_filter_query');
function tnb_admin_author_filter_query($query)
{
	if (! is_admin() || ! $query->is_main_query() || empty($_GET['author_id'])) {
		return;
	}
	$screen = function_exists('get_current_screen') ? get_current_screen() : null;
	if ($screen && 'edit' !== $screen->base) {
		return;
	}
	$query->set('author', absint($_GET['author_id']));
}



// ─── About Us V2 ("Our Story") — template-scoped assets ──────────────────────
// Own callback rather than an edit inside tnb_enqueue_assets(), matching the
// tnb_author_enqueue_assets() pattern, so the three About V2 blocks stay together
// at the end of this file and survive being merged with another copy of it.
//
// Every rule in about-v2.css is namespaced under .abs-body (see
// tnb_about_v2_body_class below), so it cannot reach any other page. The
// tnb-components dependency is load-bearing: it keeps about-v2.css after
// components.css in the cascade, which is what lets the scoped heading rules win
// on source order without escalating specificity. Dependencies resolve at print
// time, so registering this callback after tnb_enqueue_assets() is fine.
/**
 * Whether the current page uses a given page_sections layout.
 *
 * About V2 became a flexible layout (abs_story), so the page template stopped
 * being a usable signal for gating its assets — the story can now sit on any
 * page built with the Flexible Content template.
 *
 * Reads the raw meta rather than get_field(): the top-level page_sections value
 * is just the ordered list of layout names, so this avoids loading the whole
 * flexible payload on every request just to answer a yes/no. Memoised because
 * both the enqueue and the body_class filter ask the same question.
 *
 * @param string $layout Layout name, e.g. 'abs_story'.
 * @return bool
 */
function tnb_page_has_layout($layout)
{
	static $cache = array();

	if (! is_page()) {
		return false;
	}

	$post_id = get_queried_object_id();
	if (! $post_id) {
		return false;
	}

	$key = $post_id . '|' . $layout;
	if (! isset($cache[$key])) {
		$rows        = get_post_meta($post_id, 'page_sections', true);
		$cache[$key] = is_array($rows) && in_array($layout, $rows, true);
	}

	return $cache[$key];
}

/**
 * Whether the current page renders the About V2 story.
 *
 * The dedicated About Us V2 page template is gone — the story is the abs_story
 * flexible layout now — so presence of that layout is the whole test.
 *
 * @return bool
 */
function tnb_is_about_v2()
{
	return tnb_page_has_layout('abs_story');
}

add_action('wp_enqueue_scripts', 'tnb_about_v2_enqueue_assets');
function tnb_about_v2_enqueue_assets()
{
	if (! tnb_is_about_v2()) {
		return;
	}

	// Self-hosted — faces are registered in tnb_register_outfit_font().
	wp_enqueue_style('tnb-outfit-font');

	// filemtime() is guarded: a missing file would otherwise emit a warning and a
	// broken version string if functions.php is deployed before the assets.
	$abs_css = get_stylesheet_directory() . '/assets/css/about-v2.css';
	wp_enqueue_style(
		'tnb-about-v2',
		get_stylesheet_directory_uri() . '/assets/css/about-v2.css',
		array('tnb-outfit-font', 'tnb-components'),
		file_exists($abs_css) ? filemtime($abs_css) : null
	);

	$abs_js = get_stylesheet_directory() . '/assets/js/about-v2.js';
	wp_enqueue_script(
		'tnb-about-v2-js',
		get_stylesheet_directory_uri() . '/assets/js/about-v2.js',
		array(),
		file_exists($abs_js) ? filemtime($abs_js) : null,
		true  // footer
	);
}

// ─── About Us V2 body class ──────────────────────────────────────────────────
add_filter('body_class', 'tnb_about_v2_body_class');
function tnb_about_v2_body_class($classes)
{
	if (tnb_is_about_v2()) {
		$classes[] = 'abs-body';
	}
	return $classes;
}

// ─── WP Rocket: keep About Us V2 CSS out of "Remove Unused CSS" ──────────────
// RUCSS strips selectors it cannot find in the served HTML. Classes added at
// runtime by about-v2.js — .in, .is-in, .done, .abs-rail-node,
// .abs-rail-traveler, .abs-capcard-ic--img — are never in the markup, so the
// reveals, story rail and card entrances lose their rules entirely. The carousel
// dots are built at runtime too, hence the case-deck entries.
add_filter('rocket_rucss_safelist', 'tnb_about_v2_rucss_safelist');
function tnb_about_v2_rucss_safelist($safelist)
{
	$safelist   = (array) $safelist;
	$safelist[] = '/\.abs-.*/';
	$safelist[] = '.abs-body';
	$safelist[] = '/\.case-deck.*/';
	$safelist[] = '.case-btn';
	return $safelist;
}


// ─── Case Studies — CPT-scoped assets ────────────────────────────────────────
// Own callback rather than an edit inside tnb_enqueue_assets(), matching the
// tnb_about_v2_enqueue_assets() pattern above, so the case study block stays in
// one piece and survives being merged with another copy of this file.
//
// Every rule in case-study.css is namespaced under .cs-page (see
// tnb_case_study_body_class below), so it cannot reach any other page. The
// tnb-components and tnb-responsive dependencies are load-bearing: they keep
// case-study.css last in the cascade, which is what lets its scoped element
// resets beat the theme's bare element rules on source order rather than by
// escalating specificity.
add_action('wp_enqueue_scripts', 'tnb_case_study_enqueue_assets');
function tnb_case_study_enqueue_assets()
{
	if (! is_singular('case_study')) {
		return;
	}

	wp_enqueue_style(
		'tnb-outfit-font',
		'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap',
		array(),
		null
	);

	// filemtime() is guarded: a missing file would otherwise emit a warning and a
	// broken version string if functions.php is deployed before the assets.
	$cs_css = get_stylesheet_directory() . '/assets/css/case-study.css';
	wp_enqueue_style(
		'tnb-case-study',
		get_stylesheet_directory_uri() . '/assets/css/case-study.css',
		array('tnb-outfit-font', 'tnb-components', 'tnb-responsive'),
		file_exists($cs_css) ? filemtime($cs_css) : null
	);

	// Depends on tnb-header-js because the CTA form reads the tnbAjax object that
	// is localized onto that handle.
	$cs_js = get_stylesheet_directory() . '/assets/js/case-study.js';
	wp_enqueue_script(
		'tnb-case-study-js',
		get_stylesheet_directory_uri() . '/assets/js/case-study.js',
		array('tnb-header-js'),
		file_exists($cs_js) ? filemtime($cs_js) : null,
		true  // footer
	);
}


// ─── Case Studies body class ─────────────────────────────────────────────────
add_filter('body_class', 'tnb_case_study_body_class');
function tnb_case_study_body_class($classes)
{
	if (is_singular('case_study')) {
		$classes[] = 'cs-page';
	}
	return $classes;
}

// ─── WP Rocket: keep case study CSS out of "Remove Unused CSS" ───────────────
// RUCSS strips selectors it cannot find in the served HTML. .in and .is-active
// are applied at runtime by case-study.js — the scroll reveals, the lit thread
// nodes and the solution tab panels — so without this the page loads with every
// revealed block still at opacity 0 and no tab able to switch.
add_filter('rocket_rucss_safelist', 'tnb_case_study_rucss_safelist');
function tnb_case_study_rucss_safelist($safelist)
{
	$safelist   = (array) $safelist;
	$safelist[] = '/\.cs-.*/';
	$safelist[] = '.cs-page';
	$safelist[] = '.in';
	$safelist[] = '.lit';
	$safelist[] = '.is-active';
	return $safelist;
}

add_filter('body_class', function ($classes) {
    if (is_singular()) {
        $post = get_queried_object();
        if ($post instanceof WP_Post && '' !== $post->post_name) {
            $classes[] = 'page-slug-' . sanitize_html_class($post->post_name);
        }
    }
    return $classes;
});

// ─── Staff Aug / Software Outsourcing / Dedicated Teams ──────────────────────
// Appended rather than merged in place: these three are self-contained (one shared
// heading helper and two RUCSS safelists), so EOF keeps live's existing ordering
// untouched. Taken verbatim from the stage copy.

// ─── Shared: an authored heading whose red words are marked with a bare <span> ─
// Editors mark the accent with plain <span>…</span>; the styling hook is stamped on
// here so it lives in one place and cannot be typo'd into a heading that then
// renders in the wrong colour. A span that already carries a class is left alone,
// which keeps headings authored before this change rendering exactly as they did.
// Only <br> and <span class> survive — the allowlist runs before the stamp, so an
// attribute stripped by kses can never come back attached to the accent.
function tnb_accent_heading($html)
{
	$clean = wp_kses((string) $html, array(
		'br'   => array(),
		'span' => array('class' => true),
	));

	return preg_replace('/<span(?:\s+class=(["\'])\s*\1)?\s*>/i', '<span class="accent">', $clean);
}

// ─── WP Rocket: keep the landing-section CSS out of "Remove Unused CSS" ──────
// The section behaviour in components.js adds .active, .front, .behind-1,
// .behind-2, .hidden and .is-reached at runtime, and rewrites the connector
// path — none of those selectors appear in the served HTML, so RUCSS would drop
// the rules that make the card stack, the slider and the process rail work.
add_filter('rocket_rucss_safelist', 'tnb_staff_aug_rucss_safelist');
function tnb_staff_aug_rucss_safelist($safelist)
{
	$safelist   = (array) $safelist;
	$safelist[] = '/\.sa-.*/';
	$safelist[] = '.front';
	$safelist[] = '/\.behind-.*/';
	$safelist[] = '.is-reached';
	return $safelist;
}

// ─── WP Rocket: keep the DT / SO CSS out of "Remove Unused CSS" ───────────────
// The delivery board's .is-active and .is-done, the hire orbit's .fresh, and the
// scroll reveal's .in are added by JS and never appear in the served HTML, so
// RUCSS would drop the rules that animate them. .in is listed here rather than
// relying on the About V2 filter's copy — a sibling filter is not a dependency.
add_filter('rocket_rucss_safelist', 'tnb_dt_so_rucss_safelist');
function tnb_dt_so_rucss_safelist($safelist)
{
	$safelist   = (array) $safelist;
	$safelist[] = '/\.dt-.*/';
	$safelist[] = '/\.so-.*/';
	$safelist[] = '.is-active';
	$safelist[] = '.is-done';
	$safelist[] = '.fresh';
	$safelist[] = '.in';
	// The risk-mitigation slider's prev/next/dots reuse the theme's own
	// .case-deck-nav / .case-btn / .case-deck-dot controls, and its dots carry
	// .is-active only after the JS runs. These were previously safelisted just
	// inside the About V2 filter, which made the Software Outsourcing page depend
	// on an unrelated page's filter being present — listed here so this family
	// stands on its own.
	$safelist[] = '/\.case-deck.*/';
	$safelist[] = '.case-btn';
	return $safelist;
}

// ─── WP Rocket: keep the Landing Page hero + its lead form CSS out of "Remove
// Unused CSS" ───────────────────────────────────────────────────────────────
// The submit button's .is-loading and the message box's .hd-form-msg /
// .hd-form-msg--error / .hd-form-msg--success classes are added by lp-hero-form.js
// and never appear in the served HTML, so RUCSS would drop the rules that style
// them. .lp-hero itself builds on the already-safelisted .dt-* shell above.
add_filter('rocket_rucss_safelist', 'tnb_lp_hero_rucss_safelist');
function tnb_lp_hero_rucss_safelist($safelist)
{
	$safelist   = (array) $safelist;
	$safelist[] = '/\.lp-hero.*/';
	$safelist[] = '/\.lp-nav.*/';
	$safelist[] = '/\.hd-form-msg.*/';
	$safelist[] = '.is-loading';
	$safelist[] = '.is-scrolled';
	return $safelist;
}

// ─── Outfit body copy — the three flexible-content landing pages ─────────────
// Their headings already render Outfit; this class is what lets components.css flip
// the inherited paragraph font inside #main without touching the site-wide font.
// Scoped to #main there, so header and footer keep Montserrat.
//
// Slugs are live's own, read off each page's body class — Dedicated Teams is
// hire-dedicated-team here, not dedicated-teams as on stage. Stage also lists eight
// further slugs (about-us, services, hire-software-developers, platforms,
// technologies, locations, industries); they are out of scope for this release and
// keep their current body font. Add a slug to opt a new page in.
add_filter('body_class', function ($classes) {
    $outfit_pages = array(
        'staff-augmentation',
        'software-outsourcing',
        'hire-dedicated-team',
        // Staging slug. Rename to construction-software-development when the page
        // goes live, or its body copy falls back to Montserrat.
        'construction-software-development',
		'mobile-app-development',
'logistics-software-development',		
		
    );
    if (is_page($outfit_pages)) {
        $classes[] = 'tnb-outfit-page';
    }
    return $classes;
});

// Same Outfit-body-copy opt-in as above, but for the Landing Page family: LP pages
// carry arbitrary/per-campaign slugs, so a fixed slug allowlist doesn't fit — key it
// off the lp_hero layout being present instead, via the same tnb_page_has_layout()
// helper used for the LP nav swap.
add_filter('body_class', function ($classes) {
    if (function_exists('tnb_page_has_layout') && tnb_page_has_layout('lp_hero')) {
        $classes[] = 'tnb-outfit-page';
    }
    return $classes;
});

// ─── Construction Software Development ───────────────────────────────────────
// Appended rather than merged into tnb_enqueue_assets(), matching the About V2 and
// case study blocks above: this page's assets, its RUCSS safelist and its FAQ schema
// stay in one piece at EOF and survive this file being merged with another copy.
//
// The require sits here rather than beside the includes at the top of the file
// because nothing in it is called until a template renders, which is long after
// functions.php has finished loading.
require_once get_stylesheet_directory() . '/inc/construction-helpers.php';

/**
 * Whether the current page places any Construction Software section.
 *
 * Deliberately not tnb_page_has_layout() in a loop: the question here is "any cn_*
 * layout", not "this exact layout", and expressing that through that helper would
 * mean hard-coding all eighteen layout names in a second place that then has to be
 * kept in step with inc/acf-fields.php and the dispatcher. A prefix test over the
 * raw meta answers it without a list.
 *
 * Reads post meta rather than get_field(): the top-level page_sections value is the
 * ordered list of layout names, so this avoids loading the whole flexible payload
 * on every request just to decide whether to enqueue a stylesheet. Memoised because
 * the enqueue, the body class and the FAQ schema all ask the same question.
 *
 * @return bool
 */
function tnb_is_construction_page()
{
	static $cache = array();

	if (! is_page()) {
		return false;
	}

	$post_id = get_queried_object_id();
	if (! $post_id) {
		return false;
	}

	if (! isset($cache[$post_id])) {
		$cache[$post_id] = false;

		foreach ((array) get_post_meta($post_id, 'page_sections', true) as $layout) {
			if (0 === strpos((string) $layout, 'cn_')) {
				$cache[$post_id] = true;
				break;
			}
		}
	}

	return $cache[$post_id];
}

// Every rule in construction.css is namespaced under a .cn-* class, so it cannot
// reach any other page even where it restyles a shared class — those six rules are
// each qualified by a cn- ancestor. The tnb-components and tnb-responsive
// dependencies are load-bearing: they keep construction.css last in the cascade,
// which is what lets those scoped rules win on source order instead of by
// escalating specificity.
add_action('wp_enqueue_scripts', 'tnb_construction_enqueue_assets');
function tnb_construction_enqueue_assets()
{
	if (! tnb_is_construction_page()) {
		return;
	}

	wp_enqueue_style('tnb-outfit-font');

	// filemtime() is guarded: a missing file would otherwise emit a warning and a
	// broken version string if functions.php is deployed before the assets.
	$cn_css = get_stylesheet_directory() . '/assets/css/construction.css';
	wp_enqueue_style(
		'tnb-construction',
		get_stylesheet_directory_uri() . '/assets/css/construction.css',
		array('tnb-outfit-font', 'tnb-components', 'tnb-responsive'),
		file_exists($cn_css) ? filemtime($cn_css) : null
	);

	// No script dependency: construction.js shares no symbols with components.js and
	// initialises itself off document.readyState. The .dt-rev reveal it leaves to
	// components.js is enqueued site-wide, so it is present regardless of order.
	$cn_js = get_stylesheet_directory() . '/assets/js/construction.js';
	wp_enqueue_script(
		'tnb-construction-js',
		get_stylesheet_directory_uri() . '/assets/js/construction.js',
		array(),
		file_exists($cn_js) ? filemtime($cn_js) : null,
		true  // footer
	);
}

// ─── WP Rocket: keep the construction CSS out of "Remove Unused CSS" ─────────
// RUCSS strips selectors it cannot find in the served HTML. Everything listed here
// is stamped on by construction.js after load — the deck's front and side cards,
// the review window, the tab panels and the FAQ rows — so without this the page
// would load with every panel collapsed and no control able to change it. The
// static .cn-*, .dt-*, .case-* and .so-* classes are in the markup and need no
// entry. Listed in this filter rather than relying on the DT / SO one: a sibling
// filter is not a dependency.
add_filter('rocket_rucss_safelist', 'tnb_construction_rucss_safelist');
function tnb_construction_rucss_safelist($safelist)
{
	$safelist   = (array) $safelist;
	$safelist[] = '/\.cn-.*/';
	$safelist[] = '.is-c';
	$safelist[] = '.is-l';
	$safelist[] = '.is-r';
	$safelist[] = '.is-far';
	$safelist[] = '.is-front';
	$safelist[] = '/\.is-side.*/';
	$safelist[] = '.is-active';
	$safelist[] = '.is-open';
	return $safelist;
}

// ─── FAQPage JSON-LD — construction page only ────────────────────────────────
// Emitted from here rather than from Platform-faqs.php on purpose. That component is
// shared by every platform page, so making it output schema would start emitting a
// FAQPage site-wide — a behaviour change on pages nobody asked to change, and a
// duplicate wherever a page already ships its own. Gated the same way
// tnb_breadcrumb_schema() guards BreadcrumbList: if the page's own head_schema
// already carries a FAQPage, this stays quiet.
add_action('wp_head', 'tnb_construction_faq_schema', 12);
function tnb_construction_faq_schema()
{
	if (! tnb_is_construction_page() || ! function_exists('have_rows')) {
		return;
	}

	$page_schema = function_exists('get_field') ? (string) get_field('head_schema') : '';
	if ('' !== $page_schema && false !== strpos($page_schema, 'FAQPage')) {
		return;
	}

	$entities = array();

	if (have_rows('page_sections')) {
		while (have_rows('page_sections')) {
			the_row();

			if ('platform_faqs' !== get_row_layout()) {
				continue;
			}

			foreach ((array) get_sub_field('pfaq_faqs') as $faq) {
				// wp_strip_all_tags, not esc_html: JSON-LD carries plain text, and an
				// entity-encoded tag would be read as literal markup in the answer.
				$question = trim(wp_strip_all_tags((string) ($faq['pfaq_question'] ?? '')));
				$answer   = trim(wp_strip_all_tags((string) ($faq['pfaq_answer'] ?? '')));

				if ('' === $question || '' === $answer) {
					continue;
				}

				$entities[] = array(
					'@type'          => 'Question',
					'name'           => $question,
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => $answer,
					),
				);
			}
		}
	}

	if (! $entities) {
		return;
	}

	echo '<script type="application/ld+json">' .
		wp_json_encode(
			array(
				'@context'   => 'https://schema.org',
				'@type'      => 'FAQPage',
				'mainEntity' => $entities,
			),
			JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
		) .
		"</script>\n";
}

// ─── Article template family (Procore Alternatives + sibling buyer's-guide pages) ────
// Same placement rationale as the Construction block above: appended here so this
// family's assets, gating and RUCSS safelist stay together at EOF, and required late
// because nothing in it runs until a template renders.
require_once get_stylesheet_directory() . '/inc/article-helpers.php';

/**
 * Whether the current page places any Article-family (`art_*`) section.
 *
 * Mirrors tnb_is_construction_page()'s prefix-over-meta approach for the same reason:
 * this only needs "any art_* layout", not a specific one, without hard-coding all
 * fifteen layout names a second time.
 *
 * @return bool
 */
function tnb_is_article_page()
{
	static $cache = array();

	if (! is_page()) {
		return false;
	}

	$post_id = get_queried_object_id();
	if (! $post_id) {
		return false;
	}

	if (! isset($cache[$post_id])) {
		$cache[$post_id] = false;

		foreach ((array) get_post_meta($post_id, 'page_sections', true) as $layout) {
			if (0 === strpos((string) $layout, 'art_')) {
				$cache[$post_id] = true;
				break;
			}
		}
	}

	return $cache[$post_id];
}

/**
 * Whether the sidebar TOC should actually render for the current page.
 *
 * Single source of truth for the toggle-plus-content check, shared by
 * page-templates/page-flexible.php (decides whether to wrap output in .art-layout) and
 * the article-toc.js enqueue below — no point loading the script for an <aside> that
 * never renders.
 *
 * @param int $post_id
 * @return bool
 */
function tnb_article_sidebar_should_render($post_id)
{
	if (! function_exists('get_field') || ! $post_id) {
		return false;
	}

	if (! get_field('tnb_show_sidebar', $post_id)) {
		return false;
	}

	foreach ((array) get_field('tnb_toc_items', $post_id) as $item) {
		$link = (array) ($item['toc_link'] ?? array());
		if ('' !== trim((string) ($link['title'] ?? '')) && '' !== trim((string) ($link['url'] ?? ''))) {
			return true;
		}
	}

	return false;
}

add_action('wp_enqueue_scripts', 'tnb_article_enqueue_assets');
function tnb_article_enqueue_assets()
{
	if (! is_page()) {
		return;
	}

	$post_id     = get_queried_object_id();
	$has_sidebar = $post_id && tnb_article_sidebar_should_render($post_id);

	if (! tnb_is_article_page() && ! $has_sidebar) {
		return;
	}

	wp_enqueue_style('tnb-outfit-font');

	$art_css = get_stylesheet_directory() . '/assets/css/article.css';
	wp_enqueue_style(
		'tnb-article',
		get_stylesheet_directory_uri() . '/assets/css/article.css',
		array('tnb-outfit-font', 'tnb-components', 'tnb-responsive'),
		file_exists($art_css) ? filemtime($art_css) : null
	);

	// article-toc.js also carries the cost calculator's interactive logic (its own independent
	// IIFE in that file — see the "COST CALCULATOR" section) — that needs to load whenever the
	// calculator layout is present, not only when the sidebar toggle is on.
	if ($has_sidebar || tnb_page_has_layout('art_cost_calculator')) {
		$art_js = get_stylesheet_directory() . '/assets/js/article-toc.js';
		wp_enqueue_script(
			'tnb-article-toc-js',
			get_stylesheet_directory_uri() . '/assets/js/article-toc.js',
			array(),
			file_exists($art_js) ? filemtime($art_js) : null,
			true // footer
		);
	}
}

// ─── WP Rocket: keep the article CSS out of "Remove Unused CSS" ──────────────────
// article-toc.js stamps .is-active on the current TOC link at scroll time, so that
// class needs the same "trust it, don't strip it" treatment RUCSS gets elsewhere in
// this file for JS-driven state classes.
add_filter('rocket_rucss_safelist', 'tnb_article_rucss_safelist');
function tnb_article_rucss_safelist($safelist)
{
	$safelist   = (array) $safelist;
	$safelist[] = '/\.art-.*/';
	$safelist[] = '/\.pa-.*/';
	$safelist[] = '/\.cost-model.*/';
	$safelist[] = '.is-active';
	return $safelist;
}

// ─── FAQPage JSON-LD — article-family pages only ─────────────────────────────
// Mirrors tnb_construction_faq_schema() above for the same reason: platform_faqs is
// shared site-wide and doesn't emit its own schema (that would fire on every platform
// page, a behaviour change nobody asked for), so a page that actually needs FAQPage
// markup emits it itself, gated the same way — skipped if the page's own head_schema
// already carries a FAQPage.
add_action('wp_head', 'tnb_article_faq_schema', 12);
function tnb_article_faq_schema()
{
	if (! tnb_is_article_page() || ! function_exists('have_rows')) {
		return;
	}

	$page_schema = function_exists('get_field') ? (string) get_field('head_schema') : '';
	if ('' !== $page_schema && false !== strpos($page_schema, 'FAQPage')) {
		return;
	}

	$entities = array();

	if (have_rows('page_sections')) {
		while (have_rows('page_sections')) {
			the_row();

			if ('platform_faqs' !== get_row_layout()) {
				continue;
			}

			foreach ((array) get_sub_field('pfaq_faqs') as $faq) {
				// wp_strip_all_tags, not esc_html: JSON-LD carries plain text, and an
				// entity-encoded tag would be read as literal markup in the answer.
				$question = trim(wp_strip_all_tags((string) ($faq['pfaq_question'] ?? '')));
				$answer   = trim(wp_strip_all_tags((string) ($faq['pfaq_answer'] ?? '')));

				if ('' === $question || '' === $answer) {
					continue;
				}

				$entities[] = array(
					'@type'          => 'Question',
					'name'           => $question,
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => $answer,
					),
				);
			}
		}
	}

	if (! $entities) {
		return;
	}

	echo '<script type="application/ld+json">' .
		wp_json_encode(
			array(
				'@context'   => 'https://schema.org',
				'@type'      => 'FAQPage',
				'mainEntity' => $entities,
			),
			JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
		) .
		"</script>\n";
}

/******* CUSTOM LOGIN URL *******/

add_action('init', 'manage_custom_brand_login');
function manage_custom_brand_login() {
    $requested_path = untrailingslashit( strtok( $_SERVER['REQUEST_URI'], '?' ) );
    $secret_slug    = '/brand-dashboard';

    // ── 1. SERVING THE CUSTOM LOGIN PAGE ─────────────────────────────────────
    if ( $requested_path === $secret_slug ) {

        // Logged-in users who hit the login URL go straight to the dashboard.
        if ( is_user_logged_in() ) {
            wp_redirect( admin_url() );
            exit;
        }

        require_once ABSPATH . 'wp-login.php';
        exit;
    }

    // ── 2. INTERIM-LOGIN BYPASS (the core fix) ────────────────────────────────
    $is_interim = isset( $_REQUEST['interim-login'] ) && $_REQUEST['interim-login'] == '1';

    if ( $is_interim ) {
        // Build redirect: home + secret_slug + original query string.
        $qs       = $_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '';
        $redirect = home_url( $secret_slug . $qs );
        wp_redirect( $redirect );
        exit;
    }

    // ── 3. BLOCK DIRECT ACCESS TO wp-login.php / wp-admin ────────────────────
    global $pagenow;
    $is_login_page    = ( $pagenow === 'wp-login.php' );
    $is_admin_request = is_admin() && ! defined( 'DOING_AJAX' );

    if ( $is_login_page || $is_admin_request ) {
        if ( ! is_user_logged_in() && $requested_path !== $secret_slug ) {
            global $wp_query;
            $wp_query->set_404();
            status_header( 404 );
            get_template_part( '404' );
            exit;
        }
    }
}

// ── 4. POST-LOGIN REDIRECT ────────────────────────────────────────────────────

add_filter( 'login_redirect', function ( $redirect_to, $request, $user ) {
    return ( isset( $user->roles ) && is_array( $user->roles ) )
        ? admin_url()
        : $redirect_to;
}, 10, 3 );

// ── 5. REWRITE INTERNAL login_url() CALLS ────────────────────────────────────
add_filter( 'site_url', 'fix_login_links', 10, 4 );
function fix_login_links( $url, $path, $scheme, $blog_id ) {
    if (
        strpos( $url, 'wp-login.php' ) !== false &&
        strpos( $url, 'action=logout' ) === false
    ) {
        return str_replace( 'wp-login.php', 'brand-dashboard', $url );
    }
    return $url;
}

// ── 6. POST-LOGOUT REDIRECT ───────────────────────────────────────────────────
add_action( 'wp_logout', 'redirect_after_logout_to_custom_slug' );
function redirect_after_logout_to_custom_slug() {
    wp_redirect( home_url( '/brand-dashboard' ) );
    exit;
}

// ── 7. INTERIM-LOGIN "CLOSE & RELOAD" JAVASCRIPT ─────────────────────────────
add_action( 'login_footer', 'ensure_interim_login_close_script' );
function ensure_interim_login_close_script() {
    // Only act when we are inside an interim-login popup.
    if ( empty( $_REQUEST['interim-login'] ) ) {
        return;
    }

    if ( ! isset( $GLOBALS['interim_login'] ) || $GLOBALS['interim_login'] !== 'success' ) {
        return;
    }
    ?>
    <script type="text/javascript">
        /* Interim-login success: close modal and reload the parent admin page. */
        ( function () {
            function wpInterimLoginClose() {
                var p = window.opener || ( window.parent !== window ? window.parent : null );
                if ( p ) {
                    p.location.reload( true );
                }
                window.close();
            }
            // Give the browser a tick to finish painting before closing.
            setTimeout( wpInterimLoginClose, 200 );
        } )();
    </script>
    <?php
}

/******* CUSTOM LOGIN URL END *******/


// ─── Mobile App Development ───────────────────────────────────────────────────
// Same shape as Construction/Logistics above: own icon-helper file, own CSS/JS,
// enqueued only where an ma_* layout is placed. Additive to the page's existing 12
// hardcoded "revamp" sections — see page-templates/page-mobile-app-development.php.
require_once get_stylesheet_directory() . '/inc/mobile-app-helpers.php';

/**
 * Whether the current page places any Mobile App Development ma_* section.
 *
 * Prefix scan over page_sections, same reasoning as tnb_is_construction_page():
 * "any ma_* layout" shouldn't require hard-coding every layout name a second time.
 *
 * @return bool
 */
function tnb_is_mobile_app_page()
{
	static $cache = array();

	if (! is_page()) {
		return false;
	}

	$post_id = get_queried_object_id();
	if (! $post_id) {
		return false;
	}

	if (! isset($cache[$post_id])) {
		$cache[$post_id] = false;

		foreach ((array) get_post_meta($post_id, 'page_sections', true) as $layout) {
			if (0 === strpos((string) $layout, 'ma_')) {
				$cache[$post_id] = true;
				break;
			}
		}
	}

	return $cache[$post_id];
}

add_action('wp_enqueue_scripts', 'tnb_mobile_app_enqueue_assets');
function tnb_mobile_app_enqueue_assets()
{
	if (! tnb_is_mobile_app_page()) {
		return;
	}

	wp_enqueue_style('tnb-outfit-font');

	$ma_css = get_stylesheet_directory() . '/assets/css/mobile-app.css';
	wp_enqueue_style(
		'tnb-mobile-app',
		get_stylesheet_directory_uri() . '/assets/css/mobile-app.css',
		array('tnb-outfit-font', 'tnb-components', 'tnb-responsive'),
		file_exists($ma_css) ? filemtime($ma_css) : null
	);

	// No script dependency: mobile-app.js shares no symbols with components.js and
	// initialises itself off DOM content already present at parse time. The
	// .dt-rev reveal it leaves to components.js, enqueued site-wide regardless.
	$ma_js = get_stylesheet_directory() . '/assets/js/mobile-app.js';
	wp_enqueue_script(
		'tnb-mobile-app-js',
		get_stylesheet_directory_uri() . '/assets/js/mobile-app.js',
		array(),
		file_exists($ma_js) ? filemtime($ma_js) : null,
		true  // footer
	);
}

// ─── WP Rocket: keep the Mobile App Development accordion/tabs out of "Remove
// Unused CSS" ──────────────────────────────────────────────────────────────
// Only the first accordion row/eco tab ships .is-open/.is-active server-side; every
// other row's .is-open and every other tab's .is-active is added by mobile-app.js on
// click, after RUCSS has already analysed the served HTML. Same defensive safelist
// approach as Construction/Staff-Aug for the same class names.
add_filter('rocket_rucss_safelist', 'tnb_mobile_app_rucss_safelist');
function tnb_mobile_app_rucss_safelist($safelist)
{
	$safelist   = (array) $safelist;
	$safelist[] = '/\.ma-.*/';
	$safelist[] = '.is-active';
	$safelist[] = '.is-open';
	return $safelist;
}

// Same Outfit-body-copy opt-in as the LP family above — the mockup sets every ma_*
// component in Outfit, not the sitewide Montserrat. Scoped to #main via the existing
// body.tnb-outfit-page rule in components.css, so header/footer keep the site font and
// elements that already declare their own font-family (headings, tab labels, etc.) are
// unaffected — only inherited Montserrat text (item descriptions, chip labels) flips.
add_filter('body_class', function ($classes) {
	if (tnb_is_mobile_app_page()) {
		$classes[] = 'tnb-outfit-page';
	}
	return $classes;
});


// ─── Logistics Software Development ──────────────────────────────────────────
// Same shape as the Construction block above: own icon-helper file, own CSS/JS,
// enqueued only where an lg_* layout is placed.
require_once get_stylesheet_directory() . '/inc/lg-helpers.php';

/**
 * Whether the current page places any Logistics section.
 *
 * Prefix scan over page_sections, same reasoning as tnb_is_construction_page():
 * "any lg_* layout" shouldn't require hard-coding every layout name a second time.
 *
 * @return bool
 */
function tnb_is_logistics_page()
{
	static $cache = array();

	if (! is_page()) {
		return false;
	}

	$post_id = get_queried_object_id();
	if (! $post_id) {
		return false;
	}

	if (! isset($cache[$post_id])) {
		$cache[$post_id] = false;

		foreach ((array) get_post_meta($post_id, 'page_sections', true) as $layout) {
			if (0 === strpos((string) $layout, 'lg_')) {
				$cache[$post_id] = true;
				break;
			}
		}
	}

	return $cache[$post_id];
}

add_action('wp_enqueue_scripts', 'tnb_logistics_enqueue_assets');
function tnb_logistics_enqueue_assets()
{
	if (! tnb_is_logistics_page()) {
		return;
	}

	wp_enqueue_style('tnb-outfit-font');

	$lg_css = get_stylesheet_directory() . '/assets/css/logistics.css';
	wp_enqueue_style(
		'tnb-logistics',
		get_stylesheet_directory_uri() . '/assets/css/logistics.css',
		array('tnb-outfit-font', 'tnb-components', 'tnb-responsive'),
		file_exists($lg_css) ? filemtime($lg_css) : null
	);

	// No script dependency: logistics.js shares no symbols with components.js and
	// initialises itself off DOM content already present at parse time. The
	// .dt-rev reveal it leaves to components.js, enqueued site-wide regardless.
	$lg_js = get_stylesheet_directory() . '/assets/js/logistics.js';
	wp_enqueue_script(
		'tnb-logistics-js',
		get_stylesheet_directory_uri() . '/assets/js/logistics.js',
		array(),
		file_exists($lg_js) ? filemtime($lg_js) : null,
		true  // footer
	);
}



// ─── Case Studies Hub (Hero / Coverflow / Filtered Grid) — page-scoped assets ─
// Own callback, matching the tnb_about_v2_enqueue_assets() / tnb_case_study_
// enqueue_assets() pattern above. Detection is layout-presence based (not tied
// to a page slug/template), so these assets load on ANY page that uses one of
// the 3 flexible-content layouts below, not just one dedicated page.
//
// Every rule in case-studies-hub.css is namespaced under .csh-page (see
// tnb_case_studies_hub_body_class() below), so it cannot reach any other page,
// and it does not reuse any components.css classes/variables (--ih-*, .ih-h2,
// .ih-btn*) — fully self-contained by design.
function tnb_is_case_studies_hub_page()
{
	return tnb_page_has_layout('case_studies_hero')
		|| tnb_page_has_layout('case_studies_coverflow')
		|| tnb_page_has_layout('case_studies_filtered_grid');
}

add_action('wp_enqueue_scripts', 'tnb_case_studies_hub_enqueue_assets');
function tnb_case_studies_hub_enqueue_assets()
{
	if (! tnb_is_case_studies_hub_page()) {
		return;
	}

	wp_enqueue_style('tnb-outfit-font');

	// filemtime() is guarded: a missing file would otherwise emit a warning and a
	// broken version string if functions.php is deployed before the assets.
	$csh_css = get_stylesheet_directory() . '/assets/css/case-studies-hub.css';
	wp_enqueue_style(
		'tnb-case-studies-hub',
		get_stylesheet_directory_uri() . '/assets/css/case-studies-hub.css',
		array('tnb-outfit-font', 'tnb-components'),
		file_exists($csh_css) ? filemtime($csh_css) : null
	);

	$csh_js = get_stylesheet_directory() . '/assets/js/case-studies-hub.js';
	wp_enqueue_script(
		'tnb-case-studies-hub-js',
		get_stylesheet_directory_uri() . '/assets/js/case-studies-hub.js',
		array(),
		file_exists($csh_js) ? filemtime($csh_js) : null,
		true  // footer
	);
}

// ─── Case Studies Hub body class ──────────────────────────────────────────────
add_filter('body_class', 'tnb_case_studies_hub_body_class');
function tnb_case_studies_hub_body_class($classes)
{
	if (tnb_is_case_studies_hub_page()) {
		$classes[] = 'csh-page';
	}
	return $classes;
}

// ─── WP Rocket: keep Case Studies Hub CSS out of "Remove Unused CSS" ─────────
// RUCSS strips selectors it cannot find in the served HTML. .is-front/.is-side-l/
// .is-side-r/.is-far are applied at runtime by case-studies-hub.js's coverflow
// deck, and .is-active by its filter-pill toggle — without this they'd have no
// rules left and the slider/filter would render broken.
add_filter('rocket_rucss_safelist', 'tnb_case_studies_hub_rucss_safelist');
function tnb_case_studies_hub_rucss_safelist($safelist)
{
	$safelist   = (array) $safelist;
	$safelist[] = '/\.csh-.*/';
	$safelist[] = '/\.csp-.*/';
	$safelist[] = '/\.tone-.*/';
	$safelist[] = '.csh-page';
	$safelist[] = '.is-front';
	$safelist[] = '.is-side-l';
	$safelist[] = '.is-side-r';
	$safelist[] = '.is-far';
	$safelist[] = '.is-active';
	return $safelist;
}