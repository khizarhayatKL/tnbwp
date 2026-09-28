<?php

/**
 * ACF Flexible Content — Section Picker Modal
 *
 * Replaces the native "+ Add Section" dropdown with a searchable modal
 * that displays all registered layouts in a 2-column grid with preview images.
 *
 * To register a preview screenshot for a layout:
 *
 *   add_filter( 'tnb_acf_layout_previews', function( $previews ) {
 *       $base = get_stylesheet_directory_uri() . '/assets/img/acf-previews/';
 *       $previews['my_layout_name'] = $base . 'my-layout.jpg';
 *       return $previews;
 *   } );
 *
 * Recommended screenshot size: 760 × 330 px (16:7 aspect ratio), < 80 KB.
 * Store in: wp-content/themes/technbrains-child/assets/img/acf-previews/
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'acf/input/admin_enqueue_scripts', 'tnb_acf_modal_enqueue' );
function tnb_acf_modal_enqueue() {

	$dir = get_stylesheet_directory_uri();
	$ver = wp_get_theme()->get( 'Version' ) ?: '1.0.0';

	wp_enqueue_style(
		'tnb-acf-modal',
		$dir . '/assets/css/acf-modal.css',
		[],
		$ver
	);

	wp_enqueue_script(
		'tnb-acf-modal',
		$dir . '/assets/js/acf-modal.js',
		[ 'jquery', 'acf-input' ],
		$ver,
		true
	);

	// Pass layout preview URLs to JS
	$previews = apply_filters( 'tnb_acf_layout_previews', [] );

	wp_localize_script( 'tnb-acf-modal', 'tnbAcfModal', [
		'previews' => (object) $previews,
	] );
}

/**
 * Register default preview screenshots for all current layouts.
 * Add actual screenshot files to /assets/img/acf-previews/.
 */
add_filter( 'tnb_acf_layout_previews', 'tnb_acf_register_default_previews' );
function tnb_acf_register_default_previews( array $previews ): array {

	$base = get_stylesheet_directory_uri() . '/assets/img/acf-previews/';

	$defaults = [
		'platform_banner'       	=> $base . 'platform-banner.webp',
		'trust_slider'          	=> $base . 'trust-slider.webp',
		'platforms_specialize'  	=> $base . 'platforms-specialize.webp',
		'platform_services'     	=> $base . 'platform-services.webp',
		'platform_engagement'   	=> $base . 'platform-engagement.webp',
		'platform_cta'          	=> $base . 'platform-cta.webp',
		'platform_blog'         	=> $base . 'platform-blog.webp',
		'platform_faqs'         	=> $base . 'platform-faqs.webp',
		'industry_banner'       	=> $base . 'industry-banner.webp',
		'ih_industries'         	=> $base . 'industry-specific.webp',
		'case_studies_slider'   	=> $base . 'case-studies-slider.webp',
		'flexible_engagement'   	=> $base . 'flexible-eng-ind.webp',
		'why_choose_industry'   	=> $base . 'why-choose-ind.webp',
		'experts_team'          	=> $base . 'expert-team.webp',
		'industry_testimonials'     => $base . 'ind-testimonials.webp',
		'hd_hero'                   => $base . 'hire-banner.webp',
		'hd_available'              => $base . 'hire-devs.webp',
		'hd_metrics'                => $base . 'hire-metrics.webp',
		'hd_services'               => $base . 'hd-services.webp',
		'hd_roles'                  => $base . 'hd-roles.webp',
		'hd_vetting'                => $base . 'hd-vetting.webp',
		'hd_engage'                 => $base . 'engagement.webp',
		'hd_tech'                   => $base . 'hd-tech.webp',
		'hd_why'                    => $base . 'hd-why.webp',
		'hd_process'                => $base . 'hd-process.webp',
		'hd_compare'   				=> $base . 'hd-compare.webp',
		'hd_industry_experts'   	=> $base . 'industries.webp',
		'hd_advisor'   				=> $base . 'hd-advisor.webp',
		'hd_form'   				=> $base . 'hd-form.webp',
		'sv_hero'   				=> $base . 'sv-hero.webp',
		'sv_track_record'   		=> $base . 'sv-track-record.webp',
		'sv_recog_slider'   		=> $base . 'sv-recog-slider.webp',
		'sv_stack'   		    	=> $base . 'sv-stack.webp',
		'sv_three_ways'   			=> $base . 'sv-three-ways.webp',
		'sv_process'   				=> $base . 'sv-process.webp',
		'sv_tools'   				=> $base . 'sv-tool.webp',
		'tc_hero'   				=> $base . 'tc-hero.webp',
		'tc_certs'   				=> $base . 'tc-certs.webp',
		'tst_stack'   				=> $base . 'tc-stacks.webp',
		'tai_aihub'   				=> $base . 'tc-aihub.webp',
		'lhb_hero'   				=> $base . 'lhb-hero.webp',
		'loc_cards'   				=> $base . 'loc-cards.webp',
		'loc_results_rec'   		=> $base . 'loc-results.webp',
		'sa_hero'   				=> $base . 'sa-hero.webp',
		'sa_brands'   				=> $base . 'sa-brands.webp',
		'sa_results'   				=> $base . 'sa-results.webp',
		'sa_roles'   				=> $base . 'sa-roles.webp',
		'sa_fit'   					=> $base . 'sa-fit.webp',
		'sa_process'   				=> $base . 'sa-process.webp',
		'so_hero'   				=> $base . 'so-hero.webp',
		'so_compare'   				=> $base . 'so-compare.webp',
		'so_pricing'   				=> $base . 'so-pricing.webp',
		'so_hire'   				=> $base . 'so-hire.webp',
		'so_riskx'   				=> $base . 'so-riskx.webp',
		'dt_hero'   				=> $base . 'dt-hero.webp',
		'dt_fit'   					=> $base . 'dt-fit.webp',
		'dt_models'   				=> $base . 'dt-models.webp',
		'dt_risks'   				=> $base . 'dt-risks.webp',
		'dt_vetting'   				=> $base . 'dt-vetting.webp',
		'dt_scale'   				=> $base . 'dt-scale.webp',
		'dt_devs'   				=> $base . 'dt-devs.webp',
		'reasons_compare'           => $base . 'reasons-compare.webp',
		'consult_steps'             => $base . 'consult-steps.webp',
		'lp_why_choose5'            => $base . 'lp-why-choose-5.webp',
		// Construction Software Development — previews are added as they are captured;
		// the file_exists() gate below leaves an entry inert until its image lands.
		'cn_hero'              => $base . 'cn-hero.webp',
		'cn_answer'            => $base . 'cn-answer.webp',
		'cn_trust'             => $base . 'cn-trust.webp',
		'cn_types'             => $base . 'cn-types.webp',
		'cn_cases'             => $base . 'cn-cases.webp',
		'cn_roofing'           => $base . 'cn-roofing.webp',
		'cn_integrations'      => $base . 'cn-integrations.webp',
		'cn_datacost'          => $base . 'cn-datacost.webp',
		'cn_calculator'        => $base . 'cn-calculator.webp',
		'cn_compare'           => $base . 'cn-compare.webp',
		'cn_ai'                => $base . 'cn-ai.webp',
		'cn_abandon'           => $base . 'cn-abandon.webp',
		'cn_engineer'          => $base . 'cn-engineer.webp',
		'cn_reviews'           => $base . 'cn-reviews.webp',
		'cn_drivers'           => $base . 'cn-drivers.webp',
		'cn_process'           => $base . 'cn-process.webp',
		'cn_models'            => $base . 'cn-models.webp',
		'cn_stack'             => $base . 'cn-stack.webp',
		'cn_banner'            => $base . 'cn-banner.webp',
		// Article template family (Procore Alternatives + sibling buyer's-guide pages) —
		// same file_exists() gate, inert until screenshots are captured.
		'art_hero'             => $base . 'art-hero.webp',
		'art_prose'            => $base . 'art-prose.webp',
		'art_tldr'             => $base . 'art-tldr.webp',
		'art_decision_table'   => $base . 'art-decision-table.webp',
		'art_diag_set'         => $base . 'art-diag-set.webp',
		'art_callout'          => $base . 'art-callout.webp',
		'art_scope_note'       => $base . 'art-scope-note.webp',
		'art_alt_evals'        => $base . 'art-alt-evals.webp',
		'art_head_to_head'     => $base . 'art-head-to-head.webp',
		'art_inline_cta'       => $base . 'art-inline-cta.webp',
		'art_sentiment_table'  => $base . 'art-sentiment-table.webp',
		'art_cost_models'      => $base . 'art-cost-models.webp',
		'art_checklist'        => $base . 'art-checklist.webp',
		'art_sources'          => $base . 'art-sources.webp',
		'art_silo'             => $base . 'art-silo.webp',
		'art_stat_block'       => $base . 'art-stat-block.webp',
		'art_vendor_table'     => $base . 'art-vendor-table.webp',
		'art_evidence_table'   => $base . 'art-evidence-table.webp',
		'art_mini_list'        => $base . 'art-mini-list.webp',
		'art_cost_calculator'  => $base . 'art-cost-calculator.webp',
		'art_criteria_cards'   => $base . 'art-criteria-cards.webp',
		'art_methods_diagram'  => $base . 'art-methods-diagram.webp',
		'art_profile_rows'     => $base . 'art-profile-rows.webp',
		'art_stat_cards'       => $base . 'art-stat-cards.webp',
		'art_compare_table'    => $base . 'art-compare-table.webp',
		'art_tool_eval_tabs'   => $base . 'art-tool-eval-tabs.webp',
		'art_platform_evals'   => $base . 'art-platform-evals.webp',
		'art_legend_matrix'    => $base . 'art-legend-matrix.webp',
		'art_case_box'         => $base . 'art-case-box.webp',
				// Mobile App Development
		'ma_hero'              => $base . 'ma-hero.webp',
		'ma_acc'               => $base . 'ma-acc.webp',
		'ma_grow3'             => $base . 'ma-grow3.webp',
		'ma_eco'               => $base . 'ma-eco.webp',
// logistics
			'lg_why'                    => $base . 'lg-why.webp',
			'lg_flow'                   => $base . 'lg-flow.webp',
			'lg_roles'                  => $base . 'lg-roles.webp',
			'lg_cost_table'             => $base . 'lg-cost-table.webp',
			'lg_conn_ops'               => $base . 'lg-conn-ops.webp',
			'lg_priorities'             => $base . 'lg-priorities.webp',
			'lg_compliance'             => $base . 'lg-compliance.webp',
			'lg_ladder'                 => $base . 'lg-ladder.webp',
			// case studies
		'case_studies_hero'         => $base . 'case-studies-hero.webp',
		'case_studies_coverflow'    => $base . 'case-studies-coverflow.webp',
		'case_studies_filtered_grid' => $base . 'case-studies-filtered-grid.webp',
	];

	foreach ( $defaults as $layout => $url ) {
		// Only register if the actual file exists on disk
		$file = get_stylesheet_directory() . '/assets/img/acf-previews/' . basename( $url );
		if ( file_exists( $file ) ) {
			$previews[ $layout ] = $url;
		}
	}

	return $previews;
}
