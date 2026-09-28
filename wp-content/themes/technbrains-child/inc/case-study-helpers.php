<?php
/**
 * Case Study — render helpers shared by the section partials.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * Inline HTML permitted in case study copy fields.
 *
 * The approved design puts line breaks and a highlight span inside headings and body copy,
 * so those two tags have to survive. Everything else is stripped: these fields are edited
 * by hand and must not become an HTML injection surface.
 *
 * @return array<string, array<string, bool>>
 */
function tnb_cs_allowed_html(): array {
	return array(
		'br'   => array(),
		'span' => array(
			'class' => true,
			'style' => true,
		),
	);
}

/**
 * Returns an inline icon from assets/images/case-study/icons/.
 *
 * Inlined from the file rather than referenced with <img> on purpose: every icon in the
 * approved design draws with stroke="currentColor" and takes its colour from the parent
 * (.cs-solx2-ic sets --cs-red, .cs-about-scale-ic sets #FF6168, and both change on hover).
 * An <img> has no CSS context, so currentColor would resolve to black and every state
 * change would stop working.
 *
 * Reads each file at most once per request. Returns '' for an unknown name so a renamed
 * icon degrades to a missing glyph rather than a fatal.
 *
 * @param string $name File basename without extension, e.g. 'fact-industry'.
 * @return string Inline SVG markup, or '' if the file does not exist.
 */
function tnb_cs_icon( string $name ): string {
	static $cache = array();

	if ( isset( $cache[ $name ] ) ) {
		return $cache[ $name ];
	}

	// Basename only — never let a field value walk out of the icon directory.
	$safe = preg_replace( '/[^a-z0-9-]/', '', strtolower( $name ) );
	$path = get_stylesheet_directory() . '/assets/images/case-study/icons/' . $safe . '.svg';

	if ( '' === $safe || ! file_exists( $path ) ) {
		$cache[ $name ] = '';
		return '';
	}

	$svg = trim( (string) file_get_contents( $path ) );

	// The files keep xmlns so each one is a valid standalone SVG document that can be opened
	// or served on its own. Inline in HTML the attribute is redundant — the HTML parser puts
	// <svg> in the SVG namespace itself — so it is dropped here to keep the rendered markup
	// identical to the approved design.
	$svg = str_replace( ' xmlns="http://www.w3.org/2000/svg"', '', $svg );

	$cache[ $name ] = $svg;

	return $svg;
}

/**
 * Renders one icon slot: an uploaded override if the row has one, otherwise the built-in
 * icon that belongs to that position in the approved design.
 *
 * Position-keyed rather than chosen per row, matching About-v2-capabilities.php: reordering
 * a repeater keeps the design's icon-per-position, and an editor cannot end up with a card
 * that has no icon at all.
 *
 * @param array<int, string> $defaults Index => icon file basename.
 * @param int                $index    Zero-based row index.
 * @param mixed              $override ACF image value, or empty.
 * @return string Inline SVG or an <img>, whichever applies.
 */
function tnb_cs_icon_slot( array $defaults, int $index, $override = null ): string {
	if ( is_array( $override ) && ! empty( $override['url'] ) ) {
		return sprintf(
			'<img src="%1$s" alt="%2$s" loading="lazy" decoding="async">',
			esc_url( $override['url'] ),
			esc_attr( $override['alt'] ?? '' )
		);
	}

	return isset( $defaults[ $index ] ) ? tnb_cs_icon( $defaults[ $index ] ) : '';
}

/**
 * Renders a multi-paragraph copy field the way the approved design marks it up.
 *
 * Two modes, because the reference is not consistent and both forms are load-bearing:
 *
 *   'br' — one <p> with <br><br> between paragraphs. Used by the About, Technology and
 *          Engagement bodies.
 *   'p'  — a separate <p> per paragraph. Used by the Problem narrative.
 *
 * Paragraphs are split on a blank line. Attributes for the wrapping <p> are passed through
 * already-escaped by the caller, since each section carries its own class and inline style
 * from the design.
 *
 * @param string $text  Raw field value.
 * @param string $mode  'br' or 'p'.
 * @param string $attrs Attribute string for the <p>, e.g. ' class="cs-body"'.
 * @return string
 */
function tnb_cs_paragraphs( string $text, string $mode = 'br', string $attrs = '' ): string {
	$text = trim( $text );
	if ( '' === $text ) {
		return '';
	}

	$parts = preg_split( '/\R\s*\R/', $text );
	$parts = array_values( array_filter( array_map( 'trim', (array) $parts ), 'strlen' ) );

	if ( ! $parts ) {
		return '';
	}

	$allowed = tnb_cs_allowed_html();

	if ( 'p' === $mode ) {
		$out = '';
		foreach ( $parts as $part ) {
			$out .= '<p' . $attrs . '>' . wp_kses( $part, $allowed ) . '</p>';
		}
		return $out;
	}

	$joined = implode( '<br><br>', array_map(
		static function ( string $part ) use ( $allowed ): string {
			return wp_kses( $part, $allowed );
		},
		$parts
	) );

	return '<p' . $attrs . '>' . $joined . '</p>';
}

/**
 * Two-digit index label — 01, 02, … — as used by the challenge list and capability tabs.
 *
 * @param int $index Zero-based row index.
 * @return string
 */
function tnb_cs_index( int $index ): string {
	return str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT );
}

