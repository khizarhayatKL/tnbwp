<?php
/**
 * Mobile App Development page — shared helpers.
 *
 * One icon set, authored inline (fixed by the approved design, not editor-selectable),
 * same arrangement as inc/construction-helpers.php and inc/case-study-helpers.php.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * The allowlist for authored copy in this page's fields.
 *
 * Matches inc/construction-helpers.php's tnb_cn_allowed_html(): <br> for a forced line
 * break, <span> for the red accent that tnb_accent_heading() stamps the class onto.
 *
 * @return array<string, array<string, bool>>
 */
function tnb_ma_allowed_html(): array {
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
 * The allowlist for the inline SVGs below. Kept separate from the copy allowlist so
 * markup an editor supplies can never carry SVG through.
 *
 * @return array<string, array<string, bool>>
 */
function tnb_ma_svg_html(): array {
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
		'circle'   => array( 'cx' => true, 'cy' => true, 'r' => true ),
		'ellipse'  => array( 'cx' => true, 'cy' => true, 'rx' => true, 'ry' => true ),
		'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
		'rect'     => array( 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true ),
	);
}

/**
 * One icon from the approved set, as inline SVG. Geometry is the mockup's, verbatim.
 *
 * No width/height attributes — every icon is sized by its wrapper in mobile-app.css.
 *
 * @param string $name   Icon key.
 * @param bool   $hidden Whether to mark it decorative.
 * @return string SVG markup, or '' when the key is unknown.
 */
function tnb_ma_icon( string $name, bool $hidden = true ): string {
	static $set = null;

	if ( null === $set ) {
		$s = 'fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"';

		$set = array(
			// Problems We Solve — category icons (map-3.jsx M3 set).
			'branch'   => '<svg viewBox="0 0 24 24" ' . $s . '><circle cx="6" cy="6" r="2.5"/><circle cx="6" cy="18" r="2.5"/><circle cx="18" cy="9" r="2.5"/><path d="M6 8.5v7M8.5 6H14a2 2 0 0 1 2 2v.5"/></svg>',
			'design'   => '<svg viewBox="0 0 24 24" ' . $s . '><circle cx="13.5" cy="6.5" r="2.5"/><circle cx="6.5" cy="12" r="2.5"/><circle cx="17" cy="16" r="2.5"/><path d="M8.7 10.5 11 8M8.9 13.4l5.7 1.7"/></svg>',
			'database' => '<svg viewBox="0 0 24 24" ' . $s . '><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v6c0 1.66 3.58 3 8 3s8-1.34 8-3V5"/><path d="M4 11v6c0 1.66 3.58 3 8 3s8-1.34 8-3v-6"/></svg>',
			// Post-Launch Growth — card icons (map-2.jsx M2 set).
			'pulse'    => '<svg viewBox="0 0 24 24" ' . $s . '><path d="M12 3v4M12 17v4M3 12h4M17 12h4M5.6 5.6l2.8 2.8M15.6 15.6l2.8 2.8M18.4 5.6l-2.8 2.8M8.4 15.6l-2.8 2.8"/></svg>',
			'gauge'    => '<svg viewBox="0 0 24 24" ' . $s . '><path d="M12 14a2 2 0 0 0 2-2c0-1-2-5-2-5s-2 4-2 5a2 2 0 0 0 2 2z"/><path d="M4.5 18a9 9 0 1 1 15 0"/></svg>',
			'rocket'   => '<svg viewBox="0 0 24 24" ' . $s . '><path d="M4.5 16.5c-1.5 1.3-2 5-2 5s3.7-.5 5-2c.7-.9.7-2.2-.1-3a2.1 2.1 0 0 0-2.9 0z"/><path d="M12 15l-3-3a11 11 0 0 1 5-8c2 0 4 0 5 1s1 3 1 5a11 11 0 0 1-8 5z"/><circle cx="14.5" cy="9.5" r="1.5"/></svg>',
			'chart'    => '<svg viewBox="0 0 24 24" ' . $s . '><path d="M3 3v18h18"/><rect x="7" y="11" width="3" height="6"/><rect x="12" y="7" width="3" height="10"/><rect x="17" y="13" width="3" height="4"/></svg>',
			'recycle'  => '<svg viewBox="0 0 24 24" ' . $s . '><path d="M21 12a9 9 0 1 1-3-6.7L21 8"/><polyline points="21 3 21 8 16 8"/></svg>',
			// Devices & Integrations — tab icons (map-3.jsx M3 set; branch is reused from above).
			'cube'     => '<svg viewBox="0 0 24 24" ' . $s . '><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.3 7 12 12 20.7 7"/><line x1="12" y1="22" x2="12" y2="12"/></svg>',
			// Accordion / tab chevron.
			'chevdown' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>',
			// Hero CTA arrow — identical geometry to tnb_cn_icon('arrow'); duplicated rather than
			// cross-referencing construction-helpers.php, matching this page family's own
			// self-contained icon set convention.
			'arrow'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
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
 * The icon for one repeater row, keyed by position — with an optional per-row image
 * upload that overrides the default. Same pattern as tnb_cn_icon_slot() in
 * inc/construction-helpers.php: reordering a repeater keeps the design's icon-per-position,
 * an editor cannot end up with a row that has no icon at all, and there's no dropdown to
 * keep in sync with the icon set — upload a custom SVG/PNG, or leave it blank.
 *
 * Self-escaping on both branches, so callers should echo the return value directly rather
 * than wrapping it in another wp_kses() call.
 *
 * @param array<int, string> $keys     Icon keys for positions 0..n (from tnb_ma_icon()'s set).
 * @param int                $index    Zero-based row index.
 * @param mixed              $override ACF image field value (array with a 'url' key), or empty.
 * @return string An <img> tag when $override has a URL, else the SVG markup for this position.
 */
function tnb_ma_icon_slot( array $keys, int $index, $override = null ): string {
	if ( is_array( $override ) && ! empty( $override['url'] ) ) {
		return sprintf(
			'<img src="%1$s" alt="" loading="lazy" decoding="async">',
			esc_url( $override['url'] )
		);
	}

	if ( ! $keys ) {
		return '';
	}

	return wp_kses( tnb_ma_icon( (string) ( $keys[ $index ] ?? $keys[0] ) ), tnb_ma_svg_html() );
}

/**
 * Default "Problems We Solve" categories — the mockup's real copy (map-3.jsx MA_PROBLEMS).
 * Used by MobileApp-Problems.php when the maa_categories repeater is empty, so the section
 * always renders with real content the moment the layout is added — no ACF repeater
 * default_value reliance (unsupported for nested repeaters in this codebase).
 *
 * @return array
 */
function tnb_ma_default_problems(): array {
	return array(
		array(
			'maa_cat_title' => 'Complex Mobile Integrations',
			'maa_cat_items' => array(
				array( 'maa_item_h' => 'Payments, IAP & subscriptions', 'maa_item_d' => 'Apple and Google billing rules, receipt validation, renewals, cancellations, refunds, failed payments, and entitlement sync between store, backend, and app.' ),
				array( 'maa_item_h' => 'Background geolocation & geofencing', 'maa_item_d' => 'Location tracking and triggered actions while the app is backgrounded, around permission changes, OEM battery optimization, dropped connectivity, and device limits.' ),
				array( 'maa_item_h' => 'Offline-first apps & data sync', 'maa_item_d' => 'Apps that keep working without a network and reconcile correctly when it returns: conflict resolution, duplicate operations, retries, and failure propagation.' ),
				array( 'maa_item_h' => 'Augmented reality', 'maa_item_d' => 'Camera input, spatial positioning, object placement, measurement, and interaction with physical environments.' ),
				array( 'maa_item_h' => 'AI & machine learning features', 'maa_item_d' => 'Voice recognition, image recognition and generation, intelligent search, and classification — built for latency, connectivity gaps, and device differences.' ),
			),
		),
		array(
			'maa_cat_title' => 'Advanced Mobile UI/UX Challenges',
			'maa_cat_items' => array(
				array( 'maa_item_h' => 'Dynamic typography & alignment', 'maa_item_d' => 'Platform font scaling, accessibility settings, text wrapping, and line-height differences that shift surrounding components and break hierarchy.' ),
				array( 'maa_item_h' => 'Cross-screen visual consistency', 'maa_item_d' => 'Proportions, spacing, and component relationships held steady from compact phones to large tablets.' ),
				array( 'maa_item_h' => 'Foldable & multi-screen layouts', 'maa_item_d' => 'Changing dimensions, hinge zones, and expanded or collapsed states that reshape the usable canvas mid-session.' ),
				array( 'maa_item_h' => 'Overlapping & layered UI', 'maa_item_d' => 'Cards, artwork, floating controls, and interactive layers that depend on each other and need precise positioning rather than a responsive grid.' ),
			),
		),
		array(
			'maa_cat_title' => 'Complex Mobile Business Logic',
			'maa_cat_items' => array(
				array( 'maa_item_h' => 'Cross-region date, time & time-zone logic', 'maa_item_d' => 'Daylight saving, recurring schedules, date boundaries, and events created in one location and processed in another.' ),
				array( 'maa_item_h' => 'Financial transactions & ledger logic', 'maa_item_d' => 'Partial payments, retries, duplicate events, fees, currency conversion, and reconciliation across app, backend, and payment provider.' ),
				array( 'maa_item_h' => 'State & workflow management', 'maa_item_d' => 'Approvals, rejections, cancellations, expirations, role-based actions, and concurrent updates without contradictory or invalid states.' ),
			),
		),
	);
}

/**
 * Default "Post-Launch Growth" cards — the mockup's real copy (map-2.jsx MA_GROWTH).
 * Same fallback role as tnb_ma_default_problems() above.
 *
 * @return array
 */
function tnb_ma_default_growth(): array {
	return array(
		array( 'mag_card_title' => 'Boost Early Engagement', 'mag_card_text' => 'Optimize first interactions and onboarding to reduce drop-offs and maximize initial user retention.' ),
		array( 'mag_card_title' => 'Consistent Performance Across Users', 'mag_card_text' => 'Monitor stability across devices and networks, ensuring smooth experiences for all users from day one.' ),
		array( 'mag_card_title' => 'Safe Feature Expansion', 'mag_card_text' => 'Add new functionality confidently without disrupting existing flows or breaking user interactions.' ),
		array( 'mag_card_title' => 'Actionable Insights', 'mag_card_text' => 'Track meaningful usage signals to guide updates, prioritize features, and improve product decisions continuously.' ),
		array( 'mag_card_title' => 'Long-Term Code Health', 'mag_card_text' => 'Maintain a clean, modular codebase that minimizes technical debt and simplifies future development.' ),
	);
}

/**
 * Default "Devices & Integrations" groups — the mockup's real copy (map-3.jsx MA_DEVGROUPS).
 * Same fallback role as tnb_ma_default_problems() above.
 *
 * @return array
 */
function tnb_ma_default_devgroups(): array {
	// mae_item_link is an ACF link field {title,url,target} — title is the chip's visible
	// label. ACF's link field silently discards the whole value (title included) when its
	// url is empty, so a placeholder '#' is used for the default plain (non-clickable)
	// chips instead — same "bare # means no real destination" convention already used by
	// Construction-trust.php. MobileApp-Devices.php treats '#' as no URL.
	$chip = static function ( string $label ): array {
		return array( 'mae_item_link' => array( 'title' => $label, 'url' => '#', 'target' => '' ) );
	};

	return array(
		array(
			'mae_group_title' => 'Devices',
			'mae_group_desc'  => 'One codebase, every screen your users carry — phone, tablet, watch, TV, and the car.',
			'mae_group_items' => array_map( $chip, array( 'iPhone', 'iPad', 'Apple Watch', 'Apple TV', 'CarPlay', 'Android Phones', 'Android Tablets', 'Foldables', 'Wear OS', 'Android Auto' ) ),
		),
		array(
			'mae_group_title' => 'Advanced Features',
			'mae_group_desc'  => 'The hard capabilities that separate a demo from a product that holds up in the field.',
			'mae_group_items' => array_map( $chip, array( 'AI & ML', 'IoT Devices', 'AR & Vision', 'Geofencing', 'Offline Sync', 'Biometrics', 'Push Messaging' ) ),
		),
		array(
			'mae_group_title' => 'Integrations',
			'mae_group_desc'  => 'The payment, mapping, comms, and enterprise systems your app connects to on day one.',
			'mae_group_items' => array_map( $chip, array( 'Apple Pay', 'Google Pay', 'Stripe', 'Subscriptions', 'Google Maps', 'Firebase', 'Twilio', 'EHR / EMR', 'ERP & CRM', 'Fleet APIs', 'Analytics SDKs' ) ),
		),
	);
}

/**
 * Two-letter tile abbreviation for a chip label, matching map-3.jsx's maAbbr() exactly:
 * first letters of the first two words, or the first two characters if there's only one word.
 *
 * @param string $label
 * @return string
 */
function tnb_ma_abbr( string $label ): string {
	$words = preg_split( '/[\s&\/]+/', $label, -1, PREG_SPLIT_NO_EMPTY );

	if ( count( $words ) > 1 ) {
		return strtoupper( mb_substr( $words[0], 0, 1 ) . mb_substr( $words[1], 0, 1 ) );
	}

	return strtoupper( mb_substr( $label, 0, 2 ) );
}
