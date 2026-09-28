<?php

/**
 * Template Name: Flexible Content
 *
 * Generic flexible page builder — mirrors the same pattern used in AppVertical.
 *
 * How it works:
 *   1. Assign this template to any WordPress page via Page Attributes → Template.
 *   2. The ACF "Page Sections" field group appears in the editor.
 *   3. Click "+ Add Section" to add, reorder, or remove sections dynamically.
 *   4. Each section maps to a component in template-parts/components/.
 *   5. The dispatcher (template-parts/flexible/dispatch.php) routes each
 *      ACF flexible content row to the correct component file.
 *
 * To register a new section type:
 *   1. Add a layout to inc/acf-fields.php → 'layouts' array.
 *   2. Create template-parts/components/{Component-name}.php.
 *   3. Add a matching case in template-parts/flexible/dispatch.php.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

get_header();

// The Article template family's sidebar TOC is template-level chrome, not a flexible-content
// row — see inc/acf-article-sidebar.php. tnb_article_sidebar_should_render() is the single
// source of truth also used by the asset-enqueue gate in functions.php, so the toggle being on
// with an empty TOC repeater renders exactly like the toggle being off.
$tnb_art_post_id      = get_the_ID();
$tnb_art_show_sidebar = function_exists( 'tnb_article_sidebar_should_render' ) && tnb_article_sidebar_should_render( $tnb_art_post_id );
?>

<main id="main" role="main" aria-label="Main content">
	<?php if ( $tnb_art_show_sidebar ) : ?>
		<?php get_template_part( 'template-parts/flexible/dispatch', null, array( 'only' => array( 'art_hero' ) ) ); ?>
		<div class="art-shell">
			<div class="art-layout">
				<aside>
					<details class="art-toc" open>
						<summary>
							<span>On this page</span>
							<span class="art-toc-chev" aria-hidden="true"><?php echo wp_kses( tnb_art_icon( 'chevron' ), tnb_art_svg_html() ); ?></span>
						</summary>
						<nav class="art-toc-scroll" aria-label="Table of contents">
							<?php foreach ( (array) get_field( 'tnb_toc_items', $tnb_art_post_id ) as $tnb_toc_i => $tnb_toc_item ) : ?>
								<?php
								$tnb_toc_link   = (array) ( $tnb_toc_item['toc_link'] ?? array() );
								$tnb_toc_label  = trim( (string) ( $tnb_toc_link['title'] ?? '' ) );
								$tnb_toc_target = sanitize_title( ltrim( trim( (string) ( $tnb_toc_link['url'] ?? '' ) ), '#' ) );
								if ( '' === $tnb_toc_label || '' === $tnb_toc_target ) {
									continue;
								}
								?>
								<a href="#<?php echo esc_attr( $tnb_toc_target ); ?>" class="art-toc-link">
									<span class="art-toc-num"><?php echo esc_html( sprintf( '%02d', $tnb_toc_i + 1 ) ); ?></span><?php echo esc_html( $tnb_toc_label ); ?>
								</a>
							<?php endforeach; ?>
						</nav>
					</details>
				</aside>
				<div class="art-content">
					<?php get_template_part( 'template-parts/flexible/dispatch', null, array( 'skip' => array( 'art_hero', 'art_silo' ) ) ); ?>
				</div>
			</div>
		</div>
		<?php get_template_part( 'template-parts/flexible/dispatch', null, array( 'only' => array( 'art_silo' ) ) ); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/flexible/dispatch' ); ?>
	<?php endif; ?>
</main>

<?php
get_footer();
