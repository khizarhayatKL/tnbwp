<?php
/**
 * Article template family — Contractor profile rows (type/why left, "Start with" pick right).
 *
 * Layout : art_profile_rows (ACF Flexible Content)
 * Fields : art_profile_items{ art_profile_type, art_profile_why, art_profile_pick }, art_anchor
 * CSS    : assets/css/article.css (.art-profiles, .art-profile, .art-profile-r)
 * JS     : none of its own.
 *
 * Headless, matching Article-DiagSet.php's convention — the H2 + lead paragraph come from a
 * preceding art_prose row. article-3.jsx's ProfileRow renders no "need" badge despite
 * .art-profile-need existing in the source stylesheet — that CSS is a leftover from an earlier
 * variant and stays unported here since nothing would ever use it.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items  = (array) get_sub_field( 'art_profile_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_profile_type'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_kses = tnb_art_allowed_html();
?>
<div class="art-profiles"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_item ) : ?>
		<?php
		$art_type = trim( (string) $art_item['art_profile_type'] );
		$art_why  = trim( (string) ( $art_item['art_profile_why'] ?? '' ) );
		$art_pick = trim( (string) ( $art_item['art_profile_pick'] ?? '' ) );
		?>
		<div class="art-profile">
			<div class="art-profile-l">
				<h3 class="art-profile-type"><?php echo esc_html( $art_type ); ?></h3>
				<?php if ( '' !== $art_why ) : ?>
					<p class="art-profile-why"><?php echo wp_kses( $art_why, $art_kses ); ?></p>
				<?php endif; ?>
			</div>
			<?php if ( '' !== $art_pick ) : ?>
				<div class="art-profile-r">
					<span class="art-profile-lbl">Start with</span>
					<span class="art-profile-pick"><?php echo esc_html( $art_pick ); ?></span>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
