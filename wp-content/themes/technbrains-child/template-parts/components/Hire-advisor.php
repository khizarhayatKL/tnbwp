<?php
/**
 * Component: Hire Developer — Engineering Setup Advisor (HDAdvisor)
 * Layout   : hd_advisor (ACF Flexible Content)
 *
 * Fields:
 *   hdadv_eyebrow               — text
 *   hdadv_heading               — text   (plain part)
 *   hdadv_heading_accent        — text   (accent span)
 *   hdadv_sub                   — textarea
 *   hdadv_other_label           — text   (label above "other" textarea)
 *   hdadv_other_placeholder     — text   (placeholder for "other" textarea)
 *   hdadv_steps                 — repeater
 *     hdadv_step_question       — text
 *     hdadv_step_options        — repeater
 *       hdadv_option_text       — text
 *       hdadv_option_key        — text   (semantic key used by compute logic:
 *                                          Step 1: new_product | expanding | fixing | modernizing | scaling
 *                                          Step 2: hiring | delivery | expertise | coordination | maintain
 *                                          Step 3: any key; set is_other=true on the "Something Else" option)
 *       hdadv_option_is_other   — true_false  (flags the "Something Else" option → custom result)
 *     hdadv_step_visual_image   — image
 *     hdadv_step_visual_caption — text
 *     hdadv_step_visual_sub     — textarea
 *   hdadv_results               — repeater  (one row per result key)
 *     hdadv_result_key          — text   (senior | dedicated | full | custom)
 *     hdadv_result_title        — text
 *     hdadv_result_desc         — textarea
 *     hdadv_result_model        — text
 *     hdadv_result_fit          — repeater
 *       hdadv_result_fit_item   — text
 *     hdadv_result_primary_text   — text
 *     hdadv_result_primary_url    — url
 *     hdadv_result_secondary_text — text
 *     hdadv_result_secondary_url  — url
 *
 * Compute result logic (JS, based on option keys):
 *   Last-step is_other selected      → custom
 *   Step 1 key = new_product         → full
 *   Step 1 = scaling|expanding AND Step 2 = hiring|expertise → senior
 *   Step 2 = delivery|coordination   → dedicated
 *   Step 2 = maintain                → full
 *   default                          → dedicated
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ─────────────────────────────────────────── */
$eyebrow        = get_sub_field( 'hdadv_eyebrow' )           ?: '';
$heading        = get_sub_field( 'hdadv_heading' )           ?: '';
$heading_accent = get_sub_field( 'hdadv_heading_accent' )    ?: '';
$sub            = get_sub_field( 'hdadv_sub' )               ?: '';
$other_label    = get_sub_field( 'hdadv_other_label' )       ?: 'Briefly describe what you need help with.';
$other_ph       = get_sub_field( 'hdadv_other_placeholder' ) ?: 'Example: QA support, DevOps, CMS migration, Salesforce integration, product rescue, security review';

/* Steps */
$steps     = [];
$steps_raw = get_sub_field( 'hdadv_steps' );
if ( is_array( $steps_raw ) ) {
	foreach ( $steps_raw as $step_row ) {
		$options     = [];
		$options_raw = $step_row['hdadv_step_options'] ?? [];
		if ( is_array( $options_raw ) ) {
			foreach ( $options_raw as $opt ) {
				$options[] = [
					'text'     => $opt['hdadv_option_text']     ?? '',
					'key'      => $opt['hdadv_option_key']      ?? '',
					'is_other' => ! empty( $opt['hdadv_option_is_other'] ),
				];
			}
		}
		$img     = $step_row['hdadv_step_visual_image'] ?? null;
		$img_url = '';
		$img_alt = '';
		if ( ! empty( $img ) ) {
			$img_url = $img['sizes']['large'] ?? $img['url'] ?? '';
			$img_alt = $img['alt'] ?? '';
		}
		$steps[] = [
			'question'       => $step_row['hdadv_step_question']       ?? '',
			'options'        => $options,
			'visual_img'     => $img_url,
			'visual_img_alt' => $img_alt,
			'visual_caption' => $step_row['hdadv_step_visual_caption'] ?? '',
			'visual_sub'     => $step_row['hdadv_step_visual_sub']     ?? '',
		];
	}
}

/* Results */
$results     = [];
$results_raw = get_sub_field( 'hdadv_results' );
if ( is_array( $results_raw ) ) {
	foreach ( $results_raw as $res_row ) {
		$fit     = [];
		$fit_raw = $res_row['hdadv_result_fit'] ?? [];
		if ( is_array( $fit_raw ) ) {
			foreach ( $fit_raw as $fit_row ) {
				$item = $fit_row['hdadv_result_fit_item'] ?? '';
				if ( $item ) {
					$fit[] = $item;
				}
			}
		}
		$key = $res_row['hdadv_result_key'] ?? '';
		if ( $key ) {
			$results[ $key ] = [
				'title'          => $res_row['hdadv_result_title']          ?? '',
				'desc'           => $res_row['hdadv_result_desc']           ?? '',
				'model'          => $res_row['hdadv_result_model']          ?? '',
				'fit'            => $fit,
				'primary_text'   => $res_row['hdadv_result_primary_text']   ?? '',
				'primary_url'    => $res_row['hdadv_result_primary_url']    ?? '',
				'secondary_text' => $res_row['hdadv_result_secondary_text'] ?? '',
				'secondary_url'  => $res_row['hdadv_result_secondary_url']  ?? '',
			];
		}
	}
}

if ( empty( $steps ) || empty( $results ) ) {
	return;
}

/* ── 2. Unique section ID ─────────────────────────────────────── */
static $hdadv_uid = 0;
$hdadv_uid++;
$section_id = 'hd-advisor-' . $hdadv_uid;
$shell_id   = $section_id . '-shell';
$data_id    = $section_id . '-data';
?>
<section class="hd-advisor" id="<?php echo esc_attr( $section_id ); ?>">
	<div class="hd-container">

		<?php if ( $eyebrow || $heading || $heading_accent || $sub ) : ?>
		<div class="hd-section-head">
			<?php if ( $eyebrow ) : ?>
			<div class="hd-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $heading || $heading_accent ) : ?>
			<h2 class="hd-h2">
				<?php echo esc_html( $heading ); ?>
				<?php if ( $heading_accent ) : ?>
				<span class="hd-accent"><?php echo esc_html( $heading_accent ); ?></span>
				<?php endif; ?>
			</h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p class="hd-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="hd-advisor-shell" id="<?php echo esc_attr( $shell_id ); ?>">
			<div class="hd-advisor-panel"></div>
			<div class="hd-advisor-result"></div>
		</div>

	</div><!-- .hd-container -->

	<script type="application/json" class="hd-advisor-data" id="<?php echo esc_attr( $data_id ); ?>"><?php
		echo wp_json_encode( [
			'shell'       => $shell_id,
			'steps'       => $steps,
			'results'     => $results,
			'other_label' => $other_label,
			'other_ph'    => $other_ph,
			'total'       => count( $steps ),
		] );
	?></script>
</section>
