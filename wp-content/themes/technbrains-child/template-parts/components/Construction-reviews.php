<?php
/**
 * Construction Software — Client reviews (three-up carousel).
 *
 * Layout : cn_reviews (ACF Flexible Content)
 * Fields : cnrev_heading, cnrev_anchor, cnrev_platform, cnrev_link,
 *          cnrev_items{ cnrev_item_quote, cnrev_item_company, cnrev_item_role }
 * CSS    : assets/css/construction.css (.cn-rev-*)
 * JS     : assets/js/construction.js (data-cn-rev / -slide / -dot / -prev / -next)
 *
 * A window of three, not one slide at a time: the approved design shows the previous, active and
 * next review together, with the centre one emphasised. The prototype achieves that by re-rendering
 * a three-item slice on every change. Here every review stays in the DOM and construction.js stamps
 * is-l / is-c / is-r by offset from the active index, the same approach as the case deck. Rebuilding
 * the DOM on each move would drop focus and re-trigger the reveal.
 *
 * Quotes are <blockquote> with the attribution in <cite>, and the quotation marks come from CSS
 * rather than being typed into the field. The deck requires these be verbatim Clutch reviews, and
 * an editor pasting one should not have to remember to add or omit quote characters for the design
 * to look right.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnrev_heading  = tnb_accent_heading( (string) get_sub_field( 'cnrev_heading' ) );
$cnrev_anchor   = sanitize_title( (string) get_sub_field( 'cnrev_anchor' ) );
$cnrev_platform = trim( (string) get_sub_field( 'cnrev_platform' ) );
$cnrev_items    = (array) get_sub_field( 'cnrev_items' );

// The rating line under the carousel. A link field rather than a label plus a URL, so the
// two cannot drift apart; with no URL the rating still renders as plain text.
$cnrev_prof     = get_sub_field( 'cnrev_link' );
$cnrev_prof_url = is_array( $cnrev_prof ) ? trim( (string) ( $cnrev_prof['url'] ?? '' ) ) : '';
$cnrev_prof_lbl = is_array( $cnrev_prof ) ? trim( (string) ( $cnrev_prof['title'] ?? '' ) ) : '';

if ( '#' === $cnrev_prof_url || false !== stripos( $cnrev_prof_url, 'insert' ) ) {
	$cnrev_prof_url = '';
}

$cnrev_kses = tnb_cn_allowed_html();
$cnrev_svg  = tnb_cn_svg_html();

$cnrev_items = array_values(
	array_filter(
		$cnrev_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['cnrev_item_quote'] ?? '' ) );
		}
	)
);

$cnrev_total = count( $cnrev_items );

if ( 0 === $cnrev_total ) {
	return;
}
?>
<section class="dt-section gray cn-rev-sec"<?php echo '' !== $cnrev_anchor ? ' id="' . esc_attr( $cnrev_anchor ) . '"' : ''; ?> data-cn-rev>
	<div class="container">
		<?php if ( '' !== $cnrev_heading ) : ?>
			<div class="dt-head dt-center dt-rev">
				<h2 class="dt-h2"><?php echo $cnrev_heading; // Sanitised by tnb_accent_heading(). ?></h2>
			</div>
		<?php endif; ?>

		<div class="cn-rev-row dt-rev">
			<?php
			foreach ( $cnrev_items as $cnrev_i => $cnrev_item ) :
				$cnrev_quote   = trim( (string) $cnrev_item['cnrev_item_quote'] );
				$cnrev_company = trim( (string) ( $cnrev_item['cnrev_item_company'] ?? '' ) );
				$cnrev_role    = trim( (string) ( $cnrev_item['cnrev_item_role'] ?? '' ) );
				?>
				<article
					class="cn-rev-card<?php echo 0 === $cnrev_i ? ' is-c' : ''; ?>"
					data-cn-rev-slide
					aria-hidden="<?php echo 0 === $cnrev_i ? 'false' : 'true'; ?>"
				>
					<span class="cn-rev-mark" aria-hidden="true"><?php
						echo wp_kses( tnb_cn_icon( 'quote' ), $cnrev_svg );
					?></span>

					<blockquote class="cn-rev-quote"><?php echo wp_kses( $cnrev_quote, $cnrev_kses ); ?></blockquote>

					<div class="cn-rev-divider" aria-hidden="true"></div>

					<div class="cn-rev-foot">
						<cite class="cn-rev-cite">
							<?php if ( '' !== $cnrev_company ) : ?>
								<span class="cn-rev-name"><?php echo esc_html( $cnrev_company ); ?></span>
							<?php endif; ?>
							<?php if ( '' !== $cnrev_role ) : ?>
								<span class="cn-rev-role"><?php echo esc_html( $cnrev_role ); ?></span>
							<?php endif; ?>
						</cite>

						<?php if ( '' !== $cnrev_platform ) : ?>
							<div class="cn-rev-platform">
								<span class="cn-rev-star" aria-hidden="true">&#9733;</span><?php
								echo esc_html( $cnrev_platform );
							?></div>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<?php if ( '' !== $cnrev_prof_lbl ) : ?>
			<p class="cn-rev-rating dt-rev"><?php
				if ( '' !== $cnrev_prof_url ) {
					printf(
						'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s</a>',
						esc_url( $cnrev_prof_url ),
						esc_html( $cnrev_prof_lbl )
					);
				} else {
					echo esc_html( $cnrev_prof_lbl );
				}
			?></p>
		<?php endif; ?>

		<?php if ( $cnrev_total > 1 ) : ?>
			<div class="cn-rev-controls dt-rev">
				<button type="button" class="cn-rev-arrow" aria-label="<?php esc_attr_e( 'Previous review', 'technbrains-child' ); ?>" data-cn-rev-prev><?php
					echo wp_kses( tnb_cn_icon( 'chevleft' ), $cnrev_svg );
				?></button>

				<div class="cn-rev-dots" role="tablist">
					<?php for ( $cnrev_d = 0; $cnrev_d < $cnrev_total; $cnrev_d++ ) : ?>
						<button
							type="button"
							role="tab"
							class="cn-rev-ddot<?php echo 0 === $cnrev_d ? ' is-active' : ''; ?>"
							aria-selected="<?php echo 0 === $cnrev_d ? 'true' : 'false'; ?>"
							aria-label="<?php
								/* translators: %d: review position in the carousel. */
								echo esc_attr( sprintf( __( 'Review %d', 'technbrains-child' ), $cnrev_d + 1 ) );
							?>"
							data-cn-rev-dot="<?php echo (int) $cnrev_d; ?>"></button>
					<?php endfor; ?>
				</div>

				<button type="button" class="cn-rev-arrow" aria-label="<?php esc_attr_e( 'Next review', 'technbrains-child' ); ?>" data-cn-rev-next><?php
					echo wp_kses( tnb_cn_icon( 'chevright' ), $cnrev_svg );
				?></button>
			</div>
		<?php endif; ?>
	</div>
</section>
