<?php
/**
 * Component: Service — Three Ways (Engagement Models)
 * Layout   : sv_three_ways (ACF Flexible Content)
 *
 * White-background 3-column engagement model card grid.
 * Each card: icon box + title + when/what text + feature list.
 *
 * Fields:
 *   svtw_eyebrow  — text     (optional eyebrow label)
 *   svtw_heading  — text     (section heading; br/span allowed)
 *   svtw_sub      — textarea (sub-paragraph)
 *   svtw_models   — repeater
 *     svtw_model_icon    — image    (56×56 icon)
 *     svtw_model_title   — text     (card heading)
 *     svtw_model_link    — url      (optional URL — wraps card title in <a>)
 *     svtw_model_when    — text     (e.g. "Best when:")
 *     svtw_model_what    — textarea (description paragraph)
 *     svtw_list_heading  — text     (optional list section heading)
 *     svtw_model_points  — repeater (feature list)
 *       svtw_point_text  — text     (feature list item)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ──────────────────────────────────────────────────── */
$eyebrow = get_sub_field( 'svtw_eyebrow' ) ?: '';
$heading = get_sub_field( 'svtw_heading' ) ?: '';
$sub     = get_sub_field( 'svtw_sub' )     ?: '';

$models_raw = get_sub_field( 'svtw_models' );
$models     = [];
if ( is_array( $models_raw ) ) {
	foreach ( $models_raw as $row ) {
		$title = trim( $row['svtw_model_title'] ?? '' );
		if ( ! $title ) {
			continue;
		}
		$points = [];
		if ( is_array( $row['svtw_model_points'] ?? null ) ) {
			foreach ( $row['svtw_model_points'] as $pt ) {
				$text = sanitize_text_field( $pt['svtw_point_text'] ?? '' );
				if ( $text ) {
					$points[] = $text;
				}
			}
		}
		$models[] = [
			'icon'         => $row['svtw_model_icon'] ?? null,
			'title'        => sanitize_text_field( $title ),
			'link'         => esc_url( $row['svtw_model_link'] ?? '' ),
			'when'         => sanitize_text_field( $row['svtw_model_when'] ?? '' ),
			'what'         => sanitize_textarea_field( $row['svtw_model_what'] ?? '' ),
			'list_heading' => sanitize_text_field( $row['svtw_list_heading'] ?? '' ),
			'points'       => $points,
		];
	}
}
?>
<section class="sv-models">
	<div class="container sv-models-inner">

		<?php if ( $eyebrow ) : ?>
		<div class="sv-models-eyebrow">
			<?php echo esc_html( $eyebrow ); ?>
		</div>
		<?php endif; ?>

		<?php if ( $heading ) : ?>
		<h2 class="sv-models-h2">
			<?php
			echo wp_kses( $heading, [
				'br'   => [],
				'span' => [ 'class' => [] ],
			] );
			?>
		</h2>
		<?php endif; ?>

		<?php if ( $sub ) : ?>
		<p class="sv-models-sub"><?php echo esc_html( $sub ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $models ) ) : ?>
		<div class="sv-models-grid">
			<?php foreach ( $models as $model ) : ?>
			<div class="sv-model">

				<?php if ( ! empty( $model['icon']['ID'] ) ) : ?>
				<div class="sv-model-ic">
					<?php echo wp_get_attachment_image(
						$model['icon']['ID'],
						[ 32, 32 ],
						false,
						[ 'alt' => '', 'loading' => 'lazy' ]
					); ?>
				</div><!-- .sv-model-ic -->
				<?php endif; ?>

				<h3 class="sv-model-title">
					<?php if ( $model['link'] ) : ?>
						<a href="<?php echo $model['link']; ?>"><?php echo esc_html( $model['title'] ); ?></a>
					<?php else : ?>
						<?php echo esc_html( $model['title'] ); ?>
					<?php endif; ?>
				</h3>

				<?php if ( $model['when'] ) : ?>
				<p class="sv-model-when"><?php echo esc_html( $model['when'] ); ?></p>
				<?php endif; ?>

				<?php if ( $model['what'] ) : ?>
				<p class="sv-model-what"><?php echo esc_html( $model['what'] ); ?></p>
				<?php endif; ?>

				<?php if ( ! empty( $model['points'] ) ) : ?>

					<?php if ( $model['list_heading'] ) : ?>
					<p class="sv-model-list-h"><?php echo esc_html( $model['list_heading'] ); ?></p>
					<?php endif; ?>

					<ul class="sv-model-list">
						<?php foreach ( $model['points'] as $point ) : ?>
						<li>
							<span class="sv-model-check">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><polyline points="20 6 9 17 4 12"/></svg>
							</span>
							<span><?php echo esc_html( $point ); ?></span>
						</li>
						<?php endforeach; ?>
					</ul><!-- .sv-model-list -->

				<?php endif; ?>

			</div><!-- .sv-model -->
			<?php endforeach; ?>
		</div><!-- .sv-models-grid -->
		<?php endif; ?>

	</div><!-- .sv-models-inner -->
</section><!-- .sv-models -->
