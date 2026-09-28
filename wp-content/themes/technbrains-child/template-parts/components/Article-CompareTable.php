<?php
/**
 * Article template family — Full comparison table (6-col, sortable, + editorial notes).
 *
 * Layout : art_compare_table (ACF Flexible Content)
 * Fields : art_cmp_rows{ art_cmp_tool, art_cmp_method, art_cmp_field, art_cmp_field_note,
 *          art_cmp_sentiment, art_cmp_sent_detail, art_cmp_price, art_cmp_price_state,
 *          art_cmp_owner }, art_cmp_notes{ art_cmp_note_label, art_cmp_note_text }, art_anchor
 * CSS    : assets/css/article.css (.art-cmp2*, .art-sent*, .art-meter*, .art-price*, .art-notes)
 * JS     : assets/js/article-toc.js ("COMPARISON TABLE SORT" — click-to-sort column headers,
 *          porting article-2.jsx's ComparisonTable sort logic verbatim: rank maps for field
 *          usability / sentiment / pricing, alphabetical for the rest).
 *
 * Headless, matching Article-DiagSet.php's convention — the H2 + lead paragraph come from a
 * preceding art_prose row (article-3.jsx never gives ComparisonTable its own heading either).
 * Columns are fixed (Tool / Method / Field usability / Sentiment / Pricing / Ownership) rather
 * than editable, matching ART_COMPARE_COLS in the source — the schema is tied to the row fields
 * themselves, not a per-page choice. Reuses the same .art-cmp2 grid Article-DecisionTable.php
 * already renders, just with richer cells (sentiment dot, field-usability meter, pricing badge)
 * instead of plain text, exactly as the source layers ComparisonTable on the same CSS as its
 * simpler DecisionTable.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_rows   = (array) get_sub_field( 'art_cmp_rows' );
$art_notes  = (array) get_sub_field( 'art_cmp_notes' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_rows = array_values(
	array_filter(
		$art_rows,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_cmp_tool'] ?? '' ) );
		}
	)
);

if ( ! $art_rows ) {
	return;
}

$art_svg  = tnb_art_svg_html();
$art_kses = tnb_art_allowed_html();

$art_sent_label = array(
	'positive' => 'Generally positive',
	'concerns' => 'Positive with recurring concerns',
	'mixed'    => 'Mixed',
	'limited'  => 'Limited evidence',
	'negative' => 'Generally negative',
);
$art_field_label = array(
	'strong'   => 'Strong',
	'moderate' => 'Moderate',
	'weak'     => 'Weak',
);
$art_cols = array( 'Tool', 'Method', 'Field usability', 'Sentiment', 'Pricing', 'Ownership' );
?>
<div class="art-compare-wrap"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="art-cmp2-scroll">
		<table class="art-dtable art-cmp2" style="--cmp-cols: 1fr 1fr 1fr 1fr 1fr 1fr; min-width: 860px;">
			<thead>
				<tr class="art-cmp2-heads">
					<?php foreach ( $art_cols as $art_i => $art_col ) : ?>
						<th class="art-cmp2-head <?php echo 0 === $art_i ? 'tone-blue' : 'tone-navy'; ?>" scope="col">
							<button type="button" class="art-cmp2-sortbtn" data-sort-key="<?php echo esc_attr( strtolower( str_replace( ' ', '-', $art_col ) ) ); ?>" aria-label="Sort by <?php echo esc_attr( $art_col ); ?>">
								<b><?php echo esc_html( $art_col ); ?></b>
								<span class="art-sort-ico"><?php echo wp_kses( tnb_art_icon( 'chevron' ), $art_svg ); ?></span>
							</button>
						</th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody class="art-cmp2-body">
				<?php foreach ( $art_rows as $art_row ) : ?>
					<?php
					$art_tool        = trim( (string) $art_row['art_cmp_tool'] );
					$art_method      = trim( (string) ( $art_row['art_cmp_method'] ?? '' ) );
					$art_field       = (string) ( $art_row['art_cmp_field'] ?? 'moderate' );
					$art_field_note  = trim( (string) ( $art_row['art_cmp_field_note'] ?? '' ) );
					$art_sentiment   = (string) ( $art_row['art_cmp_sentiment'] ?? 'limited' );
					$art_sent_detail = trim( (string) ( $art_row['art_cmp_sent_detail'] ?? '' ) );
					$art_price       = trim( (string) ( $art_row['art_cmp_price'] ?? '' ) );
					$art_price_state = (string) ( $art_row['art_cmp_price_state'] ?? 'undisclosed' );
					$art_owner       = trim( (string) ( $art_row['art_cmp_owner'] ?? '' ) );
					?>
					<tr class="art-cmp2-row"
						data-tool="<?php echo esc_attr( strtolower( $art_tool ) ); ?>"
						data-method="<?php echo esc_attr( strtolower( $art_method ) ); ?>"
						data-field="<?php echo esc_attr( $art_field ); ?>"
						data-sentiment="<?php echo esc_attr( $art_sentiment ); ?>"
						data-price-state="<?php echo esc_attr( $art_price_state ); ?>"
						data-owner="<?php echo esc_attr( strtolower( $art_owner ) ); ?>"
					>
						<td class="art-cmp2-cell cap"><?php echo esc_html( $art_tool ); ?></td>
						<td class="art-cmp2-cell txt"><?php echo esc_html( $art_method ); ?></td>
						<td class="art-cmp2-cell txt">
							<span class="art-meter art-meter--<?php echo esc_attr( $art_field ); ?>">
								<span class="art-meter-bars" aria-hidden="true"><i></i><i></i><i></i></span>
								<span><?php echo esc_html( $art_field_label[ $art_field ] ?? '' ); ?><?php if ( '' !== $art_field_note ) : ?><span class="art-td-sub"><?php echo esc_html( $art_field_note ); ?></span><?php endif; ?></span>
							</span>
						</td>
						<td class="art-cmp2-cell txt">
							<span class="art-sent art-sent--<?php echo esc_attr( $art_sentiment ); ?>">
								<span class="art-sent-dot" aria-hidden="true"></span>
								<span><?php echo esc_html( $art_sent_label[ $art_sentiment ] ?? '' ); ?><?php if ( '' !== $art_sent_detail ) : ?><span class="art-td-sub"><?php echo esc_html( $art_sent_detail ); ?></span><?php endif; ?></span>
							</span>
						</td>
						<td class="art-cmp2-cell txt">
							<span class="art-price<?php echo 'undisclosed' === $art_price_state ? ' art-price--undisclosed' : ( 'quote' === $art_price_state ? ' art-price--quote' : '' ); ?>"><?php echo esc_html( $art_price ); ?></span>
						</td>
						<td class="art-cmp2-cell txt"><?php echo esc_html( $art_owner ); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php
	$art_notes = array_values(
		array_filter(
			$art_notes,
			static function ( $row ) {
				return '' !== trim( (string) ( $row['art_cmp_note_label'] ?? '' ) );
			}
		)
	);
	?>
	<?php if ( $art_notes ) : ?>
		<div class="art-sub art-notes">
			<?php foreach ( $art_notes as $art_note ) : ?>
				<?php
				$art_note_label = trim( (string) $art_note['art_cmp_note_label'] );
				$art_note_text  = trim( (string) ( $art_note['art_cmp_note_text'] ?? '' ) );
				?>
				<div class="art-note">
					<span class="art-note-k"><?php echo esc_html( $art_note_label ); ?></span>
					<?php if ( '' !== $art_note_text ) : ?>
						<p><?php echo wp_kses_post( $art_note_text ); ?></p>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
