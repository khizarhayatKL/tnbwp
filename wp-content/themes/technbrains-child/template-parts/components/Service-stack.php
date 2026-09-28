<?php
/**
 * Component: Service — Service Stack (Card Grid)
 * Layout   : sv_stack (ACF Flexible Content)
 *
 * White-background 2-column service card grid.
 * Each card: image media area + title + description + expandable sub-items.
 *
 * Fields:
 *   svss_eyebrow  — text     (optional eyebrow label)
 *   svss_heading  — text     (section heading; br/span allowed)
 *   svss_sub      — textarea (sub-paragraph)
 *   svss_cards    — repeater
 *     svss_card_image — image  (card media, 200px tall)
 *     svss_card_title — text   (card heading)
 *     svss_card_link  — url    (optional URL — wraps card title in <a>)
 *     svss_card_desc  — textarea (card body text)
 *     svss_card_subs  — repeater (expandable sub-items)
 *       svss_sub_name — text (sub-item label)
 *       svss_sub_desc — text (sub-item description)
 *       svss_sub_link — url  (optional link on sub-item)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ──────────────────────────────────────────────────── */
$eyebrow = get_sub_field( 'svss_eyebrow' ) ?: '';
$heading = get_sub_field( 'svss_heading' ) ?: '';
$sub     = get_sub_field( 'svss_sub' )     ?: '';

$cards_raw = get_sub_field( 'svss_cards' );
$cards     = [];
if ( is_array( $cards_raw ) ) {
	foreach ( $cards_raw as $row ) {
		$title = trim( $row['svss_card_title'] ?? '' );
		if ( ! $title ) {
			continue;
		}
		$subs = [];
		if ( is_array( $row['svss_card_subs'] ?? null ) ) {
			foreach ( $row['svss_card_subs'] as $sub_row ) {
				$sub_name = sanitize_text_field( $sub_row['svss_sub_name'] ?? '' );
				if ( ! $sub_name ) {
					continue;
				}
				$subs[] = [
					'name' => $sub_name,
					'desc' => sanitize_text_field( $sub_row['svss_sub_desc'] ?? '' ),
					'link' => esc_url( $sub_row['svss_sub_link'] ?? '' ),
				];
			}
		}
		$cards[] = [
			'image' => $row['svss_card_image'] ?? null,
			'title' => sanitize_text_field( $title ),
			'link'  => esc_url( $row['svss_card_link'] ?? '' ),
			'desc'  => sanitize_textarea_field( $row['svss_card_desc'] ?? '' ),
			'subs'  => $subs,
		];
	}
}
?>
<section class="sv-stack">
	<div class="container sv-stack-inner">

		<?php if ( $eyebrow ) : ?>
		<div class="sv-stack-eyebrow">
			<?php echo esc_html( $eyebrow ); ?>
		</div>
		<?php endif; ?>

		<?php if ( $heading ) : ?>
		<h2 class="sv-stack-h2">
			<?php
			echo wp_kses( $heading, [
				'br'   => [],
				'span' => [ 'class' => [] ],
			] );
			?>
		</h2>
		<?php endif; ?>

		<?php if ( $sub ) : ?>
		<p class="sv-stack-sub"><?php echo esc_html( $sub ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $cards ) ) : ?>
		<div class="sv-stack-grid">
			<?php foreach ( $cards as $card ) : ?>
			<div class="sv-card">

				<?php if ( ! empty( $card['image']['ID'] ) ) : ?>
				<div class="sv-card-media">
					<?php echo wp_get_attachment_image(
						$card['image']['ID'],
						'large',
						false,
						[ 'alt' => '', 'loading' => 'lazy' ]
					); ?>
				</div><!-- .sv-card-media -->
				<?php endif; ?>

				<div class="sv-card-body">

					<h3>
						<?php if ( $card['link'] ) : ?>
							<a href="<?php echo $card['link']; ?>"><?php echo esc_html( $card['title'] ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $card['title'] ); ?>
						<?php endif; ?>
					</h3>

					<?php if ( $card['desc'] ) : ?>
					<p class="sv-card-desc"><?php echo esc_html( $card['desc'] ); ?></p>
					<?php endif; ?>

					<?php if ( ! empty( $card['subs'] ) ) : ?>
					<div class="sv-subs">
						<?php foreach ( $card['subs'] as $s ) : ?>
						<?php if ( $s['link'] ) : ?>
						<a href="<?php echo $s['link']; ?>" class="sv-sub">
						<?php else : ?>
						<div class="sv-sub">
						<?php endif; ?>
							<div class="sv-sub-head">
								<span class="sv-sub-name"><?php echo esc_html( $s['name'] ); ?></span>
								<span class="sv-sub-arrow">
									<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
								</span>
							</div>
							<?php if ( $s['desc'] ) : ?>
							<p class="sv-sub-desc"><span><?php echo esc_html( $s['desc'] ); ?></span></p>
							<?php endif; ?>
						<?php echo $s['link'] ? '</a>' : '</div>'; ?>
						<?php endforeach; ?>
					</div><!-- .sv-subs -->
					<?php endif; ?>

				</div><!-- .sv-card-body -->
			</div><!-- .sv-card -->
			<?php endforeach; ?>
		</div><!-- .sv-stack-grid -->
		<?php endif; ?>

	</div><!-- .sv-stack-inner -->
</section><!-- .sv-stack -->
