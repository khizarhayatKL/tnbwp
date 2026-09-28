<?php
/**
 * Component: About Us V2 — Story
 * Layout   : abs_story (ACF Flexible Content)
 * Dispatcher: template-parts/flexible/dispatch.php
 *
 * The whole About V2 narrative as a single flexible section: the hero, then the
 * story rail wrapping a sortable list of chapters.
 *
 * Why one layout rather than one per chapter — assets/js/about-v2.js → placeRail()
 * measures `.abs-story-track > section` to position the rail's nodes. The
 * dispatcher emits each layout as a flat sibling, so twelve separate layouts
 * would leave the chapters with no shared wrapper and the rail with nothing to
 * measure against. Keeping the wrapper here is what makes the chapters
 * reorderable at all.
 *
 * The hero sits outside `.abs-story-track` because it is not part of the rail, so
 * its fields live on the layout itself rather than in the abs_chapters loop.
 *
 * Chapter partials read their values with get_sub_field(), which resolves against
 * whichever abs_chapters row is current — so a chapter may appear at most once
 * per section. Rendering the same chapter twice is possible and simply repeats it.
 *
 * Assets (assets/css/about-v2.css, assets/js/about-v2.js) and the `abs-body` body
 * class are gated on this layout being present — see tnb_page_has_layout() in
 * functions.php.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'have_rows' ) ) {
	return;
}

/*
 * Chapter layout name → partial. The dispatcher pattern is repeated here rather
 * than reused because these are nested rows of one layout, not top-level
 * page_sections rows. An unknown name renders nothing instead of fataling, so a
 * layout renamed in ACF degrades to a missing chapter rather than a broken page.
 */
$abs_chapter_parts = array(
	'proof'        => 'About-v2-proof',
	'who'          => 'About-v2-who',
	'capabilities' => 'About-v2-capabilities',
	'founder'      => 'About-v2-founder',
	'journey'      => 'About-v2-journey',
	'recognition'  => 'About-v2-recognition',
	'cases'        => 'About-v2-cases',
	'experts'      => 'About-v2-experts',
	'testimonials' => 'About-v2-testimonials',
	'principles'   => 'About-v2-principles',
	'final_cta'    => 'About-v2-cta',
);

get_template_part( 'template-parts/components/About-v2-hero' );

// No chapters means no rail to draw, and an empty .abs-story-track would still
// paint the 1px line down an empty page.
if ( ! have_rows( 'abs_chapters' ) ) {
	return;
}
?>

<div class="abs-story-track">
	<span class="abs-storyline" aria-hidden="true">
		<span class="abs-rail"></span>
		<span class="abs-rail-fill"></span>
	</span>

	<?php
	while ( have_rows( 'abs_chapters' ) ) :
		the_row();

		$abs_layout = get_row_layout();
		if ( ! isset( $abs_chapter_parts[ $abs_layout ] ) ) {
			continue;
		}

		get_template_part( 'template-parts/components/' . $abs_chapter_parts[ $abs_layout ] );
	endwhile;
	?>
</div>
