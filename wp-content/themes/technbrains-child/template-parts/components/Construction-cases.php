<?php
/**
 * Construction Software — Delivered projects (case deck).
 *
 * Layout : cn_cases (ACF Flexible Content)
 * Fields : cnc_eyebrow, cnc_heading, cnc_sub, cnc_anchor,
 *          cnc_cards{ cnc_card_image, cnc_card_client, cnc_card_tag, cnc_card_problem,
 *                     cnc_card_built, cnc_card_metrics{ cnc_metric_text }, cnc_card_link },
 *          cnc_cta
 * CSS    : assets/css/construction.css (.cn-case-*) over components.css (.case-*)
 * JS     : assets/js/construction.js (data-cn-deck-*)
 *
 * Presentation reuses the theme's deck classes — .case-deck, .case-card, .case-art-frame,
 * .case-art-photo, .case-body, .case-eyebrow, .case-foot, .case-link, .case-deck-nav, .case-btn,
 * .case-deck-dots, .case-deck-dot, and the is-front / is-side-l / is-side-r / is-far state classes.
 * Only the CSS is shared.
 *
 * The behaviour is not. Its hooks are data-cn-deck-* and it is driven by assets/js/construction.js,
 * deliberately independent of initIhCaseDeck() in components.js. That keeps this page's JavaScript
 * in one file: a future change to the shared deck initialiser cannot alter this page, and nothing
 * here can alter the decks it drives. The cost is a second, smaller shuffle implementation, which is
 * the trade being made on purpose.
 *
 * It also means no autoplay, matching the prototype — the shared initialiser auto-advances every
 * seven seconds and this one does not.
 *
 * Only the inner rows are new: problem and what-we-built are labelled pairs rather than plain
 * paragraphs, and the metrics are chips.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnc_eyebrow = (string) get_sub_field( 'cnc_eyebrow' );
$cnc_heading = tnb_accent_heading( (string) get_sub_field( 'cnc_heading' ) );
$cnc_sub     = (string) get_sub_field( 'cnc_sub' );
$cnc_anchor  = sanitize_title( (string) get_sub_field( 'cnc_anchor' ) );
$cnc_cards   = (array) get_sub_field( 'cnc_cards' );

// Section-level CTA. The approved prototype does not render one, so this is optional: left
// empty the section matches the prototype exactly, filled it satisfies the copy deck's
// closing "see more of our work" line.
$cnc_cta     = get_sub_field( 'cnc_cta' );
$cnc_cta_url = is_array( $cnc_cta ) ? trim( (string) ( $cnc_cta['url'] ?? '' ) ) : '';
$cnc_cta_lbl = is_array( $cnc_cta ) ? trim( (string) ( $cnc_cta['title'] ?? '' ) ) : '';
$cnc_cta_tgt = is_array( $cnc_cta ) ? (string) ( $cnc_cta['target'] ?? '' ) : '';

if ( '#' === $cnc_cta_url ) {
	$cnc_cta_url = '';
}

$cnc_kses = tnb_cn_allowed_html();
$cnc_svg  = tnb_cn_svg_html();

// Rows with neither a client nor a problem are dropped before counting, so the nav is not
// rendered for a deck that has nothing to move between.
$cnc_cards = array_values(
	array_filter(
		$cnc_cards,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['cnc_card_client'] ?? '' ) )
				|| '' !== trim( (string) ( $row['cnc_card_problem'] ?? '' ) );
		}
	)
);

$cnc_total = count( $cnc_cards );

if ( 0 === $cnc_total ) {
	return;
}
?>
<section class="dt-section cn-cases-sec"<?php
	echo '' !== $cnc_anchor ? ' id="' . esc_attr( $cnc_anchor ) . '"' : '';
?> data-cn-deck-wrap>
	<div class="container">
		<?php if ( '' !== $cnc_eyebrow || '' !== $cnc_heading || '' !== $cnc_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cnc_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cnc_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cnc_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cnc_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $cnc_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $cnc_sub, $cnc_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="case-deck cn-case-deck" data-cn-deck>
			<?php
			foreach ( $cnc_cards as $cnc_i => $cnc_card ) :
				$cnc_img     = $cnc_card['cnc_card_image'] ?? array();
				$cnc_client  = trim( (string) ( $cnc_card['cnc_card_client'] ?? '' ) );
				$cnc_tag     = trim( (string) ( $cnc_card['cnc_card_tag'] ?? '' ) );
				$cnc_problem = trim( (string) ( $cnc_card['cnc_card_problem'] ?? '' ) );
				$cnc_built   = trim( (string) ( $cnc_card['cnc_card_built'] ?? '' ) );
				$cnc_metrics = (array) ( $cnc_card['cnc_card_metrics'] ?? array() );

				$cnc_link  = $cnc_card['cnc_card_link'] ?? null;
				$cnc_url   = is_array( $cnc_link ) ? trim( (string) ( $cnc_link['url'] ?? '' ) ) : '';
				$cnc_label = is_array( $cnc_link ) ? trim( (string) ( $cnc_link['title'] ?? '' ) ) : '';
				$cnc_tgt   = is_array( $cnc_link ) ? (string) ( $cnc_link['target'] ?? '' ) : '';

				if ( '#' === $cnc_url ) {
					$cnc_url = '';
				}
				?>
				<div class="case-card">
					<?php if ( ! empty( $cnc_img['id'] ) ) : ?>
						<div class="case-art-frame">
							<?php
							// The front card is visible on load, so the first image stays eager; the
							// rest sit behind it and can wait.
							echo wp_get_attachment_image(
								(int) $cnc_img['id'],
								'large',
								false,
								array(
									'class'    => 'case-art-photo',
									'alt'      => $cnc_client,
									'loading'  => 0 === $cnc_i ? 'eager' : 'lazy',
									'decoding' => 'async',
								)
							);
							?>
						</div>
					<?php endif; ?>

					<div class="case-body">
						<?php if ( '' !== $cnc_tag ) : ?>
							<div class="case-eyebrow"><?php echo esc_html( $cnc_tag ); ?></div>
						<?php endif; ?>

						<?php if ( '' !== $cnc_client ) : ?>
							<h3><?php echo esc_html( $cnc_client ); ?></h3>
						<?php endif; ?>

						<?php if ( '' !== $cnc_problem ) : ?>
							<div class="cn-case-row">
								<span class="cn-case-k"><?php esc_html_e( 'Problem', 'technbrains-child' ); ?></span>
								<p><?php echo wp_kses( $cnc_problem, $cnc_kses ); ?></p>
							</div>
						<?php endif; ?>

						<?php if ( '' !== $cnc_built ) : ?>
							<div class="cn-case-row">
								<span class="cn-case-k"><?php esc_html_e( 'What we built', 'technbrains-child' ); ?></span>
								<p><?php echo wp_kses( $cnc_built, $cnc_kses ); ?></p>
							</div>
						<?php endif; ?>

						<?php if ( $cnc_metrics ) : ?>
							<div class="cn-case-metrics">
								<?php
								foreach ( $cnc_metrics as $cnc_metric ) :
									$cnc_m = trim( (string) ( $cnc_metric['cnc_metric_text'] ?? '' ) );

									if ( '' === $cnc_m ) {
										continue;
									}
									?>
									<span class="cn-case-metric"><?php
										echo wp_kses( tnb_cn_icon( 'trend' ), $cnc_svg );
									?><?php echo esc_html( $cnc_m ); ?></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<?php if ( '' !== $cnc_url && '' !== $cnc_label ) : ?>
							<div class="case-foot">
								<a class="case-link" href="<?php echo esc_url( $cnc_url ); ?>"<?php
									echo '' !== $cnc_tgt ? ' target="' . esc_attr( $cnc_tgt ) . '" rel="noopener"' : '';
								?>><?php echo esc_html( $cnc_label ); ?> <span class="arr"><?php
									echo wp_kses( tnb_cn_icon( 'arrow' ), $cnc_svg );
								?></span></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( $cnc_total > 1 ) : ?>
			<div class="case-deck-nav" aria-label="<?php esc_attr_e( 'Case study navigation', 'technbrains-child' ); ?>">
				<button class="case-btn" type="button" aria-label="<?php esc_attr_e( 'Previous case study', 'technbrains-child' ); ?>" data-cn-deck-prev><?php
					echo wp_kses( tnb_cn_icon( 'arrow' ), $cnc_svg );
				?></button>

				<div class="case-deck-dots" role="tablist">
					<?php for ( $cnc_d = 0; $cnc_d < $cnc_total; $cnc_d++ ) : ?>
						<button
							type="button"
							role="tab"
							class="case-deck-dot<?php echo 0 === $cnc_d ? ' is-active' : ''; ?>"
							aria-label="<?php
								/* translators: %d: case study position in the deck. */
								echo esc_attr( sprintf( __( 'Show case study %d', 'technbrains-child' ), $cnc_d + 1 ) );
							?>"
							aria-selected="<?php echo 0 === $cnc_d ? 'true' : 'false'; ?>"
							data-cn-deck-dot="<?php echo (int) $cnc_d; ?>"></button>
					<?php endfor; ?>
				</div>

				<button class="case-btn" type="button" aria-label="<?php esc_attr_e( 'Next case study', 'technbrains-child' ); ?>" data-cn-deck-next><?php
					echo wp_kses( tnb_cn_icon( 'arrow' ), $cnc_svg );
				?></button>
			</div>
		<?php endif; ?>

		<?php if ( '' !== $cnc_cta_url && '' !== $cnc_cta_lbl ) : ?>
			<div class="cn-cases-cta dt-rev">
				<a class="dt-btn dt-btn-primary" href="<?php echo esc_url( $cnc_cta_url ); ?>"<?php
					echo '' !== $cnc_cta_tgt ? ' target="' . esc_attr( $cnc_cta_tgt ) . '" rel="noopener"' : '';
				?>><?php echo esc_html( $cnc_cta_lbl ); ?> <span class="arr"><?php
					echo wp_kses( tnb_cn_icon( 'arrow' ), $cnc_svg );
				?></span></a>
			</div>
		<?php endif; ?>
	</div>
</section>
