<?php
/**
 * Article template family — shared helpers.
 *
 * The prototype's "article" pages (Procore Alternatives, and its siblings — the Cost, ERP and
 * Scheduling pages the silo module links to) share one icon set (ARTi in article-1.jsx, plus a
 * handful drawn from procore-app.jsx's own DIAG_ICONS/TREND sets). Kept here rather than repeated
 * per component, same arrangement as inc/construction-helpers.php.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * The allowlist for authored copy in this page family's fields.
 *
 * @return array<string, array<string, bool>>
 */
function tnb_art_allowed_html(): array {
	return array(
		'br'     => array(),
		'strong' => array(),
		'em'     => array(),
		'a'      => array(
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
 * @return array<string, array<string, bool>>
 */
function tnb_art_svg_html(): array {
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
		'path'     => array( 'd' => true, 'fill' => true, 'stroke' => true ),
		'polyline' => array( 'points' => true ),
		'polygon'  => array( 'points' => true ),
		'circle'   => array( 'cx' => true, 'cy' => true, 'r' => true, 'fill' => true, 'stroke' => true ),
		'ellipse'  => array( 'cx' => true, 'cy' => true, 'rx' => true, 'ry' => true, 'fill' => true, 'stroke' => true ),
		'rect'     => array( 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true ),
		'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
	);
}

/**
 * One icon from the approved set, as inline SVG.
 *
 * Geometry is the prototype's (article-1.jsx's ARTi, plus procore-app.jsx's DIAG_ICONS), verbatim.
 * No width/height attributes — sized by the wrapper, same reasoning as tnb_cn_icon().
 *
 * @param string $name   Icon key.
 * @param bool   $hidden Whether to mark it decorative.
 * @return string SVG markup, or '' when the key is unknown.
 */
function tnb_art_icon( string $name, bool $hidden = true ): string {
	static $set = null;

	if ( null === $set ) {
		$s = 'fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"';

		$set = array(
			// article-1.jsx, ARTi.
			'arrow'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
			'arrowSm'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
			'check'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.6"><polyline points="20 6 9 17 4 12"/></svg>',
			'x'        => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.4"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>',
			'chevron'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.4"><polyline points="6 9 12 15 18 9"/></svg>',
			'gauge'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M12 14l4-4"/><path d="M3.5 18a9 9 0 1 1 17 0"/></svg>',
			'scope'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>',
			'eye'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>',
			'info'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.9"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg>',
			'quote'    => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7.5 6C5 6 3 8 3 10.5S5 15 7.5 15c.2 0 .4 0 .6-.05C7.5 16.5 6 18 3.5 18.5c-.3.06-.5.3-.5.6 0 .4.3.7.7.6C8 19 11 15.8 11 11c0-2.8-1.6-5-3.5-5zm11 0C16 6 14 8 14 10.5s2 4.5 4.5 4.5c.2 0 .4 0 .6-.05-.6 1.55-2.1 3.05-4.6 3.55-.3.06-.5.3-.5.6 0 .4.3.7.7.6C19 19 22 15.8 22 11c0-2.8-1.6-5-3.5-5z"/></svg>',
			'pulse'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.9"><path d="M3 12h4l2.5-6 5 12L17 12h4"/></svg>',
			// procore-app.jsx, DIAG_ICONS — the 3 diagnostic-block icons.
			'cost'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M14.5 9a2.5 2 0 0 0-2.5-1.5c-1.5 0-2.5.8-2.5 2s1 1.6 2.5 2 2.5.9 2.5 2-1 2-2.5 2A2.5 2 0 0 1 9.5 15"/><path d="M12 6v1.5M12 16.5V18"/></svg>',
			'fit'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><rect x="3" y="8" width="8" height="12" rx="1.5"/><rect x="13" y="4" width="8" height="16" rx="1.5"/><path d="M6 12h2M6 15h2M16 8h2M16 11h2"/></svg>',
			'field'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><rect x="6" y="2.5" width="12" height="19" rx="2.5"/><path d="M10.5 18.5h3"/></svg>',
			// cost-app.jsx, MINI_ICONS — the 6-icon rotating set for Article-MiniList.php.
			'mini-people'   => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
			'mini-modules'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/></svg>',
			'mini-link'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>',
			'mini-data'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>',
			'mini-support'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>',
			'mini-clock'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><line x1="12" y1="20" x2="12" y2="10"/><line x1="18" y1="20" x2="18" y2="4"/><line x1="6" y1="20" x2="6" y2="16"/></svg>',
			// article-3.jsx, MINI_ICONS — the Scheduling page's own separate 5-icon rotating set
			// for Article-MiniList.php (distinct from cost-app.jsx's 6-icon set above).
			'mini2-link'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M9 15l6-6"/><path d="M10.5 6.5l1-1a4 4 0 0 1 6 6l-1 1"/><path d="M13.5 17.5l-1 1a4 4 0 0 1-6-6l1-1"/></svg>',
			'mini2-layers'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M3 7l9-4 9 4-9 4-9-4z"/><path d="M3 12l9 4 9-4"/><path d="M3 17l9 4 9-4"/></svg>',
			'mini2-monitor' => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M8 21h8M12 18v3"/></svg>',
			'mini2-clock'   => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>',
			'mini2-star'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M12 2l2.4 7.4H22l-6 4.6 2.3 7.4L12 17l-6.3 4.4L8 14 2 9.4h7.6z"/></svg>',
			// cost-app.jsx, SourcedStatBlock's own inline link icon (distinct curve/weight from mini-link).
			'stat-link'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2"><path d="M10 13a5 5 0 0 0 7 0l3-3a5 5 0 0 0-7-7l-1 1"/><path d="M14 11a5 5 0 0 0-7 0l-3 3a5 5 0 0 0 7 7l1-1"/></svg>',
			// cost-app.jsx, VendorTable's V_STATE icons (yes/no reuse tnb_art_icon('check'/'x')).
			'vendor-partial'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a9 9 0 0 1 0 18z" fill="currentColor" stroke="none"/><circle cx="12" cy="12" r="9"/></svg>',
			'vendor-nolonger' => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.2"><path d="M21 12a9 9 0 1 1-3-6.7"/><polyline points="21 4 21 9 16 9"/></svg>',
			// cost-app.jsx, ContradictTable's "direct competitor" flag icon.
			'competitor-flag' => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V4s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg>',
			// article-1.jsx, CRIT_ICONS — the 7-icon rotating set for Article-CriteriaCards.php.
			'crit-list'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M3 6h8M3 12h5M3 18h8"/><path d="M14 5l4 4-4 4"/><path d="M18 9h3"/></svg>',
			'crit-device'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><rect x="7" y="3" width="10" height="18" rx="2"/><path d="M11 18h2"/></svg>',
			'crit-offline' => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M5 12.5a11 11 0 0 1 14 0"/><path d="M8.5 16a6 6 0 0 1 7 0"/><path d="M12 19.5h.01"/><path d="M2 2l20 20"/></svg>',
			'crit-link'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M9 15l6-6"/><path d="M10.5 6.5l1-1a4 4 0 0 1 6 6l-1 1"/><path d="M13.5 17.5l-1 1a4 4 0 0 1-6-6l1-1"/></svg>',
			'crit-export'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M12 3v11"/><path d="M8 10l4 4 4-4"/><path d="M5 20h14"/></svg>',
			'crit-tag'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M20.6 13.4L11 3.8A2 2 0 0 0 9.6 3.2H4a1 1 0 0 0-1 1v5.6a2 2 0 0 0 .6 1.4l9.6 9.6a2 2 0 0 0 2.8 0l4.6-4.6a2 2 0 0 0 0-2.8z"/><circle cx="7.5" cy="7.5" r="1.3" fill="currentColor" stroke="none"/></svg>',
			'crit-owner'   => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.8"><path d="M4 21V7l8-4 8 4v14"/><path d="M9 21v-6h6v6"/><path d="M9 10h.01M15 10h.01"/></svg>',
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
 * One diagnostic icon slot — an uploaded image overrides the position-mapped default icon.
 *
 * Mirrors tnb_cn_icon_slot() (inc/construction-helpers.php) for the Article family's own icon set;
 * used by Article-DiagSet.php now that its per-row icon field is an image upload, not a select.
 *
 * @param array      $keys     Fixed icon-key set, mapped to rows by position.
 * @param int        $index    Zero-based row index.
 * @param array|null $override ACF image field value (array with 'url'), or empty/false for none.
 * @return string Escaped <img> tag or SVG markup.
 */
function tnb_art_icon_slot( array $keys, int $index, $override = null ): string {
	if ( is_array( $override ) && ! empty( $override['url'] ) ) {
		return sprintf(
			'<img src="%1$s" alt="" loading="lazy" decoding="async">',
			esc_url( $override['url'] )
		);
	}

	if ( ! $keys ) {
		return '';
	}

	return wp_kses( tnb_art_icon( (string) ( $keys[ $index ] ?? $keys[0] ) ), tnb_art_svg_html() );
}

/**
 * Shortcode wrapper around Article-CostCalculator.php, so the calculator can be dropped into any
 * existing component/page — not only a page built on the article flexible-content family — via
 * `echo do_shortcode( '[tnb_cost_calculator]' )` or the literal shortcode text in a WYSIWYG field.
 *
 * Article-CostCalculator.php's only field read is `art_anchor` via get_sub_field(), which simply
 * returns empty outside a flexible-content row context — safe, just renders with no anchor id.
 *
 * Whichever page/component actually uses this shortcode is responsible for its own
 * article.css / article-toc.js enqueue (tnb_page_has_layout('art_cost_calculator') only covers
 * pages using the ACF layout directly, not a hardcoded shortcode call elsewhere).
 *
 * @return string
 */
add_shortcode( 'tnb_cost_calculator', 'tnb_art_cost_calculator_shortcode' );
function tnb_art_cost_calculator_shortcode(): string {
	ob_start();
	get_template_part( 'template-parts/components/Article-CostCalculator' );
	return (string) ob_get_clean();
}

/**
 * The trend-line path for a cost model's mini sparkline (procore-app.jsx TREND).
 *
 * A path, not a whole icon: the sparkline is one <path> drawn directly in the component's own
 * <svg viewBox="0 0 26 26">, not a self-contained icon like tnb_art_icon()'s set.
 *
 * @param string $trend One of up|flat|step|front.
 * @return string SVG path `d` data, or '' when unknown.
 */
function tnb_art_trend_path( string $trend ): string {
	$paths = array(
		'up'    => 'M2 22 L10 14 L16 17 L24 4',
		'flat'  => 'M2 14 L24 14',
		'step'  => 'M2 20 L9 20 L9 12 L16 12 L16 5 L24 5',
		'front' => 'M2 6 L6 6 L6 15 L24 15',
	);

	return $paths[ $trend ] ?? '';
}
