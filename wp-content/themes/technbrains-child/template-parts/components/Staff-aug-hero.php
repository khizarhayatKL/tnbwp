<?php
/**
 * Component: Staff Augmentation Hero
 * Layout   : sa_hero (ACF Flexible Content)
 * Dispatcher: template-parts/flexible/dispatch.php
 *
 * Dark hero — content on the left, animated orbit on the right showing the
 * client's in-house squad at the core and augmented engineers ("pods") joining
 * on the outer ring. All motion is CSS-driven; this component ships no JS.
 *
 * Fields:
 *   sah_h1              — text     (h1; a bare <span> marks the red words)
 *   sah_sub             — textarea
 *   sah_cta1            — link     (array; empty URL → lead-popup button)
 *   sah_cta2            — link     (array; empty URL → lead-popup button)
 *   sah_core_label      — text     (label above the in-house avatars)
 *   sah_core_state      — text     (state line below the in-house avatars)
 *   sah_gauge_value     — text     (e.g. "+62%")
 *   sah_gauge_label     — text     (e.g. "capacity")
 *   sah_pill_text       — text     (trust pill, e.g. "Top 3% vetted")
 *   sah_core_avatars    — repeater (max 4)
 *     sah_core_avatar   — image    (in-house squad face)
 *   sah_pods            — repeater (max 3)
 *     sah_pod_pos       — select   (top | right | left — where the card sits)
 *     sah_pod_role      — text     (e.g. "Senior Full-Stack")
 *     sah_pod_status    — text     (e.g. "Day 2 · shipping")
 *     sah_pod_photo     — image    (engineer face)
 *
 * Avatars resolve ACF upload → bundled theme asset → nothing. The theme assets
 * are assets/images/staff-aug/core-{1..4}.webp and pod-{1..3}.webp; both stages
 * are guarded so a half-configured orbit renders no broken images.
 *
 * Position comes from sah_pod_pos, never from the repeater row number. The two
 * are easy to conflate, but coupling them meant reordering engineers in the
 * editor silently rearranged the visual — and did exactly that, putting DevOps
 * on the left where the approved design has it on the right.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * The h1 is one authored string rather than a plain half plus an accent half.
 * The accent is a phrase inside the sentence, so splitting it into two fields
 * forced the break to fall between them and gave the editor no way to accent a
 * word mid-sentence. The fallback carries the approved copy so a row saved
 * before this change — its two old values now unread — can never print an
 * empty h1 while it waits to be re-entered.
 */
// tnb_accent_heading() (functions.php) sanitises and stamps the accent class.
$heading        = tnb_accent_heading(
	get_sub_field( 'sah_h1' ) ?: 'IT Staff Augmentation Services That <span>Strengthen Your Existing Team</span>'
);
$sub            = get_sub_field( 'sah_sub' )            ?: '';
$cta1           = get_sub_field( 'sah_cta1' );
$cta2           = get_sub_field( 'sah_cta2' );
$core_label     = get_sub_field( 'sah_core_label' )     ?: 'Your in-house squad';
$core_state     = get_sub_field( 'sah_core_state' )     ?: '4 engineers · at capacity';
$gauge_value    = get_sub_field( 'sah_gauge_value' )    ?: '+62%';
$gauge_label    = get_sub_field( 'sah_gauge_label' )    ?: 'capacity';
$pill_text      = get_sub_field( 'sah_pill_text' )      ?: 'Top 3% vetted';

$sa_dir = get_stylesheet_directory() . '/assets/images/staff-aug/';
$sa_uri = get_stylesheet_directory_uri() . '/assets/images/staff-aug/';

/**
 * Above-the-fold avatar: eager-loaded (lazy would delay LCP) with explicit
 * dimensions so it reserves layout space and cannot shift the orbit.
 *
 * An uploaded image wins; the bundled theme asset is the fallback; when neither
 * exists nothing is emitted, which is what keeps a half-configured orbit free of
 * broken-image icons.
 *
 * @param mixed  $img  ACF image value (array) or empty.
 * @param string $file Bundled fallback filename.
 */
$sa_avatar = static function ( $img, string $file ) use ( $sa_dir, $sa_uri ): string {
	$src = '';
	if ( is_array( $img ) && ! empty( $img['url'] ) ) {
		$src = $img['url'];
	} elseif ( file_exists( $sa_dir . $file ) ) {
		$src = $sa_uri . $file;
	}
	if ( '' === $src ) {
		return '';
	}
	return '<img src="' . esc_url( $src ) . '" width="88" height="88" alt=""'
		. ' loading="eager" decoding="async">';
};

// In-house squad faces at the centre of the orbit. Four is what the design fits.
$core_avatars = array();
if ( have_rows( 'sah_core_avatars' ) ) {
	while ( have_rows( 'sah_core_avatars' ) ) {
		the_row();
		$core_avatars[] = get_sub_field( 'sah_core_avatar' );
	}
}
$core_avatars = array_slice( $core_avatars, 0, 4 );
$core_avatars = array_pad( $core_avatars, 4, null );

/*
 * Allowed pod slots. The key is the CSS modifier and the value its connector
 * path in the 460x460 orbit, so a slot can never render a card without the
 * matching connector. Each slot is single-occupancy — a duplicate selection
 * would stack two cards on one point, so later rows fall through to whichever
 * slot is still free.
 */
$sa_slots = array(
	'top'   => 'M277,128 L288,104',
	'right' => 'M326,288 L349,302',
	'left'  => 'M140,297 L119,313',
);

$sa_rows = array();
if ( have_rows( 'sah_pods' ) ) {
	while ( have_rows( 'sah_pods' ) ) {
		the_row();
		$role = get_sub_field( 'sah_pod_role' ) ?: '';
		if ( '' === $role ) {
			continue;
		}
		$sa_rows[] = array(
			'pos'    => (string) ( get_sub_field( 'sah_pod_pos' ) ?: '' ),
			'role'   => $role,
			'status' => get_sub_field( 'sah_pod_status' ) ?: '',
			'photo'  => get_sub_field( 'sah_pod_photo' ),
		);
	}
}

/*
 * Two passes so an explicit Position always wins. First claim the named slots;
 * then place anything left — a blank Position, or a duplicate of one already
 * taken — into whatever remains, in design order. Without the second pass those
 * rows would silently disappear; without the first, a late row could steal a
 * slot an earlier row had asked for by name.
 */
$pods = array();
foreach ( $sa_rows as $i => $row ) {
	if ( isset( $sa_slots[ $row['pos'] ] ) && ! isset( $pods[ $row['pos'] ] ) ) {
		$pods[ $row['pos'] ] = $row;
		unset( $sa_rows[ $i ] );
	}
}
foreach ( $sa_rows as $row ) {
	foreach ( array_keys( $sa_slots ) as $slot ) {
		if ( ! isset( $pods[ $slot ] ) ) {
			$pods[ $slot ] = $row;
			continue 2;
		}
	}
	break; // All three slots are full; further rows have nowhere to go.
}

// Emit in design order, not editor order, so DOM order matches what is on screen.
$pods = array_replace( array_intersect_key( $sa_slots, $pods ), $pods );

/**
 * CTA: a real link when the ACF link field carries a URL, otherwise a button
 * that opens the global lead popup (same contract as new-hire-banner.php).
 */
$sa_cta = static function ( $link, string $variant ): string {
	$label = is_array( $link ) && ! empty( $link['title'] ) ? $link['title'] : '';
	if ( '' === $label ) {
		return '';
	}
	$url    = is_array( $link ) && ! empty( $link['url'] ) ? $link['url'] : '';
	$target = is_array( $link ) && ! empty( $link['target'] ) ? $link['target'] : '';

	if ( '' === $url || in_array( $url, array( '#tnb-popup', '#tnb-form' ), true ) ) {
		return '<button type="button" class="sa-btn ' . esc_attr( $variant ) . ' tnb-popup-trigger">'
			. esc_html( $label ) . '</button>';
	}

	$attrs = '';
	if ( '' !== $target ) {
		$attrs .= ' target="' . esc_attr( $target ) . '"';
		if ( '_blank' === $target ) {
			$attrs .= ' rel="noopener noreferrer"';
		}
	}
	return '<a class="sa-btn ' . esc_attr( $variant ) . '" href="' . esc_url( $url ) . '"' . $attrs . '>'
		. esc_html( $label ) . '</a>';
};

$cta1_html = $sa_cta( $cta1, 'sa-btn-primary' );
$cta2_html = $sa_cta( $cta2, 'sa-btn-ghost-light' );
?>
<section class="sa-hero">
	<div class="sa-hero-bg" aria-hidden="true"></div>
	<div class="sa-hero-grid">
		<div class="sa-hero-content">
		    <?php tnb_breadcrumb_html(); ?>
			<h1 class="sa-hero-h1"><?php echo $heading; // Sanitised by tnb_accent_heading(). ?></h1>
			<?php if ( $sub ) : ?>
			<p class="sa-hero-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
			<?php if ( $cta1_html || $cta2_html ) : ?>
			<div class="sa-hero-actions">
				<?php
				echo $cta1_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in $sa_cta.
				echo $cta2_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in $sa_cta.
				?>
			</div>
			<?php endif; ?>
		</div>

		<?php /* Decorative illustration: hidden from AT so its labels are not read as content. */ ?>
		<div class="sa-hero-visual">
			<div class="sa-hero-team" aria-hidden="true">
				<span class="sa-hero-orb sa-hero-orb-1"></span>
				<span class="sa-hero-orb sa-hero-orb-2"></span>

				<div class="sa-orbit">
					<span class="sa-orbit-ring"></span>
					<span class="sa-orbit-ring sa-orbit-ring-2"></span>

					<?php if ( $pods ) : ?>
					<svg class="sa-orbit-links" viewBox="0 0 460 460" focusable="false">
						<?php foreach ( $pods as $slot => $pod ) : ?>
						<path class="sa-orbit-link sa-orbit-link--<?php echo esc_attr( $slot ); ?>" d="<?php echo esc_attr( $sa_slots[ $slot ] ); ?>"></path>
						<?php endforeach; ?>
					</svg>
					<?php endif; ?>

					<svg class="sa-orbit-gauge" viewBox="0 0 460 460" focusable="false">
						<circle class="sa-gauge-track" cx="230" cy="230" r="104"></circle>
						<circle class="sa-gauge-fill" cx="230" cy="230" r="104"></circle>
					</svg>

					<div class="sa-core">
						<div class="sa-core-label"><?php echo esc_html( $core_label ); ?></div>
						<div class="sa-core-avs">
							<?php
							foreach ( $core_avatars as $core_index => $core_img ) {
								echo $sa_avatar( $core_img, 'core-' . ( $core_index + 1 ) . '.webp' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in $sa_avatar.
							}
							?>
						</div>
						<div class="sa-core-state"><?php echo esc_html( $core_state ); ?></div>
					</div>

					<?php if ( $gauge_value || $gauge_label ) : ?>
					<div class="sa-gauge-cap">
						<?php if ( $gauge_value ) : ?>
						<b><?php echo esc_html( $gauge_value ); ?></b>
						<?php endif; ?>
						<?php if ( $gauge_label ) : ?>
						<span><?php echo esc_html( $gauge_label ); ?></span>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<?php $sa_slot_n = 0; ?>
					<?php foreach ( $pods as $slot => $pod ) : ?>
						<?php ++$sa_slot_n; ?>
					<div class="sa-pod sa-pod--<?php echo esc_attr( $slot ); ?>">
						<span class="sa-pod-av">
							<?php echo $sa_avatar( $pod['photo'], 'pod-' . $sa_slot_n . '.webp' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in $sa_avatar. ?>
							<i class="dot"></i>
						</span>
						<span class="sa-pod-cap">
							<i><?php echo esc_html( $pod['role'] ); ?></i>
							<?php if ( $pod['status'] ) : ?>
							<em><?php echo esc_html( $pod['status'] ); ?></em>
							<?php endif; ?>
						</span>
					</div>
					<?php endforeach; ?>

					<?php if ( $pill_text ) : ?>
					<div class="sa-orbit-pill sa-orbit-pill-tl">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" focusable="false"><path d="M12 2l8 3v6c0 5-3.5 8.5-8 11-4.5-2.5-8-6-8-11V5z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>
						<span><?php echo esc_html( $pill_text ); ?></span>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
