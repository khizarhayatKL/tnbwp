<?php
/**
 * Staff Augmentation — Trusted Brands (two-row marquee).
 *
 * Layout : sa_brands (ACF Flexible Content)
 * Fields : sab_eyebrow, sab_heading, sab_sub, sab_row_a{sab_logo}, sab_row_b{sab_logo}
 * CSS    : assets/css/components.css (.sa-brands, .sa-marq*)
 * JS     : none — the marquee is a CSS animation.
 *
 * Each row's set is printed three times because the keyframe translates the track
 * by exactly -100%/3; two passes would jump, and any other count would leave a
 * gap mid-loop. The editor adds each logo once, and the two repeat passes are
 * aria-hidden so a screen reader reads the list once rather than three times.
 *
 * The accessible name comes from the attachment's own Alt Text: wp_get_attachment_image()
 * reads it from the media library when no alt is passed, so the name lives with the
 * image and stays right wherever else that logo is used. The repeat passes force an
 * empty alt instead, which is what makes them silent.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$sab_eyebrow = (string) get_sub_field( 'sab_eyebrow' );
$sab_heading = (string) get_sub_field( 'sab_heading' );
$sab_sub     = (string) get_sub_field( 'sab_sub' );
$sab_row_a   = (array) get_sub_field( 'sab_row_a' );
$sab_row_b   = (array) get_sub_field( 'sab_row_b' );

if ( ! $sab_row_a && ! $sab_row_b ) {
	return;
}

$sab_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

/**
 * One marquee row: the set, three times over.
 *
 * @param array $rows ACF repeater rows.
 * @param bool  $rev  Whether this row scrolls the other way.
 * @return void
 */
if ( ! function_exists( 'tnb_sab_marquee_row' ) ) {
	function tnb_sab_marquee_row( array $rows, bool $rev = false ): void {
		// Rows without an image are dropped up front rather than skipped inside the
		// pass loop: the keyframe assumes all three passes hold the same number of
		// chips, so a mid-loop `continue` would shorten one pass and jog the track.
		$logos = array();

		foreach ( $rows as $row ) {
			$id = (int) ( $row['sab_logo']['ID'] ?? 0 );

			if ( $id ) {
				$link    = $row['sab_logo_link'] ?? null;
				$logos[] = array(
					'id'     => $id,
					'url'    => is_array( $link ) ? (string) ( $link['url'] ?? '' ) : '',
					'target' => is_array( $link ) ? (string) ( $link['target'] ?? '' ) : '',
				);
			}
		}

		if ( ! $logos ) {
			return;
		}
		?>
		<div class="sa-marq-row">
			<div class="sa-marq-track<?php echo $rev ? ' sa-marq-track-rev' : ''; ?>">
				<?php for ( $pass = 0; $pass < 3; $pass++ ) : ?>
					<?php foreach ( $logos as $logo ) : ?>
						<?php
						$attr = array(
							'loading'  => 'lazy',
							'decoding' => 'async',
						);

						if ( $pass > 0 ) {
							$attr['alt'] = '';
						}

						$img = wp_get_attachment_image( $logo['id'], 'medium', false, $attr );

						// Linked chips on the repeat passes stay aria-hidden AND leave the
						// tab order (tabindex=-1) — a focusable aria-hidden link is an
						// accessibility violation, and two extra stops per logo is noise.
						if ( '' !== $logo['url'] ) {
							echo '<a class="sa-marq-chip" href="' . esc_url( $logo['url'] ) . '"'
								. ( ! empty( $logo['target'] ) ? ' target="' . esc_attr( $logo['target'] ) . '" rel="noopener"' : '' )
								. ( $pass > 0 ? ' aria-hidden="true" tabindex="-1"' : '' )
								. '>' . $img . '</a>';
						} else {
							echo '<span class="sa-marq-chip"' . ( $pass > 0 ? ' aria-hidden="true"' : '' ) . '>' . $img . '</span>';
						}
						?>
					<?php endforeach; ?>
				<?php endfor; ?>
			</div>
		</div>
		<?php
	}
}
?>
<section class="sa-brands">
	<div class="container">
		<?php if ( '' !== $sab_eyebrow || '' !== $sab_heading || '' !== $sab_sub ) : ?>
			<div class="sa-section-head sa-center">
				<?php if ( '' !== $sab_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $sab_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $sab_heading ) : ?>
					<h2 class="sa-h2"><?php echo wp_kses( $sab_heading, $sab_kses ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $sab_sub ) : ?>
					<p class="sa-section-sub"><?php echo wp_kses( $sab_sub, $sab_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="sa-marq">
			<?php
			tnb_sab_marquee_row( $sab_row_a );
			tnb_sab_marquee_row( $sab_row_b, true );
			?>
		</div>
	</div>
</section>
