<?php
/**
 * Single Case Study.
 *
 * Every case study has the same eleven sections in the same order, so the sections are called
 * by name here rather than dispatched from a flexible-content field. Nothing on this template
 * reads page_sections and it does not go through template-parts/flexible/dispatch.php.
 *
 * The .cs-narrative wrapper is load-bearing, not decorative. assets/js/case-study.js draws the
 * red thread by reading every .cs-node inside #narrative and terminating the path at the CTA's
 * email input (#thread-end), so the sections that carry a node — Problem, Solution, Impact and
 * the CTA — have to stay inside this wrapper and in this order.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" role="main" aria-label="Main content">
	<?php
	get_template_part( 'template-parts/components/Case-study-hero' );
	get_template_part( 'template-parts/components/Case-study-snapshot' );
	get_template_part( 'template-parts/components/Case-study-about' );
	?>

	<div class="cs-narrative" id="narrative">
		<svg class="cs-thread-svg" id="thread-svg" aria-hidden="true" preserveAspectRatio="none">
			<path id="thread-path" stroke="#EC1C24" stroke-width="2.5" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
		</svg>

		<?php
		get_template_part( 'template-parts/components/Case-study-quote' );
		get_template_part( 'template-parts/components/Case-study-problem' );
		get_template_part( 'template-parts/components/Case-study-solution' );
		get_template_part( 'template-parts/components/Case-study-tech' );
		get_template_part( 'template-parts/components/Case-study-impact' );
		get_template_part( 'template-parts/components/Case-study-expert' );
		get_template_part( 'template-parts/components/Case-study-logos' );
		get_template_part( 'template-parts/components/Case-study-cta' );
		?>
	</div>

	<?php get_template_part( 'template-parts/components/Case-study-next' ); ?>
</main>

<?php
get_footer();
