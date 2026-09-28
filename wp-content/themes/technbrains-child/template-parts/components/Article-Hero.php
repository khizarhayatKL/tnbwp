<?php
/**
 * Article template family — Hero (image card, overlaid content).
 *
 * Layout : art_hero (ACF Flexible Content)
 * Fields : art_hero_tag, art_hero_h1, art_hero_deck, art_hero_bg,
 *          art_hero_author_name, art_hero_author_role, art_hero_author_photo, art_hero_author_link,
 *          art_hero_author_user, art_hero_published, art_hero_updated, art_hero_read_time, art_anchor
 *
 * art_hero_author_user is optional and purely additive: when it links the byline to a real WP
 * user, the byline gets the same hover/focus "author popup" card single.php already shows on blog
 * posts (bio, LinkedIn/X, "View Full Profile"), reading that user's Author Profile fields
 * (ap_role/ap_focus/ap_short_description) and contact-method meta — same data, same interaction
 * (pure CSS, desktop/hover-capable only), just re-skinned in .art-* tokens instead of copying the
 * blog's .tnb-author-pop markup/CSS verbatim. With no user linked, the byline renders exactly as
 * it always has.
 * CSS    : assets/css/article.css (.art-hero*)
 * JS     : none of its own — the .art-fade / .art-anim reveal is handled by article-toc.js's
 *          shared IntersectionObserver helper (see the JS wiring pass).
 *
 * Breadcrumb reuses the site's own tnb_breadcrumb_html() rather than the prototype's bespoke
 * PA_CRUMB array — that system is already wired to this page's actual ancestry and already
 * carries its own BreadcrumbList schema (tnb_breadcrumb_schema() in functions.php), so a second,
 * hand-authored crumb trail here would just be a duplicate with no schema behind it.
 *
 * The background is a single full-bleed image behind a dark overlay the copy sits on — not a
 * decorative photo beside the text, so it is not marked alt="": role="img" + aria-label carries
 * the h1 text, matching the prototype's own accessible-name choice for a background-image header.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_tag    = (string) get_sub_field( 'art_hero_tag' );
$art_h1     = (string) get_sub_field( 'art_hero_h1' );
$art_deck   = (string) get_sub_field( 'art_hero_deck' );
$art_bg     = get_sub_field( 'art_hero_bg' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_author_name  = (string) get_sub_field( 'art_hero_author_name' );
$art_author_role  = (string) get_sub_field( 'art_hero_author_role' );
$art_author_photo = get_sub_field( 'art_hero_author_photo' );
$art_author_link  = get_sub_field( 'art_hero_author_link' );

$art_author_url = is_array( $art_author_link ) ? trim( (string) ( $art_author_link['url'] ?? '' ) ) : '';
if ( '#' === $art_author_url ) {
	$art_author_url = '';
}

$art_author_user = get_sub_field( 'art_hero_author_user' );
$art_author_uid   = ! empty( $art_author_user['ID'] ) ? (int) $art_author_user['ID'] : 0;
$art_pop          = null;

if ( $art_author_uid ) {
	$art_pop_focus = (string) get_field( 'ap_focus', 'user_' . $art_author_uid );
	$art_pop_bio   = (string) get_field( 'ap_short_description', 'user_' . $art_author_uid );
	if ( '' === $art_pop_bio ) {
		$art_pop_bio = (string) get_the_author_meta( 'description', $art_author_uid );
	}

	if ( '' !== $art_pop_bio ) {
		$art_pop = array(
			'sub'      => '' !== $art_pop_focus ? $art_pop_focus : $art_author_role,
			'bio'      => $art_pop_bio,
			'linkedin' => (string) get_the_author_meta( 'linkedin', $art_author_uid ),
			'twitter'  => (string) get_the_author_meta( 'twitter', $art_author_uid ),
			'email'    => (string) get_the_author_meta( 'user_email', $art_author_uid ),
			'profile'  => get_author_posts_url( $art_author_uid ),
		);
	}
}

$art_published = (string) get_sub_field( 'art_hero_published' );
$art_updated    = (string) get_sub_field( 'art_hero_updated' );
$art_read_time  = (string) get_sub_field( 'art_hero_read_time' );

if ( '' === $art_h1 ) {
	return;
}

$art_bg_url = ! empty( $art_bg['id'] ) ? (string) wp_get_attachment_image_url( (int) $art_bg['id'], 'full' ) : '';
?>
<div class="art-hero"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="art-hero-card">
		<div
			class="art-hero-img"
			<?php echo '' !== $art_bg_url ? ' style="background-image:url(' . esc_url( $art_bg_url ) . ')"' : ''; ?>
			role="img"
			aria-label="<?php echo esc_attr( $art_h1 ); ?>"
		></div>
		<div class="art-hero-overlay">
			<div class="art-hero-top"><?php tnb_breadcrumb_html(); ?></div>

			<?php if ( '' !== $art_tag ) : ?>
				<span class="art-hero-tag"><?php echo esc_html( $art_tag ); ?></span>
			<?php endif; ?>

			<h1><?php echo esc_html( $art_h1 ); ?></h1>

			<?php if ( '' !== $art_deck ) : ?>
				<p class="art-hero-deck"><?php echo esc_html( $art_deck ); ?></p>
			<?php endif; ?>

			<div class="art-hero-foot">
				<?php if ( '' !== $art_author_name ) : ?>
					<?php if ( '' !== $art_author_url ) : ?>
						<a class="art-byline" href="<?php echo esc_url( $art_author_url ); ?>">
					<?php else : ?>
						<span class="art-byline"<?php echo $art_pop ? ' tabindex="0"' : ''; ?>>
					<?php endif; ?>
						<?php if ( ! empty( $art_author_photo['id'] ) ) : ?>
							<?php
							echo wp_get_attachment_image(
								(int) $art_author_photo['id'],
								'thumbnail',
								false,
								array(
									'alt'      => $art_author_name,
									'loading'  => 'eager',
									'decoding' => 'async',
								)
							);
							?>
						<?php endif; ?>
						<span>
							<span class="art-byline-name"><span class="art-byline-link"><?php echo esc_html( $art_author_name ); ?></span></span>
							<?php if ( '' !== $art_author_role ) : ?>
								<span class="art-byline-role"><?php echo esc_html( $art_author_role ); ?></span>
							<?php endif; ?>
						</span>
						<?php if ( $art_pop ) : ?>
							<div class="art-byline-pop" role="tooltip" aria-hidden="true">
								<span class="art-byline-pop-arrow" aria-hidden="true"></span>
								<div class="art-byline-pop-card">
									<?php if ( ! empty( $art_author_photo['id'] ) ) : ?>
										<?php
										echo wp_get_attachment_image(
											(int) $art_author_photo['id'],
											'thumbnail',
											false,
											array(
												'class'    => 'art-byline-pop-img',
												'alt'      => '',
												'loading'  => 'lazy',
												'decoding' => 'async',
											)
										);
										?>
									<?php endif; ?>
									<div class="art-byline-pop-content">
										<div class="art-byline-pop-head">
											<div class="art-byline-pop-id">
												<div class="art-byline-pop-name"><?php echo esc_html( $art_author_name ); ?></div>
												<?php if ( '' !== $art_pop['sub'] ) : ?>
													<div class="art-byline-pop-sub"><?php echo esc_html( $art_pop['sub'] ); ?></div>
												<?php endif; ?>
											</div>
											<div class="art-byline-pop-social">
												<?php if ( '' !== $art_pop['linkedin'] ) : ?>
													<a href="<?php echo esc_url( $art_pop['linkedin'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M6.94 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM3 8.5h3.94v12H3v-12zM10 8.5h3.78v1.66h.05a4.14 4.14 0 0 1 3.73-2.05c3.99 0 4.72 2.63 4.72 6.04v6.85h-3.94v-6.07c0-1.45-.03-3.31-2.02-3.31-2.02 0-2.33 1.58-2.33 3.21v6.17H10v-12z"></path></svg></a>
												<?php endif; ?>
												<?php if ( '' !== $art_pop['twitter'] ) : ?>
													<a href="<?php echo esc_url( $art_pop['twitter'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="X"><svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M18.9 2h3.3l-7.2 8.2L23.5 22h-6.6l-5.2-6.8L5.7 22H2.4l7.7-8.8L1.5 2h6.8l4.7 6.2zm-1.2 18h1.8L7.3 3.8H5.4z"></path></svg></a>
												<?php endif; ?>
												<?php if ( '' !== $art_pop['email'] ) : ?>
													<a href="mailto:<?php echo esc_attr( $art_pop['email'] ); ?>" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></a>
												<?php endif; ?>
											</div>
										</div>
										<p class="art-byline-pop-bio"><?php echo esc_html( $art_pop['bio'] ); ?></p>
										<a class="art-byline-pop-more" href="<?php echo esc_url( $art_pop['profile'] ); ?>">
											<?php esc_html_e( 'View Full Profile', 'technbrains-child' ); ?>
											<?php echo wp_kses( tnb_art_icon( 'arrow' ), tnb_art_svg_html() ); ?>
										</a>
									</div>
								</div>
							</div>
						<?php endif; ?>
					<?php echo '' !== $art_author_url ? '</a>' : '</span>'; ?>
				<?php endif; ?>

				<?php if ( '' !== $art_published || '' !== $art_updated || '' !== $art_read_time ) : ?>
					<div class="art-hero-metacol">
						<?php if ( '' !== $art_published ) : ?>
							<span class="art-hero-metarow"><span class="art-meta-lbl"><?php esc_html_e( 'Published', 'technbrains-child' ); ?></span><?php echo esc_html( $art_published ); ?></span>
						<?php endif; ?>
						<?php if ( '' !== $art_updated ) : ?>
							<span class="art-hero-metarow art-meta-updated"><span class="art-meta-lbl"><?php esc_html_e( 'Updated', 'technbrains-child' ); ?></span><?php echo esc_html( $art_updated ); ?></span>
						<?php endif; ?>
						<?php if ( '' !== $art_read_time ) : ?>
							<span class="art-hero-metarow"><span class="art-meta-lbl"><?php esc_html_e( 'Read', 'technbrains-child' ); ?></span><?php echo esc_html( $art_read_time ); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
