<?php
/**
 * Logistics page family — shared helpers.
 *
 * Mirrors inc/construction-helpers.php: one fixed icon set the lg_* components draw
 * from, authored inline rather than uploaded, since the set is fixed by the approved
 * design and is not editor-selectable.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * The allowlist for authored copy in the lg_* fields that permit inline markup
 * (closing notes with a bold emphasis span).
 *
 * @return array<string, array<string, bool>>
 */
function tnb_lg_allowed_html(): array {
	return array(
		'br' => array(),
		'b'  => array(),
		'a'  => array(
			'href'   => true,
			'target' => true,
			'rel'    => true,
			'class'  => true,
		),
	);
}

/**
 * One icon from the approved Logistics set, as inline SVG.
 *
 * No width/height attributes — every icon is sized by its wrapper in logistics.css.
 *
 * @param string $name   Icon key.
 * @param bool   $hidden Whether to mark it decorative.
 * @return string SVG markup, or '' when the key is unknown.
 */
function tnb_lg_icon( string $name, bool $hidden = true ): string {
	static $set = null;

	if ( null === $set ) {
		$s = 'fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"';

		$set = array(
			// Flow stages (lg_flow).
			'plan'        => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M8 9h8M8 13h5"/></svg>',
			'execute'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><circle cx="12" cy="12" r="9"/><path d="M12 12l4-2M12 12l-3 3"/><circle cx="12" cy="12" r="1.6" fill="currentColor" stroke="none"/></svg>',
			'track'       => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M19.07 4.93A10 10 0 1 0 22 12"/><path d="M14.83 9.17A4 4 0 1 0 16 12"/><path d="M12 12 22 2"/></svg>',
			'report'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M3 3v18h18"/><rect x="7" y="11" width="3" height="6"/><rect x="12" y="7" width="3" height="10"/><rect x="17" y="13" width="3" height="4"/></svg>',

			// Shared across flow/roles/conn-ops/compliance.
			'doc'         => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5M9 13h6M9 17h6"/></svg>',
			'bill'        => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M6 2h12v20l-3-2-3 2-3-2-3 2z"/><path d="M9 7h6M9 11h6M9 15h3"/></svg>',
			'warehouse'   => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M3 21V8l9-5 9 5v13"/><path d="M7 21v-6h10v6M7 12h10"/></svg>',
			'link'        => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M10 13a5 5 0 0 0 7 0l3-3a5 5 0 0 0-7-7l-1.5 1.5"/><path d="M14 11a5 5 0 0 0-7 0l-3 3a5 5 0 0 0 7 7l1.5-1.5"/></svg>',
			'clock'       => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>',
			'shieldcheck' => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="m9 12 2 2 4-4"/></svg>',
			'mobile'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><rect x="6" y="2" width="12" height="20" rx="2.5"/><path d="M11 18h2"/></svg>',

			// Roles (lg_roles).
			'truck'       => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M1 6h13v10H1zM14 9h4l3 3v4h-7z"/><circle cx="5.5" cy="18" r="1.6"/><circle cx="17.5" cy="18" r="1.6"/></svg>',
			'cube'        => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M12 2 3 6.5v11L12 22l9-4.5v-11z"/><path d="M3 6.5 12 11l9-4.5M12 11v11"/></svg>',

			// Connected Operations (lg_conn_ops).
			'check'       => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="2.6"><polyline points="20 6 9 17 4 12"/></svg>',
			'tms'         => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.9"><rect x="2" y="7" width="14" height="10" rx="1.5"/><path d="M16 10h3.5L22 13v4h-6"/><circle cx="6" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>',
			'telematics'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.9"><path d="M5 13a7 7 0 0 1 14 0"/><path d="M2 13a10 10 0 0 1 20 0"/><circle cx="12" cy="13" r="1.6"/><path d="M12 13l3-3"/></svg>',
			'erp'         => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.9"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>',
			'accounting'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.9"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 7h8M8 11h8M8 15h4"/></svg>',
			'carrierapi'  => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.9"><path d="M8 8L3 12l5 4"/><path d="M16 8l5 4-5 4"/><path d="M13 6l-2 12"/></svg>',
			'edi'         => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.9"><path d="M4 7h11l-3-3M20 17H9l3 3"/></svg>',
			'crm'         => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.9"><circle cx="9" cy="8" r="3"/><path d="M3 20a6 6 0 0 1 12 0"/><path d="M16 4a3 3 0 0 1 0 6M18 14a6 6 0 0 1 3 5"/></svg>',
			'portal'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.9"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M7 6.5h.01"/></svg>',

			// Compliance (lg_compliance).
			'wrench'      => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M14.7 6.3a4 4 0 0 0-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 0 0 5.4-5.4l-2.3 2.3-2.4-.6-.6-2.4z"/></svg>',
			'routemap'    => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><path d="M9 3 3 5v16l6-2 6 2 6-2V3l-6 2-6-2z"/><path d="M9 3v16M15 5v16"/></svg>',

			// Decision ladder (lg_ladder).
			'chevron'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>',

			// Compliance "we build around" pill — two-tone shield, distinct from shieldcheck above.
			'shieldreq'   => '<svg viewBox="0 0 24 24"><path d="M12 2l7 3v6c0 4.6-3 8.2-7 10-4-1.8-7-5.4-7-10V5z" fill="currentColor" fill-opacity="0.12" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M9 12l2 2 4-4.5" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg>',

			// Assessment CTA arrow.
			'arrow'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',

			// Types grid (lg_types) — only two new icons, everything else reuses the set above.
			'docgrid'     => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M8 4v16M13 13h4M13 16h3"/></svg>',
			'route'       => '<svg viewBox="0 0 24 24" ' . $s . ' stroke-width="1.7"><circle cx="6" cy="19" r="2.5"/><circle cx="18" cy="5" r="2.5"/><path d="M8.5 19H14a4 4 0 0 0 0-8H9a4 4 0 0 1 0-8h6.5"/></svg>',
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
 * The icon for one repeater row, keyed by its position in a fixed list.
 *
 * Position-keyed rather than editor-chosen, matching tnb_cn_icon_slot(): reordering a
 * repeater keeps the design's icon-per-position, and rows beyond the list repeat from
 * the start rather than rendering empty.
 *
 * @param array<int, string> $keys  Icon keys for positions 0..n.
 * @param int                $index Zero-based row index.
 * @return string SVG markup for this position.
 */
function tnb_lg_icon_slot( array $keys, int $index ): string {
	if ( ! $keys ) {
		return '';
	}

	return tnb_lg_icon( $keys[ $index % count( $keys ) ] );
}
