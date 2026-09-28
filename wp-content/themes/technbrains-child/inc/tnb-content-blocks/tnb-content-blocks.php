<?php
/**
 * TnB Content Blocks — all-in-one loader.
 *
 * Self-contained content-block system that lives entirely inside the child
 * theme. Loaded by a single require_once line in functions.php. Nothing else in
 * the theme is modified.
 *
 * Contains (merged into one file):
 *  - Boot + ACF guard + constants.
 *  - Front + admin asset registration / conditional enqueue.
 *  - The [tnb_blocks] shortcode renderer + tnb_cb_icon() helper + partials.
 *  - The lead-capture custom table + AJAX handler + integration hook.
 *
 * The field group itself is registered automatically by ACF from
 * /acf-json/group_tnb_content_blocks.json — no PHP registration needed.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

if ( defined( 'TNB_CB_DIR' ) ) {
	// Already loaded.
	return;
}

define( 'TNB_CB_VERSION', '1.0.0' );
define( 'TNB_CB_DIR', trailingslashit( __DIR__ ) );
define( 'TNB_CB_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );
define( 'TNB_CB_THEME_URI', trailingslashit( get_stylesheet_directory_uri() ) );
define( 'TNB_CB_ICONS_URI', TNB_CB_THEME_URI . 'assets/icons/tnb-blocks/' );

/**
 * Is ACF available? The repeater + nested repeaters need ACF Pro, but the
 * local-JSON loader function ships with both editions, so we test for it and
 * degrade gracefully if it is missing.
 *
 * @return bool
 */
function tnb_cb_acf_ready() {
	return function_exists( 'acf_add_local_field_group' ) && function_exists( 'have_rows' );
}

/**
 * Admin notice shown when ACF is not active.
 */
function tnb_cb_missing_acf_notice() {
	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}
	echo '<div class="notice notice-warning"><p>';
	echo esc_html__( 'TnB Content Blocks needs Advanced Custom Fields PRO (repeater + nested repeaters) active. The [tnb_blocks] shortcode is paused until ACF Pro is enabled.', 'tnb-content-blocks' );
	echo '</p></div>';
}

if ( ! tnb_cb_acf_ready() ) {
	add_action( 'admin_notices', 'tnb_cb_missing_acf_notice' );
	return;
}

/* =========================================================================
 * Assets
 * ====================================================================== */

/**
 * Register block assets. Registered on its own hook so it never touches the
 * theme's existing tnb_enqueue_assets() callback.
 */
function tnb_cb_register_assets() {
	$css_path = TNB_CB_THEME_DIR . 'assets/css/tnb-content-blocks.css';
	$js_path  = TNB_CB_THEME_DIR . 'assets/js/tnb-content-blocks.js';

	// Outfit font — the theme only loads it on the homepage, but blocks render
	// in Outfit to match the modern theme pages, so load it where blocks appear.
	wp_register_style(
		'tnb-cb-outfit',
		'https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	wp_register_style(
		'tnb-content-blocks',
		TNB_CB_THEME_URI . 'assets/css/tnb-content-blocks.css',
		array( 'tnb-cb-outfit' ),
		file_exists( $css_path ) ? filemtime( $css_path ) : TNB_CB_VERSION
	);

	// Front-end script: the lead-magnet IIFE in tnb-content-blocks.js (the admin
	// IIFE in the same file self-skips off-admin). No external deps.
	wp_register_script(
		'tnb-lead-magnet',
		TNB_CB_THEME_URI . 'assets/js/tnb-content-blocks.js',
		array(),
		file_exists( $js_path ) ? filemtime( $js_path ) : TNB_CB_VERSION,
		true
	);

	wp_localize_script(
		'tnb-lead-magnet',
		'tnbCB',
		array(
			'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'tnb_cb_lead' ),
			'action'   => 'tnb_leadmagnet_submit',
			// Step-by-step console logging. TURN OFF for production (set false or
			// gate on WP_DEBUG). Prefix in console: [tnb-lead-magnet].
			'debug'    => true,
			'i18n'     => array(
				'title'       => __( 'Get your download', 'tnb-content-blocks' ),
				'emailLabel'  => __( 'Email address', 'tnb-content-blocks' ),
				'placeholder' => __( 'Enter your email address', 'tnb-content-blocks' ),
				'submit'      => __( 'Get the download', 'tnb-content-blocks' ),
				'close'       => __( 'Close', 'tnb-content-blocks' ),
				'invalid'     => __( 'Please enter a valid email address.', 'tnb-content-blocks' ),
				'error'       => __( 'Something went wrong. Please try again.', 'tnb-content-blocks' ),
				'sending'     => __( 'Sending…', 'tnb-content-blocks' ),
			),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'tnb_cb_register_assets' );

/**
 * Decide whether to load block assets on the current request.
 *
 * Auto-detects the shortcode in singular content. Override with the filter:
 *   add_filter( 'tnb_cb_load_assets', '__return_true' );   // always load
 *   add_filter( 'tnb_cb_load_assets', '__return_false' );  // never load
 *
 * @return bool
 */
function tnb_cb_should_enqueue() {
	$pre = apply_filters( 'tnb_cb_load_assets', null );
	if ( is_bool( $pre ) ) {
		return $pre;
	}

	if ( ! is_singular() ) {
		return false;
	}

	$post = get_post();
	if ( ! $post instanceof WP_Post ) {
		return false;
	}

	return has_shortcode( $post->post_content, 'tnb_blocks' )
		|| has_shortcode( $post->post_content, 'tnb_content_blocks' );
}

/**
 * Conditionally enqueue the registered assets.
 */
function tnb_cb_maybe_enqueue_assets() {
	if ( tnb_cb_should_enqueue() ) {
		tnb_cb_enqueue_assets();
	}
}
add_action( 'wp_enqueue_scripts', 'tnb_cb_maybe_enqueue_assets' );

/**
 * Enqueue the registered handles. Safe to call repeatedly; also used as a
 * late safety-net from the shortcode renderer.
 */
function tnb_cb_enqueue_assets() {
	wp_enqueue_style( 'tnb-cb-outfit' );
	wp_enqueue_style( 'tnb-content-blocks' );
	wp_enqueue_script( 'tnb-lead-magnet' );
}

/**
 * Editor helper: per-row copyable shortcode inside the ACF repeater.
 *
 * Only loads on the post/page edit screens where the field group can appear.
 * Uses the SAME tnb-content-blocks.js file (its admin IIFE runs here, the
 * lead-magnet IIFE self-skips because tnbCB is not localized in admin).
 *
 * @param string $hook Current admin page hook.
 */
function tnb_cb_admin_assets( $hook ) {
	if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
		return;
	}

	$css_path = TNB_CB_THEME_DIR . 'assets/css/tnb-blocks-admin.css';
	$js_path  = TNB_CB_THEME_DIR . 'assets/js/tnb-content-blocks.js';

	wp_enqueue_style(
		'tnb-blocks-admin',
		TNB_CB_THEME_URI . 'assets/css/tnb-blocks-admin.css',
		array(),
		file_exists( $css_path ) ? filemtime( $css_path ) : TNB_CB_VERSION
	);

	wp_enqueue_script(
		'tnb-blocks-admin',
		TNB_CB_THEME_URI . 'assets/js/tnb-content-blocks.js',
		array( 'jquery', 'acf-input' ),
		file_exists( $js_path ) ? filemtime( $js_path ) : TNB_CB_VERSION,
		true
	);

	// Resolve the post being edited (get_the_ID() is unreliable this early).
	$edited_id = isset( $_GET['post'] ) ? absint( $_GET['post'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- read-only screen detection.
	if ( ! $edited_id ) {
		$maybe     = get_post();
		$edited_id = $maybe instanceof WP_Post ? $maybe->ID : 0;
	}

	wp_localize_script(
		'tnb-blocks-admin',
		'tnbCBAdmin',
		array(
			'postId' => $edited_id,
			'copy'   => __( 'Copy', 'tnb-content-blocks' ),
			'copied' => __( 'Copied!', 'tnb-content-blocks' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'tnb_cb_admin_assets' );

/* =========================================================================
 * Icon helper — real SVG files served via <img> (no inline SVG).
 * ====================================================================== */

/**
 * Human-readable label (used as the <img> alt) for an icon key.
 *
 * @param string $key Icon key.
 * @return string
 */
function tnb_cb_icon_label( $key ) {
	$labels = array(
		'tip'           => __( 'Tip', 'tnb-content-blocks' ),
		'warning'       => __( 'Warning', 'tnb-content-blocks' ),
		'info'          => __( 'Information', 'tnb-content-blocks' ),
		'note'          => __( 'Note', 'tnb-content-blocks' ),
		'success'       => __( 'Success', 'tnb-content-blocks' ),
		'danger'        => __( 'Danger', 'tnb-content-blocks' ),
		'best_practice' => __( 'Best practice', 'tnb-content-blocks' ),
		'pro_tip'       => __( 'Pro tip', 'tnb-content-blocks' ),
		'advice'        => __( 'Advice', 'tnb-content-blocks' ),
		'important'     => __( 'Important', 'tnb-content-blocks' ),
		'quote'         => __( 'Quote', 'tnb-content-blocks' ),
		'bell'          => __( 'Notice', 'tnb-content-blocks' ),
		'download'      => __( 'Download', 'tnb-content-blocks' ),
		'check'         => __( 'Yes', 'tnb-content-blocks' ),
		'x-mark'        => __( 'No', 'tnb-content-blocks' ),
	);

	return isset( $labels[ $key ] ) ? $labels[ $key ] : '';
}

/**
 * Return an <img> tag pointing at a shipped SVG icon file.
 *
 * Per project requirement, icons are real .svg files referenced with an <img>
 * tag (never inline <svg>). Explicit width/height avoid layout shift; the alt
 * text carries the accessible name.
 *
 * loading="eager" is deliberate: the theme's custom-theme-interactions.js fades
 * in every img[loading="lazy"] on its load event; tiny cached SVGs often fire
 * that event before the listener attaches, leaving the icon stuck at opacity:0.
 *
 * @param string $key   Icon key (maps to assets/icons/tnb-blocks/{key}.svg).
 * @param string $label Optional alt text. Falls back to tnb_cb_icon_label().
 * @return string Escaped <img> markup.
 */
function tnb_cb_icon( $key, $label = '' ) {
	$key   = sanitize_key( $key );
	$label = ( '' !== $label ) ? $label : tnb_cb_icon_label( $key );
	$src   = TNB_CB_ICONS_URI . $key . '.svg';

	return sprintf(
		'<img class="tnb-cb-icon" width="24" height="24" loading="eager" decoding="async" src="%1$s" alt="%2$s" />',
		esc_url( $src ),
		esc_attr( $label )
	);
}

/**
 * Is a URL external to this site?
 *
 * @param string $url URL to test.
 * @return bool
 */
function tnb_cb_is_external( $url ) {
	$host = wp_parse_url( $url, PHP_URL_HOST );
	if ( empty( $host ) ) {
		return false; // Relative URL = internal.
	}
	return strtolower( $host ) !== strtolower( wp_parse_url( home_url(), PHP_URL_HOST ) );
}

/* =========================================================================
 * Shortcode
 * ====================================================================== */

/**
 * [tnb_blocks] / [tnb_content_blocks] shortcode callback.
 *
 * @param array $atts Shortcode attributes. Supports `post_id` + `index`.
 * @return string Rendered HTML (buffered; never echoed directly).
 */
function tnb_cb_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'post_id' => get_the_ID(),
			'index'   => '', // Render a single block by position (0-based).
		),
		$atts,
		'tnb_blocks'
	);

	$post_id = absint( $atts['post_id'] );
	if ( ! $post_id ) {
		return '';
	}

	// Optional single-block selector. Empty string = render all blocks.
	$only_index = ( '' === $atts['index'] || null === $atts['index'] ) ? null : intval( $atts['index'] );

	if ( ! function_exists( 'have_rows' ) || ! have_rows( 'tnb_blocks', $post_id ) ) {
		return '';
	}

	// Safety-net: ensure assets are present even if the shortcode was injected
	// outside normal post content (e.g. via a filter) and auto-detect missed it.
	if ( function_exists( 'tnb_cb_enqueue_assets' ) ) {
		tnb_cb_enqueue_assets();
	}

	ob_start();

	echo '<div class="tnb-blocks">';

	$i = 0;
	while ( have_rows( 'tnb_blocks', $post_id ) ) {
		the_row();

		// When an index is supplied, skip every row except the requested one.
		if ( null !== $only_index && $i !== $only_index ) {
			$i++;
			continue;
		}
		$i++;

		$type = get_sub_field( 'block_type' );

		switch ( $type ) {
			case 'callout':
				tnb_cb_render_callout();
				break;
			case 'quote':
				tnb_cb_render_quote();
				break;
			case 'featured_quote':
				tnb_cb_render_featured_quote();
				break;
			case 'pros_cons':
				tnb_cb_render_pros_cons();
				break;
			case 'lead_magnet':
				tnb_cb_render_lead_magnet( $post_id );
				break;
			case 'cta_banner':
				tnb_cb_render_cta_banner();
				break;
			case 'ranking_list':
				tnb_cb_render_ranking_list();
				break;
			case 'stats_grid':
				tnb_cb_render_stats_grid();
				break;
			case 'tldr':
				tnb_cb_render_tldr();
				break;
				
		}
	}

	echo '</div>';

	return ob_get_clean();
}
add_shortcode( 'tnb_blocks', 'tnb_cb_shortcode' );
add_shortcode( 'tnb_content_blocks', 'tnb_cb_shortcode' );

/* =========================================================================
 * Block partials
 * ====================================================================== */

/**
 * Callout / highlighter block.
 */
function tnb_cb_render_callout() {
	$style   = get_sub_field( 'callout_style' );
	$style   = $style ? $style : 'tip';
	$border  = get_sub_field( 'border_style' );
	$border  = $border ? $border : 'left_border';
	$heading = get_sub_field( 'callout_heading' );
	$body    = get_sub_field( 'callout_body' );
	?>
	<section class="tnb-block tnb-callout tnb-callout--<?php echo esc_attr( $style ); ?> tnb-callout--<?php echo esc_attr( $border ); ?>">
		<span class="tnb-callout__icon"><?php echo tnb_cb_icon( $style ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tnb_cb_icon() escapes internally. ?></span>
		<div class="tnb-callout__content">
			<?php if ( $heading ) : ?>
				<p class="tnb-callout__heading"><?php echo esc_html( $heading ); ?></p>
			<?php endif; ?>
			<?php if ( $body ) : ?>
				<div class="tnb-callout__body"><?php echo wp_kses_post( $body ); ?></div>
			<?php endif; ?>
		</div>
	</section>
	<?php
}

/**
 * Simple opinion quote block.
 */
function tnb_cb_render_quote() {
	$body = get_sub_field( 'quote_body' );
	if ( ! $body ) {
		return;
	}
	?>
	<section class="tnb-block tnb-quote">
		<blockquote class="tnb-quote__inner"><?php echo wp_kses_post( $body ); ?></blockquote>
	</section>
	<?php
}

/**
 * Featured quote with author + optional image.
 */
function tnb_cb_render_featured_quote() {
	$body       = get_sub_field( 'fq_body' );
	$author     = get_sub_field( 'fq_author' );
	$source_lbl = get_sub_field( 'fq_source_label' );
	$source_url = get_sub_field( 'fq_source_url' );
	$image      = get_sub_field( 'fq_image' );
	$has_image  = is_array( $image ) && ! empty( $image['url'] );
	?>
	<section class="tnb-block tnb-featured-quote">
		<?php if ( $has_image ) : ?>
			<figure class="tnb-fq__figure">
				<img src="<?php echo esc_url( $image['url'] ); ?>"
					alt="<?php echo esc_attr( ! empty( $image['alt'] ) ? $image['alt'] : ( $author ? $author : '' ) ); ?>"
					<?php if ( ! empty( $image['width'] ) ) : ?>width="<?php echo esc_attr( $image['width'] ); ?>"<?php endif; ?>
					<?php if ( ! empty( $image['height'] ) ) : ?>height="<?php echo esc_attr( $image['height'] ); ?>"<?php endif; ?>
					loading="lazy" decoding="async" />
			</figure>
		<?php endif; ?>

		<?php if ( $body ) : ?>
			<blockquote class="tnb-fq__body"><?php echo wp_kses_post( $body ); ?></blockquote>
		<?php endif; ?>

		<?php if ( $author || $source_lbl ) : ?>
			<footer class="tnb-fq__meta">
				<span class="tnb-fq__dash" aria-hidden="true">—</span>
				<?php if ( $author ) : ?>
					<cite class="tnb-fq__author"><?php echo esc_html( $author ); ?></cite>
				<?php endif; ?>
				<?php if ( $source_lbl ) : ?>
					<span class="tnb-fq__source">
						<?php if ( $author ) : ?>, <?php endif; ?>
						<?php if ( $source_url ) : ?>
							<a href="<?php echo esc_url( $source_url ); ?>"<?php echo tnb_cb_is_external( $source_url ) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>><?php echo esc_html( $source_lbl ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $source_lbl ); ?>
						<?php endif; ?>
					</span>
				<?php endif; ?>
			</footer>
		<?php endif; ?>
	</section>
	<?php
}

/**
 * Render a single pros/cons column (pros or cons).
 *
 * @param string $rows_field Sub-repeater field name (pc_pros|pc_cons).
 * @param string $title      Column title.
 * @param string $modifier   CSS modifier (pros|cons).
 * @param string $icon_key   Icon key (check|warning).
 */
function tnb_cb_render_pc_column( $rows_field, $title, $modifier, $icon_key ) {
	?>
	<div class="tnb-pc__col tnb-pc__<?php echo esc_attr( $modifier ); ?>">
		<div class="tnb-pc__head">
			<?php echo tnb_cb_icon( $icon_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped internally. ?>
			<?php if ( $title ) : ?>
				<p class="tnb-pc__title"><?php echo esc_html( $title ); ?></p>
			<?php endif; ?>
		</div>
		<?php if ( have_rows( $rows_field ) ) : ?>
			<ul class="tnb-pc__list">
				<?php
				while ( have_rows( $rows_field ) ) :
					the_row();
					$item = get_sub_field( 'item' );
					if ( '' === $item || null === $item ) {
						continue;
					}
					?>
					<li class="tnb-pc__item"><?php echo esc_html( $item ); ?></li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Pros & Cons block (two columns).
 */
function tnb_cb_render_pros_cons() {
	$pros_title = get_sub_field( 'pc_pros_title' );
	$pros_title = $pros_title ? $pros_title : __( 'Pros', 'tnb-content-blocks' );
	$cons_title = get_sub_field( 'pc_cons_title' );
	$cons_title = $cons_title ? $cons_title : __( 'Cons', 'tnb-content-blocks' );
	?>
	<section class="tnb-block tnb-pros-cons">
		<div class="tnb-pc">
			<?php
			tnb_cb_render_pc_column( 'pc_pros', $pros_title, 'pros', 'check' );
			tnb_cb_render_pc_column( 'pc_cons', $cons_title, 'cons', 'warning' );
			?>
		</div>
	</section>
	<?php
}


/**
 * Ranking List block — numbered badge cards (reference bp-rank look).
 *
 * The number badge is a real <span> (not a CSS counter) so the ordering is
 * visible to screen readers, crawlers, and copy-paste.
 */
function tnb_cb_render_ranking_list() {
	if ( ! have_rows( 'rank_items' ) ) {
		return;
	}
	$n = 0;
	?>
	<ol class="tnb-block tnb-rank">
		<?php
		while ( have_rows( 'rank_items' ) ) :
			the_row();
			$name  = get_sub_field( 'rank_name' );
			$score = get_sub_field( 'rank_score' );
			$text  = get_sub_field( 'rank_text' );
			if ( '' === $name && '' === $text ) {
				continue;
			}
			$n++;
			?>
			<li>
				<span class="tnb-rank__num" aria-hidden="true"><?php echo esc_html( (string) $n ); ?></span>
				<b><?php echo esc_html( $name ); ?></b>
				<?php if ( '' !== $score && null !== $score ) : ?>
					<span class="tnb-rank__score">(<?php echo esc_html( $score ); ?>)</span>
				<?php endif; ?>
				<?php if ( $text ) : ?>
					&mdash; <?php echo esc_html( $text ); ?>
				<?php endif; ?>
			</li>
		<?php endwhile; ?>
	</ol>
	<?php
}

/**
 * Stats Grid block — bordered metric grid (reference bp-stats look).
 */
function tnb_cb_render_stats_grid() {
	if ( ! have_rows( 'stat_items' ) ) {
		return;
	}
	?>
	<div class="tnb-block tnb-stats">
		<?php
		while ( have_rows( 'stat_items' ) ) :
			the_row();
			$value  = get_sub_field( 'stat_value' );
			$suffix = get_sub_field( 'stat_suffix' );
			$label  = get_sub_field( 'stat_label' );
			if ( '' === $value && '' === $label ) {
				continue;
			}
			?>
			<div class="tnb-stat">
				<div class="tnb-stat__v"><?php echo esc_html( $value ); ?><?php if ( '' !== $suffix && null !== $suffix ) : ?><span class="tnb-stat__u"><?php echo esc_html( $suffix ); ?></span><?php endif; ?></div>
				<?php if ( $label ) : ?>
					<div class="tnb-stat__l"><?php echo esc_html( $label ); ?></div>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	</div>
	<?php
}


/**
 * Lead magnet block (download card, optional email gate).
 *
 * @param int $post_id Current post ID (stored with the captured lead).
 */
function tnb_cb_render_lead_magnet( $post_id ) {
	$heading = get_sub_field( 'lm_heading' );
	$desc    = get_sub_field( 'lm_description' );
	$btn     = get_sub_field( 'lm_button_text' );
	$btn     = $btn ? $btn : __( 'Download', 'tnb-content-blocks' );
	$file    = get_sub_field( 'lm_file' );
	$collect = (bool) get_sub_field( 'lm_collect_email' );

	// Background image: uploaded value, else a default fallback.
	$bg     = get_sub_field( 'lm_bg_image' );
	$bg_url = ( is_array( $bg ) && ! empty( $bg['url'] ) )
		? $bg['url']
		: home_url( '/wp-content/uploads/2026/02/blog-1.webp' );
	?>
	<section class="tnb-block tnb-lead-magnet" style="background-image:url('<?php echo esc_url( $bg_url ); ?>')">
		<div class="tnb-lm__card">
			<div class="tnb-lm__content">
				<?php if ( $heading ) : ?>
					<p class="tnb-lm__heading"><?php echo esc_html( $heading ); ?></p>
				<?php endif; ?>
				<?php if ( $desc ) : ?>
					<p class="tnb-lm__desc"><?php echo nl2br( esc_html( $desc ) ); ?></p>
				<?php endif; ?>
				<?php if ( $file ) : ?>
					<?php if ( $collect ) : ?>
						<button type="button" class="tnb-cb-btn tnb-lm__btn"
							data-tnb-file="<?php echo esc_url( $file ); ?>"
							data-tnb-heading="<?php echo esc_attr( $heading ); ?>"
							data-tnb-post="<?php echo esc_attr( $post_id ); ?>">
							<?php echo esc_html( $btn ); ?>
						</button>
					<?php else : ?>
						<a class="tnb-cb-btn tnb-lm__btn" href="<?php echo esc_url( $file ); ?>" download rel="nofollow">
							<?php echo esc_html( $btn ); ?>
						</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
}

/**
 * CTA banner block (optional bg image + dark overlay).
 */
function tnb_cb_render_cta_banner() {
	$bg       = get_sub_field( 'cta_bg_image' );
	$heading  = get_sub_field( 'cta_heading' );
	$text     = get_sub_field( 'cta_text' );
	$btn_text = get_sub_field( 'cta_button_text' );
	$btn_url  = get_sub_field( 'cta_button_url' );
	$has_bg   = is_array( $bg ) && ! empty( $bg['url'] );
	?>
	<section class="tnb-block tnb-cta<?php echo $has_bg ? ' tnb-cta--has-bg' : ''; ?>"
		<?php if ( $has_bg ) : ?>style="background-image:url('<?php echo esc_url( $bg['url'] ); ?>')"<?php endif; ?>>
		<div class="tnb-cta__content">
			<?php if ( $heading ) : ?>
				<p class="tnb-cta__heading"><?php echo esc_html( $heading ); ?></p>
			<?php endif; ?>
			<?php if ( $text ) : ?>
				<p class="tnb-cta__text"><?php echo nl2br( esc_html( $text ) ); ?></p>
			<?php endif; ?>
			<?php if ( $btn_text && $btn_url ) : ?>
				<a class="tnb-cb-btn tnb-cta__btn" href="<?php echo esc_url( $btn_url ); ?>"<?php echo tnb_cb_is_external( $btn_url ) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
					<?php echo esc_html( $btn_text ); ?>
				</a>
			<?php endif; ?>
		</div>
	</section>
	<?php
}

/* =========================================================================
 * Lead capture (email-only) — SAME pipeline as the theme's other forms.
 *
 * Reuses the shared helpers (honeypot, reCAPTCHA, HubSpot, admin email, and the
 * `tnb_lead` CPT via tnb_save_lead). Client-side SwiftSales CreateContact runs in
 * the modal JS before this request. Only difference vs the other forms: the
 * response returns the file URL so the browser starts the PDF download.
 * ====================================================================== */

/**
 * AJAX: lead-magnet email submit. Mirrors tnb_handle_contact_form (email-only).
 */
function tnb_cb_leadmagnet_submit() {
	check_ajax_referer( 'tnb_cb_lead', 'nonce' );

	// Honeypot (shared) — exits with a "bot" success if the trap is filled.
	if ( function_exists( 'tnb_check_honeypot' ) ) {
		tnb_check_honeypot();
	}

	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$file  = isset( $_POST['file'] ) ? esc_url_raw( wp_unslash( $_POST['file'] ) ) : '';

	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'messages' => array( __( 'Valid email address is required.', 'tnb-content-blocks' ) ) ) );
	}

	// NOTE: no direct HubSpot call here — the client-side SwiftSales CreateContact
	// (in the modal JS) forwards the contact to HubSpot via the SwiftSales
	// integration, same channel as the other forms.

	// Admin email notification (shared).
	if ( function_exists( 'tnb_send_lead_email' ) ) {
		tnb_send_lead_email(
			array( 'name' => '', 'email' => $email, 'phone' => '', 'message' => 'Lead magnet file: ' . $file ),
			'New Lead (Lead Magnet)'
		);
	}

	// Local store: shared `tnb_lead` CPT — same as every other form.
	if ( function_exists( 'tnb_save_lead' ) ) {
		tnb_save_lead( array(
			'name'   => '',
			'email'  => $email,
			'phone'  => '',
			'form'   => 'Lead Magnet',
			'source' => $file,
		) );
	}

	// Redirect to the thank-you page (like the other forms); the file rides along
	// so the thank-you page can auto-start the download.
	$redirect = add_query_arg( 'tnb_dl', rawurlencode( $file ), home_url( '/thank-you' ) );
	wp_send_json_success( array( 'redirect' => $redirect, 'file' => $file ) );
}
add_action( 'wp_ajax_tnb_leadmagnet_submit', 'tnb_cb_leadmagnet_submit' );
add_action( 'wp_ajax_nopriv_tnb_leadmagnet_submit', 'tnb_cb_leadmagnet_submit' );

/**
 * Thank-you page: auto-download the gated file passed via ?tnb_dl=.
 *
 * Server-validates the URL (same host + within uploads) so the query param can't
 * trigger a download of an arbitrary external file.
 */
function tnb_cb_thankyou_download() {
	if ( ! is_page( 'thank-you' ) || ! isset( $_GET['tnb_dl'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- read-only, validated below.
		return;
	}

	$file = esc_url_raw( wp_unslash( $_GET['tnb_dl'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$ok   = $file
		&& wp_parse_url( $file, PHP_URL_HOST ) === wp_parse_url( home_url(), PHP_URL_HOST )
		&& false !== strpos( $file, '/wp-content/uploads/' );

	if ( ! $ok ) {
		return;
	}

	$js_path = TNB_CB_THEME_DIR . 'assets/js/tnb-content-blocks.js';
	if ( ! wp_script_is( 'tnb-lead-magnet', 'registered' ) ) {
		wp_register_script(
			'tnb-lead-magnet',
			TNB_CB_THEME_URI . 'assets/js/tnb-content-blocks.js',
			array(),
			file_exists( $js_path ) ? filemtime( $js_path ) : TNB_CB_VERSION,
			true
		);
	}
	wp_enqueue_script( 'tnb-lead-magnet' );
	wp_localize_script( 'tnb-lead-magnet', 'tnbCBDownload', array( 'file' => $file ) );
}
add_action( 'wp_enqueue_scripts', 'tnb_cb_thankyou_download' );


/**
 * TL;DR block — highlighted summary box (reference .highlighted-box look:
 * red-tinted background, thick red left border). Heading renders as an <h2>
 * so ez-toc picks it up like the hand-written reference markup; the body is
 * editor wysiwyg (lists, bold, links).
 */
function tnb_cb_render_tldr() {
	$heading = get_sub_field( 'tldr_heading' );
	$body    = get_sub_field( 'tldr_body' );
	if ( ! $heading && ! $body ) {
		return;
	}
	?>
	<section class="tnb-block tnb-tldr">
		<?php if ( $heading ) : ?>
			<h2 class="tnb-tldr__heading"><strong><?php echo esc_html( $heading ); ?></strong></h2>
		<?php endif; ?>
		<?php if ( $body ) : ?>
			<div class="tnb-tldr__body"><?php echo wp_kses_post( $body ); ?></div>
		<?php endif; ?>
	</section>
	<?php
}
