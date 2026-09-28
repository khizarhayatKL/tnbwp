<?php
/**
 * Construction Software page — shared helpers.
 *
 * The prototype keeps one icon set (CNi in construction-1.jsx) that six of the sections draw
 * from, so it lives here rather than being repeated per template. Same arrangement as
 * inc/case-study-helpers.php, except these are authored inline instead of read off disk: the set
 * is fixed by the approved design and is not editor-selectable, so there is nothing to upload and
 * no file that can go missing.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * The allowlist for authored copy in this page's fields.
 *
 * Matches what the other section families permit: <br> for a forced line break and <span> for the
 * red accent, which tnb_accent_heading() stamps the class onto. Anything else an editor pastes is
 * stripped.
 *
 * @return array<string, array<string, bool>>
 */
function tnb_cn_allowed_html(): array {
	return array(
		'br'   => array(),
		'span' => array( 'class' => true ),
		'a'    => array(
			'href'   => true,
			'title'  => true,
			'target' => true,
			'rel'    => true,
		),
	);
}

/**
 * The allowlist for the inline SVGs below.
 *
 * Deliberately separate from the copy allowlist, so markup an editor supplies can never carry SVG
 * through — only these helpers can.
 *
 * @return array<string, array<string, bool>>
 */
function tnb_cn_svg_html(): array {
	$attrs = array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
		'focusable'       => true,
		'class'           => true,
	);

	return array(
		'svg'      => $attrs,
		'path'     => array( 'd' => true ),
		'polyline' => array( 'points' => true ),
		'polygon'  => array( 'points' => true ),
		'circle'   => array( 'cx' => true, 'cy' => true, 'r' => true ),
		'rect'     => array( 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true ),
		'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
	);
}

/**
 * One icon from the approved set, as inline SVG.
 *
 * Geometry is the prototype's, verbatim. No width or height attributes: every icon is sized by its
 * wrapper in construction.css, and an unsized SVG inside an inline-flex wrapper collapses to 0x0 —
 * the defect that hid the risk-slider arrow on the Software Outsourcing page.
 *
 * aria-hidden defaults to true because each icon sits beside its own text label; pass false only
 * for an icon that carries meaning on its own.
 *
 * @param string $name   Icon key.
 * @param bool   $hidden Whether to mark it decorative.
 * @return string SVG markup, or '' when the key is unknown.
 */
function tnb_cn_icon( string $name, bool $hidden = true ): string {
	static $set = null;

	if ( null === $set ) {
		$s = 'fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"';

		$set = array(
			'check'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.6"><polyline points="20 6 9 17 4 12"/></svg>',
			'point'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.6"><polyline points="9 6 15 12 9 18"/></svg>',
			'trend'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.2"><polyline points="3 17 9 11 13 15 21 7"/><polyline points="15 7 21 7 21 13"/></svg>',
			'arrow'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
			'bolt'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
			'clipboard' => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M9 4h6a1 1 0 0 1 1 1v1H8V5a1 1 0 0 1 1-1z"/><rect x="4" y="6" width="16" height="15" rx="2"/><path d="M9 12h6M9 16h4"/></svg>',
			// Construction-ai.php's "Change order risk flagging" card — same clipboard base, cross-flag mark instead of notes-lines.
			'clipboard-flag' => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M9 4h6a1 1 0 0 1 1 1v1H8V5a1 1 0 0 1 1-1z"/><rect x="4" y="6" width="16" height="15" rx="2"/><path d="M12 11v6M9 14h6"/></svg>',
			'ruler'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M3 15l6-12 12 6-6 12z"/><path d="M8 6l2 1M6 10l2 1M11 8l2 1"/></svg>',
			'doc'       => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5M9 13h6M9 17h6"/></svg>',
			// Construction-ai.php's "Document Q&A" card — same doc base, 2-line tail matching the reference exactly.
			'doc-alt'   => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5M9 13h6M9 17h4"/></svg>',
			'truck'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M1 6h13v10H1zM14 9h4l3 3v4h-7z"/><circle cx="5.5" cy="18" r="1.6"/><circle cx="17.5" cy="18" r="1.6"/></svg>',
			'layers'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>',
			'helmet'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M3 17h18M4 17v-2a8 8 0 0 1 16 0v2"/><path d="M10 7V5a2 2 0 0 1 4 0v2"/></svg>',
			'calc'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><rect x="5" y="2" width="14" height="20" rx="2"/><path d="M9 6h6M8 11h.01M12 11h.01M16 11h.01M8 15h.01M12 15h.01M16 15h.01M8 19h4"/></svg>',
			'crm'       => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg>',
			'portal'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
			'gauge'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M12 14l4-4"/><path d="M3.5 18a9 9 0 1 1 17 0"/></svg>',
			'link'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M10 13a5 5 0 0 0 7 0l3-3a5 5 0 0 0-7-7l-1.5 1.5"/><path d="M14 11a5 5 0 0 0-7 0l-3 3a5 5 0 0 0 7 7l1.5-1.5"/></svg>',
			'cal'       => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M3 9h18M8 2v4M16 2v4M8 14h3M8 17h6"/></svg>',
			'pin'       => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
			// Adoption-risk set (construction-3.jsx, CN_ABANDON).
			'undo'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><polyline points="1 4 1 10 7 10"/><path d="M3.5 15a9 9 0 1 0 2.1-9.4L1 10"/></svg>',
			'nosignal'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><line x1="2" y1="2" x2="22" y2="22"/><path d="M8.5 16.5a5 5 0 0 1 7 0"/><path d="M2 8.8a15.4 15.4 0 0 1 4.3-2.6"/><path d="M22 8.8a15.4 15.4 0 0 0-4.7-2.8"/><path d="M5 12.6a10 10 0 0 1 3-1.8"/><path d="M19 12.6a10 10 0 0 0-2-1.3"/><line x1="12" y1="20" x2="12.01" y2="20"/></svg>',
			'lock'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 9.9-1"/></svg>',
			'alert'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
			'teach'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c0 1 2.7 2.5 6 2.5s6-1.5 6-2.5v-5"/></svg>',
			// AI use-case set (construction-3.jsx, CN_AI). gauge, doc, calc and layers are reused
			// from the set above; only these two are unique to it.
			'camera'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="12" cy="12" r="3"/></svg>',
			'chart'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M3 3v18h18"/><path d="M7 14l4-4 3 3 5-6"/></svg>',
			// Carousel and accordion controls.
			'chevleft'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>',
			'chevright' => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>',
			'chevdown'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>',
			'quote'     => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7.17 5A4.17 4.17 0 0 0 3 9.17V19h8v-8H6.5A2.67 2.67 0 0 1 9.17 8.33V5H7.17zm10 0A4.17 4.17 0 0 0 13 9.17V19h8v-8h-4.5a2.67 2.67 0 0 1 2.67-2.67V5h-2z"/></svg>',
			'linkedin'  => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.94 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM3 8.5h3.94v12H3v-12zM10 8.5h3.78v1.66h.05a4.14 4.14 0 0 1 3.73-2.05c3.99 0 4.72 2.63 4.72 6.04v6.85h-3.94v-6.07c0-1.45-.03-3.31-2.02-3.31-2.02 0-2.33 1.58-2.33 3.21v6.17H10v-12z"/></svg>',
		);
	}

	if ( ! isset( $set[ $name ] ) ) {
		return '';
	}

	$svg = $set[ $name ];

	if ( $hidden ) {
		$svg = str_replace( '<svg ', '<svg aria-hidden="true" focusable="false" ', $svg );
	}

	return $svg;
}

/**
 * The icon for one row of a repeater, keyed by position — with an optional per-row image upload
 * that overrides the default.
 *
 * Position-keyed rather than chosen per row, the same approach as tnb_cs_icon_slot() and
 * About-v2-capabilities.php: reordering a repeater keeps the design's icon-per-position, and an
 * editor cannot end up with a card that has no icon at all. Rows beyond the list fall back to the
 * first key rather than rendering an empty slot.
 *
 * Self-escaping on both branches (matching tnb_cs_icon_slot()), so callers should echo the return
 * value directly rather than wrapping it in another wp_kses() call.
 *
 * @param array<int, string> $keys     Icon keys for positions 0..n.
 * @param int                $index    Zero-based row index.
 * @param mixed              $override ACF image field value (array with a 'url' key), or empty.
 * @return string An <img> tag when $override has a URL, else the SVG markup for this position.
 */
function tnb_cn_icon_slot( array $keys, int $index, $override = null ): string {
	if ( is_array( $override ) && ! empty( $override['url'] ) ) {
		return sprintf(
			'<img src="%1$s" alt="" loading="lazy" decoding="async">',
			esc_url( $override['url'] )
		);
	}

	if ( ! $keys ) {
		return '';
	}

	return wp_kses( tnb_cn_icon( (string) ( $keys[ $index ] ?? $keys[0] ) ), tnb_cn_svg_html() );
}
