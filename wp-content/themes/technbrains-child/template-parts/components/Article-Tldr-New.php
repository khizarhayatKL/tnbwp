<?php
/**
 * Article template family — TL;DR panel (New): single-column "if your priority is → go with" rows.
 *
 * Layout : art_tldr_new (ACF Flexible Content)
 * Fields : art_tldr_new_kicker, art_tldr_new_heading,
 *          art_tldr_new_items{ art_tldr_new_need, art_tldr_new_tool }, art_anchor
 * CSS    : assets/css/article.css (.art-tldr2*)
 * JS     : none of its own.
 *
 * A separate component from Article-Tldr.php's `art_tldr` layout (the checkmark card-grid
 * panel) — not a restyle of it. Both layouts can be used independently on any article.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_kicker  = (string) get_sub_field( 'art_tldr_new_kicker' );
$art_heading = (string) get_sub_field( 'art_tldr_new_heading' );
$art_items   = (array) get_sub_field( 'art_tldr_new_items' );
$art_anchor  = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_tldr_new_tool'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}
?>
<section class="art-sec art-fade"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="art-tldr2-box">
		<div class="art-tldr2-head">
			<?php if ( '' !== $art_kicker ) : ?>
				<span class="art-tldr2-kicker"><?php echo esc_html( $art_kicker ); ?></span>
			<?php endif; ?>
			<?php if ( '' !== $art_heading ) : ?>
				<h2><?php echo esc_html( $art_heading ); ?></h2>
			<?php endif; ?>
		</div>
		<ul class="art-tldr2-keys">
			<?php foreach ( $art_items as $art_item ) : ?>
				<?php
				$art_need = trim( (string) ( $art_item['art_tldr_new_need'] ?? '' ) );
				$art_tool = trim( (string) ( $art_item['art_tldr_new_tool'] ?? '' ) );
				?>
				<li class="art-tldr2-key">
					<span class="art-tldr2-key-text">
						<span class="art-tldr2-key-need"><?php echo esc_html( $art_need ); ?></span>
						<span class="art-tldr2-key-arrow" aria-hidden="true"></span>
						<span class="art-tldr2-key-tool-wrap">
							<span class="art-tldr2-key-tool-label" aria-hidden="true">Go with</span>
							<strong class="art-tldr2-key-tool"><?php echo esc_html( $art_tool ); ?></strong>
						</span>
					</span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
