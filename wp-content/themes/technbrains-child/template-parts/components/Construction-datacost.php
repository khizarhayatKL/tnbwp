<?php
/**
 * Construction Software — What poor data management costs (cited stat bar).
 *
 * Layout : cn_datacost (ACF Flexible Content)
 * Fields : cnd_eyebrow, cnd_heading, cnd_sub, cnd_anchor,
 *          cnd_tiles{ cnd_tile_value, cnd_tile_label, cnd_tile_source },
 *          cnd_note, cnd_take_tag, cnd_take_text
 * CSS    : assets/css/construction.css (.cn-datacost-*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * Every figure on this page is somebody else's research, and the copy deck requires a source tag
 * under each one. The source is a single ACF link field, so the label and the URL are one thing an
 * editor fills in rather than two fields that can drift apart. With a URL it renders as a link
 * opening in a new tab with rel="noopener noreferrer" — these point at Autodesk, FMI and Intuit,
 * all third parties. With a label but no URL it degrades to plain text, so a figure can never
 * appear unattributed just because nobody had the link to hand.
 *
 * The closing block is explicitly labelled as our own reading rather than more cited data. Mixing
 * an opinion in with four sourced figures without marking it would misrepresent it as research,
 * which matters more here than on a normal marketing section.
 *
 * The tile value is not animated. A count-up on a figure like $1.85T reads as decoration on a
 * citation, and components.js already owns the [data-count] behaviour if that is ever wanted.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnd_eyebrow = (string) get_sub_field( 'cnd_eyebrow' );
$cnd_heading = tnb_accent_heading( (string) get_sub_field( 'cnd_heading' ) );
$cnd_sub     = (string) get_sub_field( 'cnd_sub' );
$cnd_anchor  = sanitize_title( (string) get_sub_field( 'cnd_anchor' ) );
$cnd_tiles   = (array) get_sub_field( 'cnd_tiles' );

$cnd_note      = (string) get_sub_field( 'cnd_note' );
$cnd_take_tag  = (string) get_sub_field( 'cnd_take_tag' );
$cnd_take_text = (string) get_sub_field( 'cnd_take_text' );

$cnd_kses = tnb_cn_allowed_html();

if ( ! $cnd_tiles && '' === $cnd_note && '' === $cnd_take_text ) {
	return;
}
?>
<section class="dt-section gray cn-datacost-sec"<?php echo '' !== $cnd_anchor ? ' id="' . esc_attr( $cnd_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $cnd_eyebrow || '' !== $cnd_heading || '' !== $cnd_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cnd_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cnd_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cnd_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cnd_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $cnd_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $cnd_sub, $cnd_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $cnd_tiles ) : ?>
			<div class="cn-datacost-grid">
				<?php
				foreach ( $cnd_tiles as $cnd_tile ) :
					$cnd_value  = trim( (string) ( $cnd_tile['cnd_tile_value'] ?? '' ) );
					$cnd_label  = trim( (string) ( $cnd_tile['cnd_tile_label'] ?? '' ) );
					$cnd_link   = $cnd_tile['cnd_tile_source'] ?? null;
					$cnd_source = is_array( $cnd_link ) ? trim( (string) ( $cnd_link['title'] ?? '' ) ) : '';
					$cnd_url    = is_array( $cnd_link ) ? trim( (string) ( $cnd_link['url'] ?? '' ) ) : '';

					if ( '' === $cnd_value && '' === $cnd_label ) {
						continue;
					}

					if ( '#' === $cnd_url ) {
						$cnd_url = '';
					}

					// A link with a URL but no title still has to show something, or the citation
					// silently disappears. The URL's host is a reasonable last resort.
					if ( '' === $cnd_source && '' !== $cnd_url ) {
						$cnd_source = (string) wp_parse_url( $cnd_url, PHP_URL_HOST );
					}
					?>
					<div class="cn-datacost-tile dt-rev">
						<?php if ( '' !== $cnd_value ) : ?>
							<div class="cn-datacost-v"><?php echo esc_html( $cnd_value ); ?></div>
						<?php endif; ?>

						<?php if ( '' !== $cnd_label ) : ?>
							<div class="cn-datacost-l"><?php echo wp_kses( $cnd_label, $cnd_kses ); ?></div>
						<?php endif; ?>

						<?php if ( '' !== $cnd_source ) : ?>
							<div class="cn-datacost-s">
								<?php if ( '' !== $cnd_url ) : ?>
									<a href="<?php echo esc_url( $cnd_url ); ?>" target="_blank" rel="noopener noreferrer"><?php
										echo esc_html( $cnd_source );
									?></a>
								<?php else : ?>
									<?php echo esc_html( $cnd_source ); ?>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( '' !== $cnd_note ) : ?>
			<p class="cn-datacost-note dt-rev"><?php echo wp_kses_post( $cnd_note ); ?></p>
		<?php endif; ?>

		<?php if ( '' !== $cnd_take_text ) : ?>
			<div class="cn-datacost-take dt-rev">
				<?php if ( '' !== $cnd_take_tag ) : ?>
					<span class="cn-datacost-take-tag"><?php echo esc_html( $cnd_take_tag ); ?></span>
				<?php endif; ?>
				<p><?php echo wp_kses( $cnd_take_text, $cnd_kses ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
