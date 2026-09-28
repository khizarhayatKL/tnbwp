<?php
/**
 * Logistics — US Compliance: rule cards + watchlist + "we build around" reqs pills.
 *
 * Layout : lg_compliance (ACF Flexible Content)
 * Fields : lgcm_eyebrow, lgcm_heading, lgcm_sub, lgcm_cards{ lgcm_card_title, lgcm_card_desc },
 *          lgcm_watch_tag, lgcm_watch_heading, lgcm_watch_items{ lgcm_watch_title, lgcm_watch_desc },
 *          lgcm_note, lgcm_reqs_label, lgcm_reqs{ lgcm_req_text }
 * CSS    : assets/css/logistics.css (.lg-comp-*, .lg-watch-*)
 * JS     : none.
 *
 * Distinct from the existing "lp_compliance" layout (a logo-badge row) — this is a
 * different structure entirely, different layout key, no collision.
 * Card icons are uploaded per-row (lgcm_card_icon) — no default, a card with
 * no upload simply has no icon. The reqs pills still share one fixed shield
 * icon — out of scope here.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lgcm_eyebrow       = (string) get_sub_field( 'lgcm_eyebrow' );
$lgcm_heading       = (string) get_sub_field( 'lgcm_heading' );
$lgcm_sub           = (string) get_sub_field( 'lgcm_sub' );
$lgcm_watch_tag     = (string) get_sub_field( 'lgcm_watch_tag' );
$lgcm_watch_heading = (string) get_sub_field( 'lgcm_watch_heading' );
$lgcm_note          = (string) get_sub_field( 'lgcm_note' );
$lgcm_reqs_label    = (string) get_sub_field( 'lgcm_reqs_label' );

$lgcm_cards = [];
if ( have_rows( 'lgcm_cards' ) ) {
	while ( have_rows( 'lgcm_cards' ) ) {
		the_row();
		$lgcm_title = trim( (string) get_sub_field( 'lgcm_card_title' ) );
		if ( '' === $lgcm_title ) {
			continue;
		}
		$lgcm_card_icon = get_sub_field( 'lgcm_card_icon' );
		$lgcm_cards[]   = [
			'title'    => $lgcm_title,
			'desc'     => trim( (string) get_sub_field( 'lgcm_card_desc' ) ),
			'icon_url' => is_array( $lgcm_card_icon ) && ! empty( $lgcm_card_icon['url'] ) ? (string) $lgcm_card_icon['url'] : '',
			'icon_alt' => is_array( $lgcm_card_icon ) ? (string) ( $lgcm_card_icon['alt'] ?? '' ) : '',
		];
	}
}

$lgcm_watch_items = [];
if ( have_rows( 'lgcm_watch_items' ) ) {
	while ( have_rows( 'lgcm_watch_items' ) ) {
		the_row();
		$lgcm_watch_title = trim( (string) get_sub_field( 'lgcm_watch_title' ) );
		if ( '' === $lgcm_watch_title ) {
			continue;
		}
		$lgcm_watch_items[] = [
			'title' => $lgcm_watch_title,
			'desc'  => trim( (string) get_sub_field( 'lgcm_watch_desc' ) ),
		];
	}
}

$lgcm_reqs = [];
if ( have_rows( 'lgcm_reqs' ) ) {
	while ( have_rows( 'lgcm_reqs' ) ) {
		the_row();
		$lgcm_req_text = trim( (string) get_sub_field( 'lgcm_req_text' ) );
		if ( '' !== $lgcm_req_text ) {
			$lgcm_reqs[] = $lgcm_req_text;
		}
	}
}

if ( empty( $lgcm_cards ) && empty( $lgcm_watch_items ) ) {
	return;
}

?>
<section class="dt-section lg-compliance-section">
	<div class="container">

		<?php if ( '' !== $lgcm_eyebrow || '' !== $lgcm_heading || '' !== $lgcm_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $lgcm_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $lgcm_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $lgcm_heading ) : ?>
					<h2 class="dt-h2"><?php echo esc_html( $lgcm_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lgcm_sub ) : ?>
					<p class="dt-sub"><?php echo esc_html( $lgcm_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $lgcm_cards ) ) : ?>
			<div class="lg-comp-grid">
				<?php foreach ( $lgcm_cards as $lgcm_i => $lgcm_card ) : ?>
					<div class="lg-comp-card dt-rev" style="transition-delay:<?php echo esc_attr( (string) ( ( $lgcm_i % 3 ) * 60 ) ); ?>ms">
						<?php if ( '' !== $lgcm_card['icon_url'] ) : ?>
							<span class="lg-comp-ic">
								<img src="<?php echo esc_url( $lgcm_card['icon_url'] ); ?>" alt="<?php echo esc_attr( $lgcm_card['icon_alt'] ); ?>" width="20" height="20" loading="lazy" decoding="async">
							</span>
						<?php endif; ?>
						<h3><?php echo esc_html( $lgcm_card['title'] ); ?></h3>
						<?php if ( '' !== $lgcm_card['desc'] ) : ?>
							<p><?php echo esc_html( $lgcm_card['desc'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $lgcm_watch_items ) || '' !== $lgcm_note || ! empty( $lgcm_reqs ) ) : ?>
			<div class="lg-watch-wrap dt-rev">

				<?php if ( ! empty( $lgcm_watch_items ) ) : ?>
					<div class="lg-watch">
						<?php if ( '' !== $lgcm_watch_tag || '' !== $lgcm_watch_heading ) : ?>
							<div class="lg-watch-head">
								<?php if ( '' !== $lgcm_watch_tag ) : ?>
									<span class="lg-watch-tag"><?php echo esc_html( $lgcm_watch_tag ); ?></span>
								<?php endif; ?>
								<?php if ( '' !== $lgcm_watch_heading ) : ?>
									<h3><?php echo esc_html( $lgcm_watch_heading ); ?></h3>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<div class="lg-watch-grid">
							<?php foreach ( $lgcm_watch_items as $lgcm_watch_item ) : ?>
								<div class="lg-watch-card">
									<b><?php echo esc_html( $lgcm_watch_item['title'] ); ?></b>
									<?php if ( '' !== $lgcm_watch_item['desc'] ) : ?>
										<p><?php echo wp_kses( $lgcm_watch_item['desc'], tnb_lg_allowed_html() ); ?></p>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( '' !== $lgcm_note ) : ?>
					<p class="lg-comp-note"><?php echo esc_html( $lgcm_note ); ?></p>
				<?php endif; ?>

				<?php if ( ! empty( $lgcm_reqs ) ) : ?>
					<div class="lg-comp-reqs">
						<?php if ( '' !== $lgcm_reqs_label ) : ?>
							<span class="lg-req-lbl"><?php echo esc_html( $lgcm_reqs_label ); ?></span>
						<?php endif; ?>
						<?php foreach ( $lgcm_reqs as $lgcm_req ) : ?>
							<span class="lg-comp-req"><?php echo tnb_lg_icon( 'shieldreq' ); ?><?php echo esc_html( $lgcm_req ); ?></span>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</div>
		<?php endif; ?>

	</div>
</section>
