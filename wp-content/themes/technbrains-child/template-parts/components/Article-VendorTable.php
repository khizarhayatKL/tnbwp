<?php
/**
 * Article template family — Vendor pricing-disclosure table (fixed 3 columns, status pill).
 *
 * Layout : art_vendor_table (ACF Flexible Content)
 * Fields : art_vendor_items{ art_vendor_name, art_vendor_state(select), art_vendor_model },
 *          art_anchor
 * CSS    : assets/css/article.css (.art-cmp2, .cost-pill*)
 * JS     : none of its own.
 *
 * Fixed shape (Vendor / Publishes pricing? / Model), not a generic N-column table like
 * Article-DecisionTable.php — column 2 always renders a coloured state pill
 * (yes / no / partial / no-longer), which only makes sense for this one "does the vendor publish
 * pricing" question. Reuses the same .art-cmp2 grid skeleton so it visually matches the other
 * comparison tables in this family.
 *
 * Headless, matching Article-DiagSet.php's convention — the H2 + lead paragraph come from a
 * preceding art_prose row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items  = (array) get_sub_field( 'art_vendor_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_vendor_name'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_states = array(
	'yes'      => array( 'class' => 'is-yes', 'label' => 'Yes', 'icon' => 'check' ),
	'no'       => array( 'class' => 'is-no', 'label' => 'No', 'icon' => 'x' ),
	'partial'  => array( 'class' => 'is-partial', 'label' => 'Partially', 'icon' => 'vendor-partial' ),
	'nolonger' => array( 'class' => 'is-nolonger', 'label' => 'No longer', 'icon' => 'vendor-nolonger' ),
);
$art_svg = tnb_art_svg_html();
?>
<div class="art-cmp2-scroll"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
<table class="art-dtable art-cmp2 cost-vt-cmp" style="--cmp-cols:1.1fr 1fr 1.4fr; min-width: 480px;">
	<thead>
		<tr class="art-cmp2-heads">
			<th class="art-cmp2-head tone-blue" scope="col"><b>Vendor</b></th>
			<th class="art-cmp2-head tone-navy" scope="col"><b>Publishes pricing?</b></th>
			<th class="art-cmp2-head tone-red" scope="col"><b>Model</b></th>
		</tr>
	</thead>
	<tbody class="art-cmp2-body">
		<?php foreach ( $art_items as $art_item ) : ?>
			<?php
			$art_name  = trim( (string) $art_item['art_vendor_name'] );
			$art_state = (string) ( $art_item['art_vendor_state'] ?? 'no' );
			$art_model = trim( (string) ( $art_item['art_vendor_model'] ?? '' ) );
			$art_st    = $art_states[ $art_state ] ?? $art_states['no'];
			?>
			<tr class="art-cmp2-row">
				<td class="art-cmp2-cell cap"><?php echo esc_html( $art_name ); ?></td>
				<td class="art-cmp2-cell txt">
					<span class="cost-pill <?php echo esc_attr( $art_st['class'] ); ?>">
						<?php echo wp_kses( tnb_art_icon( $art_st['icon'] ), $art_svg ); ?><?php echo esc_html( $art_st['label'] ); ?>
					</span>
				</td>
				<td class="art-cmp2-cell txt art-dt-cat"><?php echo esc_html( $art_model ); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
