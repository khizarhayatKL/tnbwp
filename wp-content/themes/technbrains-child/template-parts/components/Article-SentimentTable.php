<?php
/**
 * Article template family — Evidence-confidence sentiment table (praise/criticism + confidence).
 *
 * Layout : art_sentiment_table (ACF Flexible Content)
 * Fields : art_sent_note,
 *          art_sent_items{ art_sent_name, art_sent_praised, art_sent_criticised,
 *          art_sent_conf (select: high/medhigh/medium), art_sent_limited (true_false) }, art_anchor
 * CSS    : assets/css/article.css (.pa-sent-fig, .art-dtable, .art-cmp2*, .art-cmp2-scroll,
 *          .pa-sent-*, .pa-conf*)
 * JS     : none of its own.
 *
 * Headless like Article-DiagSet.php/Article-AltEvals.php — the H2 + lead paragraph come from a
 * preceding art_prose row. Reuses the same .art-dtable.art-cmp2 grid skeleton as
 * Article-DecisionTable.php (fixed 4-column layout here, not editor-configurable columns, since
 * the shape — name / praised / criticised / confidence — is fixed by procore-app.jsx's
 * SentimentTable, not a generic comparison grid).
 *
 * Confidence dots/label (procore-app.jsx's CONF_META) are reproduced inline rather than as a
 * separate component since it is only ever used here, one cell at a time.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_note   = trim( (string) get_sub_field( 'art_sent_note' ) );
$art_items  = (array) get_sub_field( 'art_sent_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_sent_name'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_conf_meta = array(
	'high'    => array( 'n' => 3, 'label' => 'High' ),
	'medhigh' => array( 'n' => 2, 'label' => 'Medium to high' ),
	'medium'  => array( 'n' => 1, 'label' => 'Medium' ),
);
$art_svg = tnb_art_svg_html();
?>
<figure class="pa-sent-fig"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="art-cmp2-scroll">
	<table class="art-dtable art-cmp2 pa-sent-cmp" style="--cmp-cols:1fr 1fr 1fr 1fr; min-width: 600px;">
		<thead>
			<tr class="art-cmp2-heads">
				<th class="art-cmp2-head tone-blue" scope="col"><b>Alternative</b></th>
				<th class="art-cmp2-head tone-navy" scope="col"><b>Most praised</b></th>
				<th class="art-cmp2-head tone-red" scope="col"><b>Most criticised</b></th>
				<th class="art-cmp2-head tone-navy" scope="col"><b>Evidence confidence</b></th>
			</tr>
		</thead>
		<tbody class="art-cmp2-body">
			<?php foreach ( $art_items as $art_item ) : ?>
				<?php
				$art_name       = trim( (string) $art_item['art_sent_name'] );
				$art_praised    = trim( (string) ( $art_item['art_sent_praised'] ?? '' ) );
				$art_criticised = trim( (string) ( $art_item['art_sent_criticised'] ?? '' ) );
				$art_conf_key   = (string) ( $art_item['art_sent_conf'] ?? 'medium' );
				$art_conf       = $art_conf_meta[ $art_conf_key ] ?? $art_conf_meta['medium'];
				$art_limited    = ! empty( $art_item['art_sent_limited'] );
				$art_conf_title = 'Evidence confidence: ' . $art_conf['label'] . ( $art_limited ? ' (evidence limited)' : '' );
				?>
				<tr class="art-cmp2-row">
					<td class="art-cmp2-cell cap"><?php echo esc_html( $art_name ); ?></td>
					<td class="art-cmp2-cell txt pa-sent-pos">
						<span class="pa-sent-mark pa-sent-mark--pos" aria-hidden="true"><?php echo wp_kses( tnb_art_icon( 'check' ), $art_svg ); ?></span>
						<?php echo esc_html( $art_praised ); ?>
					</td>
					<td class="art-cmp2-cell txt pa-sent-neg">
						<span class="pa-sent-mark pa-sent-mark--neg" aria-hidden="true"><?php echo wp_kses( tnb_art_icon( 'x' ), $art_svg ); ?></span>
						<?php echo esc_html( $art_criticised ); ?>
					</td>
					<td class="art-cmp2-cell txt">
						<span class="pa-conf pa-conf--<?php echo esc_attr( $art_conf_key ); ?>" title="<?php echo esc_attr( $art_conf_title ); ?>">
							<span class="pa-conf-dots" aria-hidden="true">
								<?php for ( $art_d = 0; $art_d < 3; $art_d++ ) : ?>
									<i class="<?php echo $art_d < $art_conf['n'] ? 'on' : ''; ?>"></i>
								<?php endfor; ?>
							</span>
							<span class="pa-conf-label">
								<?php echo esc_html( $art_conf['label'] ); ?>
								<?php if ( $art_limited ) : ?><span class="pa-conf-flag">evidence limited</span><?php endif; ?>
							</span>
						</span>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
	<?php if ( '' !== $art_note ) : ?>
		<p class="pa-sent-note"><?php echo wp_kses( tnb_art_icon( 'info' ), $art_svg ); ?><span><?php echo esc_html( $art_note ); ?></span></p>
	<?php endif; ?>
</figure>
