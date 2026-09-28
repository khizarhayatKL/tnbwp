<?php
/**
 * Case Study — Client reel (marquee).
 *
 * The marquee scrolls the track to -50% and restarts, so the set has to be painted twice for
 * the loop to be seamless. Each item is a fifth of the viewport wide, which means one half of
 * the track only fills the screen once it holds five items — a reel of three clients would
 * otherwise scroll a visible gap into view. So the set is repeated as many times as it takes
 * to reach five per half, and that whole sequence is then painted twice.
 *
 * Only the first pass is real. Every later pass is decorative: aria-hidden, empty alt, and
 * tabindex="-1" on the anchor, so a client is announced once and its link is reachable once no
 * matter how many times it is painted.
 *
 * The accessible name comes from the attachment's own Alt Text — wp_get_attachment_image()
 * reads it from the media library when no alt is passed, so the name lives with the image
 * instead of being retyped on every case study that features the same client.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_h2    = (string) get_field( 'cs_logos_h2' );
$cs_logos = (array) get_field( 'cs_logos' );

// A row is the logo, so a row without one has nothing to paint. Filtered up front rather than
// skipped in the loop, because the repeat count below counts renderable items.
$cs_logos = array_values(
	array_filter(
		$cs_logos,
		static function ( $row ): bool {
			return (int) ( $row['cs_logo_img']['ID'] ?? 0 ) > 0;
		}
	)
);

if ( ! $cs_logos ) {
	return;
}

// Five items fill one screen, so one half of the track needs at least five. Two halves of that
// sequence give the seamless -50% loop.
$cs_reel_reps = (int) max( 1, (int) ceil( 5 / count( $cs_logos ) ) ) * 2;

/**
 * One reel item.
 *
 * @param array $row     Repeater row.
 * @param bool  $is_dupe Whether this is a repeated, decorative pass.
 * @return string
 */
$cs_logo_item = static function ( array $row, bool $is_dupe ): string {
	$img_id = (int) ( $row['cs_logo_img']['ID'] ?? 0 );
	$link   = is_array( $row['cs_logo_link'] ?? null ) ? $row['cs_logo_link'] : array();
	$url    = (string) ( $link['url'] ?? '' );
	$target = (string) ( $link['target'] ?? '' );

	// alt is only forced on the decorative passes; the real one inherits the attachment's.
	$attr = array(
		'loading'  => 'lazy',
		'decoding' => 'async',
	);

	if ( $is_dupe ) {
		$attr['alt'] = '';
	}

	$mark = wp_get_attachment_image( $img_id, 'medium', false, $attr );

	if ( '' !== $url ) {
		$mark = sprintf(
			'<a href="%1$s"%2$s%3$s>%4$s</a>',
			esc_url( $url ),
			'' !== $target ? ' target="' . esc_attr( $target ) . '" rel="noopener"' : '',
			$is_dupe ? ' tabindex="-1"' : '',
			$mark
		);
	}

	return $is_dupe
		? '<li class="cs-logo" aria-hidden="true">' . $mark . '</li>'
		: '<li class="cs-logo">' . $mark . '</li>';
};
?>
<div class="cs-logos">
	<?php if ( '' !== $cs_h2 ) : ?>
		<div class="cs-wrap cs-logos-head"><h2 class="cs-h2"><?php echo wp_kses( $cs_h2, tnb_cs_allowed_html() ); ?></h2></div>
	<?php endif; ?>
	<div class="cs-logos-marquee">
		<ul class="cs-logos-track">
			<?php for ( $cs_pass = 0; $cs_pass < $cs_reel_reps; $cs_pass++ ) : ?>
				<?php foreach ( $cs_logos as $cs_logo ) : ?>
					<?php echo $cs_logo_item( (array) $cs_logo, $cs_pass > 0 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the closure. ?>
				<?php endforeach; ?>
			<?php endfor; ?>
		</ul>
	</div>
</div>
