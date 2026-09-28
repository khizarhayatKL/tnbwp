<?php
/**
 * Article template family — Silo internal-linking module (page-level, after the article grid).
 *
 * Layout : art_silo (ACF Flexible Content)
 * Fields : art_silo_eyebrow, art_silo_heading, art_silo_hub_label, art_silo_hub_url,
 *          art_silo_theme (radio: light/dark), art_silo_groups{ art_silo_group_heading,
 *          art_silo_group_links{ art_silo_link_label, art_silo_link_url } }, art_anchor
 * CSS    : assets/css/article.css (.art-silo*)
 * JS     : none of its own.
 *
 * Renders after `.art-layout` closes (page-level chrome, not inside the sidebar/content grid),
 * per the approved section order — that placement is a dispatch.php concern for a later pass,
 * this component itself is a normal flexible-content row like any other. The hub link is a
 * single fixed item (not a repeater row) since procore-app.jsx's SiloModule always renders
 * exactly one "up to the hub" link ahead of the reason-grouped link lists.
 *
 * procore-app.jsx's `data-screen-label="Silo links"` is a design-tool debug attribute with no
 * production meaning — not ported, same treatment as the AltEval `<image-slot>` placeholder.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_eyebrow   = trim( (string) get_sub_field( 'art_silo_eyebrow' ) );
$art_heading   = trim( (string) get_sub_field( 'art_silo_heading' ) );
$art_hub_label = trim( (string) get_sub_field( 'art_silo_hub_label' ) );
$art_hub_url   = trim( (string) get_sub_field( 'art_silo_hub_url' ) );
$art_groups    = (array) get_sub_field( 'art_silo_groups' );
$art_theme     = (string) get_sub_field( 'art_silo_theme' );
$art_anchor    = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_groups = array_values(
	array_filter(
		$art_groups,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_silo_group_heading'] ?? '' ) );
		}
	)
);

if ( '' === $art_heading || ( '' === $art_hub_url && ! $art_groups ) ) {
	return;
}

$art_arrow = wp_kses( tnb_art_icon( 'arrowSm' ), tnb_art_svg_html() );
?>
<section class="art-silo<?php echo 'dark' === $art_theme ? ' art-silo--dark' : ''; ?>"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="art-silo-inner">
		<div class="art-silo-top">
			<div class="art-silo-top-head">
				<?php if ( '' !== $art_eyebrow ) : ?>
					<div class="art-silo-eyebrow"><?php echo esc_html( $art_eyebrow ); ?></div>
				<?php endif; ?>
				<h2 class="art-silo-h"><?php echo esc_html( $art_heading ); ?></h2>
			</div>
			<?php if ( '' !== $art_hub_url && '' !== $art_hub_label ) : ?>
				<div class="art-silo-group art-silo-hub">
					<h4>Up to the hub</h4>
					<ul class="art-silo-list">
						<li><a href="<?php echo esc_url( $art_hub_url ); ?>"><?php echo esc_html( $art_hub_label ); ?><?php echo $art_arrow; ?></a></li>
					</ul>
				</div>
			<?php endif; ?>
		</div>
		<div class="art-silo-groups">
			<?php foreach ( $art_groups as $art_group ) : ?>
				<?php
				$art_group_heading = trim( (string) $art_group['art_silo_group_heading'] );
				$art_links         = (array) ( $art_group['art_silo_group_links'] ?? array() );
				$art_links         = array_values(
					array_filter(
						$art_links,
						static function ( $link_row ) {
							return '' !== trim( (string) ( $link_row['art_silo_link_url'] ?? '' ) );
						}
					)
				);
				if ( ! $art_links ) {
					continue;
				}
				?>
				<div class="art-silo-group">
					<h4><?php echo esc_html( $art_group_heading ); ?></h4>
					<ul class="art-silo-list">
						<?php foreach ( $art_links as $art_link ) : ?>
							<?php
							$art_link_label = trim( (string) ( $art_link['art_silo_link_label'] ?? '' ) );
							$art_link_url   = trim( (string) $art_link['art_silo_link_url'] );
							?>
							<li><a href="<?php echo esc_url( $art_link_url ); ?>"><?php echo esc_html( $art_link_label ); ?><?php echo $art_arrow; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
