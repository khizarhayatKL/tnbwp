<?php
/**
 * Construction Software — Trust bento ("Why Contractors Work With Us").
 *
 * Layout : cn_trust (ACF Flexible Content)
 * Fields : cnt_eyebrow, cnt_heading, cnt_anchor,
 *          cnt_cards{ cnt_card_photo, cnt_card_stat, cnt_card_lead, cnt_card_text, cnt_card_cta }
 * CSS    : assets/css/construction.css (.cn-trust-*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * Four tiles in a fixed bento, not a uniform grid: the approved design gives each position its own
 * footprint (large left with a CTA, two on the top right, one lower right with the photo beside the
 * copy). The position class .cn-trust-a..d is therefore stamped by row index rather than chosen by
 * the editor — reordering the repeater keeps the design, and no row can end up without a footprint.
 * Rows past the fourth are ignored, because a fifth has no place in the layout to occupy.
 *
 * The shape is flex, not grid — A stands beside a right-hand column that stacks (B beside C) over
 * D. Flex alone can't span a sibling across two rows, so b/c/d are nested in two wrapper elements
 * (.cn-trust-right, .cn-trust-top) opened and closed here by row index, unconditionally: the wrap
 * points are structural, not content-dependent, so a blank middle row leaves a gap rather than a
 * mis-nested tree.
 *
 * A row renders as the stat variant when it has a stat figure, and as the statement variant
 * otherwise. That is inferred rather than being a toggle the editor has to set correctly.
 *
 * Photos are <img> via wp_get_attachment_image() rather than the prototype's inline
 * background-image. Same crop and framing (object-fit lives in construction.css), but they get
 * srcset, lazy loading and an intrinsic size, none of which a CSS background can carry.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnt_eyebrow = (string) get_sub_field( 'cnt_eyebrow' );
$cnt_heading = tnb_accent_heading( (string) get_sub_field( 'cnt_heading' ) );
$cnt_anchor  = sanitize_title( (string) get_sub_field( 'cnt_anchor' ) );
$cnt_cards   = (array) get_sub_field( 'cnt_cards' );

$cnt_kses = tnb_cn_allowed_html();
$cnt_svg  = tnb_cn_svg_html();

// Footprints in the approved order. Also caps the render at four.
$cnt_slots = array( 'a', 'b', 'c', 'd' );

if ( ! $cnt_cards ) {
	return;
}
?>
<section class="dt-section cn-trust-sec"<?php echo '' !== $cnt_anchor ? ' id="' . esc_attr( $cnt_anchor ) . '"' : ''; ?>>
	<div class="cn-trust-bg" aria-hidden="true"></div>
	<div class="container">
		<?php if ( '' !== $cnt_eyebrow || '' !== $cnt_heading ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cnt_eyebrow ) : ?>
					<div class="eyebrow cn-trust-ey"><?php echo esc_html( $cnt_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cnt_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cnt_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="cn-trust-bento">
			<?php
			foreach ( $cnt_cards as $cnt_i => $cnt_card ) :
				if ( ! isset( $cnt_slots[ $cnt_i ] ) ) {
					break;
				}

				$cnt_photo = $cnt_card['cnt_card_photo'] ?? array();
				$cnt_stat  = trim( (string) ( $cnt_card['cnt_card_stat'] ?? '' ) );
				$cnt_lead  = trim( (string) ( $cnt_card['cnt_card_lead'] ?? '' ) );
				$cnt_text  = trim( (string) ( $cnt_card['cnt_card_text'] ?? '' ) );
				$cnt_link  = $cnt_card['cnt_card_cta'] ?? null;
				$cnt_url   = is_array( $cnt_link ) ? trim( (string) ( $cnt_link['url'] ?? '' ) ) : '';
				$cnt_label = is_array( $cnt_link ) ? trim( (string) ( $cnt_link['title'] ?? '' ) ) : '';
				$cnt_tgt   = is_array( $cnt_link ) ? (string) ( $cnt_link['target'] ?? '' ) : '';

				// A bare '#' is a placeholder, not a destination.
				if ( '#' === $cnt_url ) {
					$cnt_url = '';
				}

				if ( '' === $cnt_stat && '' === $cnt_lead && '' === $cnt_text && empty( $cnt_photo['id'] ) ) {
					continue;
				}
				?>
				<?php if ( 1 === $cnt_i ) : ?>
					<div class="cn-trust-right">
						<div class="cn-trust-top">
				<?php elseif ( 3 === $cnt_i ) : ?>
						</div>
				<?php endif; ?>
				<div class="cn-trust-card cn-trust-<?php echo esc_attr( $cnt_slots[ $cnt_i ] ); ?> dt-rev">
					<?php if ( ! empty( $cnt_photo['id'] ) ) : ?>
						<div class="cn-trust-photo">
							<?php
							echo wp_get_attachment_image(
								(int) $cnt_photo['id'],
								'medium_large',
								false,
								array(
									'alt'      => '',
									'loading'  => 'lazy',
									'decoding' => 'async',
								)
							);
							?>
						</div>
					<?php endif; ?>

					<div class="cn-trust-card-body">
						<?php if ( '' !== $cnt_stat ) : ?>
							<div class="cn-trust-stat-num"><?php echo esc_html( $cnt_stat ); ?></div>
							<?php if ( '' !== $cnt_text ) : ?>
								<p><?php echo wp_kses( $cnt_text, $cnt_kses ); ?></p>
							<?php endif; ?>
						<?php elseif ( '' !== $cnt_lead || '' !== $cnt_text ) : ?>
							<?php
							// The bold lead and the sentence after it are one heading, so they stay in
							// one <h3> rather than becoming a heading plus an orphan paragraph.
							?>
							<h3>
								<?php if ( '' !== $cnt_lead ) : ?>
									<b><?php echo wp_kses( $cnt_lead, $cnt_kses ); ?></b>
								<?php endif; ?>
								<?php if ( '' !== $cnt_text ) : ?>
									<span><?php echo wp_kses( $cnt_text, $cnt_kses ); ?></span>
								<?php endif; ?>
							</h3>
						<?php endif; ?>

						<?php if ( '' !== $cnt_url && '' !== $cnt_label ) : ?>
							<a href="<?php echo esc_url( $cnt_url ); ?>" class="cn-trust-cta"<?php
								echo '' !== $cnt_tgt ? ' target="' . esc_attr( $cnt_tgt ) . '" rel="noopener"' : '';
							?>><?php echo esc_html( $cnt_label ); ?> <span class="cn-trust-cta-arr"><?php
								echo wp_kses( tnb_cn_icon( 'arrow' ), $cnt_svg );
							?></span></a>
						<?php endif; ?>
					</div>
				</div>
				<?php if ( 3 === $cnt_i ) : ?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
