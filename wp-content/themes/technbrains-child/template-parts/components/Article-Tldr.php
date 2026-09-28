<?php
/**
 * Article template family — TL;DR panel (need → tool pairs, or heading+sentence rows).
 *
 * Layout : art_tldr (ACF Flexible Content)
 * Fields : art_tldr_kicker, art_tldr_heading, art_tldr_mark_style (radio: circle/plain),
 *          art_tldr_items{ art_tldr_need, art_tldr_tool, art_tldr_body }, art_anchor
 * CSS    : assets/css/article.css (.art-tldr*, .cost-tldr-key-h)
 * JS     : none of its own.
 *
 * Two per-row styles, chosen by whether art_tldr_body is filled — the Procore and Cost source
 * pages use genuinely different shapes here, not a restyle of the same one:
 *   - art_tldr_body EMPTY (Procore's shape): "need → **tool**", an arrow-separated pair
 *     (`.art-tldr-key-need` + `.art-tldr-key-arrow` + `.art-tldr-key-tool`).
 *   - art_tldr_body FILLED (Cost's shape): "**need.** body", one bold heading run into an
 *     inline sentence (`.cost-tldr-key-h`), no arrow, no separate "tool" field used.
 * art_tldr_tool stays required for the arrow style; a row is kept if either tool or body has
 * content, so both styles can coexist row-by-row if ever needed.
 *
 * art_tldr_mark_style is an editor choice per row, not tied to row shape: "circle" (default) is
 * the solid red circle left of the text; "plain" is the small, transparent, top-right dark check
 * (Procore Alternatives' own look, migrated from a hardcoded page-scoped CSS override to this
 * field so it's an explicit editorial choice instead of a page-slug special case).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_kicker = (string) get_sub_field( 'art_tldr_kicker' );
$art_heading = (string) get_sub_field( 'art_tldr_heading' );
$art_mark_style = (string) get_sub_field( 'art_tldr_mark_style' );
$art_items   = (array) get_sub_field( 'art_tldr_items' );
$art_anchor  = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_tldr_tool'] ?? '' ) )
				|| '' !== trim( (string) ( $row['art_tldr_body'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_kses = tnb_art_allowed_html();
?>
<section class="art-sec art-fade"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="art-tldr art-tldr-box<?php echo 'plain' === $art_mark_style ? ' art-tldr--mark-plain' : ''; ?>">
		<div class="art-tldr-head">
			<div>
				<?php if ( '' !== $art_kicker ) : ?>
					<span class="art-tldr-kicker"><?php echo esc_html( $art_kicker ); ?></span>
				<?php endif; ?>
				<?php if ( '' !== $art_heading ) : ?>
					<h2><?php echo esc_html( $art_heading ); ?></h2>
				<?php endif; ?>
			</div>
		</div>
		<ul class="art-tldr-keys">
			<?php foreach ( $art_items as $art_item ) : ?>
				<?php
				$art_need = trim( (string) ( $art_item['art_tldr_need'] ?? '' ) );
				$art_tool = trim( (string) ( $art_item['art_tldr_tool'] ?? '' ) );
				$art_body = trim( (string) ( $art_item['art_tldr_body'] ?? '' ) );
				?>
				<li class="art-tldr-key">
					<span class="art-tldr-key-mark" aria-hidden="true"><?php
						echo wp_kses( tnb_art_icon( 'check' ), tnb_art_svg_html() );
					?></span>
					<span class="art-tldr-key-text">
						<?php if ( '' !== $art_body ) : ?>
							<strong class="cost-tldr-key-h"><?php echo esc_html( $art_need ); ?>.</strong>
							<?php echo wp_kses( $art_body, $art_kses ); ?>
						<?php else : ?>
							<?php if ( '' !== $art_need ) : ?>
								<span class="art-tldr-key-need"><?php echo esc_html( $art_need ); ?></span>
								<span class="art-tldr-key-arrow" aria-hidden="true">&rarr;</span>
							<?php endif; ?>
							<strong class="art-tldr-key-tool"><?php echo esc_html( $art_tool ); ?></strong>
						<?php endif; ?>
					</span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
