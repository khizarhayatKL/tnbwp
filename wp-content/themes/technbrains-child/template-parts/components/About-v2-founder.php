<?php
/**
 * About Us V2 — 05 Founder (pull quote + portrait, then "Since then…").
 *
 * Port of ABSFounder from the QA-approved prototype
 * (about-story-copy.jsx:302-335). The quote wrapper carries .abs-fquote-wrap
 * so its 22px top margin lives in about-v2.css instead of a style attribute.
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_h2          = get_sub_field( 'abs_founder_h2' );
$abs_quote       = get_sub_field( 'abs_founder_quote' );
$abs_body        = get_sub_field( 'abs_founder_body' );
$abs_name        = get_sub_field( 'abs_founder_name' );
$abs_role        = get_sub_field( 'abs_founder_role' );
$abs_photo       = get_sub_field( 'abs_founder_photo' );
$abs_since_title = get_sub_field( 'abs_since_title' );
$abs_since_rows  = get_sub_field( 'abs_since_rows' );

if ( ! $abs_h2 && ! $abs_quote && ! $abs_since_title ) {
	return;
}

// ACF image → theme asset fallback, so the section is never left without a portrait.
$abs_photo_url = ( is_array( $abs_photo ) && ! empty( $abs_photo['url'] ) )
	? $abs_photo['url']
	: get_stylesheet_directory_uri() . '/assets/images/about-v2/founder-kazim.webp';
$abs_photo_alt = ( is_array( $abs_photo ) && ! empty( $abs_photo['alt'] ) )
	? $abs_photo['alt']
	: trim( $abs_name . ( $abs_role ? ', ' . $abs_role : '' ) );
$abs_photo_w   = ( is_array( $abs_photo ) && ! empty( $abs_photo['width'] ) ) ? (int) $abs_photo['width'] : 0;
$abs_photo_h   = ( is_array( $abs_photo ) && ! empty( $abs_photo['height'] ) ) ? (int) $abs_photo['height'] : 0;
?>
<section class="abs-chapter" data-screen-label="05 Founder">
	<div class="abs-wrap">
		<div class="abs-ch-grid">
			<div class="abs-ch-text abs-rev">
				<?php if ( $abs_h2 ) : ?>
					<h2 class="abs-h2"><?php echo esc_html( $abs_h2 ); ?></h2>
				<?php endif; ?>
				<div class="abs-fquote-wrap">
					<span class="abs-fmark" aria-hidden="true">&ldquo;</span>
					<?php if ( $abs_quote ) : ?>
						<p class="abs-fquote"><?php echo esc_html( $abs_quote ); ?></p>
					<?php endif; ?>
					<?php
					if ( ! empty( $abs_body ) ) {
						foreach ( $abs_body as $abs_para ) {
							if ( empty( $abs_para['text'] ) ) {
								continue;
							}
							echo '<p class="abs-fbody">' . esc_html( $abs_para['text'] ) . '</p>';
						}
					}
					?>
					<?php if ( $abs_name || $abs_role ) : ?>
						<div class="abs-fby">
							<?php if ( $abs_name ) : ?>
								<div class="abs-fname"><?php echo esc_html( $abs_name ); ?></div>
							<?php endif; ?>
							<?php if ( $abs_role ) : ?>
								<div class="abs-frole"><?php echo esc_html( $abs_role ); ?></div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="abs-ch-visual abs-rev d1">
				<div class="abs-founder-photo">
					<img src="<?php echo esc_url( $abs_photo_url ); ?>" alt="<?php echo esc_attr( $abs_photo_alt ); ?>"<?php echo $abs_photo_w ? ' width="' . esc_attr( $abs_photo_w ) . '"' : ''; ?><?php echo $abs_photo_h ? ' height="' . esc_attr( $abs_photo_h ) . '"' : ''; ?> loading="lazy" decoding="async" />
				</div>
			</div>
		</div>

		<?php if ( $abs_since_title || ! empty( $abs_since_rows ) ) : ?>
			<div class="abs-since abs-rev d1">
				<?php if ( $abs_since_title ) : ?>
					<h2 class="abs-since-title"><?php echo esc_html( $abs_since_title ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $abs_since_rows ) ) : ?>
					<div class="abs-since-rows">
						<?php
						foreach ( $abs_since_rows as $abs_i => $abs_row ) {
							$abs_lead = isset( $abs_row['lead'] ) ? $abs_row['lead'] : '';
							$abs_sub  = isset( $abs_row['sub'] ) ? $abs_row['sub'] : '';

							if ( '' === trim( (string) $abs_lead ) && '' === trim( (string) $abs_sub ) ) {
								continue;
							}
							?>
							<div class="abs-since-row<?php echo ( 0 !== $abs_i % 2 ) ? ' alt' : ''; ?> solo">
								<div class="abs-since-copy">
									<?php if ( $abs_lead ) : ?>
										<p class="abs-since-lead"><?php echo esc_html( $abs_lead ); ?></p>
									<?php endif; ?>
									<?php if ( $abs_sub ) : ?>
										<p class="abs-since-sub"><?php echo esc_html( $abs_sub ); ?></p>
									<?php endif; ?>
								</div>
							</div>
							<?php
						}
						?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
