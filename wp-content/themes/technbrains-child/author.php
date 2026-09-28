<?php
/**
 * Author archive — Author Profile template.
 *
 * Dynamic, per-author rendering of the QA-approved "Author Profile" design.
 * Works for any author at /blog/author/{nicename}/ with no per-author code.
 *
 * Markup, classes, DOM order and inline styles are kept identical to the
 * QA-approved source (0px design change); only the data is dynamic. Sections:
 * Hero, About, Core Expertise, Achievements, Credentials, Contributions.
 *
 * Data: display_name, bio (description), Yoast social contact methods, ACF User
 * fields (ap_portrait / ap_role / ap_focus / ap_skills / ap_achievements /
 * ap_cred_title / ap_cred_body), and the author's posts (main query + AJAX more).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$tnb_ap_author    = get_queried_object();
$tnb_ap_author_id = ( $tnb_ap_author instanceof WP_User ) ? (int) $tnb_ap_author->ID : (int) get_query_var( 'author' );

$tnb_ap_has_acf = function_exists( 'get_field' );
$tnb_ap_uid     = 'user_' . $tnb_ap_author_id;

/** ACF user field with graceful fallback when ACF is absent. */
$tnb_ap_field = static function ( $name, $default = '' ) use ( $tnb_ap_has_acf, $tnb_ap_uid ) {
	if ( ! $tnb_ap_has_acf ) {
		return $default;
	}
	$val = get_field( $name, $tnb_ap_uid );
	return ( null === $val || false === $val || '' === $val ) ? $default : $val;
};

// --- Identity ------------------------------------------------------------
$tnb_ap_name = get_the_author_meta( 'display_name', $tnb_ap_author_id );
$tnb_ap_parts = preg_split( '/\s+/', trim( $tnb_ap_name ), 2 );
$tnb_ap_first = isset( $tnb_ap_parts[0] ) ? $tnb_ap_parts[0] : $tnb_ap_name;
$tnb_ap_rest  = isset( $tnb_ap_parts[1] ) ? $tnb_ap_parts[1] : '';
if ( '' === $tnb_ap_rest ) { // single-word name → render it large, no tiny prefix.
	$tnb_ap_rest  = $tnb_ap_first;
	$tnb_ap_first = '';
}

$tnb_ap_role  = $tnb_ap_field( 'ap_role' );
$tnb_ap_focus = $tnb_ap_field( 'ap_focus' );
$tnb_ap_description = $tnb_ap_field( 'achievements_description' );
$tnb_ap_bio   = get_the_author_meta( 'description', $tnb_ap_author_id );

// --- Portrait (ACF image → Gravatar fallback) ----------------------------
$tnb_ap_portrait = $tnb_ap_field( 'ap_portrait' );
$tnb_ap_portrait_url = ( is_array( $tnb_ap_portrait ) && ! empty( $tnb_ap_portrait['url'] ) )
	? $tnb_ap_portrait['url']
	: get_avatar_url( $tnb_ap_author_id, array( 'size' => 300 ) );
$tnb_ap_portrait_alt = ( is_array( $tnb_ap_portrait ) && ! empty( $tnb_ap_portrait['alt'] ) )
	? $tnb_ap_portrait['alt']
	: $tnb_ap_name;

// --- Social (Yoast user contact methods; show only if set) ---------------
$tnb_ap_linkedin = get_the_author_meta( 'linkedin', $tnb_ap_author_id );
$tnb_ap_twitter  = get_the_author_meta( 'twitter', $tnb_ap_author_id );
if ( $tnb_ap_twitter && ! preg_match( '#^https?://#i', $tnb_ap_twitter ) ) {
	$tnb_ap_twitter = 'https://twitter.com/' . ltrim( $tnb_ap_twitter, '@' );
}
$tnb_ap_email = get_the_author_meta( 'user_email', $tnb_ap_author_id );

get_header();
?>

<header class="ap-hero" data-screen-label="01 Hero">
	<div class="ap-wrap ap-hero-inner">
		<div class="ap-hero-grid-2">
			<div class="ap-portrait ap-rev in d1">
				<div class="ap-portrait-card">
					<span class="ap-portrait-accent" aria-hidden="true"></span>
					<img src="<?php echo esc_url( $tnb_ap_portrait_url ); ?>" alt="<?php echo esc_attr( $tnb_ap_portrait_alt ); ?>" />
				</div>
			</div>
			<div class="ap-rev in d2">
				<div class="ap-name-row">
					<h1 class="ap-h1"><?php echo esc_html( $tnb_ap_first ); ?> <span class="hl"><?php echo esc_html( $tnb_ap_rest ); ?></span></h1>
				</div>
				<?php if ( $tnb_ap_role || $tnb_ap_focus ) : ?>
					<p class="ap-hero-role"><?php echo esc_html( $tnb_ap_role ); ?><?php if ( $tnb_ap_role && $tnb_ap_focus ) : ?> <span class="div">|</span> <?php endif; ?><?php echo esc_html( $tnb_ap_focus ); ?></p>
				<?php endif; ?>
				<div class="ap-social">
					<?php if ( $tnb_ap_linkedin ) : ?>
						<a class="ap-social-ic" href="<?php echo esc_url( $tnb_ap_linkedin ); ?>" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
							<svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M6.94 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM3 8.5h3.94v12H3v-12zM10 8.5h3.78v1.66h.05a4.14 4.14 0 0 1 3.73-2.05c3.99 0 4.72 2.63 4.72 6.04v6.85h-3.94v-6.07c0-1.45-.03-3.31-2.02-3.31-2.02 0-2.33 1.58-2.33 3.21v6.17H10v-12z" /></svg>
						</a>
					<?php endif; ?>
					<?php if ( $tnb_ap_twitter ) : ?>
						<a class="ap-social-ic" href="<?php echo esc_url( $tnb_ap_twitter ); ?>" aria-label="Twitter" target="_blank" rel="noopener noreferrer">
							<svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M18.9 2h3.3l-7.2 8.2L23.5 22h-6.6l-5.2-6.8L5.7 22H2.4l7.7-8.8L1.5 2h6.8l4.7 6.2zm-1.2 18h1.8L7.3 3.8H5.4z" /></svg>
						</a>
					<?php endif; ?>
					<?php if ( $tnb_ap_email ) : ?>
						<a class="ap-social-ic" href="<?php echo esc_url( 'mailto:' . antispambot( $tnb_ap_email ) ); ?>" aria-label="Email">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2" /><path d="M3 7l9 6 9-6" /></svg>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>

<?php if ( $tnb_ap_bio ) : ?>
<section class="ap-section" data-screen-label="02 About">
	<div class="ap-wrap">
		<div class="ap-about-grid">
			<div class="ap-about-copy ap-rev">
				<h2 class="ap-h2">About the Author</h2>
				<?php
				$tnb_ap_paras = preg_split( '/\n\s*\n/', trim( $tnb_ap_bio ) );
				foreach ( $tnb_ap_paras as $tnb_ap_p ) :
					$tnb_ap_p = trim( $tnb_ap_p );
					if ( '' === $tnb_ap_p ) {
						continue;
					}
					?>
					<p class="ap-body-lg"><?php echo esc_html( $tnb_ap_p ); ?></p>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php
$tnb_ap_skills = $tnb_ap_field( 'ap_skills', array() );
if ( ! empty( $tnb_ap_skills ) && is_array( $tnb_ap_skills ) ) :
	?>
<section class="ap-section" data-screen-label="03 Expertise">
	<div class="ap-wrap">
		<div class="ap-sec-head ap-rev">
			<h2 class="ap-h2">Core Expertise</h2>
		</div>
		<div class="ap-tools-grid ap-rev d1">
			<?php
			foreach ( $tnb_ap_skills as $tnb_ap_skill ) :
				$tnb_ap_sname    = isset( $tnb_ap_skill['name'] ) ? $tnb_ap_skill['name'] : '';
				$tnb_ap_icon     = isset( $tnb_ap_skill['icon'] ) ? $tnb_ap_skill['icon'] : '';
				$tnb_ap_icon_url = ( is_array( $tnb_ap_icon ) && ! empty( $tnb_ap_icon['url'] ) ) ? $tnb_ap_icon['url'] : '';
				$tnb_ap_icon_w   = ( is_array( $tnb_ap_icon ) && ! empty( $tnb_ap_icon['width'] ) ) ? (int) $tnb_ap_icon['width'] : '';
				$tnb_ap_icon_h   = ( is_array( $tnb_ap_icon ) && ! empty( $tnb_ap_icon['height'] ) ) ? (int) $tnb_ap_icon['height'] : '';
				?>
				<div class="ap-tool">
					<span class="ap-tool-tile ap-tool-tile--img">
						<?php if ( $tnb_ap_icon_url ) : ?>
							<img src="<?php echo esc_url( $tnb_ap_icon_url ); ?>" alt=""<?php echo $tnb_ap_icon_w ? ' width="' . esc_attr( $tnb_ap_icon_w ) . '"' : ''; ?><?php echo $tnb_ap_icon_h ? ' height="' . esc_attr( $tnb_ap_icon_h ) . '"' : ''; ?> loading="lazy" decoding="async" />
						<?php endif; ?>
					</span>
					<span class="ap-tool-name"><?php echo esc_html( $tnb_ap_sname ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php
$tnb_ap_achv = $tnb_ap_field( 'ap_achievements', array() );
if ( ! empty( $tnb_ap_achv ) && is_array( $tnb_ap_achv ) ) :
	?>
<section class="ap-section" data-screen-label="04 Achievements">
	<div class="ap-wrap">
		<div class="ap-split">
			<div class="ap-split-head ap-rev">
				<h2 class="ap-h2">Achievements</h2>
				<p class="ap-lead"><?php echo esc_html( $tnb_ap_description ); ?> </p>
			</div>
			<div class="ap-achv-grid ap-rev d1">
				<?php
				foreach ( $tnb_ap_achv as $tnb_ap_i => $tnb_ap_a ) :
					$tnb_ap_item = isset( $tnb_ap_a['item'] ) ? $tnb_ap_a['item'] : '';
					if ( '' === trim( (string) $tnb_ap_item ) ) {
						continue;
					}
					?>
					<div class="ap-achv">
						<span class="ap-achv-no"><?php echo esc_html( str_pad( (string) ( $tnb_ap_i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<p class="ap-achv-t"><?php echo esc_html( $tnb_ap_item ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php
$tnb_ap_cred_title = $tnb_ap_field( 'ap_cred_title' );
$tnb_ap_cred_body  = $tnb_ap_field( 'ap_cred_body' );
$tnb_ap_cred_image = $tnb_ap_field( 'ap_cred_image' );
$tnb_ap_cred_img_url = ( is_array( $tnb_ap_cred_image ) && ! empty( $tnb_ap_cred_image['url'] ) )
	? $tnb_ap_cred_image['url']
	: '';
if ( $tnb_ap_cred_title || $tnb_ap_cred_body || $tnb_ap_cred_img_url ) :
	// Image (optional) is rendered as the card background via a CSS custom property
	// (data only — no inline rule). A dark overlay in CSS keeps the white text legible.
	?>
<section class="ap-section" data-screen-label="04 Credentials">
	<div class="ap-wrap">
		<div class="ap-cred ap-cred-solo ap-rev<?php echo $tnb_ap_cred_img_url ? ' ap-cred-bg' : ''; ?>"<?php echo $tnb_ap_cred_img_url ? ' style="--ap-cred-bg: url(\'' . esc_url( $tnb_ap_cred_img_url ) . '\')"' : ''; ?>>
			<div class="ap-cred-copy">
				<?php if ( $tnb_ap_cred_title ) : ?>
					<h3 class="ap-h3"><?php echo nl2br( esc_html( $tnb_ap_cred_title ) ); ?></h3>
				<?php endif; ?>
				<?php if ( $tnb_ap_cred_body ) : ?>
					<p><?php echo nl2br( esc_html( $tnb_ap_cred_body ) ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php
get_template_part(
	'template-parts/author-case-studies',
	null,
	array(
		'author_id'   => $tnb_ap_author_id,
		'author_name' => $tnb_ap_parts[0] ?? $tnb_ap_name,
	)
);
?>
<section class="ap-section" id="ap-contrib" data-screen-label="05 Contributions">
	<div class="ap-wrap">
		<div class="ap-contrib-head ap-rev">
			<div class="left">
				<h2 class="ap-h2">Articles &amp; guides by <?php echo esc_html( $tnb_ap_name ); ?></h2>
				<p class="ap-lead">Expert guidance and published work from <?php echo esc_html( $tnb_ap_name ); ?>.</p>
			</div>
		</div>
		<?php if ( have_posts() ) : ?>
			<div class="ap-contrib-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/author-contrib-card' );
				endwhile;
				?>
			</div>
			 			<?php
			// Numbered pagination over real /blog/author/{nicename}/page/N/ URLs, the same
			// call category.php makes: this is the main query on a real archive, so
			// the_posts_pagination() needs no base or total. Every page of an author's work
			// is then a linkable, crawlable URL.
			the_posts_pagination(
				array(
					'mid_size'  => 2,
					'end_size'  => 3,
					'prev_text' => __( 'Previous', 'technbrains-child' ),
					'next_text' => __( 'Next', 'technbrains-child' ),
				)
			);
			?>

		<?php else : ?>
			<p class="ap-lead"><?php esc_html_e( 'No articles published yet.', 'technbrains-child' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
