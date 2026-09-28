<?php
/**
 * Article template family — Numbered source list.
 *
 * Layout : art_sources (ACF Flexible Content)
 * Fields : art_src_heading,
 *          art_src_items{ art_src_pub, art_src_desc, art_src_access, art_src_url }, art_anchor
 * CSS    : assets/css/article.css (.art-sources, .art-src-access)
 * JS     : none of its own.
 *
 * Self-contained with its own optional heading (same shape as Article-DecisionTable.php) rather
 * than relying on a preceding art_prose row — procore-app.jsx goes straight from the section's H2
 * to the source list with no intro paragraph in between, so there is no natural prose row to
 * carry the heading.
 *
 * art_src_pub/art_src_desc use wp_kses_post: procore-data.jsx's PA_SOURCES entries are rendered
 * via dangerouslySetInnerHTML, meaning the source copy itself can carry inline markup (e.g. an
 * embedded citation link), not just plain text. art_src_url is the literal visible link text as
 * well as the href — the prototype prints the URL itself, not a separate label.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_heading = trim( (string) get_sub_field( 'art_src_heading' ) );
$art_items   = (array) get_sub_field( 'art_src_items' );
$art_anchor  = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_src_pub'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}
?>
<section class="art-sec art-fade art-sec--major"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php if ( '' !== $art_heading ) : ?>
		<h2><?php echo esc_html( $art_heading ); ?></h2>
	<?php endif; ?>
	<div class="art-sub">
		<div class="art-sources">
			<ol>
				<?php foreach ( $art_items as $art_item ) : ?>
					<?php
					$art_pub    = trim( (string) $art_item['art_src_pub'] );
					$art_desc   = trim( (string) ( $art_item['art_src_desc'] ?? '' ) );
					$art_access = trim( (string) ( $art_item['art_src_access'] ?? '' ) );
					$art_url    = trim( (string) ( $art_item['art_src_url'] ?? '' ) );
					?>
					<li>
						<strong style="color:var(--art-ink)"><?php echo wp_kses_post( $art_pub ); ?>.</strong>
						<?php if ( '' !== $art_desc ) : ?> <span><?php echo wp_kses_post( $art_desc ); ?></span><?php endif; ?>
						<?php if ( '' !== $art_access ) : ?> <span class="art-src-access"><?php echo esc_html( $art_access ); ?></span><?php endif; ?>
						<?php if ( '' !== $art_url ) : ?>
							<br />
							<a href="<?php echo esc_url( $art_url ); ?>" target="_blank" rel="noopener nofollow"><?php echo esc_html( $art_url ); ?></a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
